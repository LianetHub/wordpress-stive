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

<?php require_once(TEMPLATE_PATH . '_cases.php'); ?>

<?php require_once(TEMPLATE_PATH . '_why.php'); ?>

<?php require_once(TEMPLATE_PATH . '_industries.php'); ?>

<?php require_once(TEMPLATE_PATH . '_events-articles.php'); ?>

<?php require_once(TEMPLATE_PATH . '_services-steps.php'); ?>

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>

<?php require_once(TEMPLATE_PATH . '_book.php'); ?>

<dialog
    class="popup"
    id="get-proposal"
    aria-labelledby="proposal-title">
    <h2 class="popup__title title-sm gradient-text" id="proposal-title">Get Proposal</h2>
    <div class="popup__form">
        <?php echo do_shortcode('[contact-form-7 id="7c8db98" title="Get Proposal"]'); ?>
    </div>
</dialog>



<?php get_footer(); ?>