<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();

require_once TEMPLATE_PATH . '_breadcrumbs.php';

require_once TEMPLATE_PATH . '_archive-service-heading.php';
require_once TEMPLATE_PATH . '_archive-service-grid.php';
require_once TEMPLATE_PATH . '_archive-service-founders.php';

require_once TEMPLATE_PATH . '_ready-to-scale.php';

get_footer();
