<?php
$case_conclusion_title = get_field('case_conclusion_title'); //text
$case_conclusion_qoute = get_field('case_conclusion_qoute'); //text
$case_conclusion_card_tag = get_field('case_conclusion_card_tag'); //select or text
$case_conclusion_card_class = get_field('case_conclusion_card_class'); //select or text
$case_conclusion_testimonial = get_field('case_conclusion_conclusion_testimonial'); //repeater
$testimonial = [
    'class' => 'conclusion__review',
    'name' => 'Vladyslav Nykytenkov',
    'title' => 'CEO @ Bulls Agency',
    'rating' => 5,
    'text' => 'Thanks to STIVE\'s efforts, the client saw an 80% increase in organic traffic, a 5.74x ROAS, and top 1-2 positions in LLM-generated answers for key industry queries. The team was well-organized, responsive, and proactive. Moreover, STIVE\'s expertise in GEO and LLM visibility was impressive.',
    'class' => "testimonial--large"
]
?>

  <section class="conclusion">
    <div class="conclusion__container container">
      <div class="conclusion__main">
        <h2 class="conclusion__title">CONCLUSION</h2>
        <blockquote class="conclusion__qoute">Pull quote – the single most important takeaway from this case. Bold claim, specific result</blockquote>
      </div>
      <?php
        if ($testimonial) { ?>
        <?php
		$card_tag = isset($testimonial['tag']) ? $testimonial['tag'] : 'div';
		$card_class = isset($testimonial['class']) ? ' ' . $testimonial['class'] : '';?>
          <<?php echo $card_tag; ?> class="testimonial
            <?php echo $card_class; ?>">
              <div class="testimonial__header">
                <div class="testimonial__author">
                  <p class="testimonial__author-name">
                    <?php echo esc_html($testimonial['name']); ?>
                  </p>
                  <p class="testimonial__author-title">
                    <?php echo esc_html($testimonial['title']); ?>
                  </p>
                </div>
                <div class="testimonial__rating">
                  <?php
            $rating = intval($testimonial['rating']);
            for ($i = 0; $i < $rating; $i++): ?>
                    <span class="icon-star"></span>
                    <?php endfor; ?>
                </div>
              </div>
              <blockquote class="testimonial__text">
                <?php echo esc_html($testimonial['text']); ?>
              </blockquote>
          </<?php echo $card_tag; ?>> <?php } ?>
    </div>
  </section>