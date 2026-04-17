<?php
$case_results_h2 = get_field('case_results_h2'); //text
$case_results_items = get_field('case_results_items'); //repeater
$case_results_card_url = get_field('case_results_card_url'); //link

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
                    <?php if ($case_results_card_url) {
                        $link_url = $case_results_card_url['url'];
                        $link_target = $case_results_card_url['target'] ? $case_results_card_url['target'] : '_self'; ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                           class="results__card-link">
                            <div class="results__card-title">
                                Bring me <br> same result
                            </div>
                            <picture class="results__card-image">
                                <img
                                        src="<?php echo IMG_PATH ?>/why/ai-collage-mobile.png"
                                        alt="ai agents"
                                        loading="lazy">
                            </picture>
                        </a>
                    <?php } ?>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</section>