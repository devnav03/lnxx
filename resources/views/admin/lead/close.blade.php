@extends('admin.layouts.admin')
@section('css')
<!-- tables -->
<link rel="stylesheet" type="text/css" href="{!! asset('css/table-style.css') !!}" />
<!-- //tables -->
@endsection
@php
    $route  = \Route::currentRouteName();    
@endphp
@section('content')

<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">                
                <h1 class="page-header">Report List</h1>

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        {{-- for message rendering --}}
                        @include('admin.layouts.messages')
                        <div class="panel panel-default">

<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body">
                <div>
                    <h6 class="main-content-label mb-1">Report List Filter</h6>
                </div>
                <div class="panel-body row">
                    <div class="col-md-12" style="margin-top: 15px;">
                    @if($route == 'leads.lead_close_leads')    
                    {!! Form::open(array('method' => 'POST', 'route' => array('close.lead.paginate'), 'id' => 'ajaxForm')) !!}
                    @elseif($route == 'leads.closed_leads')
                        {!! Form::open(array('method' => 'POST', 'route' => array('emp.close.lead.paginate'), 'id' => 'ajaxForm')) !!}
                    @elseif($route == 'agent.leads.closed_leads')
                        {!! Form::open(array('method' => 'POST', 'route' => array('agent.close.lead.paginate'), 'id' => 'ajaxForm')) !!}
                    @elseif($route == 'manager.leads.closed_leads')
                        {!! Form::open(array('method' => 'POST', 'route' => array('manager.close.lead.paginate'), 'id' => 'ajaxForm')) !!}
                    @endif
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    {!! Form::text('name', null, array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="product_type"
                                        class="control-label">Email</label>
                                    {!! Form::text('email', null, array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="product_type"
                                        class="control-label">Mobile</label>
                                    {!! Form::number('mobile', null, array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            @if($route == 'leads.lead_close_leads')
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="product_type"
                                        class="control-label">Reference</label>
                                    {!! Form::text('reference', null, array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="product_type"
                                        class="control-label">Source</label>
                                    {!! Form::text('source', null, array('class' =>
                                    'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="product_type"
                                        class="control-label">Product</label>
                                        <select name="product" class="form-control" aria-label="Default select example">
                                            <option value="" selected>Select Product Type</option>
                                            <?php $get_type = \DB::table('services')->where('status', 1)->get(); ?>
                                            @foreach($get_type as $get_type)
                                            <option value="{{$get_type->name}}">{{$get_type->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            @if($route == 'leads.lead_close_leads')
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="alloted_to"
                                        class="control-label">Assign To</label>
                                        <select name="alloted_to" class="form-control" aria-label="Default select example">
                                            <option value="" selected>Select Product Type</option>
                                            <?php $get_user_type = App\Models\User::where('status', 1)->where('user_type', 4)->orWhere('user_type', 3)->get(); ?>
                                            @foreach($get_user_type as $get_user_type)
                                            <option value="{{$get_user_type->id}}">{{$get_user_type->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-4 margintop20">
                                <div class="form-group">
                                    {!! Form::hidden('form-search', 1) !!}
                                    {!! Form::submit('Filter', array('class' => 'btn
                                    btn-primary')) !!}
                                    @if($route == 'leads.lead_close_leads')    
                                    <a href="{!! route('leads.lead_close_leads') !!}"
                                        class="btn btn-success">Reset Filter</a>
                                    <a href="{!! route('leads.lead_close_leads.download') !!}"
                                        class="btn btn-warning">Downlaod Report</a>
                                    @elseif($route == 'leads.closed_leads')
                                    <a href="{!! route('leads.closed_leads') !!}"
                                        class="btn btn-success">Reset Filter</a>
                                    <a href="{!! route('emp.leads.lead_close_leads.download') !!}"
                                        class="btn btn-warning">Downlaod Report</a>
                                    @elseif($route == 'agent.leads.closed_leads')
                                    <a href="{!! route('agent.leads.closed_leads') !!}"
                                        class="btn btn-success">Reset Filter</a>
                                    <a href="{!! route('agent.leads.lead_close_leads.download') !!}"
                                        class="btn btn-warning">Downlaod Report</a>
                                    @elseif($route == 'manager.leads.closed_leads')
                                    <a href="{!! route('manager.leads.closed_leads') !!}"
                                        class="btn btn-success">Reset Filter</a>
                                    <a href="{!! route('manager.leads.lead_close_leads.download') !!}"
                                        class="btn btn-warning">Downlaod Report</a>
                                    @endif
                                    
                                </div>
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
                        @if($route == 'leads.lead_close_leads')    
                            <form action="{{ route('close.lead.action') }}" method="post">
                        @elseif($route == 'emp.leads.closed_leads')
                            <form action="{{ route('emp.close.lead.action') }}" method="post">
                        @elseif($route == 'aganet.leads.closed_leads')
                            <form action="{{ route('agent.close.lead.action') }}" method="post">
                        @elseif($route == 'manager.leads.closed_leads')
                            <form action="{{ route('manager.close.lead.action') }}" method="post">
                        @endif
                        
                        <!--     <div class="row"> -->
                            <div class="col-md-3 pull-right padding0" style="text-align: right; margin-bottom: 15px;padding-right: 0px !important;">
                                {!! lang('Show') !!} {!! Form::select('name', ['20' => '20', '40' => '40', '100' => '100', '200' => '200', '300' => '300'], '20', ['id' => 'per-page']) !!} {!! lang('entries') !!}
                            </div>
                            <div class="col-md-3 padding0" style="padding-left: 0px !important; margin-bottom: 15px;">
                                {!! Form::hidden('page', 'search') !!}
                                {!! Form::hidden('_token', csrf_token()) !!}
                                <!-- {!! Form::text('name', null, array('class' => 'form-control live-search', 'placeholder' => 'Search lead by name')) !!} -->
                            </div>
                           <!--  </div> -->
                            
                            @if($route == 'leads.lead_close_leads')    
                            <table id="paginate-load" data-route="{{route('close.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'emp.leads.closed_leads')
                            <table id="paginate-load" data-route="{{route('emp.close.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'agent.leads.closed_leads')
                            <table id="paginate-load" data-route="{{route('agent.close.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'manager.leads.closed_leads')
                            <table id="paginate-load" data-route="{{route('manager.close.lead.paginate')}}" class="table table-hover">
                            </table>
                            @endif
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop

