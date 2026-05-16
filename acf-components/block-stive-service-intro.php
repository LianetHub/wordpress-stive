<?php
$llm_title = function_exists('get_field') ? (string) get_field('service_intro_llm_title') : '';
$llm_body = function_exists('get_field') ? (string) get_field('service_intro_llm_body') : '';
$cases = function_exists('get_field') ? get_field('service_intro_cases') : array();
$cases = is_array($cases) ? $cases : array();

if ($llm_title === '' && $llm_body === '' && $cases === array()) {
    return;
}
?>
<section class="service-page__band service-page__section">
    <div class="container">
        <div class="service-page__intro-row">
            <?php if ($llm_title !== '' || $llm_body !== '') : ?>
                <div class="service-page__intro">
                    <?php if ($llm_title !== '') : ?>
                        <h2 class="service-page__intro-title"><?php echo esc_html($llm_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($llm_body !== '') : ?>
                        <div class="service-page__intro-body"><?php echo wp_kses_post($llm_body); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($cases !== array()) : ?>
                <div class="service-page__cases-wrap">
                    <div class="service-page__cases swiper">
                        <ul class="service-page__cases-track swiper-wrapper">
                            <?php foreach ($cases as $case) : ?>
                                <?php if (!is_array($case)) {
                                    continue;
                                } ?>
                                <li class="service-page__case swiper-slide">
                                    <?php
                                    $cimg = isset($case['image']) && function_exists('stive_service_page_acf_image_attrs')
                                        ? stive_service_page_acf_image_attrs($case['image'])
                                        : array('url' => '', 'alt' => '');
                                    ?>
                                    <?php if ($cimg['url'] !== '') : ?>
                                        <div class="service-page__case-thumb">
                                            <img class="service-page__case-thumb-img"
                                                src="<?php echo esc_url($cimg['url']); ?>"
                                                alt="<?php echo esc_attr($cimg['alt']); ?>"
                                                loading="lazy">
                                        </div>
                                    <?php endif; ?>
                                    <div class="service-page__case-body">
                                        <?php if (!empty($case['title'])) : ?>
                                            <h3 class="service-page__case-title"><?php echo esc_html((string) $case['title']); ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($case['description'])) : ?>
                                            <div class="service-page__case-desc"><?php echo wp_kses_post((string) $case['description']); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($case['metrics']) && is_array($case['metrics'])) : ?>
                                            <div class="service-page__case-metrics">
                                                <?php foreach ($case['metrics'] as $mrow) : ?>
                                                    <?php if (!is_array($mrow)) {
                                                        continue;
                                                    } ?>
                                                    <div class="service-page__case-metric">
                                                        <?php if (!empty($mrow['metric_label'])) : ?>
                                                            <span class="service-page__case-metric-label"><?php echo esc_html((string) $mrow['metric_label']); ?></span>
                                                        <?php endif; ?>
                                                        <?php if (!empty($mrow['metric_value'])) : ?>
                                                            <span class="service-page__case-metric-value"><?php echo esc_html((string) $mrow['metric_value']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>