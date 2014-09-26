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

					<h1><?php the_title(); ?></h3>
					<h3><?php the_field('location_name', $post->ID); ?>	</h3>
					<div class="row">
						<div class="col-md-12">
							<?php 
								$port = get_field('portrait', $post->ID);
								$portImg = $port['sizes']['medium']
							?>
							<div class="content">
							<img src="<?php echo $portImg ?>" alt="portrait" class="img-rounded alignleft" />
								<?php the_content(); ?>
								<a href="https://swp.paymentsgateway.net/default.aspx?pg_api_login_id=esT77y1AC8&pg_consumerorderid=<?php echo urlencode(the_title()); ?>" target="_blank" class="btn btn-primary btn-lg alignright">Give</a>
							</div>
						</div>
					</div>
				<?php endwhile; // end of the loop. ?>
			</div>
			<?php //get_sidebar(); ?>
		</div>
	</div>

<?php get_footer(); ?>
