<?php
/**
 * partials/header.php
 * Desktop header + Mobile drawer navigation
 * Font Awesome 6 Free for icons (loaded via CDN below)
 */

// $currentKey is set by each page before including this partial
// e.g. $currentKey = "case-studies";
// Valid keys: home, case-studies, audits, blog, psychology, resources, about
$currentKey = $currentKey ?? "";

$navItems = [
  [
    "key"   => "case-studies",
    "label" => "Case Studies",
    "href"  => "/case-study/",
    "icon"  => "fa-book-open",
  ],
  [
    "key"   => "audits",
    "label" => "UX Audits",
    "href"  => "/audit/",
    "icon"  => "fa-magnifying-glass",
  ],
  [
    "key"   => "blog",
    "label" => "Stories & Essays",
    "href"  => "/blog/",
    "icon"  => "fa-message",
  ],
  [
    "key"   => "psychology",
    "label" => "Behavioural Design",
    "href"  => "/psychology/",
    "icon"  => "fa-brain",
  ],
  [
    "key"   => "experiments",
    "label" => "Experiments",
    "href"  => "/lab/",
    "icon"  => "fa-vial-circle-check",
  ],
  [
    "key"   => "resources",
    "label" => "Toolkit",
    "href"  => "/resources.php",
    "icon"  => "fa-toolbox",
  ],
  [
    "key"   => "about",
    "label" => "About",
    "href"  => "/about.php",
    "icon"  => "fa-user",
  ],
];

// Desktop nav — subset of items (primary paths only)
$desktopNav = ["case-studies", "audits", "blog", "psychology", "resources", "about"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title><?= $pageTitle ?? "Ramesh Mandal — UX Leader" ?></title>

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet" />

  <!-- FONT AWESOME 6 FREE — for drawer icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS -->
  <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/variables.css" />
  <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/reset.css" />
  <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/main.css" />
  <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/background.css" />
  <link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/navigation.css" />
  <!-- page-specific CSS included by each page after this partial -->
</head>
<body>

<!-- SKIP LINK — accessibility -->
<a href="#main" class="skip-link">Skip to content</a>

<!-- LIVE BACKGROUND -->
<div class="background" aria-hidden="true">
  <div class="grid"></div>
  <div class="mouse-light"></div>
</div>

<!-- =====================================================
     SITE HEADER
===================================================== -->
<header class="site-header" role="banner">

  <!-- LEFT: Logo -->
  <a href="<?= BASE_PATH ?>/" class="site-header__logo" aria-label="Ramesh Mandal — Home">
    <span class="logo-mark" aria-hidden="true">RM</span>
    <span class="logo-name">RAMESH MANDAL</span>
  </a>

  <!-- CENTRE: Desktop nav -->
  <nav class="site-header__nav" aria-label="Primary navigation">
    <?php foreach ($navItems as $item):
      if (!in_array($item["key"], $desktopNav)) continue;
      $isActive = ($currentKey === $item["key"]);
    ?>
      <a
        href="<?= BASE_PATH . $item['href'] ?>"
        class="nav-link<?= $isActive ? ' nav-link--active' : '' ?>"
        <?= $isActive ? 'aria-current="page"' : '' ?>
      >
        <?= htmlspecialchars($item['label']) ?>
      </a>
    <?php endforeach; ?>
  </nav>

  <!-- RIGHT: CTA + Hamburger -->
  <div class="site-header__actions">
    <a href="<?= BASE_PATH ?>/contact.php" class="btn-connect">
      Connect
    </a>

    <button
      class="hamburger"
      id="drawer-toggle"
      aria-label="Open navigation menu"
      aria-expanded="false"
      aria-controls="mobile-drawer"
    >
      <span class="hamburger__bar"></span>
      <span class="hamburger__bar"></span>
      <span class="hamburger__bar"></span>
    </button>
  </div>

</header>

<!-- =====================================================
     MOBILE DRAWER
===================================================== -->

<!-- Backdrop -->
<div
  class="drawer-backdrop"
  id="drawer-backdrop"
  aria-hidden="true"
></div>

<!-- Drawer panel -->
<nav
  class="drawer"
  id="mobile-drawer"
  aria-label="Mobile navigation"
  aria-hidden="true"
  role="dialog"
  aria-modal="true"
>

  <!-- Drawer header -->
  <div class="drawer__header">
    <a href="<?= BASE_PATH ?>/" class="drawer__logo" aria-label="Home">
      <span class="logo-mark" aria-hidden="true">RM</span>
      <span class="logo-name">RAMESH MANDAL</span>
    </a>

    <button
      class="drawer__close"
      id="drawer-close"
      aria-label="Close navigation menu"
    >
      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" aria-hidden="true">
        <path d="M1 1l16 16M17 1L1 17" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
      </svg>
    </button>
  </div>

  <!-- Drawer nav items -->
  <ul class="drawer__nav" role="list">
    <?php foreach ($navItems as $index => $item):
      $isActive = ($currentKey === $item["key"]);
    ?>
      <li
        class="drawer__item<?= $isActive ? ' drawer__item--active' : '' ?>"
        style="--item-index: <?= $index ?>;"
        role="listitem"
      >
        <a
          href="<?= BASE_PATH . $item['href'] ?>"
          class="drawer__link"
          <?= $isActive ? 'aria-current="page"' : '' ?>
        >
          <span class="drawer__icon" aria-hidden="true">
            <i class="fa-solid <?= $item['icon'] ?>"></i>
          </span>
          <span class="drawer__label"><?= htmlspecialchars($item['label']) ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- Drawer footer CTA -->
  <div class="drawer__footer">
    <a href="<?= BASE_PATH ?>/contact.php" class="drawer__cta">
      Connect
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
        <path d="M1 13L13 1M13 1H4M13 1v9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
    <p class="drawer__availability">
      <span class="available-dot" aria-hidden="true"></span>
      Available for senior UX leadership roles
    </p>
  </div>

</nav>

<!-- MAIN CONTENT starts here -->
<main id="main">