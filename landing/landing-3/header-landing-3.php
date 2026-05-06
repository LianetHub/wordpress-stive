<?php
declare(strict_types=1);

defined('ABSPATH') || exit;
$assetsUri = get_template_directory_uri() . '/landing/landing-3/assets/img';
?>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?php the_title(); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="<?php echo esc_url($assetsUri . '/favicon.png'); ?>" type="image/png"/>
<link rel="apple-touch-icon" href="<?php echo esc_url($assetsUri . '/apple-touch-icon.png'); ?>"/>
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Onest:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

