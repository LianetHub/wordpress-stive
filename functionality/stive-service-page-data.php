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
 * @param array<string, mixed>|null $link
 * @return array{url:string,title:string,target:string}
 */
function stive_service_page_acf_link(?array $link): array
{
    if (empty($link) || !is_array($link)) {
        return array('url' => '', 'title' => '', 'target' => '_self');
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
