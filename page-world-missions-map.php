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

if (isset($_GET['json'])) {
	$query = array ('post_type' => 'world_missions', 'numberposts' => 0);

	$to_json = array (
		missions => array()
	);

	foreach(get_posts($query) as $missionary) {
		$mission_json = array (
			'title' => $missionary->post_title,
			'location' => get_field('location_name', $missionary->ID),
			'latitude' => (double)get_field('latitude', $missionary->ID),
			'longitude' => (double)get_field('longitude', $missionary->ID),
			'excerpt' => $missionary->post_excerpt,
			'portrait' => get_field('portrait', $missionary->ID),
			'permalink' => '/world-missions/' . $missionary->post_name
		);
		
		$to_json['missions'][] = $mission_json;
	}

	header('Content-Type:application/json;');

	echo json_encode($to_json);

	return;

} else {
	get_header();
	wp_enqueue_script('google-map-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false', null, null, true);
	wp_enqueue_script('world-missions-js', get_stylesheet_directory_uri() . '/js/world-missions.js', null, null, true);
}
?>
	<div id="missions-map"></div>

<?php get_footer(); ?>
