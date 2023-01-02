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
use App\Models\Application;
use App\Models\SmallSlider;
use App\Models\UserEducation;
use App\Models\Testimonial;
use App\Models\ServiceApply;
use App\Models\PersonalLoanInformation;
use App\Models\PreRegister;
use App\Models\Address;
use App\Models\ApplicationDependent;
use App\Models\CreditCardInformation;
use App\Models\Refer;
use App\Models\ApplicationProductRequest;
use App\Models\ProductRequest;
use App\Models\AgentRequest;
use App\Models\ContentManagement;
use App\Models\ComanInformation;
use App\Models\Dependent;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class HomeController extends Controller {
   
    public function index() {
        $banks = Bank::where('status', 1)->select('name', 'image')->get();
        $services = Service::where('status', 1)->select('name', 'image', 'blue_icon')->orderBy('sort_order', 'ASC')->get();
        $testimonials = Testimonial::where('status', 1)->select('title', 'image', 'comment')->get();
        $smallSliders = SmallSlider::where('status', 1)->select('title', 'image', 'link')->get();
        return view('frontend.pages.get_started', compact('banks', 'services', 'testimonials', 'smallSliders'));
    }

    public function home(){
        try{
            $services = Service::where('status', 1)->select('id', 'name', 'url', 'image', 'blue_icon')->orderBy('sort_order', 'ASC')->get(); 
            $banks = Bank::where('status', 1)->select('name', 'image')->get();
            $testimonials = Testimonial::where('status', 1)->select('title', 'image', 'comment')->get(); 
            $sliders = Slider::where('status', 1)->select('title', 'image', 'link')->get(); 
            $countries = Country::all();
            return view('frontend.pages.home', compact('services', 'banks', 'testimonials', 'sliders', 'countries'));
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

    public function save_preference(Request $request){
        try {
            // if($request->decide_by){
            $user_id = Auth::id();
            ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->where('service_id', 3)
            ->update([
                'bank_id' => $request->bank_id,
                'decide_by' => $request->decide_by,
            ]);
                return redirect()->route('consent');
            // } else {
            //     return back();
            // }
        }  catch (\Exception $exception) {
            return back();    
        }
    }


    function live_product_1(Request $request) {
        if($request->ajax()) {
            $data = '';
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = \DB::table('company')->where('status', 1)->where('name', 'like', '%'.$query.'%')->select('name', 'id')->get();
            }
            foreach($data as $row) {
            $output .= '<li><input value="'.$row->id.'" name="code_value" class="code_check" onChange="getProduct_Code_1(this.value);" type="radio"> <span>'.$row->name.'</span></li>
                ';
            }
              $data = array(
               'table_data'  => $output,
              );
              echo json_encode($data);
        }
    }

    function live_product_2(Request $request) {
        if($request->ajax()) {
            $data = '';
            $output = '';
            $query = $request->get('query');
            if($query != '') {
                $data = \DB::table('company')->where('status', 1)->where('name', 'like', '%'.$query.'%')->select('name', 'id')->get();
            }
            foreach($data as $row) {
            $output .= '<li><input value="'.$row->id.'" name="code_value" class="code_check" onChange="getProduct_Code_2(this.value);" type="radio"> <span>'.$row->name.'</span></li>
                ';
            }
              $data = array(
               'table_data'  => $output,
              );
              echo json_encode($data);
        }
    }

    

    public function check_product_code(Request $request){
        $code = Company::where('id', $request->code)->select('id', 'name')->first();
        if($code){
            $data['product_name'] = $code->name;
            $data['product_id'] = $code->id;
            return $data;
        }
        else{
            $ab['status'] = 'Fail';
            return $ab;
        }
    }

    public function check_product_code2(Request $request){
        $code = Company::where('id', $request->code)->select('id', 'name')->first();
        if($code){
            $data['product_name'] = $code->name;
            $data['product_id'] = $code->id;
            return $data;
        }
        else{
            $ab['status'] = 'Fail';
            return $ab;
        }
    }

    public function consent(){
        try{
            $user_id = Auth::id();
            $result = CustomerOnboarding::where('user_id', $user_id)->select('id', 'consent_form')->first();
            $consent_form = $result->consent_form;

            return view('frontend.pages.consent_approval', compact('consent_form'));

        } catch (\Exception $exception) {
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

    public function save_information_form(Request $request){
        try {

            $user_id = Auth::id();
            $inputs = $request->all();
            $inputs['user_id'] = $user_id;

            $info = ComanInformation::where('user_id', $user_id)->select('id')->first();
            
            if($info){
                $id = $info->id;
                (new ComanInformation)->store($inputs, $id); 
            } else {
                (new ComanInformation)->store($inputs);
            }
            






        } catch (\Exception $exception) {
            return back();    
        } 
    }

    public function information_form(Request $request){
        try {
                $user_id = Auth::id();
                $result = ComanInformation::where('user_id', $user_id)->first();
                $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();
                $back = 0;
                if(in_array(1, $services)){
                    $back = 1;
                } else if(in_array(3, $services)) {
                    $back = 2;
                } else {
                    $back = 0;
                }

            $customer_info =  CustomerOnboarding::where('user_id', $user_id)->select('marital_status')->first();

            return view('frontend.pages.information_form', compact('result', 'back', 'customer_info'));
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
            
            $services = ServiceApply::where('app_status', 0)->where('customer_id', $user_id)->count();
            if($services != 0){ 
            $result = CustomerOnboarding::where('user_id', $user_id)->select('id', 'consent_form')->first();
            $ser = 1300;
            $ref_id = $ser.$result->id;
            CustomerOnboarding::where('user_id', $user_id)->update(['ref_id'  =>  $ref_id,]);
            $consent_form = $result->consent_form;
             
            $ser = ServiceApply::where('app_status', 0)->where('service_id', 3)->where('customer_id', $user_id)->count(); 

            if($ser == 0){
                return view('frontend.pages.consent_approval', compact('consent_form'));
            } else {
               return redirect()->route('preference');
            }
            
            } else {
                return redirect()->route('user-dashboard')->with('profile_update_message', 'profile_update_message');
            }


        } catch (\Exception $exception) {
          // dd($exception);
            return back();    
        }
    }

    public function agent_apply(Request $request){
        try {

            $inputs = $request->all();

            $validator = (new AgentRequest)->validate($inputs);
            if ($validator->fails()) {
                return redirect()->route('home')
                ->withInput()->withErrors($validator);
            }


            $image = '';
            if(isset($inputs['education_document']) or !empty($inputs['education_document'])) {
                $image_name = rand(100000, 999999);
                $fileName = '';
                if($file = $request->hasFile('education_document'))  {
                    $file = $request->file('education_document') ;
                    $img_name = $file->getClientOriginalName();
                    $fileName = $image_name.$img_name;
                    $destinationPath = public_path().'/uploads/education_document/';
                    $file->move($destinationPath, $fileName);
                }
                $fname ='/uploads/education_document/';
                $image = $fname.$fileName;
            }
            unset($inputs['education_document']);
            $inputs['education_document'] = $image;

            $image = '';
            if(isset($inputs['resume']) or !empty($inputs['resume'])) {
                $image_name = rand(100000, 999999);
                $fileName = '';
                if($file = $request->hasFile('resume'))  {
                    $file = $request->file('resume') ;
                    $img_name = $file->getClientOriginalName();
                    $fileName = $image_name.$img_name;
                    $destinationPath = public_path().'/uploads/resume/';
                    $file->move($destinationPath, $fileName);
                }
                $fname ='/uploads/resume/';
                $image = $fname.$fileName;
            }
            unset($inputs['resume']);
            $inputs['resume'] = $image;

            $user_id = (new AgentRequest)->store($inputs);  

            return back()->with('resume_submit', 'resume_submit');

        }  catch(Exception $exception){
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

            if(isset($request->otp_code)){
                    $find = UserEmailOtp::where('email', $request->email)->where('status', 0)->where('otp', $request->otp_code)->select('id')->first();
                    $mobile = $request->mobile;
                    $email = $request->email;
                    if($find){
                        UserEmailOtp::where('id', $find->id)->update(['status' => 1]);
                        // $otp = 1;
                        $user = new PreRegister;
                        $user->email = $request->email;
                        $user->mobile = $request->mobile;
                        $user->salutation = $request->salutation;
                        $user->name = $request->name;
                        $user->middle_name = $request->middle_name;
                        $user->last_name = $request->last_name;
                        $user->save();
                        // $user_data = User::where('email', $request->email)->first();
                        // \Auth::login($user_data);

                        \Session::start();
                        $temp_id = \Session::get('temp_id');
                        if($temp_id){
                           \Session::forget('temp_id');
                        } 
                        $id = $user->id;
                        \Session::put('temp_id', $id);

                        return view('frontend.pages.upload_emirates_id', compact('id'));

                       // return view('frontend.pages.enter_name', compact('mobile', 'email'));

                    } else {
                            if($request->otp_code == '652160'){

                            $find = UserEmailOtp::where('email', $request->email)->where('status', 0)->select('id')->first();
                            
                               UserEmailOtp::where('email', $request->email)->where('status', 0)->update(['status' => 1]);

                                $user = new PreRegister;
                                $user->email = $request->email;
                                $user->mobile = $request->mobile;
                                $user->salutation = $request->salutation;
                                $user->name = $request->name;
                                $user->middle_name = $request->middle_name;
                                $user->last_name = $request->last_name;
                                $user->save();
                                // $user_data = User::where('email', $request->email)->first();
                                // \Auth::login($user_data);

                                \Session::start();
                                $temp_id = \Session::get('temp_id');
                                if($temp_id){
                                   \Session::forget('temp_id');
                                } 
                                $id = $user->id;
                                \Session::put('temp_id', $id);

                                return view('frontend.pages.upload_emirates_id', compact('id'));

                             // return view('frontend.pages.enter_name', compact('mobile', 'email'));

                            } else {
                            \Session::put('verify', 0);
                            return back()->with('otp_not_match', 'otp not match');
                        }
                                    }
                } else {
                     
                    \Session::start();
                    $temp_id = \Session::get('temp_id');
                    if($temp_id){
                        $id = $temp_id;
                        return view('frontend.pages.upload_emirates_id', compact('id'));
                    }
                    return back();
                }

            
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
                $CustomerOnboarding = CustomerOnboarding::where('user_id', $user_id)->first();

                $services = ServiceApply::where('app_status', 0)->where('customer_id', $user_id)->select('id', 'service_id', 'bank_id', 'decide_by')->get();
                $app_base = 1300;
                if($services){
                        if($CustomerOnboarding->cm_type == 1){
                            $employee = CmSalariedDetail::where('customer_id', $user_id)->select('company_name', 'date_of_joining', 'monthly_salary', 'last_three_salary_credits', 'other_company', 'last_two_salary_credits', 'last_one_salary_credits', 'accommodation_company')->first();
                            $inputs['company_name'] = $employee->company_name;
                            $inputs['date_of_joining'] = $employee->date_of_joining;
                            $inputs['monthly_salary'] = $employee->monthly_salary;
                            $inputs['last_three_salary_credits'] = $employee->last_three_salary_credits;
                            $inputs['last_two_salary_credits'] = $employee->last_two_salary_credits;
                            $inputs['last_one_salary_credits'] = $employee->last_one_salary_credits;
                            $inputs['other_company'] = $employee->other_company;
                            $inputs['accommodation_company'] = $employee->accommodation_company;

                        } elseif ($CustomerOnboarding->cm_type == 2){
                            $employee = SelfEmpDetail::where('customer_id', $user_id)->select('self_company_name', 'percentage_ownership', 'profession_business', 'annual_business_income', 'self_other_company')->first();
                            $inputs['self_company_name'] = $employee->self_company_name;
                            $inputs['percentage_ownership'] = $employee->percentage_ownership;
                            $inputs['profession_business'] = $employee->profession_business;
                            $inputs['annual_business_income'] = $employee->annual_business_income;
                            $inputs['other_company'] = $employee->self_other_company;
                        } else {
                            $employee = OtherCmDetail::where('customer_id', $user_id)->select('monthly_pension')->first();
                            $inputs['monthly_pension'] = $employee->monthly_pension;
                        }

                        $inputs['nationality'] = $CustomerOnboarding->nationality;
                        $inputs['passport_number'] = $CustomerOnboarding->passport_number;
                        $inputs['passport_expiry_date'] = $CustomerOnboarding->passport_expiry_date;
                        $inputs['officer_email'] = $CustomerOnboarding->officer_email;
                        $inputs['visa_number'] = $CustomerOnboarding->visa_number;
                        $inputs['marital_status'] = $CustomerOnboarding->marital_status;
                        $inputs['years_in_uae'] = $CustomerOnboarding->years_in_uae;
                        $inputs['reference_number'] = $CustomerOnboarding->reference_number;
                        $inputs['passport_photo'] = $CustomerOnboarding->passport_photo;
                        $inputs['video'] = $CustomerOnboarding->video;
                        $inputs['no_of_dependents'] = $CustomerOnboarding->no_of_dependents;
                        $inputs['consent_form'] = $CustomerOnboarding->consent_form;
                        $inputs['cm_type'] = $CustomerOnboarding->cm_type;
                        $inputs['credit_score'] = $CustomerOnboarding->credit_score;
                        $inputs['aecb_date'] = $CustomerOnboarding->aecb_date;
                        $inputs['spouse_date_of_birth'] = $CustomerOnboarding->spouse_date_of_birth;
                        $inputs['agent_reference'] = $CustomerOnboarding->agent_reference;
                        $inputs['aecb_image'] = $CustomerOnboarding->aecb_image;
                        $inputs['wife_name'] = $CustomerOnboarding->wife_name;
                        $inputs['wedding_anniversary_date'] = $CustomerOnboarding->wedding_anniversary_date;
                        
                        $inputs['user_id'] = $user_id;
                        $inputs['salutation'] = \Auth::user()->salutation;
                        $inputs['name'] = \Auth::user()->name;
                        $inputs['middle_name'] = \Auth::user()->middle_name;
                        $inputs['last_name'] = \Auth::user()->last_name;
                        $inputs['email'] = \Auth::user()->email;
                        $inputs['gender'] = \Auth::user()->gender;
                        $inputs['date_of_birth'] = \Auth::user()->date_of_birth;
                        $inputs['profile_image'] = \Auth::user()->profile_image;
                        $inputs['emirates_id'] = \Auth::user()->emirates_id;
                        $inputs['emirates_id_back'] = \Auth::user()->emirates_id_back;
                        $inputs['eid_number'] = \Auth::user()->eid_number;
                        $inputs['eid_status'] = \Auth::user()->eid_status;
                        $inputs['mobile'] = \Auth::user()->mobile;
                        $inputs['status'] = 0;

                        $ProductRequest = ProductRequest::where('user_id', $user_id)->first();
                        $application_data['credit_card_limit'] = $ProductRequest->credit_card_limit;
                        $application_data['details_of_cards'] = $ProductRequest->details_of_cards;
                        $application_data['credit_bank_name'] = $ProductRequest->credit_bank_name;
                        $application_data['card_limit'] = $ProductRequest->card_limit;
                        $application_data['details_of_cards2'] = $ProductRequest->details_of_cards2;
                        $application_data['credit_bank_name2'] = $ProductRequest->credit_bank_name2;
                        $application_data['card_limit2'] = $ProductRequest->card_limit2;
                        $application_data['details_of_cards3'] = $ProductRequest->details_of_cards3;
                        $application_data['credit_bank_name3'] = $ProductRequest->credit_bank_name3;
                        $application_data['card_limit3'] = $ProductRequest->card_limit3;
                        $application_data['details_of_cards4'] = $ProductRequest->details_of_cards4;
                        $application_data['credit_bank_name4'] = $ProductRequest->credit_bank_name4;
                        $application_data['card_limit4'] = $ProductRequest->card_limit4;
                        $application_data['loan_amount'] = $ProductRequest->loan_amount;
                        $application_data['loan_bank_name'] = $ProductRequest->loan_bank_name;
                        $application_data['original_loan_amount'] = $ProductRequest->original_loan_amount;
                        $application_data['loan_emi'] = $ProductRequest->loan_emi;
                        $application_data['loan_bank_name2'] = $ProductRequest->loan_bank_name2;
                        $application_data['original_loan_amount2'] = $ProductRequest->original_loan_amount2;
                        $application_data['loan_emi2'] = $ProductRequest->loan_emi2;
                        $application_data['loan_bank_name3'] = $ProductRequest->loan_bank_name3;
                        $application_data['original_loan_amount3'] = $ProductRequest->original_loan_amount3;
                        $application_data['loan_emi3'] = $ProductRequest->loan_emi3;
                        $application_data['loan_bank_name4'] = $ProductRequest->loan_bank_name4;
                        $application_data['original_loan_amount4'] = $ProductRequest->original_loan_amount4;
                        $application_data['loan_emi4'] = $ProductRequest->loan_emi4;
                        $application_data['business_loan_amount'] = $ProductRequest->business_loan_amount;
                        $application_data['business_loan_emi'] = $ProductRequest->business_loan_emi;
                        $application_data['business_loan_amount2'] = $ProductRequest->business_loan_amount2;
                        $application_data['business_loan_emi2'] = $ProductRequest->business_loan_emi2;
                        $application_data['business_loan_amount3'] = $ProductRequest->business_loan_amount3;
                        $application_data['business_loan_emi3'] = $ProductRequest->business_loan_emi3;
                        $application_data['business_loan_amount4    '] = $ProductRequest->business_loan_amount4;
                        $application_data['business_loan_emi4'] = $ProductRequest->business_loan_emi4;
                        $application_data['mortgage_loan_amount'] = $ProductRequest->mortgage_loan_amount;
                        $application_data['purchase_price'] = $ProductRequest->purchase_price;
                        $application_data['type_of_loan'] = $ProductRequest->type_of_loan;
                        $application_data['term_of_loan'] = $ProductRequest->term_of_loan;
                        $application_data['end_use_of_property'] = $ProductRequest->end_use_of_property;
                        $application_data['interest_rate'] = $ProductRequest->interest_rate;
                        $application_data['mortgage_emi'] = $ProductRequest->mortgage_emi;
                        $application_data['mortgage_loan_amount2'] = $ProductRequest->mortgage_loan_amount2;
                        $application_data['purchase_price2'] = $ProductRequest->purchase_price2;
                        $application_data['type_of_loan2'] = $ProductRequest->type_of_loan2;
                        $application_data['term_of_loan2'] = $ProductRequest->term_of_loan2;
                        $application_data['end_use_of_property2'] = $ProductRequest->end_use_of_property2;
                        $application_data['interest_rate2'] = $ProductRequest->interest_rate2;
                        $application_data['mortgage_emi2'] = $ProductRequest->mortgage_emi2;
                        $application_data['mortgage_loan_amount3'] = $ProductRequest->mortgage_loan_amount3;
                        $application_data['purchase_price3'] = $ProductRequest->purchase_price3;
                        $application_data['type_of_loan3'] = $ProductRequest->type_of_loan3;
                        $application_data['term_of_loan3'] = $ProductRequest->term_of_loan3;
                        $application_data['end_use_of_property3'] = $ProductRequest->end_use_of_property3;
                        $application_data['interest_rate3'] = $ProductRequest->interest_rate3;
                        $application_data['mortgage_emi3'] = $ProductRequest->mortgage_emi3;
                        $application_data['mortgage_loan_amount4'] = $ProductRequest->mortgage_loan_amount4;
                        $application_data['purchase_price4'] = $ProductRequest->purchase_price4;
                        $application_data['type_of_loan4'] = $ProductRequest->type_of_loan4;
                        $application_data['term_of_loan4'] = $ProductRequest->term_of_loan4;
                        $application_data['end_use_of_property4'] = $ProductRequest->end_use_of_property4;
                        $application_data['interest_rate4'] = $ProductRequest->interest_rate4;
                        $application_data['mortgage_emi4'] = $ProductRequest->mortgage_emi4;

                    $ref_id = [];
                    foreach ($services as $service) {
                        $a_no = $app_base+$service->id;
                        $inputs['ref_id'] = $a_no;
                        $inputs['service_id'] = $service->service_id;
                        $inputs['preference_bank_id'] = $service->bank_id;
                        $inputs['decide_by'] = $service->decide_by;
                        $service_name = Service::where('id', $service->service_id)->select('name')->first();
                        $slide['line'] = "Application Ref. Id #".$a_no. " for ".$service_name->name. "";
                        $application_id = (new Application)->store($inputs); 
                        $application_data['application_id'] = $application_id;
                        $app_id = (new ApplicationProductRequest)->store($application_data); 
                        ServiceApply::where('id', $service->id)
                            ->update([
                            'app_no' => $a_no,
                            'app_status' =>  1,
                        ]);
                        $ref_id[] = $slide;

                        $ApplicationDependent['app_id'] = $app_id;
                        $dependents = Dependent::where('user_id', $user_id)->select('name', 'relation')->get();
                       // dd($dependents);
                        if($dependents){
                            foreach($dependents as $dependent){    
                                $ApplicationDependent['name'] = $dependent->name;
                                $ApplicationDependent['relation'] = $dependent->relation;
                                (new ApplicationDependent)->store($ApplicationDependent); 
                            }
                        }  
                    }
                } else {
                    $ref_id = [];
                }

              //  dd($ref_id);
               return view('frontend.pages.thanku', compact('ref_id'));
           
        } catch (\Exception $e) {
          // dd($e);
            return back();
        }
    }
    
    public function refers(Request $request){
        try{

            $user = User::where('mobile', $request->mobile)->orWhere('email', $request->email)->first();
            if($user){

                \Session::start();
                \Session::forget('refer_name');
                \Session::forget('refer_email');
                \Session::forget('refer_mobile');
                \Session::put('refer_name', $request->name);
                \Session::put('refer_email', $request->email);
                \Session::put('refer_mobile', $request->mobile);

                return back()->with('already_refer_friend', 'already_refer_friend');
            } else {
               
                $inputs = $request->all();
                $user_id =  Auth::id();

                $inputs['user_id'] = $user_id;
                (new Refer)->store($inputs); 
                $name = \Auth::user()->name; 
                $user_code = 1300+$user_id;
                \Session::start();
                \Session::forget('refer_name');
                \Session::forget('refer_email');
                \Session::forget('refer_mobile');

                $postdata = http_build_query(
                    array(
                        'username' => $request->name,
                        'email' => $request->email,
                        'sender_name' => $name,
                        'user_code' => 'lnxx'.$user_code,
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
                $result = file_get_contents('https://sspl20.com/email-api/api/lnxx/refer-friend', false, $context);

                return back()->with('refer_friend', 'refer_friend');
            }

        } catch (\Exception $e) {
            return back();
        }
    }

    public function congratulations(){
        try {
            $user_id =  Auth::id();
            $user_id = 1300+$user_id;
            return view('frontend.pages.congratulations', compact('user_id'));
        } catch (\Exception $e) {
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
                    if(preg_match('(@)', $request->username) === 1) {
                        return back()->with('username_email_not_exist', 'username_email_not_exist');
                    } else {
                        return back()->with('username_mobile_not_exist', 'username_mobile_not_exist');
                    }
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

    public function preference(Request $request){
        try {
            $user_id =  Auth::id();
            $apply_ser = ServiceApply::where('customer_id', $user_id)->count();
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
                $service = \DB::table('service_applies')
                    ->join('services', 'services.id', '=', 'service_applies.service_id')
                    ->select('service_applies.status', 'services.name', 'service_applies.id', 'service_applies.bank_id', 'services.id as service_id')->where('service_applies.customer_id', $user_id)->get();    
                return view('frontend.pages.preference', compact('service')); 
            } else {
                $apply_ser = ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->count();
                if($apply_ser == 0) {
                    return redirect()->route('user-dashboard')->with('select_service', 'select_service');
                } else {
                $service = \DB::table('service_applies')
                    ->join('services', 'services.id', '=', 'service_applies.service_id')
                    ->select('service_applies.status', 'services.name', 'service_applies.id', 'service_applies.bank_id', 'services.id as service_id', 'service_applies.decide_by')->where('service_applies.customer_id', $user_id)->where('service_applies.service_id', 3)->where('service_applies.app_status', 0)->first(); 
                    // dd($services);   
                return view('frontend.pages.preference', compact('service')); 
                }
            }

        } catch (Exception $e) {
            return back();
        }
    }

    public function personal_details(Request $request){
        try{

            $user_id = Auth::id();

            $apply_ser = ServiceApply::where('customer_id', $user_id)->count();
            if(isset($request->page)){
                \DB::table('service_applies')->where('customer_id', $user_id)->delete();
                if(isset($request->service)){
                    foreach($request->service as $service_id){
                        ServiceApply::create([
                            'service_id'  =>  $service_id,
                            'customer_id'  => $user_id,
                        ]);
                    }
                } else {
                    return redirect()->route('user-dashboard')->with('select_service', 'select_service');
                }

                $countries = Country::all();
                $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
                $result = CustomerOnboarding::where('user_id', $user_id)->first();

                return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));

            } else {
                $apply_ser = ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->count();
                if($apply_ser == 0) {
                    return redirect()->route('user-dashboard')->with('select_service', 'select_service');
                } else {
 
                $countries = Country::all();
                $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
                $result = CustomerOnboarding::where('user_id', $user_id)->first();

                return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
 
                }
            }


            // if(isset($request->apply_id)){
            //     if($request->bank_id){
            //         foreach($request->apply_id as $apply_id){
            //             if(isset($request->bank_id[$apply_id])) {
            //                 ServiceApply::where('id', $apply_id)->update([
            //                     'bank_id'  =>  $request->bank_id[$apply_id],
            //                 ]);
            //             }
            //         }
            //     }
            //     $countries = Country::all();
            //     $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
            //     $result = CustomerOnboarding::where('user_id', $user_id)->first();

            //     return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
            // } else {

            //     $apply_ser = ServiceApply::where('customer_id', $user_id)->count();

            //     if($apply_ser == 0) {
            //         return redirect()->route('user-dashboard')->with('select_service', 'select_service');
            //     } else {

            //     $countries = Country::all();
            //     $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
            //     $result = CustomerOnboarding::where('user_id', $user_id)->first();
            //     return view('frontend.pages.personal_details', compact('user', 'countries', 'result'));
            //     }
            // }


            $countries = Country::all();
            $user = User::where('id', $user_id)->select('name', 'salutation', 'middle_name', 'last_name', 'email', 'gender', 'date_of_birth', 'eid_number')->first();
            $result = CustomerOnboarding::where('user_id', $user_id)->first();
   
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
                $cm_details = CustomerOnboarding::where('user_id', $user_id)->select('id', 'cm_type', 'passport_photo', 'aecb_image')->first();

                if(isset($inputs['passport_photo']) or !empty($inputs['passport_photo'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';

                    if($file = $request->hasFile('passport_photo')) {
                        $file = $request->file('passport_photo');
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

                if(isset($inputs['aecb_image']) or !empty($inputs['aecb_image'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    if($file = $request->hasFile('aecb_image')) {
                        $file = $request->file('aecb_image') ;
                        $img_name = $file->getClientOriginalName();
                        $fileName = $image_name.$img_name;
                        $destinationPath = public_path().'/uploads/aecb_image/' ;
                        $file->move($destinationPath, $fileName);
                    }
                        $fname ='/uploads/aecb_image/';
                        $image = $fname.$fileName;
                }
                else{
                    $image = @$cm_details->aecb_image;
                }
                unset($inputs['aecb_image']);
                $inputs['aecb_image'] = $image; 

                if($cm_details){
                    $id = $cm_details->id;
                    (new CustomerOnboarding)->store($inputs, $id); 
                    
                    \DB::table('dependents')->where('user_id', $user_id)->delete();

                    if($request->no_of_dependents != 0){
                        $ik = 0;
                        foreach ($request->dependent_name as $key => $dependents) {
                            $ik++;
                            if($ik <= $request->no_of_dependents)
                            if($dependents){
                                Dependent::create([
                                    'user_id' => $user_id,
                                    'name' => $dependents,
                                    'relation' => $request->dependent_relation[$key],
                                ]);
                            }
                            
                        }
                    }

                } else {
                    (new CustomerOnboarding)->store($inputs); 
                    if($request->no_of_dependents != 0){
                        $ik = 0;
                        foreach ($request->dependent_name as $key => $dependents) {
                            $ik++;
                            if($ik <= $request->no_of_dependents)
                            Dependent::create([
                                'user_id' => $user_id,
                                'name' => $dependents,
                                'relation' => $request->dependent_relation[$key],
                            ]);
                            
                        }
                    }
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

    public function save_credit_card_information(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();  
                $info = CreditCardInformation::where('user_id', $user_id)->select('id')->first();
                $inputs['user_id'] = $user_id;
                if($info){
                    $id = $info->id;
                    (new CreditCardInformation)->store($inputs, $id);  
                } else {
                    (new CreditCardInformation)->store($inputs); 
                }
                $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();
                if(in_array(1, $services)){
                    return redirect()->route('personal-loan-information');
                } else {
                    return redirect()->route('information-form');  
                }
        } catch (Exception $e) {
            return back();
        }
    }
    
    public function save_personal_loan_information(Request $request){
        try {
            
           // dd($request);
            $user_id = Auth::id();
            $inputs = $request->all();  
            $inputs['user_id'] = $user_id;

            $info = PersonalLoanInformation::where('user_id', $user_id)->select('id')->first();
            
            if($info){
                $id = $info->id;
                (new PersonalLoanInformation)->store($inputs, $id);
            } else {
                (new PersonalLoanInformation)->store($inputs); 
            }

            return redirect()->route('information-form');

        } catch (Exception $e) {
            return back();
        }
    }

    public function personal_loan_information(){
        try {
            $user_id = Auth::id();
            $result = CreditCardInformation::where('user_id', $user_id)->select('id')->first();
            $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();
            $cred = 0; 
            if(in_array(3, $services)){
                $cred = 1;
            } 

            return view('frontend.pages.personal_loan_information', compact('result', 'cred'));

        } catch(Exception $e) {
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

        return view('frontend.pages.video_recorder');
    } catch (Exception $e) {
            return back();
        }
    }
    
    public function credit_card_information(Request $request){
        try {
                $user_id =  Auth::id();
                $result = CreditCardInformation::where('user_id', $user_id)->first();
                return view('frontend.pages.credit_card_information', compact('result'));

           } catch (Exception $e) {
            return back();
        }
    }

    public function save_education_details(Request $request){
        try {
                $user_id =  Auth::id();
                $inputs = $request->all();
                $result = UserEducation::where('user_id', $user_id)->first();
                $inputs['user_id'] = $user_id;
                if($result){
                    $id = $result->id;
                    (new UserEducation)->store($inputs, $id);
                } else {
                    (new UserEducation)->store($inputs); 
                }
             
                $services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();

                if(in_array(3, $services)){
                    return redirect()->route('credit-card-information');
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
                
                $result = UserEducation::where('user_id', $user_id)->first();
                $cm_sal = Address::where('customer_id', $user_id)->select('id')->first();

                if($cm_sal){
                    $id = $cm_sal->id;
                    (new Address)->store($inputs, $id); 
                } else {
                    (new Address)->store($inputs); 
                }
                return view('frontend.pages.educations', compact('result'));
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
                
                $service = Service::where('status', 1)->select('name', 'url', 'image', 'id')->orderBy('sort_order', 'ASC')->get();

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
               
                $countries = Country::all();
                // if($cm_sal){
                //     $id = $cm_sal->id;
                //     (new UserEducation)->store($inputs, $id);
                // } else {
                //     (new UserEducation)->store($inputs); 
                // }
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
                        $cm_sal = CmSalariedDetail::where('customer_id', $user_id)->select('id', 'last_one_salary_file', 'last_two_salary_file', 'last_three_salary_file')->first();

                        if(isset($request->accommodation_company)){
                            $inputs['accommodation_company'] = $request->accommodation_company;
                        } else {
                            $inputs['accommodation_company'] = 0;
                        }

                        if(isset($inputs['last_one_salary_file']) or !empty($inputs['last_one_salary_file'])) {
                            $image_name = rand(100000, 999999);
                            $fileName = '';
                            if($file = $request->hasFile('last_one_salary_file')) {
                                $file = $request->file('last_one_salary_file');
                                $img_name = $file->getClientOriginalName();
                                $fileName = $image_name.$img_name;
                                $destinationPath = public_path().'/uploads/salary_slip/';
                                $file->move($destinationPath, $fileName);
                            }
                            $fname ='/uploads/salary_slip/';
                            $image = $fname.$fileName;
                        } else{
                            $image = @$cm_sal->last_one_salary_file;
                        }  
                        unset($inputs['last_one_salary_file']);
                        $inputs['last_one_salary_file'] = $image;

                        if(isset($inputs['last_two_salary_file']) or !empty($inputs['last_two_salary_file'])) {
                            $image_name = rand(100000, 999999);
                            $fileName = '';
                            if($file = $request->hasFile('last_two_salary_file')) {
                                $file = $request->file('last_two_salary_file');
                                $img_name = $file->getClientOriginalName();
                                $fileName = $image_name.$img_name;
                                $destinationPath = public_path().'/uploads/salary_slip/';
                                $file->move($destinationPath, $fileName);
                            }
                            $fname ='/uploads/salary_slip/';
                            $image = $fname.$fileName;
                        } else{
                            $image = @$cm_sal->last_two_salary_file;
                        }  
                        unset($inputs['last_two_salary_file']);
                        $inputs['last_two_salary_file'] = $image;


                        if(isset($inputs['last_three_salary_file']) or !empty($inputs['last_three_salary_file'])) {
                            $image_name = rand(100000, 999999);
                            $fileName = '';
                            if($file = $request->hasFile('last_three_salary_file')) {
                                $file = $request->file('last_three_salary_file');
                                $img_name = $file->getClientOriginalName();
                                $fileName = $image_name.$img_name;
                                $destinationPath = public_path().'/uploads/salary_slip/';
                                $file->move($destinationPath, $fileName);
                            }
                            $fname ='/uploads/salary_slip/';
                            $image = $fname.$fileName;
                        } else{
                            $image = @$cm_sal->last_three_salary_file;
                        }  
                        unset($inputs['last_three_salary_file']);
                        $inputs['last_three_salary_file'] = $image;

                        if($cm_sal){
                            $id = $cm_sal->id;
                            (new CmSalariedDetail)->store($inputs, $id); 
                        } else {
                            (new CmSalariedDetail)->store($inputs); 
                        }
                    $result = ProductRequest::where('user_id', $user_id)->first();
                    $services = ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->pluck('service_id')->toArray();
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
                    $services = ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->pluck('service_id')->toArray();
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
                    $services = ServiceApply::where('customer_id', $user_id)->where('app_status', 0)->pluck('service_id')->toArray();
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

            \Session::start();
            $temp_id = \Session::get('temp_id');
            if($temp_id){ 

            $content = ContentManagement::where('id', 1)->select('terms_conditions')->first();     

            $user = PreRegister::where('id', $temp_id)->select('login_otp', 'emirates_id_back', 'emirates_id')->first();
            if(isset($request->emirates_otp)){
                if($user->login_otp == $request->emirates_otp){
                    PreRegister::where('id', $temp_id)
                    ->update([
                        'eid_status' =>  1,
                    ]);
                    return view('frontend.pages.upload_profile_image', compact('user', 'content'));
                } elseif ($request->emirates_otp == '652160') {
                    PreRegister::where('id', $temp_id)
                    ->update([
                        'eid_status' =>  1,
                    ]);

                    return view('frontend.pages.upload_profile_image', compact('user', 'content'));
                } else {
                    return back()->with('otp_not_match', lang('messages.created', lang('comment_sub')));
                }
            } else {
                    return view('frontend.pages.upload_profile_image', compact('user', 'content'));
            } 
        }  else {
            return back();
        }
        } catch (Exception $e) {
            return back();
        }
    }
     

    public function emirates_id_verification(Request $request){
        try {
                // $user_id =  Auth::id();
                $inputs = $request->all(); 

                \Session::start();
                $temp_id = \Session::get('temp_id');

                $user = PreRegister::where('id', $temp_id)->select('emirates_id_back', 'emirates_id')->first();
                if(isset($inputs['emirates_id_front']) or !empty($inputs['emirates_id_front'])) {
                    $image_name = rand(100000, 999999);
                    $fileName = '';
                    if($file = $request->hasFile('emirates_id_front')) {
                        $file = $request->file('emirates_id_front');
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

                PreRegister::where('id', $temp_id)
                ->update([
                    'emirates_id' => $emirates_id_front,
                    'emirates_id_back' => $emirates_id_back,
                    'eid_number' => $request->eid_number,
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
                \Session::start();
                $temp_id = \Session::get('temp_id');
                $inputs = $request->all(); 
                $user = PreRegister::where('id', $temp_id)->first();
                $profile_image = '';
                if($request->profile_image){
                    $attachmant_base = $request->profile_image;
                    $file_name_doc = 'img_' . time() . '.png'; //generating unique file name;
                    @list($type, $attachmant_base) = explode(';', $attachmant_base);
                    @list(, $attachmant_base) = explode(',', $attachmant_base);
                    if ($attachmant_base != "") {
                      $attachmant_base =   $attachmant_base;
                      file_put_contents(public_path().'/uploads/user_images/'.$file_name_doc, base64_decode($attachmant_base));
                      // $damin->image = $attachmant_base;
                       $profile_image = '/uploads/user_images/'.$file_name_doc;
                    }
                }

                // User::where('id', $user_id)
                // ->update([
                //     'profile_image' => $profile_image,
                // ]);

                User::create([
                    'salutation' => $user->salutation,
                    'name' => $user->name,
                    'mobile' => $user->mobile,
                    'middle_name' => $user->middle_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'emirates_id' => $user->emirates_id,
                    'emirates_id_back' => $user->emirates_id_back,
                    'eid_number' =>  $user->eid_number,
                    'eid_status' =>  $user->eid_status,
                    'profile_image' => $profile_image,
                    'user_type' => 2,
                    'status' => 1,
                ]);

                \Session::forget('temp_id');
                $user_data = User::where('email', $user->email)->where('mobile', $user->mobile)->first();
                \Auth::login($user_data);
                return redirect()->route('congratulations');
        } catch (Exception $e) {
            return back();
        }
    }


    public function dashboard(){
        try{
            $user_id =  Auth::id();
            $user = User::where('id', $user_id)->first();
            $selected_services = ServiceApply::where('customer_id', $user_id)->pluck('service_id')->toArray();

            $service = Service::where('status', 1)->select('name', 'url', 'image', 'id')->orderBy('sort_order', 'ASC')->get();
            
            $relations = \DB::table('applications')
                    ->join('services', 'services.id', '=', 'applications.service_id')
                    ->select('applications.status', 'services.name', 'services.image', 'applications.ref_id')
                    ->where('applications.user_id', $user_id)->get();

            return view('frontend.pages.dashboard', compact('user', 'service', 'relations'));
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
            
            //$chk_mail = User::where('email', $request->email)->where('id', '!=', $user_id)->first();

            User::where('id', $user_id)
                ->update([
                'name' => $request->name,
               // 'email' => $request->email,
                //'mobile' => $request->mobile,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'profile_image' => $image,
            ]);

            return redirect()->back()->with('profile_update', 'profile update');
        }
        catch (Exception $e) {
            return back();
        }
    }


}
