<?php
$front_rts_title = get_field('front_rts_title');
$front_rts_btn_primary = get_field('front_rts_btn_primary');
$front_rts_btn_secondary = get_field('front_rts_btn_secondary');

$countries = [
    'us' => 'USA',
    've' => 'Venezuela',
    'pl' => 'Poland',
    'de' => 'Germany',
    'ch' => 'Swiss',
    'it' => 'Italy',
    'tr' => 'Turkey',
    'me' => 'Montenegro',
    'eg' => 'Egypt',
    'pa' => 'Panama',
    'th' => 'Thailand',
    'id' => 'Indonesia',
    'cn' => 'China',
    'jp' => 'Japan'
];
?>

<section class="ready">
    <div class="container">
        <div class="ready__content">
            <div class="ready__header">
                <div class="ready__map">
                    <img src="<?php echo IMG_PATH ?>/map.svg" alt="Global Coverage Map">
                </div>
            </div>
            <div class="ready__main">
                <h2 class="ready__title title-lg gradient-text"><?php echo $front_rts_title; ?></h2>
                <?php if (!empty($countries)): ?>
                    <div class="ready__badges">
                        <?php foreach ($countries as $code => $name): ?>
                            <div class="ready__badge">
                                <div class="ready__badge-icon">
                                    <img
                                        src="<?php echo IMG_PATH ?>/flags/<?php echo esc_attr($code); ?>.svg"
                                        alt="<?php echo esc_attr($name); ?> flag">
                                </div>
                                <div class="ready__badge-text"><?php echo esc_html($name); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
				<?php if ($front_rts_btn_primary) {
				$link_url = $front_rts_btn_primary['url'];
				$link_title = $front_rts_btn_primary['title'];
				$link_target = $front_rts_btn_primary['target'] ? $front_rts_btn_primary['target'] : '_self';          
				} ?>
                <div class="ready__actions">
				<?php if ($front_rts_btn_primary) { ?>
				<a class="ready__btn btn btn-primary" data-calendly href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php } ?>	
						<?php if ($front_rts_btn_secondary) { 
						$link_url = $front_rts_btn_secondary['url'];
						$link_title = $front_rts_btn_secondary['title'];
						$link_target = $front_rts_btn_secondary['target'] ? $front_rts_btn_secondary['target'] : '_self';          
						?>
						<a class="ready__btn btn btn-grey" data-fancybox href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php } ?>
				</div>
            </div>
        </div>
    </div>
</section>