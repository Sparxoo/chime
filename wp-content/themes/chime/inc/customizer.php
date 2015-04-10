<?php
/**
 * Sparxoo BP Theme Customizer
 *
 * @package Sparxoo BP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sparxoo_bp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'sparxoo_bp_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sparxoo_bp_customize_preview_js() {
	wp_enqueue_script( 'sparxoo_bp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'sparxoo_bp_customize_preview_js' );


/**
 * Customize the wp-admin login screen.
 */
/** function my_custom_login_screen() {
    echo '<style type="text/css">
		h1 {
			font-weight: 400;
			overflow: hidden;
			background: #fff;
			-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.13);
			box-shadow: 0 1px 3px rgba(0,0,0,.13);
			background:#fff;
		}
        .login h1 a { 
			background-image:url('.get_bloginfo('template_directory').'/images/ADD_IMAGE_TITLE) !important; width:163px !important; height:77px !important; background-size:163px !important; 
			margin:20px auto;
		}
		body.login {background-image: url('.get_bloginfo('template_directory').'/images/ADD_IMAGE_TITLE) !important; background-size:cover;
	}
	.login #backtoblog a, .login #nav a{
		color:#000;
	}
    </style>';
}

add_action('login_head', 'my_custom_login_screen'); **/


/**
 * Change the Title of the Featured Image Metabox on the edit screen.
 */
add_action('do_meta_boxes', 'change_image_box');
function change_image_box()
{	
	//changes the title for the page content type
    remove_meta_box( 'postimagediv', 'page', 'side' );
    add_meta_box('postimagediv', __('Hero Banner Image'), 'post_thumbnail_meta_box', 'page', 'normal', 'high');

}
