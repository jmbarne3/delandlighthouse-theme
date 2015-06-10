<?php
/**
 * Template Name: Custom Template
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
wp_enqueue_script('parallax-min-js', get_stylesheet_directory_uri() . '/js/parallax.min.js', null, null, true);
wp_enqueue_script('vbs-js', get_stylesheet_directory_uri() . '/js/vbs.js', null, null, true);
?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 	if ( ! get_field('remove_header' ) ) :
    			get_template_part( 'content', 'header' );
			else:
				bavotasan_header_images(); ?>
				<h1 class="sr-only"><?php echo $post->post_title ?></h1>
		<?php endif; ?>
	<div class="container">
		<div class="row">
			<div id="primary">
                <div class="entry-content description clearfix">
                        <?php the_content( __( 'Read more', 'arcade') ); ?>
                </div><!-- .entry-content -->
    		</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php get_template_part( 'content', 'footer' ); ?>
<?php
    endwhile;
    get_footer();
?>