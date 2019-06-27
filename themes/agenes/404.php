<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package agenes
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" style="text-align: center; color: #ca2e0a;"><?php esc_html_e( 'Heeeeey... what the- !?', 'agenes' ); ?></h1>
                                        <img style="display: block; margin: 0 auto;" src="<?php echo get_template_directory_uri() . '/images/troygif.gif'; ?>" alt="Troy walks into a room on fire.">
                                        <p><?php esc_html_e( 'Oops! Looks like that link is broken, and now you\'re in the darkest timeline. Check out the links on the sidebar to you can get you back on track.', 'agenes' ); ?></p>
				</header><!-- .page-header -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
        
        <?php get_sidebar(); ?>

        <div style="clear: both"></div>

<?php
get_footer();
