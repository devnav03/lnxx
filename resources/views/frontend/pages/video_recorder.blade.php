@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>Upload Video</h2>
<h6 style="color: #000;font-size: 17px;">Providing the following guidelines for the video :</h6>
<p style="color: rgba(9, 15, 5, 0.5); font-size: 14px;">Lorem ipsum dolor sit amet consectetur. Tempor cum amet ac purus sed. Faucibus lobortis bibendum eu pellentesque a morbi sit varius. Lobortis in ultricies placerat accumsan. Ac pharetra dolor aliquam libero sit at consectetur. Diam eu pulvinar mauris pulvinar enim egestas magna venenatis non. </p>
<form action="#" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  
 <span id="start"></span>

<div class="row">
  <div class="col-md-6">
  <video id="gum" playsinline autoplay muted  style="width:100%; height:200px;"></video>
  <input type="hidden" name="video" id="videofile" required="true">                                                 
  <span class="btn btn-danger" id="record"  style="padding-top: 10px;padding-left: 25px !important; padding-right: 25px !important;  padding-bottom: 10px !important; font-size: 15px; display: none;">Record</span>
  <span class="btn btn-info"   onclick="SwitchButtons('play');" id="play"  style="padding-top: 10px;  padding-left: 25px !important; padding-right: 25px !important; padding-bottom: 10px !important; font-size: 15px; display: none;" >Play</span>
<!--   <span onclick="SwitchButtons('download');"  id="download" style="display:none;"></span> -->
     <input type="hidden" id="echoCancellation" />
  </div>
  <div class="col-md-6">
  <video id="recorded" playsinline loop style="width:100%; height:200px;"></video>

  </div>
  <div class="col-md-12 text-center">
    <a href="{{ route('product-requested') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <!-- <button type="submit">Proceed</button>  -->
    <span onclick="SwitchButtons('download');"  id="download" class="upload_btn" style="display:none;">Upload</span>
    
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-5">
  <div class="service-step" style="margin-top: 0px;  border: 0px;">
<!--     <h3>Services is only a few step away from you</h3> -->
<!--     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
    <img src="{!! asset('assets/frontend/images/video_record.png') !!}" style="max-width: 83%;" class="img-responsive">
    
  </div>

<!--   <div class="service-step">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <h3>Get money in just a step way*</h3>
    <p style="border-top: 1px solid rgba(0, 0, 0, 0.5);padding-top: 30px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus dis adipiscing ac, consectetur quis aenean. Semper viverra maecenas pharetra tristique tempus platea elit viverra. Proin mauris suspendisse risus sem. In diam odio commodo, sodales tellus convallis tortor. Neque amet eget amet morbi ac at habitant. Enim eget aliquam tempus duis amet. Sed amet sed bibendum ullamcorper. Nam bibendum eu magna in in eget ullamcorper ultrices. Faucibus gravida tristique erat quam tincidunt tincidunt ut morbi.</p>
  </div> -->

</div>

</div>
</div>
</section>


@endsection    