<?php
$testimonials = [
    [
        'name' => 'Alex Johnson',
        'title' => 'CMO @ InnovateTech',
        'rating' => 5,
        'text' => 'The studio\'s services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.'
    ],
    [
        'name' => 'Maria Gonzalez',
        'title' => 'CEO @ Visionary Solutions',
        'rating' => 5,
        'text' => 'The studio\'s services are top-notch, consistently delivering high-quality results that exceed expectations.'
    ],
    [
        'name' => 'David Smith',
        'title' => 'COO @ Future Dynamics',
        'rating' => 4,
        'text' => 'High-quality results that exceed expectations. Their attention to detail and commitment truly set them apart.'
    ],
    [
        'name' => 'Sophia Lee',
        'title' => 'CEO @ Apex Innovations',
        'rating' => 5,
        'text' => 'Consistency in delivering results is what I love about them.'
    ],
];
?>

<?php if ($testimonials): ?>
    <div class="testimonials">
        <div class="container">
            <div class="testimonials__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <?php include(locate_template('components/parts/_testimonial-card.php')); ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>