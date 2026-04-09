<?php 
$case_title = get_field('case_title'); //text
$case_description = get_field('case_description'); //text
$case_btn_primary = get_field('case_btn_primary'); //link
$case_btn_secondary = get_field('case_btn_secondary'); //link
$case_image = get_field('case_image'); //img
?>
<section class="case">
    <div class="case__container container">
        <div class="case__main">
		<?php echo display_category_and_tag_terms(get_the_ID(), 'case-list', 'case__categories'); ?>
            <h1 class="case__title title-sm"><?php echo $case_title; ?></h1>
            <p class="case__description"><?php echo $case_description; ?></p>
            <div class="case__actions">
			<?php if ($case_btn_primary) { 
			$link_url = $case_btn_primary['url'];
			$link_title = $case_btn_primary['title'];
			$link_target = $case_btn_primary['target'] ? $case_btn_primary['target'] : '_self';
			?>
			    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="case__btn btn btn-primary"><?php echo esc_html( $link_title ); ?></a>
			<?php } ?>
			<?php if ($case_btn_secondary) {
			$link_url = $case_btn_secondary['url'];
			$link_title = $case_btn_secondary['title'];
			$link_target = $case_btn_secondary['target'] ? $case_btn_secondary['target'] : '_self';
			?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="case__btn btn btn-grey"><?php echo esc_html( $link_title ); ?></a>
			<?php } ?>
            </div>
        </div>
        <picture class="case__image">
		<?php if( !empty($case_image) ) { ?>
            <img
                src="<?php echo esc_url($image['url']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>">
		<?php } ?>
        </picture>
    </div>
</section>