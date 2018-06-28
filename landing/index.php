<?php

/*
** Destroy the CWUserLoggedIn if 'redirect_to' parameter is found in the URL
** It's assumed that when this parameter is found in URL, the use doesn't 
** need to be automatcially redirected to the WP social site
*/

if(!empty($_GET["redirect_to"])){

	 setcookie('CWUserLoggedIn', null, -1, '/', ".comfywindows.com");
	 header('Location: http://'.$_SERVER['HTTP_HOST']);
	 exit;

}


/* send the user to Wordpress site in case CWUserLoggedIn cookie 
** is found. This cookie is set by 'create_login_cookie' function in 
** wp-includes/user.php when user logs in
**/

if(isset($_COOKIE['CWUserLoggedIn'])) {


	header('Location:http://social.comfywindows.com');

}

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>ComfyWindows- Private, free and ad free social network</title>
	<meta charset="UTF-8">
	<meta name="description" content="COMFYWINDOWS, A private, free and ad free social network">
	<meta name="keywords" content="social network, ad free social network, free social network, new social network">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="https://colorlib.com/preview/theme/halo/img/favicon.ico" rel="shortcut icon">

	<!-- Google Fonts -->
	<link href="files/css.css" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="files/flaticon.css">
	<link rel="stylesheet" href="files/animate.css">
	<link rel="stylesheet" href="files/owl.css">
	<link rel="stylesheet" href="files/style.css">
	<link rel="stylesheet" href="files/custom.css">



	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section start -->
	<header class="header-section sp-pad">
		<h3 class="site-logo">ComfyWindows</h3>
		<!--<form class="search-top" method="get" action="http://social.comfywindows.com/members">
			<button class="se-btn"><i class="fa fa-search"></i></button>
			<input type="text" placeholder="Search....." name="s">
		</form>-->
		<div class="nav-switch">
			<i class="fa fa-bars"></i>
		</div>
		<nav class="main-menu">
			<ul>
				<li><a href="/">Home</a></li>
				<li><a class="auto-scroll" scroll-time="500" scroll-to="#about" href="javascript:void(0)">about</a></li>
				<li><a class="auto-scroll" scroll-time="1000" scroll-to="#stats" href="javascript:void(0)">Stats</a></li>
				<li><a class="auto-scroll" scroll-time="1000" scroll-to="#services" href="javascript:void(0)">Services</a></li>
				<li><a class="auto-scroll" scroll-time="1000" scroll-to="#donate" href="javascript:void(0)">Donate</a></li>
				<li><a href="http://social.comfywindows.com/contact-us/">Contact</a></li>
				<li><a class="btn btn-info" href="http://social.comfywindows.com/login">Sign In</a></li>
				<li><a class="btn btn-success" href="http://social.comfywindows.com/register">Sign Up</a></li>

			</ul>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Hero section start -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/1.jpg">
				<div class="hs-text">
					<h2 class="hs-title">Ad free</h2>
					<p class="hs-des">A simple social network <br>That doesn’t sell your data</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/2.jpg">
				<div class="hs-text">
					<h2 class="hs-title">Private</h2>
					<p class="hs-des">We don't analyze or<br> Monitor your activities</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/1.jpg">
				<div class="hs-text">
					<h2 class="hs-title">Non Profit</h2>
					<p class="hs-des">We don't run ads<br> We rely on donations</p>
				</div>
			</div>
			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/2.jpg">
				<div class="hs-text">
					<h2 class="hs-title">Promise</h2>
					<p class="hs-des">Unlike Facebook, we will<br> Never end up selling your data</p>
				</div>
			</div>

			<div class="hs-item set-bg sp-pad" data-setbg="img/hero-slider/2.jpg">
				<div class="hs-text">
					<h2 class="hs-title">It's free</h2>
					<p class="hs-des">And will always be<br>Just donate a little </p>
				</div>
			</div>




		</div>
	</section>
	<!-- Hero section end -->


	<!-- Intro section start -->
	<section class="intro-section sp-pad spad" id="about">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-4 intro-text">
					<span class="sp-sub-title">It's a social network</span>
					<h3 class="sp-title">Why it is even needed in first place?</h3>
					<p>In today's world of data-hungry ecosystem of conscienceless companies and startups, none of your online activities are private any more. Even sending a private message to someone on today's social network sites is monitored and recorded<span class="text-dots">....</span><span class="more-text">. Then this warehouse of your personal information helps AI programs analyse your personality. These AI programs collect and analyse every single piece of your online information and activity and help build a psychographic profiles of yours. This psychographic profile tells companies about you more than even you or your close ones know about yourself. And at the end of the day, you end up being targeted by advertisers, marketers or even by political parties which either try to sell their product/services to you or design their political campaign in a way that it influences your voting choices in a favour of a particular political party. <br/> Now using a social network site such as Facebook is no more safe. On Facebook, there is no way you can prevent your data from being shared with the advertisers, you can only choose which advertisers you don't want to see ads from. However, with increasing number of online users, need of social networking is ever growing and will be growing. And so, this is where ComfyWindows comes in. It aims to restore the old glory days of private and unmonitored online social netwroking and communication. It's just a place where no one is interested in your data and activities and it's just dedicated to online networking with your loved ones.</span> </p>
					<a href="javascript:void(0)" class="site-btn read-more-btn">Read More</a>
				</div>
				<div class="col-xl-7 offset-xl-1">
					<figure class="intro-img mt-5 mt-xl-0">
						<img src="img/intro.jpg" alt="">
					</figure>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->


	<!-- Portfolio section start -->
	<section class="portfolio-section">
		<div class="portfolio-warp">
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/portfolio/1.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/1.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/portfolio/2.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/2.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/portfolio/3.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/3.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio sm-wide set-bg" data-setbg="img/portfolio/4.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/4.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio sm-wide set-bg " data-setbg="img/portfolio/5.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/5.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio set-bg" data-setbg="img/portfolio/6.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/6.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
			<!-- single item -->
			<div class="single-portfolio sm-wide md-w-100 set-bg " data-setbg="img/portfolio/7.jpg">
				<a href="single-work.html" class="portfolio-info">
					<div class="pfbg set-bg" data-setbg="img/portfolio/7.jpg"></div>
					<h5>Summer in the desert</h5>
					<p>Landscape Photography</p>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</section>
	<!-- Portfolio section end -->


	<!-- Milestones section start -->
	<section class="milestones-section spad" id="stats">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 fact-box">
					<div class="fact-content">
						<i class="flaticon-users"></i>
						<h2>20k</h2>
						<p>Registered Users</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 fact-box">
					<div class="fact-content">
						<i class="flaticon-chat"></i>
						<h2>10k</h2>
						<p>Messages exchanged</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 fact-box">
					<div class="fact-content">
						<i class="flaticon-like"></i>
						<h2>2k </h2>
						<p>Status updates</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 fact-box">
					<div class="fact-content">
						<i class="flaticon-photo-camera"></i>
						<h2>1k</h2>
						<p>Picture updates</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Milestones section end -->


	<!-- Services section start -->
	<section class="services-section spad" id="services">
		<div class="container-fluid services-warp">
			<div class="services-text">
				<div class="container p-0">
				<span class="sp-sub-title">ComfyWindows</span>
					<h3 class="sp-title">see What we offer</h3>
					<p>We offer a suite of components that are common to a typical social network. ComfyWindows helps you build a home for your friends, school, sports team, or other niche community<span class="text-dots">....</span><span class="more-text">. Members can register on the site to create user profiles, have private conversations, make social connections, create and interact in groups, and much more.</span></p>
					<a href="javascript:void(0)" class="site-btn read-more-btn">Read More</a>
				</div>
			</div>
			<div class="container p-0">
				<div class="row">
					<div class="col-xl-8 offset-xl-4">
						<div class="row">
							<div class="col-md-6">
								<div class="icon-box">
									<i class="flaticon-user"></i>
									<h4>Friend Connections</h4>
									<p> Let you make connections so you can track the activity of others and focus on the people you care about the most.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icon-box">
									<i class="flaticon-chat-1"></i>
									<h4>Private Messaging</h4>
									<p> Allow you to talk to others directly and in private. Messages can also be sent between any number of members.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icon-box">
									<i class="flaticon-share"></i>
									<h4>Activity Streams</h4>
									<p> Global, personal, and group activity streams with threaded commenting, direct posting, favoriting and @mentions, all with email notification support. </p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="icon-box">
									<i class="flaticon-users"></i>
									<h4>Groups</h4>
									<p> Groups allow you to organize yourself into specific public, private or hidden sections with separate activity streams and member listings.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="service-more-link">
			<a href="#" class="arrow-btn">
				<i class="fa fa-angle-right"></i>
				<i class="fa fa-angle-right"></i>
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	</section>
	<!-- Services section start end -->



	<!-- Contact section start 
	<section class="contact-section set-bg spad" id="contact" data-setbg="img/contact-bg.jpg">
		<div class="container-fluid contact-warp">
			<div class="contact-text">
				<div class="container p-0">
					<span class="sp-sub-title">Comfywindows</span>
					<h3 class="sp-title">Donate and help us</h3>
					<p>We are a non-profit orgnaization. In order to keep this site running, we need you to help us. So if you can, please donate any amount to keep this platform secure, ad free and private. Thanks!</p>

					<ul class="con-info">
						<li><i class="flaticon-phone-call"></i>+45 677 8993000 223</li>-
						<li><i class="flaticon-envelope"></i><a href="email-to: deakmisra@gmail.com" class="__cf_email__" data-cfemail="59363f3f303a3c192d3c342935382d3c773a3634">deakmisra@gmail.com</a></li>
						<li><i class="flaticon-placeholder"></i>#692, first floor, phase 4, Mohali, Punjab, India. Pin- 160059</li>
					</ul>
				</div>
			</div>
			<div class="container p-0">
				<div class="row">
					<div class="col-xl-8 offset-xl-4">
						<form class="contact-form">
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Your name">
								</div>
								<div class="col-md-6">
									<input type="email" placeholder="E-mail">
								</div>
								<div class="col-md-12">
									<input type="text" placeholder="Subject">
									<textarea placeholder="Message"></textarea>
									<button class="site-btn light">Send</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	Contact section end -->


	<!-- Footer section start -->
	<footer class="footer-section spad" id="donate">
		<div class="container text-center">
			<h2>Donate and help us</h2>

			<p>We are a non-profit orgnaization. In order to keep this site running, we need you to help us. So if you can, please donate any amount to keep this platform secure, ad free and private. Thanks!</p>

			<p><a href="#"><img src="img/donate.gif"/></a></p>
		<!--	<p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="80efe6e6e9e3e5c0f4e5edf0ece1f4e5aee3efed">abc@example.com</a></p>
			<div class="social">
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a> </br>	-->


</br>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with passion and <i class="fa fa-heart-o" aria-hidden="true"></i>

			
		</div>


	</footer>
	<!-- Footer section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="files/jquery-3.js"></script>
	<script src="files/bootstrap.js"></script>
	<script src="files/owl.js"></script>
	<script src="files/mixitup.js"></script>
	<script src="files/circle-progress.js"></script>
	<script src="files/main.js"></script>


</body>
</html>

