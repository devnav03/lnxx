@extends('frontend.layouts.app')
@section('content')

<section class="slider_background">
<div class="container"> 
<img src="{!! asset('assets/frontend/images/thanku_icon.png')  !!}" alt="logo" class="img-responsive"> 
<h2>Thank You !</h2>
<h5 style="margin-bottom: 25px;">We have received your request</h5>
<!-- @if($ref_id)
@foreach($ref_id as $ref)
<h5 style="font-size: 16px;">{{ $ref['line'] }}</h5>
@endforeach
@endif -->
<a style="background: rgba(9, 15, 5, 0.5); color: #fff; padding: 10px 35px; border-radius: 10px; margin-top: 13px;" href="{{ route('user-dashboard') }}">Done</a>
</div>
</section>

<section class="thanku_sec">
<div class="container">  
<h5>One of our agent will get back to you shortly!</h5>
</div>
</section>










@endsection    