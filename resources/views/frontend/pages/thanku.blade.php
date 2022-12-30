@extends('frontend.layouts.app')
@section('content')

<section class="slider_background">
<div class="container"> 
<img src="{!! asset('assets/frontend/images/thanku_img.png')  !!}" style="width: auto; max-height: 250px; " alt="logo" class="img-responsive"> 
<h2>Thank You !</h2>
@if($ref_id)
@foreach($ref_id as $ref)
<h5 style="font-size: 16px;margin-bottom: 30px;color: green;">{{ $ref['line'] }}</h5>
@endforeach
@endif

<h5 style="margin-bottom: 10px;font-size: 15px;">On the basis of your application details \ Lnxx has recommended you the following products</h5>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="row">
<div class="col-md-3">
<a href="{{ route('address-details') }}"><img src="{!! asset('assets/frontend/images/reco1.jpeg')  !!}" style="width: auto;margin-top: 10px;" class="img-responsive"></a>
</div>
<div class="col-md-3">
<a href="{{ route('address-details') }}"><img src="{!! asset('assets/frontend/images/reco2.jpeg')  !!}" style="width: auto;margin-top: 10px;" class="img-responsive"></a> 
</div>
<div class="col-md-3">
<a href="{{ route('address-details') }}"><img src="{!! asset('assets/frontend/images/reco3.jpeg')  !!}" style="width: auto;margin-top: 10px;" class="img-responsive"></a>  
</div>
<div class="col-md-3">
<a href="{{ route('address-details') }}"><img src="{!! asset('assets/frontend/images/reco4.jpeg')  !!}" style="width: auto;margin-top: 10px;" class="img-responsive"></a>  
</div>
</div>
</div>
</div>
<p>Click the above recommended product to proceed next.</p>
<a style="background: #000; color: #fff; padding: 10px 35px;  border-radius: 10px; margin-top: 3px; display: inline-block;  margin-bottom: 10px;" href="{{ route('user-dashboard') }}">Go to dashboard</a>
<h5 style="margin-top: 20px; margin-bottom: 15px;">Refer and Earn</h5>
<a href="#" data-toggle="modal" data-target="#exampleModal" style="background: #5EB495; color: #fff; padding: 8px 20px; border-radius: 12px; font-size: 14px;"><i class="fa fa-share" style="margin-right: 6px;" aria-hidden="true"></i> Share </a>
</div>
</section>


@if(session()->has('already_refer_friend'))
@php
$refer_email = \Session::get('refer_email');
$refer_name = \Session::get('refer_name');
$refer_mobile = \Session::get('refer_mobile');
@endphp
@else 
@php
$refer_email = '';
$refer_name = '';
$refer_mobile = '';
@endphp
@endif

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refer a Friend</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -9px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(session()->has('already_refer_friend'))
          <p style="color: #f00;">Oops, you referred someone who was already registered.</p>
        @endif
        @if(session()->has('refer_friend'))
          <p style="color: green;">Invitation sent successfully</p>
        @endif

        <form method="post" action="{{ route('refers') }}">
          <div class="form-group">
            <label class="sub-label">Name*</label>
            <input name="name" class="form-control" value="{{ $refer_name }}" required="true" type="text">
            @if($errors->has('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          
          <div class="form-group">
            <label class="sub-label">Mobile Number*</label>
            <input name="mobile" class="form-control" value="{{ $refer_mobile }}" required="true" type="number">
            @if($errors->has('mobile'))
            <span class="text-danger">{{$errors->first('mobile')}}</span>
            @endif
          </div>
          {{ csrf_field() }}  
          
          <div class="form-group">
            <label class="sub-label">Email ID*</label>
            <input name="email" class="form-control" value="{{ $refer_email }}" required="true" type="email">
            @if($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
          </div>
          <div class="col-md-12 text-center">
            <button class="ref_btn" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection    