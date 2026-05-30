<?php
/* =========================================
   INDEX.PHP — Homepage
   ========================================= */

require_once __DIR__ . "/includes/config.php";

$currentKey  = "home";
$pageTitle   = "Ramesh Mandal — UX Leader & Product Strategist";
$pageDesc    = "UX Leader with 17+ years driving AI-enabled product strategy at scale across aviation, SaaS, and enterprise platforms.";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>" />
  <meta name="keywords" content="Ramesh Mandal, UX Leader, Product Strategist, Design Systems, AI Workflows, Enterprise UX, Aviation UX, SaaS UX, User Experience Design, UX Strategy, UX Portfolio"/>

  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="website"/>
  <meta property="og:url"          content="https://6epixels.com/"/>
  <meta property="og:title"        content="Ramesh Mandal — UX Leader"/>
  <meta property="og:description"  content="17+ years designing enterprise products at scale. UX Strategy, Design Systems, AI workflows for 50M+ users."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="Ramesh Mandal — UX Leader"/>
  <meta name="twitter:description" content="17+ years designing enterprise products at scale. UX Strategy, Design Systems, AI workflows for 50M+ users."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/"/>
  
  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"     href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"    href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16"  href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>

  <!-- PRECONNECT -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <!-- FONTS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap"
    rel="stylesheet"
  />

  <!-- ── CSS ── -->
  <link rel="stylesheet" href="assets/css/preloader.css" />
  <link rel="stylesheet" href="assets/css/variables.css" />
  <link rel="stylesheet" href="assets/css/animations.css"/>
  <link rel="stylesheet" href="assets/css/reset.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/navigation.css" />
  <link rel="stylesheet" href="assets/css/background.css" />
  <link rel="stylesheet" href="assets/css/hero.css" />
  <link rel="stylesheet" href="assets/css/stats.css" />
  <link rel="stylesheet" href="assets/css/transformations.css" />
  <link rel="stylesheet" href="assets/css/components/popover.css" />
  <link rel="stylesheet" href="assets/css/experience.css" />
  <link rel="stylesheet" href="assets/css/philosophy.css" />
  <link rel="stylesheet" href="assets/css/bento.css" />
  <link rel="stylesheet" href="assets/css/testimonials.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

</head>

<body>

  <!-- ── PRELOADER ── -->
  <div class="preloader" id="preloader" aria-hidden="true" role="progressbar" aria-label="Loading">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">Ramesh Mandal</span>
        <span class="preloader__name-role">UX Leader · Product Strategist</span>
      </div>
      <div class="preloader__bar-wrap">
        <div class="preloader__bar" id="preloader-bar"></div>
      </div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <!-- ── LIVE BACKGROUND ── -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
    <div class="bg-mouse-glow"></div>
  </div>

  <!-- ── PAGE ── -->
  <?php require_once __DIR__ . "/partials/header.php"; ?>
  <div class="page-wrapper">

    <!-- HEADER -->

    <!-- HERO + STATS -->
    <main id="main-content">

      <?php require_once __DIR__ . "/sections/hero.php"; ?>

      <!-- TRANSFORMATIONS -->
      <?php require_once __DIR__ . "/sections/transformations.php"; ?>

      <!-- EXPERIENCE TIMELINE -->
      <?php require_once __DIR__ . "/sections/experience.php"; ?>

      <!-- PHILOSOPHY -->
      <?php require_once __DIR__ . "/sections/philosophy.php"; ?>

      <!-- COMPONENTS BENTO GRID -->
      <?php require_once __DIR__ . "/sections/components-grid.php"; ?>

      <!-- TESTIMONIALS + LOGOS + MARQUEE -->
      <?php require_once __DIR__ . "/sections/testimonials.php"; ?>

    </main>

    <!-- FOOTER -->
    <?php require_once __DIR__ . "/partials/footer.php"; ?>

  </div>

  <!-- ── JS ── -->
  <script src="assets/js/preloader.js"></script>
  <script src="assets/js/background.js"  defer></script>
  <script src="assets/js/typewriter.js"  defer></script>
  <script src="assets/js/animations.js"  defer></script>
  <script src="assets/js/app.js"         defer></script>
  <script src="assets/js/popover.js"      defer></script>

</body>
</html>