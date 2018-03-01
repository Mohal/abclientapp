<?php

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

/*
 * Remove this action and callback function if you do not whish to use LESS to style your site or overwrite UIkit variables.
 * If you are using LESS, make sure to enable development mode via the Admin->Appearance->Settings option. LESS will then be processed on the fly.
 */
add_action( 'beans_uikit_enqueue_scripts', 'beans_child_enqueue_uikit_assets' );

function beans_child_enqueue_uikit_assets() {

	beans_compiler_add_fragment( 'uikit', get_stylesheet_directory_uri() . '/style.less', 'less' );

}

// Remove this action and callback function if you are not adding CSS in the style.css file.
add_action( 'wp_enqueue_scripts', 'beans_child_enqueue_assets' );

function beans_child_enqueue_assets()
{
	wp_register_style('jquery_datepicker', get_stylesheet_directory_uri() . '/jquery.datepick.package-5.1.0/css/jquery.datepick.css');
	wp_enqueue_style('jquery_datepicker');

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

	// Enqueue Custom Stylesheet
	wp_register_style('custom_css', get_stylesheet_directory_uri() . '/css/custom.css');
	wp_enqueue_style('custom_css');

	// Enqueue Custom Library
	wp_register_script('custom_js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));
	wp_enqueue_script('custom_js');

	wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array('jquery'));
	wp_enqueue_script('validation');

	wp_register_script('jquery_datepicker_plugin', get_stylesheet_directory_uri() . '/jquery.datepick.package-5.1.0/js/jquery.plugin.min.js', array('jquery'));
	wp_enqueue_script('jquery_datepicker_plugin');

	wp_register_script('jquery_datepicker', get_stylesheet_directory_uri() . '/jquery.datepick.package-5.1.0/js/jquery.datepick.min.js', array('jquery'));
	wp_enqueue_script('jquery_datepicker');

}

function example_footer_credit_right_text()
{
	return 'Beans Theme modified';
}
// Modify the footer credit right text.
add_filter('beans_footer_credit_right_text_output', 'example_footer_credit_right_text');

/*
* Creating a function to create our CPT
*/
 
function create_client_post_type()
{
 
	// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => __('Clients'),
        'singular_name'       => __('Client'),
        'menu_name'           => __('Clients'),
        'parent_item_colon'   => __('Parent Client'),
        'all_items'           => __('All Clients'),
        'view_item'           => __('View Client'),
        'add_new_item'        => __('Add New Client'),
        'add_new'             => __('Add New'),
        'edit_item'           => __('Edit Client'),
        'update_item'         => __('Update Client'),
        'search_items'        => __('Search Client'),
        'not_found'           => __('Not Found'),
        'not_found_in_trash'  => __('Not found in Trash'),
    );
     
	// Set other options for Custom Post Type
    $args = array(
        'label'               => __('clients'),
        'description'         => __('Client news and reviews'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
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
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type('ab_client', $args);
 
}
 
add_action('init', 'create_client_post_type', 0);
