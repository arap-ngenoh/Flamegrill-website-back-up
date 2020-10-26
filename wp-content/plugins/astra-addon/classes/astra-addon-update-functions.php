<?php
/**
 * Astra Addon Updates
 *
 * Functions for updating data, used by the background updater.
 *
 * @package Astra Addon
 * @version 2.1.3
 */

defined( 'ABSPATH' ) || exit;

/**
 * Do not apply new default colors to the Elementor & Gutenberg Buttons for existing users.
 *
 * @since 2.1.4
 *
 * @return void
 */
function astra_addon_page_builder_button_color_compatibility() {
	$theme_options = get_option( 'astra-settings', array() );

	// Set flag to not load button specific CSS.
	if ( ! isset( $theme_options['pb-button-color-compatibility-addon'] ) ) {
		$theme_options['pb-button-color-compatibility-addon'] = false;
		error_log( 'Astra Addon: Page Builder button compatibility: false' ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		update_option( 'astra-settings', $theme_options );
	}
}

/**
 * Apply Desktop + Mobile to parallax device.
 *
 * @since 2.3.0
 *
 * @return bool
 */
function astra_addon_page_header_parallax_device() {

	$posts = get_posts(
		array(
			'post_type'   => 'astra_adv_header',
			'numberposts' => -1,
		)
	);

	foreach ( $posts as $post ) {
		$ids = $post->ID;
		if ( false == $ids ) {
			return false;
		}

		$settings = get_post_meta( $ids, 'ast-advanced-headers-design', true );

		if ( isset( $settings['parallax'] ) && $settings['parallax'] ) {
			$settings['parallax-device'] = 'both';
		} else {
			$settings['parallax-device'] = 'none';
		}
		update_post_meta( $ids, 'ast-advanced-headers-design', $settings );
	}
}

/**
 * Migrate option data from Content background option to its desktop counterpart.
 *
 * @since 2.4.0
 *
 * @return void
 */
function astra_responsive_content_background_option() {

	$theme_options = get_option( 'astra-settings', array() );

	if ( false === get_option( 'content-bg-obj-responsive', false ) && isset( $theme_options['content-bg-obj'] ) ) {

		$theme_options['content-bg-obj-responsive']['desktop'] = $theme_options['content-bg-obj'];
		$theme_options['content-bg-obj-responsive']['tablet']  = array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		);
		$theme_options['content-bg-obj-responsive']['mobile']  = array(
			'background-color'      => '',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'auto',
			'background-attachment' => 'scroll',
		);
	}

	update_option( 'astra-settings', $theme_options );
}

/**
 * Migrate multisite css file generation option to sites indiviually.
 *
 * @since 2.3.3
 *
 * @return void
 */
function astra_addon_css_gen_multi_site_fix() {

	if ( is_multisite() ) {
		$is_css_gen_enabled = get_site_option( '_astra_file_generation', 'disable' );
		if ( 'enable' === $is_css_gen_enabled ) {
			update_option( '_astra_file_generation', $is_css_gen_enabled );
			error_log( 'Astra Addon: CSS file generation: enable' ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
		}
	}
}

/**
 * Check if we need to change the default value for tablet breakpoint.
 *
 * @since 2.4.0
 * @return void
 */
function astra_addon_update_theme_tablet_breakpoint() {

	$theme_options = get_option( 'astra-settings' );

	if ( ! isset( $theme_options['can-update-addon-tablet-breakpoint'] ) ) {
		// Set a flag to check if we need to change the addon tablet breakpoint value.
		$theme_options['can-update-addon-tablet-breakpoint'] = false;
	}

	update_option( 'astra-settings', $theme_options );
}
