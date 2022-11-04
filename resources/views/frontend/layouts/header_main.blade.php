@php
    $route  = \Route::currentRouteName();    
@endphp
  
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <ul class="left_menu">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Reach Us</a></li>
        </ul>
      </div>
      <div class="col-md-2"> 
        <div class="logo-main">
          <a href="#"><img src="{!! asset('assets/frontend/images/lnxx_logo.png')  !!}" alt="logo" class="img-responsive"> </a>
        </div> 
      </div>
      <div class="col-md-5">
        <ul class="right_login">
          <li><a href="#">English <img src="{!! asset('assets/frontend/images/dropdown.png')  !!}"> </a></li>
          <li><a href="{{ route('sign-in') }}">Sign In</a></li>
          <li><a href="#">Agent <img src="{!! asset('assets/frontend/images/agent_icon.png')  !!}" style="width: 13px; margin-left: 5px;"></a></li>
        </ul>
      </div>
    </div>
  </div>
</header>







