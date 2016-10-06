<?php
/**
 * Template part for displaying the page content inside The Loop.
 *
 * @package ysPoet
 */
?>

<div class="page-content">

	<?php

	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ysPoet' ),
			'after'  => '</div>',
		)
	);

	?>

</div><!-- .page-content -->
