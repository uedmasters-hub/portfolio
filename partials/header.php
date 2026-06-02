<?php
/**
 * partials/header.php
 *
 * Outputs the old <header> nav that some pages still use
 * (about.php, contact.php, resources.php, index.php).
 *
 * Pages now using the new mega-nav (navigation.php) should
 * NOT include this file — navigation.php outputs its own
 * <header> block.
 *
 * Set before including:
 *   $currentKey  (string) — active nav key
 */

require_once __DIR__ . "/../data/navigation.php";
$currentKey = $currentKey ?? "home";
?>

<!-- FONTS -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<!-- CSS — load animations.css LAST so it can override -->
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/variables.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/reset.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/main.css" />
<!-- ... all other css files ... -->
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/animations.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/cursor.css" />

<!-- Reading progress bar (case study + blog pages only) -->
<?php if (isset($showProgress) && $showProgress): ?>
<div id="reading-progress" aria-hidden="true"></div>
<?php endif; ?>

<!-- Skip link (accessibility) -->
<a href="#main" class="skip-link">Skip to content</a>

<?php
/**
 * partials/header.php
 * Site header + mega menu navigation
 *
 * Requires: $currentKey (string) — set on every page before including this file
 * Example:  $currentKey = "case-studies";
 *
 * Keys: home | about | case-studies | psychology | blogs | resources
 */

// ── DATA ──────────────────────────────────────────────────────

$caseStudies = [
    [
        'icon'   => '✈️',
        'title'  => 'IndiGo Booking Ecosystem',
        'metric' => '22% revenue ↑',
        'meta'   => 'Conversion &amp; CRO',
        'href'   => BASE_PATH . '/case-study/indigo-booking',
    ],
    [
        'icon'   => '👥',
        'title'  => 'CrewPal Operations Platform',
        'metric' => '25% satisfaction ↑',
        'meta'   => 'Enterprise Ops',
        'href'   => BASE_PATH . '/case-study/crewpal',
    ],
    [
        'icon'   => '🏆',
        'title'  => 'Gamified Loyalty Program',
        'metric' => '40% retention ↑',
        'meta'   => '500+ user tests',
        'href'   => BASE_PATH . '/case-study/indigo-loyalty',
    ],
    [
        'icon'   => '⚙️',
        'title'  => 'Enterprise Design System',
        'metric' => '40% velocity ↑',
        'meta'   => 'Systems',
        'href'   => BASE_PATH . '/case-study/design-system',
    ],
    [
        'icon'   => '🏝️',
        'title'  => 'IndiGo Holidays Marketplace',
        'metric' => '22% ancillary revenue ↑',
        'meta'   => 'CX',
        'href'   => BASE_PATH . '/case-study/indigo-holidays',
    ],
];

$audits = [
    [
        'icon'  => '🔍',
        'title' => 'Zomato Checkout Audit',
        'meta'  => '12 friction points identified',
        'href'  => BASE_PATH . '/audit/zomato-checkout',
    ],
    [
        'icon'  => '🛵',
        'title' => 'Swiggy Onboarding Audit',
        'meta'  => 'Heuristic breakdown · Redesign suggestions',
        'href'  => BASE_PATH . '/audit/swiggy-onboarding',
    ],
];

// Nav items — mega = true triggers the Work mega menu
$navItems = [
    ['key' => 'home',       'label' => 'Home',       'href' => BASE_PATH . '/',            'mega' => false],
    ['key' => 'work',       'label' => 'Work',        'href' => BASE_PATH . '/case-study/', 'mega' => true ],
    ['key' => 'about',      'label' => 'About',       'href' => BASE_PATH . '/about',       'mega' => false],
    ['key' => 'blogs',      'label' => 'Writing',     'href' => BASE_PATH . '/blog/',       'mega' => false],
    ['key' => 'resources',  'label' => 'Resources',   'href' => BASE_PATH . '/resources',   'mega' => false],
];

// Map page keys to work nav item so it highlights correctly
$workKeys = ['case-studies', 'work'];
$isWorkActive = in_array($currentKey ?? '', $workKeys, true);
?>

<header class="site-header" id="site-header">

  <nav class="navbar" aria-label="Main navigation">

    <!-- LOGO -->
    <a class="nav-logo" href="<?= BASE_PATH ?>/">Ramesh Mandal</a>

    <!-- DESKTOP LINKS -->
    <ul class="nav-links" role="list">

      <?php foreach ($navItems as $item): ?>
        <?php
          $isActive = ($currentKey ?? '') === $item['key']
            || ($item['key'] === 'work' && $isWorkActive);
        ?>

        <li class="nav-item<?= $item['mega'] ? ' has-mega' : '' ?><?= $item['key'] === 'work' && $isWorkActive ? ' is-active-parent' : '' ?>">

          <a
            class="nav-link<?= $isActive ? ' is-active' : '' ?>"
            href="<?= $item['href'] ?>"
            <?= $item['mega'] ? 'aria-haspopup="true" aria-expanded="false" data-mega-trigger' : '' ?>
          >
            <?= htmlspecialchars($item['label']) ?>
            <?php if ($item['mega']): ?>
              <span class="nav-chevron" aria-hidden="true">▾</span>
            <?php endif ?>
          </a>

          <?php if ($item['mega']): ?>
          <!-- ══════════════════════════════════════════
               MEGA MENU — WORK
          ══════════════════════════════════════════ -->
          <div class="mega-menu" role="region" aria-label="Work navigation panel">

            <div class="mega-body">

              <!-- ── COL 1: INTRO ── -->
              <div class="mega-col mega-col-intro">

                <div class="intro-top">
                  <div class="mega-eyebrow">Work</div>

                  <h2 class="mega-headline">
                    Enterprise<br>
                    UX at <em>scale.</em>
                  </h2>

                  <p class="mega-body-copy">
                    Case studies and teardowns from 17&nbsp;years
                    of shipping products for millions of users.
                  </p>

                  <a class="mega-cta-link" href="<?= BASE_PATH ?>/case-study/">
                    View all work →
                  </a>
                </div>

                <div class="intro-bottom">
                  <div class="mega-stats">
                    <div class="mega-stat">
                      <div class="mega-stat-val">50M+</div>
                      <div class="mega-stat-lbl">Users served</div>
                    </div>
                    <div class="mega-stat">
                      <div class="mega-stat-val">10+</div>
                      <div class="mega-stat-lbl">Enterprise products</div>
                    </div>
                  </div>

                  <div class="mega-avail">
                    <span class="mega-avail-dot" aria-hidden="true"></span>
                    Available for senior UX leadership roles
                  </div>
                </div>

              </div><!-- /col-intro -->


              <!-- ── COL 2: CASE STUDIES ── -->
              <div class="mega-col mega-col-cases">

                <p class="mega-section-label">Case Studies</p>

                <ul class="mega-items" role="list">
                  <?php foreach ($caseStudies as $cs): ?>
                  <li>
                    <a class="mega-item" href="<?= $cs['href'] ?>">
                      <span class="mega-item-icon" aria-hidden="true"><?= $cs['icon'] ?></span>
                      <span>
                        <span class="mega-item-title"><?= htmlspecialchars($cs['title']) ?></span>
                        <span class="mega-item-meta">
                          <span class="mega-item-metric"><?= htmlspecialchars($cs['metric']) ?></span>
                          · <?= $cs['meta'] ?>
                        </span>
                      </span>
                    </a>
                  </li>
                  <?php endforeach ?>
                </ul>

              </div><!-- /col-cases -->


              <!-- ── COL 3: AUDITS + FEATURED ── -->
              <div class="mega-col mega-col-right">

                <div class="mega-audit-block">
                  <p class="mega-section-label">UX Audits</p>

                  <ul class="mega-items" role="list">
                    <?php foreach ($audits as $audit): ?>
                    <li>
                      <a class="mega-item" href="<?= $audit['href'] ?>">
                        <span class="mega-item-icon" aria-hidden="true"><?= $audit['icon'] ?></span>
                        <span>
                          <span class="mega-item-title"><?= htmlspecialchars($audit['title']) ?></span>
                          <span class="mega-item-meta"><?= htmlspecialchars($audit['meta']) ?></span>
                        </span>
                      </a>
                    </li>
                    <?php endforeach ?>
                  </ul>
                </div>

                <div class="mega-divider" aria-hidden="true"></div>

                <!-- Featured card -->
                <a class="mega-featured" href="<?= BASE_PATH ?>/about#awards">
                  <span class="mega-featured-arrow" aria-hidden="true">↗</span>
                  <span class="mega-featured-label">Featured</span>
                  <span class="mega-featured-title">IndiGo Innovation Award 2023</span>
                  <span class="mega-featured-desc">
                    Super 6E Sale — conversion growth that earned
                    recognition at enterprise level.
                  </span>
                  <span class="mega-featured-pill">🏅 IndiGo Award</span>
                </a>

              </div><!-- /col-right -->

            </div><!-- /mega-body -->


            <!-- FOOTER BAR -->
            <div class="mega-footer">
              <ul class="mega-footer-links" role="list">
                <li><a class="mega-footer-link" href="<?= BASE_PATH ?>/case-study/">All case studies →</a></li>
                <li><a class="mega-footer-link" href="<?= BASE_PATH ?>/audit/">All audits →</a></li>
                <li><a class="mega-footer-link" href="<?= BASE_PATH ?>/psychology/">Psychology →</a></li>
              </ul>
              <span class="mega-footer-award">🏅 IndiGo Innovation Award 2023</span>
            </div>

          </div><!-- /mega-menu -->
          <?php endif ?>

        </li>
      <?php endforeach ?>

    </ul><!-- /nav-links -->

    <!-- CONNECT -->
    <a class="nav-connect" href="<?= BASE_PATH ?>/contact">Connect →</a>

    <!-- HAMBURGER (mobile only) -->
    <button
      class="nav-hamburger"
      aria-label="Open navigation menu"
      aria-expanded="false"
      aria-controls="nav-drawer"
      id="nav-hamburger"
    >
      <span></span>
      <span></span>
      <span></span>
    </button>

  </nav><!-- /navbar -->

</header><!-- /site-header -->


<!-- ══════════════════════════════════════════════
     MOBILE DRAWER
══════════════════════════════════════════════ -->
<div class="nav-drawer" id="nav-drawer" aria-hidden="true" role="dialog" aria-label="Navigation menu">

  <div class="nav-drawer-backdrop" id="nav-drawer-backdrop"></div>

  <div class="nav-drawer-panel">

    <div class="nav-drawer-header">
      <a class="nav-logo" href="<?= BASE_PATH ?>/">Ramesh Mandal</a>
      <button
        class="nav-drawer-close"
        id="nav-drawer-close"
        aria-label="Close navigation menu"
      >✕</button>
    </div>

    <ul class="nav-drawer-links" role="list">
      <li><a class="nav-drawer-link<?= ($currentKey ?? '') === 'home' ? ' is-active' : '' ?>"       href="<?= BASE_PATH ?>/">Home</a></li>
      <li><a class="nav-drawer-link<?= $isWorkActive ? ' is-active' : '' ?>"                         href="<?= BASE_PATH ?>/case-study/">Work</a></li>
      <li><a class="nav-drawer-link<?= ($currentKey ?? '') === 'about' ? ' is-active' : '' ?>"       href="<?= BASE_PATH ?>/about">About</a></li>
      <li><a class="nav-drawer-link<?= ($currentKey ?? '') === 'psychology' ? ' is-active' : '' ?>"  href="<?= BASE_PATH ?>/psychology/">Psychology</a></li>
      <li><a class="nav-drawer-link<?= ($currentKey ?? '') === 'blogs' ? ' is-active' : '' ?>"       href="<?= BASE_PATH ?>/blog/">Writing</a></li>
      <li><a class="nav-drawer-link<?= ($currentKey ?? '') === 'resources' ? ' is-active' : '' ?>"   href="<?= BASE_PATH ?>/resources">Resources</a></li>
      <li><a class="nav-drawer-link"                                                                   href="<?= BASE_PATH ?>/contact">Contact</a></li>
    </ul>

    <div class="nav-drawer-footer">
      <a class="nav-drawer-connect" href="<?= BASE_PATH ?>/contact">Connect with me →</a>
      <div class="nav-drawer-avail">
        <span class="mega-avail-dot" aria-hidden="true"></span>
        Available for senior UX leadership roles
      </div>
    </div>

  </div>

</div><!-- /nav-drawer -->