<?php
/**
 * Generic global functions
 *
 * @package ABR\Global
 */

/**
 * Check whether current user has admin privileges
 *
 * @return boolean
 */
function abr_is_dev() {
	return current_user_can( 'administrator' );
}

/**
 * Pretty var_dump
 *
 * @return void
 */
function abr_dump() {
	if ( abr_is_dev() ) {
		$args = func_get_args();
		echo '<pre>';
	  // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_var_dump
		var_dump( $args );
		echo '</pre>';
	}
}
