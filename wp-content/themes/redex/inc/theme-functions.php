<?php
/**
 * Generic global functions
 *
 * @package Redex\Global
 */

/**
 * Check whether current user has admin privileges
 *
 * @return boolean
 */
function rdx_is_dev() {
	return current_user_can( 'administrator' );
}

/**
 * Pretty var_dump
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
