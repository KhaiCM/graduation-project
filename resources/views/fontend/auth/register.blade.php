<!DOCTYPE html>
<html lang="vi">
<head>
<title>{!! __('label.title')!!}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/bootstrap.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/fonts/font-awesome/css/font-awesome.min.css') }}">

<!-- Google fonts -->
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/lib_bower/assets/fonts/font_google.css') }}">

<!-- Custom Stylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/skins/default.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/css/style.css') }}">

</head>
<body id="top">
      <div class="page_loader"></div>
<div class="register-page">
    <div class="container-fluid">
        <div class="row">
            <div class="login-page cnt-bg-photo overview-bgi" style="background-image: url({{ asset(config('fontend.fontend_image.banner')) }})">
                <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="content-form-box forgot-box clearfix">
                    <div class="login-header">
                        <h4>{!! __('label.create_your_account')!!}</h4>
                    </div>
                    {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                        @foreach ($errors->all() as $error)
			            <p class="alert alert-danger">{{ $error }}</p>
			            @endforeach
                        <div class="form-group">
                            {!! Form::label('name', __('label.name')) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.name')]) !!}
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', __('label.email_address')) !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('label.email_address')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', __('label.password')) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('label.password')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', __('label.confirm_password')) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('label.confirm_password')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(__('label.create_new_account'), ['class' => 'btn btn-color btn-md btn-block', 'name' => 'register']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Register page end -->
    <!-- External JS libraries -->
    <script src="{{ asset('bower_components/lib_bower/assets/js/jquery-2.2.0.min.js') }}"></script>
    <!-- Custom JS Script -->
    <script  src="{{ asset('bower_components/lib_bower/assets/js/app.js') }}"></script>

</body>

</html>
