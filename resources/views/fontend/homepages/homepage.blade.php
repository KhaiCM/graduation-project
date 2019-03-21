@extends('fontend.layouts.master')
@section('content')
<!-- Banner start -->
<!-- start avatar -->
<div class="banner banner-bg" id="particles-banner-wrapper">
<!-- end avatar -->
<!-- hieu ung ngoi sao -->
<div id="particles-banner"></div>
<!-- ket thuc hieu ung -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item item-bg active">
            <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                <div class="carousel-content container">
                    <div class="text-center">
                        <h3 data-animation="animated fadeInDown delay-05s">{!! __('label.slider1')!!}<br/>{!! __('label.slider2')!!}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search area start -->
<div class="search-area" id="search-area-1">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                {!! Form::open(['route' => 'filter.property', 'method' => 'GET']) !!}
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('province', $province, null, ['class' => 'selectpicker search-fields', 'id' =>  'province']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('district', $district, null, ['class' => 'selectpicker search-fields', 'id' => 'district']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('property_category', $propertyCategory, null, ['class' => 'selectpicker search-fields', 'id' => 'property_category']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('property_type', $propertyType, null, ['class' => 'selectpicker search-fields', 'id' => 'property_type']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('acreage', processFilter(config('search.acreage')), null, ['class' => 'selectpicker search-fields']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('price', processFilter(config('search.price')), null, ['class' => 'selectpicker search-fields']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::select('form', [2 => '--form--', 0 => 'sale', 1 => 'rent'], null, ['class' => 'selectpicker search-fields']) !!}
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3">
                        <div class="form-group">
                            {!! Form::submit( __('label.search'), ['class' => 'search-button btn-md btn-color', 'name' => 'submit']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Search area start -->
</div>
<!-- banner end -->
<!-- Featured properties start -->
@if (count($properties) > 0)
    <div class="featured-properties content-area-2">
        <div class="container">
            <div class="main-title">
                <h1>{!! __('label.featured_properties')!!}</h1>
            </div>
            <ul class="list-inline-listing filters filteriz-navigation">
                <li class="active btn filtr-button filtr" data-filter="all">{!! __('label.all')!!}</li>
                <li data-filter="1" class="btn btn-inline filtr-button filtr">{!! __('label.apartment')!!}</li>
                <li data-filter="2" class="btn btn-inline filtr-button filtr">{!! __('label.house')!!}</li>
                <li data-filter="3" class="btn btn-inline filtr-button filtr">{!! __('label.office')!!}</li>
            </ul>
            <div class="row filter-portfolio">
                <div class="cars">
                    @foreach ($properties as $property)
                        <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="#" class="property-img">
                                        <div class="price-ratings-box">
                                            <p class="price">
                                                {{ $property->price }} {{ $property->unit->name ?? '' }}
                                            </p>
                                            <div class="ratings">
                                                <strong>{{ rand(1, 5) }} &nbsp </strong><i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        @foreach ($property->propertyImage as $image)
                                            <img src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" alt="{{ $property->name }}" class="img-fluid">
                                            @break
                                        @endforeach
                                    </a>
                                    <div class="property-overlay">
                                        <a href="{{ route('property.view', $property->id) }}" class="overlay-link">
                                            <i class="fa fa-link"></i>
                                        </a>
                                        <div class="property-magnify-gallery">
                                            @foreach ($property->propertyImage as $image)
                                                <img src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" alt="{{ $property->name }}" class="overlay-link">
                                                @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h1 class="title">
                                        <a href="{{ route('property.view', $property->id) }}">{{ $property->name }}</a>
                                    </h1>
                                    <div class="location">
                                        <a href="#">
                                            <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ $property->districts->name ?? '' }}
                                        </a>
                                    </div>
                                    <ul class="facilities-list clearfix">
                                        {!! $property->describe !!}
                                    </ul>
                                </div>
                                <div class="footer">
                                    <a href="#">
                                        <i class="fa fa-user"></i> {{ $property->users->name ?? ''}}
                                    </a>
                                    <span>
                                        <i class="fa fa-calendar-o"></i> {{ $property->created_at }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {!! $properties->links() !!}
        </div>
    </div>
@else
    <div class="featured-properties content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>{{ trans('province.none') }}</h1>
        </div>
    </div>
    </div>
@endif
<!-- Featured properties end
<!-- services start -->
<div class="services content-area-5">
    <div class="container">
        <div class="main-title">
            <h1>{!! __('label.looking_for') !!}</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInLeft delay-04s">
                <i class="flaticon-hotel-building"></i>
                <h5>{!! __('label.apartments_clean') !!}</h5>
                <p>{{ trans('province.content') }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInUp delay-04s">
                <i class="flaticon-house"></i>
                <h5>{!! __('label.houses') !!}</h5>
                <p>{{ trans('province.content') }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInDown delay-04s">
                <i class="flaticon-call-center-agent"></i>
                <h5>{!! __('label.support_24/7')!!}</h5>
                <p>{{ trans('province.content') }}</p>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInRight delay-04s">
                <i class="flaticon-office-block"></i>
                <h5>{!! __('label.commercial') !!}</h5>
                <p>{{ trans('province.content') }}</p>
            </div>
        </div>
    </div>
</div>
<!-- services end -->
<!-- Blog start -->
<div class="blog content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>{!! __('label.news')!!}</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInLeft delay-04s">
                <div class="blog-grid-box">
                    <img class="blog-theme img-fluid" src="{{ asset(config('fontend.fontend_image.property10')) }}" alt="property-10">
                    <div class="detail">
                        <div class="date-box">
                            <h5>{{ trans('province.month') }}</h5>
                            <h5>{{ trans('province.day') }}</h5>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">{{ trans('province.name') }}</a>
                        </h3>
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>{{ trans('province.name') }}</a></span>
                            <span><a href="#"><i class="fa fa-commenting-o"></i>{{ trans('province.comment') }}</a></span>
                        </div>
                        <p>{{ trans('province.content') }}</p>
                        <a href="blog-single-sidebar-right.html" class="btn-read-more">{{ trans('province.readmore') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->
@endsection

