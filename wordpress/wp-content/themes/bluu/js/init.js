	
jQuery(document).ready(function() {

	if( jQuery("body").hasClass("wp-is-not-mobile") ) {

		/*--------------------------------------------------*/
		/* Smooth scrolling
		/*--------------------------------------------------*/

		function niceScrollInit() {

			jQuery("html").niceScroll({
				scrollspeed: 60,
				mousescrollstep: 40,
				cursorwidth: 15,
				cursorborder: 0,
				cursorcolor: '#1e2123',
				background: '#6e6e72',
				cursorborderradius: 6,
				autohidemode: false,
				horizrailenabled: false
			});

			jQuery('html').addClass('no-overflow-y');

		}

		var $smoothActive = jQuery('body').attr('data-smooth-scrolling'); 
		var $smoothCache = ( $smoothActive == 1 ) ? true : false;
		
		if( $smoothActive == 1 && jQuery(window).width() > 690 && jQuery('body').outerHeight(true) > jQuery(window).height()){ niceScrollInit(); } else {
			jQuery('body').attr('data-smooth-scrolling','0');
		}

		niceScrollInit();


		/*--------------------------------------------------*/
		/* Parallax scrolling
		/*--------------------------------------------------*/

		jQuery('.project-scroll').parallax("50%", 0.1);

	}

});


jQuery(document).ready(function() {

	/*--------------------------------------------------*/
	/* Isotope filtering
	/*--------------------------------------------------*/

	var container = jQuery('.isotope'),
		optionFilter = jQuery('#sort-by'),
		optionFilterLinks = optionFilter.find('a');
            
		optionFilterLinks.attr('href', '#');
            
		optionFilterLinks.click(function(){
			var selector = jQuery(this).attr('data-filter');
				container.isotope({ 
					filter : '.' + selector, 
					itemSelector : '.isotope-item',
					layoutMode : 'fitRows',
					animationEngine : 'best-available'
				});
                
				// Highlight the correct filter
				optionFilterLinks.removeClass('active');
				jQuery(this).addClass('active');
				return false;
	});

});

jQuery(document).ready(function() {

	/*--------------------------------------------------*/
	/* Superfish menu
	/*--------------------------------------------------*/

	jQuery('.main-navigation > ul').superfish({
		delay: 400,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		cssArrows: false,
		disableHI: true
	});


	/*--------------------------------------------------*/
	/* FitVids
	/*--------------------------------------------------*/

	jQuery(".entry-content").fitVids();
	jQuery(".entry-media").fitVids();


	/*--------------------------------------------------*/
	/* Back-to-top
	/*--------------------------------------------------*/

	var $scrollTop = jQuery(window).scrollTop();

	//starting bind
	if( jQuery('#to-top').length > 0 && jQuery(window).width() > 1020) {
		
		if($scrollTop > 350){
			jQuery(window).bind('scroll',hideToTop);
		}
		else {
			jQuery(window).bind('scroll',showToTop);
		}
	}


	function showToTop(){
		
		if( $scrollTop > 350 ){

			jQuery('#to-top').stop(true,true).animate({
				'bottom' : '30px'
			},350,'easeInOutCubic');	
			
			jQuery(window).unbind('scroll',showToTop);
			jQuery(window).bind('scroll',hideToTop);
		}

	}

	function hideToTop(){
		
		if( $scrollTop < 350 ){

			jQuery('#to-top').stop(true,true).animate({
				'bottom' : '-40px'
			},350,'easeInOutCubic');	
			
			jQuery(window).unbind('scroll',hideToTop);
			jQuery(window).bind('scroll',showToTop);	
			
		}
	}

	//to top color
	if( jQuery('#to-top').length > 0 ) {
		
		var $windowHeight, $pageHeight, $footerHeight, $ctaHeight;
		
		function calcToTopColor(){
			$scrollTop = jQuery(window).scrollTop();
			$windowHeight = jQuery(window).height();
			$pageHeight = jQuery('body').height();
			$footerHeight = jQuery('#footer-outer').height();
			$ctaHeight = (jQuery('#call-to-action').length > 0) ? jQuery('#call-to-action').height() : 0;
			
			if( ($scrollTop-35 + $windowHeight) >= ($pageHeight - $footerHeight) && jQuery('#boxed').length == 0){
				jQuery('#to-top').addClass('dark');
			}
			
			else {
				jQuery('#to-top').removeClass('dark');
			}
		}
		
		//calc on scroll
		jQuery(window).scroll(calcToTopColor);
		
		//calc on resize
		jQuery(window).resize(calcToTopColor);

	}

	//scroll up event
	jQuery('#to-top').click(function(){
		jQuery('body,html').stop().animate({
			scrollTop:0
		},800,'easeOutCubic')
		return false;
	});


	/*--------------------------------------------------*/
	/* Portfolio image hovers
	/*--------------------------------------------------*/

	function image_hover_fadein() {
	
		var postThumb = jQuery('.portfolio-square .project-media a');
		
		postThumb.hover( function() {
		
			jQuery(this).find('.portfolio-thumb-overlay').stop().css({
				opacity: 0,
				display: 'block'
			}).animate({
				opacity: 1
			}, 250);
			
		}, function() {
			jQuery(this).find('.portfolio-thumb-overlay').stop().fadeOut(250);
		});
		
	}
	
	image_hover_fadein();


	/*--------------------------------------------------*/
	/* Masonry blog templates
	/*--------------------------------------------------*/

	jQuery('.masonry-blog').masonry({
  		itemSelector: '.post',
		columnWidth: '.post',
		gutter: '.gutter-sizer'
	});




});