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
<a href="#"><img src="{!! asset('assets/frontend/images/logo1.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo2.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo3.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo4.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo5.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo6.jpg')  !!}" class="img-responsive"></a>
</div>
<div class="col-md-2">
<a href="#"><img src="{!! asset('assets/frontend/images/logo7.jpg')  !!}" class="img-responsive"></a>
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

<section class="testimonials" style="border-top: 1px solid; margin-top: 75px;">
<div class="container"> 
<h2>Testimonial</h2>
<div class="testimonials-slider owl-theme owl-carousel">
<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center"> 
<h4>A happy Lnxx customer</h4>
<p>Lnxx helped me consolidate all my outstanding balances in a single loan at the right interest rate. I want to thank Lnxx for making my finances more manageable as well as more affordable.</p>
</div>
</div>

<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center"> 
<h4>A Lnxx repeat customer from Dubai</h4>
<p>I have been a Lnxx customer for over 2 years now. Both my credit cards and my personal loan have been so ably facilitated by Lnxx that now I love referring my friends to them for seeking help with their financial needs!</p>
</div>
</div>

<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center"> 
<h4>Lnxx customer in Abu Dhabi</h4>
<p>The services provided by Lnxx were very useful in helping me make the right choice of credit card to best suit my needs!</p>
</div>
</div>

<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center"> 
<h4>A satisfied Lnxx customer</h4>
<p>I was very impressed by the Lnxx representative’s knowledge of the various credit cards available in the market. It was a pleasure that unlike other sales companies, she did not push me unnecessarily and yet provided me with all the information required for me to make a good decision!</p>
</div>
</div>

<div class="item">
<div class="testimonials-slide">
<img src="{!! asset('assets/frontend/images/profile.png')  !!}" class="img-responsive text-center"> 
<h4>Lnxx customer in Sharjah</h4>
<p>The representative from Lnxx was not only very professional but also made the documentation and process for my loan extremely simple!</p>
</div>
</div>


</div>
</section>


@endsection