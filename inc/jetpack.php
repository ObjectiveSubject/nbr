<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package nbr
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function nbr_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'nbr_jetpack_setup' );
