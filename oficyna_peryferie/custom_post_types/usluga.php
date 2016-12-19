<?php

function usluga_init() {
	register_post_type( 'usluga', array(
		'labels'            => array(
			'name'                => __( 'Usługa', 'willow-child' ),
			'singular_name'       => __( 'usługa', 'willow-child' ),
			'all_items'           => __( 'All usługi', 'willow-child' ),
			'new_item'            => __( 'New usługa', 'willow-child' ),
			'add_new'             => __( 'Add New', 'willow-child' ),
			'add_new_item'        => __( 'Add New usługa', 'willow-child' ),
			'edit_item'           => __( 'Edit usługa', 'willow-child' ),
			'view_item'           => __( 'View usługa', 'willow-child' ),
			'search_items'        => __( 'Search usługi', 'willow-child' ),
			'not_found'           => __( 'No usługi found', 'willow-child' ),
			'not_found_in_trash'  => __( 'No usługi found in trash', 'willow-child' ),
			'parent_item_colon'   => __( 'Parent usługa', 'willow-child' ),
			'menu_name'           => __( 'Usługa', 'willow-child' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'uslugi'),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-clipboard',
		'show_in_rest'      => true,
		'rest_base'         => 'usługa',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'usluga_init' );

function usluga_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['usługa'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('usługa updated. <a target="_blank" href="%s">View usługa</a>', 'willow-child'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'willow-child'),
		3 => __('Custom field deleted.', 'willow-child'),
		4 => __('usługa updated.', 'willow-child'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('usługa restored to revision from %s', 'willow-child'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('usługa published. <a href="%s">View usługa</a>', 'willow-child'), esc_url( $permalink ) ),
		7 => __('usługa saved.', 'willow-child'),
		8 => sprintf( __('usługa submitted. <a target="_blank" href="%s">Preview usługa</a>', 'willow-child'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('usługa scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview usługa</a>', 'willow-child'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('usługa draft updated. <a target="_blank" href="%s">Preview usługa</a>', 'willow-child'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'usluga_updated_messages' );
