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
							<!-- <?php get_template_part( 'template-parts/content', 'single' ); ?> -->
<div class="main-content column row">
  <div class="header">
    <div class="small-12 medium-9 large-9 columns end">
      <h1>John Curtis Annual Invitational Race</h1>
    </div>
  </div>
  <div class="featured-article small-12 medium-9 columns">
    <img src="http://placehold.it/800x250">
  </div>
  <div class="inline-articles small-12 medium-9 columns">
    <ul class="menu">
      <li><a href="#">Link 1</a></li>
      <li><a href="#">Link 2</a></li>
      <li><a href="#">Link 3</a></li>
      <li><a href="#">Link 4</a></li>
      <li><a href="#">Link 5</a></li>
    </ul>
  </div>
  <div class="other-media">
    <div class="small-12 medium-4 large-4 columns">
      text
    </div>
    <div class="small-12 medium-4 large-4 medium-offset-1 large-offset-1 columns end">
      text
    </div>
  </div>
  <div class="headlines small-12 medium-9 large-9 columns">
    <h5>More Headlines</h5>
    <ul>
      <li><img src="http://placehold.it/100x100" alt="" />{{Description}}</li>
      <li><img src="http://placehold.it/100x100" alt="" />{{Description}}</li>
      <li><img src="http://placehold.it/100x100" alt="" />{{Description}}</li>
      <li><img src="http://placehold.it/100x100" alt="" />{{Description}}</li>
    </ul>
  </div>
</div>





						<?php endwhile; // End of the loop. ?>
					</div>
					<div class="small-12 medium-3 columns">
						<?php get_sidebar(); ?>
					</div>
					
				</div>
			</section>
		</main><!-- #main 
	</div><!-- #primary -->


<?php get_footer('custom'); ?>
