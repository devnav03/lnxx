@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>CM Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('education-detail') }}" method="post">
{{ csrf_field() }}  

<div class="row">

  @if($cm_type == 1)
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Designation</label>
      <input name="designation" class="form-control" @if($result) value="{{ $result->designation }}" @else value="{{ old('designation') }}" @endif type="text" required="true">
      @if($errors->has('designation'))
      <span class="text-danger">{{$errors->first('designation')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Date Of Joining</label>
      <input name="date_of_joining" class="form-control" @if($result) value="{{ $result->date_of_joining }}" @else value="{{ old('date_of_joining') }}" @endif type="date">
      @if($errors->has('date_of_joining'))
      <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
      @endif
    </div>
  </div>


  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Department</label>
      <input name="department" class="form-control" @if($result) value="{{ $result->department }}" @else value="{{ old('department') }}" @endif type="text">
      @if($errors->has('department'))
      <span class="text-danger">{{$errors->first('department')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Salary</label>
      <input name="monthly_salary" class="form-control" @if($result) value="{{ $result->monthly_salary }}" @else value="{{ old('monthly_salary') }}" @endif type="number">
      @if($errors->has('monthly_salary'))
      <span class="text-danger">{{$errors->first('monthly_salary')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Staff Id No.</label>
      <input name="staff_id_no" class="form-control" @if($result) value="{{ $result->staff_id_no }}" @else value="{{ old('staff_id_no') }}" @endif type="text">
      @if($errors->has('staff_id_no'))
      <span class="text-danger">{{$errors->first('staff_id_no')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Name Of Previous Employer</label>
      <input name="name_previous_emp" class="form-control" @if($result) value="{{ $result->name_previous_emp }}" @else value="{{ old('name_previous_emp') }}" @endif type="text">
      @if($errors->has('name_previous_emp'))
      <span class="text-danger">{{$errors->first('name_previous_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No. Of Years With Previous Employer</label>
      <input name="no_year_previous_emp" class="form-control" @if($result) value="{{ $result->no_year_previous_emp }}" @else value="{{ old('no_year_previous_emp') }}" @endif type="number">
      @if($errors->has('no_year_previous_emp'))
      <span class="text-danger">{{$errors->first('no_year_previous_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Additional Income</label>
      <input name="monthly_add_income" class="form-control" @if($result) value="{{ $result->monthly_add_income }}" @else value="{{ old('monthly_add_income') }}" @endif type="text">
      @if($errors->has('monthly_add_income'))
      <span class="text-danger">{{$errors->first('monthly_add_income')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Deductions</label>
      <input name="monthly_deductions" class="form-control" @if($result) value="{{ $result->monthly_deductions }}" @else value="{{ old('monthly_deductions') }}" @endif type="text">
      @if($errors->has('monthly_deductions'))
      <span class="text-danger">{{$errors->first('monthly_deductions')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Salary Payment Date</label>
      <input name="salary_pay_date" class="form-control" @if($result) value="{{ $result->salary_pay_date }}" @else value="{{ old('salary_pay_date') }}" @endif type="number">
      @if($errors->has('salary_pay_date'))
      <span class="text-danger">{{$errors->first('salary_pay_date')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label" style="width: 100%;">Are You A Confirmed Employee?</label>
      @if($result)

      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="1" @if($result->confirm_emp == 1) checked="" @endif type="radio">Yes</label>
      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="0" @if($result->confirm_emp == 0) checked="" @endif type="radio" style="margin-left: 25px;">No</label>

      @else
      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="1" checked="" type="radio">Yes</label>
      <label class="sub-label" style="float: left; display: flex;"><input name="confirm_emp" class="form-control" value="0" type="radio" style="margin-left: 25px;">No</label>
      @endif

      @if($errors->has('confirm_emp'))
      <span class="text-danger">{{$errors->first('confirm_emp')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Work Experience (Years)</label>
      <input name="work_exp" class="form-control" @if($result) value="{{ $result->work_exp }}" @else value="{{ old('work_exp') }}" @endif type="number">
      @if($errors->has('work_exp'))
      <span class="text-danger">{{$errors->first('work_exp')}}</span>
      @endif
    </div>
  </div>
  @endif

  @if($cm_type == 2)
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Organisation Name</label>
      <input name="org_name" class="form-control" required="true" @if($result) value="{{ $result->org_name }}" @else value="{{ old('org_name') }}" @endif type="text">
      @if($errors->has('org_name'))
      <span class="text-danger">{{$errors->first('org_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Nature Of Business</label>
      <input name="nature_business" class="form-control" @if($result) value="{{ $result->nature_business }}" @else value="{{ old('nature_business') }}" @endif type="text">
      @if($errors->has('nature_business'))
      <span class="text-danger">{{$errors->first('nature_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Year Of Business In Uae</label>
      <input name="year_business" class="form-control" required="true" @if($result) value="{{ $result->year_business }}" @else value="{{ old('year_business') }}" @endif type="number">
      @if($errors->has('year_business'))
      <span class="text-danger">{{$errors->first('year_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Gross Income</label>
      <input name="annual_gross_income" class="form-control" @if($result) value="{{ $result->annual_gross_income }}" @else value="{{ old('annual_gross_income') }}" @endif type="number">
      @if($errors->has('annual_gross_income'))
      <span class="text-danger">{{$errors->first('annual_gross_income')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Gross Expenses</label>
      <input name="annual_gross_expenses" class="form-control" @if($result) value="{{ $result->annual_gross_expenses }}" @else value="{{ old('annual_gross_expenses') }}" @endif type="number">
      @if($errors->has('annual_gross_expenses'))
      <span class="text-danger">{{$errors->first('annual_gross_expenses')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Annual Net Income</label>
      <input name="annaul_net_income" class="form-control" @if($result) value="{{ $result->annaul_net_income }}" @else value="{{ old('annaul_net_income') }}" @endif type="number">
      @if($errors->has('annaul_net_income'))
      <span class="text-danger">{{$errors->first('annaul_net_income')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Trade Licence No.</label>
      <input name="trade_licence_no" class="form-control" @if($result) value="{{ $result->trade_licence_no }}" @else value="{{ old('trade_licence_no') }}" @endif type="text">
      @if($errors->has('trade_licence_no'))
      <span class="text-danger">{{$errors->first('trade_licence_no')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Insurance Date</label>
      <input name="insurance_date" class="form-control" @if($result) value="{{ $result->insurance_date }}" @else value="{{ old('insurance_date') }}" @endif type="date">
      @if($errors->has('insurance_date'))
      <span class="text-danger">{{$errors->first('insurance_date')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Expire Date</label>
      <input name="exp_date" class="form-control" @if($result) value="{{ $result->insurance_date }}" @else value="{{ old('exp_date') }}" @endif type="date">
      @if($errors->has('exp_date'))
      <span class="text-danger">{{$errors->first('exp_date')}}</span>
      @endif
    </div>
  </div>
  @endif

  @if($cm_type == 3)

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Source Name</label>
      <input name="source_name" class="form-control" required="true" @if($result) value="{{ $result->source_name }}" @else value="{{ old('source_name') }}" @endif type="text">
      @if($errors->has('source_name'))
      <span class="text-danger">{{$errors->first('source_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Source Of Income</label>
  <input name="source_income" class="form-control" required="true" @if($result) value="{{ $result->source_income }}" @else value="{{ old('source_income') }}" @endif type="text">
    @if($errors->has('source_income'))
    <span class="text-danger">{{$errors->first('source_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Monthly Income</label>
  <input name="month_income" class="form-control" required="true" @if($result) value="{{ $result->month_income }}" @else value="{{ old('month_income') }}" @endif type="number">
    @if($errors->has('month_income'))
    <span class="text-danger">{{$errors->first('month_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Additional Income</label>
  <input name="add_income" class="form-control" @if($result) value="{{ $result->add_income }}" @else value="{{ old('add_income') }}" @endif type="number">
    @if($errors->has('add_income'))
    <span class="text-danger">{{$errors->first('add_income')}}</span>
    @endif
  </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Income</label>
      <input name="total_income" class="form-control" @if($result) value="{{ $result->total_income }}" @else value="{{ old('total_income') }}" @endif type="number">
        @if($errors->has('total_income'))
        <span class="text-danger">{{$errors->first('total_income')}}</span>
        @endif
    </div>
  </div>

  @endif


  <div class="col-md-12 text-center">
    <a href="{{ route('personal-details') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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