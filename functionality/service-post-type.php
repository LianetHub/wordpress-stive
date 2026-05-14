<?php

if (!defined('STIVE_SERVICE_POST_TYPE')) {
        define('STIVE_SERVICE_POST_TYPE', 'service');
}

function stive_register_service_post_type()
{
        register_post_type(
                STIVE_SERVICE_POST_TYPE,
                array(
                        'label' => __('Услуга', 'stive'),
                        'labels' => array(
                                'name' => _x('Услуги', 'Post Type General Name', 'stive'),
                                'singular_name' => _x('Услуга', 'Post Type Singular Name', 'stive'),
                                'menu_name' => __('Услуги', 'stive'),
                                'name_admin_bar' => __('Услуга', 'stive'),
                                'add_new' => __('Добавить', 'stive'),
                                'add_new_item' => __('Добавить услугу', 'stive'),
                                'new_item' => __('Новая услуга', 'stive'),
                                'edit_item' => __('Редактировать услугу', 'stive'),
                                'view_item' => __('Просмотр услуги', 'stive'),
                                'view_items' => __('Просмотр услуг', 'stive'),
                                'all_items' => __('Все услуги', 'stive'),
                                'search_items' => __('Искать услуги', 'stive'),
                                'not_found' => __('Услуги не найдены', 'stive'),
                                'not_found_in_trash' => __('В корзине услуг нет', 'stive'),
                                'parent_item_colon' => __('Родительская услуга:', 'stive'),
                                'archives' => __('Архив услуг', 'stive'),
                                'attributes' => __('Атрибуты услуги', 'stive'),
                                'featured_image' => __('Обложка услуги', 'stive'),
                                'set_featured_image' => __('Задать обложку', 'stive'),
                                'remove_featured_image' => __('Удалить обложку', 'stive'),
                                'use_featured_image' => __('Использовать как обложку', 'stive'),
                        ),
                        'description' => __('Страницы услуг', 'stive'),
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
