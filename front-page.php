<?php
/**
 * The front page template.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();

global $paged;
$bavotasan_theme_options = bavotasan_theme_options();

if ( 2 > $paged ) { ?>
	<div class="home-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="home-jumbotron jumbotron">
						<h2 class="h1">City Transformation</h2>
						<p class="lead">Our passion is to see God&#039;s love transform our city. The Church is called to love one another, serve one another, and care for those who are hurting and oppressed in our culture. The Bible teaches us that Christians will be judged on the basis of what we did with this awesome grace and love that God has given to us as a gift. We are to care for those who are widows and orphans because they have lost the stability of family. We are to visit the prisoner and the sick. We are to clothe the poor and feed the hungry. If we have two of something, such as a coat or other worldly good, we are to give one away to those who have none. We are to speak up for those who have no voice; to love justice and mercy above all else. When people meet the authentic lover and healer Jesus, they are never the same again. As their lives are transformed by His mercy and grace, part of our city is transformed.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php echo do_shortcode('[quote_rotator title="" number="20" howlong="7500" fadetime="1000" random="0" height="100"]'); ?>
			</div>
		</div>
	</div>
	<?php
	// Display home page top widgetized area
	if ( is_active_sidebar( 'home-page-top-area' ) ) {
		?>
		<div id="home-page-widgets">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'home-page-top-area' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}
if ( 'page' == get_option('show_on_front') ) {
	include( get_page_template() );
} else {
?>
	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
                <?php
				if ( have_posts() ) {
					while ( have_posts() ) : the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;

					bavotasan_pagination();
				} else {
					if ( current_user_can( 'edit_posts' ) ) {
						// Show a different message to a logged-in user who can add posts.
						?>
						<article id="post-0" class="post no-results not-found">
							<h1 class="entry-title"><?php _e( 'Nothing Found', 'arcade' ); ?></h1>

							<div class="entry-content description clearfix">
								<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'arcade' ), admin_url( 'post-new.php' ) ); ?></p>
							</div><!-- .entry-content -->
						</article>
						<?php
					} else {
						get_template_part( 'content', 'none' );
					} // end current_user_can() check
				}
				?>
			</div><!-- #primary.c8 -->
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php
}
get_footer(); ?>
