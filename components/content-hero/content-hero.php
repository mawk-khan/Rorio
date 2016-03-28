<?php
/**
 * The template used for displaying hero content.
 *
 * @package WordPress_Repo
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="repo-wpy-hero">
		<?php the_post_thumbnail( 'repo-wpy-hero' ); ?>
	</div><!-- .hero -->
<?php endif; ?>
