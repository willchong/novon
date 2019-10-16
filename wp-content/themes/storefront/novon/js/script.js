$(function(){


	// if ($('body').hasClass('home')) {
	// 	$('.js-modal').addClass('js-active');
	// 	$('body,html').addClass('overlay');
	// }


	// $(document).on('click', '.js-modal', function(event) {

	// 	$('.js-modal').removeClass('js-active');
	// 	$('body,html').removeClass('overlay');

	// });

	$('.homepage-slides').on('init', function(event, slick, currentSlide, nextSlide){
		$('.homepage-slides img').removeClass('hidden');
		console.log('slick init');
	});

	$('.homepage-slides').slick({
		arrows: false,
		autoplay: true,
		autoplaySpeed: 4000,
		fade: true
	  });

	$('.swiper-wrapper').slick({
	  centerMode: true,
	  centerPadding: '25%',
	  dots: true,
	  slidesToShow: 1,
	  responsive: [
	      {
	        breakpoint: 1024,
	        settings: {
	          centerPadding: '15%'
	        }
	      },
	      {
	        breakpoint: 768,
	        settings: {
	          centerPadding: '5%'
	        }
	      },
	      {
	        breakpoint: 640,
	        settings: {
	          centerPadding: '0'
	        }
	      }
	    ]
	});


	var controller = new ScrollMagic.Controller(),
	        tween1a = TweenMax.from($('#earrings-top'), 1, {y: "-60", opacity: 0}),
	        tween1b = TweenMax.from($('#earrings-bottom'), 1, {y: "+60", opacity: 0}),
	        scene = new ScrollMagic.Scene({triggerElement: "#modular", duration: "45%"});

	scene.setTween([tween1a, tween1b]).addTo(controller);

	var controller2 = new ScrollMagic.Controller(),
	        tween1c = TweenMax.to($('#earrings-bottom'), 1, {opacity: 0, delay: 0.5}),
	        tween1d = TweenMax.from($('#earrings-change'), 1, {y: "+60", opacity: 0, delay: 1}),
	        scene2 = new ScrollMagic.Scene({triggerElement: "#earrings", duration: "40%"});

	scene2.setTween([tween1c, tween1d]).addTo(controller2);

	var controller3 = new ScrollMagic.Controller(),
		tween3 = TweenMax.staggerFrom(".steps ol li", 1, {opacity:0, delay:0.5}, 0.5),
		scene3 = new ScrollMagic.Scene({triggerElement: "#modular", duration: "50%"});

		scene3.setTween([tween3]).addTo(controller3);

	$('.js-placeholder-search').on('click', function(event) {
		$(this).toggleClass('js-active');
		$('.site-search').addClass('js-active');
	});

	$('.js-tops').slick({
	  centerMode: false,
	  // dots: true,
	  slidesToShow: 4,
	  responsive: [
	      {
	        breakpoint: 640,
	        settings: {
	          slidesToShow: 1
	        }
	      },
	      {
	        breakpoint: 768,
	        settings: {
	          slidesToShow: 3
	        }
	      }
	    ]
	});

	$('.js-attachments').slick({
	  centerMode: false,
	  // dots: true,
	  slidesToShow: 4,
	  responsive: [
	      {
	        breakpoint: 640,
	        settings: {
	          slidesToShow: 1
	        }
	      },
	      {
	        breakpoint: 768,
	        settings: {
	          slidesToShow: 3
	        }
	      }
	    ]
	});

	// $('.js-chains').slick({
	//   centerMode: false,
	//   // dots: true,
	//   slidesToShow: 3,
	//   responsive: [
	//       {
	//         breakpoint: 640,
	//         settings: {
	//           slidesToShow: 1
	//         }
	//       }
	//     ]
	// });

	$('.tops .js-icon').on('click', function(event) {
		$('.js-tops').slick('slickUnfilter');
		$('.js-tops').slick('slickSetOption', 'slidesToShow', 4, true);

		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
		} else {
			$('.tops .js-icon').removeClass('js-active');
			$(this).addClass('js-active');	
		}

		var filter = [];
		$('.tops .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-tops').slick('slickFilter', filter.join());
			$('.js-tops').slick('slickGoTo', 0);
			// $('.js-tops').slick('slickSetOption', 'slidesToShow', 3, true);
		} 
	});

	$('.attachments .js-icon').on('click', function(event) {
		$('.js-attachments').slick('slickUnfilter');
		$('.js-attachments').slick('slickSetOption', 'slidesToShow', 4, true);
		
		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
		} else {
			$('.attachments .js-icon').removeClass('js-active');
			$(this).addClass('js-active');	
		}

		var filter = [];
		$('.attachments .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-attachments').slick('slickFilter', filter.join());
			$('.js-attachments').slick('slickGoTo', 0);
			// $('.js-attachments').slick('slickSetOption', 'slidesToShow', 3, true);
		}

	});

	$(window).on('load', function() {

		var _hash = window.location.hash;

		if (_hash == "#design") {
			$("html, body").animate({ scrollTop: ($('.configurator').offset().top-84)+'px' });
		}

	});

	$(document).on('click', '.js-lookbook-products', function(event) {

		event.preventDefault();
		var _data = $(this).data();
		var _names = [];
		var _images = [];
		var _urls = [];

		$.each(_data, function(i,k) {
			if (i.indexOf('Title') > -1) {
				_names.push(k);
			}
			if (i.indexOf('Url') > -1) {
				_urls.push(k);
			}
			if (i.indexOf('Image') > -1) {
				_images.push(k);
			}
		});

		$('.js-lookbook-overlay .js-hero').attr('src', $(this).data('hero'));
		$('.js-lookbook-overlay .js-zoom').attr('href', $(this).data('hero'));

		for (var i=0; i<_names.length; i++) {
			var _product = '<div class="product">';
			_product += '<a href="'+_urls[i]+'">';
			_product += '<img src="'+_images[i]+'"/>';
			_product += '<p>'+_names[i]+'</p>';
			_product += '</a>';
			_product += '</div>';

			$('.js-lookbook-overlay .js-products').append(_product);
		}

		$('.js-lookbook-overlay').addClass('js-active');


	});

	$(document).on('click', '.js-lookbook-overlay .js-close, .js-lookbook-overlay', function(event) {

		event.preventDefault();
		$('.js-lookbook-overlay .js-hero').attr('src', '');
		$('.js-lookbook-overlay .js-zoom').attr('src', '');
		$('.js-lookbook-overlay .js-products').empty();
		$('.js-lookbook-overlay').removeClass('js-active');

	}).on('click', '.js-lookbook-overlay .window', function(event) {
	    // clicked on descendant div
	    event.stopPropagation();
	});

	$(document).on('click', '.js-mb-filters', function(event) {

		$('#secondary').toggleClass('js-active');
	});
	// var lastScrollTop = 0;
	
	// $(window).on('scroll', function(event) {

	// 	// if ($(window).width() < 640) {
	// 		var st = $(this).scrollTop();
	// 		if (st > lastScrollTop){
	// 		    // downscroll code
	// 		    $('header.novon').removeClass('js-active');
	// 		} else {
	// 		   // upscroll code
	// 		    $('header.novon').addClass('js-active');
	// 		}
	// 		lastScrollTop = st;
	// 	// }

	// });

	$(document).ready(function(){

		$('#nav-icon3').click(function(){
			$(this).toggleClass('open');
			$('.mobile-menu').toggleClass('js-active');
		});

		$(".js-modal-btn").modalVideo();

	});

});
