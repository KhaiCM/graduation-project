@extends('fontend.layouts.master')
@section('content')
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ $property->name }}</h1>
            <ul class="breadcrumbs">
            </ul>
        </div>
    </div>
</div>
@if (session('noti'))
<div>
    {{ session('noti') }}
<div>
@endif
<!-- Sub banner end -->
<!-- Properties details page start -->
<div class="properties-details-page content-area-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12 slider">
                <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-60">
                    <div class="heading-properties">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>{{ $property->name }}</h3>
                                    <p><i class="fa fa-map-marker"></i>&nbsp;{{ $property->districts->name ?? '' }}</p>
                                </div>
                                <div class="p-r">
                                    <h3>{{ $property->price }} {{ $property->unit->name ?? '' }}</h3>
                                    <p>{{ rand(1, 5) }} <i class="fa fa-star"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        @foreach ($property->propertyImage as $image)
                        <div class="item carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}" data-slide-number="{{ $loop->iteration }}">
                            <img src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" class="img-fluid" alt="{{ $property->name }}">
                        </div>
                        @endforeach
                        <a class="carousel-control left" href="#propertiesDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="carousel-control right" href="#propertiesDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- main slider carousel nav controls -->
                    <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                        @foreach ($property->propertyImage as $image)
                        <li class="list-inline-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                            <a id="carousel-selector-{{ $loop->iteration }}" class="selected" data-slide-to="{{ $loop->iteration }}" data-target="#propertiesDetailsSlider">
                                <img src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" class="img-fluid" alt="{{ $property->name }}">
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Tabbing box start -->
                <div class="tabbing tabbing-box mb-60">
                    <ul class="nav nav-tabs" id="carTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">{{ trans('province.description') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">{{ trans('province.floorplan') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">{{ trans('province.detail') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="true">{{ trans('province.video') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">{{ trans('province.location') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="carTabContent">
                        <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <h3 class="heading">{{ trans('province.description') }}</h3> {!! $property->describe !!}
                        </div>
                        <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <div class="floor-plans mb-60">
                                <h3 class="heading">{{ trans('province.floorplan') }}</h3>
                                <img src="#" alt="floor-plans" class="img-fluid">
                            </div>
                        </div>
                        <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                            <div class="property-details">
                                <h3 class="heading">{{ $property->name }} {{ trans('province.detail') }}</h3>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        {{ trans('province.content') }}
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        {{ trans('province.content') }}
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        {{ trans('province.content') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="4" role="tabpanel" aria-labelledby="4-tab">
                            <div class="property-video">
                                <h3 class="heading">{{ trans('province.video') }}</h3>
                                <iframe src="#"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                            <div class="section location">
                                <h3 class="heading">{{ trans('province.location') }}</h3>
                                <div class="map">
                                    <div id="contactMap" class="contact-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comments section start -->
                <div class="comments-section">
                    <h3 class="heading">{{ trans('province.comment') }}</h3>
                    <ul class="comments">
                        @foreach ($property->comments as $comment)
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <a href="#"><img src="{{ get_avatar($comment->users) }}" class="rounded-circle" alt="avatar-13"></a>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <div class="comment-meta-author">
                                            {{ $comment->users->name ?? '' }}
                                        </div>
                                        <div class="comment-meta-date">
                                            <span>{{ $comment->created_at }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="comment-body">
                                        <div class="comment-rating">
                                            {{ rand(1, 5) }} <i class="fa fa-star"></i>
                                        </div>
                                        {{ $comment->content }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Contact 1 start -->
                @if (Auth::check())
                <div class="contact-3 mb-60">
                    <div class="container">
                        <div class="row">
                            {{ Form::open(['method' => 'POST', 'route' => ['property.comment', $property->id]]) }}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        {{ form::text('name', Auth::user()->name, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group email">
                                        {{ form::text('name', Auth::user()->email, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        {!! form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('province.comment')]) !!}
                                    </div>
                                </div>
                                <div class="">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-color btn-md btn-message">{{ trans('province.comment') }}</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}&nbsp;
                        </div>
                        <div class="">
                            <div class="send-btn">
                                <a href="{{ route('createcalendars', ['id' => $property->id]) }}"><button class="btn btn-color btn-md btn-message-calendar">{{ trans('message.setcalendar') }}</button></a>
                                <a href="{{ route('createcontracts', ['id' => $property->id]) }}"><button class="btn btn-color btn-md btn-message-calendar">{{ trans('message.contract') }}</button></a>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mbl">
                    <!-- Search area start -->
                    <div class="widget search-area d-none d-xl-block d-lg-block">
                        <h5 class="sidebar-title">{{ trans('province.seach') }}</h5>
                        <div class="search-area-inner">
                            <div class="search-contents ">
                                {{ Form::open(['method' => 'GET']) }}
                                <div class="form-group">
                                    {{ Form::select('area', [1 => __('label.area_from')], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('property-status', [1 => __('label.property_status'), 2=> __('label.for_sale'), 3=> __('label.for_rent')], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('location', [1 => __('label.location'), 2 => __('label.ha_noi')], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('category', [1 => __('label.property_types'), 2 => __('label.commercial')], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('bedrooms', [1 => __('label.bedrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::select('bathrooms', [1 => __('label.bathrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) }}
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="range-slider">
                                        <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br>
                                <button class="search-button btn-md btn-color">{{ __('label.search') }}</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

                    <!-- Categories start -->
                    <div class="widget categories">
                        <h5 class="sidebar-title">{{ trans('province.category') }}</h5>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Social list start -->
                    <div class="social-list widget clearfix">
                        <h5 class="sidebar-title">{{ trans('province.follow') }}</h5>
                        <ul>
                            <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google-bg"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="rss-bg"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->
@endsection
