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
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="articles">
				<div class="row">
					<div class="small-12 columns">
						<h1>Store Sample Page</h1>
					</div>
				</div>
				<div class="row">
					<div class="small-12 medium-4 large-2 columns rightSidebar">
						<h5>Sort by:</h5>
						<ul class="sortTop" id="expList">
							<li>Type
								<ul class="sortSecondary">
									<li><a href="#">Shoes</a>
										<ul class="sortTertiary">
											<li><a href="#">Traditional</a></li>
											<li><a href="#">Trail</a></li>
											<li><a href="#">Competition</a></li>
										</ul>
									</li>
								</ul>
								<ul class="sortSecondary">
									<li><a href="#">Apparel</a>
										<ul class="sortTertiary">
											<li><a href="#">Jackets</a></li>
											<li><a href="#">Long sleeve</a></li>
											<li><a href="#">Short sleeve</a></li>
											<li><a href="#">Shorts</a></li>
										</ul>
									</li>
								</ul>
								<ul class="sortSecondary">
									<li><a href="#">Accessories</a>
										<ul class="sortTertiary">
											<li><a href="#">Watches</a></li>
											<li><a href="#">Hats</a></li>
											<li><a href="#">Gloves</a></li>
											<li><a href="#">Illumination</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>Brand
								<ul class="sortSecondary">
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
									<li><a href="#">Brand x</a></li>
								</ul>
							</li>
							<li>Stability
								<ul class="sortSecondary">
									<li><a href="#">xxx</a></li>
									<li><a href="#">xxx x</a></li>
									<li><a href="#">xxx x</a></li>
									<li><a href="#">xxx x</a></li>
								</ul>
							</li>
							<li>Size
								<ul class="sortSecondary">
									<li><a href="#">xxx</a></li>
									<li><a href="#">xxx x</a></li>
									<li><a href="#">xxx x</a></li>
									<li><a href="#">xxx x</a></li>
								</ul>
							</li>
							<li>Price
								<ul class="sortSecondary">
									<li><a href="#">Lowest to Highest</a></li>
									<li><a href="#">Highest to Lowest</a></li>
								</ul>
							</li>
							<li>Color
								<ul class="sortSecondary">
									<li><a href="#">xxx</a></li>
									<li><a href="#">xxx</a></li>
									<li><a href="#">xxx</a></li>
									<li><a href="#">xxx</a></li>
								</ul>
							</li>
						</ul>
						<div class="listControl"><a id="expandList"></a>Expand All <br/><a id="collapseList"></a>Collapse All</div>
					</div>
					<div class="small-12 medium-8 large-10 columns mainContent">
						<div class="row">
							<?php for ($x = 0; $x <= 10; $x++) { ?>
							<div class="small-12 medium-4 large-4 columns">
								<div class="imageContainer">
									<a href="#"><img src="http://louisianarunning.com/PDGImages/-3056192859989442047_1.jpg"/></a>
								</div>
								<div class="descriptionContainer text-center">
									<a href="#"><h4>Shoe Title</h4></a>
									<p class="price" style="">$120.00</p>
									<p><a href="#" class="button radius">View</a></p>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row pagination">
							<div class="small-12 columns">
								<div class="left">
									<a href="#">Previous Page</a>
								</div>
								<div class="right">
									<a href="#">Next Page</a>
								</div>
							</div>
						</div>
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
</script>