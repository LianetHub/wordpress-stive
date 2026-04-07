<?php
$logotype = get_field('logotype_for_site', 'option');
$footer_adresses = get_field('footer_adresses', 'option');
$footer_menus = get_field('footer_menus', 'option');
$footer_terms = get_field('footer_terms', 'option');
$footer_desc = get_field('footer_desc', 'option');


$footer_menus = [
    [
        'title' => 'Services',
        'items' => [
            ['text' => 'AI SEO & GEO Optimization', 'url' => '#'],
            ['text' => 'LLM Analytics & Audit', 'url' => '#'],
            ['text' => 'AI Content & Automation', 'url' => '#'],
            ['text' => 'LLM Ads Management', 'url' => '#'],
            ['text' => 'LLM Reputation Management', 'url' => '#'],
            ['text' => 'LLM Brand Strategy', 'url' => '#'],
        ]
    ],
    [
        'title' => 'Industries',
        'items' => [
            ['text' => 'SaaS', 'url' => '#'],
            ['text' => 'FinTech', 'url' => '#'],
            ['text' => 'E-commerce', 'url' => '#'],
            ['text' => 'Healthcare', 'url' => '#'],
            ['text' => 'Real Estate', 'url' => '#'],
        ]
    ],
    [
        'title' => 'Company',
        'items' => [
            ['text' => 'About us', 'url' => '#'],
            ['text' => 'Cases', 'url' => '#'],
            ['text' => 'Events', 'url' => '#'],
        ]
    ],
    [
        'title' => 'Resources',
        'items' => [
            ['text' => 'Blog', 'url' => '#'],
            ['text' => 'Book', 'url' => '#'],
        ]
    ],
];

$footer_socials = [
    ['name' => 'Linkedin', 'url' => 'https://www.linkedin.com/company/stive-ai/'],
    ['name' => 'X', 'url' => 'https://x.com/stive_agency'],
    ['name' => 'Facebook', 'url' => 'https://www.facebook.com/profile.php?id=61579433848077'],
];

$footer_terms = [
    ['text' => 'Privacy Policy', 'url' => '#'],
    ['text' => 'Terms and Conditions', 'url' => '#'],
];
?>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__header">
                <div class="footer__header-main">
                    <a href="/" class="footer__logo">
                        <img
                            src="<?php echo esc_url($logotype['url']); ?>"
                            alt="<?php echo esc_attr($logotype['alt']) ?: 'logotype'; ?>">
                    </a>
                    <p class="footer__desc">
                        <?php echo $footer_desc; ?>
                    </p>
                    <div class="footer__addresses">
						<?php foreach ($footer_adresses as $item) : ?>
                            <address><?php echo $item['footer_adress']; ?></address>
						<?php endforeach; ?>
                    </div>
                </div>

                <nav aria-label="footer menu" class="footer__menu">
                    <?php foreach ($footer_menus as $menu_block) : ?>
                        <div class="footer__menu-block">
                            <button
                                type="button"
                                class="footer__menu-caption icon-plus">
                                <?php echo esc_html($menu_block['title']); ?>
                            </button>
                            <ul class="footer__menu-list">
                                <?php foreach ($menu_block['items'] as $item) : ?>
                                    <li><a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['text']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </nav>
            </div>

            <div class="footer__bottom">
                <p class="footer__copyright">All rights reserved © <?php echo date('Y'); ?> — <?php echo str_replace(['http://', 'https://'], '', home_url()); ?></p>

                <nav aria-label="Terms menu" class="footer__terms">
                    <ul class="footer__terms-list">
                        <?php foreach ($footer_terms as $term) : ?>
                            <li>
                                <a href="<?php echo esc_url($term['url']); ?>"><?php echo esc_html($term['text']); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <ul class="footer__socials socials">
                    <?php foreach ($footer_socials as $social) : ?>
                        <li class="socials__item">
                            <a href="<?php echo esc_url($social['url']); ?>" class="footer__social-link">
                                <?php echo esc_html($social['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>