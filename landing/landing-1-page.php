<?php
declare(strict_types=1);
/*
 * Template Name: Landing 1
 * Template Post Type: page
*/
locate_template('landing/landing-1/header-landing-1.php', true);
$logoUri = get_template_directory_uri() . '/landing/landing-1/assets/img/stive-light.png';
$calendly = get_field('calendly_link', 'option');
$socialsLinks = get_field('socials_links', 'option');

$calendlyUrl = (is_array($calendly) && !empty($calendly['url']) && filter_var($calendly['url'], FILTER_VALIDATE_URL))
    ? (string)$calendly['url']
    : '#';
$calendlyTitle = (is_array($calendly) && !empty($calendly['title']))
    ? (string)$calendly['title']
    : 'Book Intro Call';
?>

<div class="progress"><div class="progress__bar" id="progressBar"></div></div>

<nav class="rail" id="rail" aria-label="<?php echo esc_attr__('Page section navigation', 'stive'); ?>">
    <a href="#hero" data-target="hero" class="active"><span>01 / Hero</span><span class="mark"></span></a>
    <a href="#problem" data-target="problem"><span>02 / Problem</span><span class="mark"></span></a>
    <a href="#solution" data-target="solution"><span>03 / Solution</span><span class="mark"></span></a>
</nav>

<section id="hero" class="screen hero" data-screen-label="01 Hero">
    <div class="glow tl"></div>
    <div class="glow br"></div>

    <div class="nav">
        <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'stive'); ?>">
            <img class="nav__logo" src="<?php echo esc_url($logoUri); ?>" alt="<?php esc_attr_e('STIVE', 'stive'); ?>">
        </a>
        <div class="nav__right">
            <div class="nav__status"><span class="nav__dot"></span>Booking Q2 / 2026</div>
        </div>
    </div>

    <div class="hero__inner">
        <span class="pill"><span class="dot"></span>LLM Visibility Agency</span>

        <h1>Your brand is <span class="fade">invisible</span><br>in ChatGPT. <span class="mint">We fix that.</span></h1>

        <p class="hero__sub">40% of search already happens in AI. If your brand doesn't show up — for the user, you don't exist.</p>

        <div class="hero__cta">
            <a class="btn btn--primary btn--lg" href="#solution">
                Get Your Visibility Audit
                <svg class="btn__arrow" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
            </a>
            <a href="<?php echo esc_url($calendlyUrl); ?>"
               data-calendly
               class="btn btn--secondary btn--lg"
               aria-label="<?php esc_attr_e('Book Intro Call on Calendly', 'stive'); ?>">
                <?php echo esc_html($calendlyTitle); ?>
            </a>
        </div>

        <div class="hero__meta">
            <span>No retainer · Audit delivered in 7 days</span>
            <span class="sep"></span>
            <span>Working with 12+ founders</span>
        </div>
    </div>

    <div class="engines">
        <span class="engines__label">Tracked Across</span>
        <div class="engines__list">
            <span class="engine"><span class="engine__dot"></span>ChatGPT</span>
            <span class="engine"><span class="engine__dot"></span>Gemini</span>
            <span class="engine"><span class="engine__dot"></span>Perplexity</span>
            <span class="engine engine--muted"><span class="engine__dot"></span>Claude</span>
            <span class="engine engine--muted"><span class="engine__dot"></span>Copilot</span>
        </div>
    </div>
</section>

<section id="problem" class="screen problem" data-screen-label="02 Problem">
    <div class="glow tr"></div>
    <div class="glow bl"></div>

    <div class="problem__inner">
        <div class="stack-center">
            <div class="eyebrow">The Problem</div>
            <h2 class="section-title"><span class="strike">SEO</span> is not enough <em>anymore.</em></h2>
        </div>

        <div class="stats">
            <div class="stat">
                <div class="stat__tag"><span>01 / Search Behavior</span><span class="num">▲</span></div>
                <div class="stat__num">40<span class="unit">%</span></div>
                <div class="stat__caption">of searches now end without a click to a website.</div>
                <svg class="stat__viz" viewBox="0 0 200 120" fill="none">
                    <path d="M10,100 C40,90 60,60 90,55 C120,50 150,30 190,20" stroke="#5EEAD4" stroke-width="1.5" opacity=".7"/>
                    <path d="M10,108 C40,100 60,85 90,82 C120,78 150,68 190,60" stroke="#2A3C3D" stroke-width="1"/>
                    <circle cx="190" cy="20" r="3" fill="#5EEAD4"/>
                </svg>
            </div>

            <div class="stat">
                <div class="stat__tag"><span>02 / Conversion</span><span class="num">×</span></div>
                <div class="stat__num">5<span class="unit">×</span></div>
                <div class="stat__caption">higher conversion from ChatGPT traffic vs Google.</div>
                <svg class="stat__viz" viewBox="0 0 200 120" fill="none">
                    <rect x="20" y="80" width="18" height="30" fill="#2A3C3D"/>
                    <rect x="50" y="70" width="18" height="40" fill="#2A3C3D"/>
                    <rect x="80" y="60" width="18" height="50" fill="#2A3C3D"/>
                    <rect x="110" y="40" width="18" height="70" fill="#2A3C3D"/>
                    <rect x="140" y="22" width="18" height="88" fill="#5EEAD4"/>
                    <rect x="170" y="6" width="18" height="104" fill="#5EEAD4"/>
                </svg>
            </div>

            <div class="stat">
                <div class="stat__tag"><span>03 / Your Brand</span><span class="num">—</span></div>
                <div class="stat__num">0</div>
                <div class="stat__caption">the number of times your brand appears in AI answers right now.</div>
                <svg class="stat__viz" viewBox="0 0 200 120" fill="none">
                    <circle cx="60" cy="60" r="40" stroke="#2A3C3D" stroke-width="1" fill="none"/>
                    <circle cx="60" cy="60" r="40" stroke="#5EEAD4" stroke-width="1.5" stroke-dasharray="0 252" fill="none"/>
                    <text x="60" y="66" text-anchor="middle" font-family="JetBrains Mono" font-size="14" fill="#9CA3AF">0%</text>
                    <path d="M120 60 L180 60" stroke="#2A3C3D" stroke-width="1" stroke-dasharray="3 3"/>
                </svg>
            </div>
        </div>

        <p class="problem__note">If ChatGPT doesn't mention your brand — <span class="hl">you don't exist for the user.</span></p>
    </div>
</section>

<section id="solution" class="screen solution" data-screen-label="03 Solution">
    <div class="glow c"></div>

    <div class="solution__inner">
        <div class="stack-center">
            <div class="eyebrow">The Solution</div>
            <h2 class="section-title">We make AI <em>cite your brand.</em></h2>
        </div>

        <div class="services">
            <article class="service">
                <div class="service__step"><span>Step 01</span><span>Discovery</span></div>
                <div class="service__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <circle cx="12" cy="12" r="5"/>
                        <circle cx="12" cy="12" r="1.5" fill="currentColor"/>
                        <path d="M12 3 L12 12 L19 8"/>
                    </svg>
                </div>
                <h3>LLM Visibility Audit</h3>
                <p>We map where your brand appears — and where it doesn't — across every major model.</p>
                <div class="service__foot">Delivered in 7 days →</div>
            </article>

            <article class="service">
                <div class="service__step"><span>Step 02</span><span>Optimize</span></div>
                <div class="service__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 20h4L20 8l-4-4L4 16v4z"/>
                        <path d="M14 6l4 4"/>
                        <path d="M4 4h6M4 8h3" opacity=".55"/>
                    </svg>
                </div>
                <h3>GEO Optimization</h3>
                <p>We rewrite, restructure, and seed content so AI models learn to cite you by default.</p>
                <div class="service__foot">Ongoing · monthly sprints →</div>
            </article>

            <article class="service">
                <div class="service__step"><span>Step 03</span><span>Monitor</span></div>
                <div class="service__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 20h18"/>
                        <path d="M6 16v-4"/>
                        <path d="M11 16V8"/>
                        <path d="M16 16v-6"/>
                        <path d="M21 16V5"/>
                        <circle cx="21" cy="5" r="1.5" fill="currentColor" stroke="none"/>
                    </svg>
                </div>
                <h3>Tracking &amp; Reporting</h3>
                <p>Monthly visibility scorecard across ChatGPT, Gemini, and Perplexity — with share-of-voice deltas.</p>
                <div class="service__foot">Live dashboard →</div>
            </article>
        </div>

        <div class="quote">
            <span class="quote__badge">Case study</span>
            <span class="quote__text">Conversion from ChatGPT traffic: <span class="quote__num">46%</span>. Five times higher than Google.</span>
        </div>
    </div>

    <div class="final">
        <div class="eyebrow">Ready to launch</div>
        <h2>Ready to <em>be cited?</em></h2>
        <p class="final__sub">Audit your current LLM visibility this week. We'll send a 12-page report with the prompts where you're missing — and the ones where you could win.</p>
        <div class="final__cta">
            <a class="btn btn--primary btn--lg" href="#get-proposal" data-fancybox>
                Get Your Proposal
                <svg class="btn__arrow" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
            </a>
            <a href="<?php echo esc_url($calendlyUrl); ?>"
               data-calendly
               class="btn btn--secondary btn--lg"
               aria-label="<?php esc_attr_e('Book Intro Call on Calendly', 'stive'); ?>">
                <?php echo esc_html($calendlyTitle); ?>
            </a>
        </div>
        <div class="final__meta">
            <span>✱ No commitment</span><span class="sep"></span>
            <span>✱ 7-day turnaround</span><span class="sep"></span>
            <span>✱ Fixed scope</span>
        </div>
    </div>

    <div class="foot">
        <img class="foot__logo" src="<?php echo esc_url($logoUri); ?>" alt="<?php esc_attr_e('STIVE', 'stive'); ?>">
        <div class="foot__right">
            <a href="mailto:stive@stive.ai">stive@stive.ai</a>
            <a href="https://stive.ai" target="_blank" rel="noopener">stive.ai</a>
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
            <span>© <?php echo esc_html((string)date('Y')); ?></span>
        </div>
    </div>
</section>
<?php
locate_template('landing/landing-1/footer-landing-1.php', true);
