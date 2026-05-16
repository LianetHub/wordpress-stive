<?php

/**
 * Case archive card (white variant with metrics).
 *
 * @var int         $case_id
 * @var string|null $extra_classes Optional extra classes on <li>.
 */
if (empty($case_id)) {
    return;
}

$li_classes = 'case-card case-card--white';
if (!empty($extra_classes)) {
    $li_classes .= ' ' . $extra_classes;
}
?>
<li class="<?php echo esc_attr($li_classes); ?>">
    <a href="<?php echo esc_url(get_permalink($case_id)); ?>" class="case-card__link-wrapper">
        <picture class="case-card__image">
            <img
                src="<?php echo esc_url(get_the_post_thumbnail_url($case_id, 'full') ?: ''); ?>"
                alt="<?php echo esc_attr(get_the_title($case_id)); ?>"
                class="cover-image"
                loading="lazy">
        </picture>

        <div class="case-card__details">
            <div class="case-card__details-main">
                <?php if (get_field('case_archive_title_show', $case_id)) : ?>
                    <div class="case-card__name">
                        <?php echo esc_html(get_the_title($case_id)); ?>
                    </div>
                <?php endif; ?>
                <p class="case-card__desc">
                    <?php echo esc_html((string) get_field('case_related_subtitle', $case_id)); ?>
                </p>

                <?php $case_metrics = get_field('case_metrics', $case_id); ?>
                <?php if ($case_metrics) : ?>
                    <ul class="case-card__metrics metrics">
                        <?php foreach ($case_metrics as $metric) : ?>
                            <li class="metrics__item">
                                <div class="metrics__item-label"><?php echo esc_html($metric['name']); ?></div>
                                <div class="metrics__item-value"><?php echo esc_html($metric['value']); ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </a>
</li>