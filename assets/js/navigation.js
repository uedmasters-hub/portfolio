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
     MOBILE DRAWER — clean GSAP implementation
     Single source of truth: drawerState = "closed" | "open"
     GSAP is the only animation system. CSS has zero animation.
     display is toggled by GSAP — never by CSS class.
  ================================================== */

  (function initDrawer() {

    /* ── Element refs ────────────────────────────────────────── */
    var _hamburger = document.getElementById("hamburger-btn");
    var _drawer    = document.getElementById("mobile-drawer");
    var _scrim     = document.getElementById("mobile-scrim");
    var _closeBtn  = document.getElementById("drawer-close-btn");

    /* Bail if critical elements are missing */
    if (!_hamburger || !_drawer) return;

    var _navLinks = Array.from(_drawer.querySelectorAll(".mobile-nav-link"));
    var _footer   = _drawer.querySelector(".mobile-drawer__footer");
    var _header   = _drawer.querySelector(".mobile-drawer__header");

    /* ── Single source of truth ──────────────────────────────── */
    var drawerState = "closed";  /* "closed" | "open" | "animating" */
    var activeTween = null;

    /* ── GSAP guard ──────────────────────────────────────────── */
    if (typeof gsap === "undefined") {
      /* No GSAP — wire up CSS class fallback and return */
      _hamburger.addEventListener("click", function () {
        var open = _drawer.classList.toggle("is-open");
        if (_scrim) _scrim.classList.toggle("is-open", open);
        _hamburger.setAttribute("aria-expanded", String(open));
        document.body.style.overflow = open ? "hidden" : "";
      });
      if (_closeBtn) _closeBtn.addEventListener("click", function () {
        _drawer.classList.remove("is-open");
        if (_scrim) _scrim.classList.remove("is-open");
        _hamburger.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
      });
      return;
    }

    /* ── Set initial CSS state ───────────────────────────────── */
    /* Drawer: off-screen right, hidden, not interactive.
       We use gsap.set so GSAP owns the transform and display.
       CSS .mobile-drawer keeps position:fixed / size / colors.
       CSS .mobile-drawer does NOT set display or transform.     */
    gsap.set(_drawer, {
      display:       "none",
      x:             "100%",
      opacity:       1,          /* opacity stays 1 — we slide, not fade */
    });

    if (_scrim) {
      gsap.set(_scrim, {
        display: "none",
        opacity: 0,
      });
    }

    /* Nav rows and footer: prepare for stagger-in */
    gsap.set(_navLinks, { opacity: 0, x: 16 });
    if (_footer) gsap.set(_footer, { opacity: 0, y: 8 });

    /* ── OPEN ─────────────────────────────────────────────────── */
    function openDrawer() {
      if (drawerState === "open" || drawerState === "animating") return;
      drawerState = "animating";

      /* Kill any in-flight close */
      if (activeTween) activeTween.kill();

      /* State: ARIA + hamburger icon + scroll lock */
      _hamburger.classList.add("is-open");
      _hamburger.setAttribute("aria-expanded", "true");
      _hamburger.setAttribute("aria-label", "Close navigation menu");
      _drawer.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";

      /* Make elements visible before animating */
      gsap.set(_drawer, { display: "flex" });
      if (_scrim) gsap.set(_scrim, { display: "block" });

      var tl = gsap.timeline({
        onComplete: function () {
          drawerState = "open";
          /* Move focus inside */
          var focus = _drawer.querySelector(".mobile-drawer__close") || _navLinks[0];
          if (focus) focus.focus();
        }
      });

      /* Scrim fades in */
      if (_scrim) {
        tl.to(_scrim, {
          opacity:  1,
          duration: 0.22,
          ease:     "power2.out",
        }, 0);
      }

      /* Drawer slides in from right */
      tl.to(_drawer, {
        x:        0,
        duration: 0.40,
        ease:     "power3.out",
      }, 0);

      /* Nav rows stagger in — start after drawer is mostly in */
      tl.to(_navLinks, {
        opacity:  1,
        x:        0,
        duration: 0.24,
        stagger:  0.04,
        ease:     "power2.out",
      }, 0.22);

      /* Footer fades in */
      if (_footer) {
        tl.to(_footer, {
          opacity:  1,
          y:        0,
          duration: 0.20,
          ease:     "power2.out",
        }, 0.30);
      }

      activeTween = tl;
    }

    /* ── CLOSE ────────────────────────────────────────────────── */
    function closeDrawer() {
      if (drawerState === "closed" || drawerState === "animating") return;
      drawerState = "animating";

      /* Kill any in-flight open */
      if (activeTween) activeTween.kill();

      /* State: ARIA + hamburger icon */
      _hamburger.classList.remove("is-open");
      _hamburger.setAttribute("aria-expanded", "false");
      _hamburger.setAttribute("aria-label", "Open navigation menu");
      _drawer.setAttribute("aria-hidden", "true");

      var tl = gsap.timeline({
        onComplete: function () {
          /* Hide elements — GSAP sets display:none */
          gsap.set(_drawer, { display: "none" });
          if (_scrim) gsap.set(_scrim, { display: "none" });

          /* Reset nav items to initial state for next open */
          gsap.set(_navLinks, { opacity: 0, x: 16 });
          if (_footer) gsap.set(_footer, { opacity: 0, y: 8 });

          /* Restore scroll and return focus */
          document.body.style.overflow = "";
          _hamburger.focus();
          drawerState = "closed";
        }
      });

      /* Nav rows + footer out quickly */
      var exitEls = _footer ? _navLinks.concat([_footer]) : _navLinks.slice();
      tl.to(exitEls, {
        opacity:  0,
        x:        12,
        duration: 0.14,
        stagger:  0.02,
        ease:     "power2.in",
      }, 0);

      /* Drawer slides out right */
      tl.to(_drawer, {
        x:        "100%",
        duration: 0.34,
        ease:     "power3.in",
      }, 0.04);

      /* Scrim fades out */
      if (_scrim) {
        tl.to(_scrim, {
          opacity:  0,
          duration: 0.26,
          ease:     "power2.in",
        }, 0.06);
      }

      activeTween = tl;
    }

    /* ── Event listeners ──────────────────────────────────────── */

    _hamburger.addEventListener("click", function () {
      if (drawerState === "closed") openDrawer();
      else if (drawerState === "open") closeDrawer();
    });

    if (_closeBtn) {
      _closeBtn.addEventListener("click", closeDrawer);
    }

    if (_scrim) {
      _scrim.addEventListener("click", closeDrawer);
    }

    /* Nav link taps close the drawer */
    _navLinks.forEach(function (link) {
      link.addEventListener("click", closeDrawer);
    });

    /* Escape key */
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && drawerState === "open") {
        closeDrawer();
      }
    });

    /* Focus trap */
    _drawer.addEventListener("keydown", function (e) {
      if (drawerState !== "open" || e.key !== "Tab") return;
      var focusable = Array.from(_drawer.querySelectorAll(
        "a[href], button:not([disabled]), [tabindex]:not([tabindex='-1'])"
      ));
      if (focusable.length < 2) return;
      var first = focusable[0];
      var last  = focusable[focusable.length - 1];
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    });

  })(); /* end initDrawer */


})();