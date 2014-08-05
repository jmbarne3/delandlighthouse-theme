<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();

?>
	<div class="container">
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script>
	var infoWindows = [];

	function initialize() {

		detectBrowser();

		var mapProp = {
			center:new google.maps.LatLng(29.002151, -81.314154),
			zoom:20,
			mapTypeId:google.maps.MapTypeId.SATELLITE
		};

		var map=new google.maps.Map(document.getElementById("campus-map")
			,mapProp);



		// Create Campus Markers
		var sanctuaryContent = '<div id="sanctuaryContent">'+
			'<h3>Sanctuary</h3>'+
			'<p><a href="/worship-services/" target="_blank">Service Times</a></p>'+
			'</div>';

		var nurseryContent = '<div id="nurseryContent">'+
			'<h3>Nursery</h3>'+
			'<p>Available for Sunday morning <a href="/worship-services/" target="_blank">services.</a></p>'+
			'<p>Please visit the <a href="/children/nursery/" target="_blank">Nursery\'s</a> page for more information.</p>'+
			'</div>';

		var churchOfficeContent ='<div id="churchOfficeContent">'+
			'<h3>Church Offices</h3>'+
			'<dl><dt>Office Hours</dt><dd>Monday - Friday</dd><dd>8:00AM - 5:00PM</dd></dl>'+
			'</div>';

		var childrenContent = '<div id="childrenContent">'+
			'<h3>Children\'s Church</h3>'+
			'<p>Available during Sunday morning <a href="/worship-services" target="_blank">services.</a></p>'+
			'<p>Please visit the <a href="/children/tlc-kids/" target="_blank">Children\'s Church</a> page for more information.</p>'+
			'</div>';

		var educationContent  = '<div id="educationContent">'+
			'<h3>Education Building</h3>'+
			'<dl><dt>Downstairs</dt>'+
			'<dd><a href="/children/rainbows-sunday-school/" target="_blank">Rainbows Sunday School</a></dd>'+
			'<dd><a href="/children/rainbows-wednesday-evening/" target="_blank">Rainbows Wednesday Evenings</a></dd>'+
			'<dt>Upstairs</dt>'+
			'<dd><a href="/youth/upper-room/" target="_blank">The Upper Room</a></dd>'+
			'</div>';

		var handicappedParkingContent = '<div id="handicappedParkingContent">'+
			'<h3>Handicapped Parking</h3>'+
			'</div>';

		var visitorParkingContent = '<div id="visitorParkingContent">'+
			'<h3>Visitor Parking</h3>'+
			'</div>';

		var handParkingCoords = [
			new google.maps.LatLng(29.002204, -81.314042),
			new google.maps.LatLng(29.002205, -81.313747),
			new google.maps.LatLng(29.002153, -81.313748),
			new google.maps.LatLng(29.002151, -81.314041),	
			new google.maps.LatLng(29.002204, -81.314042)
		];

		var visitorParkingCoords = [
			new google.maps.LatLng(29.002253, -81.314461),
			new google.maps.LatLng(29.001838, -81.314141),
			new google.maps.LatLng(29.001795, -81.314172),
			new google.maps.LatLng(29.002208, -81.314495),
			new google.maps.LatLng(29.002253, -81.314461)
		];
		//Create Markersi
	
		createLocation(map, 29.001940, -81.313861, sanctuaryContent);
		createLocation(map, 29.002108, -81.313888, nurseryContent);
		createLocation(map, 29.002466, -81.313844, churchOfficeContent);
		createLocation(map, 29.002319, -81.314341, childrenContent);
		createLocation(map, 29.002208, -81.314184, educationContent);
		createArea(map, handParkingCoords, '#428bca', handicappedParkingContent, new google.maps.LatLng(29.002195, -81.313910));
		createArea(map, visitorParkingCoords, '#ff0000', visitorParkingContent, new google.maps.LatLng(29.001949, -81.314263));
	}

	function detectBrowser() {
		var useragent = navigator.userAgent;
		var mapdiv = document.getElementById("campus-map");

		if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
			mapdiv.style.width = '100%';
			mapdiv.style.height = '100%';
		} else {
			mapdiv.style.width = '100%';
			mapdiv.style.height = '768px;';
		}
	}

	function createLocation(map, lat, lng, _content) {
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lng)
		});

		var infoWindow = new google.maps.InfoWindow({
			content: _content
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

	function createArea(map, coords, color, _content, infoWindowCoords) {
		var newArea = new google.maps.Polygon({
			paths: coords,
			strokeColor: color,
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: color,
			fillOpacity: 0.35
		});


		var infoWindow = new google.maps.InfoWindow({
			content:_content,
			position: infoWindowCoords
		});
	
		infoWindows.push(infoWindow);

		newArea.setMap(map);

		google.maps.event.addListener(newArea, 'click', function() {
			if (isInfoWindowOpen(infoWindow)) {
				infoWindow.close();
			} else {
				closeAllInfoWindows();
				console.log(newArea);
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

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-content description clearfix">
						    <div id="campus-map" style="width:100%;height:768px"></div>		
						    <?php //the_content( __( 'Read more', 'arcade') ); ?>
					    </div><!-- .entry-content -->

					    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				?>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
