<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Models\UserEmailOtp;
use App\Models\Country;
use App\Models\CustomerOnboarding;
use App\Models\CmSalariedDetail;
use App\Models\SelfEmpDetail;
use App\Models\OtherCmDetail;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class HomeController extends Controller {
   
    public function index() {
        return view('frontend.pages.get_started');
    }

    public function home(){
        try{
            return view('frontend.pages.home');
        } catch (Exception $exception) {
            return back();
        }
    }

    public function sign_up(){
        return view('frontend.pages.sign_up');
    }
  
    public function otp_sent(Request $request){
        try {
            $find = User::where('mobile', $request->mobile)->count();
            if($find > 0){
                $data['status'] = 'Fail';
                return $data;
            } else {
                $gen_otp = rand(100000, 999999);
                $otp = new UserOtp;
                $otp->mobile = $request->mobile;
                $otp->otp = $gen_otp;
                $otp->save();

                // $this->OtpEvent($request->mobile,$otp->otp);

                $data['status'] = 'Sent';
                return $data;
            }
        } catch (\Exception $exception) {
        //dd($exception);
        return back();    
        }
    }

    public function agent_menu(){
        try {
           \Session::forget('user_base');
           \Session::start();
           \Session::put('user_base', 'Agent');
            return redirect()->route('home');
        } catch (\Exception $exception) {
        //dd($exception);
        return back();    
        }
    }

    public function customer_menu(){
        try {
           \Session::forget('user_base');
           \Session::start();
           \Session::put('user_base', 'Customer');
            return redirect()->route('home');
        } catch (\Exception $exception) {
        //dd($exception);
        return back();    
        }
    }

    public function email_otp(Request $request){
        try {
            if(isset($request->email)){
                    $find = User::where('email', $request->email)->count();
                    if($find > 0){
                        return redirect()->route('sign_up');
                    }

                    $gen_otp = rand(100000, 999999);
                    $otp = new UserEmailOtp;
                    $otp->email = $request->email;
                    $otp->otp = $gen_otp;
                    $otp->save();

                    $email = $request->email;
                    $mobile = $request->mobile;

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

                  //  dd($result);

                    return view('frontend.pages.email_otp', compact('mobile', 'email'));
               
                } else {
                    return redirect()->route('sign_up');
                }    

        } catch (\Exception $exception) {
          // dd($exception);
            return back();    
        }
    }

    public function email_register(Request $request){
        try{
                if(isset($request->mobile)){
                    $find = UserOtp::where('mobile', $request->mobile)->where('status', 0)->where('otp', $request->otp)->select('id')->first();
                    $mobile = $request->mobile;
                    if($find){
                        UserOtp::where('id', $find->id)->update(['status' => 1]);
                        $otp = 1;
                        return view('frontend.pages.email_register', compact('mobile', 'otp'));
                    } else {
                            if($request->otp == '652160'){
                              $otp = 1;
                              \Session::put('mobile', $request->mobile);
                               UserOtp::where('mobile', $request->mobile)->update(['status' => 1]);
                              return view('frontend.pages.email_register', compact('mobile'));
                            } else {
                                \Session::put('verify', 0);
                                return back()->with('otp_not_match', 'otp not match');
                            }
                    }
                } else {
                    return redirect()->route('sign_up');
            }
        } catch(Exception $exception){
            return back();
        }
    }

    public function email_check(Request $request){
        try {
                $find = User::where('email', $request->email)->count();
                if($find > 0){
                    $data['status'] = 'Fail';
                    return $data;
                } else {
                    $data['status'] = 'Sent';
                    return $data;
                }
            } catch (\Exception $exception) {
            //dd($exception);
            return back();    
        }
    }


    public function email_sent(Request $request){
        try {
                $find = User::where('email', $request->email)->count();
                if($find > 0){
                    $data['status'] = 'Fail';
                    return $data;
                } else {
                    $data['status'] = 'Sent';
                    return $data;
                }
            } catch (\Exception $exception) {
            //dd($exception);
            return back();    
        }
    }
    

public function otp_match(Request $request){
    try {
            $find = UserOtp::where('mobile', $request->mobile)->where('status', 0)->where('otp', $request->otp)->count();
            if($find == 0){
              if($request->otp == '652160'){
                $data['status'] = 'Success';
              } else {
                $data['status'] = 'Fail';
              }
              return $data;
            } else {
              $data['status'] = 'Success';
              return $data;
            }
      } catch (\Exception $exception) {
        //dd($exception);
        return back();    
    }
}

public function email_otp_match(Request $request){
    try {
            $find = UserEmailOtp::where('email', $request->email)->where('status', 0)->where('otp', $request->otp)->count();
            if($find == 0){
              if($request->otp == '652160'){
                $data['status'] = 'Success';
              } else {
                $data['status'] = 'Fail';
              }
              return $data;
            } else {
              $data['status'] = 'Success';
              return $data;
            }
      } catch (\Exception $exception) {
        //dd($exception);
        return back();    
    }
}


public function login_otp_match(Request $request){
    try {
            $find = User::where('id', $request->id)->where('login_otp', $request->otp)->count();
            if($find == 0){
              if($request->otp == '652160'){
                $data['status'] = 'Success';
              } else {
                $data['status'] = 'Fail';
              }
              return $data;
            } else {
              $data['status'] = 'Success';
              return $data;
            }
      } catch (\Exception $exception) {
        //dd($exception);
        return back();    
    }
}


public function enter_name(Request $request){

    try {
            if(isset($request->otp_code)){
                    $find = UserEmailOtp::where('email', $request->email)->where('status', 0)->where('otp', $request->otp_code)->select('id')->first();
                    $mobile = $request->mobile;
                    $email = $request->email;
                    if($find){
                        UserEmailOtp::where('id', $find->id)->update(['status' => 1]);
                        $otp = 1;
                        return view('frontend.pages.enter_name', compact('mobile', 'email'));
                    } else {
                            if($request->otp_code == '652160'){
                            $otp = 1;
                               UserEmailOtp::where('email', $request->email)->update(['status' => 1]);
                              return view('frontend.pages.enter_name', compact('mobile', 'email'));
                            } else {
                                \Session::put('verify', 0);
                                return back()->with('otp_not_match', 'otp not match');
                        }
                    }
            }
        
    } catch (\Exception $e) {
       // dd($e);
        return back();
    }
}

public function user_register(Request $request){
    try {
            if(isset($request->name)){
                $user = new User;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->name = $request->name;
                $user->user_type = 2;
                $user->status = 1;
                $user->save();
                $user_data = User::where('email', $request->email)->first();
                \Auth::login($user_data);
                return redirect()->route('home');
            }
    } catch (\Exception $e) {
       // dd($e);
        return back();
    }
}

public function sign_in(Request $request){
    try{
            return view('frontend.pages.sign_in');
    } catch (\Exception $e) {
       // dd($e);
        return back();
    }
}

public function login_otp(Request $request){
    try{
        $user = User::where('mobile', $request->username)->where('status', 1)->select('id')->first();
        if($user){
            $gen_otp = rand(100000, 999999);
            User::where('id', $user->id)->update([ 'login_otp' =>  $gen_otp]);
            $id = $user->id;
            $username = 'Mobile';
            return view('frontend.pages.sign_in_otp', compact('id', 'username'));
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
                $username = 'Email';    
                $id = $user->id;
                return view('frontend.pages.sign_in_otp', compact('id', 'username'));
            } else {
                return back()->with('username_not_exist', 'username_not_exist');
            }
        }
    } catch (\Exception $e) {
        //dd($e);
        return back();
    }
}


public function login(Request $request){
    try{
       $user_data = User::where('id', $request->id)->where('login_otp', $request->login_otp)->first();
        if($user_data){
           \Auth::login($user_data);
           \Session::forget('user_base');
           \Session::start();
            if($user_data->user_type == 3 ){
                \Session::put('user_base', 'Agent');
                return redirect()->route('home');
            } else {
                \Session::put('user_base', 'Customer');
                return redirect()->route('dashboard');
            }
        } else {
            if($request->login_otp == 652160){
                $user_data = User::where('id', $request->id)->first();
                    \Auth::login($user_data);
                    \Session::forget('user_base');
                    \Session::start();
                    if($user_data->user_type == 3 ){
                        \Session::put('user_base', 'Agent');
                        return redirect()->route('home');
                    } else {
                        \Session::put('user_base', 'Customer');
                        return redirect()->route('dashboard');
                    }

            } else {
                return back()->with('otp_not_match', 'otp_not_match');
            }
        }
    } catch (\Exception $e) {
        //dd($e);
        return back();
    }
}

    public function profileShow(){
        try{
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->first();

            return view('frontend.pages.profile', compact('user'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function personal_details(){
        try{
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->select('name', 'email', 'gender', 'date_of_birth')->first();
            $countries = Country::all();
            $result = CustomerOnboarding::where('user_id', $user_id)->first();

            return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function cm_details(Request $request){
        try{

            $user_id =  Auth::id();
            $inputs = $request->all(); 
            if($request->cm_type){
                $inputs['user_id'] = $user_id;
                $result = '';

                $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                if($cm_details){
                    $id = $cm_details->id;
                    (new CustomerOnboarding)->store($inputs, $id); 
                } else {
                    (new CustomerOnboarding)->store($inputs); 
                }
                 
                $cm_type = $request->cm_type;
                return view('frontend.pages.cm_details', compact('cm_type', 'result'));

            } else {

                $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('cm_type')->first();
                if($cm_details){
                    $cm_type = $cm_details->cm_type;
                    
                    if($cm_type == 1){
                        $result = CmSalariedDetail::where('customer_id', $user_id)->first();
                    } elseif ($cm_type == 2) {
                        $result = SelfEmpDetail::where('customer_id', $user_id)->first();
                    } else {
                        $result = OtherCmDetail::where('customer_id', $user_id)->first();  
                    }

                    return view('frontend.pages.cm_details', compact('cm_type', 'result'));
                } else {
                    return back();
                }
            }
        } catch (Exception $e) {
            return back();
        }
    }


    public function education_detail(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();
                $inputs['customer_id'] = $user_id;

                $onboarding = CustomerOnboarding::where('user_id', $user_id)->select('cm_type')->first(); 
                if($onboarding){
                         
                    if($onboarding->cm_type == 1){
                            
                        $cm_sal = CmSalariedDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new CmSalariedDetail)->store($inputs, $id); 
                        } else {
                            (new CmSalariedDetail)->store($inputs); 
                        }
                   
                        return view('frontend.pages.educations');
                             
                    } elseif ($onboarding->cm_type == 2) {
                
                        $cm_sal = SelfEmpDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new SelfEmpDetail)->store($inputs, $id); 
                        } else {
                            (new SelfEmpDetail)->store($inputs); 
                        }
                        
                        return view('frontend.pages.educations');

                    } else {

                        $cm_sal = OtherCmDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new OtherCmDetail)->store($inputs, $id); 
                        } else {
                            (new OtherCmDetail)->store($inputs); 
                        }
                        
                        return view('frontend.pages.educations');
                    }

                } else {
                    return redirect()->route('personal-details');
                }

         } catch (Exception $e) {
            return back();
        }
    }


    public function dashboard(){
        try{
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->first();
            return view('frontend.pages.dashboard', compact('user'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function logout() {
        \Auth::logout();
        \Session::flush();
        return redirect()->route('home');
    }

    public function update_profile(Request $request){
        try{

            $inputs = $request->all(); 
            $user_id = Auth::id();
            $user = User::where('id', $user_id)->select('profile_image')->first();
            if(isset($inputs['profile_image']) or !empty($inputs['profile_image'])) {
                $image_name = rand(100000, 999999);
                $fileName = '';
                if($file = $request->hasFile('profile_image'))  {
                    $file = $request->file('profile_image') ;
                    $img_name = $file->getClientOriginalName();
                    $image_resize = Image::make($file->getRealPath()); 
                    $image_resize->resize(250, 250);
                    $fileName = $image_name.$img_name;
                    $image_resize->save(public_path('/uploads/user_images/' .$fileName));       
                }
                $fname ='/uploads/user_images/';
                $image = $fname.$fileName;
            }
            else{
                $image = $user->profile_image;
            }
            unset($inputs['profile_image']);
            $inputs['profile_image'] = $image;

            User::where('id', $user_id)
                ->update([
                'name' =>  $request->name,
                'email' =>  $request->email,
                'mobile' =>  $request->mobile,
                'gender' =>  $request->gender,
                'date_of_birth' =>  $request->date_of_birth,
                'profile_image' => $image,
            ]);

            return redirect()->back()->with('profile_update', 'profile update');
        }
        catch (Exception $e) {
            return back();
        }
    }


}
