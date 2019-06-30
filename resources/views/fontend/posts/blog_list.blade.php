@extends('fontend.layouts.master') @section('content')


<!-- Blog section start -->
<div class="blog-section content-area-2">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog-grid-box">
                    <img class="blog-theme img-fluid" style="height: 260px;" src="{{ asset(config('app.blog_image')) }}/{{ $post->image }}" alt="property-5">
                    <div class="detail">
                        <div class="date-box">
                            <h5>{{ $post->created_at->toFormattedDateString() }}</h5>
                        </div>
                        <h3>
                            <a href="{{ route('post.view', $post->id) }}">{{ $post->title }}</a>
                        </h3>
                        <div class="post-meta">
                            <span><a href="#"><i class="fa fa-user"></i>{{ $post->user['name'] }}</a></span>
                            <span><a href="{{ route('post.view', $post->id) }}"><i class="fa fa-commenting-o"></i>{{ trans('province.comment') }}</a></span>
                        </div>
                        <p>{!! $post->describe !!}</p>
                        <a href="{{ route('post.view', $post->id) }}" class="btn-read-more">{{ trans('province.readmore') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div class="pagination-box">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">{{ $posts->links() }}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog section end -->
@endsection
