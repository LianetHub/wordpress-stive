<?php
/*
Template Name: In develop
Template Post Type: any
*/
get_header(); ?>

<?
$logotype = get_field('logotype_for_site_white', 'option');
$calendly = get_field('calendly_link', 'option');
?>


<section class="cooming-soon">
    <div class="cooming-soon__container container">

        <a href="<?php echo home_url(); ?>" class="cooming-soon__logo">
            <img
                src="<?php echo esc_url($logotype['url']); ?>"
                width="206"
                height="48"
                alt="Stive.ai - AI Marketing Agency">
        </a>

        <div class="cooming-soon__content">
            <div class="cooming-soon__badge">Coming Soon</div>

            <h1 class="cooming-soon__title">
                AI Marketing Agency<br>for the LLM Era
            </h1>

            <p class="cooming-soon__description">
                Our full site is coming soon - but we're already helping brands
                get discovered in AI search. Let's start your strategy today.
            </p>

            <div class="cooming-soon__actions">
                <a href="#get-proposal"
                    data-fancybox
                    class="cooming-soon__button btn btn-primary">Get Your Proposal</a>
                <a href="<?php echo $calendly['url']; ?>"
                    data-calendly
                    class="cooming-soon__button btn btn-secondary">Book Intro Call</a>
            </div>
        </div>

        <ul class="cooming-soon__socials">
            <?php while (have_rows('socials_links', 'option')): the_row();
                $link = get_sub_field('link');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                    <li class="cooming-soon__socials-item">
                        <a href="<?php echo esc_url($link_url); ?>"
                            class="cooming-soon__socials-link"
                            target="<?php echo esc_attr($link_target); ?>"
                            rel="noopener">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    </li>
            <?php endif;
            endwhile; ?>
        </ul>
    </div>
</section>

<?php require_once(TEMPLATE_PATH . '_modal-get-proposal.php'); ?>
<?php get_footer(); ?>