<?php
/**
 * Template part for displaying single locations.
 *
 * @package Friendship Theme
 */
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
	$openingSoon = get_field('opening_soon');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php if($openingSoon) echo '<span class="error red small">*Opening Soon</span>'; ?>
	</header><!-- .entry-header -->

	<div class="entry-content row fullwidth">
		<?php 
			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			
			if (has_post_thumbnail()) { ?>
			<div class="small-12 medium-6 columns">
				<?php echo get_the_post_thumbnail(); ?>
			</div>
			<div class="small-12 medium-6 columns">
				<address>
				<p><?php echo $address1; if (!empty($address2)) echo ', ' . $address2; ?>
				<?php echo get_field('city') . ', ' . get_field('state') . ' ' . get_field('zip'); ?>
				<br/>
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
					<p><a class="button radius" href="<?php $directionsLink; ?>" target="_blank" title="Get Directions to LRC <?php the_title(); ?>">Get Directions</a></p>
				<?php } ?>
			</div>
			<div class="small-12 medium-6 large-4 columns">
				<?php the_content(); ?>
			</div>
			<?php if (!empty($lat) && !empty($lng)) { ?>
				<div class="small-12 medium-6 large-8 columns">
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
		<?php } else { ?>
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
			<div class="small-12 medium-6 large-4 columns">
				<p><?php echo $address1; if (!empty($address2)) echo ', ' . $address2; ?>
				<?php echo get_field('city') . ', ' . get_field('state') . ' ' . get_field('zip'); ?>
				<br/>
				<?php if (!empty($phoneNum)) { ?>
					<span class="show-for-medium-up"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></span>
					<span class="hide-for-medium-up"><a href="tel:+1<?php echo $telNum; ?>"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></a></span>
				<?php } ?>
				</p>
				<h5>Hours</h5>
				<p>
					<strong>Mon-Fri</strong> <?php the_field('hours_m-f'); ?><br/>
					<strong>Sat</strong> <?php the_field('hours_saturday'); ?><br/>
					<strong>Sun</strong> <?php the_field('hours_sunday'); ?>
				</p>
				
				<?php
					if (!empty($directionsLink)) {
				?>
					<p><a class="button radius" href="<?php $directionsLink; ?>" target="_blank" title="Get Directions to LRC <?php the_title(); ?>">Get Directions</a></p>
				<?php } ?>
			</div>
			<?php if (!empty($lat) && !empty($lng)) { ?>
				<div class="small-12 medium-6 large-8 columns">
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
		<?php } ?>
		<div class="small-12 columns">
			<div class="row lightgallery">
				<?php $attachments = new Attachments( 'attachments' ); ?>
				<?php if( $attachments->exist() ) : ?>
				<h3>More Photos</h3>
				<?php while( $attachments->get() ) : ?>
				  <div class="small-6 medium-4 large-3 columns" style="float: left;">
					<a class="lightbox" href="<?php echo $attachments->src( 'full' ); ?>">
						<?php echo $attachments->image( 'thumbnail' ); ?>
						<span class="title"><?php echo $attachments->field( 'title' ); ?></span>
						<span class="caption"><?php echo $attachments->field( 'caption' ); ?></span>
					</a>
				  </div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //friendship_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

