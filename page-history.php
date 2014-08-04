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

if (isset($_GET['json'])) {
	$query = array ('post_type' => 'timeline_event', 'meta_key' => 'start_date', 'order_by' => 'start_date', 'order' => 'ASC', 'numberposts' => -1);

	$to_json = array (
		'timeline' => array (
			'headline' => $post->post_title,
			'type' => 'default',
			'startDate' => '1957',
			'text' => $post->post_content,
			'asset' => array (
				'media' => '',
				'caption' => ''
			),
			'date' => array()
		)
	);

	foreach(get_posts($query) as $timeline_event) {
		$date = get_field('start_date', $timeline_event->ID);
		$event_json = array (
			'startDate' => $date,
			'headline' => $timeline_event->post_title,
			'text' => $timeline_event->post_content,
			'post_id' => $timeline_event->ID,
			'asset' => array (
				'media' => '',
				'credit' => '',
				'caption' => ''
			)
		);

		if (get_field('image', $timeline_event->ID)) {
			$event_json['asset']['media'] = get_field('image', $timeline_event->ID);
		}

		$to_json['timeline']['date'][] = $event_json;
	}

	header('Content-Type:application/json;');

	echo json_encode($to_json);

	return;

	} else { get_header(); } ?>

				<div id="timeline"></div>
			<?php if (!isset($_GET['json'])) ?>
			<script type="text/javascript">
				window.onload=function (){
					createStoryJS({
						type: 'timeline',
						width: window.innerWidth,
						height: window.innerHeight,
						source: '//delandlighthouse.com/about/history/?json=true',
						embed_id: 'timeline'
					});
				};
			</script>
			<?php //get_sidebar(); ?>
<?php get_footer(); ?>
