<header class="main-header do-sticky" id="main-header-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light rounded">
                    <a class="navbar-brand logo navbar-brand d-flex mr-auto" href="{{ route('home') }}">
                        <img src="{{ asset(config('fontend.fontend_image.logo')) }}" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="navbar-collapse collapse w-100" id="navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{ route('home') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('province.home') }}
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('label.properties_sold') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('home.sold') }}">{!! __('label.properties_sold')!!}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('label.rental_property') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('home.rent') }}">{{ __('label.rental_property') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('label.news') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('post.index') }}">{{ __('label.news') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('label.contact_us') }}
                                </a>
                            </li>
                            @if (Auth::check())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ __('label.property') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('property.show', Auth::user()->id) }}">{{ __('label.my_property') }}</a></li>
                                    <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('property') }}">{{ __('label.submit_new_property') }}</a></li>
                                </ul>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                @if (Auth::check())
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('user_page.edit', Auth::user()->id) }}">{{ __('label.user_page') }}</a></li>
                                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                        {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'hide']) !!}
                                        {!! Form::close() !!}
                                    </ul>
                                </li>
                                @else
                                <a class="btn btn-sm btn-white-sm-outline btn-round signup-link" href="{{ route('login') }}">{!! __('label.login')!!}</a>
                                <a class="btn btn-sm btn-white-sm-outline btn-round signup-link" href="{{ route('register') }}">{!! __('label.sign_up')!!}</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

