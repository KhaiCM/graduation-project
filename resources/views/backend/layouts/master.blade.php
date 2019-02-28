<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('message.Admin') }}</title>
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
</head>
<body>
    <div class="topnav">
    <a class="active" href="{{ route('adminHome') }}">{{ trans('message.Home') }}</a>
        <a href="#news">{{ trans('message.New') }}</a>
        <a href="#contact">{{ trans('message.Contact') }}</a>
        <a href="#about">{{ trans('message.About') }}</a>
        <div class="dropdown">
            <button class="dropbtn">{{ trans('message.Account') }}</button>
            <div class="dropdown-content">
                <a href="#">{{ trans('message.Detail') }}</a>
                <a href="#">{{ trans('message.Logout') }}</a>
            </div>
        </div>
    </div> 
   
    <div class="sidenav">
        <a href="#about">{{ trans('message.About') }}</a>
        <a href="#services">{{ trans('message.Services') }}</a>
        <a href="#clients">{{ trans('message.Clients') }}</a>
        <a href="#contact">{{ trans('message.Contact') }}</a>
    </div>

    <div class="main">
        @yield('content')
    </div>

</body>
<footer>
    <div class="footer">
        <h2>{{ trans('message.Footer') }}</h2>
    </div> 
</footer>
</html>
