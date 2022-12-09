@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Personal Details</h2>
<h6>Please enter your information to check the offer.</h6>

<form action="{{ route('cm-details') }}" enctype="multipart/form-data" method="post">
{{ csrf_field() }}  
<div class="row">  
<div class="col-md-12">
<label>Name As Per Passport</label>
</div>
<div class="col-md-2">
  <label class="sub-label">Salutation*</label>
  <select name="salutation" class="form-control" required="true">
    <option value="Mr." @if($user->salutation == 'Mr.') selected @endif >Mr.</option>
    <option value="Mrs." @if($user->salutation == 'Mrs.') selected @endif>Mrs.</option>
    <option value="Miss." @if($user->salutation == 'Miss.') selected @endif>Miss</option>
    <option value="Dr." @if($user->salutation == 'Dr.') selected @endif>Dr.</option>
    <option value="Prof." @if($user->salutation == 'Prof.') selected @endif>Prof.</option>
    <option value="Rev." @if($user->salutation == 'Rev.') selected @endif>Rev.</option>
    <option value="Other" @if($user->salutation == 'Other') selected @endif>Other</option>
  </select>
</div>
<div class="col-md-10">
  <div class="row">  
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">First Name*</label>
        <input name="first_name_as_per_passport" class="form-control" value="{{ $user->name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
        @if($errors->has('first_name_as_per_passport'))
        <span class="text-danger">{{$errors->first('first_name_as_per_passport')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Middle Name</label>
        <input name="middle_name" class="form-control" value="{{ $user->middle_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
        @if($errors->has('middle_name'))
        <span class="text-danger">{{$errors->first('middle_name')}}</span>
        @endif
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="sub-label">Last Name*</label>
        <input name="last_name" required="true" class="form-control" value="{{ $user->last_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
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
      <label class="sub-label">DOB*</label>
      <input name="date_of_birth" class="form-control" @if($result) value="{{ \Auth::user()->date_of_birth }}" @else  value="{{ old('date_of_birth') }}" @endif type="date" required="true">
      @if($errors->has('date_of_birth'))
      <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Gender*</label>  
    <select name="gender" class="form-control" required="true">
    <option value="Male" @if(\Auth::user()->date_of_birth == 'Male') selected @endif>Male</option>
    <option value="Female" @if(\Auth::user()->date_of_birth == 'Female') selected @endif>Female</option>
    <option value="Other" @if(\Auth::user()->date_of_birth == 'Other') selected @endif>Other</option>
    </select>
    @if($errors->has('gender'))
    <span class="text-danger">{{$errors->first('gender')}}</span>
    @endif
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nationality*</label>
      <select name="nationality" class="form-control" required="true">
        <option value="">select</option>
        @foreach($countries as $country)
          <option value="{{ $country->id }}" @if($result) @if($result->nationality == $country->id) selected @endif @endif >{{ $country->country_name }}</option>
        @endforeach
      </select>

      @if($errors->has('nationality'))
      <span class="text-danger">{{$errors->first('nationality')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Years In UAE*</label>
      <input name="years_in_uae" class="form-control" required="true" @if($result) value="{{ $result->years_in_uae }}" @else value="{{ old('years_in_uae') }}" @endif type="number">
      @if($errors->has('years_in_uae'))
      <span class="text-danger">{{$errors->first('years_in_uae')}}</span>
      @endif
  </div>

  <div class="col-md-6">
    <label class="sub-label">Marital Status*</label>
    <select name="marital_status" class="form-control" required="true">
      <option value="Single">Single</option>
      <option value="Married">Married</option>
      <option value="Others">Others</option>
    </select>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No of Dependents*</label>
      <input name="no_of_dependents" class="form-control" required="true" @if($result) value="{{ $result->no_of_dependents }}" @else value="{{ old('no_of_dependents') }}" @endif type="number">
      @if($errors->has('no_of_dependents'))
      <span class="text-danger">{{$errors->first('no_of_dependents')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirates ID Number*</label>
      <input name="eid_number" pattern="\d*" class="form-control" maxlength="16" minlength="16" value="{{ $user->eid_number }}" required="true" type="text">
      @if($errors->has('eid_number'))
      <span class="text-danger">{{$errors->first('eid_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Agent Reference Number</label>
      <input name="reference_number" class="form-control" @if($result) value="{{ $result->reference_number }}" @else value="{{ old('reference_number') }}" @endif type="text">
      @if($errors->has('reference_number'))
      <span class="text-danger">{{$errors->first('reference_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload Emirates id front side <span style="font-size: 13px;">(750x400 px / .png, .jpg, .jpeg)*</span></label>
      @if(\Auth::user()->emirates_id)
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp" style="box-shadow: none; margin-top: 3px;" name="emirates_id_front">
        <img src="{!! asset(\Auth::user()->emirates_id) !!}" id="blah" class="img-responsive">
      @else
          <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp" style="box-shadow: none; margin-top: 3px;" name="emirates_id_front">
          <img src="" id="blah" class="img-responsive">
      @endif
      @if($errors->has('emirates_id_front'))
        <span class="text-danger">{{$errors->first('emirates_id_front')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload Emirates id back side <span style="font-size: 13px;">(750x400 px / .png, .jpg, .jpeg)*</span></label>
      @if(\Auth::user()->emirates_id_back)
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp1" style="box-shadow: none; margin-top: 3px;" name="emirates_id_back">
         <img src="{!! asset(\Auth::user()->emirates_id_back) !!}" id="blah1" class="img-responsive">
      @else
        <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp1" style="box-shadow: none; margin-top: 3px;" name="emirates_id_back">
        <img src="" id="blah1" class="img-responsive">
      @endif
      @if($errors->has('emirates_id_back'))
        <span class="text-danger">{{$errors->first('emirates_id_back')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Visa Number</label>
      <input name="visa_number" class="form-control" @if($result) value="{{ $result->visa_number }}" @else value="{{ old('visa_number') }}" @endif type="text">
      @if($errors->has('visa_number'))
      <span class="text-danger">{{$errors->first('visa_number')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Official Mail ID</label>
      <input name="officer_email" class="form-control" @if($result) value="{{ $result->officer_email }}" @else value="{{ old('officer_email') }}" @endif type="email">
      @if($errors->has('officer_email'))
      <span class="text-danger">{{$errors->first('officer_email')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Upload Passport <span style="font-size: 13px;">(600x600 px / .png, .jpg, .jpeg)*</span></label>
      @if(isset($result->passport_photo))
        <input type="file" accept="image/png, image/jpg, image/jpeg" id="imgInp2" style="box-shadow: none; margin-top: 3px;" name="passport_photo">
        <img src="{!! asset($result->passport_photo) !!}" id="blah2" class="img-responsive">
      @else
        <input type="file" required="true" accept="image/png, image/jpg, image/jpeg" id="imgInp2" style="box-shadow: none; margin-top: 3px;" name="passport_photo">
        <img src="" id="blah2" class="img-responsive">
      @endif
      @if($errors->has('passport_photo'))
        <span class="text-danger">{{$errors->first('passport_photo')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Credit Score</label>
      <input name="credit_score" class="form-control" @if($result) value="{{ $result->credit_score }}" @else value="{{ old('credit_score') }}" @endif type="number">
      @if($errors->has('credit_score'))
      <span class="text-danger">{{$errors->first('credit_score')}}</span>
      @endif
    </div>
  </div>




  <!-- <div class="col-md-6">
    <label class="sub-label">Country</label>
    <select name="nationality" class="form-control" required="true">
      <option value="">Select</option>
      @foreach($countries as $country)
        <option value="{{ $country->id }}" @if(isset($result->nationality)) @if($result->nationality == $country->id) selected  @endif @else @if($country->id == 229) selected @endif @endif >{{ $country->country_name }}</option>
      @endforeach
    </select>
  </div> -->
  <!-- <div class="col-md-12">
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
      <input name="passport_expiry_date" class="form-control" onfocus="(this.type='date')" @if(isset($result->passport_expiry_date)) value="{{ $result->passport_expiry_date }}" @else value="{{ old('passport_expiry_date') }}" @endif type="text" required="true">
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
      <label class="sub-label">Visa Expiry Date</label>
      <input name="visa_expiry_date" class="form-control" onfocus="(this.type='date')" @if(isset($result->visa_expiry_date)) value="{{ $result->visa_expiry_date }}" @else value="{{ old('visa_expiry_date') }}" @endif type="text">
      @if($errors->has('visa_expiry_date'))
      <span class="text-danger">{{$errors->first('visa_expiry_date')}}</span>
      @endif
    </div>
  </div> -->

<div class="col-md-12">
  <p class="chk_bx"> @if($result) <input required="true" checked="" type="checkbox"> @else <input required="true" type="checkbox"> @endif By proceeding, you agree to the <a href="#">Terms and Conditions</a></p>
</div>
  <div class="col-md-12 text-center">
    <a href="{{ route('user-dashboard') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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