<?php
	function register_my_menu() {
		register_nav_menu('submenu',__( 'Sub Menu'));
	}

	add_action( 'init', 'register_my_menu');

	function events_widget_init() {
		register_sidebar( array(
			'name' => 'Events Widget Sidebar',
			'id' => 'events_widget_sidebar',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
		) );
	}

	add_action( 'widgets_init', 'events_widget_init');
	
	if ( ! function_exists('create_announcement_post_type') ) {

// Register Custom Post Type
function create_announcement_post_type() {

	$labels = array(
		'name'                => 'Announcements',
		'singular_name'       => 'Announcement',
		'menu_name'           => 'Announcements',
		'parent_item_colon'   => 'Parent Item:',
		'all_items'           => 'All Items',
		'view_item'           => 'View Item',
		'add_new_item'        => 'New Announcement',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Item',
		'update_item'         => 'Update Item',
		'search_items'        => 'Search Announcements',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$rewrite = array(
		'slug'                => 'announcements',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'announcement',
		'description'         => 'Announcements that are not tied to a specific event.',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'custom-fields', 'post-formats', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'announcement', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_announcement_post_type', 0 );

}

?>
