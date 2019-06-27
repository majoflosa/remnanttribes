<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package agenes
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">

        <div class="site-info">
            <img src="<?php echo get_template_directory_uri() . '/images/remnant-tribes-logo-gray.png'; ?>">

			<div class="socmed-footer">
				<a href="http://www.instagram.com/maurojflores" target="_blank" title="Instagram">
					<i class="fab fa-instagram" aria-hidden="true"></i>
				</a>
				<a href="http://www.twitter.com/maurojflores" target="_blank" title="Twitter">
					<i class="fab fa-twitter" aria-hidden="true"></i>
				</a>
				<a href="http://www.facebook.com/maurojfloresart/" target="_blank" title="Facebook">
					<i class="fab fa-facebook" aria-hidden="true"></i>
				</a>
				<a href="http://maurojflores.tumblr.com" target="_blank" title="Tumblr">
					<i class="fab fa-tumblr" aria-hidden="true"></i>
				</a>
				<a href="https://www.youtube.com/channel/UCkXoIHFL1JUNWRzDcxaE49A" target="_blank" title="YouTube">
					<i class="fab fa-youtube" aria-hidden="true"></i>
				</a>
				<a href="https://www.behance.net/maurojflores/" target="_blank" title="Behance">
					<i class="fab fa-behance" aria-hidden="true"></i>
				</a>
				<a href="https://www.pinterest.com/maurojflores/" target="_blank" title="Pinterest">
					<i class="fab fa-pinterest" aria-hidden="true"></i>
				</a>
				<a href="http://majoflosa.deviantart.com/" target="_blank" title="Deviantart">
					<i class="fab fa-deviantart" aria-hidden="true"></i>
				</a>
				<a href="<?php echo home_url(); ?>/feed/" target="_blank" title="RSS">
					<i class="fa fa-rss" aria-hidden="true"></i>
				</a>
			</div>

            <p id="credit">Web design by <a style="text-decoration: underline;" href="http://maurojflores.com" target="_blank">Mauricio J Flores</a>. Powered by <a style="text-decoration: underline;" href="http://www.wordpress.org" target="_blank">WordPress</a>. <br>All artwork, characters, and writing in this website is intellectual property of Mauricio J Flores. &copy; <?php echo date('Y'); ?>. All rights reserved.</p>
            
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<a id="backtotop" class="at-top" href="#">
    <i class="fa fa-caret-up" aria-hidden="true"></i>
    <!-- <img src="<?php echo get_template_directory_uri() . '/images/backtotop.png'; ?>" alt=""> -->
</a>

<?php wp_footer(); ?>

</body>
</html>
