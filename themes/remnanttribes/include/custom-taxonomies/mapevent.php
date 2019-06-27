<?php

/**
 * Registers the 'mapevent' taxonomy to group points on the interactive map
 */
function rem_taxonomy_mapevent() {

    $labels = array(

    );

    $args = array(
        'labels'    => $labels,
    );

    register_taxonomy( 'mapevent', 'mappoint', $args );
}