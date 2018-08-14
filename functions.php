<?php
/**
 * mediafish functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mediafish
 */

if ( ! function_exists( 'mediafish_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mediafish_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mediafish, use a find and replace
		 * to change 'mediafish' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mediafish', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mediafish' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mediafish_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mediafish_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mediafish_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mediafish_content_width', 640 );
}
add_action( 'after_setup_theme', 'mediafish_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mediafish_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mediafish' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mediafish' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mediafish_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mediafish_scripts() {
	wp_enqueue_style( 'mediafish-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'mediafish-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'mediafish-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mediafish_scripts' );

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

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

/**
 * Async load (put #asyncload at the end of url)
 */
function ikreativ_async_scripts($url)
{
    if ( strpos( $url, '#asyncload') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#asyncload', '', $url );
    else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
    }
add_filter( 'clean_url', 'ikreativ_async_scripts', 11, 1 );

/**
 * Add Scripts
 */
function add_theme_scripts() {

	//De-Register Native jQuery
	wp_deregister_script( 'jquery' );

	//CDN jQuery
	wp_enqueue_script( 'jquery_custom', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array('velocity.js','velocity.ui.js'), 3.3, true );

	//Pace.js
	wp_enqueue_script( 'pace.js', 'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js#asyncload', array(), 1.0, true);

	//Velocity.js
	wp_enqueue_script( 'velocity.js', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.1/velocity.min.js', array('pace.js'), 1.5, true);

	//Velocity.ui.js
	wp_enqueue_script( 'velocity.ui.js', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.1/velocity.ui.min.js', array('velocity.js'), 1.5, true );

	//My Scripts
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/scripts.min.js', array ('jquery_custom', 'animate'), 1.1, true);

	//Animate.js
	wp_enqueue_script( 'animate', get_template_directory_uri() . '/js/animate.min.js', array ('jquery_custom'), 1.1, true);

	//Portfolio Page scripts
	if(is_page(12)):
		//Smooth Scroll
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array ('jquery_custom'), null, true);

		//ScrollSpy
		wp_enqueue_script( 'scrollspy', get_template_directory_uri() . '/js/scrollspy.js', array ('jquery_custom'), null, true);
	endif;
	
	//Popper.js
	wp_enqueue_script( 'popper.js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array(), 1.12, true );

	//Bootstrap.js
	wp_enqueue_script( 'bootstrap.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery_custom','popper.js'), 4.0, true );

	//Sticky.js
	wp_enqueue_script( 'sticky.js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js', array('jquery_custom'), 1.0, true );

	//Chart.js
	wp_enqueue_script( 'chart.js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js', array('jquery_custom'), 2.7, true );
   
	//Particle.js
	wp_enqueue_script( 'particle.js', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', array('jquery_custom'), 2.0, true );
  }

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

  /*Create bigger Thumbnails*/
 
add_image_size( 'portfolio', 600, 600, true ); // hard crop mode

/*Live Reload for local developement*/
if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');
  }

