<?php
/**
 * The template for displaying locations page
 *
 * @package Friendship
 */
 $bodyClass = 'locations';

get_header('new'); ?>
<section class="topsection">
	<div class="row almostFull">
		<div class="small-12 columns">
			<h1><?php echo get_the_title();?></h1>
		</div>
		<div class="small-12 columns">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<section class="items">
	<?php
	$type = 'location';
	$args=array(
	  'post_status' => 'publish',
	  'post_type' => $type,
	  'posts_per_page' => -1,
	  'caller_get_posts'=> 1
	  );

	$my_query = null;
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
	  while ($my_query->have_posts()) : $my_query->the_post(); 
		$address1 = get_field('address_1');
		$address2 = get_field('address_2');
		$phoneNum = get_field('phone_number');
		if (!empty($phoneNum)) {
			$parsePhone = explode('-',$phoneNum);
			$areaCode = '(' . $parsePhone[0] . ')';
			$telNum = str_replace('-','',$phoneNum);
		}
		$directionsLink = get_field('directions_link');
		$city = get_field('city');
		$state = get_field('state');
		$zip = get_field('zip');
		$lat = get_field('lat');
		$lng = get_field('lng');
	  ?>
		<div class="row almostFull border-bottom location">
			<?php if (!empty($lat) && !empty($lng)) { ?>
			<div class="small-12 medium-6 columns">
				<div class="hide-for-large-up">
					<?php
						if (!empty($directionsLink)) {
					?>
						<a class="" href="<?php $directionsLink; ?>" target="_blank" title="Get Directions to LRC <?php the_title(); ?>">
					<?php } ?>
						<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo str_replace(' ', '+', $city); ?><?php echo str_replace(' ', '+', $address1) . ','; if (!empty($address2)) echo ',' . $address2; ?><?php echo $state;?>,<?php echo $zip;?>&zoom=16&size=600x300&maptype=roadmap
	&markers=color:blue%7Clabel:S%7C<?php echo $lat; ?>,<?php echo $lng; ?>
	&key=AIzaSyAWmwCE8IcWE5RD69fHdreE3m6vn-sbQzM" alt="Map for Louisiana Running and Walking Company <?php echo get_the_title(); ?>"/>
					<?php if (!empty($directionsLink)) { ?>
						</a>
					<?php } ?>
				</div>
				<div class="show-for-large-up flex-video">
					<iframe
					  width="600"
					  height="450"
					  frameborder="0" style="border:0"
					  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBMShAOumBBcRzmrH3Y4Ymcj96K-AFwoII
						&q=<?php echo str_replace(' ', '+', $city); ?><?php echo str_replace(' ', '+', $address1) . ','; if (!empty($address2)) echo ',' . $address2; ?><?php echo $state;?>,<?php echo $zip;?>" allowfullscreen>
					</iframe>
				</div>
			</div>
			<?php } ?>
			<div class="small-12 <?php if (!empty($lat) && !empty($lng)) { ?>medium-6 <?php } ?>columns">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				<address>
				<p><?php echo $address1; if (!empty($address2)) echo ', ' . $address2; ?>
				<?php echo get_field('city') . ', ' . get_field('state') . ' ' . get_field('zip'); ?>
				<br/>
				<?php $openingSoon = get_field('opening_soon'); ?>
				<?php if ($openingSoon) echo 'Opening Soon!'; ?>
				<?php if (!empty($phoneNum)) { ?>
					<span class="show-for-medium-up"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></span>
					<span class="hide-for-medium-up"><a href="tel:+1<?php echo $telNum; ?>"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></a></span>
				<?php } ?>
				</p>
				</address>
				<h5>Hours</h5>
				<p>
					<strong>Mon-Fri</strong> <?php the_field('hours_m-f'); ?><br/>
					<strong>Sat</strong> <?php the_field('hours_saturday'); ?><br/>
					<strong>Sun</strong> <?php the_field('hours_sunday'); ?>
				</p>
				
				<?php
					if (!empty($directionsLink)) {
				?>
					<p><a class="button radius light margin-right" href="<?php echo get_permalink(); ?>">Learn More</a> <a class="button radius" href="<?php $directionsLink; ?>" target="_blank" title="Get Directions to LRC <?php the_title(); ?>">Get Directions</a></p>
				<?php } else { ?>
					<p><a class="button radius light" href="<?php echo get_permalink(); ?>">Learn More</a></p>
				<?php } ?>
			</div>
		</div>
	<?php
	  endwhile;
	}
	wp_reset_query();  

	?>
</section>

<?php get_footer('new'); ?>