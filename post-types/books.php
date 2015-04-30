<?php

function books_init() {
	register_post_type( 'books', array(
		'labels'            => array(
			'name'                => __( 'Books', 'kavik' ),
			'singular_name'       => __( 'Books', 'kavik' ),
			'all_items'           => __( 'Books', 'kavik' ),
			'new_item'            => __( 'New Books', 'kavik' ),
			'add_new'             => __( 'Add New', 'kavik' ),
			'add_new_item'        => __( 'Add New Books', 'kavik' ),
			'edit_item'           => __( 'Edit Books', 'kavik' ),
			'view_item'           => __( 'View Books', 'kavik' ),
			'search_items'        => __( 'Search Books', 'kavik' ),
			'not_found'           => __( 'No Books found', 'kavik' ),
			'not_found_in_trash'  => __( 'No Books found in trash', 'kavik' ),
			'parent_item_colon'   => __( 'Parent Books', 'kavik' ),
			'menu_name'           => __( 'Books', 'kavik' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor','thumbnail' ),
		'has_archive'       => false,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-book-alt',
	) );

}
add_action( 'init', 'books_init' );

function books_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['books'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Books updated. <a target="_blank" href="%s">View Books</a>', 'kavik'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'kavik'),
		3 => __('Custom field deleted.', 'kavik'),
		4 => __('Books updated.', 'kavik'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Books restored to revision from %s', 'kavik'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Books published. <a href="%s">View Books</a>', 'kavik'), esc_url( $permalink ) ),
		7 => __('Books saved.', 'kavik'),
		8 => sprintf( __('Books submitted. <a target="_blank" href="%s">Preview Books</a>', 'kavik'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Books scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Books</a>', 'kavik'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Books draft updated. <a target="_blank" href="%s">Preview Books</a>', 'kavik'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'books_updated_messages' );
