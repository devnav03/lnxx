@extends('frontend.layouts.app')
@section('content')

<section class="personal_details edu_dt">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Education Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('address-details') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Qualification</label>
      <input name="education" class="form-control" @if($result) value="{{ $result->education }}" @else value="{{ old('education') }}" @endif type="text" required="true">
      @if($errors->has('education'))
      <span class="text-danger">{{$errors->first('education')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Primary School</label>
      <input name="primary_school" class="form-control" @if($result) value="{{ $result->primary_school }}" @else value="{{ old('primary_school') }}" @endif type="text" required="true">
      @if($errors->has('primary_school'))
      <span class="text-danger">{{$errors->first('primary_school')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">High School</label>
      <input name="high_school" class="form-control" @if($result) value="{{ $result->high_school }}" @else value="{{ old('high_school') }}" @endif type="text">
      @if($errors->has('high_school'))
      <span class="text-danger">{{$errors->first('high_school')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Graduate</label>
      <input name="graduate" class="form-control" @if($result) value="{{ $result->graduate }}" @else value="{{ old('graduate') }}" @endif type="text">
      @if($errors->has('graduate'))
      <span class="text-danger">{{$errors->first('graduate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Postgraduate</label>
      <input name="postgraduate" class="form-control" @if($result) value="{{ $result->postgraduate }}" @else value="{{ old('postgraduate') }}" @endif type="text">
      @if($errors->has('postgraduate'))
      <span class="text-danger">{{$errors->first('postgraduate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Others</label>
      <input name="others" class="form-control" @if($result) value="{{ $result->others }}" @else value="{{ old('others') }}" @endif type="text">
      @if($errors->has('others'))
      <span class="text-danger">{{$errors->first('others')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12 text-center">
    <a href="{{ route('cm-details') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <button type="submit">Proceed</button>
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-5">
  <div class="service-step">
    <h3>Services is only a few step away from you</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>

  <div class="service-step">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <h3>Get money in just a step way*</h3>
    <p style="border-top: 1px solid rgba(0, 0, 0, 0.5);padding-top: 30px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus dis adipiscing ac, consectetur quis aenean. Semper viverra maecenas pharetra tristique tempus platea elit viverra. Proin mauris suspendisse risus sem. In diam odio commodo, sodales tellus convallis tortor. Neque amet eget amet morbi ac at habitant. Enim eget aliquam tempus duis amet. Sed amet sed bibendum ullamcorper. Nam bibendum eu magna in in eget ullamcorper ultrices. Faucibus gravida tristique erat quam tincidunt tincidunt ut morbi.</p>
  </div>

</div>

</div>
</div>
</section>


@endsection    