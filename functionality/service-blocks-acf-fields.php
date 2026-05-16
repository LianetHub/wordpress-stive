<?php

/**
 * ACF fields for Service page Gutenberg blocks.
 *
 * Block Service Intro (acf/service-intro):
 * - service_intro_llm_title (text)
 * - service_intro_llm_body (wysiwyg)
 * - service_intro_cases (repeater)
 *   - case_id (post_object, post_type: case, return: post ID)
 */
function stive_register_service_blocks_acf_fields()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    $block_location = static function (string $block_name): array {
        return array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/' . $block_name,
                ),
            ),
        );
    };

    acf_add_local_field_group(array(
        'key' => 'group_stive_service_intro',
        'title' => 'Block Service Intro',
        'description' => 'Intro copy plus a slider of linked case study cards.',
        'fields' => array(
            array(
                'key' => 'field_service_intro_llm_title',
                'label' => 'Title',
                'name' => 'service_intro_llm_title',
                'type' => 'text',
                'instructions' => 'Heading shown in the left column.',
            ),
            array(
                'key' => 'field_service_intro_llm_body',
                'label' => 'Body',
                'name' => 'service_intro_llm_body',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'instructions' => 'Supporting text under the title.',
            ),
            array(
                'key' => 'field_service_intro_cases',
                'label' => 'Cases',
                'name' => 'service_intro_cases',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add case',
                'instructions' => 'Add published case studies. Each card uses that case post for image, subtitle, and metrics — nothing is entered here manually.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_intro_case_id',
                        'label' => 'Case',
                        'name' => 'case_id',
                        'type' => 'post_object',
                        'post_type' => array('case'),
                        'return_format' => 'id',
                        'ui' => 1,
                        'allow_null' => 0,
                        'required' => 1,
                        'instructions' => 'Select a Case post. Edit the card title visibility, subtitle (case_related_subtitle), and metrics on the case edit screen.',
                    ),
                ),
            ),
        ),
        'location' => $block_location('service-intro'),
        'active' => true,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_stive_service_included',
        'title' => 'Block Service Included',
        'description' => 'What is included in this service (card grid).',
        'fields' => array(
            array(
                'key' => 'field_service_included_title',
                'label' => 'Section title',
                'name' => 'service_included_title',
                'type' => 'text',
                'instructions' => 'Optional. Leave empty to hide the section heading.',
            ),
            array(
                'key' => 'field_service_included_items',
                'label' => 'Items',
                'name' => 'service_included_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add item',
                'instructions' => 'One card per row: short title and description.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_included_item_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_included_item_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),
        ),
        'location' => $block_location('service-included'),
        'active' => true,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_stive_service_challenges',
        'title' => 'Challenges We Solve',
        'description' => 'Pain points or problems this service addresses.',
        'fields' => array(
            array(
                'key' => 'field_service_challenges_title',
                'label' => 'Section title',
                'name' => 'service_challenges_title',
                'type' => 'text',
                'default_value' => 'Challenges We Solve',
            ),
            array(
                'key' => 'field_service_challenges_items',
                'label' => 'Challenges',
                'name' => 'service_challenges_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add challenge',
                'instructions' => 'List each challenge as a separate item.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_challenges_item_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_challenges_item_text',
                        'label' => 'Text',
                        'name' => 'text',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),
        ),
        'location' => $block_location('service-challenges'),
        'active' => true,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_stive_service_faq',
        'title' => 'Block Service FAQ',
        'description' => 'Accordion FAQ for this service page.',
        'fields' => array(
            array(
                'key' => 'field_service_faq_title',
                'label' => 'Section title',
                'name' => 'service_faq_title',
                'type' => 'text',
                'default_value' => 'Frequently Asked Questions',
            ),
            array(
                'key' => 'field_service_faq_items',
                'label' => 'FAQ items',
                'name' => 'service_faq_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add question',
                'instructions' => 'Question and answer pairs shown in the FAQ block.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_faq_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_faq_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'rows' => 4,
                    ),
                ),
            ),
        ),
        'location' => $block_location('service-faq'),
        'active' => true,
    ));

    acf_add_local_field_group(array(
        'key' => 'group_stive_service_contact',
        'title' => 'Block Service Contact',
        'description' => 'Contact CTA section with map image and trust logos.',
        'fields' => array(
            array(
                'key' => 'field_service_contact_title',
                'label' => 'Title',
                'name' => 'service_contact_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_service_contact_text',
                'label' => 'Text',
                'name' => 'service_contact_text',
                'type' => 'wysiwyg',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'instructions' => 'Short pitch above the buttons.',
            ),
            array(
                'key' => 'field_service_contact_map',
                'label' => 'Map image',
                'name' => 'service_contact_map',
                'type' => 'image',
                'return_format' => 'array',
                'instructions' => 'Decorative map or location graphic.',
            ),
            array(
                'key' => 'field_service_contact_cta_primary',
                'label' => 'Primary button',
                'name' => 'service_contact_cta_primary',
                'type' => 'link',
                'return_format' => 'array',
                'instructions' => 'Main call to action (e.g. book a call).',
            ),
            array(
                'key' => 'field_service_contact_cta_secondary',
                'label' => 'Secondary button',
                'name' => 'service_contact_cta_secondary',
                'type' => 'link',
                'return_format' => 'array',
                'instructions' => 'Optional second link.',
            ),
            array(
                'key' => 'field_service_contact_trust',
                'label' => 'Trust logos',
                'name' => 'service_contact_trust',
                'type' => 'repeater',
                'layout' => 'table',
                'instructions' => 'Partner or review logos shown under the CTAs.',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_contact_trust_logo',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                ),
            ),
        ),
        'location' => $block_location('service-contact'),
        'active' => true,
    ));
}

add_action('acf/init', 'stive_register_service_blocks_acf_fields');
