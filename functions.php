<?php

// Custom scripts & styles
function addCustomThemeStyles(){
  // Style
  wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Oswald:700', array(), '0.0.1', 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css', array(), '5.4.2', 'all');
  wp_enqueue_style('maincss', get_template_directory_uri().'/assets/main.css', array(), '0.0.1', 'all');
  wp_enqueue_style('customFieldStyles', get_template_directory_uri().'/assets/customFieldStyles.css', array(), '0.0.1', 'all');
  // Scripts
  wp_enqueue_script('jquery');
  wp_enqueue_script('customscripts', get_template_directory_uri().'/assets/custom-script.js', array(), '0.0.1', true);
  wp_enqueue_script('customFields', get_template_directory_uri().'/assets/customFields.js', array(), '0.0.1', true);

  global $wp_query;
}

add_action('wp_enqueue_scripts', 'addCustomThemeStyles');

// THEME SUPPORTS
add_theme_support('post-thumbnails');

// MENUS
function addCustomMenus(){
  add_theme_support('menus');
  register_nav_menu('header_nav', 'Hamburger menu');
}

add_action('init', 'addCustomMenus');

// POST TYPES
function add_services_post_type(){

  $labels = array(
    'name' => _x('Add services', 'post type name', 'shPhotography'),
    'singular_name' => _x('Add services', 'post type singular name', 'shPhotography'),
    'add_new_item' => _x('Add service', 'adding service type', 'shPhotography')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type that creates different photography services',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-camera',
    'supports' => array(
      'title',
			'editor',
      'thumbnail'
    ),
    'query_var' => true
  );
  register_post_type('services', $args);
}

function add_service_images_post_type(){

  $labels = array(
    'name' => _x('Upload services images', 'post type name', 'shPhotography'),
    'singular_name' => _x('Upload services images', 'post type singular name', 'shPhotography'),
    'add_new_item' => _x('Add image to service', 'adding service type', 'shPhotography')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'a post type that creates uploads photos to the appropriate service page',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-gallery',
    'supports' => array(
      'title',
    ),
    'query_var' => true
  );
  register_post_type('servicesimages', $args);
}

add_action('init', 'add_service_images_post_type');
add_action('init', 'add_services_post_type');

require get_parent_theme_file_path('/addons/custom_fields.php');
