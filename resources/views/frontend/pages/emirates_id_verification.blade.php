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
<h3>Emirates ID Verification</h3>
<p>Please enter your OTP</p>
<form action="{{ route('upload-profile-image') }}" method="post">
{{ csrf_field() }}	
<div class="form-group mob_input">
	<input type="number" name="emirates_otp" class="form-control" required="true" placeholder="Enter OTP">
	<img src="{!! asset('assets/frontend/images/otp.png')  !!}" alt="logo" class="input-img">
	<div class="valid_no"></div>
	<div class="not_verify" style="color: #f00; font-size: 12px; padding-top: 2px;"></div>
	<div class="otp_verify" style="color: green; font-size: 12px; padding-top: 2px;"></div>
	@if(session()->has('otp_not_match'))
	<div class="errors_otp" style="color: #f00; font-size: 12px; padding-top: 2px;">Invalid OTP</div>
	@else
	<div class="otp_email" style="color:green; font-size: 14px;">OTP sent on your emirates id number </div>
	@endif
	<div class="already_exist" style="color:#f00; font-size: 14px;"></div> 
	@if($errors->has('emirates_otp'))
       <span class="text-danger">{{$errors->first('emirates_otp')}}</span>
    @endif
    
</div>
<div class="btn-box" style="text-align: center;">
<button class="btn">Verify</button>
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