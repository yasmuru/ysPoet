<?php
/**
 * Displays site credit.
 *
 * @package ysPoet
 */
?>

<div class="site-info-text">
<?php

printf(
	esc_html_x( 'Copyright %1$s %2$d %3$s', '1. copyright symbol, 2. year, 3. site title', 'ysPoet' ),
	'&copy;',
	date( 'Y' ),
	get_bloginfo( 'blogname' )
);

if ( (bool) apply_filters( 'ysPoet_author_credit', true ) ) {

	// Credit content

}

?>
</div>
