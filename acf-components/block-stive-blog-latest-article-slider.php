<?php 
$blog_las_h2 = get_field('blog_las_h2'); //text
$blog_las_link = get_field('blog_las_link'); //link
$blog_las_card_class = get_field('blog_las_card_class'); //select
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
        /** @noinspection PhpTernaryExpressionCanBeReducedToShortVersionInspection */
        $link_target = $blog_las_link['target'] ? $blog_las_link['target'] : '_self';
    ?>
    <a class="media__block-all" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
        </div>
        <div class="media__block-slider swiper">
            <div class="swiper-wrapper">
			<?php foreach ($blog_sliders as $blog) : ?>
                <?php
				$post = get_post($blog->ID);
				$author_id = $post->post_author;
				$author_name = get_the_author_meta('display_name', $author_id);
				$publish_date = $post->post_date;
				?>

  <a href="<?php the_permalink($blog->ID); ?>" class="article-card <?php echo $blog_las_card_class; ?>">
    <picture class="article-card__image">
      <img src="<?php echo get_the_post_thumbnail_url( $blog->ID, 'full' ); ?>" alt="thumb" loading="lazy">
    </picture>
    <div class="article-card__content">
        <div class="article-card__categories">
           <?php echo display_category_and_tag_terms($post_id=$blog->ID, $taxonomy='blog-list', $tag='span', $class='article-card__category', $need_wrap_main='false'); ?>
        </div>
          <p class="article-card__desc">
            <?php echo get_the_title($blog->ID); ?>
          </p>

          <div class="article-card__meta">
            <div class="article-card__author">
              <?php echo esc_html($author_name); ?>
            </div>
            <time datetime="<?php echo $publish_date; ?>" class="article-card__date">
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
wp_reset_postdata();