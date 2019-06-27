<?php

/* 
 * Template Name: Comic Index
 */

get_header(); 

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);
?>

<section id="hero-wrap">
    <h1>AGENES</h1>
    <?php 
    $args = array (
        'post_type' => 'comicpage',
        'posts_per_page' => 1,
        'order' => 'ASC'
    );
    $cp_query = new WP_Query( $args );
    
    while( $cp_query->have_posts()) : $cp_query->the_post();
        $link1 = get_the_permalink();
    endwhile;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
    <?php 
    $args = array (
        'post_type' => 'comicpage',
        'posts_per_page' => 1
    );
    $cp_query = new WP_Query( $args );
    
    while( $cp_query->have_posts()) : $cp_query->the_post();
        $link2 = get_the_permalink();
    endwhile;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
    <div id="start-links">
        <a href="<?php echo $link1; ?>">Begin the Journey</a>
        <a href="<?php echo $link2; ?>">Latest Update</a>
    </div><!-- #start-links -->
</section><!-- #hero-wrap -->
<p id="next-update">
    <i class="fa fa-calendar-check-o" style="vertical-align: baseline;" aria-hidden="true"></i>
    &nbsp; Next Update: <?php echo $next_update; ?>
</p>

<section id="latest" class="comic-index-section">
    <h2>Latest Pages</h2>
    
    <?php 
    $args = array(
        'post_type' => 'comicpage',
        'posts_per_page' => 5
    );
    $comic_query = new WP_Query( $args );
    ?>
    
    <?php 
    if ( $comic_query->have_posts() ) :
        while ( $comic_query->have_posts() ) : $comic_query->the_post();
    ?>
    
    <article class="cp-wrap">
        <h3><?php the_title(); ?></h3>
        <a href="<?php echo the_permalink();?>">
            <?php the_post_thumbnail( 'thumbnail' ); ?>
        </a>
    </article>
    
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
</section><!-- #latest -->

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

<?php get_footer();