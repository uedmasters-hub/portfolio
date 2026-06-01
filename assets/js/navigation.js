/**
 * assets/js/navigation.js
 *
 * Mega menu + mobile drawer interactions.
 * No dependencies — vanilla JS only.
 *
 * Behaviours:
 *  - Hover intent: open panel on mouseenter trigger,
 *    close on mouseleave (with small delay for UX comfort)
 *  - Click: toggle panel on trigger click (keyboard + touch friendly)
 *  - Backdrop click: closes all panels
 *  - Escape key: closes all panels, restores focus
 *  - Mobile hamburger: toggles drawer, locks body scroll
 *  - Respects prefers-reduced-motion
 */

(function () {

  "use strict";

  /* ==================================================
     ELEMENTS
  ================================================== */

  const header      = document.getElementById("site-header");
  const megaMenu    = document.getElementById("mega-menu");
  const backdrop    = document.getElementById("mega-backdrop");
  const hamburger   = document.getElementById("hamburger-btn");
  const drawer      = document.getElementById("mobile-drawer");

  const triggers    = document.querySelectorAll("[data-mega]");

  /* ==================================================
     STATE
  ================================================== */

  let activePanel   = null;    // currently open panel key
  let closeTimer    = null;    // delayed-close timeout
  const CLOSE_DELAY = 140;     // ms — feel natural, not instant

  /* ==================================================
     OPEN PANEL
  ================================================== */

  function openPanel(key) {

    clearTimeout(closeTimer);

    // Already open — nothing to do
    if (activePanel === key) return;

    // Deactivate any currently open panel + trigger
    closeAll(true); // silent = skip delay

    const panel   = document.getElementById("mega-panel-" + key);
    const trigger = document.querySelector("[data-mega='" + key + "']");

    if (!panel || !trigger) return;

    // Activate
    panel.classList.add("is-active");
    megaMenu.classList.add("is-open");
    backdrop.classList.add("is-visible");
    header.classList.add("mega-open");

    trigger.setAttribute("aria-expanded", "true");

    activePanel = key;
  }

  /* ==================================================
     CLOSE ALL PANELS
  ================================================== */

  function closeAll(silent) {

    if (silent) {
      _doClose();
      return;
    }

    clearTimeout(closeTimer);

    closeTimer = setTimeout(_doClose, CLOSE_DELAY);
  }

  function _doClose() {

    // Deactivate panels
    document.querySelectorAll(".mega-panel.is-active")
      .forEach(function (p) { p.classList.remove("is-active"); });

    // Reset triggers
    triggers.forEach(function (t) {
      t.setAttribute("aria-expanded", "false");
    });

    megaMenu.classList.remove("is-open");
    backdrop.classList.remove("is-visible");
    header.classList.remove("mega-open");

    activePanel = null;
  }

  /* ==================================================
     TRIGGER — HOVER
  ================================================== */

  triggers.forEach(function (trigger) {

    trigger.addEventListener("mouseenter", function () {
      openPanel(trigger.dataset.mega);
    });

    trigger.addEventListener("mouseleave", function (e) {
      // Only schedule close if mouse isn't going into mega menu
      if (!megaMenu.contains(e.relatedTarget)) {
        closeAll(false);
      }
    });

  });

  /* ==================================================
     TRIGGER — CLICK (keyboard / touch)
  ================================================== */

  triggers.forEach(function (trigger) {

    trigger.addEventListener("click", function () {

      if (activePanel === trigger.dataset.mega) {
        closeAll(true);
      } else {
        openPanel(trigger.dataset.mega);
      }

    });

  });

  /* ==================================================
     MEGA MENU — keep open when mouse is inside
  ================================================== */

  if (megaMenu) {

    megaMenu.addEventListener("mouseenter", function () {
      clearTimeout(closeTimer);
    });

    megaMenu.addEventListener("mouseleave", function (e) {
      // Only close if mouse isn't going back to a trigger
      const goingToTrigger = Array.from(triggers).some(function (t) {
        return t.contains(e.relatedTarget);
      });

      if (!goingToTrigger) {
        closeAll(false);
      }
    });

  }

  /* ==================================================
     BACKDROP — click to close
  ================================================== */

  if (backdrop) {
    backdrop.addEventListener("click", function () {
      closeAll(true);
    });
  }

  /* ==================================================
     ESCAPE KEY
  ================================================== */

  document.addEventListener("keydown", function (e) {

    if (e.key === "Escape") {

      if (activePanel) {
        // Return focus to the trigger that opened the panel
        const trigger = document.querySelector(
          "[data-mega='" + activePanel + "']"
        );
        closeAll(true);
        if (trigger) trigger.focus();
        return;
      }

      if (drawerOpen) {
        closeMobileDrawer();
        hamburger.focus();
      }

    }

  });

  /* ==================================================
     FOCUS TRAP — close mega when focus leaves
  ================================================== */

  document.addEventListener("focusin", function (e) {

    if (!activePanel) return;

    const inHeader = header.contains(e.target);
    const inMenu   = megaMenu.contains(e.target);

    if (!inHeader && !inMenu) {
      closeAll(true);
    }

  });

  /* ==================================================
     MOBILE DRAWER
  ================================================== */

  let drawerOpen = false;

  function openMobileDrawer() {
    drawerOpen = true;

    drawer.classList.add("is-open");

    hamburger.classList.add("is-open");
    hamburger.setAttribute("aria-expanded", "true");
    hamburger.setAttribute("aria-label", "Close navigation menu");

    document.body.style.overflow = "hidden";
  }

  function closeMobileDrawer() {
    drawerOpen = false;

    drawer.classList.remove("is-open");

    hamburger.classList.remove("is-open");
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.setAttribute("aria-label", "Open navigation menu");

    document.body.style.overflow = "";
  }

  if (hamburger) {

    hamburger.addEventListener("click", function () {
      if (drawerOpen) {
        closeMobileDrawer();
      } else {
        openMobileDrawer();
      }
    });

  }

  /* ==================================================
     SCROLL — add subtle elevation to header on scroll
  ================================================== */

  let lastScroll = 0;

  window.addEventListener("scroll", function () {

    const y = window.scrollY;

    if (y > 10 && lastScroll <= 10) {
      header.style.borderBottomColor = "rgba(0,0,0,0.09)";
    } else if (y <= 10 && lastScroll > 10) {
      header.style.borderBottomColor = "";
    }

    // Close mega on scroll
    if (activePanel && Math.abs(y - lastScroll) > 40) {
      closeAll(true);
    }

    lastScroll = y;

  }, { passive: true });

  /* ==================================================
     KEYBOARD NAVIGATION INSIDE MEGA PANEL
     Arrow keys move between .mega-link items
  ================================================== */

  if (megaMenu) {

    megaMenu.addEventListener("keydown", function (e) {

      if (!activePanel) return;

      const panel = document.getElementById("mega-panel-" + activePanel);
      if (!panel) return;

      const links = Array.from(panel.querySelectorAll(".mega-link, .mega-intro-cta, .mega-footer-link"));
      const idx   = links.indexOf(document.activeElement);

      if (e.key === "ArrowDown" || e.key === "ArrowRight") {
        e.preventDefault();
        const next = links[idx + 1] || links[0];
        next.focus();
      }

      if (e.key === "ArrowUp" || e.key === "ArrowLeft") {
        e.preventDefault();
        const prev = links[idx - 1] || links[links.length - 1];
        prev.focus();
      }

      if (e.key === "Tab" && !e.shiftKey) {
        // Let tab flow naturally — focusin handler will close if needed
      }

    });

  }

})();