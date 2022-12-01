@extends('frontend.layouts.app')
@section('content')

<section class="sign_up upload_emr">
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
<p>Please upload your emirates id.</p>
<form action="{{ route('emirates-id-verification') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}	
<label style="font-size: 14px;">Upload Emirates id front side <span style="font-size: 13px;">(750x400 px / .png, .jpg, .jpeg)</span></label>
<div class="form-group emirates_front">
	<input type="file" accept="image/png, image/jpg, image/jpeg" class="upload_file" required="true" id="imgInp" name="emirates_id_front">
	<img src="{!! asset('assets/frontend/images/upload_image.png') !!}" id="blah" class="img-responsive">
	@if($errors->has('emirates_id_front'))
        <span class="text-danger">{{$errors->first('emirates_id_front')}}</span>
    @endif
</div>
<label style="font-size: 14px;">Upload Emirates id back side <span style="font-size: 13px;">(750x400 px / .png, .jpg, .jpeg)</span></label>
<div class="form-group emirates_front">
	<input type="file" accept="image/png, image/jpg, image/jpeg" class="upload_file" required="true" id="imgInp1" name="emirates_id_back">
	<img src="{!! asset('assets/frontend/images/upload_image.png') !!}" id="blah1" class="img-responsive">
	@if($errors->has('emirates_id_back'))
       <span class="text-danger">{{$errors->first('emirates_id_back')}}</span>
    @endif
</div>

    <label style="font-size: 14px;">Emirates ID Number*</label>
    <div class="form-group">
      <input name="eid_number" style="max-width: 327px;" pattern="\d*" class="form-control" maxlength="16" minlength="16"  value="{{ old('eid_number') }}" required="true" type="text">
      @if($errors->has('eid_number'))
      <span class="text-danger">{{$errors->first('eid_number')}}</span>
      @endif
    </div>


<div class="btn-box" style="text-align: center;">
<button class="btn">Upload</button>
<p style="margin-bottom: 0px;"><a href="{{ route('upload-profile-image') }}">Skip for now</a></p>
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