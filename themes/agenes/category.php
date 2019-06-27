<?php
/**
 * The template for displaying category index pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agenes
 */

get_header(); 

$next_update = $map_info_def = get_post_meta(9, 'Next Update', true);
?>


<header class="page-masthead">
    <?php
    $remove_category = str_replace('Category:', '', get_the_archive_title( '<h1>', '</h1>' ) );
    ?>
    <!-- <h1><?php the_archive_title( '<h1>', '</h1>' ); ?></h1> -->
    <h1><?php echo $remove_category; ?></h1>
</header>

<p id="next-update">
    <i class="fal fa-calendar-check" style="vertical-align: baseline;" aria-hidden="true"></i>
    &nbsp; Next Update: <?php echo $next_update; ?>
</p>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					// the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
