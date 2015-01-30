<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @since 1.0.6
 */
?>
		<h3 class="post-format"><?php _e( '<i class="fa fa-asterisk"></i> Aside', 'arcade' ); ?></h3>

	    <div class="entry-content description">
		    <?php the_content( __( 'Read more', 'arcade') ); ?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'content', 'footer' ); ?>