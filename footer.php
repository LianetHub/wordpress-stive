<?php
$logotype = get_field('logotype_for_site', 'option');
$footer_adresses = get_field('footer_adresses', 'option');
$footer_menus = get_field('footer_menus', 'option');
$footer_terms = get_field('footer_terms', 'option');
$footer_desc = get_field('footer_desc', 'option');
$socials_links = get_field('socials_links', 'option');


?>
</main>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__header">
                <div class="footer__header-main">
                    <a href="/" class="footer__logo">
                        <img
                            src="<?php echo esc_url($logotype['url']); ?>"
                            alt="<?php echo esc_attr($logotype['alt']) ?: 'logotype'; ?>">
                    </a>
                    <p class="footer__desc">
                        <?php echo $footer_desc; ?>
                    </p>
                    <div class="footer__addresses">
						<?php foreach ($footer_adresses as $item) : ?>
                            <address><?php echo $item['footer_adress']; ?></address>
						<?php endforeach; ?>
                    </div>
                </div>

                <nav aria-label="footer menu" class="footer__menu">
				<?php foreach ($footer_menus as $main_item) : ?>
				    <?php if (!empty($main_item['main_link'])) : ?>
					<div class="footer__menu-block">
					<?php $first_iteration = true; ?>
                        <?php foreach ($main_item['main_link'] as $item) : ?>
						<?php if ($first_iteration) : ?>
						<button type="button" class="footer__menu-caption icon-plus">
                            <?php echo esc_html($item['link']['title']); ?>
                        </button>
                        <ul class="footer__menu-list">
                        <?php $first_iteration = false; ?>
						     <?php else : ?>
							 <li>
							 <?php $link_target = $item['link']['target'] ? $item['link']['target'] : '_self';?>
							     <a href="<?php echo esc_url($item['link']['url']); ?>"
								 target="<?php echo esc_attr($link_target); ?>">
                                     <?php echo esc_html($item['link']['title']); ?>
                                 </a>
							 </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </ul> 
                    </div> 
                    <?php endif; ?>
		        <?php endforeach; ?>
		        </nav>
            </div>

            <div class="footer__bottom">
                <p class="footer__copyright">All rights reserved © <?php echo date('Y'); ?> — <?php echo str_replace(['http://', 'https://'], '', home_url()); ?></p>

                <nav aria-label="Terms menu" class="footer__terms">
                    <ul class="footer__terms-list">
                        <?php foreach ($footer_terms as $item) : ?>
						<?php $link_target = $item['footer_term']['target'] ? $item['footer_term']['target'] : '_self';?>
                            <li>
                                <a href="<?php echo esc_url($item['footer_term']['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($item['footer_term']['title']); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <ul class="footer__socials socials">
                    <?php foreach ($socials_links as $item) : ?>
					<?php $link_target = $item['link']['target'] ? $item['link']['target'] : '_self';?>
                        <li class="socials__item">
                            <a href="<?php echo esc_url($item['link']['url']); ?>" target="<?php echo esc_attr($link_target); ?>" class="footer__social-link">
                                <?php echo esc_html($item['link']['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>