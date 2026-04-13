<?php
function get_all_registered_sidebars() {
    global $wp_registered_sidebars;
    
    $sidebars = array();
    
    if(!empty($wp_registered_sidebars)) {
        foreach($wp_registered_sidebars as $sidebar) {
            $sidebars[$sidebar['id']] = $sidebar['name'];
        }
    }
    
    return $sidebars;
}

// Создаем поле ACF динамически через PHP
add_action('acf/init', 'register_dynamic_sidebar_select_field');
function register_dynamic_sidebar_select_field() {
    if(function_exists('acf_add_local_field_group')) {
        
        // Получаем все сайдбары динамически
        $sidebar_choices = get_all_registered_sidebars();
        
        acf_add_local_field_group(array(
            'key' => 'dynamic_sidebar_select',
            'title' => 'Настройки сайдбара',
            'fields' => array(
                array(
                    'key' => 'field_dynamic_sidebar',
                    'label' => 'Выберите сайдбар для этой страницы',
                    'name' => 'custom_sidebar',
                    'type' => 'select',
                    'choices' => $sidebar_choices,
                    'return_format' => 'value',
                    'allow_null' => false,
                    'ui' => true,
                ),
            ),
            'location' => array(
                // Для постов
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'blog',
                    ),
                ),
            ),
            'position' => 'side',
            'priority' => 'high',
        ));
    }
}
?>