@extends('frontend.layouts.app')
@section('content')

<section class="slider_background">
<div class="container"> 
<img src="{!! asset('assets/frontend/images/thanku_icon.png')  !!}" alt="logo" class="img-responsive"> 
<h2>Thank You !</h2>
<h5>We have received your request</h5>
<h5>Reference Id : <span>#{{ $ref_id }}</span></h5>

</div>
</section>

<section class="thanku_sec">
<div class="container">  
<h5>One of our agent will get back to you shortly!</h5>
</div>
</section>










@endsection    