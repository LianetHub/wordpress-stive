<?php
$steps = [
    [
        'title'    => 'Audit & Research',
        'img_webp' => 'options-audit-icon.webp',
        'img_jpg'  => 'options-audit-icon.jpg',
        'url'      => '#',
        'active'   => true,
    ],
    [
        'title'    => 'Strategy & Planning',
        'img_webp' => 'options-strategy-icon.webp',
        'img_jpg'  => 'options-strategy-icon.jpg',
        'url'      => '#',
        'active'   => false,
    ],
    [
        'title'    => 'AI Optimization & Exeсution',
        'img_webp' => 'options-optimization-icon.webp',
        'img_jpg'  => 'options-optimization-icon.jpg',
        'url'      => '#',
        'active'   => false,
    ],
    [
        'title'    => 'Scale & Reporting',
        'img_webp' => 'options-scale-icon.webp',
        'img_jpg'  => 'options-scale-icon.jpg',
        'url'      => '#',
        'active'   => false,
    ],
];
?>

<div class="steps">
    <div class="container">
        <ol class="steps__list">
            <?php
            // Выносим общие градиенты, чтобы не дублировать ID в DOM
            ?>
            <svg width="0" height="0" style="position:absolute;z-index:-1;">
                <defs>
                    <linearGradient id="fill-grad-active" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#fff" stop-opacity="0.18" />
                        <stop offset="76%" stop-color="#fff" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="stroke-grad-active" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#fff" stop-opacity="1" />
                        <stop offset="65%" stop-color="#fff" stop-opacity="0" />
                    </linearGradient>
                    <linearGradient id="stroke-grad-inactive" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" stop-color="#19D6C7" />
                        <stop offset="100%" stop-color="#F5F5F5" />
                    </linearGradient>
                </defs>
            </svg>

            <?php foreach ($steps as $key => $step) :
                $num = sprintf('%02d', $key + 1);
                $isActive = $step['active'];
            ?>
                <li class="steps__item<?php echo $isActive ? ' active' : ''; ?>">
                    <a href="<?php echo esc_url($step['url']); ?>" class="steps__item-wrapper">
                        <picture class="steps__item-image">
                            <source
                                srcset="<?php echo IMG_PATH . '/' . $step['img_webp']; ?>"
                                type="image/webp">
                            <img src="<?php echo IMG_PATH . '/' . $step['img_jpg']; ?>"
                                alt="<?php echo esc_attr($step['title']); ?>"
                                loading="lazy">
                        </picture>

                        <div class="steps__item-bottom">
                            <div class="steps__item-num">
                                <svg width="170" height="128" viewBox="0 0 170 128">
                                    <text
                                        x="0"
                                        y="120"
                                        fill="<?php echo $isActive ? 'url(#fill-grad-active)' : 'none'; ?>"
                                        stroke="<?php echo $isActive ? 'url(#stroke-grad-active)' : 'url(#stroke-grad-inactive)'; ?>"
                                        stroke-width="1">
                                        <?php echo $num; ?>
                                    </text>
                                </svg>
                            </div>
                            <h3 class="steps__item-title title"><?php echo esc_html($step['title']); ?></h3>
                            <div class="steps__item-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="15" viewBox="0 0 43 15" fill="none">
                                    <path d="M41.7193 8.07088C42.1098 7.68035 42.1098 7.04719 41.7193 6.65666L35.3553 0.292702C34.9648 -0.0978227 34.3316 -0.0978227 33.9411 0.292702C33.5506 0.683226 33.5506 1.31639 33.9411 1.70692L39.598 7.36377L33.9411 13.0206C33.5506 13.4111 33.5506 14.0443 33.9411 14.4348C34.3316 14.8254 34.9648 14.8254 35.3553 14.4348L41.7193 8.07088ZM0 7.36377L0 8.36377L41.0122 8.36377V7.36377V6.36377L0 6.36377L0 7.36377Z" fill="white" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>