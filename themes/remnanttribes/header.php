<?php
/**
 * Theme Header
 * 
 * @package remnanttribes
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="header">
        <div class="header-brand">
            <?php if ( has_custom_logo() ) { 
                echo apply_filters( 'rem_logo_classnames', get_custom_logo(), 'header-logo', 'header-logo-img' );
            } ?>
            <h1 class="header-title">
                <a href="<?php echo home_url(); ?>"><?php bloginfo( 'title' ); ?></a>
            </h1>
        </div>

        <?php 
            $menu_args = array(
                'menu_class'        => 'header-nav-list',
                'menu_id'           => 'main-menu',
                'container'         => 'nav',
                'container_class'   => 'header-nav',
                'theme_location'    => 'main_menu',
                'echo'              => false
            );

            echo apply_filters( 'rem_custom_main_menu', wp_nav_menu( $menu_args ), array( 'header-nav-item' ) );
        ?>
    </header>

    <main class="main">
        
    <?php 
    // global $wp;
    // var_dump( $wp->request );
    ?>