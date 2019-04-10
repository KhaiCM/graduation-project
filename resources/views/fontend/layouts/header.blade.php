<!-- Top header start -->
<header class="top-header top-header-bg d-none d-xl-block d-lg-block d-md-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <ul class="top-social-media pull-left">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle header-user">
                            @if(session()->get('lang') == 'en')
                            <img src="{{ asset(config('fontend.fontend_image.flag_en')) }}">&nbsp;{{ __('label.english') }}
                            @else
                            <img src="{{ asset(config('fontend.fontend_image.flag_vi')) }}">&nbsp;{{ __('label.vietnam') }}
                            @endif
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          @if(Session::get('lang') == null || Session::get('lang') == 'vi')
                          <li class="dropdown-submenu heade-user"><a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}"><img src="{{ asset(config('fontend.fontend_image.flag_en')) }}">&nbsp;{{ __('label.english') }}</a></li>
                          @else
                          <li class="dropdown-submenu heade-user"><a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}"><img src="{{ asset(config('fontend.fontend_image.flag_vi')) }}">&nbsp;{{ __('label.vietnam') }}</a></li>
                          @endif
                          <ul id="messages" class="list-group"></ul>
                      </ul>
                  </li>
              </ul>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <ul class="top-social-media pull-left ">
                @if (Auth::check())
                <li class="list-inline-item dropdown notif">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fa fa-fw fa-bell-o"></i><span class="notif-bullet"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5><small><span class="label label-danger pull-xs-right">{{ __('label.vietnam') }}</span>{{ __('label.vietnam') }}</small></h5>
                        </div>
                        <!-- item-->
                        <a href="#" class="dropdown-item notify-item">
                            <div class="notify-icon bg-faded">
                                <img src="{{ asset(config('fontend.fontend_image.logo')) }}" alt="img" class="rounded-circle img-fluid">
                            </div>
                            <p class="notify-details">
                                <b>{{ __('label.john_doe') }}</b>
                                <span>{{ __('label.user_registration') }}</span>
                                <small class="text-muted">{{ __('label.minutes_ago') }}</small>
                            </p>
                        </a>
                        <!-- All-->
                        <a href="#" class="dropdown-item notify-item notify-all">{{ __('label.view_all_allerts') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle ">
                        <img src="{{ get_avatar( Auth::user()) }}" alt="avatar" class="img-avatar">
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div class="dropdown-submenu noti-title">
                            <h5 class="text-overflow"><small>{{ Auth::user()->name }}</small> </h5>
                        </div>
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('user_page.edit', Auth::user()->id) }}">{{ __('label.user_page') }}</a></li>
                        <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('message.Logout') }}</a></li>
                        {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'hide']) !!}
                        {!! Form::close() !!}
                        <ul id="messages" class="list-group"></ul>
                    </ul>
                </li>
                @endif
                <li class="nav-item dropdown">
                    @if (!Auth::check())
                    <a class="btn btn-sm btn-white-sm-outline btn-round signup-link" href="{{ route('login') }}">{!! __('label.login')!!}</a>
                    <a class="btn btn-sm btn-white-sm-outline btn-round signup-link" href="{{ route('register') }}">{!! __('label.sign_up')!!}</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
</header>
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
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown-submenu"><a class="dropdown-item" href="{{ route('createcontacts') }}">{{ __('label.contact_us') }}</a></li>
                            </ul>
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
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
</header>
