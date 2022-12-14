@extends('frontend.layouts.app')
@section('content')

<section class="sign_up">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="row">
<div class="col-md-6 sign_up_content">
<h3>Welcome Back to Lnxx</h3>	
<h5>Sign up to continue your account</h5>
<div style="text-align:center">
<img src="{!! asset('assets/frontend/images/Artboard_5.png')  !!}" style="padding-bottom: 20px; max-width: 300px;" class="img-responsive">
</div>
<!-- <ul>
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
</ul> -->


</div>
<div class="col-md-6 sign_up_field">
<!-- <a href="{{ route('home') }}"><img src="{!! asset('assets/frontend/images/cross.png') !!}" class="home-cross"></a> -->
<h3>Sign Up</h3>
<p>Please upload your profile image.</p>
<form action="{{ route('save-profile-image') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}	
<label style="font-size: 14px;">Upload your photo <span style="font-size: 13px;"> (recommended 300x300px / .png, .jpg, .jpeg, max size 2mb)</span></label>
<div class="form-group emirates_front">
	<input type="file" accept="image/png, image/jpg, image/jpeg" class="upload_file" required="true" id="imgInp" name="profile_image">
	<img src="{!! asset('assets/frontend/images/upload_image.png') !!}" id="blah" class="img-responsive">
	@if($errors->has('profile_image'))
        <span class="text-danger">{{$errors->first('profile_image')}}</span>
    @endif
</div>

<div class="btn-box" style="text-align: center;">
<button class="btn">Upload</button>
<p style="margin-bottom: 0px;"><a href="{{ route('user-dashboard') }}">Skip for now</a></p>
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