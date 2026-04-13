<?php
/*
Template Name: Main Blog with ACF
Template Post Type: blog
*/
?>
<?php $page_id = $post->ID;

$calendly = get_field('calendly_link', 'option');
?>

<?php get_header(); ?>

<?php require_once(TEMPLATE_PATH . '_breadcrumbs.php'); ?>

<section class="article">
    <div class="article__container container">
        <div class="article__wrapper">
            <div class="article__body typography-block">
                <?php the_content() ?>
            </div>
                <?php display_universal_sidebar(); ?>
        </div>
    </div>
</section>

<?php

$module_ids = get_field('blog_after_main_content',get_queried_object());
if ($module_ids) 
{
	foreach ($module_ids as $module_id) 
	{
		$post = get_post($module_id);
		if ($post)			
		{
			if (get_field('is_faq', $module_id))
			{ ?>
			<section class="faq" id="faq" itemscope itemtype="https://schema.org/FAQPage">
            <div class="container">
            <h2 class="faq__title title-xs">Frequently Asked Questions</h2>
			<?php
			setup_postdata($post); 
			echo apply_filters('the_content', $post->post_content);
			wp_reset_postdata();
			?>
			</div>
            </section>
			<?php
			} else {
			setup_postdata($post); 
			echo apply_filters('the_content', $post->post_content);
			wp_reset_postdata();
			}
				
		}
	}
}
?>


<?php get_footer(); ?>