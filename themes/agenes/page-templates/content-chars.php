<?php 
/**
 * Template Name: loadchars
 */

$char_ID = $_GET['char_ID'];

$current_char = new WP_Query( array('p' => $char_ID) );

if ( $current_char->have_posts() ) :
	while ( $current_char->have_posts() ) : $current_char->the_post();
?>

<div class="chars-img">
    <?php echo the_post_thumbnail(); ?> 
</div>

<div class="chars-info">
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
</div>

<?php 
endwhile;
endif;
?>