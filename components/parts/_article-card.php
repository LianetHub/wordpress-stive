<?php
$date_timestamp = strtotime($article['date']);
$datetime_attr = $date_timestamp ? date('Y-m-d', $date_timestamp) : '';
$article_class = !empty($article['class']) ? ' ' . esc_attr($article['class']) : '';
?>

<a href="<?php echo esc_url($article['url']); ?>"
   class="article-card <?php echo $article_class; ?>">
    <picture class="article-card__image">
        <source
                srcset="<?php echo IMG_PATH . '/media/' . $article['img_webp']; ?>"
                type="image/webp">
        <img src="<?php echo IMG_PATH . '/media/' . $article['img_jpg']; ?>"
             alt="<?php echo esc_attr(strip_tags($article['text'])); ?>"
             class="cover-image"
             loading="lazy">
    </picture>

    <div class="article-card__content">
        <?php if (!empty($article['categories'])): ?>
            <div class="article-card__categories">
                <?php foreach ($article['categories'] as $tag): ?>
                    <span class="article-card__category<?php echo $tag['is_main'] ? ' is-main' : ''; ?>">
                        <?php echo esc_html($tag['name']); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <p class="article-card__desc">
            <?php echo esc_html($article['text']); ?>
        </p>

        <div class="article-card__meta">
            <div class="article-card__author"><?php echo esc_html($article['author']); ?></div>
            <time
                    datetime="<?php echo $datetime_attr; ?>"
                    class="article-card__date">
                <?php echo esc_html($article['date']); ?>
            </time>
        </div>
    </div>
</a>