<?php
/**
 * Displays the primary navigation.
 *
 * @package ysPoet
 */
?>

<div class="main-navigation-container">

	<?php
	/**
	 * Fires inside the `<div class="main-navigation-container">` element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'ysPoet_before_site_navigation' );
	?>

	<nav id="site-navigation" class="main-navigation" role="navigation">

		<?php
		/**
		 * Fires inside the `<nav id="site-navigation" class="main-navigation" role="navigation">` element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ysPoet_site_navigation' );
		?>

	</nav><!-- #site-navigation -->

	<?php
	/**
	 * Fires after the `<nav id="site-navigation" class="main-navigation" role="navigation">` element.
	 *
	 * @since 1.0.0
	 */
	do_action( 'ysPoet_after_site_navigation' );
	?>

</div>
