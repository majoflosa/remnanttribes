<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agenes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
        
        $fields =  array(
            'author' =>
              '<p class="comment-form-author">' .
              '<input id="author" name="author" type="text" placeholder="Name" size="30" aria-required="true" required="required" /></p>',

            'email' =>
              '<p class="comment-form-email">' .
              '<input id="email" name="email" type="text" placeholder="Email" size="30" aria-required="true" required="required" /></p>',
        );
        $args = array(
            'title_reply' => 'Join the discussion! <i class="fa fa-comments" aria-hidden="true"></i>',
            'fields' => apply_filters( 'comment_form_default_fields', $fields ),
            'comment_notes_before' => '<p class="comment-notes"><small><em>' .
                __( 'Your email address will not be published or used in any way without your permission.' ) . '</em></small></p>',
            'comment_field' => '<p class="comment-form-comment">' .
                '<textarea id="comment" name="comment" cols="45" rows="4" placeholder="Leave a comment" aria-required="true" required="required">' .
                '</textarea></p>',
        );
	comment_form( $args );
        
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				/*printf( // WPCS: XSS OK.
					esc_html( _nx( '1 comment on %2$s', '%1$s comments on %2$s', get_comments_number(), 'comments title', 'agenes' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>Page ' . get_the_title() . '</span>'
				);*/
                                printf( // WPCS: XSS OK.
					esc_html( _nx( '1 comment %2$s', '%1$s comments %2$s', get_comments_number(), 'comments title', 'agenes' ) ),
					number_format_i18n( get_comments_number() ),
					''
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'agenes' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'agenes' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'agenes' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 50,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'agenes' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'agenes' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'agenes' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'agenes' ); ?></p>
	<?php
	endif;
	?>

</div><!-- #comments -->
