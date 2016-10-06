<?php
/**
 * ysPoet functions and definitions.
 *
 * Set up the theme and provide some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 *
 * @package ysPoet
 * @since   1.0.0
 */

/**
 * ysPoet theme version.
 *
 * @since 1.0.0
 *
 * @var string
 */
define( 'ysPoet_VERSION', '1.0.0' );

/**
 * Minimum WordPress version required for ysPoet.
 *
 * @since 1.0.0
 *
 * @var string
 */
if ( ! defined( 'ysPoet_MIN_WP_VERSION' ) ) {

	define( 'ysPoet_MIN_WP_VERSION', '4.4' );

}

/**
 * Enforce the minimum WordPress version requirement.
 *
 * @since 1.0.0
 */
if ( version_compare( get_bloginfo( 'version' ), ysPoet_MIN_WP_VERSION, '<' ) ) {

	require_once get_template_directory() . '/inc/back-compat.php';

}

/**
 * Load custom helper functions for this theme.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/helpers.php';

/**
 * Load custom template tags for this theme.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Load custom primary nav menu walker.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/walker-nav-menu.php';

/**
 * Load template parts and override some WordPress defaults.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/hooks.php';

/**
 * Load Customizer class.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load WooCommerce compatibility file.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Jetpack compatibility file.
 *
 * @since 1.0.0
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the 'after_setup_theme' hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0.0
 */
function ysPoet_setup() {

	/**
	 * Filter registered image sizes.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$images_sizes = (array) apply_filters( 'ysPoet_image_sizes',
		array(
			'ysPoet-featured' => array(
				'width'  => 1600,
				'height' => 9999,
				'crop'   => false,
			),
			'ysPoet-hero' => array(
				'width'  => 2400,
				'height' => 1300,
				'crop'   => array( 'center', 'center' ),
			),
		)
	);

	foreach ( $images_sizes as $name => $args ) {

		if (
			! empty( $name )
			&&
			! empty( $args['width'] )
			&&
			! empty( $args['height'] )
			&&
			! empty( $args['crop'] )
		) {

			add_image_size(
				sanitize_key( $name ),
				absint( $args['width'] ),
				absint( $args['height'] ),
				$args['crop']
			);

		}

	}

	/**
	 * Enable support for Automatic Feed Links.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 * @since 1.0.0
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for plugins and themes to manage the document title tag.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 * @since 1.0.0
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 * @since 1.0.0
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for customizer selective refresh
	 *
	 * https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
	 * @since 1.0.0
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Register custom Custom Navigation Menus.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/register_nav_menus
	 * @since 1.0.0
	 */
	register_nav_menus(
		/**
		 * Filter registered nav menus.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		(array) apply_filters( 'ysPoet_nav_menus',
			array(
				'primary' => esc_html__( 'Primary Menu', 'ysPoet' ),
				'social'  => esc_html__( 'Social Menu', 'ysPoet' ),
				'footer'  => esc_html__( 'Footer Menu', 'ysPoet' ),
			)
		)
	);

	/**
	 * Enable support for HTML5 markup.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 * @since 1.0.0
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/**
	 * Enable support for Post Formats.
	 *
	 * @link  https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Formats
	 * @since 1.0.0
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		)
	);

}
add_action( 'after_setup_theme', 'ysPoet_setup' );

/**
 * Sets the content width in pixels, based on the theme layout.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @action after_setup_theme
 * @global int $content_width
 * @since  1.0.0
 */
function ysPoet_content_width() {

	$layout        = ysPoet_get_layout();
	$content_width = ( 'one-column-wide' === $layout ) ? 1068 : 688;

	/**
	 * Filter the content width in pixels.
	 *
	 * @since 1.0.0
	 *
	 * @param string $layout
	 *
	 * @var int
	 */
	$GLOBALS['content_width'] = (int) apply_filters( 'ysPoet_content_width', $content_width, $layout );

}
add_action( 'after_setup_theme', 'ysPoet_content_width', 0 );

/**
 * Enable support for custom editor style.
 *
 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/
 * @since 1.0.0
 */
add_action( 'admin_init', 'add_editor_style', 10, 0 );

/**
 * Register sidebar areas.
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0.0
 */
function ysPoet_register_sidebars() {

	/**
	 * Filter registered sidebars areas.
	 *
	 * @since 1.0.0
	 *
	 * @var array
	 */
	$sidebars = (array) apply_filters( 'ysPoet_sidebars',
		array(
			'sidebar-1' => array(
				'name'          => esc_html__( 'Sidebar', 'ysPoet' ),
				'description'   => esc_html__( 'The primary sidebar appears alongside the content of every page, post, archive, and search template.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'sidebar-2' => array(
				'name'          => esc_html__( 'Secondary Sidebar', 'ysPoet' ),
				'description'   => esc_html__( 'The secondary sidebar will only appear when you have selected a three-column layout.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-1' => array(
				'name'          => esc_html__( 'Footer 1', 'ysPoet' ),
				'description'   => esc_html__( 'This sidebar is the first column of the footer widget area.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-2' => array(
				'name'          => esc_html__( 'Footer 2', 'ysPoet' ),
				'description'   => esc_html__( 'This sidebar is the second column of the footer widget area.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'footer-3' => array(
				'name'          => esc_html__( 'Footer 3', 'ysPoet' ),
				'description'   => esc_html__( 'This sidebar is the third column of the footer widget area.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			),
			'hero' => array(
				'name'          => esc_html__( 'Hero', 'ysPoet' ),
				'description'   => esc_html__( 'Hero widgets appear over the header image on the front page.', 'ysPoet' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
		)
	);

	foreach ( $sidebars as $id => $args ) {

		register_sidebar( array_merge( array( 'id' => $id ), $args ) );

	}

}
add_action( 'widgets_init', 'ysPoet_register_sidebars' );

/**
 * Enqueue theme scripts and styles.
 *
 * @link  https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @link  https://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @since 1.0.0
 */
function ysPoet_scripts() {

	$stylesheet = get_stylesheet();
	$suffix     = SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( $stylesheet, get_stylesheet_uri(), false, defined( 'ysPoet_CHILD_VERSION' ) ? ysPoet_CHILD_VERSION : ysPoet_VERSION );

	wp_style_add_data( $stylesheet, 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'ysPoet-navigation', get_template_directory_uri() . "/assets/js/navigation{$suffix}.js", array( 'jquery' ), ysPoet_VERSION, true );
	wp_enqueue_script( 'ysPoet-skip-link-focus-fix', get_template_directory_uri() . "/assets/js/skip-link-focus-fix{$suffix}.js", array(), ysPoet_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	if ( ysPoet_has_hero_image() ) {

		wp_add_inline_style(
			$stylesheet,
			sprintf(
				'%s { background-image: url(%s); }',
				ysPoet_get_hero_image_selector(),
				esc_url( ysPoet_get_hero_image() )
			)
		);

	}

}
add_action( 'wp_enqueue_scripts', 'ysPoet_scripts' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @action wp
 * @global WP_Query $wp_query
 * @global WP_User  $authordata
 * @since  1.0.0
 */
function ysPoet_setup_author() {

	global $wp_query, $authordata;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {

		$authordata = get_userdata( $wp_query->post->post_author );

	}

}
add_action( 'wp', 'ysPoet_setup_author' );

/**
 * Reset the transient for the active categories check.
 *
 * @action create_category
 * @action edit_category
 * @action delete_category
 * @action save_post
 * @see    ysPoet_has_active_categories()
 * @since  1.0.0
 */
function ysPoet_has_active_categories_reset() {

	delete_transient( 'ysPoet_has_active_categories' );

}
add_action( 'create_category', 'ysPoet_has_active_categories_reset' );
add_action( 'edit_category',   'ysPoet_has_active_categories_reset' );
add_action( 'delete_category', 'ysPoet_has_active_categories_reset' );
add_action( 'save_post',       'ysPoet_has_active_categories_reset' );
