<?php
declare(strict_types=1);
defined('ABSPATH') || exit;
/*
 * Template Name: Landing 3
 * Template Post Type: page
*/

/**
 * @return Generator<int, array{title: string, text: string}>
 */
function stive_landing3_services(): Generator
{
    yield ['title' => 'AI Visibility Audit', 'text' => 'We map how major LLMs represent your brand and where you lose demand.'];
    yield ['title' => 'GEO + SEO Execution', 'text' => 'Entity signals, content hubs and technical fixes to improve citation probability.'];
    yield ['title' => 'Revenue Analytics', 'text' => 'Attribution for AI traffic and pipeline impact so every sprint has measurable ROI.'];
}

/**
 * @return Generator<int, array{n: string, title: string, text: string}>
 */
function stive_landing3_steps(): Generator
{
    yield ['n' => '01', 'title' => 'Discovery', 'text' => 'Define ICP, offer positioning and business goals.'];
    yield ['n' => '02', 'title' => 'Audit', 'text' => 'Benchmark visibility in ChatGPT, Gemini and Perplexity.'];
    yield ['n' => '03', 'title' => 'Execution', 'text' => 'Ship priority fixes, pages and authority signals.'];
    yield ['n' => '04', 'title' => 'Scale', 'text' => 'Iterate with weekly data and monthly strategic reviews.'];
}

$calendly = get_field('calendly_link', 'option');
$socialsLinks = get_field('socials_links', 'option');
$calendlyUrl = (is_array($calendly) && !empty($calendly['url']) && filter_var($calendly['url'], FILTER_VALIDATE_URL))
    ? (string)$calendly['url']
    : '#';
$calendlyTitle = (is_array($calendly) && !empty($calendly['title']))
    ? (string)$calendly['title']
    : 'Book Intro Call';

locate_template('landing/landing-3/header-landing-3.php', true);
?>
<main class="stive3">
    <section class="stive3-header-wrap">
        <header class="stive3-header container3">
            <a class="stive3-logo" href="<?php echo esc_url(home_url('/')); ?>">Sti<span>ve</span></a>
            <nav class="stive3-nav" aria-label="<?php esc_attr_e('Primary', 'stive'); ?>">
                <a href="#services"><?php esc_html_e('Services', 'stive'); ?></a>
                <a href="#process"><?php esc_html_e('How We Work', 'stive'); ?></a>
                <a href="#contact"><?php esc_html_e('Contact', 'stive'); ?></a>
            </nav>
            <a class="stive3-btn stive3-btn-primary"
               href="<?php echo esc_url($calendlyUrl); ?>"
               data-calendly
               aria-label="<?php esc_attr_e('Book Intro Call on Calendly', 'stive'); ?>">
                <?php echo esc_html($calendlyTitle); ?>
            </a>
        </header>
    </section>

    <section class="stive3-hero container3">
        <article class="stive3-card stive3-hero-main">
            <p class="stive3-eyebrow"><?php esc_html_e('COMING SOON', 'stive'); ?></p>
            <h1><?php esc_html_e('AI Marketing Agency for the LLM Era', 'stive'); ?></h1>
            <p><?php esc_html_e('First in ChatGPT. First in Gemini. First in Perplexity. We make your brand the answer AI gives.', 'stive'); ?></p>
            <div class="stive3-row">
                <a class="stive3-btn stive3-btn-primary" href="#get-proposal" data-fancybox><?php esc_html_e('Get Proposal', 'stive'); ?></a>
                <a class="stive3-btn stive3-btn-outline" href="#services"><?php esc_html_e('Explore Solutions', 'stive'); ?></a>
            </div>
        </article>
        <aside class="stive3-card stive3-hero-side">
            <h2><?php esc_html_e('Do AI Models Know About Your Brand?', 'stive'); ?></h2>
            <form action="#" method="post" class="stive3-form">
                <?php wp_nonce_field('stive_landing3_check', 'stive_landing3_nonce'); ?>
                <label class="screen-reader-text" for="stive3-url"><?php esc_html_e('Website URL', 'stive'); ?></label>
                <input id="stive3-url" type="url" name="site_url" required placeholder="<?php esc_attr_e('Enter your website URL', 'stive'); ?>">
                <button class="stive3-btn stive3-btn-dark" type="submit"><?php esc_html_e('Free Check Now', 'stive'); ?></button>
            </form>
        </aside>
    </section>

    <section id="services" class="container3 stive3-grid3">
        <?php foreach (stive_landing3_services() as $service) : ?>
            <article class="stive3-card">
                <h3><?php echo esc_html($service['title']); ?></h3>
                <p><?php echo esc_html($service['text']); ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section id="process" class="container3 stive3-steps">
        <?php foreach (stive_landing3_steps() as $step) : ?>
            <article class="stive3-step">
                <span><?php echo esc_html($step['n']); ?></span>
                <h3><?php echo esc_html($step['title']); ?></h3>
                <p><?php echo esc_html($step['text']); ?></p>
            </article>
        <?php endforeach; ?>
    </section>

    <section id="contact" class="container3 stive3-contact stive3-card">
        <h2><?php esc_html_e('Ready to scale your AI visibility?', 'stive'); ?></h2>
        <p><?php esc_html_e('hello@stive.io', 'stive'); ?></p>
        <a class="stive3-btn stive3-btn-primary"
           href="<?php echo esc_url($calendlyUrl); ?>"
           data-calendly
           aria-label="<?php esc_attr_e('Book Intro Call on Calendly', 'stive'); ?>">
            <?php echo esc_html($calendlyTitle); ?>
        </a>
        <div class="stive3-socials">
            <?php if (is_array($socialsLinks) && !empty($socialsLinks)) : ?>
                <?php foreach ($socialsLinks as $item) : ?>
                    <?php
                    $link = is_array($item) && isset($item['link']) && is_array($item['link']) ? $item['link'] : [];
                    $url = isset($link['url']) ? (string)$link['url'] : '';
                    $title = isset($link['title']) ? (string)$link['title'] : '';
                    $target = !empty($link['target']) ? (string)$link['target'] : '_self';
                    if ($url === '' || $title === '') {
                        continue;
                    }
                    ?>
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener"><?php echo esc_html($title); ?></a>
                <?php endforeach; ?>
            <?php else : ?>
                <a href="https://linkedin.com/company/stive-ai/" target="_blank" rel="noopener">LinkedIn</a>
                <a href="https://x.com/stive_agency" target="_blank" rel="noopener">X</a>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php
locate_template('landing/landing-3/footer-landing-3.php', true);

