<?php

function abr_is_dev() {
  return current_user_can('administrator');
}

function abr_var_dump() {
  if (abr_is_dev()) {
    $args = func_get_args();
    echo '<pre>';
    var_dump($args);
    echo '</pre>';
  }
}
