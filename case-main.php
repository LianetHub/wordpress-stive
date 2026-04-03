<?php
/*
Template Name: Main Case
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article
            id="post-<?php the_ID(); ?>"
            <?php body_class('case-page'); ?>>

            <section class="case-hero">
                <div class="container">
                    <h1 class="case-hero__title"><?php the_title(); ?></h1>
                </div>
            </section>

        </article>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>