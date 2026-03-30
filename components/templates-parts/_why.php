<?php
$why_cards = [
    [
        'id'        => 'ai',
        'title'     => 'AI-First <br>Approach',
        'img_png'   => 'ai-collage.png',
        'img_webp'  => 'ai-collage.webp',
        'alt'       => 'Integration of Gemini, Claude, and ChatGPT AI for business automation',
        'size'      => 'normal',
        'color'     => 'default',
    ],
    [
        'id'        => 'analysis',
        'title'     => 'In-house data&nbsp;analysis',
        'img_png'   => 'analysis.png',
        'img_webp'  => 'analysis.webp',
        'alt'       => 'Professional in-house data analysis and visualization dashboard',
        'size'      => 'wide',
        'color'     => 'default',
    ],
    [
        'id'        => 'reporting',
        'title'     => 'Transparent Reporting',
        'img_png'   => 'reporting.png',
        'img_webp'  => 'reporting.webp',
        'alt'       => 'Detailed marketing reports and transparent documentation in a folder',
        'size'      => 'tall',
        'color'     => 'secondary',
    ],
    [
        'id'        => 'strategy',
        'title'     => 'ROI-driven Strategy',
        'img_png'   => 'roi.png',
        'img_webp'  => 'roi.webp',
        'alt'       => 'Rising arrows symbolizing ROI-driven marketing strategy and financial growth',
        'size'      => 'wide',
        'color'     => 'primary',
    ],
    [
        'id'        => 'growth',
        'title'     => 'Cross-channel Growth',
        'img_png'   => 'growth.png',
        'img_webp'  => 'growth.webp',
        'alt'       => 'Omnichannel marketing growth showing connections between media, video, and social icons',
        'size'      => 'wide-tablet',
        'color'     => 'default',
    ],
];
?>

<section class="why">
    <div class="container">
        <h2 class="why__title title">Why Choose Us?</h2>
        <div class="why__slider swiper">
            <ul class="swiper-wrapper">
                <?php if (!empty($why_cards)) : ?>
                    <?php foreach ($why_cards as $card) : ?>
                        <?php include(locate_template('components/parts/_why-card.php')); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</section>