<?php

/* 
 * This is the template for single comic pages.
 */
$this_title = get_the_title();
$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);
get_header(); ?>

<h1>AGENES</h1>

<div id="primary">
<section class="cp-outer">
    
    <div class="cp-navigation">
    <?php 
        $args = array (
            'post_type' => 'comicpage',
            'posts_per_page' => 1
        );
        $cp_query = new WP_Query( $args );

        while( $cp_query->have_posts()) : $cp_query->the_post();
            $lastpage = get_the_permalink();
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
        
        $args = array (
            'post_type' => 'comicpage',
            'posts_per_page' => 1,
            'order' => 'ASC'
        );
        $cp_query = new WP_Query( $args );

        while( $cp_query->have_posts()) : $cp_query->the_post();
            $firstpage = get_the_permalink();
        endwhile;
        wp_reset_postdata();
        wp_reset_query(); 
    ?>
        
        <a id="first-link" href="<?php echo $firstpage; ?>" title="First Page"><i class="fa fa-backward" aria-hidden="true"></i></a>
        <?php 
            previous_post_link( '%link', '<i class="fa fa-caret-left" aria-hidden="true"></i><span> Previous</span>' );
            the_title( '<h3 class="cp-page-title">', '</h3>' );
            next_post_link( '%link', '<span>Next </span><i class="fa fa-caret-right" aria-hidden="true"></i>' );
        ?>
        <a id="last-link" href="<?php echo $lastpage; ?>" title="Last Page"><i class="fa fa-forward" aria-hidden="true"></i></a>
    </div><!-- .cp-navigation -->
    
    <div class="cp-page">
        <?php the_post_thumbnail(); ?>
        <div id="cp-overlay"></div>
    </div>
    
    <div class="cp-navigation">
        <a id="first-link" href="<?php echo $firstpage; ?>" title="First Page"><i class="fa fa-backward" aria-hidden="true"></i></a>
        <?php 
            previous_post_link( '%link', '<i class="fa fa-caret-left" aria-hidden="true"></i><span> Previous</span>' );
            the_title( '<h3 class="cp-page-title">', '</h3>' );
            next_post_link( '%link', '<span>Next </span><i class="fa fa-caret-right" aria-hidden="true"></i>' );
        ?>
        <a id="last-link" href="<?php echo $lastpage; ?>" title="Last Page"><i class="fa fa-forward" aria-hidden="true"></i></a>
    </div><!-- .cp-navigation -->

	<p class="cp-date">
	<small>Published on <strong><?php echo get_the_date('F j, Y'); ?></strong> | Next update: <strong><?php echo $next_update; ?></strong></small>
	</p>
</section><!-- .cp-outer -->
	
<div class="cp-caption">
<?php the_content(); ?>	
</div>

<div class="share-post">
    <!--<span>Share</span>-->
    <!-- Twitter -->
    <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=Remnant Tribes Webcomic: Page <?php the_title(); ?>&amp;hashtags=indiecomics,webcomics,comics&amp;via=maurojflores">
        <i class="fab fa-twitter" aria-hidden="true"></i>
    </a>
    <!-- Facebook -->
    <?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $feat_image_url; ?>&amp;p[title]=Page <?php the_title(); ?>">
        <i class="fab fa-facebook-f" aria-hidden="true"></i>
    </a>
	<!-- Tumblr -->
	<a href="https://www.tumblr.com/share" data-title="Page <?php the_title(); ?> - Remnant Tribes Webcomic" data-content="<?php the_permalink(); ?>" data-tags="indiecomics,webcomic,comics,comicart,comicpage" target="_blank"><i class="fab fa-tumblr" aria-hidden="true"></i></a>
	<script id="tumblr-js" async src="https://assets.tumblr.com/share-button.js"></script>
    <!-- Pinterest -->
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <i class="fab fa-pinterest" aria-hidden="true"></i>
    </a>
    <!-- Google Plus -->
    <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>">
        <i class="fab fa-google-plus" aria-hidden="true"></i>
    </a>
</div>
<div style="float: right; color: #f37741;"><?php edit_post_link(); ?></div>

<section id="go-to">
    <span class="go-to-label">INDEX:</span>
    <p>Pages in <span style="background-color: #604e3a; color: #ddd; padding: 0 6px; border-radius: 2px;">brown</span> mark a new chapter.</p>
    <?php 
    $args = array(
        'post_type' => 'comicpage',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );
    $comic_query = new WP_Query( $args );
    ?>
    
    <ul>
    <?php 
    if ( $comic_query->have_posts() ) :
        while ( $comic_query->have_posts() ) : $comic_query->the_post();
        $new_title = get_the_title();
        $this_cats = get_the_category();
        $chapter = false;
        
        foreach ($this_cats as $cat) {
            if ($cat->slug == 'chapterpage') {
                $chapter = true;
            }
        }
    ?>
        <li <?php if($this_title == $new_title) {echo 'class="current-cp"';} ?>><a <?php if ($chapter) {echo 'class="chapter-bm"';} ?> href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    </ul>
</section>

<section id="welcome-cta" class="home-section">
    <p><!-- Welcome to the official site of the new webcomic, Agenes! -->Join the newsletter to discover the world of Remnant Tribes with a <strong>FREE 33-page &quot;New Reader's Guide&quot;</strong> PDF, with behind-the-scenes art!</p>
    <span id="pdf-reward"><img src="<?php echo home_url() . '/wp-content/uploads/2017/07/pdf-reward-demo-3.png'; ?>"></span>

    <div id="mc_embed_signup">
        <form action="//instagram.us1.list-manage.com/subscribe/post?u=78996cbf689c1d9ced249f3c9&amp;id=ec6ef81f2c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
            
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_78996cbf689c1d9ced249f3c9_ec6ef81f2c" tabindex="-1" value=""></div>
            <div class="clear"><input type="submit" value="I'm in!" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
        </form>
    </div><!-- #mc_embed_signup -->
</section>

<section class="cp-supplementary">
    <div class="comment-area-wrap">
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;
    ?>
    </div><!-- .comment-area-wrap -->
</section><!-- .cp-supplementary -->

<section id="controls">
    <a id="full-page" href="#" title="Fit to screen height">
        <i class="fa fa-compress" aria-hidden="true"></i>
        <!-- <img src="<?php echo get_template_directory_uri() . '/images/full-page.png'; ?>" alt="Fit to height" title="Fit to height"> -->
    </a>
    <a id="full-width" href="#" title="Back to full size">
        <i class="fa fa-expand" aria-hidden="true"></i>
        <!-- <img src="<?php echo get_template_directory_uri() . '/images/full-width.png'; ?>" alt="Fit to width" title="Fit to width"> -->
    </a>
</section>

<section id="modal">
    <?php the_post_thumbnail('full'); ?>
</section>

</div><!-- #primary -->


<?php 
//get_sidebar();
get_footer();

