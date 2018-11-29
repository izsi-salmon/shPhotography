<?php

// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,600|Oswald:700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css', array(), '5.4.2', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/main.css', array(), '0.0.1', 'all');
  // Scripts
  wp_enqueue_script('customscripts', get_template_directory_uri().'/assets/custom-script.js', array(), '0.0.1', true);

  global $wp_query;
}

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

// Custom menus
function addCustomMenus(){
  add_theme_support('menus');
  register_nav_menu('header_nav', 'Hamburger menu');
}

add_action('init', 'addCustomMenus');
