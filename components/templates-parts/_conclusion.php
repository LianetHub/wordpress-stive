<?php
$testimonial = [
    'class' => 'conclusion__review',
    'name' => 'Vladyslav Nykytenkov',
    'title' => 'CEO @ Bulls Agency',
    'rating' => 5,
    'text' => 'Thanks to STIVE\'s efforts, the client saw an 80% increase in organic traffic, a 5.74x ROAS, and top 1-2 positions in LLM-generated answers for key industry queries. The team was well-organized, responsive, and proactive. Moreover, STIVE\'s expertise in GEO and LLM visibility was impressive.'
]
?>
<section class="conclusion">
    <div class="conclusion__container container">
        <div class="conclusion__main">
            <h2 class="conclusion__title">CONCLUSION</h2>
            <blockquote class="conclusion__qoute">Pull quote – the single most important takeaway from this case. Bold claim, specific result</blockquote>
        </div>
        <?php
        if ($testimonial) {
            include(locate_template('components/parts/_testimonial-card.php'));
        }
        ?>
    </div>
</section>