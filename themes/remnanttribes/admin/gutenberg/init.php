<?php

define( 'REM_GUTENBERG_URI', REM_THEME_URI . '/admin/gutenberg' );
define( 'REM_GUTENBERG_PATH', REM_THEME_PATH . '/admin/gutenberg' );

// require custom theme class for block management
require REM_GUTENBERG_PATH . '/Rem_Blocks.php';
// require custom blocks
require REM_GUTENBERG_PATH . '/blocks/test-block.php';

// include admin styles
add_action( 'enqueue_block_assets', 'rem_admin_gutenberg_styles' );
function rem_admin_gutenberg_styles() {
    wp_enqueue_style( 'rem-admin-block-styles', REM_GUTENBERG_URI . '/assets/css/block-styles.css' );
}

// hook in custom blocks
$rem_blocks = Rem_Blocks::get_instance();
add_action( 'init', 'rem_admin_gutenberg_test_block' );
