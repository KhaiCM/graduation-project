<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('message.Admin') }}</title>
    <!-- Font Awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('bower_components/lib_bower/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>
    <div class="topnav">
        <a class="active" href="{{ route('adminHome') }}">{{ trans('message.Home') }}</a>
        <a href="#news">{{ trans('message.New') }}</a>
        <a href="#contact">{{ trans('message.Contact') }}</a>
        <a href="#about">{{ trans('message.About') }}</a>
        <img src="{{ asset(config('app.avatar_path') . Auth::user()->avatar) }}" alt="avatar" class="img-avatar">
        <div class="dropdown">
            <button class="dropbtn">{{ Auth::user()->name }}</button>
            <div class="dropdown-content">
                <a href="{{ route('user.detail', Auth::user()->id) }}">{{ trans('message.Detail') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'hide']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="sidenav">
        <a href="{{ route('blog.index') }}">{{ trans('message.blog') }}</a>
        <a href="{{ route('blogcat.index') }}">{{ trans('message.blogcat') }}</a>
        <a href="{{ route('contact.index') }}">{{ trans('message.contact') }}</a>
        <a href="{{ route('contract.index') }}">{{ trans('message.contract') }}</a>
        <a href="{{ route('province.index') }}">{{ trans('province.province') }}</a>
        <a href="{{ route('district.index') }}">{{ trans('province.district') }}</a>
        <a href="{{ route('setcalendar.index') }}">{{ trans('message.setcalendar') }}</a>
    </div>
    <div class="main">
        @if (count($errors) > 0)
        <div>
            @foreach ($errors->all() as $err)
            {{ $err }}
            @endforeach
            <div>
                @endif
                @if (session('noti'))
                <div>
                    {{ session('noti') }}
                    <div>
                        @endif
                        @yield('content')
                        <div class="footer">
                            <h2>{{ trans('message.Footer') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
</html>

