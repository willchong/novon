$(function(){

	$('.swiper-wrapper').slick({
	  centerMode: true,
	  centerPadding: '25%',
	  dots: true,
	  slidesToShow: 1
	  // responsive: [
	  //   {
	  //     breakpoint: 768,
	  //     settings: {
	  //       arrows: false,
	  //       centerMode: true,
	  //       centerPadding: '40px',
	  //       slidesToShow: 3
	  //     }
	  //   },
	  //   {
	  //     breakpoint: 480,
	  //     settings: {
	  //       arrows: false,
	  //       centerMode: true,
	  //       centerPadding: '40px',
	  //       slidesToShow: 1
	  //     }
	  //   }
	  // ]
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
	  centerMode: true,
	  centerPadding: 0,
	  // dots: true,
	  slidesToShow: 3
	});

	$('.js-attachments').slick({
	  centerMode: true,
	  centerPadding: 0,
	  // dots: true,
	  slidesToShow: 3
	});

	$('.tops .js-icon').on('click', function(event) {
		$('.js-tops').slick('slickUnfilter');
		$(this).toggleClass('js-active');
		var filter = [];
		$('.tops .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-tops').slick('slickFilter', String(filter));
		}
	});

	$('.attachments .js-icon').on('click', function(event) {
		$('.js-attachments').slick('slickUnfilter');
		$(this).toggleClass('js-active');
		var filter = [];
		$('.attachments .js-icon').each(function(index) {
			if ($(this).hasClass('js-active')) {
				filter.push("."+$(this).data('filter'));
			}
		});
		if (filter.length != 0) {
			$('.js-attachments').slick('slickFilter', String(filter));
		}

	});


});
