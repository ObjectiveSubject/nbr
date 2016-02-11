<?php

/* Galas Post Type
-------------------------------------------------- */
add_action('init', 'cptui_register_my_cpt_galas');

function cptui_register_my_cpt_galas() {
	register_post_type('galas', array(
			'label' => 'Galas',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'galas', 'with_front' => true),
			'query_var' => true,
			'menu_position' => '5',
			'supports' => array('title','editor','thumbnail'),
			'menu_icon' => 'dashicons-tickets-alt',
			'labels' => array (
			  'name' => 'Galas',
			  'singular_name' => 'Gala',
			  'menu_name' => 'Galas',
			  'add_new' => 'Add Gala',
			  'add_new_item' => 'Add New Gala',
			  'edit' => 'Edit',
			  'edit_item' => 'Edit Gala',
			  'new_item' => 'New Gala',
			  'view' => 'View Gala',
			  'view_item' => 'View Gala',
			  'search_items' => 'Search Galas',
			  'not_found' => 'No Galas Found',
			  'not_found_in_trash' => 'No Galas Found in Trash',
			  'parent' => 'Parent Gala',
			)
		)
	);
}

/* Student Grants Post Type
-------------------------------------------------- */
add_action('init', 'cptui_register_my_cpt_student_grants');

function cptui_register_my_cpt_student_grants() {
	register_post_type('student-grants', array(
			'label' => 'Student Grants',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'student-grant', 'with_front' => true),
			'query_var' => true,
			'menu_position' => '5',
			'supports' => array('title','editor','excerpt'),
			'menu_icon' => 'dashicons-welcome-learn-more',
			'labels' => array (
			  'name' => 'Student Grants',
			  'singular_name' => 'Student Grant',
			  'menu_name' => 'Student Grants',
			  'add_new' => 'Add Student Grant',
			  'add_new_item' => 'Add New Student Grant',
			  'edit' => 'Edit',
			  'edit_item' => 'Edit Student Grant',
			  'new_item' => 'New Student Grant',
			  'view' => 'View Student Grant',
			  'view_item' => 'View Student Grant',
			  'search_items' => 'Search Student Grants',
			  'not_found' => 'No Student Grants Found',
			  'not_found_in_trash' => 'No Student Grants Found in Trash',
			  'parent' => 'Parent Student Grant',
			)
		)
	);
}


/* Awards Post Type
-------------------------------------------------- */
add_action('init', 'cptui_register_my_cpt_awards');

function cptui_register_my_cpt_awards() {
	register_post_type('awards', array(
			'label' => 'Awards',
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => true,
			'rewrite' => array('slug' => 'awards', 'with_front' => true),
			'query_var' => true,
			'menu_position' => '5',
			'supports' => array('title','editor','excerpt','thumbnail','page-attributes'),
			'menu_icon' => 'dashicons-awards',
			'labels' => array (
			  'name' => 'Awards',
			  'singular_name' => 'Award',
			  'menu_name' => 'Awards',
			  'add_new' => 'Add Award',
			  'add_new_item' => 'Add New Award',
			  'edit' => 'Edit',
			  'edit_item' => 'Edit Award',
			  'new_item' => 'New Award',
			  'view' => 'View Award',
			  'view_item' => 'View Award',
			  'search_items' => 'Search Awards',
			  'not_found' => 'No Awards Found',
			  'not_found_in_trash' => 'No Awards Found in Trash',
			  'parent' => 'Parent Award',
			)
		)
	);
}

/* Partners Post Type
-------------------------------------------------- */
add_action('init', 'cptui_register_my_cpt_partners');

function cptui_register_my_cpt_partners() {
	register_post_type('partners', array(
			'label' => 'Partners',
			'description' => 'This is my description about Partners',
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'partner', 'with_front' => true),
			'query_var' => true,
			'has_archive' => true,
			'menu_position' => '5',
			'supports' => array('title','editor','thumbnail','page-attributes'),
			'taxonomies' => array('grant-year','award-years'),
			'menu_icon' => 'dashicons-groups',
			'labels' => array (
			  'name' => 'Partners',
			  'singular_name' => 'Partner',
			  'menu_name' => 'Partners',
			  'add_new' => 'Add Partner',
			  'add_new_item' => 'Add New Partner',
			  'edit' => 'Edit',
			  'edit_item' => 'Edit Partner',
			  'new_item' => 'New Partner',
			  'view' => 'View Partner',
			  'view_item' => 'View Partner',
			  'search_items' => 'Search Partners',
			  'not_found' => 'No Partners Found',
			  'not_found_in_trash' => 'No Partners Found in Trash',
			  'parent' => 'Parent Partner',
			)
		)
	);
}

?>
