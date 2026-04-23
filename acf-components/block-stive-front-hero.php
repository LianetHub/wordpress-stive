<?php
$hero_services = [
        [
                'img' => 'img-grok',
                'alt' => 'grok AI',
                'class' => 'img-top-left'
        ],
        [
                'img' => 'img-copilot',
                'alt' => 'copilot AI',
                'class' => 'img-bottom-left'
        ],
        [
                'img' => 'img-claude',
                'alt' => 'claude AI',
                'class' => 'img-center'
        ],
        [
                'img' => 'img-gpt',
                'alt' => 'chat gpt AI',
                'class' => 'img-top-right'
        ],
        [
                'img' => 'img-gemini',
                'alt' => 'gemini AI',
                'class' => 'img-bottom-right'
        ],
];

$hero_features = [
        [
                'img' => 'badge-place',
                'alt' => 'LLM Marketing',
                'text' => '#1 in LLM Marketing',
                'class' => 'place'
        ],
        [
                'img' => 'badge-rating',
                'alt' => 'Quality Rating',
                'text' => '4.9 Quality Rating',
                'class' => ''
        ],
        [
                'img' => 'badge-trust',
                'alt' => 'Leaders Trust Us',
                'text' => 'Leaders Trust Us',
                'class' => 'hidden-mobile'
        ],
];
?>

<section class="hero">
    <div class="hero__container container">
        <div class="hero__left">
            <span class="hero__tagline">YOUR RIGHT CHOICE</span>
            <h1 class="hero__title title-lg gradient-text">AI Integration in Marketing & Sales</h1>
            <p class="hero__desc">We help founders turn AI from a buzzword into measurable revenue — with real workflows, not slideware.</p>
            <div class="hero__btns">
                <a href="#get-proposal" class="hero__btn btn btn-secondary" data-fancybox>
                    Get Your Proposal
                </a>
                <a href="https://wa.me/48572520447"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="hero__btn btn btn-tertiary icon-whatsapp">
                    Chat with Us
                </a>
            </div>
        </div>

        <div class="hero__right">
            <div class="hero__right-services">
                <?php foreach ($hero_services as $service) : ?>
                    <picture class="hero__right-service <?php echo $service['class']; ?>">
                        <source
                                srcset="<?php echo IMG_PATH . '/hero/' . $service['img']; ?>.webp"
                                type="image/webp">
                        <img src="<?php echo IMG_PATH . '/hero/' . $service['img']; ?>.png"
                             alt="<?php echo esc_attr($service['alt']); ?>">
                    </picture>
                <?php endforeach; ?>

                <div class="hero__badges">
                    <div class="hero__badge hero__badge--primary">AI Visibility</div>
                    <div class="hero__badge hero__badge--secondary">Free Check</div>
                </div>
            </div>

            <form action="/coming-soon/" class="hero__form">
                <div class="hero__form-caption">Do AI Models Know About&nbsp;Your Brand?</div>
                <div class="hero__form-row">
                    <input type="text" name="website_url" class="form__control form__control--large"
                           placeholder="Enter your website url here">
                    <button class="hero__form-submit btn btn-secondary">Free Check Now!</button>
                </div>
            </form>

            <ul class="hero__features">
                <?php foreach ($hero_features as $feature) : ?>
                    <li class="hero__feature <?php echo $feature['class']; ?>">
                        <picture class="hero__feature-icon">
                            <source
                                    srcset="<?php echo IMG_PATH . '/hero/' . $feature['img']; ?>.webp"
                                    type="image/webp">
                            <img
                                    src="<?php echo IMG_PATH . '/hero/' . $feature['img']; ?>.png"
                                    alt="<?php echo esc_attr($feature['alt']); ?>"
                                    class="cover-image">
                        </picture>
                        <span class="hero__feature-text"><?php echo esc_html($feature['text']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>