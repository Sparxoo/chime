 

    (function($) {
    	jQuery.fn.gogMap = function(markers_raw, custom_style) {
    		var markers = [];
    		var infowindows = [];
    		var active_info = null;
    		var options = {
    			'zoom': 14,
    			'center': new google.maps.LatLng(40.7563551136864, -73.98548310000001),
    			'mapTypeId': google.maps.MapTypeId.ROADMAP
    		};
    		var map = new google.maps.Map(document.getElementById("map_canvas"), options);
    		for (var m_id in markers_raw) {
    			var marker = new google.maps.Marker({
    				position: new google.maps.LatLng(markers_raw[m_id].latitude, markers_raw[m_id].longitude),
    				id: (markers_raw[m_id].marker_id),
    				map: map,
    				title: markers_raw[m_id].title,
    				icon: markers_raw[m_id].icon
    			});
    			markers.push(marker);
    			var myOptions = {
    				content: "<div>" + markers_raw[m_id].infow + "</div>",
    				disableAutoPan: false,
    				maxWidth: 0,
    				alignBottom: true,
    				pixelOffset: new google.maps.Size(-16, -11),
    				zIndex: null,
    				boxClass: "info-windows",
    				closeBoxURL: "",
    				pane: "floatPane",
    				enableEventPropagation: false,
    				infoBoxClearance: "10px",
    				position: marker.position
    			};
    			var infowindow = new InfoBox(myOptions); // infoWindow w/ infobox.js
    			infowindows[marker.id] = infowindow;
    			google.maps.event.addListener(markers[markers.length - 1], 'click', function() {
    				if (active_info) {
    					infowindows[active_info].close();
    				}
    				active_info = this.id;
    				infowindows[this.id].open(this.map);
    				return false;
    			});
    		}
    		map.setOptions({
    			styles: [{
    				featureType: "all",
    				stylers: custom_style
    			}]
    		});
    	}
    })(jQuery);

 