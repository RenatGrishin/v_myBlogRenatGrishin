<?php
//Подключаем Меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array( // создаём любое количество областей
		  'main_menu' => 'Главное меню', // 'имя' => 'описание'
		  'foot_menu' => 'Меню в футере'
		)
	);
}

//Подключаем миниатюры
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(900, 900, false);
}
// Убираем категории с публикации на Главной страницы
function exclude_category($query) {
  if ($query->is_home){
    $query->set('cat','-20');}
   return $query; }
add_filter('pre_get_posts','exclude_category');

// Подключаем CSS
function rg_blog(){
	wp_enqueue_style('style-css', get_stylesheet_uri());
	wp_enqueue_style('cssRest', get_template_directory_uri() .'/css/cssRest.css');
	wp_enqueue_style('style', get_template_directory_uri() .'/css/style.css');
	wp_enqueue_style('media980', get_template_directory_uri() .'/css/media980.css');
}
add_action('wp_enqueue_scripts', 'rg_blog');

// Подключаем логотип
add_theme_support(
    'custom-logo',
    ['width' => 200, 'height' => 200]
);

//Банер
function onwp_shortcode_front_page($atts, $content = null) {
  $result = '';
  extract(shortcode_atts(array( "code" => '',), $atts));
  if(!empty($code)){
    if(is_front_page()){
      $result = do_shortcode( $code );
    }
  }
  return $result;
}
add_shortcode('shortcode_front_page', 'onwp_shortcode_front_page');
