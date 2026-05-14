<?php

/**
 * @return array<string, mixed>
 */
function stive_service_page_static_context()
{
        $img = defined('IMG_PATH') ? IMG_PATH : '';
        $cal = '#';
        $empty_img = array('url' => '', 'alt' => '');

        return array(
                'tags' => array(
                        array('label' => 'Category'),
                        array('label' => 'Industry'),
                ),
                'heading' => 'GEO Optimization for Brands That Want to Be the First AI Answer',
                'lead' => 'ChatGPT, Perplexity, Gemini, and Google AI Overviews recommend your brand — not your competitors. From audit to category leadership in 90 days.',
                'cta_primary' => array(
                        'url' => $cal,
                        'title' => 'Get Free AI Reputation Audit',
                        'target' => '_self',
                ),
                'cta_secondary' => array(
                        'url' => '#get-proposal',
                        'title' => 'Get Proposal',
                        'target' => '_self',
                ),
                'trust_logos' => array(
                        array('logo' => array('url' => $img . '/solutions/logo-clutch.webp', 'alt' => 'Clutch')),
                        array('logo' => array('url' => $img . '/solutions/logo-techreviewer.webp', 'alt' => 'Techreviewer')),
                        array('logo' => array('url' => $img . '/solutions/logo-trustpilot.webp', 'alt' => 'Trustpilot')),
                        array('logo' => array('url' => $img . '/solutions/logo-marketinghub.webp', 'alt' => 'Marketinghub')),
                ),
                'hero_visual' => $empty_img,
                'hero_logo' => $empty_img,
                'hero_metrics' => array(
                        array('metric_label' => 'ChatGPT referral traffic', 'metric_value' => '+688%'),
                        array('metric_label' => 'Perplexity referral traffic', 'metric_value' => '+268%'),
                        array('metric_label' => 'Bing organic traffic', 'metric_value' => '+726%'),
                        array('metric_label' => 'Citations', 'metric_value' => '780+'),
                ),
                'llm_title' => 'What Is LLM Reputation Management',
                'llm_body' => '<p>When someone asks ChatGPT “which brand should I trust,” the answer is shaped by citations, reviews, and third-party signals — not your website.</p><p>LLM Reputation Management means auditing and actively building those signals so AI models present your brand accurately, positively, and confidently. We identify where your reputation breaks down inside LLMs, eliminate hallucinations, and replace them with authoritative narratives that AI trusts — and repeats.</p>',
                'cases' => array(
                        array(
                                'image' => array('url' => $img . '/solutions/logo-clutch.jpg', 'alt' => ''),
                                'title' => 'Case Name',
                                'description' => '<p>Short case description – 2-3 sentences. What was done, for whom, main outcome.</p><p>Collapses with +- toggle on mobile</p>',
                                'metrics' => array(
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                ),
                        ),
                        array(
                                'image' => array('url' => $img . '/solutions/logo-trustpilot.jpg', 'alt' => ''),
                                'title' => 'Case Name',
                                'description' => '<p>Short case description – 2-3 sentences. What was done, for whom, main outcome.</p><p>Collapses with +- toggle on mobile</p>',
                                'metrics' => array(
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                        array('metric_label' => 'METRIC LABEL', 'metric_value' => '[+X%]'),
                                ),
                        ),
                ),
                'included_title' => 'What’s Included',
                'included_items' => array(
                        array('title' => 'LLM Brand Strategy', 'text' => 'We define how your brand should be described, positioned, and cited across all major AI models.'),
                        array('title' => 'Citation Building Campaign', 'text' => 'We place authoritative mentions of your brand on the sources LLMs actually train on and cite.'),
                        array('title' => 'Wikipedia & Knowledge Graph Optimization', 'text' => 'We build and optimize your brand’s structured presence so AI models have clean, trusted data to pull from.'),
                        array('title' => 'Review & Sentiment Management', 'text' => 'We monitor and shape the sentiment signals that influence how LLMs characterize your brand.'),
                        array('title' => 'Third-party Mention Boost', 'text' => 'We amplify your brand across forums, publications, and directories that feed LLM training data.'),
                        array('title' => 'Crisis & Hallucination Fix', 'text' => 'We identify and neutralize false, outdated, or damaging AI-generated claims about your brand.'),
                ),
                'process_steps' => array(
                        array('number' => '01', 'title' => 'Audit & Research', 'active' => true, 'art' => $empty_img),
                        array('number' => '02', 'title' => 'Strategy & Planning', 'active' => false, 'art' => $empty_img),
                        array('number' => '03', 'title' => 'AI Optimization & Execution', 'active' => false, 'art' => $empty_img),
                        array('number' => '04', 'title' => 'Scale & Reporting', 'active' => false, 'art' => $empty_img),
                ),
                'challenges_title' => 'Challenges We Solve',
                'challenges' => array(
                        array('title' => 'AI recommends your competitor', 'text' => 'You have a great product but ChatGPT and Perplexity consistently name someone else when users ask for recommendations.'),
                        array('title' => 'LLMs spread false information', 'text' => 'AI models hallucinate outdated pricing, wrong founders, or damaging claims — and users believe it.'),
                        array('title' => 'Your brand is invisible to AI', 'text' => 'Your brand exists online but LLMs don’t cite, mention, or recommend you in any category.'),
                        array('title' => 'Negative sentiment is baked in', 'text' => 'A past PR issue or bad reviews have trained LLMs to associate your brand with risk or doubt.'),
                        array('title' => 'Weak entity & Knowledge Graph', 'text' => 'AI models can’t confidently describe what you do because your Knowledge Graph and entity data are weak.'),
                        array('title' => 'Post-crisis reputation damage', 'text' => 'A reputation crisis left traces across the web that LLMs still reference — hurting trust and recommendations.'),
                ),
                'testimonials_title' => 'Testimonials',
                'testimonials' => array(
                        array('name' => 'Alex Johnson', 'role' => 'CMO @ InnovateTech', 'quote' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.", 'rating' => 5),
                        array('name' => 'Maria Gonzalez', 'role' => 'CEO @ Visionary Solutions', 'quote' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.", 'rating' => 5),
                        array('name' => 'David Smith', 'role' => 'COO @ Future Dynamics', 'quote' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.", 'rating' => 5),
                        array('name' => 'Sophia Lee', 'role' => 'CEO @ Apex Innovations', 'quote' => "The studio's services are top-notch, consistently delivering high-quality results that exceed expectations. Their attention to detail and commitment to client satisfaction truly set them apart.", 'rating' => 5),
                ),
                'faq_title' => 'Frequently Asked Questions',
                'faq_items' => array(
                        array('question' => 'What is LLM Reputation Management?', 'answer' => 'It’s the process of auditing and shaping how AI models like ChatGPT, Perplexity, and Gemini describe and recommend your brand — through citation building, sentiment management, and structured data optimization.', 'is_open' => true),
                        array('question' => 'Can you fix hallucinations about my brand?', 'answer' => 'Yes. We map false claims to sources, correct entity data, and rebuild citations so models stop repeating incorrect information.', 'is_open' => false),
                        array('question' => 'How is this different from traditional ORM?', 'answer' => 'Traditional ORM targets search results; LLM reputation targets training signals, citations, and structured data that models actually use when generating answers.', 'is_open' => false),
                        array('question' => 'Which AI models do you cover?', 'answer' => 'We work across major consumer and enterprise LLMs and AI overviews, including ChatGPT, Perplexity, Gemini, Copilot, and Google AI experiences.', 'is_open' => false),
                        array('question' => 'How quickly can results be seen?', 'answer' => 'Many teams see measurable movement in 8–12 weeks, with compounding gains over 90 days as new citations and entity signals propagate.', 'is_open' => false),
                        array('question' => 'Do I need to be an established brand to start?', 'answer' => 'No. Early-stage brands often benefit most by establishing clean entity data and authoritative citations before competitors lock in category narratives.', 'is_open' => false),
                ),
                'contact_title' => 'Feel Free to contact us:',
                'contact_text' => '<p>Supporting copy — we are the team of experts that will support your business at all stages.</p>',
                'contact_map' => $empty_img,
                'contact_cta_primary' => array(
                        'url' => $cal,
                        'title' => 'Schedule a Call',
                        'target' => '_self',
                ),
                'contact_cta_secondary' => array(
                        'url' => '#get-proposal',
                        'title' => 'Get Proposal',
                        'target' => '_self',
                ),
                'contact_trust' => array(
                        array('logo' => array('url' => $img . '/solutions/logo-clutch.webp', 'alt' => 'Clutch')),
                        array('logo' => array('url' => $img . '/solutions/logo-techreviewer.webp', 'alt' => 'Techreviewer')),
                        array('logo' => array('url' => $img . '/solutions/logo-trustpilot.webp', 'alt' => 'Trustpilot')),
                        array('logo' => array('url' => $img . '/solutions/logo-marketinghub.webp', 'alt' => 'Marketinghub')),
                ),
        );
}
