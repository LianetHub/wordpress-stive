<?php
/*
Template Name: Main Blog
Template Post Type: blog
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php
$latest_articles = [
    [
        'class'   => 'swiper-slide',
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
        'class'   => 'swiper-slide',
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
        'class'   => 'swiper-slide',
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
];
?>
<section class="media">
    <div class="media__container container">
        <div class="media__block media__block--large">
            <div class="media__block-header">
                <h2 class="media__block-title gradient-text">Latest Articles</h2>
                <a href="/blog" class="media__block-all">All articles</a>
            </div>
            <div class="media__block-slider swiper">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($latest_articles as $article) {
                        include(locate_template('components/parts/_article-card.php'));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>

<?php get_footer(); ?>