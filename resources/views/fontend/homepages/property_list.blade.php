@extends('fontend.layouts.master')
@section('content')

<!-- Properties list rightside start -->
<div class="properties-list-rightside content-area-2">
    <div class="container">
        <div class="row">
            @if (count($properties) > 0)
            <div class="col-lg-8 col-md-12 margin-proty" style="margin-top: inherit;">
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
                                        <i class="flaticon-square-layouting-with-black-square-in-east-area"></i> {{ trans('province.acreage') }}: &nbsp; {{ $property->acreage }}&nbsp m2
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <a href="#">
                                    <i class="fa fa-user"></i> {{ $property->users->name ?? '' }}
                                </a>
                                <span>
                                    <i class="fa fa-calendar-o"></i> {{ $property->created_at->toFormattedDateString() }}
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
            <div class="col-lg-4 col-md-12 margin-top">
                <div class="sidebar mbl">
                    <!-- Search area start -->
                    <div class="widget search-area">
                        <h5 class="sidebar-title">{{ trans('province.seach') }}</h5>
                        <div class="search-area-inner">
                            <div class="search-contents ">
                            {!! Form::open(['route' => 'filter.property', 'method' => 'GET']) !!}
                                <div class="form-group">
                                    {!! Form::select('province', $province, null, ['class' => 'selectpicker search-fields', 'id' =>  'province']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('district', $district, null, ['class' => 'selectpicker search-fields', 'id' => 'district']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('property_category', $propertyCategory, null, ['class' => 'selectpicker search-fields', 'id' => 'property_category']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('property_type', $propertyType, null, ['class' => 'selectpicker search-fields', 'id' => 'property_type']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('acreage', processFilter(config('search.acreage')), null, ['class' => 'selectpicker search-fields']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('price', processFilter(config('search.price')), null, ['class' => 'selectpicker search-fields']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('form', processForm(config('search.form')), null, ['class' => 'selectpicker search-fields']) !!}
                                </div>
                                <br>
                                <div class="form-group">
                                {!! Form::submit( __('label.search'), ['class' => 'search-button btn-md btn-color', 'name' => 'submit']) !!}
                                </div>
                                {!! Form::close() !!}
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
