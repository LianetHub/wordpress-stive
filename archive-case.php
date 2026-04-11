<?php

?>

<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>


<?php
$logotypes = [
    [
        'img_webp' => 'logo-clutch.webp',
        'img_jpg'  => 'logo-clutch.jpg',
        'alt'      => 'Clutch logo'
    ],
    [
        'img_webp' => 'logo-techreviewer.webp',
        'img_jpg'  => 'logo-techreviewer.jpg',
        'alt'      => 'Techreviewer logo'
    ],
    [
        'img_webp' => 'logo-trustpilot.webp',
        'img_jpg'  => 'logo-trustpilot.jpg',
        'alt'      => 'Trustpilot logo'
    ],
    [
        'img_webp' => 'logo-marketinghub.webp',
        'img_jpg'  => 'logo-marketinghub.jpg',
        'alt'      => 'Marketinghub logo'
    ],
];
?>
<section class="cases-heading">
    <div class="cases-heading__container container">
        <div class="cases-heading__offer">
            <h1 class="cases-heading__title title-sm">Headline for&nbsp;Cases&nbsp;Page</h1>
            <p class="cases-heading__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
        </div>
        <div class="cases-heading__logotypes">
            <?php foreach ($logotypes as $logo): ?>
                <picture class="cases-heading__logotype">
                    <source
                        srcset="<?php echo IMG_PATH . '/solutions/' .  $logo['img_webp'] ?>"
                        type="image/webp">
                    <img
                        src="<?php echo IMG_PATH . '/solutions/' . $logo['img_jpg'] ?>"
                        alt="<?php echo $logo['alt'] ?>"
                        loading="lazy">
                </picture>
            <?php endforeach; ?>
        </div>
    </div>
</section>

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
        <div class="container">
            <h2 class="cases__title title">Case Studies</h2>
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

<?php require_once(TEMPLATE_PATH . '_ready-to-scale.php'); ?>



<?php get_footer(); ?>