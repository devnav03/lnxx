@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>CM Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('cm-details') }}" method="post">
{{ csrf_field() }}  


<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Embossing Name</label>
      <input name="embossing_name" class="form-control" value="{{ old('embossing_name') }}" type="text" required="true">
      @if($errors->has('embossing_name'))
      <span class="text-danger">{{$errors->first('embossing_name')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-12">
    <label>Passport Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="passport_number" class="form-control" value="{{ old('passport_number') }}" type="text" required="true">
      @if($errors->has('passport_number'))
      <span class="text-danger">{{$errors->first('passport_number')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Expiry Date</label>
      <input name="passport_expiry_date" class="form-control" value="{{ old('passport_expiry_date') }}" type="date" required="true">
      @if($errors->has('passport_expiry_date'))
      <span class="text-danger">{{$errors->first('passport_expiry_date')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-12">
    <label>Visa Details</label>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Sponsor</label>
      <input name="visa_sponsor" class="form-control" value="{{ old('visa_sponsor') }}" type="text">
      @if($errors->has('visa_sponsor'))
      <span class="text-danger">{{$errors->first('visa_sponsor')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Number</label>
      <input name="visa_number" class="form-control" value="{{ old('visa_number') }}" type="text">
      @if($errors->has('visa_number'))
      <span class="text-danger">{{$errors->first('visa_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Expiry Date</label>
      <input name="visa_expiry_date" class="form-control" value="{{ old('visa_expiry_date') }}" type="date">
      @if($errors->has('visa_expiry_date'))
      <span class="text-danger">{{$errors->first('visa_expiry_date')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label>Multiple Nationality Holder Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nationality Name</label>
      <input name="nationality_name" class="form-control" value="{{ old('nationality_name') }}" type="text">
      @if($errors->has('nationality_name'))
      <span class="text-danger">{{$errors->first('nationality_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="multiple_passport_number" class="form-control" value="{{ old('multiple_passport_number') }}" type="text">
      @if($errors->has('multiple_passport_number'))
      <span class="text-danger">{{$errors->first('multiple_passport_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label>Emirates Id Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Eid Number</label>
      <input name="eid_number" class="form-control" value="{{ old('eid_number') }}" required="true" type="text">
      @if($errors->has('eid_number'))
      <span class="text-danger">{{$errors->first('eid_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Marital Status</label>
    <select name="marital_status" class="form-control" required="true">
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Others">Others</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Years In Uae</label>
    <select name="years_in_uae" class="form-control" required="true">
      <option value="">Select</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="10+">10+</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Favorite City <span>(As A Security Feature)</span></label>
    <input name="favorite_city" class="form-control" value="{{ old('favorite_city') }}" required="true" type="text">
      @if($errors->has('favorite_city'))
      <span class="text-danger">{{$errors->first('favorite_city')}}</span>
      @endif
  </div>

<div class="col-md-12">
  <p class="chk_bx"><input required="true" type="checkbox"> By proceeding, you agree to the <a href="#">Terms and Conditions</a></p>
</div>
  <div class="col-md-12 text-center">
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


@endsection    