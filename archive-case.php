<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$first_case_args = array(
    'post_type'      => 'case',
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
);
$first_case_query = new WP_Query($first_case_args);
$first_case = $first_case_query->have_posts() ? $first_case_query->posts[0] : null;
wp_reset_postdata();

$case_args = array(
    'post_type'      => 'case',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
);

if ($first_case) {
    $case_args['post__not_in'] = array($first_case->ID);
}

$case_query = new WP_Query($case_args);
?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php
$logotypes = [
    [
        'img_webp' => 'logo-clutch.webp',
        'img_jpg'  => 'logo-clutch.jpg',
        'alt'      => 'Clutch logo'
    ],
    [
        'img_webp' => 'logo-techreviewer.webp',
        'img_jpg'  => 'logo-techreviewer.jpg',
        'alt'      => 'Techreviewer logo'
    ],
    [
        'img_webp' => 'logo-trustpilot.webp',
        'img_jpg'  => 'logo-trustpilot.jpg',
        'alt'      => 'Trustpilot logo'
    ],
    [
        'img_webp' => 'logo-marketinghub.webp',
        'img_jpg'  => 'logo-marketinghub.jpg',
        'alt'      => 'Marketinghub logo'
    ],
];
?>

<section class="cases-heading">
    <div class="cases-heading__container container">
        <div class="cases-heading__offer">
            <h1 class="cases-heading__title title-sm">Headline for&nbsp;Cases&nbsp;Page</h1>
            <p class="cases-heading__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
        </div>
        <div class="cases-heading__logotypes">
            <?php foreach ($logotypes as $logo): ?>
                <picture class="cases-heading__logotype">
                    <source
                        srcset="<?php echo IMG_PATH . '/solutions/' .  $logo['img_webp'] ?>"
                        type="image/webp">
                    <img
                        src="<?php echo IMG_PATH . '/solutions/' . $logo['img_jpg'] ?>"
                        alt="<?php echo $logo['alt'] ?>"
                        loading="lazy">
                </picture>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if ($first_case) : ?>
<section class="main-case">
    <div class="main-case__container container">
        <a href="<?php echo get_permalink($first_case->ID); ?>" class="main-case__offer">
            <?php if (has_post_thumbnail($first_case->ID)) : ?>
                <picture class="main-case__poster">
                    <source
                        srcset="<?php echo get_the_post_thumbnail_url($first_case->ID, 'full'); ?>"
                        type="image/webp">
                    <img
                        src="<?php echo get_the_post_thumbnail_url($first_case->ID, 'full'); ?>"
                        alt="<?php echo esc_attr(get_the_title($first_case->ID)); ?>"
                        class="cover-image">
                </picture>
            <?php else: ?>
                <picture class="main-case__poster">
                    <source
                        srcset="<?php echo IMG_PATH . '/cases/case_study-2.webp'; ?>"
                        type="image/webp">
                    <img
                        src="<?php echo IMG_PATH . '/cases/case_study-2.jpg'; ?>"
                        alt="Case Poster"
                        class="cover-image">
                </picture>
            <?php endif; ?>
            <h1 class="main-case__caption title-sm">
                <?php echo get_the_title($first_case->ID); ?>
            </h1>
        </a>
        <div class="main-case__details">
            <div class="main-case__person person">
                <div class="person__thumb">
                    <?php echo get_avatar(get_post_field('post_author', $first_case->ID), 60, '', 'person avatar', array('class' => 'cover-image')); ?>
                </div>
                <div class="person__info">
                    <div class="person__name title-xs gradient-text">
                        <?php echo get_the_author_meta('display_name', get_post_field('post_author', $first_case->ID)); ?>
                    </div>
                    <div class="person__position">
                        <?php 
                        $industry = get_field('industry', $first_case->ID);
                        $product_type = get_field('product_type', $first_case->ID);
                        echo esc_html($industry . ' / ' . $product_type);
                        ?>
                    </div>
                </div>
            </div>
            <p class="main-case__description"><?php echo get_the_excerpt($first_case->ID); ?></p>
            
            <?php if (have_rows('metrics', $first_case->ID)) : ?>
            <ul class="main-case__metrics metrics">
                <?php while (have_rows('metrics', $first_case->ID)) : the_row(); ?>
                    <li class="metrics__item">
                        <div class="metrics__item-label"><?php the_sub_field('label'); ?></div>
                        <div class="metrics__item-value"><?php the_sub_field('value'); ?></div>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
            <ul class="main-case__metrics metrics">
                <li class="metrics__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="metrics__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="metrics__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="metrics__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
            </ul>
            <?php endif; ?>
            
            <div class="main-case__footer">
                <div class="main-case__categories">
                    <?php 
                    $categories = get_the_terms($first_case->ID, 'case_category');
                    if ($categories && !is_wp_error($categories)) :
                        foreach(array_slice($categories, 0, 3) as $category) : ?>
                            <a href="<?php echo get_term_link($category); ?>" class="main-case__category label-badge label-badge--medium">
                                <?php echo $category->name; ?>
                            </a>
                        <?php endforeach;
                    else: ?>
                        <a href="#" class="main-case__category label-badge label-badge--medium">Service 1</a>
                        <a href="#" class="main-case__category label-badge label-badge--medium">Service 2</a>
                        <a href="#" class="main-case__category label-badge label-badge--medium">Service 3</a>
                    <?php endif; ?>
                </div>
                <a href="<?php echo get_permalink($first_case->ID); ?>" class="main-case__btn btn btn-primary">Read Full Case</a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ($case_query->have_posts()) : ?>
    <section class="cases">
        <div class="container">
            <div class="cases__header">
                <h2 class="cases__title title-xs">Case Studies</h2>
            </div>
            <ul class="cases__grid">
                <?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
                    <li class="case-card case-card--white">
                        <a href="<?php the_permalink(); ?>" class="case-card__link-wrapper">
                            <?php if (has_post_thumbnail()) : ?>
                                <picture class="case-card__image">
                                    <source
                                        srcset="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                        type="image/webp">
                                    <img
                                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="cover-image"
                                        loading="lazy">
                                </picture>
                            <?php else: ?>
                                <picture class="case-card__image">
                                    <source
                                        srcset="<?php echo IMG_PATH . '/cases/case_study-1.webp'; ?>"
                                        type="image/webp">
                                    <img
                                        src="<?php echo IMG_PATH . '/cases/case_study-1.jpg'; ?>"
                                        alt="<?php the_title_attribute(); ?>"
                                        class="cover-image"
                                        loading="lazy">
                                </picture>
                            <?php endif; ?>
                            <div class="case-card__details">
                                <div class="case-card__details-main">
                                    <div class="case-card__name">
                                        <?php the_title(); ?>
                                    </div>
                                    <p class="case-card__desc">
                                        <?php echo get_the_excerpt(); ?>
                                    </p>
                                    
                                    <?php if (have_rows('metrics')) : ?>
                                    <ul class="case-card__metrics metrics">
                                        <?php while (have_rows('metrics')) : the_row(); ?>
                                            <li class="metrics__item">
                                                <div class="metrics__item-label"><?php the_sub_field('label'); ?></div>
                                                <div class="metrics__item-value"><?php the_sub_field('value'); ?></div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php else: ?>
                                    <ul class="case-card__metrics metrics">
                                        <li class="metrics__item">
                                            <div class="metrics__item-label">METRIC LABEL</div>
                                            <div class="metrics__item-value">[+X%]</div>
                                        </li>
                                        <li class="metrics__item">
                                            <div class="metrics__item-label">METRIC LABEL</div>
                                            <div class="metrics__item-value">[+X%]</div>
                                        </li>
                                        <li class="metrics__item">
                                            <div class="metrics__item-label">METRIC LABEL</div>
                                            <div class="metrics__item-value">[+X%]</div>
                                        </li>
                                        <li class="metrics__item">
                                            <div class="metrics__item-label">METRIC LABEL</div>
                                            <div class="metrics__item-value">[+X%]</div>
                                        </li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php if ($case_query->max_num_pages > 1) : ?>
            <nav aria-label="pagination" class="cases__pagination pagination">
                <?php
                $paginate_links = paginate_links(array(
                    'format'    => '?paged=%#%',
                    'current'   => max(1, $paged),
                    'total'     => $case_query->max_num_pages,
                    'type'      => 'array',
                    'prev_text' => '<span class="pagination__prev icon-prev"></span>',
                    'next_text' => '<span class="pagination__next icon-next"></span>',
                    'mid_size'  => 2,
                    'end_size'  => 1,
                ));
                
                if (is_array($paginate_links)) {
                    foreach ($paginate_links as $link) {
                        // Преобразуем стандартную разметку WP
                        $link = str_replace('page-numbers current', 'pagination__item current', $link);
                        $link = str_replace('page-numbers', 'pagination__item', $link);
                        $link = str_replace('dots', 'dotts', $link);
                        $link = str_replace('prev pagination__item', 'pagination__prev', $link);
                        $link = str_replace('next pagination__item', 'pagination__next', $link);
                        
                        // Добавляем класс last
                        if (strpos($link, 'pagination__item') !== false && 
                            strpos($link, 'current') === false && 
                            strpos($link, '>' . $case_query->max_num_pages . '<') !== false) {
                            $link = str_replace('pagination__item', 'pagination__item last', $link);
                        }
                        
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

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>

<?php get_footer(); ?>