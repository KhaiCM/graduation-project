@extends('fontend.layouts.master')
@section('content')
@if (session('noti'))
<div>
    <div class="alert alert-success" style="text-align: center; margin-top: 20px;color: red;font-size: 20px;font-weight: 500;">{{ session('noti') }}</div>
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
                                    <div class="col-md-12 margin-property">
                                        <div class="pull-left">
                                            <h3>{{ $property->name }}</h3>
                                            <p><i class="fa fa-map-marker"></i>&nbsp;{{ $property->districts->name ?? '' }}</p>
                                        </div>
                                        <div class="p-r">
                                            <h3>{{ $property->price }} {{ $property->unit->name ?? '' }}</h3>
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
                                    <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">{{ trans('province.detail') }}</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="carTabContent">
                                <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                    <h3 class="heading"></h3> {!! $property->describe !!}
                                </div>
                                <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                                    <div class="property-details">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6">
                                                <ul>
                                                    @if($property->form  == 0)
                                                    <li>
                                                        <strong>Hình thức:</strong>Bán
                                                    </li>
                                                    @else
                                                    <li>
                                                        <strong>Hình thức:</strong>Cho Thuê
                                                    </li>
                                                    @endif
                                                    <li>
                                                        <strong>Địa chỉ:</strong>{{ $property->address }}, {{ $property->districts->name }}, {{ $property->districts->provinces->name }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <ul>
                                                    <li>
                                                        <strong>Diện tích:</strong>{{ $property->acreage }}&nbsp m2
                                                    </li>
                                                    <li>
                                                        <strong>Thể loại tài sản:</strong>{{ $property->propertyType->propertyCategory->name }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                        <div class="contact-3 mb-60">
                            <div class="container">
                                <div class="">
                                    <div class="send-btn">
                                        <a href="{{ route('createcalendars', ['id' => $property->id]) }}"><button class="btn btn-color btn-md btn-message-calendar">{{ trans('message.setcalendar') }}</button></a>
                                        <a href="{{ route('createcontracts', ['id' => $property->id]) }}"><button class="btn btn-color btn-md btn-message">{{ trans('message.contract') }}</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
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
                            </div>

                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-12 margin-top">
                        <div class="sidebar mbl">
                            <!-- Search area start -->
                            <div class="widget search-area d-none d-xl-block d-lg-block">
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
                                    <div class="form-group">
                                        {!! Form::submit( __('label.search'), ['class' => 'search-button btn-md btn-color', 'name' => 'submit']) !!}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
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
