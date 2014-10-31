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

					<?php if ( have_posts() ) : ?>

					<header class="archive-header">
						<h1 class="entry-title">
							Bible Studies
						</h1><!-- .page-title -->
						<ul class="nav nav-pills">
							<li><a href="#men-discipleship">Men's Discipleship</a></li>
							<li><a href="#women-discipleship">Women's Discipleship</a></li>
							<li><a href="#sunday-school">Sunday School</a></li>
						</ul>
					</header><!-- #archive-header -->

					<?php
					$cat_args=array(
						'parent' => '21',
 						'orderby' => 'name',
						'order' => 'ASC'
   						);
					$categories=get_categories($cat_args);
  						foreach($categories as $category) { 
    							$args=array(
								'post_type' => 'bible-studies',
      								'category__in' => array($category->term_id),
      								'caller_get_posts'=>1
    							);
		    					$posts=get_posts($args );
      							if ($posts) {
								echo  '<a name="' . $category->slug .'"></a><div class="archive-subsection"><h2>' . $category->name . '</h2></div>';
        							foreach($posts as $post) {
		          						setup_postdata($post); ?>
          								<h3 class="bible-studies"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p><?php the_excerpt(); ?></p>
          								<?php
        							} // foreach($posts
		      					} // if ($posts
    						} // foreach($categories	
				else :
					get_template_part( 'content', 'none' );
				endif;
				?>

			</section><!-- #primary.c8 -->
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
