<?php
$case_contact_title = get_field('case_contact_title'); //text
$case_contact_subtitle = get_field('case_contact_subtitle'); //text
$case_contact_btn_first = get_field('case_contact_btn_first'); //link
$case_contact_btn_second = get_field('case_contact_btn_second'); //link
?>
<section class="contacts">
    <div class="contacts__container container">
        <div class="contacts__offer">
            <h2 class="contacts__title title-xs gradient-text">Feel Free <br> to contact us:</h2>
            <p class="contacts__subtitle">Supporting copy — we are the team of experts that will support your business at all stages.</p>
            <div class="contacts__actions">
                <a
                    href="https://calendly.com/as-stive/30min"
                    data-calendly
                    class="contacts__btn btn btn-secondary">Schedule a Call</a>
                <a href="#get-proposal"
                    data-fancybox
                    class="contacts__btn btn btn-grey">Get Proposal</a>
            </div>
        </div>
    </div>
</section>