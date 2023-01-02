@extends('frontend.layouts.app')
@section('content')


<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h1 style="font-size: 25px;margin-bottom: 20px;font-weight: 600;text-align: center;">Application Form</h1>
<h2 style="margin-bottom: 15px;">Personal loan information</h2>
<!-- <h6 style="margin-top: 12px;margin-bottom: 15px;">Please enter your information to check the offer.</h6> -->
<form action="{{ route('save-personal-loan-information') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<div class="row">

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

  function AgentReference(that) {
    if (that.value == "1") {
      $(".agent_reference_number").show();
      $(".agent_reference_number input").attr("required", true);
    } else {
      $(".agent_reference_number").hide();
      $(".agent_reference_number input").removeAttr('required');
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

  function NoOfDependents(that) {
    if (that.value == "0") {
      $(".family1").hide();
      $(".family2").hide();
      $(".family3").hide();
      $(".family4").hide();
      $(".family5").hide();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();
      
      // $(".family1 input").removeAttr('required');
      // $(".family2 input").removeAttr('required');
      // $(".family3 input").removeAttr('required');
      // $(".family4 input").removeAttr('required');
      // $(".family5 input").removeAttr('required');
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');

    } else if(that.value == "1") {
      $(".family1").show();
      $(".family2").hide();
      $(".family3").hide();
      $(".family4").hide();
      $(".family5").hide();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").removeAttr('required');
      // $(".family3 input").removeAttr('required');
      // $(".family4 input").removeAttr('required');
      // $(".family5 input").removeAttr('required');
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    }  else if(that.value == "2") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").hide();
      $(".family4").hide();
      $(".family5").hide();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").removeAttr('required');
      // $(".family4 input").removeAttr('required');
      // $(".family5 input").removeAttr('required');
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "3") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").hide();
      $(".family5").hide();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").removeAttr('required');
      // $(".family5 input").removeAttr('required');
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "4") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").hide();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").removeAttr('required');
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "5") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").hide();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").removeAttr('required');
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "6") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").hide();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").removeAttr('required');
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "7") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").hide();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").removeAttr('required');
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "8") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").show();
      $(".family9").hide();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").attr("required", true);
      // $(".family9 input").removeAttr('required');
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "9") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").show();
      $(".family9").show();
      $(".family10").hide();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").attr("required", true);
      // $(".family9 input").attr("required", true);
      // $(".family10 input").removeAttr('required');
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "10") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").show();
      $(".family9").show();
      $(".family10").show();
      $(".family11").hide();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").attr("required", true);
      // $(".family9 input").attr("required", true);
      // $(".family10 input").attr("required", true);
      // $(".family11 input").removeAttr('required');
      // $(".family12 input").removeAttr('required');
    } else if(that.value == "11") {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").show();
      $(".family9").show();
      $(".family10").show();
      $(".family11").show();
      $(".family12").hide();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").attr("required", true);
      // $(".family9 input").attr("required", true);
      // $(".family10 input").attr("required", true);
      // $(".family11 input").attr("required", true);
      // $(".family12 input").removeAttr('required');
    } else {
      $(".family1").show();
      $(".family2").show();
      $(".family3").show();
      $(".family4").show();
      $(".family5").show();
      $(".family6").show();
      $(".family7").show();
      $(".family8").show();
      $(".family9").show();
      $(".family10").show();
      $(".family11").show();
      $(".family12").show();

      // $(".family1 input").attr("required", true);
      // $(".family2 input").attr("required", true);
      // $(".family3 input").attr("required", true);
      // $(".family4 input").attr("required", true);
      // $(".family5 input").attr("required", true);
      // $(".family6 input").attr("required", true);
      // $(".family7 input").attr("required", true);
      // $(".family8 input").attr("required", true);
      // $(".family9 input").attr("required", true);
      // $(".family10 input").attr("required", true);
      // $(".family11 input").attr("required", true);
      // $(".family12 input").attr("required", true);
    }
  }
  


</script>

@endsection    