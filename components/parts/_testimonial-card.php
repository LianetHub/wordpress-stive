<li class="testimonial swiper-slide">
    <div class="testimonial__header">
        <div>
            <p class="testimonial-author-name"><?php echo esc_html($testimonial['name']); ?></p>
            <p class="testimonial-author-title"><?php echo esc_html($testimonial['title']); ?></p>
        </div>
        <div class="testimonial__rating">
            <?php
            $rating = intval($testimonial['rating']);
            for ($i = 0; $i < $rating; $i++):
            ?>
                <span class="icon-star"></span>
            <?php endfor; ?>
        </div>
    </div>
    <blockquote class="testimonial-text">
        <?php echo esc_html($testimonial['text']); ?>
    </blockquote>
</li>