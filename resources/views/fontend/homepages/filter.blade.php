@extends('fontend.layouts.master')
@section('content')
<!-- Properties list fullwidth start -->
<div class="properties-list-fullwidth content-area-2">
    <div class="container">
        <div class="row">
        
            <div class="col-lg-4 col-md-6 col-sm-12">
            @if(count($filter) > 0)

            @foreach($filter as $item)
                <div class="property-box">
                    <div class="property-thumbnail">
                            <div class="price-ratings-box">
                                <p class="price">
                                    {{ $item->price }}
                                </p>
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <img src="{{ asset(config('app.property_path') . $item->image) }}" alt="property-2" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="{{ route('property.view', $item->id) }}" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="assets/img/property-2.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="assets/img/property-6.jpg" class="hidden"></a>
                                <a href="assets/img/property-4.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <h1 class="title">
                            <a href="{{ route('property.view', $item->id) }}">{{ $item->property_name }}</a>
                        </h1>
                        <div class="location">
                            <a href="#">
                                <i class="fa fa-map-marker"></i>{{ $item->address }}
                            </a>
                            <div> {!! $item->describe !!} </div>
                        </div>
                    </div>
                    <div class="footer">
                        <a href="#">
                            <i class="fa fa-user"></i> {{ $item->users->name}}
                        </a>
                        <span>
                            <i class="fa fa-calendar-o"></i>{{ $item->created_at }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
            @else 
            <h2>{{ __('label.notification') }}</h2>
            @endif
        </div>
    </div>
</div>
<!-- Properties list fullwidth end -->
@endsection

