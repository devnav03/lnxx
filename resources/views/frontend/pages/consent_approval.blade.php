@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>Consent form</h2>
<h6 style="color: #000;font-size: 17px;">Providing the following guidelines for the form :</h6>

<form action="{{ route('record-video') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<p class="by_signing">By signing this form, you consent (permission) to Emirates Islamic to request for your statement of account through the Central Bank of the United Arab Emirates, from your bank (as can be identified by the account number IBAN) and also for your bank to provide this information through the Central Bank of the United Arab Emirates, without taking additional consent. ....</p>
<div class="row">

  <div class="col-md-12">
    <label style="font-weight: 400; font-size: 15px;"><input type="checkbox" name="consultation" value="1" style="margin-top: 2px; width: 20px; height: 20px; box-shadow: none; float: left; margin-right: 10px;" required="true"> By checking the box, you agree to provide your consultation.</label> 
  </div>
  <div class="col-md-12">
  <p class="by_signing">By signing this form, you consent (permission) to Emirates Islamic to request for your statement of account through the Central Bank of the United Arab Emirates, from your bank (as can be identified by the account number IBAN) and also for your bank to provide this information through the Central Bank of the United Arab Emirates, without taking additional consent. ....</p>
  </div>
 
  <div class="col-md-12">
    <label style="font-weight: 400; font-size: 15px;"><input type="checkbox" name="consultation" value="1" style="margin-top: 2px; width: 20px; height: 20px; box-shadow: none; float: left; margin-right: 10px;" required="true"> By checking the box, you agree to provide your consultation.</label> 
  </div>

  <div class="col-md-12 text-center">
    <a href="{{ route('record-video') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <button type="submit">Confirm</button> 
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-5">
  <div class="service-step" style="margin-top: 0px;  border: 0px;">
    <h3>Services is only a few step away from you</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <!-- <img src="{!! asset('assets/frontend/images/video_record.png') !!}" style="max-width: 83%;" class="img-responsive"> -->
    
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