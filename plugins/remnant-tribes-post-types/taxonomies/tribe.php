<?php
/**
 * Registers 'tribe' taxonomy to classify story characters by their respective tribe
 */
function rem_taxonomy_tribe() {

    $labels = array(
        'name'                          => __( 'Tribes', 'remnanttribes' ),
        'singular_name'                 => __( 'Tribe', 'remnanttribes' ),
        'search_items'                  => __( 'Search Tribes', 'remnanttribes' ),
        'popular_items'                 => __( 'Popular Tribes', 'remnanttribes' ),
        'all_items'                     => __( 'All Tribes', 'remnanttribes' ),
        'parent_item'                   => __( 'Parent Tribe', 'remnanttribes' ),
        'parent_item_colon'             => __( 'Parent Tribe:', 'remnanttribes' ),
        'edit_item'                     => __( 'Edit Tribe', 'remnanttribes' ),
        'view_item'                     => __( 'View Tribe', 'remnanttribes' ),
        'update_item'                   => __( 'Update Tribe', 'remnanttribes' ),
        'add_new_item'                  => __( 'Add New Tribe', 'remnanttribes' ),
        'new_item_name'                 => __( 'New Tribe Name', 'remnanttribes' ),
        'separate_items_with_commas'    => __( 'Separate Tribes with commas', 'remnanttribes' ),
        'add_or_remove_items'           => __( 'Add or remove Tribes', 'remnanttribes' ),
        'choose_from_most_used'         => __( 'Choose from the most used Tribes', 'remnanttribes' ),
        'not_found'                     => __( 'No Tribes found.', 'remnanttribes' ),
        'no_terms'                      => __( 'No Tribes.', 'remnanttribes' ),
        'items_list_navigation'         => __( 'Tribes navigation', 'remnanttribes' ),
        'items_list'                    => __( 'Tribes list', 'remnanttribes' ),
        'most_used'                     => __( 'Most Used', 'remnanttribes' ),
        'back_to_items'                 => __( 'Back to Tribes', 'remnanttribes' ),
    );

    $args = array(
        'labels'    => $labels,
        'description'   => __( 
            'This taxonomy should be used to group story characters by their respective tribes', 
            'remnanttribes' 
        ),
        'public'    => true,
        'publicly_queryable'    => true,
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'tribe',
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
        'query_var'             => 'tribe',
    );

    register_taxonomy( 'tribe', 'character', $args );
}