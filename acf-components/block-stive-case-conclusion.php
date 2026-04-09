<?php
$case_conclusion_title = get_field('case_conclusion_title'); //text
$case_conclusion_qoute = get_field('case_conclusion_qoute'); //text
$case_conclusion_card_tag = get_field('case_conclusion_card_tag'); //select
$case_conclusion_card_class = get_field('case_conclusion_card_class'); //select
$case_conclusion_testimonial = get_field('case_conclusion_testimonial'); //repeater
?>

  <section class="conclusion">
    <div class="conclusion__container container">
      <div class="conclusion__main">
        <h2 class="conclusion__title"><?php echo $case_conclusion_title; ?></h2>
        <blockquote class="conclusion__qoute"><?php echo $case_conclusion_qoute; ?></blockquote>
      </div>
<?php if ($case_conclusion_testimonial): ?>
  <?php foreach ($case_conclusion_testimonial as $testimonial_item): ?>
    <<?php echo $case_conclusion_card_tag; ?> class="testimonial <?php echo esc_html($testimonial_item['class']); ?>">
      <div class="testimonial__header">
        <div class="testimonial__author">
          <p class="testimonial__author-name">
            <?php echo esc_html($testimonial_item['name']); ?>
          </p>
          <p class="testimonial__author-title">
            <?php echo esc_html($testimonial_item['title']); ?>
          </p>
        </div>
        <div class="testimonial__rating">
          <?php $rating = intval($testimonial_item['rating']); ?>
          <?php for ($i = 0; $i < $rating; $i++): ?>
            <span class="icon-star"></span>
          <?php endfor; ?>
        </div>
      </div>
      <blockquote class="testimonial__text">
        <?php echo esc_html($testimonial_item['text']); ?>
      </blockquote>
    </<?php echo $case_conclusion_card_tag; ?>>
  <?php endforeach; ?>
<?php endif; ?>
    </div>
  </section>