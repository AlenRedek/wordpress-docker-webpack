<?php
/**
 * Generic global functions.
 *
 * @package Redex\Global
 */

/**
 * Check whether current user has admin privileges.
 *
 * @return boolean
 */
function rdx_is_dev() {
	return current_user_can( 'administrator' );
}

/**
 * Pretty var_dump.
 *
 * @return void
 */
function rdx_dump() {
	if ( ! rdx_is_dev() ) {
		return;
	}

	$args   = func_get_args();
	$output = count( $args ) === 1 ? $args[0] : $args;

	// phpcs:ignore
	echo '<hr><pre>', var_dump( $output ), '</pre><hr>';
}

/**
 * Return formatted datetime based on WP settings.
 *
 * @param string $datetime Standard format Y-m-d.
 *
 * @return string
 */
function rdx_format_datetime( $datetime ) {
	$format = sprintf(
		'%s %s',
		get_option( 'date_format' ),
		get_option( 'time_format' )
	);

	return date_i18n( $format, strtotime( $datetime ) );
}

/**
 * Return current language ISO code (en, it, etc).
 *
 * @return string
 */
function rdx_get_current_language() {
	list($language_code) = explode( '_', get_locale() );

	return $language_code;
}
