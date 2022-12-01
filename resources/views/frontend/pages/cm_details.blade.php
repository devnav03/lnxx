@extends('frontend.layouts.app')
@section('content')

<section class="personal_details">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box cm_dt">
<h2>Employment Details</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('product-requested') }}" method="post">
{{ csrf_field() }}  

<div class="row">
  <div class="col-md-6">
  <label class="sub-label">Employment Type*</label>
  <select name="cm_type" class="form-control" required="true" onChange="RelationChange(this);">
    <option value="">select</option>
    <option value="1" @if($cm_type == 1) selected @endif>Salaried</option>
    <option value="2" @if($cm_type == 2) selected @endif>Self Employed</option>
    <option value="3" @if($cm_type == 3) selected @endif>Pension</option>
  </select>
</div>
</div>
<div class="row">
  <div class="col-md-6 salaried_type" @if($cm_type == 2 || $cm_type == 3) style="display: none;"  @endif>
    <div class="form-group">
      <label class="sub-label">Company Name*</label>
      <input name="company_name" @if($cm_type != 2 && $cm_type != 3) required="true"  @endif  id="company_name" class="form-control" @if($result) value="{{ $result->company_name }}" @else value="{{ old('company_name') }}" @endif type="text">
      @if($errors->has('company_name'))
      <span class="text-danger">{{$errors->first('company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 salaried_type" @if($cm_type == 2 || $cm_type == 3) style="display: none;"  @endif>
    <div class="form-group">
      <label class="sub-label">Date Of Joining*</label>
      <input name="date_of_joining" id="date_of_joining" @if($cm_type != 2 && $cm_type != 3) required="true"  @endif class="form-control" @if($result) value="{{ $result->date_of_joining }}" @else value="{{ old('date_of_joining') }}" @endif type="date">
      @if($errors->has('date_of_joining'))
      <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 salaried_type" @if($cm_type == 2 || $cm_type == 3) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Monthly Salary*</label>
      <input name="monthly_salary" class="form-control" id="monthly_salary" @if($result) value="{{ $result->monthly_salary }}" @else value="{{ old('monthly_salary') }}" @endif @if($cm_type != 2 && $cm_type != 3) required="true"  @endif type="number">
      @if($errors->has('monthly_salary'))
      <span class="text-danger">{{ $errors->first('monthly_salary') }}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 salaried_type" @if($cm_type == 2 || $cm_type == 3) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Last Three Salary credits</label>
      <input name="last_three_salary_credits" class="form-control" @if($result) value="{{ $result->last_three_salary_credits }}" @else value="{{ old('last_three_salary_credits') }}" @endif type="text">
      @if($errors->has('last_three_salary_credits'))
      <span class="text-danger">{{$errors->first('last_three_salary_credits')}}</span>
      @endif
    </div>
  </div>

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Name Of Previous Employer</label>
      <input name="name_previous_emp" class="form-control" @if($result) value="{{ $result->name_previous_emp }}" @else value="{{ old('name_previous_emp') }}" @endif type="text">
      @if($errors->has('name_previous_emp'))
      <span class="text-danger">{{$errors->first('name_previous_emp')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">No. Of Years With Previous Employer</label>
      <input name="no_year_previous_emp" class="form-control" @if($result) value="{{ $result->no_year_previous_emp }}" @else value="{{ old('no_year_previous_emp') }}" @endif type="number">
      @if($errors->has('no_year_previous_emp'))
      <span class="text-danger">{{$errors->first('no_year_previous_emp')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Additional Income</label>
      <input name="monthly_add_income" class="form-control" @if($result) value="{{ $result->monthly_add_income }}" @else value="{{ old('monthly_add_income') }}" @endif type="text">
      @if($errors->has('monthly_add_income'))
      <span class="text-danger">{{$errors->first('monthly_add_income')}}</span>
      @endif
    </div>
  </div> -->

 <!--  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Monthly Deductions</label>
      <input name="monthly_deductions" class="form-control" @if($result) value="{{ $result->monthly_deductions }}" @else value="{{ old('monthly_deductions') }}" @endif type="text">
      @if($errors->has('monthly_deductions'))
      <span class="text-danger">{{$errors->first('monthly_deductions')}}</span>
      @endif
    </div>
  </div> -->

 <!--  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Salary Payment Date</label>
      <input name="salary_pay_date" class="form-control" @if($result) value="{{ $result->salary_pay_date }}" @else value="{{ old('salary_pay_date') }}" @endif type="number">
      @if($errors->has('salary_pay_date'))
      <span class="text-danger">{{$errors->first('salary_pay_date')}}</span>
      @endif
    </div>
  </div> -->

<!--   <div class="col-md-6">
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
  </div> -->
  <!-- <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Work Experience (Years)</label>
      <input name="work_exp" class="form-control" @if($result) value="{{ $result->work_exp }}" @else value="{{ old('work_exp') }}" @endif type="number">
      @if($errors->has('work_exp'))
      <span class="text-danger">{{$errors->first('work_exp')}}</span>
      @endif
    </div>
  </div> -->

  <div class="col-md-6 self_employed_type" @if($cm_type != 2) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Company Name*</label>
      <input name="self_company_name" class="form-control" id="company_name_sec"  @if($result) value="{{ $result->self_company_name }}" @else value="{{ old('self_company_name') }}" @endif @if($cm_type == 2) required="true"  @endif type="text">
      @if($errors->has('self_company_name'))
      <span class="text-danger">{{$errors->first('self_company_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 self_employed_type" @if($cm_type != 2) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Percentage Ownership*</label>
      <input name="percentage_ownership" @if($cm_type == 2) required="true"  @endif id="percentage_ownership" class="form-control" @if($result) value="{{ $result->percentage_ownership }}" @else value="{{ old('percentage_ownership') }}" @endif type="text">
      @if($errors->has('percentage_ownership'))
      <span class="text-danger">{{$errors->first('percentage_ownership')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 self_employed_type" @if($cm_type != 2) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Type of profession/business*</label>
      <select name="profession_business" id="profession_business" class="form-control" @if($cm_type == 2) required="true"  @endif>
        <option>select</option>
        <option value="Accounting" @if(isset($result->profession_business)) @if($result->profession_business == "Accounting") selected @endif @endif>Accounting</option>
        <option value="Consulting" @if(isset($result->profession_business)) @if($result->profession_business == 'Consulting') selected @endif @endif>Consulting</option>
        <option value="Event Planning" @if(isset($result->profession_business)) @if($result->profession_business == 'Event Planning') selected @endif @endif>Event Planning</option>
        <option value="Finance" @if(isset($result->profession_business)) @if($result->profession_business == 'Finance') selected @endif @endif>Finance</option>
        <option value="Human Resources" @if(isset($result->profession_business)) @if($result->profession_business == 'Human Resources') selected @endif @endif>Human Resources</option>
      </select>
      @if($errors->has('profession_business'))
      <span class="text-danger">{{$errors->first('profession_business')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 self_employed_type" @if($cm_type != 2) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Annual Business Income*</label>
      <input name="annual_business_income" id="annual_business_income" @if($cm_type == 2) required="true"  @endif class="form-control" @if($result) value="{{ $result->annual_business_income }}" @else value="{{ old('annual_business_income') }}" @endif type="number">
      @if($errors->has('annual_business_income'))
      <span class="text-danger">{{$errors->first('annual_business_income')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6 pension_type" @if($cm_type != 3) style="display: none;" @endif>
    <div class="form-group">
      <label class="sub-label">Monthly Pension*</label>
      <input name="monthly_pension" id="monthly_pension" class="form-control" @if($cm_type == 3) required="true"  @endif @if($result) value="{{ $result->monthly_pension }}" @else value="{{ old('monthly_pension') }}" @endif type="number">
      @if($errors->has('monthly_pension'))
      <span class="text-danger">{{$errors->first('monthly_pension')}}</span>
      @endif
    </div>
  </div>

<!--   <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Source Of Income</label>
  <input name="source_income" class="form-control" required="true" @if($result) value="{{ $result->source_income }}" @else value="{{ old('source_income') }}" @endif type="text">
    @if($errors->has('source_income'))
    <span class="text-danger">{{$errors->first('source_income')}}</span>
    @endif
  </div>
  </div> -->

<!--   <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Monthly Income</label>
  <input name="month_income" class="form-control" required="true" @if($result) value="{{ $result->month_income }}" @else value="{{ old('month_income') }}" @endif type="number">
    @if($errors->has('month_income'))
    <span class="text-danger">{{$errors->first('month_income')}}</span>
    @endif
  </div>
  </div> -->

<!--   <div class="col-md-6">
  <div class="form-group">
  <label class="sub-label">Additional Income</label>
  <input name="add_income" class="form-control" @if($result) value="{{ $result->add_income }}" @else value="{{ old('add_income') }}" @endif type="number">
    @if($errors->has('add_income'))
    <span class="text-danger">{{$errors->first('add_income')}}</span>
    @endif
  </div>
  </div> -->

<!--   <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Total Income</label>
      <input name="total_income" class="form-control" @if($result) value="{{ $result->total_income }}" @else value="{{ old('total_income') }}" @endif type="number">
        @if($errors->has('total_income'))
        <span class="text-danger">{{$errors->first('total_income')}}</span>
        @endif
    </div>
  </div> -->


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

<script type="text/javascript">
function RelationChange(that) {
    if (that.value == "2") {
        $(".self_employed_type").show();
        $(".salaried_type").hide();
        $(".pension_type").hide();

        $("#company_name").removeAttr('required');
        $("#date_of_joining").removeAttr('required'); 
        $("#monthly_salary").removeAttr('required'); 

        $("#monthly_pension").removeAttr('required');
        
        $("#profession_business").attr("required", true);
        $("#percentage_ownership").attr("required", true);
        $("#company_name_sec").attr("required", true);
        $("#annual_business_income").attr("required", true);
        
    } else if(that.value == "3") {
        $(".salaried_type").hide();
        $(".self_employed_type").hide();
        $(".pension_type").show();

        $("#company_name").removeAttr('required');
        $("#date_of_joining").removeAttr('required'); 
        $("#monthly_salary").removeAttr('required');

        $("#profession_business").removeAttr('required');
        $("#percentage_ownership").removeAttr('required');
        $("#company_name_sec").removeAttr('required');
        $("#annual_business_income").removeAttr('required');

        $("#monthly_pension").attr("required", true);

    } else {
        $(".salaried_type").show();
        $(".self_employed_type").hide();
        $(".pension_type").hide();

        $("#company_name").attr("required", true);
        $("#date_of_joining").attr("required", true); 
        $("#monthly_salary").attr("required", true); 

        $("#profession_business").removeAttr('required');
        $("#percentage_ownership").removeAttr('required');
        $("#company_name_sec").removeAttr('required');
        $("#annual_business_income").removeAttr('required');

        $("#monthly_pension").removeAttr('required');
    }
   
}
</script>
@endsection    