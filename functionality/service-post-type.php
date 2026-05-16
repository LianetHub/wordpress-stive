<?php

if (!defined('STIVE_SERVICE_POST_TYPE')) {
        define('STIVE_SERVICE_POST_TYPE', 'service');
}

function stive_register_service_post_type()
{
        register_post_type(
                STIVE_SERVICE_POST_TYPE,
                array(
                        'label' => __('Service', 'stive'),
                        'labels' => array(
                                'name' => _x('Services', 'Post Type General Name', 'stive'),
                                'singular_name' => _x('Service', 'Post Type Singular Name', 'stive'),
                                'menu_name' => __('Services', 'stive'),
                                'name_admin_bar' => __('Service', 'stive'),
                                'add_new' => __('Add New', 'stive'),
                                'add_new_item' => __('Add New Service', 'stive'),
                                'new_item' => __('New Service', 'stive'),
                                'edit_item' => __('Edit Service', 'stive'),
                                'view_item' => __('View Service', 'stive'),
                                'view_items' => __('View Services', 'stive'),
                                'all_items' => __('All Services', 'stive'),
                                'search_items' => __('Search Services', 'stive'),
                                'not_found' => __('No services found.', 'stive'),
                                'not_found_in_trash' => __('No services found in Trash.', 'stive'),
                                'parent_item_colon' => __('Parent Service:', 'stive'),
                                'archives' => __('Service Archives', 'stive'),
                                'attributes' => __('Service Attributes', 'stive'),
                                'featured_image' => __('Service Cover Image', 'stive'),
                                'set_featured_image' => __('Set cover image', 'stive'),
                                'remove_featured_image' => __('Remove cover image', 'stive'),
                                'use_featured_image' => __('Use as cover image', 'stive'),
                        ),
                        'description' => __('Service pages', 'stive'),
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'show_in_nav_menus' => true,
                        'show_in_admin_bar' => true,
                        'menu_position' => 22,
                        'menu_icon' => 'dashicons-businessperson',
                        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'author'),
                        'hierarchical' => false,
                        'has_archive' => true,
                        'can_export' => true,
                        'exclude_from_search' => false,
                        'publicly_queryable' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'show_in_rest' => true,
                        'rewrite' => array(
                                'slug' => 'services',
                                'with_front' => false,
                        ),
                )
        );
}

add_action('init', 'stive_register_service_post_type', 0);

/**
 * @param string $template
 * @return string
 */
function stive_service_single_template($template)
{
        if (!is_singular(STIVE_SERVICE_POST_TYPE)) {
                return $template;
        }
        $path = locate_template(array('service-main-acf.php'));
        return $path ? $path : $template;
}

add_filter('template_include', 'stive_service_single_template', 99);
