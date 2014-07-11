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

/**
 * Adds Announcement Widget
 */
class Announcement_Widget extends WP_Widget {

	var $defaults;
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		$this->defaults = array(
				'title' => __('Announcements', 'text_domain'),
				'categories' => '0',
				'num_announcements' => 5,
				'all_announcements' => false,
				'all_announcements_text' => 'See More',
				'no_announcements_text' => 'No Announcements',
			);
		$widget_ops = array('description' => __('Displays a list of announcements.'. 'text_domain') );


		parent::__construct(
			'announcement_widget', // Base ID
			__('Announcement Widget', 'text_domain'), // Name
			$widget_opts // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$instance = array_merge($this->defaults, $instance);
		echo $args['before_widget'];
    	if( !empty($instance['title']) ){
		    echo $args['before_title'];
		    echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);
		    echo $args['after_title'];
    	}
		
    	$post_args = array('post_type' => 'announcement', 'posts_per_page' => $instance['num_announcements'], 'category_in' => implode(',', $instance['categories']));
    	$loop = new WP_Query($post_args);

    	echo '<ul>';

    	if ($loop->have_posts()) {
    		while ($loop->have_posts() ) : $loop->the_post(); ?>
    			<li class="announcement-front-page"><a href="<?php echo get_permalink($post->id) ?>">  <?php the_title() ?></a></li>
    		<?php endwhile;
    	} else {
    		echo '<p>' . $instance['no_announcements_text'] . '</p>';
    	}

    	echo '</ul>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// Get Title
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = $defaults['title'];
		}

		// Get Tags
		if ( isset($instance['categories'])) {
			$categories = $instance['categories'];
		} else {
			$categories = $defaults['categories'];
		}

		// Get number of announcements to display.
		if ( isset($instance['num_announcements'])) {
			$num_announcements = $instance['num_announcements'];
		} else {
			$num_announcements = $defaults['num_announcements'];
		}

		// Get Boolean on whether to show more announcements.
		if ( isset($instance['all_announcements'])) {
			$all_announcements = $instance['all_announcements'];
		} else {
			$all_announcements = $defaults['all_announcements'];
		}

		// Get All Announcements Text
		if (isset($instance['all_announcements_text'])) {
			$all_announcements_text = $instance['all_announcements_text'];
		} else {
			$all_announcements_text = $defaults['all_announcements_text'];
		}

		// No Announcements Text
		if (isset($instance['no_announcements_text'])) {
			$no_announcements_text = $instance['no_announcements_text'];
		} else {
			$no_announcements_text = $defaults['no_announcements_text'];
		}

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'categories' ); ?>"><?php _e( 'Categories:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'categories' ); ?>" name="<?php echo $this->get_field_name( 'categories' ); ?>" type="text" value="<?php echo esc_attr( $categories ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num_announcements' ); ?>"><?php _e( 'Number to Display:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'num_announcements' ); ?>" name="<?php echo $this->get_field_name( 'num_announcements' ); ?>" type="text" value="<?php echo esc_attr($num_announcements); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'all_announcements' ); ?>"><?php _e( 'Show All Link:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'all_announcements' ); ?>" name="<?php echo $this->get_field_name( 'all_announcements' ); ?>" type="checkbox" <?php checked($instance['all_announcements'], 'on'); ?>>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'all_announcements_text' ); ?>"><?php _e( 'All Link Text:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'all_announcements_text' ); ?>" name="<?php echo $this->get_field_name( 'all_announcements_text' ); ?>" type="text" value="<?php echo esc_attr( $all_announcements_text ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'no_announcements_text' ); ?>"><?php _e( 'No Items Text:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'no_announcements_text' ); ?>" name="<?php echo $this->get_field_name( 'no_announcements_text' ); ?>" type="text" value="<?php echo esc_attr( $no_announcements_text ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['categories'] = ( ! empty ( $new_instance['tags'] ) ) ? strip_tags( $new_instance['categories'] ) : '';
		$instance['num_announcements'] = ( ! empty ( $new_instance['num_announcements'] ) ) ? intval (strip_tags( $new_instance['num_announcements'] ) ) : 5;
		$instance['all_announcements'] = ( ! empty ( $new_instance['all_announcements'] ) ) ? strip_tags( $new_instance['all_announcements'] ) : false;
		$instance['all_announcements_text'] = ( ! empty ( $new_instance['all_announcements_text'] ) ) ? strip_tags( $new_instance['all_announcements_text'] ) : '';
		$instance['no_announcements_text'] = ( ! empty ( $new_instance['no_announcements_text'] ) ) ? strip_tags( $new_instance['no_announcements_text'] ) : '';

		return $instance;
	}

}

function register_announcement_widget() {
	register_widget('Announcement_Widget');
}

add_action('widgets_init', 'register_announcement_widget');

?>
