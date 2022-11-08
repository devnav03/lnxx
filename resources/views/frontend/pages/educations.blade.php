@extends('frontend.layouts.app')
@section('content')

<section class="personal_details edu_dt">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Education Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="#" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Education</label>
      <input name="embossing_name" class="form-control"  type="text" required="true">
      @if($errors->has('embossing_name'))
      <span class="text-danger">{{$errors->first('embossing_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Primary School</label>
      <input name="passport_number" class="form-control" type="text" required="true">
      @if($errors->has('passport_number'))
      <span class="text-danger">{{$errors->first('passport_number')}}</span>
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