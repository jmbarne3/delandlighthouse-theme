<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.6
 */
$bavotasan_theme_options = bavotasan_theme_options();
global $paged;
?>

	<div class="title-card-wrapper">
	    <div class="title-card">
			<div id="site-meta">
				<?php if (is_front_page()) : ?>
				<h1 id="site-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
				<?php else : ?>
				<p id="site-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</p>
				<?php endif; ?>
				<?php if ( $bavotasan_theme_options['header_icon'] ) { ?>
				<i class="fa <?php echo $bavotasan_theme_options['header_icon']; ?>"></i>
				<?php } else {
					$space_class = ' class="margin-top"';
				} ?>

				<h2 id="site-description"<?php echo $space_class; ?>>
					<?php bloginfo( 'description' ); ?>
				</h2>

				<a href="#" id="more-site" class="btn btn-default btn-lg"><?php _e( 'Our Vision', 'arcade' ); ?></a>
			</div>
			<?php
			    bavotasan_header_images();
			?>
		</div>
	</div>