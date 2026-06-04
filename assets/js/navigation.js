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
     MOBILE DRAWER
  ================================================== */

  let drawerOpen = false;

  function openMobileDrawer() {
    drawerOpen = true;

    drawer.classList.add("is-open");
    if (scrim) scrim.classList.add("is-open");

    hamburger.classList.add("is-open");
    hamburger.setAttribute("aria-expanded", "true");
    hamburger.setAttribute("aria-label", "Close navigation menu");

    document.body.style.overflow = "hidden";
  }

  function closeMobileDrawer() {
    drawerOpen = false;

    drawer.classList.remove("is-open");
    if (scrim) scrim.classList.remove("is-open");

    hamburger.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.setAttribute("aria-label", "Open navigation menu");

    document.body.style.overflow = "";
  }

  if (hamburger) {
    hamburger.addEventListener("click", function () {
      drawerOpen ? closeMobileDrawer() : openMobileDrawer();
    });
  }

  // Close button inside drawer
  if (closeBtn) {
    closeBtn.addEventListener("click", closeMobileDrawer);
  }

  // Scrim click closes drawer
  if (scrim) {
    scrim.addEventListener("click", closeMobileDrawer);
  }

  // Close drawer links on tap
  if (drawer) {
    drawer.querySelectorAll(".mobile-nav-link").forEach(function (link) {
      link.addEventListener("click", function () {
        closeMobileDrawer();
      });
    });
  }

})();