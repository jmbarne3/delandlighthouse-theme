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
	$query = array ('post_type' => 'world_missions');

	$to_json = array (
		missions => array()
	);

	foreach(get_posts($query) as $missionary) {
		$mission_json = array (
			'title' => $missionary->post_title,
			'location' => get_field('location_name', $missionary->ID),
			'latitude' => (double)get_field('latitude', $missionary->ID),
			'longitude' => (double)get_field('longitude', $missionary->ID),
			'content' => $missionary->post_content
		);
		
		$to_json['missions'][] = $mission_json;
	}

	header('Content-Type:application/json;');

	echo json_encode($to_json);

	return;

} else {
	get_header();
}
?>
	<div id="missions-map"></div>
	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-content description clearfix">
						    <?php the_content( __( 'Read more', 'arcade') ); ?>
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
