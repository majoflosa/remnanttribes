<?php
/**
 * The template for displaying all image attachment posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package agenes
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <div style="margin: 90px auto; width: 90%; max-width: 900px;">
            <?php
            while ( have_posts() ) : the_post();

            echo wp_get_attachment_image( get_the_ID(), 'full' );

            endwhile; // End of the loop.
            ?>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
