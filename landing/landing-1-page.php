<?php
declare(strict_types=1);
/*
 * Template Name: Landing 1
 * Template Post Type: page
*/
locate_template('landing/landing-1/header-landing-1.php', true);
$calendly = get_field('calendly_link', 'option');
?>

    <div class="progress">
        <div class="progress__bar" id="progressBar"></div>
    </div>

    <nav class="rail" id="rail" aria-label="<?php echo esc_attr__('Page section navigation', 'stive'); ?>">
        <a href="#hero" data-target="hero" class="active"><span>01 / Hero</span><span class="mark"></span></a>
        <a href="#problem" data-target="problem"><span>02 / Problem</span><span class="mark"></span></a>
        <a href="#solution" data-target="solution"><span>03 / Solution</span><span class="mark"></span></a>
    </nav>

    <section id="hero" class="screen hero" data-screen-label="01 Hero">
        <div class="glow tl"></div>
        <div class="glow br"></div>
        <div class="nav">
			<a href="<?php echo home_url(); ?>" class="brand" aria-label="<?php echo esc_attr__('STIVE', 'stive'); ?>">STIVE</a>
            <div class="nav__right">
                <div class="nav__status"><span class="nav__dot"></span>Booking Q2 / 2026</div>
            </div>
        </div>
        <div class="hero__inner">
            <span class="pill"><span class="dot"></span>LLM Visibility Agency</span>
            <h1>Your brand is <span class="fade">invisible</span><br>in ChatGPT. <span class="mint">We fix that.</span>
            </h1>
            <p class="hero__sub">40% of search already happens in AI. If your brand does not show up - for the user, you
                do not exist.</p>
            <div class="hero__cta">
                <a class="btn btn--primary btn--lg" href="#solution">Get Your Visibility Audit</a>
				<a href="<?php echo $calendly['url']; ?>"
               data-calendly
               class="btn btn--secondary btn--lg"
               aria-label="Book Intro Call on Calendly">
                <?php echo $calendly['title']; ?>
            </a>
            </div>
            <div class="hero__meta">
                <span>No retainer - Audit delivered in 7 days</span>
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
                    <div class="stat__tag"><span>01 / Search Behavior</span><span class="num">UP</span></div>
                    <div class="stat__num">40<span class="unit">%</span></div>
                    <div class="stat__caption">of searches now end without a click to a website.</div>
                </div>
                <div class="stat">
                    <div class="stat__tag"><span>02 / Conversion</span><span class="num">x</span></div>
                    <div class="stat__num">5<span class="unit">x</span></div>
                    <div class="stat__caption">higher conversion from ChatGPT traffic vs Google.</div>
                </div>
                <div class="stat">
                    <div class="stat__tag"><span>03 / Your Brand</span><span class="num">-</span></div>
                    <div class="stat__num">0</div>
                    <div class="stat__caption">the number of times your brand appears in AI answers right now.</div>
                </div>
            </div>
            <p class="problem__note">If ChatGPT does not mention your brand - <span class="hl">you do not exist for the user.</span>
            </p>
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
                    <h3>LLM Visibility Audit</h3>
                    <p>We map where your brand appears - and where it does not - across every major model.</p>
                    <div class="service__foot">Delivered in 7 days -&gt;</div>
                </article>
                <article class="service">
                    <div class="service__step"><span>Step 02</span><span>Optimize</span></div>
                    <h3>GEO Optimization</h3>
                    <p>We rewrite, restructure, and seed content so AI models learn to cite you by default.</p>
                    <div class="service__foot">Ongoing - monthly sprints -&gt;</div>
                </article>
                <article class="service">
                    <div class="service__step"><span>Step 03</span><span>Monitor</span></div>
                    <h3>Tracking &amp; Reporting</h3>
                    <p>Monthly visibility scorecard across ChatGPT, Gemini, and Perplexity - with share-of-voice
                        deltas.</p>
                    <div class="service__foot">Live dashboard -&gt;</div>
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
            <p class="final__sub">Audit your current LLM visibility this week. We send a 12-page report with the prompts
                where you are missing and where you can win.</p>
            <div class="final__cta">
                <a class="btn btn--primary btn--lg" href="#get-proposal" data-fancybox>Get Your Proposal</a>
                <a href="<?php echo $calendly['url']; ?>"
               data-calendly
               class="btn btn--secondary btn--lg"
               aria-label="Book Intro Call on Calendly">
                <?php echo $calendly['title']; ?>
            </a>
            </div>
            <div class="final__meta">
                <span>No commitment</span><span class="sep"></span>
                <span>7-day turnaround</span><span class="sep"></span>
                <span>Fixed scope</span>
            </div>
        </div>
        <div class="foot">
            <a href="<?php echo home_url(); ?>" class="brand brand--small">STIVE</a>
            <div class="foot__right">
                <a href="mailto:stive@stive.ai">stive@stive.ai</a>
                <a href="https://stive.ai" target="_blank" rel="noopener">stive.ai</a>
                <a href="https://linkedin.com/company/stive-ai/" target="_blank" rel="noopener">LinkedIn</a>
                <a href="https://x.com/stive_agency" target="_blank" rel="noopener">X</a>
                <span>&copy; 2026</span>
            </div>
        </div>
    </section>
<?php
locate_template('landing/landing-1/footer-landing-1.php', true);
