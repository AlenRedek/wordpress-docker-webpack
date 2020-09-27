<?php
/**
 * Theme initialization
 *
 * @package ABR\Global
 */

/**
 * Theme setup
 *
 * @return void
 */
function abr_theme_setup() {
	// Support string translations when doing AJAX requests (admin-ajax).
	load_theme_textdomain( 'redex', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'abr_theme_setup' );

/**
 * Enqueue admin assets
 *
 * @return void
 */
function abr_admin_assets() {
	abr_enqueue_assets( 'admin' );
}
add_action( 'admin_enqueue_scripts', 'abr_admin_assets' );

/**
 * Enqueue front assets
 *
 * @return void
 */
function abr_front_assets() {
	$parent_style = 'parent-style';
	$parent_theme = wp_get_theme( get_template() );

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
		'1.0'
	);

	abr_enqueue_assets( 'front' );
}
add_action( 'wp_enqueue_scripts', 'abr_front_assets' );

/**
 * Enqueue scripts and styles for the given entry point
 *
 * @param string $entry_point Name of the chunk.
 *
 * @return void
 */
function abr_enqueue_assets( $entry_point ) {
	$path  = '/assets/build';
	$asset = include_once get_stylesheet_directory() . "{$path}/{$entry_point}.asset.php";

	wp_enqueue_script(
		"{$entry_point}-scripts",
		get_stylesheet_directory_uri() . "{$path}/{$entry_point}.js",
		$asset['dependencies'],
		$asset['version'],
		true
	);

	wp_enqueue_style(
		"{$entry_point}-styles",
		get_stylesheet_directory_uri() . "{$path}/{$entry_point}.css",
		array(),
		$asset['version']
	);
}
