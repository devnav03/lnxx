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

<p class="by_signing" style="color: #555;">I hereby declare and acknowledge that I have applied for a financial facility through JCBL. The financial
facility I have applied for can include but not be limited to a credit card or a loan or any other financial
product. I hereby declare that the information that I have provided to JCBL including in this application is
true and correct and I shall advise JCBL in writing of any changes thereto. I hereby authorize JCBL at its
absolute discretion to collect, use and store my personal data or any of my information including any of
my information that JCBL obtains from third parties (including banks, financial institutions, local credit
bureaus or international credit bureaus) for whatever purposes it may require including sending it to
banks and financial institutions for processing my application, using my information for data processing,
statistical and risk analysis purposes and to disclose any of my information obtained by JCBL to any third
party selected by JCBL, wherever situated, including but not limited to banks and financial institutions
that JCBL partners with or any local or international credit bureaus, or to any of JCBL’s subsidiaries,
affiliates, agents, representatives, or to comply with the applicable laws, rules and regulations. I
irrevocably and unconditionally authorize JCBL to make inquiries with, obtain my information from or
supply my information to any bank or financial institution or credit bureau or credit reporting agency in
any jurisdiction for any purpose relating to but not limited to my financial situation, or credit history. I
authorize JCBL to use my information to send me promotional or marketing materials over mail, e-mail,
SMS, social media, phone or any other means of communication.<br><br>
The provisions of this declaration shall remain in force and effect against me and may not be terminated
or amended without JCBL’s prior written consent. This declaration shall hold in respect of all products,
services and channels of JCBL (including all future product, service and channel inclusions).</p>
<div class="row">

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