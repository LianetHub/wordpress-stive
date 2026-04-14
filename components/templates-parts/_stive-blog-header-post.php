<?php
$blog_header_description = get_field('blog_header_description'); //text
?>
<section class="heading heading--blog-post">
    <div class="heading__container container">
        <div class="heading__main">
            <div class="heading__categories">
				<?php echo display_category_and_tag_terms($post_id=get_the_ID(), $taxonomy='blog-list', $tag='a', $class='heading__categories label-badge'); ?>
            </div>
            <h1 class="heading__title title-sm"><?php the_title(); ?></h1>
            <p class="heading__description"><?php echo $blog_header_description; ?></p>
            <div class="heading__stats stats-block">
                <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>" class="stats-block__item icon-date">
				<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
				</time>
				<time datetime="<?php echo esc_attr( get_the_modified_date( 'Y-m-d' ) ); ?>" class="stats-block__item icon-update">
				<?php echo esc_html( get_the_modified_date( 'F j, Y' ) ); ?>
				</time>
                <div class="stats-block__item icon-clock">
                    <?php r4_get_the_reading_time($before = '', $after = ' min read'); ?>
                </div>
            </div>
            <div class="heading__author author">
                <div class="author__thumb">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 60, '', 'person avatar', array( 'class' => 'cover-image' ) ); ?>
                </div>
				<div class="author__details">
				<div class="author__name">
				<?php echo esc_html( get_the_author() ); ?>
				</div>
				<div class="author__position">
				<?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
				</div>
				</div>
            </div>
        </div>
        <picture class="heading__image ">
            <img
                src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
                alt="blog image"
                class="cover-image">
        </picture>
    </div>
</section>