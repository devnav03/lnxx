@extends('admin.layouts.admin')
@section('content')
@php
    $route  = \Route::currentRouteName();    
@endphp
<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">
            <h1 class="page-header"> @if(isset($customer_onboarding->ref_id)) Application No #{{ $customer_onboarding->ref_id }} @else Customer @endif <a class="btn btn-sm btn-primary pull-right" href="{!! route('customer') !!}"> <i class="fa fa-arrow-left"></i> All Customers </a></h1>
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
                                        <img id="blah" src="{!! asset($result->profile_image) !!}" style="max-width: 150px;margin-top: 10px;" alt="" />
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

                @if($result->emirates_id)
                <div class="card custom-card">
                    <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                        <div class="forms">
                                <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                    <div class="form-title">
                                        <h4>Emirates ID</h4>                        
                                    </div>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 10px;">
                                               <img src="{!! asset($result->emirates_id) !!}">
                                            </div>
                                            <div class="col-md-6" style="margin-top: 10px;">
                                               <img src="{!! asset($result->emirates_id_back) !!}">
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
            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                            <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Personal Details</h4>                        
                                </div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label style="margin-top: 15px; font-size: 15px; font-weight: 500;">Name As Per Passport</label>
                                            </div>
                                            <div class="col-md-3">
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
                                            <div class="col-md-9">
                                              <div class="row">  
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label class="sub-label">First Name</label>
                                                    <input name="first_name_as_per_passport" class="form-control" value="{{ $customer_onboarding->first_name_as_per_passport }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
                                                    @if($errors->has('first_name_as_per_passport'))
                                                    <span class="text-danger">{{$errors->first('first_name_as_per_passport')}}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                              <!--   <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">Middle Name</label>
                                                    <input name="middle_name" class="form-control" value="{{ $customer_onboarding->middle_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
                                                    @if($errors->has('middle_name'))
                                                    <span class="text-danger">{{$errors->first('middle_name')}}</span>
                                                    @endif
                                                  </div>
                                                </div> -->
                                                <div class="col-md-6">
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
            <label class="sub-label">Nationality*</label>
            <select name="nationality" class="form-control" required="true">
            @foreach($country as $country)       
            <option value="{{ $country->id }}" @if($country->id == $customer_onboarding->nationality) selected @endif >{{ $country->country_name }}</option>
            @endforeach  
            </select>
           <!--  <input name="nationality" class="form-control" value="{{ $customer_onboarding->nationality }}" type="text" required="true"> -->
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Years in UAE*</label>
            <input name="years_in_uae" class="form-control" value="{{ $customer_onboarding->years_in_uae }}" type="text" required="true">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Marital Status*</label>
            <input name="marital_status" class="form-control" value="{{ $customer_onboarding->marital_status }}" type="text" required="true">
        </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
    <label class="sub-label">No of Dependents*</label>
    <input name="no_of_dependents" class="form-control" @if($customer_onboarding->no_of_dependents) value="{{ $customer_onboarding->no_of_dependents }}" @endif type="text" required="true">
    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Emirates ID Number*</label>
            <input name="eid_number" class="form-control" value="{{ $customer_onboarding->eid_number }}" type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Reference Number</label>
            <input name="reference_number" class="form-control" value="{{ $customer_onboarding->reference_number }}" type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Visa Number</label>
            <input name="visa_number" class="form-control" @if($customer_onboarding->visa_number) value="{{ $customer_onboarding->visa_number }}" @endif type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Official mail ID</label>
            <input name="officer_email" class="form-control" value="{{ $customer_onboarding->officer_email }}" type="text">
        </div>
    </div>
    
    @if($customer_onboarding->passport_photo)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Passport Photo</label><br>
            <img src="{!! asset($customer_onboarding->passport_photo) !!}" class="img-responsive">
        </div>
    </div>
    @endif

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Credit Score</label>
            <input name="credit_score" class="form-control" value="{{ $customer_onboarding->credit_score }}" type="text">
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


            @if($customer_onboarding)
            @if($customer_onboarding->cm_type == 1)
            @if($cm_salaried_details)
            <div class="card custom-card">
                <div class="card-body">
                <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                    <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4 style="margin-bottom: 20px;">Employment Details</h4>                     
                    </div>
                    <div class="form-body">
                    <div class="row">  
                    <div class="col-md-12">
                                        <h6 id="salaried" class="cm_type @if($customer_onboarding->cm_type == 1) active @endif">Salaried</h6>
                                        <h6 id="self_employed" class="cm_type @if($customer_onboarding->cm_type == 2) active @endif">Self Employed</h6>
                                        <h6 id="other_employed"  class="cm_type @if($customer_onboarding->cm_type == 3) active @endif">Other</h6>
                                        <input type="hidden" id="cm_type" name="cm_type" value="{{ $customer_onboarding->cm_type }}">
                                        </div>      
                    <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Name*</label>

      <!-- <input name="company_name" class="form-control" value="{{ $cm_salaried_details->company_name }}" type="text" required="true"> -->
      <select name="company_name" class="form-control" required="true">
        @foreach($company as $com)
        <option value="{{ $com->id }}" @if($cm_salaried_details->company_name == $com->id) selected @endif >{{ $com->name }}</option> 
        @endforeach
      </select>

      @if($errors->has('company_name'))
      <span class="text-danger">{{$errors->first('company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Date Of Joining*</label>
      <input name="date_of_joining" class="form-control" value="{{ $cm_salaried_details->date_of_joining }}" type="date">
      @if($errors->has('date_of_joining'))
      <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Salary*</label>
      <input name="monthly_salary" class="form-control" value="{{ $cm_salaried_details->monthly_salary }}" type="text">
      @if($errors->has('monthly_salary'))
      <span class="text-danger">{{$errors->first('monthly_salary')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Last Three Salary Credits</label>
      <input name="last_three_salary_credits" class="form-control" value="{{ $cm_salaried_details->last_three_salary_credits }}" type="number">
      @if($errors->has('last_three_salary_credits'))
      <span class="text-danger">{{$errors->first('last_three_salary_credits')}}</span>
      @endif
    </div>
  </div>

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Deductions</label>
      <input name="monthly_deductions" class="form-control" value="{{ $cm_salaried_details->monthly_deductions }}"  type="text">
      @if($errors->has('monthly_deductions'))
      <span class="text-danger">{{$errors->first('monthly_deductions')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Salary Payment Date</label>
      <input name="salary_pay_date" class="form-control" value="{{ $cm_salaried_details->salary_pay_date }}" type="number">
      @if($errors->has('salary_pay_date'))
      <span class="text-danger">{{$errors->first('salary_pay_date')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
    <label class="sub-label" style="width: 100%;">Are You A Confirmed Employee?</label>
    <label class="sub-label"> @if($cm_salaried_details->confirm_emp == 1) Yes @else No @endif  </label> -->
     <!--  <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="1" @if($cm_salaried_details->confirm_emp == 1) checked="" @endif type="radio">Yes</label>
      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="0" @if($cm_salaried_details->confirm_emp == 0) checked="" @endif type="radio" style="margin-left: 25px;">No</label> -->
 <!--     
      @if($errors->has('confirm_emp'))
      <span class="text-danger">{{$errors->first('confirm_emp')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Work Experience (Years)</label>
      <input name="work_exp" class="form-control" value="{{ $cm_salaried_details->work_exp }}" type="number">
      @if($errors->has('work_exp'))
      <span class="text-danger">{{$errors->first('work_exp')}}</span>
      @endif
    </div>
  </div> -->
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
                        <h4>Employment Details</h4>                        
                    </div>
            <div class="form-body">
            <div class="row">    
            <div class="col-md-12">
                <h6 id="salaried" class="cm_type @if($customer_onboarding->cm_type == 1) active @endif">Salaried</h6>
                <h6 id="self_employed" class="cm_type @if($customer_onboarding->cm_type == 2) active @endif">Self Employed</h6>
                <h6 id="other_employed"  class="cm_type @if($customer_onboarding->cm_type == 3) active @endif">Other</h6>
                <input type="hidden" id="cm_type" name="cm_type" value="{{ $customer_onboarding->cm_type }}">
            </div>    
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Company Name*</label>
                  <!-- <input name="self_company_name" class="form-control" required="true" value="{{ $self_emp_details->self_company_name }}" type="text"> -->
                   <select name="self_company_name" class="form-control" required="true">
                    @foreach($company as $comp)
                    <option value="{{ $comp->id }}" @if($self_emp_details->self_company_name == $comp->id) selected @endif >{{ $comp->name }}</option> 
                    @endforeach
                  </select>
                  @if($errors->has('self_company_name'))
                  <span class="text-danger">{{$errors->first('self_company_name')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Percentage Ownership*</label>
                  <input name="percentage_ownership" class="form-control" value="{{ $self_emp_details->percentage_ownership }}" type="text">
                  @if($errors->has('percentage_ownership'))
                  <span class="text-danger">{{$errors->first('percentage_ownership')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Type of profession/business*</label>
                  <input name="profession_business" class="form-control" required="true" value="{{ $self_emp_details->profession_business }}" type="text">
                  @if($errors->has('profession_business'))
                  <span class="text-danger">{{$errors->first('profession_business')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Annual Business Income*</label>
                  <input name="annual_business_income" class="form-control" value="{{ $self_emp_details->annual_business_income }}" type="number">
                  @if($errors->has('annual_business_income'))
                  <span class="text-danger">{{$errors->first('annual_business_income')}}</span>
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
                                    <h4>Employment Details</h4>                        
                                </div>
                                <div class="form-body">
                    <div class="row"> 
                    <div class="col-md-12">
                        <h6 id="salaried" class="cm_type @if($customer_onboarding->cm_type == 1) active @endif">Salaried</h6>
                        <h6 id="self_employed" class="cm_type @if($customer_onboarding->cm_type == 2) active @endif">Self Employed</h6>
                        <h6 id="other_employed"  class="cm_type @if($customer_onboarding->cm_type == 3) active @endif">Other</h6>
                        <input type="hidden" id="cm_type" name="cm_type" value="{{ $customer_onboarding->cm_type }}">
                    </div>       
<div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Pension*</label>
      <input name="monthly_pension" class="form-control" required="true" value="{{ $other_cm_details->monthly_pension }}"  type="text">
      @if($errors->has('monthly_pension'))
      <span class="text-danger">{{$errors->first('monthly_pension')}}</span>
      @endif
    </div>
  </div>

<!--   <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Source Of Income</label>
  <input name="source_income" class="form-control" required="true" value="{{ $other_cm_details->source_income }}"  type="text">
    @if($errors->has('source_income'))
    <span class="text-danger">{{$errors->first('source_income')}}</span>
    @endif
  </div>
  </div> -->
<!-- 
  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Monthly Income</label>
  <input name="month_income" class="form-control" required="true" value="{{ $other_cm_details->month_income }}" type="number">
    @if($errors->has('month_income'))
    <span class="text-danger">{{$errors->first('month_income')}}</span>
    @endif
  </div>
  </div> -->

<!--   <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Additional Income</label>
  <input name="add_income" class="form-control"value="{{ $other_cm_details->add_income }}" type="number">
    @if($errors->has('add_income'))
    <span class="text-danger">{{$errors->first('add_income')}}</span>
    @endif
  </div>
  </div> -->
<!-- 
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Income</label>
      <input name="total_income" class="form-control" value="{{ $other_cm_details->total_income }}" type="number">
        @if($errors->has('total_income'))
        <span class="text-danger">{{$errors->first('total_income')}}</span>
        @endif
    </div>
  </div> -->
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

            @if(count($services) != 0)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                    <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                    <div class="form-title">
                    <h4>Services</h4>                        
                    </div>
                    <div class="form-body">
                        <table style="width: 100%; border: 1px solid #888; margin-top: 20px;">
                            <tr style="background: #5EB495; color: #fff;">
                                <th style="border-right: 1px solid #fff;text-align: center;padding: 10px;width: 70px;">#</th>
                                <th style="padding: 10px;border-right: 1px solid #fff;">Name</th>
                                <th style="padding: 10px;">Status</th>
                            </tr>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($services as $service)
                            @php
                                $i++;
                            @endphp
                            <tr style="border-bottom: 1px solid #888;">
                                <td style="text-align: center;padding: 10px;border-right: 1px solid #888;">{{ $i }}</td>
                                <td style="padding: 10px;;border-right: 1px solid #888;">{{ $service->name }}</td>
                                <td style="padding: 10px;">@if($service->status == 0) Pending @endif</td>
                            </tr> 
                            @endforeach

                        </table>

                    </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            @endif

             @if($product_requested)
            <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                <div class="form-title">
                    <h4>Type Of Product Requested</h4>                        
                </div>
                <div class="form-body">   
                <div class="row">
                @if(in_array(3,  $sel_services))
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Credit Card</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Credit Card Limit</label>
                      <input name="credit_card_limit" class="form-control" value="{{ $product_requested->credit_card_limit }}" type="text">
                      @if($errors->has('credit_card_limit'))
                      <span class="text-danger">{{$errors->first('credit_card_limit')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-12">                            
                    <label style="font-size: 15px; margin-top: 0px;">Existing Financial Products</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards" class="form-control" value="{{ $product_requested->details_of_cards }}" type="text" required="true">
                      @if($errors->has('details_of_cards'))
                      <span class="text-danger">{{$errors->first('details_of_cards')}}</span>
                      @endif
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Bank Name</label>
                      <select name="credit_bank_name" class="form-control">
                            @foreach($banks as $bank)
                                <option value="$bank->id" @if($bank->id == $product_requested->credit_bank_name ) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                      </select>

                      @if($errors->has('credit_bank_name'))
                      <span class="text-danger">{{$errors->first('credit_bank_name')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Card Limit</label>
                      <input name="card_limit" class="form-control" value="{{ $product_requested->card_limit }}" type="text" required="true">
                      @if($errors->has('card_limit'))
                      <span class="text-danger">{{$errors->first('card_limit')}}</span>
                      @endif
                    </div>
                </div>

                @if($product_requested->credit_bank_name2)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards2" class="form-control" value="{{ $product_requested->details_of_cards2 }}" type="text" required="true">
                      @if($errors->has('details_of_cards2'))
                      <span class="text-danger">{{$errors->first('details_of_cards2')}}</span>
                      @endif
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Bank Name</label>
                      <select name="credit_bank_name2" class="form-control">
                            @foreach($banks as $bank)
                                <option value="$bank->id" @if($bank->id == $product_requested->credit_bank_name2 ) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                      </select>
                      @if($errors->has('credit_bank_name2'))
                      <span class="text-danger">{{$errors->first('credit_bank_name2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Card Limit</label>
                      <input name="card_limit2" class="form-control" value="{{ $product_requested->card_limit2 }}" type="text" required="true">
                      @if($errors->has('card_limit2'))
                      <span class="text-danger">{{$errors->first('card_limit2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($product_requested->credit_bank_name3)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards3" class="form-control" value="{{ $product_requested->details_of_cards3 }}" type="text" required="true">
                      @if($errors->has('details_of_cards3'))
                      <span class="text-danger">{{$errors->first('details_of_cards3')}}</span>
                      @endif
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Bank Name</label>
                      <select name="credit_bank_name3" class="form-control">
                            @foreach($banks as $bank)
                                <option value="$bank->id" @if($bank->id == $product_requested->credit_bank_name3 ) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                      </select>
                      @if($errors->has('credit_bank_name3'))
                      <span class="text-danger">{{$errors->first('credit_bank_name3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Card Limit</label>
                      <input name="card_limit3" class="form-control" value="{{ $product_requested->card_limit3 }}" type="text" required="true">
                      @if($errors->has('card_limit3'))
                      <span class="text-danger">{{$errors->first('card_limit3')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($product_requested->credit_bank_name4)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards4" class="form-control" value="{{ $product_requested->details_of_cards4 }}" type="text" required="true">
                      @if($errors->has('details_of_cards4'))
                      <span class="text-danger">{{$errors->first('details_of_cards4')}}</span>
                      @endif
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Bank Name</label>
                      <select name="credit_bank_name4" class="form-control">
                            @foreach($banks as $bank)
                                <option value="$bank->id" @if($bank->id == $product_requested->credit_bank_name4 ) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                      </select>
                      @if($errors->has('credit_bank_name4'))
                      <span class="text-danger">{{$errors->first('credit_bank_name4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Card Limit</label>
                      <input name="card_limit4" class="form-control" value="{{ $product_requested->card_limit4 }}" type="text" required="true">
                      @if($errors->has('card_limit4'))
                      <span class="text-danger">{{$errors->first('card_limit4')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @endif

                @if(in_array(1,  $sel_services))
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Personal Loan</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="loan_amount" class="form-control" value="{{ $product_requested->loan_amount }}" type="text">
                      @if($errors->has('loan_amount'))
                      <span class="text-danger">{{$errors->first('loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-12">                            
                    <label style="font-size: 15px; margin-top: 0px;">Details of Existing Loans</label>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Bank Name</label>
                      <select name="loan_bank_name" class="form-control">
                            @foreach($banks as $bank)
                                <option value="$bank->id" @if($bank->id == $product_requested->loan_bank_name ) selected @endif>{{ $bank->name }}</option>
                            @endforeach
                      </select>
                      @if($errors->has('loan_bank_name'))
                      <span class="text-danger">{{$errors->first('loan_bank_name')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Original Loan amount</label>
                      <input name="original_loan_amount" class="form-control" value="{{ $product_requested->original_loan_amount }}" type="text">
                      @if($errors->has('original_loan_amount'))
                      <span class="text-danger">{{$errors->first('original_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="loan_emi" class="form-control" value="{{ $product_requested->loan_emi }}" type="text">
                      @if($errors->has('loan_emi'))
                      <span class="text-danger">{{$errors->first('loan_emi')}}</span>
                      @endif
                    </div>
                </div>

                @if($product_requested->loan_bank_name2)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name2" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $product_requested->loan_bank_name2) selected @endif>{{ $bank->name }}</option>
                                @endforeach
                          </select>
                          @if($errors->has('loan_bank_name2'))
                          <span class="text-danger">{{$errors->first('loan_bank_name2')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Original Loan amount</label>
                          <input name="original_loan_amount2" class="form-control" value="{{ $product_requested->original_loan_amount2 }}" type="text">
                          @if($errors->has('original_loan_amount2'))
                          <span class="text-danger">{{$errors->first('original_loan_amount2')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi2" class="form-control" value="{{ $product_requested->loan_emi2 }}" type="text">
                          @if($errors->has('loan_emi2'))
                          <span class="text-danger">{{$errors->first('loan_emi2')}}</span>
                          @endif
                        </div>
                    </div>
                @endif

                @if($product_requested->loan_bank_name3)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name3" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $product_requested->loan_bank_name3) selected @endif>{{ $bank->name }}</option>
                                @endforeach
                          </select>
                          @if($errors->has('loan_bank_name3'))
                          <span class="text-danger">{{$errors->first('loan_bank_name3')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Original Loan amount</label>
                          <input name="original_loan_amount3" class="form-control" value="{{ $product_requested->original_loan_amount3 }}" type="text">
                          @if($errors->has('original_loan_amount3'))
                          <span class="text-danger">{{$errors->first('original_loan_amount3')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi3" class="form-control" value="{{ $product_requested->loan_emi3 }}" type="text">
                          @if($errors->has('loan_emi3'))
                          <span class="text-danger">{{$errors->first('loan_emi3')}}</span>
                          @endif
                        </div>
                    </div>
                @endif

                @if($product_requested->loan_bank_name4)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name4" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $product_requested->loan_bank_name4) selected @endif>{{ $bank->name }}</option>
                                @endforeach
                          </select>
                          @if($errors->has('loan_bank_name4'))
                          <span class="text-danger">{{$errors->first('loan_bank_name4')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Original Loan amount</label>
                          <input name="original_loan_amount4" class="form-control" value="{{ $product_requested->original_loan_amount4 }}" type="text">
                          @if($errors->has('original_loan_amount4'))
                          <span class="text-danger">{{$errors->first('original_loan_amount4')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi4" class="form-control" value="{{ $product_requested->loan_emi4 }}" type="text">
                          @if($errors->has('loan_emi4'))
                          <span class="text-danger">{{$errors->first('loan_emi4')}}</span>
                          @endif
                        </div>
                    </div>
                @endif 


                @endif

                @if(in_array(4,  $sel_services))
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Business Loan</label>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount" class="form-control" value="{{ $product_requested->business_loan_amount }}" type="text">
                      @if($errors->has('business_loan_amount'))
                      <span class="text-danger">{{$errors->first('business_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi" class="form-control" value="{{ $product_requested->business_loan_emi }}" type="text">
                      @if($errors->has('business_loan_emi'))
                      <span class="text-danger">{{$errors->first('business_loan_emi')}}</span>
                      @endif
                    </div>
                </div>

                @if($product_requested->business_loan_amount2)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount2" class="form-control" value="{{ $product_requested->business_loan_amount2 }}" type="text">
                      @if($errors->has('business_loan_amount2'))
                      <span class="text-danger">{{$errors->first('business_loan_amount2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi2" class="form-control" value="{{ $product_requested->business_loan_emi2 }}" type="text">
                      @if($errors->has('business_loan_emi2'))
                      <span class="text-danger">{{$errors->first('business_loan_emi2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($product_requested->business_loan_amount3)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount3" class="form-control" value="{{ $product_requested->business_loan_amount3 }}" type="text">
                      @if($errors->has('business_loan_amount3'))
                      <span class="text-danger">{{$errors->first('business_loan_amount3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi3" class="form-control" value="{{ $product_requested->business_loan_emi3 }}" type="text">
                      @if($errors->has('business_loan_emi3'))
                      <span class="text-danger">{{$errors->first('business_loan_emi3')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                @if($product_requested->business_loan_amount4)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount4" class="form-control" value="{{ $product_requested->business_loan_amount4 }}" type="text">
                      @if($errors->has('business_loan_amount4'))
                      <span class="text-danger">{{$errors->first('business_loan_amount4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi4" class="form-control" value="{{ $product_requested->business_loan_emi4 }}" type="text">
                      @if($errors->has('business_loan_emi4'))
                      <span class="text-danger">{{$errors->first('business_loan_emi4')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @endif

                @if(in_array(5,  $sel_services))
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Mortgage Loan</label>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount" class="form-control" value="{{ $product_requested->mortgage_loan_amount }}" type="text">
                      @if($errors->has('mortgage_loan_amount'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price" class="form-control" value="{{ $product_requested->purchase_price }}" type="text">
                      @if($errors->has('purchase_price'))
                      <span class="text-danger">{{$errors->first('purchase_price')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan" class="form-control" value="{{ $product_requested->type_of_loan }}" type="text">
                      @if($errors->has('type_of_loan'))
                      <span class="text-danger">{{$errors->first('type_of_loan')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan" class="form-control" value="{{ $product_requested->term_of_loan }}" type="text">
                      @if($errors->has('term_of_loan'))
                      <span class="text-danger">{{$errors->first('term_of_loan')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property" class="form-control" value="{{ $product_requested->end_use_of_property }}" type="text">
                      @if($errors->has('end_use_of_property'))
                      <span class="text-danger">{{$errors->first('end_use_of_property')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate" class="form-control" value="{{ $product_requested->interest_rate }}" type="text">
                      @if($errors->has('interest_rate'))
                      <span class="text-danger">{{$errors->first('interest_rate')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi" class="form-control" value="{{ $product_requested->mortgage_emi }}" type="text">
                      @if($errors->has('mortgage_emi'))
                      <span class="text-danger">{{$errors->first('mortgage_emi')}}</span>
                      @endif
                    </div>
                </div>

                @if($product_requested->mortgage_loan_amount2)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount2" class="form-control" value="{{ $product_requested->mortgage_loan_amount2 }}" type="text">
                      @if($errors->has('mortgage_loan_amount2'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price2" class="form-control" value="{{ $product_requested->purchase_price2 }}" type="text">
                      @if($errors->has('purchase_price2'))
                      <span class="text-danger">{{$errors->first('purchase_price2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan2" class="form-control" value="{{ $product_requested->type_of_loan2 }}" type="text">
                      @if($errors->has('type_of_loan2'))
                      <span class="text-danger">{{$errors->first('type_of_loan2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan2" class="form-control" value="{{ $product_requested->term_of_loan2 }}" type="text">
                      @if($errors->has('term_of_loan2'))
                      <span class="text-danger">{{$errors->first('term_of_loan2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property2" class="form-control" value="{{ $product_requested->end_use_of_property2 }}" type="text">
                      @if($errors->has('end_use_of_property2'))
                      <span class="text-danger">{{$errors->first('end_use_of_property2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate2" class="form-control" value="{{ $product_requested->interest_rate2 }}" type="text">
                      @if($errors->has('interest_rate2'))
                      <span class="text-danger">{{$errors->first('interest_rate2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi2" class="form-control" value="{{ $product_requested->mortgage_emi2 }}" type="text">
                      @if($errors->has('mortgage_emi2'))
                      <span class="text-danger">{{$errors->first('mortgage_emi2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($product_requested->mortgage_loan_amount3)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount3" class="form-control" value="{{ $product_requested->mortgage_loan_amount3 }}" type="text">
                      @if($errors->has('mortgage_loan_amount3'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price3" class="form-control" value="{{ $product_requested->purchase_price3 }}" type="text">
                      @if($errors->has('purchase_price3'))
                      <span class="text-danger">{{$errors->first('purchase_price3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan3" class="form-control" value="{{ $product_requested->type_of_loan3 }}" type="text">
                      @if($errors->has('type_of_loan3'))
                      <span class="text-danger">{{$errors->first('type_of_loan3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan3" class="form-control" value="{{ $product_requested->term_of_loan3 }}" type="text">
                      @if($errors->has('term_of_loan3'))
                      <span class="text-danger">{{$errors->first('term_of_loan3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property3" class="form-control" value="{{ $product_requested->end_use_of_property3 }}" type="text">
                      @if($errors->has('end_use_of_property3'))
                      <span class="text-danger">{{$errors->first('end_use_of_property3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate3" class="form-control" value="{{ $product_requested->interest_rate3 }}" type="text">
                      @if($errors->has('interest_rate3'))
                      <span class="text-danger">{{$errors->first('interest_rate3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi3" class="form-control" value="{{ $product_requested->mortgage_emi3 }}" type="text">
                      @if($errors->has('mortgage_emi3'))
                      <span class="text-danger">{{$errors->first('mortgage_emi3')}}</span>
                      @endif
                    </div>
                </div>
                @endif


                @if($product_requested->mortgage_loan_amount4)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount4" class="form-control" value="{{ $product_requested->mortgage_loan_amount4 }}" type="text">
                      @if($errors->has('mortgage_loan_amount4'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price4" class="form-control" value="{{ $product_requested->purchase_price4 }}" type="text">
                      @if($errors->has('purchase_price4'))
                      <span class="text-danger">{{$errors->first('purchase_price4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan4" class="form-control" value="{{ $product_requested->type_of_loan4 }}" type="text">
                      @if($errors->has('type_of_loan4'))
                      <span class="text-danger">{{$errors->first('type_of_loan4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan4" class="form-control" value="{{ $product_requested->term_of_loan4 }}" type="text">
                      @if($errors->has('term_of_loan4'))
                      <span class="text-danger">{{$errors->first('term_of_loan4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property4" class="form-control" value="{{ $product_requested->end_use_of_property4 }}" type="text">
                      @if($errors->has('end_use_of_property4'))
                      <span class="text-danger">{{$errors->first('end_use_of_property4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate4" class="form-control" value="{{ $product_requested->interest_rate4 }}" type="text">
                      @if($errors->has('interest_rate4'))
                      <span class="text-danger">{{$errors->first('interest_rate4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi4" class="form-control" value="{{ $product_requested->mortgage_emi4 }}" type="text">
                      @if($errors->has('mortgage_emi4'))
                      <span class="text-danger">{{$errors->first('mortgage_emi4')}}</span>
                      @endif
                    </div>
                </div>
                @endif


                @endif
            </div>
            </div>           
            </div>
            </div>
            </div>
        </div> 
                
            @if(isset($customer_onboarding->video))  
            <div class="col-md-6">
            <h3 style="margin-top: -20px; font-size: 20px; margin-bottom: -15px;">Upload Video</h3>    
            <video width="420" height="300" controls style="margin-bottom: 20px;">
              <source src="{!! asset($customer_onboarding->video) !!}" type="video/mp4">
            </video>
            </div>
            
            @endif
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
    margin-bottom: 15px;
    margin-top: 0px;
}
.cm_type.active {
    background: #FF6722;
    color: #fff !important;
}



</style>

@stop




