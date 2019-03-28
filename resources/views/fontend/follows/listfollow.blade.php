@extends('fontend.layouts.master')
@section('content')

<!-- User page start -->
<div class="user-page content-area-14">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="user-profile-box mrb">
                    <!--header -->
                    <div class="header clearfix">
                        <h2>{!! $user->name !!}</h2>
                        <img src="{{ get_avatar($user) }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <ul>
                            <li>
                                <a href="{{ route('user_page.edit', Auth::user()->id) }}">
                                    <i class="flaticon-user"></i>{!! __('label.my_profile') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property.show', Auth::user()->id) }}">
                                    <i class="flaticon-house"></i>{!! __('label.my_property') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('follow.show', Auth::user()->id) }}" class="active">
                                    <i class="flaticon-heart-shape-outline"></i>{{ trans('province.listfollow') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property') }}">
                                    <i class="flaticon-add"></i>{!! __('label.submit_new_property') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.change_pass', Auth::user()->id) }}">
                                    <i class="flaticon-locked-padlock"></i>{!! __('label.change_password') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="flaticon-logout"></i>{!! __('message.Logout') !!}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('province.name') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->follows as $follower)
                                <tr>
                                    <td>
                                        <div class="inner">
                                            <a href="{{ route('follow.user', $follower->id) }}"><h4>{{ $follower->name }}</h4></a>
                                        </div>
                                    </td>
                                    <td class="actions">
                                        {{ Form::open(['route' => ['user.unfollow', $follower->id], 'method' => 'DELETE']) }}
                                            {{ Form::submit(__('province.unfollow'), ['class' => 'btn btn-md btn-color']) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
@endsection
