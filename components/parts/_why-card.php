<?php
$card_id    = $card['id'] ?? '';
$card_size  = $card['size'] ?? 'normal';
$card_color = $card['color'] ?? 'default';
$card_title = $card['title'] ?? '';
$card_alt   = $card['alt'] ?? '';

$classes = [
    'why__card',
    'why__card--' . $card_id,
    'why__card--' . $card_size,
    'why__card--' . $card_color,
    'swiper-slide'
];
?>

<li class="<?php echo implode(' ', array_filter($classes)); ?>">
    <picture class="why__card-img">
        <source srcset="<?php echo IMG_PATH . '/why/' . $card['img_webp']; ?>" type="image/webp">
        <img
            src="<?php echo IMG_PATH . '/why/' . $card['img_png']; ?>"
            alt="<?php echo esc_attr($card_alt ?: strip_tags($card_title)); ?>"
            class="cover-image"
            loading="lazy">
    </picture>
    <p class="why__card-title"><?php echo $card_title; ?></p>
</li>