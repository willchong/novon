$(function(){

	tippy('.thumbnail img', {
		theme: "novon",
		animation: "shift-away"
	});

	// console.log(CORE.template_url);
	if (getQueryVariable('wmc-currency') == "CAD") {
		CORE.currency = "CAD";
	} else {
		CORE.currency = "USD";
	}
	console.log(CORE.currency);

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
				if ($(this).data('product-category') == 'sphere' || $(this).data('product-category') == 'oval' || $(this).data('product-category') == 'cabochon') {
					$('.configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
					$('.configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');
					$('.configurator-attachments .thumbnail.js-active[data-product-category="cabochon"]').removeClass('js-active');
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
				$('.configurator-attachments .thumbnail.js-active[data-product-category="cabochon"]').removeClass('js-active');

			}
			//if double oval / sphere, remove any single coins
			if (_category == "oval" &&  _type == "double" || _category == "sphere" && _type == "double" || _category == "cabochon" && _type == "double") {
				$('.configurator-attachments .thumbnail.js-active[data-product-category="coin"]').removeClass('js-active');
			}

		}

		$('.js-phase-2 .instructions').addClass('js-hidden');


		evaluateCombo();

	});

	$(document).on('click', '.js-reset', resetConfigurator);

	$(document).on('click', '.js-add-items', function(event) {

		event.preventDefault();
		var _selections = [];

		var _category = $('.configurator-tops .thumbnail.js-active').data('product-category');

		if (_category == "earrings") {

			_selections.push($('.configurator-tops .thumbnail.js-active').data('product-id'));
			// _selections.push($('.configurator-tops .thumbnail.js-active').data('product-id')+":1");

			$.each($('.configurator-attachments .thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id')+":2");
			});

		} else {

			$.each($('.thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id'));
			});
			
		}

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
	var _prices = [];


	
	// $('.js-preview .piece, .js-summary, .js-buttons').fadeOut('fast', function() {

	$('.js-dummy').fadeOut('fast', function() {

		$('.js-preview').removeClass().addClass('preview').addClass('js-preview');


		$.each($('.thumbnail.js-active'), function(k,v) {

			_types.push($(this).data('product-type'));
			_categories.push($(this).data('product-category'));
			_slugs.push($(this).data('product-slug'));
			_names.push($(this).data('product-name'));
			_prices.push($(this).data('product-price'));
			_images_straight.push($(this).data('product-conf'));
			_images_turned.push($(this).data('product-conf-alt'));

			$('.js-preview').addClass('js-'+$(this).data('product-type')+'-'+$(this).data('product-category'));

			console.log(k);
			console.log(v);
		});

	}).fadeIn('fast');

	$('.js-preview .piece, .js-summary, .js-buttons').fadeOut('fast', function() {

		console.log(_categories);

		$('.js-preview .piece').attr('src', '');
		$('.js-summary ul').empty();

		if (_categories.indexOf('earrings') >= 0) {
			$('.js-earring-clone').addClass('js-active');
		} else {
			$('.js-earring-clone').removeClass('js-active');
		}

		if (_categories.indexOf('chains') >= 0) {

			console.log('do chain stuff');
			$('.js-phase-1 .piece').attr('src', _images_straight[0]);
			$('.js-phase-1 .piece').data('hover', _names[0]);
			$('.js-phase-1 .piece').data('link', _slugs[0]);
			$('.js-phase-4 .piece').attr('src', _images_turned[0]);
			$('.js-phase-4 .piece').data('hover', _names[0]);
			$('.js-phase-4 .piece').data('link', _slugs[0]);

			var sphereIndex = _categories.indexOf('sphere');
			var ovalIndex = _categories.indexOf('oval');
			var coinIndex = _categories.indexOf('coin');
			var cabochonIndex = _categories.indexOf('cabochon');

			if (coinIndex < 0) {
				$('.js-phase-2').addClass('js-hidden');
			} else {
				$('.js-phase-2').removeClass('js-hidden');
				$('.js-phase-2 .piece').attr('src', _images_straight[coinIndex]);
				$('.js-phase-2 .piece').data('hover', _names[coinIndex]);
				$('.js-phase-2 .piece').data('link', _slugs[coinIndex]);

			}

			if (sphereIndex < 0 && ovalIndex < 0 && cabochonIndex < 0) {
				$('.js-phase-3').addClass('js-hidden');
			} else {
				$('.js-phase-3').removeClass('js-hidden');
			}

			if (sphereIndex > 0) {
				$('.js-phase-3 .piece').attr('src', _images_turned[sphereIndex]);
				$('.js-phase-3 .piece').data('hover', _names[sphereIndex]);
				$('.js-phase-3 .piece').data('link', _slugs[sphereIndex]);
			} else if (ovalIndex > 0) {
				$('.js-phase-3 .piece').attr('src', _images_turned[ovalIndex]);
				$('.js-phase-3 .piece').data('hover', _names[ovalIndex]);
				$('.js-phase-3 .piece').data('link', _slugs[ovalIndex]);
			} else {
				$('.js-phase-3 .piece').attr('src', _images_turned[cabochonIndex]);
				$('.js-phase-3 .piece').data('hover', _names[cabochonIndex]);
				$('.js-phase-3 .piece').data('link', _slugs[cabochonIndex]);
			}

			if (_categories.length < 3) {
				$('.js-preview').addClass('js-incomplete');
			} else {
				$('.js-preview').removeClass('js-incomplete');
			}

			for (var i=0; i<_categories.length; i++) {
				var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
				$('.js-summary ul').append(_template);
			}

		} else {

			$('.js-phase-2').removeClass('js-hidden');
			$('.js-phase-3').removeClass('js-hidden');

			for (var i=0; i<_categories.length; i++) {
				//if even, show turned
				if ((i+1) % 2 == 0) {
					$('.js-phase-'+(i+1)+' .piece').attr('src', _images_turned[i]);
					$('.js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
					$('.js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
				//if odd, show straight
				} else {
					$('.js-phase-'+(i+1)+' .piece').attr('src', _images_straight[i]);
					$('.js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
					$('.js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
				}

				if (_categories.indexOf('earrings') >= 0) {
					if (i > 0) {
						var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+" x 2</a></li>";
						$('.js-summary ul').append(_template);
					} else {
						var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
						$('.js-summary ul').append(_template);
					}
				} else {
					var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
					$('.js-summary ul').append(_template);
					
				}

			}

		}

		// $('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');

		$.each($('.js-preview .phase'), function(j,k) {

			var _text = $(this).find('.piece').data('hover');
			var _link = $(this).find('.piece').data('link');
			if (_text != "" && _text != undefined) {
				$(this).find('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');
			}
		});

	}).fadeIn('fast');

	

	$(document).on('mouseover', '.js-preview .phase', function(event) {

		// var _text = $(this).find('.piece').data('hover');
		// var _link = $(this).find('.piece').data('link');
		// if (_text != "" && _text != undefined) {
			// $(this).find('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');
			var _label = $(this).find('.piece').siblings('label').html();
			if (_label != "") {
				$(this).find('.piece').siblings('label').addClass('js-active');
			}
		// }
		// $(this).attr('alt', _text);
		// console.log($(this).data('hover'));
	});

	$(document).on('mouseout', '.js-preview .phase', function(event) {

		// var _text = $(this).data('hover');
		// $(this).siblings('label').html(_text);
		$(this).find('.piece').siblings('label').removeClass('js-active');
		// $(this).attr('alt', _text);
		// console.log($(this).data('hover'));
	});


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

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
