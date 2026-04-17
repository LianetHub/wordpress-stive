<?php

function create_module_for_blog_after_main_content()
{
    register_post_type(
        'module_for_blog',
        array(
            'label' => __('Module for blog after content'),
            'labels' => array(
                'name' => _x('Module for blog after content', 'Post Type General Name'),
                'singular_name' => _x('Module for blog after content', 'Post Type Singular Name'),
                'menu_name' => __('Block for blog after content'),
                'search_items' => __('Find module for blog after content'),
                'all_items' => __('All module for blog after content'),
                'parent_item' => __('Parent module for blog after content'),
                'parent_item_colon' => __('Parent module for blog after content:'),
                'add_new_item' => __('Add new module for blog after content'),
                'new_item_name' => __('New name for blog after content'),
            ),
            'supports' => array('title', 'editor', 'page-attributes'),
            'hierarchical' => true,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => false,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability_type' => 'post',
            'query_var' => false,
            'rewrite' => false,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-category',
            'show_in_rest' => true,
        )
    );
}

add_action('init', 'create_module_for_blog_after_main_content');