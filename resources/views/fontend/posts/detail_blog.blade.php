@extends('fontend.layouts.master')
@section('content')
<!-- Sub banner 2 start -->
<div class="sub-banner-2">
	<div class="container">
		<div class="breadcrumb-area">
			<h1>Blog Details Right Sidebar</h1>
			<ul class="breadcrumbs">
				<li><a href="index.html">Home</a></li>
				<li class="active">Blog Details Right Sidebar</li>
			</ul>
		</div>
	</div>
</div>
<!-- Sub banner 2 end -->

<!-- Blog section start -->
<div class="blog-section content-area-13">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
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

				<!-- Comments section start -->
				<div class="comments-section cmn-mrg-btm">
					<h2 class="comments-title">{{ trans('province.comment') }}</h2>
					<ul class="comments">
						<li>
							<div class="comment">
								<div class="comment-author">
									<a href="#">
										<img src="assets/img/avatar/avatar-13.jpg" class="rounded-circle" alt="avatar-13">
									</a>
								</div>
								<div class="comment-content">
									<div class="comment-meta">
										<div class="comment-meta-author">
											Jane Doe
										</div>
										<div class="comment-meta-reply">
											<a href="#">Reply</a>
										</div>
										<div class="comment-meta-date">
											<span>8:42 PM 10/3/2018</span>
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
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
									</div>
								</div>
							</div>
							<ul>
								<li>
									<div class="comment">
										<div class="comment-author">
											<a href="#">
												<img src="assets/img/avatar/avatar-13.jpg" class="rounded-circle" alt="avatar-13">
											</a>
										</div>

										<div class="comment-content">
											<div class="comment-meta">
												<div class="comment-meta-author">
													Jane Doe
												</div>

												<div class="comment-meta-reply">
													<a href="#">Reply</a>
												</div>

												<div class="comment-meta-date">
													<span>8:42 PM 10/3/2018</span>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="comment-body">
												<div class="comment-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<div class="comment">
								<div class="comment-author">
									<a href="#">
										<img src="assets/img/avatar/avatar-13.jpg" class="rounded-circle" alt="avatar-13">
									</a>
								</div>
								<div class="comment-content">
									<div class="comment-meta">
										<div class="comment-meta-author">
											Jane Doe
										</div>
										<div class="comment-meta-reply">
											<a href="#">Reply</a>
										</div>
										<div class="comment-meta-date">
											<span>8:42 PM 10/3/2018</span>
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
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
									</div>
								</div>
							</div>
							<ul>
								<li>
									<div class="comment">
										<div class="comment-author">
											<a href="#">
												<img src="assets/img/avatar/avatar-13.jpg" class="rounded-circle" alt="avatar-13">
											</a>
										</div>

										<div class="comment-content">
											<div class="comment-meta">
												<div class="comment-meta-author">
													Jane Doe
												</div>

												<div class="comment-meta-reply">
													<a href="#">Reply</a>
												</div>

												<div class="comment-meta-date">
													<span>8:42 PM 10/3/2018</span>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="comment-body">
												<div class="comment-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui.</p>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- Comments section end -->

				<!-- Contact-1 start -->
				<div class="contact-1 cmn-mrg-btm">
					<h2>Leave a Comment</h2>
					<div class="container">
						<div class="row">
							<form action="#" method="GET" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="form-group name">
											<input type="text" name="name" class="form-control" placeholder="Name">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="form-group email">
											<input type="email" name="email" class="form-control" placeholder="Email">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="form-group subject">
											<input type="text" name="subject" class="form-control" placeholder="Subject">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<div class="form-group number">
											<input type="text" name="phone" class="form-control" placeholder="Number">
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="form-group message">
											<textarea class="form-control" name="message" placeholder="Write message"></textarea>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="send-btn mb-50">
											<button type="submit" class="btn btn-color btn-md btn-message">Send Message</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Contact-1 end -->

			</div>
			<div class="col-lg-4 col-md-12">
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

					<!-- Tags start -->
					<div class="widget tags clearfix">
						<h5 class="sidebar-title">Tags</h5>
						<ul class="tags">
							<li><a href="#">Business</a></li>
							<li><a href="#">Design</a></li>
							<li><a href="#">Real Estate</a></li>
							<li><a href="#">Luxury</a></li>
							<li><a href="#">Theme</a></li>
							<li><a href="#">Events</a></li>
							<li><a href="#">Outdoor</a></li>
							<li><a href="#">UI-UX</a></li>
							<li><a href="#">Buy Website</a></li>
							<li><a href="#">Villa</a></li>
							<li><a href="#">Sellers</a></li>
						</ul>
					</div>

					<!-- Recent comments start -->
					<div class="widget recent-comments">
						<h5 class="sidebar-title">Recent comments</h5>
						<div class="media mb-4">
							<a class="pr-3" href="#">
								<img src="assets/img/avatar/avatar.jpg" class="rounded-circle" alt="avatar">
							</a>
							<div class="media-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor,</p>
								<p>By <span>John Doe</span></p>
							</div>
						</div>
						<div class="media">
							<a class="pr-3" href="#">
								<img src="assets/img/avatar/avatar-2.jpg" class="rounded-circle" alt="avatar-2">
							</a>
							<div class="media-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiamrisus tortor,</p>
								<p>By <span>Karen Paran</span></p>
							</div>
						</div>
					</div>

					<!-- Latest start -->
					<div class="widget latest-tweet">
						<h5 class="sidebar-title">Latest Tweet</h5>
						<P><a href="#">Lorem Ipsum is simply</a> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text,</P>
						<p>@Lorem ipsum dolor<a href="#">sit amet, consectetur</a> adipiscing elit. Aenean id dignissim justo. Maecenas urna lacus,</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Blog section end -->
@endsection