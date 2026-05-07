<?php
/**
 * Custom Widget: CTA Banner with ACF Fields
 */

class CTA_Banner_Widget extends WP_Widget
{

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct(
                'cta_banner_widget', // ID виджета
                __('CTA Banner Widget', 'stive'), // Название
                array(
                        'description' => __('Виджет с CTA баннером, управляемый через ACF поля', 'stive'),
                        'classname' => 'widget-cta-banner'
                )
        );
    }

    /**
     * Widget Form (админка)
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $enable_override = !empty($instance['enable_override']) ? $instance['enable_override'] : false;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Заголовок виджета (необязательно):', 'stive'); ?>
            </label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>"
                   type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('enable_override'); ?>">
                <input type="checkbox" 
                       id="<?php echo $this->get_field_id('enable_override'); ?>"
                       name="<?php echo $this->get_field_name('enable_override'); ?>"
                       value="1" <?php checked($enable_override, 1); ?>>
                <?php _e('Разрешить перезапись данных на отдельных статьях', 'stive'); ?>
            </label>
        </p>

        <p class="description">
            <?php _e('Управляйте содержимым через ACF поля, созданные для этого виджета.', 'stive'); ?>
        </p>
        <?php
    }

    /**
     * Update widget settings
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['enable_override'] = !empty($new_instance['enable_override']) ? 1 : 0;
        return $instance;
    }

    /**
     * Display Widget (фронтенд)
     */
    public function widget($args, $instance)
    {
        global $post;
        
        // Получаем ID текущего виджета для ACF
        $widget_id = $this->id;
        $enable_override = !empty($instance['enable_override']);
        
        // Получаем значения ACF полей из настроек виджета (глобальные)
        $caption = get_field('widget_cta_caption', 'widget_' . $widget_id);
        $headline = get_field('widget_cta_headline', 'widget_' . $widget_id);
        $description = get_field('widget_cta_description', 'widget_' . $widget_id);
        $link = get_field('calendly_link', 'option');
        $button_text = $link['title'];
        $calendly_url = $link['url'];
        
        // Перезапись данных для конкретной статьи (если включено)
        if ($enable_override && is_singular() && !empty($post)) {
            // Получаем переопределенные значения из ACF полей статьи
            $post_caption = get_field('override_cta_caption', $post->ID);
            $post_headline = get_field('override_cta_headline', $post->ID);
            $post_description = get_field('override_cta_description', $post->ID);
            $post_button_text = get_field('override_button_text', $post->ID);
            $post_calendly_url = get_field('override_calendly_url', $post->ID);
            $post_enable_custom = get_field('enable_custom_cta', $post->ID);
            
            // Если включена кастомная CTA для статьи, перезаписываем
            if ($post_enable_custom) {
                $caption = !empty($post_caption) ? $post_caption : $caption;
                $headline = !empty($post_headline) ? $post_headline : $headline;
                $description = !empty($post_description) ? $post_description : $description;
                $button_text = !empty($post_button_text) ? $post_button_text : $button_text;
                $calendly_url = !empty($post_calendly_url) ? $post_calendly_url : $calendly_url;
            }
        }

        // Если нет обязательных полей, не выводим виджет
        if (empty($headline) && empty($calendly_url)) {
            return;
        }

        // Дефолтные значения, если ACF поля пустые
        $caption = !empty($caption) ? $caption : __('Have a question?', 'stive');
        $headline = !empty($headline) ? $headline : __('[Widget CTA Headline 1-2 lines]', 'stive');
        $description = !empty($description) ? $description : __('Short case description – 2-3 sentences. What was done, for whom, main outcome.', 'stive');
        $button_text = !empty($button_text) ? $button_text : __('Book Intro Call', 'stive');

        // Вывод виджета
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>

        <div class="article__banner">
            <?php if ($caption): ?>
                <div class="article__banner-caption"><?php echo esc_html($caption); ?></div>
            <?php endif; ?>

            <?php if ($headline): ?>
                <div class="article__banner-title gradient-text"><?php echo wp_kses_post($headline); ?></div>
            <?php endif; ?>

            <?php if ($description): ?>
                <p class="article__banner-description"><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>

            <?php if ($calendly_url): ?>
                <a href="<?php echo esc_url($calendly_url); ?>"
                   data-calendly
                   class="article__banner-btn btn btn-blue">
                    <?php echo esc_html($button_text); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php
        echo $args['after_widget'];
    }
}

// Регистрируем виджет
function register_cta_banner_widget()
{
    register_widget('CTA_Banner_Widget');
}

add_action('widgets_init', 'register_cta_banner_widget');