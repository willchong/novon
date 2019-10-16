$(function(){

	var startLat;
	var startLng;
	var marker;

	var locations = [];
	var q=0;

	$('.js-store').each(function() {
		console.log($('.js-store').length);
		var _mapQuery = $(this).find('.js-street_address').html()+","+$(this).find('.js-city').html()+","+$(this).find('.js-postal').html();
		var _directions = encodeURI(_mapQuery);
		_mapQuery = encodeURIComponent(_mapQuery);

		var _card = new String(); 
		_card += "<div class='map-card'>";
		_card += "<strong>"+$(this).find('.js-store_name').html()+"</strong>";
		_card += "<p>"+$(this).find('.js-street_address').html()+", "+$(this).find('.js-city').html()+"</p>";
		_card += "<p>"+$(this).find('.js-postal').html()+"</p>";
		_card += "<div class='half'><a href='tel:"+$(this).find('.js-telephone').html()+"'>"+$(this).find('.js-telephone').html()+"</p></div>";
		_card += "<div class='half'><a target='_blank' class='directions' href='https://www.google.com/maps/dir/?api=1&destination="+_directions+"'>Get Directions</a></div>";
		_card += "</div>";

		var _id = $(this).data('id');
		console.log(_card);

		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address='+_mapQuery+'&key=AIzaSyCEAU8ymsfDkLynyCHROYPKIdv5qmRdJTw',{
		        sensor: false
		    },
		    function( data, textStatus ) {

		    	if (textStatus == "success") {
		    		console.log(data);
		    		locations.push({"id": _id, "card": _card, "lat": data.results[0].geometry.location.lat, "lng": data.results[0].geometry.location.lng});
		    		q++;
		    		if (q == $('.js-store').length) {
		    			loadFirst();
		    		}
		    	} else {
		    		alert("There was an error with Google Maps, please try again");
		    	}
		       
		    }
		 );

		console.log(locations);
		
	});

	var firstLoc = 	$('.js-store:first-of-type');
	var mapQuery = firstLoc.find('.js-street_address').html()+","+firstLoc.find('.js-city').html()+","+firstLoc.find('.js-postal').html();
	mapQuery = encodeURIComponent(mapQuery);

	function loadFirst() {

		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address='+mapQuery+'&key=AIzaSyCEAU8ymsfDkLynyCHROYPKIdv5qmRdJTw',{
		        sensor: false
		    },
		    function( data, textStatus ) {

		    	if (textStatus == "success") {
		    		startLat = data.results[0].geometry.location.lat;
					startLng = data.results[0].geometry.location.lng;
					initMap();
		    	} else {
		    		alert("There was an error with Google Maps, please try again");
		    	}
	        
		    }
		 );
		
	}

	var map;
	function initMap() {

		map = new google.maps.Map(document.getElementById('map'), {
	  		center: {lat: startLat, lng: startLng},
	  		zoom: 15
		});

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) { 
          console.log(i);
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
          	animation: google.maps.Animation.DROP,
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(locations[i].card);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }

	}

	$('.js-store').on('click', function(event) {

		var num = $(this).data('id');
		var result = locations.filter(function( obj ) {
		  return obj.id == num;
		});

		map.setCenter(new google.maps.LatLng(result[0].lat, result[0].lng));
		map.setZoom(15);

		$('html, body').animate({
		       scrollTop: $(".map").offset().top-$('.site-header.novon').outerHeight()
		}, 300);

	});



});
