<?php
declare(strict_types=1);
defined('ABSPATH') || exit;
/*
 * Template Name: Landing 2
 * Template Post Type: page
*/

/**
 * @return Generator<int, array{author: string, role: string, quote: string}>
 */
function stive_testimonials(): Generator
{
    yield ['author' => 'Anna M.', 'role' => 'CEO @ Visionary Solutions', 'quote' => 'Stive got our brand into ChatGPT answers in 6 weeks. ROI speaks for itself.'];
    yield ['author' => 'Ryan P.', 'role' => 'COO @ Future Dynamics', 'quote' => 'The AI audit changed how we think about discovery. Transparent. Fast.'];
    yield ['author' => 'Sofia L.', 'role' => 'CEO @ Apex Innovations', 'quote' => 'They make the complicated feel simple. That is rare in this space.'];
    yield ['author' => 'Marcus O.', 'role' => 'Head of Growth @ Lumen', 'quote' => 'Real strategy, real numbers. Not vibes.'];
}

/**
 * @return Generator<int, array{n: string, title: string, desc: string}>
 */
function stive_steps(): Generator
{
    yield ['n' => '01', 'title' => 'Discovery Call', 'desc' => 'We learn your revenue model, ICP and current funnel. 30 minutes, no fluff.'];
    yield ['n' => '02', 'title' => 'AI Audit', 'desc' => 'We map how ChatGPT, Gemini, Perplexity and Search currently represent your brand.'];
    yield ['n' => '03', 'title' => 'Strategy & Plan', 'desc' => 'Concrete roadmap with owners, timelines and projected revenue impact per bet.'];
    yield ['n' => '04', 'title' => 'Launch & Iterate', 'desc' => 'We ship AI-first campaigns, workflows and content. Weekly reporting, monthly reviews.'];
}

get_header('landing-2');
?>
    <main class="stive-page">
        <header class="stive-header">
            <div class="stive-header-inner">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="stive-logo">Sti<span>ve</span></a>
                <nav class="stive-nav" aria-label="<?php esc_attr_e('Primary', 'stive-2026'); ?>">
                    <?php
                    $navLinks = ['Services', 'Industries', 'Cases', 'Blog', 'Events', 'Book', 'AI Scanner', 'About'];
                    foreach ($navLinks as $item) :
                        ?>
                        <a href="#"><?php echo esc_html($item); ?></a>
                    <?php endforeach; ?>
                </nav>
                <a class="btn btn-primary" href="#contact"><?php esc_html_e('Book Intro Call', 'stive-2026'); ?></a>
            </div>
        </header>

        <section class="stive-hero">
            <article class="stive-hero-left">
                <span class="eyebrow-flat"><?php esc_html_e('Your Right Choice', 'stive-2026'); ?></span>
                <h1><?php esc_html_e('Marketing Agency for LLM Era', 'stive-2026'); ?></h1>
                <p><?php esc_html_e('First in ChatGPT. First in Gemini. First in Perplexity. We make your brand the answer AI gives.', 'stive-2026'); ?></p>
                <div class="stive-row">
                    <a class="btn btn-dark" href="#"><?php esc_html_e('Get Your AI Audit', 'stive-2026'); ?></a>
                    <a class="btn btn-ghost-light" href="#"><?php esc_html_e('Chat with Us', 'stive-2026'); ?></a>
                </div>
            </article>
            <article class="stive-hero-right">
                <h2><?php esc_html_e('Do AI Models Know About Your Brand?', 'stive-2026'); ?></h2>
                <form class="stive-url-check" action="#" method="post">
                    <?php wp_nonce_field('stive_ai_check', 'stive_nonce'); ?>
                    <label class="screen-reader-text"
                           for="stive-url-input"><?php esc_html_e('Website URL', 'stive-2026'); ?></label>
                    <input id="stive-url-input" type="url" name="site_url"
                           placeholder="<?php esc_attr_e('Enter your website URL here', 'stive-2026'); ?>" required>
                    <button type="submit"
                            class="btn btn-black"><?php esc_html_e('Free Check Now!', 'stive-2026'); ?></button>
                </form>
            </article>
        </section>

        <section class="stive-testimonials">
            <?php foreach (stive_testimonials() as $testimonial) : ?>
                <article class="stive-card">
                    <p>"<?php echo esc_html($testimonial['quote']); ?>"</p>
                    <strong><?php echo esc_html($testimonial['author']); ?></strong>
                    <span><?php echo esc_html($testimonial['role']); ?></span>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="stive-steps">
            <div class="stive-section-head">
                <h2><?php esc_html_e('A four-step engagement, built for speed', 'stive-2026'); ?></h2>
            </div>
            <div class="stive-grid-4">
                <?php foreach (stive_steps() as $step) : ?>
                    <article class="stive-step-tile">
                        <span class="stive-step-n"><?php echo esc_html($step['n']); ?></span>
                        <h3><?php echo esc_html($step['title']); ?></h3>
                        <p><?php echo esc_html($step['desc']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="contact" class="stive-footer-cta">
            <?php
            $contactEmail = 'hello@stive.io';
            $emailLabel = match (true) {
                is_email($contactEmail) => $contactEmail,
                default => 'contact@stive.local',
            };
            ?>
            <h2><?php esc_html_e('Get in touch', 'stive-2026'); ?></h2>
            <p><?php echo esc_html($emailLabel); ?></p>
            <a class="btn btn-primary"
               href="mailto:<?php echo esc_attr($emailLabel); ?>"><?php esc_html_e('Book Intro Call', 'stive-2026'); ?></a>
        </section>
    </main>
<?php
get_footer('landing-2');
