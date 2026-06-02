<?php
$service_cards = [
    [
        'num' => '01',
        'title' => 'AI SEO & GEO Optimization',
        'text' => 'Get your brand into the answers AI gives. We optimize your content and authority signals so ChatGPT, Perplexity, and Google AI recommend you — not your competitors.',
        'tags' => 'AI SEO · GEO · LLM',
    ],
    [
        'num' => '02',
        'title' => 'LLM Analytics & Audit',
        'text' => 'Find out where you stand before your competitors do. We audit your current AI visibility across all major LLMs and deliver a clear roadmap to ranking first in your category.',
        'tags' => 'AUDIT · ANALYTICS · LLM',
    ],
    [
        'num' => '03',
        'title' => 'AI Content & Automation',
        'text' => 'Scale content that AI actually cites. We build automated workflows that produce LLM-ready articles, structured data, and authority signals — without bloating your team.',
        'tags' => 'CONTENT · AUTOMATION · AI',
    ],
    [
        'num' => '04',
        'title' => 'LLM Ads Management',
        'text' => 'The first AI-native ad channel is here. We manage your brand\'s presence in LLM-powered ad placements — from ChatGPT Ads to AI Overview sponsorships — and optimize for AI-driven conversions.',
        'tags' => 'ADS · LLM · PAID',
    ],
    [
        'num' => '05',
        'title' => 'LLM Reputation Management',
        'text' => 'Control the narrative AI tells about your brand. We monitor, correct, and improve how large language models describe you — ensuring every AI mention is accurate, positive, and conversion-ready.',
        'tags' => 'ORM · SERM · LLM',
    ],
    [
        'num' => '06',
        'title' => 'LLM Brand Strategy',
        'text' => 'Build a brand that AI wants to recommend. We design your positioning, messaging, and authority architecture so LLMs consistently surface you as the category leader.',
        'tags' => 'BRAND · STRATEGY · LLM',
    ],
    [
        'num' => '07',
        'title' => 'AI Influencer Marketing',
        'text' => 'Hyper-realistic AI personas on Instagram, TikTok & YouTube — 180 videos per month, any niche, any language, any geo. Human influencers are a subscription. AI influencers are an asset you own forever.',
        'tags' => 'CONTENT · INFLUENCE · AI',
    ],
];

$service_stats = [
    ['value' => '180', 'label' => 'videos/month'],
    ['value' => '200M+', 'label' => 'reach in 5 months'],
    ['value' => '100%', 'label' => 'owned by you'],
];

$grid_rows = [
    array_slice($service_cards, 0, 3),
    array_slice($service_cards, 3, 3),
];
$bottom_card = $service_cards[6];
?>

<section class="services-archive">
    <div class="container">
        <div class="services-archive__grid">
            <?php foreach ($grid_rows as $row) : ?>
                <ul class="services-archive__row">
                    <?php foreach ($row as $card) : ?>
                        <li class="services-archive__item">
                            <a href="#" class="service-card">
                                <p class="service-card__num"><?php echo esc_html($card['num']); ?></p>
                                <div class="service-card__body">
                                    <h2 class="service-card__title"><?php echo esc_html($card['title']); ?></h2>
                                    <p class="service-card__text"><?php echo esc_html($card['text']); ?></p>
                                </div>
                                <p class="service-card__tags"><?php echo esc_html($card['tags']); ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>

            <div class="services-archive__row services-archive__row--bottom">
                <article class="service-card service-card--bottom">
                    <p class="service-card__num"><?php echo esc_html($bottom_card['num']); ?></p>
                    <div class="service-card__body">
                        <h2 class="service-card__title"><?php echo esc_html($bottom_card['title']); ?></h2>
                        <p class="service-card__text"><?php echo esc_html($bottom_card['text']); ?></p>
                    </div>
                    <p class="service-card__tags"><?php echo esc_html($bottom_card['tags']); ?></p>
                </article>

                <aside class="services-archive__stats" aria-label="<?php esc_attr_e('AI Influencer Marketing stats', 'stive'); ?>">
                    <?php foreach ($service_stats as $stat) : ?>
                        <div class="services-archive__stat">
                            <p class="services-archive__stat-value"><?php echo esc_html($stat['value']); ?></p>
                            <p class="services-archive__stat-label"><?php echo esc_html($stat['label']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </aside>
            </div>
        </div>
    </div>
</section>