<?php
$case_details_thumb = get_field('case_details_thumb'); //img
$case_person_name = get_field('case_person_name'); //text
$case_person_position = get_field('case_person_position'); //text
$case_details_list = get_field('case_details_list'); //repeater
$case_details_h2 = get_field('case_details_h2'); //text
$case_details_desc = get_field('case_details_desc'); //wysywyng
$case_details_img = get_field('case_details_img'); //img
?>
<section class="case-details">
    <div class="case-details__container container">
        <div class="case-details__card">
            <div class="case-details__person person">
                <div class="person__thumb">
                    <?php if (!empty($case_details_thumb)) { ?>
                        <img class="cover-image"
                            src="<?php echo esc_url($case_details_thumb['url']); ?>"
                            alt="<?php echo esc_attr($case_details_thumb['alt']); ?>">
                    <?php } else { ?>
                        <img class="cover-image"
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/person-placeholder.jpg'); ?>"
                            alt="Placeholder">
                    <?php } ?>
                </div>
                <div class="person__info">
                    <div class="person__name title-xs gradient-text"><?php echo $case_person_name; ?></div>
                    <div class="person__position"><?php echo $case_person_position; ?></div>
                </div>
            </div>
            <ul class="case-details__list">
                <?php foreach ($case_details_list as $list) { ?>
                    <li class="case-details__item">
                        <div class="case-details__item-property"><?php echo $list['property']; ?></div>
                        <div class="case-details__item-value"><?php echo $list['value']; ?></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="case-details__categories">
                <?php echo display_category_and_tag_terms($post_id = get_the_ID(), $taxonomy = 'case-tags', $tag = 'a', $class = 'case-details__category label-badge label-badge--small'); ?>
            </div>
        </div>
        <div class="case-details__description typography-block">
            <h2><?php echo $case_details_h2; ?></h2>
            <?php echo $case_details_desc; ?>
            <?php if (!empty($case_details_img)) { ?>
                <img class="case image"
                    src="<?php echo esc_url($case_details_img['url']); ?>"
                    alt="<?php echo esc_attr($case_details_img['alt']); ?>">
            <?php } ?>
        </div>
    </div>
</section>