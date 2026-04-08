<?php 
$case_title = get_field('case_title'); //text
$case_description = get_field('case_description'); //text
$case_btn_primary = get_field('case_btn_primary'); //link
$case_btn_secondary = get_field('case_btn_secondary'); //link
$case_image = get_field('case_image'); //img
?>
<section class="case">
    <div class="case__container container">
        <div class="case__main">
		<?php echo display_case_categories(); ?>
            <h1 class="case__title title-sm">Case Headline <br> Key Result +&nbsp;Client&nbsp;Name</h1>
            <p class="case__description">Short case description – 2-3 sentences. What was done, for whom, main outcome. Collpases with +- toggle on mobile</p>
            <div class="case__actions">
                <a href="" class="case__btn btn btn-primary">Get Similar Results</a>
                <a href="" class="case__btn btn btn-grey">See How We Did It</a>
            </div>
        </div>
        <picture class="case__image">
            <img
                src="<?php echo IMG_PATH . '/cases/case_study-1.jpg' ?>"
                alt="case image">
        </picture>
    </div>
</section>