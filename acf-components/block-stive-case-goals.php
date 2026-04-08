<?php
$case_goals = get_field('case_goals'); //repeater
$goals_items = [
    [
        'title' => 'Brand Awareness',
        'desc'  => 'Increase overall visibility in the digital landscape and establish a strong presence among the target audience.'
    ],
    [
        'title' => 'Lead Generation',
        'desc'  => 'Implement high-converting strategies to attract qualified prospects and grow the customer database.'
    ],
    [
        'title' => 'Market Expansion',
        'desc'  => 'Scale operations into new regions and demographics while maintaining consistent brand messaging.'
    ],
];
?>

<div class="goals">
    <div class="container">
        <?php if (!empty($goals_items)) : ?>
            <ul class="goals__list">
                <?php foreach ($goals_items as $index => $goal) : ?>
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