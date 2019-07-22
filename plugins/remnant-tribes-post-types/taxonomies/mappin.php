<?php

/**
 * Registers the 'mappin' taxonomy to group points on the interactive map
 */
function rem_taxonomy_mappin() {

    $labels = array(
        'name'                          => __( 'Map Pins', 'remnanttribes' ),
        'singular_name'                 => __( 'Map Pin', 'remnanttribes' ),
        'search_items'                  => __( 'Search Map Pins', 'remnanttribes' ),
        'popular_items'                 => __( 'Popular Map Pins', 'remnanttribes' ),
        'all_items'                     => __( 'All Map Pins', 'remnanttribes' ),
        'parent_item'                   => __( 'Parent Map Pin', 'remnanttribes' ),
        'parent_item_colon'             => __( 'Parent Map Pin:', 'remnanttribes' ),
        'edit_item'                     => __( 'Edit Map Pin', 'remnanttribes' ),
        'view_item'                     => __( 'View Map Pin', 'remnanttribes' ),
        'update_item'                   => __( 'Update Map Pin', 'remnanttribes' ),
        'add_new_item'                  => __( 'Add New Map Pin', 'remnanttribes' ),
        'new_item_name'                 => __( 'New Map Pin Name', 'remnanttribes' ),
        'separate_items_with_commas'    => __( 'Separate map pins with commas', 'remnanttribes' ),
        'add_or_remove_items'           => __( 'Add or remove map pins', 'remnanttribes' ),
        'choose_from_most_used'         => __( 'Choose from the most used map pins', 'remnanttribes' ),
        'not_found'                     => __( 'No map pins found.', 'remnanttribes' ),
        'no_terms'                      => __( 'No map pins.', 'remnanttribes' ),
        'items_list_navigation'         => __( 'Map Pins navigation', 'remnanttribes' ),
        'items_list'                    => __( 'Map Pins list', 'remnanttribes' ),
        'most_used'                     => __( 'Most Used', 'remnanttribes' ),
        'back_to_items'                 => __( 'Back to Map pins', 'remnanttribes' ),
    );

    $args = array(
        'labels'    => $labels,
        'description'   => __( 
            'This taxonomy should be used to categorize points on the interactive map.', 
            'remnanttribes' 
        ),
        'public'    => true,
        'publicly_queryable'    => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'mappin',
        'rest_controller_base'  => 'WP_REST_Terms_Controller',
        'show_tagcloud'         => false,
        'show_in_quick_edit'    => true,
        'show_admin_column'     => true,
        'capabilities'          => array(
            'manage_terms',
            'edit_terms',
            'delete_terms',
            'assign_terms'
        ),
        'rewrite'               => true,
        'query_var'             => 'mappin',
    );

    register_taxonomy( 'mappin', 'mappoint', $args );
}