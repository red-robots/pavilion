/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Lisa DeBona
 */

jQuery(document).ready(function ($) {
	
	/* Slideshow */
	var swiper = new Swiper('#slideshow', {
		effect: 'slide', /* "slide", "fade", "cube", "coverflow" or "flip" */
		loop: true,
		noSwiping: false,
		simulateTouch : false,
		autoplay: {
			delay: 4000,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
  });


  $(".slideMoreBtn").on("click",function(e){
  	e.preventDefault();
  	$(".subpage-banner").toggleClass('show-details');
  	$(".slideCaption").toggleClass("animated fadeIn");
  	$("body").toggleClass("slide-text-open");
  });

	// swiper.on('onSlideChangeEnd', function (realIndex) {
 //    // if( $('.swiper-slide.swiper-slide-active').length>0 ) {
 //    // 	if( $('.swiper-slide.swiper-slide-active').find(".slideInside").length>0 ) {
 //    // 		$('.swiper-slide.swiper-slide-active').find(".slideInside").addClass('fadeInDown');
 //    // 	}
 //    // }
 //    $('.swiper-slide').each(function(){
 //    	if( $(this).hasClass("swiper-slide-active") ) {
 //    		$(this).find(".slideMid").addClass('fadeInDown');
 //    	} else {
 //    		$(this).find(".slideMid").removeClass('fadeInDown');
 //    	}
 //    });
 //  });

 	/* Sticky Navigation */
	$(window).scroll(function() {
	  var header = $(document).scrollTop();
	  var headerHeight = $("#masthead").outerHeight();
	  if (header > headerHeight) {
	    $("#masthead").addClass("fixed");
	  } else {
	    $("#masthead").removeClass("fixed");
	  }
	});



    /* Smooth Scroll */
    $('a[href*="#"]')
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
	    // On-page links
	    if (
	      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	      && 
	      location.hostname == this.hostname
	    ) {
	      // Figure out element to scroll to
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	      // Does a scroll target exist?
	      if (target.length) {
	        // Only prevent default if animation is actually gonna happen
	        event.preventDefault();
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000, function() {
	          // Callback after animation
	          // Must change focus!
	          var $target = $(target);
	          $target.focus();
	          if ($target.is(":focus")) { // Checking if the target was focused
	            return false;
	          } else {
	            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
	            $target.focus(); // Set focus again
	          };
	        });
	      }
	    }
	});
	
	if( $(".categories-tabs a").length>0 ) {
		var catLinks = $(".categories-tabs").html();
		$(".cattabs").html(catLinks);
		$(document).on("click",".cattabs a.active",function(e){
			e.preventDefault();
			$(".cattabs a").not(".active").toggleClass('show');
		});
		$(document).on("click",".cattabs a",function(e){
			e.preventDefault();
			if( $(this).hasClass('active') ) {

			} else {
				var catLink = $(this).attr("href");
				$(".cattabs a.active").removeClass("active");
				$(".cattabs a").removeClass('show');
				$(this).removeClass('show');
				$(this).addClass("active");
				window.history.replaceState('',document.title,catLink);
				$(".team-list").load(catLink + " .team-data",function(){

				});
			}
			
			// $(".cattabs a").removeClass("active show");
			// $(this).toggleClass('active show');
		});
	}


	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click",".menu-toggle",function(e){
		e.preventDefault();
		$(this).toggleClass('open');
		$('body').toggleClass('open-mobile-menu');
	});
	$(document).on("click","#closeMobileMenu, #mobile-menu-backdrop",function(e){
		e.preventDefault();
		$(this).removeClass('open');
		$('body').removeClass('open-mobile-menu');
	});


});// END #####################################    END