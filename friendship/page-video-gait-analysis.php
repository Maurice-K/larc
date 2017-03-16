<?php
/**
 * The template for displaying news page with the posts all on it
 *
 *
 * @package Friendship
 */
 
 $bodyClass = 'store';

get_header(); ?>
<section class="topBig">
	<div class="row fullwidth collapse topBigRow">
		<div class="small-12 columns topBigColumn">
			<div class="overlayingContainer">
				<div class="row">
					<div class="small-12 medium-8 large-7 medium-centered columns">
						<div class="overlayingInner">
							<h1><?php echo get_the_title();?></h1>
							<?php $introText = get_post_meta( get_the_ID(), 'intro', true ); 
							if (!empty($introText)) echo '<p class="large">' . $introText . '</p>';
							?>
							<p class="padup"><a title="Scroll to Learn More" class="button radius smoothscroll large light" href="#custom-fit-process">Learn More<br/><i class="fa fa-chevron-down" aria-hidden="true"></i></a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="videoBgContainer">
				<div class="show-for-medium-up">
					<video autoplay muted loop>
						<source src="/wp-content/uploads/2016/07/video-gait-analysis.mp4" type="video/mp4"/>
						<img src="/wp-content/uploads/2016/07/video-gait-still.jpg" alt="L.R.C. Video Gait Analysis"/>
					</video>
				</div>
				<div class="hide-for-medium-up">
					<img src="/wp-content/uploads/2016/07/video-gait-still.jpg" alt="L.R.C. Video Gait Analysis"/>
				</div>
			</div>
		</div>
	</div>
</section>
<a name="custom-fit-process" class="anchor-sike"></a>
<section class="dark">
	<div class="row">
		<div class="small-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
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
					<?php //echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; 
						$imageThumb = get_the_post_thumbnail();
						if (empty($imageThumb))
							$imageThumb = '<img src="/wp-content/uploads/2016/09/logo-post-placeholder.png" alt="Louisiana Running Company"/>';
						echo '<a href="'. get_permalink() . '">'. $imageThumb .'</a>'; 
					?>
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
		<div class="small-12 columns">
			<div class="spacer clearfix"></div>
		</div>
		<div class="small-12 columns text-right">
			<p><a class="button radius" href="http://www.louisianarunning.com/category/rungroup/">View All Articles &raquo;</a></p>
		</div>
	</div>
</section>


<?php get_footer('custom'); ?>