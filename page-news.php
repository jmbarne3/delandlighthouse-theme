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
									$imagesRaw = get_field('carousel_images', $post->ID);
									$images = explode('<br />', $imagesRaw);
								?>
								<div id="announcement-carousel" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<?php 
											for($i = 0; $i < count($images); $i++) {
												if ($i == 0) {
													echo '<li data-target="#announcement-carousel" data-slide-to="' . $i . '" class="active"></li>';
												} else {
													echo '<li data-target="#announcement-carousel" data-slide-to="' . $i . '"></li>';
												}
											}
										?>
									</ol>
									<div class="carousel-inner">
										<?php 
											foreach($images as $index => $image) {
												$split = explode(',', $image);
												if ($index != 0) {
													echo '<div class="item"><a href="' . $split[1] . '" target="_blank"><img src="' . $split[0] . '" alt="announcement" class="responsive-img"/></a></div>';
												} else {
													echo '<div class="item active"><a href="' . $split[1] . '" target="_blank"><img src="' . $split[0] . '" alt="announcement" class="responsive-img" /></a></div>';
												}
											}
										?>
									</div>
									 <a class="carousel-control left" href="#announcement-carousel" role="button" data-slide="prev">&lsaquo;</a>
									 <a class="carousel-control right" href="#announcement-carousel" role="button"  data-slide="next">&rsaquo;</a>
								</div>
								<div class="row">
									<div class="section-heading"><h2>Announcements</h2></div>
									<?php 
										$today = current_time('mysql');
										$post_args = array('post_type' => 'announcement', 'meta_query' => array ( array ( 'key' => 'expiration_date', 'compare' => '>', 'value' => $today, 'type' => 'date')));

										$loop = new WP_Query($post_args);
										if ($loop->have_posts()){
											while ($loop->have_posts() ) : $loop->the_post(); ?>
											<div class="col-md-6">
												<div class="announcement-item">
													<h4><i class="pull-left danger fa fa-thumb-tack"></i><a href='<?php echo get_permalink($post->id) ?>' /><?php the_title(); ?></a></h4>
													<?php 
														$image = get_field('banner_image');
														if ( !empty($image)): ?>
															<img class="img-rounded" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
													<?php endif; ?>
													<p><?php the_excerpt(); ?></p>
												</div>
											</div>
											<?php if ($loop->current_post % 2 == 0) { } else { ?><div class="clearfix visible-md visible-lg"></div><?php } ?>
											<?php endwhile; ?>

										<?php } else { ?>
											<div class="col-md-12"><h4>No Announcements</h4></div>
										<?php } ?>
								</div>
							</div>
							<script type="text/javascript">
								jQuery(document).ready( function() {
									jQuery('.fa').each( function (index) {
										var color = '#' + (Math.random() * 0xFFFFFF<<0).toString(16);
										jQuery(this).css('color', color);
									});
								});
							</script>
							<div class="col-md-4">
								<div id="events">
								<div class="row">
									<div class="col-md-12">
										<h3>Upcoming Events</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="10" scope="2-months" category=14]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/categories/featured/">See More</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Happening This Week</h3>
										<div class="events-space">
											<?php  echo do_shortcode('[events_list limit="0" scope="this-week" category=57]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]') ?>
											<a href="/events/categories/this-week/">See More</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<h3>Bible Studies This Week</h3>
										<div class="events-space">
											<?php echo do_shortcode('[events_list limit="5" scope="this-week" category=21]#_EVENTLINK - #_EVENTDATES at #_EVENTTIMES</br></br>[/events_list]'); ?>
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
