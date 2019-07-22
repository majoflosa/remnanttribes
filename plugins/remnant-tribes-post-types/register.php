<?php

// register post types
function rem_register_posttypes() {
    
    require_once( REM_CUSTOM_TYPES_PATH . '/post-types/character.php' );
    rem_posttype_character();
    
    require_once( REM_CUSTOM_TYPES_PATH . '/post-types/comicpage.php' );
    rem_posttype_comicpage();
    
    require_once( REM_CUSTOM_TYPES_PATH . '/post-types/mappoint.php' );
    rem_posttype_mappoint();
    
}

// register taxonomies
function rem_register_taxonomies() {
    
    require_once( REM_CUSTOM_TYPES_PATH . '/taxonomies/chapter.php' );
    rem_taxonomy_chapter();
    
    require_once( REM_CUSTOM_TYPES_PATH . '/taxonomies/mappin.php' );
    rem_taxonomy_mappin();
    
    require_once( REM_CUSTOM_TYPES_PATH . '/taxonomies/tribe.php' );
    rem_taxonomy_tribe();

}