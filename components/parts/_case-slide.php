<li class="case-card <?php echo esc_attr($case['class'] ?? ''); ?>">
    <a
        href="<?php echo esc_url($case['link']); ?>"
        class="case-card__link-wrapper">
        <picture class="case-card__image">
            <source
                srcset="<?php echo IMG_PATH . '/cases/' . $case['img_webp']; ?>"
                type="image/webp">
            <img
                src="<?php echo IMG_PATH . '/cases/' . $case['img_jpg']; ?>"
                alt="<?php echo esc_attr($case['name']); ?>"
                class="cover-image"
                loading="lazy">
        </picture>
        <div class="case-card__details">
            <div class="case-card__details-main">
                <div class="case-card__name">
                    <?php echo esc_html($case['name']); ?>
                </div>
                <p class="case-card__desc">
                    <?php echo esc_html($case['desc']); ?>
                </p>
            </div>
            <div class="case-card__arrow icon-long-arrow"></div>
        </div>
    </a>
</li>