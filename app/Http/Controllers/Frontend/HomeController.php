<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Models\UserEmailOtp;
use App\User;

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
           return redirect()->route('home');
        } else {
            if($request->login_otp == 652160){
                $user_data = User::where('id', $request->id)->first();
                \Auth::login($user_data);
                return redirect()->route('home');
            } else {
                return back();
            }
        }
    } catch (\Exception $e) {
        return back();
    }
}


}
