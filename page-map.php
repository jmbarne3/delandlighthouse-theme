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

wp_enqueue_script('google-map-js', '//maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false&v=3.exp', null, null, true);
wp_enqueue_script('campus-map-js', get_stylesheet_directory_uri() . '/js/campus-map.js', null, null, true);
wp_enqueue_script('campus-map-labels-js', get_stylesheet_directory_uri() . '/js/maplabel-compiled.js', null, null, true);

if (isset($_GET['json'])) {
	$category = $_GET['category'];
	$query = array('post_type' => 'map_point', 'category_name' => $category);

	$to_json = array (
		points => array()
	);

	foreach(get_posts($query) as $map_point) {
		$point_json = array(
			'title' => $map_point->post_title,
			'content' => $map_point->post_content,
			'latitude' => (double)get_field('latitude', $map_point->ID),
			'longitude' => (double)get_field('longitude', $map_point->ID),
			'filter' => get_field('filter', $map_point->ID)
		);

		$to_json['points'][] = $point_json;
	}

	header('Content-Type:application/json;');

	echo json_encode($to_json);

	return;
} else  { get_header(); }

?>
	<div class="container">
		<div class="row">
			<div id="primary">
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
