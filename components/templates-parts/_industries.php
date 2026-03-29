<?php
$industries = [
    [
        'title' => 'SaaS',
        'img_jpg'   => 'saas.jpg',
        'img_webp'   => 'saas.webp',
        'text'  => 'Artificial intelligence (AI) is rapidly transforming our world. It is being applied across various fields, from healthcare to finance.',
        'link'  => '#'
    ],
    [
        'title' => 'FinTech',
        'img_jpg'   => 'fintech.jpg',
        'img_webp'   => 'fintech.webp',
        'text'  => 'FinTech solutions are reshaping the future of banking and digital payments through secure AI algorithms.',
        'link'  => '#'
    ],
    [
        'title' => 'E-commerce',
        'img_jpg'   => 'ecommerce.jpg',
        'img_webp'   => 'ecommerce.webp',
        'text'  => 'Personalized shopping experiences driven by machine learning to increase conversion and loyalty.',
        'link'  => '#'
    ],
    [
        'title' => 'Healthcare',
        'img_jpg'   => 'healthcare.jpg',
        'img_webp'   => 'healthcare.webp',
        'text'  => 'AI-powered diagnostics and patient data management for modern medical institutions.',
        'link'  => '#'
    ],
    [
        'title' => 'Real Estate',
        'img_jpg'   => 'realestate.jpg',
        'img_webp'   => 'realestate.webp',
        'text'  => 'Smart property management and predictive analytics for the real estate market.',
        'link'  => '#'
    ],
];
?>

<div class="industries">
    <div class="container">
        <div class="industries__tabs swiper">
            <div class="swiper-wrapper">
                <?php foreach ($industries as $item) : ?>
                    <button class="industries__tab swiper-slide">
                        <?php echo $item['title']; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="industries__slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($industries as $item) : ?>
                    <a href="<?php echo $item['link']; ?>"
                        class="industries__slide swiper-slide">
                        <picture class="industries__slide-image">
                            <source srcset="<?php echo IMG_PATH . '/industries/' . $item['img_webp']; ?>" type="image/webp">
                            <img
                                src="<?php echo IMG_PATH . '/industries/' . $item['img_jpg']; ?>"
                                alt="<?php echo esc_attr($item['title']); ?>"
                                class="cover-image"
                                loading="lazy">
                        </picture>
                        <div class="industries__slide-content">
                            <p class="industries__slide-text"><?php echo $item['text']; ?></p>
                            <span class="industries__slide-arrow icon-arrow-top-right"></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>