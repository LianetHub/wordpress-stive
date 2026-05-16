<?php

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
 * @param mixed $case_ref post_object value (post ID, WP_Post, or legacy row key).
 */
function stive_service_resolve_case_post_id($case_ref): int
{
    if ($case_ref instanceof WP_Post) {
        $case_id = (int) $case_ref->ID;
    } elseif (is_numeric($case_ref)) {
        $case_id = (int) $case_ref;
    } else {
        return 0;
    }

    if ($case_id <= 0 || get_post_type($case_id) !== 'case') {
        return 0;
    }

    return $case_id;
}

/**
 * Case post IDs from Block Service Intro repeater (service_intro_cases → case_id).
 *
 * @return list<int>
 */
function stive_service_intro_get_case_ids(): array
{
    $data = stive_service_get_block_field_data();
    $rows = stive_service_parse_block_repeater($data, 'service_intro_cases', array('case_id'));

    if ($rows === array()) {
        $rows = stive_service_parse_block_repeater($data, 'service_intro_cases', array('case'));
    }

    if ($rows === array() && function_exists('get_field')) {
        $from_acf = get_field('service_intro_cases');
        if (is_array($from_acf) && $from_acf !== array()) {
            $rows = array_values($from_acf);
        }
    }

    $ids = array();
    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }

        $case_ref = $row['case_id'] ?? $row['case'] ?? null;
        $case_id = stive_service_resolve_case_post_id($case_ref);
        if ($case_id > 0) {
            $ids[] = $case_id;
        }
    }

    return array_values(array_unique($ids));
}

/**
 * @return list<array<string, mixed>>
 */
function stive_service_header_get_metrics(): array
{
    $data = stive_service_get_block_field_data();
    $metrics = stive_service_parse_block_repeater($data, 'service_metrics', array('metric_label', 'metric_value'));

    return $metrics !== array() ? $metrics : array();
}

/**
 * @return list<array<string, mixed>>
 */
function stive_service_header_get_trust_logos(): array
{
    $data = stive_service_get_block_field_data();
    $trust = stive_service_parse_block_repeater($data, 'service_trust_logos', array('logo'));

    return $trust !== array() ? $trust : array();
}

/**
 * @param list<array<string, mixed>> $blocks
 * @return array<string, mixed>|null
 */
function stive_service_find_header_block_in_blocks(array $blocks): ?array
{
    foreach ($blocks as $block) {
        if (!is_array($block)) {
            continue;
        }

        $name = isset($block['blockName']) ? (string) $block['blockName'] : '';
        if ($name === 'acf/service-header') {
            return $block;
        }

        if (!empty($block['innerBlocks']) && is_array($block['innerBlocks'])) {
            $found = stive_service_find_header_block_in_blocks($block['innerBlocks']);
            if ($found !== null) {
                return $found;
            }
        }
    }

    return null;
}

/**
 * @return array<string, mixed>|null
 */
function stive_service_find_header_block_for_post(int $post_id): ?array
{
    if ($post_id <= 0) {
        return null;
    }

    $post = get_post($post_id);
    if (!$post || $post->post_content === '') {
        return null;
    }

    $blocks = parse_blocks($post->post_content);
    if (!is_array($blocks)) {
        return null;
    }

    return stive_service_find_header_block_in_blocks($blocks);
}

/**
 * @template T
 * @param callable(): T $callback
 * @return T
 */
function stive_service_with_header_block_context(int $post_id, callable $callback)
{
    $block = stive_service_find_header_block_for_post($post_id);
    if ($block === null) {
        return $callback();
    }

    $GLOBALS['stive_rendering_acf_block'] = $block;

    $block_id = !empty($block['id']) ? (string) $block['id'] : 'block_' . $post_id;
    $block_data = array();
    if (!empty($block['data']) && is_array($block['data'])) {
        $block_data = $block['data'];
    } elseif (!empty($block['attrs']['data']) && is_array($block['attrs']['data'])) {
        $block_data = $block['attrs']['data'];
    }

    if ($block_data !== array() && function_exists('acf_setup_meta')) {
        acf_setup_meta($block_data, $block_id, true);
    }

    try {
        return $callback();
    } finally {
        if ($block_data !== array() && function_exists('acf_reset_meta')) {
            acf_reset_meta($block_id);
        }

        unset($GLOBALS['stive_rendering_acf_block']);
    }
}

/**
 * Title, description, and image for service archive cards (main-case / grid).
 *
 * @return array{title:string,description:string,image:array{url:string,alt:string}}
 */
function stive_service_archive_card_get_context(int $post_id): array
{
    $empty_image = array('url' => '', 'alt' => '');

    return stive_service_with_header_block_context($post_id, function () use ($post_id, $empty_image) {
        if (!function_exists('stive_service_header_get_context')) {
            return array(
                'title' => (string) get_the_title($post_id),
                'description' => (string) get_the_excerpt($post_id),
                'image' => array(
                    'url' => get_the_post_thumbnail_url($post_id, 'full') ?: '',
                    'alt' => '',
                ),
            );
        }

        $header = stive_service_header_get_context($post_id);

        $image = isset($header['service_image']) && is_array($header['service_image'])
            ? $header['service_image']
            : $empty_image;

        if ($image['url'] === '') {
            $thumb_url = get_the_post_thumbnail_url($post_id, 'full');
            $thumb_id = (int) get_post_thumbnail_id($post_id);
            $image = array(
                'url' => $thumb_url ? (string) $thumb_url : '',
                'alt' => $thumb_id > 0
                    ? (string) get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
                    : '',
            );
        }

        $description = (string) ($header['service_description'] ?? '');
        if ($description === '') {
            $description = (string) get_the_excerpt($post_id);
        }

        return array(
            'title' => (string) ($header['service_title'] ?? get_the_title($post_id)),
            'description' => $description,
            'image' => $image,
        );
    });
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
    $empty_link = array('url' => '', 'title' => '', 'target' => '_self');

    $title = stive_service_acf_value('service_title', null);
    $title = ($title === null || $title === '') ? get_the_title($post_id) : (string) $title;

    $description = stive_service_acf_value('service_description', null);
    $description = ($description === null || $description === '') ? '' : (string) $description;

    $btn_primary_raw = stive_service_acf_value('service_btn_primary', null);
    $btn_primary = ($btn_primary_raw === null || $btn_primary_raw === '')
        ? $empty_link
        : stive_service_page_acf_link($btn_primary_raw);

    $btn_secondary_raw = stive_service_acf_value('service_btn_secondary', null);
    $btn_secondary = ($btn_secondary_raw === null || $btn_secondary_raw === '')
        ? $empty_link
        : stive_service_page_acf_link($btn_secondary_raw);

    $image_raw = stive_service_acf_value('service_image', null);
    $service_image = ($image_raw === null || $image_raw === '')
        ? array('url' => '', 'alt' => '')
        : stive_service_page_acf_image_attrs($image_raw);

    $metrics = stive_service_header_get_metrics();
    $trust = stive_service_header_get_trust_logos();

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
