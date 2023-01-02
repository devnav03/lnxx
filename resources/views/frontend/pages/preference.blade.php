@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>Bank Preference</h2>
<!-- <h6>Please select bank for preference</h6> -->

<form action="{{ route('save-preference') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-12" style="margin-top: 20px;">
    <label style="font-weight: normal; font-size: 15px;"><input type="radio" @if($service->decide_by == 0) checked @endif  onclick="javascript:yesnoCheck();" name="decide_by" id="yesCheck" value="0" style="margin-top: 3px; float: left; margin-right: 8px; width: 16px; margin-bottom: 8px;"> Yes lnxx will decide</label><br>
    <label style="font-weight: normal; font-size: 15px;"><input type="radio" @if($service->decide_by == 1) checked @endif onclick="javascript:yesnoCheck();" name="decide_by" value="1" id="noCheck" style="margin-top: 3px; float: left; margin-right: 8px; width: 16px; margin-bottom: 5px;"> No i will decide</label>
  </div>
  @if($service)
  <div class="col-md-6" id="bank_select" @if($service->decide_by == 0) style="margin-top: 15px; display:none" @else style="margin-top: 15px;" @endif >
    <!-- <label style="margin-bottom: 10px;">Select bank for {{ $service->name }}</label> -->
    <input type="hidden" name="apply_id[]" value="{{ $service->id }}">
@php
    $sel_bank = get_sel_bank($service->id);
@endphp  
      <label style="font-weight: normal; margin-bottom: 5px; font-size: 15px;">Bank</label>  
      <select name="bank_id" class="form-control" id="bank_select_field" @if($service->decide_by == 1) required="true" @endif>
        <option value="">Select</option>
        @foreach(get_prefer_bank($service->service_id) as $bank)
          <option value="{{ $bank->id }}" @if($bank->id == $service->bank_id) selected @endif>{{ $bank->name }}</option>
        @endforeach
      </select>
  </div>
  @endif
  <div class="col-md-12 text-center">
    <a href="{{ route('product-requested') }}" class="back_btn">Back</a> &nbsp;&nbsp;
    <button type="submit">Proceed</button>
  </div>
</div>
</form>
</div>
</div>
<div class="col-md-5">
  <div class="service-step">
    <h3>Services is only a few step away from you</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>

  <div class="service-step">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <h3>Get money in just a step way*</h3>
    <p style="border-top: 1px solid rgba(0, 0, 0, 0.5);padding-top: 30px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus dis adipiscing ac, consectetur quis aenean. Semper viverra maecenas pharetra tristique tempus platea elit viverra. Proin mauris suspendisse risus sem. In diam odio commodo, sodales tellus convallis tortor. Neque amet eget amet morbi ac at habitant. Enim eget aliquam tempus duis amet. Sed amet sed bibendum ullamcorper. Nam bibendum eu magna in in eget ullamcorper ultrices. Faucibus gravida tristique erat quam tincidunt tincidunt ut morbi.</p>
  </div>

</div>

</div>
</div>
</section>

<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('bank_select').style.display = 'none';
        $("#bank_select_field").removeAttr('required');
    } else {
        document.getElementById('bank_select').style.display = 'block';
        $("#bank_select_field").attr("required", true);
    }
}
</script>
@endsection    