<?php

function create_module_for_blog_after_main_content() {
    $labels = array(
            'name'              => _x('Module for blog after content'),
            'singular_name'     => _x('Module for blog after content'),
            'search_items'      =>  __('Find module for blog after content'),
            'all_items'         => __('All module for blog after content'),
            'parent_item'       => __('Parent module for blog after content'),
            'parent_item_colon' => __('Parent module for blog after content:'),
            'edit_item'         => __('Edit module for blog after content'),
            'update_item'       => __('Update module for blog after content'),
            'add_new_item'      => __('Add new module for blog after content'),
            'new_item_name'     => __('New name for blog after content'),
            'menu_name'         => __('Block for blog after content'),
    );

    $args = array(
        'labels' => $labels,
        'public' => false, // Не показывать в интерфейсе
        'publicly_queryable' => false, // Не доступен через URL
        'show_ui' => true, // Показывать ли в админке
        'show_in_menu' => true, // Показывать ли в меню админки
        'query_var' => false,
        'rewrite' => false, // Отключить ли ЧПУ
        'capability_type' => 'post',
        'has_archive' => false, // Есть ли архив
        'hierarchical' => true, // Иерархическая структура как у категорий
        'menu_position' => 20,
        'menu_icon' => 'dashicons-category',
        'supports' => array('title', 'editor', 'page-attributes'),
        'show_in_rest' => true, // Виден ли в REST API
        'exclude_from_search' => true, // Исключить из поиска
    );

    register_post_type('module_for_blog_after_content', $args);
}
add_action('init', 'create_module_for_blog_after_main_content');