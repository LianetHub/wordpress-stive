<?php
$solutions = [
        [
                'title' => 'AI SEO &&nbsp;GEO Optimization',
                'img_webp' => 'optimization.webp',
                'img_jpg' => 'optimization.jpg',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'LLM Analytics &&nbsp;Audit',
                'img_webp' => 'analytics.webp',
                'img_jpg' => 'analytics.jpg',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'Ai Content &&nbsp;Automation',
                'img_webp' => 'automation.webp',
                'img_jpg' => 'automation.jpg',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'LLM Ads Management',
                'img_webp' => 'ads.webp',
                'img_jpg' => 'ads.jpg',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'LLM Reputation Management',
                'img_webp' => 'reputation.webp',
                'img_jpg' => 'reputation.jpg',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'LLM Brand Strategy',
                'img_webp' => 'strategy.webp',
                'img_jpg' => 'strategy.jpg',
                'link' => '/coming-soon/'
        ],
];

$logotypes = [
        [
                'img_webp' => 'logo-clutch.webp',
                'img_jpg' => 'logo-clutch.jpg',
                'alt' => 'Clutch logo'
        ],
        [
                'img_webp' => 'logo-techreviewer.webp',
                'img_jpg' => 'logo-techreviewer.jpg',
                'alt' => 'Techreviewer logo'
        ],
        [
                'img_webp' => 'logo-trustpilot.webp',
                'img_jpg' => 'logo-trustpilot.jpg',
                'alt' => 'Trustpilot logo'
        ],
        [
                'img_webp' => 'logo-marketinghub.webp',
                'img_jpg' => 'logo-marketinghub.jpg',
                'alt' => 'Marketinghub logo'
        ],
];


$logotypes = [
        ['img' => 'logo-clutch.webp', 'alt' => 'Clutch logo'],
        ['img' => 'logo-techreviewer.webp', 'alt' => 'Techreviewer logo'],
        ['img' => 'logo-trustpilot.webp', 'alt' => 'Trustpilot logo'],
        ['img' => 'logo-marketinghub.webp', 'alt' => 'Marketinghub logo'],
];
?>


<?php if ($solutions): ?>
    <section class="solutions">
        <div class="solutions__container container">
            <div class="solutions__header">
                <h2 class="solutions__title title gradient-text">
                    Our<br>
                    Solutions
                </h2>
                <?php if ($logotypes): ?>
                    <div class="solutions__logotypes">
                        <?php foreach ($logotypes as $logo): ?>
                            <div class="solutions__logotype">
                                <img
                                        src="<?php echo IMG_PATH . '/solutions/' . $logo['img']; ?>"
                                        alt="<?php echo esc_attr($logo['alt']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="solutions__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($solutions as $item): ?>
                        <?php include(locate_template('components/parts/_solution-slide.php')); ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="#" class="solutions__more btn btn-secondary">Explore All Solutions</a>
        </div>
    </section>
<?php endif; ?>