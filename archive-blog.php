<?php get_header(); ?>
<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php
$paged = max(1, get_query_var('paged'));

$hero = get_posts([
        'post_type' => 'blog',
        'posts_per_page' => 1
]);

$hero_id = $hero ? $hero[0]->ID : 1;

$terms = get_terms([
        'taxonomy' => 'blog-list',
        'hide_empty' => true
]);

$current_cat = $_GET['category'] ?? '';
?>

    <section class="heading heading--blog">
        <div class="heading__container container">
            <div class="heading__main">
                <h1 class="heading__title title-sm">Blog</h1>
                <p class="heading__description">Guides, research, and case breakdowns on getting brands cited in AI
                    search — for any brand that needs to be found.</p>
            </div>
        </div>
    </section>

<?php if ($hero_id): ?>
    <section class="post-main">
        <div class="post-main__container container">

            <a href="<?php echo get_permalink($hero_id); ?>" class="post-main__poster">
                <picture class="post-main__poster-image">
                    <img src="<?php echo get_the_post_thumbnail_url($hero_id, 'full'); ?>" class="cover-image">
                </picture>
            </a>

            <div class="post-main__details">
                <div class="heading__stats stats-block">
                    <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>" class="stats-block__item icon-date">
                        <?php echo esc_html(get_the_date('F j, Y')); ?>
                    </time>
                    <time datetime="<?php echo esc_attr(get_the_modified_date('Y-m-d')); ?>"
                          class="stats-block__item icon-update">
                        <?php echo esc_html(get_the_modified_date('F j, Y')); ?>
                    </time>
                    <div class="stats-block__item icon-clock">
                        <?php r4_get_the_reading_time($before = '', $after = ' min read'); ?>
                    </div>
                </div>
                <h2 class="post-main__title title-sm">
                    <a href="<?php echo get_permalink($hero_id); ?>" class="post-main__title">
                        <?php echo get_the_title($hero_id); ?>
                    </a>
                </h2>
                <p class="post-main__description">
                    <?php echo get_field('blog_header_description', $hero_id); ?>
                </p>

                <div class="post-main__categories">
                    <?php echo display_category_and_tag_terms($hero_id, 'blog-list', 'a', 'post-main__category label-badge'); ?>
                </div>
                <div class="post-main__author author">
                    <div class="author__thumb">
                        <img src="<?php echo get_avatar_url($hero_id, 'full'); ?>" class="cover-image"
                             alt="person avatar">
                    </div>
                    <div class="author__details">
                        <div class="author__name"><?php echo esc_html(get_the_author($hero_id)); ?></div>
                        <div class="author__position"><?php echo get_the_author_meta('description'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <div class="media media--small">
        <div class="media__container container">

            <div class="media__filters swiper">
                <div class="swiper-wrapper">

                    <a href="<?php echo get_post_type_archive_link('blog'); ?>"
                       data-category=""
                       class="media__filter swiper-slide filter-btn <?php echo empty($current_cat) ? 'active' : ''; ?>">
                        All
                    </a>

                    <?php foreach ($terms as $term): ?>
                        <a href="?category=<?php echo esc_attr($term->slug); ?>"
                           data-category="<?php echo esc_attr($term->slug); ?>"
                           class="media__filter swiper-slide filter-btn <?php echo ($current_cat === $term->slug) ? 'active' : ''; ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div>

            <div id="blog-grid" class="media__block-grid">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <a href="<?php the_permalink(); ?>" class="article-card">

                        <picture class="article-card__image">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                 class="cover-image">
                        </picture>

                        <div class="article-card__content">

                            <div class="article-card__categories">
                                <?php echo display_category_and_tag_terms(get_the_ID(), 'blog-list', 'span', 'article-card__category'); ?>
                            </div>

                            <p class="article-card__desc"><?php the_title(); ?></p>

                            <div class="article-card__meta">
                                <div class="article-card__author"><?php the_author(); ?></div>
                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                    <?php echo get_the_date('F j, Y'); ?>
                                </time>
                            </div>

                        </div>
                    </a>

                <?php endwhile;
                endif; ?>

            </div>

            <?php if ($wp_query->max_num_pages > 1): ?>
                <nav class="media__pagination pagination" aria-label="Page navigation">
                    <?php
                    $links = paginate_links([
                            'current' => $paged,
                            'total' => $wp_query->max_num_pages,
                            'type' => 'array',
                            'prev_text' => '<span class="icon-prev" aria-label="Previous page"></span>',
                            'next_text' => '<span class="icon-next" aria-label="Next page"></span>',
                    ]);

                    foreach ($links as $link) {
                        echo str_replace('page-numbers', 'pagination__item', $link);
                    }

                    ?>
                </nav>
            <?php endif; ?>


        </div>
    </div>

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>
<?php get_footer(); ?>