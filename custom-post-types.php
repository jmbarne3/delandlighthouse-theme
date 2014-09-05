<?php


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
		'supports'            => array( 'title', 'editor', 'excerpt', 'custom-fields', 'post-formats', 'featured-image', ),
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

if ( ! function_exists('create_leader_post_type') ) {
	function create_leader_post_type() {
		$labels = array (
			'name' => 'Leaders',
			'singular_name' => 'Leader',
			'menu_name' => 'Leaders',
			'parent_item_color' => 'Parent Item:',
			'all_items' => 'All Items',
			'view_item' => 'View Item',
			'add_new_item' => 'New Leader',
			'add_new' => 'Add New',
			'edit_item' => 'Edit Leader',
			'update_item' => 'Update Leader',
			'search_items' => 'Search Leaders',
			'not_found' => 'Not found',
			'not_found_in_trash' => 'Not found in Trash',
		);

		$rewrite = array(
			'slug' => 'church-leaders',
			'with_front' => true,
			'pages' => true,
			'feeds' => true,
		);
		$args = array (
			'label' => 'church-leaders',
			'description' => 'Church Leaders',
			'labels' => $labels,
			'supports' => array('title', 'editor', 'custom-fields', 'post-formats', 'excerpt'),
			'taxonomies' => array ('category', 'post_tag'),
			'hierarchical' => false,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 6,
			'can_export' => true,
			'has_archive' => true,
			'capability_type' => 'page',
		);

		register_post_type('church-leaders', $args);
	}
}

add_action('init', 'create_leader_post_type', 0);

if ( ! function_exists('create_bible_study_post_type') ) {

// Register Custom Post Type
function create_bible_study_post_type() {


        $labels = array(
                'name'                => 'Bible Studies',
                'singular_name'       => 'Bible Study',
                'menu_name'           => 'Bible Studies',
                'parent_item_colon'   => 'Parent Item:',
                'all_items'           => 'All Items',
                'view_item'           => 'View Item',
                'add_new_item'        => 'New Bible Study',
                'add_new'             => 'Add New',
                'edit_item'           => 'Edit Item',
                'update_item'         => 'Update Item',
                'search_items'        => 'Search Bible Studies',
                'not_found'           => 'Not found',
                'not_found_in_trash'  => 'Not found in Trash',
        );
        $rewrite = array(
                'slug'                => 'bible-studies',
                'with_front'          => true,
                'pages'               => true,
                'feeds'               => true,
        );
        $args = array(
                'label'               => 'bible-studies',
                'description'         => 'Bible Studies',
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
        register_post_type( 'bible-studies', $args );

	}
}
add_action('init', 'create_bible_study_post_type', 0);

// Register Timeline-Event Custom Post Type
if ( ! function_exists('create_timeline_event_post_type') ) {

// Register Custom Post Type
function create_timeline_event_post_type() {

	$labels = array(
		'name'                => _x( 'Timeline Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Timeline Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Timeline Events', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Timeline Events', 'text_domain' ),
		'view_item'           => __( 'View Timeline Event', 'text_domain' ),
		'add_new_item'        => __( 'Add New Timeline Event', 'text_domain' ),
		'add_new'             => __( 'Add New Timeline Event', 'text_domain' ),
		'edit_item'           => __( 'Edit Timeline Event', 'text_domain' ),
		'update_item'         => __( 'Update Timeline Event', 'text_domain' ),
		'search_items'        => __( 'Search Timeline Events', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'timeline_event', 'text_domain' ),
		'description'         => __( 'Events that show up on the history timeline.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'timeline_event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_timeline_event_post_type', 0 );

}

if ( ! function_exists('create_map_point_custom_post_type') ) {

// Register Custom Post Type
function create_map_point_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Map Points', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Map Point', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Map Points', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Map Points', 'text_domain' ),
		'view_item'           => __( 'View Map Point', 'text_domain' ),
		'add_new_item'        => __( 'Add New Map Point', 'text_domain' ),
		'add_new'             => __( 'Add Map Point', 'text_domain' ),
		'edit_item'           => __( 'Edit Map Point', 'text_domain' ),
		'update_item'         => __( 'Update Map Point', 'text_domain' ),
		'search_items'        => __( 'Search Map Points', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'map-points',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'map_point', 'text_domain' ),
		'description'         => __( 'Map Point', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats', ),
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
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'map_point', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_map_point_custom_post_type', 0 );

}

if ( ! function_exists('create_world_missions_custom_post_type') ) {

// Register Custom Post Type
function create_world_missions_custom_post_type() {

	$labels = array(
		'name'                => _x( 'World Missionsaries', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'World Missionary', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'World Missions', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Missionaries', 'text_domain' ),
		'view_item'           => __( 'View Missionary', 'text_domain' ),
		'add_new_item'        => __( 'Add New Missionary', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Missionary', 'text_domain' ),
		'update_item'         => __( 'Update Missionary', 'text_domain' ),
		'search_items'        => __( 'Search Missionaries', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'world-missions',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'world_missions', 'text_domain' ),
		'description'         => __( 'Contains information pertaining to world missionaries.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', ),
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
	register_post_type( 'world_missions', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_world_missions_custom_post_type', 0 );

}

?>
