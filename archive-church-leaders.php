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
get_header();
wp_enqueue_script('church-leader-js', get_stylesheet_directory_uri() . '/js/church-leaders.js');
 ?>

	<div class="container">
		<div class="row">
			<section id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php  query_posts(array ( 'post_type' => 'church-leaders', 'meta_key' => 'order', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => 100, 'category_name' => 'meet-the-team')); ?>
				<?php if ( have_posts() ) : ?>

					<header class="archive-header">
						<h1>
							Meet our Team
						</h1><!-- .page-title -->
					</header>
					<div class="row">
					<?php
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						?>
						 <div class="col-md-3 col-sm-3">
							<div class="thumbnail">
							<?php
							$image = get_field('portrait'); ?>
							<article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID ?> church-leaders type-church-leaders status-publish format-standard hentry clearfix xfolkentry">
							<?php
			                                        $email = get_field('email_address', $post->ID);
                        			                $phone = get_field('phone_number', $post->ID);
                                        		?>

							<img src='<?php echo $image['sizes']['large']; ?>' alt='<?php echo $image['alt'] ?>' />
                                        		<div class="caption churchleader">
						
								<a class="header-link" href='<?php the_permalink(); ?>'><h3 class="taggedlink"><?php the_title() ?></h3></a>
								<h4> <?php the_field('position_title'); ?></h4>
                                                        	<a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
						
							</div>
							<div class="caption active-church-leader">
								
								<a class="header-link" href='<?php the_permalink(); ?>'><h3 class="taggedlink"><?php the_title() ?></h3></a>
								<h4> <?php the_field('position_title'); ?></h4>
                                                        	<a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
						
								<p>	<?php the_excerpt(); ?> </p>
                                        			
							</div>
							</div> <!-- end thumbnail --> 
						</article>
						</div>
					
					<?php 
						if ((($wp_query->current_post + 1) % 4) == 0) : ?>
                                        </div><div class="row"><div class="clearfix"></div>
					<?php endif; ?>
						<?php

					endwhile;
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>

			</section><!-- #primary.c8 -->
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
