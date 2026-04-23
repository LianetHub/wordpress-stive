<?php
$industries = [
        [
                'title' => 'SaaS',
                'img_jpg' => 'saas.jpg',
                'img_webp' => 'saas.webp',
                'text' => '78% of B2B buyers now research tools through AI. We make sure your product ranks #1 in LLM recommendations across your category.',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'FinTech',
                'img_jpg' => 'fintech.jpg',
                'img_webp' => 'fintech.webp',
                'text' => 'AI-driven search in finance is growing 3x year-over-year. We ensure your brand is cited accurately and recommended in every relevant query.',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'E-commerce',
                'img_jpg' => 'ecommerce.jpg',
                'img_webp' => 'ecommerce.webp',
                'text' => '1 in 4 shoppers already asks AI before purchasing. We turn ChatGPT, Perplexity, and Gemini into your highest-converting discovery channel.',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'Healthcare',
                'img_jpg' => 'healthcare.jpg',
                'img_webp' => 'healthcare.webp',
                'text' => '63% of patients check AI before choosing a provider. We make your brand the trusted answer LLMs give — with accurate, up-to-date citations.',
                'link' => '/coming-soon/'
        ],
        [
                'title' => 'Real Estate',
                'img_jpg' => 'realestate.jpg',
                'img_webp' => 'realestate.webp',
                'text' => 'AI-powered property search is up 140% in the last year. We position your brand as the go-to recommendation when buyers and agents ask AI for help.',
                'link' => '/coming-soon/'
        ],
];
?>

<div class="industries">
    <div class="container">
        <div class="industries__tabs swiper">
            <div class="swiper-wrapper">
                <?php foreach ($industries as $item) : ?>
                    <button class="industries__tab swiper-slide filter-btn">
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
                            <source srcset="<?php echo IMG_PATH . '/industries/' . $item['img_webp']; ?>"
                                    type="image/webp">
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