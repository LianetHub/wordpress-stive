<?php
function display_universal_sidebar() {
    $sidebar_id = null;
    
    // Для одиночных записей
    if(is_singular()) {
        $sidebar_id = get_field('field_dynamic_sidebar');
    }
    
    // Для архивов (категории, метки, таксономии)
    elseif(is_category() || is_tag() || is_tax()) {
        $queried_object = get_queried_object();
        $sidebar_id = get_field('field_dynamic_sidebar', $queried_object);
    }
    
    // Для страницы блога
    elseif(is_home()) {
        $blog_page_id = get_option('page_for_posts');
        if($blog_page_id) {
            $sidebar_id = get_field('field_dynamic_sidebar', $blog_page_id);
        }
    }
    
    
    // Выводим сайдбар
    if(is_active_sidebar($sidebar_id)) {
        echo '<aside class="article__sidebar">';
        dynamic_sidebar($sidebar_id);
        echo '</aside>';
    }
}
?>