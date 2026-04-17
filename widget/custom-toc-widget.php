<?php
/**
 * ============================================
 * TOC WIDGET
 * Собирает заголовки H2 из основного контента и модулей ACF
 * ============================================
 */


function get_toc_headings_from_all_content($post_id, $include_faq = true)
{
    $headings = [];
    $all_content = '';

    // Получаем основной контент
    $main_post = get_post($post_id);
    if ($main_post) {
        $all_content .= $main_post->post_content . "\n";
    }

    // Получаем контент из модулей ACF
    $module_ids = get_field('blog_after_main_content', get_queried_object());
    if ($module_ids && is_array($module_ids)) {
        foreach ($module_ids as $module_id) {
            $module_post = get_post($module_id);
            if ($module_post) {
                $all_content .= $module_post->post_content . "\n";
            }
        }
    }

    // Ищем все H2 заголовки
    preg_match_all('/<h2(?:.*?)>(.*?)<\/h2>/i', $all_content, $matches, PREG_SET_ORDER);

    foreach ($matches as $index => $match) {
        $heading_text = strip_tags($match[1]);
        $heading_text = trim($heading_text);

        if (!empty($heading_text)) {
            $slug = sanitize_title($heading_text);
            $headings[] = [
                    'number' => str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                    'text' => $heading_text,
                    'slug' => $slug,
                    'url' => '#' . $slug
            ];
        }
    }

    // Добавляем ссылку на FAQ блок
    if ($include_faq) {
        $has_faq = false;

        if ($module_ids && is_array($module_ids)) {
            foreach ($module_ids as $module_id) {
                if (get_field('is_faq', $module_id)) {
                    $has_faq = true;
                    break;
                }
            }
        }

        if ($has_faq) {
            $headings[] = [
                    'number' => str_pad(count($headings) + 1, 2, '0', STR_PAD_LEFT),
                    'text' => 'Frequently Asked Questions',
                    'slug' => 'faq',
                    'url' => '#faq'
            ];
        }
    }

    return $headings;
}

// 2. Функция для рендера HTML виджета TOC
function render_toc_widget($post_id)
{
    $headings = get_toc_headings_from_all_content($post_id, true);

    if (empty($headings)) {
        return '<p>No headings found</p>';
    }

    ob_start();
    ?>
    <nav aria-label="article toc" class="article__toc">
        <div class="article__toc-caption gradient-text">Table of Contents</div>
        <ol class="article__toc-list">
            <?php foreach ($headings as $heading): ?>
                <li class="article__toc-item">
                    <div class="article__toc-num"><?php echo esc_html($heading['number']); ?></div>
                    <a href="<?php echo esc_url($heading['url']); ?>" class="article__toc-link">
                        <?php echo esc_html($heading['text']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
    return ob_get_clean();
}

// 3. Класс виджета TOC для WordPress
class TOC_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
                'toc_widget', // ID виджета
                'Table of Contents Widget', // Название виджета
                array(
                        'description' => 'Displays table of contents from H2 headings on blog posts'
                )
        );
    }

    // Вывод виджета на фронтенде
    public function widget($args, $instance)
    {
        $toc_html = render_toc_widget(get_the_ID());

        if (!empty($toc_html)) {
            echo $args['before_widget'];
            echo $toc_html;
            echo $args['after_widget'];
        }

    }

    // Форма настроек в админке
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : 'Table of Contents';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                Title:
            </label>
            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                    type="text"
                    value="<?php echo esc_attr($title); ?>"
            />
        </p>
        <p>
            <em>Widget automatically displays TOC on blog posts only.</em>
        </p>
        <?php
    }

    // Сохранение настроек
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// 4. Регистрируем виджет в WordPress
function register_toc_widget()
{
    register_widget('TOC_Widget');
}

add_action('widgets_init', 'register_toc_widget');

// 5. Добавляем ID к заголовкам H2 в контенте (для якорей)
function add_ids_to_headings($content)
{
    // Добавляем ID только к H2 заголовкам
    $content = preg_replace_callback('/<h2(.*?)>(.*?)<\/h2>/i', function ($matches) {
        $attrs = $matches[1];
        $title_html = $matches[2];
        $title_text = strip_tags($title_html);
        $slug = sanitize_title($title_text);

        // Проверяем, есть ли уже id
        if (strpos($attrs, 'id=') === false) {
            return '<h2' . $attrs . ' id="' . $slug . '">' . $title_html . '</h2>';
        }
        return $matches[0];
    }, $content);

    return $content;
}

add_filter('the_content', 'add_ids_to_headings', 10);