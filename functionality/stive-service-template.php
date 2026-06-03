<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Wraps non-ACF Gutenberg blocks in the single-service article shell.
 *
 * Time complexity: O(1) relative to content length (string concat only).
 *
 * @param string $content Rendered HTML fragment.
 * @return string Wrapped markup or empty string when input is blank.
 */
function stive_service_wrap_standard_content(string $content): string
{
    $content = trim($content);
    if ($content === '') {
        return '';
    }

    return sprintf(
        '<article id="service-content" class="article article--service">
            <div class="article__container container typography-block">
                %s
            </div>
        </article>',
        $content
    );
}

/**
 * Renders parsed Gutenberg blocks for a service post (ACF + standard blocks).
 *
 * Skips case-only ACF blocks on service singles. Complexity: O(n) for n blocks.
 *
 * @param WP_Post|int|null $post Post object, ID, or null for current post in the loop.
 */
function stive_service_render_single_content($post = null): void
{
    try {
        $resolved = $post instanceof WP_Post ? $post : get_post($post);
        if (!$resolved instanceof WP_Post) {
            return;
        }

        $raw_content = get_post_field('post_content', $resolved->ID);
        if (!is_string($raw_content) || $raw_content === '') {
            return;
        }

        $blocks = parse_blocks($raw_content);
        if (!is_array($blocks) || $blocks === array()) {
            return;
        }

        $output = '';
        $standard_blocks_buffer = '';

        foreach ($blocks as $block) {
            if (!is_array($block)) {
                continue;
            }

            $block_name = isset($block['blockName']) ? (string) $block['blockName'] : '';
            $is_acf_block = $block_name !== '' && str_starts_with($block_name, 'acf/');
            $skip_case = $is_acf_block
                && function_exists('stive_service_is_case_only_acf_block')
                && stive_service_is_case_only_acf_block($block);

            if ($skip_case) {
                continue;
            }

            if ($is_acf_block) {
                if ($standard_blocks_buffer !== '') {
                    $output .= stive_service_wrap_standard_content($standard_blocks_buffer);
                    $standard_blocks_buffer = '';
                }

                if (function_exists('stive_service_prepare_acf_block_context')) {
                    stive_service_prepare_acf_block_context($block);
                }

                $rendered_block = render_block($block);

                if (function_exists('stive_service_reset_acf_block_context')) {
                    stive_service_reset_acf_block_context($block);
                }

                if (trim($rendered_block) !== '') {
                    $output .= $rendered_block;
                }
            } else {
                $rendered_block = render_block($block);
                if (trim($rendered_block) !== '') {
                    $standard_blocks_buffer .= $rendered_block;
                }
            }
        }

        if ($standard_blocks_buffer !== '') {
            $output .= stive_service_wrap_standard_content($standard_blocks_buffer);
        }

        $output = trim($output);
        if ($output !== '') {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- filtered block HTML.
            echo $output;
        }
    } catch (Throwable $exception) {
        if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
            // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
            error_log(
                sprintf(
                    'stive_service_render_single_content: %s',
                    $exception->getMessage()
                )
            );
        }
    }
}
