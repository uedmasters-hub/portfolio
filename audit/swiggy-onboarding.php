<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="A heuristic audit of Swiggy&#039;s onboarding and home screen — 9 friction points, information architecture breakdown, psychology violations, and redesign suggestions."/>
  <title>Swiggy Onboarding &amp; Home Screen UX Audit — Ramesh Mandal</title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/audit/swiggy-onboarding.php"/>
  <meta property="og:title"        content="Swiggy Onboarding UX Audit"/>
  <meta property="og:description"  content="9 friction points. UX score 58/100. Swiggy's home screen tries to do everything."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="Swiggy Onboarding UX Audit"/>
  <meta name="twitter:description" content="9 friction points. UX score 58/100. Swiggy's home screen tries to do everything."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/audit/swiggy-onboarding.php"/>

  <link rel="icon" type="image/x-icon"    href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"   href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16"  href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="/assets/css/preloader.css"/>
  <link rel="stylesheet" href="/assets/css/variables.css"/>
  <link rel="stylesheet" href="/assets/css/animations.css"/>
  <link rel="stylesheet" href="/assets/css/reset.css"/>
  <link rel="stylesheet" href="/assets/css/main.css"/>
  <link rel="stylesheet" href="/assets/css/navigation.css"/>
  <link rel="stylesheet" href="/assets/css/background.css"/>
  <link rel="stylesheet" href="/assets/css/footer.css"/>
  <link rel="stylesheet" href="/assets/css/case-study.css"/>
  <link rel="stylesheet" href="/assets/css/audit.css"/>
  <link rel="stylesheet" href="/assets/css/article.css"/>

  <!-- JSON-LD STRUCTURED DATA -->
  </head>
<body data-header="dark">

  <!-- READING PROGRESS -->
  <div class="cs-progress-bar" id="cs-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">Swiggy Onboarding</span>
        <span class="preloader__name-role">UX Audit · Food Delivery</span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <!-- BACKGROUND -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
  </div>


<!-- Font Awesome — async so it never blocks window.load -->
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous"/></noscript>

<!-- ==================================================
     HEADER / NAVIGATION
================================================== -->

<header class="header" id="site-header" role="banner">

    <!-- LOGO -->
    <a href="/" class="logo" aria-label="Ramesh Mandal — Home">
        <span class="logo__mark" aria-hidden="true">RM</span>
        <span class="logo__text">RAMESH MANDAL</span>
    </a>

    <!-- DESKTOP NAV -->
    <nav class="nav" aria-label="Primary navigation" role="navigation">

        <!-- WORK — mega menu trigger -->
        <div class="nav-item">
            <button
                class="nav-trigger active"
                aria-expanded="false"
                aria-controls="mega-panel-work"
                data-mega="work"
                type="button"
            >
                Work
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <!-- FIELD NOTES — mega menu trigger -->
        <div class="nav-item">
            <button
                class="nav-trigger"
                aria-expanded="false"
                aria-controls="mega-panel-field-notes"
                data-mega="field-notes"
                type="button"
            >
                Field Notes
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <!-- LAB — mega menu trigger -->
        <div class="nav-item">
            <button
                class="nav-trigger"
                aria-expanded="false"
                aria-controls="mega-panel-lab"
                data-mega="lab"
                type="button"
            >
                Lab
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <!-- TOOLKIT — simple link -->
        <div class="nav-item">
            <a
                href="/resources.php"
                class="nav-link"
            >
                Toolkit
            </a>
        </div>

        <!-- ABOUT — simple link -->
        <div class="nav-item">
            <a
                href="/about.php"
                class="nav-link"
            >
                About
            </a>
        </div>

    </nav>

    <!-- RIGHT: CONNECT + HAMBURGER -->
    <div class="nav-right">
        <a href="/contact.php" class="nav-connect">
            Connect
        </a>
    </div>

    <!-- HAMBURGER — mobile only -->
    <button
        class="nav-hamburger"
        aria-expanded="false"
        aria-controls="mobile-drawer"
        aria-label="Open navigation menu"
        id="hamburger-btn"
        type="button"
    >
        <span></span>
        <span></span>
        <span></span>
    </button>

</header>


<!-- ==================================================
     MEGA MENU
     Sits outside header, anchored to fixed position
================================================== -->

<div class="mega-menu" id="mega-menu" role="region" aria-label="Site mega menu">

    <!-- ==================
         PANEL: WORK
    =================== -->

    <div class="mega-panel" id="mega-panel-work" role="group" aria-label="Work navigation">

        <div class="mega-inner mega-inner--work">

            <!-- INTRO COL -->
            <div class="mega-intro">

                <p class="mega-intro-kicker">Work</p>

                <h3>Enterprise UX at scale</h3>

                <p>
                    Case studies and teardowns from 17 years of
                    shipping products for millions of users.
                </p>

                <a href="/case-study/" class="mega-intro-cta">
                    View all work →
                </a>

            </div>

            <!-- COL: CASE STUDIES -->
            <div class="mega-col">

                <p class="mega-col-label">Case Studies</p>

                <div class="mega-links">

                    <a href="/case-study/indigo-booking.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">✈</span>
                        <span>
                            <span class="mega-link-title">IndiGo Booking Ecosystem</span>
                            <span class="mega-link-desc">22% revenue ↑ · Conversion &amp; CRO</span>
                        </span>
                    </a>

                    <a href="/case-study/crewpal.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">👥</span>
                        <span>
                            <span class="mega-link-title">CrewPal Operations Platform</span>
                            <span class="mega-link-desc">25% satisfaction ↑ · Enterprise Ops</span>
                        </span>
                    </a>

                    <a href="/case-study/indigo-loyalty.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🏅</span>
                        <span>
                            <span class="mega-link-title">Gamified Loyalty Program</span>
                            <span class="mega-link-desc">40% retention ↑ · 500+ user tests</span>
                        </span>
                    </a>

                    <a href="/case-study/design-system.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚙</span>
                        <span>
                            <span class="mega-link-title">Enterprise Design System</span>
                            <span class="mega-link-desc">40% delivery velocity ↑ · Systems</span>
                        </span>
                    </a>

                </div>

            </div>

            <!-- COL: AUDITS -->
            <div class="mega-col">

                <p class="mega-col-label">UX Audits</p>

                <div class="mega-links">

                    <a href="/audit/zomato-checkout.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🔍</span>
                        <span>
                            <span class="mega-link-title">Zomato Checkout Audit</span>
                            <span class="mega-link-desc">12 friction points identified</span>
                        </span>
                    </a>

                    <a href="/audit/swiggy-onboarding.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🛵</span>
                        <span>
                            <span class="mega-link-title">Swiggy Onboarding Audit</span>
                            <span class="mega-link-desc">Heuristic breakdown · Redesign suggestions</span>
                        </span>
                    </a>

                </div>

                <div class="mega-divider"></div>

                <!-- FEATURED CARD -->
                <div class="mega-featured">
                    <p class="mega-featured-tag">Featured</p>
                    <h4>IndiGo Holidays Marketplace</h4>
                    <p>Personalized bundling that drove 22% ancillary revenue growth.</p>
                    <span class="mega-featured-metric">↑ 22% Revenue</span>
                </div>

            </div>

        </div>

        <!-- FOOTER BAR -->
        <div class="mega-footer">

            <div class="mega-footer-links">
                <a href="/case-study/" class="mega-footer-link">All case studies →</a>
                <a href="/audit/" class="mega-footer-link">All audits →</a>
                <a href="/about.php#awards" class="mega-footer-link">IndiGo Innovation Award 2023</a>
            </div>

            <div class="mega-footer-badge">
                <span class="avail-dot" aria-hidden="true"></span>
                Available for senior UX leadership roles
            </div>

        </div>

    </div><!-- /panel-work -->


    <!-- ==================
         PANEL: FIELD NOTES
    =================== -->

    <div class="mega-panel" id="mega-panel-field-notes" role="group" aria-label="Field Notes navigation">

        <div class="mega-inner mega-inner--notes">

            <!-- INTRO COL -->
            <div class="mega-intro">

                <p class="mega-intro-kicker">Field Notes</p>

                <h3>Writing from the front lines</h3>

                <p>
                    Essays, war stories, and frameworks from 17
                    years of shipping real products.
                </p>

                <a href="/blog/" class="mega-intro-cta">
                    Browse all writing →
                </a>

            </div>

            <!-- COL: BLOG -->
            <div class="mega-col">

                <p class="mega-col-label">Stories &amp; Essays</p>

                <div class="mega-links">

                    <a href="/blog/post.php?slug=the-redesign-nobody-asked-for" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚡</span>
                        <span>
                            <span class="mega-link-title">The Redesign Nobody Asked For</span>
                            <span class="mega-link-desc">War Story · 5 min read</span>
                        </span>
                    </a>

                    <a href="/blog/post.php?slug=the-44px-tap-target" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚡</span>
                        <span>
                            <span class="mega-link-title">The 44px Tap Target That Cost ₹2 Crore</span>
                            <span class="mega-link-desc">War Story · 5 min read</span>
                        </span>
                    </a>

                    <a href="/blog/post.php?slug=dark-patterns-are-a-short-term-win" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">◈</span>
                        <span>
                            <span class="mega-link-title">Dark Patterns Work. That's Why They're Dangerous.</span>
                            <span class="mega-link-desc">Unpopular Opinion · 6 min read</span>
                        </span>
                    </a>

                    <a href="/blog/post.php?slug=the-word-that-changed-conversion" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">✦</span>
                        <span>
                            <span class="mega-link-title">The Single Word That Changed Conversion</span>
                            <span class="mega-link-desc">Quiet Win · 4 min read</span>
                        </span>
                    </a>

                </div>

            </div>

            <!-- COL: PSYCHOLOGY -->
            <div class="mega-col">

                <p class="mega-col-label">Behavioral Design</p>

                <div class="mega-links">

                    <a href="/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span>
                            <span class="mega-link-title">Loss Aversion in UX</span>
                            <span class="mega-link-desc">Why users fear losing more than gaining</span>
                        </span>
                    </a>

                    <a href="/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span>
                            <span class="mega-link-title">Social Proof Mechanics</span>
                            <span class="mega-link-desc">How trust is manufactured at scale</span>
                        </span>
                    </a>

                    <a href="/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span>
                            <span class="mega-link-title">Dopamine Loops in Product Design</span>
                            <span class="mega-link-desc">Variable reward and engagement patterns</span>
                        </span>
                    </a>

                </div>

                <div class="mega-divider"></div>

                <a href="/psychology/" class="mega-intro-cta" style="padding-left:12px;">
                    All psychology articles →
                </a>

            </div>

        </div>

        <!-- FOOTER BAR -->
        <div class="mega-footer">

            <div class="mega-footer-links">
                <a href="/blog/" class="mega-footer-link">All essays →</a>
                <a href="/psychology/" class="mega-footer-link">Psychology articles →</a>
                <a href="/blog/?category=war-stories" class="mega-footer-link">War Stories →</a>
            </div>

            <div class="mega-footer-badge">
                11 published · Updated monthly
            </div>

        </div>

    </div><!-- /panel-field-notes -->


    <!-- ==================
         PANEL: LAB
    =================== -->

    <div class="mega-panel" id="mega-panel-lab" role="group" aria-label="Lab navigation">

        <div class="mega-inner mega-inner--lab">

            <!-- INTRO COL -->
            <div class="mega-intro">

                <p class="mega-intro-kicker">Lab</p>

                <h3>Experiments &amp; explorations</h3>

                <p>
                    AI-UX experiments, interactive prototypes,
                    and frameworks I'm actively testing.
                </p>

                <a href="/audit/" class="mega-intro-cta">
                    Enter the lab →
                </a>

            </div>

            <!-- COL: EXPERIMENTS -->
            <div class="mega-col">

                <p class="mega-col-label">Active Experiments</p>

                <div class="mega-links">

                    <a href="/audit/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🤖</span>
                        <span>
                            <span class="mega-link-title">AI-Assisted UX Research</span>
                            <span class="mega-link-desc">Using Claude + Gemini in synthesis workflows</span>
                        </span>
                    </a>

                    <a href="/audit/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">📊</span>
                        <span>
                            <span class="mega-link-title">Heuristic Scoring System</span>
                            <span class="mega-link-desc">A quantified audit framework prototype</span>
                        </span>
                    </a>

                    <a href="/audit/zomato-checkout.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🔍</span>
                        <span>
                            <span class="mega-link-title">Zomato Checkout Teardown</span>
                            <span class="mega-link-desc">12 annotated friction points</span>
                        </span>
                    </a>

                    <a href="/audit/swiggy-onboarding.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🛵</span>
                        <span>
                            <span class="mega-link-title">Swiggy Onboarding Analysis</span>
                            <span class="mega-link-desc">Behavioral design critique</span>
                        </span>
                    </a>

                </div>

            </div>

        </div>

        <!-- FOOTER BAR -->
        <div class="mega-footer">

            <div class="mega-footer-links">
                <a href="/audit/" class="mega-footer-link">All experiments →</a>
                <a href="/blog/?category=from-the-field" class="mega-footer-link">AI + UX thinking →</a>
            </div>

            <div class="mega-footer-badge">
                Work in progress · Updated continuously
            </div>

        </div>

    </div><!-- /panel-lab -->

</div><!-- /mega-menu -->


<!-- ==================================================
     BACKDROP
================================================== -->

<div class="mega-backdrop" id="mega-backdrop" aria-hidden="true"></div>


<!-- ==================================================
     MOBILE SCRIM (behind drawer)
================================================== -->

<div class="mobile-scrim" id="mobile-scrim" aria-hidden="true"></div>



<!-- ==================================================
     MOBILE DRAWER
     RM logo mark · FA icons · table-row borders
     Active = blue + 8px indent
     Uses .mobile-nav-link class so existing JS works
================================================== -->

<div class="mobile-drawer" id="mobile-drawer"
    aria-label="Mobile navigation" role="dialog" aria-modal="true">

    <!-- DRAWER HEADER -->
    <div class="mobile-drawer__header">

        <a href="/" class="mobile-drawer__logo" aria-label="Home">
            <span class="mobile-drawer__logo-mark" aria-hidden="true">RM</span>
            <span class="mobile-drawer__logo-text">RAMESH MANDAL</span>
        </a>

        <button class="mobile-drawer__close" id="drawer-close-btn"
            aria-label="Close navigation" type="button">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M2 2l12 12M14 2L2 14" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/>
            </svg>
        </button>

    </div>

    <!-- DRAWER BODY -->
    <div class="mobile-drawer__body">

        <!-- WORK -->
        <span class="mobile-nav-label">Work</span>

        <a href="/case-study/"
            class="mobile-nav-link is-active">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-book-open"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">Case Studies</span>
                <!-- <span class="mobile-nav-link-desc">IndiGo, CrewPal, Design System</span> -->
            </span>
        </a>

        <a href="/audit/"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">UX Audits</span>
                <!-- <span class="mobile-nav-link-desc">Zomato, Swiggy teardowns</span> -->
            </span>
        </a>

        <!-- FIELD NOTES -->
        <span class="mobile-nav-label">Field Notes</span>

        <a href="/blog/"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-message"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">Stories &amp; Essays</span>
                <!-- <span class="mobile-nav-link-desc">War stories, quiet wins, opinions</span> -->
            </span>
        </a>

        <a href="/psychology/"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-brain"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">Behavioural Design</span>
                <!-- <span class="mobile-nav-link-desc">Psychology applied to product</span> -->
            </span>
        </a>

        <!-- LAB -->
        <span class="mobile-nav-label">Lab</span>

        <a href="/audit/"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-vial-circle-check"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">Experiments</span>
                <!-- <span class="mobile-nav-link-desc">AI-UX, frameworks, prototypes</span> -->
            </span>
        </a>

        <!-- DIVIDER -->
        <div class="mobile-nav-divider"></div>

        <!-- SECONDARY -->
        <a href="/resources.php"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-toolbox"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">Toolkit</span>
            </span>
        </a>

        <a href="/about.php"
            class="mobile-nav-link">
            <span class="mobile-nav-link-icon" aria-hidden="true">
                <i class="fa-solid fa-user"></i>
            </span>
            <span class="mobile-nav-link-text">
                <span class="mobile-nav-link-title">About</span>
            </span>
        </a>

    </div><!-- /drawer body -->

    <!-- DRAWER FOOTER -->
    <div class="mobile-drawer__footer">
        <a href="/contact.php" class="mobile-connect-btn">
            Connect
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                <path d="M1 13L13 1M13 1H4M13 1v9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="mobile-avail">
            <span class="avail-dot" aria-hidden="true"></span>
            Available for senior UX leadership roles
        </div>
    </div>

</div><!-- /mobile-drawer -->
  <div class="page-wrapper">

    <main id="main-content">

      <!-- AUDIT HERO -->
      <div class="audit-detail-hero fade-in">
        <img
          class="audit-detail-hero__img"
          src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2400&auto=format&fit=crop"
          alt="Food spread representing the Swiggy onboarding and home screen audit"
          loading="eager"
        />
        <div class="audit-detail-hero__overlay"></div>
        <div class="audit-detail-hero__content">
          <p class="audit-detail-hero__category">FOOD DELIVERY · UX AUDIT</p>
          <h1 class="audit-detail-hero__title">Swiggy Onboarding<br>& Home Screen</h1>
          <p class="audit-detail-hero__tagline">
            Swiggy's home screen tries to do everything and succeeds at nothing.
          </p>
          <!-- SCORE RING -->
          <div class="audit-score-ring" aria-label="UX Score 58 out of 100">
            <svg viewBox="0 0 120 120" class="audit-score-ring__svg" aria-hidden="true">
              <circle cx="60" cy="60" r="50" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="8"/>
              <circle
                cx="60" cy="60" r="50"
                fill="none"
                stroke="#f59e0b"
                stroke-width="8"
                stroke-linecap="round"
                stroke-dasharray="182 314"
                transform="rotate(-90 60 60)"
              />
            </svg>
            <div class="audit-score-ring__inner">
              <span class="audit-score-ring__value">58</span>
              <span class="audit-score-ring__label">UX Score</span>
            </div>
          </div>
        </div>
      </div>

      <!-- META BAR -->
      <div class="cs-meta-bar">
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Product</span>
          <span class="cs-meta-item__value">Swiggy</span>
        </div>
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Scope</span>
          <span class="cs-meta-item__value">Onboarding & Home Screen</span>
        </div>
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Audited</span>
          <span class="cs-meta-item__value">2024</span>
        </div>
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Severity</span>
          <span class="cs-meta-item__value" style="color:#f59e0b">HIGH</span>
        </div>
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Friction Points</span>
          <span class="cs-meta-item__value">9 Identified</span>
        </div>
      </div>

      <!-- CONTENT -->
      <div class="cs-content">

        <!-- STICKY NAV -->
        <nav class="cs-nav" aria-label="Audit sections">
                      <a href="#overview" class="cs-nav__item" data-nav="overview">
              Overview            </a>
                      <a href="#heuristics" class="cs-nav__item" data-nav="heuristics">
              Scorecard            </a>
                      <a href="#friction" class="cs-nav__item" data-nav="friction">
              Friction Map            </a>
                      <a href="#psychology" class="cs-nav__item" data-nav="psychology">
              Psychology            </a>
                      <a href="#redesign" class="cs-nav__item" data-nav="redesign">
              Redesign            </a>
                      <a href="#impact" class="cs-nav__item" data-nav="impact">
              Business Impact            </a>
                  </nav>

        <!-- ARTICLE -->
        <article class="cs-article">

          <!-- OVERVIEW -->
          <section class="cs-section" id="overview">
            <span class="cs-section__label">01 — Overview</span>
            <h2 class="cs-section__title">The first 60 seconds that shape everything</h2>
            <div class="cs-section__body">
              <p>Swiggy is one of India's two dominant food delivery platforms — a duopoly with Zomato where the battle is fought less on inventory (both have the same restaurants) and more on experience. The first 60 seconds — from app open to first restaurant listing — is where that battle is won or lost.</p>
              <p>This audit covers two related but distinct experiences: the first-run onboarding flow (from install to home screen) and the home screen information architecture. These are inseparable — what you ask during onboarding determines how relevant the home screen feels. Swiggy's problem is that they've invested heavily in the home screen's surface area while underinvesting in the data that would make it genuinely useful.</p>
              <p>I audited the Android app (v4.x) across 3 devices in November 2024. Two first-run sessions (fresh installs) and multiple returning-user sessions across different times of day and locations.</p>
              <p><strong>Disclaimer:</strong> Independent audit. No affiliation with Swiggy. All observations based on publicly available app behaviour.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">58/100</div>
                <div class="cs-metric-card__label">Overall UX score — lower than Zomato on the same heuristics</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">9</div>
                <div class="cs-metric-card__label">Distinct friction points across onboarding and home screen</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">8</div>
                <div class="cs-metric-card__label">Competing attention zones above the fold on home screen</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">0</div>
                <div class="cs-metric-card__label">Dietary preference questions asked during onboarding</div>
              </div>
            </div>
          </section>

          <!-- HEURISTIC SCORECARD -->
          <section class="cs-section" id="heuristics">
            <span class="cs-section__label">02 — Heuristic Scorecard</span>
            <h2 class="cs-section__title">10 heuristics. One honest score.</h2>
            <div class="cs-section__body">
              <p>Each heuristic scored 1–10. Scores below 5 indicate significant usability issues. Swiggy scores notably lower than Zomato on H4 (Consistency) and H8 (Minimalist Design) — both directly traceable to home screen information architecture decisions.</p>
            </div>
            <div class="audit-scorecard">
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H1</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Visibility of System Status</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        5/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:50%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 5 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Location detection feedback is slow with no visible progress indicator. Users are left staring at a blank screen for 3–5 seconds with no explanation.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H2</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Match Between System &amp; Real World</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        6/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:60%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 6 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Food category labels are mostly clear, but &#039;Swiggy Genie&#039; and &#039;Swiggy Instamart&#039; introduce brand names where functional descriptions (&#039;Courier&#039; and &#039;Groceries&#039;) would reduce cognitive load.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H3</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">User Control &amp; Freedom</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        5/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:50%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 5 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Skipping onboarding is possible but not obvious. Users who skip cannot set dietary preferences later without navigating to a buried settings screen.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H4</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Consistency &amp; Standards</span>
                      <span class="audit-scorecard__score audit-scorecard__score--critical">
                        4/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:40%;
                               background:#ef4444"
                        role="img"
                        aria-label="Score 4 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Three distinct card styles on the home screen with no consistent logic for which restaurants get which treatment. Visual hierarchy communicates priority that has no user-relevant meaning.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H5</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Error Prevention</span>
                      <span class="audit-scorecard__score audit-scorecard__score--critical">
                        4/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:40%;
                               background:#ef4444"
                        role="img"
                        aria-label="Score 4 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">No dietary preference capture during onboarding means vegetarian users are shown non-veg restaurants until they manually filter. The most common customisation need is not addressed at the most appropriate moment.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H6</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Recognition Over Recall</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        5/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:50%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 5 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Past orders are accessible but require 2 taps from home. Frequently ordered restaurants have no persistent shortcut. Users must remember and search rather than recognise and tap.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H7</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Flexibility &amp; Efficiency of Use</span>
                      <span class="audit-scorecard__score audit-scorecard__score--critical">
                        4/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:40%;
                               background:#ef4444"
                        role="img"
                        aria-label="Score 4 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">No power-user shortcuts. Repeat orders require the same 4-tap flow regardless of how frequently you order. Expert users get no acceleration over first-time users.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H8</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Aesthetic &amp; Minimalist Design</span>
                      <span class="audit-scorecard__score audit-scorecard__score--critical">
                        3/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:30%;
                               background:#ef4444"
                        role="img"
                        aria-label="Score 3 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">The home screen contains: search bar, location selector, promotional carousel (5 cards), category row (12 icons), &quot;What&#039;s on your mind&quot; row (8 food type chips), a second promotional banner, restaurant listings, and a floating nav. That is 8 competing attention zones above the fold.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H9</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Help Users Recognise Errors</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        6/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:60%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 6 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Location errors are handled reasonably well. Other error states (restaurant unavailable, item out of stock) have clear messages.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H10</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Help &amp; Documentation</span>
                      <span class="audit-scorecard__score audit-scorecard__score--warning">
                        6/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:60%;
                               background:#f59e0b"
                        role="img"
                        aria-label="Score 6 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">In-app support is accessible. Swiggy&#039;s chat support is notably better than competitors. Loses points for no onboarding guidance after signup.</p>
                  </div>
                </div>
                          </div>
          </section>

          <!-- FRICTION MAP -->
          <section class="cs-section" id="friction">
            <span class="cs-section__label">03 — Friction Map</span>
            <h2 class="cs-section__title">Nine points where Swiggy loses users</h2>
            <div class="cs-section__body">
              <p>Ranked by conversion impact. Onboarding friction is listed first because it determines every subsequent home screen interaction — a broken first impression compounds throughout the session.</p>
            </div>
            <div class="cs-steps">

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F1 — Onboarding skips dietary preferences entirely <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">India has one of the world's highest rates of vegetarianism — approximately 30% of the population. Swiggy's onboarding asks for your name and phone number. It does not ask whether you're vegetarian, Jain, or have any dietary restrictions. The result: a home screen showing meat dishes to users who will never order them, requiring manual filter application on every single session. This is the single highest-impact missing feature in the entire flow — one question at onboarding would make every subsequent session more relevant.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F2 — Home screen has 8 competing attention zones above the fold <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">Counting every distinct visual element above the restaurant listings: (1) location selector + search bar, (2) promotional carousel (auto-scrolling, 5 cards), (3) service category icons row (Swiggy Food / Instamart / Genie / Dineout), (4) "What's on your mind" food type chips, (5) a second static promotional banner, (6) "Top picks for you" section header, (7) restaurant card row. That's 7 distinct UI zones before a user sees the restaurant listings they actually opened the app for. Each zone competes for attention. None of them yields — they all shout simultaneously.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F3 — Auto-scrolling carousel interrupts reading <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">The promotional carousel at the top of the home screen auto-scrolls every 3 seconds. When a user is trying to read a restaurant name or delivery time below the carousel, the automatic movement triggers peripheral motion detection — involuntarily pulling attention upward. This is a well-documented accessibility violation (WCAG 2.1 criterion 2.2.2) and a usability anti-pattern. Auto-scrolling content that the user did not initiate interrupts every cognitive task on the screen.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F4 — Location detection blank screen: no feedback for 3–5 seconds <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">On first run and on location change, the app displays a blank or near-blank screen while detecting location. No spinner, no message, no progress indicator. Users don't know if the app is working, crashed, or waiting for them to do something. This violates H1 (Visibility of System Status) completely — and at the worst possible moment: the very first impression. Competitive benchmark: Zomato shows a pulsing location pin animation during the same process. Same wait time, radically better perception.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F5 — "Swiggy Genie" and "Instamart" require brand literacy <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">The service switcher row uses brand names (Swiggy Genie, Instamart) instead of functional descriptors (Send a Package, Groceries). New users have no way to know what these services do without tapping them — adding an unnecessary discovery step. Returning users eventually learn, but the cognitive cost is real on every first-run session. A simple sub-label ("Genie · Send anything") would eliminate this entirely.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F6 — Inconsistent restaurant card styles with no clear logic <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">Three distinct restaurant card treatments appear on the home screen: large hero cards, standard grid cards, and compact list cards. The visual treatment communicates hierarchy — users assume larger cards are better restaurants or better matches for them. In reality, card size is determined by promotional placement, not relevance. This creates false information — the interface implies a ranking that doesn't exist — and erodes trust when users notice promoted content that doesn't match their preferences.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F7 — No persistent "Reorder" shortcut for frequent orders <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">The most efficient path for a user who orders the same thing every Tuesday is still 4+ taps: home → search or scroll → restaurant → menu → add items → cart. There is no "order again" shortcut on the home screen for frequently ordered items. This is the power-user efficiency gap — Swiggy's most valuable customers (high-frequency repeat orderers) get no UX reward for their loyalty.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F8 — Filter preferences reset between sessions <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">If a vegetarian user applies the "Pure Veg" filter, it applies for that session only. On the next session, it resets — requiring reapplication. For a user who will never deviate from this filter, it is friction on every single session. Persistent filter preferences (stored to user profile, not just session) would eliminate this friction permanently for the 30%+ of users with consistent dietary requirements.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--low">·</div>
                <div>
                  <p class="cs-step__title">F9 — Past orders require 2 taps from home <span class="audit-badge audit-badge--low">LOW</span></p>
                  <p class="cs-step__desc">Order history — a primary navigation destination for repeat users — requires Profile → Orders. There's no home screen shortcut. On a platform where repeat ordering is the highest-frequency behaviour, the reorder path should be a first-class navigation element, not a Profile submenu. A dedicated "Reorder" tab in the bottom nav would serve repeat customers significantly better.</p>
                </div>
              </div>

            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology Breakdown</span>
            <h2 class="cs-section__title">The cognitive principles being violated</h2>
            <div class="cs-section__body">
              <p>Swiggy's home screen problems aren't primarily visual — they're cognitive. The information architecture creates mental load that exhausts users before they've made a single choice.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Paradox of Choice — too many zones, no clear start</p>
                  <p class="cs-step__desc">Barry Schwartz's paradox: more options reduce satisfaction and increase paralysis. Swiggy's home screen presents 8 distinct zones before any food choice — each demanding a decision about whether to engage with it. The user's cognitive goal is "find something to eat" — but the interface demands they first navigate a promotional carousel, assess a service selector, engage with food type chips, and read two promotional banners before they reach restaurant listings. Decision fatigue sets in before the actual decision.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Attentional capture — auto-scroll exploits involuntary attention</p>
                  <p class="cs-step__desc">The visual system is hardwired to detect motion — it's a survival mechanism. Auto-scrolling content hijacks this reflex, pulling attention to the carousel regardless of the user's intent. This is not a UX dark pattern in the traditional sense — it doesn't deceive — but it is an attention tax paid on every home screen visit. Multiply by daily sessions across millions of users and the aggregate cognitive cost is enormous.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">False hierarchy — visual weight implies relevance that doesn't exist</p>
                  <p class="cs-step__desc">Users are trained — by every well-designed interface — to interpret visual size as importance or relevance. Large card = most relevant. Swiggy's card sizes are determined by paid promotion, not relevance. This creates a silent trust violation: users who select a large-card restaurant and have a poor experience begin to mistrust the interface's implied hierarchy. Over time this erodes confidence in Swiggy's recommendations entirely — a long-term retention risk masquerading as a UI inconsistency.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Peak-End Rule — the blank location screen sets the wrong peak</p>
                  <p class="cs-step__desc">The very first experience of Swiggy — the moment of highest anticipation — is a blank screen with no feedback. This 3–5 second silence is the first "peak" moment of the onboarding experience. Per Kahneman's Peak-End Rule, this negative peak anchors the user's overall memory of onboarding disproportionately. A product that signals "something is happening" during this wait changes what new users remember about their first session.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 Paradox of Choice</span>
              <span class="cs-insight">🧠 Attentional Capture</span>
              <span class="cs-insight">🧠 False Hierarchy</span>
              <span class="cs-insight">🧠 Peak-End Rule</span>
              <span class="cs-insight">🧠 Cognitive Load Theory</span>
              <span class="cs-insight">🧠 Status Quo Bias</span>
            </div>
          </section>

          <!-- REDESIGN -->
          <section class="cs-section" id="redesign">
            <span class="cs-section__label">05 — Redesign Suggestions</span>
            <h2 class="cs-section__title">Six fixes. Sequenced by impact.</h2>
            <div class="cs-section__body">
              <p>All six fixes below are implementable without redesigning the home screen from scratch. They are surgical improvements that remove friction at specific points — ordered by impact-to-effort ratio.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Add dietary preference to onboarding (1 question)</p>
                  <p class="cs-step__desc"><strong>Impact: Very High. Effort: Low.</strong> A single screen after phone verification: "Do you have any dietary preferences?" with options for Pure Veg, Jain, No Preference. Store to user profile. Apply as a persistent default filter on the home screen. This single addition makes every subsequent session more relevant for 30%+ of users. Implementation: 1 sprint for the screen, filter persistence logic, and profile storage. The ROI — in reduced filter friction across millions of daily sessions — is immediate.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Stop the auto-scrolling carousel</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Trivial.</strong> Make the promotional carousel manual-only. Users swipe when they want to see the next card. The carousel doesn't scroll without user input. This is a one-line CSS/config change that eliminates attentional hijacking on every home screen visit. The business concern — that promotions get less visibility — is addressable: a dot indicator shows users there are more cards, inviting exploration without forcing it.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Add location detection loading state</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Low.</strong> Show a pulsing pin animation and "Finding restaurants near you" text during the 3–5 second location detection wait. This is purely a perception change — the wait time is identical, but the experience of waiting is transformed. Users who see visible progress assume the app is working; users who see a blank screen assume it has crashed. One animation changes the first impression of every new install.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">Reduce home screen zones from 8 to 4</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Medium.</strong> Ruthless prioritisation: keep the search bar, the service selector (with functional labels), the restaurant listings. Remove or collapse the second promotional banner (merge with carousel), remove the food-type chips (replace with a persistent filter bar above listings). The result is a home screen where the user's first viewport is dominated by actual restaurant choices — the thing they opened the app for.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">5</div>
                <div>
                  <p class="cs-step__title">Persist dietary filters across sessions</p>
                  <p class="cs-step__desc"><strong>Impact: Medium. Effort: Low.</strong> If a user applies "Pure Veg" filter, store it to their profile and apply it by default on subsequent sessions. Show a persistent "Filtered: Pure Veg ✕" chip at the top of listings so the filter is visible and dismissible. This eliminates per-session reapplication for users with consistent dietary preferences — a meaningful quality-of-life improvement for a large user segment.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">6</div>
                <div>
                  <p class="cs-step__title">Add "Order Again" shortcut for top 3 repeat orders</p>
                  <p class="cs-step__desc"><strong>Impact: Medium. Effort: Medium.</strong> Below the service selector, show a "Your Usuals" row with the 3 most frequently ordered items — restaurant name, item name, last price — with a one-tap reorder button. Users who order the same thing regularly get a dramatically faster path. This feature rewards high-frequency users and increases repeat order velocity — both directly valuable to Swiggy's unit economics.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- BUSINESS IMPACT -->
          <section class="cs-section" id="impact">
            <span class="cs-section__label">06 — Business Impact</span>
            <h2 class="cs-section__title">What fixing this is worth</h2>
            <div class="cs-section__body">
              <p>Swiggy's most acute UX problem is not any single friction point — it's the compounding effect of friction on every session. Each of the 9 friction points identified costs a small amount of conversion, attention, or trust. Together, they create a first-run experience significantly worse than it needs to be, and a returning-user experience that never gets faster or more relevant.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">30%+</div>
                <div class="cs-metric-card__label">Of users who would benefit immediately from dietary preference onboarding</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">8→4</div>
                <div class="cs-metric-card__label">Home screen attention zones — halving cognitive load above the fold</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">3–5s</div>
                <div class="cs-metric-card__label">Blank screen duration on first run — transformable to a positive moment</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">~2</div>
                <div class="cs-metric-card__label">Sprints to implement fixes 1, 2, 3, and 5 — the highest-leverage changes</div>
              </div>
            </div>
            <div class="cs-section__body" style="margin-top:48px">
              <p>The most important structural observation about Swiggy's UX problems: they are almost entirely self-inflicted. Zomato and Swiggy have essentially identical restaurant inventory in most Indian cities. The product differentiation battle is fought entirely on experience. Swiggy's home screen currently cedes ground on the first impression (blank location screen), the first engagement (8-zone cognitive overload), and the first personalisation moment (no dietary preference capture). All three are fixable without touching the core product.</p>
              <p>Swiggy has demonstrably better in-app support than Zomato, and the underlying checkout experience is solid. The gap is entirely in the first 60 seconds and the home screen architecture. Fix those, and Swiggy's retention story changes substantially.</p>
            </div>

            <blockquote class="cs-callout" style="margin-top:48px">
              This is an independent audit conducted without access to Swiggy's analytics, user research, or internal data. All impact estimates are directional, based on published industry benchmarks. The intent is constructive — the same analysis a senior UX leader would present in an internal product review.
            </blockquote>
          </section>

        </article>
      </div>

    </main>

    <!-- PREV / CTA -->
    <div class="art-next-wrap">
      <section class="art-next" aria-label="More audits">

        <a href="/audit/zomato-checkout.php" class="art-next__card">
          <span class="art-next__arrow">↗</span>
          <p class="art-next__label">PREVIOUS AUDIT</p>
          <p class="art-next__category">UX Audit · Food Delivery</p>
          <h3 class="art-next__title">Zomato Checkout Flow</h3>
          <p class="art-next__tagline">7 friction points. 61/100 UX score. Payment flow breakdown.</p>
        </a>

        <a href="/contact.php?type=Consulting" class="art-next__card">
          <span class="art-next__arrow">↗</span>
          <p class="art-next__label">WANT YOUR PRODUCT AUDITED?</p>
          <p class="art-next__category">Consulting · UX Audit</p>
          <h3 class="art-next__title">Request a UX Audit</h3>
          <p class="art-next__tagline">A structured audit with prioritised fixes and business impact estimates.</p>
        </a>

      </section>
    </div>

    <div style="display:none"><!-- placeholder closing main --></div>


    <!-- CROSS-CONTENT INTERNAL LINKS — outside main, full width -->
    <style>
/* =============================================
   KEEP READING — full-bleed, consistent across
   all page types. Padding mirrors footer.
   ============================================= */
.rc-section {
  padding:    64px 64px;
  box-sizing: border-box;
}
.rc-header { margin-bottom: 36px; }
.rc-kicker {
  font-size: 11px; font-weight: 600; letter-spacing: .16em;
  text-transform: uppercase; color: var(--blue, #1a46c9);
  display: flex; align-items: center; gap: 10px; margin-bottom: 10px;
}
.rc-kicker::before { content:""; width:18px; height:1.5px; background:var(--blue,#1a46c9); }
.rc-title {
  font-size: clamp(1.8rem, 5vw, 3rem); font-weight: 300;
  letter-spacing: -.06em; line-height: 1; color: var(--text-primary, #0f0f0f);
}
.rc-title span { color: var(--blue, #1a46c9); }

/* Grid — exactly N equal columns, full width, no max-width cap */
.rc-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  /* background: var(--border, rgba(0,0,0,.07)); */
  /* border: 1px solid var(--border, rgba(0,0,0,.07)); */
  /* border-radius: var(--radius-md, 16px); */
  overflow: hidden;
}
.rc-col {
  background: var(--bg-elevated, #fff);
  padding: 16px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  border-radius: 16px;
}
.rc-col__label {
  font-size: 11px; font-weight: 600; letter-spacing: .12em;
  text-transform: uppercase; color: var(--text-muted, #888);
  display: flex; align-items: center; gap: 6px;
}
.rc-col__items { display: flex; flex-direction: column; gap: 8px; }
.rc-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  border-radius: 10px;
  text-decoration: none;
  /* background: var(--bg, #f5f5f3); */
  /* border: 1px solid var(--border, rgba(0,0,0,.07)); */
  transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}
.rc-item:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 16px rgba(0,0,0,.08);
  border-color: rgba(26,70,201,.2);
}
.rc-item:hover .rc-item__arrow { transform: translateX(3px); color: var(--blue,#1a46c9); }
.rc-item__emoji { font-size: 1.3rem; flex-shrink: 0; width: 32px; text-align: center; }
.rc-item__thumb {
  width: 56px; height: 36px; object-fit: cover;
  border-radius: 6px; flex-shrink: 0; background: var(--border,rgba(0,0,0,.07));
}
.rc-item__body { flex: 1; min-width: 0; }
.rc-item__tag {
  font-size: 10px; font-weight: 600; letter-spacing: .1em;
  text-transform: uppercase; color: var(--blue,#1a46c9); margin-bottom: 2px;
}
.rc-item__title {
  font-size: 13px; font-weight: 500; color: var(--text-primary,#0f0f0f);
  line-height: 1.3; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
}
.rc-item__meta {
  font-size: 11px; color: var(--text-muted,#888); margin-top: 1px;
  overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
}
.rc-item__arrow {
  font-size: 14px; color: var(--text-muted,#888);
  flex-shrink: 0; transition: transform .18s, color .18s;
}
.rc-item__browse {
  display: block;font-size: 12px;color: var(--blue,#1a46c9);
  text-decoration: none;padding: 8px 10px;
  transition: border-color .18s, background .18s;
  box-sizing: border-box;
  width: 100%;text-align: left;
}
.rc-item__browse:hover {border-color: rgba(26,70,201,.3);background: rgba(26,70,201,.04);border-radius: 6px;}

/* Responsive */
@media (max-width: 1024px) {
  .rc-section { padding: 64px 40px; }
  .rc-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .rc-section { padding: 40px 20px; }

  /* One unified card — cols divided by border-bottom only */
  .rc-grid {
    grid-template-columns: 1fr;
    gap:           0 !important;
    background:    var(--bg-elevated, #fff) !important;
    border-radius: var(--radius-md, 16px);
    overflow:      hidden;
    border:        1px solid var(--border, rgba(0,0,0,.07));
  }
  .rc-col {
    padding:       20px 20px;
    background:    var(--bg-elevated, #fff);
    border-bottom: 1px solid var(--border, rgba(0,0,0,.07));
    border-right:  none !important;
  }
  .rc-col:last-child { border-bottom: none; }
  .rc-col__items { width: 100%; box-sizing: border-box; overflow: hidden; }
  .rc-col         { overflow: hidden; }

  /* Items: contained, no overflow */
  .rc-item {
    box-sizing: border-box;
    min-width:  0;
    max-width:  100%;
  }
  .rc-item__title { white-space: normal; }
  .rc-item__meta  { white-space: normal; }
  .rc-item__thumb { width: 44px; height: 30px; flex-shrink: 0; }
  .rc-item__body  { min-width: 0; flex: 1; overflow: hidden; }
}
</style>

<section class="rc-section" aria-label="More to explore">
  <div class="rc-header">
    <p class="rc-kicker">KEEP READING</p>
    <h2 class="rc-title">More from the <span>platform</span></h2>
  </div>
  <div class="rc-grid">

        <div class="rc-col">
      <p class="rc-col__label"><span>⚡</span> Field Notes</p>
      <div class="rc-col__items">
                <a href="/blog/the-redesign-nobody-asked-for" class="rc-item">
          <span class="rc-item__emoji">💥</span>
          <div class="rc-item__body">
            <p class="rc-item__tag">War Story</p>
            <p class="rc-item__title">The Redesign Nobody Asked For</p>
            <p class="rc-item__meta">6 min read</p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
                <a href="/blog/when-ab-testing-lies" class="rc-item">
          <span class="rc-item__emoji">📊</span>
          <div class="rc-item__body">
            <p class="rc-item__tag">War Story</p>
            <p class="rc-item__title">When A/B Testing Lies to You</p>
            <p class="rc-item__meta">5 min read</p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
              </div>
    </div>
    
    
        <div class="rc-col">
      <p class="rc-col__label"><span>◈</span> Case Studies</p>
      <div class="rc-col__items">
        <a href="/case-study/indigo-booking" class="rc-item">
          <img src="https://images.unsplash.com/photo-1529074963764-98f45c47344b?q=80&amp;w=1600&amp;auto=format&amp;fit=crop"
               alt="IndiGo Booking Ecosystem"
               class="rc-item__thumb" loading="lazy" width="56" height="36"/>
          <div class="rc-item__body">
            <p class="rc-item__tag">AIRLINE COMMERCE</p>
            <p class="rc-item__title">IndiGo Booking Ecosystem</p>
            <p class="rc-item__meta">2022 – 2024 · IndiGo Airlines</p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
      </div>
    </div>
    
        <div class="rc-col">
      <p class="rc-col__label"><span>⬡</span> UX Psychology</p>
      <div class="rc-col__items">
        <a href="/psychology/" class="rc-item">
          <div class="rc-item__body">
            <p class="rc-item__tag">Attention</p>
            <p class="rc-item__title">Visual Hierarchy</p>
            <p class="rc-item__meta">The eye always follows a path. You either design it or chaos does.</p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
        <a href="/psychology/" class="rc-item__browse">Browse all 14 principles →</a>
      </div>
    </div>
    
  </div>
</section>

    
<footer class="site-footer" role="contentinfo">

  <div class="footer-top">

    <!-- BRAND -->
    <div class="footer-brand">
      <div class="footer-logo">
        <span class="footer-logo__mark" aria-hidden="true">RM</span>
        <span class="footer-logo__text">Ramesh Mandal</span>
      </div>
      <p class="footer-tagline">
        UX Leader driving AI-enabled<br>product strategy at scale.
      </p>
      <div class="footer-social" aria-label="Social links">
        <a href="https://in.linkedin.com/in/ramsmandal" class="footer-social__link" target="_blank" rel="noopener" aria-label="LinkedIn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </a>
        <a href="mailto:ramsmandal@icloud.com" class="footer-social__link" aria-label="Email">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
        </a>
      </div>
    </div>

    <!-- NAV + EXPERTISE -->
    <div class="footer-middle">

      <nav class="footer-nav" aria-label="Footer navigation">
        <p class="footer-nav__heading">Navigation</p>
        <a href="/"               class="footer-nav__link">Home</a>
        <a href="/about.php"      class="footer-nav__link">About</a>
        <a href="/case-study/"    class="footer-nav__link">Work</a>
        <a href="/blog/"          class="footer-nav__link">Field Notes</a>
        <a href="/audit/"         class="footer-nav__link">Lab</a>
        <a href="/resources.php"  class="footer-nav__link">Toolkit</a>
        <a href="/contact.php"    class="footer-nav__link">Contact</a>
      </nav>

      <div class="footer-expertise">
        <p class="footer-nav__heading">Expertise</p>
                  <span class="footer-expertise__item">UX Strategy</span>
                  <span class="footer-expertise__item">Design Systems</span>
                  <span class="footer-expertise__item">AI-Enabled Workflows</span>
                  <span class="footer-expertise__item">Enterprise UX</span>
                  <span class="footer-expertise__item">Product Thinking</span>
                  <span class="footer-expertise__item">CRO &amp; Growth</span>
                  <span class="footer-expertise__item">UX Research</span>
                  <span class="footer-expertise__item">Design Leadership</span>
              </div>

    </div>

    <!-- CTA -->
    <div class="footer-cta">
      <p class="footer-nav__heading">Let's Connect</p>
      <p class="footer-cta__text">
        Open to senior UX leadership, product strategy, and enterprise design roles.
      </p>
      <a href="mailto:ramsmandal@icloud.com" class="footer-cta__btn">
        Send a Message ↗
      </a>
      <p class="footer-cta__location">
        📍 Gurugram, India · Available remotely
      </p>
    </div>

  </div>

  <!-- BOTTOM -->
  <div class="footer-bottom">
    <p class="footer-bottom__copy">
      © 2026 Ramesh Mandal. Built with systems thinking.
    </p>
    <p class="footer-bottom__stack">
      PHP · HTML5 · Modular CSS · Vanilla JS
    </p>
  </div>

</footer>
  </div>

  <script src="/assets/js/preloader.js"></script>
  <script src="/assets/js/background.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/app.js" defer></script>
  <script>
  /* ── READING PROGRESS ── */
  (function(){
    var bar  = document.getElementById("cs-progress");
    var main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      var h   = main.scrollHeight - window.innerHeight;
      var pct = Math.min(100, (window.scrollY / h) * 100);
      bar.style.width = pct + "%";
    }, { passive: true });
  })();
  /* ── ACTIVE NAV ── */
  (function(){
    var navItems = document.querySelectorAll(".cs-nav__item[data-nav]");
    var sections = document.querySelectorAll(".cs-section[id]");
    if (!navItems.length) return;
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          navItems.forEach(function(n){ n.classList.remove("is-active"); });
          var a = document.querySelector('.cs-nav__item[data-nav="'+e.target.id+'"]');
          if (a) a.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    sections.forEach(function(s){ obs.observe(s); });
  })();
  /* ── ANIMATE SCORE BARS ── */
  (function(){
    var bars = document.querySelectorAll(".audit-scorecard__bar");
    if (!bars.length) return;
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          e.target.style.transition = "width 0.8s cubic-bezier(0.16,1,0.3,1)";
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.5 });
    bars.forEach(function(b){
      var fw = b.style.width;
      b.style.width = "0%";
      obs.observe(b);
      setTimeout(function(){ b.style.width = fw; }, 200);
    });
  })();
  </script>

  <script src="/assets/js/navigation.js" defer></script>
</body>
</html>