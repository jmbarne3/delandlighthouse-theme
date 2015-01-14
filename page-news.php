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
wp_enqueue_script('bootstrap-carousel', get_stylesheet_directory_uri() . '/js/bootstrap-carousel.js');
wp_enqueue_script('news-js', get_stylesheet_directory_uri() . '/js/news.js');
wp_enqueue_script('masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js');
wp_enqueue_script('imagesLoaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js');
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
								<?php
									echo do_shortcode('[slideshow slideshow="news" col_size="12"]');
								?>
								<div class="section-heading"><h2>Announcements</h2></div>
									<div class="js-masonry" id="container" data-masonry-options='{ "columnWidth": 340, "gutter" : 10,  "itemSelector": ".announcement-news", "isFitWidth" : "true" }' >
										<?php 
											$today = current_time('mysql');
											$post_args = array('post_type' => 'announcement', 'category_name' => 'churchwide', 'meta_query' => array ( array ( 'key' => 'expiration_date', 'compare' => '>', 'value' => $today, 'type' => 'date')));

											$loop = new WP_Query($post_args);
											if ($loop->have_posts()){
												while ($loop->have_posts() ) : $loop->the_post(); ?>
												<!--<div class="col-md-6">-->
													<div class="announcement-news">
														<?php 
															$annc_icon = 'fa-thumb-tack';
															if (in_category('event-announcement', $post->id)) {
																$annc_icon = 'fa-calendar';
															} else if (in_category('news-story', $post->id)) {
																$annc_icon = 'fa-newspaper-o';
															}
														?>
														<h5><i class="pull-left danger fa <?php echo $annc_icon; ?>"></i><a href='<?php echo get_permalink($post->id) ?>' /><?php the_title(); ?></a></h5>
														<?php if (in_category('news-story', $post->id)) : 	
															$post_obj = get_field('story_post', $post->id);
															$perm = get_post_permalink($post_obj->ID);
															$image = get_field('banner_image');
															if ( !empty($image)): $img = $image['sizes']['large']; ?>
																<a href="<?php echo $perm; ?>">
																	<img class="img-responsive" src="<?php echo $img ?>" alt="<?php echo $image['alt']; ?>" />
																</a>
														<?php endif;  endif; ?>
														<p><?php the_excerpt(); ?></p>
													</div>
												<!--</div>-->
												<?php endwhile; ?>

											<?php } else { ?>
												<div class="col-md-12"><h4>No Announcements</h4></div>
											<?php } ?>
									</div>
								</div>
								<script type="text/javascript">
									jQuery(document).ready( function() {
										var container = document.querySelector('#container');
										var msnry;
										// initialize Masonry after all images have loaded
										imagesLoaded( container, function() {
										  msnry = new Masonry( container, {
										  	"columnWidth": 340, "gutter" : 10,  "itemSelector": ".announcement-news", "isFitWidth" : "true"
										  } );
										});
									});
								</script>
							<div class="col-md-4">
								<div id="events">
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Events</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="10" scope="2-months" category_name="featured"]<div class="col-xs-3"><p class="event-date-day">#d</p><p class="event-date-month">#M</p></div><div class="col-xs-9"><h5 class="event-title">#_EVENTLINK</h5><p class="event-date-times"><b>#l - #_EVENTTIMES</b></p></div><div class="clearfix"></div><hr />[/events_list]') ?>
										<h5 class="event-title" style="text-align:center"><a href="/events">See All Events</a></h5>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Bible Studies This Week</h3>
										<div class="events-space">
											<?php echo do_shortcode('[events_list limit="5" scope="seven-days" category=21]<div class="col-xs-3"><p class="event-date-day">#d</p><p class="event-date-month">#M</p></div><div class="col-xs-9"><h5 class="event-title">#_EVENTLINK</h5><p class="event-date-times"><b>#l - #_EVENTTIMES</b></p></div><div class="clearfix"></div><hr />[/events_list]'); ?>
										<h5 class="event-title" style="text-align:center"><a href="/events">See All Events</a></h5>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Happening This Week</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="0" scope="seven-days" category=57]<div class="col-xs-3"><p class="event-date-day">#d</p><p class="event-date-month">#M</p></div><div class="col-xs-9"><h5 class="event-title">#_EVENTLINK</h5><p class="event-date-times"><b>#l - #_EVENTTIMES</b></p></div><div class="clearfix"></div><hr />[/events_list]') ?>
										<h5 class="event-title" style="text-align:center"><a href="/events">See All Events</a></h5>
										</div>
									</div>
								</div>
								</div> <!-- END #events -->
							</div>
						</div>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				?>
			</div>
	</div>
<?php get_footer(); ?>
