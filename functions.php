<?php
add_action('wp_enqueue_scripts', 'telekom_scripts');

function telekom_scripts()
{
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js');
  wp_enqueue_script('jquery');
  wp_enqueue_script('owlcarousel_js', get_template_directory_uri() . '/assets/js/owlcarousel/owl.carousel.min.js', [], '1.0', 'in_footer');
  wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', [], '1.0', 'in_footer');
  wp_enqueue_script('cleave', get_template_directory_uri() . '/assets/js/cleave.min.js', [], '1.0', 'in_footer');
  wp_enqueue_script('cleave_ru', get_template_directory_uri() . '/assets/js/cleave-phone.ru.js', [], '1.0', 'in_footer');
  wp_enqueue_script('inlineSVG', get_template_directory_uri() . '/assets/js/inlineSVG.min.js', [], '1.0', 'in_footer');
  wp_enqueue_script('mainJs', get_template_directory_uri() . '/assets/js/main.min.js', [], '1.0', 'in_footer');

  wp_enqueue_style('owlcarousel_css',  get_template_directory_uri() . '/assets/css/owlcarousel/owl.carousel.min.css', [], '1.0', 'all');
  wp_enqueue_style('animate',  get_template_directory_uri() . '/assets/css/animate.min.css', [], '1.0', 'all');
  wp_enqueue_style('mainCss',  get_template_directory_uri() . '/assets/css/main.min.css', [], '1.0', 'all');
}

add_filter('upload_mimes', 'svg_upload_allow');

function svg_upload_allow($mimes)
{
  $mimes['svg']  = 'image/svg+xml';

  return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

  if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
    $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
  } else {
    $dosvg = ('.svg' === strtolower(substr($filename, -4)));
  }

  if ($dosvg) {


    if (current_user_can('manage_options')) {

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    } else {
      $data['ext']  = false;
      $data['type'] = false;
    }
  }

  return $data;
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Контент сайта',
    'menu_title'  => 'Контент сайта',
    'menu_slug'   => 'theme-main-settings',
    'capability'  => 'edit_posts',
    'update_button' => __('Обновить', 'acf'),
    'updated_message' => __("Обновлено", 'acf'),
    'position' => 2,
    'icon_url' => 'dashicons-list-view',
    'redirect'    => false
  ));
}
