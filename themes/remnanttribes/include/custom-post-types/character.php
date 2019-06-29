<?php

/**
 * Register the 'character' post type to create a post for each story character to display in the Characters page
 */
function rem_posttype_character() {

    $labels = array(
        'name'                  => __( 'Character', 'remnanttribes' ),
        'singular_name'         => __( 'Character' , 'remnanttribes' ),
        'menu_name'             => __( 'Characters', 'remnanttribes' ),
        'name_admin_bar'        => __( 'Character', 'remnanttribes' ),
        'add_new'               => __( 'Add New', 'remnanttribes' ),
        'add_new_item'          => __( 'Add New Character', 'remnanttribes' ),
        'new_item'              => __( 'New Character', 'remnanttribes' ),
        'edit_item'             => __( 'Edit Character', 'remnanttribes' ),
        'view_item'             => __( 'View Character', 'remnanttribes' ),
        'view_items'            => __( 'View Characters', 'remnanttribes' ),
        'all_items'             => __( 'All Characters', 'remnanttribes' ),
        'search_items'          => __( 'Search Characters', 'remnanttribes' ),
        'parent_item_colon'     => __( 'Parent Characters:', 'remnanttribes' ),
        'not_found'             => __( 'No characters found.', 'remnanttribes' ),
        'not_found_in_trash'    => __( 'No characters found in Trash.', 'remnanttribes' ),
        'archives'              => __( 'Character Archives', 'remnanttribes' ),
        'attributes'            => __( 'Character Attributes', 'remnanttribes' ),
        'insert_into_item'      => __( 'Insert into character', 'remnanttribes' ),
        'uploaded_to_this_item' => __( 'Uploaded to this character', 'remnanttribes' ),
        'featured_image'        => __( 'Character Image', 'remnanttribes' ),
        'set_featured_image'    => __( 'Set Character image', 'remnanttribes' ),
        'remove_featured_image' => __( 'Remove Character image', 'remnanttribes' ),
        'use_featured_image'    => __( 'Use as Character image', 'remnanttribes' ),
        'filter_items_list'     => __( 'Filter Characters', 'remnanttribes' ),
        'items_list_navigation' => __( 'Characters list navigation', 'remnanttribes' ),
        'items_list'            => __( 'Characters list', 'remnanttribes' ),
        'item_published'        => __( 'Character published', 'remnanttribes' ),
        'item_published_privately' => __( 'Character published privately', 'remnanttribes' ),
        'item_reverted_to_draft' => __( 'Character reverted to draft', 'remnanttribes' ),
        'item_scheduled'        => __( 'Character scheduled', 'remnanttribes' ),
        'item_updated'          => __( 'Character updated', 'remnanttribes' ),
    );

    $args = array(
        'labels'    => $labels,
        'description'           => __( 'Post type for story characters', 'remnanttribes' ),
        'public'                => true,
        'hierarchical'          => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'character',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-universal-access',
        'rewrite'               => array( 'slug' => 'character' ),
        'capability_type'       => 'post',
        'supports'              => array( 
            'title', 
            'editor', 
            'thumbnail', 
            'custom-fields', 
            'excerpt', 
            'page-attributes', 
            // 'post-formats',
            // 'comments' 
        ),
        'has_archive'           => true,
        'taxonomies'		    => array( 'category', 'post_tag', 'tribe' ),
        'query_var'             => 'character',
        'can_export'            => true,
        'delete_with_user'      => false
    );

    register_post_type( 'character', $args );
}