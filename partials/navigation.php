<?php
/**
 * Font Awesome 6 Free — loaded here so all pages get icons
 * without needing to edit every page's <head>.
 * Modern browsers handle <link> in <body> without issues.
 */
?>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>

<?php
/**
 * partials/navigation.php
 *
 * Mega menu navigation + mobile drawer.
 * Include at top of every page.
 *
 * Usage:
 *   $currentKey = "work"; // set per-page before including
 *   require_once __DIR__ . "/../partials/navigation.php";
 *
 * $currentKey values:
 *   "home" | "about" | "work" | "field-notes" | "lab" | "toolkit"
 */

if (!isset($currentKey)) {
    $currentKey = "";
}

if (!function_exists("nav_active")) {
    function nav_active(string $key, string $current): string {
        return $key === $current ? " active" : "";
    }
}
?>

<!-- ==================================================
     HEADER / NAVIGATION
================================================== -->

<header class="header" id="site-header" role="banner">

    <!-- LOGO -->
    <a href="<?= BASE_PATH ?>/" class="logo" aria-label="Ramesh Mandal — Home">
        <span class="logo__mark" aria-hidden="true">RM</span>
        <span class="logo__text">RAMESH MANDAL</span>
    </a>

    <!-- DESKTOP NAV -->
    <nav class="nav" aria-label="Primary navigation" role="navigation">

        <div class="nav-item">
            <button class="nav-trigger<?= nav_active('work', $currentKey) ?>"
                aria-expanded="false" aria-controls="mega-panel-work"
                data-mega="work" type="button">
                Work
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <div class="nav-item">
            <button class="nav-trigger<?= nav_active('field-notes', $currentKey) ?>"
                aria-expanded="false" aria-controls="mega-panel-field-notes"
                data-mega="field-notes" type="button">
                Field Notes
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <div class="nav-item">
            <button class="nav-trigger<?= nav_active('lab', $currentKey) ?>"
                aria-expanded="false" aria-controls="mega-panel-lab"
                data-mega="lab" type="button">
                Lab
                <svg class="nav-chevron" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <path d="M2.5 4.5l3.5 3.5 3.5-3.5"/>
                </svg>
            </button>
        </div>

        <div class="nav-item">
            <a href="<?= BASE_PATH ?>/resources.php" class="nav-link<?= nav_active('toolkit', $currentKey) ?>">Toolkit</a>
        </div>

        <div class="nav-item">
            <a href="<?= BASE_PATH ?>/about.php" class="nav-link<?= nav_active('about', $currentKey) ?>">About</a>
        </div>

    </nav>

    <!-- RIGHT: CONNECT + HAMBURGER -->
    <div class="nav-right">
        <a href="<?= BASE_PATH ?>/contact.php" class="nav-connect">Connect</a>
    </div>

    <!-- HAMBURGER — mobile only -->
    <button class="nav-hamburger" aria-expanded="false"
        aria-controls="mobile-drawer" aria-label="Open navigation menu"
        id="hamburger-btn" type="button">
        <span></span>
        <span></span>
        <span></span>
    </button>

</header>


<!-- ==================================================
     MEGA MENU
================================================== -->

<div class="mega-menu" id="mega-menu" role="region" aria-label="Site mega menu">

    <!-- PANEL: WORK -->
    <div class="mega-panel" id="mega-panel-work" role="group" aria-label="Work navigation">
        <div class="mega-inner mega-inner--work">
            <div class="mega-intro">
                <p class="mega-intro-kicker">Work</p>
                <h3>Enterprise UX at scale</h3>
                <p>Case studies and teardowns from 17 years of shipping products for millions of users.</p>
                <a href="<?= BASE_PATH ?>/case-study/" class="mega-intro-cta">View all work →</a>
            </div>
            <div class="mega-col">
                <p class="mega-col-label">Case Studies</p>
                <div class="mega-links">
                    <a href="<?= BASE_PATH ?>/case-study/indigo-booking.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">✈</span>
                        <span><span class="mega-link-title">IndiGo Booking Ecosystem</span><span class="mega-link-desc">22% revenue ↑ · Conversion &amp; CRO</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/case-study/crewpal.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">👥</span>
                        <span><span class="mega-link-title">CrewPal Operations Platform</span><span class="mega-link-desc">25% satisfaction ↑ · Enterprise Ops</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/case-study/indigo-loyalty.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🏅</span>
                        <span><span class="mega-link-title">Gamified Loyalty Program</span><span class="mega-link-desc">40% retention ↑ · 500+ user tests</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/case-study/design-system.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚙</span>
                        <span><span class="mega-link-title">Enterprise Design System</span><span class="mega-link-desc">40% delivery velocity ↑ · Systems</span></span>
                    </a>
                </div>
            </div>
            <div class="mega-col">
                <p class="mega-col-label">UX Audits</p>
                <div class="mega-links">
                    <a href="<?= BASE_PATH ?>/audit/zomato-checkout.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🔍</span>
                        <span><span class="mega-link-title">Zomato Checkout Audit</span><span class="mega-link-desc">12 friction points identified</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/audit/swiggy-onboarding.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🛵</span>
                        <span><span class="mega-link-title">Swiggy Onboarding Audit</span><span class="mega-link-desc">Heuristic breakdown · Redesign suggestions</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <div class="mega-featured">
                    <p class="mega-featured-tag">Featured</p>
                    <h4>IndiGo Holidays Marketplace</h4>
                    <p>Personalized bundling that drove 22% ancillary revenue growth.</p>
                    <span class="mega-featured-metric">↑ 22% Revenue</span>
                </div>
            </div>
        </div>
        <div class="mega-footer">
            <div class="mega-footer-links">
                <a href="<?= BASE_PATH ?>/case-study/" class="mega-footer-link">All case studies →</a>
                <a href="<?= BASE_PATH ?>/audit/" class="mega-footer-link">All audits →</a>
                <a href="<?= BASE_PATH ?>/about.php#awards" class="mega-footer-link">IndiGo Innovation Award 2023</a>
            </div>
            <div class="mega-footer-badge">
                <span class="avail-dot" aria-hidden="true"></span>
                Available for senior UX leadership roles
            </div>
        </div>
    </div>

    <!-- PANEL: FIELD NOTES -->
    <div class="mega-panel" id="mega-panel-field-notes" role="group" aria-label="Field Notes navigation">
        <div class="mega-inner mega-inner--notes">
            <div class="mega-intro">
                <p class="mega-intro-kicker">Field Notes</p>
                <h3>Writing from the front lines</h3>
                <p>Essays, war stories, and frameworks from 17 years of shipping real products.</p>
                <a href="<?= BASE_PATH ?>/blog/" class="mega-intro-cta">Browse all writing →</a>
            </div>
            <div class="mega-col">
                <p class="mega-col-label">Stories &amp; Essays</p>
                <div class="mega-links">
                    <a href="<?= BASE_PATH ?>/blog/post.php?slug=the-redesign-nobody-asked-for" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚡</span>
                        <span><span class="mega-link-title">The Redesign Nobody Asked For</span><span class="mega-link-desc">War Story · 5 min read</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/blog/post.php?slug=the-44px-tap-target" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">⚡</span>
                        <span><span class="mega-link-title">The 44px Tap Target That Cost ₹2 Crore</span><span class="mega-link-desc">War Story · 5 min read</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/blog/post.php?slug=dark-patterns-are-a-short-term-win" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">◈</span>
                        <span><span class="mega-link-title">Dark Patterns Work. That's Why They're Dangerous.</span><span class="mega-link-desc">Unpopular Opinion · 6 min read</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/blog/post.php?slug=the-word-that-changed-conversion" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">✦</span>
                        <span><span class="mega-link-title">The Single Word That Changed Conversion</span><span class="mega-link-desc">Quiet Win · 4 min read</span></span>
                    </a>
                </div>
            </div>
            <div class="mega-col">
                <p class="mega-col-label">Behavioral Design</p>
                <div class="mega-links">
                    <a href="<?= BASE_PATH ?>/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span><span class="mega-link-title">Loss Aversion in UX</span><span class="mega-link-desc">Why users fear losing more than gaining</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span><span class="mega-link-title">Social Proof Mechanics</span><span class="mega-link-desc">How trust is manufactured at scale</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/psychology/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🧠</span>
                        <span><span class="mega-link-title">Dopamine Loops in Product Design</span><span class="mega-link-desc">Variable reward and engagement patterns</span></span>
                    </a>
                </div>
                <div class="mega-divider"></div>
                <a href="<?= BASE_PATH ?>/psychology/" class="mega-intro-cta" style="padding-left:12px;">All psychology articles →</a>
            </div>
        </div>
        <div class="mega-footer">
            <div class="mega-footer-links">
                <a href="<?= BASE_PATH ?>/blog/" class="mega-footer-link">All essays →</a>
                <a href="<?= BASE_PATH ?>/psychology/" class="mega-footer-link">Psychology articles →</a>
                <a href="<?= BASE_PATH ?>/blog/?category=war-stories" class="mega-footer-link">War Stories →</a>
            </div>
            <div class="mega-footer-badge">11 published · Updated monthly</div>
        </div>
    </div>

    <!-- PANEL: LAB -->
    <div class="mega-panel" id="mega-panel-lab" role="group" aria-label="Lab navigation">
        <div class="mega-inner mega-inner--lab">
            <div class="mega-intro">
                <p class="mega-intro-kicker">Lab</p>
                <h3>Experiments &amp; explorations</h3>
                <p>AI-UX experiments, interactive prototypes, and frameworks I'm actively testing.</p>
                <a href="<?= BASE_PATH ?>/audit/" class="mega-intro-cta">Enter the lab →</a>
            </div>
            <div class="mega-col">
                <p class="mega-col-label">Active Experiments</p>
                <div class="mega-links">
                    <a href="<?= BASE_PATH ?>/audit/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🤖</span>
                        <span><span class="mega-link-title">AI-Assisted UX Research</span><span class="mega-link-desc">Using Claude + Gemini in synthesis workflows</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/audit/" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">📊</span>
                        <span><span class="mega-link-title">Heuristic Scoring System</span><span class="mega-link-desc">A quantified audit framework prototype</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/audit/zomato-checkout.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🔍</span>
                        <span><span class="mega-link-title">Zomato Checkout Teardown</span><span class="mega-link-desc">12 annotated friction points</span></span>
                    </a>
                    <a href="<?= BASE_PATH ?>/audit/swiggy-onboarding.php" class="mega-link">
                        <span class="mega-link-icon" aria-hidden="true">🛵</span>
                        <span><span class="mega-link-title">Swiggy Onboarding Analysis</span><span class="mega-link-desc">Behavioral design critique</span></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mega-footer">
            <div class="mega-footer-links">
                <a href="<?= BASE_PATH ?>/audit/" class="mega-footer-link">All experiments →</a>
                <a href="<?= BASE_PATH ?>/blog/?category=from-the-field" class="mega-footer-link">AI + UX thinking →</a>
            </div>
            <div class="mega-footer-badge">Work in progress · Updated continuously</div>
        </div>
    </div>

</div><!-- /mega-menu -->


<!-- BACKDROP -->
<div class="mega-backdrop" id="mega-backdrop" aria-hidden="true"></div>

<!-- MOBILE SCRIM -->
<div class="mobile-scrim" id="mobile-scrim" aria-hidden="true"></div>


<!-- ==================================================
     MOBILE DRAWER — updated design
     RM logo mark · FA icons · table-row borders
     active = blue + 8px indent
================================================== -->

<div class="mobile-drawer" id="mobile-drawer"
    aria-label="Mobile navigation" role="dialog" aria-modal="true">

    <!-- DRAWER HEADER -->
    <div class="mobile-drawer__header">
        <a href="<?= BASE_PATH ?>/" class="mobile-drawer__logo-wrap" aria-label="Home">
            <span class="mobile-drawer__logo-mark" aria-hidden="true">RM</span>
            <span class="mobile-drawer__logo-text">RAMESH MANDAL</span>
        </a>
        <button class="mobile-drawer__close" id="drawer-close-btn"
            aria-label="Close navigation" type="button">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M2 2l16 16M18 2L2 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
        </button>
    </div>

    <!-- DRAWER BODY -->
    <div class="mobile-drawer__body">

        <!-- WORK GROUP -->
        <p class="mobile-nav-label">WORK</p>

        <a href="<?= BASE_PATH ?>/case-study/"
            class="mobile-nav-row<?= ($currentKey === 'work') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-book-open"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">Case Studies</span>
                <span class="mobile-nav-row__desc">IndiGo, CrewPal, Design System</span>
            </span>
        </a>

        <a href="<?= BASE_PATH ?>/audit/"
            class="mobile-nav-row<?= ($currentKey === 'audits') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">UX Audits</span>
                <span class="mobile-nav-row__desc">Zomato, Swiggy teardowns</span>
            </span>
        </a>

        <!-- FIELD NOTES GROUP -->
        <p class="mobile-nav-label">FIELD NOTES</p>

        <a href="<?= BASE_PATH ?>/blog/"
            class="mobile-nav-row<?= ($currentKey === 'field-notes') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-message"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">Stories &amp; Essays</span>
                <span class="mobile-nav-row__desc">War stories, quiet wins, opinions</span>
            </span>
        </a>

        <a href="<?= BASE_PATH ?>/psychology/"
            class="mobile-nav-row<?= ($currentKey === 'psychology') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-brain"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">Behavioral Design</span>
                <span class="mobile-nav-row__desc">Psychology applied to product</span>
            </span>
        </a>

        <!-- LAB GROUP -->
        <p class="mobile-nav-label">LAB</p>

        <a href="<?= BASE_PATH ?>/audit/"
            class="mobile-nav-row<?= ($currentKey === 'lab') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-vial-circle-check"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">Experiments</span>
                <span class="mobile-nav-row__desc">AI-UX, frameworks, prototypes</span>
            </span>
        </a>

        <!-- DIVIDER -->
        <div class="mobile-nav-divider"></div>

        <!-- SECONDARY -->
        <a href="<?= BASE_PATH ?>/resources.php"
            class="mobile-nav-row<?= ($currentKey === 'toolkit') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-toolbox"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">Toolkit</span>
            </span>
        </a>

        <a href="<?= BASE_PATH ?>/about.php"
            class="mobile-nav-row<?= ($currentKey === 'about') ? ' is-active' : '' ?>">
            <span class="mobile-nav-row__icon" aria-hidden="true">
                <i class="fa-solid fa-user"></i>
            </span>
            <span class="mobile-nav-row__text">
                <span class="mobile-nav-row__title">About</span>
            </span>
        </a>

    </div><!-- /drawer body -->

    <!-- DRAWER FOOTER -->
    <div class="mobile-drawer__footer">
        <a href="<?= BASE_PATH ?>/contact.php" class="mobile-connect-btn">
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