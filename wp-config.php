<?php

$table_prefix = getenv('TABLE_PREFIX');

foreach ($_ENV as $key => $value) {
  $capitalized = strtoupper($key);
  if (!defined($capitalized)) {
    define($capitalized, $value);
  }
}

if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');

?>
