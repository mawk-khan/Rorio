<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rorio_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rorio-theme' ); ?></a>
	<div class="site-header-wrap">
		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<?php get_template_part( 'components/branding/branding' ); ?>

				<?php get_template_part( 'components/site-logo/site-logo' ); ?>

				<?php get_template_part( 'components/top-navigation/top-navigation' ); ?>
			</div>
		</header><!-- #masthead -->
	</div>
	<div id="content" class="site-content">
