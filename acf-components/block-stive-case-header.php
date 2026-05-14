<?php
if (!empty($stive_service_page_heading) && isset($sp) && is_array($sp) && function_exists('stive_service_page_acf_image_attrs')) {
    $cta_primary = isset($sp['cta_primary']) && is_array($sp['cta_primary'])
        ? $sp['cta_primary']
        : array('url' => '', 'title' => '', 'target' => '_self');
    $cta_secondary = isset($sp['cta_secondary']) && is_array($sp['cta_secondary'])
        ? $sp['cta_secondary']
        : array('url' => '', 'title' => '', 'target' => '_self');
    $hero_visual = isset($sp['hero_visual']) && is_array($sp['hero_visual']) ? $sp['hero_visual'] : array();

    $service_page_has_hero = !empty($sp['tags']) || !empty($sp['heading']) || !empty($sp['lead'])
        || ($cta_primary['url'] ?? '') !== '' || ($cta_secondary['url'] ?? '') !== ''
        || !empty($sp['trust_logos']) || ($hero_visual['url'] ?? '') !== '' || !empty($sp['hero_metrics']);

    if (!$service_page_has_hero) {
        return;
    }

    $case_title = (string) ($sp['heading'] ?? '');
    $case_description = (string) ($sp['lead'] ?? '');
    $case_btn_primary = $cta_primary;
    $case_btn_secondary = $cta_secondary;
    $case_image = stive_service_page_acf_image_attrs($hero_visual);
    $heading_modifier = 'heading--blog-post';
    $heading_title_class = 'title-sm';
    $heading_metrics = !empty($sp['hero_metrics']) ? $sp['hero_metrics'] : array();
    $heading_badges_html = '';
    if (!empty($sp['tags'])) {
        ob_start();
        foreach ($sp['tags'] as $tag_row) {
            $lab = isset($tag_row['label']) ? (string) $tag_row['label'] : '';
            if ($lab !== '') {
                echo '<span class="heading__category label-badge label-badge--medium">' . esc_html($lab) . '</span>';
            }
        }
        $heading_badges_html = trim(ob_get_clean());
    }
    $heading_trust_logos = !empty($sp['trust_logos']) ? $sp['trust_logos'] : array();
}

if (!isset($heading_badges_html)) {
    $heading_badges_html = '';
}
if (!isset($heading_trust_logos)) {
    $heading_trust_logos = array();
}

if (!isset($case_title)) {
    $case_title = '';
    if (function_exists('get_field')) {
        $acf_title = get_field('case_title');
        if ($acf_title !== null && $acf_title !== false && $acf_title !== '') {
            $case_title = is_string($acf_title) ? $acf_title : (string) $acf_title;
        }
    }
    if ($case_title === '') {
        $case_title = get_the_title();
    }
}
if (!isset($case_description)) {
    $case_description = function_exists('get_field') ? get_field('case_description') : '';
}
if (!isset($case_btn_secondary)) {
    $case_btn_secondary = function_exists('get_field') ? get_field('case_btn_secondary') : null;
}
if (!isset($case_image)) {
    $case_image = function_exists('get_field') ? get_field('case_image') : array();
}
if (!is_array($case_image)) {
    $case_image = array();
}
if (!isset($case_btn_primary)) {
    $case_btn_primary = null;
}
if (!isset($heading_modifier)) {
    $heading_modifier = 'heading--services';
}
if (!isset($heading_title_class)) {
    $heading_title_class = 'title-xs';
}
if (!isset($heading_metrics)) {
    $heading_metrics = array();
}

$heading_metrics_rows = array();
if (is_array($heading_metrics)) {
    foreach ($heading_metrics as $row) {
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
}
$has_heading_metrics = !empty($heading_metrics_rows);
$has_heading_image = !empty($case_image['url']);
?>
<section class="heading <?php echo esc_attr($heading_modifier); ?>">
    <div class="heading__container container">
        <div class="heading__main">
            <?php if (!empty($heading_badges_html)) : ?>
                <div class="heading__categories">
                    <?php echo $heading_badges_html; ?>
                </div>
            <?php else : ?>
                <?php
                $case_categories = function_exists('display_category_and_tag_terms')
                    ? display_category_and_tag_terms(get_the_ID(), 'case-list', 'a', 'heading__categories label-badge')
                    : '';
                if (!empty($case_categories)) { ?>
                    <div class="heading__categories">
                        <?php echo $case_categories; ?>
                    </div>
                <?php } ?>
            <?php endif; ?>
            <h1 class="heading__title <?php echo esc_attr($heading_title_class); ?>"><?php echo esc_html((string) $case_title); ?></h1>
            <p class="heading__description"><?php echo esc_html((string) $case_description); ?></p>
            <div class="heading__actions">
                <?php if (is_array($case_btn_primary) && !empty($case_btn_primary['url'])) : ?>
                    <a href="<?php echo esc_url($case_btn_primary['url']); ?>"
                        class="heading__btn btn btn-primary"
                        target="<?php echo esc_attr(!empty($case_btn_primary['target']) ? $case_btn_primary['target'] : '_self'); ?>"><?php echo esc_html((string) ($case_btn_primary['title'] ?? '')); ?></a>
                <?php else : ?>
                    <a data-fancybox href="#get-proposal" class="heading__btn btn btn-primary">Get Similar Results</a>
                <?php endif; ?>
                <?php if (is_array($case_btn_secondary) && !empty($case_btn_secondary['url'])) {
                    $link_url = $case_btn_secondary['url'];
                    $link_title = $case_btn_secondary['title'] ?? '';
                    $link_target = !empty($case_btn_secondary['target']) ? $case_btn_secondary['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                        class="heading__btn btn btn-grey"><?php echo esc_html($link_title); ?></a>
                <?php } ?>
            </div>
            <?php if (!empty($heading_trust_logos) && is_array($heading_trust_logos)) : ?>
                <div class="heading__trust service-page__trust">
                    <?php foreach ($heading_trust_logos as $trust_row) : ?>
                        <?php
                        $timg = isset($trust_row['logo']) && function_exists('stive_service_page_acf_image_attrs')
                            ? stive_service_page_acf_image_attrs($trust_row['logo'])
                            : array('url' => '', 'alt' => '');
                        if ($timg['url'] === '') {
                            continue;
                        }
                        ?>
                        <div class="service-page__trust-item">
                            <img class="service-page__trust-img"
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
                        src="<?php echo esc_url($case_image['url']); ?>"
                        alt="<?php echo esc_attr($case_image['alt'] ?? ''); ?>"
                        class="cover-image">
                </picture>
            </div>
        <?php elseif ($has_heading_image) : ?>
            <picture class="heading__image">
                <img
                    src="<?php echo esc_url($case_image['url']); ?>"
                    alt="<?php echo esc_attr($case_image['alt'] ?? ''); ?>"
                    class="cover-image">
            </picture>
        <?php else : ?>
            <picture class="heading__image"></picture>
        <?php endif; ?>
    </div>
</section>