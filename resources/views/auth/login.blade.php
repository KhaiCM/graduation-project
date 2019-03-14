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
    <div class="login-page cnt-bg-photo overview-bgi" style="background-image: url({{ asset(config('fontend.fontend_image.banner')) }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="content-form-box forgot-box clearfix">
                        <div class="login-header clearfix">
                            <div class="pull-left">
                                <img src="{{ asset(config('fontend.fontend_image.logo')) }}" alt="logo">
                            </div>
                            <div class="pull-right">
                                <h4>{!! __('label.login')!!}</h4>
                            </div>
                        </div>
                        <p>{!! __('label.enter_pass')!!}</p>
                        {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        <div class="form-group">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('label.email')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('label.password')]) !!}
                        </div>
                        <div class="form-group">
                            <p>{!! Form::checkbox('remember', null, null, ['class' => 'form-check-input']) !!}</p>
                            {!! Form::label('rememberMe', __('label.keep_me_signed_in')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(__('label.login'), ['class' => 'btn btn-color btn-md btn-block', 'name' => 'login']) !!}
                        </div>
                        {!! Form::close() !!}
                        <div class="login-footer text-center">
                            <p>{!! __('label.do_not_have_an_account')!!}<a href="{{ route('register') }}">{!! __('label.sign_up')!!}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login page end -->
    <!-- External JS libraries -->
    <script src="{{ asset('bower_components/lib_bower/assets/js/jquery-2.2.0.min.js') }}"></script>
    <!-- Custom JS Script -->
    <script  src="{{ asset('bower_components/lib_bower/assets/js/app.js') }}"></script>
</body>
</html>
