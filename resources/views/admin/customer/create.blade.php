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
</style>

@stop



