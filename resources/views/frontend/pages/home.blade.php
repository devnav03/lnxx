@extends('frontend.layouts.app')
@section('content')

<section class="slider">
<div class="main-slider owl-theme owl-carousel">    
<div class="item">
<img src="{!! asset('assets/frontend/images/slider_1.png')  !!}" alt="slider" class="img-responsive">
</div>
<div class="item">
<img src="{!! asset('assets/frontend/images/slider_2.png')  !!}" alt="slider" class="img-responsive">
</div>
</div>
</section>  
     



@endsection