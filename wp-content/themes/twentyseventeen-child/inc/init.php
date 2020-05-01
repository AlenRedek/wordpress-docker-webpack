<?php

add_action('after_setup_theme', 'abr_theme_setup');
function abr_theme_setup() {
  load_theme_textdomain('twentyseventeen-child', get_stylesheet_directory() . '/languages');
}

add_action('wp_enqueue_scripts', 'abr_theme_scripts');
function abr_theme_scripts() {

  $parent_style = 'parent-style';
  wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', [$parent_style]);
}
