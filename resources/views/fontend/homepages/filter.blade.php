@extends('fontend.layouts.master')
@section('content')
<!-- properties list rightside start -->
<div class="properties-list-rightside content-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">

                @if(count($filter) > 0)
                @foreach($filter as $item)
                <div class="property-box-5">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-pad">
                            <div class="property-thumbnail">
                                <a href="properties-details.html" class="property-img">
                                    <div class="price-ratings-box">
                                        <p class="price">
                                            {{ $item->price }} {{ $item->unit->name ?? '' }}
                                        </p>
                                    </div>
                                    <img src="{{ asset(config('image.image_property')) }}/{{ $item->image }}" alt="property-3" class="img-fluid">
                                </a>
                                <div class="property-overlay">
                                    <a href="{{ route('property.view', $item->id) }}" class="overlay-link">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 align-self-center col-pad">
                            <div class="detail">
                                <!-- title -->
                                <h1 class="title">
                                    <a href="properties-details.html">{{ $item->property_name }}</a>
                                </h1>
                                <!-- Location -->
                                <div class="location">
                                    <a href="#">
                                        <i class="fa fa-map-marker"></i>{{ $item->address?? '' }}
                                    </a>
                                </div>
                                <!-- Paragraph -->
                                <p>Diện tích: {{ $item->acreage}}&nbsp m2</p>
                                <!--  Facilities list -->
                                <ul class="facilities-list clearfix">
                                    <span>
                                        <i class="fa fa-calendar-o"></i> {{ $item->created_at->toFormattedDateString() }}
                                    </span>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else 
                <h2>{{ __('label.notification') }}</h2>
                @endif
                <div class="pagination-box hidden-mb-45">
{!! $filter->links() !!}
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
        </div>
    </div>
    <!-- properties list rightside end -->
    @endsection

