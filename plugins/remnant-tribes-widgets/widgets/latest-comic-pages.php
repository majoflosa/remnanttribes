<?php

/**
 * Latest Comic Pages Widget
 * 
 * Displays linked thumbnails of latest comic pages
 */

class Rem_Latest_Comic_Pages extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'classname'     => 'latest-pages widget-latest-pages',
            'description'   => 'Displays linked thumbnails of latest comic pages'
        );
        parent::__construct( 'latest_comic_pages', 'Latest Comic Pages', $widget_options );
    }

    public function form( $instance ) {
        $default = array(
            'title'         => 'Latest Comic Pages',
            'page_count'    => 4
        );
        $instance = wp_parse_args( (array) $instance, $default );
    ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
            <input 
                type="text" 
                class="widefat" 
                id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                value="<?php echo esc_attr( $instance['title'] ); ?>"
            > 
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'page_count' ); ?>">Page Count: </label>
            <input 
                type="number" 
                class="widefat" 
                id="<?php echo $this->get_field_id( 'page_count' ); ?>" 
                name="<?php echo $this->get_field_name( 'page_count' ); ?>" 
                value="<?php echo esc_attr( $instance['page_count']); ?>"
            >
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['page_count'] = $new_instance['page_count'] ? $new_instance['page_count'] : 4;

        return $instance;
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        $query_args = array(
            'post_type' => 'comicpage',
            'posts_per_page'    => $instance['page_count']
        );
        $comic_pages_query = new WP_Query( $query_args );

        echo $before_widget;
        echo $before_title . $instance['title'] . $after_title;

        if ( $comic_pages_query->have_posts() ):
            while( $comic_pages_query->have_posts() ) : $comic_pages_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'thumbnail' ); ?>
                </a>
            <?php endwhile;
        endif;

        echo $after_widget;
    }

}