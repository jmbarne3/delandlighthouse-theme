<?php
/**
Template Name: Sub Menu Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();
?>

	<div class="container">
		<div class="row">
			<div id='primary'>
			<div class='col-lg-3 primary'>
				<?php 
					$nav = get_post_meta($post->ID, 'nav-menu', true);
					if (!empty($nav)) {
						wp_nav_menu( array( 'theme_location' => 'submenu', 'menu' => get_post_meta($post->ID, 'nav-menu', true), 'menu_class' => 'nav nav-pills nav-stacked' ) ); 
					}
				?>
				<?php 
					$events = get_post_meta($post->ID, 'event-cat-ids'); 
					if (!empty($events))
					{
						the_widget('EM_Widget', 'title=Upcoming%20Events&category=' . implode(',', get_post_meta($post->ID, 'event-cat-ids') ) );
					}
				 ?>	
			</div>
			<div class='col-lg-9 primary'>
				<?php
                                while ( have_posts() ) : the_post();
                                        ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h1 class="entry-title"><?php the_title(); ?></h1>

                                            <div class="entry-content description clearfix">
                                                    <?php the_content( __( 'Read more', 'arcade') ); ?>
                                            </div><!-- .entry-content -->

                                            <?php get_template_part( 'content', 'footer' ); ?>
                                        </article><!-- #post-<?php the_ID(); ?> -->

                                        <?php
                                        comments_template( '', true );
                                endwhile;
                                ?>
			</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
