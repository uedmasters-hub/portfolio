/**
 * assets/js/preloader.js
 *
 * Two-phase preloader:
 *   Phase 1 — animates quickly to 70% on DOMContentLoaded
 *   Phase 2 — completes to 100% on window.load
 *
 * SAFETY NET: If window.load never fires (broken image,
 * blocked resource, slow CDN), a 4s hard timeout forces
 * completion so the user is never stuck.
 */

(function () {

  "use strict";

  /* ==================================================
     ELEMENTS
  ================================================== */

  const preloader = document.getElementById("preloader");
  const bar       = document.getElementById("preloader-bar");
  const counter   = document.getElementById("preloader-counter");

  // Guard — if preloader HTML doesn't exist, bail silently
  if (!preloader) return;

  /* ==================================================
     STATE
  ================================================== */

  let current     = 0;      // current displayed %
  let target      = 0;      // target %
  let rafId       = null;   // requestAnimationFrame id
  let completed   = false;  // prevent double-completion
  let safetyTimer = null;   // hard timeout handle

  /* ==================================================
     UPDATE DISPLAY
  ================================================== */

  function setProgress(pct) {
    if (bar)     bar.style.width = pct + "%";
    if (counter) counter.textContent = Math.round(pct) + "%";
  }

  /* ==================================================
     SMOOTH TICK — lerp current toward target
  ================================================== */

  function tick() {
    if (completed) return;

    const diff = target - current;

    if (Math.abs(diff) < 0.4) {
      current = target;
    } else {
      // Ease: faster when far, slower near target
      current += diff * 0.07;
    }

    setProgress(current);

    if (current < target) {
      rafId = requestAnimationFrame(tick);
    }

    // If we've reached 100, dismiss
    if (current >= 100) {
      dismiss();
    }
  }

  function animateTo(pct) {
    target = pct;
    cancelAnimationFrame(rafId);
    rafId = requestAnimationFrame(tick);
  }

  /* ==================================================
     DISMISS — fade out preloader, reveal page
  ================================================== */

  function dismiss() {
    if (completed) return;
    completed = true;

    clearTimeout(safetyTimer);
    cancelAnimationFrame(rafId);

    // Snap to 100% visually
    setProgress(100);

    // Short pause at 100% so user sees it complete
    setTimeout(function () {

      preloader.style.transition = "opacity 0.5s ease";
      preloader.style.opacity    = "0";

      setTimeout(function () {

        preloader.style.display = "none";

        // Unlock scroll
        document.body.classList.remove("is-loading");
        document.body.classList.add("is-revealed");

      }, 500);

    }, 200);
  }

  /* ==================================================
     LOCK SCROLL during preload
  ================================================== */

  document.body.classList.add("is-loading");

  /* ==================================================
     PHASE 1 — DOM ready → animate to 70%
  ================================================== */

  // Start immediately (DOM is already parsed when this runs)
  animateTo(70);

  /* ==================================================
     PHASE 2 — window.load → complete to 100%
  ================================================== */

  window.addEventListener("load", function () {
    animateTo(100);
  });

  /* ==================================================
     SAFETY NET — force complete after 4 seconds
     Catches: broken images, slow CDN, blocked scripts
  ================================================== */

  safetyTimer = setTimeout(function () {
    if (!completed) {
      animateTo(100);
    }
  }, 4000);

})();