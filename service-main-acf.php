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
if (is_readable($breadcrumbs_path)) {
    require_once $breadcrumbs_path;
}

if ($post instanceof WP_Post && function_exists('stive_service_render_single_content')) {
    stive_service_render_single_content($post);
}

get_footer();
