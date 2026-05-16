<?php

/**
 * Post types that may use shared (cross-page) ACF blocks in Gutenberg.
 *
 * @return list<string>
 */
function stive_shared_acf_block_post_types(): array
{
    $types = array('page', 'case');

    if (defined('STIVE_SERVICE_POST_TYPE')) {
        $types[] = STIVE_SERVICE_POST_TYPE;
    } else {
        $types[] = 'service';
    }

    return $types;
}

/**
 * @param array<string, mixed> $block
 * @return array<string, mixed>
 */
function stive_acf_block_get_data(array $block): array
{
    if (!empty($block['data']) && is_array($block['data'])) {
        return $block['data'];
    }

    if (!empty($block['attrs']['data']) && is_array($block['attrs']['data'])) {
        return $block['attrs']['data'];
    }

    return array();
}

/**
 * @param array<string, mixed> $block
 */
function stive_acf_block_setup_meta(array $block): string
{
    $block_id = !empty($block['id']) ? (string) $block['id'] : 'block_' . wp_unique_id('acf_');
    $block_data = stive_acf_block_get_data($block);

    if ($block_data !== array() && function_exists('acf_setup_meta')) {
        acf_setup_meta($block_data, $block_id, true);
    }

    return $block_id;
}

/**
 * @param array<string, mixed> $block
 */
function stive_acf_block_reset_meta(array $block, string $block_id): void
{
    if (stive_acf_block_get_data($block) !== array() && function_exists('acf_reset_meta')) {
        acf_reset_meta($block_id);
    }
}

/**
 * @param array<string, mixed> $block
 */
function stive_render_acf_block_template($block, $content = '', $is_preview = false, $post_id = 0): void
{
    $template = isset($block['stive_template']) ? (string) $block['stive_template'] : '';
    if ($template === '') {
        return;
    }

    $GLOBALS['stive_rendering_acf_block'] = $block;
    $block_id = stive_acf_block_setup_meta($block);

    $located = locate_template($template);
    if ($located) {
        include $located;
    }

    stive_acf_block_reset_meta($block, $block_id);
    unset($GLOBALS['stive_rendering_acf_block']);
}

/**
 * @param string $name
 * @param string $title
 * @param string $template
 * @param array<string, mixed> $extra
 */
function stive_register_acf_block(string $name, string $title, string $template, array $extra = array()): void
{
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    $args = array_merge(
        array(
            'name' => $name,
            'title' => __($title),
            'description' => __('A custom block.'),
            'render_callback' => static function ($block, $content = '', $is_preview = false, $post_id = 0) use ($template) {
                $block['stive_template'] = $template;
                stive_render_acf_block_template($block, $content, $is_preview, $post_id);
            },
            'mode' => 'edit',
        ),
        $extra
    );

    acf_register_block_type($args);
}
