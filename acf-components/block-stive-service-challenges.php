<?php
$title = function_exists('get_field') ? (string) get_field('service_challenges_title') : '';
$items = function_exists('get_field') ? get_field('service_challenges_items') : array();
$items = is_array($items) ? $items : array();

if ($title === '' && $items === array()) {
    return;
}
?>
<section class="stive-section service-challenges">
    <div class="container">
        <?php if ($title !== '') : ?>
            <h2 class="stive-section__title stive-section__title--lg"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
        <?php if ($items !== array()) : ?>
            <div class="stive-cards stive-cards--grid-3">
                <?php foreach ($items as $ch) : ?>
                    <?php if (!is_array($ch)) {
                        continue;
                    } ?>
                    <article class="stive-card">
                        <?php if (!empty($ch['title'])) : ?>
                            <h3 class="stive-card__title"><?php echo esc_html((string) $ch['title']); ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($ch['text'])) : ?>
                            <p class="stive-card__text"><?php echo esc_html((string) $ch['text']); ?></p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>