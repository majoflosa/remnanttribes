<?php
// var_dump( get_stylesheet_directory_uri() );

define( 'REM_DEV_MODE', $_SERVER['HTTP_HOST'] === 'localhost:8888' );
define( 'REM_THEME_URI', get_theme_file_uri() );

/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
 *  Theme Setup
 * = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

/**
 * Theme features support
 */
function rem_theme_features() {
    load_theme_textdomain( 'remnanttribes', get_template_directory() . '/languages' );

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', get_post_format_slugs() );
    add_theme_support( 
        'html5', 
        array( 'comment-list', 'comment-form', 'gallery', 'caption', 'search-form' )
    );
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', 'rem_theme_features' );

/**
 * Navigation Menus
 */
function rem_menus() {
    register_nav_menus( array(
        'main_menu' => __( 'Main Menu', 'remnanttribes' )
    ) );
}
add_action( 'init', 'rem_menus' );

/**
 * Widgetized Areas
 */
function rem_sidebars() {
    register_sidebar( array(
        'name'  => __( 'Sidebar', 'remnanttribes' ),
        'id'    => 'main-sidebar',
        'class' => 'main-sidebar',
        'description'   => __( 'Main sidebar for blog and static pages with default template', 'remnanttribes' ),
        'before_widget' => '<li id="%1$s" class="widget main-sidebar-widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h3 class="widget-title main-sidebar-widget-title>',
        'after_title'   => '</h3>'
    ) );
}
add_action( 'widgets_init', 'rem_sidebars' );


/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
 *  Scripts and Styles
 * = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
function rem_enqueue() {
    $version = REM_DEV_MODE ? time() : null;

    // styles
    wp_register_style( 'rem_theme', REM_THEME_URI . '/assets/dist/main/main.css', array(), $version );
    wp_register_style( 'rem_stylesheet', REM_THEME_URI . '/style.css', array(), $version );

    wp_enqueue_style( 'rem_theme' );
    wp_enqueue_style( 'rem_stylesheet' );

    // scripts
    wp_register_script( 'rem_main', REM_THEME_URI . '/assets/dist/main/main.js', array(), $version );

    wp_enqueue_script( 'rem_main' );
}
add_action( 'wp_enqueue_scripts', 'rem_enqueue' );



/* = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
 *  Files to include for additional functionality
 * = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

// Custom post types
require 'include/custom-post-types/comicpage.php';
require 'include/custom-post-types/mappoint.php';

function rem_register_posttypes() {
    rem_posttype_comicpage();
    rem_posttype_mappoint();

    flush_rewrite_rules();
}
add_action( 'init', 'rem_register_posttypes' );

// Custom taxonomies
require 'include/custom-taxonomies/chapter.php';
require 'include/custom-taxonomies/mappin.php';
// require 'include/custom-taxonomies/mapevent.php';

function rem_register_taxonomies() {
    rem_taxonomy_chapter();
    rem_taxonomy_mappin();
    // rem_taxonomy_mapevent();
    
    flush_rewrite_rules();
}
add_action( 'init', 'rem_register_taxonomies' );
