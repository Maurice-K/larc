<?php
/**
 * The template for displaying home paget
 *
 *
 * @package Friendship
 */
 $bodyClass = 'home';

get_header(); ?>
<?php
	$vidAnnouncement = get_field('embed_video');
	$vidTitle = get_field('embed_video_title');
	$announcementCTAtxt = get_field('announcement_cta_text');
	$announcementCTAurl = get_field('announcement_cta_url');
	if (!empty($vidAnnouncement)) {
?>
<section class="homevidcallout">
	<?php if (!empty($vidTitle)) { ?> 
		<div class="row">
			<div class="small-12 columns">
				<h2><?php echo $vidTitle; ?></h2>
			</div>
		</div>
	<?php } ?>
	<div class="row">
		<div class="small-12 large-11 large-centered columns">
			<div class="flex-video">
				<?php echo $vidAnnouncement; ?>
			</div>
		</div>
		<div class="small-12 columns text-center">
			<?php if (!empty($announcementCTAurl)) echo '<p><a href="' . $announcementCTAurl . '" class="button radius large">' . $announcementCTAtxt . '</a></p>'; ?>
			<a title="Scroll to Learn More" class="button radius smoothscroll large light" href="#hometop"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		</div>
	</div>
</section>
<?php } else { ?>
	<style>
		@media screen and (min-width: 70rem) {
			div#content {
			    padding-top: 16px;
			}
		}
	</style>
<?php } ?>
<section class="topBig">
	<div class="row fullwidth collapse topBigRow">
		<div class="small-12 columns topBigColumn">
			<div class="overlayingContainer">
				<div class="row">
					<div class="small-12 large-6 large-push-3 columns">
						<div class="overlayingInner">
							<a class="anchor" name="hometop"></a>
							<?php $toplogoimg = get_field('top_logo_image'); ?>
							<p><img src="<?php echo $toplogoimg['url']; ?>" class="logoHome" alt="<?php echo $toplogoimg['alt']; ?>"/></p>
							<h1><?php the_field('top_title'); ?></h1>
							<h3><?php the_field('top_subhead'); ?></h3>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
							<?php 
								$ctabuttonurl = get_field('top_button_cta_url');
								$ctabuttonurl2 = get_field('top_button_cta_url_2');
								$ctabuttontxt = get_field('top_button_cta_text');
								$ctabuttontxt2 = get_field('top_button_cta_text_2');
								if (!empty($ctabuttonurl)) {
							?>
								<p><a href="<?php echo $ctabuttonurl; ?>" id="home-top-cta" class="button radius"><?php echo $ctabuttontxt; ?></a> <a href="<?php echo $ctabuttonurl2; ?>" id="home-top-cta-2" class="button light radius"><?php echo $ctabuttontxt2; ?></a></p>
							
							<?php } ?>
						</div>
					</div>
					<div class="small-12 large-3 large-pull-6 columns">
						<div class="overlayingInner margin-bottom semitrans">
							<div class="ontop">
								<h3><a href="/store/mens-shoes/">Men's Shoes</a></h3>
								<a href="/store/mens-shoes/" class="imgLink"><img src="/wp-content/uploads/2016/05/mensShoes.jpg"/></a>
							</div>
						</div>
						<div class="overlayingInner semitrans">
							<div class="ontop">
								<h3><a href="/store/womens-shoes/">Women's Shoes</a></h3>
								<a href="/store/womens-shoes/" class="imgLink"><img src="/wp-content/uploads/2016/05/womensShoes.jpg"/></a>
							</div>
						</div>
					</div>
					<div class="small-12 large-3 columns">
						<div class="overlayingInner margin-bottom semitrans">
							<div class="ontop">
								<h3><a href="/store/sale/">Sale Items</a></h3>
								<a href="/store/sale/" class="imgLink"><img src="/wp-content/uploads/2016/05/mensApparel.jpg"/></a>
							</div>
						</div>
						<div class="overlayingInner semitrans">
							<div class="ontop">
								<h3><a href="/store/apparel/">Apparel</a></h3>
								<a href="/store/apparel/" class="imgLink"><img src="/wp-content/uploads/2016/05/womensApparel.jpg"/></a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="videoBgContainer">
				<div class="show-for-medium-up">
					<?php
						$bgvid = get_field('background_video');
						$bgvidimg = get_field('background_video_placeholder');
						if (!empty($bgvid)) {
					?>
						<video autoplay muted loop>
							<source src="<?php echo $bgvid['url']; ?>" type="video/mp4"/>
							<img src="<?php echo $bgvidimg['url']; ?>" alt="<?php echo $bgvidimg['alt']; ?>"/>
						</video>
					<?php
						} else {
					?>
						<img src="<?php echo $bgvidimg['url']; ?>" alt="<?php echo $bgvidimg['alt']; ?>"/>
					<?php
						}
					?>
				</div>
				<div class="hide-for-medium-up">
					<img src="<?php echo $bgvidimg['url']; ?>" alt="<?php echo $bgvidimg['alt']; ?>"/>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	$giftCardOnOff = get_field('gift_card_callout_on_off');
	$giftCardTitle = get_field('gift_card_callout_title');
	$giftCardDesc = get_field('gift_card_callout_description');
	$giftCardImg = get_field('gift_card_callout_image');
	$giftCardLink = get_field('gift_card_callout_link');
	$giftCardLinkText = get_field('gift_card_callout_link_text');
	if ($giftCardOnOff) {
?>
	<!-- gift card callout -->
	<section class="featured giftcard">
			<div class="row fuller margin-bottom">
				<div class="small-12 columns">
					<h2><?php echo $giftCardTitle; ?></h2>
				</div>
				<div class="small-12 medium-5 large-3 columns">
					<a href="<?php echo $giftCardLink; ?>" title="<?php echo $giftCardImg['title']; ?>"><img src="<?php echo $giftCardImg['url']; ?>" alt="<?php echo $giftCardImg['alt']; ?>"/></a>
				</div>
				<div class="small-12 medium-7 large-9 columns">
					<p><?php echo $giftCardDesc; ?></p>
					<p><a href="<?php echo $giftCardLink; ?>" class="button radius"><?php echo $giftCardLinkText; ?></a></p>
				</div>
			</div>

	</section>
<?php
	}
?>

<!-- home page promos -->
<?php
	$promosOnOff = get_field('promos_on_off');
	$promosTitle = get_field('promos_title');
	$promosDesc = get_field('promos_description');
	if ($promosOnOff) {
?>
	<section class="featured promos">
		<div class="row fuller margin-bottom">
			<div class="small-12 columns">
				<?php if ($promosTitle) { ?>
					<h2><?php echo $promosTitle; ?></h2>
				<?php } ?>
				<?php if ($promosDesc) { ?>
					<p><?php echo $promosDesc; ?></p>
				<?php } ?>
			</div>
			<?php
			$args=array(
			  'post_status' => 'publish',
			  'post_type' => 'home_promos',
			  'posts_per_page' => -1,
			  'caller_get_posts'=> 1
			  );
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			  while ($my_query->have_posts()) : $my_query->the_post(); 
			  	$buttonURL = get_field('button_url');
			  	$buttonText = get_field('button_text');
			  	$imageThumb = get_the_post_thumbnail();
			  ?>
			  	<div class="small-12 medium-6 large-4 columns">
			  		<div class="row">
						<div class="small-12 columns">
							<h3><?php echo get_the_title(); ?></h3>
						</div>
						<div class="small-12 columns">
							<a href="<?php echo $buttonURL; ?>" title="<?php echo $buttonText; ?>"><?php echo $imageThumb; ?></a>
						</div>
						<div class="small-12 columns">
							<p><?php echo the_content(); ?></p>
							<p><a href="<?php echo $buttonURL; ?>" class="button radius"><?php echo $buttonText; ?></a></p>
						</div>
					</div>
				</div>
			<?php
			  endwhile;
			}
			wp_reset_query();  // Restore global post data stomped by the_post().
		
			?>
			

		</div>
	</section>
<?php
	}
?>

<?php
	$storeItemsOnOff = get_field('store_section_on_off');
	if ($storeItemsOnOff) {
?>
<!-- home page store items callout -->
<section class="featured store">
	

	<?php 
		$limit = 8;
		$api_url = get_field( 'shopify_app_api_url' );
		$api_url = rtrim($api_url, '/');
		$shop_url = get_field( 'shopify_site_url' );
		$shop_url = rtrim($shop_url, '/');
		$collection_id = get_field( 'collection_id' );
		$collects_url = $api_url . '/admin/collects.json?collection_id=' . $collection_id . '&published_status=published&limit=' . $limit;

		// Use a transient for the feed URL (performance boost)
		if ( false === ( $collects_content = get_transient( 'shopify_product_feed' ) ) ) {
			$collects_content = @file_get_contents( $collects_url );

			// Put the results in a transient. Expire after 2 hours.
			set_transient( 'shopify_product_feed', $collects_content, 2 * HOUR_IN_SECONDS );
		}

		// Decode the JSON in the file
		$collects = json_decode( $collects_content, true );

		// Reset variant inventory count
		$variant_inventory = 0;
	?>
	<div class="row fuller">
		<div class="small-12 columns">
			<h2><a href="<?php the_field('store_section_button_url');?>" title="<?php the_field('store_section_button_text');?>"><?php the_field('store_section_title');?></a></h2>
			<p><?php the_field('store_section_description');?></p>
		</div>
		<?php
			// Loop through products in the collection
			for ( $prod = 0; $prod < $limit; $prod++ ) {
				$product_id = $collects['collects'][$prod]['product_id'];
				// Get the product data from the API (using the ID)
				$product_url = $api_url . '/admin/products/' . $product_id . '.json?fields=images,title,variants,handle';

				// Decode the JSON for the product data
				$product_json = json_decode( @file_get_contents( $product_url ), true );

				// Set some variables for product data
				$current_product = $product_json['product'];
				$product_handle = $current_product['handle'];
				$product_title = $current_product['title'];

				// Get the product image and modify the file name to get the large size thumbnail
				$image_src_parts = pathinfo( $current_product['images'][0]['src'] );
				$product_image_src = $image_src_parts['dirname'] . '/' . $image_src_parts['filename'] . '_large.' . $image_src_parts['extension'];

				//secondary product image to show on hoverino brother
				$alt_image_src_parts = pathinfo( $current_product['images'][1]['src'] );
				$alt_product_image_src = $alt_image_src_parts['dirname'] . '/' . $alt_image_src_parts['filename'] . '_large.' . $alt_image_src_parts['extension'];
				
				if (empty($image_src_parts['filename'])) {
					$product_image_src = '/wp-content/uploads/2016/10/LRWC_Logo_Circle_Orange.png';
					//$alt_product_image_src = '/wp-content/uploads/2016/10/LRWC_Logo_Circle-square.png';
				}

				// Get product variant information, including inventory and pricing
				$variants = $current_product['variants'];
				$variant_count = count( $variants );

				$variant_price = 0;
				$variant_prices = array();
				if ( $variant_count > 1 ) :
					for ( $v = 0; $v < $variant_count; $v++ ) {
						$variant_inventory += $variants[$v]['inventory_quantity'];
						$variant_prices[] = $variants[$v]['price'];
					}
					$price_min = min( $variant_prices );
					$price_max = max( $variant_prices );
				else :
					$variant_price = $variants[0]['price'];
					$variant_inventory = $variants[0]['inventory_quantity'];
				endif;
			?>
				<div class="product-feed-item small-12 medium-4 large-3 columns margin-bottom">
					<a href="<?php echo $shop_url; ?>/products/<?php echo $product_handle; ?>" title="<?php echo $product_title; ?>">
						<div class="image-container" style="background-image:url(<?php echo $alt_product_image_src; ?>);">
							<img src="<?php echo $product_image_src; ?>" alt="<?php echo $product_title; ?>"/>
						</div>
						<h5><?php echo $product_title; ?></h5>
						<?php if ( $variant_inventory > 0 ) : ?>
							<?php if ( $variant_price > 0 ) : ?>
								<span class="price small"><?php if ( $variant_price > 0 ) : ?>$<?php echo $variant_price; ?><?php else : ?>FREE<?php endif; ?></span>
							<?php elseif ( ( $price_min > 0 ) && ( $price_max > 0 ) ) : ?>
								<span class="price small">
									<?php 
										if ($price_min !== $price_max)
											echo '<span class="from">From:</span> $' . $price_min;
										else
											echo '$' . $price_min;
									?>
								</span>
							<?php endif; ?>
						<?php else : ?>
							<span class="sold-out">OUT OF STOCK</span>
						<?php endif; ?>
					</a>
				</div>
		<?php	
			} //end product loop
		?>
		<div class="small-12 columns">
			<p class=""><a class="button radius" href="<?php the_field('store_section_button_url');?>" title="<?php the_field('store_section_button_text');?>"><?php the_field('store_section_button_text');?></a></p>
		</div>
	</div>

</section>
<?php
	}
?>

<section class="articles">
	<div class="row fullwidth">
		<div class="small-12 columns">
			<h2><a href="/category/in-the-community/">In the Community</a></h2>
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
					<?php 
						$imageThumb = get_the_post_thumbnail();
						if (empty($imageThumb))
							$imageThumb = '<img src="/wp-content/uploads/2016/09/logo-post-placeholder.png" alt="Louisiana Running Company"/>';
						echo '<a href="'. get_permalink() . '" class="imgLink" title="'. get_the_title() . '">'. $imageThumb .'</a>';  
						echo '<h5 class="medOverlay"><a href="'. get_permalink() . '">'. get_the_title() . '</a></h5>'; 
					?>
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
			<p><a class="button radius" href="/category/in-the-community/">View All &raquo;</a></p>
		</div>
	</div>
</section>

<section class="runGroups">
	<div class="row fullwidth">
		<div class="small-12 columns">
			<h2><a href="/category/rungroup/">Run Groups &amp; Store News</a></h2>
			<p><em>Run groups meet every Monday &amp; Wednesday 6:30pm rain or shine!</em></p>
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
					<?php 
						$imageThumb = get_the_post_thumbnail();
						if (empty($imageThumb))
							$imageThumb = '<img src="/wp-content/uploads/2016/09/logo-post-placeholder.png" alt="Louisiana Running Company"/>';
						echo '<a href="'. get_permalink() . '" class="imgLink" title="'. get_the_title() . '">'. $imageThumb .'</a>';  
						echo '<h5 class="medOverlay"><a href="'. get_permalink() . '">'. get_the_title() . '</a></h5>'; 
					?>
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
			<p><a class="button radius" href="/category/rungroup/">View All Articles &raquo;</a></p>
		</div>
	</div>
</section>

<?php get_footer(); ?>