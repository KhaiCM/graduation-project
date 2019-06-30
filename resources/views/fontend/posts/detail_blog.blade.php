@extends('fontend.layouts.master')
@section('content')
<!-- Blog section start -->
<div class="blog-section content-area-7">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<!-- Blog grid box start -->
				<div class="blog-grid-box">
					<img class="blog-theme img-fluid" src="{{ asset(config('app.blog_image')) }}/{{ $post->image }}" alt="blog-3">
					<div class="detail">
						<div class="date-box">
							<h5>{{ $post->created_at->toFormattedDateString() }}</h5>
						</div>
						<h2>
							<a href="blog-single-sidebar-right.html">{{ $post->title }}</a>
						</h2>
						<div class="post-meta">
							<span><a href="#"><i class="fa fa-user"></i>{{ $post->user['name'] }}</a></span>
							<span><a><i class="fa fa-clock-o"></i>{{ $post->created_at->toFormattedDateString() }}</a></span>
						</div>
						<p>{!! $post->content !!}</P>
							<br>
							<div class="row clearfix tags-socal-box">
								<div class="col-lg-5 col-md-5 col-sm-5">
									<div class="social-list">
										<h2>Share</h2>
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
				</div>
			</div>
		</div>
	</div>
	<!-- Blog section end -->
	@endsection