<?php
/**
 * Form to replace the default WordPress search form
 *
 * @since 1.0.0
 */
?>
<form role="search" method="get" class="navbar-form navbar-right col-md-2" action="<?php echo esc_url( home_url() ); ?>">
	<label>
		<span class="sr-only"><?php _ex( 'Search for:', 'label', 'arcade' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'arcade' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
</form>
