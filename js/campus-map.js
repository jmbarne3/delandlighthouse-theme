var infoWindows = [];
var filters = [];		
var map;

	function initialize() {
		detectBrowser();

		var mapProp = {
			center: new google.maps.LatLng(29.002151, -81.314154),
			zoom: 20,
			mapTypeId:google.maps.MapTypeId.SATELLITE
		};

		map = new google.maps.Map(document.getElementById("campus-map"), mapProp);

		drawBuildingLabels(map);
		drawMarkers(map, 'locations');

		console.log(filters.length);

		var controlDiv = document.createElement('div');
		var control = FilterControl(controlDiv, map);

		controlDiv.index = 1;
		map.controls[google.maps.ControlPosition.BOTTOM_RIGHT].push(controlDiv);
	}

	function drawBuildingLabels(map) {
		jQuery.getJSON("/map/?json=true&category=buildings", function(data) {
			for(var i = 0; i < data.points.length; i++) {
				createMapLabel(map, data.points[i].latitude, data.points[i].longitude, data.points[i].title);
				if (!containsObject(data.points[i].filter, filters) && data.points[i].filter != "") {
					filters.push( data.points[i].filter);
				}
			}
		});
	}

	function drawMarkers(map, categories) {
		jQuery.getJSON("map?json=true&category=locations", function(data) {
			for(var i = 0; i < data.points.length; i++) {
				createLocation(map, data.points[i].latitude, data.points[i].longitude, data.points[i].title, data.points[i].content);
				if (!containsObject(data.points[i].filter, filters) && data.points[i].filter != "") {
					filters.push( data.points[i].filter);
				}
			}
		});
	}

	function containsObject(obj, list) {
		var i;
		for (i = 0; i < list.length; i++) {
			if (list.length == 0 || list[i] === obj) {
				return true;
			}
		}
		return false;
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

	function FilterControl(controlDiv, map) {
		controlDiv.style.padding = '5px';

		var controlUI = document.createElement('div');
		controlUI.style.backgroundColor = 'white';
		controlUI.style.borderStyle = 'solid';
		controlUI.style.borderColor = '#fff';
		controlUI.style.borderWidth = "1px";
		controlUI.style.borderRadius = "1.0em";
		controlDiv.appendChild(controlUI);
		var header = document.createElement('h4');
		header.innerText = 'Filters';
		controlUI.appendChild(header);

		var listContainer = document.createElement('form');
		for (var i = 0; i < filters.length; i++) {
			console.log(filters[i]);
			var input = document.createElement('input');
			input.type = 'checkbox';
			input.className = 'checkbox-inline';
			input.style.float = 'left';
			input.style.margin = '3px 4px 0 4px';
			input.name = filters[i];
			input.value = filters[i];
			var label = document.createElement('label');
			label.style.marginRight = '8px';
			label.innerText = filters[i];
			listContainer.appendChild(label);
			label.appendChild(input);
			var br = document.createElement('br');
			listContainer.appendChild(br);
		}
		controlUI.appendChild(listContainer);
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
			fontSize: 15,
			align: 'right',
			fontColor: '#000',
			fontFamily: 'Georgia, serif'
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
