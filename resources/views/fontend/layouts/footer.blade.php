<!-- Footer start -->
<footer class="footer">
    <div class="container footer-inner">
        <div class="row">
            <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6 pading-top">
                <div class="footer-item">
                    <h4>
                        {!! __('label.about_us')!!}
                    </h4>
                    <a class="text-real">Nắm rõ được nhu cầu của thị trường bất động sản, chúng tôi sẽ mang đến những tư vấn hợp lý, những dịch vụ tiện ích và nhanh chóng nhất cho các bạn</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 pading-top">
                <div class="footer-item">
                    <h4>{!! __('label.contact_us')!!}</h4>
                    <ul class="contact-info">
                        <li>
                            {!! __('label.address')!!}: Trần Khát Chân, Hà Nội 
                        </li>
                        <li>
                            {!! __('label.email')!!}: <a href="#">info@themevessel.com</a>
                        </li>
                        <li>
                            {!! __('label.phone')!!}: <a href="#">Tel:+0477-85x6-552</a>
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
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 pading-top">
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
                <p class="copy">&copy;  2019 <a href="#" target="_blank"></a>. Theme real estae by Minh Khai.</p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->
