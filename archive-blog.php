<?php

?>

<?php $page_id = $post->ID; ?>

<?php get_header(); ?>
<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>
<section class="heading">
    <div class="heading__container container">
        <div class="heading__main">
            <h1 class="heading__title title-sm">Blog Title - e.g. <br> “Insights & Guides”</h1>
            <p class="heading__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
        </div>
    </div>
</section>


<?php
$latest_articles = [
    [
        'img_webp'   => 'article_image-1.webp',
        'img_jpg'    => 'article_image-1.jpg',
        'url'        => '#',
        'text'       => 'Artificial Intelligence (AI) is rapidly transforming our world. It is being applied across various fields, from healthcare and finance.',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 1, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => true],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
    [
        'img_webp'   => 'article_image-2.webp',
        'img_jpg'    => 'article_image-2.jpg',
        'url'        => '#',
        'text'       => 'From smart homes to personalized healthcare, AI is paving the way for a better tomorrow',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 5, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => false],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
    [
        'img_webp'   => 'article_image-3.webp',
        'img_jpg'    => 'article_image-3.jpg',
        'url'        => '#',
        'text'       => 'The rise of artificial intelligence (AI) is reshaping industries at an unprecedented pace',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 10, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => false],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
    [
        'img_webp'   => 'article_image-2.webp',
        'img_jpg'    => 'article_image-2.jpg',
        'url'        => '#',
        'text'       => 'From smart homes to personalized healthcare, AI is paving the way for a better tomorrow',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 5, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => false],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
    [
        'img_webp'   => 'article_image-3.webp',
        'img_jpg'    => 'article_image-3.jpg',
        'url'        => '#',
        'text'       => 'The rise of artificial intelligence (AI) is reshaping industries at an unprecedented pace',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 10, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => false],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
    [
        'img_webp'   => 'article_image-1.webp',
        'img_jpg'    => 'article_image-1.jpg',
        'url'        => '#',
        'text'       => 'Artificial Intelligence (AI) is rapidly transforming our world. It is being applied across various fields, from healthcare and finance.',
        'author'     => 'Anastasia Shalepina',
        'date'       => 'March 1, 2026',
        'categories' => [
            ['name' => 'AI Search', 'is_main' => true],
            ['name' => 'AI SEO', 'is_main' => false],
            ['name' => 'AI Marketing', 'is_main' => false],
        ]
    ],
];
$media_filters = [
    [
        'title' => 'All',
        'active' => false
    ],
    [
        'title' => 'SaaS',
        'active' => false
    ],
    [
        'title' => 'FinTech',
        'active' => false
    ],
    [
        'title' => 'E-commerce',
        'active' => false
    ],
    [
        'title' => 'Healthcare',
        'active' => true
    ],
    [
        'title' => 'Real Estate',
        'active' => false
    ],
];
?>
?>

<div class="media media--small">
    <div class="media__container container">
        <div class="media__filters swiper">
            <div class="swiper-wrapper">
                <?php foreach ($media_filters as $item) : ?>
                    <a href=""
                        class="media__filter swiper-slide filter-btn<?php echo $item['active'] ? ' active' : ''; ?>">
                        <?php echo $item['title']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="media__block-grid">
            <?php
            foreach ($latest_articles as $article) {
                include(locate_template('components/parts/_article-card.php'));
            }
            ?>
        </div>
        <nav aria-label="pagination" class="media__pagination pagination">
            <a class="pagination__prev icon-prev" href="" aria-disabled="true" aria-label="Prev"></a>
            <span class="pagination__item current">1</span>
            <span class="pagination__item dotts">...</span>
            <a class="pagination__item" href="">2</a>
            <a class="pagination__item" href="">3</a>
            <a class="pagination__item" href="">4</a>
            <a class="pagination__item last" href="">5</a>
            <a class="pagination__next icon-next" href="" aria-label="Next"></a>
        </nav>
    </div>
</div>
<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>
<?php get_footer(); ?>