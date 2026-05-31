<?php
require_once __DIR__ . "/../includes/config.php";

$currentKey = "case-studies";
$pageTitle  = "IndiGo Booking Ecosystem — Case Study";
$pageDesc   = "How I redesigned IndiGo's booking flow for 50M+ users, reducing drop-off by 18% and driving 22% ancillary revenue growth.";

$meta = [
  ["label" => "Role",     "value" => "Sr. Manager UI/UX"],
  ["label" => "Company",  "value" => "IndiGo Airlines"],
  ["label" => "Duration", "value" => "18 months"],
  ["label" => "Year",     "value" => "2022 – 2024"],
];

$nav = [
  ["id" => "overview",   "label" => "Overview"],
  ["id" => "problem",    "label" => "Problem"],
  ["id" => "research",   "label" => "Research"],
  ["id" => "psychology", "label" => "Psychology"],
  ["id" => "process",    "label" => "Process"],
  ["id" => "solution",   "label" => "Solution"],
  ["id" => "outcomes",   "label" => "Outcomes"],
  ["id" => "learnings",  "label" => "Learnings"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>"/>
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/case-study/indigo-booking.php"/>
  <meta property="og:title"        content="IndiGo Booking Ecosystem — Case Study"/>
  <meta property="og:description"  content="Redesigning a 50M-user booking flow. 22% revenue growth, 30% fewer support queries."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="IndiGo Booking Ecosystem — Case Study"/>
  <meta name="twitter:description" content="Redesigning a 50M-user booking flow. 22% revenue growth, 30% fewer support queries."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/case-study/indigo-booking.php"/>
  
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
  <link rel="stylesheet" href="../assets/css/animations.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/article.css"/>
  <link rel="stylesheet" href="../assets/css/case-study.css"/>

  <!-- JSON-LD STRUCTURED DATA -->
  <?php
    require_once __DIR__ . '/../includes/schema.php';
    $_thisStudy = null;
    foreach ($caseStudies as $_s) { if ($_s['slug'] === 'indigo-booking') { $_thisStudy = $_s; break; } }
    if ($_thisStudy) {
      echo schema_case_study($_thisStudy);
    }
  ?>
</head>
<body>

  <!-- READING PROGRESS -->
  <div class="art-progress" id="art-progress" role="progressbar" aria-label="Reading progress"></div>

  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">IndiGo Booking</span>
        <span class="preloader__name-role">Case Study · Airline Commerce</span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
  </div>

<?php require_once __DIR__ . "/../partials/header.php"; ?>

  <div class="page-wrapper">

    <main id="main-content">

      <!-- HERO IMAGE -->
      <div class="art-hero fade-in">
        <img
          class="art-hero__img"
          src="https://images.unsplash.com/photo-1529074963764-98f45c47344b?q=80&w=2400&auto=format&fit=crop"
          alt="IndiGo aircraft representing the booking ecosystem"
          loading="eager"
        />
        <div class="art-hero__overlay"></div>
        <div class="art-hero__content">
          <div class="art-hero__kicker">AIRLINE COMMERCE SYSTEM</div>
          <h1 class="art-hero__title">IndiGo Booking<br>Ecosystem</h1>
          <p class="art-hero__subtitle">
            Redesigning a 50M-user booking flow for conversion, clarity, and scale.
          </p>
        </div>
      </div>

      <!-- META BAR -->
      <div class="art-meta-bar">
        <?php foreach ($meta as $m): ?>
          <div class="art-meta-item">
            <span class="art-meta-item__label"><?= htmlspecialchars($m['label']) ?></span>
            <span class="art-meta-item__value"><?= htmlspecialchars($m['value']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- CONTENT -->
      <div class="art-body">

        <!-- STICKY NAV -->
        <nav class="art-sidebar" aria-label="Case study sections">
          <div class="art-nav">
            <span class="art-nav__label">In this note</span>
            <?php foreach ($nav as $n): ?>
              <a href="#<?= $n['id'] ?>" class="art-nav__item" data-nav="<?= $n['id'] ?>">
                <?= htmlspecialchars($n['label']) ?>
              </a>
            <?php endforeach; ?>
          </div>
        </nav>

        <!-- ARTICLE -->
        <article class="art-article" id="art-article">

          <!-- OVERVIEW -->
          <section class="cs-section" id="overview">
            <span class="cs-section__label">01 — Overview</span>
            <h2 class="cs-section__title">The booking flow was costing IndiGo money every day</h2>
            <div class="cs-section__body">
              <p>IndiGo is India's largest airline, carrying 50M+ passengers annually. Their booking flow — the core revenue engine — had grown organically over a decade. It worked, but barely. Conversion rates were below industry benchmarks, ancillary attachment was low, and the support team was overwhelmed with payment and refund queries.</p>
              <p>I was brought in as Sr. Manager UI/UX to lead the end-to-end redesign: from discovery through delivery, across the booking funnel, ancillary products, and payment experience.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">22%</div>
                <div class="cs-metric-card__label">Ancillary revenue growth post-redesign</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">18%</div>
                <div class="cs-metric-card__label">Drop-off reduction across the funnel</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">30%</div>
                <div class="cs-metric-card__label">Reduction in payment support queries</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">2023</div>
                <div class="cs-metric-card__label">IndiGo Innovation Award — highest conversion growth</div>
              </div>
            </div>
          </section>

          <!-- PROBLEM -->
          <section class="cs-section" id="problem">
            <span class="cs-section__label">02 — Problem</span>
            <h2 class="cs-section__title">47 friction points. One broken funnel.</h2>
            <div class="cs-section__body">
              <p>Before designing a single pixel, I audited the existing booking flow with a structured heuristic analysis. I mapped every screen, interaction, and decision point across the funnel — and identified <strong>47 distinct friction points</strong>.</p>
              <p>The problems clustered into five categories:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Information overload at seat selection</p>
                  <p class="cs-step__desc">Users were shown too many options simultaneously — 180 seats, 6 price tiers, 3 meal options — causing decision paralysis and abandonment.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Ancillary upsell felt transactional, not helpful</p>
                  <p class="cs-step__desc">Add-ons (meals, baggage, insurance) were presented as a wall of options with no personalisation — users dismissed them entirely.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Payment flow lacked trust signals</p>
                  <p class="cs-step__desc">At checkout — the highest-anxiety moment — the UI had no security indicators, confusing error messages, and poor saved-card UX.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">Mobile experience was an afterthought</p>
                  <p class="cs-step__desc">64% of traffic was mobile. The booking flow had been designed desktop-first and adapted badly — tap targets too small, forms too long.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">5</div>
                <div>
                  <p class="cs-step__title">Refund and change flows had zero clarity</p>
                  <p class="cs-step__desc">Users couldn't understand their options, so they called support. 30% of support volume was refund-related queries that should have been self-served.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- RESEARCH -->
          <section class="cs-section" id="research">
            <span class="cs-section__label">03 — Research</span>
            <h2 class="cs-section__title">Listen to 80 travellers. Then look at 50 million.</h2>
            <div class="cs-section__body">
              <p>I ran a mixed-methods research sprint combining qualitative interviews with quantitative funnel analysis — because neither alone tells the full story.</p>
              <p><strong>Qualitative:</strong> 80 in-depth interviews with IndiGo passengers across leisure, business, and family travel segments. Key finding: users didn't trust the ancillary offers because they felt irrelevant — "I'm flying alone, why am I being shown family meal combos?"</p>
              <p><strong>Quantitative:</strong> Mixpanel and Hotjar data across 3 months. Largest drop-off: 34% of users abandoned at the ancillary selection screen. Second largest: 22% abandoned at payment OTP entry.</p>
            </div>
            <blockquote class="cs-callout">
              "I just want to book a seat and pay. Why does it feel like I'm doing my taxes?"<br>
              <small>— Interview participant, frequent business traveller</small>
            </blockquote>
            <div class="cs-section__body">
              <p>This quote became the north star for the redesign. Every decision was filtered through it: <em>does this make booking feel easier or harder?</em></p>
            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology</span>
            <h2 class="cs-section__title">The behavioural triggers at play</h2>
            <div class="cs-section__body">
              <p>Understanding why users behave the way they do unlocked the design solutions. Three principles drove every major decision:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Choice overload → progressive disclosure</p>
                  <p class="cs-step__desc">Barry Schwartz's paradox of choice: more options = more paralysis. Solution: show the most popular seat tier first, reveal alternatives on demand.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Loss aversion → reframe ancillary offers</p>
                  <p class="cs-step__desc">Users respond more to avoiding loss than gaining value. Changed "Add meal for ₹250" to "Your flight includes no meal — add one from ₹250." Conversion increased 14%.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Trust at peak anxiety → payment trust signals</p>
                  <p class="cs-step__desc">The payment moment is when anxiety peaks. Added bank logos, SSL badge, and a "Secured by JusPay" indicator above the fold. Payment abandonment dropped 14%.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 Hick's Law</span>
              <span class="cs-insight">🧠 Loss Aversion</span>
              <span class="cs-insight">🧠 Trust Signals</span>
              <span class="cs-insight">🧠 Progressive Disclosure</span>
              <span class="cs-insight">🧠 Peak-End Rule</span>
            </div>
          </section>

          <!-- PROCESS -->
          <section class="cs-section" id="process">
            <span class="cs-section__label">05 — Process</span>
            <h2 class="cs-section__title">From 47 friction points to a shipped product</h2>
            <div class="cs-section__body">
              <p>I structured the work in three phases over 18 months, working alongside product managers, engineers, and the revenue team.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Phase 1 — Foundation (Months 1–4)</p>
                  <p class="cs-step__desc">Heuristic audit, user interviews, funnel analysis. Prioritised 47 issues by impact × effort. Built alignment with product and engineering on the top 12.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Phase 2 — Core Flow Redesign (Months 5–12)</p>
                  <p class="cs-step__desc">Redesigned seat selection, ancillary upsell, and payment. 14 rounds of prototype testing with 120 users. A/B tested each major change before full rollout.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Phase 3 — Ancillary & Holidays (Months 13–18)</p>
                  <p class="cs-step__desc">Extended to IndiGo Holidays marketplace and loyalty product. Introduced personalised hotel bundles and gamified loyalty interactions.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- SOLUTION -->
          <section class="cs-section" id="solution">
            <span class="cs-section__label">06 — Solution</span>
            <h2 class="cs-section__title">Three decisions that moved the needle</h2>
            <div class="cs-section__body">
              <p>Out of 12 major design changes, three had disproportionate impact:</p>
              <p><strong>1. Mobile-first seat map.</strong> Rebuilt the seat selection component from scratch for touch — larger tap targets, swipe-to-zoom, simplified tier logic. Mobile conversion improved 22%.</p>
              <p><strong>2. Contextual ancillary upsell.</strong> Replaced the "wall of options" with a personalised recommendation — one primary offer based on route, passenger count, and booking history. Ancillary attachment rate increased from 18% to 29%.</p>
              <p><strong>3. Trust-first payment UI.</strong> Collaborated with JusPay to redesign the checkout: saved cards above the fold, bank logos prominent, OTP input with auto-advance, clear error recovery. Payment failures dropped 14%.</p>
            </div>
            <blockquote class="cs-callout">
              The Super 6E Sale redesign — built on these foundations — became the highest-converting sale event in IndiGo history, winning the 2023 Innovation Award.
            </blockquote>
          </section>

          <!-- OUTCOMES -->
          <section class="cs-section" id="outcomes">
            <span class="cs-section__label">07 — Outcomes</span>
            <h2 class="cs-section__title">Measured, shipped, and recognised</h2>
            <div class="cs-section__body">
              <p>All results measured against a 12-week baseline period pre-redesign, using Mixpanel with statistical significance ≥95%.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">22%</div>
                <div class="cs-metric-card__label">Ancillary revenue growth — meals, baggage, insurance</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">18%</div>
                <div class="cs-metric-card__label">Overall funnel drop-off reduced</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">14%</div>
                <div class="cs-metric-card__label">Payment failure rate reduced</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">30%</div>
                <div class="cs-metric-card__label">Support queries for refunds reduced</div>
              </div>
            </div>
          </section>

          <!-- LEARNINGS -->
          <section class="cs-section" id="learnings">
            <span class="cs-section__label">08 — Learnings</span>
            <h2 class="cs-section__title">What I'd do differently</h2>
            <div class="cs-section__body">
              <p><strong>Start with the worst moment, not the first moment.</strong> We spent the first month redesigning the search and results screens — but the data showed the real pain was at payment. I'd front-load effort to the highest drop-off point first.</p>
              <p><strong>Involve engineering in the research phase.</strong> Some of our best solutions were impossible in the first sprint because of technical constraints we discovered too late. Earlier engineering involvement would have saved 6 weeks.</p>
              <p><strong>Personalisation is infrastructure.</strong> The contextual upsell only worked because we built a basic recommendation layer. UX improvements that depend on data need data infrastructure investment first — budget for it.</p>
            </div>
          </section>

        </article>

      </div><!-- /.art-body -->

    </main>

      <!-- NEXT CASE STUDIES — shared art-next layout -->
      <div class="art-next-wrap">
        <section class="art-next" aria-label="Next case studies">
          <a href="crewpal.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">NEXT CASE STUDY</p>
            <p class="art-next__category">ENTERPRISE APP</p>
            <h3 class="art-next__title">CrewPal Operations Platform</h3>
            <p class="art-next__tagline">Simplifying high-stakes operations for 8,000+ cabin crew.</p>
          </a>
          <a href="design-system.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">ALSO WORTH READING</p>
            <p class="art-next__category">DESIGN INFRASTRUCTURE</p>
            <h3 class="art-next__title">Enterprise Design System</h3>
            <p class="art-next__tagline">One system powering 10+ products and a 15-person design team.</p>
          </a>
        </section>
      </div>

    <!-- CROSS-CONTENT INTERNAL LINKS — outside main, full width -->
    <?php
      require_once __DIR__ . "/../partials/related-content.php";
      render_related_content("case-study", "indigo-booking");
    ?>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div>

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/background.js" defer></script>
  <script src="../assets/js/animations.js" defer></script>
  <script src="../assets/js/app.js" defer></script>
  <script>
  /* ── READING PROGRESS ── */
  (function(){
    const bar  = document.getElementById("art-progress");
    const main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      const h   = main.scrollHeight - window.innerHeight;
      const pct = h > 0 ? Math.min(100, (window.scrollY / h) * 100) : 0;
      bar.style.width = pct + "%";
    }, { passive: true });
  })();
  /* ── ACTIVE NAV HIGHLIGHT ── */
  (function(){
    const navItems = document.querySelectorAll(".art-nav__item[data-nav]");
    const sections = document.querySelectorAll(".cs-section[id], .art-section[id]");
    if (!navItems.length) return;
    const obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          navItems.forEach(function(n){ n.classList.remove("is-active"); });
          const active = document.querySelector('.art-nav__item[data-nav="'+e.target.id+'"]');
          if (active) active.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    sections.forEach(function(s){ obs.observe(s); });
  })();
  </script>

</body>
</html>