<?php 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_announcements',
		'title' => 'Announcements',
		'fields' => array (
			array (
				'key' => 'field_53c321748ae04',
				'label' => 'Expiration Date',
				'name' => 'expiration_date',
				'type' => 'date_picker',
				'instructions' => 'The date on which the announcement should no longer show up on announcement feeds.',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'mm/dd/yy',
				'first_day' => 0,
			),
			array (
				'key' => 'field_53c3c857a6ebc',
				'label' => 'Banner Image',
				'name' => 'banner_image',
				'type' => 'image',
				'instructions' => 'Image to be displayed with announcement.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'announcement',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_bible-studies',
		'title' => 'Bible Studies',
		'fields' => array (
			array (
				'key' => 'field_53c3dafe43826',
				'label' => 'Meeting Night',
				'name' => 'meeting_night',
				'type' => 'select',
				'instructions' => 'Select the night(s) the meeting occurs',
				'required' => 1,
				'choices' => array (
					'Sunday' => 'Sunday',
					'Monday' => 'Monday',
					'Tuesday' => 'Tuesday',
					'Wednesday' => 'Wednesday',
					'Thursday' => 'Thursday',
					'Friday' => 'Friday',
					'Saturday' => 'Saturday',
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_53c3db5343827',
				'label' => 'Start Time',
				'name' => 'start_time',
				'type' => 'text',
				'instructions' => 'The regular start time of the meeting.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '5:00 PM',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53c3dbada7bd2',
				'label' => 'End Time',
				'name' => 'end_time',
				'type' => 'text',
				'instructions' => 'The regular end time of the meeting.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '6:00 PM',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53c3dbd5a7bd3',
				'label' => 'Leader',
				'name' => 'leader',
				'type' => 'relationship',
				'instructions' => 'The leader of the bible study.',
				'required' => 1,
				'return_format' => 'id',
				'post_type' => array (
					0 => 'church-leaders',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_53c41ce6df393',
				'label' => 'Location',
				'name' => 'location',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'location',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_53c420068f08e',
				'label' => 'Event Category',
				'name' => 'event_category',
				'type' => 'taxonomy',
				'taxonomy' => 'event-categories',
				'field_type' => 'checkbox',
				'allow_null' => 0,
				'load_save_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'bible-studies',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_extended-page-fields',
		'title' => 'Extended Page Fields',
		'fields' => array (
			array (
				'key' => 'field_53d64ceffe6a1',
				'label' => 'Leader',
				'name' => 'leader',
				'type' => 'relationship',
				'instructions' => 'Choose the ministry leader.',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'church-leaders',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 1,
			),
			array (
				'key' => 'field_53c9252d1650c',
				'label' => 'Event Categories',
				'name' => 'event_categories',
				'type' => 'taxonomy',
				'instructions' => 'Choose the event categories to display on the page.',
				'taxonomy' => 'event-categories',
				'field_type' => 'checkbox',
				'allow_null' => 0,
				'load_save_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
			array (
				'key' => 'field_53d707c6532fa',
				'label' => 'Additional Links',
				'name' => 'additional_links',
				'type' => 'textarea',
				'instructions' => 'Add links to be displayed on the page in the "Additional Links" section. Separate each link by a new line, with a comma between the display text and the URL. For example "The name of my link,http://theurl.com" would be on one line.',
				'default_value' => '',
				'placeholder' => 'Link Name,http://linkurl.com',
				'maxlength' => '',
				'rows' => 12,
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'submenupage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_leaders',
		'title' => 'Leaders',
		'fields' => array (
			array (
				'key' => 'field_53c3da4ffa0e6',
				'label' => 'Portrait',
				'name' => 'portrait',
				'type' => 'image',
				'instructions' => 'The image of the ministry leader/pastor.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_53c3da77fa0e7',
				'label' => 'Position Title',
				'name' => 'position_title',
				'type' => 'text',
				'instructions' => 'The title of the ministry leader/pastor.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Position Name',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53c3ef90c42d8',
				'label' => 'Order',
				'name' => 'order',
				'type' => 'number',
				'instructions' => 'The order in which the leader should appear in the archive list.',
				'required' => 1,
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 100,
				'step' => 1,
			),
			array (
				'key' => 'field_53e17932fed9e',
				'label' => 'Email Address',
				'name' => 'email_address',
				'type' => 'text',
				'instructions' => 'Enter the email address of the ministry leader.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e17952fed9f',
				'label' => 'Phone Number',
				'name' => 'phone_number',
				'type' => 'text',
				'instructions' => 'Enter the contact number of the ministry leader.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e1796afeda0',
				'label' => 'Facebook',
				'name' => 'facebook',
				'type' => 'text',
				'instructions' => 'Enter the facebook profile page of the ministry leader.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53e17988feda1',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'instructions' => 'Enter the twitter profile page of the ministry leader.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'church-leaders',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_map-points',
		'title' => 'Map Points',
		'fields' => array (
			array (
				'key' => 'field_53e37301093aa',
				'label' => 'Latitude',
				'name' => 'latitude',
				'type' => 'number',
				'instructions' => 'Enter the latitude of the map point.',
				'default_value' => '',
				'placeholder' => '00.000000',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_53e37318093ab',
				'label' => 'Longitude',
				'name' => 'longitude',
				'type' => 'number',
				'instructions' => 'Enter the longitude of the map point.',
				'default_value' => '',
				'placeholder' => '00.000000',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_53e3953c40aea',
				'label' => 'Filter',
				'name' => 'filter',
				'type' => 'text',
				'instructions' => 'The filter which this point will be categorized.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'map_point',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_news',
		'title' => 'News',
		'fields' => array (
			array (
				'key' => 'field_53d2843380ffc',
				'label' => 'Video Announcement Link',
				'name' => 'video_announcement_link',
				'type' => 'text',
				'instructions' => 'Enter the link to the most current video announcements.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '//www.youtube.com/embed/...',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '189',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_timeline-events',
		'title' => 'Timeline Events',
		'fields' => array (
			array (
				'key' => 'field_53c7f5c6e1ef9',
				'label' => 'Start Date',
				'name' => 'start_date',
				'type' => 'text',
				'instructions' => 'The date of the event.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'YYYY,[MM],[DD]',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 10,
			),
			array (
				'key' => 'field_53c7f6c6e1efb',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'instructions' => 'Associated image of the event.',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'timeline_event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_world-missions',
		'title' => 'World Missions',
		'fields' => array (
			array (
				'key' => 'field_53f34d21043e8',
				'label' => 'Latitude',
				'name' => 'latitude',
				'type' => 'number',
				'instructions' => 'Enter the latitude of the location.',
				'default_value' => '',
				'placeholder' => '00.000000',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_53f34d61043e9',
				'label' => 'Longitude',
				'name' => 'longitude',
				'type' => 'number',
				'instructions' => 'Enter the longitude of the position.',
				'default_value' => '',
				'placeholder' => '00.000000',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_53f34dfa2fcf7',
				'label' => 'Location Name',
				'name' => 'location_name',
				'type' => 'text',
				'instructions' => 'Enter a descriptive location name.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53f34d9c043ea',
				'label' => 'Giving Amount',
				'name' => 'giving_amount',
				'type' => 'number',
				'instructions' => 'Enter the suggested giving amount.',
				'default_value' => '',
				'placeholder' => '00.00',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_53f34dd222355',
				'label' => 'Portrait',
				'name' => 'portrait',
				'type' => 'image',
				'instructions' => 'Choose an image to display for the missionary.',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'world_missions',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>