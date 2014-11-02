<?php

	require 'custom-post-types.php';
	require 'custom-fields.php';

	date_default_timezone_set('America/New_York');

	function remove_version() { return ''; } add_filter('the_generator', 'remove_version');

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
    //	if( !empty($instance['title']) ){
//		    echo $args['before_title'];
		    //echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);
//		    echo $args['after_title'];
  //  	}
		
    	$post_args = array('post_type' => 'announcement', 'posts_per_page' => $instance['num_announcements'], 'category__in' => explode(',', $instance['categories']));
    	$loop = new WP_Query($post_args);

    	echo '<ul class="announcement-widget">';

    	if ($loop->have_posts()) {
    		while ($loop->have_posts() ) : $loop->the_post(); ?>
    			<li class="announcement-item"><a href="<?php echo get_permalink($post->id) ?>">  <?php the_title() ?></a></li>
    		<?php endwhile;
    	} else {
    		echo '<li class="announcement-item">' . $instance['no_announcements_text'] . '</li>';
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


function myFeedFilter($query) {
	if ($query->is_feed) {
		if (isset($_GET['post_type'])) {
			$post_types = explode(',', $_GET['post_type']);
			$query->set('post_type', $post_types);
		}
	}
	return $query;
}

add_filter('pre_get_posts', 'myFeedFilter');

add_filter( 'em_events_build_sql_conditions', 'my_em_scope_conditions',1,2);
function my_em_scope_conditions($conditions, $args){
	if( !empty($args['scope']) && $args['scope'] == 'this-week' ){
		$start_date = date('Y-m-d', strtotime('Last Monday', time()));
		$end_date = date('Y-m-d', strtotime('Next Sunday', time()));
		$conditions['scope'] = " (event_start_date BETWEEN CAST('$start_date' AS DATE) AND CAST('$end_date' AS DATE)) OR (event_end_date BETWEEN CAST('$end_date' AS DATE) AND CAST('$start_date' AS DATE))";
	}
	return $conditions;
}

add_filter('em_events_build_sql_conditions', 'seven_days_scope', 1, 2);
function seven_days_scope($conditions, $args) {
	if ( !empty($args['scope']) && $args['scope'] == 'seven-days' ) {
		$start_date = date('Y-m-d', strtotime('now', time()));
		$end_date = date('Y-m-d', strtotime('+7 day', time()));	
		$conditions['scope'] = " (event_start_date BETWEEN CAST('$start_date' AS DATE) AND CAST('$end_date' AS DATE)) OR (event_end_date BETWEEN CAST('$end_date' AS DATE) AND CAST('$start_date' AS DATE))";
	}
	return $conditions;
}

add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items.get_search_form();

    return $items;
}

?>
