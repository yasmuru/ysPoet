<?php
/**
 * ysPoet back compat functionality.
 *
 * Prevents ysPoet from running on older WordPress versions since
 * this theme is not meant to be backward compatible beyond two
 * major versions and relies on many newer functions and markup.
 *
 * @package ysPoet
 * @since   1.0.0
 */

/**
 * Prevent switching to ysPoet on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 1.0.0
 */
function ysPoet_switch_theme() {

	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'ysPoet_upgrade_notice' );

}
add_action( 'after_switch_theme', 'ysPoet_switch_theme' );

/**
 * Return the required WordPress version upgrade message.
 *
 * @since 1.0.0
 *
 * @return string
 */
function ysPoet_get_wp_upgrade_message() {

	/**
	 * Filter the required WordPress version upgrade message.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	return (string) apply_filters( 'ysPoet_required_wp_version_message',
		sprintf(
			__( 'ysPoet requires at least WordPress version %s. You are running version %s. Please upgrade and try again.', 'ysPoet' ),
			ysPoet_MIN_WP_VERSION,
			get_bloginfo( 'version' )
		)
	);

}

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to
 * activate ysPoet on older WordPress versions.
 *
 * @since 1.0.0
 */
function ysPoet_upgrade_notice() {

	printf( '<div class="error"><p>%s</p></div>', ysPoet_get_wp_upgrade_message() );

}

/**
 * Prevents the Customizer from being loaded on older WordPress versions.
 *
 * @action load-customize.php
 * @since  1.0.0
 */
function ysPoet_customize() {

	wp_die( ysPoet_get_wp_upgrade_message(), '', array( 'back_link' => true ) );

}
add_action( 'load-customize.php', 'ysPoet_customize' );

/**
 * Prevents the Theme Preview from being loaded on older WordPress versions.
 *
 * @action template_redirect
 * @since  1.0.0
 */
function ysPoet_preview() {

	if ( isset( $_GET['preview'] ) ) {

		wp_die( ysPoet_get_wp_upgrade_message() );

	}

}
add_action( 'template_redirect', 'ysPoet_preview' );
