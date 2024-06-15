<!doctype html>
<html lang="<?php bloginfo('language'); ?>">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />

  <title><?php the_field('site_title', 'option') ?></title>

  <!-- For search engines -->
  <meta name="description" content="<?php the_field('site_desc', 'option') ?>" />
  <meta name="keywords" content="<?php the_field('site_keywords', 'option') ?>" />
  <meta name="image" content="<?= get_template_directory_uri() ?>/assets/images/global/preview.png" />

  <!-- For social networks -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php the_field('site_title', 'option') ?>" />
  <meta property="og:description" content="<?php the_field('site_desc', 'option') ?>" />
  <meta property="og:image" content="<?= get_template_directory_uri() ?>/assets/images/global/preview.png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:locale" content="ru_ru" />
  <meta property="og:site_name" content="<?php the_field('site_title', 'option') ?>" />

  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-60x60.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/apple-icon-180x180.png" />
  <link rel="icon" type="image/png" sizes="192x192" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/android-icon-192x192.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="96x96" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/favicon-96x96.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/favicon-16x16.png" />
  <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/images/global/favicon/manifest.json" />
  <meta name="msapplication-TileColor" content="#ffffff" />
  <meta name="msapplication-TileImage" content="<?= get_template_directory_uri() ?>/assets/images/global/favicon/ms-icon-144x144.png" />
  <meta name="theme-color" content="#ffffff" />

  <meta name="apple-mobile-web-app-title" content="<?php the_field('site_title', 'option') ?>" />
  <!-- Name on the phone screen -->
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <!-- Opening the site to full screen -->

  <meta name="format-detection" content="telephone=no" />
  <!-- No need for extra illumination -->
  <meta name="format-detection" content="address=no" />

  <?php wp_head(); ?>
</head>

<body>
  <nav class="phone-nav">
    <ul class="phone-nav__list">
      <li class="phone-nav__item">
        <a class="phone-nav__link" href=".economy" data-scroll-link><?php the_field('section_1', 'option') ?></a>
      </li>
      <li class="phone-nav__item">
        <a class="phone-nav__link" href=".tarifs" data-scroll-link><?php the_field('section_2', 'option') ?></a>
      </li>
      <li class="phone-nav__item">
        <a class="phone-nav__link" href=".connect" data-scroll-link><?php the_field('section_3', 'option') ?></a>
      </li>
      <li class="phone-nav__item">
        <a class="phone-nav__link" href=".footer" data-scroll-link><?php the_field('section_4', 'option') ?></a>
      </li>
    </ul>
  </nav>
  <header class="header animate__animated animate__fadeInDown" data-wow-duration="1s">
    <div class="container">
      <div class="header__inner">
        <div class="header__logo-wrapper logo">
          <?php require('parts/logo.php') ?>
        </div>
        <nav class="header__nav">
          <ul class="header__list">
            <li class="header__item">
              <a class="header__link" href=".economy" data-scroll-link><?php the_field('section_1', 'option') ?></a>
            </li>
            <li class="header__item">
              <a class="header__link" href=".tarifs" data-scroll-link><?php the_field('section_2', 'option') ?></a>
            </li>
            <li class="header__item">
              <a class="header__link" href=".connect" data-scroll-link><?php the_field('section_3', 'option') ?></a>
            </li>
            <li class="header__item">
              <a class="header__link" href=".footer" data-scroll-link><?php the_field('section_4', 'option') ?></a>
            </li>
          </ul>
        </nav>
        <div class="header__burger burger">
          <span class="burger__line"></span>
          <span class="burger__line"></span>
          <span class="burger__line"></span>
        </div>
      </div>
    </div>
  </header>