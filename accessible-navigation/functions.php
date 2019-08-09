<?php
/**
 * Accessible Navigation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Accessible Navigation
 */

if ( ! function_exists( 'accessible_navigation_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function accessible_navigation_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Accessible Navigation, use a find and replace
		 * to change 'Accessible Navigation' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'accessible-navigation', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'accessible-navigation' ),
			'social' => esc_html__( 'Social Menu', 'accessible-navigation' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'accessible_navigation_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function accessible_navigation_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'accessible_navigation_content_width', 640 );
}
add_action( 'after_setup_theme', 'accessible_navigation_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function accessible_navigation_scripts() {
	wp_enqueue_style( 'accessible-navigation-style', get_stylesheet_uri() );

	// Add Dashicons font, used in the main stylesheet.
	wp_enqueue_style( 'dashicons', get_theme_file_uri() . '/css/dashicons.css', array(), '20190715' );

	wp_enqueue_script( 'accessible-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20190715', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'accessible-navigation', 'accessibleNavigationScreenReaderText', array(
		'expandMain'   => __( 'Open the main menu', 'accessible-navigation' ),
		'collapseMain' => __( 'Close the main menu', 'accessible-navigation' ),
		'expandChild'   => __( 'expand submenu', 'accessible-navigation' ),
		'collapseChild' => __( 'collapse submenu', 'accessible-navigation' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'accessible_navigation_scripts' );



