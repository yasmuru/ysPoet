<?php
/**
 * Template part for displaying the post title inside The Loop.
 *
 * @package ysPoet
 */
?>

<header class="entry-header">

	<div class="entry-header-row">

		<div class="entry-header-column">

			<?php
			/**
			 * Fires before the post title element.
			 *
			 * @since 1.0.0
			 */
			do_action( 'ysPoet_before_post_title' );
			?>

			<?php if ( is_singular() ) : ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php else : ?>

				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="permalink"><?php the_title(); ?></a></h2>

			<?php endif; ?>

			<?php
			/**
			 * Fires after the post title element.
			 *
			 * @since 1.0.0
			 */
			do_action( 'ysPoet_after_post_title' );
			?>

		</div><!-- .entry-header-column -->

	</div><!-- .entry-header-row -->

</header><!-- .entry-header -->
