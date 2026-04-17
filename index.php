<?php
defined('ABSPATH') || exit; //silence is gold
?>
<?php $page_id = $post->ID; ?>
<?php get_header();
echo get_the_title();
the_content();
echo $page_id;

get_footer(); ?>
