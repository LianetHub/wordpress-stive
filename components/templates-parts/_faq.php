<?php
$faq_items = [
        [
                'question' => 'What is OMINA token?',
                'answer' => 'OMINA is a BEP-20 utility token on the Binance Smart Chain (BSC) designed for the trading community. It serves as the backbone of our ecosystem, facilitating efficient transactions and granting access to premium features.'
        ],
        [
                'question' => 'How do I buy OMINA tokens?',
                'answer' => 'You can purchase OMINA on decentralized exchanges (DEX) like PancakeSwap. Ensure you have a BSC-compatible wallet with some BNB for gas fees, then swap your BNB or USDT for OMINA using our official contract address.'
        ],
        [
                'question' => 'Key Advantages of OMINA',
                'answer' => 'OMINA offers near-instant transaction speeds, extremely low network fees thanks to BSC, and a unique redistribution model that rewards long-term holders while maintaining liquidity.'
        ],
        [
                'question' => 'Which wallets support OMINA?',
                'answer' => 'OMINA is compatible with any wallet that supports the Binance Smart Chain, including MetaMask, Trust Wallet, Binance Web3 Wallet, and hardware wallets like Ledger when connected to a BSC-compatible interface.'
        ],
        [
                'question' => 'What are the tokenomics of OMINA?',
                'answer' => 'OMINA features a fixed total supply to prevent inflation. Our tokenomics include a strategic allocation for ecosystem development, community rewards, and a liquidity lock to ensure market stability and investor confidence.'
        ],
        [
                'question' => 'How can I use OMINA tokens?',
                'answer' => 'Tokens can be used to unlock advanced trading analytics, participate in governance voting, pay for reduced platform fees, and stake in liquidity pools to earn passive rewards within the OMINA ecosystem.'
        ],
        [
                'question' => 'Is OMINA token audited and secure?',
                'answer' => 'Yes, security is our priority. The OMINA smart contract has undergone a rigorous security audit by leading blockchain security firms to ensure the code is transparent, secure, and free of vulnerabilities.'
        ],
        [
                'question' => 'What is the long-term roadmap for OMINA?',
                'answer' => 'Our roadmap includes integration with multiple cross-chain bridges, the launch of a proprietary trading dashboard, and strategic partnerships with major DeFi protocols to expand the token\'s utility and market reach.'
        ]
];
?>

<section class="faq" id="faq" itemscope itemtype="https://schema.org/FAQPage">
    <div class="container">
        <h2 class="faq__title title-xs">Frequently Asked Questions</h2>
        <ul class="faq__list">
            <?php foreach ($faq_items as $index => $item): ?>
                <li class="faq__item" itemscope itemprop="mainEntity" typeof="Question">
                    <button
                            class="faq__item-question"
                            itemprop="name"
                            aria-expanded="false"
                            aria-controls="faq-answer-<?php echo $index; ?>">
                        <?php echo htmlspecialchars($item['question']); ?>
                    </button>
                    <div
                            class="faq__item-answer"
                            id="faq-answer-<?php echo $index; ?>"
                            itemscope
                            itemprop="acceptedAnswer"
                            typeof="Answer"
                            role="region">
                        <div itemprop="text">
                            <?php echo htmlspecialchars($item['answer']); ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>