<?php
/*
Template Name: Main Case ACF Block
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>
<?php the_content(); ?>
<?php get_footer(); ?>