<?php
defined('ABSPATH') || exit; //silence is gold
/*
 * Template Name: Main Home ACF
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php the_content(); ?>

<?php require_once(TEMPLATE_PATH . '_modal-get-proposal.php'); ?>



<?php get_footer(); ?>