<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Friendship
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<section class="footer-top">
			<div class="row almostFull links padbottom">
				<div class="small-12 medium-6 large-3 columns">
					<h4>Stay Updated</h4>
					<p class="subheading">We'll always tell you FIRST about new gear and offers.</p>
					<form id="email_signup" class=" klaviyo_bare_embed_u9bhZb" action="//manage.kmail-lists.com/subscriptions/subscribe" data-ajax-submit="//manage.kmail-lists.com/ajax/subscriptions/subscribe" method="GET" target="_blank" novalidate="novalidate">
					  <input type="hidden" name="g" value="u9bhZb">
					  <div class="klaviyo_field_group input-wrapper">
					    <label for="k_id_email" style="display:none;">Newsletter Sign Up</label>
					    <input type="email" value="" name="email" id="k_id_email" placeholder="Fill in your email" />
					  </div>
					  <div class="klaviyo_messages">
					    <div class="success_message" style="display:none;"></div>
					    <div class="error_message" style="display:none;"></div>
					    </div>
					  <div class="klaviyo_form_actions button-wrapper">
					    <button type="submit" class="klaviyo_submit_button">GO</button>
					  </div>
					</form>

					<style>
						footer.site-footer form {
							display: table;
							max-width:420px;
							margin: 0 auto;
							border-collapse: collapse;
							height: 44px;
						}
						footer.site-footer input {
							border: 2px solid #fff;
							padding: 8px 8px;
							font-size: 12px;
							font-weight: 600;
							color: #fff;
							background-color: transparent;
							height: 44px;
							margin: 0;
						}
						form .input-wrapper {
							margin: 0;
							display: table-cell;
						}
						form .button-wrapper {
						    display: table-cell;
						    width: 1%;
						    vertical-align: middle;
						}
						.button-wrapper button {
							padding: 10px;
							background-color: #fff;
							border: 2px solid #fff;
							color: #0864af;
							font-size: 11px;
							text-transform: uppercase;
							font-family: "Sanchez",serif;
							border: 0;
							display: inline-block;
							margin-left: 6px;
							height: 44px;
							word-break: normal;
							-webkit-hyphens: none;
							-moz-hyphens: none;
							hyphens: none;
						}
						footer p.subheading {
							color: #cde0ef;
							font-size: .875rem;
							margin-bottom: .5rem;
						}
						footer p.subheading a {
							color: #fff;
						}
						footer p.subheading a:hover {
							opacity: .8;
						}
						ul.footer-nav {
							margin: 0;
							list-style:none;
						}
						ul.footer-nav li {

						}
						ul.footer-nav li a {
							color: #fff;
							font-size: .875rem;
						}
						ul.footer-nav li a:hover {
							opacity: .8;
						}
					</style>

					<script type="text/javascript" src="//www.klaviyo.com/media/js/public/klaviyo_subscribe.js"></script>
					<script type="text/javascript">
					  KlaviyoSubscribe.attachToForms('#email_signup', {
					    hide_form_on_success: true
					  });
					</script>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4>About LRC</h4>
					<p class="subheading">Get to know our vibe.</p>
					<?php
						$args1 = array(
									'theme_location' => 'footer_one',
									'menu_class' => 'footer-nav'
								);
						wp_nav_menu($args1);
					?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4>Helpful Stuff</h4>
					<p class="subheading">You're welcome.</p>
					<?php
						$args2 = array(
									'theme_location' => 'footer_two',
									'menu_class' => 'footer-nav'
								);
						wp_nav_menu($args2);
					?>
				</div>
				<div class="small-12 medium-6 large-3 columns">
					<h4>Talk To Us</h4>
	          		<p class="subheading">Got questions? You can <a href="http:/louisianarunning.com/locations">call us</a> or drop an email to <a href="mailto:staff@louisianarunning.com">staff@louisianarunning.com</a>. Better yet, <a href="/locations/">come see us</a> at any of our 3 New Orleans locations!</p>
	          		<div class="row">
						<div class="small-12 columns social">
							<a href="http://facebook.com/louisianarunningcompany" class="facebook" target="_blank" title="LRC on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="http://twitter.com/louisianarunco" class="twitter" target="_blank" title="LRC on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="http://instagram.com/louisianarunning" class="instagram" target="_blank" title="LRC on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="https://www.youtube.com/user/LouisianaRunningCo" class="youtube" target="_blank" title="LRC on YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
						</div>
	          		</div>
				</div>
			</div>
		</section>
		<section class="locations-footer">
			<div class="row almostFull margin-top">
				<div class="small-12 large-3 columns">
					<h4><?php echo get_bloginfo('name'); ?></h4>
					<p class="subheading">Check out our three New Orleans locations:</p>
					<p class="nomargin large-10 center"><img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" style="background:rgba(250,250,250,.7);border-radius:3px" /></p>
					<!-- <a href="mailto:staff@louisianarunning.com">staff@louisianarunning.com</a> -->
				</div>
				<?php
				$type = 'location';
				$args=array(
				  'post_type' => $type,
				  'post_status' => 'publish',
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
				  ?>
						<div class="small-12 medium-4 large-3 columns">
							<h5><a href="<?php echo get_the_permalink(); ?>" title="Learn More About Our <?php the_title(); ?> Store"><?php the_title(); ?></a></h5>
							<address><?php echo $address1; if (!empty($address2)) echo ', ' . $address2; ?>
							<?php echo get_field('city') . ', ' . get_field('state') . ' ' . get_field('zip'); ?>
							<br/>
							<?php if (!empty($phoneNum)) { ?>
								<span class="show-for-medium-up"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></span>
								<span class="hide-for-medium-up"><a href="tel:+1<?php echo $telNum; ?>"><?php echo $areaCode . ' ' . $parsePhone[1] . '-' . $parsePhone[2]; ?></a></span>
							<?php } ?>
							</address>
							
							<?php
								$directionsLink = get_field('directions_link');
							?>
							<p><a class="button radius small" href="<?php echo get_the_permalink(); ?>" target="_blank" title="Learn More About LRC <?php the_title(); ?>">Directions &amp; Hours</a></p>
						</div>
					<?php
				  endwhile;
				}
				wp_reset_query();  // Restore global post data stomped by the_post().
			
				?>
				<div class="small-12 columns copyright">
					<p>&copy;<?php echo date("Y") . ' ' . get_bloginfo('name'); ?></p>
				</div>
		 	</div>
		</section>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  $(document).foundation();
</script>

</body>
</html>
