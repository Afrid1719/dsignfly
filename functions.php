<?php
/**
 * dsignfly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dsignfly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dsignfly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dsignfly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on d\'signfly, use a find and replace
		 * to change 'dsignfly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dsignfly', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dsignfly' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dsignfly_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'dsignfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dsignfly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dsignfly_content_width', 640 );
}
add_action( 'after_setup_theme', 'dsignfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dsignfly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dsignfly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dsignfly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dsignfly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dsignfly_scripts() {
	wp_enqueue_style( 'dsignfly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dsignfly-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dsignfly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsignfly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Dsingfly CPT post type
 *
 * @return void
 */
function dsignfly_register_custom_post_type() {
	$labels = array(
		'name'               => __( 'Dsingfly CPTs', 'dsignfly' ),
		'singular_name'      => __( 'Dsingfly CPT', 'dsignfly' ),
		'add_new'            => __( 'Add Dsingfly CPT', 'dsignfly' ),
		'add_new_item'       => __( 'Add New Dsingfly CPT', 'dsignfly' ),
		'edit_item'          => __( 'Edit Dsingfly CPT', 'dsignfly' ),
		'new_item'           => __( 'New Dsingfly CPT', 'dsignfly' ),
		'view_item'          => __( 'View Dsingfly CPT', 'dsignfly' ),
		'view_items'         => __( 'View Dsingfly CPT', 'dsignfly' ),
		'search_items'       => __( 'Search Dsingfly CPT', 'dsignfly' ),
		'not_found'          => __( 'No Dsingfly CPT found', 'dsignfly' ),
		'not_found_in_trash' => __( 'No Dsingfly CPT found in trash', 'dsignfly' ),
		'all_items'          => __( 'All Dsingfly CPT', 'dsignfly' ),
		'archives'           => __( 'Dsingfly CPT Archives', 'dsignfly' ),
		'attributes'         => __( 'Dsingfly CPT Attributes', 'dsignfly' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'description'         => __( 'This is a custom post type for the theme Dsignfly', 'dsignfly' ),
		'hierarchical'        => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revision' ),
		'capability_type'     => 'post',
		'has_archive'         => __( 'dsignfly-cpt', 'dsignfly' ),
		'rewrite'             => array( 'slug' => 'dsignfly-cpt' ),
		'query_var'           => 'dsignfly_cpt',
	);

	register_post_type( 'dsignfly_cpt', $args );
}
add_action( 'init', 'dsignfly_register_custom_post_type' );

/**
 * Flush rewrite rules for theme's custom post type
 */
add_action( 'after_switch_theme', 'dsignfly_flush_rewrite_rules' );
function dsignfly_flush_rewrite_rules() {
	dsignfly_register_custom_post_type();
	flush_rewrite_rules();
}

/**
 * Register Portfolio Widget
 */
add_action( 'widgets_init', 'dsignfly_register_portfolio_widget' );
function dsignfly_register_portfolio_widget() {
	require_once get_theme_file_path( 'inc/widgets.php' );

	register_widget( 'Dsignfly_Portfolio_Widget' );
}
