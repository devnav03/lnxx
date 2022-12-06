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
        <title>{{ config('app.name', 'Dashboard') }}</title>
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
    <div class="main-header side-header sticky">
        <div class="main-container container-fluid">
            <div class="main-header-left">
                <a class="main-header-menu-icon" href="javascript:void(0)" id="mainSidebarToggle"><span></span></a>
                <div class="hor-logo">
                    <a class="main-logo" href="index.html">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img desktop-logo-dark" alt="logo">
                    </a>
                </div>
            </div>
     
            <div class="main-header-right">
                <button class="navbar-toggler navresponsive-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button>
                <div
                    class="navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2 ms-auto">
                            <!-- Search -->
                            <div class="dropdown header-search">
                                <a class="nav-link icon header-search">
                                    <i class="fe fe-search header-icons"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="main-form-search p-2">
                                        <div class="input-group">
                                            <div class="input-group-btn search-panel">
                                                <select class="form-control select2">
                                                    <option label="All categories">
                                                    </option>
                                                    <option value="IT Projects">
                                                        IT Projects
                                                    </option>
                                                    <option value="Business Case">
                                                        Business Case
                                                    </option>
                                                    <option value="Microsoft Project">
                                                        Microsoft Project
                                                    </option>
                                                    <option value="Risk Management">
                                                        Risk Management
                                                    </option>
                                                    <option value="Team Building">
                                                        Team Building
                                                    </option>
                                                </select>
                                            </div>
                                            <input type="search" class="form-control"
                                                placeholder="Search for anything...">
                                            <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="dropdown ">
                                <a class="nav-link icon full-screen-link">
                                    <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                                    <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                                </a>
                            </div>
                            <!-- Full screen -->
                            <!-- Notification -->
                            <div class="dropdown main-header-notification">
                            
                                <div class="dropdown-menu">
                                    <div class="header-navheading">
                                        <p class="main-notification-text">You have 1 unread notification<span
                                                class="badge bg-pill bg-primary ms-3">View all</span></p>
                                    </div>
                                    <div class="main-notification-list">
                                        <div class="media new">
                                            <div class="main-img-user online"><img alt="avatar"
                                                    src="{{ asset('img/users/5.jpg') }}"></div>
                                            <div class="media-body">
                                                <p>Congratulate <strong>Olivia James</strong> for New template
                                                    start</p>
                                                <span>Oct 15 12:32pm</span>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="main-img-user"><img alt="avatar"
                                                    src="{{ asset('img/users/2.jpg') }}">
                                            </div>
                                            <div class="media-body">
                                                <p><strong>Joshua Gray</strong> New Message Received</p>
                                                <span>Oct 13
                                                    02:56am</span>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="main-img-user online"><img alt="avatar"
                                                    src="{{ asset('img/users/3.jpg') }}"></div>
                                            <div class="media-body">
                                                <p><strong>Elizabeth Lewis</strong> added new schedule realease
                                                </p><span>Oct
                                                    12 10:40pm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-footer">
                                        <a href="javascript:void(0)">View All Notifications</a>
                                    </div>
                                </div>
                            </div>
                     
                            <div class="dropdown main-profile-menu">
                                <a class="d-flex" href="javascript:void(0)">
                                    <span class="main-img-user"><img alt="avatar"
                                            src="{{ asset(config('app.images.profile'))}}"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="header-navheading">
                                        <h6 class="main-notification-title">{{ Auth::user()->name }}</h6>
                        
                                    </div>
                          
                                    <a class="dropdown-item" href="{!! route('setting.manage-account') !!}">
                                        <i class="fe fe-settings"></i> Change Password </a>
                                   <!--  <a class="dropdown-item" href="profile.html">
                                        <i class="fe fe-compass"></i> Activity
                                    </a> -->
                                    <a class="dropdown-item" href="{{ route('logout-admin') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fe fe-power"></i> Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header-->

    <!-- Sidemenu -->
        @include('admin.layouts.togelsidebar')
    <!-- End Sidemenu -->

    <!-- Main Content-->
    <div class="main-content side-content pt-0">

        <div class="main-container container-fluid">
            <div class="inner-body">
                @yield('content')
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

    <!-- Sidebar -->
        @include('admin.layouts.sidebar')
    <!-- End Sidebar -->

</div>
<!-- End Page -->
		<!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
        <script src="{{ asset('js/jquery2.0.3.min.js') }}"></script> 
        <script src="{{ asset('js/skycons.js') }}"></script>
        <script src="{{ asset('js/raphael-min.js') }}"></script>
        <script src="{{ asset('js/morris.js') }}"></script>

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
    //initSample();
</script>
	</body>
</html>