<?php
/*
Template Name: Main Blog with ACF
Template Post Type: blog
*/
?>
<?php $page_id = $post->ID;

$calendly = get_field('calendly_link', 'option');
?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<section class="article">
    <div class="article__container container">
        <div class="article__wrapper">
            <div class="article__body typography-block">
                <?php the_content() ?>
            </div>
            <aside class="article__sidebar">
                <nav aria-label="article toc" class="article__toc">
                    <div class="article__toc-caption gradient-text">Table of Contents</div>
                    <ol class="article__toc-list">
                        <li class="article__toc-item">
                            <div class="article__toc-num">01</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">02</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">03</div>
                            <a href="" class="article__toc-link">[ H2 Section Title]</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">04</div>
                            <a href="" class="article__toc-link">Final Thought</a>
                        </li>
                        <li class="article__toc-item">
                            <div class="article__toc-num">05</div>
                            <a href="#faq" class="article__toc-link">FAQ</a>
                        </li>
                    </ol>
                </nav>
                <div class="article__banner">
                    <div class="article__banner-caption">Have a question?</div>
                    <div class="article__banner-title gradient-text">[Widget CTA Headline 1-2 lines]</div>
                    <p class="article__banner-description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
                    <a href="<?php echo $calendly['url']; ?>"
                        data-calendly
                        class="article__banner-btn btn btn-blue">Book Intro Call</a>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php require_once(TEMPLATE_PATH . '_faq.php'); ?>


<?php get_footer(); ?>