<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agenes
 */

get_header(); 

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);
?>
<header class="page-masthead">
    <?php the_title( '<h1>', '</h1>' ); ?>
</header>

<p id="next-update">
    <i class="fal fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
    &nbsp; Next Update: <?php echo $next_update; ?>
</p>

<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

                <?php
                while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'page' );

                endwhile; // End of the loop.
                ?>

        </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<div style="clear: both"></div>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) : ?>
<div class="cp-supplementary">
    <div class="comment-area-wrap">
        <?php comments_template(); ?>
    </div>
</div>
<?php endif; ?>

<?php
get_footer();
