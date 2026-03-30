<?php
$logotype = get_field('logotype_for_site', 'option');

$header_socials = [
    ['name' => 'Telegram', 'url' => '#'],
    ['name' => 'X', 'url' => '#'],
    ['name' => 'Facebook', 'url' => '#'],
];

?>
<header class="header open-menu">
    <div class="container">
        <div class="header__wrapper">
            <a href="#" class="header__logo">
                <img
                    src="<?php echo esc_url($logotype['url']); ?>"
                    alt="<?php echo esc_attr($logotype['alt']) ?: 'logotype'; ?>">
            </a>
            <div class="menu">
                <nav class="menu__navbar" aria-label="header menu">
                    <?php if (have_rows('header_menu_main', 'option')): ?>
                        <ul class="menu__list">
                            <?php while (have_rows('header_menu_main', 'option')): the_row();
                                $link = get_sub_field('header_menu_item');
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                                    <li class="menu__item">
                                        <a
                                            href="<?php echo esc_url($link_url); ?>"
                                            class="menu__link"
                                            target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    </li>
                            <?php endif;
                            endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </nav>
                <div class="header__languages">
                    <button type="button" class="header__languages-toggler icon-chevron-down">
                        <span class="header__languages-icon">
                            <img
                                src="<?php echo IMG_PATH ?>/flags/en.svg"
                                alt="flag">
                        </span>
                        <span class="header__languages-text">
                            En<span class="mobile-only">glish</span>
                        </span>
                    </button>
                </div>
                <ul class="menu__socials socials">
                    <?php foreach ($header_socials as $social) : ?>
                        <li class="socials__item">
                            <a href="<?php echo esc_url($social['url']); ?>" class="footer__social-link">
                                <?php echo esc_html($social['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a
                href="https://calendly.com/as-stive/30min"
                data-calendly
                class="header__btn btn btn-primary icon-calendar">
                <span class="header__btn-text">Book Intro Call</span>
            </a>
            <button
                type="button"
                aria-label="open menu"
                class="header__menu-toggler icon-menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>