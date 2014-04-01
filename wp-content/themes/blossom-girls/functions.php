<?php
/**
 * Blossom Girls functions and definitions
 *
 * @package BlossomGirls
 * @since BlossomGirls 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since BlossomGirls 1.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */

if ( ! function_exists( 'BlossomGirls_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since BlossomGirls 1.0
 */
function BlossomGirls_setup() {
 
    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on BlossomGirls, use a find and replace
     * to change 'BlossomGirls' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'BlossomGirls', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
 
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'BlossomGirls' ),
        'secondary' => __( 'Secondary Menu', 'BlossomGirls'),
    ) );
}
endif; // BlossomGirls_setup
add_action( 'after_setup_theme', 'BlossomGirls_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since BlossomGirls 1.0
 */
function BlossomGirls_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Blog Widget Area', 'BlossomGirls' ),
        'id' => 'blog-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Homepage Widget Area', 'BlossomGirls' ),
        'id' => 'homepage-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Main Column Widget Area', 'BlossomGirls' ),
        'id' => 'main-column-widget-area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Tough Topics Widget Area', 'BlossomGirls' ),
        'id' => 'tough-topics-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );

    register_sidebar( array(
        'name' => __( 'Girl Talk Widget Area', 'BlossomGirls' ),
        'id' => 'girl-talk-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'BlossomGirls_widgets_init' );

/**
 * Enqueue any desired scripts and styles
 */
function BlossomGirls_scripts() {
    wp_register_script( 'accordion_script', get_template_directory_uri() . '/js/accordion_script.js', array( 'jquery-ui-accordion', 'jquery') );
    wp_enqueue_script( 'accordion_script' );

    //wp_register_script( 'form-validation-script', get_template_directory_uri() . '/js/form-validation.js' );
    //wp_enqueue_script( 'form-validation-script' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'BlossomGirls_scripts' );

add_theme_support( 'post-thumbnails' ); 
