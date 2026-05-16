<?php
$faq_section_title = function_exists('get_field') ? (string) get_field('service_faq_title') : 'Frequently Asked Questions';
$faq_rows = function_exists('get_field') ? get_field('service_faq_items') : array();
$faq_rows = is_array($faq_rows) ? $faq_rows : array();

$faq_items = array();
foreach ($faq_rows as $faq_row) {
    if (!is_array($faq_row)) {
        continue;
    }
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

if ($faq_items === array()) {
    return;
}

$faq_title_class = 'faq__title title-xs gradient-text';

$faq_tpl = locate_template('components/templates-parts/_faq.php');
if (!$faq_tpl) {
    return;
}
?>
<section class="stive-section service-faq">
    <?php require $faq_tpl; ?>
</section>