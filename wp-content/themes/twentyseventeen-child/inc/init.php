<?php

add_action('after_setup_theme', 'abr_theme_setup');
function abr_theme_setup() {
  load_theme_textdomain('twentyseventeen-child', get_stylesheet_directory() . '/languages');
}

add_action('admin_enqueue_scripts', 'abr_admin_scripts');
function abr_admin_scripts() {
  wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri() . '/assets/js/build/admin/admin.js', ['jquery'], false, true);
}

add_action('wp_enqueue_scripts', 'abr_front_scripts');
function abr_front_scripts() {
  wp_enqueue_script('front-scripts', get_stylesheet_directory_uri() . '/assets/js/build/front/front.js', ['jquery'], false, true);
}

add_action('wp_enqueue_scripts', 'abr_front_styles');
function abr_front_styles() {
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css');
}
