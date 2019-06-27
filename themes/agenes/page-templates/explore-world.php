<?php

/* 
 * Template Name: Explore World
 */
global $post;
setup_postdata($post);

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);

get_header(); ?>

<section id="world-wrap">
    
    <header class="page-masthead">
        <h1>Explore the World</h1>
    </header>
    
    <p id="next-update">
        <i class="fal fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
        &nbsp; Next Update: <?php echo $next_update; ?>
    </p>

    <div class="page-introduction">
        <p><?php the_content(); ?></p>
    </div><!-- .page-introduction -->
    
    <div id="map-window">
        <a id="full-map" class="ease" href="#">View Full Maps</a>

        <div id="full-map-modal-outer">
            <div id="full-map-modal">
                <a href="#" id="close-full-maps"><i class="fa fa-times" aria-hidden="true"></i></a>
                <div class="maps-menu">
                    <a href="#" class="selected ease">Geography</a>
                    <a href="#" class="ease">Territories</a>
                    <a href="#" class="ease">Minimal</a>
                </div>
                <img id="geography" class="full-map selected-map" src="<?php echo home_url() . '/wp-content/uploads/2018/02/map-geography-1b.jpg'; ?>" alt="The World of Remnant Tribes: Geography Map" title="The World of Remnant Tribes: Geography Map">
                <img id="territories" class="full-map" src="<?php echo home_url() . '/wp-content/uploads/2018/02/territories.jpg'; ?>" alt="The World of Remnant Tribes: Territories Map" title="The World of Remnant Tribes: Territories Map">
                <img id="minimal" class="full-map" src="<?php echo home_url() . '/wp-content/uploads/2018/02/minimal.jpg'; ?>" alt="The World of Remnant Tribes: Minimal Map" title="The World of Remnant Tribes: Minimal Map">
            </div>
        </div><!-- full-map-modal-outer -->
        
        <div id="map">
            <?php the_post_thumbnail(); ?>
        </div><!-- #map -->
        
        <div id="overlay">
            <div id="pins-layer">
                <a id="location-1" class="location ease" href="#info-location-1"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></a>
                <a id="location-2" class="location ease" href="#info-location-2"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></a>
                <a id="location-3" class="location ease" href="#info-location-3"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></a>
            </div>
        </div>
        
        
        
        <div id="map-info-wrap">
            <a href="#" id="close-map-info"><i class="fa fa-times" aria-hidden="true"></i></a>
            
        <?php 
            $map_info_def = get_post_meta(get_the_ID(), 'map-info-default', true);
            $map_info_loc1 = get_post_meta(get_the_ID(), 'map-info-loc1', true);
            $map_info_loc2 = get_post_meta(get_the_ID(), 'map-info-loc2', true);
            $map_info_loc3 = get_post_meta(get_the_ID(), 'map-info-loc3', true);
            
            echo $map_info_def;
            echo $map_info_loc1;
            echo $map_info_loc2;
            echo $map_info_loc3;
        ?>
            
        </div><!-- map-info-wrap -->
        <!-- <a href="#" id="toggle">
            <img src="<?php echo get_template_directory_uri() . '/images/right-w.png'; ?>">
        </a>-->
        
    </div><!-- #map-window -->
    
    <div class="explore-menu-section">
        <div>
            <h2>Explore:</h2>
            <?php wp_nav_menu( array( 'theme_location' => 'explore', 'menu_id' => 'explore_menu' ) ); ?>
        </div>
    </div><!-- .explore-menu -->

	<div style="float: right; color: #f37741;"><?php edit_post_link(); ?></div>
    
    <section id="go-to" class="comic-index-section">
        <h2>Comic Index</h2>
        <p>Pages in <span style="background-color: #604e3a; color: #f0deca; padding: 4px 5px 3px; font-size: 13px; text-transform: uppercase; border-radius: 2px;">brown</span> mark a new chapter.</p>
        <?php 
        $args = array(
            'post_type' => 'comicpage',
            'posts_per_page' => -1,
            'order' => 'ASC'
        );
        $comicind_query = new WP_Query( $args );
        ?>

        <ul>
        <?php 
        if ( $comicind_query->have_posts() ) :
            while ( $comicind_query->have_posts() ) : $comicind_query->the_post();
            $this_cats = get_the_category();
            $chapter = false;

            foreach ($this_cats as $cat) {
                if ($cat->slug == 'chapterpage') {
                    $chapter = true;
                }
            }
        ?>
            <li><a <?php if ($chapter) {echo 'class="chapter-bm"';} ?> href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        wp_reset_query();
        ?>
        </ul>
    </section><!-- #go-to -->
    
</section><!-- #world-wrap -->

<?php get_footer();