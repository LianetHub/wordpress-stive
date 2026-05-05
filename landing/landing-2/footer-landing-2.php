<?php

declare(strict_types=1);

defined('ABSPATH') || exit;
?>
<?php require_once(TEMPLATE_PATH . '_modal-get-proposal.php'); ?>
<?php wp_footer(); ?>
</body>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        Fancybox.bind("[data-fancybox]", {});

        document.addEventListener('click', (e) => {
            const target = e.target.closest('[data-calendly]');

            if (target) {
                e.preventDefault();

                const calendarUrl = target.getAttribute('href');

                if (typeof Calendly !== 'undefined' && calendarUrl) {
                    Calendly.initPopupWidget({
                        url: calendarUrl
                    });
                } else if (calendarUrl) {
                    window.open(calendarUrl, '_blank');
                }
            }
        });
    })
</script>

</html>