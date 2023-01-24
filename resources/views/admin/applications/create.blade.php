@extends('admin.layouts.admin')
@section('content')
@php
    $route  = \Route::currentRouteName();    
@endphp
<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">
            <h1 style="font-size: 17px;font-weight: normal;" class="page-header"> @if(isset($result->ref_id)) Application No #{{ $result->ref_id }} @else Application @endif &nbsp;&nbsp; | &nbsp;&nbsp; Application For : {{ $service->name }} @if($result->service_id == 1) @if($PersonalLoanlimit) &nbsp;&nbsp; | &nbsp;&nbsp; Eligible Loan Amount AED {!! round($PersonalLoanlimit->loan_limit, 2) !!}/- &nbsp;&nbsp; | &nbsp;&nbsp;   EMI AED {!! round($PersonalLoanlimit->loan_emi, 2) !!}/- @endif @endif  @if($result->service_id == 3) @if($PersonalLoanlimit) &nbsp;&nbsp; | &nbsp;&nbsp; Eligible Limit AED {!! round($PersonalLoanlimit->loan_limit, 2) !!}/- @endif @endif <a class="btn btn-sm btn-primary pull-right" href="{!! route('applications.index') !!}"> <i class="fa fa-arrow-left"></i> All Applications </a></h1>
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
                                    <div class="col-md-6">
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
                                    
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
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
                                    <div class="col-md-6" >
                                        <label>Profile Image</label><br>
                                        <img id="blah" src="{!! asset($result->profile_image) !!}" style="max-width: 150px;margin-top: 10px;" alt="" />
                                    </div>    
                                    @endif

                                    <input type="hidden" value="normal" name="provider">
                                   <!--  <div class="col-md-6" style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-default w3ls-button">Submit</button> 
                                    </div>  -->
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="sub-label">Emirates ID Number*</label>
                                                <input name="eid_number" class="form-control" value="{{ $result->eid_number }}" type="text">
                                            </div>
                                        </div>
                                        </div>
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
            @foreach($country as $country1)       
            <option value="{{ $country1->id }}" @if($country1->id == $result->nationality) selected @endif >{{ $country1->country_name }}</option>
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

    @if($result->marital_status == 'Married')

        <div class="col-md-6">
            <div class="form-group">
                <label class="sub-label">Spouse Name*</label>
                <input name="wife_name" class="form-control" value="{{ $result->wife_name }}" type="text" required="true">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="sub-label">Spouse DOB*</label>
                <input name="spouse_date_of_birth" class="form-control" value="{{ $result->spouse_date_of_birth }}" type="text" required="true">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="sub-label">Wedding Anniversary Date*</label>
                <input name="wedding_anniversary_date" class="form-control" value="{{ $result->wedding_anniversary_date }}" type="text" required="true">
            </div>
        </div>


    @endif 

    <div class="col-md-6">
        <div class="form-group">
        <label class="sub-label">No of Dependents*</label>
        <input name="no_of_dependents" class="form-control" @if($result->no_of_dependents) value="{{ $result->no_of_dependents }}" @endif type="text" required="true">
        </div>
    </div>

    @if($dependents)
    <div class="col-md-12"></div>
        @foreach($dependents as $key => $dependent)
            <div class="col-md-6">
                <div class="form-group">
                  <label class="sub-label">Name</label>
                  <input name="dependent_name[{{$key}}]" class="form-control" value="{{ $dependent->name }}" type="text">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                <label class="sub-label">Relation</label>
                <select name="dependent_relation[{{$key}}]" class="form-control">
                <option value="">Select</option>
                <option value="Father" @if($dependent->relation == "Father") selected @endif >Father</option>
                <option value="Mother" @if($dependent->relation == "Mother") selected @endif >Mother</option>
                <option value="Son" @if($dependent->relation == "Son") selected @endif >Son</option>
                <option value="Daughter" @if($dependent->relation == "Daughter") selected @endif >Daughter</option>
                <option value="Brother" @if($dependent->relation == "Brother") selected @endif >Brother</option>
                <option value="Sister" @if($dependent->relation == "Sister") selected @endif >Sister</option>
                <option value="Grandfather" @if($dependent->relation == "Grandfather") selected @endif >Grandfather</option>
                <option value="Grandmother" @if($dependent->relation == "Grandmother") selected @endif >Grandmother</option>
                <option value="Uncle" @if($dependent->relation == "Uncle") selected @endif >Uncle</option>
                <option value="Aunt" @if($dependent->relation == "Aunt") selected @endif >Aunt</option>
                <option value="Cousin" @if($dependent->relation == "Cousin") selected @endif >Cousin</option>
                <option value="Nephew" @if($dependent->relation == "Nephew") selected @endif >Nephew</option>
                <option value="Niece" @if($dependent->relation == "Niece") selected @endif >Niece</option>
                <option value="Husband" @if($dependent->relation == "Husband") selected @endif >Husband</option>
                <option value="Wife" @if($dependent->relation == "Wife") selected @endif >Wife</option>
                </select>
                </div>
            </div>
        @endforeach
    @endif


    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Are you assisted by an agent?</label>
            <input name="agent_reference" class="form-control" value=" @if($result->agent_reference == 0) No @else Yes @endif " type="text">
        </div>
    </div>
    @if($result->agent_reference == 1)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Reference Number</label>
            <input name="reference_number" class="form-control" value="{{ $result->reference_number }}" type="text">
        </div>
    </div>
    @endif
    @if($result->visa_number)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Visa Number</label>
            <input name="visa_number" class="form-control" @if($result->visa_number) value="{{ $result->visa_number }}" @endif type="text">
        </div>
    </div>
    @endif
    @if($result->officer_email)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">Official mail ID</label>
            <input name="officer_email" class="form-control" value="{{ $result->officer_email }}" type="text">
        </div>
    </div>
    @endif
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
    @if($result->aecb_image)
    <div class="col-md-6">
        <div class="form-group">
            <label class="sub-label">AECB credit score file</label><br>
            <a href="{{ asset($result->aecb_image) }}" download>Download</a>
        </div>
    </div>
    @endif

    
    @endif
    <div class="col-md-12"></div>
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
        <div class="row">
        <div class="col-md-9">
            <div class="form-group">
              <label class="sub-label">First</label>
              <input name="last_one_salary_credits" class="form-control" value="{{ $result->last_one_salary_credits }}" type="number">
              @if($errors->has('last_one_salary_credits'))
              <span class="text-danger">{{$errors->first('last_one_salary_credits')}}</span>
              @endif
            </div>
        </div>
        <div class="col-md-3">
            @if($result->last_one_salary_file)
            <a style="margin-top: 39px; float: left; margin-left: -105px;" href="{{ asset($result->last_one_salary_file) }}" download>Download</a>
            @endif
        </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="row">
        <div class="col-md-9">
        <div class="form-group">
          <label class="sub-label">Second</label>
          <input name="last_two_salary_credits" class="form-control" value="{{ $result->last_two_salary_credits }}" type="number">
          @if($errors->has('last_two_salary_credits'))
          <span class="text-danger">{{$errors->first('last_two_salary_credits')}}</span>
          @endif
        </div>
    </div>
    <div class="col-md-3">
        @if($result->last_two_salary_file)
        <a style="margin-top: 39px; float: left; margin-left: -105px;" href="{{ asset($result->last_two_salary_file) }}" download>Download</a>
        @endif
    </div>
    </div>
    </div>


    <div class="col-md-4">
        <div class="row">
        <div class="col-md-9">
        <div class="form-group">
          <label class="sub-label">Third</label>
          <input name="last_three_salary_credits" class="form-control" value="{{ $result->last_three_salary_credits }}" type="number">
          @if($errors->has('last_three_salary_credits'))
          <span class="text-danger">{{$errors->first('last_three_salary_credits')}}</span>
          @endif
        </div>
        </div>
        <div class="col-md-3">
        @if($result->last_three_salary_file)
        <a style="margin-top: 39px; float: left; margin-left: -105px;" href="{{ asset($result->last_three_salary_file) }}" download>Download</a>
        @endif
        </div>
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
            
            @if(count($PersonalLoanPreference) != 0)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                        <div class="forms">
                            <div class="form-title">
                                <h4>Preferred Bank</h4>                        
                            </div>
                            <ul style="padding-left: 15px; margin-bottom: 0px;">
                                @foreach($PersonalLoanPreference as $preference_bank)
                                    <li style="margin-bottom: 5px; font-size: 15px;">{{ $preference_bank->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            @endif

            @if(count($CardTypePreference) != 0)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                        <div class="forms">
                            <div class="form-title">
                                <h4>Preferred Card Type</h4>                        
                            </div>
                            <ul style="padding-left: 15px; margin-bottom: 0px;">
                                @foreach($CardTypePreference as $CardType)
                                    <li style="margin-bottom: 5px; font-size: 15px;">{{ $CardType->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            @endif


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
                      <label class="sub-label">Required credit card limit</label>
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

               
             <!--    <div class="col-md-12">                            
                    <label style="font-size: 18px; margin-top: 15px;">Details For Personal Loan</label>
                </div>  --> 
                @if($Application_Request->loan_amount)
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="sub-label">Required Loan Amount</label>
                      <input name="loan_amount" class="form-control" value="{{ $Application_Request->loan_amount }}" type="text">
                      @if($errors->has('loan_amount'))
                      <span class="text-danger">{{$errors->first('loan_amount')}}</span>
                      @endif
                    </div>
                </div>
                @endif

                @if($Application_Request->exist_personal == 1)
                <div class="col-md-12">                            
                    <label style="font-size: 15px; margin-top: 0px;">Details of Existing Personal Loans</label>
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

            
            @if($app_data)
            @if($app_data->residential_address_line_1)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                    <div class="forms">
                    <div class="form-title">
                        <h4>Address Details</h4>                        
                    </div>
                    <div class="row">     
                        <div class="col-md-12">
                            <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Residential Address Details</label>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Residential Address Line 1</label>
                              <input name="residential_address_line_1" class="form-control" value="{{ $app_data->residential_address_line_1 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Residential Address Line 2</label>
                              <input name="residential_address_line_2" class="form-control" value="{{ $app_data->residential_address_line_2 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Residential Address Line 3</label>
                              <input name="residential_address_line_3" class="form-control" value="{{ $app_data->residential_address_line_3 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Nearest Landmark</label>
                              <input name="residential_address_nearest_landmark" class="form-control" value="{{ $app_data->residential_address_nearest_landmark }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Emirate</label>
                              <input name="residential_emirate" class="form-control" value="{{ $app_data->residential_emirate }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">PO Box No</label>
                              <input name="residential_po_box" class="form-control" value="{{ $app_data->residential_po_box }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Resdence Type</label>
                                <select name="resdence_type" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($app_data->resdence_type ==  "Shared") Selected @endif value="Shared">Shared</option>
                                    <option @if($app_data->resdence_type ==  "Rented") Selected @endif value="Rented">Rented</option>
                                    <option @if($app_data->resdence_type ==  "Owned") Selected @endif value="Owned">Owned</option>
                                    <option @if($app_data->resdence_type ==  "Employer Provided") Selected @endif value="Employer Provided">Employer Provided</option>
                                    <option @if($app_data->resdence_type ==  "Employer Provided") Selected @endif value="Employer Provided">Living With Parents</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Annual Rent</label>
                              <input name="annual_rent" class="form-control" value="{{ $app_data->annual_rent }}" type="text">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Duration At Current Address</label>
                              <input name="duration_at_current_address" class="form-control" value="{{ $app_data->duration_at_current_address }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Office Address</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Company Name</label>
                              <input name="company_name" class="form-control" value="{{ $app_data->company_name }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Company Phone No</label>
                              <input name="company_phone_no" class="form-control" value="{{ $app_data->company_phone_no }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 1</label>
                              <input name="company_address_line_1" class="form-control" value="{{ $app_data->company_address_line_1 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 2</label>
                              <input name="company_address_line_2" class="form-control" value="{{ $app_data->company_address_line_2 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 3</label>
                              <input name="company_address_line_3" class="form-control" value="{{ $app_data->company_address_line_3 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Po Box No</label>
                              <input name="company_po_box" class="form-control" value="{{ $app_data->company_po_box }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Emirate</label>
                              <input name="company_emirate" class="form-control" value="{{ $app_data->company_emirate }}" type="text">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Permanent Address In Home Country</label>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 1</label>
                              <input name="permanent_address_home_country_line_1" class="form-control" value="{{ $app_data->permanent_address_home_country_line_1 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 2</label>
                              <input name="permanent_address_home_country_line_2" class="form-control" value="{{ $app_data->permanent_address_home_country_line_2 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 3</label>
                              <input name="permanent_address_home_country_line_3" class="form-control" value="{{ $app_data->permanent_address_home_country_line_3 }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">City</label>
                              <input name="permanent_address_city" class="form-control" value="{{ $app_data->permanent_address_city }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="sub-label">Country</label>
                                <select class="form-control" name="permanent_address_country">
                                    @foreach($country as $country)       
                                    <option value="{{ $country->id }}" @if($country->id == $app_data->permanent_address_country) selected @endif >{{ $country->country_name }}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Zip/Pin Code</label>
                              <input name="permanent_address_zipcode" class="form-control" value="{{ $app_data->permanent_address_zipcode }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Tel. with IDD Code</label>
                              <input name="permanent_addresstel_with_idd_code" class="form-control" value="{{ $app_data->permanent_addresstel_with_idd_code }}" type="text">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Mailing Address</label>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Po Box</label>
                              <input name="mailing_po_box" class="form-control" value="{{ $app_data->mailing_po_box }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Address Line 1</label>
                              <input name="mailing_address_line" class="form-control" value="{{ $app_data->mailing_address_line }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Emirate</label>
                              <input name="mailing_emirate" class="form-control" value="{{ $app_data->mailing_emirate }}" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Preferred Mailing Address</label>
                                <select name="resdence_type" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($app_data->resdence_type ==  "Residential") Selected @endif value="Residential">Residential</option>
                                    <option @if($app_data->resdence_type ==  "Office") Selected @endif value="Office">Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Preferred Statement Mode</label>
                                <select name="preferred_statement_mode" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($app_data->preferred_statement_mode ==  "E-Mail") Selected @endif value="E-Mail">E-Mail</option>
                                    <option @if($app_data->preferred_statement_mode ==  "Post") Selected @endif value="Post">Post</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="sub-label">Preferred Contact Number</label>
                                <select name="preferred_contact_number" class="form-control">
                                    <option value="">Select</option>
                                    <option @if($app_data->preferred_contact_number ==  "Home") Selected @endif value="Home">Home</option>
                                    <option @if($app_data->preferred_contact_number ==  "Business") Selected @endif value="Business">Business</option>
                                    <option @if($app_data->preferred_contact_number ==  "Mobile") Selected @endif value="Mobile">Mobile</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div> 
            @endif

            @if($app_data->education)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                        <div class="forms">
                            <div class="form-title">
                                <h4>Education Details</h4>                        
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">Qualification</label>
                                  <input name="education" class="form-control" value="{{ $app_data->education }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">Primary School</label>
                                  <input name="primary_school" class="form-control" value="{{ $app_data->primary_school }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">High School</label>
                                  <input name="high_school" class="form-control" value="{{ $app_data->high_school }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">Graduate</label>
                                  <input name="graduate" class="form-control" value="{{ $app_data->graduate }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">Postgraduate</label>
                                  <input name="postgraduate" class="form-control" value="{{ $app_data->postgraduate }}" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="sub-label">Others</label>
                                  <input name="others" class="form-control" value="{{ $app_data->others }}" type="text">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @endif

            @if($app_data->vehicle_in_uae)
            <div class="card custom-card">
                <div class="card-body">
                    <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                        <div class="forms">
                            <div class="form-title">
                                <h4>Personal details</h4>                        
                            </div>
                            <div class="row">

 @if($result->marital_status == 'Married')  
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Does Your Spouse Live In UAE?*</label> 
      <select name="spouse_live_in_uae" onChange="SpouseLive(this);" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($app_data->spouse_live_in_uae == 1) selected @endif >Yes</option>
        <option value="0" @if($app_data->spouse_live_in_uae == 0) selected @endif >No</option>
      </select>
      @if($errors->has('spouse_live_in_uae'))
        <span class="text-danger">{{$errors->first('spouse_live_in_uae')}}</span>
      @endif
    </div>
  </div>
    @if($app_data->spouse_live_in_uae == 1)
    <div class="col-md-6 spouse_working">
        <div class="form-group">
          <label class="sub-label">Spouse Working*</label> 
          <select name="spouse_working" class="form-control">
            <option value="">Select</option>
            <option value="1" @if($app_data->spouse_working == 1) selected @endif >Yes</option>
            <option value="0" @if($app_data->spouse_working == 0) selected @endif >No</option>
          </select>
          @if($errors->has('spouse_working'))
            <span class="text-danger">{{$errors->first('spouse_working')}}</span>
          @endif
        </div>
    </div>
    @endif

    <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">You Have Children In The UAE?*</label> 
      <select name="children_in_the_uae" onChange="ChildrenUAE(this);" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($app_data->children_in_the_uae == 1) selected @endif >Yes</option>
        <option value="0" @if($app_data->children_in_the_uae == 0) selected @endif >No</option>
      </select>
      @if($errors->has('children_in_the_uae'))
        <span class="text-danger">{{$errors->first('children_in_the_uae')}}</span>
      @endif
    </div>
    </div>
    @if($app_data->children_in_the_uae == 1)
    <div class="col-md-6 ChildrenUAE" >
        <div class="form-group">
          <label class="sub-label">In School?*</label> 
          <select name="in_school" class="form-control">
            <option value="">Select</option>
            <option value="1" @if($app_data->in_school == 1) selected @endif >Yes</option>
            <option value="0" @if($app_data->in_school == 0) selected @endif >No</option>
          </select>
          @if($errors->has('in_school'))
            <span class="text-danger">{{$errors->first('in_school')}}</span>
          @endif
        </div>
    </div>
    @endif
  @endif

<div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Do You Own A Vehicle In UAE?*</label> 
      <select name="vehicle_in_uae" class="form-control" required="true">
        <option value="">Select</option>
        <option value="1" @if($app_data->vehicle_in_uae == 1) selected @endif >Yes</option>
        <option value="0" @if($app_data->vehicle_in_uae == 0) selected @endif >No</option>
      </select>
      @if($errors->has('vehicle_in_uae'))
        <span class="text-danger">{{$errors->first('vehicle_in_uae')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Favorite City (As A Security Feature)*</label>
      <input name="favorite_city" class="form-control" value="{{ $app_data->favorite_city }}" required="true" type="text">
      @if($errors->has('favorite_city'))
      <span class="text-danger">{{$errors->first('favorite_city')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-12">
    <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Bank Details</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Account Number</label>
      <input name="account_number" class="form-control" value="{{ $app_data->account_number }}" type="number">
      @if($errors->has('account_number'))
      <span class="text-danger">{{$errors->first('account_number')}}</span>
      @endif
    </div>
  </div>
    <div class="col-md-6">
        <div class="form-group">
          <label class="sub-label">Bank Name</label>
          <input name="bank_name" class="form-control" value="{{ $app_data->bank_name }}" type="text">
          @if($errors->has('bank_name'))
          <span class="text-danger">{{$errors->first('bank_name')}}</span>
          @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label class="sub-label">Iban Number</label>
        <input name="iban_number" class="form-control" value="{{ $app_data->iban_number }}" type="text">
        @if($errors->has('iban_number'))
        <span class="text-danger">{{$errors->first('iban_number')}}</span>
        @endif
        </div>
    </div>

    <div class="col-md-12">
        <label class="sub-label" style="font-size: 17px; font-weight: 500; margin-bottom: 0px;">Multiple Nationality Holder Details</label>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label class="sub-label">Nationality Name</label>
          <input name="multi_nationality_name" class="form-control" value="{{ $app_data->multi_nationality_name }}" type="text">
          @if($errors->has('multi_nationality_name'))
          <span class="text-danger">{{$errors->first('multi_nationality_name')}}</span>
          @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label class="sub-label">Passport Number</label>
          <input name="multi_passport_number" class="form-control" value="{{ $app_data->multi_passport_number }}" type="text">
          @if($errors->has('multi_passport_number'))
          <span class="text-danger">{{$errors->first('multi_passport_number')}}</span>
          @endif
        </div>
    </div>




        
                
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @endif





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




