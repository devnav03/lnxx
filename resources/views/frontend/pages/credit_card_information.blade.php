@extends('frontend.layouts.app')
@section('content')


<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h1 style="font-size: 25px;margin-bottom: 20px;font-weight: 600;text-align: center;">Application Form</h1>
<h2 style="margin-bottom: 15px;">Credit cards details</h2>
<!-- <h6 style="margin-top: 12px;margin-bottom: 15px;">Please enter your information to check the offer.</h6> -->
<form action="{{ route('save-credit-card-information') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Card Type*</label> 
      <select name="card_type" class="form-control" required="true">
        <option value="">Select</option>
        <option value="Titanium" @if($result) @if($result->card_type == 'Titanium') selected @endif @endif >Titanium</option>
        <option value="Platinum" @if($result) @if($result->card_type == 'Platinum') selected @endif @endif >Platinum</option>
        <option value="Gold" @if($result) @if($result->card_type == 'Gold') selected @endif @endif >Gold</option>
        <option value="Etc." @if($result) @if($result->card_type == 'Etc.') selected @endif @endif >Etc.</option>
      </select>
      @if($errors->has('card_type'))
        <span class="text-danger">{{$errors->first('card_type')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Embossing Name*</label>
      <input name="embossing_name" class="form-control" @if($result) value="{{ $result->embossing_name }}" @else value="{{ old('embossing_name') }}" @endif required="true" type="text">
      @if($errors->has('embossing_name'))
      <span class="text-danger">{{$errors->first('embossing_name')}}</span>
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