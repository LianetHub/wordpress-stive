<?php
define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');
define('FUNC_PATH', dirname(__FILE__) . '/functionality/');
define('WIDGET_PATH', dirname(__FILE__) . '/widget/');
define('TEMPLATE_PATH', dirname(__FILE__) . '/components/templates-parts/');
define('ASSETS_PATH', get_stylesheet_directory_uri() . '/assets');
define('JS_PATH', get_stylesheet_directory_uri() . '/assets/js');
define('STYLES_PATH', get_stylesheet_directory_uri() . '/assets/css');
define('FONTS_PATH', get_stylesheet_directory_uri() . '/assets/fonts');
define('IMG_PATH', get_stylesheet_directory_uri() . '/assets/img');
define('JS_DIR', get_template_directory() . '/assets/js');
define('STYLES_DIR', get_template_directory() . '/assets/css');

require_once(FUNC_PATH . 'case-taxonomy.php');
require_once(FUNC_PATH . 'blog-taxonomy.php');
require_once(FUNC_PATH . 'acf-init.php');
require_once(FUNC_PATH . 'display-case-category.php');
require_once(FUNC_PATH . 'module-for-block-after-main-content.php');
require_once(FUNC_PATH . 'sidebar-selector.php');
require_once(FUNC_PATH . 'display-universal-sidebar.php');
require_once(FUNC_PATH . 'register-sidebar.php');
require_once(WIDGET_PATH . 'cta-banner-widget.php');
require_once(WIDGET_PATH . 'custom-toc-widget.php');

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
            'strategy' => 'defer',
    ]);

    wp_enqueue_script('calendly-js', 'https://assets.calendly.com/assets/external/widget.js', array(), null, [
            'in_footer' => true,
            'strategy' => 'async',
    ]);

    wp_enqueue_script('swiper-js', JS_PATH . '/libs/swiper-bundle.min.js', array(), filemtime(JS_DIR . '/libs/swiper-bundle.min.js'), [
            'in_footer' => true,
            'strategy' => 'defer',
    ]);

    wp_enqueue_script('fancybox-js', JS_PATH . '/libs/fancybox.umd.js', array(), filemtime(JS_DIR . '/libs/fancybox.umd.js'), [
            'in_footer' => true,
            'strategy' => 'defer',
    ]);


    wp_enqueue_script('intlTelInput-js', JS_PATH . '/libs/intlTelInput.min.js', array(), filemtime(JS_DIR . '/libs/intlTelInput.min.js'), [
            'in_footer' => true,
            'strategy' => 'defer',
    ]);

    wp_enqueue_script('app-js', JS_PATH . '/app.min.js', array('jquery', 'intlTelInput-js'), filemtime(JS_DIR . '/app.min.js'), [
            'in_footer' => true,
            'strategy' => 'defer',
    ]);

    wp_enqueue_script('jquery', JS_PATH . '/blog-filter.js', array(), filemtime(JS_DIR . '/blog-filter.js'), [
            'in_footer' => true,
            'strategy' => 'defer',
    ]);

    wp_localize_script('blog-filter', 'blog_ajax', [
            'url' => admin_url('admin-ajax.php')
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

add_theme_support('post-thumbnails');


// update breadcrumbs render
add_filter('rank_math/frontend/breadcrumb/html', function ($html, $crumbs, $class) {
    $output = '<ul class="breadcrumbs__list">';

    foreach ($crumbs as $key => $crumb) {
        $is_last = (count($crumbs) - 1) === $key;
        $li_class = $is_last ? 'breadcrumbs__item breadcrumbs__item--last' : 'breadcrumbs__item';

        $output .= '<li class="' . $li_class . '">';

        if (!$is_last && isset($crumb[1])) {
            $output .= '<a href="' . esc_url($crumb[1]) . '" class="breadcrumbs__link">' . esc_html($crumb[0]) . '</a>';
        } else {
            $output .= '<span class="breadcrumbs__current">' . esc_html($crumb[0]) . '</span>';
        }

        $output .= '</li>';
    }

    $output .= '</ul>';
    return $output;
}, 10, 3);

add_filter('rank_math/frontend/breadcrumb/settings', function ($settings) {
    $settings['separator'] = '';
    return $settings;
});

/**
 * @param array $mimes Существующий список разрешенных MIME-типов.
 * @return array Обновленный список MIME-типов.
 */
function add_markdown_mime_type($mimes)
{
    // Добавляем MIME-тип для файлов .md
    $mimes['md'] = 'text/plain';
    return $mimes;
}

add_filter('upload_mimes', 'add_markdown_mime_type');

function r4_get_reading_time($post_id = null, $wpm = 200, $seconds_per_image = 5)
{
    $post_id = $post_id ?: get_the_ID();
    $html = apply_filters('the_content', get_post_field('post_content', $post_id));
    $words = str_word_count(wp_strip_all_tags($html));
    preg_match_all('/<img\b[^>]*>/i', $html, $matches);
    $images = count($matches[0]);
    $words += ($images * $seconds_per_image) * $wpm / 60;

    return max(1, (int)ceil($words / $wpm));
}

function r4_get_the_reading_time($post_id = null, $before = '', $after = ' мин. читать')
{
    printf(
            '%s%d%s',
            $before,
            r4_get_reading_time($post_id),
            $after
    );
}

// Настройки для страницы архивов case start
add_action('pre_get_posts', function ($query) {
    if (
            !is_admin() &&
            $query->is_main_query() &&
            is_post_type_archive('case')
    ) {
        $query->set('posts_per_page', 5);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');
    }
});
// Настройки для страницы архивов case end

// Настройки для страницы архивов blog start
add_action('pre_get_posts', function ($query) {

    if (
            !is_admin() &&
            $query->is_main_query() &&
            is_post_type_archive('blog')
    ) {

        $query->set('posts_per_page', 6);
        $query->set('orderby', 'date');
        $query->set('order', 'DESC');

        // ИСКЛЮЧАЕМ HERO
        $hero = get_posts([
                'post_type' => 'blog',
                'posts_per_page' => 1
        ]);

        if ($hero) {
            $query->set('post__not_in', [$hero[0]->ID]);
        }

        // ФИЛЬТР
        if (!empty($_GET['category'])) {
            $query->set('tax_query', [
                    [
                            'taxonomy' => 'blog-list',
                            'field' => 'slug',
                            'terms' => sanitize_text_field($_GET['category']),
                    ]
            ]);
        }
    }
});

add_action('wp_ajax_filter_blog', 'filter_blog');
add_action('wp_ajax_nopriv_filter_blog', 'filter_blog');

function filter_blog()
{

    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $args = [
            'post_type' => 'blog',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC'
    ];

    $hero = get_posts([
            'post_type' => 'blog',
            'posts_per_page' => 1
    ]);

    if ($hero) {
        $args['post__not_in'] = [$hero[0]->ID];
    }

    // ФИЛЬТР
    if ($category) {
        $args['tax_query'] = [
                [
                        'taxonomy' => 'blog-list',
                        'field' => 'slug',
                        'terms' => $category,
                ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="article-card">
                <picture class="article-card__image">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="cover-image">
                </picture>

                <div class="article-card__content">
                    <div class="article-card__categories">
                        <?php echo display_category_and_tag_terms(get_the_ID(), 'blog-list', 'span', 'article-card__category', 'true'); ?>
                    </div>

                    <p class="article-card__desc"><?php the_excerpt(); ?></p>

                    <div class="article-card__meta">
                        <div class="article-card__author"><?php the_author(); ?></div>
                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php echo get_the_date('F j, Y'); ?>
                        </time>
                    </div>
                </div>
            </a>

        <?php endwhile;
    endif;

    wp_reset_postdata();

    echo ob_get_clean();
    wp_die();
}

// Настройки для страницы архивов blog end


//add_filter('wpcf7_validate_text*', 'r4_custom_validate_empty_fields', 20, 2);
//add_filter('wpcf7_validate_email*', 'r4_custom_validate_empty_fields', 20, 2);
//add_filter('wpcf7_validate_tel*', 'r4_custom_validate_empty_fields', 20, 2);



function r4_custom_validate_empty_fields($result, $tag) {
    $target_form_ids = [4];
    
    $form_id = isset($_POST['_wpcf7']) ? intval($_POST['_wpcf7']) : 0;
    
    if (!in_array($form_id, $target_form_ids, true)) {
        return $result;
    }
    
    $field_name = $tag->name;
    
    $field_value = isset($_POST[$field_name]) ? trim($_POST[$field_name]) : '';
    
    if ($tag->is_required() && empty($field_value)) {
        $result->invalidate($tag, "Поле обязательно для заполнения");
    }
    
    return $result;
}