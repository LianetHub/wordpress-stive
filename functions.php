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
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style('swiper', $theme_uri . '/assets/css/libs/swiper-bundle.min.css');
    wp_enqueue_style('fancybox', $theme_uri . '/assets/css/libs/fancybox.css');
    wp_enqueue_style('reset', $theme_uri . '/assets/css/reset.min.css');

    $main_css_ver = filemtime($theme_dir . '/assets/css/style.min.css');
    wp_enqueue_style('main-style', $theme_uri . '/assets/css/style.min.css', array(), $main_css_ver);
}
add_action('wp_enqueue_scripts', 'r4_themestive_style');

function r4_theme_enqueue_scripts()
{
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', $theme_uri . '/assets/js/libs/jquery-4.0.0.min.js', array(), '4.0.0', true);

    wp_enqueue_script('swiper-js', $theme_uri . '/assets/js/libs/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('fancybox-js', $theme_uri . '/assets/js/libs/fancybox.umd.js', array(), null, true);

    $app_js_ver = filemtime($theme_dir . '/assets/js/app.min.js');
    wp_enqueue_script('app-js', $theme_uri . '/assets/js/app.min.js', array('jquery'), $app_js_ver, true);
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
