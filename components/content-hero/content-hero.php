<?php
/**
 * The template used for displaying hero content.
 *
 * @package Rorio_Theme
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="rorio-theme-hero">
		<?php the_post_thumbnail( 'rorio-theme-hero' ); ?>
	</div><!-- .hero -->
<?php endif; ?>
