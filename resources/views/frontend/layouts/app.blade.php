<!DOCTYPE html>
<head class="wide wow-animation" lang="en">
<!-- Site Title-->
@if(isset($keyword))   
        @if(isset($keyword->title))
        <title>{{$keyword->title}}</title>
        <meta name="description" content="{{$keyword->description}}"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        @else
        <title>{{$keyword->meta_title}}</title>
        <meta name="description" content="{{$keyword->meta_description}}"/>
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{{$keyword->meta_title}}" />
        <meta property="og:description" content="{{$keyword->meta_description}}" /> 
        <meta property="og:image" content="{{ route('home') }}/{{ str_replace( ' ', '%20', $keyword->featured_image) }}" />
        <meta property="og:image:width" content="1000" />
        <meta property="og:image:height" content="1000" />
        @endif

        @if(isset($keyword->keyword))

        <meta property="og:title" content="{{$keyword->keyword}}" />
        @else
        <meta property="og:title" content="{{$keyword->meta_tag}}" />
        @endif
        @if(isset($keyword->description))
        <meta property="og:description" content="{{$keyword->description}}" />
        @else
        <meta property="og:description" content="{{$keyword->meta_description}}" />
        @endif
        @if(isset($keyword->keyword))
        <meta name="twitter:title" content="{{$keyword->keyword}}" />
        @else
        <meta name="twitter:title" content="{{$keyword->meta_tag}}" />
        @endif
    @else
<title>LNXX</title>
@endif
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
<meta name="csrf-token" content="{!! csrf_token() !!}" />
    <link rel="icon" href="{!! asset('assets/frontend/images/logo.ico') !!}" type="image/png">
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/956568d106.js" crossorigin="anonymous"></script>
{!! Html::style('assets/frontend/css/stellarnav.min.css') !!}

<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
{!! HTML::style('assets/frontend/css/jquery-ui.css') !!}
{!! HTML::style('assets/frontend/css/owl.carousel.min.css') !!}
{!! HTML::style('assets/frontend/css/owl.theme.default.min.css') !!}
{!! HTML::style('assets/frontend/css/jquery.fancybox.min.css') !!}
{!! HTML::style('assets/frontend/css/bootstrap-datepicker.css') !!}
{!! HTML::style('assets/frontend/fonts/flaticon/font/flaticon.css') !!}
<!-- {!! HTML::style('assets/frontend/css/bootstrap.min1.css') !!} -->
{!! HTML::style('assets/frontend/css/style.css') !!}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@yield('css')
</head>
<body class="content-pages">
  <a id="button2"></a>
    <!-- Page-->
        <!-- Header -->
@php
    $route  = \Route::currentRouteName();    
@endphp
    @if($route == 'get-started')    
        @include('frontend.layouts.header') 
    @else 
        @include('frontend.layouts.header_main')
    @endif

        <!-- Main Content -->
        @yield('content')
      
        @include('frontend.layouts.footer') 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript">       
  var btn = $('#button2');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      //alert('here');
      btn.addClass('show');
    } else {
      btn.removeClass('show');
     // alert('here 1');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });

</script>  
        {!! Html::script('assets/frontend/js/jquery-ui.js') !!}
        {!! Html::script('assets/frontend/js/popper.min.js') !!}
        {!! Html::script('assets/frontend/js/owl.carousel.min.js') !!}
       <!--  {!! Html::script('assets/frontend/js/jquery.countdown.min.js') !!}
        {!! Html::script('assets/frontend/js/jquery.easing.1.3.js') !!}
        {!! Html::script('assets/frontend/js/aos.js') !!}
        {!! Html::script('assets/frontend/js/jquery.fancybox.min.js') !!}
        {!! Html::script('assets/frontend/js/jquery.sticky.js') !!}
        {!! Html::script('assets/frontend/js/isotope.pkgd.min.js') !!} -->
 <!--        {!! Html::script('assets/frontend/js/main.js') !!} -->

     
      <!--   {!! HTML::script('assets/frontend/js/stellarnav.min.js') !!} -->
        <!-- {!! HTML::script('assets/frontend/js/custom.js') !!} -->

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    $('#table').dataTable();
    } );
</script>

<script type="text/javascript">


const counters = document.querySelectorAll('.counters');

counters.forEach(counter => {
  let count = 0;
  const updateCounter = () => {
    const countTarget = parseInt(counter.getAttribute('data-counttarget'));
    count++;
    if (count < countTarget) {
      counter.innerHTML = count;
      setTimeout(updateCounter, 1);
    } else {
      counter.innerHTML = countTarget;
    }
  };
  updateCounter();
});

$('.testimonials-slider').owlCarousel({
    autoplay: true,
    smartSpeed: 900,
    loop: true,
    margin: 20,
    nav: true,
    center:false,
    autoplayHoverPause:true,
    navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    dots: false,
    responsive:{
        0:{
            items:1,
            nav: false
        },
        575:{
            items:2,
            nav: false
        },
        768:{
            items:3,
            nav: false
        },
        992:{
            items:3,
        },
        1200:{
            items:3
           
        }
    }
});

$('.main-slider').owlCarousel({
    autoplay: true,
    smartSpeed: 900,
    loop: true,
    margin: 20,
    nav: false,
    center:false,
    autoplayHoverPause:true,
    navText: ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    dots: true,
    responsive:{
        0:{
            items:1,
            nav: false
        },
        575:{
            items:1,
            nav: false
        },
        768:{
            items:1,
            nav: false
        },
        992:{
            items:1,
        },
        1200:{
            items:1
           
        }
    }
});

// function getState(val) {
//   $.ajax({
//     type: "GET",
//     url: "{{ route('getState') }}",
//     data: {'country_id' : val},
//     success: function(data){
//         $("#state").html(data);
//     }
//   });
// }

// function getCity(val) {
//   $.ajax({
//     type: "GET",
//     url: "{{ route('getCity') }}",
//     data: {'state_id' : val},
//     success: function(data){
//         $("#city").html(data);
//     }
//   });
// }

$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});

</script>

@if($route != 'home')
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
} 
</script>
@endif
<script type="text/javascript">
function yesnoCheckEmployer(that) {
    if (that.value == "2") {
        $(".employer_name").show();
    } 
    else {
        $(".employer_name").hide();
    }
}



// function getSubcategory(val) {
//   $.ajax({
//     type: "GET",
//     url: "{{ route('getSubcategory') }}",
//     data: {'main_id' : val},
//     success: function(data){
//         $("#category-list").html(data);
//     }
//   });
// }


// $('input[name=mobile]').on('keyup' , function() { 
//     var mobile = $("input[name=mobile]").val();
//     if( mobile.length == 10 ) {
//         $.ajax({
//             type: "GET",
//             url: "{{ route('otp-sent') }}",
//             data: {'mobile' : mobile},
//             success: function(data){
//                 if(data.status == 'Fail'){
//                     $(".already_exist").html('Mobile no is already exist');
//                     $(".valid_no").html('');
//                     $(".otp").val('');
//                     $(".otp_sent").html('');
//                 } else{
//                     $(".otp_sent").html('OTP sent...');
//                     $(".valid_no").html('');
//                     $(".already_exist").html('');
//                 }
//             }
//         });
//     } else {
//         $(".valid_no").html('Enter a valid mobile no');
//         $(".otp").val('');
//         $(".already_exist").html('');
//         $(".otp_sent").html('');
//     }
// }); 




</script>



</body>
</html>
