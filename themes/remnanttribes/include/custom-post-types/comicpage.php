<?php

/**
 * Registers the 'comicpage' post type for comic pages
 */
function rem_posttype_comicpage() {

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
        'not_found_in_trash' => 'No posts found in Trash.'
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