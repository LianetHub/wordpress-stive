<?php

/**
 * Service categories (same pattern as case-list for cases).
 */
function stive_register_service_taxonomy()
{
        register_taxonomy(
                'service-list',
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
}

add_action('init', 'stive_register_service_taxonomy', 0);
