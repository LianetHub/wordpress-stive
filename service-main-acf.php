<?php

/**
 * Template Name: Main Service
 * Template Post Type: service
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

global $post;

$breadcrumbs_path = TEMPLATE_PATH . '_breadcrumbs.php';
if (file_exists($breadcrumbs_path)) {
    require_once $breadcrumbs_path;
}

/**
 * @param string $content
 * @return string
 */
function stive_service_wrap_standard_content($content)
{
    $content = trim($content);
    if ($content === '') {
        return '';
    }

    return sprintf(
        '<article id="service-content" class="article article--service">
            <div class="article__container container typography-block">
                %s
            </div>
        </article>',
        $content
    );
}

/**
 * @param string $content
 * @return string
 */
function stive_service_safe_render_content($content)
{
    static $wpautop_removed = false;

    if (!$wpautop_removed && has_filter('the_content', 'wpautop')) {
        remove_filter('the_content', 'wpautop');
        $wpautop_removed = true;
    }

    return apply_filters('the_content', $content);
}

$raw_content = get_the_content(null, false, $post);
$blocks = parse_blocks($raw_content);

$output = '';
$standard_blocks_buffer = '';

foreach ($blocks as $block) {
    $is_acf_block = isset($block['blockName']) && strpos($block['blockName'], 'acf/') === 0;
    $skip_case = $is_acf_block
        && function_exists('stive_service_is_case_only_acf_block')
        && stive_service_is_case_only_acf_block($block);

    if ($skip_case) {
        continue;
    }

    if ($is_acf_block) {
        if ($standard_blocks_buffer !== '') {
            $output .= stive_service_wrap_standard_content($standard_blocks_buffer);
            $standard_blocks_buffer = '';
        }

        if (function_exists('stive_service_prepare_acf_block_context')) {
            stive_service_prepare_acf_block_context($block);
        }

        $rendered_block = render_block($block);

        if (function_exists('stive_service_reset_acf_block_context')) {
            stive_service_reset_acf_block_context($block);
        }

        if (trim($rendered_block) !== '') {
            $output .= $rendered_block;
        }
    } else {
        $rendered_block = render_block($block);
        if (trim($rendered_block) !== '') {
            $standard_blocks_buffer .= $rendered_block;
        }
    }
}

if ($standard_blocks_buffer !== '') {
    $output .= stive_service_wrap_standard_content($standard_blocks_buffer);
}

$output = trim($output);

if ($output !== '') {
    echo $output;
}

get_footer();
