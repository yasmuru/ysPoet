<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#comments-php
 *
 * @package ysPoet
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {

	return;

}

?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title"><?php

			printf(
				_nx(
					'One thought on %2$s',
					'%1$d thoughts on %2$s',
					get_comments_number(),
					'1. number of comments, 2. post title',
					'ysPoet'
				),
				number_format_i18n( get_comments_number() ),
				sprintf(
					'<span>&ldquo;%s&rdquo;</span>',
					get_the_title()
				)
			);

		?></h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-above" class="comment-navigation" role="navigation">

				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ysPoet' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( sprintf( esc_html_x( '%s Older Comments', 'left arrow (LTR) / right arrow (RTL)', 'ysPoet' ), is_rtl() ? '&rarr;' : '&larr;' ) ); ?></div>

				<div class="nav-next"><?php next_comments_link( sprintf( esc_html_x( 'Newer Comments %s', 'right arrow (LTR) / left arrow (RTL)', 'ysPoet' ), is_rtl() ? '&larr;' : '&rarr;' ) ); ?></div>

			</nav><!-- #comment-nav-above -->

		<?php endif; ?>

		<ol class="comment-list"><?php

			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);

		?></ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

			<nav id="comment-nav-below" class="comment-navigation" role="navigation">

				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ysPoet' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'ysPoet' ) ); ?></div>

				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'ysPoet' ) ); ?></div>

			</nav><!-- #comment-nav-below -->

		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ysPoet' ); ?></p>

	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
