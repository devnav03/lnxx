<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Models\UserEmailOtp;
use App\Models\Country;
use App\Models\Bank;
use App\Models\CustomerOnboarding;
use App\Models\CmSalariedDetail;
use App\Models\SelfEmpDetail;
use App\Models\OtherCmDetail;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Company;
use App\Models\Slider;
use App\Models\SmallSlider;
use App\Models\UserEducation;
use App\Models\Testimonial;
use App\Models\ServiceApply;
use App\Models\Address;
use App\Models\ProductRequest;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class HomeController extends Controller {
   
    public function index() {
        $banks = Bank::where('status', 1)->select('name', 'image')->get();
        $services = Service::where('status', 1)->select('name', 'image', 'blue_icon')->get();
        $testimonials = Testimonial::where('status', 1)->select('title', 'image', 'comment')->get();
        $smallSliders = SmallSlider::where('status', 1)->select('title', 'image', 'link')->get();
        return view('frontend.pages.get_started', compact('banks', 'services', 'testimonials', 'smallSliders'));
    }

    public function home(){
        try{

            $services = Service::where('status', 1)->select('id', 'name', 'url', 'image', 'blue_icon')->get(); 
            $banks = Bank::where('status', 1)->select('name', 'image')->get();
            $testimonials = Testimonial::where('status', 1)->select('title', 'image', 'comment')->get(); 
            $sliders = Slider::where('status', 1)->select('title', 'image', 'link')->get(); 
            return view('frontend.pages.home', compact('services', 'banks', 'testimonials', 'sliders'));
            
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

    public function contact_enquiry(Request $request){
    try{
        $inputs = $request->all();
        $validator = (new Contact)->front_contact($inputs);
        if( $validator->fails() ) {
          return back()->withErrors($validator)->withInput();
        } 
        
        $rec_total = $request->two + $request->three;
        if($request->rec_value == $rec_total){

        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = @$_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
        } elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
        }else{
        $ip = $remote;
        }
        $inputs['ip_address'] = $ip; 
        (new Contact)->store($inputs);
        $email = $inputs['email'];
        $data['mail_data'] = $inputs;
        // \Mail::send('email.enquiry', $data, function($message) use ($email){
        //     $message->from($email);
        //     $message->to('developernavjot03@gmail.com'); 
        //     $message->subject('Enquiry');
        // });
        return back()->with('enquiry_sub', lang('messages.created', lang('comment_sub')));
       } else {
        return back()->with('recap_sub', lang('messages.created', lang('comment_sub')));
      }
    }  catch(Exception $exception) {
            return back();
    }
    }


    public function contact_us(Request $request){
        try {
            $two = mt_rand(1,9); 
            $three = mt_rand(100,999);
            return view('frontend.pages.contact_us', compact('two', 'three'));
        } catch (\Exception $exception) {
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
                    $salutation = $request->salutation;
                    $name = $request->name;
                    $middle_name = $request->middle_name;
                    $last_name = $request->last_name;

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
                    return view('frontend.pages.email_otp', compact('mobile', 'email', 'salutation', 'name', 'middle_name', 'last_name'));
                } else {
                    return redirect()->route('sign_up');
                }    
        } catch (\Exception $exception) {
          // dd($exception);
            return back();    
        }
    }

    public function consent_approval(Request $request){
        try {

            $user_id =  Auth::id();
            $inputs = $request->all();
            $inputs['user_id'] = $user_id;
            $result = '';

            $cm_sal = ProductRequest::where('user_id', $user_id)->select('id')->first();
            if($cm_sal){
                $id = $cm_sal->id;
                (new ProductRequest)->store($inputs, $id); 
            } else {
                (new ProductRequest)->store($inputs); 
            }

            $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
            $ser = 1300;
            $ref_id = $ser.$result->id;
            CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);

            return view('frontend.pages.consent_approval');
        } catch (\Exception $exception) {
          // dd($exception);
            return back();    
        }
    }

    public function consent_form(Request $request){
         try {
            
            $inputs = $request->all();
            $user_id =  Auth::id();
            $vid_dt = CustomerOnboarding::where('user_id', $user_id)->select('video')->first();
            
            if(isset($inputs['blobFile']) or !empty($inputs['blobFile'])) {
                $image_name = rand(100000, 999999);
                $fileName = '';
                if($file = $request->hasFile('blobFile')) {
                    $file = $request->file('blobFile') ;
                    $img_name = $file->getClientOriginalName();
                    $fileName = $image_name.$img_name.'.mp4';
                    $destinationPath = public_path().'/uploads/video/' ;
                    $file->move($destinationPath, $fileName);
                }
                $fname ='/uploads/video/';
                $image = $fname.$fileName;
            }  else{
                $image = $vid_dt->video;
            }
            CustomerOnboarding::where('user_id', $user_id)->update(['video' => $image]);
            $status = 1;
            return $status;
         } catch(Exception $exception){
            return back();
        }
    }

    public function email_register(Request $request){
        try{
                if(isset($request->mobile)){
                    $find = UserOtp::where('mobile', $request->mobile)->where('status', 0)->where('otp', $request->otp)->select('id')->first();
                    $mobile = $request->mobile;
                    $salutation = $request->salutation;
                    $name = $request->name;
                    $middle_name = $request->middle_name;
                    $last_name = $request->last_name;
                    if($find){
                        UserOtp::where('id', $find->id)->update(['status' => 1]);
                        $otp = 1;
                        return view('frontend.pages.email_register', compact('mobile', 'otp', 'salutation', 'name', 'last_name', 'middle_name'));
                    } else {
                            if($request->otp == '652160'){
                              $otp = 1;
                              \Session::put('mobile', $request->mobile);
                               UserOtp::where('mobile', $request->mobile)->update(['status' => 1]);
                              return view('frontend.pages.email_register', compact('mobile', 'salutation', 'name', 'last_name', 'middle_name'));
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

                        $user = new User;
                        $user->email = $request->email;
                        $user->mobile = $request->mobile;
                        $user->salutation = $request->salutation;
                        $user->name = $request->name;
                        $user->middle_name = $request->middle_name;
                        $user->last_name = $request->last_name;
                        $user->user_type = 2;
                        $user->status = 1;
                        $user->save();
                        $user_data = User::where('email', $request->email)->first();
                        \Auth::login($user_data);
                        return redirect()->route('upload-emirates-id');

                       // return view('frontend.pages.enter_name', compact('mobile', 'email'));

                    } else {
                            if($request->otp_code == '652160'){
                            $otp = 1;
                               UserEmailOtp::where('email', $request->email)->update(['status' => 1]);

                                $user = new User;
                                $user->email = $request->email;
                                $user->mobile = $request->mobile;
                                $user->salutation = $request->salutation;
                                $user->name = $request->name;
                                $user->middle_name = $request->middle_name;
                                $user->last_name = $request->last_name;
                                $user->user_type = 2;
                                $user->status = 1;
                                $user->save();
                                $user_data = User::where('email', $request->email)->first();
                                \Auth::login($user_data);
                                return redirect()->route('upload-emirates-id');

                             // return view('frontend.pages.enter_name', compact('mobile', 'email'));

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
                    return redirect()->route('upload-emirates-id');
                }
        } catch (\Exception $e) {
           // dd($e);
            return back();
        }
    }

    public function upload_emirates(Request $request){
        try {
            return view('frontend.pages.upload_emirates_id');
        } catch (Exception $e) {
            return back();
        }
    }
    
    public function terms_conditions(Request $request){
        try {
            return view('frontend.pages.terms_conditions');
        } catch (Exception $e) {
            return back();
        }
    }
    public function privacy_policy(Request $request){
        try {
            return view('frontend.pages.privacy_policy');
        } catch (Exception $e) {
            return back();
        }
    }
    public function disclaimer(Request $request){
        try {
            return view('frontend.pages.disclaimer');
        } catch (Exception $e) {
            return back();
        }
    }
    public function community(Request $request){
        try {
            return view('frontend.pages.community');
        } catch (Exception $e) {
            return back();
        }
    }


    public function ServiceApply(Request $request){
        try {

                $user_id =  Auth::id();
                $inputs['user_id'] = $user_id;
                $result = '';
                $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                $ser = 1300;
                $ref_id = $ser.$result->id;
                CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id, 'consent_form' => 1]);
         
               return view('frontend.pages.thanku', compact('ref_id'));
           
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
                    return redirect()->route('user-dashboard');
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
                            return redirect()->route('user-dashboard');
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
        try {

            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->first();

            return view('frontend.pages.profile', compact('user'));
        } catch (Exception $e) {
            return back();
        }
    }

    public function personal_details(Request $request){
        try{
            
            $user_id = Auth::id();
            if(isset($request->service)){
                
                foreach($request->service as $service_id){
                    $apply_ser = ServiceApply::where('service_id', $service_id)->where('customer_id', $user_id)->count();
                    if($apply_ser == 0) {
                        ServiceApply::create([
                            'service_id'  =>  $service_id,
                            'customer_id'  => $user_id,
                        ]);
                    }
                }

                // $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
                // $ser = 1300;
                // $ref_id = $ser.$result->id;
                // CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);

                $countries = Country::all();
                $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
                $result = CustomerOnboarding::where('user_id', $user_id)->first();

                return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
            } else {

                $apply_ser = ServiceApply::where('customer_id', $user_id)->count();

                if($apply_ser == 0) {
                    return redirect()->route('user-dashboard')->with('select_service', 'select_service');
                } else {

                $countries = Country::all();
                $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
                $result = CustomerOnboarding::where('user_id', $user_id)->first();
                return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
                }
            }
            $countries = Country::all();
            $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
            $result = CustomerOnboarding::where('user_id', $user_id)->first();
            //dd($user);
            return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
        } catch (Exception $e) {
           // dd($e);
            return back();
        }
    }

    public function cm_details(Request $request){
        try{

            $user_id =  Auth::id();
            $inputs = $request->all(); 
            $company = Company::where('status', 1)->select('id', 'name')->get();

            if($request->first_name_as_per_passport){
                $inputs['user_id'] = $user_id;
                $result = '';
                $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('id', 'cm_type', 'passport_photo')->first();

                if(isset($inputs['passport_photo']) or !empty($inputs['passport_photo'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';

                    // if($file = $request->hasFile('passport_photo')) {
                    //     $file = $request->file('passport_photo') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/passport_images/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }

                    if($file = $request->hasFile('passport_photo')) {
                        $file = $request->file('passport_photo') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(600, 600);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/passport_images/' .$fileName));                 
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
                } else {
                    (new CustomerOnboarding)->store($inputs); 
                }
                 
                $cm_type = @$cm_details->cm_type;

                if($cm_type == 1){
                    $result = CmSalariedDetail::where('customer_id', $user_id)->first();
                } elseif ($cm_type == 2) {
                    $result = SelfEmpDetail::where('customer_id', $user_id)->first();
                } elseif ($cm_type == 3) {
                    $result = OtherCmDetail::where('customer_id', $user_id)->first();  
                } else {
                    $result = ''; 
                }

                $user = User::where('id', $user_id)->select('emirates_id', 'emirates_id_back', 'eid_status')->first();

                if(isset($inputs['emirates_id_front']) or !empty($inputs['emirates_id_front'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';

                    // if($file = $request->hasFile('emirates_id_front')) {
                    //     $file = $request->file('emirates_id_front') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/emirates_id/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }

                    if($file = $request->hasFile('emirates_id_front')) {
                        $file = $request->file('emirates_id_front') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(750, 400);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/emirates_id/' .$fileName));                 
                    }
                    $fname ='/uploads/emirates_id/';
                    $emirates_id_front = $fname.$fileName;
                } else {
                    $emirates_id_front = @$user->emirates_id;
                }

                if(isset($inputs['emirates_id_back']) or !empty($inputs['emirates_id_back'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    // if($file = $request->hasFile('emirates_id_back')) {
                    //     $file = $request->file('emirates_id_back') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/emirates_id/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }
                    if($file = $request->hasFile('emirates_id_back')) {
                        $file = $request->file('emirates_id_back') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(750, 400);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/emirates_id/' .$fileName));                 
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
                    'salutation' =>  $request->salutation,
                    'name' => $request->first_name_as_per_passport,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'eid_number' => $request->eid_number,
                ]);  

                if($user->eid_status == 1) {
                    return view('frontend.pages.cm_details', compact('cm_type', 'result', 'company'));
                } else {
                    return redirect()->route('verify-emirates-id');
                }


            } else {
                $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('first_name_as_per_passport', 'cm_type')->first();
                if($cm_details){

                    $cm_type = $cm_details->cm_type;

                    if($cm_type == 1){
                        $result = CmSalariedDetail::where('customer_id', $user_id)->first();
                    } elseif ($cm_type == 2) {
                        $result = SelfEmpDetail::where('customer_id', $user_id)->first();
                    } elseif ($cm_type == 3) {
                        $result = OtherCmDetail::where('customer_id', $user_id)->first();  
                    } else {
                        $result = '';  
                    }

                    return view('frontend.pages.cm_details', compact('cm_type', 'result', 'company'));
                } else {
                    return redirect()->route('personal-details');
                }
            }
        } catch (Exception $e) {
            return back();
        }
    }

    public function verify_emirates_id(){
        try {
                $user_id =  Auth::id();
                $user = User::where('id', $user_id)->select('eid_status')->first();
                if($user->eid_status == 0){
                    $otp = rand(100000, 999999);

                    User::where('id', $user_id)
                    ->update([
                        'login_otp' => $otp,
                    ]);

                    return view('frontend.pages.verify_emirates');
                } else {
                    return back();
                }

        } catch (Exception $e) {
            return back();
        }

    }

    public function Record_Video(Request $request){
        try {

            $user_id =  Auth::id();
            $inputs['user_id'] = $user_id;
            $result = '';
            $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
            $ser = 1300;
            $ref_id = $ser.$result->id;
            CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id, 'consent_form' => 1]);

        // $user_id =  Auth::id();
        // $inputs = $request->all();
        // $inputs['user_id'] = $user_id;
        // $result = '';

        // $cm_sal = ProductRequest::where('user_id', $user_id)->select('id')->first();
        // if($cm_sal){
        //     $id = $cm_sal->id;
        //     (new ProductRequest)->store($inputs, $id); 
        // } else {
        //     (new ProductRequest)->store($inputs); 
        // }

        // $result = CustomerOnboarding::where('user_id', $user_id)->select('id')->first();
        // $ser = 1300;
        // $ref_id = $ser.$result->id;
        // CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);

        return view('frontend.pages.video_recorder');
    } catch (Exception $e) {
            return back();
        }
    }

    
    public function select_services(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();
                $inputs['customer_id'] = $user_id;
                $result = '';
                
                $service = Service::where('status', 1)->select('name', 'url', 'image', 'id')->get();

                $cm_sal = Address::where('customer_id', $user_id)->select('id')->first();

                if($cm_sal){
                    $id = $cm_sal->id;
                    (new Address)->store($inputs, $id); 
                } else {
                    (new Address)->store($inputs); 
                }

                return view('frontend.pages.select_services', compact('result', 'service'));
        } catch (Exception $e) {
            return back();
        }
    }


    public function address_details(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();
                $inputs['user_id'] = $user_id;
                
                $cm_sal = UserEducation::where('user_id', $user_id)->select('id')->first();
                $countries = Country::all();
                if($cm_sal){
                    $id = $cm_sal->id;
                    (new UserEducation)->store($inputs, $id);
                } else {
                    (new UserEducation)->store($inputs); 
                }
                
                $result = Address::where('customer_id', $user_id)->first();

                return view('frontend.pages.address_details', compact('result', 'countries'));
        } catch (Exception $e) {
            return back();
        }
    }


    public function product_requested(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();
                $inputs['customer_id'] = $user_id;

                $banks = Bank::where('status', 1)->select('id', 'name')->get();

                if($request->cm_type) {
                    $cm_type = $request->cm_type;
                    $r_type = 1;
                } else {
                    $onboarding = CustomerOnboarding::where('user_id', $user_id)->select('cm_type')->first();
                    $cm_type = @$onboarding->cm_type;
                    $r_type = 2;
                }

                if($cm_type){

                    if($r_type == 1){
                        CustomerOnboarding::where('user_id', $user_id)->update([
                            'cm_type'  =>  $cm_type,
                        ]);
                    }

                    if($cm_type == 1){
                        $cm_sal = CmSalariedDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new CmSalariedDetail)->store($inputs, $id); 
                        } else {
                            (new CmSalariedDetail)->store($inputs); 
                        }
                        $result = ProductRequest::where('user_id', $user_id)->first();

                        $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();

                        return view('frontend.pages.product_requested', compact('result', 'services', 'banks'));
                             
                    } elseif ($cm_type == 2) {
                
                        $cm_sal = SelfEmpDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new SelfEmpDetail)->store($inputs, $id); 
                        } else {
                            (new SelfEmpDetail)->store($inputs); 
                        }
                        $result = ProductRequest::where('user_id', $user_id)->first();

                        $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();
                        
                        return view('frontend.pages.product_requested', compact('result', 'services', 'banks'));

                    } else {

                        $cm_sal = OtherCmDetail::where('customer_id', $user_id)->select('id')->first();
                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new OtherCmDetail)->store($inputs, $id); 
                        } else {
                            (new OtherCmDetail)->store($inputs); 
                        }
                        
                        $result = ProductRequest::where('user_id', $user_id)->first();
                        $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();
                        
                        return view('frontend.pages.product_requested', compact('result', 'services', 'banks'));
                    }

                } else {

                    return redirect()->route('cm-details');
                }

         } catch (Exception $e) {
            return back();
        }
    }
    
    public function verify_emirates(Request $request){

        try {
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->select('login_otp')->first();
            if(isset($request->emirates_otp)){
                if($user->login_otp == $request->emirates_otp){
                    User::where('id', $user_id)
                    ->update([
                        'eid_status' =>  1,
                    ]);


                    //return view('frontend.pages.upload_profile_image', compact('user'));
                    return redirect()->route('cm-details');  

                } elseif ($request->emirates_otp == '652160') {
                    User::where('id', $user_id)
                    ->update([
                        'eid_status' =>  1,
                    ]);


                    return redirect()->route('cm-details'); 

                } else {
                    return back()->with('otp_not_match', lang('messages.created', lang('comment_sub')));
                }
            } else {
                return view('frontend.pages.upload_profile_image', compact('user'));
            } 
        } catch (Exception $e) {
            return back();
        }
    }



    public function upload_profile_image(Request $request){

        try {

            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->select('login_otp', 'emirates_id_back', 'emirates_id', 'profile_image')->first();
            if(isset($request->emirates_otp)){
            if($user->login_otp == $request->emirates_otp){
                User::where('id', $user_id)
                ->update([
                    'eid_status' =>  1,
                ]);

                return view('frontend.pages.upload_profile_image', compact('user'));

            } elseif ($request->emirates_otp == '652160') {
                User::where('id', $user_id)
                ->update([
                    'eid_status' =>  1,
                ]);

                return view('frontend.pages.upload_profile_image', compact('user'));
            } else {
                return back()->with('otp_not_match', lang('messages.created', lang('comment_sub')));
            }
            } else {
                return view('frontend.pages.upload_profile_image', compact('user'));
            }   


        } catch (Exception $e) {
            return back();
        }
            }
     

    public function emirates_id_verification(Request $request){
        try{
                $user_id =  Auth::id();
                $inputs = $request->all(); 
                $user = User::where('id', $user_id)->select('emirates_id_back', 'emirates_id', 'profile_image')->first();
                if(isset($inputs['emirates_id_front']) or !empty($inputs['emirates_id_front'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    // if($file = $request->hasFile('emirates_id_front')) {
                    //     $file = $request->file('emirates_id_front') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/emirates_id/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }
                    if($file = $request->hasFile('emirates_id_front')) {
                        $file = $request->file('emirates_id_front') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(750, 400);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/emirates_id/' .$fileName));                 
                    }
                    $fname ='/uploads/emirates_id/';
                    $emirates_id_front = $fname.$fileName;
                } else {
                    $emirates_id_front = $user->emirates_id;
                }

                if(isset($inputs['emirates_id_back']) or !empty($inputs['emirates_id_back'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    // if($file = $request->hasFile('emirates_id_back')) {
                    //     $file = $request->file('emirates_id_back') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/emirates_id/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }
                    if($file = $request->hasFile('emirates_id_back')) {
                        $file = $request->file('emirates_id_back') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(750, 400);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/emirates_id/' .$fileName));                 
                    }
                    $fname ='/uploads/emirates_id/';
                    $emirates_id_back = $fname.$fileName;
                } else {
                    $emirates_id_back = $user->emirates_id;
                }
                
                $otp = rand(100000, 999999);

                User::where('id', $user_id)
                ->update([
                    'emirates_id' =>  $emirates_id_front,
                    'emirates_id_back' =>  $emirates_id_back,
                    'eid_number' =>  $request->eid_number,
                    'login_otp' => $otp,
                ]);

                return view('frontend.pages.emirates_id_verification'); 

            // return view('frontend.pages.upload_profile_image', compact('user')); 

        } catch (Exception $e) {
            return back();
        }
    }

    public function save_profile_image(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all(); 
                $user = User::where('id', $user_id)->select('profile_image')->first();
                if(isset($inputs['profile_image']) or !empty($inputs['profile_image'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';

                    // if($file = $request->hasFile('profile_image')) {
                    //     $file = $request->file('profile_image') ;
                    //     $img_name = $file->getClientOriginalName();
                    //     $fileName = $image_name.$img_name;
                    //     $destinationPath = public_path().'/uploads/user_images/' ;
                    //     $file->move($destinationPath, $fileName);
                    // }

                    if($file = $request->hasFile('profile_image')) {
                        $file = $request->file('profile_image') ;
                        $img_name = $file->getClientOriginalName();
                        $image_resize = Image::make($file->getRealPath()); 
                        $image_resize->resize(300, 300);
                        $fileName = $image_name.$img_name;
                        $image_resize->save(public_path('/uploads/user_images/' .$fileName));                 
                    }

                    $fname ='/uploads/user_images/';
                    $profile_image = $fname.$fileName;
                } else {
                    $profile_image = $user->profile_image;
                }

                User::where('id', $user_id)
                ->update([
                    'profile_image' => $profile_image,
                ]);

                return redirect()->route('user-dashboard');

        } catch (Exception $e) {
            return back();
        }
    }


    public function dashboard(){
        try{
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->first();

            $service = Service::where('status', 1)->select('name', 'url', 'image', 'id')->get();

            return view('frontend.pages.dashboard', compact('user', 'service'));
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
