<div class="site-branding">
	<?php
	$site_text_logo = get_bloginfo( 'name' );
	$site_image_logo = get_theme_mod( 'rorio_site_image_logo' );
	if ( ( isset( $site_text_logo ) && $site_text_logo != '' ) || ( isset( $site_image_logo ) && $site_image_logo != '' ) ) {
		if ( isset( $site_image_logo ) && $site_image_logo != '' ) {
			echo '<a class="site-image-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
			echo '<img src="' . $site_image_logo . '" alt="' . get_bloginfo( 'title' ) . '">';
			echo '</a>';
		} elseif ( isset( $site_text_logo ) && $site_text_logo != '' ) {
			echo '<a class="site-text-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( $site_text_logo ) . '</a>';
		}
	} else {
		if ( is_front_page() && is_home() ) :
			echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
		else :
			echo '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
		endif;
	}
	?>
</div><!-- .site-branding -->
