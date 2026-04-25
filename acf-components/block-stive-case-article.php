<?php
$case_article_title = get_field('case_article_title'); //text
$case_article_block = get_field('case_article_block'); //wysiwyg
?>
<article class="article article--case">
    <div class="article__container container typography-block">
        <h2><?php echo $case_article_title; ?></h2>
        <?php echo $case_article_block; ?>
    </div>
</article>