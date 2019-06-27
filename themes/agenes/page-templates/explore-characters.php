<?php

/* 
 * Template Name: Explore Characters
 */
global $post;
setup_postdata($post);

$current_page = get_the_ID();
$innerChars = array();
$ind = 0;

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);

get_header();?>

<section id="chars-wrap">
    <header class="page-masthead">
        <h1>Meet the Characters</h1>
    </header>
    <p id="next-update">
        <i class="fal fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
        &nbsp; Next Update: <?php echo $next_update; ?>
    </p>
    <div class="page-introduction">
        <p><?php the_content(); ?></p>
    </div><!-- .page-introduction -->
    
    <div id="chars-gallery">
        <?php 
        $args = array(
            'post_type' => 'page',
            'post_parent' => $current_page,
	    'posts_per_page' => -1,
            'order' => 'ASC'
        );
        $chars_query = new WP_Query( $args );
        ?>

        <ul>
        <?php 
        if ($chars_query->have_posts()):
            while ($chars_query->have_posts()) : $chars_query->the_post();
        ?>

            <li>
                <a class="trigger" id="char_<?php echo get_the_ID(); ?>" data-index="<?php echo get_the_ID(); ?>" href="#chars-main-<?php echo get_the_ID(); ?>" title="<?php the_title(); ?>">
                    <div class="char-overlay"></div>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
				<span class="char-bio-hidden" style="display:inline-block; overflow:hidden; height: 0.1px; width: 0.1px; position: absolute;"><?php the_content(); ?></span>
            </li>

        <?php
            $ind++;
            endwhile;
            endif;

			wp_reset_postdata();
		    wp_reset_query();
        ?>
        </ul>
    </div><!-- gallery -->
    
    <div id="chars-window">
        <a id="close-char" href="#" title="Close"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div id="loading-char"><i class="fa fa-sync fa-spin fa-3x fa-fw"></i></div>
        
        <div id="chars-nav">
            <a id="prev-char" href="#" title="Previous"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
            <a id="next-char" href="#" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        
        <article id="chars-main" class="chars-inner">
        </article><!-- chars-main -->
    </div><!-- #chars-window -->
    
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
</section>

<?php get_footer();

