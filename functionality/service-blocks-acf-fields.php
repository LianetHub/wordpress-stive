<?php

/**
 * ACF fields for Service page Gutenberg blocks.
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
        'fields' => array(
            array(
                'key' => 'field_service_intro_llm_title',
                'label' => 'Title',
                'name' => 'service_intro_llm_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_service_intro_llm_body',
                'label' => 'Body',
                'name' => 'service_intro_llm_body',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
            ),
            array(
                'key' => 'field_service_intro_cases',
                'label' => 'Cases',
                'name' => 'service_intro_cases',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add case',
                'sub_fields' => array(
                    array(
                        'key' => 'field_service_intro_case_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_service_intro_case_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_service_intro_case_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ),
                    array(
                        'key' => 'field_service_intro_case_metrics',
                        'label' => 'Metrics',
                        'name' => 'metrics',
                        'type' => 'repeater',
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_service_intro_case_metric_label',
                                'label' => 'Label',
                                'name' => 'metric_label',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_service_intro_case_metric_value',
                                'label' => 'Value',
                                'name' => 'metric_value',
                                'type' => 'text',
                            ),
                        ),
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
        'fields' => array(
            array(
                'key' => 'field_service_included_title',
                'label' => 'Section title',
                'name' => 'service_included_title',
                'type' => 'text',
            ),
            array(
                'key' => 'field_service_included_items',
                'label' => 'Items',
                'name' => 'service_included_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add item',
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
            ),
            array(
                'key' => 'field_service_contact_map',
                'label' => 'Map image',
                'name' => 'service_contact_map',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_service_contact_cta_primary',
                'label' => 'Primary button',
                'name' => 'service_contact_cta_primary',
                'type' => 'link',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_service_contact_cta_secondary',
                'label' => 'Secondary button',
                'name' => 'service_contact_cta_secondary',
                'type' => 'link',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_service_contact_trust',
                'label' => 'Trust logos',
                'name' => 'service_contact_trust',
                'type' => 'repeater',
                'layout' => 'table',
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
