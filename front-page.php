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

<div class="modal-overlay" id="proposal-form" data-modal>
    <div class="form">
        <div class="form-header">
            <h5>Get Proposal</h5>
            <div class="form-header__close" data-modal-close>
                <svg
                    width="17"
                    height="17"
                    viewBox="0 0 17 17"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.662 13.835L11.16 8.33198L16.66 2.82998L13.833 -2.28882e-05L8.33 5.50198L2.828 -2.28882e-05L0 2.82998L5.5 8.33198L0 13.834L2.83 16.662L8.33 11.16L13.83 16.662L16.662 13.835Z"
                        fill="#7C8698" />
                </svg>
            </div>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="7c8db98" title="Get Proposal"]'); ?>
    </div>
</div>

<?php get_footer(); ?>