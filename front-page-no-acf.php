<?php
defined('ABSPATH') || exit; //silence is gold
/*
 * Template Name: Main Home
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>


<?php require_once(TEMPLATE_PATH . '_hero.php'); ?>

<?php require_once(TEMPLATE_PATH . '_testimonials.php'); ?>

<?php require_once(TEMPLATE_PATH . '_solutions.php'); ?>

<?php the_content(); ?>

<?php require_once(TEMPLATE_PATH . '_why.php'); ?>

<?php require_once(TEMPLATE_PATH . '_industries.php'); ?>

<?php require_once(TEMPLATE_PATH . '_events-articles.php'); ?>

<?php require_once(TEMPLATE_PATH . '_services-steps.php'); ?>

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>

<?php require_once(TEMPLATE_PATH . '_book.php'); ?>

<?php require_once(TEMPLATE_PATH . '_modal-get-proposal.php'); ?>



<?php get_footer(); ?>