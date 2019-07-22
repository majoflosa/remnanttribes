<?php

/**
 * Registers the 'chapter' taxonomy to group comic pages
 */
function rem_taxonomy_chapter() {

    $labels = array(
        'name'                          => __( 'Chapters', 'remnanttribes' ),
        'singular_name'                 => __( 'Chapter', 'remnanttribes' ),
        'search_items'                  => __( 'Search Chapters', 'remnanttribes' ),
        'popular_items'                 => __( 'Popular Chapters', 'remnanttribes' ),
        'all_items'                     => __( 'All Chapters', 'remnanttribes' ),
        'parent_item'                   => __( 'Parent Chapter', 'remnanttribes' ),
        'parent_item_colon'             => __( 'Parent Chapter:', 'remnanttribes' ),
        'edit_item'                     => __( 'Edit Chapter', 'remnanttribes' ),
        'view_item'                     => __( 'View Chapter', 'remnanttribes' ),
        'update_item'                   => __( 'Update Chapter', 'remnanttribes' ),
        'add_new_item'                  => __( 'Add New Chapter', 'remnanttribes' ),
        'new_item_name'                 => __( 'New Chapter Name', 'remnanttribes' ),
        'separate_items_with_commas'    => __( 'Separate chapters with commas', 'remnanttribes' ),
        'add_or_remove_items'           => __( 'Add or remove chapters', 'remnanttribes' ),
        'choose_from_most_used'         => __( 'Choose from the most used chapters', 'remnanttribes' ),
        'not_found'                     => __( 'No chapters found.', 'remnanttribes' ),
        'no_terms'                      => __( 'No chapters.', 'remnanttribes' ),
        'items_list_navigation'         => __( 'Chapters navigation', 'remnanttribes' ),
        'items_list'                    => __( 'Chapters list', 'remnanttribes' ),
        'most_used'                     => __( 'Most Used', 'remnanttribes' ),
        'back_to_items'                 => __( 'Back to Chapters', 'remnanttribes' ),
    );

    $args = array(
        'labels'    => $labels,
        'description'   => __( 
            'This taxonomy should be used to group comic pages by their respective chapter', 
            'remnanttribes' 
        ),
        'public'    => true,
        'publicly_queryable'    => true,
        'hierarchical'          => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'chapter',
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
        'query_var'             => 'chapter',
    );

    register_taxonomy( 'chapter', 'comicpage', $args );
}