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
            'category'          => 'Stive Case',
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
                'slug'  => 'stive-other',
                'title' => esc_html__('Stive Other'),
            ),
        ),
        $categories
    );
}
add_filter('block_categories_all', 'r4_stive_add_custom_categories', 10, 2);