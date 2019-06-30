<?php
get_header();
?>
    
<?php 
// should conditionally check if this template uses sidebar.
// if uses sidebar and sidebar has widgets, add 'has-sidebar' class to content wrap
?>
<section class="main-section content">

    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

        <article <?php post_class( 'content-item' ); ?>>
            <header class="content-item-header">
                <?php the_title( '<h1 class="main-title">', '</h1>'); ?>
            </header>
            <main class="content-item-body">
                <?php the_content(); ?>
            </main>
            <footer class="content-item-footer">
                <?php the_time(); ?>
            </footer>
        </article>

        <?php endwhile;
    endif;
    ?>

</section>

<?php
get_sidebar();
get_footer();
?>