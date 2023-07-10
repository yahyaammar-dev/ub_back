<?php
	function university_post_types() {
	
		register_post_type('destination', array(
			'show_in_rest' => true,
			// by default post types get title and editor - needed to add thumbnail for Destination image
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'labels' => array(
				'name' => 'Destinations',
				'add_new_item' => 'Add New Destination',
				'edit_item' => 'Edit Destination',
				'all_items' => 'All Destinations',
				'singular_name' => 'Destination'
			),
			// Icon for the WP dashboard
			'menu_icon' => 'dashicons-welcome-learn-more'));
			
		register_post_type('hotel', array(
			'show_in_rest' => true,
			// by default post types get title and editor - needed to add thumbnail for Destination image
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'labels' => array(
				'name' => 'Hotels',
				'add_new_item' => 'Add New Hotel',
				'edit_item' => 'Edit Hotel',
				'all_items' => 'All Hotels',
				'singular_name' => 'Hotel'
			),
			// Icon for the WP dashboard
			'menu_icon' => 'dashicons-welcome-learn-more'));
			
		register_post_type('freelancer', array(
			'show_in_rest' => true,
			// by default post types get title and editor - needed to add thumbnail for Destination image
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'labels' => array(
				'name' => 'Freelancers',
				'add_new_item' => 'Add New Freelancer',
				'edit_item' => 'Edit Freelancer',
				'all_items' => 'All Freelancers',
				'singular_name' => 'Freelancer'
			),
			// Icon for the WP dashboard
			'menu_icon' => 'dashicons-welcome-learn-more'));

	}
	add_action('init', "university_post_types");
