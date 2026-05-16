<?php

/**
 * ACF fields for Service Header Gutenberg block (acf/service-header).
 */
function stive_register_service_header_acf_fields()
{
        if (!function_exists('acf_add_local_field_group')) {
                return;
        }

        acf_add_local_field_group(array(
                'key' => 'group_stive_service_header',
                'title' => 'Block Service Header',
                'fields' => array(
                        array(
                                'key' => 'field_service_title',
                                'label' => 'Title',
                                'name' => 'service_title',
                                'type' => 'text',
                                'instructions' => 'Leave empty to use the page title.',
                        ),
                        array(
                                'key' => 'field_service_description',
                                'label' => 'Description',
                                'name' => 'service_description',
                                'type' => 'textarea',
                                'rows' => 4,
                                'new_lines' => 'br',
                        ),
                        array(
                                'key' => 'field_service_btn_primary',
                                'label' => 'Primary button',
                                'name' => 'service_btn_primary',
                                'type' => 'link',
                                'return_format' => 'array',
                        ),
                        array(
                                'key' => 'field_service_btn_secondary',
                                'label' => 'Secondary button',
                                'name' => 'service_btn_secondary',
                                'type' => 'link',
                                'return_format' => 'array',
                        ),
                        array(
                                'key' => 'field_service_image',
                                'label' => 'Hero image',
                                'name' => 'service_image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                        ),
                        array(
                                'key' => 'field_service_metrics',
                                'label' => 'Metrics',
                                'name' => 'service_metrics',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add metric',
                                'sub_fields' => array(
                                        array(
                                                'key' => 'field_service_metric_label',
                                                'label' => 'Label',
                                                'name' => 'metric_label',
                                                'type' => 'text',
                                        ),
                                        array(
                                                'key' => 'field_service_metric_value',
                                                'label' => 'Value',
                                                'name' => 'metric_value',
                                                'type' => 'text',
                                        ),
                                ),
                        ),
                        array(
                                'key' => 'field_service_trust_logos',
                                'label' => 'Trust logos',
                                'name' => 'service_trust_logos',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add logo',
                                'sub_fields' => array(
                                        array(
                                                'key' => 'field_service_trust_logo',
                                                'label' => 'Logo',
                                                'name' => 'logo',
                                                'type' => 'image',
                                                'return_format' => 'array',
                                                'preview_size' => 'thumbnail',
                                                'library' => 'all',
                                        ),
                                ),
                        ),
                ),
                'location' => array(
                        array(
                                array(
                                        'param' => 'block',
                                        'operator' => '==',
                                        'value' => 'acf/service-header',
                                ),
                        ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
        ));
}

add_action('acf/init', 'stive_register_service_header_acf_fields');

/**
 * @param array<string, mixed> $block
 */
function stive_render_service_header_block($block, $content = '', $is_preview = false, $post_id = 0)
{
        $GLOBALS['stive_rendering_acf_block'] = $block;

        $block_id = !empty($block['id']) ? (string) $block['id'] : 'block_' . wp_unique_id('service_header_');
        $block_data = array();
        if (!empty($block['data']) && is_array($block['data'])) {
                $block_data = $block['data'];
        } elseif (!empty($block['attrs']['data']) && is_array($block['attrs']['data'])) {
                $block_data = $block['attrs']['data'];
        }

        if ($block_data !== array() && function_exists('acf_setup_meta')) {
                acf_setup_meta($block_data, $block_id, true);
        }

        if (function_exists('stive_service_debug_log')) {
                stive_service_debug_log('stive_render_service_header_block', array(
                        'block_id' => $block_id,
                        'blockName' => $block['blockName'] ?? '',
                        'data_keys' => array_keys($block_data),
                ));
        }

        $template = locate_template('acf-components/block-stive-service-header.php');
        if ($template) {
                include $template;
        }

        if ($block_data !== array() && function_exists('acf_reset_meta')) {
                acf_reset_meta($block_id);
        }

        unset($GLOBALS['stive_rendering_acf_block']);
}

/**
 * @param array<string, mixed> $block
 */
function stive_service_prepare_acf_block_context(array $block): void
{
        $GLOBALS['stive_rendering_acf_block'] = $block;

        $block_id = !empty($block['id']) ? (string) $block['id'] : '';
        if ($block_id === '') {
                return;
        }

        $block_data = array();
        if (!empty($block['data']) && is_array($block['data'])) {
                $block_data = $block['data'];
        } elseif (!empty($block['attrs']['data']) && is_array($block['attrs']['data'])) {
                $block_data = $block['attrs']['data'];
        }

        if ($block_data !== array() && function_exists('acf_setup_meta')) {
                acf_setup_meta($block_data, $block_id, true);
        }
}

function stive_service_reset_acf_block_context(array $block): void
{
        if (!empty($block['id']) && function_exists('acf_reset_meta')) {
                acf_reset_meta((string) $block['id']);
        }

        unset($GLOBALS['stive_rendering_acf_block']);
}
