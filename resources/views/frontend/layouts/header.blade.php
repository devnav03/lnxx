@php
    $route  = \Route::currentRouteName();    
@endphp
  
<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="logo">
          <a href="#"><img src="{!! asset('assets/frontend/images/lnxx_logo.png')  !!}" alt="logo" class="img-responsive"> </a>
        </div>
      </div>
      <div class="col-md-9">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="#About">About</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">App Reviews</a></li>
          <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
          <li><a href="#">Sign In</a>
            <ul class="sub-menu">
              <li><a href="{{ route('sign-in') }}">Customer</a>
              <li><a href="#">Agent</a>
            </ul>

          </li>
          <li><a href="#"><img src="{!! asset('assets/frontend/images/download.png')  !!}" alt="download" class="img-responsive"></a></li>
        </ul>
        <span style="font-size:30px;cursor:pointer" class="openNavbtn" onclick="openNav()">&#9776;</span>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="{{ route('home') }}">Home</a>
          <a href="#About">About</a>
          <a href="#">Products</a>
          <a href="#">App Reviews</a>
          <a href="{{ route('contact-us') }}">Contact Us</a>
          <a href="{{ route('sign-in') }}">Sign In</a>
        </div>


      </div>
    </div>
  </div>
</section>







