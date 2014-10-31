<?php
/**
 * The Template for displaying all single posts.
 *
 * @since 1.0.0
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1 class="entry-title"><?php the_title();//get_template_part( 'content', get_post_format() ); ?></h1>
					<?php
					$title = get_field('position_title', $post->ID);
                                        $email = get_field('email_address', $post->ID);
                                        $phone = get_field('phone_number', $post->ID);
                                        $facebook = get_field('facebook', $post->ID);
                                        $twitter = get_field('twitter', $post->ID);
                                        ?>

					<div class="contact-box">
						<ul class="nav nav-pills">
							<li><h4><?php echo $title; ?></h4></li>
							<li><a href='tel:<?php echo $email; ?>'><?php echo $email; ?></a></li>
						<?php if (!empty($phone)) : ?>
							<li><a href='tel:<?php echo $phone; ?>'><?php echo $phone; ?></a></li>
						<?php endif; ?>
						<?php if (!empty($facebook)) : ?>
							<li><a style="display:inline;" href='<?php echo $facebook; ?>' target="_blank"><img src='/wp-content/plugins/simple-contact-info/icons/facebook/1.png' alt="facebook" /></a></li>
						<?php endif; ?>
						<?php if (!empty($twitter)) : ?>
							<li><a style="display:inline;" href='<?php echo $twitter; ?>' target="_blank"><img src='/wp-content/plugins/simple-contact-info/icons/twitter/1.png' alt='twitter' /></a></li>
						<?php endif; ?>
						</ul>
					</div>
					<div class="clearfix contact-list-clearfix"></div>
					<?php the_content(); ?>
					<div id="posts-pagination" class="clearfix">
						<h3 class="sr-only"><?php _e( 'Post navigation', 'arcade' ); ?></h3>
						<div class="previous pull-left"><?php previous_post_link( '%link', __( '&larr; %title', 'arcade' ) ); ?></div>
						<div class="next pull-right"><?php next_post_link( '%link', __( '%title &rarr;', 'arcade' ) ); ?></div>
					</div><!-- #posts-pagination -->

				<?php endwhile; // end of the loop. ?>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
