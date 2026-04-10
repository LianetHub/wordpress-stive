<?php
/*
Template Name: Main Blog
Template Post Type: blog
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>
<section class="heading heading--blog">
    <div class="heading__container container">
        <div class="heading__main">
            <div class="heading__categories">
                <a href="" class="heading__category label-badge">Category</a>
                <a href="" class="heading__category label-badge">Category</a>
                <a href="" class="heading__category label-badge">Category</a>
            </div>
            <h1 class="heading__title title-sm">Case Headline <br> Key Result + Client Name</h1>
            <p class="heading__description">Short case description – 2-3 sentences. What was done, for&nbsp;whom, main outcome. Collpases with +- toggle on mobile</p>
            <div class="heading__stats">
                <time datetime="2026-03-15" class="heading__stats-item icon-date">
                    Published <br> March 15, 2026
                </time>
                <time datetime="2026-04-10" class="heading__stats-item icon-update">
                    Updated <br> April 10, 2026
                </time>
                <div class="heading__stats-item icon-clock">
                    5 minutes to read
                </div>
            </div>
            <div class="heading__author">
                <div class="heading__author-thumb">
                    <img src="<?php echo IMG_PATH ?>/user-thumb.png"
                        class="cover-image"
                        alt="person avatar">
                </div>
                <div class="heading__author-details">
                    <div class="heading__author-name">[Author Name]</div>
                    <div class="heading__author-position">Title Role</div>
                </div>
            </div>
        </div>
        <picture class="heading__image ">
            <source
                srcset="<?php echo IMG_PATH . '/cases/case_study-1.webp' ?>"
                type="image/webp">
            <img
                src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>"
                alt="case image"
                class="cover-image">
        </picture>
    </div>
</section>
<section class="article">
    <div class="article__container container">
        <div class="article__wrapper">
            <div class="article__body">
                <div class="article__heading typography-block">
                    <h2>Article Headline</h2>
                    <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations. With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
                    <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations. With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
                </div>
                <div class="article__content typography-block">
                    <h2>Comparison Table: [Title]</h2>
                    <?php the_content() ?>
                </div>
            </div>
            <aside class="article__sidebar">
                <nav aria-label="article toc" class="article__toc">
                    <div class="article__toc-caption gradient-text">Table of Contents</div>
                    <ol class="article__toc-list">
                        <li class="article__toc-item">
                            <div class="article__toc-num">01</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">02</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">03</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">04</div>
                            <a href="" class="article__toc-link">Final Thought</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">05</div>
                            <a href="" class="article__toc-link">FAQ</a>
                        </li>
                    </ol>
                </nav>
                <div class="article__banner">
                    <div class="article__banner-caption">Have a question?</div>
                    <div class="article__banner-title gradient-text">[Widget CTA Headline 1-2 lines]</div>
                    <p class="article__banner-description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
                    <a href="" class="article__banner-btn btn btn-blue">Book Intro Call</a>
                </div>
            </aside>
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>
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