<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<section id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php  query_posts(array ( 'post_type' => 'church-leaders', 'meta_key' => 'order', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'category_name' => 'pastoral-staff')); ?>
				<?php if ( have_posts() ) : ?>

					<header class="archive-header">
						<h1>
							Meet our Team
						</h1><!-- .page-title -->
						<div class="archive-subsection first">
							<h2>
								Pastoral Staff
							</h2>
						</div>
					</header>
					<?php
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						?> 
						<article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID ?> church-leaders type-church-leaders status-publish format-standard hentry clearfix xfolkentry">
							<a class="header-link" href='<?php the_permalink(); ?>'><h3 class="taggedlink"><?php the_title() ?></h3></a>
							<?php
                                        $email = get_field('email_address', $post->ID);
                                        $phone = get_field('phone_number', $post->ID);
                                        $facebook = get_field('facebook', $post->ID);
                                        $twitter = get_field('twitter', $post->ID);
                                        ?>

                                        <div class="contact-box">
                                                <ul class="contact-list">
							
							<li><h4> <?php the_field('position_title'); ?></h4></li>
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
 
							<?php
							$image = get_field('portrait');
							?> <img class='img-thumbnail alignleft size-thumbnail' src='<?php echo $image['sizes']['thumbnail']; ?>' alt='<?php echo $image['alt'] ?>' />
							<?php the_excerpt(); ?> 
						</article>

						<?php

					endwhile;

					?> 

					<div class="archive-subsection">
						<h2>Ministry Leaders</h2>
					</div>
					<?php  query_posts(array ( 'post_type' => 'church-leaders', 'meta_key' => 'order', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'category_name' => 'ministry-leaders')); 
						while(have_posts() ) : the_post();
					?>
						<article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID ?> church-leaders type-church-leaders status-publish format-standard hentry clearfix xfolkentry">
							<a class="header-link" href='<?php the_permalink(); ?>'><h3 class="taggedlink"><?php the_title() ?></h3></a>
							<?php
                                        $email = get_field('email_address', $post->ID);
                                        $phone = get_field('phone_number', $post->ID);
                                        $facebook = get_field('facebook', $post->ID);
                                        $twitter = get_field('twitter', $post->ID);
                                        ?>

                                        <div class="contact-box">
                                                <ul class="contact-list">
							
							<li><h4> <?php the_field('position_title'); ?></h4></li>
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
 
							<?php
							$image = get_field('portrait');
							?> <img class='img-thumbnail alignleft size-thumbnail' src='<?php echo $image['sizes']['thumbnail']; ?>' alt='<?php echo $image['alt'] ?>' />
							<?php the_excerpt(); ?> 
						</article>
					<?php
					endwhile;
					bavotasan_pagination();
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>

			</section><!-- #primary.c8 -->
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
