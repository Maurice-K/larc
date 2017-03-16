<?php
/**
 * The template for displaying news page with the posts from a specific category on it
 *
 *
 * @package Friendship
 */
 
  function truncate ($string, $max = 50, $rep = '') {
    $leave = $max - strlen ($rep);
    return substr_replace($string, $rep, $leave);
}
 
 $wp_query->get_queried_object();
 
 $bodyClass = 'news';

get_header('custom'); 

$currCat = $wp_query->get_queried_object_id();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="articles">
				<div class="row">
					<div class="small-12 columns">
						<h1>News</h1>
					</div>
					<div class="small-12 columns categoriesContainer">
						<p>Categories: 
							<?php
								//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
								$orderby = 'name';
								$show_count = 0; // 1 for yes, 0 for no
								$pad_counts = 0; // 1 for yes, 0 for no
								$hierarchical = 1; // 1 for yes, 0 for no
								//$type = 'products';

								$args = array(
								  'orderby' => $orderby,
								  'show_count' => $show_count,
								  'pad_counts' => $pad_counts,
								  'hierarchical' => $hierarchical,
								  //'type' => $type
								);
								
								$categories = get_categories($args);
			
							foreach ($categories as $category) {
								$activeText = '';
								if ($category->term_id == $currCat) {
									$activeText = 'active';
								}
								echo '<a class="categoryButton '. $activeText .'" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a> ';
							}
							?>
						
						</p>
					</div>
				</div>
					<?php
					//get category passed and use it
					$categoryID = 5;
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args=array(
					  'post_status' => 'publish',
					  'category' => get_query_var('cat'),
					  'posts_per_page' => 10,
					  'caller_get_posts'=> 1,
					  'paged'=> $paged,
					  );

					/*$my_query = null;
					$my_query = new WP_Query($args);
					query_posts($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post();*/ 
					  
					$myposts = get_posts( $args );
					$totalPosts = count($myposts);
					$count = 1;
					foreach( $myposts as $post ) :	setup_postdata($post);
					  ?>
						<div class="row article">
							<div class="small-12 medium-6 columns">
								<div class="imageContainer">
									<?php echo '<a href="'. get_permalink() . '">'. get_the_post_thumbnail() .'</a>'; ?>
								</div>
							</div>
							<div class="small-12 medium-6 columns">
								<div class="descriptionContainer">
									<?php echo '<a href="'. get_permalink() . '"><h3>'. get_the_title() . '</h3></a>'; ?>
									<?php echo '<p>'. get_post_meta( get_the_ID(), 'news_intro', true ) . '</p>'; ?>
									<?php echo '<p><a href="'. get_permalink() . '" class="button radius">Read More &raquo;</a></p>'; ?>
								</div>
							</div>
						</div>
					<?php
					  //endwhile;
					$count++;
					endforeach;
					
					//} else {
						//echo '<div class="row article"><div class="small-12 columns"><p>There are no posts in this category right now.</p></div></div>';
					//}
					?>		
					<div class="row pagination">
						<div class="small-12 columns">
							<div class="left">
								<?php previous_posts_link(); ?>
							</div>
							<div class="right">
								<?php next_posts_link(); ?>
							</div>
						</div>
					</div>
					<?php
					//wp_reset_query();  // Restore global post data stomped by the_post().
					?>
			</section>
		
		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer('custom'); ?>
