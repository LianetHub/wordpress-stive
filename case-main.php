<?php
/*
Template Name: Main Case
Template Post Type: case
*/
?>
<?php $page_id = $post->ID; ?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<section class="case">
    <div class="case__container container">
        <div class="case__main">
            <div class="case__categories">
                <a href="" class="case__category label-badge">Category</a>
                <a href="" class="case__category label-badge">Category</a>
                <a href="" class="case__category label-badge">Category</a>
            </div>
            <h1 class="case__title title-sm">Case Headline <br> Key Result + Client Name</h1>
            <p class="case__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
            <div class="case__actions">
                <a href="" class="case__btn btn btn-primary">Get Similar Results</a>
                <a href="" class="case__btn btn btn-grey">See How We Did It</a>
            </div>
        </div>
        <picture class="case__image">
            <source
                srcset="<?php echo IMG_PATH . '/cases/case_study-1.webp' ?>"
                type="image/webp">
            <img
                src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>"
                alt="case image"
                class="cover-image">
        </picture>
    </div>
</section>

<?php require_once(TEMPLATE_PATH . '_features.php'); ?>
<section class="case-details">
    <div class="case-details__container container">
        <div class="case-details__card">
            <div class="case-details__person">
                <div class="case-details__person-thumb">
                    <img src="<?php echo IMG_PATH ?>/user-thumb.png"
                        class="cover-image"
                        alt="person avatar">
                </div>
                <div class="case-details__person-info">
                    <div class="case-details__person-name title-xs gradient-text">Client Name</div>
                    <div class="case-details__person-position">industry / product type</div>
                </div>
            </div>
            <ul class="case-details__list">
                <li class="case-details__item">
                    <div class="case-details__item-property">industry</div>
                    <div class="case-details__item-value">industry</div>
                </li>
                <li class="case-details__item">
                    <div class="case-details__item-property">duration</div>
                    <div class="case-details__item-value">industry</div>
                </li>
                <li class="case-details__item">
                    <div class="case-details__item-property">market</div>
                    <div class="case-details__item-value">industry</div>
                </li>
                <li class="case-details__item">
                    <div class="case-details__item-property">website</div>
                    <div class="case-details__item-value">industry</div>
                </li>
            </ul>
            <div class="case-details__categories">
                <a href="" class="case-details__category label-badge label-badge--small">Category</a>
                <a href="" class="case-details__category label-badge label-badge--small">Category</a>
                <a href="" class="case-details__category label-badge label-badge--small">Category</a>
            </div>
        </div>
        <div class="case-details__description typography-block">
            <h2>Who is AtmaForce?</h2>
            <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
            <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
            <img src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>" alt="case image">
        </div>
    </div>
</section>
<?php require_once(TEMPLATE_PATH . '_goals.php'); ?>
<article class="article">
    <div class="article__container container typography-block">
        <h2>Approach</h2>
        <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
        <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
        <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
        <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
    </div>
</article>
<?php require_once(TEMPLATE_PATH . '_results.php'); ?>

<?php get_footer(); ?>