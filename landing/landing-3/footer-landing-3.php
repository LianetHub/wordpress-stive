<?php
declare(strict_types=1);

defined('ABSPATH') || exit;
?>
<?php require_once(TEMPLATE_PATH . '_modal-get-proposal.php'); ?>
<?php wp_footer(); ?>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof Fancybox !== "undefined" && Fancybox !== null) {
            Fancybox.bind("[data-fancybox]", { dragToClose: false });
        }

        document.addEventListener("click", function (event) {
            var trigger = event.target.closest("[data-calendly]");
            if (!trigger) {
                return;
            }

            event.preventDefault();
            var url = trigger.getAttribute("href");
            if (typeof Calendly !== "undefined" && url) {
                Calendly.initPopupWidget({ url: url });
                return;
            }

            if (url) {
                window.open(url, "_blank");
            }
        });

        if (typeof window.intlTelInput !== "undefined") {
            var telInputs = document.querySelectorAll('input[type="tel"]');
            telInputs.forEach(function (input) {
                window.intlTelInput(input, {
                    separateDialCode: true,
                    initialCountry: "auto",
                    geoIpLookup: function (callback) {
                        fetch("https://ipapi.co/json")
                            .then(function (response) { return response.json(); })
                            .then(function (data) { callback(data.country_code || "us"); })
                            .catch(function () { callback("us"); });
                    }
                });
            });
        }
    });
</script>
</body>
</html>

