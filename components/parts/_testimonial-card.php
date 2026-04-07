<?php
$card_tag = isset($testimonial['tag']) ? $testimonial['tag'] : 'div';
$card_class = isset($testimonial['class']) ? ' ' . $testimonial['class'] : '';
?>

<<?php echo $card_tag; ?> class="testimonial<?php echo $card_class; ?>">
    <div class="testimonial__header">
        <div class="testimonial__author">
            <p class="testimonial__author-name"><?php echo esc_html($testimonial['name']); ?></p>
            <p class="testimonial__author-title"><?php echo esc_html($testimonial['title']); ?></p>
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
    <blockquote class="testimonial__text">
        <?php echo esc_html($testimonial['text']); ?>
    </blockquote>
</<?php echo $card_tag; ?>>