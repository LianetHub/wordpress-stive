<?php

if (!defined('ABSPATH')) {
    exit;
}

$heading = function_exists('stive_service_archive_heading_get_context')
    ? stive_service_archive_heading_get_context()
    : array();

$calendly = isset($heading['calendly']) && is_array($heading['calendly'])
    ? $heading['calendly']
    : array('url' => '', 'title' => '', 'target' => '_self');
$calendly_url = (string) ($calendly['url'] ?? '');
?>

<section class="heading heading--services heading--services-archive">
    <div class="heading__container container">
        <div class="heading__main">
            <?php if (!empty($heading['title_html'])) : ?>
                <h1 class="heading__title title-sm"><?php echo wp_kses_post((string) $heading['title_html']); ?></h1>
            <?php endif; ?>
            <?php if (!empty($heading['description'])) : ?>
                <p class="heading__description"><?php echo wp_kses_post((string) $heading['description']); ?></p>
            <?php endif; ?>
            <div class="heading__actions">
                <?php if ($calendly_url !== '') : ?>
                    <a href="<?php echo esc_url($calendly_url); ?>"
                        data-calendly
                        class="heading__btn btn btn-primary"
                        target="<?php echo esc_attr((string) ($calendly['target'] ?? '_self')); ?>"><?php echo esc_html((string) ($calendly['title'] ?? __('Book Strategy Call', 'stive'))); ?></a>
                <?php endif; ?>
                <a href="#get-proposal"
                    data-fancybox
                    class="heading__btn btn btn-grey"><?php esc_html_e('Get Proposal', 'stive'); ?></a>
            </div>
        </div>
    </div>
</section>
