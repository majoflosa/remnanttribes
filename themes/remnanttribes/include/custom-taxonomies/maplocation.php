<?php

/**
 * Registers the 'location' taxonomy to group points on the interactive map
 */
function rem_taxonomy_location() {

    $labels = array(

    );

    $args = array(
        'labels'    => $labels,
    );

    register_taxonomy( 'location', 'mappoint', $args );
}