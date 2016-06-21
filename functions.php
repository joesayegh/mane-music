<?php
/**
 * mane-music functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mane-music
 */

if ( ! function_exists( 'mane_music_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mane_music_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mane-music, use a find and replace
	 * to change 'mane-music' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mane-music', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'mane-music' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mane_music_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mane_music_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mane_music_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mane_music_content_width', 640 );
}
add_action( 'after_setup_theme', 'mane_music_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mane_music_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mane-music' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mane-music' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mane_music_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mane_music_scripts() {
	wp_enqueue_style( 'mane-music-style', get_stylesheet_uri() );

// FontAwesome
	wp_enqueue_style( 'mane-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

// Google Fonts
	wp_enqueue_style( 'mane-google-fonts', 'https://fonts.googleapis.com/css?family=Oswald:400,300,700');

// ALL SCRIPTS
	wp_enqueue_script( 'mane-music-global-min', get_template_directory_uri() . '/js/global.min.js', array(), '20151215', true );

// Jquery
    wp_enqueue_script( 'mane-music-jQuery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', false);

	// wp_enqueue_script( 'mane-music-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mane_music_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Remove Query String from Static Resources
 **/

function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


/**
 * Custom Login Screen
 */

function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
        	background-image: url("<?php bloginfo(template_url);?>/img/logo.svg") !important;
			background-position: center top !important;
			background-repeat: no-repeat !important;
			background-size: 250px auto !important;
			display: block !important;
			line-height: 1.3em !important;
			outline: 0 none !important;
			padding: 5px !important;
			text-indent: -9999px !important;
			width: 275px !important;
		}
		.login form {
		    background: none !important;
		    box-shadow: none !important;
		    margin-left: 0 !important;
		    margin-top: 20px !important;
		    padding: 18px 24px !important;
		}
		.login form .input, .login input[type="text"] {
		    font-size: 14px !important;
		    margin: 2px 6px 16px 0 !important;
		    padding: 6px !important;
		    width: 100% !important;
		}
		.login label {
			color: #fff !important;
/*			color: #48c0e0 !important;*/
			font-size: 14px !important;
		}
		#login_error, .login .message {
			margin: 25px !important;
			max-width: 275px !important;
			padding: 12px !important;
		}
		.login #backtoblog a, .login #nav a, .login h1 a {
			color: #fff !important;
			text-decoration: none !important;
		}
		#login {
		    margin: auto !important;
		    padding: 10% 0 0 !important;
		    width: 320px !important;
		}
		body {
		    background: #10202f none repeat scroll 0 0 !important;
		    color: #444 !important;
		    line-height: 1.4em !important;
		    min-width: 0 !important;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
?>