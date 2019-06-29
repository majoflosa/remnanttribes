<?php
/**
 * Filter hooks available in Remnant Tribes theme
 */

/**
 * Adds custom CSS classes to link and image on custom logo output 
 */
function rem_filter_logo( $string, $link_class, $img_class ) {
    if ( is_array( $link_class ) ) {
        $link_class_str = 'class="custom-logo-link ' . join( ' ', $link_class ) . '"';
    } else {
        $link_class_str = 'class="custom-logo-link ' . $link_class . '"';
    }

    if ( is_array( $img_class ) ) {
        $img_class_str = 'class="custom-logo ' . join( ' ', $img_class ) . '"';
    } else {
        $img_class_str = 'class="custom-logo ' . $img_class . '"';
    }

    $string = str_replace( 'class="custom-logo-link"', $link_class_str, $string );
    $string = str_replace( 'class="custom-logo"', $img_class_str, $string );

    return $string;
}
add_filter( 'rem_logo_classnames', 'rem_filter_logo', 10, 3 );

/* 
 * Adds custom CSS classes to li items on main menu
 */
function rem_custom_menu_items( $string, $custom_classes ) {
    $string = str_replace( 
        'class="menu-item ', 
        'class="' . join( ' ', $custom_classes ) . ' menu-item ', 
        $string 
    );

    return $string;
}
add_filter( 'rem_custom_main_menu', 'rem_custom_menu_items', 10, 2 );