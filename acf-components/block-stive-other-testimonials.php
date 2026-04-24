<?php
$through_testimonials_sliders = get_field('through_testimonials_sliders', 'option'); //repeater
?>

<?php if ($through_testimonials_sliders): ?>
    <div class="testimonials">
        <div class="container">
            <div class="testimonials__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($through_testimonials_sliders as $testimonial_item): ?>
                    <<?php echo $testimonial_item['tag']; ?>
                    class="testimonial <?php echo esc_html($testimonial_item['class']); ?>">
                    <div class="testimonial__header">
                        <div class="testimonial__author">
                            <p class="testimonial__author-name">
                                <?php echo esc_html($testimonial_item['name']); ?>
                            </p>
                            <p class="testimonial__author-title">
                                <?php echo esc_html($testimonial_item['title']); ?>
                            </p></div><div class="testimonial__rating">
                            <?php $rating = intval($testimonial_item['rating']); ?>
                            <?php for ($i = 0; $i < $rating; $i++): ?>
                                <span class="icon-star"></span>
                            <?php endfor; ?></div>
                    </div>
                    <blockquote class="testimonial__text">
                        <?php echo esc_html($testimonial_item['text']); ?>
                    </blockquote>
                </<?php echo $testimonial_item['tag']; ?>>
                <?php endforeach; ?>
                </ul>
            </div>
        </div></div>
<?php endif; ?>