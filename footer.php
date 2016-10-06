<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#footer-php
 *
 * @package ysPoet
 * @since 1.0.0
 */
?>

		</div><!-- #content -->

		<?php
		/**
		 * Fires before the `<footer>` element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ysPoet_before_footer' );
		?>

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="site-footer-inner">

				<?php
				/**
				 * Fires inside the `<footer>` element.
				 *
				 * @since 1.0.0
				 */
				do_action( 'ysPoet_footer' );
				?>

			</div><!-- .site-footer-inner -->

		</footer><!-- #colophon -->

		<?php
		/**
		 * Fires after the `<footer>` element.
		 *
		 * @since 1.0.0
		 */
		do_action( 'ysPoet_after_footer' );
		?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>

</html>
