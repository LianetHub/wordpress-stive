<?php
define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');
define('FUNC_PATH', dirname(__FILE__) . '/functionality/');
define('TEMPLATE_PATH', dirname(__FILE__) . '/components/templates-parts/');
define('JS_PATH', get_stylesheet_directory_uri() . '/assets/js');
define('STYLES_PATH', get_stylesheet_directory_uri() . '/assets/styles');
define('FONTS_PATH', get_stylesheet_directory_uri() . '/assets/fonts');
define('IMG_PATH', get_stylesheet_directory_uri() . '/assets/images');
define('JS_DIR', get_template_directory() . '/assets/js');
define('STYLES_DIR', get_template_directory() . '/assets/styles');



add_action('wp_enqueue_scripts', 'r4_themestive_scripts_style');
function r4_themestive_scripts_style()
{
	
}



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




