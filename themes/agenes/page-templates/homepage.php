<?php

/* 
 * Template Name: Home Page
 */
get_header();

$next_update = get_post_meta(get_the_ID(), 'Next Update', true);
?>

<section id="hero-wrap">
    <p id="intro-text">Remnant Tribes is an epic fantasy webcomic that takes place in a world rich of legends, battles, and adventures of the last free tribes and a powerful empire. When the villagers of Agenes find themselves pursued by the Venthaal Empire, their hope lies on their best warriors, Beor and Iva, who set off on a journey to search for ways to survive and if possible stand against their formidable enemy.</p>
    <h1>Remnant Tribes Webcomic, by Mauricio J Flores</h1>
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
        <a href="<?php echo $link1; ?>"><i class="fas fa-arrow-alt-circle-right" style="margin-right: 5px;" aria-hidden="true"></i> Begin the Journey</a>
        <a href="http://remnanttribes.com/comicpage/13/">Latest Update <i class="fas fa-arrow-alt-circle-right" style="margin-left: 5px;" aria-hidden="true"></i></a> 
    </div><!-- #start-links -->
</section><!-- #hero-wrap -->

<p id="next-update">
	<i class="fa fa-rocket" style="vertical-align: baseline;" aria-hidden="true"></i>&nbsp; Launched: April 16th, 2018 
	<strong style="display: inline-block; margin: 0 10px;">|</strong> 
	<i class="fa fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
	&nbsp; 
	Next Update: <?php echo $next_update; ?>
</p>

<!-- Section titled "The Story So Far", showing a strip of thumbnails of latest comic pages -->
<section id="welcome-cta" class="home-section">
    <p>Download the <strong>FREE 33-page &quot;New Reader's Guide&quot;</strong> PDF with exclusive behind-the-scenes art by joining the newsletter!</p>
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

<section id="blog" class="home-section">
    <h2>Blog</h2>
	<?php
	$welcome_post = get_post(1);
	?>

	<div class="blogpost-wrap post-1">
        <div class="blog-image">
            <a href="<?php echo home_url() . "/" . $welcome_post->post_name; ?>">
			<img src="<?php echo home_url() . '/wp-content/uploads/2015/12/midbanner-e1468349027471-300x160.jpg'; ?>">
			</a>
        </div>
        <div class="blog-content">
            <h3><a href="<?php echo home_url() . "/" . $welcome_post->post_name; ?>">
				<?php echo $welcome_post->post_title; ?>
			</a></h3>
            <p><?php echo $welcome_post->post_excerpt; ?></p>
            <a class="continue-reading" href="<?php echo home_url() . "/" . $welcome_post->post_name; ?>">Continue reading <i class="fa fa-forward" aria-hidden="true"></i></a>
        </div>
    </div><!-- .blogpost-wrap -->
    
    <?php
    
    $args = array( 
        'post_type' => 'post',
        'category_name' => 'homeblog',
		'posts_per_page' => 2,
        'order' => 'DESC'
    );
    $blog_query = new WP_Query( $args );
    ?>
    
    <?php
    // Beginning blog loop
    if ( $blog_query->have_posts() ) :
        while ( $blog_query->have_posts() ) : $blog_query->the_post();
    ?>
    
    <div class="blogpost-wrap post-<?php the_ID(); ?>">
        <div class="blog-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <div class="blog-content">
            <?php the_title('<h3><a href="' . get_the_permalink() . '">', '</a></h3>') ?>
            <p><?php the_excerpt(); ?></p>
            <a class="continue-reading" href="<?php the_permalink(); ?>">Continue reading <i class="fa fa-forward" aria-hidden="true"></i></a>
        </div>
    </div><!-- .blogpost-wrap -->
    
    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
    <a class="home-more-link" href="<?php echo home_url() . '/blog'; ?>">View Blog</a>
</section><!-- #blog -->

<section id="mid-banner"></section>

<section id="about" class="home-section">
    <h2>About</h2>
    
    <?php 
    $about_query = new WP_Query( 'page_id=7' );
    ?>
    
    <?php 
    if ( $about_query->have_posts() ) :
        while ( $about_query->have_posts() ) : $about_query->the_post();
    ?>
    
    <div class="about-wrap">
        <div class="about-image">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php $home_about = get_post_meta(get_the_ID(), 'home_about', true ); ?>
        <p><?php echo $home_about; ?></p>
<!--        <a class="home-more-link" href="<?php the_permalink(); ?>">LEARN MORE</a>-->
    </div>
    
    <?php
	$about_permalink = get_the_permalink();
        endwhile;
    endif;
    wp_reset_postdata();
    wp_reset_query();
    ?>
    
    <div class="connect">
        <!--<h3>Connect with Me on:</h3>-->
        <a href="http://www.instagram.com/maurojflores" target="_blank" title="Follow on Instagram">
            <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="http://www.twitter.com/maurojflores" target="_blank" title="Follow on Twitter">
            <i class="fab fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="http://www.facebook.com/maurojfloresart/" target="_blank" title="Like on Facebook">
            <i class="fab fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="http://maurojflores.tumblr.com" target="_blank" title="Follow on Tumblr">
            <i class="fab fa-tumblr" aria-hidden="true"></i>
        </a>
        <a href="https://www.pinterest.com/maurojflores/" target="_blank" title="Follow on Pinterest">
            <i class="fab fa-pinterest-p" aria-hidden="true"></i>
        </a>
        <a href="https://www.artstation.com/artist/maurojflores" target="_blank" title="Follow on Artstation" class="img-icon">
            <img src="<?php echo get_template_directory_uri() . '/images/as-icon.png'; ?>" alt="Artstation">
        </a>
        <a href="https://www.behance.net/maurojflores" target="_blank" title="Follow on Behance">
            <i class="fab fa-behance-square" aria-hidden="true"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCkXoIHFL1JUNWRzDcxaE49A" target="_blank" title="Subscribe on YouTube">
            <i class="fab fa-youtube" aria-hidden="true"></i>
        </a>
        <a href="https://gumroad.com/maurojflores" target="_blank" title="Follow on Gumroad" class="img-icon">
            <img src="<?php echo get_template_directory_uri() . '/images/gumroad-icon.png'; ?>" alt="Gumroad">
        </a>
        <a href="https://society6.com/maurojflores" target="_blank" title="Follow on Society6" class="img-icon">
            <img src="<?php echo get_template_directory_uri() . '/images/s6icon.png'; ?>" alt="Society6">
        </a>
        <a href="http://majoflosa.deviantart.com" target="_blank" title="Follow on DeviantArt">
            <i class="fab fa-deviantart" aria-hidden="true"></i>
        </a>
        <a href="<?php echo home_url() . '/feed/'; ?>" target="_blank" title="Subscribe to RSS feed">
            <i class="fa fa-rss" aria-hidden="true"></i>
        </a>
    </div>
    
    <a id="more-about" class="home-more-link" href="<?php echo $about_permalink; ?>">LEARN MORE</a>
    
    <!-- Gumroad 
    <div id="gumroad">
        <p>
            <a href="https://gumroad.com/maurojflores" target="_blank">
                <img src="<?php echo get_template_directory_uri() . '/images/gumroad.svg'; ?>" alt="Visit my Gumroad page">
            </a><br>
            Stay up to date with my latest Gumroad products
        </p>
        <form action="https://gumroad.com/follow_from_embed_form" class="form gumroad-follow-form-embed" method="post">
            <input name="seller_id" type="hidden" value="5504386823193">
            <input name="email" placeholder="Your email address" type="email">
            <button data-custom-highlight-color="" type="submit">Follow</button>
        </form>
    </div>-->
    
</section><!-- #about -->

<?php
get_footer();
