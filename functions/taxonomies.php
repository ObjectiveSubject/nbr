<?php

/* Schools
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_schools');

function cptui_register_my_taxes_schools() {
	register_taxonomy( 'schools',array (
		  0 => 'student-grants',
		),
		array( 'hierarchical' => true,
			'label' => 'Schools',
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'student-grants/schools' ),
			'show_admin_column' => false,
			'labels' => array (
			  'search_items' => 'Search Schools',
			  'popular_items' => 'Popular Schools',
			  'all_items' => 'All Schools',
			  'parent_item' => 'Parent School',
			  'parent_item_colon' => 'Parent School:',
			  'edit_item' => 'Edit School',
			  'update_item' => 'Update School',
			  'add_new_item' => 'Add new School',
			  'new_item_name' => 'New School name',
			  'separate_items_with_commas' => 'Separate Schools with commas',
			  'add_or_remove_items' => 'Add or remove Schools',
			  'choose_from_most_used' => 'Choose from most used Schools',
			)
		) 
	); 
}

/* grant-year
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_grant_year');

function cptui_register_my_taxes_grant_year() {
	register_taxonomy( 'grant-year',array (
		  0 => 'student-grants',
		  1 => 'partners',
		),
		array( 'hierarchical' => true,
			'label' => 'Grant Years',
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'student-grants/grant-year' ),
			'show_admin_column' => true,
			'labels' => array (
			  'search_items' => 'Search Grant Years',
			  'popular_items' => 'Popular Grant Years',
			  'all_items' => 'All Grant Years',
			  'parent_item' => 'Parent Grant Year',
			  'parent_item_colon' => 'Parent Grant Year:',
			  'edit_item' => 'Edit Grant Year',
			  'update_item' => 'Update Grant Year',
			  'add_new_item' => 'Add new Grant Year',
			  'new_item_name' => 'New Grant Year name',
			  'separate_items_with_commas' => 'Separate Grant Years with commas',
			  'add_or_remove_items' => 'Add or remove Grant Years',
			  'choose_from_most_used' => 'Choose from most used Grant Years',
			)
		) 
	); 
}

/* award-years
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_award_years');
function cptui_register_my_taxes_award_years() {
register_taxonomy( 'award-years',array (
  0 => 'awards',
  1 => 'galas',
  2 => 'partners',
),
array( 'hierarchical' => true,
	'label' => 'Award Years',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => true,
	'labels' => array (
	  'search_items' => 'Search Award Years',
	  'popular_items' => 'Popular Award Years',
	  'all_items' => 'All Award Years',
	  'parent_item' => 'Parent Award Year',
	  'parent_item_colon' => 'Parent Award Year:',
	  'edit_item' => 'Edit Award Year',
	  'update_item' => 'Update Award Year',
	  'add_new_item' => 'Add new Award Year',
	  'new_item_name' => 'New Award Year name',
	  'separate_items_with_commas' => 'Separate Award Years with commas',
	  'add_or_remove_items' => 'Add or remove Award Years',
	  'choose_from_most_used' => 'Choose from most used Award Years',
	)
) ); 
}

/* award-formats
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_award_formats');
function cptui_register_my_taxes_award_formats() {
register_taxonomy( 'award-formats',array (
  0 => 'awards',
),
array( 'hierarchical' => true,
	'label' => 'Award Formats',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
	  'search_items' => 'Search Award Formats',
	  'popular_items' => 'Popular Award Formats',
	  'all_items' => 'All Award Formats',
	  'parent_item' => 'Parent Award Format',
	  'parent_item_colon' => 'Parent Award Format:',
	  'edit_item' => 'Edit Award Format',
	  'update_item' => 'Update Award Format',
	  'add_new_item' => 'Add new Award Format',
	  'new_item_name' => 'New Award Format name',
	  'separate_items_with_commas' => 'Separate Award Formats with commas',
	  'add_or_remove_items' => 'Add or remove Award Formats',
	  'choose_from_most_used' => 'Choose from most used Award Formats',
	)
) ); 
}

/* award-names
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_award_names');
function cptui_register_my_taxes_award_names() {
register_taxonomy( 'award-names',array (
  0 => 'awards',
),
array( 'hierarchical' => true,
	'label' => 'Award Names',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => false,
	'labels' => array (
	  'search_items' => 'Search Award Names',
	  'popular_items' => 'Popular Award Names',
	  'all_items' => 'All Award Names',
	  'parent_item' => 'Parent Award Name',
	  'parent_item_colon' => 'Parent Award Name:',
	  'edit_item' => 'Edit Award Name',
	  'update_item' => 'Update Award Name',
	  'add_new_item' => 'Add new Award Name',
	  'new_item_name' => 'New Award Name name',
	  'separate_items_with_commas' => 'Separate Award Names with commas',
	  'add_or_remove_items' => 'Add or remove Award Names',
	  'choose_from_most_used' => 'Choose from most used Award Names',
	)
) ); 
}

/* partner-year
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_partner_year');
function cptui_register_my_taxes_partner_year() {
register_taxonomy( 'partner-year',array (
  0 => 'partners',
),
array( 'hierarchical' => true,
	'label' => 'Partner Years',
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => array( 'slug' => 'partners' ),
	'show_admin_column' => true,
	'labels' => array (
	  'search_items' => 'Search Partner Years',
	  'popular_items' => 'Popular Partner Years',
	  'all_items' => 'All Partner Years',
	  'parent_item' => 'Parent Partner Year',
	  'parent_item_colon' => 'Parent Partner Year:',
	  'edit_item' => 'Edit Partner Year',
	  'update_item' => 'Update Partner Year',
	  'add_new_item' => 'Add new Partner Year',
	  'new_item_name' => 'New Partner Year name',
	  'separate_items_with_commas' => 'Separate Partner Years with commas',
	  'add_or_remove_items' => 'Add or remove Partner Years',
	  'choose_from_most_used' => 'Choose from most used Partner Years',
)
) ); 
}

/* partner-type
-------------------------------------------------- */
add_action('init', 'cptui_register_my_taxes_partner_type');

function cptui_register_my_taxes_partner_type() {
	register_taxonomy( 'partner-type',
		array (
	  	0 => 'partners',
		),
		array( 'hierarchical' => true,
			'label' => 'Partner Types',
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'partner-type' ),
			'show_admin_column' => true,
			'labels' => array (
			  'search_items' => 'Search Partner Types',
			  'popular_items' => 'Popular Partner Types',
			  'all_items' => 'All Partner Types',
			  'parent_item' => 'Parent Partner Type',
			  'parent_item_colon' => 'Parent Partner Type:',
			  'edit_item' => 'Edit Partner Type',
			  'update_item' => 'Update Partner Type',
			  'add_new_item' => 'Add new Partner Type',
			  'new_item_name' => 'New Partner Type name',
			  'separate_items_with_commas' => 'Separate Partner Types with commas',
			  'add_or_remove_items' => 'Add or remove Partner Types',
			  'choose_from_most_used' => 'Choose from most used Partner Types',
			)
		) 
	); 
}


?>