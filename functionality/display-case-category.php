<?php
function display_case_categories($post_id = null) {
    $categories = get_the_category($post_id);
    $output = '<div class="case__categories">';
    
    if (!empty($categories)) {
        foreach ($categories as $category) {
            $output .= sprintf(
                '<a href="%s" class="case__category label-badge">%s</a>',
                esc_url(get_category_link($category->term_id)),
                esc_html($category->name)
            );
        }
    }
    
    $output .= '</div>';
    return $output;
}