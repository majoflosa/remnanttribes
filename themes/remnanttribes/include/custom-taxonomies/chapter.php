<?php

/**
 * Registers the 'chapter' taxonomy to group comic pages
 */
function rem_taxonomy_chapter() {

    $labels = array(

    );

    $args = array(
        'labels'    => $labels,
    );

    register_taxonomy( 'chapter', 'comicpage', $args );
}