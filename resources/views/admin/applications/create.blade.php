@extends('admin.layouts.admin')
@section('content')
@php
    $route  = \Route::currentRouteName();    
@endphp
<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">
            <h1 class="page-header"> @if(isset($result->ref_id)) Application No #{{ $result->ref_id }} @else Application @endif <a class="btn btn-sm btn-primary pull-right" href="{!! route('applications.index') !!}"> <i class="fa fa-arrow-left"></i> All Applications </a></h1>
            <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                            <div class="form-title">
                                <h4>Customer Information</h4>                        
                            </div>
                            <div class="form-body">
                                @if($route == 'applications.create')
                                    {!! Form::open(array('method' => 'POST', 'route' => array('applications.store'), 'id' => 'ajaxSave', 'class' => '')) !!}
                                @elseif($route == 'applications.edit')
                                    {!! Form::model($result, array('route' => array('applications.update', $result->id), 'method' => 'PATCH', 'id' => 'applications-form', 'class' => '')) !!}
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
                                    
                                    <div class="col-md-6" style="margin-top: 20px;">
                                        <div class="form-group"> 
                                        {!! Form::label('date_of_birth', lang('Date of Birth'), array('class' => '')) !!}
                                        @if($result->date_of_birth)
                                        <input type="text" value="{{ $result->date_of_birth }}" readonly="" class="form-control"> 
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
                                                <option @if($result->salutation == 'Mr.') selected @endif value="Mr.">Mr.</option>
                                                <option @if($result->salutation == 'Mrs.') selected @endif value="Mrs.">Mrs.</option>
                                                <option @if($result->salutation == 'Miss.') selected @endif value="Miss.">Miss</option>
                                                <option @if($result->salutation == 'Dr.') selected @endif value="Dr.">Dr.</option>
                                                <option @if($result->salutation == 'Prof.') selected @endif value="Prof.">Prof.</option>
                                                <option @if($result->salutation == 'Rev.') selected @endif value="Rev.">Rev.</option>
                                                <option @if($result->salutation == 'Other') selected @endif value="Other">Other</option>
                                              </select>
                                            </div>
                                            <div class="col-md-9">
                                              <div class="row">  
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">First Name</label>
                                                    <input name="name" class="form-control" value="{{ $result->name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$" required="true">
                                                    @if($errors->has('name'))
                                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">Middle Name</label>
                                                    <input name="middle_name" class="form-control" value="{{ $result->middle_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
                                                    @if($errors->has('middle_name'))
                                                    <span class="text-danger">{{$errors->first('middle_name')}}</span>
                                                    @endif
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label class="sub-label">Last Name</label>
                                                    <input name="last_name" class="form-control" value="{{ $result->last_name }}" type="text" pattern="(?=^.{2,25}$)(?![.\n])(?=.*[a-zA-Z]).*$">
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
            <option value="{{ $country->id }}" @if($country->id == $result->nationality) selected @endif >{{ $country->country_name }}</option>
            @endforeach  
            </select>
           <!--  <input name="nationality" class="form-control" value="{{ $result->nationality }}" type="text" required="true"> -->
        </div>
    </div>
    @if($result->nationality != 229)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Years in UAE*</label>
            <input name="years_in_uae" class="form-control" value="{{ $result->years_in_uae }}" type="text" required="true">
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Marital Status*</label>
            <input name="marital_status" class="form-control" value="{{ $result->marital_status }}" type="text" required="true">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <label class="sub-label">No of Dependents*</label>
        <input name="no_of_dependents" class="form-control" @if($result->no_of_dependents) value="{{ $result->no_of_dependents }}" @endif type="text" required="true">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Emirates ID Number*</label>
            <input name="eid_number" class="form-control" value="{{ $result->eid_number }}" type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Reference Number</label>
            <input name="reference_number" class="form-control" value="{{ $result->reference_number }}" type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Visa Number</label>
            <input name="visa_number" class="form-control" @if($result->visa_number) value="{{ $result->visa_number }}" @endif type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Official mail ID</label>
            <input name="officer_email" class="form-control" value="{{ $result->officer_email }}" type="text">
        </div>
    </div>
    @if($result->credit_score)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">AECB Credit Score</label>
            <input name="credit_score" class="form-control" value="{{ $result->credit_score }}" type="text">
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Date (when the score was fetched)</label>
            <input name="aecb_date" class="form-control" value="{{ $result->aecb_date }}" type="text" readonly="">
        </div>
    </div>
    @endif

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Passport Number</label>
            <input name="passport_number" class="form-control" value="{{ $result->passport_number }}" type="text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Passport Expiry Date</label>
            <input name="passport_expiry_date" class="form-control" value="{{ $result->passport_expiry_date }}" type="text" readonly="">
        </div>
    </div>

    @if($result->passport_photo)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Passport Photo</label><br>
            <img src="{!! asset($result->passport_photo) !!}" class="img-responsive">
        </div>
    </div>
    @endif


    </div>
    </div>
                                
    </div>
    </div>
    </div>
    </div> 
    </div>


            @if($result->cm_type == 1)
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
                        <h6 id="salaried" class="cm_type @if($result->cm_type == 1) active @endif">Salaried</h6>
                        <h6 id="self_employed" class="cm_type @if($result->cm_type == 2) active @endif">Self Employed</h6>
                        <h6 id="other_employed"  class="cm_type @if($result->cm_type == 3) active @endif">Pension</h6>
                        <input type="hidden" id="cm_type" name="cm_type" value="{{ $result->cm_type }}">
                    </div>      
                    <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Company Name*</label>
      <input name="company_name" class="form-control" value="{{ $result->company_name }}" type="text" required="true"> 
      <!-- <select name="company_name" class="form-control" required="true">
        @foreach($company as $com)
        <option value="{{ $com->id }}" @if($result->company_name == $com->id) selected @endif >{{ $com->name }}</option> 
        @endforeach
      </select> -->
      @if($errors->has('company_name'))
      <span class="text-danger">{{$errors->first('company_name')}}</span>
      @endif
    </div>
  </div>

    <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Date Of Joining*</label>
      <input name="date_of_joining" class="form-control" readonly="" value="{{ $result->date_of_joining }}" type="text">
      @if($errors->has('date_of_joining'))
      <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
      @endif
    </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label class="sub-label">Monthly Salary*</label>
          <input name="monthly_salary" class="form-control" value="{{ $result->monthly_salary }}" type="text">
          @if($errors->has('monthly_salary'))
          <span class="text-danger">{{$errors->first('monthly_salary')}}</span>
          @endif
        </div>
    </div>

    <div class="col-md-12">
        <label class="sub-label">Last Three Salary Credits</label>
    </div>
  
    <div class="col-md-4">
        <div class="form-group">
          <label class="sub-label">First</label>
          <input name="last_one_salary_credits" class="form-control" value="{{ $result->last_one_salary_credits }}" type="number">
          @if($errors->has('last_one_salary_credits'))
          <span class="text-danger">{{$errors->first('last_one_salary_credits')}}</span>
          @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label class="sub-label">Second</label>
          <input name="last_two_salary_credits" class="form-control" value="{{ $result->last_two_salary_credits }}" type="number">
          @if($errors->has('last_two_salary_credits'))
          <span class="text-danger">{{$errors->first('last_two_salary_credits')}}</span>
          @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label class="sub-label">Third</label>
          <input name="last_three_salary_credits" class="form-control" value="{{ $result->last_three_salary_credits }}" type="number">
          @if($errors->has('last_three_salary_credits'))
          <span class="text-danger">{{$errors->first('last_three_salary_credits')}}</span>
          @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          <label class="sub-label">I have company provided accommodation</label>
          <input name="accommodation_company" class="form-control" value=" @if($result->accommodation_company == 0) No @else Yes @endif " type="text">
          @if($errors->has('    accommodation_company'))
          <span class="text-danger">{{$errors->first('  accommodation_company')}}</span>
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
            @if($result->cm_type == 2)

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
                <h6 id="salaried" class="cm_type @if($result->cm_type == 1) active @endif">Salaried</h6>
                <h6 id="self_employed" class="cm_type @if($result->cm_type == 2) active @endif">Self Employed</h6>
                <h6 id="other_employed"  class="cm_type @if($result->cm_type == 3) active @endif">Pension</h6>
                <input type="hidden" id="cm_type" name="cm_type" value="{{ $result->cm_type }}">
            </div>    
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Company Name*</label>
                   <input name="self_company_name" class="form-control" value="{{ $result->self_company_name }}" type="text">
                   <!-- <select name="self_company_name" class="form-control" required="true">
                    @foreach($company as $comp)
                    <option value="{{ $comp->id }}" @if($result->self_company_name == $comp->id) selected @endif >{{ $comp->name }}</option> 
                    @endforeach
                  </select> -->
                  @if($errors->has('self_company_name'))
                  <span class="text-danger">{{$errors->first('self_company_name')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Percentage Ownership*</label>
                  <input name="percentage_ownership" class="form-control" value="{{ $result->percentage_ownership }}" type="text">
                  @if($errors->has('percentage_ownership'))
                  <span class="text-danger">{{$errors->first('percentage_ownership')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Type of profession/business*</label>
                  <input name="profession_business" class="form-control" required="true" value="{{ $result->profession_business }}" type="text">
                  @if($errors->has('profession_business'))
                  <span class="text-danger">{{$errors->first('profession_business')}}</span>
                  @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Annual Business Income*</label>
                  <input name="annual_business_income" class="form-control" value="{{ $result->annual_business_income }}" type="number">
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

            @if($result->cm_type == 3)

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
                        <h6 id="salaried" class="cm_type @if($result->cm_type == 1) active @endif">Salaried</h6>
                        <h6 id="self_employed" class="cm_type @if($result->cm_type == 2) active @endif">Self Employed</h6>
                        <h6 id="other_employed"  class="cm_type @if($result->cm_type == 3) active @endif">Pension</h6>
                        <input type="hidden" id="cm_type" name="cm_type" value="{{ $result->cm_type }}">
                    </div>       
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Monthly Pension*</label>
                          <input name="monthly_pension" class="form-control" required="true" value="{{ $result->monthly_pension }}"  type="text">
                          @if($errors->has('monthly_pension'))
                          <span class="text-danger">{{$errors->first('monthly_pension')}}</span>
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
            <div class="card custom-card">
                <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                <div class="form-title">
                    <h4>Selected Service</h4>                        
                </div>
                <div class="row">
            <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Service</label>
                      <input name="ser_name" class="form-control" value="{{ $service->name }}" type="text" readonly="">
                    </div>
                </div>
                @if($result->service_id == 3)

                @if($result->decide_by == 0) 
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Preferred Bank</label>
                          <input name="b_name" class="form-control" value="Lnxx will decide" type="text" readonly="">
                        </div>
                    </div>
                @else
                    @if($bank)
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Preferred Bank</label>
                          <input name="b_name" class="form-control" value="{{ $bank->name }}" type="text" readonly="">
                        </div>
                    </div>
                    @endif 
                @endif 


                @endif 
            </div>
            </div>
                </div>
            </div>
            </div>

            <div class="card custom-card">
            @if($Application_Request)    
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                <div class="form-title">
                    <h4>Details of existing financial products</h4>                        
                </div>
                <div class="form-body">   
                <div class="row">
                @if($Application_Request->credit_card_limit != '' ||  $Application_Request->credit_bank_name != '')    
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Credit Card</label>
                </div>
                @endif
                @if($Application_Request->credit_card_limit)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Credit Card Limit</label>
                      <input name="credit_card_limit" class="form-control" value="{{ $Application_Request->credit_card_limit }}" type="text">
                      @if($errors->has('credit_card_limit'))
                      <span class="text-danger">{{$errors->first('credit_card_limit')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                @if($Application_Request->credit_bank_name)
                <div class="col-md-12">                            
                    <label style="font-size: 15px; margin-top: 0px;">Existing Financial Products</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards" class="form-control" value="{{ $Application_Request->details_of_cards }}" type="text" required="true">
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
                                <option value="$bank->id" @if($bank->id == $Application_Request->credit_bank_name ) selected @endif>{{ $bank->name }}</option>
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
                      <input name="card_limit" class="form-control" value="{{ $Application_Request->card_limit }}" type="text" required="true">
                      @if($errors->has('card_limit'))
                      <span class="text-danger">{{$errors->first('card_limit')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                @if($Application_Request->credit_bank_name2)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards2" class="form-control" value="{{ $Application_Request->details_of_cards2 }}" type="text" required="true">
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
                                <option value="$bank->id" @if($bank->id == $Application_Request->credit_bank_name2 ) selected @endif>{{ $bank->name }}</option>
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
                      <input name="card_limit2" class="form-control" value="{{ $Application_Request->card_limit2 }}" type="text" required="true">
                      @if($errors->has('card_limit2'))
                      <span class="text-danger">{{$errors->first('card_limit2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->credit_bank_name3)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards3" class="form-control" value="{{ $Application_Request->details_of_cards3 }}" type="text" required="true">
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
                                <option value="$bank->id" @if($bank->id == $Application_Request->credit_bank_name3 ) selected @endif>{{ $bank->name }}</option>
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
                      <input name="card_limit3" class="form-control" value="{{ $Application_Request->card_limit3 }}" type="text" required="true">
                      @if($errors->has('card_limit3'))
                      <span class="text-danger">{{$errors->first('card_limit3')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->credit_bank_name4)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Details of Cards</label>
                      <input name="details_of_cards4" class="form-control" value="{{ $Application_Request->details_of_cards4 }}" type="text" required="true">
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
                                <option value="$bank->id" @if($bank->id == $Application_Request->credit_bank_name4 ) selected @endif>{{ $bank->name }}</option>
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
                      <input name="card_limit4" class="form-control" value="{{ $Application_Request->card_limit4 }}" type="text" required="true">
                      @if($errors->has('card_limit4'))
                      <span class="text-danger">{{$errors->first('card_limit4')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->loan_amount)
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Personal Loan</label>
                </div>  
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="loan_amount" class="form-control" value="{{ $Application_Request->loan_amount }}" type="text">
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
                                <option value="$bank->id" @if($bank->id == $Application_Request->loan_bank_name ) selected @endif>{{ $bank->name }}</option>
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
                      <input name="original_loan_amount" class="form-control" value="{{ $Application_Request->original_loan_amount }}" type="text">
                      @if($errors->has('original_loan_amount'))
                      <span class="text-danger">{{$errors->first('original_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="loan_emi" class="form-control" value="{{ $Application_Request->loan_emi }}" type="text">
                      @if($errors->has('loan_emi'))
                      <span class="text-danger">{{$errors->first('loan_emi')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->loan_bank_name2)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name2" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $Application_Request->loan_bank_name2) selected @endif>{{ $bank->name }}</option>
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
                          <input name="original_loan_amount2" class="form-control" value="{{ $Application_Request->original_loan_amount2 }}" type="text">
                          @if($errors->has('original_loan_amount2'))
                          <span class="text-danger">{{$errors->first('original_loan_amount2')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi2" class="form-control" value="{{ $Application_Request->loan_emi2 }}" type="text">
                          @if($errors->has('loan_emi2'))
                          <span class="text-danger">{{$errors->first('loan_emi2')}}</span>
                          @endif
                        </div>
                    </div>
                @endif

                @if($Application_Request->loan_bank_name3)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name3" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $Application_Request->loan_bank_name3) selected @endif>{{ $bank->name }}</option>
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
                          <input name="original_loan_amount3" class="form-control" value="{{ $Application_Request->original_loan_amount3 }}" type="text">
                          @if($errors->has('original_loan_amount3'))
                          <span class="text-danger">{{$errors->first('original_loan_amount3')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi3" class="form-control" value="{{ $Application_Request->loan_emi3 }}" type="text">
                          @if($errors->has('loan_emi3'))
                          <span class="text-danger">{{$errors->first('loan_emi3')}}</span>
                          @endif
                        </div>
                    </div>
                @endif

                @if($Application_Request->loan_bank_name4)
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="sub-label">Bank Name</label>
                          <select name="loan_bank_name4" class="form-control">
                                @foreach($banks as $bank)
                                    <option value="$bank->id" @if($bank->id == $Application_Request->loan_bank_name4) selected @endif>{{ $bank->name }}</option>
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
                          <input name="original_loan_amount4" class="form-control" value="{{ $Application_Request->original_loan_amount4 }}" type="text">
                          @if($errors->has('original_loan_amount4'))
                          <span class="text-danger">{{$errors->first('original_loan_amount4')}}</span>
                          @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="sub-label">EMI</label>
                          <input name="loan_emi4" class="form-control" value="{{ $Application_Request->loan_emi4 }}" type="text">
                          @if($errors->has('loan_emi4'))
                          <span class="text-danger">{{$errors->first('loan_emi4')}}</span>
                          @endif
                        </div>
                    </div>
                @endif 
                

                @if($Application_Request->business_loan_amount)
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Business Loan</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount" class="form-control" value="{{ $Application_Request->business_loan_amount }}" type="text">
                      @if($errors->has('business_loan_amount'))
                      <span class="text-danger">{{$errors->first('business_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi" class="form-control" value="{{ $Application_Request->business_loan_emi }}" type="text">
                      @if($errors->has('business_loan_emi'))
                      <span class="text-danger">{{$errors->first('business_loan_emi')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->business_loan_amount2)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount2" class="form-control" value="{{ $Application_Request->business_loan_amount2 }}" type="text">
                      @if($errors->has('business_loan_amount2'))
                      <span class="text-danger">{{$errors->first('business_loan_amount2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi2" class="form-control" value="{{ $Application_Request->business_loan_emi2 }}" type="text">
                      @if($errors->has('business_loan_emi2'))
                      <span class="text-danger">{{$errors->first('business_loan_emi2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->business_loan_amount3)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount3" class="form-control" value="{{ $Application_Request->business_loan_amount3 }}" type="text">
                      @if($errors->has('business_loan_amount3'))
                      <span class="text-danger">{{$errors->first('business_loan_amount3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi3" class="form-control" value="{{ $Application_Request->business_loan_emi3 }}" type="text">
                      @if($errors->has('business_loan_emi3'))
                      <span class="text-danger">{{$errors->first('business_loan_emi3')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                @if($Application_Request->business_loan_amount4)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="business_loan_amount4" class="form-control" value="{{ $Application_Request->business_loan_amount4 }}" type="text">
                      @if($errors->has('business_loan_amount4'))
                      <span class="text-danger">{{$errors->first('business_loan_amount4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="business_loan_emi4" class="form-control" value="{{ $Application_Request->business_loan_emi4 }}" type="text">
                      @if($errors->has('business_loan_emi4'))
                      <span class="text-danger">{{$errors->first('business_loan_emi4')}}</span>
                      @endif
                    </div>
                </div>
                @endif


                @if($Application_Request->mortgage_loan_amount)
                <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Mortgage Loan</label>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount" class="form-control" value="{{ $Application_Request->mortgage_loan_amount }}" type="text">
                      @if($errors->has('mortgage_loan_amount'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price" class="form-control" value="{{ $Application_Request->purchase_price }}" type="text">
                      @if($errors->has('purchase_price'))
                      <span class="text-danger">{{$errors->first('purchase_price')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan" class="form-control" value="{{ $Application_Request->type_of_loan }}" type="text">
                      @if($errors->has('type_of_loan'))
                      <span class="text-danger">{{$errors->first('type_of_loan')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan" class="form-control" value="{{ $Application_Request->term_of_loan }}" type="text">
                      @if($errors->has('term_of_loan'))
                      <span class="text-danger">{{$errors->first('term_of_loan')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property" class="form-control" value="{{ $Application_Request->end_use_of_property }}" type="text">
                      @if($errors->has('end_use_of_property'))
                      <span class="text-danger">{{$errors->first('end_use_of_property')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate" class="form-control" value="{{ $Application_Request->interest_rate }}" type="text">
                      @if($errors->has('interest_rate'))
                      <span class="text-danger">{{$errors->first('interest_rate')}}</span>
                      @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi" class="form-control" value="{{ $Application_Request->mortgage_emi }}" type="text">
                      @if($errors->has('mortgage_emi'))
                      <span class="text-danger">{{$errors->first('mortgage_emi')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                @if($Application_Request->mortgage_loan_amount2)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount2" class="form-control" value="{{ $Application_Request->mortgage_loan_amount2 }}" type="text">
                      @if($errors->has('mortgage_loan_amount2'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price2" class="form-control" value="{{ $Application_Request->purchase_price2 }}" type="text">
                      @if($errors->has('purchase_price2'))
                      <span class="text-danger">{{$errors->first('purchase_price2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan2" class="form-control" value="{{ $Application_Request->type_of_loan2 }}" type="text">
                      @if($errors->has('type_of_loan2'))
                      <span class="text-danger">{{$errors->first('type_of_loan2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan2" class="form-control" value="{{ $Application_Request->term_of_loan2 }}" type="text">
                      @if($errors->has('term_of_loan2'))
                      <span class="text-danger">{{$errors->first('term_of_loan2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property2" class="form-control" value="{{ $Application_Request->end_use_of_property2 }}" type="text">
                      @if($errors->has('end_use_of_property2'))
                      <span class="text-danger">{{$errors->first('end_use_of_property2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate2" class="form-control" value="{{ $Application_Request->interest_rate2 }}" type="text">
                      @if($errors->has('interest_rate2'))
                      <span class="text-danger">{{$errors->first('interest_rate2')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi2" class="form-control" value="{{ $Application_Request->mortgage_emi2 }}" type="text">
                      @if($errors->has('mortgage_emi2'))
                      <span class="text-danger">{{$errors->first('mortgage_emi2')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->mortgage_loan_amount3)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount3" class="form-control" value="{{ $Application_Request->mortgage_loan_amount3 }}" type="text">
                      @if($errors->has('mortgage_loan_amount3'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price3" class="form-control" value="{{ $Application_Request->purchase_price3 }}" type="text">
                      @if($errors->has('purchase_price3'))
                      <span class="text-danger">{{$errors->first('purchase_price3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan3" class="form-control" value="{{ $Application_Request->type_of_loan3 }}" type="text">
                      @if($errors->has('type_of_loan3'))
                      <span class="text-danger">{{$errors->first('type_of_loan3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan3" class="form-control" value="{{ $Application_Request->term_of_loan3 }}" type="text">
                      @if($errors->has('term_of_loan3'))
                      <span class="text-danger">{{$errors->first('term_of_loan3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property3" class="form-control" value="{{ $Application_Request->end_use_of_property3 }}" type="text">
                      @if($errors->has('end_use_of_property3'))
                      <span class="text-danger">{{$errors->first('end_use_of_property3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate3" class="form-control" value="{{ $Application_Request->interest_rate3 }}" type="text">
                      @if($errors->has('interest_rate3'))
                      <span class="text-danger">{{$errors->first('interest_rate3')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi3" class="form-control" value="{{ $Application_Request->mortgage_emi3 }}" type="text">
                      @if($errors->has('mortgage_emi3'))
                      <span class="text-danger">{{$errors->first('mortgage_emi3')}}</span>
                      @endif
                    </div>
                </div>
                @endif


                @if($Application_Request->mortgage_loan_amount4)
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Loan Amount</label>
                      <input name="mortgage_loan_amount4" class="form-control" value="{{ $Application_Request->mortgage_loan_amount4 }}" type="text">
                      @if($errors->has('mortgage_loan_amount4'))
                      <span class="text-danger">{{$errors->first('mortgage_loan_amount4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Purchase price/ current market valuation</label>
                      <input name="purchase_price4" class="form-control" value="{{ $Application_Request->purchase_price4 }}" type="text">
                      @if($errors->has('purchase_price4'))
                      <span class="text-danger">{{$errors->first('purchase_price4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Type of loan</label>
                      <input name="type_of_loan4" class="form-control" value="{{ $Application_Request->type_of_loan4 }}" type="text">
                      @if($errors->has('type_of_loan4'))
                      <span class="text-danger">{{$errors->first('type_of_loan4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Term of loan</label>
                      <input name="term_of_loan4" class="form-control" value="{{ $Application_Request->term_of_loan4 }}" type="text">
                      @if($errors->has('term_of_loan4'))
                      <span class="text-danger">{{$errors->first('term_of_loan4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">End use of property</label>
                      <input name="end_use_of_property4" class="form-control" value="{{ $Application_Request->end_use_of_property4 }}" type="text">
                      @if($errors->has('end_use_of_property4'))
                      <span class="text-danger">{{$errors->first('end_use_of_property4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Interest Rate</label>
                      <input name="interest_rate4" class="form-control" value="{{ $Application_Request->interest_rate4 }}" type="text">
                      @if($errors->has('interest_rate4'))
                      <span class="text-danger">{{$errors->first('interest_rate4')}}</span>
                      @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">EMI</label>
                      <input name="mortgage_emi4" class="form-control" value="{{ $Application_Request->mortgage_emi4 }}" type="text">
                      @if($errors->has('mortgage_emi4'))
                      <span class="text-danger">{{$errors->first('mortgage_emi4')}}</span>
                      @endif
                    </div>
                </div>
                @endif
                
            </div>
            </div>           
            </div>
            </div>
            </div>
        </div> 
        @endif
                
            @if(isset($result->video))  
            <div class="col-md-6">
            <h3 style="margin-top: -20px; font-size: 20px; ">Upload Video</h3>    
            <video width="420" height="300" controls style="margin-bottom: 20px;">
              <source src="{!! asset($result->video) !!}" type="video/mp4">
            </video>
            </div>
            
            @endif
            </div>
    
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




