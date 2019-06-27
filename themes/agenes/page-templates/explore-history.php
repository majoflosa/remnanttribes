<?php

/* 
 * Template Name: Explore History
 */
global $post;
setup_postdata($post);

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);

get_header();?>

<section id="history-wrap">
    
    <header class="page-masthead">
        <h1>Dig into the History</h1>
    </header>
    
    <p id="next-update">
        <i class="fal fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
        &nbsp; Next Update: <?php echo $next_update; ?>
    </p>
    
    <div id="history-window">
        <p><?php the_content(); ?></p>
    </div><!-- #history-window -->
    
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
    
</section><!-- #history-wrap -->

<?php get_footer();
