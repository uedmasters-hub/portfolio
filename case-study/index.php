<?php
require_once __DIR__ . "/../includes/config.php";
require_once __DIR__ . "/../data/case-studies.php";

$currentKey = "case-studies";
$pageTitle  = "Case Studies — Ramesh Mandal";
$pageDesc   = "UX case studies spanning airline commerce, enterprise apps, design systems, and marketplace design — all backed by measurable outcomes.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>"/>
  <title><?= htmlspecialchars($pageTitle) ?></title>
  
  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"     href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"    href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16"  href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>
  
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/css/preloader.css"/>
  <link rel="stylesheet" href="../assets/css/variables.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/case-study.css"/>
</head>
<body>

  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">Case Studies</span>
        <span class="preloader__name-role">Selected Work · Real Outcomes</span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
    <div class="bg-mouse-glow"></div>
  </div>

  <div class="page-wrapper">

    <?php require_once __DIR__ . "/../partials/header.php"; ?>

    <main id="main-content">

      <!-- HERO -->
      <div class="cs-index-hero fade-in">
        <p class="cs-kicker">SELECTED WORK</p>
        <h1 class="cs-index-title">
          Real work.<br><span>Real outcomes.</span>
        </h1>
        <p class="cs-index-desc">
          Every case study here is grounded in a real problem, shaped by real research,
          and measured against real business outcomes. No hypotheticals.
        </p>
      </div>

      <!-- FILTER BAR -->
      <div class="cs-filter-bar" role="group" aria-label="Filter case studies">
        <button class="cs-filter-btn is-active" data-filter="all">All Work</button>
        <button class="cs-filter-btn" data-filter="AIRLINE COMMERCE">Airline</button>
        <button class="cs-filter-btn" data-filter="ENTERPRISE APP">Enterprise</button>
        <button class="cs-filter-btn" data-filter="DESIGN INFRASTRUCTURE">Design Systems</button>
        <button class="cs-filter-btn" data-filter="MARKETPLACE">Marketplace</button>
      </div>

      <!-- GRID -->
      <div class="cs-grid" id="cs-grid" role="list">

        <?php foreach ($caseStudies as $i => $cs): ?>

          <a
            href="<?= htmlspecialchars($cs['slug']) ?>.php"
            class="cs-card<?= $cs['featured'] ? ' cs-card--featured' : '' ?> tl-reveal"
            role="listitem"
            data-category="<?= htmlspecialchars($cs['category']) ?>"
            style="--delay: <?= ($i % 3) * 80 ?>ms"
            aria-label="<?= htmlspecialchars($cs['title']) ?>"
          >

            <div class="cs-card__image-wrap">
              <img
                class="cs-card__image"
                src="<?= htmlspecialchars($cs['image']) ?>"
                alt="<?= htmlspecialchars($cs['title']) ?>"
                loading="<?= $i < 2 ? 'eager' : 'lazy' ?>"
              />
              <div class="cs-card__overlay"></div>
              <span class="cs-card__year"><?= htmlspecialchars($cs['year']) ?></span>
            </div>

            <div class="cs-card__body">
              <span class="cs-card__category"><?= htmlspecialchars($cs['category']) ?></span>
              <h2 class="cs-card__title"><?= htmlspecialchars($cs['title']) ?></h2>
              <p class="cs-card__tagline"><?= htmlspecialchars($cs['tagline']) ?></p>
              <div class="cs-card__tags">
                <?php foreach (array_slice($cs['tags'], 0, 3) as $tag): ?>
                  <span class="cs-card__tag"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="cs-card__metrics">
              <?php foreach ($cs['metrics'] as $m): ?>
                <div class="cs-card__metric">
                  <span class="cs-card__metric-value"><?= htmlspecialchars($m['value']) ?></span>
                  <span class="cs-card__metric-label"><?= htmlspecialchars($m['label']) ?></span>
                </div>
              <?php endforeach; ?>
            </div>

          </a>

        <?php endforeach; ?>

      </div>

    </main>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div>

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/background.js" defer></script>
  <script src="../assets/js/animations.js" defer></script>
  <script src="../assets/js/app.js" defer></script>
  <script>
  /* ── FILTER ── */
  (function(){
    document.querySelectorAll(".cs-filter-btn").forEach(function(btn){
      btn.addEventListener("click", function(){
        document.querySelectorAll(".cs-filter-btn").forEach(function(b){ b.classList.remove("is-active"); });
        this.classList.add("is-active");
        const filter = this.dataset.filter;
        document.querySelectorAll(".cs-card").forEach(function(card){
          const show = filter === "all" || card.dataset.category === filter;
          card.style.display    = show ? "" : "none";
          card.style.gridColumn = show && card.classList.contains("cs-card--featured") ? "span 2" : "";
        });
      });
    });
  })();
  </script>

</body>
</html>
