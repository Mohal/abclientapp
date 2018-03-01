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
