<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="{{ config('app.name', 'Dashboard') }} - ">
		<meta name="author" content="{{ config('app.name', 'Dashboard') }}">
		<meta name="keywords" content="">
		<!-- Favicon -->
		<link rel="icon" href="{{ asset('img/favicon.png')}}" type="image/x-icon"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>LNXX</title>
		<!-- Bootstrap css-->
		<link  id="style" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
		<!-- Icons css-->
		<link href="{{ asset('plugins/web-fonts/icons.css') }}" rel="stylesheet"/>
		<link href="{{ asset('plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/web-fonts/plugin.css') }}" rel="stylesheet"/>
		<!-- Style css-->
		<link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Select2 css-->
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <!-- Mutipleselect css-->
        <link rel="stylesheet" href="{{ asset('plugins/multipleselect/multiple-select.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>

	<body class="ltr main-body leftmenu">

<!-- Loader -->
<div id="global-loader">
    <img src="{{ asset(config('app.images.loader'))}}" class="loader-img" alt="Loader">
</div>
<!-- End Loader -->


<!-- Page -->
<div class="page">
    <!-- Main Header-->
    <div class="main-header side-header sticky" style="background: black;">
        <div class="main-container container-fluid">
        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
        </div>
    </div>
    <!-- End Main Header-->


    <!-- Main Content-->
    <div class="main-content" style="margin-left: 240px; margin-right: 240px">

        <div class="main-container container-fluid">
            <div class="inner-body">
            <div class="agile-grids">   
    <div class="grids">       
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    <button data-dismiss="alert" class="close">
                        &times;
                    </button>
                    <i class="fa fa-check-circle"></i> &nbsp;
                    {!! Session::get('success') !!}
                </div>
                @elseif (Session::has('error'))
                <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close">
                        &times;
                    </button>
                    <i class="fa fa-check-circle"></i> &nbsp;
                    {!! Session::get('error') !!}
                </div>
            @endif
                <h1 style="text-align:center; font-size: 24px;">Submit Your Interest on <img style="margin-top: -10px;" src="{{asset('img/logo-black.png')}}" alt="logo"></h1>
                
                <div class="panel panel-widget forms-panel">
                    <div class="card custom-card">
            <div class="card-body">
            <div class="panel panel-widget forms-panel" style="float: left;width: 100%; padding-bottom: 20px;">
                <div class="forms">
                        <div class="form-grids widget-shadow" data-example-id="basic-forms"> 
                            <!-- <div class="form-title">
                                <h4>Service Information</h4>                        
                            </div> -->
                            <div class="form-body">
                                    {!! Form::open(array('method' => 'POST', 'route' => array('social.lead.store', $u_id), 'id' => 'ajaxSave', 'class' => '', 'files'=>'true')) !!}
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">Name (As per ID Card)</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <?php
                                      $min_date = date('Y-m-d', strtotime('-6570 days') );
                                    ?>
                                    <div class="col-md-6">
                                        <label for="email">Date of Birth</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="date" max="{{$min_date}}" name="dob" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                    $status = \DB::table('lead_social_form_setting')->where('id', 1)->first(); 
                                    ?>
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email">
                                            @if($status->e_otp == 1)
                                            <div class="input-group-prepend">
                                                <a type="button" onclick="send_e_otp()"><span style="display: flow-root!important" class="input-group-text" id="basic-addon1">Send otp <i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                            </div>
                                            @endif
                                            <!-- <img alt="Image" style="width:10px; hight:10px" src="{{asset('img/loader-waiting.gif')}}"> -->
                                        </div>
                                        <span id="emailMsg"></span>
                                    </div>
                                    @if($status->e_otp == 1)
                                    <div class="col-md-6 e_div_otp" style="display:none;">
                                        <label for="email">OTP</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-open" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="number" name="e_otp" id="e_otp" class="form-control" placeholder="Enter your otp send on email">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="number">Mobile</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="number" id="mobile" name="number" class="form-control" placeholder="Enter your mobile no.">
                                            @if($status->m_otp == 1)
                                            <div class="input-group-prepend">
                                                <a type="button" onclick="m_save_otp()"><span style="display: flow-root!important" class="input-group-text" id="basic-addon1">Send otp <i class="fa fa-arrow-right" aria-hidden="true"></i></span></a>
                                            </div>
                                            @endif
                                        </div>
                                        <span id="mobileMsg"></span>
                                    </div>
                                    @if($status->m_otp == 1)
                                    <div class="col-md-6 m_div_otp" style="display:none;">
                                        <label for="number">OTP</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="number" name="m_otp" id="m_otp" class="form-control" placeholder="Enter your otp send on mobile no.">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="number">AECB Credit Score</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-flash" aria-hidden="true"></i></span>
                                            </div>
                                            <input type="number" name="aecb_score" class="form-control" placeholder="Enter your AECB Credit Score in number">
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <label for="number">I would like to enquiry about the product</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fab fa-product-hunt" aria-hidden="true"></i></span>
                                            </div>
                                            <select name="product" class="form-control" aria-label="Default select example">
                                                <option>Select Product</option>
                                                <?php $get_type = \DB::table('services')->where('status', 1)->get(); ?>
                                                @foreach($get_type as $get_type)
                                                <option value="{{$get_type->name}}" <?php if(!empty($result->product)){if($result->product == $get_type->name){echo"selected";}} ?>>{{$get_type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <label for="number">Language Prefer</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-language" aria-hidden="true"></i></span>
                                            </div>
                                            <select name="lang_name" class="form-control" aria-label="Default select example">
                                                <option>Select Language</option>
                                                <?php $get_lang = \DB::table('lead_language_master')->get(); ?>
                                                @foreach($get_lang as $get_lang)
                                                <option value="{{$get_lang->lang_name}}">{{$get_lang->lang_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>  
                                 
                                    <div class="col-md-12">
                                         <button type="submit" class="btn btn-default w3ls-button">Submit</button> 
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
</div>
            </div>
        </div>
    </div>
    <!-- End Main Content-->

    <!-- Main Footer-->
    <div class="main-footer text-center">
        <div class="container">
            <div class="row row-sm">
                <div class="col-md-12">
                    <span>Copyright © 2022 <a href="javascript:void(0)">{{ config('app.name', 'Dashboard') }}</a>.  Designed by <a href="#">Samtech Infonet</a>  All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!--End Footer-->


</div>
<!-- End Page -->
		<!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
        <!-- Jquery js-->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- Internal Chart.Bundle js-->
        <script src="{{ asset('plugins/chart.js/Chart.bundle.min.js') }}"></script>
        <!-- Peity js-->
        <script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>
        <!-- Select2 js-->
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('js/select2.js') }}"></script>
        <!-- Perfect-scrollbar js -->
        <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <!-- Sidemenu js -->
        <script src="{{ asset('plugins/sidemenu/sidemenu.js') }}"></script>
        <!-- Sidebar js -->
        <script src="{{ asset('plugins/sidebar/sidebar.js') }}"></script>
        <!-- Internal Morris js -->
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
        <!-- Circle Progress js-->
        <script src="{{ asset('js/circle-progress.min.js') }}"></script>
        <script src="{{ asset('js/chart-circle.js') }}"></script>
        <!-- Internal Dashboard js-->
        <script src="{{ asset('js/index.js') }}"></script>
        <!-- Color Theme js -->
        <script src="{{ asset('js/themeColors.js') }}"></script>
        <!-- Sticky js -->
        <script src="{{ asset('js/sticky.js') }}"></script>
        <!-- Custom js -->
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <script>
            function sendstatus(status, lead_id) {
                $.ajax({
                    type:'GET',
                    url:"{{route('agent.send_status')}}",
                    data:{status:status,lead_id:lead_id},
                    success:function(xhr){
                        location.reload();
                    }
                }); 
            }
        </script>
        <script>
           function runtimeinput(note, lead_id){
            $.ajax({
                    type:'GET',
                    url:"{{route('agent.runtime-note')}}",
                    data:{note:note, lead_id:lead_id},
                });     
           }
        </script>
        <script>
           function runtimefdate(date, lead_id){
            $.ajax({
                    type:'GET',
                    url:"{{route('agent.runtime-date')}}",
                    data:{date:date, lead_id:lead_id},
                });     
           }
        </script>
        <script>
        $(document).ready(function(){
		$("#email").keyup(function(){
			if(validateEmail()){
				$("#email").css("border","2px solid green");    			
			}else{
				$("#email").css("border","2px solid red");
			}
		    });
	    });
        function validateEmail(){
            var email=$("#email").val();
            var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
            if(reg.test(email)){
                return true;
            }else{
                return false;
            }
        }
        function send_e_otp(){
            var email = $("#email").val();
            if(validateEmail()){
                $.ajax({
                    type:'GET',
                    url:"{{url('email/otp/lead')}}",
                    data:{email:email},
                    success:function(){
                        $("#emailMsg").html("OTP send successfully on your email");
                        $(".e_div_otp").show();
                    }                   
                });
            }else{
                $("#emailMsg").html("Please enter valid email address");
            }
        }
        </script>
        <script>
            $(document).ready(function(){
            $("#mobile").keyup(function(){
                var number = $("#mobile").val();
                if(number.length>9){
                    $("#mobile").css("border","2px solid green");			
                }else{
                    $("#mobile").css("border","2px solid red");
                }
            });
	    });
            function m_save_otp(){
                var number = $("#mobile").val();
                if(number.length>9){
                 $.ajax({
                    type:'GET',
                    url:"{{url('mobile/otp/lead')}}",
                    data:{number:number},
                    success:function(){
                        $("#mobileMsg").html("OTP send successfully on your mobile number");
                        $(".m_div_otp").show();
                    }                   
                });
                }else{
                    $("#mobile").css("border","2px solid red");
                    $("#mobileMsg").html("Please enter valid mobile number");
                }
            }
        </script>
	</body>
</html>



























