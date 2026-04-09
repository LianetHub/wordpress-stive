<!DOCTYPE html>
<html lang="en" prefix="og: https://ogp.me/ns#">

<head>
  <?php if (is_page()) { ?>
    <title><?php echo get_the_title() ?></title>
  <?php } ?>
  <?php if (is_single()) { ?>
    <title><?php echo get_the_title() ?></title>
  <?php } ?>
  <?php if (is_search()) { ?>
    <title>Search | Stive</title>
    <meta name="description" content="Search results for your query for Stive">
    <meta name="keywords" content="Stive">
  <?php } ?>
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

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="wrapper">
    <?php
    if (!is_page(190)) {
      require_once(TEMPLATE_PATH . '_header-main.php');
    }
    ?>
    <main class="main">