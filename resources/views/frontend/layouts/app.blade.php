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
<link rel="icon" href="{!! asset('assets/frontend/images/favicon.png') !!}" type="image/png">
<meta name="csrf-token" content="{{ csrf_token() }}" />     
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
    @if($route != 'sign_up' && $route != 'register-email' && $route != 'email-otp' && $route != 'enter-name' && $route != 'sign-in' && $route != 'enter-login-otp' && $route != 'upload-emirates-id' && $route != 'upload-profile-image' && $route != 'emirates-id-verification' && $route != 'verify-emirates-id')
        @include('frontend.layouts.header_main')
    @endif    
    @endif
        <!-- Main Content -->
        @yield('content')
        @if($route != 'sign_up' && $route != 'register-email' && $route != 'email-otp' && $route != 'enter-name' && $route != 'sign-in' && $route != 'enter-login-otp' && $route != 'upload-emirates-id' && $route != 'upload-profile-image' && $route != 'emirates-id-verification' && $route != 'verify-emirates-id')
        @include('frontend.layouts.footer') 
        @endif
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

$('.product-slider').owlCarousel({
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
            items:5
           
        }
    }
});

$('.blog-slider').owlCarousel({
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
            items:4
           
        }
    }
});

$('.blog-slider-ser').owlCarousel({
    autoplay: false,
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

$('#salaried').click(function(){
    $('#cm_type').val('1');
    document.getElementById("salaried").classList.add("active");
    document.getElementById("other_employed").classList.remove("active");
    document.getElementById("self_employed").classList.remove("active");
});

$('#self_employed').click(function(){
    $('#cm_type').val('2');
    document.getElementById("self_employed").classList.add("active");
    document.getElementById("other_employed").classList.remove("active");
    document.getElementById("salaried").classList.remove("active");
});

$('#other_employed').click(function(){
    $('#cm_type').val('3');
    document.getElementById("other_employed").classList.add("active");
    document.getElementById("self_employed").classList.remove("active");
    document.getElementById("salaried").classList.remove("active");
});

$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});

</script>

@if($route == 'my-profile')
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
} 
</script>
@endif
@if($route == 'upload-profile-image')
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
} 
</script>
@endif

@if($route == 'upload-emirates-id')
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
} 
</script>
<script type="text/javascript">
imgInp1.onchange = evt => {
  const [file] = imgInp1.files
  if (file) {
    blah1.src = URL.createObjectURL(file)
  }
} 
</script>
@endif

@if($route == 'personal-details')
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
} 

imgInp1.onchange = evt => {
  const [file] = imgInp1.files
  if (file) {
    blah1.src = URL.createObjectURL(file)
  }
} 

imgInp2.onchange = evt => {
  const [file] = imgInp2.files
  if (file) {
    blah2.src = URL.createObjectURL(file)
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

$('input[name=otp_code]').on('keyup' , function() { 
    var email = $("input[name=email]").val();
    var email_otp = $("input[name=otp_code]").val();
    if( email_otp.length == 6 ) {
        $.ajax({
            type: "GET",
            url: "{{ route('email-otp-match') }}",
            data: {'otp' : email_otp, 'email' : email },  
            success: function(data){
                if(data.status == 'Fail'){
                    $(".not_verify").html('Invalid OTP');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('');
                    $(".errors_otp").html('');
                    $(".otp_email").html('');
                } else{
                    $(".not_verify").html('');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('OTP verify');
                    $(".errors_otp").html('');
                    $(".otp_email").html('');
                }
            }
        });
    } else {
        $(".not_verify").html('');
        $(".otp_verify").html('');
    }
}); 


$('input[name=login_otp]').on('keyup' , function() { 
    var id = $("input[name=id]").val();
    var login_otp = $("input[name=login_otp]").val();
    if( login_otp.length == 6 ) {
        $.ajax({
            type: "GET",
            url: "{{ route('login-otp-match') }}",
            data: {'otp' : login_otp, 'id' : id },  
            success: function(data){
                if(data.status == 'Fail'){
                    $(".not_verify").html('Invalid OTP');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('');
                    $(".errors_otp").html('');
                    $(".otp_email").html('');
                } else{
                    $(".not_verify").html('');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('OTP verify');
                    $(".errors_otp").html('');
                    $(".otp_email").html('');
                }
            }
        });
    } else {
        $(".not_verify").html('');
        $(".otp_verify").html('');
    }
}); 

$('input[name=mobile]').on('keyup' , function() { 
    var mobile = $("input[name=mobile]").val();
    if( mobile.length == 7 ) {
        $.ajax({
            type: "GET",
            url: "{{ route('otp-sent') }}",
            data: {'mobile' : mobile},
            success: function(data){
                if(data.status == 'Fail'){
                    $(".already_exist").html('Mobile no. is already exist');
                    $(".valid_no").html('');
                    $(".otp").val('');
                    $(".otp_sent").html('');
                } else{
                    $(".otp_sent").html('OTP sent successfully');
                    $(".valid_no").html('');
                    $(".already_exist").html('');
                }
            }
        });
    } else {
        $(".valid_no").html('Enter a valid mobile number');
        $(".otp").val('');
        $(".already_exist").html('');
        $(".otp_sent").html('');
    }
}); 

$('input[name=email]').on('keyup' , function() { 
    var email = $("input[name=email]").val();
        $.ajax({
            type: "GET",
            url: "{{ route('email-check') }}",
            data: {'email' : email},
            success: function(data){
                if(data.status == 'Fail'){
                    $(".already_exist").html('Email id already registered');
                    $(".valid_no").html('');
                } else{
                    $(".already_exist").html('');
                    $(".valid_no").html('');
                }
            }
        }); 
}); 


$('input[name=otp]').on('keyup' , function() { 
    var otp = $("input[name=otp]").val();
    var mobile = $("input[name=mobile]").val();
    if( otp.length == 6 ) {
        $.ajax({
            type: "GET",
            url: "{{ route('otp-match') }}",
            data: {'otp' : otp, 'mobile' : mobile },  
            success: function(data){
                if(data.status == 'Fail'){
                    $(".not_verify").html('Invalid OTP');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('');
                    $(".errors_otp").html('');
                } else{
                    $(".not_verify").html('');
                    $(".otp_lab").html('');
                    $(".otp_verify").html('OTP verify');
                    $(".errors_otp").html('');
                }
            }
        });
    } else {
        $(".not_verify").html('');
        $(".otp_verify").html('');
    }
}); 


function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>
@if($route == 'product-requested')
<script type="text/javascript">
$(".credit_card1_open").click(function(){
  $(".credit_card1").show();
  $(".credit_card1_open").hide();
});
$(".credit_card2_open").click(function(){
  $(".credit_card2").show();
  $(".credit_card2_open").hide();
});
$(".credit_card3_open").click(function(){
  $(".credit_card3").show();
  $(".credit_card3_open").hide();
});
$(".loan_bus2_open").click(function(){
  $(".bus_lon2").show();
  $(".loan_bus2_open").hide();
});
$(".loan_bus3_open").click(function(){
  $(".bus_lon3").show();
  $(".loan_bus3_open").hide();
});
$(".loan_bus4_open").click(function(){
  $(".bus_lon4").show();
  $(".loan_bus4_open").hide();
});
$(".loan_busin2_open").click(function(){
  $(".loan_busin2").show();
  $(".loan_busin2_open").hide();
});
$(".loan_busin3_open").click(function(){
  $(".loan_busin3").show();
  $(".loan_busin3_open").hide();
});
$(".loan_busin4_open").click(function(){
  $(".loan_busin4").show();
  $(".loan_busin4_open").hide();
});
$(".mortgage_loan2_open").click(function(){
  $(".mortgage_loan2").show();
  $(".mortgage_loan2_open").hide();
});
$(".mortgage_loan3_open").click(function(){
  $(".mortgage_loan3").show();
  $(".mortgage_loan3_open").hide();
});
$(".mortgage_loan4_open").click(function(){
  $(".mortgage_loan4").show();
  $(".mortgage_loan4_open").hide();
});

</script>
@endif
@if($route == 'record-video')
<script type="text/javascript">
jQuery(function(){
   jQuery('#start').click();
});

        'use strict';

        /* globals MediaRecorder */
        document.querySelector('#start').addEventListener('click', async () => {
            $('#play').hide();
            $('#download').hide();
            $('#record').show();
        
           
            
            const hasEchoCancellation = document.querySelector('#echoCancellation').checked;
            const constraints = {
                audio: {
                    echoCancellation: {
                        exact: hasEchoCancellation
                    }
                },
                video: {
                    width: 360,
                    height: 200
                }
            };

            console.log('Using media constraints:', constraints);
            await init(constraints);
        });

       
      
         let mediaRecorder;
            let recordedBlobs;
            let timerId = setInterval(() => document.getElementById("record").click(), 30000);

        const errorMsgElement = document.querySelector('span#errorMsg');
        const recordedVideo = document.querySelector('video#recorded');
        const recordButton = document.querySelector('#record');
        const playButton = document.querySelector('#play');
        const downloadButton = document.querySelector('#download');


        recordButton.addEventListener('click', () => {
            if (recordButton.textContent === 'Record') {
                startRecording();

            } else {
                stopRecording();
                recordButton.textContent = 'Record';
                playButton.disabled = false;
                downloadButton.disabled = false;
            }
        });


        playButton.addEventListener('click', () => {
           
            $('#download').show();
            const superBuffer = new Blob(recordedBlobs, {
                type: 'video/webm'
            });
            recordedVideo.src = null;
            recordedVideo.srcObject = null;
            recordedVideo.src = window.URL.createObjectURL(superBuffer);
            $('#videofile').val(recordedVideo.src);
            recordedVideo.controls = true;
            recordedVideo.play();
        });


        downloadButton.addEventListener('click', () => {
            const blob = new Blob(recordedBlobs, {
                type: 'video/mp4'
            });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.style.display = 'none';
            // a.href = url;
            // a.download = 'test.mp4';
            document.body.appendChild(a);
            a.click();
            setTimeout(() => {
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            }, 100);

            var formdata = new FormData();
            formdata.append('blobFile', new Blob(recordedBlobs));
            
            fetch('{{ route('consent-form') }}', {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                body: formdata
            }).then(() => {
                window.location.href = 'https://sspl20.com/lnxx/thank-you';
            })

            // $.ajax({
            //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //     type: "POST",
            //     url: "{{ route('consent-form') }}",
            //     body: formdata,
            //     // data: {'state_id' : val},
            //     success: function(data){
            //         $("#city").html(data);
            //     }
            // });
        

        });

        function handleDataAvailable(event) {
            console.log('handleDataAvailable', event);
            if (event.data && event.data.size > 0) {
                recordedBlobs.push(event.data);
            }
        }

        function startRecording() {
            recordedBlobs = [];
            let options = {
                mimeType: 'video/webm;codecs=vp9,opus',
                
              
            };
            try {
                mediaRecorder = new MediaRecorder(window.stream, options);
            } catch (e) {
                console.error('Exception while creating MediaRecorder:', e);
                errorMsgElement.innerHTML = `Exception while creating MediaRecorder: ${JSON.stringify(e)}`;
                return;
            } 
            console.log('Created MediaRecorder', mediaRecorder, 'with options', options);
            recordButton.textContent = 'Stop Recording';
            playButton.disabled = true;
            downloadButton.disabled = true;

            mediaRecorder.onstop = (event) =>  
            {
                $('#play').show();
                $('#record').hide();
                console.log('Recorder stopped: ', event);
                console.log('Recorded Blobs: ', recordedBlobs);
            };
            mediaRecorder.ondataavailable = handleDataAvailable;
            mediaRecorder.start();
        
            console.log('MediaRecorder started', mediaRecorder);
        }

        function stopRecording() {
            mediaRecorder.stop();
        }

        function handleSuccess(stream) {
            recordButton.disabled = false;
            console.log('getUserMedia() got stream:', stream);
            window.stream = stream;
            const gumVideo = document.querySelector('video#gum');
            gumVideo.srcObject = stream;
        }

        async function init(constraints) {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            } catch (e) {
                console.error('navigator.getUserMedia error:', e);
                errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
            }
        }

       
       
</script>
@endif

</body>
</html>
