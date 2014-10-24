<?php
/**
 * The Template for displaying all single posts.
 *
 * @since 1.0.0
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1> <?php the_title(); ?></h1>
					<article id='post-<?php $post->ID ?>'>
					<div class='row'>
						<div class='col-md-4'>
							<div class='bible-study-sidebar'>
							<h3>Leader</h3>
							<?php
								$leader = get_field('leader');
								$url = get_the_permalink($leader[0]);
								$name = get_the_title($leader[0]);
							?>
								<p style="text-indent: 20px;"><a href='<?php echo $url; ?>' target="_blank"> <?php echo $name; ?></a></p>
							<h3>Meeting Time</h3>
							<?php 
								$meeting_day = get_field('meeting_night');
								$start_time = get_field('start_time');
								$end_time = get_field('end_time');
							?>
								<p style="text-indent: 20px;"><?php echo $meeting_day; ?>s from <?php echo $start_time; ?> - <?php echo $end_time; ?></p>
							<h3>Meeting Location</h3>
							<?php 
								$location = get_field('location');
								$loc_url = get_permalink($location[0]);
								$loc_name = get_the_title($location[0]);
							?>
								<p style="text-indent: 20px;"><a href='<?php echo $loc_url; ?>' target="_blank"><?php echo $loc_name ?></a></p>
						</div>	
							<?php 
								$event_cat = get_field('event_category');
								the_widget('EM_Widget', 'title=Upcoming%20Events&category=' . implode(',', $event_cat) . '&format=<div class="col-xs-3"><p class="event-date-day">#d</p><p class="event-date-month">#M</p></div><div class="col-xs-9"><h5 class="event-title">#_EVENTLINK</h5><p class="event-date-times"><b>#l - #_EVENTTIMES</b></p></div><div class="clearfix"></div><hr />');

								//the_widget('EM_Widget', 'title=Upcoming%20Meetings&category='. $event_cat[0]); 
							?>	
							</div>
						<div class='col-md-8'>
							<?php the_content(); ?>	
						</div>
					</div>
					</article>
				<?php endwhile; // end of the loop. ?>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
