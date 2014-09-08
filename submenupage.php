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
						wp_nav_menu( array( 'theme_location' => 'submenu', 'menu' => get_post_meta($post->ID, 'nav-menu', true), 'menu_class' => 'nav nav-pills nav-stacked sidemenu' ) ); 
					}
				?>
				<?php 
					$events = get_field('event_categories', $post->ID);
					if (!empty($events))
					{
						the_widget('EM_Widget', 'title=Upcoming%20Events&category=' . implode(',', $events) . '&format=#_EVENTLINK<ul><li>#_EVENTDATES</li></ul>');
					}
				 ?>	
			</div>
			<?php 	
				$leader = get_field('leader', $post->ID);
				$links = get_field('additional_links', $post->ID);

				if (empty($leader) && empty($links)) {
			?>
				<div class='col-lg-9'>
			<?php } else { ?>
			<div class='col-lg-6 primary'>
			<?php 	} ?>
				<?php
                                while ( have_posts() ) : the_post();
                                        ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <h1 class="entry-title"><?php the_title(); ?></h1>

                                            <div class="entry-content description clearfix">
                                                    <?php the_content( __( 'Read more', 'arcade') ); ?>
                                            </div><!-- .entry-content -->

                                            <?php //get_template_part( 'content', 'footer' ); ?>
                                        </article><!-- #post-<?php the_ID(); ?> -->

                                        <?php
                                        //comments_template( '', true );
                                endwhile;
                                ?>
			</div>
			<div class='col-lg-3 primary'>
				
				<?php 

					$leader = get_field('leader', $post->ID);
					$links = get_field('additional_links', $post->ID);

					if (!empty($leader) || !empty($links)) {
					?> <div class='blue-box'> <?php
						if (!empty($leader)) {
						?> <h3 class='first'>Ministry Leader</h3><p><a href='<?php echo $leader[0]->guid; ?>'><?php echo $leader[0]->post_title; ?></a></p><?php
						}
						if (!empty($links)) {
						if (empty($leader)) { ?> <h3>Additional Links</h3> <?php } else { ?> <h3>Additional Links</h3> <?php }
							$links_array = explode('<br />', $links);
							foreach($links_array as $link) {
								echo "<p>" . htmlspecialchars_decode($link) . "</p>";
							}
						}
					?> </div> <?php
					}

				?>
			</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
