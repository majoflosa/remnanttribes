<?php

/**
 * Registers the 'mappoint' post type for location items on the interactive map
 */
function rem_posttype_mappoint() {

    $labels = array(

    );

    $args = array(
        'labels'    => $labels,
    );

    register_post_type( 'mappoint', $args );

}
