<?php
/**
 * The template for displaying all single posts.
 *
 * @package Friendship Theme
 */

get_header('custom'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="general">
				<div class="row fullwidth">
					<div class="small-12 medium-9 columns">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'single' ); ?>

						<?php endwhile; // End of the loop. ?>
					</div>
					<!--- SIDEBAR --->
					<div class="small-12 medium-3 columns">
						<?php get_sidebar(); ?>
					</div>
					
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer('custom'); ?>
