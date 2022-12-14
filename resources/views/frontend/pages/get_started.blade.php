@extends('frontend.layouts.app')
@section('content')

<section class="banner">
<div class="container">
<div class="row">
	<div class="col-md-6">
		<h3><span>An online</span>  <br>financial services platform <br><span>for UAE's citizens.</span></h3>
		<div class="row">
			<div class="col-md-4">
			    <img src="{!! asset('assets/frontend/images/found_qr_code.png')  !!}" alt="scan" class="img-responsive">
			</div>
			<div class="col-md-8">
			   <h4>Download the Lnxx mobile app.</h4>
			   <p>Get exclusive offers & enjoy a seamless experience.</p>
			</div>
		</div>
	</div>
</div>

<section class="continue_index">
<!-- <div class="container">	 -->
<!-- <h3>Start your journey</h3> -->
<div class="row">	
<div class="col-md-10 offset-md-1">	
<div class="row">
<div class="col-md-6 pdr50">	
<a href="{{ route('customer-menu') }}">	
<div class="con-box">
<h4>Enroll as customer</h4>
<p>Get exclusive offers on personal loans and credit cards.</p>
<a class="con_btn" href="{{ route('customer-menu') }}">
<img src="{!! asset('assets/frontend/images/rectangle.png')  !!}" class="pre_hover">
<img src="{!! asset('assets/frontend/images/Rectangle_right.png')  !!}" class="af_hover">
</a>
</div>
</a>
</div>

<div class="col-md-6 pdl50">
<a href="{{ route('agent-menu') }}">	
<div class="con-box">
<h4>Become an agent</h4>
<p>Get job opportunities to enhance your income and enrich your lifestyle.</p>
<a class="con_btn" href="{{ route('agent-menu') }}">
<img src="{!! asset('assets/frontend/images/rectangle.png')  !!}" class="pre_hover">
<img src="{!! asset('assets/frontend/images/Rectangle_right.png')  !!}" class="af_hover">
</a>
</div>
</a>
</div>
</div>
</div>
</div>
<!-- </div> -->
</section>

</div>
<div class="abs_banner_img">
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
	    <div class="carousel-inner">
	    	@php
               $k = 0;
	    	@endphp
	    	@foreach($smallSliders as $smallSlider)
	    	@php
               $k++;
	    	@endphp
		    <div class="carousel-item @if($k == 1) active @endif ">
		        <img alt="Lnxx introduction image" src="{!! asset($smallSlider->image)  !!}" class="img-responsive ">
		    </div>
		    @endforeach
	    </div>
			<!-- <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a> -->
	</div>
</div>


</section>

<div class="logo_back">
<div class="container">
<div class="sec_banner_sec">
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-4">
<div class="banner-one">
<h5>100K+</h5>
<p><img src="{!! asset('assets/frontend/images/download-icon.png')  !!}"> Download</p>
</div>
</div>
<div class="col-md-4">
<div class="banner-two">
<h5>15K+</h5>
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
<img src="{!! asset('assets/frontend/images/lnxx-credit-cards-in-hands.png') !!}" class="img-responsive img_sec_pol">
<img src="{!! asset('assets/frontend/images/lnxx-dhriam-in-hands.png') !!}" class="img-responsive img_sec_card">
</div>
</div>
</div>
</div>

<section class="about_index" id="About">
<div class="container">	
<div class="row">	
<div class="col-md-5">	
<h3>Our Services</h3>
<div class="service-box">
	<div class="row">	
		@foreach($services as $service)
		<div class="col-md-6 mx-auto" style="text-align: center;">	
			<img src="{!! asset($service->blue_icon)  !!}" class="ser_img">
			<h4 style="margin-top: 10px;">{{ $service->name }}</h4>
		</div>
		@endforeach
	</div>
</div>

</div>
<div class="col-md-7">	
<h2>About</h2>
<h5>Leading financial services provider with a focus on UAE citizens' needs</h5> 
<p>Lnxx is a digital Neo-bank platform designed to create and enhance meaningful customer engagement and new revenue opportunities through an online and mobile digital environment for customers enabling them to access any bank on a one-stop agnostic basis for their end-to-end full-function holistic financial needs.</p>
<p>An online marketplace platform integrates with the financial institutions' (FI) systems for real-time processing and online approvals to the customers. Its online customer interface riding on the platform includes processing using demographic, social, behavioral and psycho-graphic variables along with seamless origination, assessment and fulfilment for financial products on a real time mode for customers. It leverages technology & data together with advanced analytics for faster and more reliable decision- making.</p>
<a href="#">Learn More</a>
</div>
</div>
</div>
</section>
</div>

<section class="lorem_ipsum_index" style="display: none;">
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

<section class="lorem_index" style="display: none;">
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

<section class="lnxx-partners" style="margin-top: 80px;">
<div class="container">
<h2>Our Partners</h2>   
<p>We collaborate with the biggest and best names in banking and<br> finance to bring you relevant items at competitive prices.</p>
<div class="row">
@foreach($banks as $bank)	
<div class="col-md-2">
<img src="{!! asset($bank->image)  !!}" class="img-responsive">
</div>
@endforeach
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
@foreach($testimonials as $testimonial)	
<div class="item">
<div class="testimonials-slide">
<img src="{!! asset($testimonial->image)  !!}" class="img-responsive text-center"> 
<h4>{{ $testimonial->title }}</h4>
<p>{!! $testimonial->comment !!}</p>
</div>
</div>
@endforeach
</div>
</section>


@endsection