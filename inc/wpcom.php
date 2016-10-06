<?php
/**
 * WordPress.com-specific functions and definitions.
 *
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package ysPoet
 */

/**
 * Adds support for wp.com-specific theme functions.
 *
 * @action after_setup_theme
 * @global array $themecolors
 * @since  1.0.0
 */
function ysPoet_wpcom_setup() {

	global $themecolors;

	if ( ! isset( $themecolors ) ) {

		$themecolors = array(
			'bg'     => '',
			'border' => '',
			'text'   => '',
			'link'   => '',
			'url'    => '',
		);

	}

}
add_action( 'after_setup_theme', 'ysPoet_wpcom_setup' );
