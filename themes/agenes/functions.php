<?php
/**
 * agenes functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agenes
 */

if ( ! function_exists( 'agenes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function agenes_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on agenes, use a find and replace
	 * to change 'agenes' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'agenes', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'agenes' ),
                'explore' => esc_html__( 'Explore', 'agenes' ),
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
	add_theme_support( 'custom-background', apply_filters( 'agenes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // agenes_setup
add_action( 'after_setup_theme', 'agenes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agenes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agenes_content_width', 640 );
}
add_action( 'after_setup_theme', 'agenes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agenes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'agenes' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'agenes_widgets_init' );

/*
 * Register custom Post types
 */
function agenes_post_types() {

	// Comic Page
	$labels = array(
        'name'               => 'Comic Page',
        'singular_name'      => 'Comic Page',
        'menu_name'          => 'Comic Pages',
        'name_admin_bar'     => 'Comic Page',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Comic Page',
        'new_item'           => 'New Comic Page',
        'edit_item'          => 'Edit Comic Page',
        'view_item'          => 'View Comic Page',
        'all_items'          => 'All Comic Pages',
        'search_items'       => 'Search Comic Pages',
        'parent_item_colon'  => 'Parent Comic Pages:',
        'not_found'          => 'No posts found.',
        'not_found_in_trash' => 'No posts found in Trash.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-layout',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'comicpage' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'comments' ),
        'taxonomies'		 => array( 'category', 'post_tag' ),
    );

	register_post_type( 'comicpage', $args );
}
add_action( 'init', 'agenes_post_types' );

/**
 * Rewrite flush after creating the custom post types 
*/
function my_rewrite_flush() {

    // *choose function to rewrite flush
    agenes_post_types(); 

    flush_rewrite_rules();

}
register_activation_hook( __FILE__, 'my_rewrite_flush' );

/**
 * Twitter Meta data
 */
function agenesTwitterMeta() { 
if ( is_single() ) {
?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@maurojflores">
    <meta name="twitter:title" content="<?php the_title(); ?> | Remnant Tribes Webcomic">
    <meta name="twitter:description" content="<?php the_excerpt(); ?>">
    <meta name="twitter:creator" content="@maurojflores">
    <?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <meta name="twitter:image" content="<?php echo $feat_image_url; ?>">
    <meta name="twitter:domain" content="remnanttribes.com">
<?php } 
}

add_action('wp_head', 'agenesTwitterMeta');

/**
 * Enqueue scripts and styles.
 */
function agenes_scripts() {
	if ( is_front_page() || is_singular( 'comicpage' ) ) {
	    wp_enqueue_style( 'agenes-mailchimp', '//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css' );
	}
	
	wp_enqueue_style( 'agenes-style', get_stylesheet_uri() );
        
    wp_enqueue_style( 'agenes-custom', get_stylesheet_directory_uri() . '/custom.css', '', '0.0.06' );
	
	// wp_enqueue_style( 'agenes-fa-all', get_stylesheet_directory_uri() . '/fontawesome-pro-all.css' );
	
	wp_enqueue_script( 'agenes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'agenes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        
    wp_enqueue_script( 'backtotop', get_template_directory_uri() . '/js/backtotop.js', array('jquery'), '', true );
	
	// Fontawesome
	wp_enqueue_script( 'agenes-fa-js', get_template_directory_uri() . '/js/fontawesome.all.min.js', array(), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
	}
        
    if ( is_page_template( 'page-templates/explore-world.php' ) ) {
        wp_enqueue_script( 'agenes-explore-world', get_template_directory_uri() . '/js/exploreworld.js', array( 'jquery' ), '', true );
    }
    
    if ( is_page_template( 'page-templates/explore-characters.php' ) ) {
        wp_enqueue_script( 'agenes-explore-chars', get_template_directory_uri() . '/js/explore-chars.js', array( 'jquery' ), '', true );
    }
    
    if ( is_singular( 'comicpage' ) ) {
        wp_enqueue_script( 'agenes-comicpage', get_template_directory_uri() . '/js/comicpage.js', array( 'jquery' ), '', true );
    }

    wp_localize_script( 'agenes-explore-chars', 'ajaxloadchars', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}
add_action( 'wp_enqueue_scripts', 'agenes_scripts' );

/**
 * Load characters with Ajax
 */
function load_character(){
    $char_ID = $_GET['char_ID'];

    $current_char = new WP_Query( array('page_id' => $char_ID) );

    if ( $current_char->have_posts() ) :
        while ( $current_char->have_posts() ) : $current_char->the_post();
        ?>
            <div class="chars-img"><?php the_post_thumbnail(); ?></div>
            <div class="chars-info"><h2><?php the_title(); ?></h2><p><?php the_content(); ?></p></div>
        <?php
        endwhile;
    endif;

    wp_reset_postdata();
    wp_reset_query();
}
add_action( 'wp_ajax_nopriv_load_character', 'load_character' );
add_action( 'wp_ajax_load_character', 'load_character' );

/**
 * Load FontAwesome
 */
// function agenes_fa() {
//     echo '<script src="https://use.fontawesome.com/d620a71ff9.js"></script>';
// }
// add_action( 'wp_head', 'agenes_fa' );

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
