<li class="solution-card swiper-slide">
    <a href="<?php echo esc_url($item['link']); ?>"
       class="solution-card__wrapper icon-arrow-right">
        <picture class="solution-card__image">
            <source srcset="<?php echo IMG_PATH . '/solutions/' . $item['img_webp']; ?>" type="image/webp">
            <img
                    src="<?php echo IMG_PATH . '/solutions/' . $item['img_jpg']; ?>"
                    alt="<?php echo esc_attr(strip_tags($item['title'])); ?> image"
                    loading="lazy">
        </picture>
        <p class="solution-card__title"><?php echo $item['title']; ?></p>
    </a>
</li>