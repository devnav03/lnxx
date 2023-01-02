@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h1 style="font-size: 25px;margin-bottom: 20px;font-weight: 600;text-align: center;">Application Form</h1>  
<h2>Bank Preference</h2>
<h6 style="margin-bottom: 0px;">Please select the credit card preference</h6> 
<form action="{{ route('save-preference') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-12" style="margin-top: 20px;">
    <label style="font-weight: normal; font-size: 15px;"><input type="radio" @if($service->decide_by == 0) checked @endif  onclick="javascript:yesnoCheck();" name="decide_by" id="yesCheck" value="0" style="margin-top: 3px; float: left; margin-right: 8px; width: 16px; margin-bottom: 8px;"> Let the lnxx decide</label><br>
    <label style="font-weight: normal; font-size: 15px;"><input type="radio" @if($service->decide_by == 1) checked @endif onclick="javascript:yesnoCheck();" name="decide_by" value="1" id="noCheck" style="margin-top: 3px; float: left; margin-right: 8px; width: 16px; margin-bottom: 5px;"> I will select my preference</label>
  </div>
  @if($service)
  <div class="col-md-6" id="bank_select" @if($service->decide_by == 0) style="margin-top: 15px; display:none" @else style="margin-top: 15px;" @endif >
    <!-- <label style="margin-bottom: 10px;">Select bank for {{ $service->name }}</label> -->
    <input type="hidden" name="apply_id[]" value="{{ $service->id }}">
@php
    $sel_bank = get_sel_bank($service->id);
@endphp  
      <label style="font-weight: normal; margin-bottom: 5px; font-size: 15px;">Select Bank Preference*</label>  
      <select name="bank_id" class="form-control" id="bank_select_field" @if($service->decide_by == 1) required="true" @endif>
        <option value="">Select</option>
        @foreach(get_prefer_bank($service->service_id) as $bank)
          <option value="{{ $bank->id }}" @if($bank->id == $service->bank_id) selected @endif>{{ $bank->name }}</option>
        @endforeach
      </select>
  </div>
  @endif
  <div class="col-md-12 text-center">
    <a href="{{ route('product-requested') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <button type="submit">Proceed</button>
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

<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('bank_select').style.display = 'none';
        $("#bank_select_field").removeAttr('required');
    } else {
        document.getElementById('bank_select').style.display = 'block';
        $("#bank_select_field").attr("required", true);
    }
}
</script>
@endsection    