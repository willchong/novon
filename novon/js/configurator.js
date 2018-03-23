$(function(){

	// console.log(CORE.template_url);

	$(document).on('click', '.selections .header', function(event) {

		$(this).toggleClass('js-active');
		$(this).siblings('.thumbnails').toggleClass('js-active');

	});

	$(document).on('click', '.js-add', function(event) {

		$("html, body").animate({ scrollTop: ($('.tops').offset().top-84)+'px' });

	});

	$(document).on('click', '.configurator-tops .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.fancy-header').offset().top-84)+'px' });

		console.log($('.fancy-header').offset().top-84);

		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
			resetConfigurator(event);
			return;
		} else {
			$('.configurator-tops .thumbnail').removeClass('js-active');
			$(this).addClass('js-active');
		}

		var _s = {};

		$.each($(this).data(), function(i, v) {
		    _s[i] = v;
		});

		// console.log(_s);

		//print summary
		// $('.summary .tops').empty();
		// var _template = "<li><a href='"+window.location.origin+'/product/'+_s.productSlug+"' target='_blank'>"+_s.productName+"</a></li>";
		// $('.summary .tops').append(_template);

		//update imagery
		$('.js-phase-1 .instructions').addClass('js-hidden');
		// $('.js-phase-1 .piece').attr('src', _s.productImage);
		//hardcode
		// $('.js-phase-1 .piece').attr('src', CORE.template_url+'/novon/images/configurator/test-top.png');

		//show applicable attachments
		//reset all disabled
		$('.configurator-attachments .thumbnail').removeClass('js-disabled');
		
		//if earrings or pendants, disable double coin
		if (_s.productCategory.indexOf('earrings') >= 0 || _s.productCategory.indexOf('pendants') >= 0 ) {
			// console.log('exclusion');
			$('.configurator-attachments .thumbnail[data-product-category="coin"][data-product-type="double"]').addClass('js-disabled');
			$('.configurator-attachments .thumbnail[data-product-category="coin"][data-product-type="double"]').removeClass('js-active');

		//if chains, disable all single clasps
		} else if (_s.productCategory.indexOf('chains') >= 0) {
			$('.configurator-attachments .thumbnail[data-product-type="single"]').addClass('js-disabled').removeClass('js-active');

		}

		//toggle attachments visible
		$('.attachments .header').addClass('js-active');
		$('.attachments .configurator-attachments').addClass('js-active');
		$('.preview .js-phase-2').addClass('js-active');

		evaluateCombo();

	});

	$(document).on('click', '.configurator-attachments .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.fancy-header').offset().top-84)+'px' });

		console.log($('.fancy-header').offset().top-84);

		var _type = $(this).data('product-type');
		var _category = $(this).data('product-category');

		//if it's a chain use chain logic
		if ($('.configurator-tops .thumbnail.js-active').data('product-category') == "chains") {

			if ($(this).hasClass('js-active')) {
				$(this).removeClass('js-active');
			} else {
				if ($(this).data('product-category') == 'sphere' || $(this).data('product-category') == 'oval') {
					$('.configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
					$('.configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');
					$(this).addClass('js-active');
				} else {
					$('.configurator-attachments .thumbnail.js-active[data-product-category="'+_category+'"]').removeClass('js-active');
					$(this).addClass('js-active');
				}
			}

		} else {

			if ($(this).hasClass('js-active')) {
				$(this).removeClass('js-active');
			} else {
				$('.configurator-attachments .thumbnail.js-active[data-product-type="'+_type+'"]').removeClass('js-active');
				$(this).addClass('js-active');
			}
			//if single coin - remove any active single / double attachments
			if (_category == "coin" && _type == "single") {
				$('.configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
				$('.configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');

			}
			//if double oval / sphere, remove any single coins
			if (_category == "oval" &&  _type == "double" || _category == "sphere" && _type == "double") {
				$('.configurator-attachments .thumbnail.js-active[data-product-category="coin"]').removeClass('js-active');
			}

		}


		


		$('.js-phase-2 .instructions').addClass('js-hidden');


		evaluateCombo();

	});

	$(document).on('click', '.js-reset', event, resetConfigurator);

	$(document).on('click', '.js-add-items', function(event) {

		event.preventDefault();
		var _selections = [];

		$.each($('.thumbnail.js-active'), function(i,v) {
			_selections.push($(this).data('product-id'));
		});

		console.log(_selections.join());

		window.location.href = window.location.origin+"/cart/?add-to-cart="+_selections.join();


	});

});

function evaluateCombo() {

	//evaluate and set images and summary

	var _types = [];
	var _categories = [];
	var _images_straight = [];
	var _images_turned = [];
	var _slugs = [];
	var _names = [];

	$('.js-preview').removeClass().addClass('preview').addClass('js-preview');

	$.each($('.thumbnail.js-active'), function(k,v) {

		_types.push($(this).data('product-type'));
		_categories.push($(this).data('product-category'));
		_slugs.push($(this).data('product-slug'));
		_names.push($(this).data('product-name'));
		_images_straight.push($(this).data('product-conf'));
		_images_turned.push($(this).data('product-conf-alt'));

		$('.js-preview').addClass('js-'+$(this).data('product-type')+'-'+$(this).data('product-category'));

		console.log(k);
		console.log(v);
	});
	
	// $('.js-preview .piece, .js-summary, .js-buttons').fadeOut('fast', function() {
	$('.js-preview .piece, .js-summary, .js-buttons').fadeOut('fast', function() {

		console.log(_categories);

		$('.js-preview .piece').attr('src', '');
		$('.js-summary ul').empty();

		if (_categories.indexOf('chains') >= 0) {

			console.log('do chain stuff');
			$('.js-phase-1 .piece').attr('src', _images_straight[0]);
			$('.js-phase-4 .piece').attr('src', _images_turned[0]);

			var sphereIndex = _categories.indexOf('sphere');
			var ovalIndex = _categories.indexOf('oval');
			var coinIndex = _categories.indexOf('coin');

			if (coinIndex < 0) {
				$('.js-phase-2').addClass('js-hidden');
			} else {
				$('.js-phase-2').removeClass('js-hidden');
				$('.js-phase-2 .piece').attr('src', _images_straight[coinIndex]);

			}

			if (sphereIndex < 0 && ovalIndex < 0) {
				$('.js-phase-3').addClass('js-hidden');
			} else {
				$('.js-phase-3').removeClass('js-hidden');
			}

			if (sphereIndex > 0) {
				$('.js-phase-3 .piece').attr('src', _images_turned[sphereIndex]);
			} else {
				$('.js-phase-3 .piece').attr('src', _images_turned[ovalIndex]);
			}

			if (_categories.length < 3) {
				$('.js-preview').addClass('js-incomplete');
			} else {
				$('.js-preview').removeClass('js-incomplete');
			}

			for (var i=0; i<_categories.length; i++) {
				var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+"</a></li>";
				$('.js-summary ul').append(_template);
			}

		} else {

			$('.js-phase-2').removeClass('js-hidden');
			$('.js-phase-3').removeClass('js-hidden');

			for (var i=0; i<_categories.length; i++) {
				//if even, show turned
				if ((i+1) % 2 == 0) {
					$('.js-phase-'+(i+1)+' .piece').attr('src', _images_turned[i]);
				//if odd, show straight
				} else {
					$('.js-phase-'+(i+1)+' .piece').attr('src', _images_straight[i]);
				}
				var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+"</a></li>";
				$('.js-summary ul').append(_template);
			}

		}

		

	}).fadeIn('fast');

	


	// $('.js-preview .piece').fadeIn('fast');

	// if (_types.indexOf('double') > 0) {
	// 	console.log('double exists');

	// } else {
	// 	console.log('no double');

	// }

	// console.log(_categories);
	// console.log(_images_straight);
	// console.log(_images_turned);



}

function specialExceptions(type) {

	switch(type) {

	}

}

function resetConfigurator(event) {

	event.preventDefault();

	$('.thumbnail').removeClass('js-active');
	$('.phase .instructions').removeClass('js-hidden');
	$('.phase .piece').attr('src', '');
	$('.js-summary ul').empty();
	$('.attachments .header').removeClass('js-active');
	$('.attachments .configurator-attachments').removeClass('js-active');
	$('.preview .js-phase-2').removeClass('js-active');

}
