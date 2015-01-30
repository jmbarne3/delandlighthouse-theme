<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @since 1.0.6
 */
?>
		<h3 class="post-format"><?php _e( '<i class="fa fa-link"></i> Link', 'arcade' ); ?></h3>

		<div class="entry-content description clearfix">
		    <?php the_content( __( 'Read more', 'arcade') ); ?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'content', 'footer' ); ?>