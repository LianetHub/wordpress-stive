<?php

function case_taxonomy()
{
    // Регистрация типа записи "case"
    register_post_type(
        'case',
        array(
            'label'               => __('case'),
            'labels'              => array(
                'name'                => _x('Case', 'Post Type General Name'),
                'singular_name'       => _x('Case', 'Post Type Singular Name'),
                'menu_name'           => __('Case'),
            ),
            'supports'            => array('title', 'author', 'thumbnail', 'revisions', 'editor', 'tags'), // Добавляем поддержку тегов
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post_case',
            'map_meta_cap'      => true,
            'show_in_rest' => true,
        )
    );

    // Регистрация таксономии "case-list"
    register_taxonomy(
        'case-list',
        array('case'),
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x('Категории кейсов', 'taxonomy general name'),
                'singular_name' => _x('Категория', 'taxonomy singular name'),
                'menu_name' => __('Категории'),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
			'capabilities' => array(
			'manage_terms'	=>	'manage_case-list',
			'edit_terms'	=>	'edit_case-list',
			'delete_terms'	=>	'delete_case-list',
			'assign_terms'	=>	'assign_case-list',
		),
            'rewrite' => true
        )
    );

    // Регистрация таксономии "case-tags" для тегов
    register_taxonomy(
        'case-tags',
        'case',
        array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x('Теги кейсов', 'taxonomy general name'),
                'singular_name' => _x('Тег кейса', 'taxonomy singular name'),
                'menu_name' => __('Теги'),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
			'capabilities' => array(
			'manage_terms'	=>	'manage_case-tags',
			'edit_terms'	=>	'edit_case-tags',
			'delete_terms'	=>	'delete_case-tags',
			'assign_terms'	=>	'assign_case-tags',
		),
            'rewrite' => true
        )
    );
}

add_action('init', 'case_taxonomy', 0);