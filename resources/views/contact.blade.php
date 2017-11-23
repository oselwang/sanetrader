<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Contact</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-linearicons.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
	<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
	<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
	<link rel="stylesheet" type="text/css" href="css/theme.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="wrap">
	<div class="container">
		<div id="header">
			<div class="header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-12">
						<div class="logo">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 col-sm-7 col-xs-12">
						<div class="header-info pull-right">
							<div class="header-info-search">
								<a href="#" class="header-btn-video"><span class="lnr lnr-camera-video"></span> videos</a>
								<form class="header-search">
									<input type="text" class="header-input-search" />
									<a href="#" class="header-btn-search"><span class="lnr lnr-magnifier"></span> Search</a>
								</form>
							</div>
							<div class="header-info-login">
								@if (Auth::check())
									<a href="/logout" class="header-btn-join"><span class="lnr lnr-lock"></span> Log Out</a>
								@else
									<a href="#" class="header-btn-signin" data-popup-open="popup-1"><span class="lnr lnr-user"></span> Sign In</a>
									<a href="#" class="header-btn-join" data-popup-open="popup-2"><span class="lnr lnr-lock"></span> Join</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav class="main-nav">
				<ul class="main-menu">
					<li><a href="/">Home</a></li>
					@if (Auth::check())
					  	<li><a href="/chart">Chart</a></li>
						<li><a href="/edit-profile">Edit Profile</a></li>
						<li><a href="/subscription">Subscription</a></li>
					@endif
					<li><a href="http://sanetradersblog.com/" target="_blank">Blog</a></li>
					<li><a href="/about">About Us</a></li>
					<li><a href="/contact">Contact Us</a></li>
				</ul>
				<div class="mobile-menu">
					<span class="mobile-menu-text">Menu</span>
					<a href="#" class="btn-mobile-menu"><span class="lnr lnr-menu"></span></a>
				</div>
				<div class="extra-menu">
					<a href="#" class="btn-extra-menu">More <span class="lnr lnr-menu"></span></a>
				</div>
				<div class="extra-menu-dropdown">
					<div class="row">
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<h2>More</h2>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<ul>
									<li><a href="404.html">404</a></li>
									<li><a href="about.html">About</a></li>
									<li><a href="about-light.html">About Light</a></li>
									<li><a href="blog.html">Blog</a></li>
									<li><a href="blog-dark.html">Blog Dark</a></li>
									<li><a href="blog-fullwidth.html">Blog Full Width</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<ul>
									<li><a href="blog-grid.html">Blog Grid</a></li>
									<li><a href="blog-grid-ml.html">Blog Grid ML</a></li>
									<li><a href="blog-list.html">Blog List</a></li>
									<li><a href="contact.html">Contact Dark</a></li>
									<li><a href="contact-light.html">Contact Light</a></li>
									<li><a href="detail.html">Detail</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<ul>
									<li><a href="event.html">Event</a></li>
									<li><a href="grid-shop.html">Grid Shop</a></li>
									<li><a href="list-shop.html">List Shop</a></li>
									<li><a href="shop.html">Shop</a></li>
									<li><a href="list.html">List Post</a></li>
									<li><a href="list-2.html">List Light</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<ul>
									<li><a href="list-mr.html">List Main Right</a></li>
									<li><a href="list-ml.html">List Main Left</a></li>
									<li><a href="list-event.html">List Event</a></li>
									<li><a href="single.html">Single Post</a></li>
									<li><a href="single2.html">Single Style 2</a></li>
									<li><a href="single-dark2.html">Single Dark 2</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-12">
							<div class="item-extra-menu">
								<ul>
									<li><a href="single-dark3.html">Single Dark 3</a></li>
									<li><a href="video.html">Video</a></li>
									<li><a href="search-dark.html">Search Dark</a></li>
									<li><a href="search-dark-ml.html">Search Dark ML</a></li>
									<li><a href="search-dark.html">Search Light</a></li>
									<li><a href="search-dark-ml.html">Search Light ML</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- End Extra Menu -->
			</nav>
			<!-- End Main Nav -->
		</div>
		<!-- End Header -->
		<div id="content">
			<div class="contact-page">
				<h2 class="title">Contact</h2>
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="contact-info">
							<div class="contact-open">
							
							</div>
							<h3>Our Location</h3>
							<p>Our office is located in Hanoi, the capital of Vietnam where </p>
							<ul>
								<li class="address-info">Office address: 10 South Bendan Cobenha, UK 2016</li>
								<li class="tel-info">Tel: +01-6868-333</li>
								<li class="email-info">Email: Client@isingle.com</li>
								<li class="website-info">Website: http://www.7uptheme.com</li>
							</ul>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="contact-form-page">
							<h2>Get in touch with us!</h2>
							<ul class="alert alert-danger hidden" id="error-message-contact">

							</ul>
							<form method="post" action="{{url('contact')}}" id="contact-form">
								<p><input type="text" name="name" value="* Your Name (required)" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></p>
								<p><input type="text" name="email" value="* Your Email (required)" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></p>
								<p><input type="text" name="title" value="Title" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue"/></p>
								<p><textarea name="message" onfocus="if (this.value==this.defaultValue) this.value = ''" onblur="if (this.value=='') this.value = this.defaultValue" cols="30" rows="8">* Your Message</textarea></p>
								<p><input type="submit" value="Send Email" />
							</form>
						</div>
					</div>
				</div>
				<div class="contact-map">
					<h2>Find us on the map</h2>
					<img src="images/about/map.jpg" alt="" />
				</div>
			</div>
		</div>
		<!-- End Content -->
		<div id="footer">
			<div class="footer-default">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="logo-footer"><a href="#">new<span>day</span>.com</a></div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="social-footer text-right">
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
				<div class="footer">	
					<ul class="menu-footer">
						<li><a href="#">About us </a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">Work for us</a></li>
						<li><a href="#">Help </a></li>
						<li><a href="#">Transcripts</a></li>
						<li><a href="#">License Footage</a></li>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy </a></li>
						<li><a href="#">AdChoices</a></li>
					</ul>
					<p class="copyright">Copyright © 2016 Wordpress. All Rights Reserved. Designed by <a href="#"><span>7uptheme</span>.com</a>.</p>
				</div>
			</div>
		</div>
		<!-- End Footer -->
	</div>
</div>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
	$(document).ready(function () {
		$('#contact-form').on('submit',function (e) {
			e.preventDefault();
			var _ = $(this);
			$.ajax({
				type: 'post',
				url: _.attr('action'),
				data: _.serializeArray(),
				Accept: 'application/json', // ini harus selalu ada setiap pemanggilan ajax
				success: function (data) {
//					window.location = 'http://sanetrader.dev'; //ini nanti diganti sesuai url setelah login
				},
				error: function (error) {
					var errors = $.parseJSON(error.responseText);
					$('#error-message-contact').removeClass('hidden').empty();
					$.each(errors, function (index, value) {
						$('#error-message-contact').append('<li style="">' + value + '</li>');
					});
				}
			});
		});
	});
</script>
@include('login')
@include('register')
</body>
</html>