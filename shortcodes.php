<?php

if ( ! function_exists('sc_slideshow') ) {

	function sc_slideshow($attr) {
		
		$slideshow = '';
		$col_size = '';

		if ( isset( $attr[ 'slideshow' ] ) ) { 
			$slideshow = $attr[ 'slideshow' ];
		} else {
			return '';
		}

		if ( isset( $attr[ 'col_size' ] ) ) { 
			$col_size = $attr[ 'col_size' ];
		} else {
			$col_size = '12';
		}

		$col_size = 'col-md-'.$col_size;

		$todayDate = date('yymmdd');

		$args = array (
			'posts_per_page' => 100,
			'post_type' => 'slides',
			'tax_query' => array(
				'taxonomy' => 'slideshow',
				'field' => 'slug',
				'terms' => $slideshow,
			),
			'meta_value' => $todayDate,
			'meta_compare' => '<',
			'meta_field' => 'expiration_date',
		);

		$slides = get_posts($args);

		ob_start();

		?>

		<div class="row">
			<div class="<?php echo $col_size; ?>">
				<div id="<?php echo $slideshow; ?>" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<?php foreach ($slides as $key=>$slide) { ?>
						<li data-target="#<?php echo $slideshow; ?>" data-slide-to="<?php echo $key; ?>" <?php if ( $key == 0 ): ?> class="active" <?php endif; ?></li>
					<?php } ?>
					</ol>
					<div class="carousel-inner" role="listbox">
					<?php foreach ($slides as $key=>$slide) { 
							$slide_image = get_field('slide_image', $slide->ID)['sizes']['large'];
							$alt_text = get_field('alt_text', $slide->ID);
							$caption = get_field('caption_html'. $slide->ID);
					?>
						<div class="item <?php if ( $key == 0 ): echo 'active'; endif; ?>">
							<img src="<?php echo $slide_image; ?>" alt="<?php echo $alt_text; ?>">
							<?php if ( isset( $caption ) ) : ?>
								<div class="carousel-caption">
									<?php echo $caption; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php } ?>
					<a class="left carousel-control" href="#<?php echo $slideshow; ?>" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#<?php echo $slideshow; ?>" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					</a>
					</div>
				</div>
			</div>
		</div>

		<?php

		return ob_get_clean();
	}

	add_shortcode('slideshow', 'sc_slideshow');

}

?>
