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
                        <h2>{{ trans('province.name') }}</h2>
                        <img src="{{ asset(config('fontend.fontend_image.sub_property')) }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <div class='detail clearfix'>
                        <a href="#"><button type='button' class="btn btn-md btn-color">{{ __('province.unfollow') }}</button></a>
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
                            <tr>
                                <td class="image">
                                    <a href="#"><img alt="my-properties-3" src="#" class="img-fluid"></a>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h4>{{ trans('province.name') }}</h4></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h2></h2></a>
                                        <figure><i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ trans('province.address') }}</figure>
                                        <div class="tag price">{{ trans('province.price') }}</div>
                                    </div>
                                </td>
                                <td>{{ trans('province.day') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
@endsection
