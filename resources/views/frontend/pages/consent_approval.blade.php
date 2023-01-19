@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h1 class="app_form_head">Application Form</h1>   
<h2>Consent Form</h2>
<h6 style="color: #000;font-size: 17px;">Providing the following guidelines for the form :</h6>

<form action="{{ route('record-video') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<p class="by_signing">By signing this form, you consent (permission) to Emirates Islamic to request for your statement of account through the Central Bank of the United Arab Emirates, from your bank (as can be identified by the account number IBAN) and also for your bank to provide this information through the Central Bank of the United Arab Emirates, without taking additional consent. ....</p>
<div class="row">

  <div class="col-md-12">
    <label style="font-weight: 400; font-size: 15px;"><input type="checkbox" name="consultation" value="1" style="margin-top: 2px; width: 20px; height: 20px; box-shadow: none; float: left; margin-right: 10px;" required="true"> By checking the box, you agree to provide your Consent.</label> 
  </div>
  <div class="col-md-12">
  <p class="by_signing">By signing this form, you consent (permission) to Emirates Islamic to request for your statement of account through the Central Bank of the United Arab Emirates, from your bank (as can be identified by the account number IBAN) and also for your bank to provide this information through the Central Bank of the United Arab Emirates, without taking additional consent. ....</p>
  </div>
 
  <div class="col-md-12">
    <label style="font-weight: 400; font-size: 15px;"><input type="checkbox" name="consultation" value="1" style="margin-top: 2px; width: 20px; height: 20px; box-shadow: none; float: left; margin-right: 10px;" required="true"> By checking the box, you agree to provide your Consent.</label> 
  </div>

  <div class="col-md-12 text-center">
    <a href="{{ route('product-requested') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <button type="submit">Confirm</button> 
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-5">
   <div class="service-step">
    <h3>Please note that all fields marked with an asterisk (*) are required</h3>
    <p>Thank you for taking the time to complete our form. In order to process your request, we need to collect certain information from you. Please make sure to fill out all of the required fields marked with an asterisk (*). These fields are essential for us to understand your needs and provide you with the best possible service.</p><br>
    <p>If you have any questions about which fields are required, please don't hesitate to contact us. We're here to help you every step of the way.</p>
  </div>

<div class="service-step">
    <h3>Get money with just a few simple steps</h3>
<ul style="padding-left: 15px; color: rgba(0, 0, 0, 0.5);">
<li>Visit our website. This will help us understand your financial needs and determine which products and services are best for you.</li>
<li>Submit your application and wait for a response. We'll review your information and get back to you as soon as possible with a decision.</li>
<li>If your application for credit cards and loans is approved, you'll be able to access the limits that have been set for those products. The limits will likely be based on your credit score, income, and other financial information that you provided as part of the application process.</li>
</ul>
</div>

</div>

</div>
</div>
</section>


@endsection    