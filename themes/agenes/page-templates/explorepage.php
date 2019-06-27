<?php

/* 
 * Template Name: Explore Page
 */

get_header(); ?>

<section id="explore" class="home-section">
    <h2>Explore</h2>
    
    <?php
    $explore_q = new WP_Query( 'pagename=explore' );
    $explore_id = $explore_q->queried_object_id;
    wp_reset_postdata();
    wp_reset_query();
    
    $args = array( 
        'post_type' => 'page',
        'post_parent' => $explore_id,
        'order' => 'ASC'
    );
    $explore_query = new WP_Query( $args );
    $ind = 0;
    ?>
    
    <?php
    // Beginning Explore loop
    if ( $explore_query->have_posts() ) :
        while ( $explore_query->have_posts() ) : $explore_query->the_post();
        $home_summary = get_post_meta(get_the_ID(), 'Home Summary', true);
    ?>
    
    <?php if ( $ind % 2 === 0 ) { ?>
    <div class="explore-child-wrap even">
        <div class="exp-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div class="exp-content">
            <?php the_title('<h3>', '</h3>'); ?>
            <p><?php echo $home_summary; ?></p>
            <a class="home-more-link" href="<?php the_permalink(); ?>">Explore <?php the_title(); ?></a>
        </div>
    </div><!-- .explore-child -->
    <?php } else { ?>
    <div class="explore-child-wrap odd">
        <div class="exp-image mobile">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div> 
        <div class="exp-content">
            <?php the_title('<h3>', '</h3>') ?>
            <p><?php echo $home_summary; ?></p>
            <a class="home-more-link" href="<?php the_permalink(); ?>">Explore <?php the_title(); ?></a>
        </div>
        <div class="exp-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
    </div><!-- .explore-child -->
    <?php } ?>
    
    <?php
        $ind++;
        endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
</section><!-- *********** #explore ********** -->

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
