<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Top Menu', 'rorio-theme' ); ?></button>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
</nav><!-- #site-navigation -->
