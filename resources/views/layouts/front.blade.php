<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Intimate</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('front/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- css-->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
      <!-- fonts -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('layouts.front.nav')
        
         {{-- start content --}}
         @yield('content')
         {{-- end content --}}

      <!-- footer section start -->
      @include('layouts.front.footer')
      <!-- footer section end -->
      
      <!-- Javascript files-->
      <script src="{{asset('front/js/jquery.min.js')}}"></script>
      <script src="{{asset('front/js/popper.min.js')}}"></script>
      <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('front/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('front/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('front/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{asset('front/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js')}}"></script>    
   </body>
</html>