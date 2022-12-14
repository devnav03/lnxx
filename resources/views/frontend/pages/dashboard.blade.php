@extends('frontend.layouts.app')
@section('content')

<section class="cus_dashboard">
<div class="container">  
<div class="row"> 
<div class="col-md-9">

@if(session()->has('profile_update_message'))
    <p style="color: green;margin-bottom: 10px;">Your profile has been successfully updated</p>
@endif

@if(count($relations) != 0)
<div class="lorem_dashboard">
  <h2>My Relations</h2>
  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
  <ul style="padding: 0px;list-style: none;">
    @foreach($relations as $relation)
    <li>
        <div class="service-sel">
          <h5 style="font-size: 17px; font-weight: 600;">{{ $relation->name }}</h5>
          <p style="font-size: 14px;margin-bottom: 0px;">Status: @if($relation->status == 0)<span style="font-size: 14px; color: #5EB495;"> Pending </span>@endif </p>
          <p style="font-size: 14px;">Reference No: #{{ $relation->ref_id }}</p>
        </div>
    </li>
    @endforeach
  </ul>
</div>
@endif

@if(count($service) != 0)
<div class="our_assistance ser_dt">
<h2>Select Services</h2>
<h6 style="font-size: 14px; margin-bottom: 0px;">You can select multiple products from the below list</h6>

<form action="{{ route('personal-details') }}" class="personal_details_box" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-12">

    @if(session()->has('select_service'))
      <p style="color: #f00;margin-bottom: 10px;">Kindly select a service</p>
    @endif
    <input type="hidden" name="page" value="service">
  <ul style="padding: 0px;">
@php
$button = 0;
@endphp    
  @foreach($service as $service)
@php
$services = get_service_status($service->id);
$button += $services;
@endphp

    <li>
      <label class="ser_label" for="{{ $service->url }}" style="width: 100%;"> 
      <input id="{{ $service->url }}" @if($services == 1) checked="" @endif type="checkbox" value="{{ $service->id }}" class="ser_chk" onChange="Selectser(this.value);" name="service[]"/>
        <div class="service-sel">
            <!--  <img src="{!! asset($service->image) !!}" alt="img"> -->
          <h5 style="margin-top: 2px; margin-left: 10px;">{{ $service->name }}</h5>
        </div>
      </label>
    </li>
    @endforeach
  </ul>
  </div>

  <div class="col-md-12">
<!--     <a href="{{ route('address-details') }}" class="back_btn">Back</a> &nbsp;&nbsp; -->
    <button type="submit" id="elementID" @if($button == 0) disabled="disabled" style="margin-top: 20px;" @else style="margin-top: 20px; background: #000;" @endif >Proceed</button>
  </div>
</div>
</form>
</div>
@endif

<div class="scan_dashboard">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <img src="{!! asset('assets/frontend/images/found_qr_code_dash.png')  !!}" alt="scan" class="img-responsive">
        </div>
        <div class="col-md-8">
           <h4>Download the Lnxx mobile app.</h4>
           <p class="app_des">Get exclusive offers & enjoy a seamless experience.</p>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-6">
        <a href="#"><img style="max-width: 150px;" src="{!! asset('assets/frontend/images/app_store.png')  !!}" class="img-responsive"></a>
        </div>
        <div class="col-md-6">
        <a href="#"><img style="max-width: 150px;" src="{!! asset('assets/frontend/images/google_play.png')  !!}" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-3">
<div class="info_sidebar" style="padding-bottom: 30px; margin-top: 0px; margin-bottom: 30px;">
  <h5 style="margin-bottom: 20px;">Refer and Earn</h5>
  <a href="#" style="background: #5EB495; color: #fff; padding: 8px 20px; border-radius: 12px; font-size: 14px;"><i class="fa fa-share" style="margin-right: 6px;"></i> Share </a>
</div>  
<div class="dashboard_sidebar">
<h3>Application Update</h3> 
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5 style="line-height: 21px; margin-top: 0px; font-weight: 500; font-size: 14px;">Application no #130092 approved</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5 style="line-height: 21px; margin-top: 0px; font-weight: 500; font-size: 14px;">Application no #130093 KYC is pending</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5 style="line-height: 21px; margin-top: 0px; font-weight: 500; font-size: 14px;">Application no #130094 employment details not match</h5>
    </div>
  </div>
</div>

<div class="info_sidebar">
  <img src="{!! asset('assets/frontend/images/cal_side.png')  !!}" alt="scan" class="img-responsive">
  <h5>Information bulletin</h5>
  <p>Lnxx never requests any payment process loans through its agents.</p>
</div>

</div>

</div>
</div>
</section>


@endsection    

<script type="text/javascript">
  
function Selectser() {
  
  var service_id = [];
    $('input.ser_chk[type=checkbox]').each(function () {
        if (this.checked)
          service_id.push($(this).val());
    });

  if(service_id != ''){
    $('#elementID').removeAttr('disabled');
    document.getElementById("elementID").style.background = "#000";
  } else {
    $('#elementID').attr('disabled','disabled');
    document.getElementById("elementID").style.background = "rgba(9, 15, 5, 0.5)";
  }


}

</script>