<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="A heuristic audit of Zomato&#039;s checkout flow — 7 friction points mapped, psychology principles violated, and concrete redesign suggestions."/>
  <title>Zomato Checkout UX Audit — Ramesh Mandal</title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/audit/zomato-checkout.php"/>
  <meta property="og:title"        content="Zomato Checkout UX Audit"/>
  <meta property="og:description"  content="7 friction points. UX score 61/100. India's most-used food app loses money at checkout."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="Zomato Checkout UX Audit"/>
  <meta name="twitter:description" content="7 friction points. UX score 61/100. India's most-used food app loses money at checkout."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/audit/zomato-checkout.php"/>

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
        <span class="preloader__name-text">Zomato Checkout</span>
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
          src="https://images.unsplash.com/photo-1565299507177-b0ac66763828?q=80&w=2400&auto=format&fit=crop"
          alt="Food delivery representing the Zomato checkout audit"
          loading="eager"
        />
        <div class="audit-detail-hero__overlay"></div>
        <div class="audit-detail-hero__content">
          <p class="audit-detail-hero__category">FOOD DELIVERY · UX AUDIT</p>
          <h1 class="audit-detail-hero__title">Zomato<br>Checkout Flow</h1>
          <p class="audit-detail-hero__tagline">
            India's most-used food app has a checkout that loses money every hour.
          </p>
          <!-- SCORE RING -->
          <div class="audit-score-ring" aria-label="UX Score 61 out of 100">
            <svg viewBox="0 0 120 120" class="audit-score-ring__svg" aria-hidden="true">
              <circle cx="60" cy="60" r="50" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="8"/>
              <circle
                cx="60" cy="60" r="50"
                fill="none"
                stroke="#f59e0b"
                stroke-width="8"
                stroke-linecap="round"
                stroke-dasharray="192 314"
                transform="rotate(-90 60 60)"
              />
            </svg>
            <div class="audit-score-ring__inner">
              <span class="audit-score-ring__value">61</span>
              <span class="audit-score-ring__label">UX Score</span>
            </div>
          </div>
        </div>
      </div>

      <!-- META BAR -->
      <div class="cs-meta-bar">
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Product</span>
          <span class="cs-meta-item__value">Zomato</span>
        </div>
        <div class="cs-meta-item">
          <span class="cs-meta-item__label">Scope</span>
          <span class="cs-meta-item__value">Checkout Flow</span>
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
          <span class="cs-meta-item__value">7 Identified</span>
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
            <h2 class="cs-section__title">Why Zomato's checkout matters</h2>
            <div class="cs-section__body">
              <p>Zomato processes millions of orders daily across India. Their checkout is the final — and most financially critical — step in every transaction. A 5% improvement in checkout conversion at Zomato's scale would translate to tens of thousands of additional orders per day.</p>
              <p>This audit covers the mobile checkout flow from cart review to order confirmation — approximately 4 screens that determine whether a user completes their purchase or abandons. I audited the Android app (v17.x) across 3 devices in November 2024, using Nielsen's 10 usability heuristics as the primary framework.</p>
              <p><strong>Disclaimer:</strong> This is an independent audit. I have no affiliation with Zomato. All observations are based on publicly available app behaviour. The goal is constructive critique, not brand criticism.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">61/100</div>
                <div class="cs-metric-card__label">Overall UX score across 10 heuristics</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">7</div>
                <div class="cs-metric-card__label">Distinct friction points identified in the flow</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">4</div>
                <div class="cs-metric-card__label">Critical issues requiring immediate attention</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">3</div>
                <div class="cs-metric-card__label">Psychology principles being violated</div>
              </div>
            </div>
          </section>

          <!-- HEURISTIC SCORECARD -->
          <section class="cs-section" id="heuristics">
            <span class="cs-section__label">02 — Heuristic Scorecard</span>
            <h2 class="cs-section__title">10 heuristics. One honest score.</h2>
            <div class="cs-section__body">
              <p>Each heuristic scored 1–10. Scores below 5 indicate significant usability issues that likely impact conversion. Scores of 4 or below are critical.</p>
            </div>
            <div class="audit-scorecard">
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H1</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Visibility of System Status</span>
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
                    <p class="audit-scorecard__note">Order status is clear post-checkout but payment state feedback during processing is poor.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H2</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Match Between System &amp; Real World</span>
                      <span class="audit-scorecard__score audit-scorecard__score--good">
                        7/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:70%;
                               background:#22c55e"
                        role="img"
                        aria-label="Score 7 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Language is mostly familiar. &#039;Pro&#039; tier naming is clear but pricing logic uses internal jargon.</p>
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
                    <p class="audit-scorecard__note">Editing order after checkout is buried. Cancellation window is unclear until it&#039;s too late.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H4</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Consistency &amp; Standards</span>
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
                    <p class="audit-scorecard__note">Button styles are inconsistent between checkout and post-order screens.</p>
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
                    <p class="audit-scorecard__note">No address confirmation before payment. No warning when ordering from a restaurant near closing time.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H6</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Recognition Over Recall</span>
                      <span class="audit-scorecard__score audit-scorecard__score--good">
                        7/10
                      </span>
                    </div>
                    <div class="audit-scorecard__bar-wrap">
                      <div
                        class="audit-scorecard__bar"
                        style="width:70%;
                               background:#22c55e"
                        role="img"
                        aria-label="Score 7 out of 10"
                      ></div>
                    </div>
                    <p class="audit-scorecard__note">Saved addresses and past orders are surfaced well. Payment methods less so.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H7</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Flexibility &amp; Efficiency of Use</span>
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
                    <p class="audit-scorecard__note">Power users have no fast-reorder shortcut from the home screen. Every repeat order requires full checkout.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H8</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Aesthetic &amp; Minimalist Design</span>
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
                    <p class="audit-scorecard__note">Checkout screen has 11 distinct UI zones competing for attention. Classic case of feature accumulation without hierarchy.</p>
                  </div>
                </div>
                              <div class="audit-scorecard__row tl-reveal">
                  <div class="audit-scorecard__id">H9</div>
                  <div class="audit-scorecard__content">
                    <div class="audit-scorecard__header">
                      <span class="audit-scorecard__label">Help Users Recognise Errors</span>
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
                    <p class="audit-scorecard__note">Payment failure messages are generic. No specific guidance on why a card failed or what to try next.</p>
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
                    <p class="audit-scorecard__note">Help is accessible but not contextual — same generic FAQ regardless of where you are in the flow.</p>
                  </div>
                </div>
                          </div>
          </section>

          <!-- FRICTION MAP -->
          <section class="cs-section" id="friction">
            <span class="cs-section__label">03 — Friction Map</span>
            <h2 class="cs-section__title">Seven points where users drop</h2>
            <div class="cs-section__body">
              <p>These are the specific moments in the checkout flow where friction is highest — ranked by estimated conversion impact.</p>
            </div>
            <div class="cs-steps">

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F1 — UPI buried below fold on payment screen <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">UPI is India's dominant payment method — used by 70%+ of digital transactions. Yet Zomato's payment screen shows credit/debit cards first, with UPI requiring a scroll. This contradicts user mental models and adds unnecessary cognitive load at the highest-anxiety moment. Estimated impact: 8–12% of payment abandonment attributable to this ordering.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F2 — No address confirmation before payment <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">The delivery address is shown at the top of checkout but cannot be edited from the payment screen — users must go back, losing their coupon application in the process. This creates a fear of commitment: users scroll back to verify address, disrupting the forward flow. A persistent address chip with inline edit would eliminate this entirely.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F3 — Coupon field resets on back navigation <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">If a user applies a coupon, then navigates back to change a cart item, the coupon is cleared on return. This is a direct loss — users who applied a discount and had it silently removed are unlikely to reapply it and more likely to abandon. State should persist across the checkout session unconditionally.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--critical">!</div>
                <div>
                  <p class="cs-step__title">F4 — Payment failure message: "Something went wrong" <span class="audit-badge audit-badge--critical">CRITICAL</span></p>
                  <p class="cs-step__desc">When a payment fails, users receive a generic error with no information about why it failed or what to try next. This is particularly damaging on UPI — where failures can happen for 6 different reasons, each requiring a different recovery action. A specific error ("UPI PIN incorrect — try again" vs "Daily UPI limit reached — use card instead") would recover a significant proportion of failed transactions.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F5 — Delivery time estimate not shown in cart <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">The delivery time estimate disappears from the restaurant listing when users enter checkout. Users have to remember it — or go back to check. Delivery time is a key variable in the purchase decision (ordering for lunch vs dinner has different tolerances). Surfacing it persistently in the checkout header would reduce back-navigation.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--warning">~</div>
                <div>
                  <p class="cs-step__title">F6 — Pro upsell interrupts the checkout flow <span class="audit-badge audit-badge--warning">MODERATE</span></p>
                  <p class="cs-step__desc">A Zomato Pro upsell modal appears between cart and payment — stopping a user mid-transaction to pitch a subscription. This is a textbook case of friction inserted at the wrong moment. Users in checkout mode have high purchase intent that should be completed, not interrupted. The upsell converts better post-order, when users have just experienced the service they're being asked to subscribe to.</p>
                </div>
              </div>

              <div class="cs-step">
                <div class="cs-step__num audit-step__num--low">·</div>
                <div>
                  <p class="cs-step__title">F7 — No fast-reorder from home screen <span class="audit-badge audit-badge--low">LOW</span></p>
                  <p class="cs-step__desc">Repeat orders are a significant portion of Zomato's transaction volume — same restaurant, same items, same address. There is no shortcut to reorder without going through the full flow. A "Reorder" shortcut on the home screen (showing last 3 orders with one-tap checkout) would materially improve repeat purchase frequency.</p>
                </div>
              </div>

            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology Breakdown</span>
            <h2 class="cs-section__title">The cognitive principles being violated</h2>
            <div class="cs-section__body">
              <p>Friction points don't exist in a vacuum — each one triggers a specific cognitive response that makes abandonment more likely. Understanding the mechanism points directly to the fix.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Peak-End Rule — the payment failure ruins the memory</p>
                  <p class="cs-step__desc">Kahneman's Peak-End Rule: people remember an experience by its most intense moment and its ending. A payment failure — confusing, unresolved, without clear recovery — becomes the peak-negative moment. Even if the order eventually succeeds, the memory of struggling with the payment persists. Better error recovery changes what users remember about the experience.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Reactance — the Pro modal creates resistance</p>
                  <p class="cs-step__desc">Psychological reactance: when people feel their freedom is threatened, they resist. A modal interrupting checkout feels coercive — the user is trying to complete a task and the product is blocking them to pitch something else. This creates negative affect toward the Pro product specifically. Users who dismiss the modal are less likely to subscribe later than those who never saw it mid-task.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Status quo bias — UPI ordering violation</p>
                  <p class="cs-step__desc">Users have established mental models for checkout — the most common payment method should be first. When the interface violates this expectation (cards before UPI), users must consciously override their learned behaviour. This increases cognitive load and error probability at the worst possible moment. Matching the interface to the majority mental model is the cheapest possible conversion improvement.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 Peak-End Rule</span>
              <span class="cs-insight">🧠 Psychological Reactance</span>
              <span class="cs-insight">🧠 Status Quo Bias</span>
              <span class="cs-insight">🧠 Loss Aversion (coupon reset)</span>
              <span class="cs-insight">🧠 Choice Overload</span>
            </div>
          </section>

          <!-- REDESIGN -->
          <section class="cs-section" id="redesign">
            <span class="cs-section__label">05 — Redesign Suggestions</span>
            <h2 class="cs-section__title">Five fixes. Prioritised by impact.</h2>
            <div class="cs-section__body">
              <p>These are not design concepts — they are specific, implementable changes ranked by estimated conversion impact vs engineering effort.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Promote UPI to the top of the payment list</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Low.</strong> Reorder the payment method list to show UPI first, followed by saved UPI IDs, then cards. This is a configuration change, not a redesign. Based on industry benchmarks, payment method ordering alone accounts for 6–10% of checkout conversion variance. Estimated implementation: 1 sprint.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Persist coupon state across session</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Medium.</strong> Store the applied coupon in session state — it should survive back-navigation, address changes, and item additions. Show a persistent "Coupon applied: SAVE100" chip throughout checkout. This is both a trust fix and a conversion fix — users who see their discount confirmed throughout are less likely to second-guess the purchase.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Specific payment failure messages</p>
                  <p class="cs-step__desc"><strong>Impact: High. Effort: Medium.</strong> Map each payment failure code to a specific, actionable message. "UPI PIN was incorrect — try again" / "Your daily UPI limit has been reached — pay with card" / "Bank server timeout — retry in 30 seconds." Recovery rate on specific error messages vs generic ones averages 40% higher in payment UX research. This requires working with the payment provider to expose error codes to the front end.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">Move Pro upsell to post-order confirmation</p>
                  <p class="cs-step__desc"><strong>Impact: Medium. Effort: Low.</strong> Remove the Pro modal from the checkout flow entirely. Replace it with a contextual banner on the order confirmation screen: "You just saved ₹0 on delivery. Pro members save ₹X every month." The user has just completed a positive action — they're in the best possible emotional state to hear about a subscription. Conversion on post-order upsells is 2–3× higher than mid-checkout interruptions.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">5</div>
                <div>
                  <p class="cs-step__title">Persistent delivery time in checkout header</p>
                  <p class="cs-step__desc"><strong>Impact: Medium. Effort: Low.</strong> Add a single line to the checkout header: "Arrives in ~35 min". This is data Zomato already has — it just needs to be carried through to the checkout view. Eliminates the back-navigation loop caused by users trying to verify delivery time before committing to payment.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- BUSINESS IMPACT -->
          <section class="cs-section" id="impact">
            <span class="cs-section__label">06 — Business Impact</span>
            <h2 class="cs-section__title">What fixing this is worth</h2>
            <div class="cs-section__body">
              <p>At Zomato's transaction volume, even small conversion improvements compound into significant revenue. These are directional estimates based on industry benchmarks — not Zomato's internal data, which I don't have access to.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">6–10%</div>
                <div class="cs-metric-card__label">Estimated checkout conversion lift from UPI ordering fix alone</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Payment failure recovery rate improvement with specific error messages</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">2–3×</div>
                <div class="cs-metric-card__label">Pro subscription conversion rate — post-order vs mid-checkout upsell</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">~4</div>
                <div class="cs-metric-card__label">Sprints to implement all 5 high-impact fixes</div>
              </div>
            </div>
            <div class="cs-section__body" style="margin-top:48px">
              <p>The most important thing about this audit is not any single fix — it's the prioritisation. Companies with Zomato's scale have significant engineering costs. The 5 changes above are ordered by impact-to-effort ratio: the UPI ordering fix and the Pro upsell relocation are configuration changes that could ship in days, not months. Starting there, then validating with A/B tests before investing in the higher-effort payment error work, is the right sequencing.</p>
            </div>

            <!-- DISCLAIMER -->
            <blockquote class="cs-callout" style="margin-top:48px">
              This is an independent audit conducted without access to Zomato's analytics, user research, or internal data. All impact estimates are based on published industry benchmarks and analogous product research. The intent is constructive — these are the same observations a senior UX leader would make in an internal review.
            </blockquote>
          </section>

        </article>
      </div>

    </main>

    <!-- NEXT / CTA -->
    <div class="art-next-wrap">
      <section class="art-next" aria-label="More audits">

        <a href="/audit/swiggy-onboarding.php" class="art-next__card">
          <span class="art-next__arrow">↗</span>
          <p class="art-next__label">NEXT AUDIT</p>
          <p class="art-next__category">UX Audit · Food Delivery</p>
          <h3 class="art-next__title">Swiggy Onboarding &amp; Home Screen</h3>
          <p class="art-next__tagline">9 friction points. Information architecture breakdown.</p>
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
  /* ── ANIMATE SCORE BARS ON SCROLL ── */
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
      var finalWidth = b.style.width;
      b.style.width = "0%";
      obs.observe(b);
      setTimeout(function(){ b.style.width = finalWidth; }, 200);
    });
  })();
  </script>

  <script src="/assets/js/navigation.js" defer></script>
</body>
</html>