@extends('fontend.layouts.master')
@section('content')
<!-- User page start -->
<div class="user-page content-area-13">
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
                                <a href="{{ route('follow.show', Auth::user()->id) }}">
                                    <i class="flaticon-heart-shape-outline"></i>{{ trans('province.listfollow') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property') }}">
                                    <i class="flaticon-add"></i>{!! __('label.submit_new_property') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.change_pass', Auth::user()->id) }}" class="active">
                                    <i class="flaticon-locked-padlock"></i>{!! __('label.change_password') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="flaticon-logout"></i>{!! __('Logout') !!}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="my-address contact-2 widget hdn-mb-30">
                    <h3 class="heading">{!! __('label.change_password') !!}</h3>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                        @endforeach
                    </div>
                    @endif
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    {{ Form::open(['route' => ['user.post_change', $user->id], 'method' => 'PUT']) }}
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="form-group name">
                                    {!! Form::label('password', __('label.current_password')) !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('label.password')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group email">
                                    {!! Form::label('password', __('label.new_password')) !!}
                                    {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => __('label.password')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="form-group subject">
                                    {!! Form::label('password', __('label.confirm_new_password')) !!}
                                    {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => __('label.confirm_password')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="send-btn">
                                    {!! Form::submit(__('label.changes'), ['class' => 'submit-button-change', 'name' => 'change']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
@endsection
