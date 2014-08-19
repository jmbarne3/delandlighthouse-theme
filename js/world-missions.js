var infoWindows = [];

	function initialize() {
		detectBrowser();

		var mapProp = {
			center: new google.maps.LatLng(20.00, 0.00),
			zoom: 3
		};

		var map = new google.maps.Map(document.getElementById("missions-map"), mapProp);

		drawMarkers(map);
	}

	function drawMarkers(map) {
		jQuery.getJSON("/world-missions-map/?json=true", function(data) {
			for(var i = 0; i < data.missions.length; i++) {
				createLocation(map, data.missions[i].latitude, data.missions[i].longitude, data.missions[i].title, data.missions[i].excerpt, data.missions[i].location, data.missions[i].portrait.sizes.thumbnail, data.missions[i].permalink, 50.00);
			}
		});
	}

	function detectBrowser() {
		var useragent = navigator.userAgent;
		var mapDiv = document.getElementById("missions-map");
	

		if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Andriod') != -1 ) {
			mapDiv.style.width = jQuery(window).width() + 'px';
			mapDiv.style.height = jQuery(window).height() + 'px';
		} else {
			mapDiv.style.width = jQuery(window).width() + 'px';
			mapDiv.style.height = jQuery(window).height() + 'px';
		}
	}

	function createLocation(map, lat, lng, title, content, loc, thumbnail, slug, amount) {
		var text = '<div id=' + title + '><h3>' + title + '</h3><h4>' + loc + '</h4><p><img src="' + thumbnail + '" alt="image" class="img-rounded pull-left" style="margin-right:20px;" />' + content + '</p><div class="btn-group"><a href="' + slug + '" class="btn btn-primary" target="_blank">Learn More</a><a href="https://swp.paymentsgateway.net/default.aspx?pg_api_login_id=esT77y1AC8&pg_consumerorderid='+ encodeURIComponent(title) + '" alt="give" class="btn btn-success" target="_blank">Give</a></div></div>';

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng)
		});

		var infoWindow = new google.maps.InfoWindow({
			content: text
		});

		infoWindows.push(infoWindow);

		marker.setMap(map);

		google.maps.event.addListener(marker, 'click', function() {
			if (isInfoWindowOpen(infoWindow)) {
				infoWindow.close();
			} else {
				closeAllInfoWindows();
				infoWindow.open(map, marker);
			}
		});
	}

	function isInfoWindowOpen(infoWindow) {
		var map = infoWindow.getMap();
		return (map !== null && typeof map !== "undefined");
	}

	function closeAllInfoWindows() {
		for (var i = 0; i < infoWindows.length; i++) {
			infoWindows[i].close();
		}
	}

	jQuery(document).ready(function() {
		initialize();
	});
