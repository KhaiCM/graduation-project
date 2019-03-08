<!DOCTYPE html>
<html lang="vi">
<head>
  <title>{!! __('label.title')!!}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">

  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/bootstrap.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/magnific-popup.css')}}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/jquery.selectBox.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/dropzone.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/rangeslider.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/animate.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/leaflet.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/map.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/jquery.mCustomScrollbar.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/fonts/flaticon/font/flaticon.css') }}">

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="{{ asset('bower_components/lib_bower/assets/img/favicon.ico') }}" type="image/x-icon" >

  <!-- Google fonts -->
  <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_bower/assets/fonts/font_google.css') }}">

  <!-- Custom Stylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/skins/default.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/style.css') }}">
</head>
<body id="top">
  @include('fontend.layouts.header')

  @yield('content')

  @include('fontend.layouts.footer')

  <!-- External JS libraries -->
  <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
  <script> CKEDITOR.replace('editor1'); </script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery-2.2.0.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.selectBox.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/rangeslider.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.filterizr.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/backstretch.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.countdown.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.scrollUp.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/particles.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/typed.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/dropzone.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.mb.YTPlayer.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/leaflet.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/leaflet-providers.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/leaflet.markercluster.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/maps.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script src="{{ asset('bower_components/lib_bower/assets/js/ie-emulation-modes-warning.js') }}"></script>
  <!-- Custom JS Script -->
  <script  src="{{ asset('bower_components/lib_bower/assets/js/app.js') }}"></script>
  <script  src="{{ asset('js/ajax.js') }}"></script>
</body>

</html>
