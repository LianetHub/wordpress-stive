<?php
$llm_title = (string) stive_service_acf_value('service_intro_llm_title', '');
$llm_body = (string) stive_service_acf_value('service_intro_llm_body', '');
$case_ids = stive_service_intro_get_case_ids();

if ($llm_title === '' && $llm_body === '' && $case_ids === array()) {
    return;
}
?>
<section class="stive-section service-intro">
    <div class="container">
        <div class="service-intro__row">
            <?php if ($llm_title !== '' || $llm_body !== '') : ?>
                <div class="service-intro__content">
                    <?php if ($llm_title !== '') : ?>
                        <h2 class="service-intro__title"><?php echo esc_html($llm_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($llm_body !== '') : ?>
                        <div class="service-intro__body"><?php echo wp_kses_post($llm_body); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($case_ids !== array()) : ?>
                <div class="service-intro__cases-wrap">
                    <div class="service-intro__cases swiper">
                        <ul class="service-intro__cases-track swiper-wrapper">
                            <?php foreach ($case_ids as $case_id) : ?>
                                <?php
                                $extra_classes = 'swiper-slide';
                                include locate_template('components/parts/_case-card-white.php');
                                ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>