/* =========================================
   PRELOADER.JS
   ========================================= */

(function () {
  "use strict";

  const preloader = document.getElementById("preloader");
  const bar       = document.getElementById("preloader-bar");
  const counter   = document.getElementById("preloader-counter");
  const page      = document.querySelector(".page-wrapper");

  if (!preloader) return;

  /* Lock scroll */
  document.body.classList.add("is-loading");

  /* ── PROGRESS SIMULATION ─────────────────
     Fast to 70%, then waits for real load,
     then completes to 100%
  ──────────────────────────────────────── */

  let current  = 0;
  let target   = 0;
  let raf      = null;
  let done     = false;

  function setProgress(val) {
    current = Math.min(val, 100);
    if (bar)     bar.style.width    = current + "%";
    if (counter) counter.textContent = Math.floor(current) + "%";
  }

  /* Animate toward target */
  function tick() {
    if (current < target) {
      current += (target - current) * 0.08 + 0.3;
      setProgress(current);
    }
    if (!done || current < 100) {
      raf = requestAnimationFrame(tick);
    }
  }

  /* Phase 1 — fast ramp to 70% */
  function phase1() {
    target = 70;
    raf = requestAnimationFrame(tick);
  }

  /* Phase 2 — complete to 100% after page ready */
  function phase2() {
    target = 100;
    done   = true;

    /* Give bar time to reach 100, then dismiss */
    setTimeout(dismiss, 500);
  }

  /* Dismiss preloader, reveal page */
  function dismiss() {
    cancelAnimationFrame(raf);
    setProgress(100);

    setTimeout(function () {
      /* Remove loading state */
      document.body.classList.remove("is-loading");

      /* Fade out preloader */
      preloader.classList.add("is-done");

      /* Reveal page */
      if (page) {
        setTimeout(function () {
          page.classList.add("is-revealed");
        }, 100);
      }
    }, 280);
  }

  /* ── START ───────────────────────────────── */

  /* Begin animation immediately */
  setTimeout(phase1, 650);

  /* Complete when everything is loaded */
  if (document.readyState === "complete") {
    /* Already loaded — quick finish */
    setTimeout(phase2, 900);
  } else {
    window.addEventListener("load", function () {
      /* Ensure minimum display time of 1.4s */
      const elapsed = performance.now();
      const minTime = 1400;
      const wait    = Math.max(0, minTime - elapsed);
      setTimeout(phase2, wait);
    });
  }

  /* Safety net — force dismiss after 4s no matter what */
  setTimeout(function () {
    if (!preloader.classList.contains("is-done")) {
      phase2();
    }
  }, 4000);

})();