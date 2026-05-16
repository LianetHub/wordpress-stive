<?php
$contact_title = function_exists('get_field') ? (string) get_field('service_contact_title') : '';
$contact_text = function_exists('get_field') ? (string) get_field('service_contact_text') : '';
$contact_map = function_exists('get_field') && function_exists('stive_service_page_acf_image_attrs')
    ? stive_service_page_acf_image_attrs(get_field('service_contact_map'))
    : array('url' => '', 'alt' => '');
$contact_cta_primary = function_exists('get_field') && function_exists('stive_service_page_acf_link')
    ? stive_service_page_acf_link(get_field('service_contact_cta_primary'))
    : array('url' => '', 'title' => '', 'target' => '_self');
$contact_cta_secondary = function_exists('get_field') && function_exists('stive_service_page_acf_link')
    ? stive_service_page_acf_link(get_field('service_contact_cta_secondary'))
    : array('url' => '', 'title' => '', 'target' => '_self');
$contact_trust = function_exists('get_field') ? get_field('service_contact_trust') : array();
$contact_trust = is_array($contact_trust) ? $contact_trust : array();

if ($contact_title === '' && $contact_text === '' && $contact_map['url'] === '') {
    return;
}
?>
<section class="service-contact">
    <?php if ($contact_map['url'] !== '') : ?>
        <div class="service-contact__map" aria-hidden="true">
            <img class="service-contact__map-img"
                src="<?php echo esc_url($contact_map['url']); ?>"
                alt="">
        </div>
    <?php endif; ?>
    <div class="container service-contact__inner">
        <?php if ($contact_title !== '') : ?>
            <h2 class="service-contact__title"><?php echo esc_html($contact_title); ?></h2>
        <?php endif; ?>
        <?php if ($contact_text !== '') : ?>
            <div class="service-contact__text"><?php echo wp_kses_post($contact_text); ?></div>
        <?php endif; ?>
        <?php if ($contact_cta_primary['url'] !== '' || $contact_cta_secondary['url'] !== '') : ?>
            <div class="stive-cta service-contact__cta">
                <?php if ($contact_cta_primary['url'] !== '') : ?>
                    <a class="stive-cta__btn stive-cta__btn--primary"
                        href="<?php echo esc_url($contact_cta_primary['url']); ?>"
                        target="<?php echo esc_attr($contact_cta_primary['target']); ?>"><?php echo esc_html($contact_cta_primary['title']); ?></a>
                <?php endif; ?>
                <?php if ($contact_cta_secondary['url'] !== '') : ?>
                    <a class="stive-cta__btn stive-cta__btn--secondary"
                        href="<?php echo esc_url($contact_cta_secondary['url']); ?>"
                        target="<?php echo esc_attr($contact_cta_secondary['target']); ?>"><?php echo esc_html($contact_cta_secondary['title']); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($contact_trust !== array()) : ?>
            <div class="service-contact__trust">
                <?php foreach ($contact_trust as $crow) : ?>
                    <?php
                    if (!is_array($crow)) {
                        continue;
                    }
                    $cimg = isset($crow['logo']) && function_exists('stive_service_page_acf_image_attrs')
                        ? stive_service_page_acf_image_attrs($crow['logo'])
                        : array('url' => '', 'alt' => '');
                    if ($cimg['url'] === '') {
                        continue;
                    }
                    ?>
                    <div class="service-contact__trust-item">
                        <img class="service-contact__trust-img"
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