<?php
function display_category_and_tag_terms($post_id = null, $taxonomy = 'category', $tag = 'a', $class = 'case__category label-badge', $need_wrap_main = 'false')
{
    if (empty($post_id)) {
        $post_id = get_the_ID();
    }

    // Получаем ID первичной категории Rank Math
    $primary_category_id = get_post_meta($post_id, 'rank_math_primary_' . $taxonomy, true);
    $terms = get_the_terms($post_id, $taxonomy);
    $output = '';

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            // Определяем, является ли текущая категория первичной
            $is_primary = (!empty($primary_category_id) && $term->term_id == $primary_category_id);

            // Формируем классы: добавляем is-main только если параметр включен и это primary категория
            $term_class = $class;
            if ($is_primary && $need_wrap_main) {
                $term_class .= ' is-main';
            }

            if ($tag === 'a') {
                $output .= sprintf(
                    '<a href="#" class="%s">%s</a>',
                    //esc_url(get_term_link($term)),
                    esc_attr($term_class),
                    esc_html($term->name)
                );
            } else {
                $output .= sprintf(
                    '<%s class="%s">%s</%s>',
                    $tag,
                    esc_attr($term_class),
                    esc_html($term->name),
                    $tag
                );
            }
        }
    }

    return $output;
}

?>