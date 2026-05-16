<?php
if (!isset($through_testimonials_sliders) && function_exists('get_field')) {
    $through_testimonials_sliders = get_field('through_testimonials_sliders');

    if (empty($through_testimonials_sliders)) {
        $through_testimonials_sliders = get_field('through_testimonials_sliders', 'option');
    }
}

if (!isset($through_testimonials_section_title) && function_exists('get_field')) {
    $through_testimonials_section_title = get_field('other_testimonials');

    if (!is_string($through_testimonials_section_title) || trim($through_testimonials_section_title) === '') {
        $through_testimonials_section_title = get_field('other_testimonials', 'option');
    }

    $through_testimonials_section_title = is_string($through_testimonials_section_title)
        ? trim($through_testimonials_section_title)
        : '';
} elseif (!isset($through_testimonials_section_title)) {
    $through_testimonials_section_title = '';
} else {
    $through_testimonials_section_title = trim((string) $through_testimonials_section_title);
}

$has_testimonials_title = $through_testimonials_section_title !== '';
$testimonials_wrapper_tag = $has_testimonials_title ? 'section' : 'div';

$testimonials_title_class = 'testimonials__title title-xs gradient-text';
if (defined('STIVE_SERVICE_POST_TYPE') && is_singular(STIVE_SERVICE_POST_TYPE)) {
    $testimonials_title_class = 'testimonials__title title-xs gradient-text';
}
?>

<?php if (!empty($through_testimonials_sliders)) : ?>
    <<?php echo esc_attr($testimonials_wrapper_tag); ?> class="testimonials" id="testimonials">
        <div class="container">
            <?php if ($has_testimonials_title) : ?>
                <h2 class="<?php echo esc_attr($testimonials_title_class); ?>"><?php echo esc_html($through_testimonials_section_title); ?></h2>
            <?php endif; ?>
            <div class="testimonials__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($through_testimonials_sliders as $testimonial_item) : ?>
                        <<?php echo esc_attr($testimonial_item['tag']); ?>
                            class="testimonial <?php echo esc_attr($testimonial_item['class']); ?>">
                            <div class="testimonial__header">
                                <div class="testimonial__author">
                                    <p class="testimonial__author-name">
                                        <?php echo esc_html($testimonial_item['name']); ?>
                                    </p>
                                    <p class="testimonial__author-title">
                                        <?php echo esc_html($testimonial_item['title']); ?>
                                    </p>
                                </div>
                                <div class="testimonial__rating">
                                    <?php $rating = intval($testimonial_item['rating']); ?>
                                    <?php for ($i = 0; $i < $rating; $i++) : ?>
                                        <span class="icon-star"></span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <blockquote class="testimonial__text">
                                <?php echo esc_html($testimonial_item['text']); ?>
                            </blockquote>
                        </<?php echo esc_attr($testimonial_item['tag']); ?>>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </<?php echo esc_attr($testimonials_wrapper_tag); ?>>
<?php endif; ?>