<?php
$title = function_exists('get_field') ? (string) get_field('service_included_title') : '';
$items = function_exists('get_field') ? get_field('service_included_items') : array();
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
            <div class="service-page__card-grid service-page__card-grid--included">
                <?php foreach ($items as $item) : ?>
                    <?php if (!is_array($item)) {
                        continue;
                    } ?>
                    <article class="service-page__card">
                        <?php if (!empty($item['title'])) : ?>
                            <h3 class="service-page__card-title"><?php echo esc_html((string) $item['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($item['text'])) : ?>
                            <p class="service-page__card-text"><?php echo esc_html((string) $item['text']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>