@extends('fontend.layouts.master')
@section('content')

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ trans('province.category') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="#">{{ trans('province.home') }}</a></li>
                <li class="active">{{ trans('province.category') }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Properties list rightside start -->
<div class="properties-list-rightside content-area-2">
    <div class="container">
        <div class="row">
            @if (count($properties) > 0)
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        {{-- start property --}}
                        @foreach ($properties as $property)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="property-box">
                                <div class="property-thumbnail">
                                    <a href="properties-details.html" class="property-img">
                                        <div class="tag button alt featured">{{ trans('province.highlight') }}</div>
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
                                        <a class="overlay-link property-video" title="Test Title">
                                            <i class="fa fa-video-camera"></i>
                                        </a>
                                        <div class="property-magnify-gallery">
                                            @foreach ($property->propertyImage as $image)
                                                <img src="{{ asset(config('image.image_property')) }}/{{ $image->link }}" alt="{{ $property->name }}" class="img-fluid">
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
                                            <i class="fa fa-map-marker"></i>{{ $property->districts->name ?? '' }}
                                        </a>
                                    </div>
                                    <ul class="facilities-list clearfix">
                                        <li>
                                            <i class="flaticon-bed"></i> {{ $property->district_id }} {{trans('province.bedroom')}}
                                        </li>
                                        <li>
                                            <i class="flaticon-bath"></i> {{ $property->user_id }} {{ trans('province.bathroom') }}
                                        </li>
                                        <li>
                                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> {{ trans('province.acreage') }}: &nbsp; {{ $property->acreage }}
                                        </li>
                                        <li>
                                            <i class="flaticon-car-repair"></i> {{ rand(1, 2) }} {{ trans('province.garage') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <a href="#">
                                        <i class="fa fa-user"></i> {{ $property->users->name ?? '' }}
                                    </a>
                                    <span>
                                    <i class="fa fa-calendar-o"></i> {{ $property->created_at }}
                                </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- end property --}}
                        <div class="col-lg-12">
                            <div class="pagination-box hidden-mb-45">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        {!! $properties->links() !!}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mbl">
                    <!-- Search area start -->
                    <div class="widget search-area">
                        <h5 class="sidebar-title">{{ trans('province.seach') }}</h5>
                        <div class="search-area-inner">
                            <div class="search-contents ">
                                {!! Form::open(['method' => 'GET']) !!}
                                    <div class="form-group">
                                        {!! Form::select('area', [1 => __('label.area_from')], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('property-status', [1 => __('label.property_status'), 2=> __('label.for_sale'), 3=> __('label.for_rent')], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('location', [1 => __('label.location'), 2 => __('label.ha_noi')], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('category', [1 => __('label.property_types'), 2 => __('label.commercial')], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('bedrooms', [1 => __('label.bedrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::select('bathrooms', [1 => __('label.bathrooms'), 2 => 1], null, ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div class="range-slider">
                                            <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="search-button btn-md btn-color">{!! __('label.search')!!}</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Categories start -->
                    <div class="widget categories">
                        <h5 class="sidebar-title">{{ trans('province.category') }}</h5>
                        <ul>
                            <li><a href="#">{{ trans('province.category') }}<span>(12)</span></a></li>
                        </ul>
                    </div>

                    <!-- Recent posts start -->
                    <div class="widget recent-posts">
                        <h5 class="sidebar-title">{{ trans('province.recentcategory') }}</h5>
                        <div class="media mb-4">
                            <a class="pr-4" href="properties-details.html">
                                <img src="#" alt="sub-property">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="#">{{ $property->name }}</a>
                                </h5>
                                <p>{{ $property->created_at }}</p>
                                <p><strong>{{ $property->price }} {{ $property->unit->name ?? '' }}</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent comments start -->
                    <div class="recent-comments widget">
                        <h5 class="sidebar-title">{{ trans('province.comment') }}</h5>
                        <div class="media mb-4">
                            <a class="pr-4" href="#">
                                <img src="#" class="rounded-circle" alt="avatar">
                            </a>
                            <div class="media-body">
                                <p>{{ trans('province.content') }}</p>
                                <p>{{ trans('province.by') }} <span>{{ trans('province.name') }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h1>{{ trans('province.none') }}</h1>
            @endif
        </div>
    </div>
</div>
<!-- Properties list rightside end -->

@endsection
