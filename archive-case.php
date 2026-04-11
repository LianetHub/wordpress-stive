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

<section class="main-case">
    <div class="main-case__container container">
        <a href="" class="main-case__offer">
            <picture class="main-case__poster">
                <source
                    srcset="<?php echo IMG_PATH . '/cases/case_study-2.webp'  ?>"
                    type="image/webp">
                <img
                    src="<?php echo IMG_PATH . '/cases/case_study-2.jpg'  ?>"
                    alt="Case Poster"
                    class="cover-image">
            </picture>
            <h1 class="main-case__caption title-sm">
                Case Headline <br>
                Key Result + Client Name
            </h1>
        </a>
        <div class="main-case__details">
            <div class="main-case__person person">
                <div class="person__thumb">
                    <img src="<?php echo IMG_PATH ?>/user-thumb.png"
                        class="cover-image"
                        alt="person avatar">
                </div>
                <div class="person__info">
                    <div class="person__name title-xs gradient-text">Client Name</div>
                    <div class="person__position">industry / product type</div>
                </div>
            </div>
            <p class="main-case__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
            <ul class="main-case__list metrics">
                <li class="metrics__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="main-case__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="main-case__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
                <li class="main-case__item">
                    <div class="metrics__item-label">METRIC LABEL</div>
                    <div class="metrics__item-value">[+X%]</div>
                </li>
            </ul>
            <div class="main-case__footer">
                <div class="main-case__categories">
                    <a href="" class="main-case__category label-badge label-badge--medium">Service 1</a>
                    <a href="" class="main-case__category label-badge label-badge--medium">Service 2</a>
                    <a href="" class="main-case__category label-badge label-badge--medium">Service 3</a>
                </div>
                <a href="" class="main-case__btn btn btn-primary">Read Full Case</a>
            </div>
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