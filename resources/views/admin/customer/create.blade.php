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


            @if($customer_onboarding)
            @if($customer_onboarding->cm_type == 1)
            @if($cm_salaried_details)
            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>CM Details</h4>                        
                                </div>
                                <div class="form-body">
                    <div class="row">        
                    <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Designation</label>
      <input name="designation" class="form-control" value="{{ $cm_salaried_details->designation }}" type="text" required="true">
      @if($errors->has('designation'))
      <span class="text-danger">{{$errors->first('designation')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Date Of Joining</label>
      <input name="date_of_joining" class="form-control" value="{{ $cm_salaried_details->date_of_joining }}" type="date">
      @if($errors->has('date_of_joining'))
      <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Department</label>
      <input name="department" class="form-control" value="{{ $cm_salaried_details->department }}" type="text">
      @if($errors->has('department'))
      <span class="text-danger">{{$errors->first('department')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Salary</label>
      <input name="monthly_salary" class="form-control" value="{{ $cm_salaried_details->monthly_salary }}" type="number">
      @if($errors->has('monthly_salary'))
      <span class="text-danger">{{$errors->first('monthly_salary')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Staff Id No.</label>
      <input name="staff_id_no" class="form-control" value="{{ $cm_salaried_details->staff_id_no }}" type="text">
      @if($errors->has('staff_id_no'))
      <span class="text-danger">{{$errors->first('staff_id_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Name Of Previous Employer</label>
      <input name="name_previous_emp" class="form-control" value="{{ $cm_salaried_details->name_previous_emp }}"  type="text">
      @if($errors->has('name_previous_emp'))
      <span class="text-danger">{{$errors->first('name_previous_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No. Of Years With Previous Employer</label>
      <input name="no_year_previous_emp" class="form-control" value="{{ $cm_salaried_details->no_year_previous_emp }}" type="number">
      @if($errors->has('no_year_previous_emp'))
      <span class="text-danger">{{$errors->first('no_year_previous_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Additional Income</label>
      <input name="monthly_add_income" class="form-control" value="{{ $cm_salaried_details->monthly_add_income }}"  type="text">
      @if($errors->has('monthly_add_income'))
      <span class="text-danger">{{$errors->first('monthly_add_income')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Deductions</label>
      <input name="monthly_deductions" class="form-control" value="{{ $cm_salaried_details->monthly_deductions }}"  type="text">
      @if($errors->has('monthly_deductions'))
      <span class="text-danger">{{$errors->first('monthly_deductions')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Salary Payment Date</label>
      <input name="salary_pay_date" class="form-control" value="{{ $cm_salaried_details->salary_pay_date }}" type="number">
      @if($errors->has('salary_pay_date'))
      <span class="text-danger">{{$errors->first('salary_pay_date')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
    <label class="sub-label" style="width: 100%;">Are You A Confirmed Employee?</label>
    <label class="sub-label"> @if($cm_salaried_details->confirm_emp == 1) Yes @else No @endif  </label>
     <!--  <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="1" @if($cm_salaried_details->confirm_emp == 1) checked="" @endif type="radio">Yes</label>
      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="0" @if($cm_salaried_details->confirm_emp == 0) checked="" @endif type="radio" style="margin-left: 25px;">No</label> -->

     

      @if($errors->has('confirm_emp'))
      <span class="text-danger">{{$errors->first('confirm_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Work Experience (Years)</label>
      <input name="work_exp" class="form-control" value="{{ $cm_salaried_details->work_exp }}" type="number">
      @if($errors->has('work_exp'))
      <span class="text-danger">{{$errors->first('work_exp')}}</span>
      @endif
    </div>
  </div>
    </div>                           
         
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                @endif
                @endif
              
            @if($customer_onboarding->cm_type == 2)
            @if($self_emp_details)

            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>CM Details</h4>                        
                                </div>
                                <div class="form-body">
                    <div class="row">        


<div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Organisation Name</label>
      <input name="org_name" class="form-control" required="true" value="{{ $self_emp_details->org_name }}" type="text">
      @if($errors->has('org_name'))
      <span class="text-danger">{{$errors->first('org_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nature Of Business</label>
      <input name="nature_business" class="form-control" value="{{ $self_emp_details->nature_business }}" type="text">
      @if($errors->has('nature_business'))
      <span class="text-danger">{{$errors->first('nature_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Year Of Business In Uae</label>
      <input name="year_business" class="form-control" required="true" value="{{ $self_emp_details->year_business }}" type="number">
      @if($errors->has('year_business'))
      <span class="text-danger">{{$errors->first('year_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Gross Income</label>
      <input name="annual_gross_income" class="form-control" value="{{ $self_emp_details->annual_gross_income }}" type="number">
      @if($errors->has('annual_gross_income'))
      <span class="text-danger">{{$errors->first('annual_gross_income')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Gross Expenses</label>
      <input name="annual_gross_expenses" class="form-control" value="{{ $self_emp_details->annual_gross_expenses }}" type="number">
      @if($errors->has('annual_gross_expenses'))
      <span class="text-danger">{{$errors->first('annual_gross_expenses')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Net Income</label>
      <input name="annaul_net_income" class="form-control" value="{{ $self_emp_details->annaul_net_income }}"  type="number">
      @if($errors->has('annaul_net_income'))
      <span class="text-danger">{{$errors->first('annaul_net_income')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Trade Licence No.</label>
      <input name="trade_licence_no" class="form-control" value="{{ $self_emp_details->trade_licence_no }}" type="text">
      @if($errors->has('trade_licence_no'))
      <span class="text-danger">{{$errors->first('trade_licence_no')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Insurance Date</label>
      <input name="insurance_date" class="form-control" value="{{ $self_emp_details->insurance_date }}" type="date">
      @if($errors->has('insurance_date'))
      <span class="text-danger">{{$errors->first('insurance_date')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Expire Date</label>
      <input name="exp_date" class="form-control" value="{{ $self_emp_details->insurance_date }}" type="date">
      @if($errors->has('exp_date'))
      <span class="text-danger">{{$errors->first('exp_date')}}</span>
      @endif
    </div>
  </div>



    </div>                           
         
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                @endif
                @endif

            @if($customer_onboarding->cm_type == 3)
            @if($other_cm_details)

            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>CM Details</h4>                        
                                </div>
                                <div class="form-body">
                    <div class="row">        
<div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Source Name</label>
      <input name="source_name" class="form-control" required="true" value="{{ $other_cm_details->source_name }}"  type="text">
      @if($errors->has('source_name'))
      <span class="text-danger">{{$errors->first('source_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Source Of Income</label>
  <input name="source_income" class="form-control" required="true" value="{{ $other_cm_details->source_income }}"  type="text">
    @if($errors->has('source_income'))
    <span class="text-danger">{{$errors->first('source_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Monthly Income</label>
  <input name="month_income" class="form-control" required="true" value="{{ $other_cm_details->month_income }}" type="number">
    @if($errors->has('month_income'))
    <span class="text-danger">{{$errors->first('month_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Additional Income</label>
  <input name="add_income" class="form-control"value="{{ $other_cm_details->add_income }}" type="number">
    @if($errors->has('add_income'))
    <span class="text-danger">{{$errors->first('add_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Income</label>
      <input name="total_income" class="form-control" value="{{ $other_cm_details->total_income }}" type="number">
        @if($errors->has('total_income'))
        <span class="text-danger">{{$errors->first('total_income')}}</span>
        @endif
    </div>
  </div>
    </div>                           
         
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                @endif
                @endif
                @endif
    
     @if($UserEducation)
            <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Education Information</h4>                        
                                </div>
                                <div class="form-body">
                                   
                             <div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Qualification</label>
      <input name="education" class="form-control" value="{{ $UserEducation->education }}" type="text" required="true">
      @if($errors->has('education'))
      <span class="text-danger">{{$errors->first('education')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Primary School</label>
      <input name="primary_school" class="form-control" value="{{ $UserEducation->primary_school }}" type="text" required="true">
      @if($errors->has('primary_school'))
      <span class="text-danger">{{$errors->first('primary_school')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">High School</label>
      <input name="high_school" class="form-control" value="{{ $UserEducation->high_school }}" type="text">
      @if($errors->has('high_school'))
      <span class="text-danger">{{$errors->first('high_school')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Graduate</label>
      <input name="graduate" class="form-control" value="{{ $UserEducation->graduate }}" type="text">
      @if($errors->has('graduate'))
      <span class="text-danger">{{$errors->first('graduate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Postgraduate</label>
      <input name="postgraduate" class="form-control" value="{{ $UserEducation->postgraduate }}" type="text">
      @if($errors->has('postgraduate'))
      <span class="text-danger">{{$errors->first('postgraduate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Others</label>
      <input name="others" class="form-control" value="{{ $UserEducation->others }}" type="text">
      @if($errors->has('others'))
      <span class="text-danger">{{$errors->first('others')}}</span>
      @endif
    </div>
  </div>

</div>
                             
         
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    </div> 
                </div>
                @endif


        @if($address_details)
            <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Address Details</h4>                        
                                </div>
                                <div class="form-body">

    <div class="row">
  <div class="col-md-12">
    <label style="margin-top: 15px; font-size: 15px; font-weight: 500;">Residential Address Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 1</label>
      <input name="residential_address_line_1" class="form-control" value="{{ $address_details->residential_address_line_1 }}" type="text" required="true">
      @if($errors->has('residential_address_line_1'))
      <span class="text-danger">{{$errors->first('residential_address_line_1')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 2</label>
      <input name="residential_address_line_2" value="{{ $address_details->residential_address_line_2 }}" class="form-control" type="text">
      @if($errors->has('residential_address_line_2'))
      <span class="text-danger">{{$errors->first('residential_address_line_2')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Residential Address Line 3</label>
      <input name="residential_address_line_3" value="{{ $address_details->residential_address_line_3 }}" class="form-control" type="text">
      @if($errors->has('residential_address_line_3'))
      <span class="text-danger">{{$errors->first('residential_address_line_3')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nearest Landmark</label>
      <input name="residential_address_nearest_landmark" value="{{ $address_details->residential_address_nearest_landmark }}" class="form-control" type="text">
      @if($errors->has('residential_address_nearest_landmark'))
      <span class="text-danger">{{$errors->first('residential_address_nearest_landmark')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirate</label>
      <input name="residential_emirate" value="{{ $address_details->residential_emirate }}" class="form-control" type="text">
      @if($errors->has('residential_emirate'))
      <span class="text-danger">{{$errors->first('residential_emirate')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">PO Box No</label>
      <input name="residential_po_box" value="{{ $address_details->residential_po_box }}" class="form-control" type="text">
      @if($errors->has('residential_po_box'))
      <span class="text-danger">{{$errors->first('residential_po_box')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Resdence Type</label>
      <select name="resdence_type" class="form-control" required="true">
        @if($address_details)
        <option value="Shared" @if($address_details->resdence_type == 'Shared') selected @endif >Shared</option>
        <option value="Rented" @if($address_details->resdence_type == 'Rented') selected @endif >Rented</option>
        <option value="Owned" @if($address_details->resdence_type == 'Owned') selected @endif >Owned</option>
        <option value="Employer Provided" @if($address_details->resdence_type == 'mployer Provided') selected @endif >Employer Provided</option>
        <option value="Living With Parents" @if($address_details->resdence_type == 'Living With Parents') selected @endif >Living With Parents</option>
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
      <input name="annual_rent" value="{{ $address_details->annual_rent }}" class="form-control" type="number">
      @if($errors->has('annual_rent'))
      <span class="text-danger">{{$errors->first('annual_rent')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Duration At Current Address</label>
      <input name="duration_at_current_address" value="{{ $address_details->duration_at_current_address }}" class="form-control" type="number">
      @if($errors->has('duration_at_current_address'))
      <span class="text-danger">{{$errors->first('duration_at_current_address')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label style="margin-top: 15px; font-size: 15px; font-weight: 500;">Office Address</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Name</label>
      <input name="company_name" value="{{ $address_details->company_name }}" class="form-control"  type="text">
      @if($errors->has('company_name'))
      <span class="text-danger">{{$errors->first('company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Phone No</label>
      <input name="company_phone_no" value="{{ $address_details->company_phone_no }}" class="form-control" type="text">
      @if($errors->has('company_phone_no'))
      <span class="text-danger">{{$errors->first('company_phone_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 1</label>
      <input name="company_address_line_1" value="{{ $address_details->company_address_line_1 }}" class="form-control" type="text">
      @if($errors->has('company_address_line_1'))
      <span class="text-danger">{{$errors->first('company_address_line_1')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 2</label>
      <input name="company_address_line_2" value="{{ $address_details->company_address_line_2 }}" class="form-control" type="text">
      @if($errors->has('company_address_line_2'))
      <span class="text-danger">{{$errors->first('company_address_line_2')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 3</label>
      <input name="company_address_line_3" value="{{ $address_details->company_address_line_3 }}" class="form-control" type="text">
      @if($errors->has('company_address_line_3'))
      <span class="text-danger">{{$errors->first('company_address_line_3')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Po Box No</label>
      <input name="company_po_box" value="{{ $address_details->company_po_box }}" class="form-control" type="text">
      @if($errors->has('company_po_box'))
      <span class="text-danger">{{$errors->first('company_po_box')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Emirate</label>
      <input name="company_emirate" value="{{ $address_details->company_emirate }}" class="form-control" type="text">
      @if($errors->has('company_emirate'))
      <span class="text-danger">{{$errors->first('company_emirate')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label style="margin-top: 15px; font-size: 15px; font-weight: 500;">Permanent Address In Home Country</label>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 1</label>
      <input name="permanent_address_home_country_line_1" value="{{ $address_details->permanent_address_home_country_line_1 }}" class="form-control"  type="text">
      @if($errors->has('permanent_address_home_country_line_1'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_1')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 2</label>
      <input name="permanent_address_home_country_line_2" value="{{ $address_details->permanent_address_home_country_line_2 }}" class="form-control" type="text">
      @if($errors->has('permanent_address_home_country_line_2'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_2')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Address Line 3</label>
      <input name="permanent_address_home_country_line_3" value="{{ $address_details->permanent_address_home_country_line_3 }}"  class="form-control" type="text">
      @if($errors->has('permanent_address_home_country_line_3'))
      <span class="text-danger">{{$errors->first('permanent_address_home_country_line_3')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">City</label>
      <input name="permanent_address_city" value="{{ $address_details->permanent_address_city }}" class="form-control" type="text">
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
        <option value="{{ $country->id }}" @if(isset($address_details->permanent_address_country)) @if($address_details->permanent_address_country == $country->id) selected  @endif @endif >{{ $country->country_name }}</option>
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
      <input name="permanent_address_zipcode" value="{{ $address_details->permanent_address_zipcode }}" class="form-control" type="number">
      @if($errors->has('permanent_address_zipcode'))
      <span class="text-danger">{{$errors->first('permanent_address_zipcode')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Tel. with IDD Code</label>
      <input name="permanent_addresstel_with_idd_code" value="{{ $address_details->permanent_addresstel_with_idd_code }}"   class="form-control" type="text">
      @if($errors->has('permanent_addresstel_with_idd_code'))
      <span class="text-danger">{{$errors->first('permanent_addresstel_with_idd_code')}}</span>
      @endif
    </div>
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




