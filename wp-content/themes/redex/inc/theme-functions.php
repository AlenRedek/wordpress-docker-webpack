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
	if ( rdx_is_dev() ) {
		$args = func_get_args();
		echo '<pre>';
	  // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_var_dump
		var_dump( $args );
		echo '</pre>';
	}
}
