<?php
declare(strict_types=1);
defined('ABSPATH') || exit;
/*
 * Template Name: Landing 3
 * Template Post Type: page
*/

$calendly = get_field('calendly_link', 'option');
$socials = get_field('socials_links', 'option');
$calendlyUrl = (is_array($calendly) && !empty($calendly['url']) && filter_var($calendly['url'], FILTER_VALIDATE_URL)) ? (string)$calendly['url'] : '#';
$calendlyTitle = (is_array($calendly) && !empty($calendly['title'])) ? (string)$calendly['title'] : 'Book a Strategy Call';
$logoDark = get_template_directory_uri() . '/landing/landing-3/assets/img/stive-dark.png';
$vladPhoto = get_template_directory_uri() . '/landing/landing-3/assets/img/team-vlad.jpg';
$nastyaPhoto = get_template_directory_uri() . '/landing/landing-3/assets/img/team-nastya.jpg';
$sergPhoto = get_template_directory_uri() . '/landing/landing-3/assets/img/team-serg.jpg';

$modules = [
    ['n' => '01', 'title' => 'LLM Visibility (GEO)', 'desc' => 'Win a new customer acquisition channel. Rank in ChatGPT, Gemini, Claude — where buyers research before they buy.', 'bullets' => ['AI crawler audit & technical fixes', 'Content restructured to win LLM citations', 'Brand signals across trust platforms', 'Tracking across 5 major LLMs']],
    ['n' => '02', 'title' => 'AI Analytics for Founders', 'desc' => 'Revenue, pipeline, and ad performance delivered to your phone daily. Make decisions with numbers, not hunches.', 'bullets' => ['Custom AI agent for your revenue metrics', 'Telegram/Slack daily reports', 'Anomaly detection & alerts', 'No dashboards to check ever again'], 'accent' => 'teal'],
    ['n' => '03', 'title' => 'AI Advertising', 'desc' => 'More paying customers from the same ad budget. Google & Meta ads optimized by AI — without hiring more media buyers.', 'bullets' => ['AI-driven creative generation', 'Automated A/B testing at scale', 'ROAS optimization loops', 'Campaign monitoring & alerts']],
    ['n' => '04', 'title' => 'AI Competitive Intelligence', 'desc' => 'Win more deals by knowing every competitor move. Weekly intel across products, ads, hiring, and LLM presence.', 'bullets' => ['Weekly intel reports to your messenger', 'LLM visibility tracking for competitors', 'Blog, social, hiring, media mentions', 'Pricing & product changes']],
    ['n' => '05', 'title' => 'AI-Powered B2B Sales', 'desc' => 'Fill your pipeline without scaling headcount. AI agents find, research, and reach out to qualified buyers.', 'bullets' => ['ICP targeting through AI', 'Automated lead research & enrichment', 'Personalized outreach at scale', 'LinkedIn data extraction & segmentation']],
];

$outcomes = [
    ['from' => 'Invisible in AI search', 'to' => [['text' => 'New ', 'accent' => false], ['text' => 'customer channel', 'accent' => true], ['text' => " you didn't have before — ChatGPT, Gemini, Claude", 'accent' => false]]],
    ['from' => 'Same ad budget, same returns', 'to' => [['text' => '', 'accent' => false], ['text' => 'More paying customers', 'accent' => true], ['text' => ' from the same ad spend', 'accent' => false]]],
    ['from' => 'Low converting traffic', 'to' => [['text' => 'AI-referral traffic that converts up to ', 'accent' => false], ['text' => '5× better', 'accent' => true], ['text' => ' than Google', 'accent' => false]]],
    ['from' => 'Guessing what competitors do', 'to' => [['text' => '', 'accent' => false], ['text' => 'Win more deals', 'accent' => true], ['text' => ' — know every competitor move before they announce it', 'accent' => false]]],
    ['from' => 'Team drowning in routine', 'to' => [['text' => '20-40% of team hours ', 'accent' => false], ['text' => 'freed for revenue work', 'accent' => true], ['text' => ' — not reports', 'accent' => false]]],
    ['from' => 'Blind decision-making', 'to' => [['text' => 'Daily ', 'accent' => false], ['text' => 'revenue & pipeline report', 'accent' => true], ['text' => ' in your messenger before coffee', 'accent' => false]]],
];

$steps = [
    ['n' => '01', 'title' => 'Discovery', 'desc' => 'Free AI audit of your business. We identify where AI creates the biggest impact for you.'],
    ['n' => '02', 'title' => 'Strategy', 'desc' => 'We pick 4 modules based on your stage, industry, and revenue goals. Clear roadmap, clear deliverables.'],
    ['n' => '03', 'title' => 'Implementation', 'desc' => 'Four live sessions with our team. We implement together — not give you a deck and disappear.'],
    ['n' => '04', 'title' => 'Support', 'desc' => 'One month of support after delivery. WhatsApp / Slack, weekly calls, implementation reviews.'],
];

$cases = [
    ['industry' => 'Prop Trading Firm', 'title' => 'New customer channel in 90 days', 'before' => 'All customer acquisition via paid ads — expensive and plateauing', 'what' => 'LLM Visibility + PR + content restructuring', 'after' => '#1 in ChatGPT, Gemini, Claude for "best prop trading firm in USA"', 'roi' => 'Zero CAC', 'metric' => 'Steady flow from AI search'],
    ['industry' => 'B2B SaaS / Payments', 'title' => '5× higher customer conversion', 'before' => '9% visitor-to-customer conversion from Google', 'what' => 'LLM Visibility + conversion funnel', 'after' => '46% conversion from ChatGPT traffic — nearly half of visitors', 'roi' => '46%', 'metric' => 'Conversion from AI'],
    ['industry' => 'B2B SaaS', 'title' => '5.74× return on ad spend', 'before' => 'Flat revenue, AI competitors gaining share', 'what' => 'Full 5-module program', 'after' => '5.74× ROAS, top 1-2 in LLMs, +80% organic growth', 'roi' => '5.74×', 'metric' => 'ROAS'],
];

$testimonials = [
    ['q' => "Stive's work directly translated into new customers for us. Brand citations and referral traffic went up significantly — which meant more qualified leads landing on our site and converting. The team understands LLM systems deeply and moves fast.", 'name' => 'Konstantin Sko', 'role' => 'CCO, Math Agency', 'initial' => 'KS'],
    ['q' => "Thanks to Stive, our client saw 5.74× ROAS, 80% more organic traffic, and top 1–2 positions in LLM-generated answers for the queries that actually drive sales. This isn't about rankings — it's about revenue.", 'name' => 'Vladyslav Nykytenkov', 'role' => 'CEO, Bulls Agency', 'initial' => 'VN'],
    ['q' => "We started three months ago and the results surprised us. By month three, we were ranking #1 in ChatGPT and Perplexity for the keywords that bring us paying customers. The team is communicative, sets realistic expectations, and delivers.", 'name' => 'Gennadii Isaev', 'role' => 'Founder, Math Agency', 'initial' => 'GI'],
];

$plans = [
    ['name' => 'Starter', 'price' => '€3,000', 'duration' => '1 month + 1 month support', 'cta' => 'Book a Call', 'featured' => false, 'features' => ['4 modules (you pick from 5)', '4 x 2-hour live 1-on-1 sessions', 'DIY implementation with guidance', 'WhatsApp / Slack Q&A support', 'Weekly check-in calls (1 month)', 'Implementation review']],
    ['name' => 'Business', 'price' => '€8,000', 'duration' => '2 months + 2 months support', 'cta' => 'Book a Call', 'featured' => true, 'features' => ['All 5 modules included', '4 x 2-hour live sessions', '2 on-site days in EU (by agreement)', 'Done-with-you implementation', 'Vlad Pivnev personally leading', '2 months of hands-on support']],
    ['name' => 'Enterprise', 'price' => '€15,000', 'duration' => 'Custom retainer (3-6 months)', 'cta' => 'Contact Us', 'featured' => false, 'features' => ['All 5 modules + custom AI solutions', 'Weekly calls with dedicated team', 'On-site workshops in your office', 'Done-for-you implementation', 'Dedicated Slack channel, 24/7', 'Custom integrations & API work']],
];

$teamMembers = [
    ['name' => 'Vlad Pivnev', 'role' => 'Revenue Growth with AI', 'bio' => 'Builds AI-driven growth systems for EU brands. Performance-marketing background, now revenue-first AI integration.', 'skills' => ['Growth strategy', 'Paid & lifecycle', 'AI-assisted CRO'], 'featured' => true, 'photo' => $vladPhoto],
    ['name' => 'Anastasia Sh.', 'role' => 'GEO Specialist', 'bio' => 'Generative Engine Optimization — getting brands cited inside ChatGPT, Perplexity and Gemini answers.', 'skills' => ['GEO audits', 'AI-search content', 'Citation strategy'], 'featured' => false, 'photo' => $nastyaPhoto],
    ['name' => 'Serg N.', 'role' => 'Automation & Agents', 'bio' => 'Ships production AI agents and workflow automations. n8n, Make, custom Python — whatever fits the job.', 'skills' => ['AI agents', 'Workflow automation', 'API & integrations'], 'featured' => false, 'photo' => $sergPhoto],
];

locate_template('landing/landing-3/header-landing-3.php', true);
?>
<main class="aip-full">
    <header class="aip-nav">
        <div class="aip-wrap">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logoDark); ?>" alt="Stive"></a>
            <a href="<?php echo esc_url($calendlyUrl); ?>" data-calendly class="aip-nav-cta"><?php echo esc_html($calendlyTitle); ?></a>
        </div>
    </header>

    <section class="aip-hero-wrap">
        <div class="aip-hero-grid">
            <article class="aip-hero-left">
                <div class="aip-blob blob-top"></div>
                <div class="aip-blob blob-bottom"></div>
                <div class="aip-hero-content">
                    <span class="aip-hero-badge">For Business Owners</span>
                    <h1>
                        <span class="line">AI That</span>
                        <span class="accent">Makes Money</span>
                    </h1>
                    <p>We help founders grow revenue through AI. For the past year, Stive has been the #1 agency focused exclusively on AI-driven sales and marketing. 300+ projects. Real cases. Real numbers.</p>
                </div>
                <div class="hero-cta hero-cta-top">
                    <a href="<?php echo esc_url($calendlyUrl); ?>" data-calendly class="btn btn-dark">Book a Strategy Call</a>
                    <a href="#modules" class="btn btn-light-solid">See the 5 Modules</a>
                </div>
            </article>
            <article class="aip-hero-right">
                <div class="aip-hero-glow"></div>
                <span class="aip-proof">— Proof by numbers</span>
                <div class="aip-hero-stats-grid">
                    <div class="aip-stat-card"><b>300+</b><span>Projects delivered</span></div>
                    <div class="aip-stat-card"><b>5.74x</b><span>ROAS for clients</span></div>
                    <div class="aip-stat-card"><b>46%</b><span>Conversion from AI traffic</span></div>
                    <div class="aip-stat-card"><b>#1</b><span>In 5 major LLMs</span></div>
                </div>
                <div class="aip-hero-trust">
                    <div class="stars">★★★★★</div>
                    <span>4.9 · 300 leaders trust us</span>
                </div>
            </article>
        </div>
    </section>

    <section class="aip-section aip-founder">
        <div class="aip-wrap aip-founder-grid">
            <article>
                <div class="label">— Message From Our Founder</div>
                <h2>What we do,<br><span class="italic">in 2 minutes.</span></h2>
                <p class="sub">A quick walkthrough of how the program works, who it's for, and what you actually get — straight from the founder.</p>
                <div class="aip-founder-card">
                    <img src="<?php echo esc_url($vladPhoto); ?>" alt="Vlad Pivnev">
                    <div>
                        <strong>Vlad Pivnev</strong>
                        <span>Founder, Stive</span>
                    </div>
                </div>
            </article>
            <article>
                <div class="video-wrap">
                    <iframe src="https://www.youtube-nocookie.com/embed/SLyx9qlyBsI" title="Founder video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </article>
        </div>
    </section>

    <section class="aip-band">
        <div class="aip-wrap center">
            <div class="label dark">Our Positioning</div>
            <h2>#1 Agency for <span class="italic">AI Integration</span> in Business, Sales & Marketing</h2>
            <p>For the past year, we've focused exclusively on one thing: helping businesses grow revenue through AI. 300+ projects, real cases, measurable results.</p>
        </div>
    </section>

    <section class="aip-section">
        <div class="aip-wrap">
            <div class="label">The Problem</div>
            <h2>Most businesses talk about AI.<br><span class="italic">Few actually use it</span> to grow revenue.</h2>
            <p class="sub">You hear AI everywhere — webinars, LinkedIn posts, vendor pitches. But when you ask "how exactly will this bring me more paying customers next month?" — nobody has a straight answer.</p>
            <p class="sub strong">We do. For the past year, Stive has been the #1 agency focused exclusively on AI-driven revenue growth.</p>
        </div>
    </section>

    <section id="modules" class="aip-section light">
        <div class="aip-wrap">
            <div class="label">What's Inside</div>
            <h2>5 Modules.<br><span class="italic">Pick what your business needs.</span></h2>
            <div class="modules">
                <?php foreach ($modules as $index => $m) : ?>
                    <article class="module module-col-<?php echo esc_attr((string)$index); ?> <?php echo (!empty($m['accent']) && $m['accent'] === 'teal') ? 'accent' : ''; ?>">
                        <div class="num"><?php echo esc_html($m['n']); ?></div>
                        <h3><?php echo esc_html($m['title']); ?></h3>
                        <p><?php echo esc_html($m['desc']); ?></p>
                        <ul>
                            <?php foreach ($m['bullets'] as $bullet) : ?>
                                <li><?php echo esc_html($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section dark outcomes-section">
        <div class="aip-wrap">
            <div class="label teal">What You Get</div>
            <h2>Revenue outcomes.<br><span class="italic">Not vanity metrics.</span></h2>
            <p class="sub">Every outcome maps directly to money in your business. Either you get more customers, or you spend less to get them.</p>
            <div class="outcomes">
                <?php foreach ($outcomes as $row) : ?>
                    <div class="outcome-row">
                        <div class="outcome-from">
                            <small>From</small>
                            <p><?php echo esc_html($row['from']); ?></p>
                        </div>
                        <i>→</i>
                        <span>
                            <?php foreach ($row['to'] as $part) : ?>
                                <span class="<?php echo $part['accent'] ? 'accent' : ''; ?>"><?php echo esc_html($part['text']); ?></span>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section">
        <div class="aip-wrap">
            <div class="label">How It Works</div>
            <h2>Four Steps. One Month.</h2>
            <div class="process">
                <?php foreach ($steps as $step) : ?>
                    <article><b><?php echo esc_html($step['n']); ?></b><h4><?php echo esc_html($step['title']); ?></h4><p><?php echo esc_html($step['desc']); ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section">
        <div class="aip-wrap">
            <div class="label">Real Cases, Real Numbers</div>
            <h2>Results across<br><span class="italic">industries.</span></h2>
            <p class="sub">These are real clients with real outcomes. No fluff, no stock metrics.</p>
            <div class="cases">
                <?php foreach ($cases as $case) : ?>
                    <article class="case-card">
                        <span class="tag"><?php echo esc_html($case['industry']); ?></span>
                        <h3><?php echo esc_html($case['title']); ?></h3>
                        <div class="case-row"><strong>Before</strong><span><?php echo esc_html($case['before']); ?></span></div>
                        <div class="case-row"><strong>What</strong><span><?php echo esc_html($case['what']); ?></span></div>
                        <div class="case-row"><strong>After</strong><span><?php echo esc_html($case['after']); ?></span></div>
                        <div class="case-metric"><strong><?php echo esc_html($case['roi']); ?></strong><small><?php echo esc_html($case['metric']); ?></small></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section light">
        <div class="aip-wrap">
            <div class="label">What Clients Say</div>
            <h2>Direct quotes.<br><span class="italic">Real companies.</span></h2>
            <div class="testimonials">
                <?php foreach ($testimonials as $item) : ?>
                    <article class="test-card">
                        <p><?php echo esc_html($item['q']); ?></p>
                        <div class="author"><span class="dot"><?php echo esc_html($item['initial']); ?></span><div><strong><?php echo esc_html($item['name']); ?></strong><small><?php echo esc_html($item['role']); ?></small></div></div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section">
        <div class="aip-wrap">
            <div class="label">Pricing</div>
            <h2>Three ways to<br><span class="italic">work with us.</span></h2>
            <p class="sub">Choose based on how much you want us in the trenches with you.</p>
            <div class="pricing">
                <?php foreach ($plans as $plan) : ?>
                    <article class="plan <?php echo $plan['featured'] ? 'featured' : ''; ?>">
                        <?php if ($plan['featured']) : ?><span class="badge">Most Popular</span><?php endif; ?>
                        <h4><?php echo esc_html($plan['name']); ?></h4>
                        <div class="price-wrap"><small>from</small><strong><?php echo esc_html($plan['price']); ?></strong></div>
                        <p class="duration"><?php echo esc_html($plan['duration']); ?></p>
                        <ul>
                            <?php foreach ($plan['features'] as $feature) : ?>
                                <li><?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url($calendlyUrl); ?>" data-calendly><?php echo esc_html($plan['cta']); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-section dark">
        <div class="aip-wrap">
            <div class="label teal">Who This Is For</div>
            <h2>Not for everyone.<br><span class="italic">Probably not even most.</span></h2>
            <p class="sub">This program is built for a specific kind of business owner. If this sounds like you — we should talk.</p>
            <div class="whofor">
                <article><b>01</b><div><h4>SaaS & FinTech founders in EU</h4><p>B2B products with a clear paying customer base.</p></div></article>
                <article><b>02</b><div><h4>Teams with marketing budget to optimize</h4><p>You already spend on ads and content. We make it work harder.</p></div></article>
                <article><b>03</b><div><h4>Companies ready to grow — not just experiment</h4><p>We measure in revenue, not in pilots.</p></div></article>
                <article><b>04</b><div><h4>Founders tired of AI hype, want results</h4><p>You want operators, not keynote speakers.</p></div></article>
            </div>
        </div>
    </section>

    <section class="aip-section">
        <div class="aip-wrap">
            <div class="label">Your Team</div>
            <h2>You get the actual people,<br><span class="italic">not "account managers."</span></h2>
            <p class="sub">Every project has direct access to the specialists who do the work.</p>
            <div class="team">
                <?php foreach ($teamMembers as $member) : ?>
                    <article class="<?php echo $member['featured'] ? 'featured' : ''; ?>">
                        <div class="member-head">
                            <img src="<?php echo esc_url((string)$member['photo']); ?>" alt="<?php echo esc_attr($member['name']); ?>">
                            <div><h4><?php echo esc_html($member['name']); ?></h4><span><?php echo esc_html($member['role']); ?></span></div>
                        </div>
                        <p><?php echo esc_html($member['bio']); ?></p>
                        <div class="chips">
                            <?php foreach ($member['skills'] as $skill) : ?><small><?php echo esc_html($skill); ?></small><?php endforeach; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="aip-cta">
        <div class="aip-wrap center">
            <div class="label">Let's Talk</div>
            <h2>Let's Talk About Your Business.</h2>
            <p>30-minute strategy call with our Marketing Strategist. We look at your business, tell you exactly what AI can do for you — and whether this program is the right fit.</p>
            <div class="hero-cta">
                <a href="<?php echo esc_url($calendlyUrl); ?>" data-calendly class="btn btn-dark">Book a Strategy Call</a>
                <a href="#get-proposal" data-fancybox class="btn btn-light">Get Proposal</a>
            </div>
        </div>
    </section>

    <footer class="aip-footer">
        <div class="aip-wrap foot">
            <div>Stive — #1 Agency for AI Integration in Business & Marketing</div>
            <div class="socials">
                <?php if (is_array($socials) && !empty($socials)) : ?>
                    <?php foreach ($socials as $item) :
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
        </div>
    </footer>
</main>
<?php
locate_template('landing/landing-3/footer-landing-3.php', true);

