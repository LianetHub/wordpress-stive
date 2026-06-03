<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('STIVE_SERVICE_ARCHIVE_OPTIONS_ID')) {
    define('STIVE_SERVICE_ARCHIVE_OPTIONS_ID', 'stive-service-archive');
}

/**
 * Default copy for Services Archive options (single source for ACF defaults).
 *
 * @return array<string, mixed>
 */
function stive_service_archive_acf_defaults(): array
{
    return array(
        'service_archive_heading_title' => 'Our Solutions for<br>AI-First Marketing',
        'service_archive_heading_description' => 'When someone asks ChatGPT “what’s the best payment solution” or “which fintech should I trust,” your brand needs to be the answer. We build the AI presence, citations, and reputation signals that make that happen.',
        'service_archive_stats_aria_label' => 'AI Influencer Marketing stats',
        'service_archive_stats' => array(
            array('stat_value' => '180', 'stat_label' => 'videos/month'),
            array('stat_value' => '200M+', 'stat_label' => 'reach in 5 months'),
            array('stat_value' => '100%', 'stat_label' => 'owned by you'),
        ),
        'service_archive_founders_pretitle' => 'FULL AI INTEGRATION — 5 MODULES, 1 MONTH, REAL REVENUE OUTCOMES',
        'service_archive_founders_eyebrow' => 'FOR BUSINESS OWNERS',
        'service_archive_founders_title' => 'AI for Founders',
        'service_archive_founders_description' => 'We help founders grow revenue through AI. For the past year, Stive has been the #1 agency focused exclusively on AI-driven sales and marketing. 300+ projects. Real cases. Real numbers.',
        'service_archive_founders_modules' => array(
            array(
                'module_num' => '01',
                'module_title' => 'LLM Visibility (GEO)',
                'module_text' => 'Rank in ChatGPT, Gemini, Claude — where buyers research before they buy.',
            ),
            array(
                'module_num' => '02',
                'module_title' => 'AI Analytics for Founders',
                'module_text' => 'Revenue and pipeline delivered to your phone daily. No dashboards.',
            ),
            array(
                'module_num' => '03',
                'module_title' => 'AI Advertising',
                'module_text' => 'More customers from the same ad budget — AI-optimized Google & Meta.',
            ),
            array(
                'module_num' => '04',
                'module_title' => 'AI Competitive Intelligence',
                'module_text' => 'Weekly intel on every competitor move — ads, hiring, LLM presence.',
            ),
            array(
                'module_num' => '05',
                'module_title' => 'AI-Powered B2B Sales',
                'module_text' => 'AI agents find, research, and reach out to qualified buyers for you.',
            ),
        ),
        'service_archive_founders_btn_primary' => array(
            'title' => 'Book a Strategy Call',
            'url' => '',
            'target' => '',
        ),
        'service_archive_founders_btn_secondary' => array(
            'title' => 'See 5 Modules →',
            'url' => '#',
            'target' => '',
        ),
    );
}

/**
 * @param mixed $value
 * @return bool
 */
function stive_service_archive_acf_value_is_empty($value): bool
{
    if ($value === null || $value === false) {
        return true;
    }

    if (is_string($value)) {
        return trim($value) === '';
    }

    return is_array($value) && $value === array();
}

/**
 * Repeater has no rows or every subfield in every row is empty.
 *
 * @param mixed $value
 */
function stive_service_archive_repeater_is_effectively_empty($value): bool
{
    if (!is_array($value) || $value === array()) {
        return true;
    }

    foreach ($value as $row) {
        if (!is_array($row)) {
            continue;
        }

        foreach ($row as $cell) {
            if (is_string($cell) && trim($cell) !== '') {
                return false;
            }
            if (!is_string($cell) && !empty($cell)) {
                return false;
            }
        }
    }

    return true;
}

/**
 * @param int|string $post_id ACF options post id.
 */
function stive_service_archive_acf_options_post_id_matches($post_id): bool
{
    return in_array((string) $post_id, array(
        STIVE_SERVICE_ARCHIVE_OPTIONS_ID,
        'options',
        'option',
    ), true);
}

/**
 * Primary founders button default (Calendly from global options when URL empty).
 *
 * @return array{title:string,url:string,target:string}
 */
function stive_service_archive_founders_primary_button_default(): array
{
    $defaults = stive_service_archive_acf_defaults();
    $primary = $defaults['service_archive_founders_btn_primary'];

    if (!is_array($primary)) {
        return array('title' => '', 'url' => '', 'target' => '_self');
    }

    if (function_exists('get_field')) {
        $calendly = get_field('calendly_link', 'option');
        if (is_array($calendly) && !empty($calendly['url'])) {
            return array(
                'title' => !empty($calendly['title'])
                    ? (string) $calendly['title']
                    : (string) $primary['title'],
                'url' => (string) $calendly['url'],
                'target' => !empty($calendly['target']) ? (string) $calendly['target'] : '_self',
            );
        }
    }

    return array(
        'title' => (string) ($primary['title'] ?? ''),
        'url' => (string) ($primary['url'] ?? ''),
        'target' => '_self',
    );
}

/**
 * Writes default option values once repeaters/text fields are still empty (admin + front).
 */
function stive_service_archive_seed_options_defaults(): void
{
    if (!function_exists('get_field') || !function_exists('update_field')) {
        return;
    }

    $options_id = STIVE_SERVICE_ARCHIVE_OPTIONS_ID;
    $defaults = stive_service_archive_acf_defaults();

    foreach ($defaults as $field_name => $default_value) {
        $current = get_field($field_name, $options_id);

        if (in_array($field_name, array('service_archive_stats', 'service_archive_founders_modules'), true)) {
            if (!stive_service_archive_repeater_is_effectively_empty($current)) {
                continue;
            }
        } elseif (!stive_service_archive_acf_value_is_empty($current)) {
            continue;
        }

        if ($field_name === 'service_archive_founders_btn_primary') {
            $default_value = stive_service_archive_founders_primary_button_default();
        }

        update_field($field_name, $default_value, $options_id);
    }
}

/**
 * Options sub-page under Services for archive copy and metrics.
 */
function stive_register_service_archive_options_page(): void
{
    if (!function_exists('acf_add_options_sub_page')) {
        return;
    }

    acf_add_options_sub_page(
        array(
            'page_title' => __('Services Archive', 'stive'),
            'menu_title' => __('Archive settings', 'stive'),
            'menu_slug' => 'stive-service-archive',
            'parent_slug' => 'edit.php?post_type=' . STIVE_SERVICE_POST_TYPE,
            'post_id' => STIVE_SERVICE_ARCHIVE_OPTIONS_ID,
            'capability' => 'edit_posts',
            'redirect' => false,
            'autoload' => true,
        )
    );
}

add_action('acf/init', 'stive_register_service_archive_options_page');

/**
 * Prefill repeaters in admin when Archive settings opens (ACF does not show repeater default_value in UI).
 *
 * @param array<string, mixed> $page
 */
function stive_service_archive_on_options_page_load(array $page): void
{
    if (($page['menu_slug'] ?? '') !== 'stive-service-archive') {
        return;
    }

    stive_service_archive_seed_options_defaults();
}

add_action('acf/options_page/load', 'stive_service_archive_on_options_page_load', 10, 1);

/**
 * Applies stored defaults when an archive option field is still empty.
 *
 * @param mixed  $value
 * @param string $post_id
 * @param array<string, mixed> $field
 * @return mixed
 */
function stive_service_archive_acf_load_default($value, $post_id, $field)
{
    if (!stive_service_archive_acf_options_post_id_matches($post_id)) {
        return $value;
    }

    $name = isset($field['name']) ? (string) $field['name'] : '';

    if (in_array($name, array('service_archive_stats', 'service_archive_founders_modules'), true)) {
        if (!stive_service_archive_repeater_is_effectively_empty($value)) {
            return $value;
        }
    } elseif (!stive_service_archive_acf_value_is_empty($value)) {
        return $value;
    }

    $defaults = stive_service_archive_acf_defaults();

    if ($name === '' || !array_key_exists($name, $defaults)) {
        return $value;
    }

    if ($name === 'service_archive_founders_btn_primary') {
        return stive_service_archive_founders_primary_button_default();
    }

    return $defaults[$name];
}

/**
 * @param array<string, mixed> $field
 */
function stive_service_archive_register_load_default_filter(array $field): void
{
    static $registered = array();

    if (empty($field['name'])) {
        return;
    }

    $name = (string) $field['name'];
    if (isset($registered[$name])) {
        return;
    }

    $registered[$name] = true;

    add_filter(
        'acf/load_value/name=' . $name,
        'stive_service_archive_acf_load_default',
        10,
        3
    );
}

/**
 * Local ACF field group for /services/ archive sections.
 */
function stive_register_service_archive_acf_fields(): void
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $defaults = stive_service_archive_acf_defaults();

    $fields = array(
        array(
            'key' => 'field_service_archive_heading_title',
            'label' => __('Heading title (HTML allowed)', 'stive'),
            'name' => 'service_archive_heading_title',
            'type' => 'textarea',
            'rows' => 2,
            'new_lines' => '',
            'default_value' => $defaults['service_archive_heading_title'],
        ),
        array(
            'key' => 'field_service_archive_heading_description',
            'label' => __('Heading description', 'stive'),
            'name' => 'service_archive_heading_description',
            'type' => 'textarea',
            'rows' => 4,
            'new_lines' => 'br',
            'default_value' => $defaults['service_archive_heading_description'],
        ),
        array(
            'key' => 'field_service_archive_stats_aria',
            'label' => __('Stats block aria-label', 'stive'),
            'name' => 'service_archive_stats_aria_label',
            'type' => 'text',
            'default_value' => $defaults['service_archive_stats_aria_label'],
        ),
        array(
            'key' => 'field_service_archive_stats',
            'label' => __('Tail-row metrics', 'stive'),
            'name' => 'service_archive_stats',
            'type' => 'repeater',
            'layout' => 'table',
            'max' => 6,
            'button_label' => __('Add metric', 'stive'),
            'sub_fields' => array(
                array(
                    'key' => 'field_service_archive_stat_value',
                    'label' => __('Value', 'stive'),
                    'name' => 'stat_value',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_archive_stat_label',
                    'label' => __('Label', 'stive'),
                    'name' => 'stat_label',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'field_service_archive_founders_pretitle',
            'label' => __('Founders pretitle', 'stive'),
            'name' => 'service_archive_founders_pretitle',
            'type' => 'text',
            'default_value' => $defaults['service_archive_founders_pretitle'],
        ),
        array(
            'key' => 'field_service_archive_founders_eyebrow',
            'label' => __('Founders eyebrow', 'stive'),
            'name' => 'service_archive_founders_eyebrow',
            'type' => 'text',
            'default_value' => $defaults['service_archive_founders_eyebrow'],
        ),
        array(
            'key' => 'field_service_archive_founders_title',
            'label' => __('Founders title', 'stive'),
            'name' => 'service_archive_founders_title',
            'type' => 'text',
            'default_value' => $defaults['service_archive_founders_title'],
        ),
        array(
            'key' => 'field_service_archive_founders_description',
            'label' => __('Founders description', 'stive'),
            'name' => 'service_archive_founders_description',
            'type' => 'textarea',
            'rows' => 4,
            'new_lines' => 'br',
            'default_value' => $defaults['service_archive_founders_description'],
        ),
        array(
            'key' => 'field_service_archive_founders_modules',
            'label' => __('Founders modules', 'stive'),
            'name' => 'service_archive_founders_modules',
            'type' => 'repeater',
            'layout' => 'table',
            'max' => 10,
            'button_label' => __('Add module', 'stive'),
            'sub_fields' => array(
                array(
                    'key' => 'field_service_archive_founders_module_num',
                    'label' => __('Number', 'stive'),
                    'name' => 'module_num',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_archive_founders_module_title',
                    'label' => __('Title', 'stive'),
                    'name' => 'module_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_archive_founders_module_text',
                    'label' => __('Text', 'stive'),
                    'name' => 'module_text',
                    'type' => 'textarea',
                    'rows' => 2,
                ),
            ),
        ),
        array(
            'key' => 'field_service_archive_founders_btn_primary',
            'label' => __('Founders primary button', 'stive'),
            'name' => 'service_archive_founders_btn_primary',
            'type' => 'link',
            'return_format' => 'array',
            'instructions' => __('Leave URL empty to use global Calendly link from site options.', 'stive'),
        ),
        array(
            'key' => 'field_service_archive_founders_btn_secondary',
            'label' => __('Founders secondary button', 'stive'),
            'name' => 'service_archive_founders_btn_secondary',
            'type' => 'link',
            'return_format' => 'array',
        ),
    );

    foreach ($fields as $field) {
        stive_service_archive_register_load_default_filter($field);
    }

    acf_add_local_field_group(
        array(
            'key' => 'group_stive_service_archive',
            'title' => __('Services Archive', 'stive'),
            'fields' => $fields,
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'stive-service-archive',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
        )
    );
}

add_action('acf/init', 'stive_register_service_archive_acf_fields');
