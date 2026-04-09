<?php
$args = array(
    'post_type'      => 'case',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
);

$case_studies_query = new WP_Query( $args );
$case_studies = $case_studies_query->posts;


?>

<?php if ($case_studies_query->have_posts()) : ?>
    <section class="cases">
        <div class="container">
            <h2 class="cases__title title"><?php echo get_field('front_slider_h2'); ?></h2>
            <div class="cases__slider swiper">
                <ul class="swiper-wrapper">
                    <?php foreach ($case_studies as $case) : 
                        $thumbnail_url = get_the_post_thumbnail_url($case->ID, 'full');
                    ?>
                        <li class="case-card swiper-slide">
                            <a href="<?php echo esc_url(get_permalink($case->ID)); ?>" class="case-card__link-wrapper">
                                <picture class="case-card__image">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" 
                                         alt="<?php echo esc_attr(get_the_title($case->ID)); ?>" 
                                         class="cover-image" 
                                         loading="lazy">
                                </picture>
                                <div class="case-card__details">
                                    <div class="case-card__details-main">
                                        <div class="case-card__name">
                                            <?php echo esc_html(get_field('case_related_title', $case->ID)); ?>
                                        </div>
                                        <p class="case-card__desc">
                                            <?php echo esc_html(get_field('case_related_subtitle', $case->ID)); ?>
                                        </p>
                                    </div>
                                    <div class="case-card__arrow icon-long-arrow"></div>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; 
wp_reset_postdata();
?>