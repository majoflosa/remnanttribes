<?php

function rem_admin_gutenberg_test_block() {
    global $rem_blocks;
    $asset_file = include( REM_GUTENBERG_PATH . '/editor/build/index.asset.php');

    wp_register_script( 
        'rem-admin-test-block', 
        REM_GUTENBERG_URI . '/editor/build/index.js', 
        $asset_file['dependencies'],
        time() 
    );

    wp_register_style('rem-admin-block-styles', REM_GUTENBERG_URI . '/assets/css/block-styles.css' );

    register_block_type( 'rem-blocks/test-block', [
        'editor_script' => 'rem-admin-test-block',
        'render_callback' => 'rem_render_test_block',
        'attributes' => [
            'attr_test' => [
                'type' => 'string'
            ]
        ]
        // 'editor_style' => 'rem-admin-block-styles',
        // 'script' => 'rem-test-block', // front-end script for the block
        // 'style' => 'rem-test-block-style', // front-end style for the block
        // 'render_callback' => 'rem-some-callback-rendering-template', // if php templates are preferred
    ]);

    $rem_blocks->add_block( 'test-block' );
}

function rem_render_test_block( $attributes, $content ) {
    global $rem_blocks;
    
    $rem_blocks->set_block_attributes( 'test-block', $attributes );
    $rem_blocks->set_block_content( 'test-block', $content );

    ob_start();
    get_template_part( 'blocks/global/test-block' );
    $output = ob_get_clean();
    
    return $output;
}