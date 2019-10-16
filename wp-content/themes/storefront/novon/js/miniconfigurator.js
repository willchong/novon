$(function(){

	$(document).on('click', '.js-miniconfigurator .selections .header', function(event) {

		$(this).toggleClass('js-active');
		$(this).siblings('.thumbnails').toggleClass('js-active');

	});

	$(document).on('click', '.js-miniconfigurator .js-add', function(event) {

		if ($(this).closest('.phase').hasClass('js-phase-1')) {
			$("html, body").animate({ scrollTop: ($('.js-miniconfigurator .tops').offset().top-84)+'px' });
		} else {
			$("html, body").animate({ scrollTop: ($('.js-miniconfigurator .attachments').offset().top-84)+'px' });
		}

	});

	$(document).on('click', '.js-miniconfigurator .js-add-second-piece', function(event) {

		$('.second-selections').addClass('js-active');
		$(this).hide();

	});

	$(document).on('click', '.js-miniconfigurator .selections .configurator-tops .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.js-miniconfigurator .js-preview').offset().top-84)+'px' });

		// console.log($('.js-preview').offset().top-84);

		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
			$('.mini-configurator-bg').removeClass('js-active');
			resetMiniConfigurator(event);
			return;
		} else {
			$('.js-miniconfigurator .selections .configurator-tops .thumbnail').removeClass('js-active');
			$(this).addClass('js-active');
			$('.mini-configurator-bg').addClass('js-active');

		}


		var _s = {};

		$.each($(this).data(), function(i, v) {
		    _s[i] = v;
		});

		//update imagery
		$('.js-miniconfigurator .js-phase-1 .instructions').addClass('js-hidden');

		//show applicable attachments
		//reset all disabled
		$('.js-miniconfigurator .selections .configurator-attachments .thumbnail').removeClass('js-disabled');

		//toggle attachments visible
		$('.js-miniconfigurator .selections .attachments .header').addClass('js-active');
		$('.js-miniconfigurator .selections .attachments .configurator-attachments').addClass('js-active');
		$('.js-miniconfigurator .preview .js-phase-2').addClass('js-active');

		evaluateMiniCombo();

	});

	$(document).on('click', '.js-miniconfigurator .selections .configurator-attachments .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.fancy-header').offset().top-84)+'px' });

		var _type = $(this).data('product-type');
		var _category = $(this).data('product-category');

		//else if it is not a chain
		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
		} else {
			$('.js-miniconfigurator .selections .configurator-attachments .thumbnail.js-active[data-product-type="'+_type+'"]').removeClass('js-active');
			$(this).addClass('js-active');
		}
		//if single coin - remove any active single / double attachments
		if (_category == "coin" && _type == "single") {
			$('.js-miniconfigurator .selections .configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
			$('.js-miniconfigurator .selections .configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');
			$('.js-miniconfigurator .selections .configurator-attachments .thumbnail.js-active[data-product-category="cabochon"]').removeClass('js-active');

		}

		$('.js-miniconfigurator .js-phase-2 .instructions').addClass('js-hidden');

		evaluateMiniCombo();

	});

	$(document).on('click', '.js-miniconfigurator .second-selections .configurator-tops .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.js-miniconfigurator .js-preview').offset().top-84)+'px' });

		// console.log($('.js-preview').offset().top-84);

		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
			$('.js-miniconfigurator .js-preview').removeClass('twopieces');
			// $('.mini-configurator-bg').removeClass('js-active');
			// resetMiniConfigurator(event);
			// return;
		} else {
			$('.js-miniconfigurator .js-preview').addClass('twopieces');
			$('.js-miniconfigurator .second-selections .configurator-tops .thumbnail').removeClass('js-active');
			$(this).addClass('js-active');
			// $('.mini-configurator-bg').addClass('js-active');

		}


		var _s = {};

		$.each($(this).data(), function(i, v) {
		    _s[i] = v;
		});

		//update imagery
		$('.js-miniconfigurator .js-phase-1 .instructions').addClass('js-hidden');

		//show applicable attachments
		//reset all disabled
		$('.js-miniconfigurator .second-selections .configurator-attachments .thumbnail').removeClass('js-disabled');

		//toggle attachments visible
		$('.js-miniconfigurator .second-selections .attachments .header').addClass('js-active');
		$('.js-miniconfigurator .second-selections .attachments .configurator-attachments').addClass('js-active');
		$('.js-miniconfigurator .preview .js-phase-2').addClass('js-active');

		evaluateMiniCombo();

	});

	$(document).on('click', '.js-miniconfigurator .second-selections .configurator-attachments .thumbnail', function(event) {

		$("html, body").animate({ scrollTop: ($('.fancy-header').offset().top-84)+'px' });

		var _type = $(this).data('product-type');
		var _category = $(this).data('product-category');

		//else if it is not a chain
		if ($(this).hasClass('js-active')) {
			$(this).removeClass('js-active');
		} else {
			$('.js-miniconfigurator .second-selections .configurator-attachments .thumbnail.js-active[data-product-type="'+_type+'"]').removeClass('js-active');
			$(this).addClass('js-active');
		}
		//if single coin - remove any active single / double attachments
		if (_category == "coin" && _type == "single") {
			$('.js-miniconfigurator .second-selections .configurator-attachments .thumbnail.js-active[data-product-category="sphere"]').removeClass('js-active');
			$('.js-miniconfigurator .second-selections .configurator-attachments .thumbnail.js-active[data-product-category="oval"]').removeClass('js-active');
			$('.js-miniconfigurator .second-selections .configurator-attachments .thumbnail.js-active[data-product-category="cabochon"]').removeClass('js-active');

		}

		$('.js-miniconfigurator .js-phase-2 .instructions').addClass('js-hidden');

		evaluateMiniCombo();

	});

	$(document).on('click', '.js-miniconfigurator .js-reset', resetMiniConfigurator);

	$(document).on('click', '.js-miniconfigurator .js-add-items', function(event) {

		event.preventDefault();
		var _selections = [];

		var _category = $('.js-miniconfigurator .selections .configurator-tops .thumbnail.js-active').data('product-category');

		if (_category == "earrings") {

			_selections.push($('.js-miniconfigurator .selections .configurator-tops .thumbnail.js-active').data('product-id'));

			$.each($('.js-miniconfigurator .selections .configurator-attachments .thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id')+":2");
			});

		} else {

			$.each($('.js-miniconfigurator .thumbnail.js-active'), function(i,v) {
				_selections.push($(this).data('product-id'));
			});
			
		}

		console.log(_selections.join());

		window.location.href = window.location.origin+"/cart/?add-to-cart="+_selections.join();


	});

	//FIGURE THIS OUT
	$(document).on('click', '.js-miniconfigurator .js-liveview', function(event) {

		var _category = $('.js-miniconfigurator .selections .configurator-tops .thumbnail.js-active').data('product-category');

		event.preventDefault();
		if ($(this).hasClass('disabled')) {
			alert('Please add attachments for preview');
			return;
		}
		$('.js-miniconfigurator .js-modal').addClass('js-active');
		// $('body,html').addClass('overlay');
		$(".js-miniconfigurator .js-preview").clone().appendTo("section.js-miniconfigurator-modal");
		var templateUrl = CORE.templateUrl;
		// console.log(templateUrl);

		$('.js-miniconfigurator .js-lp-mini-bg').addClass('js-active');
		$('.js-miniconfigurator .js-miniconfigurator-modal .mini-configurator-bg').attr('src', templateUrl+'/novon/images/live-view-mini-chain.png');


		// if (_category == "pendants") {
		// 	//activate pendant bg
			// var _img = $('.js-miniconfigurator .js-configurator-modal .js-phase-1 .piece').attr('src').split('/straight/')[1];
			// $('.js-miniconfigurator .js-lp-pendants-bg').addClass('js-active');
		// } else if (_category == "earrings") {
		// 	//activate earrings bg
		// 	var _img = $('.js-miniconfigurator .js-configurator-modal .js-phase-1 .piece').attr('src').split('/straight/')[1];
		// 	$('.js-miniconfigurator .js-configurator-modal .js-phase-1 .piece').attr('src', templateUrl+'/novon/images/configurator/earrings/liveview/'+_img);
		// 	$('.js-miniconfigurator .js-lp-earrings-bg').addClass('js-active');
		// } else if (_category == "chains") {
		// 	//replace items
			// $('.js-miniconfigurator .js-configurator-modal .js-phase-1 .piece').attr('src', templateUrl+'/novon/images/configurator/chains/liveview/top.png');
			// $('.js-miniconfigurator .js-configurator-modal .js-phase-4 .piece').attr('src', templateUrl+'/novon/images/configurator/chains/liveview/bottom.png');
		// 	//activate chain bg
		// }



	});
	$(document).on('click', '.js-miniconfigurator .js-modal-close', function(event) {

		$('.js-miniconfigurator .js-modal').removeClass('js-active');
		$('body,html').removeClass('overlay');
		$('.js-miniconfigurator .js-miniconfigurator-modal').empty();
		$('.js-miniconfigurator .js-lp-mini-bg').removeClass('js-active');

	});

});

function evaluateMiniCombo() {

	//evaluate and set images and summary

	var _types = [];
	var _categories = [];
	var _images_straight = [];
	var _images_turned = [];
	var _slugs = [];
	var _names = [];
	var _prices = [];

	var _2types = [];
	var _2categories = [];
	var _2images_straight = [];
	var _2images_turned = [];
	var _2slugs = [];
	var _2names = [];
	var _2prices = [];


	// $('.js-preview .piece, .js-summary, .js-buttons').fadeOut('fast', function() {

	$('.js-dummy').fadeOut('fast', function() {

		$('.js-miniconfigurator .js-preview').removeClass().addClass('preview').addClass('js-preview');
		if ($('.js-miniconfigurator .second-selections .thumbnail.js-active').length > 0) {
			$('.js-miniconfigurator .js-preview').addClass('twopieces');
		}

		$.each($('.js-miniconfigurator .selections .thumbnail.js-active'), function(k,v) {

			_types.push($(this).data('product-type'));
			_categories.push($(this).data('product-category'));
			_slugs.push($(this).data('product-slug'));
			_names.push($(this).data('product-name'));
			_prices.push($(this).data('product-price'));
			_images_straight.push($(this).data('product-conf'));
			_images_turned.push($(this).data('product-conf-alt'));

			$('.js-miniconfigurator .js-preview').addClass('js-fs-'+$(this).data('product-type')+'-'+$(this).data('product-category'));		

		});

		$.each($('.js-miniconfigurator .second-selections .thumbnail.js-active'), function(k,v) {

			_2types.push($(this).data('product-type'));
			_2categories.push($(this).data('product-category'));
			_2slugs.push($(this).data('product-slug'));
			_2names.push($(this).data('product-name'));
			_2prices.push($(this).data('product-price'));
			_2images_straight.push($(this).data('product-conf'));
			_2images_turned.push($(this).data('product-conf-alt'));

			$('.js-miniconfigurator .js-preview').addClass('js-ss-'+$(this).data('product-type')+'-'+$(this).data('product-category'));		

		});
	
		// console.log(_types);
		// console.log(_categories);


	}).fadeIn('fast');

	
	$('.js-miniconfigurator .js-preview .js-firstpiece .piece, .js-miniconfigurator .js-preview .js-secondpiece .piece, .js-miniconfigurator .js-summary, .js-miniconfigurator .js-buttons').fadeOut('fast', function() {

		// console.log(_categories);

		$('.js-miniconfigurator .js-firstpiece .js-preview .piece').attr('src', '');
		$('.js-miniconfigurator .js-summary ul').empty();

		$('.js-miniconfigurator .js-firstpiece .js-phase-2').removeClass('js-hidden');

		for (var i=0; i<_categories.length; i++) {
			//if even, show turned
			if ((i+1) % 2 == 0) {
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').attr('src', _images_turned[i]);
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
			//if odd, show straight
			} else {
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').attr('src', _images_straight[i]);
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').data('hover', _names[i]);
				$('.js-miniconfigurator .js-firstpiece .js-phase-'+(i+1)+' .piece').data('link', _slugs[i]);
			}

			var _template = "<li><a href='"+window.location.origin+'/product/'+_slugs[i]+"' target='_blank'>"+_names[i]+" - $"+_prices[i]+"</a></li>";
			$('.js-miniconfigurator .js-summary ul').append(_template);

		}

		for (var i=0; i<_2categories.length; i++) {
			//if even, show turned
			if ((i+1) % 2 == 0) {
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').attr('src', _2images_turned[i]);
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').data('hover', _2names[i]);
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').data('link', _2slugs[i]);
			//if odd, show straight
			} else {
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').attr('src', _2images_straight[i]);
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').data('hover', _2names[i]);
				$('.js-miniconfigurator .js-secondpiece .js-phase-'+(i+1)+' .piece').data('link', _2slugs[i]);
			}

			var _template = "<li><a href='"+window.location.origin+'/product/'+_2slugs[i]+"' target='_blank'>"+_2names[i]+" - $"+_2prices[i]+"</a></li>";
			$('.js-miniconfigurator .js-summary ul').append(_template);

		}

		if (_categories.length < 2 && _2categories.length < 2) {
			$('.js-miniconfigurator .js-liveview').addClass('disabled');
		} else {
			$('.js-miniconfigurator .js-liveview').removeClass('disabled');
		}

		$.each($('.js-miniconfigurator .js-preview .js-firstpiece .phase'), function(j,k) {

			var _text = $(this).find('.piece').data('hover');
			var _link = $(this).find('.piece').data('link');
			if (_text != "" && _text != undefined) {
				$(this).find('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');
			}
		});

		$.each($('.js-miniconfigurator .js-preview .js-secondpiece .phase'), function(j,k) {

			var _text = $(this).find('.piece').data('hover');
			var _link = $(this).find('.piece').data('link');
			if (_text != "" && _text != undefined) {
				$(this).find('.piece').siblings('label').html('<a href="'+window.location.origin+'/product/'+_link+'" target="_blank">'+_text+'</a>');
			}
		});

	}).fadeIn('fast');

	$(document).on('mouseover', '.js-miniconfigurator .js-preview .phase', function(event) {

			var _label = $(this).find('.piece').siblings('label').html();
			if (_label != "") {
				$(this).find('.piece').siblings('label').addClass('js-active');
			}

	});

	$(document).on('mouseout', '.js-miniconfigurator .js-preview .phase', function(event) {

		$(this).find('.piece').siblings('label').removeClass('js-active');

	});


}

function resetMiniConfigurator(event) {

	event.preventDefault();

	$('.js-miniconfigurator .thumbnail').removeClass('js-active');
	$('.js-miniconfigurator .phase .instructions').removeClass('js-hidden');
	$('.js-miniconfigurator .phase .piece').attr('src', '');
	$('.js-miniconfigurator .js-summary ul').empty();
	$('.js-miniconfigurator .attachments .header').removeClass('js-active');
	$('.js-miniconfigurator .attachments .selections .configurator-attachments').removeClass('js-active');
	$('.js-miniconfigurator .attachments .selections .configurator-attachments').removeClass('js-first');
	$('.js-miniconfigurator .attachments .selections .configurator-attachments').removeClass('js-second');
	$('.js-miniconfigurator .preview .js-phase-2').removeClass('js-active');

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
