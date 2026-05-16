<?php

require_once __DIR__ . '/stive-service-page-static.php';

/**
 * @param array<string, mixed>|int|false $image
 * @return array<string, string>
 */
function stive_service_page_acf_image_attrs($image): array
{
    if (empty($image)) {
        return array('url' => '', 'alt' => '');
    }
    if (is_numeric($image)) {
        $url = wp_get_attachment_image_url((int) $image, 'large');
        $alt = (string) get_post_meta((int) $image, '_wp_attachment_image_alt', true);
        return array(
            'url' => $url ? (string) $url : '',
            'alt' => $alt,
        );
    }
    if (is_array($image)) {
        $url = isset($image['url']) ? (string) $image['url'] : '';
        if ($url === '' && !empty($image['ID'])) {
            $u = wp_get_attachment_image_url((int) $image['ID'], 'large');
            $url = $u ? (string) $u : '';
        }
        $alt = isset($image['alt']) ? (string) $image['alt'] : '';
        return array('url' => $url, 'alt' => $alt);
    }
    return array('url' => '', 'alt' => '');
}

/**
 * Normalizes ACF link field values (array, URL string, or empty).
 *
 * @param array<string, mixed>|string|null $link
 * @return array{url:string,title:string,target:string}
 */
function stive_service_page_acf_link($link): array
{
    $empty = array('url' => '', 'title' => '', 'target' => '_self');

    if ($link === null || $link === false || $link === '') {
        return $empty;
    }

    if (is_string($link)) {
        $url = trim($link);
        return array(
            'url' => $url,
            'title' => '',
            'target' => '_self',
        );
    }

    if (!is_array($link)) {
        return $empty;
    }

    $url = isset($link['url']) ? (string) $link['url'] : '';
    $title = isset($link['title']) ? (string) $link['title'] : '';
    $target = !empty($link['target']) ? (string) $link['target'] : '_self';

    return array('url' => $url, 'title' => $title, 'target' => $target);
}

/**
 * @return array<string, mixed>
 */
function stive_service_page_default_context(): array
{
    $empty_link = array('url' => '', 'title' => '', 'target' => '_self');
    $empty_img = array('url' => '', 'alt' => '');
    return array(
        'tags' => array(),
        'heading' => '',
        'lead' => '',
        'cta_primary' => $empty_link,
        'cta_secondary' => $empty_link,
        'trust_logos' => array(),
        'hero_visual' => $empty_img,
        'hero_logo' => $empty_img,
        'hero_metrics' => array(),
        'llm_title' => '',
        'llm_body' => '',
        'cases' => array(),
        'included_title' => '',
        'included_items' => array(),
        'process_steps' => array(),
        'challenges_title' => '',
        'challenges' => array(),
        'testimonials_title' => '',
        'testimonials' => array(),
        'faq_title' => '',
        'faq_items' => array(),
        'contact_title' => '',
        'contact_text' => '',
        'contact_map' => $empty_img,
        'contact_cta_primary' => $empty_link,
        'contact_cta_secondary' => $empty_link,
        'contact_trust' => array(),
    );
}

/**
 * @return array<string, mixed>
 */
function stive_service_page_get_context(?int $post_id = null): array
{
    if (!function_exists('get_field')) {
        return stive_service_page_default_context();
    }
    $id = $post_id;
    if ($id === null || $id < 1) {
        $id = (int) get_the_ID();
    }
    if ($id < 1) {
        $id = (int) get_queried_object_id();
    }
    if ($id < 1) {
        return stive_service_page_default_context();
    }
    return array(
        'tags' => get_field('service_page_tags', $id) ?: array(),
        'heading' => get_field('service_page_heading', $id),
        'lead' => get_field('service_page_lead', $id),
        'cta_primary' => stive_service_page_acf_link(get_field('service_page_cta_primary', $id)),
        'cta_secondary' => stive_service_page_acf_link(get_field('service_page_cta_secondary', $id)),
        'trust_logos' => get_field('service_page_trust_logos', $id) ?: array(),
        'hero_visual' => stive_service_page_acf_image_attrs(get_field('service_page_hero_visual', $id)),
        'hero_logo' => stive_service_page_acf_image_attrs(get_field('service_page_hero_logo', $id)),
        'hero_metrics' => get_field('service_page_hero_metrics', $id) ?: array(),
        'llm_title' => get_field('service_page_llm_title', $id),
        'llm_body' => get_field('service_page_llm_body', $id),
        'cases' => get_field('service_page_cases', $id) ?: array(),
        'included_title' => get_field('service_page_included_title', $id),
        'included_items' => get_field('service_page_included_items', $id) ?: array(),
        'process_steps' => get_field('service_page_process_steps', $id) ?: array(),
        'challenges_title' => get_field('service_page_challenges_title', $id),
        'challenges' => get_field('service_page_challenges', $id) ?: array(),
        'testimonials_title' => get_field('service_page_testimonials_title', $id),
        'testimonials' => get_field('service_page_testimonials', $id) ?: array(),
        'faq_title' => get_field('service_page_faq_title', $id),
        'faq_items' => get_field('service_page_faq_items', $id) ?: array(),
        'contact_title' => get_field('service_page_contact_title', $id),
        'contact_text' => get_field('service_page_contact_text', $id),
        'contact_map' => stive_service_page_acf_image_attrs(get_field('service_page_contact_map', $id)),
        'contact_cta_primary' => stive_service_page_acf_link(get_field('service_page_contact_cta_primary', $id)),
        'contact_cta_secondary' => stive_service_page_acf_link(get_field('service_page_contact_cta_secondary', $id)),
        'contact_trust' => get_field('service_page_contact_trust', $id) ?: array(),
    );
}

/**
 * @return array<string, mixed>
 */
function stive_service_get_block_field_data(): array
{
    $block = !empty($GLOBALS['stive_rendering_acf_block']) && is_array($GLOBALS['stive_rendering_acf_block'])
        ? $GLOBALS['stive_rendering_acf_block']
        : null;

    if ($block === null) {
        return array();
    }

    if (!empty($block['data']) && is_array($block['data'])) {
        return $block['data'];
    }

    if (!empty($block['attrs']['data']) && is_array($block['attrs']['data'])) {
        return $block['attrs']['data'];
    }

    return array();
}

/**
 * ACF block repeaters are often stored flat: {repeater}_0_{subfield}.
 *
 * @param array<string, mixed> $data
 * @param list<string> $subfields
 * @return list<array<string, mixed>>
 */
function stive_service_parse_block_repeater(array $data, string $repeater_name, array $subfields): array
{
    if (isset($data[$repeater_name]) && is_array($data[$repeater_name])) {
        $rows = $data[$repeater_name];
        if ($rows !== array() && is_array(reset($rows))) {
            return array_values($rows);
        }
    }

    if (function_exists('get_field')) {
        $from_acf = get_field($repeater_name);
        if (is_array($from_acf) && $from_acf !== array() && is_array(reset($from_acf))) {
            return array_values($from_acf);
        }
    }

    $count = 0;
    if (isset($data[$repeater_name]) && is_numeric($data[$repeater_name])) {
        $count = (int) $data[$repeater_name];
    }

    $pattern = '#^' . preg_quote($repeater_name, '#') . '_(\d+)_#';
    $max_index = -1;
    foreach (array_keys($data) as $key) {
        if (preg_match($pattern, (string) $key, $matches)) {
            $max_index = max($max_index, (int) $matches[1]);
        }
    }
    if ($max_index >= 0) {
        $count = max($count, $max_index + 1);
    }

    $rows = array();
    for ($i = 0; $i < $count; $i++) {
        $row = array();
        foreach ($subfields as $subfield) {
            $flat_key = $repeater_name . '_' . $i . '_' . $subfield;
            if (array_key_exists($flat_key, $data)) {
                $row[$subfield] = $data[$flat_key];
            }
        }
        if ($row !== array()) {
            $rows[] = $row;
        }
    }

    return $rows;
}

/**
 * Reads an ACF value from the current block (Gutenberg attrs) or get_field().
 *
 * @param mixed $default
 * @return mixed
 */
function stive_service_acf_value(string $field_name, $default = null)
{
    $data = stive_service_get_block_field_data();

    if ($data !== array() && array_key_exists($field_name, $data)) {
        $raw = $data[$field_name];
        if (is_array($raw)) {
            return $raw;
        }
        if ($raw !== null && $raw !== false && $raw !== '') {
            return $raw;
        }
    }

    if (function_exists('get_field')) {
        $value = get_field($field_name);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }

    return $default;
}

/**
 * @param array<string, mixed> $page_context
 * @return list<array<string, mixed>>
 */
function stive_service_header_get_metrics(array $page_context): array
{
    $data = stive_service_get_block_field_data();
    $metrics = stive_service_parse_block_repeater($data, 'service_metrics', array('metric_label', 'metric_value'));

    if ($metrics !== array()) {
        return $metrics;
    }

    return is_array($page_context['hero_metrics'] ?? null) ? $page_context['hero_metrics'] : array();
}

/**
 * @param array<string, mixed> $page_context
 * @return list<array<string, mixed>>
 */
function stive_service_header_get_trust_logos(array $page_context): array
{
    $data = stive_service_get_block_field_data();
    $trust = stive_service_parse_block_repeater($data, 'service_trust_logos', array('logo'));

    if ($trust !== array()) {
        return $trust;
    }

    return is_array($page_context['trust_logos'] ?? null) ? $page_context['trust_logos'] : array();
}

/**
 * @return array{
 *     service_title:string,
 *     service_description:string,
 *     service_btn_primary:array{url:string,title:string,target:string},
 *     service_btn_secondary:array{url:string,title:string,target:string},
 *     service_image:array{url:string,alt:string},
 *     service_metrics:array<int, array<string, mixed>>,
 *     service_trust_logos:array<int, array<string, mixed>>
 * }
 */
function stive_service_header_get_context(?int $post_id = null): array
{
    $post_id = $post_id ?: (int) get_the_ID();
    $page = stive_service_page_get_context($post_id);

    $title = stive_service_acf_value('service_title', null);
    if ($title === null || $title === '') {
        $title = !empty($page['heading']) ? (string) $page['heading'] : get_the_title($post_id);
    } else {
        $title = (string) $title;
    }

    $description = stive_service_acf_value('service_description', null);
    if ($description === null || $description === '') {
        $description = !empty($page['lead']) ? (string) $page['lead'] : '';
    } else {
        $description = (string) $description;
    }

    $btn_primary_raw = stive_service_acf_value('service_btn_primary', null);
    if ($btn_primary_raw === null || $btn_primary_raw === '') {
        $btn_primary = $page['cta_primary'];
    } else {
        $btn_primary = stive_service_page_acf_link($btn_primary_raw);
    }

    $btn_secondary_raw = stive_service_acf_value('service_btn_secondary', null);
    if ($btn_secondary_raw === null || $btn_secondary_raw === '') {
        $btn_secondary = $page['cta_secondary'];
    } else {
        $btn_secondary = stive_service_page_acf_link($btn_secondary_raw);
    }

    $image_raw = stive_service_acf_value('service_image', null);
    if ($image_raw === null || $image_raw === '') {
        $service_image = $page['hero_visual'];
    } else {
        $service_image = stive_service_page_acf_image_attrs($image_raw);
    }

    $metrics = stive_service_header_get_metrics($page);
    $trust = stive_service_header_get_trust_logos($page);

    return array(
        'service_title' => $title,
        'service_description' => $description,
        'service_btn_primary' => $btn_primary,
        'service_btn_secondary' => $btn_secondary,
        'service_image' => $service_image,
        'service_metrics' => $metrics,
        'service_trust_logos' => $trust,
    );
}

/**
 * @param array<string, mixed> $block
 * @return array<string, mixed>
 */
function stive_service_block_field_data(array $block): array
{
    $GLOBALS['stive_rendering_acf_block'] = $block;
    $data = stive_service_get_block_field_data();
    unset($GLOBALS['stive_rendering_acf_block']);

    return $data;
}

/**
 * @param array<string, mixed> $block
 */
function stive_service_is_case_header_block_data(array $block): bool
{
    $data = stive_service_block_field_data($block);
    if ($data === array()) {
        return false;
    }

    $case_keys = array(
        'case_title',
        'case_description',
        'case_btn_secondary',
        'case_image',
        '_case_title',
        '_case_description',
        '_case_btn_secondary',
        '_case_image',
    );

    foreach ($case_keys as $key) {
        if (array_key_exists($key, $data)) {
            return true;
        }
    }

    return false;
}

/**
 * @param string $block_name
 */
function stive_service_acf_block_slug(string $block_name): string
{
    $slug = preg_replace('#^acf/#i', '', $block_name);
    $slug = is_string($slug) ? $slug : $block_name;
    $slug = strtolower(str_replace(array(' ', '_'), '-', $slug));

    return trim($slug, '-');
}

/**
 * @param array<string, mixed> $block
 */
function stive_service_is_case_only_acf_block(array $block): bool
{
    $name = isset($block['blockName']) ? (string) $block['blockName'] : '';
    if ($name === '' || stripos($name, 'acf/') !== 0) {
        return false;
    }

    if (stive_service_is_case_header_block_data($block)) {
        return true;
    }

    $slug = stive_service_acf_block_slug($name);

    if ($slug === 'case-header' || $slug === 'block-case-header') {
        return true;
    }

    if (preg_match('#^case-header(-[\w]+)?$#', $slug)) {
        return true;
    }

    // "Case Header" in acf_register_block_type (legacy name with space).
    if (strpos($slug, 'case') !== false && strpos($slug, 'header') !== false && strpos($slug, 'service') === false) {
        return true;
    }

    return false;
}

/**
 * @param string|null $pre_render
 * @param array<string, mixed> $parsed_block
 * @return string|null
 */
function stive_service_prevent_case_header_on_service($pre_render, $parsed_block)
{
    if ($pre_render !== null) {
        return $pre_render;
    }

    if (!is_singular(STIVE_SERVICE_POST_TYPE)) {
        return $pre_render;
    }

    if (stive_service_is_case_only_acf_block($parsed_block)) {
        if (function_exists('stive_service_debug_log')) {
            stive_service_debug_log('SKIP pre_render_block (case header)', array(
                'blockName' => $parsed_block['blockName'] ?? '',
            ));
        }
        return '';
    }

    return $pre_render;
}

/**
 * @param string $block_content
 * @param array<string, mixed> $block
 */
function stive_service_skip_case_header_render($block_content, $block): string
{
    if (!is_singular(STIVE_SERVICE_POST_TYPE)) {
        return $block_content;
    }

    if (stive_service_is_case_only_acf_block($block)) {
        if (function_exists('stive_service_debug_log')) {
            stive_service_debug_log('SKIP render_block (case header)', array(
                'blockName' => $block['blockName'] ?? '',
                'would_have_length' => strlen($block_content),
            ));
        }
        return '';
    }

    return $block_content;
}

add_filter('pre_render_block', 'stive_service_prevent_case_header_on_service', 10, 2);
add_filter('render_block', 'stive_service_skip_case_header_render', 10, 2);
