<?php

namespace ABR\Theme;

function is_dev() {
  return current_user_can('administrator');
}

function avar_dump() {
  if (is_dev()) {
    $args = func_get_args();
    echo '<pre>';
    var_dump($args);
    echo '</pre>';
  }
}
