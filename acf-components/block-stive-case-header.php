<?php
if (function_exists('stive_service_debug_template_loaded')) {
    stive_service_debug_template_loaded(__FILE__);
}

// Service pages use block-stive-service-header only (Gutenberg acf/service-header).
if (
    defined('STIVE_SERVICE_POST_TYPE')
    && is_singular(STIVE_SERVICE_POST_TYPE)
    && empty($stive_allow_case_header_on_service)
) {
    return;
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
?>
<section class="heading heading--cases">
    <div class="heading__container container">
        <div class="heading__main">
            <?php
            $case_categories = function_exists('display_category_and_tag_terms')
                ? display_category_and_tag_terms(get_the_ID(), 'case-list', 'a', 'heading__categories label-badge')
                : '';
            if (!empty($case_categories)) { ?>
                <div class="heading__categories">
                    <?php echo $case_categories; ?>
                </div>
            <?php } ?>
            <h1 class="heading__title title-xs"><?php echo esc_html((string) $case_title); ?></h1>
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
        </div>
        <picture class="heading__image">
            <?php if (!empty($case_image) && !empty($case_image['url'])) { ?>
                <img
                    src="<?php echo esc_url($case_image['url']); ?>"
                    alt="<?php echo esc_attr($case_image['alt'] ?? ''); ?>"
                    class="cover-image">
            <?php } ?>
        </picture>
    </div>
</section>