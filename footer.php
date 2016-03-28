<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rorio_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="rorio-footer-info">
			<div class="container">
				<?php get_template_part( 'components/site-info/site-info' ); ?>
			</div><!-- #container -->
		</div><!-- #rorio-footer-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
