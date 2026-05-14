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

$page_id = $post->ID;

$breadcrumbs_path = TEMPLATE_PATH . '_breadcrumbs.php';
if (file_exists($breadcrumbs_path)) {
    require_once $breadcrumbs_path;
}

$service_page_part = TEMPLATE_PATH . '_stive-service-page.php';
if (file_exists($service_page_part)) {
    require $service_page_part;
}

get_footer();
