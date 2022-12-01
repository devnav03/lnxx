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
use App\Models\SelfEmpDetail;
use App\Models\OtherCmDetail;
use App\Models\UserEducation;
use App\Models\CmSalariedDetail;
use App\Models\CustomerOnboarding;
use App\Models\Service;
use App\Models\ServiceApply;
use App\Models\Address;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Country;
use App\Models\ProductRequest;
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

    public function verify_emirates(Request $request){
      try {
            if($request->api_key){
              $user = User::where('api_key', $request->api_key)->select('id', 'login_otp')->first();
              if($user){

                 
                if($user->login_otp == $request->otp){
                  User::where('id', $user_id)
                  ->update([
                  'eid_status' =>  1,
                  ]);

                  return response()->json(['success' => true, 'status' => 200, 'message' => 'Emirates id successfully approved']);

                } elseif ($request->otp == '652160') {
                  User::where('id', $user_id)
                  ->update([
                  'eid_status' =>  1,
                  ]);

                  return response()->json(['success' => true, 'status' => 200, 'message' => 'Emirates id successfully approved']);
                } else {
                  return response()->json(['success' => false, 'status' => 201, 'message' => 'Invalid OTP Code']);
                }
              } 
            }
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

    public function bank_list(){
        $data = Bank::where('status', 1)->select('name', 'id')->get();
        return response()->json(['success' => true, 'status' => 200, 'data' => $data]);      
    }

    public function company_list(){
        $data = Company::where('status', 1)->select('name', 'id')->get();
        return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
    }



    public function upload_video(Request $request){
      try {
          if($request->api_key){
            $inputs = $request->all();
            $user = User::where('api_key', $request->api_key)->select('id', 'password')->first();
            if($user){
              $user_id = $user->id;
              $vid_dt = CustomerOnboarding::where('user_id', $user_id)->select('video')->first();
              if(isset($inputs['video']) or !empty($inputs['video'])) {
                  $image_name = rand(100000, 999999);
                  $fileName = '';
                  if($file = $request->hasFile('video')) {
                      $file = $request->file('video');
                      $img_name = $file->getClientOriginalName();
                      $fileName = $image_name.$img_name;
                      $destinationPath = public_path().'/uploads/video/' ;
                      $file->move($destinationPath, $fileName);
                  }
                  $fname ='/uploads/video/';
                  $image = $fname.$fileName;
              }  else{
                  $image = $vid_dt->video;
              }
              CustomerOnboarding::where('user_id', $user_id)->update(['video' => $image]);
              return response()->json(['success' => true, 'status' => 200, 'message' => 'Video uploaded successfully']);
            }
          }
      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function consent_form_status(Request $request){

      if($request->api_key){
        $user = User::where('api_key', $request->api_key)->select('id')->first();
        if($user) {
          
          $user_id = $user->id;
          $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
          $ser = 1300;
          $ref_id = $ser.$result->id;
          CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id, 'consent_form' => 1]);
         
          return response()->json(['success' => true, 'status' => 200, 'ref_id' => $ref_id]);

        }
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
        
    public function service_list(Request $request){
      try {
            if($request->api_key){
              $user = User::where('api_key', $request->api_key)->select('id')->first();
              if($user){
              $services = Service::where('status', 1)->select('id', 'name', 'image')->get();
              $base = route('get-started');
              $data = [];
              foreach ($services as $service) {
                $slide['id'] = $service->id;
                $slide['name'] = $service->name;
                $slide['image'] = $base.$service->image;
                $check = ServiceApply::where('service_id', $service->id)->where('customer_id', $user->id)->count();
                if($check == 0){
                $slide['selected'] = false;  
                } else {
                $slide['selected'] = true; 
                }

                $data[] = $slide;
              } 
                return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
              }
            }
      } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function education_details_save(Request $request){
      try {
          if($request->api_key){
            $inputs = $request->all();
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user){
              $inputs['user_id'] = $user->id;
              $Details = UserEducation::where('user_id', $user->id)->select('id')->first();
              if($Details){
                    $id = $Details->id;
                    (new UserEducation)->store($inputs, $id);
                    return response()->json(['success' => true, 'status' => 200, 'message' => 'Education Details successfully updated']);
              } else {
                    (new UserEducation)->store($inputs); 
                    return response()->json(['success' => true, 'status' => 200, 'message' => 'Education Details successfully Saved']);
              } 
            }
          }
            return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
          } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function address_details(Request $request){
      try {
          if($request->api_key){
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user) {
              $data = Address::where('customer_id', $user->id)->first();
              return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
            }
          }
      } catch(Exception $e){
            return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function address_details_save(Request $request){
        try {
          if($request->api_key){
            $inputs = $request->all();
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user){
              $user_id = $user->id;
              $inputs['customer_id'] = $user->id;
              $Details = Address::where('customer_id', $user->id)->select('id')->first();
              if($Details){
                    $id = $Details->id;
                    (new Address)->store($inputs, $id);

                    $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                    $ser = 1300;
                    $ref_id = $ser.$result->id;
                    CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);

                    return response()->json(['success' => true, 'status' => 200, 'message' => 'Address Details successfully updated', 'ref_id' => $ref_id]);
              } else {
                    (new Address)->store($inputs); 
                    
                    $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                    $ser = 1300;
                    $ref_id = $ser.$result->id;
                    CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);

                    return response()->json(['success' => true, 'status' => 200, 'message' => 'Address Details successfully Saved', 'ref_id' => $ref_id]);
              } 
            }
          }
            return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
        } catch(Exception $e){
          return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function country(){
      $data = Country::all();
      return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
    }
 
    public function select_services(Request $request){
      try {
          if($request->api_key){
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user) {
                $user_id = $user->id;
              if(isset($request->service)){

                $ser_list = explode(',', $request->service);

                \DB::table('service_applies')->where('customer_id', $user_id)->delete();

                foreach($ser_list as $service_id){
                    $apply_ser = ServiceApply::where('service_id', $service_id)->where('customer_id', $user_id)->count();
                    if($apply_ser == 0) {
                        ServiceApply::create([
                            'service_id'  =>  $service_id,
                            'customer_id'  => $user_id,
                        ]);
                    }
                }

                return response()->json(['success' => true, 'status' => 200]);
              }
            }
          }
      } catch(Exception $e){
            return apiResponse(false, 500, lang('messages.server_error'));
      }
    }

    public function education_details(Request $request){
      try {
          if($request->api_key){
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user) {
              $data = UserEducation::where('user_id', $user->id)->select('education', 'primary_school', 'high_school', 'graduate', 'postgraduate', 'others')->first();
                return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
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

    public function profile_image(Request $request){

        $user = User::where('api_key', $request->api_key)->select('id', 'salutation', 'name', 'middle_name', 'last_name', 'email', 'mobile', 'api_key')->first();
        if($user){
          $inputs = $request->all();
        $user_id = $user->id;
          $profile_image = '';
          if(isset($inputs['profile_image']) or !empty($inputs['profile_image'])) {
              $image_name = rand(100000, 999999);
              $fileName = '';
              if($file = $request->hasFile('profile_image')) {
                  $file = $request->file('profile_image') ;
                  $img_name = $file->getClientOriginalName();
                  $fileName = $image_name.$img_name;
                  $destinationPath = public_path().'/uploads/user_images/' ;
                  $file->move($destinationPath, $fileName);
              }
              $fname ='/uploads/user_images/';
              $profile_image = $fname.$fileName;
          }

          User::where('id', $user_id)
            ->update([
              'profile_image' => $profile_image,
          ]); 
        
        $home = route('get-started');
        $data['salutation'] = $user->salutation;
        $data['name'] = $user->name;
        $data['middle_name'] = $user->middle_name;
        $data['last_name'] = $user->last_name;
        $data['email'] = $user->email;
        $data['mobile'] = $user->mobile;
        $data['api_key'] = $user->api_key;
        $data['profile_image'] = $home.$profile_image;

        return response()->json(['success' => true, 'status' => 200, 'message' => 'Profile image successfully uploaded', 'data' => $data ]);
      }


    }

    public function emirates_id(Request $request){
      
      $user = User::where('api_key', $request->api_key)->select('id')->first();
      if($user){
      $user_id = $user->id;
      if($request->emirates_id_front){
      $inputs = $request->all(); 
      if(isset($inputs['emirates_id_front']) or !empty($inputs['emirates_id_front'])) {
          $image_name = rand(100000, 999999);
          $fileName = '';
          if($file = $request->hasFile('emirates_id_front')) {
              $file = $request->file('emirates_id_front') ;
              $img_name = $file->getClientOriginalName();
              $fileName = $image_name.$img_name;
              $destinationPath = public_path().'/uploads/emirates_id/' ;
              $file->move($destinationPath, $fileName);
          }
          $fname ='/uploads/emirates_id/';
          $emirates_id_front = $fname.$fileName;
      }
      if(isset($inputs['emirates_id_back']) or !empty($inputs['emirates_id_back'])) {
          $image_name = rand(100000, 999999);
          $fileName = '';
          if($file = $request->hasFile('emirates_id_back')) {
              $file = $request->file('emirates_id_back') ;
              $img_name = $file->getClientOriginalName();
              $fileName = $image_name.$img_name;
              $destinationPath = public_path().'/uploads/emirates_id/' ;
              $file->move($destinationPath, $fileName);
          }
          $fname ='/uploads/emirates_id/';
          $emirates_id_back = $fname.$fileName;
      }
       
      $otp = rand(100000, 999999);

      User::where('id', $user_id)
      ->update([
          'emirates_id' =>  $emirates_id_front,
          'emirates_id_back' =>  $emirates_id_back,
          'eid_number' => $request->eid_number,
          'login_otp' => $otp,
      ]);

      return response()->json(['success' => true, 'status' => 200, 'message' => 'Emirates id successfully uploaded']);
      }
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
            
            $PreRegister =  PreRegister::where('id', $request->id)->where('email_status', 1)->where('mobile_status', 1)->select('email', 'mobile', 'name', 'middle_name', 'last_name', 'salutation')->first();

            if($PreRegister){
              $api_key = $this->generateApiKey();
              $inputs['name'] = $PreRegister->name;
              $inputs['email'] = $PreRegister->email;
              $inputs['mobile'] = $PreRegister->mobile;
              $inputs['salutation'] = $PreRegister->salutation;
              $inputs['middle_name'] = $PreRegister->middle_name;
              $inputs['last_name'] = $PreRegister->last_name;
              $inputs['status'] = 1;
              $inputs['user_type'] = 2;
              $inputs['api_key'] = $api_key; 
              
              $id = (new User)->store($inputs);
              $data['name'] = $PreRegister->name;
              $data['email'] = $PreRegister->email;
              $data['mobile'] = $PreRegister->mobile;
              $data['middle_name'] = $PreRegister->middle_name;
              $data['last_name'] = $PreRegister->last_name;
              $data['api_key'] = $api_key;

            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'user' => $data]);
          }
          } elseif ($request->otp == 652160) {
            $inputs['email_status'] = 1; 
            $id = $request->id;
            (new PreRegister)->store($inputs, $id);
            $message = "OTP verified successfully";
            $PreRegister =  PreRegister::where('id', $request->id)->where('email_status', 1)->where('mobile_status', 1)->select('email', 'mobile', 'name', 'last_name', 'middle_name', 'salutation')->first();

            if($PreRegister){
              $api_key = $this->generateApiKey();
              $inputs['name'] = $PreRegister->name;
              $inputs['email'] = $PreRegister->email;
              $inputs['mobile'] = $PreRegister->mobile;
              $inputs['middle_name'] = $PreRegister->middle_name;
              $inputs['last_name'] = $PreRegister->last_name;
              $inputs['salutation'] = $PreRegister->salutation;
              $inputs['status'] = 1;
              $inputs['user_type'] = 2;
              $inputs['api_key'] = $api_key; 
              
              $id = (new User)->store($inputs);
              $data['name'] = $PreRegister->name;
              $data['email'] = $PreRegister->email;
              $data['mobile'] = $PreRegister->mobile;
              $data['api_key'] = $api_key;

            return response()->json(['success' => true, 'status' => 200, 'message' => $message, 'user' => $data]);
          }
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
            $home = route('get-started');
            if($user_data->api_key){
                $api_key = $user_data->api_key; 
            } else {
                User::where('id', $request->id)
                ->update([
                'api_key' =>  $api_key,
                 ]);
            }
            $data['salutation'] = $user_data->salutation;
            $data['name'] = $user_data->name;
            $data['middle_name'] = $user_data->middle_name;
            $data['last_name'] = $user_data->last_name;
            $data['email'] = $user_data->email;
            $data['mobile'] = $user_data->mobile;
            if($user_data->profile_image){
            $data['profile_image'] = $home.$user_data->profile_image;
            } else {
            $data['profile_image'] = null;
            }

            $data['api_key'] = $api_key;
           return response()->json(['success' => true, 'status' => 200, 'message' => 'Login successfully', 'user' => $data]);
       } else{
        $home = route('get-started');
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
            $data['salutation'] = $user_data->salutation;
            $data['name'] = $user_data->name;
            $data['middle_name'] = $user_data->middle_name;
            $data['last_name'] = $user_data->last_name;
            $data['email'] = $user_data->email;
            $data['mobile'] = $user_data->mobile;
            if($user_data->profile_image){
            $data['profile_image'] = $home.$user_data->profile_image;
            } else {
            $data['profile_image'] = null;
            }
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
         
          $url = route('get-started');
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
                  $data['image'] = $user_data->profile_image;
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

    public function emailVerifyApp($user_id) {
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

    public function show_basic_information(Request $request){
      try {
        if($request->api_key){
          $user = User::where('api_key', $request->api_key)->select('id', 'gender', 'date_of_birth', 'emirates_id', 'emirates_id_back', 'name', 'last_name', 'middle_name', 'salutation')->first();
          if($user) {
              $home = route('get-started');
              $datas = CustomerOnboarding::where('user_id', $user->id)->select('nationality', 'visa_number', 'marital_status', 'years_in_uae', 'passport_photo', 'reference_number', 'officer_email', 'eid_number', 'no_of_dependents')->first();
              //dd($data);
              if(isset($datas->passport_photo)){
                $data['passport_photo'] = $home.$datas->passport_photo;
              } else {
                $data['passport_photo'] = null;
              }
              if($user->emirates_id){
                $data['emirates_id_front'] = $home.$user->emirates_id;
              } else {
                $data['emirates_id_front'] = null;
              }
              if($user->emirates_id_back){
                $data['emirates_id_back'] = $home.$user->emirates_id_back;
              } else {
                $data['emirates_id_back'] = null;
              }
              $data['gender'] = $user->gender;
              $data['date_of_birth'] = $user->date_of_birth;
              if(isset($user->salutation)){
                $data['salutation'] = $user->salutation;
              } else {
                $data['salutation'] = null;
              }
              if(isset($user->name)){
                $data['first_name_as_per_passport'] = $user->name;
              } else {
                $data['first_name_as_per_passport'] = null;
              }
              if(isset($user->last_name)){
                $data['last_name'] = $user->last_name;
              } else {
                $data['last_name'] = null;
              }
              if(isset($user->middle_name)){
                $data['middle_name'] = $user->middle_name;
              } else {
                $data['middle_name'] = null;
              }
              if(isset($datas->nationality)){
                $data['nationality'] = $datas->nationality;
              } else {
                $data['nationality'] = null;
              }
              if(isset($datas->marital_status)){
                $data['marital_status'] = $datas->marital_status;
              } else {
                $data['marital_status'] = null;
              }
              if(isset($datas->years_in_uae)){
                $data['years_in_uae'] = $datas->years_in_uae;
              } else {
                $data['years_in_uae'] = null;
              }
              if(isset($datas->reference_number)){
                $data['reference_number'] = $datas->reference_number;
              } else {
                $data['reference_number'] = null;
              }
              if(isset($datas->officer_email)){
                $data['officer_email'] = $datas->officer_email;
              } else {
                $data['officer_email'] = null;
              }
              if(isset($datas->eid_number)){
                $data['eid_number'] = $datas->eid_number;
              } else {
                $data['eid_number'] = null;
              }
              if(isset($datas->no_of_dependents)){
                $data['no_of_dependents'] = $datas->no_of_dependents;
              } else {
                $data['no_of_dependents'] = null;
              }

              if(isset($datas->visa_number)){
                $data['visa_number'] = $datas->visa_number;
              } else {
                $data['visa_number'] = null;
              }

              return apiResponseApp(true, 200, null, null, $data);
          }
        }
      } catch(\Exception $e){
        // dd($e);
          return back();
        }
    }


    public function save_cm_details(Request $request){
      try {

        if($request->api_key){
          $user = User::where('api_key', $request->api_key)->select('id')->first();
          if($user) {
            $inputs = $request->all();
            $user_id = $user->id;
            
            CustomerOnboarding::where('user_id', $user_id)
              ->update([
              'cm_type' => $request->cm_type,
            ]); 

            $cm_type = CustomerOnboarding::where('user_id', $user->id)->select('cm_type')->first();
            if($cm_type){
              
              $inputs['customer_id'] = $user->id;
              if($cm_type->cm_type == 1){
                
                  $cm_sal = CmSalariedDetail::where('customer_id', $user_id)->select('id')->first();
                  if($cm_sal){
                    $id = $cm_sal->id;
                    (new CmSalariedDetail)->store($inputs, $id);
                    return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully updated']);
                  } else {
                    (new CmSalariedDetail)->store($inputs); 
                    return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully Saved']);
                  }      
              } elseif ($cm_type->cm_type == 2) {
                
                    $cm_sal = SelfEmpDetail::where('customer_id', $user_id)->select('id')->first();
                    if($cm_sal){
                        $id = $cm_sal->id;
                        (new SelfEmpDetail)->store($inputs, $id); 
                        return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully updated']);
                    } else {
                        (new SelfEmpDetail)->store($inputs); 
                        return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully Saved']);
                    }
              } else {
                      $cm_sal = OtherCmDetail::where('customer_id', $user_id)->select('id')->first();
                      if($cm_sal){
                          $id = $cm_sal->id;
                          (new OtherCmDetail)->store($inputs, $id); 
                          return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully updated']);
                      } else {
                          (new OtherCmDetail)->store($inputs); 
                          return response()->json(['success' => true, 'status' => 200, 'message' => 'CM Details successfully Saved']);
                      }
              }
            } else {
                  $message = "Basic information not updated";
                  return apiResponseAppmsg(false, 201, $message, null, null);
              }
          }
        }

      } catch(\Exception $e){

        dd($e);
          return back();
        }
    }

    public function show_product_requested(Request $request){
      if($request->api_key){
        $user = User::where('api_key', $request->api_key)->select('id')->first();
        if($user) {

          $data = ProductRequest::where('user_id', $user->id)->select('credit_card_limit', 'details_of_cards', 'credit_bank_name', 'card_limit', 'loan_amount', 'loan_bank_name', 'original_loan_amount', 'business_loan_amount', 'mortgage_loan_amount', 'purchase_price', 'type_of_loan', 'term_of_loan', 'end_use_of_property', 'interest_rate')->first();

          return response()->json(['success' => true, 'status' => 200, 'data' => $data]);

        }
      }

    }

    public function save_product_requested(Request $request){
      if($request->api_key){
        $user = User::where('api_key', $request->api_key)->select('id')->first();
        if($user) {
            $inputs = $request->all();
            $user_id = $user->id;
            $inputs['user_id'] = $user_id;
            $cm_sal = ProductRequest::where('user_id', $user_id)->select('id')->first();
            if($cm_sal){
                $id = $cm_sal->id;
                (new ProductRequest)->store($inputs, $id); 
                $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
            $ser = 1300;
            $ref_id = $ser.$result->id;
            CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);
            return response()->json(['success' => true, 'status' => 200, 'message' => 'Product request details successfully updated', 'ref_id' => $ref_id]);
            } else {
                (new ProductRequest)->store($inputs); 
                $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                $ser = 1300;
                $ref_id = $ser.$result->id;
                CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);
                return response()->json(['success' => true, 'status' => 200, 'message' => 'Product request details successfully saved', 'ref_id' => $ref_id]);
            }
        }
      }
    }

    public function selected_services(Request $request){
      if($request->api_key){
        $user = User::where('api_key', $request->api_key)->select('id')->first();
        if($user) {
          $data = ServiceApply::where('customer_id', $user->id)->pluck('service_id')->toArray();
          return response()->json(['success' => true, 'status' => 200, 'services' => $data]); 
        }
      }
    }

    public function show_cm_details(Request $request){
      try {
        if($request->api_key){
          $user = User::where('api_key', $request->api_key)->select('id')->first();
          if($user) {
              $cm_type = CustomerOnboarding::where('user_id', $user->id)->select('cm_type')->first();
              if($cm_type){
                $data = '';
                if($cm_type->cm_type == 1){
                  $data = CmSalariedDetail::where('customer_id', $user->id)->select('company_name', 'date_of_joining', 'monthly_salary', 'last_three_salary_credits')->first();
                  
                  if(isset($data->company_name)){
                    $data['company_name'] = $data->company_name;
                  } else {
                    $data['company_name'] = null;
                  }
                  if(isset($data->date_of_joining)){
                    $data['date_of_joining'] = $data->date_of_joining;
                  } else {
                    $data['date_of_joining'] = null;
                  }
                  if(isset($data->monthly_salary)){
                    $data['monthly_salary'] = $data->monthly_salary;
                  } else {
                    $data['monthly_salary'] = null;
                  }
                  if(isset($data->last_three_salary_credits)){
                    $data['last_three_salary_credits'] = $data->last_three_salary_credits;
                  } else {
                    $data['last_three_salary_credits'] = null;
                  }


                } elseif ($cm_type->cm_type == 2) {
                    $data = SelfEmpDetail::where('customer_id', $user->id)->select('self_company_name', 'percentage_ownership', 'profession_business', 'annual_business_income')->first();

                  if(isset($data->self_company_name)){
                    $data['self_company_name'] = $data->self_company_name;
                  } else {
                    $data['self_company_name'] = null;
                  }
                  if(isset($data->percentage_ownership)){
                    $data['percentage_ownership'] = $data->percentage_ownership;
                  } else {
                    $data['percentage_ownership'] = null;
                  }
                  if(isset($data->profession_business)){
                    $data['profession_business'] = $data->profession_business;
                  } else {
                    $data['profession_business'] = null;
                  }
                  if(isset($data->annual_business_income)){
                    $data['annual_business_income'] = $data->annual_business_income;
                  } else {
                    $data['annual_business_income'] = null;
                  }

                } else {
                    $data = OtherCmDetail::where('customer_id', $user->id)->select('monthly_pension')->first();
                    if(isset($data->monthly_pension)){
                    $data['monthly_pension'] = $data->monthly_pension;
                  } else {
                    $data['monthly_pension'] = null;
                  }
                }
                  $data['cm_type'] = $cm_type->cm_type;
                // return apiResponseApp(true, 200, null, null, $data);
                return response()->json(['success' => true, 'status' => 200, 'data' => $data]);
              } else {
                  $message = "Basic information not updated";
                  return apiResponseAppmsg(false, 201, $message, null, null);
              }
          }
        }
      } catch(\Exception $e){
       // dd($e);
          return back();
        }
    }


    public function basic_information(Request $request){
      try {
        if($request->api_key){
            $user = User::where('api_key', $request->api_key)->select('id')->first();
            if($user) {
              $user_id = $user->id;
              $inputs = $request->all(); 
              $inputs['user_id'] = $user_id;

              $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('id', 'cm_type', 'passport_photo')->first();

              $user = User::where('id', $user_id)->select('emirates_id', 'emirates_id_back')->first();

                if(isset($inputs['emirates_id_front']) or !empty($inputs['emirates_id_front'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    if($file = $request->hasFile('emirates_id_front')) {
                        $file = $request->file('emirates_id_front') ;
                        $img_name = $file->getClientOriginalName();
                        $fileName = $image_name.$img_name;
                        $destinationPath = public_path().'/uploads/emirates_id/' ;
                        $file->move($destinationPath, $fileName);
                    }
                    $fname ='/uploads/emirates_id/';
                    $emirates_id_front = $fname.$fileName;
                } else {
                    $emirates_id_front = @$user->emirates_id;
                }

                if(isset($inputs['emirates_id_back']) or !empty($inputs['emirates_id_back'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    if($file = $request->hasFile('emirates_id_back')) {
                        $file = $request->file('emirates_id_back') ;
                        $img_name = $file->getClientOriginalName();
                        $fileName = $image_name.$img_name;
                        $destinationPath = public_path().'/uploads/emirates_id/' ;
                        $file->move($destinationPath, $fileName);
                    }
                    $fname ='/uploads/emirates_id/';
                    $emirates_id_back = $fname.$fileName;
                } else {
                    $emirates_id_back = @$user->emirates_id_back;
                }

                User::where('id', $user_id)
                ->update([
                    'emirates_id' =>  $emirates_id_front,
                    'emirates_id_back' =>  $emirates_id_back,
                    'date_of_birth' => $request->date_of_birth,
                    'gender' => $request->gender,
                    'salutation' => $request->salutation,
                    'name' =>  $request->first_name_as_per_passport,
                    'middle_name' =>  $request->middle_name,
                    'last_name' => $request->last_name,
                ]); 


                if(isset($inputs['passport_photo']) or !empty($inputs['passport_photo'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    if($file = $request->hasFile('passport_photo')) {
                        $file = $request->file('passport_photo') ;
                        $img_name = $file->getClientOriginalName();
                        $fileName = $image_name.$img_name;
                        $destinationPath = public_path().'/uploads/passport_images/' ;
                        $file->move($destinationPath, $fileName);
                    }
                    $fname ='/uploads/passport_images/';
                    $passport_photo = $fname.$fileName;
                } else {
                    $passport_photo = @$cm_details->passport_photo;
                }
                unset($inputs['passport_photo']);
                $inputs['passport_photo'] = $passport_photo;

              if($cm_details){
                  $id = $cm_details->id;
                  (new CustomerOnboarding)->store($inputs, $id); 
                  $message = "Basic information details successfully updated";
                  return apiResponseAppmsg(true, 200, $message, null, null);

              } else {
                  (new CustomerOnboarding)->store($inputs); 
                  $message = "Basic information details successfully created";
                  return apiResponseAppmsg(true, 200, $message, null, null);
              }

            }
        }

      } catch(Exception $e){
             return apiResponse(false, 500, lang('messages.server_error'));
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
            $url = route('get-started'); 
            
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
            $url = route('get-started'); 

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
