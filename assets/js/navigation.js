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
     Open:  drawer x:100%→0, scrim opacity:0→1, items stagger in
     Close: items fade, drawer x:0→100%, scrim opacity:1→0
  ================================================== */

  var drawerOpen  = false;
  var drawerTween = null;

  var navLinks     = drawer ? Array.from(drawer.querySelectorAll(".mobile-nav-link")) : [];
  var drawerFooter = drawer ? drawer.querySelector(".mobile-drawer__footer") : null;
  var useGsap      = (typeof gsap !== "undefined");

  /* ── Initial state ─────────────────────────────────────────────
     Set drawer off-screen and invisible via transforms/opacity.
     We do NOT use display:none — that blocks GSAP from reading
     element dimensions and fights gsap.set() overrides.
     CSS sets visibility:hidden + opacity:0 as the default state.
     GSAP tweens opacity and uses autoAlpha for visibility.        */

  if (useGsap && drawer) {
    gsap.set(drawer, {
      x:          "100%",   /* off-screen right */
      autoAlpha:  0,        /* opacity:0 + visibility:hidden */
    });
  }

  if (useGsap && scrim) {
    gsap.set(scrim, {
      autoAlpha: 0,
    });
  }

  /* Set initial state on nav items */
  if (useGsap && navLinks.length) {
    gsap.set(navLinks, { opacity: 0, y: 12 });
  }
  if (useGsap && drawerFooter) {
    gsap.set(drawerFooter, { opacity: 0, y: 8 });
  }

  /* ── OPEN ──────────────────────────────────────────────────────
     1. Re-enable pointer-events (CSS .is-gsap-open)
     2. Scrim fades in
     3. Drawer slides in from right
     4. Nav items stagger up
     5. Footer fades in
     6. Focus moves into drawer                                    */

  function openMobileDrawer() {
    if (drawerOpen) return;
    drawerOpen = true;

    if (drawerTween) drawerTween.kill();

    /* ARIA */
    drawer.setAttribute("aria-hidden", "false");
    hamburger.classList.add("is-open");
    hamburger.setAttribute("aria-expanded", "true");
    hamburger.setAttribute("aria-label", "Close navigation menu");
    document.body.style.overflow = "hidden";

    /* Enable pointer events via class */
    drawer.classList.add("is-gsap-open");
    if (scrim) scrim.classList.add("is-gsap-open");

    if (!useGsap) {
      /* CSS fallback — add class that restores visibility */
      drawer.classList.add("is-open");
      if (scrim) scrim.classList.add("is-open");
      return;
    }

    var tl = gsap.timeline();

    /* Scrim fades in */
    tl.to(scrim, {
      autoAlpha: 1,
      duration:  0.25,
      ease:      "power2.out",
    }, 0);

    /* Drawer slides in — starts immediately, overlaps scrim */
    tl.to(drawer, {
      x:         0,
      autoAlpha: 1,
      duration:  0.45,
      ease:      "power3.out",
    }, 0.05);

    /* Nav rows stagger up after drawer starts moving */
    tl.to(navLinks, {
      opacity:  1,
      y:        0,
      duration: 0.28,
      stagger:  0.045,
      ease:     "power2.out",
    }, 0.22);

    /* Footer fades in last */
    if (drawerFooter) {
      tl.to(drawerFooter, {
        opacity:  1,
        y:        0,
        duration: 0.22,
        ease:     "power2.out",
      }, 0.30);
    }

    /* Move focus to close button after slide completes */
    tl.call(function () {
      var focusTarget = drawer.querySelector(".mobile-drawer__close");
      if (focusTarget) focusTarget.focus();
    });

    drawerTween = tl;
  }

  /* ── CLOSE ─────────────────────────────────────────────────────
     1. Nav items + footer fade out
     2. Drawer slides out right
     3. Scrim fades out
     4. Pointer-events disabled (remove .is-gsap-open)
     5. Focus returns to hamburger                                 */

  function closeMobileDrawer() {
    if (!drawerOpen) return;
    drawerOpen = false;

    if (drawerTween) drawerTween.kill();

    /* ARIA */
    drawer.setAttribute("aria-hidden", "true");
    hamburger.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.setAttribute("aria-label", "Open navigation menu");

    if (!useGsap) {
      drawer.classList.remove("is-open", "is-gsap-open");
      if (scrim) scrim.classList.remove("is-open", "is-gsap-open");
      document.body.style.overflow = "";
      if (hamburger) hamburger.focus();
      return;
    }

    var tl = gsap.timeline({
      onComplete: function () {
        /* Restore scroll and pointer-events after animation */
        document.body.style.overflow = "";
        drawer.classList.remove("is-gsap-open");
        if (scrim) scrim.classList.remove("is-gsap-open");
        if (hamburger) hamburger.focus();
      }
    });

    /* Nav items + footer fade out quickly */
    var exitTargets = navLinks.slice();
    if (drawerFooter) exitTargets.push(drawerFooter);
    tl.to(exitTargets, {
      opacity:  0,
      y:        6,
      duration: 0.14,
      stagger:  0.02,
      ease:     "power2.in",
    }, 0);

    /* Drawer slides out right */
    tl.to(drawer, {
      x:         "100%",
      autoAlpha: 0,
      duration:  0.38,
      ease:      "power3.in",
    }, 0.06);

    /* Scrim fades out in sync */
    tl.to(scrim, {
      autoAlpha: 0,
      duration:  0.28,
      ease:      "power2.in",
    }, 0.08);

    drawerTween = tl;
  }

  /* ── Event listeners ─────────────────────────────────────────── */

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

  /* Focus trap */
  if (drawer) {
    drawer.addEventListener("keydown", function (e) {
      if (!drawerOpen || e.key !== "Tab") return;
      var focusable = Array.from(drawer.querySelectorAll(
        "a[href], button:not([disabled]), [tabindex]:not([tabindex='-1'])"
      )).filter(function (el) {
        return el.offsetParent !== null;  /* visible only */
      });
      if (!focusable.length) return;
      var first = focusable[0];
      var last  = focusable[focusable.length - 1];
      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault(); last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault(); first.focus();
      }
    });
  }

  /* Close on nav link tap */
  navLinks.forEach(function (link) {
    link.addEventListener("click", closeMobileDrawer);
  });

})();