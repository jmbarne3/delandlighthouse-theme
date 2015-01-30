<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @since 1.0.6
 */
?>
	    <?php get_template_part( 'content', 'header' ); ?>

		<div class="entry-content description clearfix">
	        <?php the_content( __( 'Read more', 'arcade') ); ?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'content', 'footer' ); ?>