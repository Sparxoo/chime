<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Sparxoo BP
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function sparxoo_bp_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'sparxoo_bp_jetpack_setup' );
