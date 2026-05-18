<?php

$upcoming_events = [
        [
                'img_webp' => 'stive-conf-seo.png',
                'img_jpg' => 'stive-conf-seo.png',
                'alt' => 'Blockchain Life 2026 Event',
                'url' => '/coming-soon/',
        ],
        [
                'img_webp' => 'stive-conf.png',
                'img_jpg' => 'stive-conf.png',
                'alt' => 'Crypto Event of the Year',
                'url' => '/coming-soon/',
        ],
];

$blog_archive_url = get_post_type_archive_link('blog');
if (! is_string($blog_archive_url) || $blog_archive_url === '') {
    $blog_archive_url = home_url('/blog/');
}

$latest_articles_query = new WP_Query([
        'post_type' => 'blog',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
]);

?>
<section class="media" id="media">
    <div class="media__container container">
        <div class="media__blocks">
            <div class="media__block">
                <div class="media__block-header">
                    <h2 class="media__block-title gradient-text">UPCOMING EVENTS</h2>
                    <a href="/coming-soon/" class="media__block-all">ALL EVENTS</a>
                </div>
                <div class="media__block-events">
                    <?php foreach ($upcoming_events as $event) : ?>
                        <a
                                href="<?php echo esc_url($event['url']); ?>"
                                class="media__block-event">
                            <picture class="media__block-image">
                                <source
                                        srcset="<?php echo esc_url(IMG_PATH . '/media/' . $event['img_webp']); ?>"
                                        type="image/webp">
                                <img
                                        src="<?php echo esc_url(IMG_PATH . '/media/' . $event['img_jpg']); ?>"
                                        alt="<?php echo esc_attr($event['alt']); ?>"
                                        loading="lazy">
                            </picture>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="media__block">
                <div class="media__block-header">
                    <h2 class="media__block-title gradient-text">Latest Articles</h2>
                    <a href="<?php echo esc_url($blog_archive_url); ?>" class="media__block-all">All articles</a>
                </div>
                <?php if ($latest_articles_query->have_posts()) : ?>
                    <div class="media__block-articles swiper">
                        <div class="swiper-wrapper">
                            <?php
                            while ($latest_articles_query->have_posts()) :
                                $latest_articles_query->the_post();
                                $post_id = get_the_ID();
                                $author_id = (int) get_post_field('post_author', $post_id);
                                $thumb_url = get_the_post_thumbnail_url($post_id, 'full');
                                ?>
                                <a href="<?php the_permalink(); ?>" class="article-card swiper-slide">
                                    <picture class="article-card__image">
                                        <?php if ($thumb_url) : ?>
                                            <img
                                                    src="<?php echo esc_url($thumb_url); ?>"
                                                    alt="<?php echo esc_attr(get_the_title()); ?>"
                                                    class="cover-image"
                                                    loading="lazy">
                                        <?php endif; ?>
                                    </picture>

                                    <div class="article-card__content">
                                        <div class="article-card__categories">
                                            <?php
                                            echo display_category_and_tag_terms(
                                                $post_id,
                                                'blog-list',
                                                'span',
                                                'article-card__category',
                                                'true'
                                            );
                                            ?>
                                        </div>

                                        <p class="article-card__desc">
                                            <?php the_title(); ?>
                                        </p>

                                        <div class="article-card__meta">
                                            <div class="article-card__author">
                                                <?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?>
                                            </div>
                                            <time
                                                    datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"
                                                    class="article-card__date">
                                                <?php echo esc_html(get_the_date('F j, Y')); ?>
                                            </time>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
