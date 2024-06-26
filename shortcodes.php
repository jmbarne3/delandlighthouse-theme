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

		$today = current_time('mysql');

		$args = array (
			'posts_per_page' => 100,
			'post_type' => 'slides',
			'tax_query' => array(
				'taxonomy' => 'slideshow',
				'field' => 'slug',
				'terms' => $slideshow,
			),
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'meta_query' => array( 
				array( 
					'key' => 'expiration_date', 
					'compare' => '>', 
					'value' => $today, 
					'type' => 'date'
				)
			)
		);

		$slides = get_posts($args);
		$carousel_id = $slideshow . "-carousel";

		ob_start();

		?>

		<div class="row">
			<div class="<?php echo $col_size; ?>">
				<div id="<?php echo $carousel_id; ?>" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
					<?php foreach ($slides as $key=>$slide) { ?>
						<li data-target="#<?php echo $carousel_id; ?>" data-slide-to="<?php echo $key; ?>" <?php if ( $key == 0 ): ?> class="active" <?php endif; ?></li>
					<?php } ?>
					</ol>
					<div class="carousel-inner" role="listbox">
					<?php foreach ($slides as $key=>$slide) { 
						$slide_image_sizes = get_field('slide_image', $slide->ID);
						$slide_image = $slide_image_sizes['sizes']['large'];
						$alt_text = get_field('alt_text', $slide->ID);
						$href = get_field('slide_link', $slide->ID);
						$caption = get_field('caption_html', $slide->ID);
					?>
						<div class="item <?php if ( $key == 0 ): echo 'active'; endif; ?>">
							<a href="<?php echo $href; ?>"><img src="<?php echo $slide_image; ?>" alt="<?php echo $alt_text; ?>"></a>
							<?php if ( isset( $caption ) ) : ?>
								<div class="carousel-caption">
									<?php echo $caption; ?>
								</div>
							<?php endif; ?>
						</div>
					<?php } ?>
					</div>
					<a class="left carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="prev">
						&lsaquo;
					</a>
					<a class="right carousel-control" href="#<?php echo $carousel_id; ?>" role="button" data-slide="next">
						&rsaquo;
					</a>
				</div>
			</div>
		</div>

		<?php

		return ob_get_clean();
	}

	add_shortcode('slideshow', 'sc_slideshow');

}

function sc_lead($attr, $content='') {
	return '<p class="story-lead">' . $content . '</p>';
}

add_shortcode('lead', 'sc_lead');

/**
 * Wrap arbitrary text in <blockquote>
 **/
function sc_blockquote($attr, $content='') {
	$source = $attr['source'] ? $attr['source'] : null;
	$cite = $attr['cite'] ? $attr['cite'] : null;
    $color = $attr['color'] ? $attr['color'] : null;
	$html = '<blockquote';
	if ($source) {
		$html .= ' class="quote"';
	}
    if ($color) {
        $html .= ' style="color: ' . $color . '"';
    }
	$html .= '><p';
    if ($color) {
        $html .= ' style="color: ' . $color . '"';
    }
    $html .= '>'.$content.'</p>';
	if ($source || $cite) {
		$html .= '<small';
        if ($color) {
            $html .= ' style="color: ' . $color . '"';
        }
        $html .= '>';
		if ($source) {
			$html .= $source;
		}
		if ($cite) {
			$html .= '<cite title="'.$cite.'">'.$cite.'</cite>';
		}
		$html .= '</small>';
	}
	$html .= '</blockquote>';
	return $html;
}
add_shortcode('blockquote', 'sc_blockquote');

function sc_sidebar($attr, $content) {
	$pull = ($attr['position'] == ('left' || 'right')) ? 'pull-'.$attr['position'] : 'pull-right';
	$bgcolor = $attr['background'] ? $attr['background'] : '#f0f0f0';
	$content = do_shortcode($content);
	$html = '<div class="col-md-4 '.$pull.' sidebar">';
	$html .= '<section class="sidebar-inner" style="background-color: '.$bgcolor.';">'.$content.'</section>';
	$html .= '</div>';
	return $html;
}
add_shortcode('sidebar', 'sc_sidebar');

/**
 * Create a full-width callout box.
 **/
function sc_callout($attr, $content) {
	$bgcolor = $attr['background'] ? $attr['background'] : '#f0f0f0';
	$content = do_shortcode($content);
	// Close out our existing .span, .row and .container
	$html .= '</div></div></div></div>';
	$html .= '<div class="container-wide callout" style="background-color: '.$bgcolor.';">';
	$html .= '<div class="container"><div class="row"><div class="col-md-12 callout-inner"><div class="entry-content description clearfix">';
	$html .= $content;
	$html .= '</div></div></div></div></div>';
	$html .= '<div class="container"><div class="row"><div class="col-md-12"><div class="entry-content description clearfix">';
	return $html;
}
add_shortcode('callout', 'sc_callout');

function sc_wide_image_top($attr, $content) {
	$attr = shortcode_atts( array(
		'src' => null,
		'use_div' => True,
		'height' => 450
		), $attr
	);

	ob_start();

	if ( $attr['src'] ) : ?>

					</div>
				</div>
			</div>
		</div>
		<?php if ( $attr['_use_div'] ) : ?>
		<div class="container-wide wide-image" style="background: url(<?php echo $attr['src']; ?>); background-size: cover; width: 100%; height: <?php echo $attr['height']; ?>px;">
			<?php echo do_shortcode($content) ?>
		</div>
		<?php else : ?>
		<div class="container-wide">
			<img src="<?php echo $attr['src']; ?>" class="wide-image img-responsive">
		</div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="entry-content description clearfix">
	<?php else: ?>
		<?php do_shortcode($content); ?>
	<?php endif; ?>
	<?php
	return ob_get_clean();

}
add_shortcode('wide-image-top', 'sc_wide_image_top');

function sc_list_bible_studies($attr, $content) {
	$cats = $attr["categories"];

	$args = array(
		'post_type' => 'bible-studies',
		'posts_per_page' => -1,
		'category_name' => "'" . $cats . "'"
	);

	$posts = get_posts($args);
	$retval = "";

	foreach ($posts as $post) {
		$retval .= '<h3 class="bible-studies">';
		$retval .= '<a href="' . get_permalink($post->ID) . '" rel="bookmark" title="' . $post->post_title . '">';
		$retval .= $post->post_title . '</a></h3>';
		$retval .= '<p>' . $post->post_excerpt . '</p>';
	}

	return $retval;

}

add_shortcode('list-bible-studies', 'sc_list_bible_studies');

?>
