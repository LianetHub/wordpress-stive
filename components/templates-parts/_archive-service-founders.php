<?php

if (!defined('ABSPATH')) {
    exit;
}

$founders = function_exists('stive_service_archive_founders_get_context')
    ? stive_service_archive_founders_get_context()
    : array();

$modules = isset($founders['modules']) && is_array($founders['modules']) ? $founders['modules'] : array();
$btn_primary = isset($founders['btn_primary']) && is_array($founders['btn_primary']) ? $founders['btn_primary'] : array();
$btn_secondary = isset($founders['btn_secondary']) && is_array($founders['btn_secondary']) ? $founders['btn_secondary'] : array();

$primary_url = (string) ($btn_primary['url'] ?? '');
$secondary_url = (string) ($btn_secondary['url'] ?? '');
?>

<section class="founders-ai">
    <div class="container">
        <div class="founders-ai__card">
            <?php if (!empty($founders['pretitle'])) : ?>
                <div class="founders-ai__pretitle">
                    <span class="founders-ai__pretitle-text"><?php echo esc_html((string) $founders['pretitle']); ?></span>
                    <span class="founders-ai__pretitle-line" aria-hidden="true"></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($founders['eyebrow'])) : ?>
                <p class="founders-ai__eyebrow"><?php echo esc_html((string) $founders['eyebrow']); ?></p>
            <?php endif; ?>
            <?php if (!empty($founders['title'])) : ?>
                <h2 class="founders-ai__title"><?php echo esc_html((string) $founders['title']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($founders['description'])) : ?>
                <p class="founders-ai__desc"><?php echo wp_kses_post((string) $founders['description']); ?></p>
            <?php endif; ?>

            <?php if ($modules !== array()) : ?>
                <ul class="founders-ai__modules">
                    <?php foreach ($modules as $module) : ?>
                        <?php if (!is_array($module)) {
                            continue;
                        } ?>
                        <li class="founders-ai__module">
                            <span class="founders-ai__module-num"><?php echo esc_html((string) ($module['num'] ?? '')); ?></span>
                            <span class="founders-ai__module-title"><?php echo esc_html((string) ($module['title'] ?? '')); ?></span>
                            <span class="founders-ai__module-text"><?php echo esc_html((string) ($module['text'] ?? '')); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if ($primary_url !== '' || $secondary_url !== '') : ?>
                <div class="founders-ai__actions">
                    <?php if ($primary_url !== '') : ?>
                        <a href="<?php echo esc_url($primary_url); ?>"
                            data-calendly
                            class="founders-ai__btn btn btn-grey"
                            target="<?php echo esc_attr((string) ($btn_primary['target'] ?? '_self')); ?>"><?php echo esc_html((string) ($btn_primary['title'] ?? '')); ?></a>
                    <?php endif; ?>
                    <?php if ($secondary_url !== '') : ?>
                        <a href="<?php echo esc_url($secondary_url); ?>"
                            class="founders-ai__btn btn btn-primary"
                            target="<?php echo esc_attr((string) ($btn_secondary['target'] ?? '_self')); ?>"><?php echo esc_html((string) ($btn_secondary['title'] ?? '')); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
