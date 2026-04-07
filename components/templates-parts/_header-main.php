<?php
$logotype = get_field('logotype_for_site', 'option');
$calendly = get_field('calendly_link', 'option');

?>
<header class="header">
    <div class="header__container container">
        <div class="header__wrapper">
            <a href="<?php echo home_url(); ?>" class="header__logo">
                <img
                    src="<?php echo esc_url($logotype['url']); ?>"
                    alt="Stive.ai - AI Marketing Agency">
            </a>

            <div class="menu" id="primary-menu">
                <nav class="menu__navbar" aria-label="Main navigation">
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
                                        <a href="<?php echo esc_url($link_url); ?>"
                                            class="menu__link"                                           
                                            target="<?php echo esc_attr( $link_target ); ?>" rel="noopener">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </li>
                            <?php endif;
                            endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </nav>

                <div class="header__languages">
                    <button type="button"
                        class="header__languages-toggler icon-chevron-down"
                        aria-label="Select language"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <span class="header__languages-icon">
                            <img src="<?php echo IMG_PATH ?>/flags/us.svg" alt="icon">
                        </span>
                        <span class="header__languages-text">
                            En<span class="mobile-only" aria-hidden="true">glish</span>
                        </span>
                    </button>
                </div>

                <ul class="menu__socials socials">
					<?php while (have_rows('socials_links', 'option')): the_row();
                                $link = get_sub_field('link');
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                        <li class="socials__item">
						    <a href="<?php echo esc_url($link_url); ?>"
							class="social__link"                                           
                            target="<?php echo esc_attr( $link_target ); ?>" rel="noopener">
                            <?php echo esc_html($link_title); ?>
                            </a>
                        </li>
					<?php endif;
                         endwhile; ?>
                </ul>
            </div>

            <a href="<?php echo $calendly['url']; ?>"
                data-calendly
                class="header__btn btn btn-primary icon-calendar"
                aria-label="Book Intro Call on Calendly">
                <span class="header__btn-text"><?php echo $calendly['title']; ?></span>
            </a>

            <button type="button"
                aria-label="Toggle navigation"
                aria-controls="primary-menu"
                aria-expanded="false"
                class="header__menu-toggler icon-menu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>
    </div>
</header>