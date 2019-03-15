@extends('fontend.layouts.master') @section('content')
<!-- Sub banner 2 start -->
<div class="sub-banner-2">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ $post->title }}</h1>
        </div>
    </div>
</div>
<!-- Sub banner 2 end -->

<!-- Blog section start -->
<div class="blog-section content-area-13">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Blog grid box start -->
                <div class="blog-grid-box">
                    <img class="blog-theme img-fluid" src="{{ asset(config('app.blog_image')) }}/{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="detail">
                        <div class="date-box">
                            <h5>{{ $post->created_at }}</h5>
                        </div>
                        <h2>
							<a href="{{ route('post.view', $post->id) }}">{{ $post->title }}</a>
						</h2>
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>{{ $post->user->name ?? '' }}</a></span>
                            <span><a href="#"><i class="fa fa-commenting-o"></i>{{ trans('province.comment') }}</a></span>
                        </div>
                        {!! $post->content !!}
                        <br>
                        <div class="row clearfix tags-socal-box">
                            <div class="col-lg-7 col-md-7 col-sm-7">
                                <div class="tags">
                                    <h2>{{ trans('province.tag') }}</h2>
                                    <ul>
                                        <li><a href="#">{{ trans('province.name') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="social-list">
                                    <h2>{{ trans('province.share') }}</h2>
                                    <ul>
                                        <li>
                                            <a href="#" class="facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="google">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="rss">
                                                <i class="fa fa-rss"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog grid box end -->

                <!-- Comments section start -->
                <div class="comments-section cmn-mrg-btm">
                    <h2 class="comments-title">{{ trans('province.comment') }}</h2>
                    <ul class="comments">
                        <li>
                            <div class="comment">
                                <div class="comment-author">
                                    <a href="#">
                                        <img src="#" class="rounded-circle" alt="avatar-13">
                                    </a>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-meta">
                                        <div class="comment-meta-author">
                                            {{ trans('province.name') }}
                                        </div>
                                        <div class="comment-meta-date">
                                            <span>{{ trans('province.time') }}</span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="comment-body">
                                        <div class="comment-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p>{{ trans('province.content') }}</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Comments section end -->

                <!-- Contact-1 start -->
                <div class="contact-1 cmn-mrg-btm">
                    <h2>{{ trans('province.leavecomment') }}</h2>
                    <div class="container">
                        <div class="row">
                            {!! Form::open(['method' => 'POST']) !!}
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group name">
                                        {!! form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => trans('province.name')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group email">
                                        {!! form::text('email', Auth::user()->email, ['class' => 'form-control', 'placeholder' => trans('province.email')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group message">
                                        {!! form::textarea('content', null, ['class' => 'form-control', 'placeholder' => trans('province.comment')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="send-btn">
                                        {!! Form::button(trans('province.comment'), ['class' => 'btn btn-color btn-md btn-message', 'type' => 'submit']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- Contact-1 end -->

            </div>
        </div>
    </div>
</div>
<!-- Blog section end -->
@endsection
