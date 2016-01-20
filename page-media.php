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
wp_enqueue_script('flipclock-script', get_stylesheet_directory_uri() . '/js/flipclock.min.js', null, null, true);
?>

	<div class="container">
		<div class="row">
			<div id="primary">
				<?php
				while ( have_posts() ) : the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>

					    <div class="entry-content description clearfix">
						<div class="col-md-8 col-md-offset-2">
							<?php 
							if (date("l") == "Sunday" && (int)date('H', time()) >= 9 && (int)date('H', time()) <= 13) { ?>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/QlhAtx5LcPI" frameborder="0" allowfullscreen></iframe>
							<?php } else {
									$seconds;
									if (date("l") == "Sunday" && (int)date("H", time()) < 9) {
										$seconds = strtotime('today +9 hour') - time();
									} else { 
										$seconds = strtotime('next Sunday +9 hour') - time();
									}
							?>
							<div id="stream-div" style="display: none;"><div id="ezv-stream-38db3aed920cf82ab059bfccbd02be6a"></div></div><script type="text/javascript" src="http://d15vbg8nyw71nw.cloudfront.net/jw.player/jwplayer.js"></script><script type="text/javascript" src="http://d3sporhxbkob1v.cloudfront.net/tlconfire/embed/live/tlconfire/tlconfire/embed.js"> </script>
							<div class="archives">
								<h2>Sermon Archive</h2>
								<p>Need to catch up on a sermon you've missed? Use the playlist button below to browse past sermons.</p>
								<iframe width="560" height="315" src="https://www.youtube.com/embed/?list=PLOq9nTVcJv7CLEc2oiY0uy-r8DCkT0gOK" frameborder="0" allowfullscreen></iframe>
							</div>
							<h2>Next Live Stream</h2>
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