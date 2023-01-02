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
                <h1 class="page-header">Lead List</h1>

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
                                                <h6 class="main-content-label mb-1">Lead Filter</h6>
                                            </div>
                                            <div class="panel-body row">
                                                <div class="col-md-12" style="margin-top: 15px;">
                                                    {!! Form::open(array('method' => 'POST',
                                                    'route' => array('lead.paginate'), 'id' => 'ajaxForm')) !!}
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
                                                                        <?php $get_type = \DB::table('services')->get(); ?>
                                                                        @foreach($get_type as $get_type)
                                                                        <option value="{{$get_type->name}}">{{$get_type->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 margintop20">
                                                            <div class="form-group">
                                                                {!! Form::hidden('form-search', 1) !!}
                                                                {!! Form::submit('Filter', array('class' => 'btn
                                                                btn-primary')) !!}
                                                                <a href="{!! route('lead.index') !!}"
                                                                    class="btn btn-success">Reset Filter</a>
                                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                                                    Action With All Checked
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
                        <form action="{{ route('lead.action') }}" method="post">
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
                            <table id="paginate-load" data-route="{{route('lead.paginate')}}" class="table table-hover">
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MULTIPLE ASSIGN LEAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="main-content-label mb-1">Lead Distribution by Agent/Employee Category</h6>
                            <input type="hidden" id="ids" value="">
                        </div>
                        <div class="panel-body row">
                            <div class="col-md-12" style="margin-top: 15px;">
                                {!! Form::open(array('method' => 'POST',
                                'route' => array('auto.lead.paginate'), 'id' => 'ajaxForm')) !!}
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Name</label>
                                            {!! Form::text('name', null, array('class' =>
                                            'form-control', 'id' => 'name')) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="product_type"
                                                class="control-label">Email</label>
                                            {!! Form::text('email', null, array('class' =>
                                            'form-control', 'id' => 'email')) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="product_type"
                                                class="control-label">Mobile</label>
                                            {!! Form::number('mobile', null, array('class' =>
                                            'form-control', 'id' => 'mobile')) !!}
                                        </div>
                                            </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">Products</label>
                                                <select name="pattern" id="product" class="form-control" aria-label="Default select example">
                                                <option>Select Product</option>
                                                <?php $get_type = \DB::table('services')->get(); ?>
                                                @foreach($get_type as $get_type)
                                                <option value="{{$get_type->name}}">{{$get_type->name}}</option>
                                                @endforeach
                                                    
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">Language</label>
                                                <select name="pattern" id="language" class="form-control" aria-label="Default select example">
                                                <?php $get_lang = \DB::table('lead_language_master')->get(); ?>
                                                @foreach($get_lang as $get_lang)
                                                <option value="{{$get_lang->lang_name}}">{{$get_lang->lang_name}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">Type of Selection</label>
                                                <select name="user_type" class="form-control" aria-label="Default select example">
                                                    <option value="" selected>Select</option>
                                                    <option value="3">Agents</option>
                                                    <option value="4">Employees</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">`Duration/Pattern</label>
                                                <select onchange="duration_pattern(this.value)" class="form-control" aria-label="Default select example">
                                                    <option value="" selected>Select</option>
                                                    <option value="duration">Duration</option>
                                                    <option value="pattern">Pattern</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 duration" style="display:none">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">Selection of Duration</label>
                                                <select onchange="duration(this.value)" class="form-control" aria-label="Default select example">
                                                    <option value="" selected>Select</option>
                                                    <option value="hours">Hrs</option>
                                                    <option value="days">Days</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 hours" style="display:none">
                                        <div class="form-group">
                                        <label for="product_type" class="control-label">Hours</label>
                                                <input id="timepicker" name="hours" class="form-control" type="text">     
                                        </div>
                                    </div>
                                    <div class="col-sm-2 days" style="display:none">
                                        <div class="form-group">
                                        <label for="product_type"
                                                class="control-label">Days</label>
                                            {!! Form::number('days', null, array('class' =>
                                            'form-control')) !!}
                                                
                                        </div>
                                    </div>
                                    <div class="col-sm-3 pattern" style="display:none">
                                        <div class="form-group">
                                            <label for="user_type"
                                                class="control-label">Selection of Pattern</label>
                                                <select name="pattern" class="form-control" aria-label="Default select example">
                                                    <option value="" selected>Select</option>
                                                    <option value="follow_up">No of Follow Up</option>
                                                    <option value="reminder">No of Reminder</option>
                                                    <option value="emails">No of E-mails</option>
                                                    <option value="calls">No of Calls Attempts</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 margintop20">
                                        <div class="form-group">
                                        <a href="#" onclick="search_filter()" style="color:white;"
                                                class="btn btn-success">Filter</a>    
                                        <a href="#"
                                                class="btn btn-warning">Reset Filter</a>
                                                <a style="color:white;" onclick="action_filter()"  type="button" class="btn btn-success">Distribute Now</a>
                                        </div>
                                    </div>
                                    <div id="send-status">
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="panel-body row">
                            <div class="col-md-12" style="margin-top: 15px;">
                            <div id="data-wrapper4" style="height:230px;overflow-y: scroll;">
                                            <!-- Results -->
                                        </div>
                            </div>
                        </div>   
                    </div>
                </div>

            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MULTIPLE ASSIGN LEAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php $get_empp = App\Models\User::where('status', 1)->where('user_type', 4)->orWhere('user_type', 3)->get() ?>
            
            <select class="form-control" id="send_value" onchange="check_send(this.value)">    
                <option>Assign Employee</option>
                @foreach($get_empp as $get_empp)  
                <option value="{{$get_empp->id}}" >{{$get_empp->name}}</option>
                @endforeach
            </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

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
<script>
function check_send(multi_check_option){
    var check_val = $.map($(':checkbox[name=check_v\\[\\]]:checked'), function(n, i){
      return n.value;
    }).join(',');
    var get_emp_aj = multi_check_option;
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        url : "{{route('leads.multiple_check_val')}}", 
        data: {check_val:check_val,get_emp_aj:get_emp_aj},
        success:function(xhr){
            if(xhr.status==200){
                location.reload();
            }
        },
        });
}
</script>
<script>
function search_filter() {
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var type = $("#type").val();
    var product = $("#product").val();
    var language = $("#language").val();
    var page = 1;
    $('#data-wrapper4').scroll(function() {
    if ($('#data-wrapper4').scrollTop() + $('#data-wrapper4').height() >= $(document).height()) {
        page++;
        infinteLoadMore4(page);
    }
    });
    $.ajax({
            url: "{{url('admin/emp-agent/filter')}}?page=" + page,
            datatype: "html",
            data:{name:name, email:email, mobile:mobile, type:type, product:product, language:language},
            type: "get",
            beforeSend: function() {
                $('.auto-load').show();
                $('.priloder_ajax').show();
            }
        })
        .done(function(response) {
            if (response.length == 0) {
                $('.auto-load').html("We don't have more data to display :(");
                return;
            }
            $('.auto-load').hide();
            $("#data-wrapper4").html(response);
            var html = '<div class="priloder_ajax' + page + '">' +
                '<div class="d-flex justify-content-center">' +
                '<div class="spinner-grow text-primary" role="status">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>' +
                '</div></div>';
            $("#data-wrapper4").append(html);
            setTimeout(function() {
                $('.priloder_ajax' + page).hide();
            }, 2000);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
}</script>
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
    $.ajax({
        type: 'GET',
        url : "{{url('admin/save-view-details')}}", 
        data: {id:id, name:name, email:email, number:number, product:product, source:source},
        success: function(response){
            location.reload();
        }
        });    
}
function get_ids(id){
    $('#ids').val(id);
}
function check_send_2(id){
    var check_vall = $.map($(':checkbox[name=check_v\\[\\]]:checked'), function(n, i){
      return n.value;
    }).join(',');
    var lead_id = $('#ids').val();
    if(check_vall == ''){
       var check_val = lead_id;
    }else{
       var check_val = check_vall;
    }
    var get_emp_aj = id;
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        url : "{{route('leads.multiple_check_val')}}", 
        data: {check_val:check_val,get_emp_aj:get_emp_aj},
        success:function(xhr){
            if(xhr.status==200){
                toastr.options.timeOut = 1000;
                toastr.success('Lead Assign Succesfully');
                setTimeout(function(){
                    location.reload();
                }, 2000);
            }
        },
        });
}
</script>
<script>
    function duration_pattern(value){
        val = value;
        if(val == ''){
            $(".duration").hide();
            $(".pattern").hide();
        }
        if(val == 'duration'){
            $(".duration").show();
            $(".hours").hide();
            $(".days").hide();
            $(".pattern").hide();
        }
        if(val == 'pattern'){
            $(".pattern").show();
            $(".hours").hide();
            $(".days").hide();
            $(".duration").hide();
        }
    }
    function duration(value){
        val = value;
        if(val == ''){
            $(".hours").hide();
            $(".days").hide();
        }
        if(val == 'hours'){
            $(".hours").show();
            $(".days").hide();
        }
        if(val == 'days'){
            $(".days").show();
            $(".hours").hide();
        }
    }
</script>
<script>
//     function select_all_2() {
//     $('.cb-element').
// };
function select_all_2(){
        var is_checked = $('#select_all_2').val();
        if(is_checked == 1){
            $( ".check_boxs" ).each(function(){
                this.checked = true;
            });
            $('#select_all_2').val(0);
        }
        if(is_checked == 0){
            $( ".check_boxs" ).each(function(){
                this.checked = false;
            });
            $('#select_all_2').val(1);
        }
    };
</script>
<script>
    function action_filter(){
    var user_value = $.map($(':checkbox[name=select_all_2\\[\\]]:checked'), function(n, i){
      return n.value; }).join(',');
    var lead_value = $.map($(':checkbox[name=check_v\\[\\]]:checked'), function(n, i){
        return n.value;}).join(',');
    $.ajax({
        type: 'GET',
        url : "{{route('select-user-lead')}}", 
        data: {user_value:user_value,lead_value:lead_value},
        success:function(xhr){
            if(xhr.status == 200){
                toastr.options.timeOut = 1500;
                toastr.success('Lead Assign Succesfully');
                setTimeout(function(){
                    location.reload();
                }, 3000);
            }
        },
        });
    }

</script>
@stop