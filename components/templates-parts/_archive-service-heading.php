<?php $calendly = get_field('calendly_link', 'option'); ?>
<section class="heading heading--services heading--services-archive">
    <div class="heading__container container">
        <div class="heading__main">
            <h1 class="heading__title title-sm">Our Solutions for<br>AI-First Marketing</h1>
            <p class="heading__description">When someone asks ChatGPT &ldquo;what&rsquo;s the best payment solution&rdquo; or &ldquo;which fintech should I trust,&rdquo; your brand needs to be the answer. We build the AI presence, citations, and reputation signals that make that happen.</p>
            <div class="heading__actions">
                <a href="<?php echo $calendly['url']; ?>"
                    data-calendly
                    class="heading__btn btn btn-primary">Book Strategy Call</a>
                <a href="#get-proposal"
                    data-fancybox
                    class="heading__btn btn btn-grey">Get Proposal</a>
            </div>
        </div>
    </div>
</section>