<?php
/**
 * Template part for displaying the post excerpt inside The Loop.
 *
 * @package ysPoet
 */
?>

<div class="entry-summary">

	<?php the_excerpt(); ?>

	<p><a class="button" href="<?php the_permalink(); ?>"><?php printf( esc_html_x( 'Continue Reading %s', 'right arrow (LTR) / left arrow (RTL)', 'ysPoet' ), is_rtl() ? '&larr;' : '&rarr;' ); ?></a></p>

</div><!-- .entry-summary -->
