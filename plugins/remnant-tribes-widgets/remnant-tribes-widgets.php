<?php
/**
 * Plugin Name: Remnant Tribes Widgets
 * Description: Provides custom widgets for Remnant Tribes theme
 */
add_action( 'widgets_init', 'remnant_tribes_widgets' );

function remnant_tribes_widgets() {
    register_widget( 'Rem_Latest_Comic_Pages' );
}

require plugin_dir_path( __FILE__ ) . '/widgets/latest-comic-pages.php';