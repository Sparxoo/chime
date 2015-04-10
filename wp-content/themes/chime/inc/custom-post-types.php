<?php
/* This page walks you through creating 
a custom post type and taxonomies.

You can add all your custom posts in here.
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bp_flush_rewrite_rules' );

// Flush your rewrite rules
function bp_flush_rewrite_rules() {
	flush_rewrite_rules();
}


/***********************
/*  Custom POST TYPE
***********************/

	// let's create the function for the custom type
	function custom_post_type() { 
		// creating (registering) the custom type 
		register_post_type( 'custom_post', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
			// let's now add all the options for this post type
			array( 'labels' => array(
				'name' => __( 'Custom Posts', 'gathering-spot' ), /* This is the Title of the Group */
				'singular_name' => __( 'Custom Post', 'gathering-spot' ), /* This is the individual type */
				'all_items' => __( 'All Custom Posts', 'gathering-spot' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'gathering-spot' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Custom Post', 'gathering-spot' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'gathering-spot' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Custom Post', 'gathering-spot' ), /* Edit Display Title */
				'new_item' => __( 'New Custom Post', 'gathering-spot' ), /* New Display Title */
				'view_item' => __( 'View Custom Post', 'gathering-spot' ), /* View Display Title */
				'search_items' => __( 'Search Custom Posts', 'gathering-spot' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the Database.', 'gathering-spot' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'gathering-spot' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'description' => __( 'Adds Custom Posts to the website', 'gathering-spot' ), /* Custom Type Description */
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
				'rewrite'	=> array( 'slug' => 'custom-posts', 'with_front' => false ), /* you can specify its url slug */
				'has_archive' => false, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
				'supports' => array( 'title', 'editor', 'author', 'trackbacks', 'thumbnail', 'revisions', 'sticky', 'excerpt')
			) /* end of options */
		); /* end of register post type */
	
		/* this adds your post categories to your custom post type */
		register_taxonomy_for_object_type( 'custom_post_category', 'custom_post' );

			// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_post_category', 
		array('custom_post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Custom Categories', 'gathering-spot' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Category', 'gathering-spot' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Categories', 'gathering-spot' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Categories', 'gathering-spot' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Categories', 'gathering-spot' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Category:', 'gathering-spot' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Category', 'gathering-spot' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Category', 'gathering-spot' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Category', 'gathering-spot' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Category', 'gathering-spot' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-category' ),
		)
	);
	
}
	
	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_type');

?>