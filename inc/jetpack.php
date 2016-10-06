<?php
/**
 * Jetpack compatibility.
 *
 * @package ysPoet
 */

/**
 * Enable support for certain Jetpack modules.
 *
 * @action after_setup_theme
 * @link   https://jetpack.com/support/featured-content/
 * @link   https://jetpack.com/support/infinite-scroll/
 * @since  1.0.0
 */
function ysPoet_jetpack_setup() {

	add_theme_support(
		'infinite-scroll',
		array(
			'container' => 'main',
			'footer'    => 'page',
		)
	);

}
add_action( 'after_setup_theme', 'ysPoet_jetpack_setup' );
