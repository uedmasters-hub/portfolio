<?php
/* =========================================
   PSYCHOLOGY/PRINCIPLE.PHP
   Universal template for all psychology
   principle pages.
   Usage: /psychology/principle.php?id=hicks-law
   OR via .htaccess: /psychology/hicks-law
   ========================================= */

require_once __DIR__ . "/../includes/config.php";
require_once __DIR__ . "/../data/psychology.php";
require_once __DIR__ . "/../includes/schema.php";

// ── GET ID ────────────────────────────────
$id = isset($_GET['id'])
  ? preg_replace('/[^a-z0-9\-]/', '', strtolower(trim($_GET['id'])))
  : '';

// ── FIND PRINCIPLE ────────────────────────
$principle = null;
$pIndex    = null;
foreach ($principles as $i => $p) {
  if ($p['id'] === $id) { $principle = $p; $pIndex = $i; break; }
}

// ── 404 ───────────────────────────────────
if (!$principle) {
  http_response_code(404);
  require_once __DIR__ . "/../partials/header.php";
  echo '<div style="padding:120px 48px;max-width:600px">';
  echo '<h1 style="font-size:3rem;font-weight:300;margin-bottom:16px">Principle not found</h1>';
  echo '<a href="/psychology/" style="color:var(--blue)">← Back to UX Psychology</a>';
  echo '</div>';
  require_once __DIR__ . "/../partials/footer.php";
  exit;
}

// ── RELATED (same category) ───────────────
$related = array_filter($principles, fn($p) =>
  $p['category'] === $principle['category'] && $p['id'] !== $principle['id']
);
$related = array_slice(array_values($related), 0, 3);

// ── ALL PRINCIPLES for nav ────────────────
$allSameCat = array_values(array_filter($principles, fn($p) =>
  $p['category'] === $principle['category']
));
$catIndex = array_search($principle, $allSameCat);
$prevP    = $catIndex > 0 ? $allSameCat[$catIndex - 1] : null;
$nextP    = $catIndex < count($allSameCat) - 1 ? $allSameCat[$catIndex + 1] : null;

// ── CATEGORY META ─────────────────────────
$catMeta = [];
foreach ($categories as $c) {
  if ($c['id'] === $principle['category']) { $catMeta = $c; break; }
}

// ── COLOR MAP ─────────────────────────────
$colorMap = [
  'blue'  => ['bg' => '#eef3fd', 'text' => '#1a46c9', 'border' => '#b6c5ee'],
  'amber' => ['bg' => '#fef9ec', 'text' => '#b45309', 'border' => '#fcd88a'],
  'green' => ['bg' => '#edfaf3', 'text' => '#15803d', 'border' => '#86efac'],
];
$col = $colorMap[$principle['color']] ?? $colorMap['blue'];

// ── IMPACT / EFFORT LABELS ────────────────
$impactLabels = ['High' => '◉◉◉', 'Medium' => '◉◉○', 'Low' => '◉○○'];
$effortLabels = ['High' => '◉◉◉', 'Medium' => '◉◉○', 'Low' => '◉○○'];

// ── SEO ───────────────────────────────────
$currentKey = "psychology";
$pageTitle  = $principle['name'] . " in UX Design — Ramesh Mandal";
$pageDesc   = $principle['definition'];
$canonicalUrl = "https://6epixels.com/psychology/" . $principle['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>"/>
  <meta name="author"      content="Ramesh Mandal"/>
  <title><?= htmlspecialchars($pageTitle) ?></title>

  <link rel="canonical" href="<?= $canonicalUrl ?>"/>

  <meta property="og:site_name"    content="Ramesh Mandal — UX Psychology"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="<?= $canonicalUrl ?>"/>
  <meta property="og:title"        content="<?= htmlspecialchars($principle['name']) ?> in UX Design"/>
  <meta property="og:description"  content="<?= htmlspecialchars($principle['tagline']) ?>"/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="<?= htmlspecialchars($principle['name']) ?> — UX Psychology"/>
  <meta name="twitter:description" content="<?= htmlspecialchars($principle['tagline']) ?>"/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>

  <!-- JSON-LD -->
  <?php echo schema_article_generic([
    'title'   => $principle['name'] . ' in UX Design',
    'desc'    => $principle['definition'],
    'url'     => $canonicalUrl,
    'image'   => 'https://6epixels.com/assets/og/og-default.jpg',
    'date'    => '2024-01-01',
    'tags'    => [$principle['name'], 'UX Psychology', 'Product Design', ucfirst($principle['category'])],
    'section' => 'UX Psychology',
  ]); ?>
  <?php echo schema_breadcrumb([
    ['Home',         'https://6epixels.com/'],
    ['UX Psychology','https://6epixels.com/psychology/'],
    [$principle['name'], $canonicalUrl],
  ]); ?>
  <?php echo schema_faq([
    ['What is ' . $principle['name'] . '?', $principle['definition']],
    ['Why does ' . $principle['name'] . ' matter in UX?', $principle['why']],
    ['How is ' . $principle['name'] . ' used in real products?', $principle['real_world']],
  ]); ?>

  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"     href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"    href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="../assets/css/preloader.css"/>
  <link rel="stylesheet" href="../assets/css/variables.css"/>
  <link rel="stylesheet" href="../assets/css/animations.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/psychology.css"/>
  <link rel="stylesheet" href="../assets/css/psych-article.css"/>
</head>
<body>

  <!-- READING PROGRESS -->
  <div class="cs-progress-bar" id="cs-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text"><?= htmlspecialchars($principle['name']) ?></span>
        <span class="preloader__name-role">UX Psychology · <?= htmlspecialchars(ucfirst($principle['category'])) ?></span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <!-- BACKGROUND -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb bg-orb--1"></div>
    <div class="bg-orb bg-orb--2"></div>
    <div class="bg-mouse"></div>
  </div>

  <div class="page-wrapper" id="page-wrapper">

    <?php require_once __DIR__ . "/../partials/header.php"; ?>

    <main>

      <!-- ═══════════════════════════════════
           HERO
      ═══════════════════════════════════ -->
      <section class="pa-hero">
        <div class="pa-hero__inner">

          <!-- BREADCRUMB -->
          <nav class="pa-breadcrumb" aria-label="Breadcrumb">
            <a href="/">Home</a>
            <span aria-hidden="true">›</span>
            <a href="/psychology/">UX Psychology</a>
            <span aria-hidden="true">›</span>
            <span><?= htmlspecialchars($catMeta['label'] ?? ucfirst($principle['category'])) ?></span>
          </nav>

          <!-- CATEGORY TAG -->
          <div class="pa-category-tag" style="--cat-bg:<?= $col['bg'] ?>;--cat-text:<?= $col['text'] ?>;--cat-border:<?= $col['border'] ?>">
            <span><?= htmlspecialchars($catMeta['icon'] ?? '') ?></span>
            <?= htmlspecialchars(ucfirst($principle['category'])) ?>
          </div>

          <!-- HEADLINE -->
          <h1 class="pa-hero__title">
            <?= htmlspecialchars($principle['name']) ?>
            <?php if ($principle['latin']): ?>
              <em class="pa-hero__latin"><?= htmlspecialchars($principle['latin']) ?></em>
            <?php endif; ?>
          </h1>

          <p class="pa-hero__tagline"><?= htmlspecialchars($principle['tagline']) ?></p>

          <!-- QUICK STATS -->
          <div class="pa-hero__stats">
            <div class="pa-stat">
              <span class="pa-stat__label">IMPACT</span>
              <span class="pa-stat__dots"><?= $impactLabels[$principle['impact']] ?? '◉◉◉' ?></span>
              <span class="pa-stat__value"><?= htmlspecialchars($principle['impact']) ?></span>
            </div>
            <div class="pa-stat">
              <span class="pa-stat__label">EFFORT TO APPLY</span>
              <span class="pa-stat__dots"><?= $effortLabels[$principle['effort']] ?? '◉◉○' ?></span>
              <span class="pa-stat__value"><?= htmlspecialchars($principle['effort']) ?></span>
            </div>
            <div class="pa-stat">
              <span class="pa-stat__label">CATEGORY</span>
              <span class="pa-stat__value"><?= htmlspecialchars(ucfirst($principle['category'])) ?></span>
            </div>
          </div>

        </div>
      </section>

      <!-- ═══════════════════════════════════
           BODY
      ═══════════════════════════════════ -->
      <div class="pa-body">

        <!-- STICKY SIDEBAR -->
        <aside class="pa-sidebar" aria-label="Article navigation">
          <div class="pa-sidebar__inner">
            <p class="pa-sidebar__label">ON THIS PAGE</p>
            <nav class="pa-toc">
              <a href="#definition" class="pa-toc__link">Definition</a>
              <a href="#why"        class="pa-toc__link">Why it works</a>
              <a href="#my-use"     class="pa-toc__link">How I've used it</a>
              <a href="#dos-donts"  class="pa-toc__link">Do's & Don'ts</a>
              <a href="#real-world" class="pa-toc__link">Real world</a>
              <?php if (!empty($related)): ?>
              <a href="#related"    class="pa-toc__link">Related principles</a>
              <?php endif; ?>
            </nav>

            <div class="pa-sidebar__divider"></div>

            <p class="pa-sidebar__label">QUICK METRICS</p>
            <div class="pa-sidebar__metrics">
              <div class="pa-sidebar__metric">
                <span>Impact</span>
                <strong><?= htmlspecialchars($principle['impact']) ?></strong>
              </div>
              <div class="pa-sidebar__metric">
                <span>Effort</span>
                <strong><?= htmlspecialchars($principle['effort']) ?></strong>
              </div>
              <div class="pa-sidebar__metric">
                <span>Category</span>
                <strong><?= htmlspecialchars(ucfirst($principle['category'])) ?></strong>
              </div>
            </div>

            <div class="pa-sidebar__divider"></div>

            <a href="/psychology/" class="pa-sidebar__back">← All Principles</a>
          </div>
        </aside>

        <!-- ARTICLE CONTENT -->
        <article class="pa-article" id="pa-article">

          <!-- DEFINITION -->
          <section id="definition" class="pa-section">
            <div class="pa-section__kicker">DEFINITION</div>
            <h2 class="pa-section__title">What is <?= htmlspecialchars($principle['name']) ?>?</h2>
            <p class="pa-section__body"><?= htmlspecialchars($principle['definition']) ?></p>
          </section>

          <!-- WHY IT WORKS -->
          <section id="why" class="pa-section">
            <div class="pa-section__kicker">THE SCIENCE</div>
            <h2 class="pa-section__title">Why it works</h2>
            <p class="pa-section__body"><?= htmlspecialchars($principle['why']) ?></p>

            <!-- EXAMPLE CALLOUT -->
            <blockquote class="pa-callout" style="--col-bg:<?= $col['bg'] ?>;--col-border:<?= $col['text'] ?>">
              <p><?= htmlspecialchars($principle['example']) ?></p>
            </blockquote>
          </section>

          <!-- MY USE -->
          <section id="my-use" class="pa-section">
            <div class="pa-section__kicker">FROM MY WORK</div>
            <h2 class="pa-section__title">How I've applied this</h2>
            <div class="pa-experience-card">
              <div class="pa-experience-card__icon">◈</div>
              <p><?= htmlspecialchars($principle['ux_use']) ?></p>
            </div>
          </section>

          <!-- DOS AND DONTS -->
          <section id="dos-donts" class="pa-section">
            <div class="pa-section__kicker">IN PRACTICE</div>
            <h2 class="pa-section__title">Do's & Don'ts</h2>
            <div class="pa-dd-grid">
              <div class="pa-dd pa-dd--do">
                <div class="pa-dd__header">
                  <span class="pa-dd__icon pa-dd__icon--do">✓</span>
                  <strong>Do</strong>
                </div>
                <ul class="pa-dd__list">
                  <?php foreach ($principle['do'] as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="pa-dd pa-dd--dont">
                <div class="pa-dd__header">
                  <span class="pa-dd__icon pa-dd__icon--dont">✕</span>
                  <strong>Don't</strong>
                </div>
                <ul class="pa-dd__list">
                  <?php foreach ($principle['dont'] as $item): ?>
                    <li><?= htmlspecialchars($item) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </section>

          <!-- REAL WORLD -->
          <section id="real-world" class="pa-section">
            <div class="pa-section__kicker">REAL WORLD</div>
            <h2 class="pa-section__title">In the wild</h2>
            <div class="pa-real-world">
              <p><?= htmlspecialchars($principle['real_world']) ?></p>
            </div>
          </section>

          <!-- RELATED PRINCIPLES -->
          <?php if (!empty($related)): ?>
          <section id="related" class="pa-section pa-section--related">
            <div class="pa-section__kicker">KEEP EXPLORING</div>
            <h2 class="pa-section__title">Related principles</h2>
            <div class="pa-related-grid">
              <?php foreach ($related as $r):
                $rCol = $colorMap[$r['color']] ?? $colorMap['blue'];
              ?>
              <a href="/psychology/<?= $r['id'] ?>" class="pa-related-card">
                <div class="pa-related-card__cat" style="color:<?= $rCol['text'] ?>"><?= htmlspecialchars(ucfirst($r['category'])) ?></div>
                <h3 class="pa-related-card__title"><?= htmlspecialchars($r['name']) ?></h3>
                <p class="pa-related-card__tagline"><?= htmlspecialchars($r['tagline']) ?></p>
                <span class="pa-related-card__arrow">→</span>
              </a>
              <?php endforeach; ?>
            </div>
          </section>
          <?php endif; ?>

          <!-- PREV / NEXT -->
          <nav class="pa-prevnext" aria-label="Previous and next principles">
            <?php if ($prevP): ?>
              <a href="/psychology/<?= $prevP['id'] ?>" class="pa-prevnext__item pa-prevnext__item--prev">
                <span class="pa-prevnext__dir">← Previous</span>
                <span class="pa-prevnext__name"><?= htmlspecialchars($prevP['name']) ?></span>
              </a>
            <?php else: ?>
              <div></div>
            <?php endif; ?>
            <?php if ($nextP): ?>
              <a href="/psychology/<?= $nextP['id'] ?>" class="pa-prevnext__item pa-prevnext__item--next">
                <span class="pa-prevnext__dir">Next →</span>
                <span class="pa-prevnext__name"><?= htmlspecialchars($nextP['name']) ?></span>
              </a>
            <?php else: ?>
              <a href="/psychology/" class="pa-prevnext__item pa-prevnext__item--next">
                <span class="pa-prevnext__dir">Browse all</span>
                <span class="pa-prevnext__name">UX Psychology →</span>
              </a>
            <?php endif; ?>
          </nav>

          <!-- CTA -->
          <div class="pa-cta">
            <p class="pa-cta__label">WANT TO GO DEEPER?</p>
            <h2 class="pa-cta__heading">See these principles <span>applied in the wild</span></h2>
            <p class="pa-cta__desc">My UX audits break down exactly which psychological principles are being violated — and how to fix them.</p>
            <div class="pa-cta__actions">
              <a href="/audit/" class="pa-cta__btn pa-cta__btn--primary">Read the audits →</a>
              <a href="/psychology/" class="pa-cta__btn pa-cta__btn--ghost">← All principles</a>
            </div>
          </div>

        </article>

      </div><!-- .pa-body -->

    </main>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div><!-- .page-wrapper -->

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/app.js"></script>
  <script src="../assets/js/background.js"></script>
  <script src="../assets/js/animations.js"></script>
  <script>
  /* ── READING PROGRESS BAR ── */
  (function () {
    var bar = document.getElementById("cs-progress");
    if (!bar) return;
    window.addEventListener("scroll", function () {
      var doc  = document.documentElement;
      var top  = doc.scrollTop || document.body.scrollTop;
      var h    = doc.scrollHeight - doc.clientHeight;
      var pct  = h > 0 ? (top / h) * 100 : 0;
      bar.style.width = Math.min(100, pct) + "%";
    }, { passive: true });
  })();

  /* ── TOC ACTIVE STATE ── */
  (function () {
    var links    = document.querySelectorAll(".pa-toc__link");
    var sections = document.querySelectorAll(".pa-section[id]");
    if (!links.length || !sections.length) return;

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          links.forEach(function (l) { l.classList.remove("is-active"); });
          var active = document.querySelector('.pa-toc__link[href="#' + entry.target.id + '"]');
          if (active) active.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });

    sections.forEach(function (s) { observer.observe(s); });
  })();
  </script>

</body>
</html>