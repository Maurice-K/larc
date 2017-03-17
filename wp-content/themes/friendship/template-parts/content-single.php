<?php
/**
 * Template part for displaying single posts.
 *
 * @package Friendship Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php //friendship_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content row fullwidth">
		<?php 
			$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			
			if (has_post_thumbnail() && strpos($url,'staff') !== false) { ?>
			<div class="small-12 medium-4 large-3 columns">
				<?php echo get_the_post_thumbnail(); ?>
			</div>
			<div class="small-12 medium-8 large-9 columns">
				<?php the_content(); ?>
			</div>
		<?php } else { ?>
			<div class="small-12 columns">
				<?php the_content(); ?>
			</div>
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

