<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agenes
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
    <section class="widget widget-cta">
        <h2 class="widget-title">Join the Tribe!!</h2>
        <span id="pdf-reward"><img src="<?php echo home_url() . '/wp-content/uploads/2017/07/pdf-reward-demo-3.png'; ?>"></span>
        <p>Download the <strong>FREE 33-page &quot;New Reader's Guide&quot;</strong> PDF with exclusive behind-the-scenes art by joining the newsletter!</p>

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
    </section><!-- sidebar cta -->

    <section class="widget widget-index">
    <h2 class="widget-title">Latest Comic Pages</h2>
    
    <?php 
    $args = array(
        'post_type' => 'comicpage',
        'posts_per_page' => 4
    );
    $comic_query = new WP_Query( $args );
    ?>
    
    <?php 
    if ( $comic_query->have_posts() ) :
        while ( $comic_query->have_posts() ) : $comic_query->the_post();
    ?>
    
    <article class="cp-wrap">
        <h3><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
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
    
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
