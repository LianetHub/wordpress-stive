<?php
$testimonials = [
    [
        'name' => 'Vladyslav Nykytenkov',
        'title' => 'CEO @ Bulls Agency',
        'rating' => 5,
        'text' => 'Thanks to STIVE\'s efforts, the client saw an 80% increase in organic traffic, a 5.74x ROAS, and top 1-2 positions in LLM-generated answers for key industry queries. The team was well-organized, responsive, and proactive. Moreover, STIVE\'s expertise in GEO and LLM visibility was impressive.'
    ],
    [
        'name' => 'Konstantin Sko',
        'title' => 'CCO @ Math Agency',
        'rating' => 5,
        'text' => 'Thanks to STIVE\'s efforts, the client saw a significant increase in brand citations and referral traffic. The team had a deep understanding of LLM systems and was highly proactive. They met all deliverables on time and responded quickly to the client\'s requests.'
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