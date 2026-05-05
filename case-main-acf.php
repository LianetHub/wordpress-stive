<?php
/**
 * Template Name: Main Case ACF Block
 * Template Post Type: case
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();


$page_id = $post->ID;

$breadcrumbs_path = TEMPLATE_PATH . '_breadcrumbs.php';
if (file_exists($breadcrumbs_path)) {
    require_once($breadcrumbs_path);
}

/**
 * Оборачивает стандартный контент в структуру статьи
 *
 * @param string $content Сырой контент
 * @return string Оформленный контент или пустая строка
 */
function wrap_standard_content($content) {
    $content = trim($content);
    if (empty($content)) {
        return '';
    }
    
    return sprintf(
        '<article id="case-content" class="article article--case">
            <div class="article__container container typography-block">
                %s
            </div>
        </article>',
        $content
    );
}

/**
 * Обрабатывает контент с контролем autop
 *
 * @param string $content Контент для обработки
 * @return string Обработанный контент
 */
function safe_render_content($content) {
    static $wpautop_removed = false;
    
    // Удаляем wpautop только один раз для этого запроса
    if (!$wpautop_removed && has_filter('the_content', 'wpautop')) {
        remove_filter('the_content', 'wpautop');
        $wpautop_removed = true;
    }
    
    return apply_filters('the_content', $content);
}

// Получаем и парсим блоки
$raw_content = get_the_content(null, false, $post);
$blocks = parse_blocks($raw_content);

$output = '';
$standard_blocks_buffer = '';

foreach ($blocks as $block) {
    // Проверяем, является ли блок ACF блоком
    $is_acf_block = isset($block['blockName']) && strpos($block['blockName'], 'acf/') === 0;
    
    if ($is_acf_block) {
        // Закрываем буфер стандартных блоков перед ACF блоком
        if (!empty($standard_blocks_buffer)) {
            $output .= wrap_standard_content($standard_blocks_buffer);
            $standard_blocks_buffer = '';
        }
        
        // Рендерим ACF блок
        $rendered_block = render_block($block);
        if (!empty(trim($rendered_block))) {
            $output .= $rendered_block;
        }
    } else {
        // Добавляем в буфер стандартные блоки
        $rendered_block = render_block($block);
        if (!empty(trim($rendered_block))) {
            $standard_blocks_buffer .= $rendered_block;
        }
    }
}

// Обрабатываем остатки буфера
if (!empty($standard_blocks_buffer)) {
    $output .= wrap_standard_content($standard_blocks_buffer);
}

// Очищаем финальный вывод
$output = trim($output);

// Безопасно выводим контент
if (!empty($output)) {
    // Используем безопасный рендеринг без wpautop
    echo safe_render_content($output);
}

get_footer();
?>