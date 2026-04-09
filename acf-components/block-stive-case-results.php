<?php
$case_results_h2 = get_field('case_results_h2'); //text
$case_results_items = get_field('case_results_items'); //repeater
$case_results_card_title = get_field('case_results_card_title'); //link
$case_results_card_image = get_field('case_results_card_image'); //img
?>

<section class="results">
    <div class="container">
        <h2 class="results__title title-xs gradient-text"><?php echo $case_results_h2; ?></h2>

        <?php if (!empty($case_results_items)) : ?>
            <ul class="results__list">
                <?php foreach ($case_results_items as $item) : ?>
                    <li class="results__card">
                        <div class="results__card-num title">
                            <?php echo esc_html($item['num']); ?>
                        </div>
                        <div class="results__card-caption">
                            <?php echo esc_html($item['caption']); ?>
                        </div>
                        <div class="results__card-desc">
                            <?php echo esc_html($item['desc']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
                <li class="results__card results__card--button">
				<?php if ($case_results_card_title) {
					$link_url = $case_results_card_title['url'];
					$link_title = $case_results_card_title['title'];
					$link_target = $case_results_card_title['target'] ? $case_results_card_title['target'] : '_self';					
				?>
				
                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="results__card-link">
                        <div class="results__card-title">
						<?php echo esc_html( $link_title ); ?>
                        </div>
                        <picture class="results__card-image">
						<?php if ($case_results_card_image) { ?>
                            <img
                                src="<?php echo esc_url($case_results_card_image['url']); ?>"
                                alt="<?php echo esc_attr($case_results_card_image['alt']); ?>"
                                loading="lazy">
						<?php } ?>
                        </picture>
                    </a>
				<?php } ?>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</section>