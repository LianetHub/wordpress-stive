<?php 
$blog_las_h2 = get_field('blog_las_h2'); //text
$blog_las_link = get_field('blog_las_link'); //link
$blog_las_sliders = get_field('blog_las_cards'); //repeater 
$args = array(
    'post_type'      => 'blog',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
    'post__not_in'   => array(get_the_ID()),
);

$blog_sliders_query = new WP_Query( $args );
$blog_sliders = $blog_sliders_query->posts; // Получаем массив постов
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
<?php if ($blog_sliders_query->have_posts()) : ?> 
<section class="media media--small">
    <div class="media__container container">
        <div class="media__block-header">
            <h2 class="media__block-title gradient-text"><?php echo $blog_las_h2; ?></h2>
			<?php 
	if( $blog_las_link ): 
    $link_url = $blog_las_link['url'];
    $link_title = $blog_las_link['title'];
    $link_target = $blog_las_link['target'] ? $blog_las_link['target'] : '_self';
    ?>
    <a class="media__block-all" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
        </div>
        <div class="media__block-slider swiper">
            <div class="swiper-wrapper">
			<?php foreach ($blog_sliders as $blog) : ?>
                <?php
				$post = get_post($blog['id']);
				$author_id = $post->post_author;
				$author_name = get_the_author_meta('display_name', $author_id);
				$publish_date = $post->post_date;
				
                $date_timestamp = $publish_date;
				$datetime_attr = $date_timestamp ? date('Y-m-d', $date_timestamp) : '';
				$article_class = !empty($article['class']) ? ' ' . esc_attr($article['class']) : '';
				?>

  <a href="<?php the_permalink($blog['id']); ?>" class="article-card <?php echo $article_class; ?>">
    <picture class="article-card__image">
      <img src="<?php echo get_the_post_thumbnail_url( $blog['id'], 'full' ); ?>" alt="<?php echo esc_attr(strip_tags($article['text'])); ?>" class="cover-image" loading="lazy">
    </picture>
    <div class="article-card__content">
        <div class="article-card__categories">
            <span class="article-card__category<?php echo $tag['is_main'] ? ' is-main' : ''; ?>">
                        <?php echo display_category_and_tag_terms($post_id=get_the_ID(), $taxonomy='blog', $a_class='article-card__category'); ?>
            </span>
        </div>
          <p class="article-card__desc">
            <?php echo get_the_title($blog['id']); ?>
          </p>

          <div class="article-card__meta">
            <div class="article-card__author">
              <?php echo esc_html($author_id); ?>
            </div>
            <time datetime="<?php echo $datetime_attr; ?>" class="article-card__date">
              <?php echo $publish_date; ?>
            </time>
          </div>
    </div>
  </a>
  <?php endforeach; ?> 
  </div>
  </div>
  </div>
  </section>
  <?php endif; 
wp_reset_postdata(); // Важно сбросить глобальный $post