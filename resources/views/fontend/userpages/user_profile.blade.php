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
                        <img src="{{ asset(config('app.avatar_path') . $user->avatar) }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <ul>
                            <li>
                                <a href="{{ route('user_page.edit', Auth::user()->id) }}" class="active">
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
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="my-address contact-2 widget">
                    <h3 class="heading">{!!__('label.my_profile') !!}</h3>
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
                    {{ Form::open(['route' => ['user_page.update', $user->id], 'method' => 'PUT', 'files' => true]) }}
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="form-group name">
                                {!! Form::label('name', __('label.name')) !!}
                                {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => __('label.name')]) !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group email">
                                {!! Form::label('email', __('label.email')) !!}
                                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => __('label.email_address'), 'readonly' => 'readonly']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="form-group subject">
                                {!! Form::label('phone', __('label.phone')) !!}
                                {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' =>  __('label.phone')]) !!}
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="form-group number">
                                {!! Form::label('address', __('label.address')) !!}
                                {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' =>  __('label.address')]) !!}
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <div class="form-group number">
                                {!! Form::label('avatar', __('label.avatar')) !!}
                                {{ Form::file('file', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="send-btn">
                                {!! Form::submit(__('label.changes'), ['class' => 'btn btn-md btn-color', 'name' => 'change']) !!}
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
