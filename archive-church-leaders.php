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
				<?php  query_posts(array ( 'post_type' => 'church-leaders', 'meta_key' => 'order', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'post__not_in' => array (245))); ?>
				<?php if ( have_posts() ) : ?>

					<header id="archive-header">
						<h1 class="page-title">
							Meet the Staff
						</h1><!-- .page-title -->
						
					</header><!-- #archive-header -->

					<?php
					while ( have_posts() ) : the_post();

						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						?> 
						<article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID ?> church-leaders type-church-leaders status-publish format-standard hentry clearfix xfolkentry">
							<h2 class="entry-title taggedlink"><?php the_title() ?></h2> <?php
							$image = get_field('portrait');
							?> <img class='img-thumbnail alignleft size-thumbnail' src='<?php echo $image['sizes']['thumbnail']; ?>' alt='<?php echo $image['alt'] ?>' />
							<h3> <?php the_field('position_title'); ?></h3>
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
