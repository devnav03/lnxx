@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>Bank Preference</h2>
<!-- <h6>Please select bank for preference</h6> -->

<form action="{{ route('save-preference') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-12">
    <label><input type="radio"> Yes lnxx will decide</label>

  </div>
  @if($service)
  <div class="col-md-12" style="margin-top: 15px;">
    <!-- <label style="margin-bottom: 10px;">Select bank for {{ $service->name }}</label> -->
    <input type="hidden" name="apply_id[]" value="{{ $service->id }}">
@php
  $sel_bank = get_sel_bank($service->id);
@endphp    
      <ul style="padding: 0px; list-style: none;">
        @foreach(get_prefer_bank($service->service_id) as $bank)
          <li style="float: left; width: 100%;"> <label style="font-weight: normal;font-size: 15px;"><input style="margin-top: 3px;margin-bottom: 10px;float: left;" type="radio" @if($sel_bank == $bank->id) checked @endif  name="bank_id" value="{{ $bank->id }}"> {{ $bank->name }}</label> </li>
        @endforeach
      </ul>
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

<script type="text/javascript">
function RelationChange(that) {
    if (that.value == "2") {
        $(".self_employed_type").show();
        $(".salaried_type").hide();
        $(".pension_type").hide();

        $("#company_name").removeAttr('required');
        $("#date_of_joining").removeAttr('required'); 
        $("#monthly_salary").removeAttr('required'); 

        $("#monthly_pension").removeAttr('required');
        
        $("#profession_business").attr("required", true);
        $("#percentage_ownership").attr("required", true);
        $("#company_name_sec").attr("required", true);
        $("#annual_business_income").attr("required", true);
        
    } else if(that.value == "3") {
        $(".salaried_type").hide();
        $(".self_employed_type").hide();
        $(".pension_type").show();

        $("#company_name").removeAttr('required');
        $("#date_of_joining").removeAttr('required'); 
        $("#monthly_salary").removeAttr('required');

        $("#profession_business").removeAttr('required');
        $("#percentage_ownership").removeAttr('required');
        $("#company_name_sec").removeAttr('required');
        $("#annual_business_income").removeAttr('required');

        $("#monthly_pension").attr("required", true);

    } else {
        $(".salaried_type").show();
        $(".self_employed_type").hide();
        $(".pension_type").hide();

        $("#company_name").attr("required", true);
        $("#date_of_joining").attr("required", true); 
        $("#monthly_salary").attr("required", true); 

        $("#profession_business").removeAttr('required');
        $("#percentage_ownership").removeAttr('required');
        $("#company_name_sec").removeAttr('required');
        $("#annual_business_income").removeAttr('required');

        $("#monthly_pension").removeAttr('required');
    }
   
}
</script>
@endsection    