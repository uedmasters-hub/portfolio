<?php
/**
 * sections/hero.php
 * Homepage Hero Section
 *
 * CHANGES (UX Roadmap P1.2, P2.1, P2.2):
 * - Added primary CTA buttons: "View Case Studies" + "Download Resume"
 * - Added social proof quote from Priya Sharma (VP Product, IndiGo)
 * - Added availability signal (pulsing dot + text) below chips
 * - Updated hero-meta: "Former UX Lead" → current role at Intelegencia
 * - Added aria-live="polite" to typewriter span (P1.5)
 */
?>

<!-- ================================
     HERO SECTION
================================ -->

<section class="hero">

  <div class="hero-content">

    <!-- TITLE -->
    <h1 class="hero-title">
      Building scalable systems for
      <span id="typewriter" aria-live="polite" aria-label="dynamic content"></span>
    </h1>

    <!-- META PILLS -->
    <div class="hero-meta">
      <span>17+ Years Experience</span>
      <span>10+ Enterprise Products</span>
      <span>50M+ Users Served</span>
      <span>Sr. Manager UX · Intelegencia</span>
    </div>

    <!-- SOCIAL PROOF QUOTE — P2.1 -->
    <blockquote class="hero-proof">
      <p>
        "Ramesh has a rare ability to translate complex business requirements
        into elegant, scalable UX systems."
      </p>
      <cite>
        <span class="hero-proof-avatar" aria-hidden="true">PS</span>
        Priya Sharma &mdash; VP Product &middot; IndiGo Airlines
      </cite>
    </blockquote>

    <!-- CHIPS -->
    <div class="chips">

      <div
        class="chip"
        data-chip="ux-systems"
        role="button"
        tabindex="0"
        aria-label="Explore UX Systems expertise"
      >
        UX SYSTEMS
      </div>

      <div
        class="chip"
        data-chip="product-strategy"
        role="button"
        tabindex="0"
        aria-label="Explore Product Strategy expertise"
      >
        PRODUCT STRATEGY
      </div>

      <div
        class="chip blue"
        data-chip="design-infrastructure"
        role="button"
        tabindex="0"
        aria-label="Explore Design Infrastructure expertise"
      >
        DESIGN INFRASTRUCTURE
      </div>

      <div
        class="chip blue"
        data-chip="ai-workflows"
        role="button"
        tabindex="0"
        aria-label="Explore AI-Enabled Workflows expertise"
      >
        AI-ENABLED WORKFLOWS
      </div>

    </div>

    <!-- CTA BUTTONS — P1.2 -->
    <div class="hero-cta">

      <a
        href="/case-study/"
        class="hero-cta-primary"
        aria-label="View all case studies"
      >
        View Case Studies
        <span class="hero-cta-arrow" aria-hidden="true">→</span>
      </a>

      <a
        href="/assets/resume/Ramesh_Kumar_Mandal.pdf"
        class="hero-cta-secondary"
        download
        aria-label="Download resume PDF"
      >
        Download Resume
        <span class="hero-cta-icon" aria-hidden="true">↓</span>
      </a>

    </div>

    <!-- AVAILABILITY SIGNAL — P2.2 -->
    <div class="hero-availability" aria-label="Availability status">
      <span class="hero-availability-dot" aria-hidden="true"></span>
      <span>Available for Senior UX Leadership &middot; Remote &amp; Hybrid &middot; India / Global</span>
    </div>

  </div>

</section>