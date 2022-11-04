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
          <li><a href="#">About</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Features</a></li>
          <li><a href="#">App Reviews</a></li>
          
          <li><a href="#">Contact Us</a></li>
          <li><a href="{{ route('sign-in') }}">Sign In</a></li>
          <li><a href="#"><img src="{!! asset('assets/frontend/images/download.png')  !!}" alt="download" class="img-responsive"></a></li>
        </ul>


      </div>
    </div>
  </div>
</section>







