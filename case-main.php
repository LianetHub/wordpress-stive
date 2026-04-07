<?php
/*
Template Name: Main Case
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>
<?php require_once(TEMPLATE_PATH . '_case-header.php'); ?>
<?php require_once(TEMPLATE_PATH . '_features.php'); ?>
<?php require_once(TEMPLATE_PATH . '_case-details.php'); ?>

<?php require_once(TEMPLATE_PATH . '_goals.php'); ?>
<article class="article">
    <div class="article__container container typography-block">
        <h2>Approach</h2>
        <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
        <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
        <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
        <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
    </div>
</article>
<?php require_once(TEMPLATE_PATH . '_results.php'); ?>
<?php require_once(TEMPLATE_PATH . '_conclusion.php'); ?>

<?php
$case_studies = [
    [
        'name'     => 'How we fixed casino reviews',
        'desc'     => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
        'img_webp' => 'case_study-1.webp',
        'img_jpg'  => 'case_study-1.jpg',
        'link'     => '#',
    ],
    [
        'name'     => '80% Organic Traffic Growth',
        'desc'     => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
        'img_webp' => 'case_study-2.webp',
        'img_jpg'  => 'case_study-2.jpg',
        'link'     => '#',
    ],
    [
        'name'     => 'YouTube & Reddit strategy',
        'desc'     => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
        'img_webp' => 'case_study-3.webp',
        'img_jpg'  => 'case_study-3.jpg',
        'link'     => '#',
    ]
];
?>

<?php if ($case_studies): ?>
    <section class="cases">
        <div class="cases__container container">
            <div class="cases__header">
                <h2 class="cases__title gradient-text title-xs">More Case Studies</h2>
                <a href="" class="cases__more btn btn-grey btn-md">All Cases</a>
            </div>
            <div class="cases__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($case_studies as $case): ?>
                        <?php include(locate_template('components/parts/_case-slide.php')); ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php require_once(TEMPLATE_PATH . '_contacts.php'); ?>

<?php get_footer(); ?>