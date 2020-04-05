<?php

namespace ABR\Theme;

add_action('after_setup_theme', 'ABR\Theme\theme_setup');
function theme_setup() {
  load_theme_textdomain('twentyseventeen-child', get_stylesheet_directory() . '/languages');
}

add_action('wp_enqueue_scripts', 'ABR\Theme\theme_scripts');
function theme_scripts() {
  wp_enqueue_script('theme-main', get_stylesheet_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);

  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
