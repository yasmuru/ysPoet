<?php
/**
 * Displays the footer widget areas.
 *
 * @package ysPoet
 */
?>

<?php if ( $sidebars = ysPoet_get_active_footer_sidebars() ) : ?>

	<div class="footer-widget-area columns-<?php echo count( $sidebars ); ?>">

	<?php foreach ( $sidebars as $sidebar ) : ?>

		<div class="footer-widget">

			<?php dynamic_sidebar( $sidebar ); ?>

		</div>

	<?php endforeach; ?>

	</div>

<?php endif; ?>
