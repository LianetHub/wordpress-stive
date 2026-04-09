<?php
$case_goals = get_field('case_goals'); //repeater

?>

<div class="goals">
    <div class="container">
        <?php if (!empty($case_goals)) : ?>
            <ul class="goals__list">
                <?php foreach ($case_goals as $index => $goal) : ?>
                    <li class="goals__card">
                        <div class="goals__card-num">
                            <?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                        </div>
                        <div class="goals__card-title">
                            <?php echo esc_html($goal['title']); ?>
                        </div>
                        <div class="goals__card-desc">
                            <?php echo esc_html($goal['desc']); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>