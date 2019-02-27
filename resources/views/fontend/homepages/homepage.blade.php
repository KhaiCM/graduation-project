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
                            <a data-animation="animated fadeInUp delay-10s" href="#" class="btn btn-lg btn-round btn-theme">Get Started Now</a>
                            <a data-animation="animated fadeInUp delay-12s" href="#" class="btn btn-lg btn-round btn-white-lg-outline">Free Download</a>
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
                    {!! Form::open(['method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('area', [1 => __('label.area_from')], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('property-status', [1 => __('label.property_status'), 2=> __('label.for_sale'), 3=> __('label.for_rent')], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('location', [1 => __('label.location'), 2 => __('label.ha_noi')], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('category', [1 => __('label.property_types'), 2 => __('label.commercial')], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                {!! Form::select('bedrooms', [1 => __('label.bedrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                            {!! Form::select('bathrooms', [1 => __('label.bathrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) !!}
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <div class="range-slider">
                                    <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3">
                            <div class="form-group">
                                <button class="search-button btn-md btn-color" type="submit">{!! __('label.search')!!}</button>
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
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="3">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <img src="{{ asset(config('fontend.fontend_image.property7')) }}" alt="property-7" class="img-fluid">
                            </a>
                            <div class="property-overlay">
                                <a href="properties-details.html" class="overlay-link">
                                    <i class="fa fa-link"></i>
                                </a>
                                <div class="property-magnify-gallery">
                                    <img src="{{ asset(config('fontend.fontend_image.property7')) }}" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                    <img src="{{ asset(config('fontend.fontend_image.property7')) }}" class="hidden">
                                    <img src="{{ asset(config('fontend.fontend_image.property7')) }}" class="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Relaxing Apartment</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-bed"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-bath"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-car-repair"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer">
                            <a href="#">
                                <i class="fa fa-user"></i> Jhon Doe
                            </a>
                            <span>
                                <i class="fa fa-calendar-o"></i> 2 years ago
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featured properties end
    <!-- services start -->
    <div class="services content-area-5">
        <div class="container">
            <div class="main-title">
                <h1>{!! __('label.looking_for')!!}</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInLeft delay-04s">
                    <i class="flaticon-hotel-building"></i>
                    <h5>{!! __('label.apartments_clean')!!}</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInUp delay-04s">
                    <i class="flaticon-house"></i>
                    <h5>{!! __('label.houses')!!}</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInDown delay-04s">
                    <i class="flaticon-call-center-agent"></i>
                    <h5>{!! __('label.support_24')!!}</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 services-info-3 wow fadeInRight delay-04s">
                    <i class="flaticon-office-block"></i>
                    <h5>{!! __('label.commercial')!!}</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
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
                                <h5>03</h5>
                                <h5>May</h5>
                            </div>
                            <h3>
                                <a href="blog-single-sidebar-right.html">Buying a Home</a>
                            </h3>
                            <div class="post-meta">
                                <span><a href="#"><i class="fa fa-user"></i>John Antony</a></span>
                                <span><a href="#"><i class="fa fa-commenting-o"></i>24 Comment</a></span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                            <a href="blog-single-sidebar-right.html" class="btn-read-more">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog end -->
    @endsection
