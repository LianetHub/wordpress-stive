<?php
declare(strict_types=1);

defined('ABSPATH') || exit;
$assetsUri = get_template_directory_uri() . '/landing/landing-3/assets/img';
?>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title><?php the_title(); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?php echo ASSETS_PATH ?>/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="<?php echo ASSETS_PATH ?>/favicon.svg">
    <link rel="shortcut icon" href="<?php echo ASSETS_PATH ?>/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo ASSETS_PATH ?>/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Stive">
    <link rel="manifest" href="<?php echo ASSETS_PATH ?>/site.webmanifest">
    <!-- favicon -->
<link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Onest:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

