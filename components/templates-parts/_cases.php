<?php
$case_studies = [
        [
                'class' => 'swiper-slide',
                'name' => 'How we fixed casino reviews',
                'desc' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
                'img_webp' => 'case_study-1.webp',
                'img_jpg' => 'case_study-1.jpg',
                'link' => '/coming-soon/',
        ],
        [
                'class' => 'swiper-slide',
                'name' => '80% Organic Traffic Growth',
                'desc' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
                'img_webp' => 'case_study-2.webp',
                'img_jpg' => 'case_study-2.jpg',
                'link' => '/coming-soon/',
        ],
        [
                'class' => 'swiper-slide',
                'name' => 'YouTube & Reddit strategy',
                'desc' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.",
                'img_webp' => 'case_study-3.webp',
                'img_jpg' => 'case_study-3.jpg',
                'link' => '/coming-soon/',
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