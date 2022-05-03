<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>
  @if(Route::is(['map-grid']))
  <body class="map-page">
  @endif
  @if(Route::is(['chat-doctor','chat']))
  <body class="chat-page">
  @endif
  @if(Route::is(['doctor-register','forgot-password','login','register','patient-register-step2','patient-register-step1','doctor-register-step1','doctor-register-step2','doctor-register-step3','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3']))
  <body class="account-page">
  @endif
  @if(Route::is(['video-call','voice-call']))
  <body class="call-page">
  @endif
  @if(!Route::is(['doctor-register-step1','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3']))
@include('layout.partials.header')
@endif
@yield('content')
@if(!Route::is(['chat-doctor','map-grid','map-list','chat','voice-call','video-call','doctor-register-step1','doctor-register-step2','doctor-register-step3','patient-register-step1','patient-register-step2','patient-register-step3','patient-register-step4','patient-register-step5','pharmacy-register-step1','pharmacy-register-step2','pharmacy-register-step3']))
@include('layout.partials.footer')
@endif
@include('layout.partials.footer-scripts')
  </body>
</html>
<script>
$(document).ready(function(){
  // alert(1);
 /*$('.submenu li a').click(function(){
   $(.submenu li a).removeClass("active");
   $(this).addClass("active");
   $('.has-submenu a').removeClass("active");
   $('.has-submenu a').addClass("active");
   
   //$(this).toggleClass("active");
 });*/
});
</script>