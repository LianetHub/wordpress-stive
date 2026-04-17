<?php
$features = [
        [
                'caption' => 'Result Title',
                'num' => '292%',
                'desc' => '1-2 sentences with context for this number'
        ],
        [
                'caption' => 'Result Title',
                'num' => '292%',
                'desc' => '1-2 sentences with context for this number'
        ],
        [
                'caption' => 'Result Title',
                'num' => '292%',
                'desc' => '1-2 sentences with context for this number'
        ],
];
?>

<?php if (!empty($features)) : ?>
    <div class="features">
        <div class="container">
            <ul class="features__list">
                <?php foreach ($features as $feature) : ?>
                    <li class="features__card">
                        <div class="features__card-caption">
                            <?php echo esc_html($feature['caption']); ?>
                        </div>
                        <div class="features__card-num title">
                            <?php echo esc_html($feature['num']); ?>
                        </div>
                        <div class="features__card-desc">
                            <?php echo esc_html($feature['desc']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>