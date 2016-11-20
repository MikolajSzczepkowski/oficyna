<?php

function warsztat_init() {
	register_post_type( 'warsztat', array(
		'labels'            => array(
			'name'                => __( 'Warsztat', 'willow-child' ),
			'singular_name'       => __( 'warsztat', 'willow-child' ),
			'all_items'           => __( 'All warsztaty', 'willow-child' ),
			'new_item'            => __( 'New warsztat', 'willow-child' ),
			'add_new'             => __( 'Add New', 'willow-child' ),
			'add_new_item'        => __( 'Add New warsztat', 'willow-child' ),
			'edit_item'           => __( 'Edit warsztat', 'willow-child' ),
			'view_item'           => __( 'View warsztat', 'willow-child' ),
			'search_items'        => __( 'Search warsztaty', 'willow-child' ),
			'not_found'           => __( 'No warsztaty found', 'willow-child' ),
			'not_found_in_trash'  => __( 'No warsztaty found in trash', 'willow-child' ),
			'parent_item_colon'   => __( 'Parent warsztat', 'willow-child' ),
			'menu_name'           => __( 'Warsztat', 'willow-child' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'dossier'),
		'query_var'         => true,
		'menu_icon'         => 'dashicons-hammer',
		'show_in_rest'      => true,
		'rest_base'         => 'warsztat',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'warsztat_init' );

function warsztat_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['warsztat'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('warsztat updated. <a target="_blank" href="%s">View warsztat</a>', 'willow-child'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'willow-child'),
		3 => __('Custom field deleted.', 'willow-child'),
		4 => __('warsztat updated.', 'willow-child'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('warsztat restored to revision from %s', 'willow-child'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('warsztat published. <a href="%s">View warsztat</a>', 'willow-child'), esc_url( $permalink ) ),
		7 => __('warsztat saved.', 'willow-child'),
		8 => sprintf( __('warsztat submitted. <a target="_blank" href="%s">Preview warsztat</a>', 'willow-child'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('warsztat scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview warsztat</a>', 'willow-child'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('warsztat draft updated. <a target="_blank" href="%s">Preview warsztat</a>', 'willow-child'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'warsztat_updated_messages' );
