<?php

function r4_register_acf_blocks()
{
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    $shared_post_types = function_exists('stive_shared_acf_block_post_types')
        ? stive_shared_acf_block_post_types()
        : array('page', 'service', 'case');

    acf_register_block_type(array(
        'name' => 'case-header',
        'title' => __('Block Case Header'),
        'description' => __('A custom block.'),
        'render_template' => 'acf-components/block-stive-case-header.php',
        'mode' => 'edit',
        'category' => 'stive-case',
        'post_types' => array('case'),
    ));

    acf_register_block_type(array(
        'name' => 'service-header',
        'title' => __('Block Service Header'),
        'description' => __('Service page hero heading.'),
        'render_callback' => 'stive_render_service_header_block',
        'mode' => 'edit',
        'category' => 'stive-service',
        'post_types' => array('service'),
    ));

    $service_blocks = array(
        'service-intro' => array('Block Service Intro', 'acf-components/block-stive-service-intro.php'),
        'service-included' => array('Block Service Included', 'acf-components/block-stive-service-included.php'),
        'service-challenges' => array('Block Service Challenges', 'acf-components/block-stive-service-challenges.php'),
        'service-faq' => array('Block Service FAQ', 'acf-components/block-stive-service-faq.php'),
        'service-contact' => array('Block Service Contact', 'acf-components/block-stive-service-contact.php'),
    );

    foreach ($service_blocks as $name => $config) {
        stive_register_acf_block(
            $name,
            $config[0],
            $config[1],
            array(
                'category' => 'stive-service',
                'post_types' => array('service'),
            )
        );
    }

    $case_blocks = array(
        'case-features' => array('Block Case Features', 'acf-components/block-stive-case-features.php'),
        'case-case-details' => array('Block Case Case Details', 'acf-components/block-stive-case-case-details.php'),
        'case-goals' => array('Block Case Goals', 'acf-components/block-stive-case-goals.php'),
        'case-article' => array('Block Case Article', 'acf-components/block-stive-case-article.php'),
        'case-results' => array('Block Case Results', 'acf-components/block-stive-case-results.php'),
        'case-conclusion' => array('Block Case Conclusion', 'acf-components/block-stive-case-conclusion.php'),
        'case-slider' => array('Block Case Slider', 'acf-components/block-stive-case-slider.php'),
    );

    foreach ($case_blocks as $name => $config) {
        stive_register_acf_block(
            $name,
            $config[0],
            $config[1],
            array(
                'category' => 'stive-case',
                'post_types' => array('case'),
            )
        );
    }

    $home_blocks = array(
        'front-hero' => array('Block Front Hero', 'acf-components/block-stive-front-hero.php'),
        'front-solutions' => array('Block Front Solutions', 'acf-components/block-stive-front-solutions.php'),
        'front-slider' => array('Block Front Slider', 'acf-components/block-stive-front-slider.php'),
        'front-why' => array('Block Front Why', 'acf-components/block-stive-front-why.php'),
        'front-industries' => array('Block Front Industries', 'acf-components/block-stive-front-industries.php'),
        'front-events-articles' => array('Block Front Events Articles', 'acf-components/block-stive-front-events-articles.php'),
        'front-book' => array('Block Front Book', 'acf-components/block-stive-front-book.php'),
    );

    foreach ($home_blocks as $name => $config) {
        stive_register_acf_block(
            $name,
            $config[0],
            $config[1],
            array(
                'category' => 'stive-home',
                'post_types' => array('page'),
            )
        );
    }

    $shared_blocks = array(
        'front-services-steps' => array('Block Front Services Steps', 'acf-components/block-stive-front-services-steps.php'),
        'front-ready-to-scale' => array('Block Front Ready To Scale', 'acf-components/block-stive-front-ready-to-scale.php'),
        'front-testimonials' => array('Block Other Testimonials', 'acf-components/block-stive-other-testimonials.php'),
    );

    foreach ($shared_blocks as $name => $config) {
        stive_register_acf_block(
            $name,
            $config[0],
            $config[1],
            array(
                'category' => 'stive-shared',
                'post_types' => $shared_post_types,
            )
        );
    }

    stive_register_acf_block(
        'blog-latest-article-slider',
        'Block Blog Latest Article Slider',
        'acf-components/block-stive-blog-latest-article-slider.php',
        array(
            'category' => 'stive-blog',
            'post_types' => array('page'),
        )
    );
}

add_action('acf/init', 'r4_register_acf_blocks');

function r4_stive_add_custom_categories($categories, $post)
{
    return array_merge(
        array(
            array(
                'slug' => 'stive-case',
                'title' => esc_html__('Stive Case'),
            ),
            array(
                'slug' => 'stive-service',
                'title' => esc_html__('Stive Services'),
            ),
            array(
                'slug' => 'stive-home',
                'title' => esc_html__('Stive Front'),
            ),
            array(
                'slug' => 'stive-shared',
                'title' => esc_html__('Stive Shared'),
            ),
            array(
                'slug' => 'stive-other',
                'title' => esc_html__('Stive Other'),
            ),
            array(
                'slug' => 'stive-blog',
                'title' => esc_html__('Stive Blog'),
            ),
        ),
        $categories
    );
}

add_filter('block_categories_all', 'r4_stive_add_custom_categories', 10, 2);
