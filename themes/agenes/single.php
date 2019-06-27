<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

			get_template_part( 'template-parts/content', get_post_format() );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
        
    <?php get_sidebar(); ?>
    
    <?php 
        $args = array(
          'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true" style="margin-right: 5px;"></i> ' . '%title',
          'next_text' => '%title' . ' <i class="fa fa-angle-double-right" aria-hidden="true" style="margin-left: 5px;"></i>',
        );
        the_post_navigation( $args ); 
    ?>
    <div class="cp-supplementary">
        <div class="comment-area-wrap">
        <?php
        if ( comments_open() || get_comments_number() ) :
                comments_template();
        endif;
        ?>
        </div>
    </div>

<?php

get_footer();
