@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Personal Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('cm-details') }}" method="post">
{{ csrf_field() }}  

<div class="row">  
<div class="col-md-12">
@if($result)
<h6 id="salaried" class="cm_type @if($result->cm_type == 1) active @endif">Salaried</h6>
<h6 id="self_employed" class="cm_type @if($result->cm_type == 2) active @endif">Self Employed</h6>
<h6 id="other_employed"  class="cm_type @if($result->cm_type == 3) active @endif">Other</h6>
<input type="hidden" id="cm_type" name="cm_type" value="{{ $result->cm_type }}">
@else
<h6 id="salaried" class="cm_type active">Salaried</h6>
<h6 id="self_employed" class="cm_type">Self Employed</h6>
<h6 id="other_employed"  class="cm_type">Other</h6>
<input type="hidden" id="cm_type" name="cm_type" value="1">
@endif
</div>

<div class="col-md-12">
<label>Name As Per Passport</label>
</div>
<div class="col-md-2">
  <label class="sub-label">Salutation</label>
  <select name="salutation" class="form-control" required="true">
    @if($result)
    <option value="Mr." @if($result->salutation == 'Mr.') selected @endif >Mr.</option>
    <option value="Mrs." @if($result->salutation == 'Mrs.') selected @endif>Mrs.</option>
    <option value="Miss." @if($result->salutation == 'Miss.') selected @endif>Miss</option>
    <option value="Dr." @if($result->salutation == 'Dr.') selected @endif>Dr.</option>
    <option value="Prof." @if($result->salutation == 'Prof.') selected @endif>Prof.</option>
    <option value="Rev." @if($result->salutation == 'Rev.') selected @endif>Rev.</option>
    <option value="Other" @if($result->salutation == 'Other') selected @endif>Other</option>
    @else
    <option value="Mr.">Mr.</option>
    <option value="Mrs.">Mrs.</option>
    <option value="Miss.">Miss</option>
    <option value="Dr.">Dr.</option>
    <option value="Prof.">Prof.</option>
    <option value="Rev.">Rev.</option>
    <option value="Other">Other</option>
    @endif
  </select>
</div>
<div class="col-md-10">
  <div class="row">  
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">First Name</label>
        <input name="first_name_as_per_passport" class="form-control" @if($result) value="{{ $result->first_name_as_per_passport }}" @else value="{{ old('first_name_as_per_passport') }}" @endif type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
        @if($errors->has('first_name_as_per_passport'))
        <span class="text-danger">{{$errors->first('first_name_as_per_passport')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Middle Name</label>
        <input name="middle_name" class="form-control"  @if($result) value="{{ $result->middle_name }}" @else value="{{ old('middle_name') }}" @endif type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
        @if($errors->has('middle_name'))
        <span class="text-danger">{{$errors->first('middle_name')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Last Name</label>
        <input name="last_name" class="form-control" @if($result) value="{{ $result->last_name }}" @else value="{{ old('last_name') }}" @endif type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
        @if($errors->has('last_name'))
        <span class="text-danger">{{$errors->first('last_name')}}</span>
        @endif
      </div>
    </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Embossing Name</label>
      <input name="embossing_name" class="form-control" @if($result) value="{{ $result->embossing_name }}" @else  value="{{ old('embossing_name') }}" @endif type="text" required="true">
      @if($errors->has('embossing_name'))
      <span class="text-danger">{{$errors->first('embossing_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Country</label>
    <select name="nationality" class="form-control" required="true">
      <option value="">Select</option>
      @foreach($countries as $country)
        <option value="{{ $country->id }}" @if(isset($result->nationality)) @if($result->nationality == $country->id) selected  @endif @endif >{{ $country->country_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-12">
    <label>Passport Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="passport_number" class="form-control" @if($result) value="{{ $result->passport_number }}" @else value="{{ old('passport_number') }}"  @endif type="text" required="true">
      @if($errors->has('passport_number'))
      <span class="text-danger">{{$errors->first('passport_number')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Expiry Date</label>
      <input name="passport_expiry_date" class="form-control" onfocus="(this.type='date')" @if(isset($result->passport_expiry_date)) value="{{ date('d M, Y', strtotime($result->passport_expiry_date)) }}" @else value="{{ old('passport_expiry_date') }}" @endif type="text" required="true">
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
      <input name="visa_sponsor" class="form-control" @if($result) value="{{ $result->visa_sponsor }}" @else value="{{ old('visa_sponsor') }}" @endif type="text">
      @if($errors->has('visa_sponsor'))
      <span class="text-danger">{{$errors->first('visa_sponsor')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Number</label>
      <input name="visa_number" class="form-control" @if($result) value="{{ $result->visa_number }}" @else value="{{ old('visa_number') }}" @endif type="text">
      @if($errors->has('visa_number'))
      <span class="text-danger">{{$errors->first('visa_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Expiry Date</label>
      <input name="visa_expiry_date" class="form-control" onfocus="(this.type='date')" @if(isset($result->visa_expiry_date)) value="{{ date('d M, Y', strtotime($result->visa_expiry_date)) }}" @else value="{{ old('visa_expiry_date') }}" @endif type="text">
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
      <input name="nationality_name" class="form-control" @if($result) value="{{ $result->nationality_name }}" @else value="{{ old('nationality_name') }}" @endif type="text">
      @if($errors->has('nationality_name'))
      <span class="text-danger">{{$errors->first('nationality_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="multiple_passport_number" class="form-control" @if($result) value="{{ $result->multiple_passport_number }}" @else value="{{ old('multiple_passport_number') }}" @endif type="text">
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
      <input name="eid_number" class="form-control" @if($result) value="{{ $result->eid_number }}" @else value="{{ old('eid_number') }}" @endif required="true" type="text">
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
      @if($result)
      <option value="0" @if($result->years_in_uae == 0) selected @endif>0</option>
      <option value="1" @if($result->years_in_uae == 1) selected @endif>1</option>
      <option value="2" @if($result->years_in_uae == 2) selected @endif>2</option>
      <option value="3" @if($result->years_in_uae == 3) selected @endif>3</option>
      <option value="4" @if($result->years_in_uae == 4) selected @endif>4</option>
      <option value="5" @if($result->years_in_uae == 5) selected @endif>5</option>
      <option value="6" @if($result->years_in_uae == 6) selected @endif>6</option>
      <option value="7" @if($result->years_in_uae == 7) selected @endif>7</option>
      <option value="8" @if($result->years_in_uae == 8) selected @endif>8</option>
      <option value="9" @if($result->years_in_uae == 9) selected @endif>9</option>
      <option value="10" @if($result->years_in_uae == 10) selected @endif>10</option>
      <option value="10+" @if($result->years_in_uae == '10+') selected @endif>10+</option>
      @else
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
      @endif
    </select>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Favorite City <span>(As A Security Feature)</span></label>
    <input name="favorite_city" class="form-control" @if($result) value="{{ $result->favorite_city }}" @else value="{{ old('favorite_city') }}" @endif required="true" type="text">
      @if($errors->has('favorite_city'))
      <span class="text-danger">{{$errors->first('favorite_city')}}</span>
      @endif
  </div>

<div class="col-md-12">
  <p class="chk_bx"> @if($result) <input required="true" checked="" type="checkbox"> @else <input required="true" type="checkbox"> @endif By proceeding, you agree to the <a href="#">Terms and Conditions</a></p>
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