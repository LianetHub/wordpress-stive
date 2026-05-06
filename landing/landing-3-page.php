<?php
declare(strict_types=1);
defined('ABSPATH') || exit;
/*
 * Template Name: Landing 3
 * Template Post Type: page
*/

$calendly = get_field('calendly_link', 'option');
$socialsLinks = get_field('socials_links', 'option');
$calendlyUrl = (is_array($calendly) && !empty($calendly['url']) && filter_var($calendly['url'], FILTER_VALIDATE_URL))
    ? (string) $calendly['url']
    : '#';
$calendlyTitle = (is_array($calendly) && !empty($calendly['title']))
    ? (string) $calendly['title']
    : 'Book a Strategy Call';
$assetsUri = get_template_directory_uri() . '/landing/landing-3/assets/img';

locate_template('landing/landing-3/header-landing-3.php', true);
?>
<!-- ================= NAV ================= -->
<nav class="nav">
  <div class="nav-inner">
    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'stive'); ?>"><img class="stive-logo" src="<?php echo esc_url($assetsUri . '/stive-dark.png'); ?>" alt="Stive"/></a>
    <a class="nav-cta" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">
      Book a Strategy Call
      <svg class="stive-arrow" width="16" height="13" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
    </a>
  </div>
</nav>

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="hero-grid">

    <!-- LEFT: teal tile -->
    <div class="hero-left">
      <div class="blob-a"></div>
      <div class="blob-b"></div>

      <div class="hero-content">
        <span class="hero-badge">For Business Owners</span>
        <h1 class="hero-h1">
          <span class="row">AI That</span>
          <span class="underline-wrap italic">
            Makes Money
            <svg viewBox="0 0 400 14" preserveAspectRatio="none">
              <path d="M2 10 Q 100 2, 200 7 T 398 4" stroke="#192A3F" stroke-width="3" fill="none" stroke-linecap="round"/>
            </svg>
          </span>
        </h1>
        <p class="hero-p">We help founders grow revenue through AI. For the past year, Stive has been the #1 agency focused exclusively on AI-driven sales and marketing. 300+ projects. Real cases. Real numbers.</p>
      </div>

      <div class="hero-ctas">
        <a class="btn-primary-dark" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">
          Book a Strategy Call
          <svg class="stive-arrow" width="18" height="14" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
        </a>
        <a class="btn-secondary-light" href="#modules">See the 5 Modules</a>
      </div>
    </div>

    <!-- RIGHT: dark stats tile -->
    <div class="hero-right">
      <div class="glow"></div>
      <span class="label">— Proof by numbers</span>
      <div class="hero-stats">
        <div class="stat-card"><div class="stat-val">300+</div><div class="stat-label">Projects delivered</div></div>
        <div class="stat-card"><div class="stat-val">5.74×</div><div class="stat-label">ROAS for clients</div></div>
        <div class="stat-card"><div class="stat-val">46%</div><div class="stat-label">Conversion from AI traffic</div></div>
        <div class="stat-card"><div class="stat-val">#1</div><div class="stat-label">In 5 major LLMs</div></div>
      </div>
      <div class="hero-rating">
        <div class="stars"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
        <span class="rating-text">4.9 · 300 leaders trust us</span>
      </div>
    </div>

  </div>
</section>

<!-- ================= FOUNDER MESSAGE ================= -->
<section class="section bg-white">
  <div class="inner">
    <div class="founder-grid">
      <div>
        <div class="eyebrow"><span class="dash"></span>— Message from our founder</div>
        <h2 class="h2-big">What we do,<br/><span class="italic">in 2 minutes.</span></h2>
        <p class="lead">A quick walkthrough of how the program works, who it's for, and what you actually get — straight from the founder.</p>
        <div class="founder-card">
          <div class="avatar"><img src="<?php echo esc_url($assetsUri . '/team-vlad.jpg'); ?>" alt="Vlad Pivnev"/></div>
          <div>
            <div class="name">Vlad Pivnev</div>
            <div class="role">Founder, Stive</div>
          </div>
        </div>
      </div>
      <div class="video-frame">
        <iframe
          src="https://www.youtube-nocookie.com/embed/SLyx9qlyBsI"
          title="What we do, in 2 minutes"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          referrerpolicy="strict-origin-when-cross-origin"
          allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

<!-- ================= POSITIONING ================= -->
<section class="section bg-teal">
  <div class="inner" style="text-align:center;">
    <h2 class="positioning-h2">#1 Agency for <span class="italic">AI Integration</span> <br>in Business, Sales &amp; Marketing</h2>
    <p class="positioning-p">For the past year, we've focused exclusively on one thing: helping businesses grow revenue through AI. 300+ projects, real cases, measurable results.</p>
  </div>
</section>

<!-- ================= PROBLEM ================= -->
<section class="section bg-white">
  <div class="inner">
    <div class="problem-wrap">
      <div class="eyebrow"><span class="dash"></span>— The problem</div>
      <h2 class="h2-big">Most businesses talk about AI.<br/><span class="italic">Few actually use it</span> to grow revenue.</h2>
      <p class="problem-p1">You hear AI everywhere — webinars, LinkedIn posts, vendor pitches. But when you ask "how exactly will this bring me more paying customers next month?" — nobody has a straight answer.</p>
      <p class="problem-p2">We do. For the past year, Stive has been the #1 agency focused exclusively on AI-driven revenue growth.</p>
    </div>
  </div>
</section>

<!-- ================= MODULES ================= -->
<section id="modules" class="section bg-light">
  <div class="inner">
    <div class="section-head">
      <div class="head-copy">
        <div class="eyebrow"><span class="dash"></span>— What's inside</div>
        <h2 class="h2-big">5 Modules.<br/><span class="italic">Pick what your business needs.</span></h2>
        <p class="lead-copy">Each module is a 2-hour 1-on-1 session with our team. We teach, implement together, and hand off a working system.</p>
      </div>
    </div>

    <div class="modules-grid">

      <!-- Module 01 -->
      <div class="col-3">
        <div class="module-card">
          <div class="module-head">
            <span class="module-num">01</span>
            <div class="module-icon">
              <svg width="22" height="18" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
            </div>
          </div>
          <div>
            <h3 class="module-title">LLM Visibility (GEO)</h3>
            <p class="module-desc">Win a new customer acquisition channel. Rank in ChatGPT, Gemini, Claude — where buyers research before they buy.</p>
          </div>
          <ul class="module-bullets">
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>AI crawler audit &amp; technical fixes</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Content restructured to win LLM citations</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Brand signals across trust platforms</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Tracking across 5 major LLMs</span></li>
          </ul>
        </div>
      </div>

      <!-- Module 02 (accent) -->
      <div class="col-3">
        <div class="module-card accent">
          <div class="blob"></div>
          <div class="module-head">
            <span class="module-num">02</span>
            <div class="module-icon">
              <svg width="22" height="18" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
            </div>
          </div>
          <div>
            <h3 class="module-title">AI Analytics for Founders</h3>
            <p class="module-desc">Revenue, pipeline, and ad performance delivered to your phone daily. Make decisions with numbers, not hunches.</p>
          </div>
          <ul class="module-bullets">
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Custom AI agent for your revenue metrics</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Telegram/Slack daily reports</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Anomaly detection &amp; alerts</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>No dashboards to check ever again</span></li>
          </ul>
        </div>
      </div>

      <!-- Module 03 -->
      <div class="col-2">
        <div class="module-card">
          <div class="module-head">
            <span class="module-num">03</span>
            <div class="module-icon">
              <svg width="22" height="18" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
            </div>
          </div>
          <div>
            <h3 class="module-title">AI Advertising</h3>
            <p class="module-desc">More paying customers from the same ad budget. Google &amp; Meta ads optimized by AI — without hiring more media buyers.</p>
          </div>
          <ul class="module-bullets">
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>AI-driven creative generation</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Automated A/B testing at scale</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>ROAS optimization loops</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Campaign monitoring &amp; alerts</span></li>
          </ul>
        </div>
      </div>

      <!-- Module 04 -->
      <div class="col-2">
        <div class="module-card">
          <div class="module-head">
            <span class="module-num">04</span>
            <div class="module-icon">
              <svg width="22" height="18" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
            </div>
          </div>
          <div>
            <h3 class="module-title">AI Competitive Intelligence</h3>
            <p class="module-desc">Win more deals by knowing every competitor move. Weekly intel across their products, ads, hiring, and LLM presence.</p>
          </div>
          <ul class="module-bullets">
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Weekly intel reports to your messenger</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>LLM visibility tracking for competitors</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Blog, social, hiring, media mentions</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Pricing &amp; product changes</span></li>
          </ul>
        </div>
      </div>

      <!-- Module 05 -->
      <div class="col-2">
        <div class="module-card">
          <div class="module-head">
            <span class="module-num">05</span>
            <div class="module-icon">
              <svg width="22" height="18" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
            </div>
          </div>
          <div>
            <h3 class="module-title">AI-Powered B2B Sales</h3>
            <p class="module-desc">Fill your pipeline without scaling headcount. AI agents find, research, and reach out to qualified buyers for you.</p>
          </div>
          <ul class="module-bullets">
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>ICP targeting through AI</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Automated lead research &amp; enrichment</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>Personalized outreach at scale</span></li>
            <li><svg class="stive-arrow" width="14" height="11" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg><span>LinkedIn data extraction &amp; segmentation</span></li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= OUTCOMES ================= -->
<section class="section bg-dark">
  <div class="outcomes-glow"></div>
  <div class="inner">
    <div class="outcomes-head">
      <div class="eyebrow dark"><span class="dash"></span>— What you get</div>
      <h2 class="outcomes-h2">Revenue outcomes.<br/><span class="italic accent">Not vanity metrics.</span></h2>
      <p class="outcomes-lead">Every outcome maps directly to money in your business. Either you get more customers, or you spend less to get them.</p>
    </div>

    <div class="outcomes-grid">
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Invisible in AI search</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to">New <em>customer channel</em> you didn't have before — ChatGPT, Gemini, Claude</div>
      </div>
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Same ad budget, same returns</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to"><em>More paying customers</em> from the same ad spend</div>
      </div>
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Low converting traffic</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to">AI-referral traffic that converts up to <em>5× better</em> than Google</div>
      </div>
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Guessing what competitors do</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to"><em>Win more deals</em> — know every competitor move before they announce it</div>
      </div>
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Team drowning in routine</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to">20–40% of team hours <em>freed for revenue work</em> — not reports</div>
      </div>
      <div class="outcome-row">
        <div><div class="outcome-from-label">From</div><div class="outcome-from-val">Blind decision-making</div></div>
        <div class="arrow-cell"><svg class="stive-arrow" width="28" height="22" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></div>
        <div class="outcome-to">Daily <em>revenue &amp; pipeline report</em> in your messenger before coffee</div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PROCESS ================= -->
<section class="section bg-light">
  <div class="inner">
    <div class="process-head">
      <div class="eyebrow"><span class="dash"></span>— How it works</div>
      <h2 class="h2-big">Four steps.<br/><span class="italic">One month.</span></h2>
    </div>
    <div class="process-grid">
      <div class="process-card"><div class="blob"></div><span class="process-num">01</span><div><h4>Discovery</h4><p>Free AI audit of your business. We identify where AI will create the biggest impact for you.</p></div></div>
      <div class="process-card"><div class="blob"></div><span class="process-num">02</span><div><h4>Strategy</h4><p>We pick 4 modules based on your stage, industry, and revenue goals. Clear roadmap, clear deliverables.</p></div></div>
      <div class="process-card"><div class="blob"></div><span class="process-num">03</span><div><h4>Implementation</h4><p>Four live sessions with our team. We implement together — not give you a deck and disappear.</p></div></div>
      <div class="process-card"><div class="blob"></div><span class="process-num">04</span><div><h4>Support</h4><p>One month of support after delivery. WhatsApp / Slack, weekly calls, implementation reviews.</p></div></div>
    </div>
  </div>
</section>

<!-- ================= CASES ================= -->
<section class="section bg-white">
  <div class="inner">
    <div class="section-head">
      <div class="head-copy">
        <div class="eyebrow"><span class="dash"></span>— Real cases, real numbers</div>
        <h2 class="h2-big">Results across<br/><span class="italic">industries.</span></h2>
        <p class="lead-copy">These are real clients with real outcomes. No fluff, no stock metrics.</p>
      </div>
    </div>
    <div class="three-col">

      <div class="case-card">
        <div>
          <span class="industry-chip">Prop Trading Firm</span>
          <h3 class="case-title">New customer channel in 90 days</h3>
        </div>
        <div class="case-rows">
          <div class="case-row"><span class="label">Before</span><span class="val">All customer acquisition via paid ads — expensive &amp; plateauing</span></div>
          <div class="case-row"><span class="label">What</span><span class="val">LLM Visibility + PR + content restructuring</span></div>
          <div class="case-row"><span class="label">After</span><span class="val">#1 in ChatGPT, Gemini, Claude for "best prop trading firm in USA"</span></div>
        </div>
        <div class="case-foot">
          <div><div class="case-roi">Zero CAC</div><div class="case-metric">Steady flow from AI search</div></div>
        </div>
      </div>

      <div class="case-card">
        <div>
          <span class="industry-chip">B2B SaaS / Payments</span>
          <h3 class="case-title">5× higher customer conversion</h3>
        </div>
        <div class="case-rows">
          <div class="case-row"><span class="label">Before</span><span class="val">9% visitor-to-customer conversion from Google</span></div>
          <div class="case-row"><span class="label">What</span><span class="val">LLM Visibility + conversion funnel</span></div>
          <div class="case-row"><span class="label">After</span><span class="val">46% conversion from ChatGPT traffic — nearly half of visitors</span></div>
        </div>
        <div class="case-foot">
          <div><div class="case-roi">46%</div><div class="case-metric">Conversion from AI</div></div>
        </div>
      </div>

      <div class="case-card">
        <div>
          <span class="industry-chip">B2B SaaS</span>
          <h3 class="case-title">5.74× return on ad spend</h3>
        </div>
        <div class="case-rows">
          <div class="case-row"><span class="label">Before</span><span class="val">Flat revenue, AI competitors gaining share</span></div>
          <div class="case-row"><span class="label">What</span><span class="val">Full 5-module program</span></div>
          <div class="case-row"><span class="label">After</span><span class="val">5.74× ROAS, top 1–2 in LLMs, +80% organic growth</span></div>
        </div>
        <div class="case-foot">
          <div><div class="case-roi">5.74×</div><div class="case-metric">ROAS</div></div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="section bg-light">
  <div class="inner">
    <div class="process-head">
      <div class="eyebrow"><span class="dash"></span>— What clients say</div>
      <h2 class="h2-big">Direct quotes.<br/><span class="italic">Real companies.</span></h2>
    </div>
    <div class="three-col">
      <div class="testimonial-card">
        <div class="quote-mark">"</div>
        <p>Stive's work directly translated into new customers for us. Brand citations and referral traffic went up significantly — which meant more qualified leads landing on our site and converting. The team understands LLM systems deeply and moves fast.</p>
        <div class="testimonial-foot">
          <div class="initial-circle">KS</div>
          <div><div class="name">Konstantin Sko</div><div class="role">CCO, Math Agency</div></div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="quote-mark">"</div>
        <p>Thanks to Stive, our client saw 5.74× ROAS, 80% more organic traffic, and top 1–2 positions in LLM-generated answers for the queries that actually drive sales. This isn't about rankings — it's about revenue.</p>
        <div class="testimonial-foot">
          <div class="initial-circle">VN</div>
          <div><div class="name">Vladyslav Nykytenkov</div><div class="role">CEO, Bulls Agency</div></div>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="quote-mark">"</div>
        <p>We started three months ago and the results surprised us. By month three, we were ranking #1 in ChatGPT and Perplexity for the keywords that bring us paying customers. The team is communicative, sets realistic expectations, and delivers.</p>
        <div class="testimonial-foot">
          <div class="initial-circle">GI</div>
          <div><div class="name">Gennadii Isaev</div><div class="role">Founder, Math Agency</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= PRICING ================= -->
<section class="section bg-white">
  <div class="inner">
    <div class="process-head">
      <div class="eyebrow"><span class="dash"></span>— Pricing</div>
      <h2 class="h2-big">Three ways to<br/><span class="italic">work with us.</span></h2>
      <p class="lead-copy">Choose based on how much you want us in the trenches with you.</p>
    </div>

    <div class="three-col" style="align-items: stretch;">

      <!-- Starter -->
      <div class="plan-card">
        <div>
          <div class="plan-name">Starter</div>
          <div class="plan-price-row"><span class="plan-from">from</span><span class="plan-price">€3,000</span></div>
          <div class="plan-dur">1 month + 1 month support</div>
        </div>
        <div class="plan-divider"></div>
        <ul class="plan-features">
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>4 modules (you pick from 5)</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>4 × 2-hour live 1-on-1 sessions</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>DIY implementation with guidance</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>WhatsApp / Slack Q&amp;A support</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Weekly check-in calls (1 month)</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Implementation review</span></li>
        </ul>
        <a class="plan-cta" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">Book a Call <svg class="stive-arrow" width="18" height="14" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></a>
      </div>

      <!-- Business (featured) -->
      <div class="plan-card featured">
        <span class="plan-tag">MOST POPULAR</span>
        <div>
          <div class="plan-name">Business</div>
          <div class="plan-price-row"><span class="plan-from">from</span><span class="plan-price">€8,000</span></div>
          <div class="plan-dur">2 months + 2 months support</div>
        </div>
        <div class="plan-divider"></div>
        <ul class="plan-features">
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>All 5 modules included</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>4 × 2-hour live sessions</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>2 on-site days in EU (by agreement)</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Done-with-you implementation</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Vlad Pivnev personally leading</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#16EEDC"/><path d="M5 9 L8 12 L13 6" stroke="#192A3F" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>2 months of hands-on support</span></li>
        </ul>
        <a class="plan-cta" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">Book a Call <svg class="stive-arrow" width="18" height="14" viewBox="0 0 25 20" fill="#192A3F"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></a>
      </div>

      <!-- Enterprise -->
      <div class="plan-card">
        <div>
          <div class="plan-name">Enterprise</div>
          <div class="plan-price-row"><span class="plan-from">from</span><span class="plan-price">€15,000</span></div>
          <div class="plan-dur">Custom retainer (3–6 months)</div>
        </div>
        <div class="plan-divider"></div>
        <ul class="plan-features">
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>All 5 modules + custom AI solutions</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Weekly calls with dedicated team</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>On-site workshops in your office</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Done-for-you implementation</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Dedicated Slack channel, 24/7</span></li>
          <li><svg width="18" height="18" viewBox="0 0 18 18"><circle cx="9" cy="9" r="9" fill="#CDFFFB"/><path d="M5 9 L8 12 L13 6" stroke="#19D6C7" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg><span>Custom integrations &amp; API work</span></li>
        </ul>
        <a class="plan-cta" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">Contact Us <svg class="stive-arrow" width="18" height="14" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg></a>
      </div>

    </div>
  </div>
</section>

<!-- ================= WHO FOR ================= -->
<section class="section bg-dark">
  <div class="whofor-glow"></div>
  <div class="inner">
    <div class="whofor-head">
      <div class="eyebrow dark"><span class="dash"></span>— Who this is for</div>
      <h2 class="outcomes-h2">Not for everyone.<br/><span class="italic accent">Probably not even most.</span></h2>
      <p class="outcomes-lead">This program is built for a specific kind of business owner. If this sounds like you — we should talk.</p>
    </div>
    <div class="two-col">
      <div class="who-card"><div class="who-num">01</div><div><h4>SaaS &amp; FinTech founders in EU</h4><p>B2B products with a clear paying customer base.</p></div></div>
      <div class="who-card"><div class="who-num">02</div><div><h4>Teams with marketing budget to optimize</h4><p>You already spend on ads and content. We make it work harder.</p></div></div>
      <div class="who-card"><div class="who-num">03</div><div><h4>Companies ready to grow — not just experiment</h4><p>We measure in revenue, not in pilots.</p></div></div>
      <div class="who-card"><div class="who-num">04</div><div><h4>Founders tired of AI hype, want results</h4><p>You want operators, not keynote speakers.</p></div></div>
    </div>
  </div>
</section>

<!-- ================= TEAM ================= -->
<section class="section bg-white">
  <div class="inner">
    <div class="process-head">
      <div class="eyebrow"><span class="dash"></span>— Your team</div>
      <h2 class="h2-big">You get the actual people,<br/><span class="italic">not "account managers."</span></h2>
      <p class="lead-copy">Every project has direct access to the specialists who do the work.</p>
    </div>

    <div class="three-col">

      <div class="team-card featured">
        <div class="team-header">
          <div class="team-avatar"><img src="<?php echo esc_url($assetsUri . '/team-vlad.jpg'); ?>" alt="Vlad Pivnev"/></div>
          <div style="min-width:0; flex:1; padding-top:2px;">
            <div class="team-name">Vlad Pivnev</div>
            <div class="team-role">Revenue Growth with AI</div>
          </div>
        </div>
        <p class="team-bio">Builds AI-driven growth systems for EU brands. Performance-marketing background, now revenue-first AI integration.</p>
        <div class="team-skills">
          <span class="team-chip">Growth strategy</span>
          <span class="team-chip">Paid &amp; lifecycle</span>
          <span class="team-chip">AI-assisted CRO</span>
        </div>
      </div>

      <div class="team-card">
        <div class="team-header">
          <div class="team-avatar"><img src="<?php echo esc_url($assetsUri . '/team-nastya.jpg'); ?>" alt="Anastasia Sh."/></div>
          <div style="min-width:0; flex:1; padding-top:2px;">
            <div class="team-name">Anastasia Sh.</div>
            <div class="team-role">GEO Specialist</div>
          </div>
        </div>
        <p class="team-bio">Generative Engine Optimization — getting brands cited inside ChatGPT, Perplexity and Gemini answers.</p>
        <div class="team-skills">
          <span class="team-chip">GEO audits</span>
          <span class="team-chip">AI-search content</span>
          <span class="team-chip">Citation strategy</span>
        </div>
      </div>

      <div class="team-card">
        <div class="team-header">
          <div class="team-avatar"><img src="<?php echo esc_url($assetsUri . '/team-serg.jpg'); ?>" alt="Serg N."/></div>
          <div style="min-width:0; flex:1; padding-top:2px;">
            <div class="team-name">Serg N.</div>
            <div class="team-role">Automation &amp; Agents</div>
          </div>
        </div>
        <p class="team-bio">Ships production AI agents and workflow automations. n8n, Make, custom Python — whatever fits the job.</p>
        <div class="team-skills">
          <span class="team-chip">AI agents</span>
          <span class="team-chip">Workflow automation</span>
          <span class="team-chip">API &amp; integrations</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section id="book" class="final-cta-wrap">
  <div class="final-cta">
    <div class="blob-a"></div>
    <div class="blob-b"></div>
    <div class="final-cta-body">
      <div class="eyebrow"><span class="dash"></span>— Let's talk</div>
      <h2 class="final-cta-h2">Let's talk about <span class="italic">your business.</span></h2>
      <p class="final-cta-p">30-minute strategy call with our Marketing Strategist. We look at your business, tell you exactly what AI can do for you — and whether this program is the right fit.</p>
      <div class="final-cta-actions">
      <a class="final-cta-btn" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly aria-label="<?php esc_attr_e('Book strategy call on Calendly', 'stive'); ?>">
        Book a Strategy Call
        <svg class="stive-arrow" width="20" height="16" viewBox="0 0 25 20" fill="#16EEDC"><path d="M 12.929 0.293 C 13.319 -0.098 13.952 -0.097 14.343 0.293 L 24.707 9.016 C 25.098 9.407 25.098 10.04 24.707 10.43 L 15.343 19.228 C 14.952 19.618 14.319 19.619 13.929 19.228 C 13.538 18.838 13.538 18.205 13.929 17.814 L 21.586 10.723 L 0 10.723 L 0 8.723 L 21.586 8.723 L 12.929 1.707 C 12.538 1.316 12.538 0.683 12.929 0.293 Z"/></svg>
      </a>
      </div>
    </div>
  </div>
</section>
<footer class="footer">
  <div class="footer-left">
    <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'stive'); ?>">
      <img class="stive-logo" src="<?php echo esc_url($assetsUri . '/stive-light.png'); ?>" alt="Stive"/>
    </a>
    <span class="footer-tag">#1 Agency for AI Integration in Business &amp; Marketing</span>
  </div>
  <div class="footer-links">
    <a class="primary" href="https://stive.ai" target="_blank" rel="noopener">stive.ai</a>
    <a class="muted" href="<?php echo esc_url($calendlyUrl); ?>" data-calendly><?php esc_html_e('Book a call', 'stive'); ?></a>
    <?php if (is_array($socialsLinks) && !empty($socialsLinks)) : ?>
      <?php foreach ($socialsLinks as $item) : ?>
        <?php
        $link = is_array($item) && isset($item['link']) && is_array($item['link']) ? $item['link'] : [];
        $url = isset($link['url']) ? (string) $link['url'] : '';
        $title = isset($link['title']) ? (string) $link['title'] : '';
        $target = !empty($link['target']) ? (string) $link['target'] : '_self';
        if ($url === '' || $title === '') {
            continue;
        }
        ?>
        <a class="muted" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" rel="noopener"><?php echo esc_html($title); ?></a>
      <?php endforeach; ?>
    <?php else : ?>
      <a class="muted" href="https://linkedin.com/company/stive-ai/" target="_blank" rel="noopener">LinkedIn</a>
      <a class="muted" href="https://x.com/stive_agency" target="_blank" rel="noopener">X</a>
    <?php endif; ?>
  </div>
</footer>
<?php
locate_template('landing/landing-3/footer-landing-3.php', true);
