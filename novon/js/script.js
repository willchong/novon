$(function(){

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
	          centerPadding: '0',
	          arrows: false
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
	  slidesToShow: 3,
	  responsive: [
	      {
	        breakpoint: 640,
	        settings: {
	          slidesToShow: 1
	        }
	      }
	    ]
	});

	$('.js-attachments').slick({
	  centerMode: false,
	  // dots: true,
	  slidesToShow: 3,
	  responsive: [
	      {
	        breakpoint: 640,
	        settings: {
	          slidesToShow: 1
	        }
	      }
	    ]
	});

	$('.tops .js-icon').on('click', function(event) {
		$('.js-tops').slick('slickUnfilter');
		$('.js-tops').slick('slickSetOption', 'slidesToShow', 3, true);
		$(this).toggleClass('js-active');
		var filter = [];
		$('.tops .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-tops').slick('slickFilter', String(filter));
			// $('.js-tops').slick('slickSetOption', 'slidesToShow', 3, true);
		} 
	});

	$('.attachments .js-icon').on('click', function(event) {
		$('.js-attachments').slick('slickUnfilter');
		$('.js-tops').slick('slickSetOption', 'slidesToShow', 3, true);
		$(this).toggleClass('js-active');
		var filter = [];
		$('.attachments .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-attachments').slick('slickFilter', String(filter));
			// $('.js-tops').slick('slickSetOption', 'slidesToShow', 3, true);
		}

	});


});
