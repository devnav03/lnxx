@extends('frontend.layouts.app')
@section('content')

<section class="cus_dashboard">
<div class="container">  
<div class="row"> 
<div class="col-md-9">
<div class="our_assistance">
<h2>Do you want to avail our services?</h2>
<a href="{{ route('personal-details') }}" class="yes_assistance">Yes</a>
<a href="#" class="no_assistance">No</a>
</div>

<div class="lorem_dashboard">
  <h2>Lorem ipsum</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  <div class="row">  
    <div class="col-md-6"> 
      <img src="{!! asset('assets/frontend/images/dashboard_images.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-6"> 
      <img src="{!! asset('assets/frontend/images/dashboard_images.png')  !!}" class="img-responsive">
    </div>
  </div>
</div>

<div class="lorem_dashboard">
  <h2>Lorem ipsum</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  <div class="row">  
    <div class="col-md-6"> 
      <img src="{!! asset('assets/frontend/images/dash_board1.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-6"> 
      <img src="{!! asset('assets/frontend/images/dash_board1.png')  !!}" class="img-responsive">
    </div>
  </div>
</div>

<div class="scan_dashboard">
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-4">
          <img src="{!! asset('assets/frontend/images/found_qr_code_dash.png')  !!}" alt="scan" class="img-responsive">
        </div>
        <div class="col-md-8">
           <h4>Scan QR to download the Lnxx app.</h4>
           <p class="app_des">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
<div class="dashboard_sidebar">
<h3>Lorem ipsum</h3> 
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5>Lorem ipsum</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5>Lorem ipsum</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5>Lorem ipsum</h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="img-responsive">
    </div>
    <div class="col-md-9">
      <h5>Lorem ipsum</h5>
    </div>
  </div>
</div>
<div class="scan_sidebar">
  <img src="{!! asset('assets/frontend/images/found_qr_code_dash.png')  !!}" alt="scan" class="img-responsive">
  <p>Scan QR to download the Lnxx app.</p>
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