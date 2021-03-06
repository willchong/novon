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

	$(document).on('click', '.configurator-toggle button', function(event) {

		$('.configurator-toggle button').removeClass('js-active');
		if ($(this).hasClass('js-original') && !$(this).hasClass('js-active')) {
			$('.js-configurator').addClass('js-active');
			$('.js-miniconfigurator').removeClass('js-active');
			$(this).addClass('js-active');
		} else {
			$('.js-miniconfigurator').addClass('js-active');
			$('.js-configurator').removeClass('js-active');
			$(this).addClass('js-active');
		}
		
	});

	$(document).on('click', '.js-configurator .selections .header', function(event) {

		$(this).toggleClass('js-active');
		$(this).siblings('.thumbnails').toggleClass('js-active');

	});

	$(document).on('click', '.js-configurator .js-add', function(event) {

		if ($(this).closest('.phase').hasClass('js-phase-1')) {
			$("html, body").animate({ scrollTop: ($('.js-configurator .tops').offset().top-84)+'px' });
		} else {
			$("html, body").animate({ scrollTop: ($('.js-configurator .attachments').offset().top-84)+'px' });
		}

	});

	$(document).on('click', '.js-configurator .configurator-tops .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.js-configurator .js-preview').offset().top-84)+'px' });

		// console.log($('.js-preview').offset().top-84);

		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
			resetConfigurator(event);
			return;
		} else {
			$('.js-configurator .configurator-tops .thumbnail').removeClass('js-active');
			$(this).addClass('js-active');
		}

		var _s = {};

		$.each($(this).data(), function(i, v) {
		    _s[i] = v;
		});

		//update imagery
		$('.js-configurator .js-phase-1 .instructions').addClass('js-hidden');


		//show applicable attachments
		//reset all disabled
		$('.js-configurator .configurator-attachments .thumbnail').removeClass('js-disabled');
		
		//if earrings or pendants, disable double coin
		if (_s.productCategory.indexOf('earrings') >= 0 || _s.productCategory.indexOf('pendants') >= 0 ) {
			// console.log('exclusion');
			$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"][data-product-type="double"]').addClass('js-disabled');
			$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"][data-product-type="double"]').removeClass('js-active');
			$('.js-configurator .configurator-attachments .thumbnail').removeClass('js-active');

		//if chains, disable all single clasps
		} else if (_s.productCategory.indexOf('chains') >= 0) {
			$('.js-configurator .configurator-attachments .thumbnail[data-product-type="single"]').addClass('js-disabled').removeClass('js-active');

		}

		//toggle attachments visible
		$('.js-configurator .attachments .header').addClass('js-active');
		$('.js-configurator .attachments .configurator-attachments').addClass('js-active');
		$('.js-configurator .preview .js-phase-2').addClass('js-active');

		evaluateCombo();

	});

	$(document).on('click', '.js-configurator .configurator-attachments .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.fancy-header').offset().top-84)+'px' });

		console.log($('.fancy-header').offset().top-84);

		var _type = $(this).data('product-type');
		var _category = $(this).data('product-category');

		console.log($(this));

		//if it's a chain use chain logic
		if ($('.js-configurator .configurator-tops .thumbnail.js-active').data('product-category') == "chains") {

			if ($(this).hasClass('js-active')) {

				var _firsts =  $('.js-configurator .configurator-attachments .thumbnail.js-first').length;
				var _seconds =  $('.js-configurator .configurator-attachments .thumbnail.js-second').length;

				if ($(this).hasClass('js-first')) {
					
					if (_seconds > 0) {
						$('.js-configurator .configurator-attachments .thumbnail.js-active.js-first').removeClass('js-first').removeClass('js-active');
						$('.js-configurator .configurator-attachments .thumbnail.js-second').removeClass('js-second').addClass('js-first');
					} else {
						$('.js-configurator .configurator-attachments .thumbnail.js-first').removeClass('js-first').removeClass('js-active');
					}

				} else if ($(this).hasClass('js-second')) {

					$('.js-configurator .configurator-attachments .thumbnail.js-second').removeClass('js-second').removeClass('js-active');

				} else {
					$(this).removeClass('js-active');
				}

			} else {

				var _attach = $('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category!="coin"]').length;
				var _coins = $('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category="coin"]').length;
				console.log("attach: "+_attach);
				console.log("coins: "+_coins);

				var _cat = $(this).data('product-category');
				console.log(_cat);

				if (_cat != "coin") {

					if (_attach == 0) {
						$(this).addClass('js-first');
						$(this).addClass('js-active');
					} else if (_attach == 1 && _coins == 0) {
						$(this).addClass('js-second');
						$(this).addClass('js-active');
					} else if (_attach == 1 && _coins == 1) {
						console.log('swap attachments');
						var _previous;
						if ($('.js-configurator .configurator-attachments .thumbnail.js-first').data('product-category') == 'coin') {
							_previous = "coin";
						} else if ($('.js-configurator .configurator-attachments .thumbnail.js-first').data('product-category') != 'coin') {
							_previous = "other";
						}
						console.log(_previous);
						$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"]').removeClass('js-active').removeClass('js-first').removeClass('js-second');
						$(this).addClass('js-second');
						$(this).addClass('js-active');
					} else if (_attach >= 2) {
						$('.js-configurator .configurator-attachments .thumbnail.js-first[data-product-category!="coin"]').removeClass('js-first').addClass('js-second').removeClass('js-active');
						$('.js-configurator .configurator-attachments .thumbnail.js-active.js-second[data-product-category!="coin"]').removeClass('js-second').addClass('js-first');
						$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"]').removeClass('js-active').removeClass('js-first').removeClass('js-second');

						$(this).addClass('js-active');
						$(this).addClass('js-second');
					}


				} else if (_cat == "coin") {

					if (_attach == 0 && _coins == 0) {
						$(this).addClass('js-first');
						$(this).addClass('js-active');
					} else if (_attach == 1 && _coins == 0) {
						$(this).addClass('js-second');
						$(this).addClass('js-active');
					} else if (_attach == 1 && _coins == 1) {
						//leave attachment - change coin
						// $('.configurator-attachments .thumbnail.js-active.js-first[data-product-category!="coin"]').removeClass('js-first').removeClass('js-active');
						// $('.configurator-attachments .thumbnail.js-active.js-second[data-product-category!="coin"]').removeClass('js-second').addClass('js-first');
						$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"]').removeClass('js-active');
						$(this).addClass('js-active');
						$(this).addClass('js-second');
					} else if (_attach == 2 && _coins == 0) {
						$('.js-configurator .configurator-attachments .thumbnail.js-active.js-first[data-product-category!="coin"]').removeClass('js-first').removeClass('js-active');
						$('.js-configurator .configurator-attachments .thumbnail.js-active.js-second[data-product-category!="coin"]').removeClass('js-second').addClass('js-first');
						$('.js-configurator .configurator-attachments .thumbnail[data-product-category="coin"]').removeClass('js-active');
						$(this).addClass('js-active');
						$(this).addClass('js-second');
					}

				}

			}

		} else {
		//else if it is not a chain

			if ($(this).hasClass('js-active')) {
				$(this).removeClass('js-active');
			} else {
				$('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-type="'+_type+'"]').removeClass('js-active');
				$(this).addClass('js-active');
			}
			//if single coin - remove any active single / double attachments
			if (_category == "coin" && _type == "single") {
				$('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
				$('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');
				$('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category="cabochon"]').removeClass('js-active');

			}
			//if double oval / sphere, remove any single coins
			if (_category == "oval" &&  _type == "double" || _category == "sphere" && _type == "double" || _category == "cabochon" && _type == "double") {
				$('.js-configurator .configurator-attachments .thumbnail.js-active[data-product-category="coin"]').removeClass('js-active');
			}

		}

		$('.js-configurator .js-phase-2 .instructions').addClass('js-hidden');


		evaluateCombo();

	});

	$(document).on('click', '.js-configurator .js-reset', resetConfigurator);

	$(document).on('click', '.js-configurator .js-add-items', function(event) {

		event.preventDefault();
		var _selections = [];

		var _category = $('.js-configurator .configurator-tops .thumbnail.js-active').data('product-category');

		if (_category == "earrings") {

			_selections.push($('.js-configurator .configurator-tops .thumbnail.js-active').data('product-id'));
			// _selections.push($('.configurator-tops .thumbnail.js-active').data('product-id')+":1");

			$.each($('.js-configurator .configurator-attachments .thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id')+":2");
			});

		} else {

			$.each($('.js-configurator .thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id'));
			});
			
		}

		console.log(_selections.join());

		window.location.href = window.location.origin+"/cart/?add-to-cart="+_selections.join();


	});

	$(document).on('click', '.js-configurator .js-liveview', function(event) {

		var _category = $('.js-configurator .configurator-tops .thumbnail.js-active').data('product-category');

		event.preventDefault();
		if ($(this).hasClass('disabled')) {
			if (_category == "chains") {
				alert('Please add 2 attachments for preview');
			} else {
				alert('Please add attachments for preview');
			}
			return;
		}
		$('.js-configurator .js-modal').addClass('js-active');
		// $('body,html').addClass('overlay');
		$(".js-configurator .js-preview").clone().appendTo("section.js-configurator-modal");
		var templateUrl = CORE.templateUrl;
		console.log(templateUrl);



		if (_category == "pendants") {
			//activate pendant bg
			var _img = $('.js-configurator .js-configurator-modal .js-phase-1 .piece').attr('src').split('/straight/')[1];
			$('.js-configurator .js-configurator-modal .js-phase-1 .piece').attr('src', templateUrl+'/novon/images/configurator/pendants/liveview/'+_img);
			$('.js-configurator .js-lp-pendants-bg').addClass('js-active');
		} else if (_category == "earrings") {
			//activate earrings bg
			var _img = $('.js-configurator .js-configurator-modal .js-phase-1 .piece').attr('src').split('/straight/')[1];
			$('.js-configurator .js-configurator-modal .js-phase-1 .piece').attr('src', templateUrl+'/novon/images/configurator/earrings/liveview/'+_img);
			$('.js-configurator .js-lp-earrings-bg').addClass('js-active');
		} else if (_category == "chains") {
			//replace items
			$('.js-configurator .js-configurator-modal .js-phase-1 .piece').attr('src', templateUrl+'/novon/images/configurator/chains/liveview/top.png');
			$('.js-configurator .js-configurator-modal .js-phase-4 .piece').attr('src', templateUrl+'/novon/images/configurator/chains/liveview/bottom.png');
			//activate chain bg
			$('.js-configurator .js-lp-necklaces-bg').addClass('js-active');
		}



	});

	$(document).on('click', '.js-configurator .js-modal-close', function(event) {

		$('.js-configurator .js-modal').removeClass('js-active');
		$('body,html').removeClass('overlay');
		$('.js-configurator .js-configurator-modal').empty();
		$('.js-configurator .js-lp-pendants-bg').removeClass('js-active');
		$('.js-configurator .js-lp-earrings-bg').removeClass('js-active');
		$('.js-configurator .js-lp-necklaces-bg').removeClass('js-active');

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

		$('.js-configurator .js-preview').removeClass().addClass('preview').addClass('js-preview');


		$.each($('.js-configurator .thumbnail.js-active'), function(k,v) {

			if ($(this).data('product-type') == "double") {
				_types.splice(1, 0, $(this).data('product-type'));
				_categories.splice(1, 0, $(this).data('product-category'));
				_slugs.splice(1, 0, $(this).data('product-slug'));
				_names.splice(1, 0, $(this).data('product-name'));
				_prices.splice(1, 0, $(this).data('product-price'));
				_images_straight.splice(1, 0, $(this).data('product-conf'));
				_images_turned.splice(1, 0, $(this).data('product-conf-alt'));
			} else { 
				_types.push($(this).data('product-type'));
				_categories.push($(this).data('product-category'));
				_slugs.push($(this).data('product-slug'));
				_names.push($(this).data('product-name'));
				_prices.push($(this).data('product-price'));
				_images_straight.push($(this).data('product-conf'));
				_images_turned.push($(this).data('product-conf-alt'));
			}

			$('.js-configurator .js-preview').addClass('js-'+$(this).data('product-type')+'-'+$(this).data('product-category'));

			// console.log(k);
			// console.log(v);
			

		});
	
		console.log(_types);
		console.log(_categories);


	}).fadeIn('fast');

	
	$('.js-configurator .js-preview .piece, .js-configurator .js-summary, .js-configurator .js-buttons').fadeOut('fast', function() {

		// console.log(_categories);

		$('.js-configurator .js-preview .piece').attr('src', '');
		$('.js-configurator .js-summary ul').empty();

		if (_categories.indexOf('earrings') >= 0) {
			$('.js-configurator .js-earring-clone').addClass('js-active');
		} else {
			$('.js-configurator .js-earring-clone').removeClass('js-active');
		}

		if (_categories.indexOf('chains') >= 0) {

			// console.log('do chain stuff');

			console.log(_categories);

			//first and last chain pieces
			$('.js-configurator .js-phase-1 .piece').attr('src', _images_straight[0]);
			$('.js-configurator .js-phase-1 .piece').data('hover', _names[0]);
			$('.js-configurator .js-phase-1 .piece').data('link', _slugs[0]);
			$('.js-configurator .js-phase-4 .piece').attr('src', _images_turned[0]);
			$('.js-configurator .js-phase-4 .piece').data('hover', _names[0]);
			$('.js-configurator .js-phase-4 .piece').data('link', _slugs[0]);

			console.log(_categories);

		

			var sphereIndex = _categories.indexOf('sphere');
			var ovalIndex = _categories.indexOf('oval');
			var coinIndex = _categories.indexOf('coin');
			var cabochonIndex = _categories.indexOf('cabochon');

			if (coinIndex < 0) {
				$('.js-configurator .js-preview').addClass('js-chain-override');
				// $('.js-phase-2').addClass('js-hidden');
				var _temp = [];
				for (var x=1; x<_categories.length; x++) {
					_temp.push(_categories[x]);
				}
				console.log(_temp.join('-'));
				$('.js-configurator .js-preview').addClass(_temp.join('-'));

				for (var i=1; i<3; i++) {
					//if even, show turned
					if ((i+1) % 2 == 0) {
						$('.js-configurator .js-phase-'+(i+1)+' .piece').attr('src', _images_straight[i]);
						$('.js-configurator .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
						$('.js-configurator .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
						// console.log(_images_straight[i]);
					//if odd, show straight
					} else {
						$('.js-configurator .js-phase-'+(i+1)+' .piece').attr('src', _images_turned[i]);
						$('.js-configurator .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
						$('.js-configurator .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
						// console.log(_images_turned[i]);
					}

				}

			} else {
				$('.js-configurator .js-phase-2').removeClass('js-hidden');
				$('.js-configurator .js-phase-2 .piece').attr('src', _images_straight[coinIndex]);
				$('.js-configurator .js-phase-2 .piece').data('hover', _names[coinIndex]);
				$('.js-configurator .js-phase-2 .piece').data('link', _slugs[coinIndex]);


				if (sphereIndex < 0 && ovalIndex < 0 && cabochonIndex < 0) {
					$('.js-configurator .js-phase-3').addClass('js-hidden');
				} else {
					$('.js-configurator .js-phase-3').removeClass('js-hidden');
				}

				if (sphereIndex > 0) {
					$('.js-configurator .js-phase-3 .piece').attr('src', _images_turned[sphereIndex]);
					$('.js-configurator .js-phase-3 .piece').data('hover', _names[sphereIndex]);
					$('.js-configurator .js-phase-3 .piece').data('link', _slugs[sphereIndex]);
				} else if (ovalIndex > 0) {
					$('.js-configurator .js-phase-3 .piece').attr('src', _images_turned[ovalIndex]);
					$('.js-configurator .js-phase-3 .piece').data('hover', _names[ovalIndex]);
					$('.js-configurator .js-phase-3 .piece').data('link', _slugs[ovalIndex]);
				} else {
					$('.js-configurator .js-phase-3 .piece').attr('src', _images_turned[cabochonIndex]);
					$('.js-configurator .js-phase-3 .piece').data('hover', _names[cabochonIndex]);
					$('.js-configurator .js-phase-3 .piece').data('link', _slugs[cabochonIndex]);
				}

			}


			// console.log(_names);

			

			if (_categories.length < 3) {
				$('.js-configurator .js-preview').addClass('js-incomplete');
				$('.js-configurator .js-liveview').addClass('disabled');
			} else {
				$('.js-configurator .js-liveview').removeClass('disabled');
				$('.js-configurator .js-preview').removeClass('js-incomplete');
			}

			for (var i=0; i<_categories.length; i++) {
				var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
				$('.js-configurator .js-summary ul').append(_template);
			}

		} else {

			// if (_types.indexOf('double') >= 0) {
			// 	console.log('hello from double');
			// 	console.log(_types);
			// 	console.log(_categories);
			// }

			$('.js-configurator .js-phase-2').removeClass('js-hidden');
			$('.js-configurator .js-phase-3').removeClass('js-hidden');


			for (var i=0; i<_categories.length; i++) {
				//if even, show turned
				if ((i+1) % 2 == 0) {
					$('.js-configurator .js-phase-'+(i+1)+' .piece').attr('src', _images_turned[i]);
					$('.js-configurator .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
					$('.js-configurator .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
				//if odd, show straight
				} else {
					$('.js-configurator .js-phase-'+(i+1)+' .piece').attr('src', _images_straight[i]);
					$('.js-configurator .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
					$('.js-configurator .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
				}

				if (_categories.indexOf('earrings') >= 0) {
					if (i > 0) {
						var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+" x 2</a></li>";
						$('.js-configurator .js-summary ul').append(_template);
					} else {
						var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
						$('.js-configurator .js-summary ul').append(_template);
					}
				} else {
					var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
					$('.js-configurator .js-summary ul').append(_template);
					
				}

			}

			if (_categories.length < 2) {
				$('.js-configurator .js-liveview').addClass('disabled');
			} else {
				$('.js-configurator .js-liveview').removeClass('disabled');
			}

		}

		$.each($('.js-configurator .js-preview .phase'), function(j,k) {

			var _text = $(this).find('.piece').data('hover');
			var _link = $(this).find('.piece').data('link');
			if (_text != "" && _text != undefined) {
				$(this).find('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');
			}
		});

	}).fadeIn('fast');

	$(document).on('mouseover', '.js-configurator .js-preview .phase', function(event) {

			var _label = $(this).find('.piece').siblings('label').html();
			if (_label != "") {
				$(this).find('.piece').siblings('label').addClass('js-active');
			}

	});

	$(document).on('mouseout', '.js-configurator .js-preview .phase', function(event) {

		$(this).find('.piece').siblings('label').removeClass('js-active');

	});


}

function resetConfigurator(event) {

	event.preventDefault();

	$('.js-configurator .thumbnail').removeClass('js-active');
	$('.js-configurator .phase .instructions').removeClass('js-hidden');
	$('.js-configurator .phase .piece').attr('src', '');
	$('.js-configurator .js-summary ul').empty();
	$('.js-configurator .attachments .header').removeClass('js-active');
	$('.js-configurator .attachments .configurator-attachments').removeClass('js-active');
	$('.js-configurator .attachments .configurator-attachments').removeClass('js-first');
	$('.js-configurator .attachments .configurator-attachments').removeClass('js-second');
	$('.js-configurator .preview .js-phase-2').removeClass('js-active');

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

function swap(input, index_A, index_B) {
    var temp = input[index_A];
 
    input[index_A] = input[index_B];
    input[index_B] = temp;
}
