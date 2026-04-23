<?php
/*
Template Name: Main Case ACF Block
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php
$blocks = parse_blocks(get_the_content());

$output = '';
$standard_blocks_buffer = '';

function wrap_standard_content($content)
{
    if (empty(trim($content))) return '';
    return '<article id="case-content" class="article">
                <div class="article__container container typography-block">'
        . $content .
        '</div>
            </article>';
}

foreach ($blocks as $block) {
    if (strpos($block['blockName'], 'acf/') === 0) {
        if (!empty($standard_blocks_buffer)) {
            $output .= wrap_standard_content($standard_blocks_buffer);
            $standard_blocks_buffer = '';
        }
        $output .= render_block($block);
    } else {
        $standard_blocks_buffer .= render_block($block);
    }
}

if (!empty($standard_blocks_buffer)) {
    $output .= wrap_standard_content($standard_blocks_buffer);
}

echo apply_filters('the_content', $output);
?>


<?php get_footer(); ?>