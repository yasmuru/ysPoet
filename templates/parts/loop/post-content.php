<?php
/**
 * Template part for displaying the post content inside The Loop.
 *
 * @package ysPoet
 */
?>

<div class="entry-content">

	<?php

	the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'ysPoet' ) );

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ysPoet' ),
			'after'  => '</div>',
		)
	);

	?>

</div><!-- .entry-content -->
