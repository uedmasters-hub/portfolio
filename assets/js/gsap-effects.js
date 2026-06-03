/* =============================================================
   GSAP-EFFECTS.JS
   6epixels.com — Ramesh Mandal Portfolio

   Four effects that CSS + IntersectionObserver cannot do:
     1. Stat number count-up   (50M+, 40%, 15+)
     2. Hero title parallax    (scroll-linked depth)
     3. Magnetic Connect btn   (cursor pull + spring)
     4. Case study card reveal (clip-path stagger)

   Safety rules:
   — Runs ONLY after GSAP + ScrollTrigger are confirmed loaded
   — All effects wrapped in gsap.matchMedia() — disabled ≤768px
     where relevant (parallax, magnetic)
   — prefers-reduced-motion respected globally
   — Zero overlap with animations.js (different selectors / triggers)
   — If GSAP fails to load, page works exactly as before
   ============================================================= */

(function () {
  "use strict";

  /* ── GUARD: wait for GSAP ─────────────────────────────────── */

  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
    console.warn("gsap-effects.js: GSAP or ScrollTrigger not loaded — skipping.");
    return;
  }

  /* ── REGISTER PLUGIN ──────────────────────────────────────── */

  gsap.registerPlugin(ScrollTrigger);

  /* ── REDUCED MOTION — disable all if user prefers ─────────── */

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    return;
  }

  /* ── matchMedia CONTEXTS ──────────────────────────────────── */

  var mm = gsap.matchMedia();

  /* =============================================================
     EFFECT 1 — STAT NUMBER COUNT-UP
     Animates 50M+, 10+, 40%, 15+ from 0 when they scroll in.
     Works on both desktop (4-col) and mobile (2×2 grid).

     Reads the real value from data-count / data-suffix attributes
     we add via PHP — no hardcoding needed.

     Targets: .stat-card__value elements
     Trigger: each .stat-card entering viewport
  ============================================================= */

  (function initCountUp() {

    var cards = document.querySelectorAll(".stat-card");
    if (!cards.length) return;

    cards.forEach(function (card) {

      var valueEl = card.querySelector(".stat-card__value");
      if (!valueEl) return;

      /* Parse the displayed value: "50M+" → { num: 50, suffix: "M+" } */
      var raw    = (valueEl.textContent || valueEl.innerText).trim();
      var parsed = parseRawStat(raw);
      if (!parsed) return;

      /* Hide the static text — we'll write it dynamically */
      valueEl.textContent = parsed.prefix + "0" + parsed.suffix;

      /* Proxy object GSAP will tween */
      var proxy = { val: 0 };

      ScrollTrigger.create({
        trigger:    card,
        start:      "top 85%",
        once:       true,
        onEnter: function () {
          gsap.to(proxy, {
            val:      parsed.num,
            duration: 1.6,
            ease:     "power2.out",
            onUpdate: function () {
              var display = parsed.isFloat
                ? proxy.val.toFixed(1)
                : Math.round(proxy.val).toString();
              valueEl.textContent = parsed.prefix + display + parsed.suffix;
            },
            onComplete: function () {
              /* Snap to exact original text at end */
              valueEl.textContent = raw;
            }
          });
        }
      });
    });

    function parseRawStat(str) {
      /* Handles: "50M+", "10+", "40%", "15+", "22%", "30%"
         Returns: { num, suffix, prefix, isFloat } or null */
      var match = str.match(/^([^0-9]*)([0-9]+\.?[0-9]*)([^0-9]*)$/);
      if (!match) return null;
      return {
        prefix:  match[1] || "",
        num:     parseFloat(match[2]),
        suffix:  match[3] || "",
        isFloat: match[2].indexOf(".") > -1
      };
    }

  })();

  /* =============================================================
     EFFECT 2 — HERO TITLE PARALLAX
     As user scrolls down from hero, h1 drifts up by 60px and
     fades slightly. Creates cinematic depth — content beneath
     feels like it's rising into focus.

     Desktop + tablet only (≥769px).
     Scrub: 1 = perfectly frame-synced, no snap.

     Targets: .hero__title, .hero__meta, .hero__chips
     Trigger: .hero-wrapper scrolling out of view
  ============================================================= */

  mm.add("(min-width: 769px)", function () {

    var heroWrapper = document.querySelector(".hero-wrapper");
    var heroTitle   = document.querySelector(".hero__title");
    var heroMeta    = document.querySelector(".hero__meta");
    var heroChips   = document.querySelector(".hero__chips");

    if (!heroWrapper || !heroTitle) return;

    /* Title drifts up and fades as hero scrolls out */
    gsap.to(heroTitle, {
      y:          -70,
      opacity:    0.15,
      ease:       "none",
      scrollTrigger: {
        trigger:  heroWrapper,
        start:    "top top",
        end:      "bottom 30%",
        scrub:    1.2,
      }
    });

    /* Meta and chips drift at slightly slower rate — depth layering */
    if (heroMeta) {
      gsap.to(heroMeta, {
        y:       -40,
        opacity: 0.25,
        ease:    "none",
        scrollTrigger: {
          trigger: heroWrapper,
          start:   "top top",
          end:     "bottom 40%",
          scrub:   1.5,
        }
      });
    }

    if (heroChips) {
      gsap.to(heroChips, {
        y:       -20,
        opacity: 0.35,
        ease:    "none",
        scrollTrigger: {
          trigger: heroWrapper,
          start:   "top top",
          end:     "bottom 50%",
          scrub:   1.8,
        }
      });
    }

    /* Cleanup function required by gsap.matchMedia */
    return function () {
      ScrollTrigger.getAll().forEach(function (st) {
        if (st.vars && st.vars.trigger === heroWrapper) {
          st.kill();
        }
      });
      gsap.set([heroTitle, heroMeta, heroChips].filter(Boolean), {
        clearProps: "y,opacity"
      });
    };

  });

  /* =============================================================
     EFFECT 3 — MAGNETIC CONNECT BUTTON
     The header "Connect" CTA pulls toward cursor within a
     60px radius. On mouseleave it springs back to origin.
     This is the signature interaction on Linear, Vercel, Arc.

     Uses gsap.quickTo() which creates an optimised setter —
     far smoother than requestAnimationFrame + lerp by hand.

     Desktop only (hover: hover media query check).
     Targets: .nav-connect (header Connect button)
  ============================================================= */

  mm.add("(min-width: 769px) and (hover: hover)", function () {

    var btn = document.querySelector(".nav-connect");
    if (!btn) return;

    var RADIUS   = 60;   /* px — activation distance from btn centre */
    var STRENGTH = 0.38; /* how far it moves toward cursor (0–1) */

    /* quickTo creates a pre-configured gsap.to with duration/ease baked in */
    var xTo = gsap.quickTo(btn, "x", { duration: 0.5, ease: "power3.out" });
    var yTo = gsap.quickTo(btn, "y", { duration: 0.5, ease: "power3.out" });

    function onMouseMove(e) {
      var rect  = btn.getBoundingClientRect();
      var btnCX = rect.left + rect.width  / 2;
      var btnCY = rect.top  + rect.height / 2;
      var dx    = e.clientX - btnCX;
      var dy    = e.clientY - btnCY;
      var dist  = Math.sqrt(dx * dx + dy * dy);

      if (dist < RADIUS) {
        /* Pull toward cursor proportional to proximity */
        var pull = (1 - dist / RADIUS);
        xTo(dx * STRENGTH * pull);
        yTo(dy * STRENGTH * pull);
      } else {
        /* Outside radius — spring back */
        xTo(0);
        yTo(0);
      }
    }

    function onMouseLeave() {
      xTo(0);
      yTo(0);
    }

    window.addEventListener("mousemove",  onMouseMove);
    btn.addEventListener("mouseleave", onMouseLeave);

    return function () {
      window.removeEventListener("mousemove",  onMouseMove);
      btn.removeEventListener("mouseleave", onMouseLeave);
      gsap.set(btn, { clearProps: "x,y" });
    };

  });

  /* =============================================================
     EFFECT 4 — CASE STUDY CARD CLIP-PATH REVEAL
     The transform-featured and transform-card elements reveal
     using clip-path: inset() — cards "wipe" in from the left.
     Staggered so featured leads, side cards follow one by one.

     clip-path is GPU-composited — zero layout impact, silky smooth.
     CSS transitions cannot do scroll-triggered stagger at this fidelity.

     Overrides the existing .fade-in behaviour on these elements
     by removing that class before ScrollTrigger fires.

     Targets: .transform-featured, .transform-card
     Trigger: .transform-grid entering viewport
  ============================================================= */

  (function initCardReveal() {

    var grid     = document.querySelector(".transform-grid");
    var featured = document.querySelector(".transform-featured");
    var cards    = document.querySelectorAll(".transform-card");

    if (!grid || !featured) return;

    /* Remove fade-in from these elements so both systems
       don't conflict. GSAP takes ownership here. */
    featured.classList.remove("fade-in", "is-visible");
    cards.forEach(function (c) { c.classList.remove("fade-in", "is-visible"); });

    /* Set initial state — fully clipped (invisible) */
    gsap.set(featured, {
      clipPath: "inset(0 100% 0 0)",
      opacity:  1            /* opacity controlled by clipPath, not fade */
    });

    gsap.set(cards, {
      clipPath: "inset(0 100% 0 0)",
      opacity:  1
    });

    /* Timeline: featured first, then cards staggered */
    var tl = gsap.timeline({
      scrollTrigger: {
        trigger:   grid,
        start:     "top 78%",
        once:      true,
      }
    });

    /* Featured card wipes in — 0.85s */
    tl.to(featured, {
      clipPath:  "inset(0 0% 0 0)",
      duration:  0.85,
      ease:      "power3.inOut",
    });

    /* Side cards stagger in — 0.65s each, 0.12s apart */
    tl.to(cards, {
      clipPath:  "inset(0 0% 0 0)",
      duration:  0.65,
      ease:      "power2.out",
      stagger:   0.12,
    }, "-=0.35"); /* overlap with featured ending */

  })();

  /* =============================================================
     BONUS — TRANSFORM METRICS COUNT-UP
     The 30%, 22%, 22%, 40% metric values below the case study
     grid also count up when they enter view. Same parser as
     Effect 1.
  ============================================================= */

  (function initMetricCountUp() {

    var metrics = document.querySelectorAll(".transform-metric");
    if (!metrics.length) return;

    metrics.forEach(function (metric) {

      var valueEl = metric.querySelector(".transform-metric__value");
      if (!valueEl) return;

      var raw    = (valueEl.textContent || valueEl.innerText).trim();
      var parsed = parseMetricVal(raw);
      if (!parsed) return;

      valueEl.textContent = parsed.prefix + "0" + parsed.suffix;
      var proxy = { val: 0 };

      ScrollTrigger.create({
        trigger:  metric,
        start:    "top 88%",
        once:     true,
        onEnter: function () {
          gsap.to(proxy, {
            val:      parsed.num,
            duration: 1.4,
            ease:     "power2.out",
            onUpdate: function () {
              valueEl.textContent = parsed.prefix + Math.round(proxy.val) + parsed.suffix;
            },
            onComplete: function () {
              valueEl.textContent = raw;
            }
          });
        }
      });
    });

    function parseMetricVal(str) {
      var match = str.match(/^([^0-9]*)([0-9]+)([^0-9]*)$/);
      if (!match) return null;
      return { prefix: match[1] || "", num: parseInt(match[2], 10), suffix: match[3] || "" };
    }

  })();

})();