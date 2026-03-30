<?php
$logotype = get_field('logotype_for_site', 'option');
?>
<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <a href="#" class="header__logo">
                <img
                    src="<?php echo esc_url($logotype['url']); ?>"
                    alt="<?php echo esc_attr($logotype['alt']) ?: 'logotype'; ?>">
            </a>
            <nav aria-label="header menu" class="menu">
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
                <button type="button" class="header__languages-toggler">
                    <span class="header__languages-icon">
                        <img
                            src="<?php echo IMG_PATH ?>/flags/en.svg"
                            alt="flag">
                    </span>
                    <span class="header__languages-text">
                        En
                    </span>
                </button>
            </div>
            <a href="https://calendly.com/as-stive/30min" data-calendly class="header__btn btn btn-primary">Book Intro Call</a>
        </div>
    </div>
</header>