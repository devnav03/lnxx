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
<a href="{{ route('home') }}"><img src="{!! asset('assets/frontend/images/cross.png') !!}" class="home-cross"></a>
<h3>Sign In</h3>
<p>To proceed, verify your details.</p>

@if(session()->has('username_not_exist'))
<p style="color: #f00;margin-bottom: 25px;">Username not registered with us</p>
@endif

<form action="{{ route('login-otp') }}" method="post">
{{ csrf_field() }}	
<div class="form-group mob_input">
	<input type="text" class="form-control" required="true" placeholder="Enter Mobile / Email" name="username">
	<img src="{!! asset('assets/frontend/images/mobile_register.png')  !!}" alt="logo" class="input-img">
	@if($errors->has('username'))
       <span class="text-danger">{{$errors->first('username')}}</span>
    @endif 
</div>

<div class="btn-box" style="text-align: center;">
<button class="btn">Sign In</button>
<br>
<a href="{{ route('sign_up') }}">For new click here</a>
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