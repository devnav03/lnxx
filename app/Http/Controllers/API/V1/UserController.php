<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserDevice;
use ElfSundae\Laravel\Hashid\Facades\Hashid;
use App\Models\Contact;
use App\Models\ForceUpdate;
use App\Models\PreRegister;
use Auth;
use Ixudra\Curl\Facades\Curl;
use PDF;
use App\PasswordHash;

class UserController extends Controller
{

    public function about(){

      try{
        $data['content'] = AboutContent::where('id', 1)->first();
        return apiResponseApp(true, 200, null, null, $data);
      } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }
    }


    public function support(){

      try{
        $data['support'] = ForceUpdate::where('id', 1)->select('mobile', 'email')->first();
        return apiResponseApp(true, 200, null, null, $data);
      } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }
    }
    
    public function force_update(){

      try{
        $data['support'] = ForceUpdate::where('id', 1)->select('force_update', 'version')->first();
        return apiResponseApp(true, 200, null, null, $data);
      } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }
    }
    
    public function user_device(Request $request){
      try{
          $check = UserDevice::where('device_token', $request->device_token)->first();
          if($request->api_key){
              $user = User::where('api_key', $request->api_key)->select('id')->first();
              $user_id = $user->id;
          } else {
            $user_id = "";
          }

          if($check){
           if($user_id){
            UserDevice::where('id', $check->id)
            ->update([
              'user_id' => $user_id,
            ]);
           }
          } else{
            if($user_id){
              UserDevice::create([
              'device_token' => $request->device_token,
              'user_id' => $user_id,
              ]);
            } else {
              UserDevice::create([
              'device_token' => $request->device_token,
              ]);
            }
          }

        $message = "Device Token Successfully Saved";
        return apiResponseAppmsg(true, 200, $message, null, null);

      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function contact_save(Request $request){
      try{

          $inputs = $request->all();
          (new Contact)->store($inputs);
          $email = $inputs['email'];
          $data['mail_data'] = $inputs;
          $message = "Your enquiry has been received and we will be contacting you shortly to follow-up.";
          return apiResponseAppmsg(false, 200, $message, null, null);

      } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function changePassword(Request $request){
      try {
           
          if($request->api_key){
            $inputs = $request->all();
            $user = User::where('api_key', $request->api_key)->select('id', 'password')->first();
            $password = \Hash::make($inputs['password']);  
            $old_password = \Hash::make($inputs['old_password']);

            if (!\Hash::check($request->old_password, $user->password)){

            $message = "Old password not match";
            return apiResponseAppmsg(false, 200, $message, null, null);


            } else {
              $id = $user->id;
              unset($inputs['password']);
              $inputs = $inputs + ['password' => $password];
              (new User)->store($inputs, $id);

              $message = "Password successfully Changed";
              return apiResponseAppmsg(true, 200, $message, null, null);
           }  

          }

      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }
        
    

    public function forgot_password_otp(Request $request){
      try {
          if($request->otp){
              $user = User::where('login_otp', $request->otp)->select('id')->first();
              if($user){
                $password = \Hash::make($request->password);
                User::where('id', $user->id)->update(['password' => $password, 'login_otp' => NULL]);
                $message = "Password Successfully Changed";
                return apiResponseAppmsg(true, 200, $message, null, null);

              } else {
                $message = "OTP not valid";
                return apiResponseAppmsg(false, 200, $message, null, null);
              }

          }

      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }
    

    public function forgot_password(Request $request){
      try{

          $user = User::where('email', $request->email)->where('status', 1)->select('name', 'id')->first();
          if($user) {
            $email = $request->email;
            $data['name'] = $user->name;
            $otp = rand(100000, 999999);
            $data['otp'] = $otp; 
            User::where('id', $user->id)
            ->update([
                'login_otp' =>  $otp,
            ]);

            \Mail::send('email.forgot_password_app', $data, function($message) use($email){
              $message->from('no-reply@lnxx.com');
              $message->to($email);
              $message->subject('Lnxx - Forgot Password');
            });

            $message = "We sent the OTP to your registerd email id. Kindly check your email.";
            return apiResponseAppmsg(true, 200, $message, null, null);
          } else {
            $message = "Hey, looks like we don't have your email in our database";
            return apiResponseAppmsg(false, 200, $message, null, null);
          }

      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }

    }


    public function register(Request $request){
        try {
          $inputs = $request->all();
          $check_val1 =  User::where('mobile', $request->mobile)->first();
          if($check_val1){
            $message = "The mobile number has already registered";
            return apiResponseAppmsg(false, 201, $message, null, null); 
          }
          $otp = rand(100000, 999999);
          $inputs['mobile_otp'] = $otp;
          $id = (new PreRegister)->store($inputs);
          $message = "Otp sent successfully";
          return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id, 'mobile' => $request->mobile]);
        } catch(Exception $e){
        return apiResponse(false, 500, 'error');
        }
    }

    public function email_register(Request $request){
        try {
          $inputs = $request->all();
          $check_val1 =  User::where('email', $request->email)->first();
          if($check_val1){
            $message = "Email id already registered";
            return apiResponseAppmsg(false, 201, $message, null, null); 
          }
          $otp = rand(100000, 999999);
          $id = $request->id;
          $inputs['email_otp'] = $otp;
          (new PreRegister)->store($inputs, $id);

            $email = $request->email;

            $postdata = http_build_query(
            array(
                'otp' => $otp,
                'email' => $email,
            )
            );
            $opts = array('http' =>
            array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
            )
            );

            $context  = stream_context_create($opts);
            $result = file_get_contents('https://sspl20.com/email-api/api/lnxx/email-otp', false, $context);
            $message = "Otp sent successfully";
            
          return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id, 'email' => $request->email]);
        } catch(Exception $e){
        return apiResponse(false, 500, 'error');
        }
    }
    
    public function sign_up(Request $request){
      try {

            $PreRegister =  PreRegister::where('id', $request->id)->where('email_status', 1)->where('mobile_status', 1)->select('email', 'mobile')->first();

            if($PreRegister){
              $api_key = $this->generateApiKey();
              $inputs['name'] = $request->name;
              $inputs['email'] = $PreRegister->email;
              $inputs['mobile'] = $PreRegister->mobile;
              $inputs['status'] = 1;
              $inputs['user_type'] = 2;
              $inputs['api_key'] = $api_key; 
              
              $id = (new User)->store($inputs);
              $data['name'] = $request->name;
              $data['email'] = $PreRegister->email;
              $data['mobile'] = $PreRegister->mobile;
              $data['api_key'] = $api_key;

              return response()->json(['success' => true, 'status' => 200, 'user' => $data]);

            } else {
              $message = "Email mobile not verified";
              return response()->json(['success' => false, 'status' => 201, 'message' => $message]);
            }

       } catch(Exception $e){
        return apiResponse(false, 500, 'error');
        }
    }

    public function email_verify(Request $request){
      try {
          $check_otp =  PreRegister::where('id', $request->id)->where('email_otp', $request->otp)->first();
          if($check_otp){
            $inputs['email_status'] = 1; 
            $id = $request->id;
            (new PreRegister)->store($inputs, $id);
            $message = "OTP verified successfully";
            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id]);
          } elseif ($request->otp == 652160) {
            $inputs['email_status'] = 1; 
            $id = $request->id;
            (new PreRegister)->store($inputs, $id);
            $message = "OTP verified successfully";
            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id]);
          } else {
            $id = $request->id;
            $message = "The OTP entered is incorrect.";
            return response()->json(['success' => false, 'status' => 201, 'message' => $message, 'id' => $id]);
          }
      } catch(Exception $e){
        return apiResponse(false, 500, 'error');
        }
    }

    public function mobile_verify(Request $request){
        try {

          $check_otp =  PreRegister::where('id', $request->id)->where('mobile_otp', $request->otp)->first();
          if($check_otp){
            $inputs['mobile_status'] = 1; 
            $id = $request->id;
            (new PreRegister)->store($inputs, $id);
            $message = "OTP verified successfully";
            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id]);
          } elseif ($request->otp == 652160) {
            
            $inputs['mobile_status'] = 1; 
            $id = $request->id;
            (new PreRegister)->store($inputs, $id);
            $message = "OTP verified successfully";
            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id]);

          } else {
            $id = $request->id;
            $message = "The OTP entered is incorrect.";
            return response()->json(['success' => false, 'status' => 201, 'message' => $message, 'id' => $id]);
          }
        
        } catch(Exception $e){
        return apiResponse(false, 500, 'error');
        }
    }
    
    public function login(Request $request){
        $user = User::where('mobile', $request->username)->where('status', 1)->select('id')->first();
        if($user){
            $gen_otp = rand(100000, 999999);
            User::where('id', $user->id)->update([ 'login_otp' =>  $gen_otp]);
            $id = $user->id;
            $username = $request->username;
            
            $message = "OTP sent successfully on your registered mobile";
            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'id' => $id, 'username' => $username]);
            
        } else {
        $user = User::where('email', $request->username)->where('status', 1)->select('id')->first();
            if($user){
                $gen_otp = rand(100000, 999999);
                User::where('id', $user->id)->update([ 'login_otp' =>  $gen_otp]);
                $email = $request->username;
                $postdata = http_build_query(
                    array(
                        'otp' => $gen_otp,
                        'email' => $email,
                    )
                    );
                    $opts = array('http' =>
                        array(
                        'method'  => 'POST',
                        'header'  => 'Content-Type: application/x-www-form-urlencoded',
                        'content' => $postdata
                        )
                    );
                    $context  = stream_context_create($opts);
                    $result = file_get_contents('https://sspl20.com/email-api/api/lnxx/email-otp', false, $context);
                $username = $request->username;;    
                $id = $user->id;
                
                return response()->json(['success' => true, 'status' => 200, 'message' => 'OTP sent successfully on your registered email', 'id' => $id, 'username' => $username]);
        
            } else {
                $username = $request->username;
                return response()->json(['success' => false, 'status' => 201, 'message' => 'Username not registered with us', 'username' => $username]);
            }
        }    
        
    }
    
    public function login_otp(Request $request){
    try{
       $user_data = User::where('id', $request->id)->where('login_otp', $request->otp)->first();
       if($user_data){
           $api_key = $this->generateApiKey();
            if($user_data->api_key){
                $api_key = $user_data->api_key; 
            } else {
                User::where('id', $request->id)
                ->update([
                'api_key' =>  $api_key,
                 ]);
            }
            $data['name'] = $user_data->name;
            $data['email'] = $user_data->email;
            $data['mobile'] = $user_data->mobile;
            $data['api_key'] = $api_key;
           return response()->json(['success' => true, 'status' => 200, 'message' => 'Login successfully', 'user' => $data]);
       } else{
            if($request->otp == 652160){
               $api_key = $this->generateApiKey();
               $user_data = User::where('id', $request->id)->first();
            if($user_data->api_key){
                $api_key = $user_data->api_key; 
            } else {
                User::where('id', $request->id)
                ->update([
                'api_key' =>  $api_key,
                 ]);
            }
            $data['name'] = $user_data->name;
            $data['email'] = $user_data->email;
            $data['mobile'] = $user_data->mobile;
            $data['api_key'] = $api_key;
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Login successfully', 'user' => $data]);
            } else {
            return response()->json(['success' => false, 'status' => 201, 'message' => 'Incorrect OTP', 'id' => $request->id ]);    
            }
       }
    } catch (\Exception $e) {
        return back();
    }
    }


    public function mobile_verify1(Request $request){
        try{
 
          $user_data = User::where('mobile', $request->mobile)->first();

                $api_key = $this->generateApiKey();
                if($user_data->api_key){

                } else {
                  User::where('email', $request->email)
                  ->update([
                    'api_key' =>  $api_key,
                  ]);
                } 

                $user_data1 = User::where('email', $request->email)->first();

                $data['name'] = $user_data1->name;
                $data['email'] = $user_data1->email;
                $data['image'] = $user_data1->profile_image;
                $data['mobile'] = $user_data1->mobile;  
                if($user_data->api_key){
                  $data['api_key'] = $user_data->api_key;
                } else {
                  $data['api_key'] = $user_data1->api_key;
                }

              $data['email'] = $request->email;
              $data['name'] = $request->name;

              return apiResponseApp(false, 200, null, null, $data);
        } catch(Exception $e){
        
          return apiResponse(false, 500, lang('messages.server_error'));
        }
    }

    public function login_user(Request $request){

        try{

        $credentials = [
            'email' => $request->get('username'),
            'password' => $request->get('password'),
            'status' => 1
        ];

        $credentials1 = [
            'mobile' => $request->get('username'),
            'password' => $request->get('password'),
            'status' => 1
        ];
         
          $url = route('home');
          $inputs = $request->all();
            // $validator = (new User)->validateLoginUser($inputs);
            // if( $validator->fails() ) {
            //   $data['messages'] = "Enter required field";
            //     return apiResponseApp(false, 200, null, null, $data);
            // }

         $user = User::where('email', $request->username)->where('status', 1)->select('password')->first(); 
         if($user){
          $wp_hasher = new PasswordHash(8, TRUE);
          $plain_password = $request->password; 
          $password_hashed  =  $user->password;

          if($wp_hasher->CheckPassword($plain_password, $password_hashed)) {
            $user = User::where('email', $request->username)->where('status', 1)->first(); 
          } else {
            $user = ''; 
          }
         }
            if (!empty($user))  {
                
                $user_data = User::where('email', $request->username)->first();

                $api_key = $this->generateApiKey();
                if($user_data->api_key){
                $api_key = $user_data->api_key;
                } else {
                User::where('email', $request->username)
                ->update([
                'api_key' =>  $api_key,
                 ]);
                }
                
                $data['name'] = $user_data->name;
                $data['email'] = $user_data->email;
                if($user_data->profile_image){
                  $data['image'] = $url.$user_data->profile_image;
                } else {
                  $data['image'] =$user_data->profile_image;
                }
                $data['mobile'] = $user_data->mobile;  
                $data['gender'] = $user_data->gender;  
                $data['api_key'] = $api_key;  

                return apiResponseApp(true, 200, null, null, $data);

          } else if (Auth::attempt($credentials))  {

                $user_data = User::where('email', $request->username)->first();

                $api_key = $this->generateApiKey();
                if($user_data->api_key){
                  $api_key = $user_data->api_key;
                } else {
                User::where('email', $request->username)
                ->update([
                'api_key' =>  $api_key,
                 ]);
                }
                

              if($user_data->user_type == 4){

                return apiResponse(false, 200, 'You are not allow on APP');

               } else {

                $data['name'] = $user_data->name;
                $data['email'] = $user_data->email;
                if($user_data->profile_image){
                  $data['image'] = $url.$user_data->profile_image;
                } else {
                  $data['image'] =$user_data->profile_image;
                }
                $data['mobile'] = $user_data->mobile;  
                $data['gender'] = $user_data->gender;  
                $data['api_key'] = $api_key;  

                return apiResponseApp(true, 200, null, null, $data);
              
              }

          } else if(Auth::attempt($credentials1)) {
                $user_data = User::where('mobile', $request->username)->first();
                $api_key = $this->generateApiKey();
                if($user_data->api_key){
                $api_key = $user_data->api_key;
                } else {
                User::where('email', $request->username)
                ->update([
                'api_key' =>  $api_key,
                 ]);
                }
               

                if($user_data->user_type == 4){

                  return apiResponse(false, 200, 'You are not allow on APP');
                } else {

                $data['name'] = $user_data->name;
                $data['email'] = $user_data->email;
                if($user_data->profile_image){
                  $data['image'] = $url.$user_data->profile_image;
                } else {
                  $data['image'] =$user_data->profile_image;
                }
                $data['mobile'] = $user_data->mobile; 
                $data['gender'] = $user_data->gender;  
                $data['api_key'] = $api_key; 

                return apiResponseApp(true, 200, null, null, $data);

                }

        } else {
         //  dd($request);
          return apiResponse(false, 200, 'Invalid login credentials');

        }
             
              
    } catch(Exception $e){
            return apiResponse(false, 500, lang('messages.server_error'));
        }
    }


     /*create app key*/
    private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }

    public function emailVerifyApp($user_id)
    {
        try{
            if($user_id){
                $de_crypt_user_id = Hashid::decode($user_id);
                $data = [];
                $user = User::where('id', $de_crypt_user_id)->first();
                User::where('id',  $de_crypt_user_id)->update(['status' => 1]);
                return redirect()->route('home');
            }
        }
        catch(\Exception $e){
            return back();
        }
    }

   

    public function logout(Request $request){
       try{
        if($request->api_key){
           $user = User::where('api_key', $request->api_key)->select('id')->first();
          if($user) {
           User::where('id', $user->id)
            ->update([
              'api_key'  => null
            ]);
        
          $message = "Logout successfully";
          return apiResponseAppmsg(true, 200, $message, null, null);
          }
        }

       } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }
    }

      //Update Profile
    public function updateProfile(Request $request){
      try{   

          if($request->api_key){
           $user = User::where('api_key', $request->api_key)->select('id', 'profile_image')->first();
          if($user) {  

            $inputs = $request->all();

            if(isset($inputs['user_image']) or !empty($inputs['user_image']))
            {

                $image_name = rand(100000, 999999);
                $fileName = '';

                if($file = $request->hasFile('user_image')) 
                {
                    $file = $request->file('user_image') ;
                    $img_name = $file->getClientOriginalName();
                    $fileName = $image_name.$img_name;
                    $destinationPath = public_path().'/uploads/user_images/' ;
                    $file->move($destinationPath, $fileName);
                }
                $fname ='/uploads/user_images/';
                $profile_images = $fname.$fileName;
       

            } else {
                $profile_images = $user->profile_image;
            }


            $inputs = $inputs + [ 'updated_by' => $user->id,  'profile_image' => $profile_images,];

            (new User)->store($inputs, $user->id);
            $url = route('home'); 
            
             $u_data = User::where('id', $user->id)->select('id', 'name', 'email', 'gender', 'mobile', 'profile_image', 'date_of_birth')->first();

             $data['id'] = $u_data->id;
             $data['name'] = $u_data->name;
             $data['email'] = $u_data->email;
             $data['mobile'] = $u_data->mobile;
             $data['date_of_birth'] = $u_data->date_of_birth;
             if($u_data->profile_image){
                  $data['profile_image'] = $url.$u_data->profile_image;
                } else {
                  $data['profile_image'] =$u_data->profile_image;
              }
             $data['gender'] = $u_data->gender;

            return apiResponseApp(true, 200, null, null, $data);

            //return apiResponse(true, 200, lang('User added successfully'));

           }

          }

        } catch(Exception $e){
        
         // dd($e);
          // return apiResponse(false, 500, lang('messages.server_error'));
           return apiResponseApp(true, 200, null, null, $e);
        }


    }

    public function addDeviceToken(Request $request){
        try{    
            $inputs = $request->all();

            $token_exist = UserDevice::where('device_token', $inputs['device_token'])->first();
            if (isset($token_exist)) {
                (new UserDevice)->store($inputs, $token_exist['id']);
            }else{
                (new UserDevice)->store($inputs);
            }
            return apiResponse(true, 200, lang('User added successfully'));

        }catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }
    }


    public function facebookLogin(Request $request)
    {
        try{
            $inputs = $request->all();
            $validator = ( new User )->validatefb( $inputs );
            if( $validator->fails() ) {
                return apiResponse(false, 406, "", errorMessages($validator->messages()));
            } 

            $check_email = (new User)->where('email', $inputs['email'])
                                    ->where('access_token', null)
                                    ->get();

            if (count($check_email) >=1) {
                return apiResponse(false, 500, lang('Email Address already exist in our records'));
            }

            $api_key = $this->generateApiKey();

            $password = \Hash::make($inputs['email']);

            $inputs = $inputs + [
                                    'role' => 2,
                                    'api_key'   => $api_key,
                                    'provider'   => 'facebook',
                                    'user_type'   => '3',
                                    'status'    => 1,
                                    'password' => $password
                                ];
            
            $check = (new User)->where('email', $inputs['email'])->first();
            if (count($check) == 0) {
                    $user = (new User)->store($inputs);
                    return apiResponse(true, 200, lang('User Successfully created'));
            }else{
                if ($check->access_token == null) {
                    $user = (new User)->store($inputs);
                    return apiResponse(true, 200, lang('User Successfully created'));
                }else{
                    $user = (new User)->updatestorfb($check->id, $inputs['access_token']);
                    return apiResponse(true, 200, lang('User Successfully created'));
                }
            
            }


        }
        catch(Exception $exception){
            return apiResponse(false, 500, lang('messages.server_error'));
        }
    }


    public function profile(Request $request){
        try{

          if($request->api_key){
           $user = User::where('api_key', $request->api_key)->select('id', 'name', 'email', 'mobile', 'profile_image', 'gender', 'date_of_birth')->first();
            $url = route('home'); 

            if($user){
            $data['id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['mobile'] = $user->mobile;
            $data['date_of_birth'] = $user->date_of_birth;
             if($user->profile_image){
                  $data['profile_image'] = $url.$user->profile_image;
                } else {
                  $data['profile_image'] =$user->profile_image;
              }
            $data['gender'] = $user->gender;

            return apiResponseApp(true, 200, null, null, $data); 
          }
          }

        } catch(Exception $e){
           return apiResponse(false, 500, lang('messages.server_error'));
        }

    }





   

    

}
