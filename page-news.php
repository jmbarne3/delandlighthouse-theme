<?php
/**
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
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="row">
							<div class="col-md-8">
								<iframe width="560" height="315" src="//www.youtube.com/embed/2sdoJXeQnJk?list=PLOq9nTVcJv7DeeSVLi7G0DISZ0vvvsINz" frameborder="0" allowfullscreen></iframe>
								<div class="row">
									<h2>Announcements</h2>
									<?php 
										$today = date('Ymd');
										$post_args = array('post_type' => 'announcement', 'meta_query' => array ( 'key' => 'expiration_date', 'compare' => '>', 'value' => $today));

										$loop = new WP_Query($post_args);

										if ($loop->have_posts()){
											while ($loop->have_posts() ) : $loop->the_post(); ?>
											<div class="col-md-6">
												<div class="announcement-item">
													<h4><a href='<?php echo get_permalink($post->id) ?>' /><?php the_title(); ?></a></h4>
													<p><?php the_excerpt(); ?></p>
												</div>
											</div>
											<?php endwhile; ?>

										<?php } else { ?>
											<div class="col-md-12"><h4>No Announcements</h4></div>
										<?php } ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Community Events</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="5" scope="future" category=14]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/">See More</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Youth Events</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="5" scope="future" category=15]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/categories/youth-events/">See More</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Men Events</h3>
										<div class="event-space">
											<?php  echo do_shortcode('[events_list limit="5" scope="future" category=16]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/categories/men-events/">See More</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Women Events</h3>
										<div class="event-space">
											<?php  echo do_shortcode('[events_list limit="5" scope="future" category=17]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/categories/women-events/">See More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				?>
			</div>
	</div>

<?php get_footer(); ?>
