<?php
define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');
define('FUNC_PATH', dirname(__FILE__) . '/functionality/');
define('TEMPLATE_PATH', dirname(__FILE__) . '/components/templates-parts/');
define('JS_PATH', get_stylesheet_directory_uri() . '/assets/js');
define('STYLES_PATH', get_stylesheet_directory_uri() . '/assets/css');
define('FONTS_PATH', get_stylesheet_directory_uri() . '/assets/fonts');
define('IMG_PATH', get_stylesheet_directory_uri() . '/assets/img');
define('JS_DIR', get_template_directory() . '/assets/js');
define('STYLES_DIR', get_template_directory() . '/assets/css');


function r4_themestive_style()
{
    wp_enqueue_style('swiper', STYLES_PATH . '/libs/swiper-bundle.min.css', array(), filemtime(STYLES_DIR . '/libs/swiper-bundle.min.css'));
    wp_enqueue_style('fancybox', STYLES_PATH . '/libs/fancybox.css', array(), filemtime(STYLES_DIR . '/libs/fancybox.css'));
    wp_enqueue_style('reset', STYLES_PATH . '/reset.min.css', array(), filemtime(STYLES_DIR . '/reset.min.css'));
    wp_enqueue_style('main-style', STYLES_PATH . '/style.min.css', array(), filemtime(STYLES_DIR . '/style.min.css'));
}
add_action('wp_enqueue_scripts', 'r4_themestive_style');

function r4_theme_enqueue_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', JS_PATH . '/libs/jquery-4.0.0.min.js', array(), filemtime(JS_DIR . '/libs/jquery-4.0.0.min.js'), ['in_footer' => true, 'strategy'  => 'async',]));
    wp_enqueue_script('swiper-js', JS_PATH . '/libs/swiper-bundle.min.js', array(), filemtime(JS_DIR . '/libs/swiper-bundle.min.js'), ['in_footer' => true, 'strategy'  => 'async',]);
    wp_enqueue_script('fancybox-js', JS_PATH . '/libs/fancybox.umd.js', array(), filemtime(JS_DIR . '/libs/fancybox.umd.js'), ['in_footer' => true, 'strategy'  => 'async',]);
    wp_enqueue_script('app-js', JS_PATH . '/app.min.js', array('jquery'), filemtime(JS_DIR . '/app.min.js'), ['in_footer' => true, 'strategy'  => 'async',]);
}
add_action('wp_enqueue_scripts', 'r4_theme_enqueue_scripts');

// mark recaptcha js deferred
function defer_js($url)
{
    if (is_user_logged_in()) return $url;
    if ((strpos($url, 'recaptcha/api.js')) || (strpos($url, 'recaptcha/index.js'))) {
        return str_replace(' src', ' defer src', $url);
    }
    return $url;
}
add_filter('script_loader_tag', 'defer_js', 11);
