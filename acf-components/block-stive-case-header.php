<?php
$case_title = get_field('case_title'); //text
$case_description = get_field('case_description'); //text
$case_btn_secondary = get_field('case_btn_secondary'); //link
$case_image = get_field('case_image'); //img
?>
<section class="heading">
	<div class="heading__container container">
		<div class="heading__main">
		<div class="heading__categories">
			<?php echo display_category_and_tag_terms($post_id=get_the_ID(), $taxonomy='case-list', $tag='a', $class='heading__categories label-badge'); ?>
		</div>
			<h1 class="heading__title title-sm"><?php echo $case_title; ?></h1>
			<p class="heading__description"><?php echo $case_description; ?></p>
			<div class="heading__actions">
					<a data-fancybox href="#get-proposal" class="heading__btn btn btn-primary">Get Similar Results</a>
				<?php if ($case_btn_secondary) {
					$link_url = $case_btn_secondary['url'];
					$link_title = $case_btn_secondary['title'];
					$link_target = $case_btn_secondary['target'] ? $case_btn_secondary['target'] : '_self';
				?>
					<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="heading__btn btn btn-grey"><?php echo esc_html($link_title); ?></a>
				<?php } ?>
			</div>
		</div>
		<picture class="heading__image">
			<?php if (!empty($case_image)) { ?>
				<img
					src="<?php echo esc_url($case_image['url']); ?>"
					alt="<?php echo esc_attr($case_image['alt']); ?>">
			<?php } ?>
		</picture>
	</div>
</section>