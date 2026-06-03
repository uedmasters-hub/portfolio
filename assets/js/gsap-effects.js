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

  /* =============================================================
     EFFECT 5 — PHILOSOPHY QUOTE WORD HIGHLIGHT
     ─────────────────────────────────────────────────────────────
     The blue philosophy section PINS to the top of the viewport.
     While pinned, each word in the blockquote illuminates
     one-by-one from dim → full white as the user scrolls.
     After the final word lights up and the attribution appears,
     the pin releases and normal scroll resumes.

     How it works:
       1. JS splits blockquote text into <span class="phil-word">
       2. All words start at rgba(255,255,255,0.15) — almost invisible
       3. A GSAP timeline tweens each word to rgba(255,255,255,1)
          with a 0.09s stagger between words
       4. ScrollTrigger pins the section and scrubs that timeline
          directly against scroll position (scrub: 1.8)
       5. Pin duration = 180% of viewport height — enough for
          31 words × stagger to feel deliberate, not rushed
       6. Attribution slides up after last word

     Desktop only — mobile gets CSS fade (pinned scroll = bad UX
     on touch, causes momentum conflicts on iOS/Android)

     Ownership: removes .philosophy-quote from animations.js IO
     so both systems don't fight over opacity/transform.
  ============================================================= */

  (function initPhilosophyHighlight() {

    var section = document.querySelector(".philosophy-section");
    var quote   = document.querySelector(".philosophy-quote");
    var attr    = document.querySelector(".philosophy-attr");

    if (!section || !quote) return;

    /* ── TAKE OWNERSHIP from animations.js ────────────────────
       animations.js uses an IntersectionObserver that adds
       .is-visible to .philosophy-quote and .philosophy-attr.
       We need to intercept before that fires, or neutralise it.
       Strategy: add is-visible immediately (removes opacity:0
       from CSS) then let GSAP re-set opacity per word.          */

    quote.classList.add("is-visible");
    if (attr) attr.classList.add("is-visible");

    /* ── MOBILE: STICKY + REAL HEIGHT GROWTH + HIGHLIGHT ─────────
       Core insight: GSAP pin freezes layout at pin-moment.
       Solution: NO pin. Instead use position:sticky on the section
       so it sticks naturally, while a REAL height change on a
       wrapper div drives genuine document reflow.

       Architecture:
       ┌─ .phil-grow-wrap ─────────────────────────────────────┐
       │  height tweens naturalH → 100vh  ← REAL layout height │
       │  (pushes all content below down as it grows)          │
       │                                                        │
       │  ┌─ .philosophy-section ──────────────────────────┐   │
       │  │  position: sticky; top: 0                       │   │
       │  │  height: 100% (fills whatever wrap is)          │   │
       │  │  content centred via flex                       │   │
       │  └─────────────────────────────────────────────────┘   │
       └────────────────────────────────────────────────────────┘

       Sequence:
       1. wrap + section scroll normally into view
       2. section hits top of viewport → sticky kicks in
          (section sticks, wrap continues growing)
       3. ScrollTrigger scrubs a timeline tied to wrap scroll:
          - wrap height: naturalH → 100vh  (layout grows → push)
          - section height: 100% of wrap   (fills it visually)
          - words highlight
       4. When wrap height = 100vh, section fills screen
       5. User keeps scrolling, wrap scrolls away, section unsticks
       6. Everything below was already pushed — no jump             */

    if (window.matchMedia("(max-width: 768px)").matches) {

      /* ── WORD SPLIT ─────────────────────────────────────────── */
      var rawTextM = quote.textContent.trim().replace(/\s+/g, " ");
      var wordsM   = rawTextM.split(" ").filter(Boolean);

      quote.innerHTML = wordsM.map(function (w) {
        return '<span class="phil-word">' + w + "</span>";
      }).join(" ");

      var wordElsM = Array.from(quote.querySelectorAll(".phil-word"));

      /* ── INITIAL STATES ─────────────────────────────────────── */
      gsap.set(wordElsM, { color: "rgba(255,255,255,0.15)" });
      if (attr) gsap.set(attr, { autoAlpha: 0, y: 10 });
      if (mark) gsap.set(mark, { autoAlpha: 0.25 });

      /* ── MEASURE NATURAL HEIGHT ─────────────────────────────── */
      var naturalH = Math.round(section.getBoundingClientRect().height);
      var vh       = window.innerHeight;

      /* ── BUILD GROW WRAPPER ─────────────────────────────────── */
      /* Wrapper lives in normal flow and owns the real height.
         Its height growing is what pushes content below down.    */
      var wrap = document.createElement("div");
      wrap.className        = "phil-grow-wrap";
      wrap.style.width      = "100%";
      wrap.style.height     = naturalH + "px";
      wrap.style.position   = "relative";

      /* Insert wrap before section, move section inside */
      section.parentNode.insertBefore(wrap, section);
      wrap.appendChild(section);

      /* ── MAKE SECTION STICKY INSIDE WRAPPER ─────────────────── */
      /* Section sticks to top of viewport as user scrolls.
         height:100% makes it fill however tall the wrap is.      */
      section.style.position = "sticky";
      section.style.top      = "0";
      section.style.height   = "100%";
      section.style.width    = "100%";
      section.style.display  = "flex";
      section.style.flexDirection  = "column";
      section.style.justifyContent = "center";
      section.style.boxSizing      = "border-box";

      /* ── TIMELINE ───────────────────────────────────────────── */
      var tlM = gsap.timeline();

      /* PHASE 1 — Wrap height grows: naturalH → vh
         This is the ONLY height change. Section fills it via 100%.
         Everything below wrap is pushed down in real time.        */
      tlM.to(wrap, {
        height:   vh,
        duration: 1,
        ease:     "power2.inOut",
      });

      /* Quote mark brightens during expand */
      if (mark) {
        tlM.to(mark, {
          autoAlpha: 1,
          duration:  0.5,
          ease:      "power2.out",
        }, "-=0.6");
      }

      /* PHASE 2 — Words highlight left-to-right */
      tlM.to(wordElsM, {
        color:    "rgba(255,255,255,1)",
        duration: 0.4,
        stagger:  { each: 0.07, from: "start", ease: "none" },
        ease:     "power1.inOut",
      }, "-=0.1");

      /* PHASE 3 — Attribution */
      if (attr) {
        tlM.to(attr, {
          autoAlpha: 1,
          y:         0,
          duration:  0.5,
          ease:      "power2.out",
        }, "-=0.2");
      }

      /* ── SCROLLTRIGGER — NO PIN ─────────────────────────────── */
      /* Trigger on the WRAP (layout owner).
         start: top of wrap hits top of viewport = same moment
         section becomes sticky.
         end: enough scroll distance for all phases.
         NO pin — the wrap scrolls normally, section sticks via CSS.
         scrub drives the timeline against scroll position.        */
      ScrollTrigger.create({
        trigger:   wrap,
        animation: tlM,
        start:     "top top",
        end: function () {
          /* Distance = grow phase + highlight phase + attribution */
          return "+=" + Math.round(vh * 2.4);
        },
        scrub:               1.2,
        invalidateOnRefresh: true,
      });

      return; /* mobile handled — skip desktop block */
    }

    /* ── SPLIT QUOTE INTO WORD SPANS ───────────────────────────
       Preserves the exact text including em-dashes and commas.
       Words are separated by whitespace; punctuation stays
       attached to its word (e.g. "systems —" stays as one token
       split into "systems" and "—" naturally).                  */

    var rawText  = quote.textContent.trim()
                       .replace(/\s+/g, " ");       /* normalise whitespace */
    var words    = rawText.split(" ").filter(Boolean);

    quote.innerHTML = words.map(function (w) {
      return '<span class="phil-word">' + w + "</span>";
    }).join(" ");                                    /* space between spans */

    var wordEls = Array.from(quote.querySelectorAll(".phil-word"));

    /* ── INITIAL STATES ─────────────────────────────────────── */

    /* Words: all dim */
    gsap.set(wordEls, {
      color:           "rgba(255,255,255,0.15)",
      display:         "inline",
    });

    /* Attribution: hidden, slightly below */
    if (attr) {
      gsap.set(attr, { autoAlpha: 0, y: 14 });
    }

    /* Quote mark: dim */
    var mark = section.querySelector(".philosophy-mark");
    if (mark) {
      gsap.set(mark, { autoAlpha: 0.2 });
    }

    /* ── SCRUB TIMELINE ─────────────────────────────────────── */

    var tl = gsap.timeline();

    /* 1. Quote mark fades up */
    if (mark) {
      tl.to(mark, {
        autoAlpha: 1,
        duration:  0.3,
        ease:      "power2.out",
      });
    }

    /* 2. Words light up one by one — 31 words × 0.09s stagger */
    tl.to(wordEls, {
      color:    "rgba(255,255,255,1)",
      duration: 0.5,
      stagger:  {
        each:   0.09,      /* 90ms between each word start */
        from:   "start",
        ease:   "none",
      },
      ease: "power1.inOut",
    }, mark ? "-=0.1" : "0");

    /* 3. Attribution slides up after last word */
    if (attr) {
      tl.to(attr, {
        autoAlpha: 1,
        y:         0,
        duration:  0.5,
        ease:      "power2.out",
      }, "-=0.2");          /* overlap slightly with last word */
    }

    /* ── SCROLLTRIGGER — PIN + SCRUB ────────────────────────── */

    ScrollTrigger.create({
      trigger:       section,
      animation:     tl,

      /* Pin starts when section CENTRE hits viewport CENTRE —
         section stays vertically centred while text highlights */
      start:         "center center",

      /* Pin duration:
         31 words × 90ms stagger + durations + attribution ≈ 4.5s of timeline.
         At scrub 1.8, scroll distance ≈ viewport × 1.8.
         We use 190vh which gives comfortable reading pace.      */
      end:           () => "+=" + Math.round(window.innerHeight * 1.9),

      pin:           true,
      scrub:         1.8,        /* lag smooths jerky scroll wheel */
      anticipatePin: 1,          /* prevents layout jump on pin entry */

      /* Refresh on resize so pin duration recalculates */
      invalidateOnRefresh: true,
    });

  })();

})();