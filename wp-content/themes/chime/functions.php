<?php
/**
 * Sparxoo BP functions and definitions
 *
 * @package Sparxoo BP
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sparxoo_bp_setup' ) ) :
	
/*****************************************************************************
 * THEME SUPPORT
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 ******************************************************************************/
	
function sparxoo_bp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sparxoo BP, use a find and replace
	 * to change 'sparxoo-bp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sparxoo-bp', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	// default thumb size
	set_post_thumbnail_size(125, 125, true);
	//custom thumbnail sizes
	add_image_size('hero-banner', 2000);
	add_image_size('mobile-large', 600);

	// Create Wordpress Nav Menus.
    register_nav_menus( array(
		'main-menu' => __( 'Main Menu', 'sparxoo-bp' ),
		'footer-menu' => __( 'Footer Menu', 'sparxoo-bp' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sparxoo_bp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // sparxoo_bp_setup
add_action( 'after_setup_theme', 'sparxoo_bp_setup' );


/*********************
REGISTER WIDGET AREAS
@link http://codex.wordpress.org/Function_Reference/register_sidebar
*********************/

function sparxoo_bp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sparxoo-bp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Site By', 'sparxoo-bp' ),
		'id'            => 'site-by',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Get In Touch', 'sparxoo-bp' ),
		'id'            => 'get-in-touch',
		'description'   => '',
		'before_widget' => '<div class="get-in-touch">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'sparxoo_bp_widgets_init' );

/*********************
SCRIPTS & ENQUEUEING
loading modernizr and jquery, and reply script
*********************/
function sparxoo_bp_scripts() {
	
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	
	if (!is_admin()) {
		//Bootstrap
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css' );
		//Bootstrap theme
		wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap/bootstrap-theme.min.css' );
		//Add them CSS
		wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css' );
		wp_enqueue_style( 'theme-fonts', get_template_directory_uri() . '/css/fonts.css' );
		wp_enqueue_style( 'theme-animate', get_template_directory_uri() . '/css/animate.css' );
		
		//add custom Google fonts.  The can be replaced with the Google fonts that are relevant to this theme.
	    //wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	    wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,400italic,600italic,700,700italic,800,800italic');
	
		//jQuery
		wp_enqueue_script( 'jquery');
		//Modernizer
		wp_enqueue_script( 'modernizer', get_template_directory_uri() . '/js/lib/modernizr.min.js', array('jquery'), '', false );
		//Skrollr
		wp_enqueue_script( 'skroller-js', get_template_directory_uri() . '/js/lib/skrollr.js', array('jquery'), '', false );
		//Froogaloop - this is Vimeo's mini API library
		wp_enqueue_script( 'Froogaloop-js', get_template_directory_uri() . '/js/lib/Froogaloop.min.js', array('jquery'), '', false );
		
		//all our custom jquery
		wp_enqueue_script( 'plugins-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '', false );
		wp_enqueue_script( 'circletype-js', get_template_directory_uri() . '/js/circletype.js', array('jquery'), '', false );
		wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', false );
		

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// add conditional wrapper around ie stylesheet
		$wp_styles->add_data( 'bp-ie-only', 'conditional', 'lt IE 9' );
	}
}
add_action( 'wp_enqueue_scripts', 'sparxoo_bp_scripts' );




/*********************
MENUS & NAVIGATION
*********************/
// the main menu
function bp_main_top_nav() {
	//enable to add custom menu functionality to this menu
	//$walker = new Menu_With_Description;
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'theme_location' => 'main-menu',                // the location in the theme that this menu is tied to (see register_nav_menus) 
		'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		'menu_class' => 'nav main-nav clearfix',        // adding custom nav class
		'menu_id' => 'main-menu',                  // id for the menu  
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'main_nav_fallback'      // fallback function
	));
} /* end boilerplate main nav */

// the main menu
function bp_main_mobile_nav() {
	//enable to add custom menu functionality to this menu
	//$walker = new Menu_With_Description;
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'theme_location' => 'main-menu',                // the location in the theme that this menu is tied to (see register_nav_menus) 
		'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		'menu_class' => 'nav main-nav clearfix',        // adding custom nav class
		'menu_id' => 'mobile-menu',                 	// id for the menu  
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => 'main_nav_fallback'      // fallback function
	));
} /* end boilerplate main nav */

// the main menu
function bp_footer_nav() {
	//$walker = new Menu_With_Description;
	// display the wp3 menu if available
	wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'theme_location' => 'footer-menu',                // the location in the theme that this menu is tied to (see register_nav_menus) 
		'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		'menu_class' => 'nav footer-nav clearfix',        // adding custom nav class
		'menu_id' => 'footer-menu',                  // id for the menu  
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'walker' =>  $walker,                            //customize the output of the menu
		'fallback_cb' => 'footer_nav_fallback'      // fallback function
	));
} /* end boilerplate main nav */

// this is the fallback for the main menu
function main_nav_fallback() {
	/* you can put a default here if you like */
}

// this is the fallback for the footer menu
function footer_nav_fallback() {
	/* you can put a default here if you like */
}


/*
The function below can be used to extend the Wordpress Menu to have custom functionality.
The example below adds a description to the navigation menu items but Walker_Nav_Menus can be extended to do a number of different things.

This is commented out so it won't work but you can enable it by removing the the commenting tages below.
Please note that you also have to add $walker = new Menu_With_Description to the function above that defines your wp_nav_menu.
*/

/** class Menu_With_Description extends Walker_Nav_Menu {
    function start_lvl(&$output, $item, $depth=0) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$output .= "\n<ul class='sub-menu'>\n";
		$output .= "<li class='sub-menu-title'>Subtitle</li>";
    }
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$depthClass = ( $depth == 0  ? 'first-level' : 'sub-level' ); // define top level nav
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' ' . $depthClass . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' class="' . $depthClass . '"><span class="menu-title">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span><span class="description">' . $item->description . '</span>' . do_shortcode('[icon name="arrow-right" class="fa-angle-right"]');
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
} **/


/** Add Custom Post Types to the site **/
//require get_template_directory() . '/inc/custom-post-types.php';

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
 * All Custom functions will be added in here including custom loops, returned arrays, exc.
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
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');