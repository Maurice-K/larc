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
						<h1>Staff</h1>
					</div>
					<div class="small-12 columns">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>

					<?php

					//get category passed and use it

					$type = 'staff';

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
						<div class="row article">

							<div class="small-12 medium-4 large-3 columns">

								<div class="imageContainer">

									<?php echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; ?>

								</div>

							</div>

							<div class="small-12 medium-8 large-9 columns">

								<div class="descriptionContainer">

									<?php echo '<a href="'. get_permalink() . '"><h3>'. get_the_title() . '</h3></a>'; ?>

									<?php echo '<p>'. get_post_meta( get_the_ID(), 'staff_title', true ) . '</p>'; ?>
									<?php //echo '<p>'. get_post_meta( get_the_ID(), 'staff_intro', true ) . '</p>'; ?>
									<?php echo '<a href="'. get_permalink() . '" class="button radius">Read bio</a>'; ?>
								</div>

							</div>

						</div>

					<?php

					  endwhile;

					}

					wp_reset_query();  // Restore global post data stomped by the_post().

				

					?>

			</section>

		

		</main><!-- #main -->

	</div><!-- #primary -->



	

<?php get_footer('custom'); ?>

