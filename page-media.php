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
wp_enqueue_style('flipclock-style', get_stylesheet_directory_uri() . '/flipclock.css');
wp_enqueue_script('flipclock-script', get_stylesheet_directory_uri() . '/js/flipclock.min.js');
?>

	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-content description clearfix">
						<div class="col-md-9">
							<?php if (date("l") == "Sunday" && (int)date('H', time()) > 9 && (int)date('H', time()) < 13) { ?>
							<div id="ezv-stream-38db3aed920cf82ab059bfccbd02be6a"></div><script type="text/javascript" src="http://d15vbg8nyw71nw.cloudfront.net/jw.player/jwplayer.js"></script><script type="text/javascript" src="http://d3sporhxbkob1v.cloudfront.net/tlconfire/embed/live/tlconfire/tlconfire/embed.js"> </script>
							<?php } else {
									$seconds;
									if (date("l") == "Sunday" && (int)date("H", time()) < 9) {
										$seconds = strtotime('today +9 hour') - time();
									} else { 
										$seconds = strtotime('next Sunday +9 hour') - time();
									}
							?>
							<div id="stream-div" style="display: none;"><div id="ezv-stream-38db3aed920cf82ab059bfccbd02be6a"></div></div><script type="text/javascript" src="http://d15vbg8nyw71nw.cloudfront.net/jw.player/jwplayer.js"></script><script type="text/javascript" src="http://d3sporhxbkob1v.cloudfront.net/tlconfire/embed/live/tlconfire/tlconfire/embed.js"> </script>

							<h3>Next Live Stream</h3>
							<div id="stream-clock"></div>
							<script type="text/javascript">
								jQuery(document).ready( function() {
									var clock = jQuery('#stream-clock').FlipClock(<?php echo $seconds; ?>,  { 
										'autoStart' : 'true', 
										'countdown' : 'true', 
										'clockFace' : 'DailyCounter',
										'callbacks' : {
											'stop' : timerEnd
										}
									});
								});

								function timerEnd() {
									jQuery('#stream-clock').hide();
									jQuery('#stream-div').show();
								}
							</script>
							<p>Our live stream is available Sunday's starting at 9:00 am for the Hour of Power service and continues at 10:30 am for the Celebration Service. Please join us then!</p>
							<?php } ?>
						</div>
						<div class="col-md-3">
							<div class="blue-box">
								<h3>Recent Sermons</h3>
								<?php 

									$args = array(
										'post_type' => 'podcast',
										'post_status' => 'publish',
										'series' => 'Sermons',
										'posts_per_page' => 5
									);

									$query = new WP_Query($args); ?>
									<ul>
									<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
										<li class="announcement-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php endwhile; else : endif; ?>		
									<li class="announcement-item"><a href="/podcast/">See All Sermons</a></li>		
									</ul>
							</div>
						</div>
					    </div><!-- .entry-content -->

					    <?php get_template_part( 'content', 'footer' ); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
				?>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
