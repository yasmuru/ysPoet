<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#content-slug-php
 *
 * @package ysPoet
 * @since 1.0.0
 */
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'ysPoet' ); ?></h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php

			printf(
				esc_html_x( 'Ready to publish your first post? %s.', 'link to write a new post', 'ysPoet' ),
				sprintf(
					'<a href="%s">%s</a>',
					esc_url( admin_url( 'post-new.php' ) ),
					esc_html__( 'Get started here', 'ysPoet' )
				)
			);

			?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ysPoet' ); ?></p>

			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'ysPoet' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- .page-content -->

</section><!-- .no-results -->
