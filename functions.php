<?php
define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');
define('FUNC_PATH', dirname(__FILE__) . '/functionality/');
define('TEMPLATE_PATH', dirname(__FILE__) . '/components/templates-parts/');
define('ASSETS_PATH', get_stylesheet_directory_uri() . '/assets');
define('JS_PATH', get_stylesheet_directory_uri() . '/assets/js');
define('STYLES_PATH', get_stylesheet_directory_uri() . '/assets/css');
define('FONTS_PATH', get_stylesheet_directory_uri() . '/assets/fonts');
define('IMG_PATH', get_stylesheet_directory_uri() . '/assets/img');
define('JS_DIR', get_template_directory() . '/assets/js');
define('STYLES_DIR', get_template_directory() . '/assets/css');


function r4_themestive_enqueue_style()
{
    wp_enqueue_style('swiper', STYLES_PATH . '/libs/swiper-bundle.min.css', array(), filemtime(STYLES_DIR . '/libs/swiper-bundle.min.css'));
    wp_enqueue_style('fancybox', STYLES_PATH . '/libs/fancybox.css', array(), filemtime(STYLES_DIR . '/libs/fancybox.css'));
    wp_enqueue_style('intlTelInput', STYLES_PATH . '/libs/intlTelInput.css', array(), filemtime(STYLES_DIR . '/libs/intlTelInput.css'));

    wp_enqueue_style('calendly', 'https://assets.calendly.com/assets/external/widget.css', array(), null);

    wp_enqueue_style('reset', STYLES_PATH . '/reset.min.css', array(), filemtime(STYLES_DIR . '/reset.min.css'));
    wp_enqueue_style('main-style', STYLES_PATH . '/style.min.css', array(), filemtime(STYLES_DIR . '/style.min.css'));
}
add_action('wp_enqueue_scripts', 'r4_themestive_enqueue_style');

function r4_make_styles_async($tag, $handle, $src)
{

    if (is_admin() || is_user_logged_in()) return $tag;

    $async_styles = [
        'swiper',
        'fancybox',
        'intlTelInput',
        'calendly'
    ];

    if (in_array($handle, $async_styles)) {
        $async_tag = '<link rel="preload" id="' . $handle . '-css-preload" href="' . $src . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
        $async_tag .= '<noscript>' . $tag . '</noscript>';
        return $async_tag;
    }

    return $tag;
}

function r4_themestive_enqueue_scripts()
{
    wp_deregister_script('jquery');


    wp_enqueue_script('jquery', JS_PATH . '/libs/jquery-4.0.0.min.js', array(), filemtime(JS_DIR . '/libs/jquery-4.0.0.min.js'), [
        'in_footer' => true,
        'strategy'  => 'defer',
    ]);

    wp_enqueue_script('calendly-js', 'https://assets.calendly.com/assets/external/widget.js', array(), null, [
        'in_footer' => true,
        'strategy'  => 'async',
    ]);

    wp_enqueue_script('swiper-js', JS_PATH . '/libs/swiper-bundle.min.js', array(), filemtime(JS_DIR . '/libs/swiper-bundle.min.js'), [
        'in_footer' => true,
        'strategy'  => 'defer',
    ]);

    wp_enqueue_script('fancybox-js', JS_PATH . '/libs/fancybox.umd.js', array(), filemtime(JS_DIR . '/libs/fancybox.umd.js'), [
        'in_footer' => true,
        'strategy'  => 'defer',
    ]);


    wp_enqueue_script('intlTelInput-js', JS_PATH . '/libs/intlTelInput.min.js', array(), filemtime(JS_DIR . '/libs/intlTelInput.min.js'), [
        'in_footer' => true,
        'strategy'  => 'defer',
    ]);

    wp_enqueue_script('app-js', JS_PATH . '/app.min.js', array('jquery', 'intlTelInput-js'), filemtime(JS_DIR . '/app.min.js'), [
        'in_footer' => true,
        'strategy'  => 'defer',
    ]);
}
add_action('wp_enqueue_scripts', 'r4_themestive_enqueue_scripts');

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


add_action('wp_head', function () {
    $header_scripts = get_field('header_scripts', 'options');

    if (!empty($header_scripts)) {
        echo "\n<!-- Global Header Scripts from ACF -->\n";
        echo $header_scripts;
        echo "\n<!-- End Global Header Scripts -->\n";
    }
}, 100);

add_action('wp_body_open', function () {
    $body_scripts = get_field('body_scripts', 'options');

    if (!empty($body_scripts)) {
        echo "\n<!-- Global Body Scripts from ACF -->\n";
        echo $body_scripts;
        echo "\n<!-- End Global Body Scripts -->\n";
    }
}, 100);

add_action('wp_footer', function () {
    $footer_scripts = get_field('footer_scripts', 'options');

    if (!empty($footer_scripts)) {
        echo "\n<!-- Global Footer Scripts from ACF -->\n";
        echo $footer_scripts;
        echo "\n<!-- End Global Footer Scripts -->\n";
    }
}, 100);

// add support svg mime type 
function allow_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');


// CF7 Settings

add_filter('wpcf7_autop_or_not', '__return_false');
