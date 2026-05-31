<?php
/**
 * sections/hero.php
 *
 * COGNITIVE RESTRUCTURE:
 * - Static identity line first — readable instantly, no waiting
 * - Typewriter demoted to secondary supporting line
 * - Fixed typewriter container height — stops layout shift
 */
?>

<section class="hero">

  <div class="hero-content">

    <!-- IDENTITY EYEBROW — reads instantly, sets context -->
    <div class="hero-eyebrow">
      <span class="hero-eyebrow-dot" aria-hidden="true"></span>
      UX Leader &amp; Product Strategist
    </div>

    <!-- TITLE
         Line 1: static — reader gets the full thought immediately
         Line 2: typewriter adds specificity, doesn't block comprehension
         Container has fixed min-height — zero layout shift
    -->
    <h1 class="hero-title">
      I design clarity<br>
      into <span class="hero-title-typewriter">
        <span id="typewriter" aria-live="polite"></span>
      </span>
    </h1>

    <!-- META PILLS -->
    <div class="hero-meta">
      <span>17+ Years</span>
      <span>10+ Enterprise Products</span>
      <span>50M+ Users Served</span>
      <span>Sr. Manager UX · Intelegencia</span>
    </div>

    <!-- SOCIAL PROOF QUOTE -->
    <blockquote class="hero-proof">
      <p>
        "Ramesh has a rare ability to translate complex business
        requirements into elegant, scalable UX systems."
      </p>
      <cite>
        <span class="hero-proof-avatar" aria-hidden="true">PS</span>
        Priya Sharma &mdash; VP Product &middot; IndiGo Airlines
      </cite>
    </blockquote>

    <!-- CHIPS -->
    <div class="chips">
      <div class="chip" data-chip="ux-systems" role="button" tabindex="0">UX SYSTEMS</div>
      <div class="chip" data-chip="product-strategy" role="button" tabindex="0">PRODUCT STRATEGY</div>
      <div class="chip blue" data-chip="design-infrastructure" role="button" tabindex="0">DESIGN INFRASTRUCTURE</div>
      <div class="chip blue" data-chip="ai-workflows" role="button" tabindex="0">AI-ENABLED WORKFLOWS</div>
    </div>

    <!-- CTA BUTTONS -->
    <div class="hero-cta">
      <a href="/case-study/" class="hero-cta-primary">
        View Case Studies
        <span class="hero-cta-arrow" aria-hidden="true">→</span>
      </a>
      <a href="/assets/resume/Ramesh_Kumar_Mandal.pdf" class="hero-cta-secondary" download>
        Download Resume
        <span class="hero-cta-icon" aria-hidden="true">↓</span>
      </a>
    </div>

    <!-- AVAILABILITY -->
    <div class="hero-availability">
      <span class="hero-availability-dot" aria-hidden="true"></span>
      <span>Available for Senior UX Leadership &middot; Remote &amp; Hybrid &middot; India / Global</span>
    </div>

  </div>

</section>