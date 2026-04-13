<?php
function display_category_and_tag_terms($post_id = null, $taxonomy = 'category', $tag = 'a', $class = 'case__category label-badge') {
    if (empty($post_id)) {
        $post_id = get_the_ID();
    }
    
    $terms = get_the_terms($post_id, $taxonomy);
    $output = '';
    
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            if ($tag === 'a') {
                $output .= sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    esc_url(get_term_link($term)),
                    esc_attr($class),
                    esc_html($term->name)
                );
            } else {
                $output .= sprintf(
                    '<%s class="%s">%s</%s>',
                    $tag,
                    esc_attr($class),
                    esc_html($term->name),
                    $tag
                );
            }
        }
    }
    
    return $output;
}
?>