var infoWindows = [];
var filters = [];

	function initialize() {
		detectBrowser();

		var mapProp = {
			center: new google.maps.LatLng(29.002151, -81.314154),
			zoom: 20,
			mapTypeId:google.maps.MapTypeId.SATELLITE
		};

		var map = new google.maps.Map(document.getElementById("campus-map"), mapProp);

		drawBuildingLabels(map);
		drawMarkers(map, '');

	}

	function drawBuildingLabels(map) {
		jQuery.getJSON("/map/?json=true&category=buildings", function(data) {
			for(var i = 0; i < data.points.length; i++) {
				createMapLabel(map, data.points[i].latitude, data.points[i].longitude, data.points[i].title);
			}
		});
	}

	function drawMarkers(map, categories) {
		jQuery.getJSON("map?json=true&category=locations", function(data) {
			for(var i = 0; i < data.points.length; i++) {
				createLocation(map, data.points[i].latitude, data.points[i].longitude, data.points[i].title, data.points[i].content);
			}
		});
	}

	function detectBrowser() {
		var useragent = navigator.userAgent;
		var mapDiv = document.getElementById("campus-map");

		if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Andriod') != -1 ) {
			mapDiv.style.width = '100%';
			mapDiv.style.height = (mapDiv.clientWidth / 4 * 3) + 'px';
		} else {
			mapDiv.style.width = '100%';
			mapDiv.style.height = (mapDiv.clientWidth / 4 * 3) + 'px';
		}
	}

	function MenuControl(controlDiv, map) {
		controlDiv.className = 'map-menu-control';
		var list = document.createElement('ul');
		list.style.padding = '2px 0 2px 2px';
		controlDiv.appendChild(list);
		for (var i = 0; i < filters.length; i++) {
			console.log(filters[i]);
			var inputWrapper = document.createElement('li');
			inputWrapper.style.display = 'inline-block';
			list.appendChild(inputWrapper);
			var input = document.createElement('input');
			input.type = 'checkbox';
			input.style.float = 'left';
			inputWrapper.appendChild(input);
			var label = document.createElement('label');
			label.style.padding = '0 0 0 5px';
			label.innerText = filters[i];
			inputWrapper.appendChild(label);
		}
		return controlDiv;
	}

	function createLocation(map, lat, lng, title, _content) {
		var text = '<div id=' + title + '><h3>' + title + '</h3>' + _content + '</div>';

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng)
		});

		var infoWindow = new google.maps.InfoWindow({
			content: text
		});

		infoWindows.push(infoWindow);

		marker.setMap(map);

		var mapLabel = new MapLabel({
			text: title,
			position: new google.maps.LatLng(lat, lng),
			map: map,
			fontSize: 20,
			align: 'center',
			fontColor: '#428bca'
		});

		google.maps.event.addListener(marker, 'click', function() {
			if (isInfoWindowOpen(infoWindow)) {
				infoWindow.close();
			} else {
				closeAllInfoWindows();
				infoWindow.open(map, marker);
			}
		});
	}

	function createMapLabel(map, lat, lng, title) {
		var mapLabel = new MapLabel({
			text: title,
			position: new google.maps.LatLng(lat, lng),
			map: map,
			fontSize: 20,
			align: 'center',
			fontColor: '#428bca'
		});
	}

	function createArea(map, coords, color, _content, infoWindowCoords) {
		var newArea = new google.maps.Polygon({
			paths: coords,
			strokeColor: color,
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: color,
			fillOpacity: 0.25
		});

		var infoWindow = new google.maps.InfoWindow({
			content: _content,
			position: infoWindowCoords,
		});

		infoWindows.push(infoWindow);

		newArea.setMap(map);

		google.maps.event.addListener(newArea, 'click', function() {
			if (isInfoWindowOpen(infoWindow)) {
				infoWindow.close();
			} else {
				closeAllInfoWindows();
				infoWindow.open(map);
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

	jQuery(document).ready(function () {
		initialize();
	});
