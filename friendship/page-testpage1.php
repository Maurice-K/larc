<?php
/**
 * The template for displaying news page with the posts all on it
 *
 *
 * @package Friendship
 */
 
 $bodyClass = 'store';

get_header(); ?>
<style>
.row.smaller, .row.collapse.smaller, .row .row.smaller, .row .row.collapse.smaller {
	max-width: 850px;
	margin: 0 auto;
}
.row.fullwidth {
	max-width: 100%;
}

header#masthead.nocustom {
	height: auto;
	background-color: transparent;
}
header#masthead.nocustom.scrolled {
	background-color: rgba(250,250,250,0.5);
}
div#content.notcustom {
	padding-top: 0;
}

section.topBig .row.fullwidth.topBigRow .topBigColumn {
	position: relative;
}
.videoBgContainer {
	z-index: 0;
	width: 100%;
	height: auto;
	max-height: 99vh;
	overflow: hidden;
}
.videoBgContainer video {
	width: 100%;
	height: auto;
}
.overlayingContainer {
	z-index: 1;
	width: 100%;
	position: absolute;
	top: 15%;
	left: 0;
}
.overlayingContainer .row {
	text-align: center;
}
.overlayingInner {
	display: inline-block;
	background-color: rgba(211,221,235,0.6);
	padding: 1rem;
}
img.logoHome {
	max-width: 250px;
}
.overlayingInner h1 {
	font-weight: bold;
	text-transform: uppercase;
}
.overlayingInner h3 {
	color: #fff;
}
.overlayingInner p {
	color: #000;
}
.featured-med {
	position: relative;
}
.featured-med .medOverlay {
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	text-align: center;
	padding: 6px;
	letter-spacing: 0.07rem;
	background-color: rgba(35,88,156,0.5);
	transition: all 0.5s;
}
.featured-med:hover .medOverlay {
	text-shadow: none;
	background-color: rgba(247,143,31,0.5);
}
.featured-med .medOverlay h5 {
	color: #fff;
}
section.callouts {
	background-color: #23589C;
}
</style>
<section class="topBig">
	<div class="row fullwidth collapse topBigRow">
		<div class="small-12 columns topBigColumn">
			<div class="overlayingContainer">
				<div class="row">
					<div class="small-12 medium-8 large-5 medium-centered columns">
						<div class="overlayingInner">
							<p><img src="/wp-content/uploads/2016/05/logo.png" class="logoHome" /></p>
							<h1>Welcome to Louisiana Running Company</h1>
							<h3>Home of New Orleans' <em>Original</em> Video Gait Analysis</h3>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="videoBgContainer">
				<video autoplay muted loop>
					<source src="/wp-content/uploads/2016/07/home-bg-vid-rev5.mp4" type="video/mp4"/>
				</video>
			</div>
		</div>
	</div>
</section>



<section class="runGroups">
	<div class="row fullwidth">
		<div class="small-12 columns">
			<h2>Run Groups & Store News</h2>
			<p><em>Run groups meet every Monday & Wednesday 6:30pm rain or shine!</em></p>
		</div>
	</div>
	<div class="row fullwidth collapse">
		<?php
		$categoryName = 'run-groups';
		$categoryID = 66;
		$args=array(
		  'post_status' => 'publish',
		  'cat' => $categoryID,
		  'posts_per_page' => 4,
		  'caller_get_posts'=> 1
		  );

		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="small-12 medium-6 large-3 columns">
				<div class="featured-med">
					<?php echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; ?>
					<div class="medOverlay">
						<?php echo '<a href="'. get_permalink() . '"><h5>'. get_the_title() . '</h5></a>'; ?>
						<?php //echo '<p><a href="'. get_permalink() . '">Read More</a></p>'; ?>
					</div>
				</div>
			</div>
		<?php
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
	
		?>
	</div>
	<div class="row fullwidth">
		<div class="small-12 columns text-right">
			<p><a class="button radius" href="http://www.louisianarunning.com/category/rungroup/">View All Articles &raquo;</a></p>
		</div>
	</div>
</section>

<section class="articles">
	<div class="row fullwidth">
		<div class="small-12 columns">
			<h2>In the Community</h2>
			<p><em>Race coverage and recaps</em></p>
		</div>
	</div>
	<div class="row fullwidth collapse">
		<?php
		$categoryName = 'community';
		$categoryID = 563;
		$args=array(
		  'post_status' => 'publish',
		  'cat' => $categoryID,
		  'posts_per_page' => 4,
		  'caller_get_posts'=> 1
		  );

		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="small-12 medium-6 large-3 columns">
				<div class="featured-med">
					<?php echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; ?>
					<div class="medOverlay">
						<?php echo '<a href="'. get_permalink() . '"><h5>'. get_the_title() . '</h5></a>'; ?>
						<?php //echo '<p><a href="'. get_permalink() . '">Read More</a></p>'; ?>
					</div>
				</div>
			</div>
		<?php
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
	
		?>
	</div>
	<div class="row fullwidth">
		<div class="small-12 columns text-right">
			<p><a class="button radius" href="http://www.louisianarunning.com/category/in-the-community/">View All &raquo;</a></p>
		</div>
	</div>
</section>

<section class="callouts">
	<div class="row fullwidth collapse">
		<div class="small-12 medium-6 large-5 medium-centered columns">
			<div class="">
				<h3>Instagram</h3>
			</div>
			<div class="slickContainer">
			<?php
			$type = 'featured';
			$args=array(
			  'post_type' => $type,
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			  'caller_get_posts'=> 1
			  );

			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			  while ($my_query->have_posts()) : $my_query->the_post(); ?>
				
				<div class="slickSlide">
					<a href="<?php echo get_post_meta( get_the_ID(), 'hyperlink', true ); ?>">
					<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php
			  endwhile;
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
		
			?>
			</div>
		</div>
	</div>
</section>
<?php get_footer('custom'); ?>