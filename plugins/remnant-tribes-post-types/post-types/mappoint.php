<?php

/**
 * Registers the 'mappoint' post type for location items on the interactive map
 */
function rem_posttype_mappoint() {

    $labels = array(
        'name'                  => __( 'Map Point', 'remnanttribes' ),
        'singular_name'         => __( 'Map Point' , 'remnanttribes' ),
        'menu_name'             => __( 'Map Points', 'remnanttribes' ),
        'name_admin_bar'        => __( 'Map Point', 'remnanttribes' ),
        'add_new'               => __( 'Add New', 'remnanttribes' ),
        'add_new_item'          => __( 'Add New Map Point', 'remnanttribes' ),
        'new_item'              => __( 'New Map Point', 'remnanttribes' ),
        'edit_item'             => __( 'Edit Map Point', 'remnanttribes' ),
        'view_item'             => __( 'View Map Point', 'remnanttribes' ),
        'view_items'            => __( 'View Map Points', 'remnanttribes' ),
        'all_items'             => __( 'All Map Points', 'remnanttribes' ),
        'search_items'          => __( 'Search Map Points', 'remnanttribes' ),
        'parent_item_colon'     => __( 'Parent Map Points:', 'remnanttribes' ),
        'not_found'             => __( 'No map points found.', 'remnanttribes' ),
        'not_found_in_trash'    => __( 'No map points found in Trash.', 'remnanttribes' ),
        'archives'              => __( 'Map Point Archives', 'remnanttribes' ),
        'attributes'            => __( 'Map Point Attributes', 'remnanttribes' ),
        'insert_into_item'      => __( 'Insert into map point', 'remnanttribes' ),
        'uploaded_to_this_item' => __( 'Uploaded to this map point', 'remnanttribes' ),
        'featured_image'        => __( 'Map Point Image', 'remnanttribes' ),
        'set_featured_image'    => __( 'Set Map Point image', 'remnanttribes' ),
        'remove_featured_image' => __( 'Remove Map Point image', 'remnanttribes' ),
        'use_featured_image'    => __( 'Use as Map Point image', 'remnanttribes' ),
        'filter_items_list'     => __( 'Filter Map Points', 'remnanttribes' ),
        'items_list_navigation' => __( 'Map Points list navigation', 'remnanttribes' ),
        'items_list'            => __( 'Map Points list', 'remnanttribes' ),
        'item_published'        => __( 'Map Point published', 'remnanttribes' ),
        'item_published_privately' => __( 'Map Point published privately', 'remnanttribes' ),
        'item_reverted_to_draft' => __( 'Map Point reverted to draft', 'remnanttribes' ),
        'item_scheduled'        => __( 'Map Point scheduled', 'remnanttribes' ),
        'item_updated'          => __( 'Map Point updated', 'remnanttribes' ),
    );

    $args = array(
        'labels'    => $labels,
        'description'           => __( 'Post type for points on interactive map page.', 'remnanttribes' ),
        'public'                => true,
        'hierarchical'          => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'mappoint',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location-alt',
        'rewrite'               => array( 'slug' => 'mappoint' ),
        'capability_type'       => 'post',
        'supports'              => array( 
            'title', 
            'editor', 
            'thumbnail', 
            'custom-fields', 
            'excerpt', 
            'page-attributes', 
            // 'post-formats',
            'comments' 
        ),
        'has_archive'           => true,
        'taxonomies'		    => array( 'category', 'post_tag', 'chapter' ),
        'query_var'             => 'mappoint',
        'can_export'            => true,
        'delete_with_user'      => false
    );

    register_post_type( 'mappoint', $args );

}
