@extends('frontend.layouts.app')
@section('content')

<section class="personal_details edu_dt">
<div class="container">  
<div class="row">  
<div class="col-md-7">
<div class="personal_details_box">
<h2>Type Of Product Requested</h2>
<h6>Please enter your information to check the Offer.</h6>

<form action="{{ route('consent-approval') }}" method="post">
{{ csrf_field() }}  

<div class="row">

  @if(in_array(3, $services))
  <div class="col-md-12">
    <h5 style="font-size: 17px; margin-top: 15px;">Details For Credit Card</h5>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Credit Card Limit</label>
      <input name="credit_card_limit" class="form-control" @if($result) value="{{ $result->credit_card_limit }}" @else value="{{ old('credit_card_limit') }}" @endif type="text">
      @if($errors->has('credit_card_limit'))
      <span class="text-danger">{{$errors->first('credit_card_limit')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <label style="font-size: 14px; margin-top: -10px;">Existing Financial Products</label>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Details of Cards</label>
      <select name="details_of_cards" class="form-control" required="true">
        @if($result)
        <option value="Credit Card" @if($result->details_of_cards == 'Credit Card') selected @endif>Credit Card</option>
        <option value="Debit Card" @if($result->details_of_cards == 'Debit Card') selected @endif>Debit Card</option>
        @else
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        @endif
      </select>
      @if($errors->has('details_of_cards'))
      <span class="text-danger">{{$errors->first('details_of_cards')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Bank Name</label>
      <input name="credit_bank_name" class="form-control" @if($result) value="{{ $result->credit_bank_name }}" @else value="{{ old('credit_bank_name') }}" @endif type="text">
      @if($errors->has('credit_bank_name'))
      <span class="text-danger">{{$errors->first('credit_bank_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Card Limit</label>
      <input name="card_limit" class="form-control" @if($result) value="{{ $result->card_limit }}" @else value="{{ old('card_limit') }}" @endif type="text">
      @if($errors->has('card_limit'))
      <span class="text-danger">{{$errors->first('card_limit')}}</span>
      @endif
    </div>
  </div>

   @endif

  @if(in_array(1, $services))
  <div class="col-md-12">
    <h5 style="font-size: 17px; margin-top: 15px;">Details For Personal Loan</h5>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Loan Amount</label>
      <input name="loan_amount" class="form-control" @if($result) value="{{ $result->loan_amount }}" @else value="{{ old('loan_amount') }}" @endif type="text">
      @if($errors->has('loan_amount'))
      <span class="text-danger">{{$errors->first('loan_amount')}}</span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <label style="font-size: 14px; margin-top: -10px;">Details of Existing Loans</label>
  </div>
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Bank Name</label>
      <input name="loan_bank_name" class="form-control" @if($result) value="{{ $result->loan_bank_name }}" @else value="{{ old('loan_bank_name') }}" @endif type="text">
      @if($errors->has('loan_bank_name'))
      <span class="text-danger">{{$errors->first('loan_bank_name')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Original Loan amount</label>
      <input name="original_loan_amount" class="form-control" @if($result) value="{{ $result->original_loan_amount }}" @else value="{{ old('original_loan_amount') }}" @endif type="text">
      @if($errors->has('original_loan_amount'))
      <span class="text-danger">{{$errors->first('original_loan_amount')}}</span>
      @endif
    </div>
  </div>
   


  @endif

  @if(in_array(4, $services))
  <div class="col-md-12">
    <h5 style="font-size: 17px; margin-top: 15px;">Details For Business Loan</h5>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Loan Amount</label>
      <input name="business_loan_amount" class="form-control" @if($result) value="{{ $result->business_loan_amount }}" @else value="{{ old('business_loan_amount') }}" @endif type="text">
      @if($errors->has('business_loan_amount'))
      <span class="text-danger">{{$errors->first('business_loan_amount')}}</span>
      @endif
    </div>
  </div>

  @endif

  @if(in_array(5, $services))
  <div class="col-md-12">
    <h5 style="font-size: 17px; margin-top: 15px;">Details For Mortgage Loan</h5>
  </div>
  
  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Loan Amount</label>
      <input name="mortgage_loan_amount" class="form-control" @if($result) value="{{ $result->mortgage_loan_amount }}" @else value="{{ old('mortgage_loan_amount') }}" @endif type="text">
      @if($errors->has('mortgage_loan_amount'))
      <span class="text-danger">{{$errors->first('mortgage_loan_amount')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Purchase price/ current market valuation</label>
      <input name="purchase_price" class="form-control" @if($result) value="{{ $result->purchase_price }}" @else value="{{ old('purchase_price') }}" @endif type="text">
      @if($errors->has('purchase_price'))
      <span class="text-danger">{{$errors->first('purchase_price')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Type of loan</label>
      <select name="type_of_loan" class="form-control" required="true">
        @if($result)
        <option value="Primary Sale" @if($result->type_of_loan == 'Primary Sale') selected @endif>Primary Sale</option>
        <option value="Secondary Sale" @if($result->type_of_loan == 'Secondary Sale') selected @endif>Secondary Sale</option>
        <option value="Buyout" @if($result->type_of_loan == 'Buyout') selected @endif>Buyout</option>
        <option value="Equity" @if($result->type_of_loan == 'Equity') selected @endif>Equity</option>
        <option value="Top up" @if($result->type_of_loan == 'Top up') selected @endif>Top up</option>
        @else
        <option value="Primary Sale">Primary Sale</option>
        <option value="Secondary Sale">Secondary Sale</option>
        <option value="Buyout">Buyout</option>
        <option value="Equity">Equity</option>
        <option value="Top up">Top up</option>
        @endif
      </select>
      @if($errors->has('type_of_loan'))
      <span class="text-danger">{{$errors->first('type_of_loan')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Term of loan</label>
      <input name="term_of_loan" class="form-control" @if($result) value="{{ $result->term_of_loan }}" @else value="{{ old('term_of_loan') }}" @endif type="text">
      @if($errors->has('term_of_loan'))
      <span class="text-danger">{{$errors->first('term_of_loan')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">End use of property</label>
      <select name="end_use_of_property" class="form-control" required="true">
        @if($result)
        <option value="Self use" @if($result->end_use_of_property == 'Self use') selected @endif>Self use</option>
        <option value="Rental" @if($result->end_use_of_property == 'Rental') selected @endif>Rental</option>
        @else
        <option value="Self use">Self use</option>
        <option value="Secondary Sale">Secondary Sale</option>
        @endif
      </select>
      @if($errors->has('end_use_of_property'))
      <span class="text-danger">{{$errors->first('end_use_of_property')}}</span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label class="sub-label">Interest Rate</label>
      <input name="interest_rate" class="form-control" @if($result) value="{{ $result->interest_rate }}" @else value="{{ old('interest_rate') }}" @endif type="text">
      @if($errors->has('interest_rate'))
      <span class="text-danger">{{$errors->first('interest_rate')}}</span>
      @endif
    </div>
  </div>

      




  @endif



  <div class="col-md-12 text-center">
    <a href="{{ route('cm-details') }}" class="back_btn">Back</a> &nbsp;&nbsp;
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