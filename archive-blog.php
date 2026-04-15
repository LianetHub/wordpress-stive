<?php

?>

  <?php $page_id = $post->ID; ?>

    <?php get_header(); ?>
      <?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>
        <section class="heading heading--blog">
          <div class="heading__container container">
            <div class="heading__main">
              <h1 class="heading__title title-sm">Blog Title - e.g. <br> “Insights & Guides”</h1>
              <p class="heading__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
            </div>
          </div>
        </section>
        <section class="post-main">
          <div class="post-main__container container">
            <a href="<?php echo get_permalink(get_the_ID()); ?>" class="post-main__poster">
              <picture class="post-main__poster-image">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="Case Poster" class="cover-image">
              </picture>
            </a>
            <div class="post-main__details">
              <div class="post-main__stats stats-block">
                <time datetime="2026-03-15" class="stats-block__item icon-date">
                  <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                </time>
                <time datetime="2026-04-9" class="stats-block__item icon-update">
                  <?php echo esc_html( get_the_modified_date( 'F j, Y' ) ); ?>
                </time>
                <div class="stats-block__item icon-clock">
                  <?php r4_get_the_reading_time($before = '', $after = ' min read'); ?>
                </div>
              </div>
              <h2 class="post-main__title title-sm">
                <a href="<?php echo get_permalink(get_the_ID()); ?>" class="post-main__title">
                    Case Headline <br>
                    Key Result + Client Name
                </a>
            </h2>
              <p class="post-main__description">Short case description – 2-3 sentences. What was done, for&nbsp;whom, main outcome. Collpases with +- toggle on mobile</p>
              <div class="post-main__categories">
			  <?php echo display_category_and_tag_terms($post_id=get_the_ID(), $taxonomy='blog-list', $tag='a', $class='post-main__category label-badge'); ?>
              </div>
              <div class="post-main__author author">
                <div class="author__thumb">
				  <?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', 'person avatar', array( 'class' => 'cover-image' ) ); ?>
                </div>
                <div class="author__details">
                  <div class="author__name"><?php echo esc_html( get_the_author() ); ?></div>
                  <div class="author__position"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></div>
                </div>
              </div>
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
          <div class="media media--small">
            <div class="media__container container">
              <div class="media__filters swiper">
                <div class="swiper-wrapper">
                  <?php foreach ($media_filters as $item) : ?>
                    <a href="" class="media__filter swiper-slide filter-btn<?php echo $item['active'] ? ' active' : ''; ?>">
                      <?php echo $item['title']; ?>
                    </a>
                    <?php endforeach; ?>
                </div>
              </div>
              <div class="media__block-grid">
                <?php
            foreach ($latest_articles as $article) {
				$date_timestamp = strtotime($article['date']);
				$datetime_attr = $date_timestamp ? date('Y-m-d', $date_timestamp) : '';
				$article_class = !empty($article['class']) ? ' ' . esc_attr($article['class']) : '';
				?>

                  <a href="<?php echo get_permalink(get_the_ID()); ?>" class="article-card <?php echo $article_class; ?>">
                    <picture class="article-card__image">
                      <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="<?php echo esc_attr(strip_tags($article['text'])); ?>" class="cover-image" loading="lazy">
                    </picture>

                    <div class="article-card__content">
                        <div class="article-card__categories">
							<?php echo display_category_and_tag_terms($post_id=get_the_ID(), $taxonomy='blog-list', $tag='span', $class='article-card__category', $need_wrap_main='true'); ?>
                        </div>

                          <p class="article-card__desc">
                            <?php echo esc_html($article['text']); ?>
                          </p>

                          <div class="article-card__meta">
                            <div class="article-card__author">
                              <?php echo esc_html($article['author']); ?>
                            </div>
                            <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" class="article-card__date">
                              <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                            </time>
                          </div>
                    </div>
                  </a>
                 <?php } ?>
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