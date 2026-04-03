<?php
/*
Template Name: Main Case
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<section class="case">
    <div class="case__container container">
        <div class="case__main">
            <div class="case__categories">
                <a href="" class="case__category">Category</a>
                <a href="" class="case__category">Category</a>
                <a href="" class="case__category">Category</a>
            </div>
            <h1 class="case__title title-sm">Case Headline <br> Key Result + Client Name</h1>
            <p class="case__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
            <div class="case__actions">
                <a href="" class="case__btn btn btn-primary">Get Similar Results</a>
                <a href="" class="case__btn btn btn-grey">See How We Did It</a>
            </div>
        </div>
        <picture class="case__image">
            <source
                srcset="<?php echo IMG_PATH . '/cases/case_study-1.webp' ?>"
                type="image/webp">
            <img
                src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>"
                alt="case image"
                class="cover-image">
        </picture>
    </div>
</section>

<?php get_footer(); ?>