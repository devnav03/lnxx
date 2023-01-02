@extends('frontend.layouts.app')
@section('content')


<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h1 style="font-size: 25px;margin-bottom: 20px;font-weight: 600;text-align: center;">Application Form</h1>
<h2 style="margin-bottom: 15px;">Personal details</h2>
<!-- <h6 style="margin-top: 12px;margin-bottom: 15px;">Please enter your information to check the offer.</h6> -->
<form action="{{ route('save-information-form') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<div class="row">
  @if($customer_info->marital_status == 'Married')  
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Does Your Spouse Live In Uae?*</label> 
      <select name="spouse_live_in_uae" onChange="SpouseLive(this);" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($result) @if($result->spouse_live_in_uae == 1) selected @endif @endif >Yes</option>
        <option value="0" @if($result) @if($result->spouse_live_in_uae == 0) selected @endif @endif >No</option>
      </select>
      @if($errors->has('spouse_live_in_uae'))
        <span class="text-danger">{{$errors->first('spouse_live_in_uae')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 spouse_working" @if($result) @if($result->spouse_live_in_uae == 0) style="display: none;" @endif @else style="display: none;" @endif >
    <div class="form-group">
      <label class="sub-label">Spouse Working*</label> 
      <select name="spouse_working" class="form-control" @if($result) @if($result->spouse_live_in_uae == 1) required="true" @endif @endif >
        <option value="">Select</option>
        <option value="1" @if($result) @if($result->spouse_working == 1) selected @endif @endif >Yes</option>
        <option value="0" @if($result) @if($result->spouse_working == 0) selected @endif @endif >No</option>
      </select>
      @if($errors->has('spouse_working'))
        <span class="text-danger">{{$errors->first('spouse_working')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">You Have Children In The UAE?*</label> 
      <select name="children_in_the_uae" onChange="ChildrenUAE(this);" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($result) @if($result->children_in_the_uae == 1) selected @endif @endif >Yes</option>
        <option value="0" @if($result) @if($result->children_in_the_uae == 0) selected @endif @endif >No</option>
      </select>
      @if($errors->has('children_in_the_uae'))
        <span class="text-danger">{{$errors->first('children_in_the_uae')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 ChildrenUAE" @if($result) @if($result->children_in_the_uae == 0) style="display: none;" @endif @else style="display: none;" @endif >
    <div class="form-group">
      <label class="sub-label">In School?*</label> 
      <select name="in_school" class="form-control" @if($result) @if($result->children_in_the_uae == 1) required="true" @endif @endif >
        <option value="">Select</option>
        <option value="1" @if($result) @if($result->in_school == 1) selected @endif @endif >Yes</option>
        <option value="0" @if($result) @if($result->in_school == 0) selected @endif @endif >No</option>
      </select>
      @if($errors->has('in_school'))
        <span class="text-danger">{{$errors->first('in_school')}}</span>
      @endif
    </div>
  </div>

  @endif

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Do You Own A Vehicle In Uae?*</label> 
      <select name="vehicle_in_uae" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($result) @if($result->vehicle_in_uae == 1) selected @endif @endif >Yes</option>
        <option value="0" @if($result) @if($result->vehicle_in_uae == 0) selected @endif @endif >No</option>
      </select>
      @if($errors->has('vehicle_in_uae'))
        <span class="text-danger">{{$errors->first('vehicle_in_uae')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Favorite City (As A Security Feature)*</label>
      <input name="favorite_city" class="form-control" @if($result) value="{{ $result->favorite_city }}" @else value="{{ old('favorite_city') }}" @endif required="true" type="text">
      @if($errors->has('favorite_city'))
      <span class="text-danger">{{$errors->first('favorite_city')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label>Bank Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Account Number</label>
      <input name="account_number" class="form-control" @if($result) value="{{ $result->account_number }}" @else value="{{ old('account_number') }}" @endif type="number">
      @if($errors->has('account_number'))
      <span class="text-danger">{{$errors->first('account_number')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Bank Name</label>
      <input name="bank_name" class="form-control" @if($result) value="{{ $result->bank_name }}" @else value="{{ old('bank_name') }}" @endif type="text">
      @if($errors->has('bank_name'))
      <span class="text-danger">{{$errors->first('bank_name')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Iban Number</label>
      <input name="iban_number" class="form-control" @if($result) value="{{ $result->iban_number }}" @else value="{{ old('iban_number') }}" @endif type="text">
      @if($errors->has('iban_number'))
      <span class="text-danger">{{$errors->first('iban_number')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <label>Multiple Nationality Holder Details</label>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nationality Name</label>
      <input name="multi_nationality_name" class="form-control" @if($result) value="{{ $result->multi_nationality_name }}" @else value="{{ old('multi_nationality_name') }}" @endif type="text">
      @if($errors->has('multi_nationality_name'))
      <span class="text-danger">{{$errors->first('multi_nationality_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="multi_passport_number" class="form-control" @if($result) value="{{ $result->multi_passport_number }}" @else value="{{ old('multi_passport_number') }}" @endif type="text">
      @if($errors->has('multi_passport_number'))
      <span class="text-danger">{{$errors->first('multi_passport_number')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-12 text-center">
    <a href="{{ route('education-detail') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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

  function SpouseLive(that) {
    if (that.value == 1) {
      $(".spouse_working").show();
      $(".spouse_working select").attr("required", true);
    } else {
      $(".spouse_working").hide();
      $(".spouse_working select").removeAttr('required');
    }
  }

  function ChildrenUAE(that) {
    if (that.value == 1) {
      $(".ChildrenUAE").show();
      $(".ChildrenUAE select").attr("required", true);
    } else {
      $(".ChildrenUAE").hide();
      $(".ChildrenUAE select").removeAttr('required');
    }
  }

  

 </script>

@endsection    