<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Services archive: 3 columns per row, any number of CPT posts.
 * Tail stats: count % 3 → hidden | plain | --paired (see stive_service_archive_grid_tail_stats).
 */
?>

<section class="services-archive">
    <div class="container">
        <div class="services-archive__grid">
            <?php
            if (function_exists('stive_service_archive_render_grid')) {
                stive_service_archive_render_grid();
            }
            ?>
        </div>
    </div>
</section>
