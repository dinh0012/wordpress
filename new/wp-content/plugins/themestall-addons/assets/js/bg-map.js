/**
 * MapIt
 *
 * @copyright	Copyright 2013, Dimitris Krestos
 * @license		Apache License, Version 2.0 (http://www.opensource.org/licenses/apache2.0.php)
 * @link		http://vdw.staytuned.gr
 * @version		v0.2.2
 */

(function($){
    "use strict";
	
	$('.google-map').each(function(){
			var latitude = $(this).data('latitude');
			var longitude = $(this).data('longitude');
			var marker1 = $(this).data('marker');
			var title = $(this).data('title');
			var description = $(this).data('description');
			

    $.fn.mapit = function(options) {

        
		var defaults = {
            latitude: -37.813294,
            longitude: 144.959676,
            zoom: 15,
            type: 'ROADMAP',
            scrollwheel: false,
            marker: {
                latitude: latitude,
                longitude: longitude,
                icon: marker1,
                title: title,
                open: false,
                center: true
            },
            address: '<div class="mapbox-wrap clearfix"><div class="mapbox-figure"><img src="'+marker1+'" alt="" class="img-responsive"></div><div class="mapbox-content"><h4><a href="#">'+title+'</a></h4><div class="mapbox-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><small class="mapbox-price">'+description+'</div></div></div>',
            styles: 'GRAYSCALE'
        };

        var options = $.extend(defaults, options);

        $(this).each(function() {

            var $this = $(this);


            // Init Map
            var directionsDisplay = new google.maps.DirectionsRenderer();

            var mapOptions = {
                scrollwheel: options.scrollwheel,
                scaleControl: false,
                center: options.marker.center ? new google.maps.LatLng(options.marker.latitude, options.marker.longitude) : new google.maps.LatLng(options.latitude, options.longitude),
                zoom: options.zoom,
                mapTypeId: eval('google.maps.MapTypeId.' + options.type)
            };
			
			
            var map = new google.maps.Map(document.getElementById($this.attr('id')), mapOptions);
            directionsDisplay.setMap(map);

            // Home Marker
            var home = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(options.marker.latitude, options.marker.longitude),
                icon: new google.maps.MarkerImage(options.marker.icon),
                title: options.marker.title
            });
                // Styles
                if (options.styles) {
                    var GRAYSCALE_style = [{featureType:"all",elementType:"all",stylers:[{saturation: -100}]}];
                    var MIDNIGHT_style  = [{featureType:'water',stylers:[{color:'#e4745a'}]},{featureType:'landscape',stylers:[{color:'#e4745a'}]},{featureType:'poi',elementType:'geometry',stylers:[{color:'#e4745a'},{lightness:5}]},{featureType:'road.highway',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.highway',elementType:'geometry.stroke',stylers:[{color:'#0b434f'},{lightness:25}]},{featureType:'road.arterial',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'road.arterial',elementType:'geometry.stroke',stylers:[{color:'#0b3d51'},{lightness:16}]},{featureType:'road.local',elementType:'geometry',stylers:[{color:'#000000'}]},{elementType:'labels.text.fill',stylers:[{color:'#ffffff'}]},{elementType:'labels.text.stroke',stylers:[{color:'#000000'},{lightness:13}]},{featureType:'transit',stylers:[{color:'#146474'}]},{featureType:'administrative',elementType:'geometry.fill',stylers:[{color:'#000000'}]},{featureType:'administrative',elementType:'geometry.stroke',stylers:[{color:'#144b53'},{lightness:14},{weight:1.4}]}]
                    var BLUE_style          = [{featureType:'water',stylers:[{color:'#46bcec'},{visibility:'on'}]},{featureType:'landscape',stylers:[{color:'#f2f2f2'}]},{featureType:'road',stylers:[{saturation:-100},{lightness:45}]},{featureType:'road.highway',stylers:[{visibility:'simplified'}]},{featureType:'road.arterial',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'administrative',elementType:'labels.text.fill',stylers:[{color:'#444444'}]},{featureType:'transit',stylers:[{visibility:'off'}]},{featureType:'poi',stylers:[{visibility:'off'}]}]
                    var mapType = new google.maps.StyledMapType(eval(options.styles + '_style'), { name: options.styles });
                    map.mapTypes.set(options.styles, mapType);
                    map.setMapTypeId(options.styles);
                }
            // Add info on the home marker
            var info = new google.maps.InfoWindow({
                content: options.address
            });

            // Open the info window immediately
            if (options.marker.open) {
                info.open(map, home);
            } else {
                google.maps.event.addListener(home, 'click', function() {
                    info.open(map, home);
                });
            };

            // Create Markers (locations)
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            var markers = [];

            // Directions
            var directionsService = new google.maps.DirectionsService();

            $this.on('route', function(event, origin) {
                var request = {
                    origin: new google.maps.LatLng(options.origins[origin][0], options.origins[origin][1]),
                    destination: new google.maps.LatLng(options.marker.latitude, options.marker.longitude),
                    travelMode: google.maps.TravelMode.DRIVING
                };
                directionsService.route(request, function(result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(result);
                    };
                });
            });

            // Hide Markers Once (helper)
            $this.on('hide_all', function() {
                for (var i = 0; i < options.locations.length; i++) {
                    markers[i].setVisible(false);
                };
            });

            // Show Markers Per Category (helper)
            $this.on('show', function(event, category) {
                $this.trigger('hide_all');
                $this.trigger('reset');

                // Set bounds
                var bounds = new google.maps.LatLngBounds();
                for (var i = 0; i < options.locations.length; i++) {
                    if (options.locations[i][6] == category) {
                        markers[i].setVisible(true);
                    };

                    // Add markers to bounds
                    bounds.extend(markers[i].position);
                };

                // Auto focus and center
                map.fitBounds(bounds);
            });

            // Hide Markers Per Category (helper)
            $this.on('hide', function(event, category) {
                for (var i = 0; i < options.locations.length; i++) {
                    if (options.locations[i][6] == category) {
                        markers[i].setVisible(false);
                    };
                };
            });

            // Clear Markers (helper)
            $this.on('clear', function() {
                if (markers) {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(null);
                    };
                };
            });

            $this.on('reset', function() {
                map.setCenter(new google.maps.LatLng(options.latitude, options.longitude), options.zoom);
            });

            // Hide all locations once
            //$this.trigger('hide_all');

        });

    };
	
	});

    $(document).ready(function() {
        $('[data-toggle="mapit"]').mapit();
    });

})(jQuery);


// Run javascript after DOM is initialized
jQuery(document).ready(function( $ ) {

    $('#similar_map_wrap').mapit();

});