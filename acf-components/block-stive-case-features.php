<?php
$case_features = get_field('case_features'); //repeater
?>

<?php if (!empty($case_features)) : ?>
    <div class="features">
        <div class="container">
            <ul class="features__list">
                <?php foreach ($case_features as $feature) : ?>
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