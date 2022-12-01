@extends('frontend.layouts.app')
@section('content')

<section class="sign_up">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="row">
<div class="col-md-6 sign_up_content">
<h3>Lorem ipsum</h3>
<h5>Lorem ipsum dolor sit amet elit.</h5>
<ul>
<li>
<div class="row">
<div class="col-md-2">
<img src="{!! asset('assets/frontend/images/sign_img.png')  !!}" class="img-responsive">
</div>
<div class="col-md-10">
<h4>Lorem ipsum</h4>
<p>Lorem ipsum dolor sit amet, consectetur elit.</p>
</div>
</div>
</li>

<li>
<div class="row">
<div class="col-md-2">
<img src="{!! asset('assets/frontend/images/sign_img.png')  !!}" class="img-responsive">
</div>
<div class="col-md-10">
<h4>Lorem ipsum</h4>
<p>Lorem ipsum dolor sit amet, consectetur elit.</p>
</div>
</div>
</li>

<li>
<div class="row">
<div class="col-md-2">
<img src="{!! asset('assets/frontend/images/sign_img.png')  !!}" class="img-responsive">
</div>
<div class="col-md-10">
<h4>Lorem ipsum</h4>
<p>Lorem ipsum dolor sit amet, consectetur elit.</p>
</div>
</div>
</li>

<li>
<div class="row">
<div class="col-md-2">
<img src="{!! asset('assets/frontend/images/sign_img.png')  !!}" class="img-responsive">
</div>
<div class="col-md-10">
<h4>Lorem ipsum</h4>
<p>Lorem ipsum dolor sit amet, consectetur elit.</p>
</div>
</div>
</li>


</ul>


</div>
<div class="col-md-6 sign_up_field">
<!-- <a href="{{ route('home') }}"><img src="{!! asset('assets/frontend/images/cross.png') !!}" class="home-cross"></a> -->	
<h3>Sign Up</h3>
<p>Please enter your correct information.</p>
<form action="{{ route('register-email') }}" class="sn_form" method="post">
{{ csrf_field() }}
<div class="row">	
	<div class="col-md-3">
	  <select name="salutation" class="form-control" style="padding-left: 4px;" required="true">
	    <option value="Mr.">Mr.</option>
	    <option value="Mrs.">Mrs.</option>
	    <option value="Miss.">Miss</option>
	    <option value="Dr.">Dr.</option>
	    <option value="Prof.">Prof.</option>
	    <option value="Rev.">Rev.</option>
	    <option value="Other">Other</option>
	  </select>
	</div>
    <div class="col-md-9">
		<div class="form-group">
			<input type="text" class="form-control" style="padding-left: 10px;" required="true" placeholder="First name" name="name">
			@if($errors->has('name'))
		       <span class="text-danger">{{$errors->first('name')}}</span>
		    @endif
			 
		</div>
    </div>

    <div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" style="padding-left: 10px;" placeholder="Middle name" name="middle_name">
			@if($errors->has('middle_name'))
		       <span class="text-danger">{{$errors->first('middle_name')}}</span>
		    @endif
		</div>
    </div>
    <div class="col-md-6">
		<div class="form-group">
			<input type="text" class="form-control" style="padding-left: 10px;" required="true" placeholder="Last name" name="last_name">
			@if($errors->has('last_name'))
		       <span class="text-danger">{{$errors->first('last_name')}}</span>
		    @endif
		</div>
    </div>



</div>
<div class="form-group mob_input">
	<input type="number" class="form-control" required="true" placeholder="Enter mobile number" name="mobile">
	<img src="{!! asset('assets/frontend/images/mobile_register.png')  !!}" alt="logo" class="input-img">
	<div class="valid_no" style="color: #f00;">Enter your 7-digit mobile number</div>
	@if($errors->has('mobile'))
       <span class="text-danger">{{$errors->first('mobile')}}</span>
    @endif
	<div class="already_exist" style="color: #f00; font-size: 12px; padding-top: 2px;"></div>
	<div class="otp_sent" style="color: green; font-size: 12px; padding-top: 2px;"></div> 
</div>

<div class="form-group mob_input" style="margin-top: 25px;">
	<input type="number" class="form-control" required="true" placeholder="Enter OTP" name="otp">
	<img src="{!! asset('assets/frontend/images/otp.png')  !!}" alt="logo" class="input-img">
	<div class="otp_lab">OTP will be sent to above mobile number</div>
	<div class="not_verify" style="color: #f00; font-size: 12px; padding-top: 2px;"></div>
	<div class="otp_verify" style="color: green; font-size: 12px; padding-top: 2px;"></div>
	@if(session()->has('otp_not_match'))
	<div class="errors_otp" style="color: #f00; font-size: 12px; padding-top: 2px;">Invalid OTP</div>
	@endif
</div>
<div class="form-group">
<p><input type="checkbox" required="true" value="1" name="terms_conditions"> I accept the <a href="#">Terms and Conditions</a></p>

</div>

<div class="btn-box" style="text-align: center;">
<button class="btn">Next</button>
</div>
</form>

</div>

</div>


</div>
</div>

</div>
</div>
</section>


























@endsection