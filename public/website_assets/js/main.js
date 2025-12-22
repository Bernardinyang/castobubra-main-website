/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Mobile Menu Js
03. Sidebar Js
04. Cart Toggle Js
05. Search Js
06. Sticky Header Js
07. Data Background Js
08. Testimonial Slider Js
09. Slider Js (Home 3)
10. Brand Js
11. Tesimonial Js
12. Course Slider Js
13. Masonary Js
14. Wow Js
15. Data width Js
16. Cart Quantity Js
17. Show Login Toggle Js
18. Show Coupon Toggle Js
19. Create An Account Toggle Js
20. Shipping Box Toggle Js
21. Counter Js
22. Parallax Js
23. InHover Active Js

****************************************************/

(function () {
"use strict";

	// Wait for jQuery to be available - use a polling approach
	function waitForJQuery(callback) {
		if (typeof window.jQuery !== 'undefined') {
			callback(window.jQuery);
		} else {
			setTimeout(function() {
				waitForJQuery(callback);
			}, 10);
		}
	}

	waitForJQuery(function($) {
		// Make $ available in this scope
		window.$ = window.jQuery = $;

		var windowOn = $(window);
	////////////////////////////////////////////////////
    // 01. PreLoader Js
	windowOn.on('load',function() {
		$("#loading").fadeOut(500);
	});

	////////////////////////////////////////////////////
    // 02. Mobile Menu Js
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "1199",
		meanExpand: ['<i class="fal fa-plus"></i>'],
	});


	////////////////////////////////////////////////////
    // 03. Sidebar Js
	$("#sidebar-toggle").on("click", function () {
		$(".sidebar__area").addClass("sidebar-opened");
		$(".body-overlay").addClass("opened");
	});
	$(".sidebar__close-btn").on("click", function () {
		$(".sidebar__area").removeClass("sidebar-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 04. Cart Toggle Js
	$(".cart-toggle-btn").on("click", function () {
		$(".cartmini__wrapper").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".cartmini__close-btn").on("click", function () {
		$(".cartmini__wrapper").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});
	$(".body-overlay").on("click", function () {
		$(".cartmini__wrapper").removeClass("opened");
		$(".sidebar__area").removeClass("sidebar-opened");
		$(".header__search-3").removeClass("search-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 05. Search Js
	$(".search-toggle").on("click", function () {
		$(".header__search-3").addClass("search-opened");
		$(".body-overlay").addClass("opened");
	});
	$(".header__search-3-btn-close").on("click", function () {
		$(".header__search-3").removeClass("search-opened");
		$(".body-overlay").removeClass("opened");
	});


	////////////////////////////////////////////////////
    // 06. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("sticky");
		} else {
			$("#header-sticky").addClass("sticky");
		}
	});

	////////////////////////////////////////////////////
    // 07. Data Background Js
	// Data Background Js with responsive support
	function setBackgroundImages() {
		var isMobile = $(window).width() <= 767;
		$("[data-background]").each(function () {
			var $el = $(this);
			var backgroundUrl;
			if (isMobile && $el.attr("data-mobile-background")) {
				backgroundUrl = $el.attr("data-mobile-background");
			} else {
				backgroundUrl = $el.attr("data-background");
			}
			$el.css("background-image", "url( " + backgroundUrl + "  )");
		});
	}
	
	// Set on load
	setBackgroundImages();
	
	// Update on window resize
	var resizeTimer;
	$(window).on('resize', function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(function() {
			setBackgroundImages();
		}, 250);
	});


	////////////////////////////////////////////////////
    // 08. Testimonial Slider Js
	var swiper = new Swiper('.testimonial__slider', {
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});



	////////////////////////////////////////////////////
    // 09. Slider Js (Home 3)
	var galleryThumbs = new Swiper('.slider__nav', {
		spaceBetween: 0,
		slidesPerView: 4,
		freeMode: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
        speed: 300,
	});
	var galleryTop = new Swiper('.slider__wrapper', {
		spaceBetween: 0,
        speed: 300,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false,
        },
		loop: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs
		}
	});




	////////////////////////////////////////////////////
    // 10. Brand Js
	var swiper = new Swiper('.brand__slider', {
		slidesPerView: 6,
		spaceBetween: 30,
		centeredSlides: true,
		loop: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	////////////////////////////////////////////////////
    // 11. Tesimonial Js
	var tesimonialThumb = new Swiper('.testimonial-nav', {
		spaceBetween: 20,
		slidesPerView: 3,
		loop: true,
		freeMode: true,
		loopedSlides: 3, //looped slides should be the same
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
		centeredSlides: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
		on: {
			click: function(swiper, event) {
				// Get the clicked slide index (real index in loop mode)
				var clickedIndex = swiper.clickedIndex;
				// Navigate the main slider to the clicked slide
				if (testimonialText && clickedIndex !== undefined && clickedIndex !== null) {
					testimonialText.slideTo(clickedIndex);
				}
			}
		}
	  });
	var testimonialText = new Swiper('.testimonial-text', {
	spaceBetween: 0,
	loop: true,
	loopedSlides: 5, //looped slides should be the same
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	thumbs: {
		swiper: tesimonialThumb,
	},
	});
	
	// Make thumbnail images clickable to navigate to corresponding slide
	$(document).on('click', '.testimonial-nav .testimonial__nav-thumb, .testimonial-nav .swiper-slide', function(e) {
		e.preventDefault();
		var $slide = $(this).closest('.swiper-slide');
		var slideIndex = $slide.data('slide-index');
		
		// Get the real index from Swiper (works with loop mode)
		if (tesimonialThumb && slideIndex === undefined) {
			var clickedIndex = $slide.index();
			// Get the real slide index from Swiper
			var realIndex = tesimonialThumb.getSlideIndex($slide[0]);
			if (realIndex !== undefined && realIndex !== null) {
				slideIndex = realIndex;
			} else {
				slideIndex = clickedIndex;
			}
		}
		
		if (testimonialText && slideIndex !== undefined && slideIndex !== null) {
			testimonialText.slideTo(slideIndex);
		}
	});

	////////////////////////////////////////////////////
   	// 12. Course Slider Js
	var swiper = new Swiper('.course__slider', {
	spaceBetween: 30,
	slidesPerView: 2,
	breakpoints: {
		'768': {
			slidesPerView: 2,
		},
		'576': {
			slidesPerView: 1,
		},
		'0': {
			slidesPerView: 1,
		},
	},
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	});

	////////////////////////////////////////////////////
    // 13. Gallery Slider Js
	////////////////////////////////////////////////////
    // 12. Full Width Slider Js (reusable component)
	function initFullWidthSlider(sliderId) {
		var $sliderContainer = $('[data-slider-instance="' + sliderId + '"]');
		var $navSlider = $sliderContainer.find('[data-nav-slider="' + sliderId + '"]');
		var $mainSlider = $sliderContainer.find('[data-main-slider="' + sliderId + '"]');
		
		if ($navSlider.length && $mainSlider.length) {
			var totalSlides = $navSlider.find('.swiper-slide').length;
			var shouldAutoplay = totalSlides > 5; // Auto-scroll if more than 5 images
			
			var galleryThumb = new Swiper($navSlider[0], {
				spaceBetween: 15,
				slidesPerView: 'auto',
				loop: false,
				freeMode: false,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				centeredSlides: true,
				slideToClickedSlide: true,
				autoplay: shouldAutoplay ? {
					delay: 3000,
					disableOnInteraction: false,
					pauseOnMouseEnter: true,
				} : false,
				speed: 600,
				on: {
					click: function(swiper, event) {
						var clickedIndex = swiper.clickedIndex;
						if (galleryText && clickedIndex !== undefined && clickedIndex !== null) {
							galleryText.slideTo(clickedIndex);
						}
					},
					slideChange: function(swiper) {
						// Sync main slider when thumbnail changes
						if (galleryText && swiper.activeIndex !== undefined) {
							galleryText.slideTo(swiper.activeIndex);
						}
					}
				}
			});
			
			var galleryText = new Swiper($mainSlider[0], {
				spaceBetween: 0,
				loop: false,
				effect: 'fade',
				fadeEffect: {
					crossFade: true
				},
				speed: 600,
				thumbs: {
					swiper: galleryThumb,
				},
				on: {
					slideChange: function(swiper) {
						// Sync thumbnail slider when main slider changes
						if (galleryThumb && swiper.activeIndex !== undefined) {
							galleryThumb.slideTo(swiper.activeIndex);
						}
					}
				}
			});
			
			// Make thumbnail images clickable to navigate to corresponding slide
			$navSlider.on('click', '.gallery__nav-thumb, .swiper-slide', function(e) {
				e.preventDefault();
				var $slide = $(this).closest('.swiper-slide');
				var slideIndex = $slide.data('slide-index');
				
				if (galleryThumb && slideIndex === undefined) {
					var clickedIndex = $slide.index();
					if (clickedIndex !== undefined && clickedIndex !== null) {
						slideIndex = clickedIndex;
					}
				}
				
				if (galleryText && slideIndex !== undefined && slideIndex !== null) {
					galleryText.slideTo(slideIndex);
					// Pause autoplay when user clicks
					if (shouldAutoplay && galleryThumb.autoplay) {
						galleryThumb.autoplay.stop();
						setTimeout(function() {
							if (galleryThumb.autoplay) {
								galleryThumb.autoplay.start();
							}
						}, 5000);
					}
				}
			});
			
			// Pause autoplay on hover
			$navSlider.on('mouseenter', function() {
				if (shouldAutoplay && galleryThumb.autoplay) {
					galleryThumb.autoplay.stop();
				}
			}).on('mouseleave', function() {
				if (shouldAutoplay && galleryThumb.autoplay) {
					galleryThumb.autoplay.start();
				}
			});
		}
	}
	
	// Initialize all full-width sliders on page load
	$(document).ready(function() {
		$('[data-slider-id]').each(function() {
			var sliderId = $(this).data('slider-id');
			initFullWidthSlider(sliderId);
		});
	});

	////////////////////////////////////////////////////
    // 13. Carousel Slider Js (multi-slide carousel)
	function initCarouselSlider(sliderId) {
		var $sliderContainer = $('[data-carousel-instance="' + sliderId + '"]');
		
		if ($sliderContainer.length) {
		var $section = $('[data-carousel-id="' + sliderId + '"]');
		// Default to 1 slide on mobile, 3 on desktop
		var defaultSlidesPerView = window.innerWidth < 768 ? 1 : 3;
		var slidesPerView = $section.data('slides-per-view') || defaultSlidesPerView;
		var spaceBetween = $section.data('space-between') || 20;
			var autoplayEnabled = $section.data('autoplay') === true || $section.data('autoplay') === 'true';
			var autoplayDelay = $section.data('autoplay-delay') || 3000;
			var loopEnabled = $section.data('loop') !== false && $section.data('loop') !== 'false';
			
			var breakpoints = {
				320: {
					slidesPerView: $section.data('breakpoint-320') || 1,
					spaceBetween: 10
				},
				576: {
					slidesPerView: $section.data('breakpoint-576') || 1,
					spaceBetween: 15
				},
				768: {
					slidesPerView: $section.data('breakpoint-768') || 2,
					spaceBetween: 20
				},
				992: {
					slidesPerView: $section.data('breakpoint-992') || 3,
					spaceBetween: 20
				},
				1200: {
					slidesPerView: $section.data('breakpoint-1200') || 3,
					spaceBetween: 20
				}
			};
			
			var carouselSwiper = new Swiper($sliderContainer[0], {
				slidesPerView: slidesPerView,
				spaceBetween: spaceBetween,
				loop: loopEnabled,
				autoplay: autoplayEnabled ? {
					delay: autoplayDelay,
					disableOnInteraction: false,
					pauseOnMouseEnter: true,
				} : false,
				speed: 600,
				navigation: {
					nextEl: $sliderContainer.find('.carousel-slider__button-next')[0],
					prevEl: $sliderContainer.find('.carousel-slider__button-prev')[0],
				},
				pagination: {
					el: $sliderContainer.find('.carousel-slider__pagination')[0],
					clickable: true,
					renderBullet: function (index, className) {
						return '<span class="' + className + '"></span>';
					},
				},
				breakpoints: breakpoints,
			});
		}
	}
	
	// Initialize all carousel sliders on page load
	$(document).ready(function() {
		$('[data-carousel-id]').each(function() {
			var sliderId = $(this).data('carousel-id');
			initCarouselSlider(sliderId);
		});
	});

	////////////////////////////////////////////////////
    // 13.1. Gallery Fancybox Lightbox Js
	if ($('[data-fancybox="gallery"]').length) {
		$('[data-fancybox="gallery"]').fancybox({
			buttons: [
				"zoom",
				"share",
				"slideShow",
				"fullScreen",
				"download",
				"thumbs",
				"close"
			],
			loop: true,
			protect: true,
			animationEffect: "fade",
			transitionEffect: "fade",
			thumbs: {
				autoStart: false
			},
			image: {
				preload: true
			},
			toolbar: true,
			infobar: true
		});
	}

	////////////////////////////////////////////////////
    // 14. Masonary Js
	$('.grid').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});


	// filter items on button click
	$('.masonary-menu').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});

	//for menu active class
	$('.masonary-menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});

	});


	////////////////////////////////////////////////////
    // 14. Wow Js
	new WOW().init();

	////////////////////////////////////////////////////
    // 15. Data width Js
	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	  });


	////////////////////////////////////////////////////
    // 16. Cart Quantity Js
	$('.cart-minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.cart-plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});




	////////////////////////////////////////////////////
	// 17. Show Login Toggle Js
	$('#showlogin').on('click', function () {
		$('#checkout-login').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 18. Show Coupon Toggle Js
	$('#showcoupon').on('click', function () {
		$('#checkout_coupon').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 19. Create An Account Toggle Js
	$('#cbox').on('click', function () {
		$('#cbox_info').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 20. Shipping Box Toggle Js
	$('#ship-box').on('click', function () {
		$('#ship-box-info').slideToggle(1000);
	});

	////////////////////////////////////////////////////
	// 21. Counter Js
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});

	////////////////////////////////////////////////////
	// 22. Parallax Js
	if ($('.scene').length > 0 ) {
		$('.scene').parallax({
			scalarX: 10.0,
			scalarY: 15.0,
		});
	};

	////////////////////////////////////////////////////
    // 23. InHover Active Js
	$('.hover__active').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
	});

	}); // End of waitForJQuery callback
})();
