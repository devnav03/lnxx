@php
$route  = \Route::currentRouteName();    
$user_base = \Session::get('user_base');
if(empty($user_base)){
$user_base = 'Customer';
}
@endphp
  
<header class="header @if($user_base == 'Agent') agent_header @endif ">
  <div class="container">
    <div class="row">
      <div class="col-md-1"> 
        <div class="logo-main">
          <a href="{{ route('home') }}"><img src="{!! asset('assets/frontend/images/lnxx_logo.png')  !!}" alt="logo" class="img-responsive"> </a>
        </div> 
      </div>
      <div class="col-md-6">
        <ul class="left_menu">
          <li><a href="#">About Us</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Reach Us</a></li>
        </ul>
      </div>
      <div class="col-md-5">
        <ul class="right_login">
          <li><a href="#">English <img src="{!! asset('assets/frontend/images/dropdown.png')  !!}"> </a></li>

          @if($user_base == 'Customer')
          <li><a href="{{ route('sign-in') }}">Sign In</a></li>
          <li><a href="{{ route('agent-menu') }}">Agent <img src="{!! asset('assets/frontend/images/agent_icon.png')  !!}" style="width: 13px; margin-left: 5px;"></a></li>
          @else
           <li><a href="{{ route('sign-in') }}">Sign In</a></li>
          <li><a href="{{ route('customer-menu') }}">Customer <img src="{!! asset('assets/frontend/images/agent_icon.png')  !!}" style="width: 13px; margin-left: 5px;"></a></li>
          @endif


          
        </ul>
      </div>
    </div>
  </div>
</header>







