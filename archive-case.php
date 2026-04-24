<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// ===== ПОЛУЧАЕМ ГЛАВНЫЙ КЕЙС (ТОЛЬКО 1 СТРАНИЦА) =====
$first_case_id = null;

if ($paged === 1) {
    $first_case = get_posts([
            'post_type' => 'case',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
    ]);

    if (!empty($first_case)) {
        $first_case_id = $first_case[0]->ID;
    }
}

?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php
$logotypes = [
        [
                'img_webp' => 'logo-clutch.webp',
                'img_jpg' => 'logo-clutch.jpg',
                'alt' => 'Clutch logo'
        ],
        [
                'img_webp' => 'logo-techreviewer.webp',
                'img_jpg' => 'logo-techreviewer.jpg',
                'alt' => 'Techreviewer logo'
        ],
        [
                'img_webp' => 'logo-trustpilot.webp',
                'img_jpg' => 'logo-trustpilot.jpg',
                'alt' => 'Trustpilot logo'
        ],
        [
                'img_webp' => 'logo-marketinghub.webp',
                'img_jpg' => 'logo-marketinghub.jpg',
                'alt' => 'Marketinghub logo'
        ],
];
?>

    <section class="cases-heading">
        <div class="cases-heading__container container">
            <div class="cases-heading__offer">
                <h1 class="cases-heading__title title-sm">AI Marketing & Sales Cases</h1>
                <p class="cases-heading__description">Real workflows, real clients, real numbers. See how we help founders make AI work — not just look good in a pitch deck.</p>
            </div>
            <div class="cases-heading__logotypes">
                <?php foreach ($logotypes as $logo): ?>
                    <picture class="cases-heading__logotype">
                        <source srcset="<?php echo IMG_PATH . '/solutions/' . $logo['img_webp']; ?>" type="image/webp">
                        <img src="<?php echo IMG_PATH . '/solutions/' . $logo['img_jpg']; ?>"
                             alt="<?php echo $logo['alt']; ?>" loading="lazy">
                    </picture>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php if ($first_case_id) : ?>
    <section class="main-case">
        <div class="main-case__container container">
            <a href="<?php echo get_permalink($first_case_id); ?>" class="main-case__offer">
                <picture class="main-case__poster">
                    <img
                            src="<?php echo get_the_post_thumbnail_url($first_case_id, 'full'); ?>"
                            alt="<?php echo esc_attr(get_the_title($first_case_id)); ?>"
                            class="cover-image">
                </picture>
                <?php if (get_field('case_archive_title_show', $first_case_id)) : ?>
                    <div class="main-case__caption title-sm">
                        <?php echo get_the_title($first_case_id); ?>
                    </div>
                <?php endif; ?>
            </a>
            <div class="main-case__details">
                <div class="main-case__person person">
                    <div class="person__thumb">
                        <?php $case_details_thumb = get_field('case_metric_img', $first_case_id); ?>
                        <img src="<?php echo esc_url($case_details_thumb['url']); ?>"
                             alt="<?php echo esc_attr($case_details_thumb['alt']); ?>">
                    </div>
                    <div class="person__info">
                        <div class="person__name title-xs gradient-text">
                            <?php echo get_field('case_metric_name', $first_case_id); ?>
                        </div>
                        <div class="person__position">
                            <?php echo get_field('case_metric_position', $first_case_id); ?>
                        </div>
                    </div>
                </div>

                <p class="main-case__description"><?php echo esc_html(get_field('case_related_subtitle', $first_case_id)); ?></p>

                <?php $case_metrics = get_field('case_metrics', $first_case_id); ?>
                <?php if ($case_metrics) : ?>
                    <ul class="main-case__metrics metrics">
                        <?php foreach ($case_metrics as $metric) : ?>
                            <li class="metrics__item">
                                <div class="metrics__item-label"><?php echo esc_html($metric['name']); ?></div>
                                <div class="metrics__item-value"><?php echo esc_html($metric['value']); ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="main-case__footer">
                    <div class="main-case__categories">
                        <?php
                        echo display_category_and_tag_terms($first_case_id, 'case-list', 'a', 'main-case__category label-badge label-badge--medium', 'false');
                        ?>
                    </div>
                    <a href="<?php echo get_permalink($first_case_id); ?>" class="main-case__btn btn btn-primary">Read
                        Full Case</a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (have_posts()) : ?>
    <section class="cases">
        <div class="container">
            <h2 class="cases__title title-xs">Case Studies</h2>
            <ul class="cases__grid">
                <?php while (have_posts()) : the_post(); ?>

                    <?php if ($paged === 1 && get_the_ID() == $first_case_id) continue; ?>

                    <?php $case_id = get_the_ID(); ?>

                    <li class="case-card case-card--white">
                        <a href="<?php the_permalink(); ?>" class="case-card__link-wrapper">
                            <picture class="case-card__image">
                                <img
                                        src="<?php echo get_the_post_thumbnail_url($case_id, 'full'); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="cover-image"
                                        loading="lazy">
                            </picture>

                            <div class="case-card__details">
                                <div class="case-card__details-main">
                                    <?php if (get_field('case_archive_title_show', $case_id)) : ?>
                                        <div class="case-card__name">
                                            <?php echo get_the_title($case_id); ?>
                                        </div>
                                    <?php endif; ?>
                                    <p class="case-card__desc">
                                        <?php echo esc_html(get_field('case_related_subtitle')); ?>
                                    </p>

                                    <?php $case_metrics = get_field('case_metrics', $case_id); ?>
                                    <?php if ($case_metrics) : ?>
                                        <ul class="case-card__metrics metrics">
                                            <?php foreach ($case_metrics as $metric) : ?>
                                                <li class="metrics__item">
                                                    <div class="metrics__item-label"><?php echo esc_html($metric['name']); ?></div>
                                                    <div class="metrics__item-value"><?php echo esc_html($metric['value']); ?></div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </a>
                    </li>

                <?php endwhile; ?>
            </ul>

            <?php if ($wp_query->max_num_pages > 1) : ?>
                <nav aria-label="pagination" class="cases__pagination pagination">
                    <?php
                    $links = paginate_links([
                            'current' => $paged,
                            'total' => $wp_query->max_num_pages,
                            'type' => 'array',
                            'prev_text' => '<span class="pagination__prev icon-prev"></span>',
                            'next_text' => '<span class="pagination__next icon-next"></span>',
                    ]);

                    foreach ($links as $link) {
                        $link = str_replace('page-numbers', 'pagination__item', $link);
                        echo $link;
                    }
                    ?>
                </nav>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>

<?php get_footer(); ?>