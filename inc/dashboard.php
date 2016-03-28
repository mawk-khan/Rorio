<?php

/**
 * Add theme dashboard page
 */
add_action( 'admin_menu', 'rorio_theme_info' );
function rorio_theme_info() {
	$theme_data = wp_get_theme( 'rorio' );
	add_theme_page( esc_html__( 'Rorio Dashboard', 'rorio' ), esc_html__( 'Rorio Theme', 'rorio' ), 'edit_theme_options', 'mk', 'rorio_theme_info_page' );
}

/**
 * Add admin notice when active theme
 *
 * @return bool|null
 */

function rorio_admin_notice() {
	global $pagenow;
	if ( $number_action > 0 ) {
		$theme_data = wp_get_theme();

		if ( isset( $_GET['activated'] ) && 'themes.php' == $pagenow ) {
			// show notice
		?>
		<div class="updated notice is-dismissible">
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'rorio' ),  $theme_data->Name, admin_url( 'themes.php?page=mk_rorio' )  ); ?></p>
         </div>
		 	<?php
		}
	}
}
add_action( 'admin_notices', 'rorio_admin_notice' );
function rorio_theme_info_page() {
	$theme_data = wp_get_theme( 'onepress' );

	if ( isset( $_GET['rorio_action_dismiss'] ) ) {
		$actions_dismiss = get_option( 'rorio_actions_dismiss' );
		if ( ! is_array( $actions_dismiss ) ) {
			$actions_dismiss = array();
		}
		$actions_dismiss[ stripslashes( $_GET['rorio_action_dismiss'] ) ] = 'dismiss';
		update_option( 'rorio_actions_dismiss', $actions_dismiss );
	}

	// Check for current viewing tab
	$tab = null;
	if ( isset( $_GET['tab'] ) ) {
		$tab = $_GET['tab'];
	} else {
		$tab = null;
	}

	$actions = rorio_get_actions_required();
	$n = array_count_values( $actions );
	$number_action = 0;
	if ( $n && isset( $n['active'] ) ) {
		$number_action = $n['active'];
	}
	$current_action_link = admin_url( 'themes.php?page=mk_rorio&tab=actions_required' );
	?>
	<div class="wrap about-wrap theme_info_wrapper">
	<h1><?php printf( esc_html__( 'Welcome to Rorio - Version %1s', 'onepress' ), $theme_data->Version ); ?></h1>
	<div class="about-text"><?php esc_html_e( 'Rorio is a creative and flexible WordPress ONE PAGE theme well suited for business, portfolio, digital agency, product showcase, freelancers websites.', 'rorio' ); ?></div>
	<a target="_blank" href="<?php echo esc_url( 'http://www.famethemes.com/?utm_source=theme_dashboard_page&utm_medium=badge_link&utm_campaign=theme_admin' ); ?>" class="aivahthemes-badge wp-badge"><span>AivahThemes</span></a>
	<h2 class="nav-tab-wrapper">
	<a href="?page=mk_rorio" class="nav-tab<?php echo is_null( $tab ) ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'OnePress', 'rorio' ) ?></a>
	<a href="?page=mk_rorio&tab=actions_required" class="nav-tab<?php echo $tab == 'actions_required' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Actions Required', 'rorio' ); echo ( $number_action > 0 ) ? "<span class='theme-action-count'>{$number_action}</span>" : ''; ?></a>
	<?php do_action( 'rorio_admin_more_tabs' ); ?>
	</h2>

	<?php if ( is_null( $tab ) ) { ?>
	<div class="theme_info info-tab-content">
	<div class="theme_info_column clearfix">
	<div class="theme_info_left">

	<div class="theme_link">
	<h3><?php esc_html_e( 'Theme Customizer', 'rorio' ); ?></h3>
	<p class="about"><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'rorio' ), $theme_data->Name ); ?></p>
	<p>
	<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'rorio' ); ?></a>
	</p>
	</div>
	<div class="theme_link">
	<h3><?php esc_html_e( 'Theme Documentation', 'rorio' ); ?></h3>
	<p class="about"><?php printf( esc_html__( 'Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'rorio' ), $theme_data->Name ); ?></p>
	<p>
	<a href="<?php echo esc_url( 'http://docs.famethemes.com/category/42-onepress' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e( 'Rorio Documentation', 'rorio' ) ; ?></a>
	</p>
	<?php do_action( 'rorio_dashboard_theme_links' ); ?>
	</div>
	<div class="theme_link">
	<h3><?php esc_html_e( 'Having Trouble, Need Support?', 'rorio' ); ?></h3>
	<p class="about"><?php printf( esc_html__( 'Support for %s WordPress theme is conducted through AivahTheme support system.', 'rorio' ), $theme_data->Name ); ?></p>
	<p>
	<a href="<?php echo esc_url( 'https://www.famethemes.com/dashboard/tickets/' ); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html( 'Create a support ticket', 'rorio' ), $theme_data->Name ); ?></a>
	</p>
	</div>
	</div>

	<div class="theme_info_right">
	<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
	</div>
	</div>
	</div>
	<?php } ?>

	<?php if ( $tab == 'actions_required' ) { ?>
	<div class="action-required-tab info-tab-content">
	<?php if ( $number_action > 0 ) { ?>
	<?php $actions = wp_parse_args( $actions, array( 'page_on_front' => '', 'page_template' ) ) ?>
	<?php if ( $actions['page_on_front'] == 'active' ) {  ?>
	<div class="theme_link  action-required">
	<a title="<?php  esc_attr_e( 'Dismiss', 'rorio' ); ?>" class="dismiss" href="<?php echo add_query_arg( array( 'rorio_action_dismiss' => 'page_on_front' ), $current_action_link ); ?>"><span class="dashicons dashicons-dismiss"></span></a>
	<h3><?php esc_html_e( 'Switch "Front page displays" to "A static page"', 'rorio' ); ?></h3>
	<div class="about">
	<p><?php esc_attr_e( 'In order to have the one page look for your website, please go to Customize -&gt; Static Front Page and switch "Front page displays" to "A static page".', 'rorio' ); ?></p>
	</div>
	<p>
	<a  href="<?php echo admin_url( 'options-reading.php' ); ?>" class="button"><?php esc_html_e( 'Setup front page displays', 'rorio' ); ?></a>
	</p>
	</div>
	<?php } ?>

	<?php if ( $actions['page_template'] == 'active' ) {  ?>
	<div class="theme_link  action-required">
	<a  title="<?php  esc_attr_e( 'Dismiss', 'rorio' ); ?>" class="dismiss" href="<?php echo add_query_arg( array( 'rorio_action_dismiss' => 'page_template' ), $current_action_link ); ?>"><span class="dashicons dashicons-dismiss"></span></a>
	<h3><?php esc_html_e( 'Set your homepage page template to "Frontpage".', 'rorio' ); ?></h3>

	<div class="about">
	<p><?php esc_html_e( 'In order to change homepage section contents, you will need to set template "Frontpage" for your homepage.', 'rorio' ); ?></p>
	</div>
	<p>
	<?php
	$front_page = get_option( 'page_on_front' );
	if ( $front_page <= 0  ) {
	    ?>
	    <a  href="<?php echo admin_url( 'options-reading.php' ); ?>" class="button"><?php esc_html_e( 'Setup front page displays', 'rorio' ); ?></a>
	    <?php

	}

	if ( $front_page > 0 && get_post_meta( $front_page, '_wp_page_template', true ) != 'template-frontpage.php' ) {
	    ?>
	    <a href="<?php echo get_edit_post_link( $front_page ); ?>" class="button"><?php esc_html_e( 'Change homepage page template', 'rorio' ); ?></a>
	    <?php
	}
	?>
	</p>
	</div>
	<?php } ?>
	<?php do_action( 'rorio_more_required_details', $actions ); ?>
	<?php  } else { ?>
	<h3><?php  printf( esc_html__( 'Keep update with %s', 'rorio' ) , $theme_data->Name ); ?></h3>
	<p><?php esc_html_e( 'Hooray! There are no required actions for you right now.', 'rorio' ); ?></p>
	<?php } ?>
	</div>
	<?php } ?>

	<?php do_action( 'rorio_more_tabs_details', $actions ); ?>

	</div> <!-- END .theme_info -->
	<?php
}

?>