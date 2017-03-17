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
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Sanchez" rel="stylesheet"> 
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

	<header id="masthead" class="site-header" role="banner">
		<!-- utility nav -->
		<div class="utilContainer">
			<div class="row almostFull collapse">
				<div class="small-12 columns">
					<!-- <div class="utilInside left"><a href="/events/">Events</a> <a href="/locations/">Locations</a> <a href="/about/">About Us</a></div> -->
					<?php
						$argsutil = array(
									'theme_location' => 'utility',
									'menu_class' => 'utilInside left'
								);
						wp_nav_menu($argsutil);
					?>
				</div>
			</div>
		</div>
		<!-- header nav -->
		<div class="navContainer">
			<div class="row almostFull collapse">
				<div class="small-9 medium-4 large-2 columns logodiv">
					<a href="/" title="<?php echo get_bloginfo('name'); ?>"><img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" class="logoImage" /></a>
				</div>
				<div class="small-3 medium-8 columns naviconColumn">
					<div class="navicon-container text-right">
						<a class="navicon-button x" aria-label="menu" title="menu">
							<div class="navicon"></div>
						</a>
					</div>
				</div>
				<div class="small-12 medium-8 large-10 columns navdiv">
					<?php
						$args2 = array(
									'theme_location' => 'primary',
									'menu_class' => 'mainNav'
								);
						wp_nav_menu($args2);
					?>
					<?php
						$argsutilm = array(
									'theme_location' => 'utility',
									'menu_class' => 'util-mobile'
								);
						wp_nav_menu($argsutilm);
					?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
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
		
