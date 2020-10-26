<?php
/**
 * afflectomm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package afflectomm
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.3' );
}

if ( ! function_exists( 'affl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function affl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on afflectomm, use a find and replace
		 * to change 'affl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'affl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		// We want a specialized way to handle title tag, not what someone else thinks we should have
		// add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'affl' ),
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
				'affl_custom_background_args',
				array(
					'default-color' => '15232a',
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

		add_image_size( 'square', 500, 500, true );

	}
endif;
add_action( 'after_setup_theme', 'affl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function affl_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'affl_content_width', 640 );
}
add_action( 'after_setup_theme', 'affl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function affl_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'affl' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'affl' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Post Footer', 'affl' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'affl' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'affl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function affl_scripts() {

	wp_enqueue_style( 'affl-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'affl-style', 'rtl', 'replace' );

	// Google font
	wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css2?amily=Alegreya:ital@1&family=Fira+Sans:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap' );
	wp_enqueue_style( 'googleFonts' );


	wp_enqueue_script( 'affl-navigation', get_template_directory_uri() . '/_assets/js/navigation.js', array(), _S_VERSION, true );


	// On Front Page, TweenMax & Scroll Magic animations
	if( is_front_page() ) {
		wp_register_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), '3.5.1', true );
		wp_register_script( 'scroll-magic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.js', array('jquery'), '2.07', true );
		wp_register_script( 'scroll-magic-add-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array('jquery'), '2.07', true );
		wp_register_script( 'scroll-magic-animations', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js', array('jquery'), '2.07', true );

		wp_enqueue_script( 'gsap' );
		wp_enqueue_script( 'scroll-magic' );
		wp_enqueue_script( 'scroll-magic-add-indicators' );
		wp_enqueue_script( 'scroll-magic-animations' );

		wp_register_script( 'affl-animations', get_template_directory_uri() . '/_assets/js/animations.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'affl-animations' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'affl_scripts' );


/**
 * Add social media accounts to customizer
 */
function affl_more_customizer_section( $wp_customize ) {
	$wp_customize->add_section( 'social_media_section', array(
		'title'       => __( 'Social Media Accounts' ),
		'description' => esc_html__( 'If filled in, these will display in the page footer.' ),
		'priority'    => 160, // Not typically needed. Default is 160
	) );

	// Settings
	$wp_customize->add_setting( 'social_facebook', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_setting( 'social_twitter', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_setting( 'social_instagram', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_setting( 'social_linkedin', array(
		'default'           => '',
		'transport'         => 'postMessage',
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );

	// Controls
	$wp_customize->add_control( 'social_facebook', array(
		'label'       => __( 'Facebook URL' ),
		'section'     => 'social_media_section',
		'priority'    => 10,
		'type'        => 'url',
	) );
	$wp_customize->add_control( 'social_twitter', array(
		'label'       => __( 'Twitter URL' ),
		'section'     => 'social_media_section',
		'priority'    => 10,
		'type'        => 'url',
	) );
	$wp_customize->add_control( 'social_instagram', array(
		'label'       => __( 'Instagram URL' ),
		'section'     => 'social_media_section',
		'priority'    => 10,
		'type'        => 'url',
	) );
	$wp_customize->add_control( 'social_linkedin', array(
		'label'       => __( 'LinkedIn URL' ),
		'section'     => 'social_media_section',
		'priority'    => 10,
		'type'        => 'url',
	) );
};
add_action( 'customize_register', 'affl_more_customizer_section' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/_inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/_inc/template-tags.php';

/**
 * Custom taxonomy
 */
require get_template_directory() . '/_inc/taxon-featured-image-hooks.php';

/**
 * Custom widgets
 */
require get_template_directory() . '/_inc/class-wp-widget-afflecto-recent-posts.php';
function affl_load_widgets() {
	register_widget( 'WP_Widget_AfflectoMM_Recent_Posts' );
}
add_action( 'widgets_init', 'affl_load_widgets' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/_inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/_inc/customizer.php';

/**
 * Enable SVG support
 */
 function add_file_types_to_uploads( $file_types ) {
	 $new_filetypes = array();
	 $new_filetypes['svg'] = 'image/svg+xml';
	 $file_types = array_merge( $file_types, $new_filetypes );
	 return $file_types;
 }
 add_filter( 'upload_mimes', 'add_file_types_to_uploads' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/_inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/_inc/woocommerce.php';
}
