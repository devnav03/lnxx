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
                <h1 class="page-header">Assign Lead List</h1>
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
                                            <h6 class="main-content-label mb-1">Assign Lead Filter</h6>
                                            </div>
                                            <div class="panel-body row">
                                                <div class="col-md-12" style="margin-top: 15px;">
                                                @if($route == 'leads.lead_assign_leads')
                                                    {!! Form::open(array('method' => 'POST',
                                                    'route' => array('assign.lead.paginate'), 'id' => 'ajaxForm')) !!}
                                                @elseif($route == 'leads.open_leads')
                                                    {!! Form::open(array('method' => 'POST',
                                                    'route' => array('emp.open.lead.paginate'), 'id' => 'ajaxForm')) !!}
                                                @elseif($route == 'agent.leads.open_leads')
                                                    {!! Form::open(array('method' => 'POST',
                                                    'route' => array('agent.open.lead.paginate'), 'id' => 'ajaxForm')) !!}
                                                @elseif($route == 'manager.leads.open_leads')
                                                    {!! Form::open(array('method' => 'POST',
                                                    'route' => array('manager.open.lead.paginate'), 'id' => 'ajaxForm')) !!}
                                                @endif
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label">Name</label>
                                                                {!! Form::text('name', null, array('class' =>
                                                                'form-control')) !!}
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-sm-3">
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
                                                        </div> -->
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="product_type"
                                                                    class="control-label">Reference</label>
                                                                {!! Form::text('reference', null, array('class' =>
                                                                'form-control')) !!}
                                                            </div>
                                                        </div>
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
                                                        @if($route == 'leads.lead_assign_leads')
                                                        <div class="col-sm-3">
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
                                                        <div class="col-sm-3 margintop20">
                                                            <div class="form-group">
                                                                {!! Form::hidden('form-search', 1) !!}
                                                                {!! Form::submit('Filter', array('class' => 'btn
                                                                btn-primary')) !!}
                                                                @if($route == 'leads.lead_assign_leads')
                                                                <a href="{!! route('leads.lead_assign_leads') !!}"
                                                                    class="btn btn-success">Reset Filter</a>
                                                                @elseif($route == 'leads.open_leads')
                                                                <a href="{!! route('leads.open_leads') !!}"
                                                                    class="btn btn-success">Reset Filter</a>
                                                                @elseif($route == 'agent.leads.open_leads')
                                                                <a href="{!! route('agent.leads.open_leads') !!}"
                                                                    class="btn btn-success">Reset Filter</a>
                                                                @elseif($route == 'manager.leads.open_leads')
                                                                <a href="{!! route('manager.leads.open_leads') !!}"
                                                                    class="btn btn-success">Reset Filter</a>
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

                        @if($route == 'leads.lead_assign_leads')
                        <form action="{{ route('assign.lead.action') }}" method="post">
                        @elseif($route == 'leads.open_leads')
                        <form action="{{ route('emp.open.lead.action') }}" method="post">
                        @elseif($route == 'agent.leads.open_leads')
                        <form action="{{ route('agent.open.lead.action') }}" method="post">
                        @elseif($route == 'manager.leads.open_leads')
                        <form action="{{ route('manager.open.lead.action') }}" method="post">
                        @endif
                        <!--     <div class="row"> -->
                        <div class="col-md-3 pull-right padding0" style="text-align: right; margin-bottom: 15px;">
                                {!! lang('Show') !!} {!! Form::select('name', ['20' => '20', '40' => '40', '100' => '100', '200' => '200', '300' => '300'], '20', ['id' => 'per-page']) !!} {!! lang('entries') !!}
                            </div>
                            <div class="col-md-3 padding0">
                                {!! Form::hidden('page', 'search') !!}
                                {!! Form::hidden('_token', csrf_token()) !!}
                               <!--  {!! Form::text('name', null, array('class' => 'form-control live-search', 'placeholder' => 'Search customer by name')) !!} -->
                            </div>
                           <!--  </div> -->
                           @if($route == 'leads.lead_assign_leads')
                           <table id="paginate-load" data-route="{{route('assign.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'leads.open_leads')
                            <table id="paginate-load" data-route="{{route('emp.open.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'agent.leads.open_leads')
                            <table id="paginate-load" data-route="{{route('agent.open.lead.paginate')}}" class="table table-hover">
                            </table>
                            @elseif($route == 'manager.leads.open_leads')
                            <table id="paginate-load" data-route="{{route('manager.open.lead.paginate')}}" class="table table-hover">
                            </table>
                           @endif
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{asset('img/logo-black.png')}}" alt="logo">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="showDetails">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@if($route == 'leads.lead_assign_leads')
<script>

function view_details(id){
    $.ajax({
        type: 'GET',
        url : "{{url('admin/admin-view-details')}}", 
        data: {id:id},
        success: function(response){
                $("#showDetails").html(response)
        }
        });    
}
function savedata(id){
    var name = $('#m_name').val();
    var email = $('#m_email').val();
    var number = $('#m_number').val();
    var product = $('#m_product').val();
    var source = $('#m_source').val();
    var status = $('#m_status').val();
    $.ajax({
        type: 'GET',
        url : "{{url('admin/save-view-details')}}", 
        data: {id:id, name:name, email:email, number:number, product:product, source:source, status:status},
        success: function(response){
            location.reload();
        }
        });    
}
</script>
@elseif($route == 'leads.open_leads')
<script>

function view_details(id){
    $.ajax({
        type: 'GET',
        url : "{{url('employee/admin-view-details')}}", 
        data: {id:id},
        success: function(response){
                $("#showDetails").html(response)
        }
        });    
}
function savedata(id){
    var name = $('#m_name').val();
    var email = $('#m_email').val();
    var number = $('#m_number').val();
    var product = $('#m_product').val();
    var source = $('#m_source').val();
    var status = $('#m_status').val();
    $.ajax({
        type: 'GET',
        url : "{{url('employee/save-view-details')}}", 
        data: {id:id, name:name, email:email, number:number, product:product, source:source, status:status},
        success: function(response){
            location.reload();
        }
        });    
}
</script>
@elseif($route == 'agent.leads.open_leads')
<script>

function view_details(id){
    $.ajax({
        type: 'GET',
        url : "{{url('agent/admin-view-details')}}", 
        data: {id:id},
        success: function(response){
                $("#showDetails").html(response);
        }
        });    
}
function savedata(id){
    var name = $('#m_name').val();
    var email = $('#m_email').val();
    var number = $('#m_number').val();
    var product = $('#m_product').val();
    var source = $('#m_source').val();
    var status = $('#m_status').val();
    $.ajax({
        type: 'GET',
        url : "{{url('agent/save-view-details')}}", 
        data: {id:id, name:name, email:email, number:number, product:product, source:source, status:status},
        success: function(response){
            location.reload();
        }
        });    
}
</script>
@elseif($route == 'manager.leads.open_leads')
<script>

function view_details(id){
    $.ajax({
        type: 'GET',
        url : "{{url('manager/admin-view-details')}}", 
        data: {id:id},
        success: function(response){
                $("#showDetails").html(response)
        }
        });    
}
function savedata(id){
    var name = $('#m_name').val();
    var email = $('#m_email').val();
    var number = $('#m_number').val();
    var product = $('#m_product').val();
    var source = $('#m_source').val();
    var status = $('#m_status').val();
    $.ajax({
        type: 'GET',
        url : "{{url('manager/save-view-details')}}", 
        data: {id:id, name:name, email:email, number:number, product:product, source:source, status:status},
        success: function(response){
            location.reload();
        }
        });    
}
</script>
@endif
@stop

