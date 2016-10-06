<?php
/**
 * Template part for displaying the post footer on search results inside The Loop.
 *
 * @package ysPoet
 */
?>

<footer class="entry-footer">

	<?php if ( 'post' == get_post_type() ) : ?>

		<?php $category_list = get_the_category_list( esc_html_x( ', ', 'separator for items in a list', 'ysPoet' ) ); ?>

		<?php if ( $category_list && ysPoet_has_active_categories() ) : ?>

			<span class="cat-links">

				<?php printf( esc_html_x( 'Posted in: %s', 'category list', 'ysPoet' ), $category_list ); ?>

			</span>

		<?php endif; ?>

		<?php $tag_list = get_the_tag_list( '', esc_html_x( ', ', 'separator for items in a list', 'ysPoet' ) ); ?>

		<?php if ( $tag_list ) : ?>

			<span class="tags-links">

				<?php printf( esc_html_x( 'Filed under: %s', 'tag list', 'ysPoet' ), $tag_list ); ?>

			</span>

		<?php endif; ?>

	<?php endif; ?>

	<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>

		<span class="comments-link"><?php comments_popup_link( esc_html__( 'Leave a comment', 'ysPoet' ), esc_html__( '1 Comment', 'ysPoet' ), esc_html_x( '% Comments', 'number of comments', 'ysPoet' ) ); ?></span>

	<?php endif; ?>

	<?php edit_post_link( esc_html__( 'Edit', 'ysPoet' ), '<span class="edit-link">', '</span>' ); ?>

</footer><!-- .entry-footer -->
