<?php

$upcoming_events = [
        [
                'img_webp' => 'event_item-1.webp',
                'img_jpg' => 'event_item-1.jpg',
                'alt' => 'Blockchain Life 2026 Event',
                'url' => '/coming-soon/'
        ],
        [
                'img_webp' => 'event_item-2.webp',
                'img_jpg' => 'event_item-2.jpg',
                'alt' => 'Crypto Event of the Year',
                'url' => '/coming-soon/'
        ],
];


$latest_articles = [
        [
                'class' => 'swiper-slide',
                'img_webp' => 'article_image-1.webp',
                'img_jpg' => 'article_image-1.jpg',
                'url' => '/coming-soon/',
                'text' => 'Artificial Intelligence (AI) is rapidly transforming our world. It is being applied across various fields, from healthcare and finance.',
                'author' => 'Anastasia Shalepina',
                'date' => 'March 1, 2026',
                'categories' => [
                        ['name' => 'AI Search', 'is_main' => true],
                        ['name' => 'AI SEO', 'is_main' => false],
                        ['name' => 'AI Marketing', 'is_main' => false],
                ]
        ],
        [
                'class' => 'swiper-slide',
                'img_webp' => 'article_image-2.webp',
                'img_jpg' => 'article_image-2.jpg',
                'url' => '/coming-soon/',
                'text' => 'From smart homes to personalized healthcare, AI is paving the way for a better tomorrow',
                'author' => 'Anastasia Shalepina',
                'date' => 'March 5, 2026',
                'categories' => [
                        ['name' => 'AI Search', 'is_main' => false],
                        ['name' => 'AI SEO', 'is_main' => false],
                        ['name' => 'AI Marketing', 'is_main' => false],
                ]
        ],
        [
                'class' => 'swiper-slide',
                'img_webp' => 'article_image-3.webp',
                'img_jpg' => 'article_image-3.jpg',
                'url' => '/coming-soon/',
                'text' => 'The rise of artificial intelligence (AI) is reshaping industries at an unprecedented pace',
                'author' => 'Anastasia Shalepina',
                'date' => 'March 10, 2026',
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
        <div class="media__blocks">
            <div class="media__block">
                <div class="media__block-header">
                    <h2 class="media__block-title gradient-text">UPCOMING EVENTS</h2>
                    <a href="/events" class="media__block-all">ALL EVENTS</a>
                </div>
                <div class="media__block-events">
                    <?php foreach ($upcoming_events as $event): ?>
                        <a
                                href="<?php echo esc_url($event['url']); ?>"
                                class="media__block-event">
                            <picture class="media__block-image">
                                <source
                                        srcset="<?php echo IMG_PATH . '/media/' . $event['img_webp']; ?>"
                                        type="image/webp">
                                <img
                                        src="<?php echo IMG_PATH . '/media/' . $event['img_jpg']; ?>"
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
                    <a href="/blog" class="media__block-all">All articles</a>
                </div>
                <div class="media__block-articles swiper">
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
    </div>
</section>