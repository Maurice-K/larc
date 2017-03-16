<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Friendship
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Source+Sans+Pro" rel="stylesheet"> 
<script src="https://use.fontawesome.com/b0c7fd2029.js"></script>
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72727532-4', 'auto');
  ga('require', 'linkid');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'friendship' ); ?></a>

	<header id="masthead" class="site-header nocustom" role="banner">
		<!-- utility nav -->
		<div class="utilContainer">
			<div class="row collapse">
				<div class="small-12 columns">
					<div class="logoScroll">
						<a href="/"><span class="show-for-medium-up">Louisiana Running Company </span><img src="/wp-content/uploads/2016/05/logo.png" class="logoImage"/></a>
					</div>
					<div class="utilInside right"><a href="/events">Events</a> <a href="https://www.google.com/maps/dir//Louisiana+Running+Company,+4153+Canal+St,+New+Orleans,+LA+70119,+United+States/@29.975572,-90.101539,17z/data=!4m12!1m3!3m2!1s0x8620af62c1c29917:0xd11b0a2e637602a3!2sLouisiana+Running+Company!4m7!1m0!1m5!1m1!1s0x8620af62c1c29917:0xd11b0a2e637602a3!2m2!1d-90.101539!2d29.975572" target="_blank">Map</a> <a href="/staff">Staff</a></div>
				</div>
			</div>
		</div>

		<!-- large screen nav -->
		<div class="navContainer show-for-medium-up">
			<div class="row">
				<div class="small-12 columns">
					<ul class="mainNav">
						<li id="store"><a href="/store/">Store</a>
							<ul class="dropdown">
								<li><a href="/store/mens-shoes/" id="SHM0">Men's Shoes</a></li>
								<li><a href="/store/mens-apparel/" id="MAP0">Men's Apparel</a></li>
								<li><a href="/store/competition-shoes/" id="CMP0">Competition Shoes</a></li>
								<li><a href="/store/accessories/" id="ACC0">Accessories</a></li>
								<li><a href="/store/womens-shoes/" id="SHW0">Women's Shoes</a></li>
								<li><a href="/store/womens-apparel/" id="WAP0">Women's Apparel</a></li>
								<li><a href="/store/youth-shoes/" id="YSH0">Youth Shoes</a></li>
								<li><a href="/store/nutrition/" id="NUT0">Nutrition</a></li>
							</ul>
						</li><li id="contact"><a href="/video-gait-analysis/">Video Gait Analysis</a></li><li id="community"><a href="/news/">Recaps</a>
							<ul class="dropdown">
								<li id="run-groups"><a href="/category/rungroup/">Run Groups</a></li>
								<li id="community-coverage"><a href="/category/in-the-community/">Community Coverage</a></li>
							</ul></li><li id="about"><a href="/about/">About</a>
							<ul class="dropdown">
								<li id="contact"><a href="/contact-us/">Contact</a></li>
								<li id="video-gait"><a href="/video-gait-analysis/">Our Fit Process</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	
		<!-- small screen nav -->
		<div class="navContainer hide-for-medium-up mobile">
			<div class="row collapse">
				<div class="small-12 columns">
					<ul class="mainNav">
						<li id="store-m"><a href="/store/">Store</a></li><li id="contact-m"><a href="tel:+15043044762">Contact</a></li><li id="community-m"><a href="/news/">Community</a></li><li id="about-m"><a href="/about/">About</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content notcustom">
		<div id="lightboxPlayer" class="hidden">
			<div class="row">
				<div class="small-12 columns">
					<span class="linkLikeHover">&#215;</span>
				</div>
				<div class="small-12 columns">
					<div class="flex-box">
						
					</div>
				</div>
			</div>
		</div>
		
