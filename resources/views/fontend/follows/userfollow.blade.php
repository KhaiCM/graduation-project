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
                        <h2>{{ $user->name }}</h2>
                        <img src="{{ asset(config('fontend.fontend_image.sub_property')) }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <div class='detail clearfix'>
                        @if (auth()->user()->isFollowing($user->id))
                            {{ Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'DELETE']) }}
                                {{ Form::submit(__('province.unfollow'), ['class' => 'btn btn-md btn-color']) }}
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['route' => ['user.follow', $user->id], 'method' => 'POST']) }}
                                {{ Form::submit(__('province.follow'), ['class' => 'btn btn-md btn-color']) }}
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="my-properties">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('province.avatar') }}</th>
                                <th>{{ __('label.name') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.date_added') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->properties as $property)
                            <tr>
                                <td class="image">
                                    <a href="{{ route('property.view', $property->id) }}">
                                        @foreach ($property->propertyImage as $image)
                                            <img alt="{{ $property->name }}" src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" class="img-fluid">
                                            @break
                                        @endforeach
                                    </a>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h4>{{ $property->name }}</h4></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h2></h2></a>
                                        <figure><i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ $property->address }}</figure>
                                        <div class="tag price">{{ $property->price }}</div>
                                    </div>
                                </td>
                                <td>{{ $property->created_at }}</td>
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
