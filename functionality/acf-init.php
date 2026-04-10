<?php
function r4_register_acf_blocks() {
 
    // Проверяем, что функция доступна.
    if( function_exists( 'acf_register_block_type' ) ) {
 
        // Регистрируем блок 
        acf_register_block_type(array(
            'name'              => 'Case Header',
            'title'             => __('Block Case Header'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-header.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Features',
            'title'             => __('Block Case Features'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-features.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Case Details',
            'title'             => __('Block Case Case Details'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-case-details.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Goals',
            'title'             => __('Block Case Goals'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-goals.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Article',
            'title'             => __('Block Case Article'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-article.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Results',
            'title'             => __('Block Case Results'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-results.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Conclusion',
            'title'             => __('Block Case Conclusion'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-conclusion.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Case Slider',
            'title'             => __('Block Case Slider'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-case-slider.php',
			'mode'              => 'edit',
            'category'          => 'stive-case',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Hero',
            'title'             => __('Block Front Hero'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-hero.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Solutions',
            'title'             => __('Block Front Solutions'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-solutions.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Slider',
            'title'             => __('Block Front Slider'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-slider.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Why',
            'title'             => __('Block Front Why'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-why.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Industries',
            'title'             => __('Block Front Industries'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-industries.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Events Articles',
            'title'             => __('Block Front Events Articles'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-events-articles.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Services Steps',
            'title'             => __('Block Front Services Steps'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-services-steps.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Ready To Scale',
            'title'             => __('Block Front Ready To Scale'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-ready-to-scale.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Book',
            'title'             => __('Block Front Book'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-front-book.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
		acf_register_block_type(array(
            'name'              => 'Front Testimonials',
            'title'             => __('Block Front Testimonials'),
            'description'       => __('A custom block.'),
            'render_template'   => 'acf-components/block-stive-other-testimonials.php',
			'mode'              => 'edit',
            'category'          => 'stive-home',
        ));
		
    }
}
add_action( 'acf/init', 'r4_register_acf_blocks' );

function  r4_stive_add_custom_categories($categories, $post)
{
    return array_merge(
        array(
            array(
                'slug'  => 'stive-case',
                'title' => esc_html__('Stive Case'),
            ),
            array(
                'slug'  => 'stive-home',
                'title' => esc_html__('Stive Front'),
            ),
			array(
                'slug'  => 'stive-other',
                'title' => esc_html__('Stive Other'),
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'r4_stive_add_custom_categories', 10, 2);