<?php
function display_case_categories($post_id = null) {
    if (empty($post_id)) {
        $post_id = get_the_ID();
    }
    
    // Получаем все таксономии, привязанные к этому типу поста
    $post_type = get_post_type($post_id);
    $taxonomies = get_object_taxonomies($post_type, 'objects');
    
    $output = '<div class="case__categories">';
    $has_terms = false;
    
    // Перебираем все таксономии
    foreach ($taxonomies as $taxonomy) {
        // Пропускаем встроенные таксономии, которые обычно не нужны
        if (in_array($taxonomy->name, array('post_format', 'wp_theme'))) {
            continue;
        }
        
        $terms = get_the_terms($post_id, $taxonomy->name);
        
        if (!empty($terms) && !is_wp_error($terms)) {
            $has_terms = true;
            foreach ($terms as $term) {
                $output .= sprintf(
                    '<a href="%s" class="case__category label-badge">%s</a>',
                    esc_url(get_term_link($term)),
                    esc_html($term->name)
                );
            }
        }
    }
    
    // Если терминов нет, можно вывести заглушку
    if (!$has_terms) {
        $output .= '<span class="case__category label-badge">Uncategory</span>';
    }
    
    $output .= '</div>';
    return $output;
}