	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
		<div class="headerbar-left">
			<a href="{{ route('dashboard') }}" class="logo"><img alt="Logo" src="{{ asset('bower_components/lib_bower/backend/assets/images/logo.png') }}" /> <span>Admin</span></a>
		</div>

		<nav class="navbar-custom">

			<ul class="list-inline float-right mb-0">

				<li class="list-inline-item dropdown notif">
					<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<i class="fa fa-fw fa-language"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
						<!-- item-->
						<a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}"><img src="{{ asset(config('fontend.fontend_image.flag_en')) }}">&nbsp;{{ __('label.english') }}</a>
						<a class="dropdown-item" href="{!! route('user.change-language', ['vi']) !!}"><img src="{{ asset(config('fontend.fontend_image.flag_vi')) }}">&nbsp;{{ __('label.vietnam') }}</a>
					</div>
				</li>

				<li class="list-inline-item dropdown notif">
					<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<img src="{{ get_avatar( Auth::user()) }}" alt="Profile image" class="avatar-rounded">
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h5 class="text-overflow"><small>Hello, {{ Auth::user()->name }}</small> </h5>
						</div>

						<!-- item-->
						<a href="{{ route('home') }}" class="dropdown-item notify-item">
							<i class="fa fa-home"></i> <span>{{ trans('province.home') }}</span>
						</a>

						<!-- item-->
						<a href="{{ route('user.detail', Auth::user()->id) }}" class="dropdown-item notify-item">
							<i class="fa fa-user"></i> <span>{{ trans('message.Detail') }}</span>
						</a>

						<!-- item-->
						<a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="fa fa-power-off"></i> <span>{{ __('message.Logout') }}</span>
							{!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout-form', 'class' => 'hide']) !!}
							{!! Form::close() !!}
						</a>
					</div>
				</li>

			</ul>

			<ul class="list-inline menu-left mb-0">
				<li class="float-left">
					<button class="button-menu-mobile open-left">
						<i class="fa fa-fw fa-bars"></i>
					</button>
				</li>                        
			</ul>

		</nav>

	</div>
	<!-- End Navigation -->