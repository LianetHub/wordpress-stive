<?php
function display_category_and_tag_terms($post_id = null, $taxonomy = 'category', $a_class = 'case__category label-badge') {
    if (empty($post_id)) {
        $post_id = get_the_ID();
    }
    
    $terms = get_the_terms($post_id, $taxonomy);
    
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $output .= sprintf(
                '<a href="%s" class="%s">%s</a>',
                esc_url(get_term_link($term)),
                esc_attr($a_class),
                esc_html($term->name)
            );
        }
    } else {
        $output .= '<span class="no-terms label-badge">No terms</span>';
    }
    
    return $output;
}


