<?php 
$case_details_thumb = get_field('case_details_thumb'); //img
$case_person_name = get_field('case_person_name'); //text
$case_person_position = get_field('case_person_position'); //text
$case_details_list = get_field('case_details_list'); //repeater
$case_details_category = get_field('case_details_list'); //асоциации ?
$case_details_h2 = get_field('case_details_h2'); //text
$case_details_img = get_field('case_details_img'); //img
?>
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
			<?php echo display_category_and_tag_terms(get_the_ID(), 'case-tags', 'case-details__categories', 'case-details__category label-badge label-badge--small'); ?>
        </div>
        <div class="case-details__description typography-block">
            <h2>Who is AtmaForce?</h2>
            <p>AtmaForce is an innovative tech company that specializes in developing cutting-edge software solutions for businesses of all sizes. Founded in 2021, the company has quickly gained a reputation for its user-friendly platforms that enhance productivity and streamline operations.</p>
            <p>With a focus on artificial intelligence and machine learning, AtmaForce aims to empower organizations to harness the power of data and make informed decisions.</p>
            <img src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>" alt="case image">
        </div>
    </div>
</section>