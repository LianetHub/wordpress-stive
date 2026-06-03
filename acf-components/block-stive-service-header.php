<?php
if (function_exists('stive_service_debug_template_loaded')) {
    stive_service_debug_template_loaded(__FILE__);
}
$header = function_exists('stive_service_header_get_context')
    ? stive_service_header_get_context()
    : array();

$service_title = (string) ($header['service_title'] ?? get_the_title());
$service_description = (string) ($header['service_description'] ?? '');
$service_btn_primary = isset($header['service_btn_primary']) && is_array($header['service_btn_primary'])
    ? $header['service_btn_primary']
    : array('url' => '', 'title' => '', 'target' => '_self');
$service_btn_secondary = isset($header['service_btn_secondary']) && is_array($header['service_btn_secondary'])
    ? $header['service_btn_secondary']
    : array('url' => '', 'title' => '', 'target' => '_self');
$service_image = isset($header['service_image']) && is_array($header['service_image'])
    ? $header['service_image']
    : array('url' => '', 'alt' => '');
$service_metrics = isset($header['service_metrics']) && is_array($header['service_metrics'])
    ? $header['service_metrics']
    : array();
$service_trust_logos = isset($header['service_trust_logos']) && is_array($header['service_trust_logos'])
    ? $header['service_trust_logos']
    : array();

$heading_modifier = 'heading--services';
$heading_title_class = 'title-sm';

$heading_metrics_rows = array();
foreach ($service_metrics as $row) {
    if (!is_array($row)) {
        continue;
    }
    $ml = isset($row['metric_label']) ? trim((string) $row['metric_label']) : '';
    $mv = isset($row['metric_value']) ? trim((string) $row['metric_value']) : '';
    if ($ml === '' && $mv === '') {
        continue;
    }
    $heading_metrics_rows[] = array(
        'metric_label' => $ml,
        'metric_value' => $mv,
    );
}
$has_heading_metrics = !empty($heading_metrics_rows);
$has_heading_image = !empty($service_image['url']);
?>
<section class="heading <?php echo esc_attr($heading_modifier); ?>">
    <div class="heading__container container">
        <div class="heading__main">
            <?php
            $category_taxonomy = defined('STIVE_SERVICE_CATEGORY_TAXONOMY')
                ? STIVE_SERVICE_CATEGORY_TAXONOMY
                : 'service-list';
            $service_categories = function_exists('display_category_and_tag_terms')
                ? display_category_and_tag_terms(get_the_ID(), $category_taxonomy, 'a', 'heading__category label-badge')
                : '';
            if (!empty($service_categories)) { ?>
                <div class="heading__categories">
                    <?php echo $service_categories; ?>
                </div>
            <?php } ?>
            <h1 class="heading__title <?php echo esc_attr($heading_title_class); ?>"><?php echo esc_html($service_title); ?></h1>
            <?php if ($service_description !== '') : ?>
                <p class="heading__description"><?php echo wp_kses_post($service_description); ?></p>
            <?php endif; ?>
            <?php if (($service_btn_primary['url'] ?? '') !== '' || ($service_btn_secondary['url'] ?? '') !== '') : ?>
                <div class="heading__actions">
                    <?php if (($service_btn_primary['url'] ?? '') !== '') : ?>
                        <a href="<?php echo esc_url($service_btn_primary['url']); ?>"
                            class="heading__btn btn btn-secondary"
                            target="<?php echo esc_attr($service_btn_primary['target'] ?? '_self'); ?>"><?php echo esc_html((string) ($service_btn_primary['title'] ?? '')); ?></a>
                    <?php endif; ?>
                    <?php if (($service_btn_secondary['url'] ?? '') !== '') : ?>
                        <a href="<?php echo esc_url($service_btn_secondary['url']); ?>"
                            class="heading__btn btn btn-grey"
                            target="<?php echo esc_attr($service_btn_secondary['target'] ?? '_self'); ?>"><?php echo esc_html((string) ($service_btn_secondary['title'] ?? '')); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($service_trust_logos)) : ?>
                <div class="heading__trust">
                    <?php foreach ($service_trust_logos as $trust_row) : ?>
                        <?php
                        $timg = isset($trust_row['logo']) && function_exists('stive_service_page_acf_image_attrs')
                            ? stive_service_page_acf_image_attrs($trust_row['logo'])
                            : array('url' => '', 'alt' => '');
                        if ($timg['url'] === '') {
                            continue;
                        }
                        ?>
                        <div class="heading__trust-item">
                            <img class="heading__trust-img"
                                src="<?php echo esc_url($timg['url']); ?>"
                                alt="<?php echo esc_attr($timg['alt']); ?>"
                                loading="lazy"
                                width="100"
                                height="48">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($has_heading_metrics && !$has_heading_image) : ?>
                <div class="stats-slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($heading_metrics_rows as $mrow) : ?>
                            <div class="stats-slider__slide swiper-slide">
                                <?php if ($mrow['metric_label'] !== '') : ?>
                                    <div class="stats-slider__slide-caption"><?php echo esc_html($mrow['metric_label']); ?></div>
                                <?php endif; ?>
                                <?php if ($mrow['metric_value'] !== '') : ?>
                                    <div class="stats-slider__slide-value"><?php echo esc_html($mrow['metric_value']); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($has_heading_metrics && $has_heading_image) : ?>
            <div class="heading__side">
                <div class="stats-slider swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($heading_metrics_rows as $mrow) : ?>
                            <div class="stats-slider__slide swiper-slide">
                                <?php if ($mrow['metric_label'] !== '') : ?>
                                    <div class="stats-slider__slide-caption"><?php echo esc_html($mrow['metric_label']); ?></div>
                                <?php endif; ?>
                                <?php if ($mrow['metric_value'] !== '') : ?>
                                    <div class="stats-slider__slide-value"><?php echo esc_html($mrow['metric_value']); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <picture class="heading__image">
                    <img
                        src="<?php echo esc_url($service_image['url']); ?>"
                        alt="<?php echo esc_attr($service_image['alt'] ?? ''); ?>"
                        class="cover-image">
                </picture>
            </div>
        <?php elseif ($has_heading_image) : ?>
            <picture class="heading__image">
                <img
                    src="<?php echo esc_url($service_image['url']); ?>"
                    alt="<?php echo esc_attr($service_image['alt'] ?? ''); ?>"
                    class="cover-image">
            </picture>
        <?php else : ?>
            <picture class="heading__image"></picture>
        <?php endif; ?>
    </div>
</section>