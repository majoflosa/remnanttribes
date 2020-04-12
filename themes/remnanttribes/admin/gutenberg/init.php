<?php
define( 'REM_GUTENBERG_URI', REM_THEME_URI . '/admin/gutenberg' );
define( 'REM_GUTENBERG_PATH', REM_THEME_PATH . '/admin/gutenberg' );

function rem_admin_gutenberg_test_block() {
    $asset_file = include( REM_GUTENBERG_PATH . '/blocks/build/index.asset.php');

    wp_register_script( 
        'rem-admin-test-block', 
        REM_GUTENBERG_URI . '/blocks/build/index.js', 
        $asset_file['dependencies'],
        time() 
    );

    wp_register_style('rem-admin-block-styles', REM_GUTENBERG_URI . '/assets/css/block-styles.css' );

    register_block_type( 'rem-blocks/test-block', [
        'editor_script' => 'rem-admin-test-block',
        'render_callback' => 'rem_render_test_block',
        // 'editor_style' => 'rem-admin-block-styles',
        // 'script' => 'rem-test-block', // front-end script for the block
        // 'style' => 'rem-test-block-style', // front-end style for the block
        // 'render_callback' => 'rem-some-callback-rendering-template', // if php templates are preferred
    ]);
}
add_action( 'init', 'rem_admin_gutenberg_test_block' );

function rem_render_test_block() {
    ob_start();
    get_template_part( 'blocks/home/hero-home');
    $output = ob_get_clean();
    return $output;
}

// function rem_admin_gutenberg_scripts() {
//     $asset_file = include( REM_GUTENBERG_URI . '/blocks/build/index.asset.php');

//     wp_enqueue_script( 
//         'rem-admin-test', 
//         REM_GUTENBERG_URI . '/blocks/build/index.js', 
//         $asset_file['dependencies'],
//         time() 
//     );
// }
// add_action( 'enqueue_block_editor_assets', 'rem_admin_gutenberg_scripts' );

function rem_admin_gutenberg_styles() {
    wp_enqueue_style( 'rem-admin-block-styles', REM_GUTENBERG_URI . '/assets/css/block-styles.css' );
}
add_action( 'enqueue_block_assets', 'rem_admin_gutenberg_styles' );
