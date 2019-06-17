@extends('fontend.layouts.master')
@section('content')

<!-- Blog section start -->
<div class="blog-section content-area-13">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12" style="margin-top: inherit;">
				<!-- Blog grid box start -->
				<div class="blog-grid-box">
					<img class="blog-theme img-fluid" src="{{ asset(config('app.blog_image')) }}/{{ $post->image }}" alt="blog-3">
					<div class="detail">
						<h2>
							<a href="blog-single-sidebar-right.html">{{ $post->title }}</a>
						</h2>
						<div class="post-meta">
							<span><a href="#"><i class="fa fa-user"></i>{{ $post->user['name'] }}</a></span>
							<span><a><i class="fa fa-clock-o"></i>{{ $post->created_at->toFormattedDateString() }}</a></span>
							<span><a href="#"><i class="fa fa-commenting-o"></i></a></span>
						</div>
						<p>{!! $post->content !!}</p>
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
				<!-- Blog grid box end -->
			</div>
			<div class="col-lg-4 col-md-12 margin-top">
				<div class="sidebar mbl mb-50">
					<!-- Search box start -->
					<div class="widget search-box">
						<h5 class="sidebar-title">Search</h5>
						<form class="form-search" method="GET">
							<input type="text" class="form-control" placeholder="Search">
							<button type="submit" class="btn"><i class="fa fa-search"></i></button>
						</form>
					</div>

					<!-- Categories start -->
					<div class="widget categories">
						<h5 class="sidebar-title">Categories</h5>
						<ul>
							<li><a href="#">Apartments<span>(12)</span></a></li>
							<li><a href="#">Houses<span>(8)</span></a></li>
							<li><a href="#">Family Houses<span>(23)</span></a></li>
							<li><a href="#">Offices<span>(5)</span></a></li>
							<li><a href="#">Villas<span>(63)</span></a></li>
							<li><a href="#">Other<span>(7)</span></a></li>
						</ul>
					</div>

					<!-- Recent posts start -->
					<div class="widget recent-posts">
						<h5 class="sidebar-title">Recent Properties</h5>
						<div class="media mb-4">
							<a class="pr-4" href="properties-details.html">
								<img src="assets/img/sub-property/sub-property.jpg" alt="sub-property">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Beautiful Single Home</a>
								</h5>
								<p>February 27, 2018</p>
								<p> <strong>$245,000</strong></p>
							</div>
						</div>
						<div class="media mb-4">
							<a class="pr-4" href="properties-details.html">
								<img src="assets/img/sub-property/sub-property-2.jpg" alt="sub-property-2">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Sweet Family Home</a>
								</h5>
								<p>February 27, 2018</p>
								<p> <strong>$245,000</strong></p>
							</div>
						</div>
						<div class="media">
							<a class="pr-4" href="properties-details.html">
								<img src="assets/img/sub-property/sub-property-3.jpg" alt="sub-property-3">
							</a>
							<div class="media-body align-self-center">
								<h5>
									<a href="properties-details.html">Real Luxury Villa</a>
								</h5>
								<p>February 27, 2018</p>
								<p> <strong>$245,000</strong></p>
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