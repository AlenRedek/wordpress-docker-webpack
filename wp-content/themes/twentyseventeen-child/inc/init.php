<?php

add_action('after_setup_theme', 'abr_theme_setup');
function abr_theme_setup() {
  load_theme_textdomain('twentyseventeen-child', get_stylesheet_directory() . '/languages');
}

add_action('admin_enqueue_scripts', 'abr_admin_assets');
function abr_admin_assets() {
  abr_enqueue_assets('admin');
}

add_action('wp_enqueue_scripts', 'abr_front_assets');
function abr_front_assets() {
  $parent_style = 'parent-style';
  $parent_theme = wp_get_theme(get_template());

  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', array(), $parent_theme->get( 'Version' ));
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), '1.0');

  abr_enqueue_assets('front');
}

function abr_enqueue_assets($chunk) {
  $path = "/assets/build/{$chunk}";
  $script_asset = require get_stylesheet_directory() . "{$path}/{$chunk}.asset.php";

  wp_enqueue_script("{$chunk}-scripts", get_stylesheet_directory_uri() . "{$path}/{$chunk}.js", $script_asset['dependencies'], $script_asset['version'], true);
  wp_enqueue_style("{$chunk}-styles", get_stylesheet_directory_uri() . "{$path}/{$chunk}.css", [], $script_asset['version']);
}
