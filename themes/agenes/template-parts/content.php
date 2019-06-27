<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agenes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
                        } elseif ( is_sticky() ) {
                            the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>Featured:</span> ', 
                                    '</a></h1>' );
                        } else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php agenes_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
        
        <?php if (!is_single()) { ?>
        <figure class="post-image">
            <a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
        </figure>
        <?php } else { ?>
        <figure class="post-image">
            <?php the_post_thumbnail(); ?>
        </figure>
        <?php } ?>

	<div class="entry-content">
		<?php
                    
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'More %s  <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i>', 'agenes' ), array( 'span' => array( 'class' => array() ), 'i' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'agenes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
        
        <div class="share-post">
            <!-- Twitter -->
            <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;via=maurojflores">
                <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
        <?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
            <!-- Facebook -->
            <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo $feat_image_url; ?>&amp;p[title]=<?php the_title(); ?>">
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

	<footer class="entry-footer">
		<?php agenes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
