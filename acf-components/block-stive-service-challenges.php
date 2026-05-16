<?php
$title = function_exists('get_field') ? (string) get_field('service_challenges_title') : '';
$items = function_exists('get_field') ? get_field('service_challenges_items') : array();
$items = is_array($items) ? $items : array();

if ($title === '' && $items === array()) {
    return;
}
?>
<section class="service-page__band service-page__section">
    <div class="container">
        <?php if ($title !== '') : ?>
            <h2 class="service-page__section-title service-page__section-title--lg"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if ($items !== array()) : ?>
            <div class="service-page__card-grid service-page__card-grid--challenges">
                <?php foreach ($items as $ch) : ?>
                    <?php if (!is_array($ch)) {
                        continue;
                    } ?>
                    <article class="service-page__card">
                        <?php if (!empty($ch['title'])) : ?>
                            <h3 class="service-page__card-title"><?php echo esc_html((string) $ch['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($ch['text'])) : ?>
                            <p class="service-page__card-text"><?php echo esc_html((string) $ch['text']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>