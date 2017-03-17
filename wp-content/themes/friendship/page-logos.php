<?php

/**

 * The template for displaying staff page 
 *
 *

 * @package Friendship

 */

 

 $bodyClass = 'home';



get_header('custom'); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<section class="articles">

				<div class="row">

					<div class="small-12 columns">

						<h1>Brands Carried</h1>

					</div>

				</div>
				<div class="row">
					<?php

					//get category passed and use it

					$type = 'logos';

					$args=array(

					  'post_type' => $type,
					  'orderby' => 'menu_order',

					  'post_status' => 'publish',

					  'posts_per_page' => -1,

					  'caller_get_posts'=> 1

					  );



					$my_query = null;

					$my_query = new WP_Query($args);

					if( $my_query->have_posts() ) {

					  while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<div class="small-6 medium-4 large-3 columns" style="margin-bottom: 1rem;">
								<div class="imageContainer" style="padding: 1rem;">
									<?php //echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; ?>
									<?php echo get_the_post_thumbnail(); ?>
								</div>
							</div>
					<?php

					  endwhile;

					}

					wp_reset_query();  // Restore global post data stomped by the_post().

				

					?>
				</div>
			</section>

		

		</main><!-- #main -->

	</div><!-- #primary -->



	

<?php get_footer('custom'); ?>

