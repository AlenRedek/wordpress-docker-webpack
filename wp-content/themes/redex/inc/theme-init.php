<?php
/**
 * Theme initialization
 *
 * @package Redex\Global
 */

/**
 * Theme setup
 *
 * @return void
 */
function rdx_theme_setup() {
	// Support string translations when doing AJAX requests (admin-ajax).
	load_theme_textdomain( 'redex', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'rdx_theme_setup' );

/**
 * Enqueue admin assets
 *
 * @return void
 */
function rdx_admin_assets() {
	rdx_enqueue_assets( 'admin' );
}
add_action( 'admin_enqueue_scripts', 'rdx_admin_assets' );

/**
 * Enqueue front assets
 *
 * @return void
 */
function rdx_front_assets() {
	$child_theme  = wp_get_theme();
	$parent_theme = wp_get_theme( get_template() );
	$parent_style = 'parent-style';

	wp_enqueue_style(
		$parent_style,
		get_template_directory_uri() . '/style.css',
		array(),
		$parent_theme->get( 'Version' )
	);

	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		$child_theme->get( 'Version' )
	);

	rdx_enqueue_assets( 'front' );
}
add_action( 'wp_enqueue_scripts', 'rdx_front_assets' );

/**
 * Enqueue scripts and styles for the given entry point
 *
 * @param string $entry_point Name of the chunk.
 *
 * @return void
 */
function rdx_enqueue_assets( $entry_point ) {
	$path  = '/assets/build';
	$asset = include_once get_stylesheet_directory() . "{$path}/{$entry_point}.asset.php";

	if ( empty( $asset ) ) {
		return;
	}

	wp_enqueue_script(
		"{$entry_point}-scripts",
		get_stylesheet_directory_uri() . "{$path}/{$entry_point}.js",
		$asset['dependencies'],
		$asset['version'],
		true
	);

	wp_localize_script(
		"{$entry_point}-scripts",
		'rdxScriptData',
		array(
			'ajaxUrl' => admin_url(
				sprintf(
					'admin-ajax.php?_ajax_nonce=%s',
					wp_create_nonce( 'rdx' )
				)
			),
		)
	);

	wp_enqueue_style(
		"{$entry_point}-styles",
		get_stylesheet_directory_uri() . "{$path}/{$entry_point}.css",
		array(),
		$asset['version']
	);
}
