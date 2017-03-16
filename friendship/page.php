<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Friendship Theme
 */

get_header('custom'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="general">
				<div class="row">
					<div class="small-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				

			<?php endwhile; // End of the loop. ?>
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer('custom'); ?>
