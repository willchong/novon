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

});
