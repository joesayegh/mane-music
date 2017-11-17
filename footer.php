<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mane-music
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

			<div class="back-to-top">
				<a href="#back-to-top"><i class="fa fa-angle-up fa-3x"></i><br>
				Back to top</a>
			</div>

			<a href="<?php echo esc_url( __( 'http://mane-music.com' ) ); ?>"><?php printf( esc_html__( ' Copyright © 2017 ' ) ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
