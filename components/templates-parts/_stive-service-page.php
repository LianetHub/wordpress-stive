<?php
if (!function_exists('stive_service_page_static_context')) {
    return;
}
$sp = stive_service_page_static_context();
?>
<?php if (!empty($sp['llm_title']) || !empty($sp['llm_body']) || !empty($sp['cases'])) : ?>
    <section class="service-page__band service-page__section">
        <div class="container">
            <div class="service-page__intro-row">
                <?php if (!empty($sp['llm_title']) || !empty($sp['llm_body'])) : ?>
                    <div class="service-page__intro">
                        <?php if (!empty($sp['llm_title'])) : ?>
                            <h2 class="service-page__intro-title"><?php echo esc_html((string) $sp['llm_title']); ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($sp['llm_body'])) : ?>
                            <div class="service-page__intro-body"><?php echo wp_kses_post((string) $sp['llm_body']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($sp['cases'])) : ?>
                    <div class="service-page__cases-wrap">
                        <div class="service-page__cases swiper">
                            <ul class="service-page__cases-track swiper-wrapper">
                                <?php foreach ($sp['cases'] as $case) : ?>
                                    <li class="service-page__case swiper-slide">
                                        <?php
                                        $cimg = isset($case['image']) ? stive_service_page_acf_image_attrs($case['image']) : stive_service_page_acf_image_attrs(null);
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
                                            <?php if (!empty($case['metrics'])) : ?>
                                                <div class="service-page__case-metrics">
                                                    <?php foreach ($case['metrics'] as $mrow) : ?>
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
<?php endif; ?>
<?php if (!empty($sp['included_title']) || !empty($sp['included_items'])) : ?>
    <section class="service-page__band service-page__section">
        <div class="container">
            <?php if (!empty($sp['included_title'])) : ?>
                <h2 class="service-page__section-title service-page__section-title--lg"><?php echo esc_html((string) $sp['included_title']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($sp['included_items'])) : ?>
                <div class="service-page__card-grid service-page__card-grid--included">
                    <?php foreach ($sp['included_items'] as $item) : ?>
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
<?php endif; ?>
<?php if (!empty($sp['process_steps'])) : ?>
    <?php
    $default_step_assets = array(
        array('img_webp' => 'audit-icon.webp', 'img_png' => 'audit-icon.png'),
        array('img_webp' => 'strategy-icon.webp', 'img_png' => 'strategy-icon.png'),
        array('img_webp' => 'optimization-icon.webp', 'img_png' => 'optimization-icon.png'),
        array('img_webp' => 'scale-icon.webp', 'img_png' => 'scale-icon.png'),
    );
    $steps = array();
    foreach ($sp['process_steps'] as $si => $pstep) {
        $art = isset($pstep['art']) ? stive_service_page_acf_image_attrs($pstep['art']) : stive_service_page_acf_image_attrs(null);
        $def = isset($default_step_assets[$si]) ? $default_step_assets[$si] : $default_step_assets[0];
        $title = isset($pstep['title']) ? (string) $pstep['title'] : '';
        if ($title === '' && !empty($pstep['number'])) {
            $title = (string) $pstep['number'];
        }
        if ($title === '') {
            continue;
        }
        $row = array(
            'title' => $title,
            'url' => '#steps',
            'active' => !empty($pstep['active']),
        );
        if ($art['url'] !== '') {
            $row['img_url'] = $art['url'];
            $row['img_alt'] = $art['alt'];
        } else {
            $row['img_webp'] = $def['img_webp'];
            $row['img_png'] = $def['img_png'];
        }
        $steps[] = $row;
    }
    $steps_tpl = locate_template('acf-components/block-stive-front-services-steps.php');
    ?>
    <?php if (!empty($steps) && $steps_tpl) : ?>
        <section class="service-page__band service-page__section">
            <?php require $steps_tpl; ?>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php if (!empty($sp['challenges_title']) || !empty($sp['challenges'])) : ?>
    <section class="service-page__band service-page__section">
        <div class="container">
            <?php if (!empty($sp['challenges_title'])) : ?>
                <h2 class="service-page__section-title service-page__section-title--lg"><?php echo esc_html((string) $sp['challenges_title']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($sp['challenges'])) : ?>
                <div class="service-page__card-grid service-page__card-grid--challenges">
                    <?php foreach ($sp['challenges'] as $ch) : ?>
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
<?php endif; ?>
<?php if (!empty($sp['testimonials_title']) || !empty($sp['testimonials'])) : ?>
    <section class="service-page__band service-page__section">
        <div class="container">
            <?php if (!empty($sp['testimonials_title'])) : ?>
                <h2 class="service-page__section-title service-page__section-title--md"><?php echo esc_html((string) $sp['testimonials_title']); ?></h2>
            <?php endif; ?>
            <?php
            $through_testimonials_sliders = array();
            if (!empty($sp['testimonials'])) {
                foreach ($sp['testimonials'] as $t) {
                    $through_testimonials_sliders[] = array(
                        'tag' => 'li',
                        'class' => 'swiper-slide',
                        'name' => isset($t['name']) ? (string) $t['name'] : '',
                        'title' => isset($t['role']) ? (string) $t['role'] : '',
                        'rating' => isset($t['rating']) ? (int) $t['rating'] : 5,
                        'text' => isset($t['quote']) ? (string) $t['quote'] : '',
                    );
                }
            }
            $testimonials_tpl = locate_template('acf-components/block-stive-other-testimonials.php');
            if ($testimonials_tpl) {
                require $testimonials_tpl;
            }
            ?>
        </div>
    </section>
<?php endif; ?>
<?php
$faq_section_title = !empty($sp['faq_title']) ? (string) $sp['faq_title'] : 'Frequently Asked Questions';
$faq_items = array();
if (!empty($sp['faq_items'])) {
    foreach ($sp['faq_items'] as $faq_row) {
        $fq = isset($faq_row['question']) ? (string) $faq_row['question'] : '';
        $fa = isset($faq_row['answer']) ? (string) $faq_row['answer'] : '';
        if ($fq === '' || $fa === '') {
            continue;
        }
        $faq_items[] = array(
            'question' => $fq,
            'answer' => wp_strip_all_tags($fa),
        );
    }
}
$faq_tpl = locate_template('components/templates-parts/_faq.php');
?>
<?php if ($faq_tpl && !empty($faq_items)) : ?>
    <div class="service-page__band service-page__section">
        <?php require $faq_tpl; ?>
    </div>
<?php endif; ?>
<?php if (!empty($sp['contact_title']) || !empty($sp['contact_text']) || $sp['contact_map']['url'] !== '') : ?>
    <section class="service-page__contact service-page__section">
        <?php if ($sp['contact_map']['url'] !== '') : ?>
            <div class="service-page__contact-map" aria-hidden="true">
                <img class="service-page__contact-map-img"
                    src="<?php echo esc_url($sp['contact_map']['url']); ?>"
                    alt="">
            </div>
        <?php endif; ?>
        <div class="container service-page__contact-inner">
            <?php if (!empty($sp['contact_title'])) : ?>
                <h2 class="service-page__contact-title"><?php echo esc_html((string) $sp['contact_title']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($sp['contact_text'])) : ?>
                <div class="service-page__contact-text"><?php echo wp_kses_post((string) $sp['contact_text']); ?></div>
            <?php endif; ?>
            <?php if ($sp['contact_cta_primary']['url'] !== '' || $sp['contact_cta_secondary']['url'] !== '') : ?>
                <div class="service-page__actions service-page__actions--contact">
                    <?php if ($sp['contact_cta_primary']['url'] !== '') : ?>
                        <a class="service-page__btn service-page__btn--primary"
                            href="<?php echo esc_url($sp['contact_cta_primary']['url']); ?>"
                            target="<?php echo esc_attr($sp['contact_cta_primary']['target']); ?>"><?php echo esc_html($sp['contact_cta_primary']['title']); ?></a>
                    <?php endif; ?>
                    <?php if ($sp['contact_cta_secondary']['url'] !== '') : ?>
                        <a class="service-page__btn service-page__btn--secondary"
                            href="<?php echo esc_url($sp['contact_cta_secondary']['url']); ?>"
                            target="<?php echo esc_attr($sp['contact_cta_secondary']['target']); ?>"><?php echo esc_html($sp['contact_cta_secondary']['title']); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($sp['contact_trust'])) : ?>
                <div class="service-page__contact-trust">
                    <?php foreach ($sp['contact_trust'] as $crow) : ?>
                        <?php
                        $cimg = isset($crow['logo']) ? stive_service_page_acf_image_attrs($crow['logo']) : stive_service_page_acf_image_attrs(null);
                        if ($cimg['url'] === '') {
                            continue;
                        }
                        ?>
                        <div class="service-page__contact-trust-item">
                            <img class="service-page__contact-trust-img"
                                src="<?php echo esc_url($cimg['url']); ?>"
                                alt="<?php echo esc_attr($cimg['alt']); ?>"
                                loading="lazy"
                                width="220"
                                height="80">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>