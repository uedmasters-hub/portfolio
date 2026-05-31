<?php
/**
 * sections/hero.php
 *
 * Changes:
 * - Skeleton element inside typewriter wrapper
 * - Floating testimonial bubble (fixed, bottom-right)
 * - Eyebrow identity line
 * - Shorter title: "I design clarity into"
 * - CTA buttons + availability signal
 */
?>

<!-- ================================
     FLOATING TESTIMONIAL BUBBLE
     Fixed position, bottom-right
     Appears after 2s delay
================================ -->
<div class="hero-bubble" id="heroBubble" role="complementary" aria-label="Peer testimonial">

  <button
    class="hero-bubble-close"
    id="heroBubbleClose"
    aria-label="Dismiss testimonial"
  >✕</button>

  <div class="hero-bubble-body">
    <p>
      "Ramesh has a rare ability to translate complex
      business requirements into elegant, scalable UX systems."
    </p>
  </div>

  <div class="hero-bubble-footer">
    <span class="hero-bubble-avatar" aria-hidden="true">PS</span>
    <div class="hero-bubble-meta">
      <strong>Priya Sharma</strong>
      <span>VP Product &middot; IndiGo Airlines</span>
    </div>
  </div>

  <!-- Tail -->
  <span class="hero-bubble-tail" aria-hidden="true"></span>

</div>


<!-- ================================
     HERO SECTION
================================ -->
<section class="hero">

  <div class="hero-content">

    <!-- EYEBROW -->
    <div class="hero-eyebrow">
      <span class="hero-eyebrow-dot" aria-hidden="true"></span>
      UX Leader &amp; Product Strategist
    </div>

    <!-- TITLE + TYPEWRITER -->
    <h1 class="hero-title">
      I design clarity<br>
      into <span class="hero-title-typewriter">

        <!-- SKELETON — visible on load, hidden when typing starts -->
        <span
          class="typewriter-skeleton"
          id="typewriter-skeleton"
          aria-hidden="true"
        ></span>

        <!-- TYPEWRITER -->
        <span
          id="typewriter"
          aria-live="polite"
          aria-label="Specialisation area"
        ></span>

      </span>
    </h1>

    <!-- META -->
    <div class="hero-meta">
      <span>17+ Years</span>
      <span>10+ Enterprise Products</span>
      <span>50M+ Users Served</span>
      <span>Sr. Manager UX &middot; Intelegencia</span>
    </div>

    <!-- CHIPS -->
    <div class="chips">
      <div class="chip" data-chip="ux-systems" role="button" tabindex="0">UX SYSTEMS</div>
      <div class="chip" data-chip="product-strategy" role="button" tabindex="0">PRODUCT STRATEGY</div>
      <div class="chip blue" data-chip="design-infrastructure" role="button" tabindex="0">DESIGN INFRASTRUCTURE</div>
      <div class="chip blue" data-chip="ai-workflows" role="button" tabindex="0">AI-ENABLED WORKFLOWS</div>
    </div>

    <!-- CTA -->
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


<!-- ================================
     BUBBLE SCRIPT (inline, minimal)
     Handles show/dismiss only
================================ -->
<script>
(function() {

  var bubble    = document.getElementById("heroBubble");
  var closeBtn  = document.getElementById("heroBubbleClose");

  if (!bubble) return;

  // Show after 2s delay
  setTimeout(function() {
    bubble.classList.add("hero-bubble--visible");
  }, 2000);

  // Dismiss on close button
  closeBtn.addEventListener("click", function() {
    bubble.classList.remove("hero-bubble--visible");
    bubble.classList.add("hero-bubble--dismissed");
    // Remember dismissal for session
    try { sessionStorage.setItem("bubbleDismissed", "1"); } catch(e) {}
  });

  // Don't show if already dismissed this session
  try {
    if (sessionStorage.getItem("bubbleDismissed") === "1") {
      bubble.style.display = "none";
    }
  } catch(e) {}

})();
</script>