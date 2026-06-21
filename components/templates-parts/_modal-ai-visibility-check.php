<dialog
        class="popup popup--ai-check"
        id="ai-visibility-check"
        aria-labelledby="ai-check-title">
    <div class="popup__badge">
        <span class="popup__badge-dot" aria-hidden="true"></span>
        AI Visibility Check
    </div>
    <h2 class="popup__title title-sm" id="ai-check-title">
        Your site is <span class="gradient-text">in the queue!</span>
    </h2>
    <p class="popup__subtitle">
        We've received your request and will analyze how AI models see your brand.
        Leave your contacts — we'll send the results directly to you.
    </p>
    <div class="popup__form">
        <?php echo do_shortcode('[contact-form-7 id="3b618ca" title="AI Visibility Check"]'); ?>
    </div>
</dialog>
