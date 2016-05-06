<?php

add_filter('show_admin_bar', '__return_false');

function arp_setup_theme() {

  add_theme_support( 'post-thumbnails' );

  add_image_size('wide-thumbnail', 400, 225, true);
  add_image_size('highlight', 860, 392, true);

  register_nav_menus(array(
    'header_nav' => __('Header navigation', 'arp'),
    'footer_nav' => __('Footer navigation', 'arp')
  ));

}
add_action('after_setup_theme', 'arp_setup_theme');

function arp_scripts() {

  wp_register_style('webfont-raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,700,600italic,600,500italic,500,400italic,300italic,300,200italic,200,100italic,100,800');
  wp_register_style('normalize', get_template_directory_uri() . '/assets/skeleton/css/normalize.css');
  wp_register_style('skeleton', get_template_directory_uri() . '/assets/skeleton/css/skeleton.css');
  wp_register_style('fontawesome', get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css');
  wp_register_style('perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/css/perfect-scrollbar.min.css');
  wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('webfont-raleway', 'normalize', 'skeleton', 'fontawesome', 'perfect-scrollbar'));

  wp_register_script('fitvids', get_template_directory_uri() . '/assets/jquery.fitvids/jquery.fitvids.js', array('jquery'));
  wp_register_script('perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js', array('jquery'));
  wp_register_script('site', get_template_directory_uri() . '/js/site.js', array('jquery', 'fitvids', 'perfect-scrollbar'));

  wp_enqueue_style('main');
  wp_enqueue_script('site');
}
add_action('wp_enqueue_scripts', 'arp_scripts');

function arp_get_header_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class .= ' collapsed';
  }
  if(is_page_template('basins.php') || is_page_template('map.php')) {
    $class .= ' transparent';
  }
  return $class;
}

function arp_get_brand_class() {
  $class = '';
  if(!is_home() && !is_front_page()) {
    $class .= ' small';
  }
  return $class;
}

/*
 * Required plugins
 */
require_once(TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
function arp_register_required_plugins() {
  $plugins = array(
    array(
      'name' => 'Advanced Custom Fields',
      'slug' => 'advanced-custom-fields',
      'required' => true,
      'force_activation' => true
    ),
    array(
      'name' => 'DomeGIS',
      'slug' => 'domegis-wordpress-plugin',
      'required' => true,
      'force_activation' => true,
      'source' => 'https://github.com/ecodigital/domegis-wordpress-plugin/archive/master.zip'
    )
  );
  $options = array(
    'default_path'  => '',
    'menu'      => 'arp-install-plugins',
    'has_notices'  => true,
    'dismissable'  => true,
    'dismiss_msg'  => '',
    'is_automatic'  => false,
    'message'    => ''
  );
  tgmpa($plugins, $options);
}
add_action('tgmpa_register', 'arp_register_required_plugins');

// ACF Settings
// define( 'ACF_LITE', true );

require_once(TEMPLATEPATH . '/inc/page-builder-hooks.php');

require_once(TEMPLATEPATH . '/inc/carousel.php');
require_once(TEMPLATEPATH . '/inc/basins.php');
