<?php
/**
 * OutFocus RED functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OutFocus_RED
 */

if ( ! function_exists( 'outfocusred_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function outfocusred_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on OutFocus RED, use a find and replace
	 * to change 'outfocusred' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'outfocusred', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'outfocusred' ),
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
	add_theme_support( 'custom-background', apply_filters( 'outfocusred_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	//Custom Logo feature
	add_theme_support( 'outfocusred_logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
) );

}
endif;
add_action( 'after_setup_theme', 'outfocusred_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function outfocusred_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'outfocusred_content_width', 640 );
}
add_action( 'after_setup_theme', 'outfocusred_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function outfocusred_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'outfocusred' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'outfocusred' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'outfocusred_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function outfocusred_scripts() {
	wp_enqueue_style( 'outfocusred-style', get_stylesheet_uri() );

	wp_enqueue_script( 'outfocusred-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'outfocusred-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css' );
	wp_enqueue_style( 'outfocusred-fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' );

	wp_enqueue_script( 'outfocusred-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'outfocusred_scripts' );

/**
 * Custom Logo
 */

function outfocus_theme_setup() {
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'outfocus_theme_setup');


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

function _remove_script_version( $src ){ 
$parts = explode( '?', $src ); 	
return $parts[0]; 
} 
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
<<<<<<< HEAD
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/**
 * Social Buttons in Single Posts
 */
function socialshare() {
if (is_single()) { ?>
<div id="socialshare">
<div class="shareicon"><a target="_blank" href="whatsapp://send?text=<?php the_title() ?>%0A%0A<?php the_excerpt() ?>%0A<?php the_permalink() ?>" data-action="share/whatsapp/share"><img class="socialicon" src="<?php echo get_template_directory_uri(); ?>/img/social/washare.png"></img></a>
</div>
<div class="shareicon">
	<div id="fb" class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&amp;src=sdkpreparse"><img class="socialicon" src="<?php echo get_template_directory_uri(); ?>/img/social/fbshare.png"></img></a></div>
</div>
<div class="shareicon"><a href="http://twitter.com/share" data-url="<?php the_permalink() ?>" data-via="wpsquare" data-text="<?php the_title(); ?>" data-related="_mandava" data-count="vertical" data-hashtags="WordPress" target="_blank"><img class="socialicon" src="<?php echo get_template_directory_uri(); ?>/img/social/tweet.png"></img></a>
</div>
<div class="shareicon"><a href="https://t.me/share/url?url=<?php the_permalink() ?>&text=<?php the_title(); ?>" data-text="<?php the_title(); ?>" data-url="<?php the_permalink() ?>" target="_blank"><img class="socialicon" src="<?php echo get_template_directory_uri(); ?>/img/social/telegramshare.png"></img></a>
</div>
</div>
<?php }}
=======
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
>>>>>>> origin/master
