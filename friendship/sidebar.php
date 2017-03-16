<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Friendship Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="row">
		<div class="small-12 columns">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</div><!-- #secondary -->
