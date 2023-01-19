@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h1 class="app_form_head">Application Form</h1>
<h2 style="margin-bottom: 15px;">Personal loan information</h2>
<!-- <h6 style="margin-top: 12px;margin-bottom: 15px;">Please enter your information to check the offer.</h6> -->
<form action="{{ route('save-personal-loan-information') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<div class="row">

  <div class="col-md-6">
    <label class="sub-label">Existing Customer*</label>
    <select name="existing_customer" onChange="ExistingCustomer(this);" class="form-control" required="true">
      <option value="">Select</option>
      <option value="1" @if($result) @if($result->existing_customer == "1") selected @endif @endif >Yes</option>
      <option value="0" @if($result) @if($result->existing_customer == "0") selected @endif @endif >No</option>
    </select>
  </div>

  <div class="col-md-6 account_no" @if($result) @if($result->existing_customer != "1") style="display: none;" @endif @else style="display: none;" @endif >
    <div class="form-group">
      <label class="sub-label">Account No*</label>
      <input name="account_no" class="form-control" @if($result) @if($result->existing_customer == "1") required="true" @endif value="{{ $result->account_no }}" @else value="{{ old('account_no') }}" @endif type="number">
      @if($errors->has('account_no'))
      <span class="text-danger">{{$errors->first('account_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 cif_no" @if($result) @if($result->existing_customer != "0") style="display: none;" @endif @else style="display: none;" @endif >
    <div class="form-group">
      <label class="sub-label">Cif No.*</label>
      <input name="cif_no" class="form-control" @if($result) @if($result->existing_customer == "0") required="true" @endif value="{{ $result->cif_no }}" @else value="{{ old('cif_no') }}" @endif type="text">
      @if($errors->has('cif_no'))
      <span class="text-danger">{{$errors->first('cif_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12"> 
    <div class="form-group">
      <label class="sub-label">Tell Us More About Your Business</label>
      <textarea name="about_your_business" rows="4" class="form-control" required="true"> @if($result) {{ $result->about_your_business }} @else {{ old('about_your_business') }} @endif</textarea>
    </div>
  </div>

  <div class="col-md-6 self_employed_type">
    <div class="form-group">
      <label class="sub-label">Company Name*</label>
      <input type="text" @if($result) value="{{ $result->self_company_name }}" @else value="{{ old('self_company_name') }}" @endif name="self_company_name" id="self_company_name" class="form-control live_product_2 product_name2" required="true">
      <ul id="live_product_2"></ul> 
      @if($errors->has('self_company_name'))
      <span class="text-danger">{{$errors->first('self_company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Years In Business*</label>
      <input type="number" @if($result) value="{{ $result->years_in_business }}" @else value="{{ old('years_in_business') }}" @endif name="years_in_business" class="form-control" required="true"> 
      @if($errors->has('years_in_business'))
      <span class="text-danger">{{$errors->first('years_in_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Designation*</label>
    <select name="designation" class="form-control" required="true">
      <option value="">Select</option>
      <option value="Proprietor" @if($result) @if($result->designation == "Proprietor") selected @endif @endif >Proprietor</option>
      <option value="Partner" @if($result) @if($result->designation == "Partner") selected @endif @endif >Partner</option>
      <option value="Director" @if($result) @if($result->designation == "Director") selected @endif @endif >Director</option>
      <option value="Other" @if($result) @if($result->designation == "Other") selected @endif @endif >Other</option>
    </select>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Paid Up Capital (Aed)*</label>
      <input type="number" @if($result) value="{{ $result->paid_up_capital }}" @else value="{{ old('paid_up_capital') }}" @endif name="paid_up_capital" class="form-control" required="true"> 
      @if($errors->has('paid_up_capital'))
      <span class="text-danger">{{$errors->first('paid_up_capital')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No. Of Employees (Excl. Owner)*</label>
      <input type="number" @if($result) value="{{ $result->no_of_employees }}" @else value="{{ old('no_of_employees') }}" @endif name="no_of_employees" class="form-control" required="true"> 
      @if($errors->has('no_of_employees'))
      <span class="text-danger">{{$errors->first('no_of_employees')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <label class="sub-label">Ownership Details*</label>
      <textarea name="ownership_details" rows="4" class="form-control" required="true"> @if($result) {{ $result->ownership_details }} @else {{ old('ownership_details') }} @endif</textarea> 
      @if($errors->has('ownership_details'))
      <span class="text-danger">{{$errors->first('ownership_details')}}</span>
      @endif
    </div>
  </div>





  <div class="col-md-12">
    <label>Reference Person In Home Country</label>
  </div>
  <div class="col-md-4">
    <label class="sub-label">Salutation*</label>
    <select name="reference_title" class="form-control" required="true">
      <option value="Mr." @if($result) @if($result->reference_title == 'Mr.') selected @endif @endif >Mr.</option>
      <option value="Mrs." @if($result) @if($result->reference_title == 'Mrs.') selected @endif @endif >Mrs.</option>
      <option value="Miss." @if($result) @if($result->reference_title == 'Miss.') selected @endif @endif >Miss</option>
      <option value="Dr." @if($result) @if($result->reference_title == 'Dr.') selected @endif @endif >Dr.</option>
      <option value="Prof." @if($result) @if($result->reference_title == 'Prof.') selected @endif @endif >Prof.</option>
      <option value="Rev." @if($result) @if($result->reference_title == 'Rev.') selected @endif @endif >Rev.</option>
      <option value="Other" @if($result) @if($result->reference_title == 'Other') selected @endif @endif >Other</option>
    </select>
    @if($errors->has('reference_title'))
      <span class="text-danger">{{$errors->first('reference_title')}}</span>
    @endif
  </div>


  <div class="col-md-8">
    <div class="form-group">
      <label class="sub-label">Full Name*</label>
      <input name="reference_full_name" class="form-control" @if($result) value="{{ $result->reference_full_name }}" @else value="{{ old('reference_full_name') }}" @endif required="true" type="text">
      @if($errors->has('reference_full_name'))
      <span class="text-danger">{{$errors->first('reference_full_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Relation*</label>
      <select name="reference_relation" class="form-control" required="true">
        <option value="">Select</option>
        <option value="Father" @if($result) @if($result->reference_relation == 'Father') selected @endif @endif >Father</option>
        <option value="Mother" @if($result) @if($result->reference_relation == 'Mother') selected @endif @endif >Mother</option>
        <option value="Son" @if($result) @if($result->reference_relation == 'Son') selected @endif @endif>Son</option>
        <option value="Daughter" @if($result) @if($result->reference_relation == 'Daughter') selected @endif @endif>Daughter</option>
        <option value="Brother" @if($result) @if($result->reference_relation == 'Brother') selected @endif @endif>Brother</option>
        <option value="Sister" @if($result) @if($result->reference_relation == 'Sister') selected @endif @endif>Sister</option>
        <option value="Grandfather" @if($result) @if($result->reference_relation == 'Grandfather') selected @endif @endif>Grandfather</option>
        <option value="Grandmother" @if($result) @if($result->reference_relation == 'Grandmother') selected @endif @endif>Grandmother</option>
        <option value="Uncle" @if($result) @if($result->reference_relation == 'Uncle') selected @endif @endif >Uncle</option>
        <option value="Aunt" @if($result) @if($result->reference_relation == 'Aunt') selected @endif @endif>Aunt</option>
        <option value="Cousin" @if($result) @if($result->reference_relation == 'Cousin') selected @endif @endif>Cousin</option>
        <option value="Nephew" @if($result) @if($result->reference_relation == 'Nephew') selected @endif @endif>Nephew</option>
        <option value="Niece" @if($result) @if($result->reference_relation == 'Niece') selected @endif @endif>Niece</option>
        <option value="Husband" @if($result) @if($result->reference_relation == 'Husband') selected @endif @endif>Husband</option>
        <option value="Wife" @if($result) @if($result->reference_relation == 'Wife') selected @endif @endif>Wife</option>
      </select>
      @if($errors->has('reference_relation'))
      <span class="text-danger">{{$errors->first('reference_relation')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Mobile No.*</label>
      <input name="reference_mobile_no" class="form-control" @if($result) value="{{ $result->reference_mobile_no }}" @else value="{{ old('reference_mobile_no') }}" @endif required="true" type="number">
      @if($errors->has('reference_mobile_no'))
      <span class="text-danger">{{$errors->first('reference_mobile_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Home Telephone No.</label>
      <input name="reference_home_telephone_no" class="form-control" @if($result) value="{{ $result->reference_home_telephone_no }}" @else value="{{ old('reference_home_telephone_no') }}" @endif type="number">
      @if($errors->has('reference_home_telephone_no'))
      <span class="text-danger">{{$errors->first('reference_home_telephone_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address*</label>
      <input name="reference_address" class="form-control" @if($result) value="{{ $result->reference_address }}" @else value="{{ old('reference_address') }}" @endif required="true" type="text">
      @if($errors->has('reference_address'))
      <span class="text-danger">{{$errors->first('reference_address')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Po Box No.*</label>
      <input name="reference_po_box_no" class="form-control" @if($result) value="{{ $result->reference_po_box_no }}" @else value="{{ old('reference_po_box_no') }}" @endif required="true" type="number">
      @if($errors->has('reference_po_box_no'))
      <span class="text-danger">{{$errors->first('reference_po_box_no')}}</span>
      @endif
    </div>
  </div>






  <div class="col-md-12 text-center">
    <a @if($cred == 1) href="{{ route('credit-card-information') }}" @else href="{{ route('education-detail') }}" @endif class="back_btn">Back</a> &nbsp;&nbsp;
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

  function ExistingCustomer(that) {
    if (that.value == "1") {
      $(".account_no").show();
      $(".account_no input").attr("required", true);
      $(".cif_no").hide();
      $(".cif_no input").removeAttr('required');
    } else {
      $(".account_no").hide();
      $(".account_no input").removeAttr('required');
      $(".cif_no").show();
      $(".cif_no input").attr("required", true);
    }
  }

  function MaritalStatus(that) {
    if (that.value == "Married") {
      $(".wife_name").show();
      $(".wife_name input").attr("required", true);
    } else {
      $(".wife_name").hide();
      $(".wife_name input").removeAttr('required');
    }
  }


</script>

@endsection    