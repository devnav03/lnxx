@extends('admin.layouts.admin')
@section('css')
<!-- tables -->
<link rel="stylesheet" type="text/css" href="{!! asset('css/table-style.css') !!}" />
<!-- //tables -->
@endsection
@section('content')

<div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">                
                <h1 class="page-header">Open Lead List</h1>

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
                        {!! Form::open(array('method' => 'POST',
                        'route' => array('open.lead.paginate'), 'id' => 'ajaxForm')) !!}
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
                            <div class="col-sm-3 margintop20">
                                <div class="form-group">
                                    {!! Form::hidden('form-search', 1) !!}
                                    {!! Form::submit('Filter', array('class' => 'btn
                                    btn-primary')) !!}
                                    <a href="{!! route('leads.lead_open_leads') !!}"
                                        class="btn btn-success">Reset Filter</a>
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

                        <form action="{{ route('open.lead.action') }}" method="post">
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
                            <table id="paginate-load" data-route="{{route('open.lead.paginate')}}" class="table table-hover">
                            </table>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop

