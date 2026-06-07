<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="How redesigning the decision architecture — not the interface — produced a 6× uplift in Super 6E fare selection and moved NPS by 22 points across 6M monthly passengers."/>
  <title>IndiGo Booking Flow &amp; CX Transformation — Case Study</title>

  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/case-study/indigo-booking-flow"/>
  <meta property="og:title"        content="IndiGo Booking Flow & CX Transformation — Case Study"/>
  <meta property="og:description"  content="6× fare selection uplift. NPS +22 pts. 30% fewer support queries. How decision architecture — not UI polish — changed everything."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="IndiGo Booking Flow & CX Transformation — Case Study"/>
  <meta name="twitter:description" content="6× fare selection uplift. NPS +22 pts. 30% fewer support queries."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/case-study/indigo-booking-flow"/>

  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"    href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"   href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"    href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="/assets/css/preloader.css"/>
  <link rel="stylesheet" href="/assets/css/variables.css"/>
  <link rel="stylesheet" href="/assets/css/animations.css"/>
  <link rel="stylesheet" href="/assets/css/reset.css"/>
  <link rel="stylesheet" href="/assets/css/main.css"/>
  <link rel="stylesheet" href="/assets/css/navigation.css"/>
  <link rel="stylesheet" href="/assets/css/background.css"/>
  <link rel="stylesheet" href="/assets/css/footer.css"/>
  <link rel="stylesheet" href="/assets/css/article.css"/>
  <link rel="stylesheet" href="/assets/css/case-study.css"/>
</head>
<body data-header="dark">

  <div class="art-progress" id="art-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">IndiGo Booking</span>
        <span class="preloader__name-role">Case Study · Consumer Aviation</span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <div class="bg-canvas" aria-hidden="true"><div class="bg-grid"></div><div class="bg-orb-1"></div><div class="bg-orb-2"></div></div>

  
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

      <!-- ═══════════════════════════════════════
           HERO
      ════════════════════════════════════════ -->
      <div class="cs-detail-hero fade-in">
        <img
          class="cs-detail-hero__img"
          src="https://images.unsplash.com/photo-1436491865332-7a61a109cc05?q=80&w=2400&auto=format&fit=crop"
          alt="IndiGo aircraft representing the booking flow redesign"
          loading="eager"
        />
        <div class="cs-detail-hero__overlay"></div>
        <div class="cs-detail-hero__content">
          <p class="cs-detail-hero__category">CONSUMER BOOKING · CX TRANSFORMATION</p>
          <h1 class="cs-detail-hero__title">IndiGo Booking Flow<br>&amp; CX Transformation</h1>
          <p class="cs-detail-hero__tagline">How redesigning the decision architecture — not the interface — moved NPS by 22 points.</p>
        </div>
      </div>

      <!-- META BAR -->
      <div class="cs-meta-bar">
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Role</span>
            <span class="cs-meta-item__value">Sr. Manager UI/UX</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Company</span>
            <span class="cs-meta-item__value">IndiGo Airlines</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Duration</span>
            <span class="cs-meta-item__value">3 years</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Year</span>
            <span class="cs-meta-item__value">2022 – 2025</span>
          </div>
              </div>

      <!-- CONTENT SHELL -->
      <div class="cs-content">

        <!-- STICKY SECTION NAV -->
        <nav class="cs-nav" aria-label="Case study sections">
                      <a href="#overview" class="cs-nav__item" data-nav="overview">
              Overview            </a>
                      <a href="#problem" class="cs-nav__item" data-nav="problem">
              Problem            </a>
                      <a href="#research" class="cs-nav__item" data-nav="research">
              Research            </a>
                      <a href="#process" class="cs-nav__item" data-nav="process">
              Process            </a>
                      <a href="#prototype" class="cs-nav__item" data-nav="prototype">
              Prototype            </a>
                      <a href="#outcomes" class="cs-nav__item" data-nav="outcomes">
              Outcomes            </a>
                      <a href="#learnings" class="cs-nav__item" data-nav="learnings">
              Learnings            </a>
                  </nav>

        <article class="cs-article">

          <!-- ═══════════════════════════════════════
               01 — OVERVIEW
          ════════════════════════════════════════ -->
          <section class="cs-section" id="overview">
            <span class="cs-section__label">01 — Overview</span>
            <h2 class="cs-section__title">6 million passengers a month. One booking flow built for the wrong person.</h2>
            <div class="cs-section__body">
              <p>IndiGo is India's largest low-cost carrier. At the time of this project, it was running hundreds of daily sectors across a passenger base growing rapidly beyond its original metro core. The product I inherited was not broken in the conventional sense — it worked. It just worked for the wrong user.</p>
              <p>The booking flow had been designed for a digital-native frequent flyer. That segment was a minority. The majority — first-time flyers, non-tech users, travellers from tier-2 and tier-3 cities — were failing at the homepage, abandoning inside the Search Results Page, and defaulting to the cheapest fare because nothing in the design communicated why any other option was worth more.</p>
              <p>I held <strong>sole UX ownership across 10+ customer-facing applications simultaneously</strong> — booking flow, holiday marketplace, staff travel portal, loyalty programme, check-in, ancillary products, flight status — with no shared design language, no component library, and no system connecting decisions across any of them.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">+22 pts</div>
                <div class="cs-metric-card__label">NPS improvement</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">−30%</div>
                <div class="cs-metric-card__label">Support query volume</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">6×</div>
                <div class="cs-metric-card__label">Super 6E fare selection</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">2023</div>
                <div class="cs-metric-card__label">IndiGo Innovation Award</div>
              </div>
            </div>
          </section>

          <!-- ═══════════════════════════════════════
               02 — PROBLEM
          ════════════════════════════════════════ -->
          <section class="cs-section" id="problem">
            <span class="cs-section__label">02 — Problem</span>
            <h2 class="cs-section__title">The brief said "optimise the flow." Research said the flow was built for the wrong person.</h2>
            <div class="cs-section__body">
              <p>The team's hypothesis going in: a general optimisation problem. Reduce friction, tighten the UI, address support volume. The assumption underneath it — the flow works for most users, needs refinement for the rest.</p>
              <p>Research dismantled that assumption entirely.</p>

              <p><strong>Failure 1 — Homepage widget.</strong> Seven special fare categories — Armed Forces, Senior Citizen, Family &amp; Friends, Students, Minor, Doctors &amp; Nurses, LTC — displayed upfront with no progressive disclosure. Non-tech users read them as required fields. Many abandoned before entering a destination. The gate was at the entrance.</p>

              <p><strong>Failure 2 — Search Results Page.</strong> All flight options open simultaneously. For round trips, both outbound and return legs fully expanded at once. Users entered comparison loops — scrolling, re-evaluating, abandoning. The SRP was the highest drop-off point in the funnel. 62% of drop-offs happened inside this loop.</p>

              <p><strong>Failure 3 — Fare cards.</strong> Lite, Saver, Super 6E, Flexi — equal visual weight, equal card size, identical CTA. Price-sensitive users defaulted to Lite. Not because Super 6E lacked value — 15kg baggage, meal, seat selection, free date change for ~₹1,000 more than Lite is a strong case. The design made that case invisible.</p>
            </div>
            <blockquote class="cs-callout">"The booking flow wasn't confusing. It was designed for the wrong person. And no amount of copy optimisation would fix a structural modelling failure."</blockquote>
          </section>

          <!-- ═══════════════════════════════════════
               03 — RESEARCH
          ════════════════════════════════════════ -->
          <section class="cs-section" id="research">
            <span class="cs-section__label">03 — Research</span>
            <h2 class="cs-section__title">Research that changed the brief, not just the design.</h2>
            <div class="cs-section__body">
              <p>I sequenced research to answer the segment question first — before validating any design direction — because a solution built for the wrong user would compound the failure, not fix it.</p>

              <p><strong>User interviews &amp; contextual research.</strong> Metro and tier-2 travellers, first-time and frequent flyers. Key finding: non-tech users treated the 7 fare categories as required fields, abandoning before entering a destination. This was a structural misread of the UI — not a literacy problem.</p>

              <p><strong>Analytics review.</strong> Full funnel, fare selection distribution, support query categorisation. The SRP was the highest drop-off point. Super 6E consistently underperformed despite strong value positioning. The data confirmed what interviews were showing: the design was suppressing demand, not reflecting it.</p>

              <p><strong>Usability testing — 3 rounds.</strong> 8–12 participants per round, mixed digital literacy cohorts. Round 1 confirmed the comparison loop. Round 2 validated the collapse model with non-tech users. Round 3 approved the fare card hierarchy — and caught a near-mistake before it shipped.</p>

              <p><strong>Competitive benchmarking.</strong> Indian and international airline booking flows. No competitor had solved round-trip decision overload. The collapse model I was designing was a genuine departure from the industry.</p>
            </div>

            <blockquote class="cs-callout">"How do we design a booking experience for India's actual air travel demographic — not the digital-native minority who can navigate anything?"</blockquote>

            <div class="cs-section__body">
              <p><strong>The blind spot — stated honestly.</strong> Testing in early rounds was predominantly with digital-native users — easier to recruit, faster to test, cleaner feedback. This created a systematic gap: some flows that validated well internally failed in the field for tier-2 and non-tech users. We caught it mid-project. The cohort should have been stratified by digital literacy from round one — not added as a corrective measure.</p>
            </div>
          </section>

          <!-- ═══════════════════════════════════════
               04 — PROCESS
          ════════════════════════════════════════ -->
          <section class="cs-section" id="process">
            <span class="cs-section__label">04 — Process</span>
            <h2 class="cs-section__title">Three decisions. One compounding architecture.</h2>
            <div class="cs-section__body">

              <p><strong>Design principle: one decision at a time.</strong> Users fail not because they can't decide — but because we ask them to decide too many things simultaneously. Every screen was redesigned to present exactly one decision and remove everything competing with it.</p>

              <!-- DECISION 1 -->
              <h3>Decision 1 — Homepage: progressive disclosure of special fares</h3>
              <p><strong>Context:</strong> 7 fare categories displayed upfront, no progressive disclosure. Non-tech users treating them as required form fields, abandoning before entering a destination.</p>
              <p><strong>Options considered:</strong> Keep all 7 visible. Remove special fares entirely and surface in a later step. Collapse to a single 'Special Fares' dropdown, expand only if selected.</p>
              <p><strong>Chosen:</strong> Progressive disclosure dropdown. Frequent flyers retain one-tap access. Non-tech users stop encountering what reads as a 7-field gate before they've entered a single journey detail. The inline search bar that replaced the card widget became the founding component of the new design system — one UX decision became infrastructure.</p>

              <!-- DECISION 2 -->
              <h3>Decision 2 — SRP: journey-wise collapse model</h3>
              <p><strong>Context:</strong> All options open simultaneously. 62% of drop-offs inside the comparison loop. SRP was the highest-drop-off point in the entire funnel.</p>
              <p><strong>Options considered:</strong> Highlight selected row, keep all open. Grey out unselected options. Full collapse — selected flight becomes locked compact card, others disappear, 'Change flight' CTA as escape hatch. Paginate one flight at a time.</p>
              <p><strong>Chosen:</strong> Full collapse on selection. For round trips: return leg appears only after outbound is locked. After both legs selected, a summary card shows both flights — clearly labelled, priced, no competing options — as the trust moment before payment. Data showed fewer than 8% of users meaningfully compared options after an initial selection. The collapse eliminates the loop for the 92%.</p>
              <p><strong>Trade-off:</strong> Users who wanted simultaneous comparison lost that ability. The data showed this was the minority whose behaviour was causing the majority to fail. The C-Suite sign-off happened in a single session — I presented the data, the prototype, and the trade-off explicitly. Approved on my recommendation alone.</p>

              <!-- DECISION 3 -->
              <h3>Decision 3 — Fare cards: value hierarchy</h3>
              <p><strong>Context:</strong> Lite, Saver, Super 6E, Flexi — undifferentiated list, equal weight, identical CTA. Price-sensitive users defaulted to Lite. Super 6E value was real and invisible simultaneously.</p>
              <p><strong>Options considered:</strong> Add descriptive copy to each card. Colour coding to differentiate tiers. Featured card treatment — visual prominence, full perk breakdown, primary CTA, 'Best value' badge. Default-select Super 6E and let users downgrade.</p>
              <p><strong>Chosen:</strong> Featured card hierarchy. Value visible before price. Option D — default-select — was tested in Round 3 and pulled before build. Users who noticed the pre-selection felt manipulated. Trust dropped measurably. The featured card without a default produced a comparable selection rate with none of the trust cost.</p>

            </div>
          </section>

          <!-- ═══════════════════════════════════════
               05 — PROTOTYPE & VALIDATION
          ════════════════════════════════════════ -->
          <section class="cs-section" id="prototype">
            <span class="cs-section__label">05 — Prototype &amp; Validation</span>
            <h2 class="cs-section__title">Three rounds. One near-mistake. A lot of watching data refresh.</h2>
            <div class="cs-section__body">
              <p><strong>Round 1 — Lo-fi, frequent flyers.</strong> Collapse model validated for speed. Comparison loop behaviour confirmed in the control condition. Blind spot identified: non-tech users were not yet in the cohort.</p>

              <p><strong>Round 2 — Mid-fi, corrected cohort.</strong> Non-tech and tier-2 users added. Confusion reduction validated. The round-trip summary card — entirely absent in the old flow — was cited as the "first moment of confidence" in the booking journey. Round-trip model validated end-to-end.</p>

              <p><strong>Round 3 — Hi-fi, mixed cohort.</strong> Super 6E selection rate measurably up with featured treatment. Default-selection version tested alongside — trust drop observed immediately. Pulled before build. Final prototype approved for engineering handoff.</p>

              <p><strong>What nearly shipped and was caught.</strong> A version with Super 6E pre-selected. The selection data looked strong in isolation. In the room, the first thing participants said when they noticed the default was "why was this already selected?" Trust dropped. Featured treatment without a default produced comparable selection with no trust cost. Pulled. No debate.</p>
            </div>
          </section>

          <!-- ═══════════════════════════════════════
               06 — OUTCOMES
          ════════════════════════════════════════ -->
          <section class="cs-section" id="outcomes">
            <span class="cs-section__label">06 — Outcomes</span>
            <h2 class="cs-section__title">6× by day four. The data locked and it stayed there.</h2>
            <div class="cs-section__body">
              <p>The SRP collapse model and fare card hierarchy went live the same day. By midnight, Super 6E selection had doubled — 2× the baseline. I stayed with the analytics team for three consecutive days watching engagement data refresh in real time. The team called it at 2× on day one. I wanted to see where it locked before declaring anything.</p>
              <p>By day four, it locked at 6×.</p>
              <p><strong>The compounding architecture.</strong> The 6× result was not produced by either decision alone. The SRP collapse retained users who would have abandoned in the comparison loop. The fare card hierarchy redirected those retained users toward Super 6E once they reached fare selection. Neither screen alone produces 6×. The architecture of the two together did.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">+22 pts</div>
                <div class="cs-metric-card__label">NPS — detractor to promoter majority</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">−30%</div>
                <div class="cs-metric-card__label">Support query volume</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">6×</div>
                <div class="cs-metric-card__label">Super 6E selection vs. baseline</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">10+</div>
                <div class="cs-metric-card__label">Apps unified under one design system</div>
              </div>
            </div>
            <div class="cs-section__body">
              <p><strong>Secondary impact.</strong> The design system became the shared language across all 10 applications — reducing design-to-dev friction on every subsequent product decision at IndiGo. Research findings on tier-2 user failure changed how the product team recruited test participants in all subsequent projects: from convenience sampling to cohort-stratified recruitment. The SRP collapse model set the precedent for how IndiGo approached all major interaction changes: prototype-first, data-supported, single accountable decision-maker.</p>
            </div>
          </section>

          <!-- ═══════════════════════════════════════
               07 — LEARNINGS
          ════════════════════════════════════════ -->
          <section class="cs-section" id="learnings">
            <span class="cs-section__label">07 — Learnings</span>
            <h2 class="cs-section__title">What I'd do differently. Honest, not safe.</h2>
            <div class="cs-section__body">
              <p><strong>Stratify the research cohort from round one.</strong> I over-indexed on digital-native users in early testing — easier to recruit, faster sessions, cleaner feedback. The tier-2 and non-tech users who needed the most from this redesign were the last to be tested. We caught it. It should have been designed in from the start.</p>

              <p><strong>Instrument before touching a single screen.</strong> The analytics review gave us funnel drop-off magnitude — but not segment-level breakdown, not time-on-task, not session replay by city tier. When the 6× result came in, I could show the after. I could not show the before in the same dimension. I now treat instrumentation as a design deliverable, not an engineering afterthought.</p>

              <p><strong>The design system cost was underestimated.</strong> Building it in parallel with live product work — under timeline pressure — meant some early components had to be retrofitted. I underestimated that cost and how much faster everything moved in the 18 months after the system stabilised. The system should have been the first sprint, not a concurrent one.</p>

              <p><strong>What I carried forward.</strong> After this project, I never ship without instrumentation in place first. The analytics setup, event taxonomy, and cohort segmentation plan are part of the design work. Sole accountability at scale means the data is either yours to own or yours to regret not having.</p>
            </div>
          </section>

        </article>
      </div>

      <!-- NEXT / PREV CASE STUDIES -->
      <div class="art-next-wrap">
        <div class="art-next">
          <a href="crewpal.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">NEXT CASE STUDY</p>
            <p class="art-next__category">ENTERPRISE OPERATIONS</p>
            <h3 class="art-next__title">CrewPal Operations Platform</h3>
            <p class="art-next__tagline">25% satisfaction lift. 18% fewer scheduling errors. 8,000+ crew.</p>
          </a>
          <a href="design-system.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">ALSO READ</p>
            <p class="art-next__category">DESIGN INFRASTRUCTURE</p>
            <h3 class="art-next__title">Enterprise Design System</h3>
            <p class="art-next__tagline">One system. Ten products. 40% faster delivery.</p>
          </a>
        </div>
      </div>

      <!-- MOBILE FAB TOC -->
      <div class="art-fab-backdrop" id="fabBackdrop" aria-hidden="true"></div>
      <button class="art-fab" id="fabBtn" aria-label="Table of contents" aria-expanded="false" aria-controls="fabDrawer">
        <span class="art-fab__icon" aria-hidden="true">
          <span></span><span></span><span></span>
        </span>
      </button>
      <div class="art-fab-drawer" id="fabDrawer" role="dialog" aria-label="Table of contents" aria-modal="true">
        <div class="art-fab-drawer__handle"></div>
        <div class="art-fab-drawer__header">
          <span class="art-fab-drawer__title">In this case study</span>
        </div>
        <nav class="art-fab-drawer__nav">
                      <a href="#overview" class="art-fab-drawer__item" data-fab-toc="overview">
              <span class="art-fab-drawer__num">01</span>
              Overview            </a>
                      <a href="#problem" class="art-fab-drawer__item" data-fab-toc="problem">
              <span class="art-fab-drawer__num">02</span>
              Problem            </a>
                      <a href="#research" class="art-fab-drawer__item" data-fab-toc="research">
              <span class="art-fab-drawer__num">03</span>
              Research            </a>
                      <a href="#process" class="art-fab-drawer__item" data-fab-toc="process">
              <span class="art-fab-drawer__num">04</span>
              Process            </a>
                      <a href="#prototype" class="art-fab-drawer__item" data-fab-toc="prototype">
              <span class="art-fab-drawer__num">05</span>
              Prototype            </a>
                      <a href="#outcomes" class="art-fab-drawer__item" data-fab-toc="outcomes">
              <span class="art-fab-drawer__num">06</span>
              Outcomes            </a>
                      <a href="#learnings" class="art-fab-drawer__item" data-fab-toc="learnings">
              <span class="art-fab-drawer__num">07</span>
              Learnings            </a>
                  </nav>
      </div>

    </main>

    <!-- CROSS-CONTENT LINKS -->
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
  gap: 1px;
  /* background: var(--border, rgba(0,0,0,.07)); */
  /* border: 1px solid var(--border, rgba(0,0,0,.07)); */
  /* border-radius: var(--radius-md, 16px); */
  overflow: hidden;
  gap: 16px;
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
.rc-col__items {display: flex;flex-direction: column;/* padding: 8px; */gap: 16px;}
.rc-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px;
  /* border-radius: 10px; */
  text-decoration: none;
  /* background: var(--bg, #f5f5f3); */
  /* border: 1px solid var(--border, rgba(0,0,0,.07)); */
  transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}
.rc-item:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 16px rgba(0,0,0,0.08);
  border-color: rgba(26,70,201,.2);
  border-radius: 12px;
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
.rc-item__browse:hover { border-color: rgba(26,70,201,.3); background: rgba(26,70,201,.04); }

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
      <p class="rc-col__label"><span>◎</span> UX Audits</p>
      <div class="rc-col__items">
        <a href="/audit/zomato-checkout" class="rc-item">
          <img src="https://images.unsplash.com/photo-1565299507177-b0ac66763828?q=80&amp;w=1600&amp;auto=format&amp;fit=crop"
               alt="Zomato"
               class="rc-item__thumb" loading="lazy" width="56" height="36"/>
          <div class="rc-item__body">
            <p class="rc-item__tag">FOOD DELIVERY</p>
            <p class="rc-item__title">Zomato Checkout Flow</p>
            <p class="rc-item__meta">Score 61/100 · 7 friction points</p>
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

</footer>  </div>

  <script src="/assets/js/preloader.js"></script>
  <script src="/assets/js/background.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/app.js" defer></script>

  <!-- READING PROGRESS -->
  <script>
  (function(){
    var bar  = document.getElementById("art-progress");
    var main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      bar.style.width = Math.min(100, (window.scrollY / (main.scrollHeight - window.innerHeight)) * 100) + "%";
    }, { passive: true });
  })();
  </script>

  <!-- STICKY SECTION NAV — active state -->
  <script>
  (function(){
    var items = document.querySelectorAll(".cs-nav__item[data-nav]");
    var secs  = document.querySelectorAll(".cs-section[id]");
    if (!items.length) return;
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if (entry.isIntersecting){
          items.forEach(function(n){ n.classList.remove("is-active"); });
          var active = document.querySelector('.cs-nav__item[data-nav="' + entry.target.id + '"]');
          if (active) active.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    secs.forEach(function(s){ obs.observe(s); });
  })();
  </script>

  <!-- MOBILE FAB — scroll hide/show + drawer -->
  <script>
  (function(){
    var fab      = document.getElementById("fabBtn");
    var drawer   = document.getElementById("fabDrawer");
    var backdrop = document.getElementById("fabBackdrop");
    if (!fab || !drawer) return;

    function openDrawer(){
      fab.classList.add("is-open");
      fab.setAttribute("aria-expanded", "true");
      backdrop.classList.add("is-open");
      requestAnimationFrame(function(){
        drawer.classList.add("is-open");
        backdrop.classList.add("is-visible");
      });
      document.body.style.overflow = "hidden";
    }
    function closeDrawer(){
      fab.classList.remove("is-open");
      fab.setAttribute("aria-expanded", "false");
      drawer.classList.remove("is-open");
      backdrop.classList.remove("is-visible");
      setTimeout(function(){ backdrop.classList.remove("is-open"); }, 240);
      document.body.style.overflow = "";
    }

    fab.addEventListener("click", function(){ fab.classList.contains("is-open") ? closeDrawer() : openDrawer(); });
    backdrop.addEventListener("click", closeDrawer);
    document.addEventListener("keydown", function(e){ if (e.key === "Escape") closeDrawer(); });
    drawer.querySelectorAll(".art-fab-drawer__item").forEach(function(l){
      l.addEventListener("click", function(){ closeDrawer(); });
    });

    var lastY = 0, timer = null;
    function checkVis(){
      var y  = window.scrollY;
      var h  = window.innerHeight;
      var dh = document.documentElement.scrollHeight;
      if ((y + h) > (dh - 200)) { fab.classList.add("is-hidden"); return; }
      if (y > lastY + 4)        { fab.classList.add("is-hidden"); }
      else if (y < lastY - 4)   { fab.classList.remove("is-hidden"); }
      lastY = y;
      clearTimeout(timer);
      timer = setTimeout(function(){ fab.classList.remove("is-hidden"); }, 800);
    }
    window.addEventListener("scroll", checkVis, { passive: true });

    var fi = drawer.querySelectorAll(".art-fab-drawer__item[data-fab-toc]");
    if (fi.length){
      var o = new IntersectionObserver(function(en){
        en.forEach(function(e){
          if (!e.isIntersecting) return;
          fi.forEach(function(n){ n.classList.remove("is-active"); });
          var a = drawer.querySelector('.art-fab-drawer__item[data-fab-toc="' + e.target.id + '"]');
          if (a) a.classList.add("is-active");
        });
      }, { rootMargin: "-15% 0px -70% 0px" });
      document.querySelectorAll("[id]").forEach(function(el){ o.observe(el); });
    }
  })();
  </script>

  <script src="/assets/js/navigation.js" defer></script>

</body>
</html>