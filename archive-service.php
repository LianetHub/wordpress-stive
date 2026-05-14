<?php

if (!defined('ABSPATH')) {
    exit;
}

$service_pt = defined('STIVE_SERVICE_POST_TYPE') ? STIVE_SERVICE_POST_TYPE : 'service';

global $wp_query;

$paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;

$first_service_id = null;

if ($paged === 1) {
    $first_service = get_posts([
        'post_type' => $service_pt,
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
    ]);

    if (!empty($first_service)) {
        $first_service_id = (int) $first_service[0]->ID;
    }
}

$archive_obj = get_post_type_object($service_pt);
$archive_title = $archive_obj && isset($archive_obj->labels->name)
    ? $archive_obj->labels->name
    : __('Услуги', 'stive');
$archive_description = $archive_obj && !empty($archive_obj->description)
    ? $archive_obj->description
    : '';

get_header();

require_once TEMPLATE_PATH . '_breadcrumbs.php';

$logotypes = [
    [
        'img_webp' => 'logo-clutch.webp',
        'img_jpg' => 'logo-clutch.jpg',
        'alt' => 'Clutch logo',
    ],
    [
        'img_webp' => 'logo-techreviewer.webp',
        'img_jpg' => 'logo-techreviewer.jpg',
        'alt' => 'Techreviewer logo',
    ],
    [
        'img_webp' => 'logo-trustpilot.webp',
        'img_jpg' => 'logo-trustpilot.jpg',
        'alt' => 'Trustpilot logo',
    ],
    [
        'img_webp' => 'logo-marketinghub.webp',
        'img_jpg' => 'logo-marketinghub.jpg',
        'alt' => 'Marketinghub logo',
    ],
];
?>

<section class="cases-heading">
    <div class="cases-heading__container container">
        <div class="cases-heading__offer">
            <h1 class="cases-heading__title title-sm"><?php echo esc_html($archive_title); ?></h1>
            <?php if ($archive_description !== '') : ?>
                <p class="cases-heading__description"><?php echo esc_html($archive_description); ?></p>
            <?php endif; ?>
        </div>
        <div class="cases-heading__logotypes">
            <?php foreach ($logotypes as $logo) : ?>
                <picture class="cases-heading__logotype">
                    <source srcset="<?php echo esc_url(IMG_PATH . '/solutions/' . $logo['img_webp']); ?>" type="image/webp">
                    <img src="<?php echo esc_url(IMG_PATH . '/solutions/' . $logo['img_jpg']); ?>"
                        alt="<?php echo esc_attr($logo['alt']); ?>"
                        loading="lazy">
                </picture>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($first_service_id) : ?>
    <section class="main-case">
        <div class="main-case__container container">
            <a href="<?php echo esc_url(get_permalink($first_service_id)); ?>" class="main-case__offer">
                <picture class="main-case__poster">
                    <img
                        src="<?php echo esc_url(get_the_post_thumbnail_url($first_service_id, 'full') ?: ''); ?>"
                        alt="<?php echo esc_attr(get_the_title($first_service_id)); ?>"
                        class="cover-image"
                        loading="eager">
                </picture>
                <div class="main-case__caption title-sm">
                    <?php echo esc_html(get_the_title($first_service_id)); ?>
                </div>
            </a>
            <div class="main-case__details">
                <p class="main-case__description"><?php echo esc_html(get_the_excerpt($first_service_id)); ?></p>
                <div class="main-case__footer">
                    <a href="<?php echo esc_url(get_permalink($first_service_id)); ?>"
                        class="main-case__btn btn btn-primary"><?php esc_html_e('Подробнее', 'stive'); ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_posts()) : ?>
    <section class="cases">
        <div class="container">
            <h2 class="cases__title title-xs"><?php esc_html_e('Все услуги', 'stive'); ?></h2>
            <ul class="cases__grid">
                <?php while (have_posts()) : the_post(); ?>

                    <?php if ($paged === 1 && (int) get_the_ID() === $first_service_id) {
                        continue;
                    } ?>

                    <?php $service_id = get_the_ID(); ?>

                    <li class="case-card case-card--white">
                        <a href="<?php the_permalink(); ?>" class="case-card__link-wrapper">
                            <picture class="case-card__image">
                                <img
                                    src="<?php echo esc_url(get_the_post_thumbnail_url($service_id, 'full') ?: ''); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    class="cover-image"
                                    loading="lazy">
                            </picture>

                            <div class="case-card__details">
                                <div class="case-card__details-main">
                                    <div class="case-card__name">
                                        <?php echo esc_html(get_the_title($service_id)); ?>
                                    </div>
                                    <p class="case-card__desc">
                                        <?php echo esc_html(get_the_excerpt($service_id)); ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>

                <?php endwhile; ?>
            </ul>

            <?php if ($wp_query->max_num_pages > 1) : ?>
                <nav aria-label="<?php esc_attr_e('Пагинация', 'stive'); ?>" class="cases__pagination pagination">
                    <?php
                    $links = paginate_links([
                        'current' => $paged,
                        'total' => $wp_query->max_num_pages,
                        'type' => 'array',
                        'prev_text' => '<span class="pagination__prev icon-prev"></span>',
                        'next_text' => '<span class="pagination__next icon-next"></span>',
                    ]);

                    if (is_array($links)) {
                        foreach ($links as $link) {
                            $link = str_replace('page-numbers', 'pagination__item', $link);
                            echo $link;
                        }
                    }
                    ?>
                </nav>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php require_once TEMPLATE_PATH . '_ready-to-scale.php'; ?>

<?php get_footer(); ?>