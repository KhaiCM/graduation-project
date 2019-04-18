@extends('fontend.layouts.master')
@section('content')
<!-- User page start -->
<!-- Contact 1 start -->
<div class="contact-1 content-area-7">
    <div class="container">
        <div class="main-title">
            <h1>{{ __('label.contact_us') }}</h1>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-7 col-md-7">
                <!-- Google map start -->
                <div class="section">
                    <div class="map">
                        <div id="contactMap" class="contact-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.5782733856895!2d105.852975814179!3d21.009535686008807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xee62cf30cf1d94de!2sFramgia+Laboratory!5e0!3m2!1svi!2s!4v1555125930120!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                    </div>
                </div>
                <!-- Google map end -->
            </div>

            <div class=" offset-lg-1 col-lg-4 offset-md-0 col-md-5">
                <div class="contact-info">
                    <h3>{{ __('label.contact_info') }}</h3>
                    <div class="media">
                        <i class="fa fa-map-marker"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Office Address</h5>
                            <p>{!! __('label.address')!!}: Trần Khát Chân, Hà Nội</p>
                        </div>
                    </div>
                    <div class="media">
                        <i class="fa fa-phone"></i>
                        <div class="media-body">
                            <h5 class="mt-0">Phone Number</h5>
                            <p>Mobile<a href="tel:+0477-85x6-552">: +55 417 634 7X71</a> </p>
                        </div>
                    </div>
                    <div class="media mrg-btn-0">
                        <i class="fa fa-envelope"></i>
                        <div class="media-body">
                            <h5 class="mt-0">{!! __('label.email')!!}: </h5>
                            <p><a href="#">info@themevessel.com</a></p>
                            <p><a href="#">http://themevessel.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact 1 end -->
@endsection
