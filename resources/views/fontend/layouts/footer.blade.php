<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>{!! __('label.contact_us')!!}</h4>
                    <ul class="contact-info">
                        <li>
                            Address: 20/F Green Road, Dhanmondi, Dhaka
                        </li>
                        <li>
                            Email: <a href="#">info@themevessel.com</a>
                        </li>
                        <li>
                            Phone: <a href="#">+tel:+0477-85x6-552</a>
                        </li>
                        <li>
                            Fax: +XXXX XXXX XXX
                        </li>
                    </ul>

                    <ul class="social-list clearfix">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                <div class="footer-item">
                    <h4>
                    {!! __('label.useful_links')!!}
                    </h4>
                    <ul class="links">
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>{!! __('label.contact_us')!!}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="recent-posts footer-item">
                    <h4>{!! __('label.rental_property')!!}</h4>
                    <div class="media mb-4">
                        <a class="pr-4" href="#">
                            <img src="{{ asset(config('fontend.fontend_image.sub_property')) }}" alt="sub-property">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                                <a href="#">Beautiful Single Home</a>
                            </h5>
                            <p>February 27, 2018</p>
                            <p> <strong>$245,000</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="footer-item clearfix">
                    <h4>{!! __('label.subscribe')!!}</h4>
                    <div class="Subscribe-box">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        {!! Form::open(['method' => 'POST']) !!}
                            <p>{!! Form::text('email', null, ['class' => 'form-contact','placeholder' => 'Enter Address']) !!}</p>
                            <p>{!! Form::submit(__('label.subscribe'), ['class' => 'btn btn-block btn-color']) !!}</p>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <p class="copy">&copy;  2018 <a href="#" target="_blank"></a>. Trademarks and brands are the property of their respective owners.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
