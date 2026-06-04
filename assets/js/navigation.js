/**
 * assets/js/navigation.js
 *
 * Mega menu + mobile drawer + scroll behaviour.
 * Vanilla JS — no dependencies.
 *
 * Header scroll behaviours:
 *  - Scrolling DOWN past threshold → hide header (slide up)
 *  - Scrolling UP               → show header immediately
 *  - Scrolled > 40px            → activate glassmorphism
 *  - At top                     → clear glass
 */

(function () {

  "use strict";

  /* ==================================================
     ELEMENTS
  ================================================== */

  const header    = document.getElementById("site-header");
  const megaMenu  = document.getElementById("mega-menu");
  const backdrop  = document.getElementById("mega-backdrop");
  const hamburger = document.getElementById("hamburger-btn");
  const drawer    = document.getElementById("mobile-drawer");
  const scrim     = document.getElementById("mobile-scrim");
  const closeBtn  = document.getElementById("drawer-close-btn");
  const triggers  = document.querySelectorAll("[data-mega]");

  /* ==================================================
     SCROLL — hide/show + glassmorphism
  ================================================== */

  const GLASS_THRESHOLD = 40;    // px — glass activates after this
  const HIDE_THRESHOLD  = 100;   // px — hide only kicks in past this point
  const HIDE_DELTA      = 8;     // px of upward scroll (increasing Y) to trigger hide
  const SHOW_DELTA      = 6;     // px of downward scroll (decreasing Y) to show

  let lastScrollY  = 0;
  let ticking      = false;
  let isHidden     = false;
  let isGlass      = false;
  let idleTimer    = null;

  function showHeader() {
    if (isHidden) {
      header.classList.remove("is-hidden");
      isHidden = false;
    }
  }

  function hideHeader() {
    if (!isHidden) {
      header.classList.add("is-hidden");
      isHidden = true;
      if (activePanel) closeAll(true);
    }
  }

  function handleScroll() {

    const y    = window.scrollY;
    const diff = y - lastScrollY;   // positive = scrolling UP page (Y increases)
                                     // negative = scrolling DOWN page (Y decreases)

    /* ── Glassmorphism ── */
    if (y > GLASS_THRESHOLD && !isGlass) {
      header.classList.add("is-scrolled");
      isGlass = true;
    } else if (y <= GLASS_THRESHOLD && isGlass) {
      header.classList.remove("is-scrolled");
      isGlass = false;
    }

    /* ── Hide / show ── */
    if (y <= HIDE_THRESHOLD) {
      // Near top — always visible, no hide logic
      showHeader();
    } else if (diff > HIDE_DELTA) {
      // User scrolling UP the page (Y increasing) — hide header
      hideHeader();
    } else if (diff < -SHOW_DELTA) {
      // User scrolling DOWN the page (Y decreasing) — show header
      showHeader();
    }

    /* ── Idle reveal — show after 2s of no scrolling ── */
    clearTimeout(idleTimer);
    idleTimer = setTimeout(function () {
      showHeader();
    }, 2000);

    lastScrollY = y;
    ticking     = false;

  }

  window.addEventListener("scroll", function () {
    if (!ticking) {
      requestAnimationFrame(handleScroll);
      ticking = true;
    }
  }, { passive: true });

  // Run once on load
  handleScroll();


  /* ==================================================
     MEGA MENU STATE
  ================================================== */

  let activePanel = null;
  let closeTimer  = null;
  const CLOSE_DELAY = 120;

  function openPanel(key) {

    clearTimeout(closeTimer);
    if (activePanel === key) return;

    closeAll(true);

    const panel   = document.getElementById("mega-panel-" + key);
    const trigger = document.querySelector("[data-mega='" + key + "']");

    if (!panel || !trigger) return;

    panel.classList.add("is-active");
    megaMenu.classList.add("is-open");
    backdrop.classList.add("is-visible");
    header.classList.add("mega-open");
    trigger.setAttribute("aria-expanded", "true");

    activePanel = key;
  }

  function closeAll(silent) {
    if (silent) { _doClose(); return; }
    clearTimeout(closeTimer);
    closeTimer = setTimeout(_doClose, CLOSE_DELAY);
  }

  function _doClose() {
    document.querySelectorAll(".mega-panel.is-active")
      .forEach(function (p) { p.classList.remove("is-active"); });
    triggers.forEach(function (t) {
      t.setAttribute("aria-expanded", "false");
    });
    megaMenu.classList.remove("is-open");
    backdrop.classList.remove("is-visible");
    header.classList.remove("mega-open");
    activePanel = null;
  }


  /* ==================================================
     TRIGGERS — hover + click
  ================================================== */

  triggers.forEach(function (trigger) {

    trigger.addEventListener("mouseenter", function () {
      openPanel(trigger.dataset.mega);
    });

    trigger.addEventListener("mouseleave", function (e) {
      if (megaMenu && !megaMenu.contains(e.relatedTarget)) {
        closeAll(false);
      }
    });

    trigger.addEventListener("click", function () {
      activePanel === trigger.dataset.mega
        ? closeAll(true)
        : openPanel(trigger.dataset.mega);
    });

  });


  /* ==================================================
     MEGA MENU — keep open on hover
  ================================================== */

  if (megaMenu) {

    megaMenu.addEventListener("mouseenter", function () {
      clearTimeout(closeTimer);
    });

    megaMenu.addEventListener("mouseleave", function (e) {
      const goingToTrigger = Array.from(triggers).some(function (t) {
        return t.contains(e.relatedTarget);
      });
      if (!goingToTrigger) closeAll(false);
    });

  }


  /* ==================================================
     BACKDROP click
  ================================================== */

  if (backdrop) {
    backdrop.addEventListener("click", function () { closeAll(true); });
  }


  /* ==================================================
     ESCAPE KEY
  ================================================== */

  document.addEventListener("keydown", function (e) {

    if (e.key !== "Escape") return;

    if (activePanel) {
      const trigger = document.querySelector("[data-mega='" + activePanel + "']");
      closeAll(true);
      if (trigger) trigger.focus();
      return;
    }

    if (drawerOpen) {
      closeMobileDrawer();
      if (hamburger) hamburger.focus();
    }

  });


  /* ==================================================
     FOCUS TRAP — close mega when focus leaves
  ================================================== */

  document.addEventListener("focusin", function (e) {
    if (!activePanel || !header || !megaMenu) return;
    if (!header.contains(e.target) && !megaMenu.contains(e.target)) {
      closeAll(true);
    }
  });


  /* ==================================================
     ARROW KEY NAV inside mega panel
  ================================================== */

  if (megaMenu) {

    megaMenu.addEventListener("keydown", function (e) {

      if (!activePanel) return;

      const panel = document.getElementById("mega-panel-" + activePanel);
      if (!panel) return;

      const links = Array.from(
        panel.querySelectorAll(".mega-link, .mega-intro-cta, .mega-footer-link")
      );
      const idx = links.indexOf(document.activeElement);

      if (e.key === "ArrowDown" || e.key === "ArrowRight") {
        e.preventDefault();
        (links[idx + 1] || links[0]).focus();
      }

      if (e.key === "ArrowUp" || e.key === "ArrowLeft") {
        e.preventDefault();
        (links[idx - 1] || links[links.length - 1]).focus();
      }

    });

  }


  /* ==================================================
     MOBILE DRAWER — GSAP animation
     Open:  scrim fade in → drawer slide in → items stagger
     Close: items fade → drawer slide out → scrim fade out
  ================================================== */

  let drawerOpen   = false;
  let drawerTween  = null;   /* tracks in-flight animation for interruption */

  /* ── Elements ────────────────────────────────── */
  var navLinks  = drawer ? Array.from(drawer.querySelectorAll(".mobile-nav-link")) : [];
  var drawerFooter = drawer ? drawer.querySelector(".mobile-drawer__footer") : null;

  /* ── Guard: if GSAP not loaded, fall back to CSS classes ── */
  var useGsap = (typeof gsap !== "undefined");

  /* ── Initial CSS state (GSAP owns position, not CSS anim) ─ */
  if (useGsap && drawer) {
    /* Start off-screen to the right — GSAP will tween from here */
    gsap.set(drawer, { x: "100%", display: "none" });
    if (scrim) gsap.set(scrim, { opacity: 0, display: "none" });
  }

  /* ────────────────────────────────────────────────────────────
     OPEN
  ──────────────────────────────────────────────────────────── */
  function openMobileDrawer() {
    if (drawerOpen) return;
    drawerOpen = true;

    /* Kill any in-flight close animation */
    if (drawerTween) drawerTween.kill();

    /* ARIA + state */
    drawer.setAttribute("aria-hidden", "false");
    hamburger.classList.add("is-open");
    hamburger.setAttribute("aria-expanded", "true");
    hamburger.setAttribute("aria-label", "Close navigation menu");
    document.body.style.overflow = "hidden";

    if (!useGsap) {
      /* CSS fallback */
      drawer.classList.add("is-open");
      if (scrim) scrim.classList.add("is-open");
      return;
    }

    /* Make elements visible before animating */
    gsap.set(drawer, { display: "flex" });
    if (scrim) gsap.set(scrim, { display: "block" });

    var tl = gsap.timeline();

    /* 1. Scrim fades in */
    tl.to(scrim || {}, {
      opacity:  1,
      duration: 0.25,
      ease:     "power2.out",
    });

    /* 2. Drawer slides in from right — slightly overlapping scrim */
    tl.to(drawer, {
      x:        0,
      duration: 0.42,
      ease:     "power3.out",
    }, "-=0.15");

    /* 3. Nav rows stagger up + fade in */
    tl.fromTo(navLinks, {
      opacity: 0,
      y:       10,
    }, {
      opacity:  1,
      y:        0,
      duration: 0.28,
      stagger:  0.045,
      ease:     "power2.out",
    }, "-=0.18");

    /* 4. Footer fades in */
    if (drawerFooter) {
      tl.fromTo(drawerFooter, {
        opacity: 0,
        y:       8,
      }, {
        opacity:  1,
        y:        0,
        duration: 0.22,
        ease:     "power2.out",
      }, "-=0.20");
    }

    drawerTween = tl;

    /* Move focus into drawer after slide completes */
    tl.call(function () {
      var first = drawer.querySelector(
        ".mobile-drawer__close, .mobile-nav-link"
      );
      if (first) first.focus();
    });
  }

  /* ────────────────────────────────────────────────────────────
     CLOSE
  ──────────────────────────────────────────────────────────── */
  function closeMobileDrawer() {
    if (!drawerOpen) return;
    drawerOpen = false;

    /* Kill any in-flight open animation */
    if (drawerTween) drawerTween.kill();

    /* ARIA + state */
    drawer.setAttribute("aria-hidden", "true");
    hamburger.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.setAttribute("aria-label", "Open navigation menu");

    if (!useGsap) {
      /* CSS fallback */
      drawer.classList.remove("is-open");
      if (scrim) scrim.classList.remove("is-open");
      document.body.style.overflow = "";
      return;
    }

    var tl = gsap.timeline({
      onComplete: function () {
        /* Hide after animation so it's out of tab order */
        gsap.set(drawer, { display: "none" });
        if (scrim) gsap.set(scrim, { display: "none" });
        document.body.style.overflow = "";
        /* Return focus to hamburger */
        if (hamburger) hamburger.focus();
      }
    });

    /* 1. Nav rows fade out quickly */
    tl.to(navLinks.concat(drawerFooter ? [drawerFooter] : []), {
      opacity:  0,
      y:        6,
      duration: 0.16,
      stagger:  0.02,
      ease:     "power2.in",
    });

    /* 2. Drawer slides out to the right */
    tl.to(drawer, {
      x:        "100%",
      duration: 0.36,
      ease:     "power3.in",
    }, "-=0.08");

    /* 3. Scrim fades out */
    tl.to(scrim || {}, {
      opacity:  0,
      duration: 0.22,
      ease:     "power2.in",
    }, "-=0.22");

    drawerTween = tl;
  }

  /* ── Event listeners ────────────────────────── */

  if (hamburger) {
    hamburger.addEventListener("click", function () {
      drawerOpen ? closeMobileDrawer() : openMobileDrawer();
    });
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", closeMobileDrawer);
  }

  if (scrim) {
    scrim.addEventListener("click", closeMobileDrawer);
  }

  /* Focus trap inside drawer */
  if (drawer) {
    drawer.addEventListener("keydown", function (e) {
      if (!drawerOpen) return;
      var focusable = Array.from(drawer.querySelectorAll(
        "a[href], button:not([disabled]), [tabindex]:not([tabindex='-1'])"
      ));
      if (!focusable.length) return;
      var first = focusable[0];
      var last  = focusable[focusable.length - 1];
      if (e.key === "Tab") {
        if (e.shiftKey && document.activeElement === first) {
          e.preventDefault(); last.focus();
        } else if (!e.shiftKey && document.activeElement === last) {
          e.preventDefault(); first.focus();
        }
      }
    });
  }

  /* Close on nav link tap */
  navLinks.forEach(function (link) {
    link.addEventListener("click", closeMobileDrawer);
  });

})();