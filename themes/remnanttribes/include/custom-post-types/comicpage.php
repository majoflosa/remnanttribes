<?php

/**
 * Registers the 'comicpage' post type for comic pages
 */
function rem_posttype_comicpage() {

    $labels = array(
        'name'                  => __( 'Comic Page', 'remnanttribes' ),
        'singular_name'         => __( 'Comic Page' , 'remnanttribes' ),
        'menu_name'             => __( 'Comic Pages', 'remnanttribes' ),
        'name_admin_bar'        => __( 'Comic Page', 'remnanttribes' ),
        'add_new'               => __( 'Add New', 'remnanttribes' ),
        'add_new_item'          => __( 'Add New Comic Page', 'remnanttribes' ),
        'new_item'              => __( 'New Comic Page', 'remnanttribes' ),
        'edit_item'             => __( 'Edit Comic Page', 'remnanttribes' ),
        'view_item'             => __( 'View Comic Page', 'remnanttribes' ),
        'view_items'            => __( 'View Comic Pages', 'remnanttribes' ),
        'all_items'             => __( 'All Comic Pages', 'remnanttribes' ),
        'search_items'          => __( 'Search Comic Pages', 'remnanttribes' ),
        'parent_item_colon'     => __( 'Parent Comic Pages:', 'remnanttribes' ),
        'not_found'             => __( 'No comic pages found.', 'remnanttribes' ),
        'not_found_in_trash'    => __( 'No comic pages found in Trash.', 'remnanttribes' ),
        'archives'              => __( 'Comic Page Archives', 'remnanttribes' ),
        'attributes'            => __( 'Comic Page Attributes', 'remnanttribes' ),
        'insert_into_item'      => __( 'Insert into page', 'remnanttribes' ),
        'uploaded_to_this_item' => __( 'Uploaded to this page', 'remnanttribes' ),
        'featured_image'        => __( 'Comic Page Image', 'remnanttribes' ),
        'set_featured_image'    => __( 'Set Comic Page image', 'remnanttribes' ),
        'remove_featured_image' => __( 'Remove Comic Page image', 'remnanttribes' ),
        'use_featured_image'    => __( 'Use as Comic Page image', 'remnanttribes' ),
        'filter_items_list'     => __( 'Filter comic pages', 'remnanttribes' ),
        'items_list_navigation' => __( 'Comic pages list navigation', 'remnanttribes' ),
        'items_list'            => __( 'Comic Pages list', 'remnanttribes' ),
        'item_published'        => __( 'Comic Page published', 'remnanttribes' ),
        'item_published_privately' => __( 'Comic Page published privately', 'remnanttribes' ),
        'item_reverted_to_draft' => __( 'Comic Page reverted to draft', 'remnanttribes' ),
        'item_scheduled'        => __( 'Comic Page scheduled', 'remnanttribes' ),
        'item_updated'          => __( 'Comic Page updated', 'remnanttribes' ),
    );

    $args = array(
        'labels'                => $labels,
        'description'           => __( 'Post type for comic pages', 'remnanttribes' ),
        'public'                => true,
        'hierarchical'          => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'comicpage',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-layout',
        'rewrite'               => array( 'slug' => 'comicpage' ),
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
        'query_var'             => 'comicpage',
        'can_export'            => true,
        'delete_with_user'      => false
    );

    register_post_type( 'comicpage', $args );

}