@extends('admin.layouts.admin')
@section('content')
@php
    $route  = \Route::currentRouteName();    
@endphp
<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">
            <h1 class="page-header">Customer <a class="btn btn-sm btn-primary pull-right" href="{!! route('customer') !!}"> <i class="fa fa-arrow-left"></i> All Customers </a></h1>
            <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                            <div class="form-title">
                                <h4>Customer Information</h4>                        
                            </div>
                            <div class="form-body">
                                @if($route == 'customer.create')
                                    {!! Form::open(array('method' => 'POST', 'route' => array('customer.store'), 'id' => 'ajaxSave', 'class' => '')) !!}
                                @elseif($route == 'customer.edit')
                                    {!! Form::model($result, array('route' => array('customer.update', $result->id), 'method' => 'PATCH', 'id' => 'customer-form', 'class' => '')) !!}
                                @else
                                    Nothing
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            {!! Form::label('name', lang('Name'), array('class' => '')) !!}
                                            @if(!empty($result->id))
                                                {!! Form::text('name', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            @else
                                                {!! Form::text('name', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            @endif 
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            {!! Form::label('email', lang('Email'), array('class' => '')) !!}
                                            @if(!empty($result->id))
                                                {!! Form::email('email', null, array('class' => 'form-control','readonly')) !!}
                                            @else
                                                {!! Form::email('email', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            @endif 
                                            @if($errors->has('email'))
                                             <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div> 
                                    </div>
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group"> 
                                            {!! Form::label('mobile', lang('Mobile'), array('class' => '')) !!}
                                            
                                            @if(!empty($result->id))
                                                {!! Form::number('mobile', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            @else
                                                {!! Form::number('mobile', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            @endif
                                            @if($errors->has('mobile'))
                                             <span class="text-danger">{{$errors->first('mobile')}}</span>
                                            @endif
                                            
                                        </div> 
                                    </div>
                                    <input type="hidden" value="{{ $result->user_type }}" name="user_type">

                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group"> 
                                        {!! Form::label('date_of_birth', lang('Date of Birth'), array('class' => '')) !!}
                                       
                                        @if($result->date_of_birth)
                                        <input type="text" value="{{ date('d M, Y', strtotime($result->date_of_birth)) }}" readonly="" class="form-control"> 
                                        @else
                                        {!! Form::date('date_of_birth', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                        @endif

                                        @if($errors->has('date_of_birth'))
                                            <span class="text-danger">{{$errors->first('date_of_birth')}}</span>
                                        @endif
                                        </div> 
                                    </div> 
                                    
                                    @if($result->gender)
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group"> 
                                        {!! Form::label('gender', lang('Gender'), array('class' => '')) !!}
                                        <input type="text" value="{{ $result->gender }}" readonly="" class="form-control"> 
                                        <!-- <select name="gender" required="true" class="form-control">
                                          <option value="">Select</option>
                                          @if(isset($result))
                                          <option value="Male" @if($result->gender == 'Male') selected @endif>Male</option>
                                          <option value="Female" @if($result->gender == 'Female') selected @endif>Female</option>
                                          @else
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                          @endif
                                        </select> -->
                                   
                                        @if($errors->has('gender'))
                                            <span class="text-danger">{{$errors->first('gender')}}</span>
                                        @endif
                                        </div> 
                                    </div>
                                    @endif
            

                                    @if(isset($result))
                                    @else

                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group"> 
                                          {!! Form::label('password', lang('Password'), array('class' => '')) !!}
                                            {!! Form::password('password', null, array('class' => 'form-control', 'required'=> 'true')) !!}
                                            <span style="font-size: 12px;">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>
                                            @if($errors->has('password'))
                                             <span class="text-danger"><br>{{$errors->first('password')}}</span>
                                            @endif
                                        </div> 
                                    </div>
                                    @endif
                                   
                                    @if(isset($result->profile_image))
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <label>Profile Image</label><br>
                                        <img id="blah" src="{{ $result->profile_image }}" style="max-width: 150px;margin-top: 10px;" alt="" />
                                    </div>    
                                    @endif

                                    <input type="hidden" value="normal" name="provider">
                                    <div class="col-md-6" style="margin-top: 20px;">
                                   <!--  <button type="submit" class="btn btn-default w3ls-button">Submit</button>  -->
                                    </div> 
                            </div>
                                    
                                {!! Form::close() !!}
                            </div>
                            
                        </div>
                    </div>
                </div>
                </div> 
                </div>
            
            @if($customer_onboarding)
            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Basic Information</h4>                        
                                </div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <h6 id="salaried" class="cm_type @if($customer_onboarding->cm_type == 1) active @endif">Salaried</h6>
                                        <h6 id="self_employed" class="cm_type @if($customer_onboarding->cm_type == 2) active @endif">Self Employed</h6>
                                        <h6 id="other_employed"  class="cm_type @if($customer_onboarding->cm_type == 3) active @endif">Other</h6>
                                        <input type="hidden" id="cm_type" name="cm_type" value="{{ $customer_onboarding->cm_type }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label style="margin-top: 15px; font-size: 15px; font-weight: 500;">Name As Per Passport</label>
                                            </div>
                                            <div class="col-md-2">
                                              <label class="sub-label">Salutation</label>
                                              <select name="salutation" class="form-control" required="true">
                                                <option @if($customer_onboarding->salutation == 'Mr.') selected @endif value="Mr.">Mr.</option>
                                                <option @if($customer_onboarding->salutation == 'Mrs.') selected @endif value="Mrs.">Mrs.</option>
                                                <option @if($customer_onboarding->salutation == 'Miss.') selected @endif value="Miss.">Miss</option>
                                                <option @if($customer_onboarding->salutation == 'Dr.') selected @endif value="Dr.">Dr.</option>
                                                <option @if($customer_onboarding->salutation == 'Prof.') selected @endif value="Prof.">Prof.</option>
                                                <option @if($customer_onboarding->salutation == 'Rev.') selected @endif value="Rev.">Rev.</option>
                                                <option @if($customer_onboarding->salutation == 'Other') selected @endif value="Other">Other</option>
                                              </select>
                                            </div>
                                            <div class="col-md-10">
                                              <div class="row">  
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">First Name</label>
                                                    <input name="first_name_as_per_passport" class="form-control" value="{{ $customer_onboarding->first_name_as_per_passport }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
                                                    @if($errors->has('first_name_as_per_passport'))
                                                    <span class="text-danger">{{$errors->first('first_name_as_per_passport')}}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">Middle Name</label>
                                                    <input name="middle_name" class="form-control" value="{{ $customer_onboarding->middle_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
                                                    @if($errors->has('middle_name'))
                                                    <span class="text-danger">{{$errors->first('middle_name')}}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">Last Name</label>
                                                    <input name="last_name" class="form-control" value="{{ $customer_onboarding->last_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
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
      <input name="embossing_name" class="form-control" value="{{ $customer_onboarding->embossing_name }}" type="text" required="true">
          </div>
    </div>

    <div class="col-md-6">
    <label class="sub-label">Country</label>
    <select name="nationality" class="form-control" required="true">
        <option value="">Select</option>
        @foreach($country as $country)       
            <option value="{{ $country->id }}" @if($country->id == $customer_onboarding->nationality) selected @endif >{{ $country->country_name }}</option>
        @endforeach     
    </select>
    </div>
  <div class="col-md-12">
    <label style="margin-top: 15px;font-size: 15px;font-weight: 500;">Passport Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="passport_number" class="form-control" value="{{ $customer_onboarding->passport_number }}" type="text" required="true">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Expiry Date</label>
      <input name="passport_expiry_date" onfocus="(this.type='date')" class="form-control" @if($customer_onboarding->passport_expiry_date) value="{{ date('d M, Y', strtotime($customer_onboarding->passport_expiry_date)) }}" @endif type="text" required="true">
          </div>
  </div>


  <div class="col-md-12">
    <label style="margin-top: 15px;font-size: 15px;font-weight: 500;">Visa Details</label>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Sponsor</label>
      <input name="visa_sponsor" class="form-control" value="{{ $customer_onboarding->visa_sponsor }}" type="text">
          </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Number</label>
      <input name="visa_number" class="form-control" value="{{ $customer_onboarding->visa_number }}" type="text">
          </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label class="sub-label">Visa Expiry Date</label>
      <input name="visa_expiry_date" onfocus="(this.type='date')" class="form-control" @if($customer_onboarding->visa_number) value="{{ date('d M, Y', strtotime($customer_onboarding->visa_number)) }}" @endif type="text">
          </div>
  </div>

  <div class="col-md-12">
    <label style="margin-top: 15px;font-size: 15px;font-weight: 500;">Multiple Nationality Holder Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nationality Name</label>
      <input name="nationality_name" class="form-control" value="{{ $customer_onboarding->nationality_name }}" type="text">
          </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Passport Number</label>
      <input name="multiple_passport_number" class="form-control" value="{{ $customer_onboarding->multiple_passport_number }}" type="text">
          </div>
  </div>

  <div class="col-md-12">
    <label style="margin-top: 15px;font-size: 15px;font-weight: 500;">Emirates Id Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Eid Number</label>
      <input name="eid_number" class="form-control" value="{{ $customer_onboarding->eid_number }}" required="true" type="text">
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
      <option @if($customer_onboarding->years_in_uae == 0) selected @endif value="0">0</option>
      <option @if($customer_onboarding->years_in_uae == 1) selected @endif value="1">1</option>
      <option @if($customer_onboarding->years_in_uae == 2) selected @endif value="2">2</option>
      <option @if($customer_onboarding->years_in_uae == 3) selected @endif value="3">3</option>
      <option @if($customer_onboarding->years_in_uae == 4) selected @endif value="4">4</option>
      <option @if($customer_onboarding->years_in_uae == 5) selected @endif value="5">5</option>
      <option @if($customer_onboarding->years_in_uae == 6) selected @endif value="6">6</option>
      <option @if($customer_onboarding->years_in_uae == 7) selected @endif value="7">7</option>
      <option @if($customer_onboarding->years_in_uae == 8) selected @endif value="8">8</option>
      <option @if($customer_onboarding->years_in_uae == 9) selected @endif value="9">9</option>
      <option @if($customer_onboarding->years_in_uae == 10) selected @endif value="10">10</option>
      <option @if($customer_onboarding->years_in_uae == '10+') selected @endif value="10+">10+</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="sub-label">Favorite City <span>(As A Security Feature)</span></label>
    <input name="favorite_city" class="form-control" value="{{ $customer_onboarding->favorite_city }}" required="true" type="text">
        </div>

</div>
         
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style type="text/css">
.form-body li{
    list-style: none;
    font-size: 16px;
    margin-bottom: 10px;
}
.form-body li span {
    color: #1777e5;
}
.cm_type {
    float: left;
    color: #000 !important;
    background: #ffff;
    padding: 9px 22px;
    border: 1px solid #000;
    border-radius: 25px;
    margin-right: 25px;
    font-size: 14px;
    /*cursor: pointer;*/
    margin-bottom: 10px;
    margin-top: 15px;
}
.cm_type.active {
    background: #FF6722;
    color: #fff !important;
}
</style>

@stop




