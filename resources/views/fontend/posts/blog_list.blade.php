@extends('fontend.layouts.master') @section('content')
<!-- Sub banner 2 start -->
<div class="sub-banner-2">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ trans('province.post') }}</h1>
        </div>
    </div>
</div>
<!-- Sub banner 2 end -->

<!-- Blog section start -->
<div class="blog-section content-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog-grid-box">
                            <img class="blog-theme img-fluid" src="{{ asset(config('app.blog_image')) }}/{{ $post->image }}" alt="{{ $post->title }}    ">
                            <div class="detail">
                                <div class="date-box">
                                    <h5>{{ $post->created_at }}</h5>
                                </div>
                                <h3>
                                    <a href="{{ route('post.view', $post->id) }}">{{ $post->title }}</a>
                                </h3>
                                <div class="post-meta">
                                    <span><a href="#"><i class="fa fa-user"></i>{{ $post->user->name ?? '' }}</a></span>
                                    <span><a href="{{ route('post.view', $post->id) }}"><i class="fa fa-commenting-o"></i>{{ trans('province.comment') }}</a></span>
                                </div>
                                <p>{{ $post->describe }}</p>
                                <a href="{{ route('post.view', $post->id) }}" class="btn-read-more">{{ trans('province.readmore') }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-12">
                        <div class="pagination-box hidden-mb-45">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">{!! $posts->links() !!}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar mbl">
                    <!-- Search box start -->
                    <div class="widget search-box">
                        <h5 class="sidebar-title">{{ trans('province.seach') }}</h5>
                        {!! Form::open(['method' => 'POST']) !!}
                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
                            {!! Form::button("<i class='fa fa-search'></i>", ['class' => 'btn']) !!}
                        {!! Form::close() !!}
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
                            <a class="pr-4" href="#">
                                <img src="#" alt="sub-property">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    <a href="#">{{ trans('province.name') }}</a>
                                </h5>
                                <p>{{ trans('province.time') }}</p>
                                <p> <strong>{{ trans('province.name') }}</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog section end -->
@endsection
