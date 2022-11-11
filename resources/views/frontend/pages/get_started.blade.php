@extends('frontend.layouts.app')
@section('content')

<section class="banner">
<div class="container">
<div class="row">
<div class="col-md-6">
<h3><span>Lorem</span> ipsum <br> dolor <span>sit amet, consectetur</span> <br> adipiscing elit.</h3>
<div class="row">
<div class="col-md-4">
<img src="{!! asset('assets/frontend/images/found_qr_code.png')  !!}" alt="scan" class="img-responsive">
</div>
<div class="col-md-8">
   <h4>Scan QR to download the Lnxx app.</h4>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</div>
</div>
</div>

<section class="continue_index">
<!-- <div class="container">	 -->
<h3>Select to Continue as</h3>
<div class="row">	
<div class="col-md-10 offset-md-1">	
<div class="row">
<div class="col-md-6 pdr50">	
<div class="con-box">
<h4>Customer</h4>
<p>To access services, use the option to continue as a customer.</p>
<a class="con_btn" href="{{ route('customer-menu') }}">
<img src="{!! asset('assets/frontend/images/rectangle.png')  !!}" class="pre_hover">
<img src="{!! asset('assets/frontend/images/Rectangle_right.png')  !!}" class="af_hover">
</a>
</div>
</div>

<div class="col-md-6 pdl50">	
<div class="con-box">
<h4>Agent</h4>
<p>To access services, use the option to continue as a Agent.</p>
<a class="con_btn" href="{{ route('agent-menu') }}">
<img src="{!! asset('assets/frontend/images/rectangle.png')  !!}" class="pre_hover">
<img src="{!! asset('assets/frontend/images/Rectangle_right.png')  !!}" class="af_hover">
</a>
</div>
</div>
</div>
</div>
</div>
<!-- </div> -->
</section>

</div>
<img src="{!! asset('assets/frontend/images/demo_images.png')  !!}" class="img-responsive abs_banner_img">
</section>

<div class="logo_back">
<div class="container">
<div class="sec_banner_sec">
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-4">
<div class="banner-one">
<h5>3M+</h5>
<p><img src="{!! asset('assets/frontend/images/download-icon.png')  !!}"> Download</p>
</div>
</div>
<div class="col-md-4">
<div class="banner-two">
<h5>56K</h5>
<p><img src="{!! asset('assets/frontend/images/active_user.png')  !!}"> Active User</p>
</div>
</div>
<div class="col-md-4">
<div class="banner-three">
<h5>4.4</h5>
<p><img src="{!! asset('assets/frontend/images/star.png')  !!}"> App Rating</p>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<img src="{!! asset('assets/frontend/images/Card.png') !!}" class="img-responsive img_sec_pol">
<img src="{!! asset('assets/frontend/images/Card.png') !!}" class="img-responsive img_sec_card">
</div>
</div>
</div>
</div>

<section class="about_index">
<div class="container">	
<div class="row">	
<div class="col-md-5">	
<h3>Our Services</h3>
<div class="service-box">
	<div class="row">	
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
		<div class="col-md-4">	
			<img src="{!! asset('assets/frontend/images/property_img.png')  !!}" class="ser_img">
			<h4>Lorem Ipsum</h4>
		</div>
	</div>
</div>

</div>
<div class="col-md-7">	
<h2>About</h2>
<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien iaculis nunc auctor elementum.</h5> 
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, enim volutpat urna quisque. Justo ut fermentum justo, egestas nunc eget imperdiet pharetra, urna. Et, placerat sit at penatibus tellus consectetur ullamcorper purus placerat. Phasellus porta eget arcu adipiscing et ornare. Massa mattis elit placerat sed odio vitae blandit ac eget. Malesuada aliquam purus bibendum neque pulvinar. Tristique ac quis sagittis sagittis, amet. Purus, urna orci, aenean tempus risus, tempor mi. Habitant cursus consectetur neque diam amet, sit sed blandit suspendisse. Nullam hendrerit orci, urna, nullam facilisis risus.</p>
<a href="#">Learn More</a>
</div>
</div>
</div>
</section>
</div>

<section class="lorem_ipsum_index">
<div class="container">	
<div class="row">	
<div class="col-md-5">	
<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien iaculis nunc auctor elementum. </h3>

</div>
<div class="col-md-7">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
</div>
</div>
</section>

<section class="lorem_index">
<div class="container">	
<div class="row">	
<div class="col-md-5">	
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum volutpat senectus id fusce congue. Nulla nunc integer mauris platea velit venenatis, euismod sed. Egestas duis aliquam pulvinar phasellus faucibus tempus. </p>

</div>
<div class="col-md-7">
<img src="{!! asset('assets/frontend/images/Card_ser.png')  !!}" class="img-responsive">
</div>
</div>
</div>
</section>

<section class="lnxx-partners">
<div class="container">
<h2>Our Partners</h2>   
<p>We collaborate with the biggest and best names in banking and<br> finance to bring you relevant items at competitive prices.</p>
<div class="row">
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/partners.png')  !!}" class="img-responsive"></a>
</div>

</div>
</div>
</section>

<!--<section class="lorem_ipsum">
<div class="row">	
<div class="col-md-4">	
<img src="{!! asset('assets/frontend/images/Demo_image.png')  !!}" class="img-responsive">
</div>
<div class="col-md-7">	
<h3>Lorem ipsum</h3>
<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet, enim volutpat urna quisque.</p>

</div>
</div>
</section> -->

<section class="testimonials">
<div class="container">	
<h2>Testimonial</h2>
<div class="testimonials-slider owl-theme owl-carousel">
<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center">	
<h4>Customer Name</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisi quisque leo mi nibh. Fermentum turpis id nullam arcu, massa dignissim dis felis, dictum. Tristique sagittis lobortis neque iaculis pellentesque sagittis, pellentesque amet a. At aliquet vel nibh id gravida natoque tempor. Eget tristique sem nunc, velit magna sed. Pellentesque tellus tortor massa sem elit.</p>
</div>
</div>
</div>
</div>
</section>


@endsection