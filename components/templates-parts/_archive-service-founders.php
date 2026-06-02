<?php
$founders_modules = [
    [
        'num' => '01',
        'title' => 'LLM Visibility (GEO)',
        'text' => 'Rank in ChatGPT, Gemini, Claude — where buyers research before they buy.',
    ],
    [
        'num' => '02',
        'title' => 'AI Analytics for Founders',
        'text' => 'Revenue and pipeline delivered to your phone daily. No dashboards.',
    ],
    [
        'num' => '03',
        'title' => 'AI Advertising',
        'text' => 'More customers from the same ad budget — AI-optimized Google & Meta.',
    ],
    [
        'num' => '04',
        'title' => 'AI Competitive Intelligence',
        'text' => 'Weekly intel on every competitor move — ads, hiring, LLM presence.',
    ],
    [
        'num' => '05',
        'title' => 'AI-Powered B2B Sales',
        'text' => 'AI agents find, research, and reach out to qualified buyers for you.',
    ],
];
?>

<section class="founders-ai">
    <div class="container">
        <div class="founders-ai__card">
            <div class="founders-ai__pretitle">
                <span class="founders-ai__pretitle-text">FULL AI INTEGRATION — 5 MODULES, 1 MONTH, REAL REVENUE OUTCOMES</span>
                <span class="founders-ai__pretitle-line" aria-hidden="true"></span>
            </div>

            <p class="founders-ai__eyebrow">FOR BUSINESS OWNERS</p>
            <h2 class="founders-ai__title">AI for Founders</h2>
            <p class="founders-ai__desc">We help founders grow revenue through AI. For the past year, Stive has been the #1 agency focused exclusively on AI-driven sales and marketing. 300+ projects. Real cases. Real numbers.</p>

            <ul class="founders-ai__modules">
                <?php foreach ($founders_modules as $module) : ?>
                    <li class="founders-ai__module">
                        <span class="founders-ai__module-num"><?php echo esc_html($module['num']); ?></span>
                        <span class="founders-ai__module-title"><?php echo esc_html($module['title']); ?></span>
                        <span class="founders-ai__module-text"><?php echo esc_html($module['text']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="founders-ai__actions">
                <a href="https://calendly.com/as-stive/30min"
                    data-calendly
                    class="founders-ai__btn btn btn-grey">Book a Strategy Call</a>
                <a href="#"
                    class="founders-ai__btn btn btn-primary">See 5 Modules &rarr;</a>
            </div>
        </div>
    </div>
</section>