<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="How I built IndiGo&#039;s enterprise design system from scratch — 200+ components, 10+ products, 40% faster delivery, and a 15-person team that finally spoke the same visual language."/>
  <title>Enterprise Design System — Case Study</title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/case-study/design-system.php"/>
  <meta property="og:title"        content="Enterprise Design System — Case Study"/>
  <meta property="og:description"  content="One system. Ten products. 40% faster delivery. 200+ components, 15 designers, 3 years."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="Enterprise Design System — Case Study"/>
  <meta name="twitter:description" content="One system. Ten products. 40% faster delivery. 200+ components, 15 designers, 3 years."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/case-study/design-system.php"/>

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
        <span class="preloader__name-text">Enterprise Design System</span>
        <span class="preloader__name-role">Case Study · Design Infrastructure</span>
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
          src="https://images.unsplash.com/photo-1558655146-9f40138edfeb?q=80&w=2400&auto=format&fit=crop"
          alt="Design system components and grid representing enterprise design infrastructure"
          loading="eager"
        />
        <div class="cs-detail-hero__overlay"></div>
        <div class="cs-detail-hero__content">
          <p class="cs-detail-hero__category">DESIGN INFRASTRUCTURE</p>
          <h1 class="cs-detail-hero__title">Enterprise<br>Design System</h1>
          <p class="cs-detail-hero__tagline">
            One system. Ten products. A 15-person team that finally spoke the same language.
          </p>
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
            <span class="cs-meta-item__value">3 years ongoing</span>
          </div>
                  <div class="cs-meta-item">
            <span class="cs-meta-item__label">Year</span>
            <span class="cs-meta-item__value">2021 – 2024</span>
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
            <h2 class="cs-section__title">Ten products. Zero shared language.</h2>
            <div class="cs-section__body">
              <p>By 2021, IndiGo's digital product portfolio had grown to 10+ products — booking flow, check-in, CrewPal, Staff Travel, IndiGo Holidays, loyalty, corporate portal, cargo, airport kiosks, and internal operations tools. Each had been built by different teams, at different times, with different design decisions. The result was a portfolio that shared a logo but not much else.</p>
              <p>Buttons had 6 different visual treatments across products. Typography scaled inconsistently between mobile and web. A designer moving from the booking team to the CrewPal team had to relearn every pattern. Engineering spent 20% of sprint capacity recreating UI components that already existed somewhere else in the codebase.</p>
              <p>I proposed, resourced, and led the build of IndiGo's first enterprise design system — a shared Figma library, token architecture, component documentation, and handoff protocol used across all 10 products and a 15-person design team.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Faster delivery velocity across product teams</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">200+</div>
                <div class="cs-metric-card__label">Components built and documented</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">60%</div>
                <div class="cs-metric-card__label">Reduction in design debt across the portfolio</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">10+</div>
                <div class="cs-metric-card__label">Products actively using the system</div>
              </div>
            </div>
          </section>

          <!-- PROBLEM -->
          <section class="cs-section" id="problem">
            <span class="cs-section__label">02 — Problem</span>
            <h2 class="cs-section__title">The hidden cost of inconsistency</h2>
            <div class="cs-section__body">
              <p>The problem with design inconsistency is that it's invisible until you measure it. No one flags "we have 6 button styles" as a business risk. It surfaces slowly — in slower sprints, in engineering rework, in user confusion when moving between IndiGo products, in onboarding time for new designers.</p>
              <p>I made it visible by quantifying it. Before proposing the system, I spent 3 weeks auditing the portfolio and building a business case:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Component duplication across codebases</p>
                  <p class="cs-step__desc">The same button component existed in 8 different forms across product codebases. Engineering estimated 340 hours per quarter spent recreating UI components that already existed elsewhere. That's 9 weeks of one engineer's time — every quarter — spent on zero-value work.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Designer onboarding took 3–4 weeks</p>
                  <p class="cs-step__desc">A new designer joining any IndiGo product team had to reverse-engineer the visual language from existing screens. There was no documentation, no component library, no design principles. Every designer rebuilt context from scratch. Average time to first independent contribution: 3.5 weeks.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Design reviews consumed by inconsistency debates</p>
                  <p class="cs-step__desc">In cross-team design reviews, 40% of feedback was about visual inconsistency — wrong button radius, different spacing from the adjacent product, mismatched type scale. None of this was about product thinking or user experience. It was quality noise that could have been eliminated by a shared standard.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">Users noticed — and lost trust</p>
                  <p class="cs-step__desc">In usability sessions, participants frequently commented on visual inconsistencies when moving between IndiGo products. "This looks like a different app" was a direct quote from 7 separate sessions. Inconsistency signals low quality — and low quality erodes trust, even when the underlying product works.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- RESEARCH -->
          <section class="cs-section" id="research">
            <span class="cs-section__label">03 — Research</span>
            <h2 class="cs-section__title">Auditing 10 products before writing a single component</h2>
            <div class="cs-section__body">
              <p>Design system work is infrastructure work — and infrastructure decisions made without a thorough audit create new problems while solving old ones. I spent 6 weeks in research and audit before proposing a single token or building a single component.</p>
              <p><strong>Visual audit:</strong> Screenshot-catalogued every UI component across all 10 products. 2,400 screens captured and tagged by component type. Found: 6 button variants, 11 card styles, 4 navigation patterns, 9 form field treatments, and 14 different uses of the IndiGo blue across the portfolio.</p>
              <p><strong>Designer interviews:</strong> 1:1s with all 15 designers across product teams. Core finding: every designer was maintaining their own personal Figma library of IndiGo components because no official one existed. 15 shadow libraries, each slightly different, each drifting further from the others over time.</p>
              <p><strong>Engineering interviews:</strong> 8 engineers across 4 teams. Core finding: the front-end teams had started building their own informal component libraries in code — 3 separate React component libraries existed across the codebase, none of them shared, all of them partially inconsistent with each other.</p>
              <p><strong>Competitive benchmark:</strong> Audited the design systems of Airbnb (Lunar), Atlassian (Atlaskit), IBM (Carbon), and Shopify (Polaris) — specifically their token architecture, documentation standards, and governance models. Carbon's token hierarchy and Polaris's usage documentation became the primary references.</p>
            </div>
            <blockquote class="cs-callout">
              "I've built my own Figma library over 2 years. It has everything I need. But it only works for me — and when I leave, it leaves with me."<br>
              <small>— Senior designer, booking team</small>
            </blockquote>
            <div class="cs-section__body">
              <p>This quote defined the risk I was solving: IndiGo's design knowledge was locked in individuals, not institutionalised. The system needed to outlast any single designer — including me.</p>
            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology</span>
            <h2 class="cs-section__title">The human side of systems adoption</h2>
            <div class="cs-section__body">
              <p>Design systems fail more often from adoption problems than from technical ones. A technically perfect system that designers don't use is worthless. Understanding the psychological barriers to adoption shaped every decision about how the system was built and rolled out.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">IKEA effect — involve people in building it</p>
                  <p class="cs-step__desc">People value things they've helped create more than things handed to them. I involved designers from all 4 product teams in the component definition phase — running working sessions where teams nominated the patterns they wanted standardised first. This created co-ownership rather than compliance.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Loss aversion — frame it as gain, not replacement</p>
                  <p class="cs-step__desc">Designers were attached to their personal libraries. "We're replacing your library with ours" would have created resistance. The framing was "we're building a foundation that makes your library better" — the system was positioned as amplifying individual work, not overriding it.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Social proof — early adopters as advocates</p>
                  <p class="cs-step__desc">I identified 3 influential senior designers and onboarded them to the system first — before any wider rollout. Their public use of the system in design reviews created social proof. When the booking team's lead designer was using it and crediting it publicly, adoption accelerated faster than any mandate would have.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 IKEA Effect</span>
              <span class="cs-insight">🧠 Loss Aversion</span>
              <span class="cs-insight">🧠 Social Proof</span>
              <span class="cs-insight">🧠 Mere Exposure Effect</span>
              <span class="cs-insight">🧠 Autonomy Preservation</span>
            </div>
          </section>

          <!-- PROCESS -->
          <section class="cs-section" id="process">
            <span class="cs-section__label">05 — Process</span>
            <h2 class="cs-section__title">Three years. Four phases. One living system.</h2>
            <div class="cs-section__body">
              <p>A design system is never finished — it's a product with its own roadmap. The build was structured in four phases, each with a defined scope and measurable adoption milestone before moving to the next.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Phase 1 — Foundation (6 months, 2021)</p>
                  <p class="cs-step__desc">Token architecture: colour, typography, spacing, elevation, border radius. A single source of truth for every visual decision. All tokens defined in Figma variables and mirrored to CSS custom properties for engineering. 4 cross-team working sessions to ratify tokens before they were locked. Output: 80 design tokens, zero ambiguity about the core visual language.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Phase 2 — Core Components (8 months, 2022)</p>
                  <p class="cs-step__desc">Built the 40 highest-frequency components nominated by product teams in the audit — buttons, form fields, navigation, cards, modals, alerts, badges, and tables. Each component: Figma variants for all states (default/hover/active/disabled/error), usage documentation, do/don't examples, and accessibility specification. Engineering received component specs in a format they could build directly from.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Phase 3 — Patterns & Templates (10 months, 2022–2023)</p>
                  <p class="cs-step__desc">Moved from atoms to molecules and organisms. Built 12 page templates (listing, detail, checkout, confirmation, empty state, error, onboarding, dashboard) and 28 interaction patterns (search, filter, sort, pagination, infinite scroll, form validation). Templates reduced new feature design time from days to hours for common layouts.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">Phase 4 — Governance & Contribution (Ongoing, 2023–2024)</p>
                  <p class="cs-step__desc">A system no one can contribute to dies. Established a contribution protocol — any designer can propose a new component via a standardised brief, reviewed by a 3-person system team in a fortnightly session. Accepted components are built, documented, and released in a monthly system update. By 2024, 30% of new components were contributed by product teams, not the system team.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- SOLUTION -->
          <section class="cs-section" id="solution">
            <span class="cs-section__label">06 — Solution</span>
            <h2 class="cs-section__title">What the system is made of</h2>
            <div class="cs-section__body">
              <p><strong>Token architecture — the foundation everything else inherits from.</strong> Three token tiers: primitive tokens (raw values — `blue-600: #1a46c9`), semantic tokens (intent-based — `color-action-primary: blue-600`), and component tokens (component-specific — `button-background-primary: color-action-primary`). This hierarchy means a brand colour change cascades through the entire system by updating one primitive token — not 200 components.</p>
              <p><strong>200+ Figma components with full variant coverage.</strong> Every component built with Figma's variant system — all states, all sizes, all themes (light/dark, though dark was IndiGo internal tools only). Auto-layout used throughout for components that needed to scale with content. Every component detached from its origin file — teams could use them without being blocked by library permission issues.</p>
              <p><strong>Documentation built into the components.</strong> Each Figma component has an annotation layer (hidden by default, visible for developers) with spacing specs, colour tokens, and accessibility notes embedded directly. No separate spec document to keep in sync. The component is the spec.</p>
              <p><strong>Handoff protocol — eliminating the design-engineering gap.</strong> A standardised Figma frame structure for every feature delivery: component inventory, spacing annotations, state map, edge cases, and mobile breakpoints — all in one deliverable. Engineering reported 40% reduction in back-and-forth clarification requests after the protocol was adopted.</p>
            </div>
            <blockquote class="cs-callout">
              The token architecture change — moving from hardcoded hex values to semantic token references — meant when IndiGo updated their brand blue in late 2023, the change propagated across all 10 products and 200 components in 4 hours, not 4 weeks.
            </blockquote>
          </section>

          <!-- OUTCOMES -->
          <section class="cs-section" id="outcomes">
            <span class="cs-section__label">07 — Outcomes</span>
            <h2 class="cs-section__title">Infrastructure that compounded over time</h2>
            <div class="cs-section__body">
              <p>Design system ROI is hard to measure in a single quarter. The value compounds — every component built is a component never rebuilt, every pattern documented is a pattern never debated again. Measured at the 18-month mark after core components launched:</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Faster design-to-dev delivery — measured across 6 product teams over 3 quarters</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">60%</div>
                <div class="cs-metric-card__label">Reduction in design debt — components with multiple inconsistent versions eliminated</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">3.5w → 4d</div>
                <div class="cs-metric-card__label">Designer onboarding time — new team members productive in days, not weeks</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">30%</div>
                <div class="cs-metric-card__label">Component contributions from product teams — system is self-sustaining</div>
              </div>
            </div>
            <div class="cs-section__body" style="margin-top:48px">
              <p>The brand colour update in late 2023 was the system's most visible proof point. A change that would previously have required a designer on each of 10 product teams to manually update hundreds of screens was completed in 4 hours by updating a single primitive token. That moment converted the final sceptics in engineering leadership.</p>
              <p>The system also changed how IndiGo hired designers. Job descriptions for product designer roles now listed "experience with design systems" as a requirement — a direct response to how central the system had become to day-to-day work.</p>
            </div>
          </section>

          <!-- LEARNINGS -->
          <section class="cs-section" id="learnings">
            <span class="cs-section__label">08 — Learnings</span>
            <h2 class="cs-section__title">What three years of systems work teaches you</h2>
            <div class="cs-section__body">
              <p><strong>A design system is a product, not a project.</strong> The most common failure mode is treating system work as a one-time deliverable — build it, ship it, done. It's not done. It needs a roadmap, a release cadence, a contribution model, and a team who owns it long-term. The governance structure I put in place in Phase 4 was more important than any component built in Phase 2.</p>
              <p><strong>Adoption is a design problem.</strong> The system's technical quality mattered less than whether people used it. I spent more time on onboarding, documentation clarity, and the contribution protocol than on the components themselves. The best design system in the world is worthless if teams build around it. Make adoption the easiest path.</p>
              <p><strong>Start with tokens, not components.</strong> Every design system I've seen that started with components eventually had to go back and retrofit a token layer — which breaks everything. Tokens first means every subsequent component decision is coherent. It's slower to start, but it's the only architecture that scales.</p>
              <p><strong>Involve engineering from day one, not handoff.</strong> The three separate React component libraries that existed before this system were built because engineering didn't trust that design would give them something they could actually use. Involving engineers in component definition — specifically in deciding what states and variants to include — meant the Figma components mapped to code components almost one-to-one. Handoff went from painful to near-automatic.</p>
              <p><strong>Document the decisions, not just the outcomes.</strong> Future designers and engineers don't need to know what the button radius is — they can see it. They need to know <em>why</em> it's 6px and not 4px or 8px. Every significant system decision was documented with the reasoning — the constraints, the alternatives considered, and why this choice was made. That context is what prevents the system from being second-guessed every 6 months.</p>
            </div>
          </section>

        </article>

      </div>

      <!-- NEXT CASE STUDIES -->
            <div class="art-next-wrap">
        <div class="art-next">
          <a href="indigo-booking.php" class="art-next__card">
            <span class="art-next__arrow">↗</span>
            <p class="art-next__label">START FROM THE BEGINNING</p>
            <p class="art-next__category">AIRLINE COMMERCE</p>
            <h3 class="art-next__title">IndiGo Booking Ecosystem</h3>
            <p class="art-next__tagline">Redesigning a 50M-user booking flow.</p>
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