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
						<?php
							$catId = get_cat_id('Bible Studies');
							$cat_args=array(
								'parent' => $catId,
								'orderby' => '',
								'order' => 'desc'
		   						);
							$categories=get_categories($cat_args);
						?>
						<ul class="nav nav-pills">
							<?php foreach ($categories as $cat) {
								echo '<li><a href="#' . $cat->slug . '">' . $cat->name . '</a></li>';
							} ?>
						</ul>
					</header><!-- #archive-header -->

					<?php
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
          								<div class="bible-study-archive"><h3 class="bible-studies"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
										<p><?php the_excerpt(); ?></p></div>
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
