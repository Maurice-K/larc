$(document).ready(function() {

	//DISABLE STORE CLICKS FOR NOW
	/*$('a[href*="/store/"]').click(function(e) {
		e.preventDefault();
		alert("Store is undergoing maintenance. It'll be back up soon with a new, revamped look!");
		return false;
	})*/
	
	//active states
	var pathname = window.location.pathname;
	$('ul.mainNav li a').each(function(index) {
		
		if (pathname == $(this).attr('href')) {
			$(this).toggleClass('active');
		} else if (pathname == '/') {
			if ($(this).attr('href') == '/') {
				$(this).toggleClass('active');
			}
		}
	});

	//nav mobile button hamburger stack
	$('.navicon-button').click(function() {
		$('.navdiv').toggleClass('show');
		$(this).toggleClass("open");
	});

	
	//slick slider
	$('.slickContainer').slick({
        fade: true,
		autoplay: true,
		dots: false,
		arrows: false
      });
	
	//mini footer slick slider
	$('.miniSlickContainer').slick({
        fade: false,
		autoplay: true,
		dots: false,
		arrows: false,
		//slidesToShow: 3,		pauseOnHover: false,
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
			slidesToShow: 1
		  }
		}
		]
      });
     
	//navigation set to fixed
	$(window).scroll(function() {
		if ($(this).scrollTop() > 10){  
			$('header#masthead').addClass("scrolled");
			$('body').addClass("scrolled");
		} else{
			$('header#masthead').removeClass("scrolled");
			$('body').removeClass("scrolled");
		}
	});
	
	
	//smooth scroll stuff
	$('a.smoothscroll').click(function() {
		var target = $(this.hash);
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		}
	});
	
	/*-- lightbox style video code ---**/
	$('a.lightboxVid').click(function(e) {
		if (!$(this).hasClass('reveal-link')) {
			e.stopPropagation();
			e.preventDefault();
			$('#lightboxPlayer div.flex-box').html('<iframe width="1280" height="720" src="' + $(this).attr("href") + '?autoplay=1&rel=0&modestbranding=1&showinfo=0&fs=0" frameborder="0" allowfullscreen></iframe> ');
			$('#lightboxPlayer').toggleClass('hidden');
		} else {
			var modalIframeSrc = $('#videoModal div.widescreen iframe').attr('src');
			$('#videoModal div.widescreen iframe').attr('src', modalIframeSrc.replace('autoplay=0','autoplay=1'));
		}
	});
	$('#lightboxPlayer').click(function(){
		$('#lightboxPlayer div.flex-box').html('<p></p>');
		$('#lightboxPlayer').toggleClass('hidden');
	});
});