<?php
$case_results_h2 = get_field('case_results_h2'); //text
$case_results_items = get_field('case_results_items'); //repeater
$case_results_card_title = get_field('case_results_card_title'); //text
$case_results_card_image = get_field('case_results_card_image'); //img
$results_items = [
    [
        'num'     => '292%',
        'caption' => 'Traffic Growth',
        'desc'    => 'Significant increase in organic search traffic following the implementation of LLM-optimized strategies.'
    ],
    [
        'num'     => '45%',
        'caption' => 'Conversion Rate',
        'desc'    => 'Enhanced user engagement and streamlined funnels led to a steady rise in overall conversions.',
    ],
    [
        'num'     => '-30%',
        'caption' => 'CPA Reduction',
        'desc'    => 'Strategic automation and precise targeting allowed us to lower the cost per acquisition effectively.',
    ],
    [
        'num'     => '120k',
        'caption' => 'New Users',
        'desc'    => 'A record-breaking influx of unique visitors within the first quarter after the platform relaunch.',
    ],
    [
        'num'     => '15/10',
        'caption' => 'ROI Factor',
        'desc'    => 'The return on investment exceeded initial projections, proving the efficiency of the new marketing mix.',
    ],
];
?>

<section class="results">
    <div class="container">
        <h2 class="results__title title-xs gradient-text">Results</h2>

        <?php if (!empty($results_items)) : ?>
            <ul class="results__list">
                <?php foreach ($results_items as $item) : ?>
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
                    <a href="" class="results__card-link">
                        <div class="results__card-title">
                            Bring me <br>
                            same result
                        </div>
                        <picture class="results__card-image">
                            <img
                                src="<?php echo IMG_PATH ?>/why/ai-collage-mobile.png"
                                alt="ai agents"
                                loading="lazy">
                        </picture>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</section>