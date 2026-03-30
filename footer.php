<?php
$logotype = get_field('logotype_for_site', 'option');
?>

</main>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__header">
                <div class="footer__header-main">
                    <a href="#" class="footer__logo">
                        <img
                            src="<?php echo esc_url($logotype['url']); ?>"
                            alt="<?php echo esc_attr($logotype['alt']) ?: 'logotype'; ?>">
                    </a>
                    <p class="footer__desc">
                        Experienced software developer with a passion for creating innovative
                        solutions. Proficient in various programming languages and dedicated to
                        delivering high-quality results.
                    </p>
                    <div class="footer__addresses">
                        <address>Poland, Wrocław, 50-202, Księcia Witolda Street, No. 49, Apt. 15</address>
                        <address>United States, Bellevue, WA, 98004-6424, 35 112th Ave NE, Apt 420</address>
                    </div>
                </div>
                <nav aria-label="footer menu" class="footer__menu">
                    <div class="footer__menu-block">
                        <div class="footer__menu-caption icon-plus">Services</div>
                        <ul class="footer__menu-list">
                            <li><a href="#">AI SEO & GEO Optimization</a></li>
                            <li><a href="#">LLM Analytics & Audit</a></li>
                            <li><a href="#">AI Content & Automation</a></li>
                            <li><a href="#">LLM Ads Management</a></li>
                            <li><a href="#">LLM Reputation Management</a></li>
                            <li><a href="#">LLM Brand Strategy</a></li>
                        </ul>
                    </div>
                    <div class="footer__menu-block">
                        <div class="footer__menu-caption icon-plus">Industries</div>
                        <ul class="footer__menu-list">
                            <li><a href="#">SaaS</a></li>
                            <li><a href="#">FinTech</a></li>
                            <li><a href="#">E-commerce</a></li>
                            <li><a href="#">Healthcare</a></li>
                            <li><a href="#">Real Estate</a></li>
                        </ul>
                    </div>
                    <div class="footer__menu-block">
                        <div class="footer__menu-caption icon-plus">Company</div>
                        <ul class="footer__menu-list">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Cases</a></li>
                            <li><a href="#">Events</a></li>
                        </ul>
                    </div>
                    <div class="footer__menu-block">
                        <div class="footer__menu-caption icon-plus">Resources</div>
                        <ul class="footer__menu-list">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Book</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="footer__bottom">
                <p class="footer__copyright">All rights reserved © 2026 — stive.ai</p>
                <nav aria-label="Terms menu" class="footer__terms">
                    <ul>
                        <li>
                            <a href="">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="">Terms and Conditions</a>
                        </li>
                    </ul>
                </nav>
                <ul class="footer__socials">
                    <li class="footer__social"><a href="" class="footer__social-link">Telegram</a></li>
                    <li class="footer__social"><a href="" class="footer__social-link">X</a></li>
                    <li class="footer__social"><a href="" class="footer__social-link">Facebook</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>