@extends('frontend.layouts.app')
@section('content')

@php
if($result) {
  $sel_country = $result->nationality;
} else {
  $sel_country = '';
}
@endphp

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h1 style="font-size: 25px;margin-bottom: 20px;font-weight: 600;text-align: center;">Application Form</h1>  
<h2>Personal Details <span style="float: right; color: #000; font-size: 14px;font-weight: 600;">(*Mandatory)</span></h2>
<h6 style="margin-top: 12px;margin-bottom: 15px;">Please enter your information to check the offer.</h6>
<form action="{{ route('cm-details') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  
<div class="row">  
<!-- <div class="col-md-12">
<label>Name As Per Passport</label>
</div> -->
<div class="col-md-2">
  <label class="sub-label">Salutation*</label>
  <select name="salutation" class="form-control" required="true">
    <option value="Mr." @if($user->salutation == 'Mr.') selected @endif >Mr.</option>
    <option value="Mrs." @if($user->salutation == 'Mrs.') selected @endif>Mrs.</option>
    <option value="Miss." @if($user->salutation == 'Miss.') selected @endif>Miss</option>
    <option value="Dr." @if($user->salutation == 'Dr.') selected @endif>Dr.</option>
    <option value="Prof." @if($user->salutation == 'Prof.') selected @endif>Prof.</option>
    <option value="Rev." @if($user->salutation == 'Rev.') selected @endif>Rev.</option>
    <option value="Other" @if($user->salutation == 'Other') selected @endif>Other</option>
  </select>
</div>
<div class="col-md-10">
  <div class="row">  
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">First Name*</label>
        <input name="first_name_as_per_passport" maxlength="16" class="form-control" value="{{ $user->name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
        @if($errors->has('first_name_as_per_passport'))
        <span class="text-danger">{{$errors->first('first_name_as_per_passport')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Middle Name</label>
        <input name="middle_name" class="form-control" maxlength="16" value="{{ $user->middle_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
        @if($errors->has('middle_name'))
        <span class="text-danger">{{$errors->first('middle_name')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Last Name*</label>
        <input name="last_name" required="true" maxlength="16" class="form-control" value="{{ $user->last_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
        @if($errors->has('last_name'))
        <span class="text-danger">{{$errors->first('last_name')}}</span>
        @endif
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">DOB*</label> 
      <input name="date_of_birth" class="form-control" id="my_date_picker_dob" @if($result) value="{{ \Auth::user()->date_of_birth }}" @else  value="{{ old('date_of_birth') }}" @endif type="text" required="true">
      @if($errors->has('date_of_birth'))
      <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Gender*</label>  
    <select name="gender" class="form-control" required="true">
    <option value="Male" @if(\Auth::user()->gender == 'Male') selected @endif>Male</option>
    <option value="Female" @if(\Auth::user()->gender == 'Female') selected @endif>Female</option>
    <option value="Other" @if(\Auth::user()->gender == 'Other') selected @endif>Other</option>
    </select>
    @if($errors->has('gender'))
    <span class="text-danger">{{$errors->first('gender')}}</span>
    @endif
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nationality*</label>
      <select name="nationality" onChange="ChangeCountry(this);" class="form-control" required="true">
        <option value="">Select</option>
        @foreach($countries as $country)
          <option value="{{ $country->id }}" @if($result) @if($result->nationality == $country->id) selected @endif @endif >{{ $country->country_name }}</option>
        @endforeach
      </select>
      @if($errors->has('nationality'))
      <span class="text-danger">{{$errors->first('nationality')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6" id="years_in_uae_div" @if($sel_country == 229) style="display: none;" @endif>
    <label class="sub-label">No. of Years in UAE*</label>
      <input name="years_in_uae" maxlength="2" pattern="\d*" id="years_in_uae" class="form-control" @if($sel_country != 229) required="true" @endif   @if($result) value="{{ $result->years_in_uae }}" @else value="{{ old('years_in_uae') }}" @endif type="text">
      @if($errors->has('years_in_uae'))
      <span class="text-danger">{{$errors->first('years_in_uae')}}</span>
      @endif
  </div>

  <div class="col-md-6">
    <label class="sub-label">Marital Status*</label>
    <select name="marital_status" class="form-control" required="true">
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Others">Others</option>
    </select>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No. of Dependents*</label>
      <input name="no_of_dependents" pattern="\d*" maxlength="2" minlength="1" class="form-control" required="true" @if($result) value="{{ $result->no_of_dependents }}" @else value="{{ old('no_of_dependents') }}" @endif type="text">
      @if($errors->has('no_of_dependents'))
      <span class="text-danger">{{$errors->first('no_of_dependents')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Agent Reference Number (if any)</label>
      <input name="reference_number" class="form-control" maxlength="12" @if($result) value="{{ $result->reference_number }}" @else value="{{ old('reference_number') }}" @endif type="text">
      @if($errors->has('reference_number'))
      <span class="text-danger">{{$errors->first('reference_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Visa Number</label>
      <input name="visa_number" class="form-control" maxlength="16" @if($result) value="{{ $result->visa_number }}" @else value="{{ old('visa_number') }}" @endif type="text">
      @if($errors->has('visa_number'))
      <span class="text-danger">{{$errors->first('visa_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">AECB Credit Score</label>
      <input name="credit_score" pattern="\d*" maxlength="4" class="form-control" @if($result) value="{{ $result->credit_score }}" @else value="{{ old('credit_score') }}" @endif type="text">
      @if($errors->has('credit_score'))
      <span class="text-danger">{{$errors->first('credit_score')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 aecb_date" @if(isset($result)) @if($result->credit_score == '') style="display: none;" @endif  @else style="display: none;" @endif >
    <div class="form-group">
      <label class="sub-label">Date (when the score was fetched)</label>
      <input name="aecb_date" class="form-control" id="aecb_date" @if($result) value="{{ $result->aecb_date }}" @else value="{{ old('aecb_date') }}" @endif type="text">
      @if($errors->has('aecb_date'))
      <span class="text-danger">{{$errors->first('aecb_date')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Your Official Mail ID</label>
      <input name="officer_email" class="form-control" maxlength="40" @if($result) value="{{ $result->officer_email }}" @else value="{{ old('officer_email') }}" @endif type="email">
      @if($errors->has('officer_email'))
      <span class="text-danger">{{$errors->first('officer_email')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirates ID Number*</label>
      <input name="eid_number" pattern="\d*" class="form-control" maxlength="15" minlength="15" value="{{ $user->eid_number }}" required="true" type="text">
      @if($errors->has('eid_number'))
      <span class="text-danger">{{$errors->first('eid_number')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-12"></div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload front photo of Emirates id <span style="font-size: 13px;">(allowed file types (.jpg, .jpeg, *.png only) with maximum size 2mb.)*</span></label>
      @if(\Auth::user()->emirates_id)
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp" style="box-shadow: none; margin-top: 3px;" name="emirates_id_front">
        <img src="{!! asset(\Auth::user()->emirates_id) !!}" id="blah" class="img-responsive">
      @else
          <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp" style="box-shadow: none; margin-top: 3px;" name="emirates_id_front">
          <img src="" id="blah" class="img-responsive">
      @endif
      @if($errors->has('emirates_id_front'))
        <span class="text-danger">{{$errors->first('emirates_id_front')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload back photo of Emirates id <span style="font-size: 13px;">(allowed file types (.jpg, .jpeg, *.png only) with maximum size 2mb.)*</span></label>
      @if(\Auth::user()->emirates_id_back)
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp1" style="box-shadow: none; margin-top: 3px;" name="emirates_id_back">
         <img src="{!! asset(\Auth::user()->emirates_id_back) !!}" id="blah1" class="img-responsive">
      @else
        <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp1" style="box-shadow: none; margin-top: 3px;" name="emirates_id_back">
        <img src="" id="blah1" class="img-responsive">
      @endif
      @if($errors->has('emirates_id_back'))
        <span class="text-danger">{{$errors->first('emirates_id_back')}}</span>
      @endif
    </div>
  </div>

  <!-- <div class="col-md-6">
    <label class="sub-label">Country</label>
    <select name="nationality" class="form-control" required="true">
      <option value="">Select</option>
      @foreach($countries as $country)
        <option value="{{ $country->id }}" @if(isset($result->nationality)) @if($result->nationality == $country->id) selected  @endif @else @if($country->id == 229) selected @endif @endif >{{ $country->country_name }}</option>
      @endforeach
    </select>
  </div> -->
  <!-- <div class="col-md-12">
    <label>Passport Details</label>
  </div> -->
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number*</label>
      <input name="passport_number" maxlength="16" class="form-control" required="true" @if($result) value="{{ $result->passport_number }}" @else value="{{ old('passport_number') }}" @endif type="text">
      @if($errors->has('passport_number'))
      <span class="text-danger">{{$errors->first('passport_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Expiry Date*</label>
      <input name="passport_expiry_date" id="my_date_picker"  class="form-control" required="true" @if(isset($result->passport_expiry_date)) value="{{ $result->passport_expiry_date }}" @else value="{{ old('passport_expiry_date') }}" @endif type="text">
      @if($errors->has('passport_expiry_date'))
      <span class="text-danger">{{$errors->first('passport_expiry_date')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload passport photo <span style="font-size: 13px;">(allowed file types (.jpg, .jpeg, *.png only) with maximum size 2mb.)</span></label>
      @if(isset($result->passport_photo))
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp2" style="box-shadow: none; margin-top: 3px;" name="passport_photo">
        <img src="{!! asset($result->passport_photo) !!}" id="blah2" class="img-responsive" style="max-height: 110px;">
      @else
        <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp2" style="box-shadow: none; margin-top: 3px;" name="passport_photo">
        <img src="" id="blah2" class="img-responsive" style="max-height: 110px;">
      @endif
      @if($errors->has('passport_photo'))
        <span class="text-danger">{{$errors->first('passport_photo')}}</span>
      @endif
    </div>
  </div>
  <!--<div class="col-md-12">
    <label>Visa Details</label>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Expiry Date</label>
      <input name="visa_expiry_date" class="form-control" onfocus="(this.type='date')" @if(isset($result->visa_expiry_date)) value="{{ $result->visa_expiry_date }}" @else value="{{ old('visa_expiry_date') }}" @endif type="text">
      @if($errors->has('visa_expiry_date'))
      <span class="text-danger">{{$errors->first('visa_expiry_date')}}</span>
      @endif
    </div>
  </div> -->

  <div class="col-md-12">
    <label class="chk_bx" style="width: 100%; font-weight: normal; margin-bottom: 15px;"> @if($result) <input required="true" checked="" type="checkbox"> @else <input required="true" type="checkbox"> @endif By proceeding, you agree to the <a href="#">Terms and Conditions</a></label>
  </div>
  <div class="col-md-12 text-center">
    <a href="{{ route('user-dashboard') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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
  function ChangeCountry(that) {

    if (that.value == "229") {
        $("#years_in_uae_div").hide();
        // $(".show_hide").hide();
        $("#years_in_uae").removeAttr('required');
        // $(".Passport_img").removeAttr('required');


    } else {
        $("#years_in_uae_div").show();
        $("#years_in_uae").attr("required", true);
        // $(".Passport_img").attr("required", true); 
        // $(".show_hide").show();

    }
  }

</script>

@endsection    