<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Reads an archive option (defaults come from ACF field definitions).
 *
 * @return mixed
 */
function stive_service_archive_option(string $field_name)
{
    if (!function_exists('get_field')) {
        return null;
    }

    $options_id = defined('STIVE_SERVICE_ARCHIVE_OPTIONS_ID')
        ? STIVE_SERVICE_ARCHIVE_OPTIONS_ID
        : 'stive-service-archive';

    try {
        $value = get_field($field_name, $options_id);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }

        // Values saved before post_id was set may still live under "option".
        if ($options_id !== 'option') {
            $legacy = get_field($field_name, 'option');
            if ($legacy !== null && $legacy !== false && $legacy !== '') {
                return $legacy;
            }
        }
    } catch (Throwable $exception) {
        if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
            error_log(
                sprintf(
                    'stive_service_archive_option(%s): %s',
                    $field_name,
                    $exception->getMessage()
                )
            );
        }
    }

    return null;
}

/**
 * Published services for the archive grid (menu_order, then title). O(n) posts.
 *
 * @return list<WP_Post>
 */
function stive_service_archive_get_posts(): array
{
    if (!defined('STIVE_SERVICE_POST_TYPE')) {
        return array();
    }

    try {
        $query = new WP_Query(
            array(
                'post_type' => STIVE_SERVICE_POST_TYPE,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => array(
                    'menu_order' => 'ASC',
                    'title' => 'ASC',
                ),
                'order' => 'ASC',
                'no_found_rows' => true,
                'update_post_meta_cache' => true,
                'update_post_term_cache' => true,
            )
        );

        return is_array($query->posts) ? array_values($query->posts) : array();
    } catch (Throwable $exception) {
        if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
            error_log(
                sprintf(
                    'stive_service_archive_get_posts: %s',
                    $exception->getMessage()
                )
            );
        }

        return array();
    }
}

/**
 * @return list<array{value:string,label:string}>
 */
function stive_service_archive_get_stats(): array
{
    $rows = stive_service_archive_option('service_archive_stats');
    if (!is_array($rows) || $rows === array()) {
        return array();
    }

    $stats = array();
    foreach ($rows as $row) {
        if (!is_array($row)) {
            continue;
        }

        $value = isset($row['stat_value']) ? trim((string) $row['stat_value']) : '';
        $label = isset($row['stat_label']) ? trim((string) $row['stat_label']) : '';
        if ($value === '' && $label === '') {
            continue;
        }

        $stats[] = array(
            'value' => $value,
            'label' => $label,
        );
    }

    return $stats;
}

/**
 * Aria label for the stats aside on the services archive.
 */
function stive_service_archive_stats_aria_label(): string
{
    $label = stive_service_archive_option('service_archive_stats_aria_label');

    return is_string($label) ? trim($label) : '';
}

/**
 * 1-based card index as two-digit string (UTF-8 safe for ASCII digits).
 */
function stive_service_archive_format_number(int $number): string
{
    $safe = max(1, $number);

    return sprintf('%02d', $safe);
}

/**
 * Non-hierarchical service tags for archive card footer (not service-list categories).
 *
 * @return string Tag names joined with middle dot, UTF-8 safe via esc_html at output.
 */
function stive_service_archive_card_tags(int $post_id): string
{
    $taxonomy = defined('STIVE_SERVICE_TAG_TAXONOMY')
        ? STIVE_SERVICE_TAG_TAXONOMY
        : 'service-tags';

    $terms = get_the_terms($post_id, $taxonomy);
    if (!is_array($terms) || is_wp_error($terms) || $terms === array()) {
        return '';
    }

    $names = array();
    foreach ($terms as $term) {
        if ($term instanceof WP_Term && $term->name !== '') {
            $names[] = $term->name;
        }
    }

    if ($names === array()) {
        return '';
    }

    return implode(' · ', $names);
}

/**
 * Normalized card payload for archive markup.
 *
 * @return array{title:string,text:string,tags:string,url:string}
 */
function stive_service_archive_card_payload(WP_Post $post): array
{
    $post_id = (int) $post->ID;

    $card = function_exists('stive_service_archive_card_get_context')
        ? stive_service_archive_card_get_context($post_id)
        : array();

    $title = isset($card['title']) ? trim((string) $card['title']) : '';
    if ($title === '') {
        $title = (string) get_the_title($post);
    }

    $text = isset($card['description']) ? trim((string) $card['description']) : '';
    if ($text === '') {
        $excerpt = get_post_field('post_excerpt', $post_id);
        $text = is_string($excerpt) ? trim(wp_strip_all_tags($excerpt)) : '';
    }

    return array(
        'title' => $title,
        'text' => $text,
        'tags' => stive_service_archive_card_tags($post_id),
        'url' => (string) get_permalink($post),
    );
}

/**
 * Renders one linked service card.
 *
 * @param WP_Post $post     Service post.
 * @param int     $number   1-based index in the archive grid.
 */
function stive_service_render_archive_card(WP_Post $post, int $number): void
{
    $payload = stive_service_archive_card_payload($post);
    $permalink = $payload['url'] !== '' ? $payload['url'] : '#';
    ?>
    <a href="<?php echo esc_url($permalink); ?>" class="service-card">
        <p class="service-card__num"><?php echo esc_html(stive_service_archive_format_number($number)); ?></p>
        <div class="service-card__body">
            <h2 class="service-card__title"><?php echo esc_html($payload['title']); ?></h2>
            <?php if ($payload['text'] !== '') : ?>
                <p class="service-card__text"><?php echo esc_html($payload['text']); ?></p>
            <?php endif; ?>
        </div>
        <?php if ($payload['tags'] !== '') : ?>
            <p class="service-card__tags"><?php echo esc_html($payload['tags']); ?></p>
        <?php endif; ?>
    </a>
    <?php
}

/**
 * Tail stats block rules from total service count (works for any N ≥ 0).
 *
 * | count % 3 | Stats block | Extra class        |
 * |-----------|-------------|--------------------|
 * | 0         | hidden      | —                  |
 * | 1         | shown       | none               |
 * | 2         | shown       | --paired           |
 *
 * @return array{show:bool,paired:bool}
 */
function stive_service_archive_grid_tail_stats(int $total): array
{
    $modulo = $total % 3;

    return match ($modulo) {
        1 => array('show' => true, 'paired' => false),
        2 => array('show' => true, 'paired' => true),
        default => array('show' => false, 'paired' => false),
    };
}

/**
 * Renders the full archive grid: rows of 3 cards + optional tail row with stats.
 *
 * Single pass O(n) over published services; no hard-coded count.
 */
function stive_service_archive_render_grid(): void
{
    $service_posts = stive_service_archive_get_posts();
    $total = count($service_posts);

    if ($total === 0) {
        echo '<p class="services-archive__empty">';
        esc_html_e('No services published yet.', 'stive');
        echo '</p>';
        return;
    }

    $tail_stats = stive_service_archive_grid_tail_stats($total);
    $tail_cards = $tail_stats['show'] ? ($total % 3) : 0;
    $card_number = 0;
    $row_open = false;
    $bottom_open = false;

    foreach ($service_posts as $post) {
        if (!$post instanceof WP_Post) {
            continue;
        }

        $card_number++;
        $is_tail = $tail_cards > 0 && $card_number > ($total - $tail_cards);

        if (!$is_tail) {
            if (($card_number - 1) % 3 === 0) {
                if ($row_open) {
                    echo '</ul>';
                }
                echo '<ul class="services-archive__row">';
                $row_open = true;
            }

            echo '<li class="services-archive__item">';
            stive_service_render_archive_card($post, $card_number);
            echo '</li>';

            if ($card_number % 3 === 0) {
                echo '</ul>';
                $row_open = false;
            }

            continue;
        }

        if (!$bottom_open) {
            if ($row_open) {
                echo '</ul>';
                $row_open = false;
            }

            $bottom_classes = 'services-archive__row services-archive__row--bottom';
            if ($tail_stats['paired']) {
                $bottom_classes .= ' services-archive__row--bottom-paired';
            }

            echo '<div class="' . esc_attr($bottom_classes) . '">';
            $bottom_open = true;
        }

        echo '<div class="services-archive__item">';
        stive_service_render_archive_card($post, $card_number);
        echo '</div>';

        if ($card_number === $total) {
            if ($tail_stats['show']) {
                stive_service_render_archive_stats($tail_stats['paired']);
            }
            echo '</div>';
            $bottom_open = false;
        }
    }

    if ($row_open) {
        echo '</ul>';
    }
}

/**
 * Stats aside for the tail row (count % 3 is 1 or 2).
 *
 * @param bool $paired When true, adds services-archive__stats--paired.
 */
function stive_service_render_archive_stats(bool $paired = false): void
{
    $stats = stive_service_archive_get_stats();
    if ($stats === array()) {
        return;
    }

    $classes = 'services-archive__stats';
    if ($paired) {
        $classes .= ' services-archive__stats--paired';
    }
    ?>
    <aside class="<?php echo esc_attr($classes); ?>"
        aria-label="<?php echo esc_attr(stive_service_archive_stats_aria_label()); ?>">
        <?php foreach ($stats as $stat) : ?>
            <div class="services-archive__stat">
                <p class="services-archive__stat-value"><?php echo esc_html((string) $stat['value']); ?></p>
                <p class="services-archive__stat-label"><?php echo esc_html((string) $stat['label']); ?></p>
            </div>
        <?php endforeach; ?>
    </aside>
    <?php
}

/**
 * Archive hero copy from ACF options.
 *
 * @return array{title_html:string,description:string,calendly:array{url:string,title:string,target:string}}
 */
function stive_service_archive_heading_get_context(): array
{
    $empty_link = array('url' => '', 'title' => '', 'target' => '_self');

    $title = stive_service_archive_option('service_archive_heading_title');
    $description = stive_service_archive_option('service_archive_heading_description');

    $calendly_raw = function_exists('get_field') ? get_field('calendly_link', 'option') : null;
    $calendly = function_exists('stive_service_page_acf_link')
        ? stive_service_page_acf_link($calendly_raw)
        : $empty_link;

    return array(
        'title_html' => is_string($title) ? $title : '',
        'description' => is_string($description) ? $description : '',
        'calendly' => $calendly,
    );
}

/**
 * “AI for Founders” block from ACF options.
 *
 * @return array<string, mixed>
 */
function stive_service_archive_founders_get_context(): array
{
    $empty_link = array('url' => '', 'title' => '', 'target' => '_self');
    $link_fn = function_exists('stive_service_page_acf_link') ? 'stive_service_page_acf_link' : null;

    $modules_raw = stive_service_archive_option('service_archive_founders_modules');
    $normalized = array();

    if (is_array($modules_raw)) {
        $index = 0;
        foreach ($modules_raw as $row) {
            if (!is_array($row)) {
                continue;
            }
            $index++;
            $title = isset($row['module_title']) ? trim((string) $row['module_title']) : '';
            $text = isset($row['module_text']) ? trim((string) $row['module_text']) : '';
            if ($title === '' && $text === '') {
                continue;
            }

            $num = isset($row['module_num']) ? trim((string) $row['module_num']) : '';
            if ($num === '') {
                $num = stive_service_archive_format_number($index);
            }

            $normalized[] = array(
                'num' => $num,
                'title' => $title,
                'text' => $text,
            );
        }
    }

    $btn_primary_raw = stive_service_archive_option('service_archive_founders_btn_primary');
    $btn_secondary_raw = stive_service_archive_option('service_archive_founders_btn_secondary');

    $primary = $link_fn ? $link_fn($btn_primary_raw) : $empty_link;
    $secondary = $link_fn ? $link_fn($btn_secondary_raw) : $empty_link;

    if (($primary['url'] ?? '') === '' && function_exists('get_field')) {
        $calendly = $link_fn ? $link_fn(get_field('calendly_link', 'option')) : $empty_link;
        if (($calendly['url'] ?? '') !== '') {
            $primary = $calendly;
        }
    }

    $pretitle = stive_service_archive_option('service_archive_founders_pretitle');
    $eyebrow = stive_service_archive_option('service_archive_founders_eyebrow');
    $title = stive_service_archive_option('service_archive_founders_title');
    $description = stive_service_archive_option('service_archive_founders_description');

    return array(
        'pretitle' => is_string($pretitle) ? $pretitle : '',
        'eyebrow' => is_string($eyebrow) ? $eyebrow : '',
        'title' => is_string($title) ? $title : '',
        'description' => is_string($description) ? $description : '',
        'modules' => $normalized,
        'btn_primary' => $primary,
        'btn_secondary' => $secondary,
    );
}
