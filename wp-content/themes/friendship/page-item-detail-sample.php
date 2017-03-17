<?php
/**
 * The template for displaying news page with the posts all on it
 *
 *
 * @package Friendship
 */
 
 $bodyClass = 'store';

get_header('custom'); ?>
<style>
	ul.sortTop {
		margin-left:0.25rem;
		padding-left:0;
		
	}
	ul.sortTop li {
		list-style: none;
		font-size: 0.825rem;
	}
	ul.sortTop ul {
		margin-left: 0.5rem;
	}
	ul.sortSecondary {
		margin-left: 0.5rem;
	}
	ul.sortTertiary {
		margin-left: 0.5rem;
	}
	ul#expList li {
		line-height: 30px;
		background-position: 85% 1px;
		background-repeat: no-repeat;
		text-indent: 0px;
	}
	ul#expList li:hover {
		cursor: pointer;
	}
	ul.sortTop .collapsed {
		background-image: url("http://www.louisianarunning.com/wp-content/uploads/2015/09/plus-sm.jpg");
	}
	ul.sortTop .expanded {
		background-image: url("http://www.louisianarunning.com/wp-content/uploads/2015/09/minus-sm.jpg");
	}
	
	.listControl{
      margin-bottom: 15px;
	  font-size: 0.75rem;
    }
    .listControl a {
        //border: 1px solid #555555;
        //color: #555555;
        cursor: pointer;
        height: 1.5rem;
        line-height: 1.5rem;
        margin-right: 5px;
        padding: 4px 10px;
    }
    .listControl a:hover {
        //background-color:#555555;
        //color:#222222; 
        font-weight:normal;
    }
	#expandList {
		background-image: url("http://www.louisianarunning.com/wp-content/uploads/2015/09/plus-sm.jpg");
	}
	#collapseList {
		background-image: url("http://www.louisianarunning.com/wp-content/uploads/2015/09/minus-sm.jpg");
	}
	
	.row.description {
		border: 1px solid #23589C;
		padding-top: 1.5rem;
	}
	
	div.smallView {
		
	}
	.row.recommended {
		margin-top: 1.25rem;
	}
	div.recommendedItem {
		//display: inline-block;
	}
	p.price {
		font-weight: bold;
		color: #23589C;
		font-size: 1.25rem;
	}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="articles">
				<div class="row">
					<div class="small-12 columns">
						<h1>Item Name Here</h1>
					</div>
				</div>
				<div class="row">
					<div class="small-8 medium-9 large-10 columns mainContent">
						<div class="row">
							<div class="small-12 columns">
								<div class="row itemView">
									<div class="small-12 columns">
										<div class="largeView">
											<img src="http://louisianarunning.com/PDGImages/-2320833598984388095_1.jpg"/>
										</div>
									</div>
									<div class="small-12 columns">
										<div class="alternateViews row collapse">
											<div class="smallView small-3 columns">
												<img src="http://louisianarunning.com/PDGImages/-2320833598984388095_1.jpg"/>
											</div>
											<div class="smallView small-3 columns">
												<img src="http://www.louisianarunning.com/PDGImages/-2161631466973396223_1.jpg"/>
											</div>
											<div class="smallView small-3 columns">
												<img src="http://www.louisianarunning.com/PDGImages/-1976027196254420223_1.jpg"/>
											</div>
											<div class="smallView small-3 columns">
												<img src="http://louisianarunning.com/PDGImages/-3056192859989442047_1.jpg"/>
											</div>
										</div>
									</div>
								</div>
								<div class="row infoView collapse">
									<div class="small-12 columns">
										<div class="row description radius">
											<div class="small-12 columns">
												<h4>Description:</h4>
												<p>Description description description description Description description description description Description description description description Description description description description Description description description description Description description description description Description description description description Description description description description Description description description description Description description description descriptionDescription description description description </p>
												
												<h4>Specifications:</h4>
												<ul>
													<li>Lightweight</li>
													<li>Neutral</li>
													<li>Minimal</li>
													<li>Very cool</li>
												</ul>
											</div>
										</div>
										<div class="row recommended">
											<div class="small-12 columns">
												<h3>You might like:</h3>
												<div class="recommendedSlider">
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150"/></a>
													</div>
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150&text=sample"/></a>
													</div>
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150"/></a>
													</div>
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150"/></a>
													</div>
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150&text=item"/></a>
													</div>
													<div class="recommendedItem inline-block">
														<a href="#"><img src="http://placehold.it/200x150"/></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="small-4 medium-3 large-2 columns sidebarContent">
						<p class="price">$130.00</p>
						<p>Size:<br/>
							<select>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>11</option>
							</select>
						</p>
						<p>Color:<br/>
							<select>
								<option>Red/White</option>
								<option>Blue/Grey</option>
								<option>Black</option>
								<option>Yellow/Green</option>
							</select>
						</p>
						<p>Quantity:<br/>
							<select>
								<?php for ($x = 1; $x <= 10; $x++) { ?>
									<option><?php echo $x; ?></option>
								<?php } ?>
							</select>
						</p>
						<p><a href="#" class="button radius">Add to Cart</a></p>
					</div>
				</div>
			</section>
		
		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer('custom'); ?>
<script>
	function prepareList() {
	$('#expList').find('li:has(ul)').unbind('click')
		.click( function(event) {
			if (this == event.target) {
				$(this).toggleClass('expanded');
				$(this).children('ul').toggle('medium');
			}
			return false;
		})
		.addClass('collapsed')
		.removeClass('expanded')
		.children('ul').hide();
	};
	
	//make links clickable
	//currently opens in new window
	//TODO: pass this attr href data to reload view and filter 
	//  without reloading entire window
	$('#expList a').unbind('click').click(function() {
		window.open($(this).attr('href'));
		return false;
	});

	$(document).ready( function() {
	  prepareList();
	});
	
	$('#expandList')
    .unbind('click')
    .click( function() {
        $('.collapsed').addClass('expanded');
        $('.collapsed').children().show('medium');
    })
    $('#collapseList')
    .unbind('click')
    .click( function() {
        $('.collapsed').removeClass('expanded');
        $('.collapsed').children().hide('medium');
    })
	
	
	//shoe zooming and alternate views jank
	//load magnifier js for zooming magnifying glass 
	$('.alternateViews .smallView').hover(
		function() {
			$('.largeView').html($( this ).html() );
		}, function() {
			//$( this ).find( "span:last" ).remove();
		}
	);
	
	//recommended items slick slider
	$('.recommendedSlider').slick({
        fade: false,
		autoplay: true,
		autoplaySpeed: 6000,
		dots: false,
		arrows: false,
		slidesToShow: 4,		
		pauseOnHover: true,
		responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerMode: true,
			centerPadding: '40px',
			slidesToShow: 3
		  }
		}
		]
      });
</script>