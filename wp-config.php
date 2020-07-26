<?php

$table_prefix = getenv( 'TABLE_PREFIX' );

foreach ( $_ENV as $env_key => $env_value ) {
	if ( ! defined( $env_key ) ) {
		define( $env_key, $env_value );
	}
}

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

require_once ABSPATH . 'wp-settings.php';
