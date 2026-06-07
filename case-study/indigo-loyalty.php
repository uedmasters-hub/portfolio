<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="How I designed a gamified loyalty POC for IndiGo, validated through 500+ user tests, that boosted retention by 40% and shaped the product roadmap."/>
  <title>IndiGo Gamified Loyalty Program — Case Study</title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/case-study/indigo-loyalty.php"/>
  <meta property="og:title"        content="IndiGo Gamified Loyalty — Case Study"/>
  <meta property="og:description"  content="Turning passive flyers into engaged members. 40% retention lift, 500+ user tests."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="IndiGo Gamified Loyalty — Case Study"/>
  <meta name="twitter:description" content="Turning passive flyers into engaged members. 40% retention lift, 500+ user tests."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/case-study/indigo-loyalty.php"/>

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
  <link rel="stylesheet" href="/assets/css/article.css"/>
  <link rel="stylesheet" href="/assets/css/case-study.css"/>
</head>
<body data-header="dark">

  <!-- READING PROGRESS -->
  <div class="art-progress" id="art-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">IndiGo Loyalty</span>
        <span class="preloader__name-role">Case Study · Gamification & Retention</span>
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

      <!-- HERO IMAGE -->
      <div class="cs-detail-hero fade-in">
        <img
          class="cs-detail-hero__img"
          src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2400&auto=format&fit=crop"
          alt="Loyalty and rewards visual representing the IndiGo gamified loyalty program"
          loading="eager"
        />
        <div class="cs-detail-hero__overlay"></div>
        <div class="cs-detail-hero__content">
          <p class="cs-detail-hero__category">LOYALTY & RETENTION DESIGN</p>
          <h1 class="cs-detail-hero__title">IndiGo Gamified<br>Loyalty Program</h1>
          <p class="cs-detail-hero__tagline">
            Turning passive flyers into engaged members — validated through 500+ user tests.
          </p>
        </div>
      </div>

      <!-- META BAR -->
      <div class="cs-meta-bar">
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Role</span>
            <span class="cs-meta-item__value">Manager UI/UX</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Company</span>
            <span class="cs-meta-item__value">IndiGo Airlines</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Duration</span>
            <span class="cs-meta-item__value">8 months</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Year</span>
            <span class="cs-meta-item__value">2020 – 2021</span>
          </div>
              </div>

      <!-- CONTENT -->
      <div class="cs-content">

        <!-- STICKY NAV -->
        <nav class="cs-nav" aria-label="Case study sections">
                      <a href="#overview" class="cs-nav__item" data-nav="overview">
              Overview            </a>
                      <a href="#problem" class="cs-nav__item" data-nav="problem">
              Problem            </a>
                      <a href="#research" class="cs-nav__item" data-nav="research">
              Research            </a>
                      <a href="#psychology" class="cs-nav__item" data-nav="psychology">
              Psychology            </a>
                      <a href="#process" class="cs-nav__item" data-nav="process">
              Process            </a>
                      <a href="#solution" class="cs-nav__item" data-nav="solution">
              Solution            </a>
                      <a href="#outcomes" class="cs-nav__item" data-nav="outcomes">
              Outcomes            </a>
                      <a href="#learnings" class="cs-nav__item" data-nav="learnings">
              Learnings            </a>
                  </nav>

        <!-- ARTICLE -->
        <article class="cs-article">

          <!-- OVERVIEW -->
          <section class="cs-section" id="overview">
            <span class="cs-section__label">01 — Overview</span>
            <h2 class="cs-section__title">IndiGo had loyal passengers. Not loyal members.</h2>
            <div class="cs-section__body">
              <p>IndiGo carried more passengers than any airline in India. Yet when travellers were asked if they felt any loyalty to the brand, the answers were almost uniformly transactional: "I book whoever is cheapest." Repeat booking rates were driven by price, not relationship.</p>
              <p>The product team identified this as a strategic risk: if a competitor undercut IndiGo on price — even temporarily — there was nothing holding customers. I was tasked with designing a loyalty POC (proof of concept) that would test whether gamification could shift passive price-driven behaviour into active brand engagement.</p>
              <p>This was not a brief to redesign an existing loyalty programme. IndiGo had BluChip miles. This was a brief to answer a harder question: <em>can we make flying with IndiGo feel rewarding in a way that has nothing to do with miles?</em></p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Retention lift in POC user group vs control</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">500+</div>
                <div class="cs-metric-card__label">Users tested across 6 research rounds</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">78%</div>
                <div class="cs-metric-card__label">Task completion on first attempt (usability)</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">4.6/5</div>
                <div class="cs-metric-card__label">Average desirability score across segments</div>
              </div>
            </div>
          </section>

          <!-- PROBLEM -->
          <section class="cs-section" id="problem">
            <span class="cs-section__label">02 — Problem</span>
            <h2 class="cs-section__title">Miles aren't motivating. Status isn't either.</h2>
            <div class="cs-section__body">
              <p>Before designing anything, I needed to understand why the existing BluChip miles programme wasn't creating loyalty. The answer was uncomfortable: it was too abstract, too slow, and too cold.</p>
              <p>Through exit interviews and funnel analysis, three structural problems emerged:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Reward horizon too distant</p>
                  <p class="cs-step__desc">Average time to meaningful redemption was 14 months. Users accrued miles, forgot about them, and felt no emotional connection to the programme. "I have some miles somewhere, I think."</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Zero feedback between flights</p>
                  <p class="cs-step__desc">The loyalty touchpoint only existed at booking. Between flights — the 6-week gap between trips for the average IndiGo business traveller — there was no engagement, no reminder of membership, no relationship.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Status tiers felt arbitrary</p>
                  <p class="cs-step__desc">The tier system (Silver, Gold, Platinum) had no visible progress mechanism. Users didn't know how close they were to the next tier, what behaviours would get them there, or what they'd gain. The programme asked for loyalty without giving visibility.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">No personalisation whatsoever</p>
                  <p class="cs-step__desc">A family of four on holiday and a solo business consultant flying weekly received identical communications, identical offers, identical experiences. The programme treated all members as the same person.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- RESEARCH -->
          <section class="cs-section" id="research">
            <span class="cs-section__label">03 — Research</span>
            <h2 class="cs-section__title">What actually makes people come back?</h2>
            <div class="cs-section__body">
              <p>I ran a 6-week research programme structured in two phases: understanding the problem space, then testing early concepts.</p>
              <p><strong>Phase 1 — Discovery (Weeks 1–3):</strong> 60 qualitative interviews with IndiGo frequent flyers (4+ flights per year). I recruited across four segments: solo business travellers, leisure couples, family groups, and occasional travellers. Each session was 45 minutes — 20 on current loyalty behaviour, 25 on competitive programmes and motivations.</p>
              <p><strong>Key insight from interviews:</strong> Participants didn't talk about miles. They talked about moments. Being remembered. Getting an unexpected upgrade. Seeing their name on the boarding gate. Small signals that said <em>you matter to us</em>. The research pointed away from transactional loyalty (earn-burn) toward experiential loyalty (recognition, progress, surprise).</p>
              <p><strong>Phase 2 — Concept testing (Weeks 4–6):</strong> I developed 4 concept directions as low-fidelity prototypes and tested each with 30 participants — 120 tests total. Concepts ranged from a gamified badge system to a travel personality profile to a streak-based engagement model.</p>
            </div>
            <blockquote class="cs-callout">
              "The Starbucks app makes me buy coffee I don't need just to keep my streak. I want that for flying — but airlines never feel that fun."<br>
              <small>— Interview participant, 26-year-old consultant, Gurugram</small>
            </blockquote>
            <div class="cs-section__body">
              <p>This quote came up in 11 different interviews — nearly verbatim. It confirmed the design direction: <strong>streaks, progress visibility, and micro-rewards</strong> were the right mechanism. Miles were not.</p>
            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology</span>
            <h2 class="cs-section__title">The behavioural science behind the design</h2>
            <div class="cs-section__body">
              <p>Gamification without behavioural grounding is just decoration. I structured the entire loyalty experience around three proven psychological mechanisms:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Variable reward schedules (Skinner)</p>
                  <p class="cs-step__desc">Predictable rewards train habit. Unpredictable rewards create compulsion. The programme introduced "surprise miles" — random bonus rewards after specific flights — to trigger the dopamine loop without requiring constant high-value redemptions.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Goal gradient effect</p>
                  <p class="cs-step__desc">People accelerate effort as they get closer to a goal. The tier progress bar was designed to always show the user within reach of something — never more than 2 flights away from a visible milestone. This required restructuring the tier thresholds.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Endowed progress effect</p>
                  <p class="cs-step__desc">People who start with artificial progress (e.g., a loyalty card with 2 of 10 stamps pre-filled) complete the goal faster than those who start from zero. New members were onboarded with a "welcome bonus" that immediately showed them partway to their first reward.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 Variable Reward Loops</span>
              <span class="cs-insight">🧠 Goal Gradient Effect</span>
              <span class="cs-insight">🧠 Endowed Progress</span>
              <span class="cs-insight">🧠 Social Proof</span>
              <span class="cs-insight">🧠 Loss Aversion (Streak Protection)</span>
            </div>
          </section>

          <!-- PROCESS -->
          <section class="cs-section" id="process">
            <span class="cs-section__label">05 — Process</span>
            <h2 class="cs-section__title">From concept to 500-user validation</h2>
            <div class="cs-section__body">
              <p>This was a POC project — meaning the brief was to validate, not ship. The process was structured as a high-velocity design research loop: concept → prototype → test → refine → repeat.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Phase 1 — Concept Definition (Months 1–2)</p>
                  <p class="cs-step__desc">4 concept directions developed and tested with 120 participants. Winning concept: a "Travel Identity" system combining streak tracking, personalised travel badges, and progress-based tier advancement. The other 3 concepts were retired.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Phase 2 — Prototype Refinement (Months 3–5)</p>
                  <p class="cs-step__desc">6 rounds of usability testing on increasingly high-fidelity prototypes. Tested the onboarding flow, progress dashboard, badge unlock animations, and streak mechanic. Iterated on the visual language — the first version felt too "game-like" and lost credibility with business travellers.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Phase 3 — Segment Testing (Months 6–8)</p>
                  <p class="cs-step__desc">Full prototype tested with 260 participants across all four segments. Measured: task completion, desirability (5-point scale), stated likelihood to increase flying frequency, and qualitative response to the gamification mechanic. Results fed directly into the product roadmap.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- SOLUTION -->
          <section class="cs-section" id="solution">
            <span class="cs-section__label">06 — Solution</span>
            <h2 class="cs-section__title">A loyalty system built on identity, not transactions</h2>
            <div class="cs-section__body">
              <p>The final POC centred on three interlocking design systems:</p>
              <p><strong>1. Travel Identity Badges.</strong> A set of 32 badges earned by flying behaviours — not just frequency. "Early Riser" (3+ early morning flights), "Weekend Explorer" (weekend leisure routes), "Business Class Graduate" (first upgrade). Badges were shareable and created social identity signals. 74% of test participants said they'd share their badge on social media.</p>
              <p><strong>2. Living Progress Dashboard.</strong> A home screen widget showing the user's streak (consecutive months with at least one flight), tier progress bar always within 2 flights of the next milestone, and the next badge within reach. The dashboard was designed to create a reason to open the app between flights — not just at booking.</p>
              <p><strong>3. Streak Protection Mechanic.</strong> If a user missed a flight month, they could "protect" their streak once per year using accumulated bonus miles. This turned the streak from a rigid punishment mechanism into a relationship — the programme understood life happened, and gave members a safety net. Streak protection was the single most positively received feature in testing.</p>
            </div>
            <blockquote class="cs-callout">
              The streak protection feature generated the highest emotional response of any element we tested. Participants who saw it described the programme as "understanding" and "fair" — words no airline loyalty programme had earned before.
            </blockquote>
          </section>

          <!-- OUTCOMES -->
          <section class="cs-section" id="outcomes">
            <span class="cs-section__label">07 — Outcomes</span>
            <h2 class="cs-section__title">Validated, documented, and shipped into the roadmap</h2>
            <div class="cs-section__body">
              <p>The POC was never meant to ship as a product — it was designed to answer whether gamified loyalty could move the needle on retention before committing engineering investment. It answered definitively: yes.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Stated likelihood to increase flying frequency in POC group vs control</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">78%</div>
                <div class="cs-metric-card__label">Task completion rate on first attempt across all tested flows</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">4.6/5</div>
                <div class="cs-metric-card__label">Average desirability score — highest across all IndiGo UX research to date</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">74%</div>
                <div class="cs-metric-card__label">Participants who said they'd share their Travel Identity badge socially</div>
              </div>
            </div>
            <div class="cs-section__body" style="margin-top:48px">
              <p>The research findings were presented to the CPO and product leadership team. The POC directly informed the IndiGo loyalty product roadmap for 2022–2023, with the badge system and living dashboard entering the engineering backlog as P1 initiatives.</p>
            </div>
          </section>

          <!-- LEARNINGS -->
          <section class="cs-section" id="learnings">
            <span class="cs-section__label">08 — Learnings</span>
            <h2 class="cs-section__title">What this project taught me about designing for behaviour</h2>
            <div class="cs-section__body">
              <p><strong>POCs are the most honest design work.</strong> There's no ship pressure, no sprint deadline forcing compromise. You can follow the research wherever it leads. I learned more about IndiGo's users in 8 months of POC work than in years of iterative product work.</p>
              <p><strong>Gamification has a credibility ceiling.</strong> The first version of the badge system used bright colours and game-like animations that tested brilliantly with leisure travellers and terribly with business travellers. The redesign toned the visual language down significantly — premium, understated, more Duolingo than Candy Crush. The lesson: the mechanic can be playful; the aesthetic must match your audience's identity.</p>
              <p><strong>The most powerful loyalty signal is being understood.</strong> The streak protection feature — which I almost cut for being too complex — generated the strongest emotional response of the entire prototype. Users didn't want more points. They wanted the programme to understand that life happens. Design for the exception, not just the rule.</p>
              <p><strong>Research at scale changes what you design.</strong> 500 participants across 6 rounds is more than most UX projects run in a year. The volume revealed patterns that 20-person studies would have missed — specifically, that the badge mechanic resonated completely differently across segments. Without that depth, we'd have shipped for one segment and confused the others.</p>
            </div>
          </section>

        </article>

      </div>

      <!-- NEXT CASE STUDIES -->
            <div class="art-next-wrap">
        <div class="art-next">
          <a href="indigo-booking.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">PREVIOUS CASE STUDY</p>
            <p class="art-next__category">AIRLINE COMMERCE</p>
            <h3 class="art-next__title">IndiGo Booking Ecosystem</h3>
            <p class="art-next__tagline">Redesigning a 50M-user booking flow.</p>
          </a>
          <a href="indigo-holidays.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">NEXT CASE STUDY</p>
            <p class="art-next__category">MARKETPLACE</p>
            <h3 class="art-next__title">IndiGo Holidays Marketplace</h3>
            <p class="art-next__tagline">22% ancillary revenue growth.</p>
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
          <span class="art-fab-drawer__title">In this note</span>
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
                      <a href="#psychology" class="art-fab-drawer__item" data-fab-toc="psychology">
              <span class="art-fab-drawer__num">04</span>
              Psychology            </a>
                      <a href="#process" class="art-fab-drawer__item" data-fab-toc="process">
              <span class="art-fab-drawer__num">05</span>
              Process            </a>
                      <a href="#solution" class="art-fab-drawer__item" data-fab-toc="solution">
              <span class="art-fab-drawer__num">06</span>
              Solution            </a>
                      <a href="#outcomes" class="art-fab-drawer__item" data-fab-toc="outcomes">
              <span class="art-fab-drawer__num">07</span>
              Outcomes            </a>
                      <a href="#learnings" class="art-fab-drawer__item" data-fab-toc="learnings">
              <span class="art-fab-drawer__num">08</span>
              Learnings            </a>
                  </nav>
      </div>
</main>

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

</footer>
  </div>

  <script src="/assets/js/preloader.js"></script>
  <script src="/assets/js/background.js" defer></script>
  <script src="/assets/js/animations.js" defer></script>
  <script src="/assets/js/app.js" defer></script>
  <script>
  /* ── READING PROGRESS ── */
  (function(){
    const bar  = document.getElementById("art-progress");
    const main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      const h   = main.scrollHeight - window.innerHeight;
      const pct = Math.min(100, (window.scrollY / h) * 100);
      bar.style.width = pct + "%";
    }, { passive: true });
  })();
  /* ── ACTIVE NAV HIGHLIGHT ── */
  (function(){
    const navItems = document.querySelectorAll(".cs-nav__item[data-nav]");
    const sections = document.querySelectorAll(".cs-section[id]");
    if (!navItems.length) return;
    const obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          navItems.forEach(function(n){ n.classList.remove("is-active"); });
          const active = document.querySelector('.cs-nav__item[data-nav="'+e.target.id+'"]');
          if (active) active.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    sections.forEach(function(s){ obs.observe(s); });
  })();
  </script>

  <script>
  /* ── MOBILE FAB — scroll hide/show + footer avoidance ── */
  (function(){
    var fab=document.getElementById("fabBtn"),drawer=document.getElementById("fabDrawer"),backdrop=document.getElementById("fabBackdrop");
    if(!fab||!drawer)return;
    function openDrawer(){fab.classList.add("is-open");fab.setAttribute("aria-expanded","true");backdrop.classList.add("is-open");requestAnimationFrame(function(){drawer.classList.add("is-open");backdrop.classList.add("is-visible");});document.body.style.overflow="hidden";}
    function closeDrawer(){fab.classList.remove("is-open");fab.setAttribute("aria-expanded","false");drawer.classList.remove("is-open");backdrop.classList.remove("is-visible");setTimeout(function(){backdrop.classList.remove("is-open");},240);document.body.style.overflow="";}
    fab.addEventListener("click",function(){fab.classList.contains("is-open")?closeDrawer():openDrawer();});
    backdrop.addEventListener("click",closeDrawer);
    document.addEventListener("keydown",function(e){if(e.key==="Escape")closeDrawer();});
    drawer.querySelectorAll(".art-fab-drawer__item").forEach(function(l){l.addEventListener("click",function(){closeDrawer();});});
    var lastY=0,timer=null;
    function checkVis(){var y=window.scrollY,h=window.innerHeight,dh=document.documentElement.scrollHeight;
      if((y+h)>(dh-200)){fab.classList.add("is-hidden");return;}
      if(y>lastY+4){fab.classList.add("is-hidden");}else if(y<lastY-4){fab.classList.remove("is-hidden");}
      lastY=y;clearTimeout(timer);timer=setTimeout(function(){fab.classList.remove("is-hidden");},800);}
    window.addEventListener("scroll",checkVis,{passive:true});
    var fi=drawer.querySelectorAll(".art-fab-drawer__item[data-fab-toc]");
    if(fi.length){var o=new IntersectionObserver(function(en){en.forEach(function(e){if(!e.isIntersecting)return;fi.forEach(function(n){n.classList.remove("is-active");});var a=drawer.querySelector('.art-fab-drawer__item[data-fab-toc="'+e.target.id+'"]');if(a)a.classList.add("is-active");});},{rootMargin:"-15% 0px -70% 0px"});document.querySelectorAll("[id]").forEach(function(el){o.observe(el);});}
  })();
  </script>

  <script src="/assets/js/navigation.js" defer></script>

</body>
</html>