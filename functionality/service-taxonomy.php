<?php

if (!defined('STIVE_SERVICE_CATEGORY_TAXONOMY')) {
        define('STIVE_SERVICE_CATEGORY_TAXONOMY', 'service-list');
}

if (!defined('STIVE_SERVICE_TAG_TAXONOMY')) {
        define('STIVE_SERVICE_TAG_TAXONOMY', 'service-tags');
}

/**
 * Service categories (service-list) and tags (service-tags), same split as case-list / case-tags.
 */
function stive_register_service_taxonomy(): void
{
        register_taxonomy(
                STIVE_SERVICE_CATEGORY_TAXONOMY,
                array(STIVE_SERVICE_POST_TYPE),
                array(
                        'hierarchical' => true,
                        'labels' => array(
                                'name' => _x('Service Categories', 'taxonomy general name', 'stive'),
                                'singular_name' => _x('Service Category', 'taxonomy singular name', 'stive'),
                                'menu_name' => __('Categories', 'stive'),
                        ),
                        'show_ui' => true,
                        'show_in_rest' => true,
                        'show_admin_column' => true,
                        'query_var' => true,
                        'rewrite' => array(
                                'slug' => 'service-category',
                                'with_front' => false,
                        ),
                )
        );

        register_taxonomy(
                STIVE_SERVICE_TAG_TAXONOMY,
                array(STIVE_SERVICE_POST_TYPE),
                array(
                        'hierarchical' => false,
                        'labels' => array(
                                'name' => _x('Service Tags', 'taxonomy general name', 'stive'),
                                'singular_name' => _x('Service Tag', 'taxonomy singular name', 'stive'),
                                'menu_name' => __('Tags', 'stive'),
                        ),
                        'show_ui' => true,
                        'show_in_rest' => true,
                        'show_admin_column' => true,
                        'query_var' => true,
                        'rewrite' => array(
                                'slug' => 'service-tag',
                                'with_front' => false,
                        ),
                )
        );
}

add_action('init', 'stive_register_service_taxonomy', 0);
