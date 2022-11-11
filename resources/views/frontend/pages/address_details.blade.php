@extends('frontend.layouts.app')
@section('content')

<section class="personal_details add_dt">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Address Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('select-services') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-12">
    <label>Residential Address Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 1</label>
      <input name="residential_address_line_1" class="form-control" @if($result) value="{{ $result->residential_address_line_1 }}" @else value="{{ old('residential_address_line_1') }}" @endif type="text" required="true">
      @if($errors->has('residential_address_line_1'))
      <span class="text-danger">{{$errors->first('residential_address_line_1')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 2</label>
      <input name="residential_address_line_2" @if($result) value="{{ $result->residential_address_line_2 }}" @else value="{{ old('residential_address_line_2') }}" @endif class="form-control" type="text">
      @if($errors->has('residential_address_line_2'))
      <span class="text-danger">{{$errors->first('residential_address_line_2')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 3</label>
      <input name="residential_address_line_3" @if($result) value="{{ $result->residential_address_line_3 }}" @else value="{{ old('residential_address_line_3') }}" @endif class="form-control" type="text">
      @if($errors->has('residential_address_line_3'))
      <span class="text-danger">{{$errors->first('residential_address_line_3')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nearest Landmark</label>
      <input name="residential_address_nearest_landmark" @if($result) value="{{ $result->residential_address_nearest_landmark }}" @else value="{{ old('residential_address_nearest_landmark') }}" @endif class="form-control" type="text">
      @if($errors->has('residential_address_nearest_landmark'))
      <span class="text-danger">{{$errors->first('residential_address_nearest_landmark')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirate</label>
      <input name="residential_emirate" @if($result) value="{{ $result->residential_emirate }}" @else value="{{ old('residential_emirate') }}" @endif class="form-control" type="text">
      @if($errors->has('residential_emirate'))
      <span class="text-danger">{{$errors->first('residential_emirate')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">PO Box No</label>
      <input name="residential_po_box" @if($result) value="{{ $result->residential_po_box }}" @else value="{{ old('residential_po_box') }}" @endif class="form-control" type="text">
      @if($errors->has('residential_po_box'))
      <span class="text-danger">{{$errors->first('residential_po_box')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Resdence Type</label>
      <select name="resdence_type" class="form-control" required="true">
        @if($result)
        <option value="Shared" @if($result->resdence_type == 'Shared') selected @endif >Shared</option>
        <option value="Rented" @if($result->resdence_type == 'Rented') selected @endif >Rented</option>
        <option value="Owned" @if($result->resdence_type == 'Owned') selected @endif >Owned</option>
        <option value="Employer Provided" @if($result->resdence_type == 'mployer Provided') selected @endif >Employer Provided</option>
        <option value="Living With Parents" @if($result->resdence_type == 'Living With Parents') selected @endif >Living With Parents</option>
        @else
        <option value="Shared">Shared</option>
        <option value="Rented">Rented</option>
        <option value="Owned">Owned</option>
        <option value="Employer Provided">Employer Provided</option>
        <option value="Living With Parents">Living With Parents</option>
        @endif
      </select>
      @if($errors->has('resdence_type'))
      <span class="text-danger">{{$errors->first('resdence_type')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Rent</label>
      <input name="annual_rent" @if($result) value="{{ $result->annual_rent }}" @else value="{{ old('annual_rent') }}" @endif class="form-control" type="number">
      @if($errors->has('annual_rent'))
      <span class="text-danger">{{$errors->first('annual_rent')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Duration At Current Address</label>
      <input name="duration_at_current_address" @if($result) value="{{ $result->duration_at_current_address }}" @else value="{{ old('duration_at_current_address') }}" @endif class="form-control" type="number">
      @if($errors->has('duration_at_current_address'))
      <span class="text-danger">{{$errors->first('duration_at_current_address')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label>Office Address</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Name</label>
      <input name="company_name" @if($result) value="{{ $result->company_name }}" @else value="{{ old('company_name') }}" @endif class="form-control"  type="text">
      @if($errors->has('company_name'))
      <span class="text-danger">{{$errors->first('company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Phone No</label>
      <input name="company_phone_no" @if($result) value="{{ $result->company_phone_no }}" @else value="{{ old('company_phone_no') }}" @endif class="form-control" type="text">
      @if($errors->has('company_phone_no'))
      <span class="text-danger">{{$errors->first('company_phone_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 1</label>
      <input name="company_address_line_1" @if($result) value="{{ $result->company_address_line_1 }}" @else value="{{ old('company_address_line_1') }}" @endif class="form-control" type="text">
      @if($errors->has('company_address_line_1'))
      <span class="text-danger">{{$errors->first('company_address_line_1')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 2</label>
      <input name="company_address_line_2" @if($result) value="{{ $result->company_address_line_2 }}" @else value="{{ old('company_address_line_2') }}" @endif class="form-control" type="text">
      @if($errors->has('company_address_line_2'))
      <span class="text-danger">{{$errors->first('company_address_line_2')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 3</label>
      <input name="company_address_line_3" @if($result) value="{{ $result->company_address_line_3 }}" @else value="{{ old('company_address_line_3') }}" @endif class="form-control" type="text">
      @if($errors->has('company_address_line_3'))
      <span class="text-danger">{{$errors->first('company_address_line_3')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Po Box No</label>
      <input name="company_po_box" @if($result) value="{{ $result->company_po_box }}" @else value="{{ old('company_po_box') }}" @endif class="form-control" type="text">
      @if($errors->has('company_po_box'))
      <span class="text-danger">{{$errors->first('company_po_box')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirate</label>
      <input name="company_emirate" @if($result) value="{{ $result->company_emirate }}" @else value="{{ old('company_emirate') }}" @endif class="form-control" type="text">
      @if($errors->has('company_emirate'))
      <span class="text-danger">{{$errors->first('company_emirate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label>Permanent Address In Home Country</label>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 1</label>
      <input name="permanent_address_home_country_line_1" @if($result) value="{{ $result->permanent_address_home_country_line_1 }}" @else value="{{ old('permanent_address_home_country_line_1') }}" @endif class="form-control"  type="text">
      @if($errors->has('permanent_address_home_country_line_1'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_1')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 2</label>
      <input name="permanent_address_home_country_line_2" @if($result) value="{{ $result->permanent_address_home_country_line_2 }}" @else value="{{ old('permanent_address_home_country_line_2') }}" @endif class="form-control" type="text">
      @if($errors->has('permanent_address_home_country_line_2'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_2')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 3</label>
      <input name="permanent_address_home_country_line_3" @if($result) value="{{ $result->permanent_address_home_country_line_3 }}" @else value="{{ old('permanent_address_home_country_line_3') }}" @endif  class="form-control" type="text">
      @if($errors->has('permanent_address_home_country_line_3'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_3')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">City</label>
      <input name="permanent_address_city" @if($result) value="{{ $result->permanent_address_city }}" @else value="{{ old('permanent_address_city') }}" @endif class="form-control" type="text">
      @if($errors->has('permanent_address_city'))
      <span class="text-danger">{{$errors->first('permanent_address_city')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Country</label>
      <select name="permanent_address_country" class="form-control" required="true">
      <option value="">Select</option>
      @foreach($countries as $country)
        <option value="{{ $country->id }}" @if(isset($result->permanent_address_country)) @if($result->permanent_address_country == $country->id) selected  @endif @endif >{{ $country->country_name }}</option>
      @endforeach
    </select>
      @if($errors->has('permanent_address_country'))
      <span class="text-danger">{{$errors->first('permanent_address_country')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Zip/Pin Code</label>
      <input name="permanent_address_zipcode" @if($result) value="{{ $result->permanent_address_zipcode }}" @else value="{{ old('permanent_address_zipcode') }}" @endif class="form-control" type="number">
      @if($errors->has('permanent_address_zipcode'))
      <span class="text-danger">{{$errors->first('permanent_address_zipcode')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Tel. with IDD Code</label>
      <input name="permanent_addresstel_with_idd_code" @if($result) value="{{ $result->permanent_addresstel_with_idd_code }}" @else value="{{ old('permanent_addresstel_with_idd_code') }}" @endif class="form-control" type="text">
      @if($errors->has('permanent_addresstel_with_idd_code'))
      <span class="text-danger">{{$errors->first('permanent_addresstel_with_idd_code')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-12 text-center">
    <a href="{{ route('education-detail') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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