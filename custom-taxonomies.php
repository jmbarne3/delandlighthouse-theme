<?php

if ( ! function_exists( 'register_slideshow_taxonomy' ) ) {

	// Register Custom Taxonomy
	function register_slideshow_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Slideshows', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Slideshow', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Slideshow', 'text_domain' ),
			'all_items'                  => __( 'All Slideshows', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'New Slideshow', 'text_domain' ),
			'add_new_item'               => __( 'Add New Slideshow', 'text_domain' ),
			'edit_item'                  => __( 'Edit Slideshow', 'text_domain' ),
			'update_item'                => __( 'Update Slideshow', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'search_items'               => __( 'Search slideshows', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove slideshows', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'taxonomy', array( 'slides' ), $args );

	}

	// Hook into the 'init' action
	add_action( 'init', 'register_slideshow_taxonomy', 0 );

}

?>
