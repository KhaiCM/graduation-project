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
        <a href="{{ route('blog.index') }}">{{ trans('message.New') }}</a>
        <a href="{{ route('contact.index') }}">{{ trans('message.Contact') }}</a>
        <div class="menu-right">
            <div class="nav-item dropdown">
            <button class="dropbtn"><i class="fa fa-language"></i></button>
                <div class="dropdown-content">
                    <a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}">{{ __('label.english') }}</a>
                    <a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}">{{ __('label.vietnam') }}</a>
                </div>
            </div>
            <div class="nav-item dropdown">
            <img src="{{ get_avatar( Auth::user()) }}" alt="avatar" class="img-avatar">
                <button class="dropbtn">{{ Auth::user()->name }}</button>
                <div class="dropdown-content">
                    <a href="{{ route('user.detail', Auth::user()->id) }}">{{ trans('message.Detail') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('message.Logout') }}</a></l>
                    {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'hide']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="sidenav">
        <a href="{{ route('blog.index') }}">{{ trans('message.New') }}</a>
        <a href="{{ route('blogcat.index') }}">{{ trans('message.blogcat') }}</a>
        <a href="{{ route('contact.index') }}">{{ trans('message.Contact') }}</a>
        <a href="{{ route('contract.index') }}">{{ trans('message.contract') }}</a>
        <a href="{{ route('province.index') }}">{{ trans('province.province') }}</a>
        <a href="{{ route('procat.index') }}">{{ trans('province.propertyCategoy') }}</a>
        <a href="{{ route('district.index') }}">{{ trans('province.district') }}</a>
        <a href="{{ route('setcalendar.index') }}">{{ trans('message.setcalendar') }}</a>
        <a href="{{ route('role.index') }}">{{ trans('label.role') }}</a>
        <a href="{{ route('user.list') }}">{{ trans('label.list_user') }}</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script src="{{ asset('backend/js/style.js') }}"></script>
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
</html>

