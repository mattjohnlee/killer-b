<?php
/**
 * Bluu functions and definitions
 *
 * @package bluu
 */


/*----------------------------------------------------------------------------*
* Set the content width based on the theme's design
*----------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 740; /* pixels */


/*----------------------------------------------------------------------------*
* Register support for WordPress features
*----------------------------------------------------------------------------*/

if ( ! function_exists( 'bluu_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function bluu_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on bluu, use a find and replace
	 * to change 'bluu' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bluu', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'standard-format', 740, 390, true );
	add_image_size( 'image-format', 740, 600, true );
	add_image_size( 'blog-full', 1100, 400, true );
	add_image_size( 'parallax', 9999, 1200, false );
	add_image_size( 'portfolio-full', 1100, 9999, false );
	add_image_size( 'portfolio-small', 800, 550, true );


	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bluu' ),
		'top' => __( 'Top Menu', 'bluu' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'video' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'bluu_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // bluu_setup
add_action( 'after_setup_theme', 'bluu_setup' );


/*----------------------------------------------------------------------------*
* Register sidebars
*----------------------------------------------------------------------------*/

function bluu_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bluu' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'bluu' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Widget', 'bluu' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'bluu' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'bluu' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'bluu' ),
		'id'            => 'footer-sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'bluu' ),
		'id'            => 'footer-sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'bluu_widgets_init' );


/*----------------------------------------------------------------------------*
* Enqueue JS & CSS
*----------------------------------------------------------------------------*/

function bluu_scripts() {

	/* CSS */
	wp_enqueue_style( 'bluu-style', get_stylesheet_uri() );

	wp_register_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome' ); 

	/* JS */
	wp_enqueue_script( 'jquery', false, array(), false, true );

	wp_register_script( 'masonry', get_template_directory_uri().'/js/jquery.masonry.js', array(), false, true );
	wp_enqueue_script( 'masonry' );

	wp_register_script( 'modernizr', get_template_directory_uri().'/js/jquery.modernizr.js', array(), false, true );
	wp_enqueue_script( 'modernizr' );

	wp_register_script( 'easing', get_template_directory_uri().'/js/jquery.easing.js', array(), false, true );
	wp_enqueue_script( 'easing' );

	wp_register_script( 'isotope', get_template_directory_uri().'/js/jquery.isotope.js', array(), false, true );
	wp_enqueue_script( 'isotope' );

	wp_register_script( 'imagesloaded', get_template_directory_uri().'/js/jquery.imagesloaded.js', array(), false, true );
	wp_enqueue_script( 'imagesloaded' );

	wp_register_script( 'superfish', get_template_directory_uri().'/js/jquery.superfish.js', array(), false, true );
	wp_enqueue_script( 'superfish' );

	wp_register_script( 'parallax', get_template_directory_uri().'/js/jquery.parallax.js', array(), false, true );
	wp_enqueue_script( 'parallax' );

	wp_register_script( 'localscroll', get_template_directory_uri().'/js/jquery.localscroll.js', array(), false, true );
	wp_enqueue_script( 'localscroll' );

	wp_register_script( 'scrollto', get_template_directory_uri().'/js/jquery.scrollTo.js', array(), false, true );
	wp_enqueue_script( 'scrollto' );

	wp_register_script( 'nicescroll', get_template_directory_uri().'/js/jquery.nicescroll.js', array(), false, true );
	wp_enqueue_script( 'nicescroll' );

	wp_register_script( 'fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array(), false, true );
	wp_enqueue_script( 'fitvids' );

	wp_register_script( 'init', get_template_directory_uri().'/js/init.js', array(), false, true );
	wp_enqueue_script( 'init' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'bluu_scripts' );


/*----------------------------------------------------------------------------*
* Load custom functions
*----------------------------------------------------------------------------*/

/* Theme customizer */
require get_template_directory() . '/customizer.php';

/* Custom template tags for this theme */
require get_template_directory() . '/inc/template-tags.php';

/* Custom functions that act independently of the theme templates */
require get_template_directory() . '/inc/extras.php';


/*----------------------------------------------------------------------------*
* Load custom widgets
*----------------------------------------------------------------------------*/

include( 'inc/widgets/widget-facebook.php' );
include( 'inc/widgets/widget-flickr.php' );
include( 'inc/widgets/widget-dribbble.php' );
include( 'inc/widgets/widget-contact.php' );
include( 'inc/widgets/widget-tweets.php' );


/*----------------------------------------------------------------------------*
* Set post thumbnail as background image for parallax posts
*----------------------------------------------------------------------------*/

if ( ! function_exists( 'bluu_parallax_bg_image' ) ) {

    function bluu_parallax_bg_image( $post_id = null, $echo = true ) {

        if ( ! $post_id ) $post_id = get_the_ID(); // id not passed, get current post in a loop

        if ( ! $post_id ) return; // could not get post id, and it was not passed in a function

        $thumb_id = get_post_thumbnail_id( $post_id );

        if ( ! $thumb_id ) return; // no featured image set

        $img_src = wp_get_attachment_image_src( $thumb_id, 'parallax', true );

        if( wp_is_mobile() ) {

	        $custom_css = 
	            "<style type='text/css'>
	                #post-$post_id .project-scroll,
	                #post-$post_id .project-scroll-mobile {
	                    background: url( '$img_src[0]' ) 50% 0 no-repeat;
	                }
	            </style>";

        } else {
        	$custom_css = 
            "<style type='text/css'>
                #post-$post_id .project-scroll,
                #post-$post_id .project-scroll-mobile {
                    background: url( '$img_src[0]' ) 50% 0 no-repeat fixed;
                }
            </style>";
        }

        if ( ! $echo ) return $custom_css;

        echo $custom_css;

    }

}


/*----------------------------------------------------------------------------*
* Custom walker for wp_list_categories in portfolio templates
*----------------------------------------------------------------------------*/

class Portfolio_Walker extends Walker_Category {
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
            extract($args);

            $cat_name = esc_attr( $category->name );
            $cat_name = apply_filters( 'list_cats', $cat_name, $category );
            $link = '<a href="' . esc_attr( get_term_link($category) ) . '" ';
            $link .= 'data-filter="' . urldecode($category->slug) . '" ';
            if ( $use_desc_for_title == 0 || empty($category->description) )
                    $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s', 'bluu' ), $cat_name) ) . '"';
            else
                    $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
            $link .= '>';
            $link .= $cat_name . '</a>';

            if ( !empty($feed_image) || !empty($feed) ) {
                    $link .= ' ';

                    if ( empty($feed_image) )
                            $link .= '(';

                    $link .= '<a href="' . get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) . '"';

                    if ( empty($feed) ) {
                            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'bluu' ), $cat_name ) . '"';
                    } else {
                            $title = ' title="' . $feed . '"';
                            $alt = ' alt="' . $feed . '"';
                            $name = $feed;
                            $link .= $title;
                    }

                    $link .= '>';

                    if ( empty($feed_image) )
                            $link .= $name;
                    else
                            $link .= "<img src='$feed_image'$alt$title" . ' />';

                    $link .= '</a>';

                    if ( empty($feed_image) )
                            $link .= ')';
            }

            if ( !empty($show_count) )
                    $link .= ' (' . intval($category->count) . ')';

            if ( !empty($show_date) )
                    $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);

            if ( 'list' == $args['style'] ) {
                    $output .= "\t<li";
                    $class = 'cat-item cat-item-' . $category->term_id;
                    if ( !empty($current_category) ) {
                            $_current_category = get_term( $current_category, $category->taxonomy );
                            if ( $category->term_id == $current_category )
                                    $class .=  ' current-cat';
                            elseif ( $category->term_id == $_current_category->parent )
                                    $class .=  ' current-cat-parent';
                    }
                    $output .=  ' class="' . $class . '"';
                    $output .= ">$link\n";
            } else {
                    $output .= "\t$link<br />\n";
            }
    }
}


/*----------------------------------------------------------------------------*
* Body class for mobile devices
*----------------------------------------------------------------------------*/

function bluu_check_for_mobile( $mobile_class ) {

	if( wp_is_mobile() ) {
		$mobile_class[] = 'wp-is-mobile';
 	} else {
 		$mobile_class[] = 'wp-is-not-mobile';
 	}

 	return $mobile_class;

}

add_filter( 'body_class', 'bluu_check_for_mobile' );