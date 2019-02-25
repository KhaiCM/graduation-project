<!DOCTYPE html>
<html>
<head>
<title>{{ trans('message.Wellcome') }}</title>
<link rel="stylesheet" href="{{asset('backend/css/stylelogin.css')}}">
</head>
<body>
    <div class="login-page">
        <div class="formlog"> 	
            {!! Form::open(['class' => 'login-form']) !!}
                {!! Form::text('username', '', ['class' => 'input', 'placeholder' => trans('message.Username')]) !!}
                {!! Form::password('password', ['class' => 'input', 'placeholder' => trans('message.Password')]) !!}
                {!! Form::submit(trans('message.Submit'), ['class' => 'button']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</body>
</html>
