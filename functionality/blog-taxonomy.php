<?php

function blog_taxonomy()
{
    // Регистрация типа записи "blog"
    register_post_type(
        'blog',
        array(
            'label'               => __('Blog'),
            'labels'              => array(
                'name'                => _x('Blog', 'Post Type General Name'),
                'singular_name'       => _x('Blog', 'Post Type Singular Name'),
                'menu_name'           => __('Blogs'),
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
            'capability_type'     => 'post_blog',
            'map_meta_cap'      => true,
            'show_in_rest' => true,
        )
    );

    // Регистрация таксономии "blog-list"
    register_taxonomy(
        'blog-list',
        array('blog'),
        array(
            'hierarchical' => true,
            'labels' => array(
                'name' => _x('Категории блогов', 'taxonomy general name'),
                'singular_name' => _x('Категория', 'taxonomy singular name'),
                'menu_name' => __('Категории'),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
			'capabilities' => array(
			'manage_terms'	=>	'manage_blog-list',
			'edit_terms'	=>	'edit_blog-list',
			'delete_terms'	=>	'delete_blog-list',
			'assign_terms'	=>	'assign_blog-list',
		),
            'rewrite' => true
        )
    );

    // Регистрация таксономии "blog-tags" для тегов
    register_taxonomy(
        'blog-tags',
        'blog',
        array(
            'hierarchical' => false,
            'labels' => array(
                'name' => _x('Теги блогов', 'taxonomy general name'),
                'singular_name' => _x('Тег блога', 'taxonomy singular name'),
                'menu_name' => __('Теги'),
            ),
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
			'capabilities' => array(
			'manage_terms'	=>	'manage_blog-tags',
			'edit_terms'	=>	'edit_blog-tags',
			'delete_terms'	=>	'delete_blog-tags',
			'assign_terms'	=>	'assign_blog-tags',
		),
            'rewrite' => true
        )
    );
}

add_action('init', 'blog_taxonomy', 0);