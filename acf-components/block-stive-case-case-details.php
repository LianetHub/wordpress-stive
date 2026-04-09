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
            <div class="case-details__person">
                <div class="case-details__person-thumb">
				<?php if( !empty($case_details_thumb) ) { ?>
				<img class="cover-image"
				src="<?php echo esc_url($case_details_thumb['url']); ?>"
                alt="<?php echo esc_attr($case_details_thumb['alt']); ?>">
				<?php } ?>
                </div>
                <div class="case-details__person-info">
                    <div class="case-details__person-name title-xs gradient-text"><?php echo $case_person_name; ?></div>
                    <div class="case-details__person-position"><?php echo $case_person_position; ?></div>
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
			<?php echo display_category_and_tag_terms(get_the_ID(), 'case-tags', 'case-details__categories', 'case-details__category label-badge label-badge--small'); ?>
        </div>
        <div class="case-details__description typography-block">
            <h2><?php echo $case_details_h2; ?></h2>
			<?php echo $case_details_desc; ?>
			<?php if( !empty($case_details_img) ) { ?>
				<img class="case image"
				src="<?php echo esc_url($case_details_img['url']); ?>"
                alt="<?php echo esc_attr($case_details_img['alt']); ?>">
			<?php } ?>
        </div>
    </div>
</section>