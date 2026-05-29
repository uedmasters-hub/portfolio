/* =========================================
   ANIMATIONS.JS
   ========================================= */

(function () {
  "use strict";

  /* ── GENERAL FADE-IN ───────────────────── */

  const fadeEls = document.querySelectorAll(".fade-in");

  if (fadeEls.length) {
    const fadeObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("is-visible");
            fadeObs.unobserve(e.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    fadeEls.forEach(function (el) { fadeObs.observe(el); });
  }

  /* ── STAT CARDS SCROLL REVEAL (mobile) ─── */

  const statCards = document.querySelectorAll(
    ".stat-card:nth-child(3), .stat-card:nth-child(4)"
  );

  if (statCards.length) {
    const statObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("is-visible");
            statObs.unobserve(e.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -20px 0px" }
    );
    statCards.forEach(function (el) { statObs.observe(el); });
  }

  /* ── TIMELINE REVEAL ───────────────────── */

  const tlEntries = document.querySelectorAll(".tl-reveal");
  const tlTrack   = document.querySelector(".timeline__track-fill");

  if (tlEntries.length) {

    const tlObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("is-visible");
            tlObs.unobserve(e.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -60px 0px" }
    );

    tlEntries.forEach(function (el) { tlObs.observe(el); });
  }

  /* ── TIMELINE TRACK FILL ───────────────── */

  if (tlTrack) {
    const trackObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            tlTrack.classList.add("is-active");
            trackObs.disconnect();
          }
        });
      },
      { threshold: 0.05 }
    );
    trackObs.observe(tlTrack.parentElement);
  }

  /* ── PHILOSOPHY REVEAL ────────────────── */

  const philEls = document.querySelectorAll(
    ".philosophy-quote, .philosophy-attr"
  );

  if (philEls.length) {
    const philObs = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add("is-visible");
            philObs.unobserve(e.target);
          }
        });
      },
      { threshold: 0.25 }
    );
    philEls.forEach(function (el) { philObs.observe(el); });
  }

  /* ── ALREADY-VISIBLE ON LOAD ───────────── */

  setTimeout(function () {
    document.querySelectorAll(".fade-in, .tl-reveal").forEach(function (el) {
      const r = el.getBoundingClientRect();
      if (r.top < window.innerHeight * 0.92) {
        el.classList.add("is-visible");
      }
    });

    if (tlTrack) {
      const r = tlTrack.getBoundingClientRect();
      if (r.top < window.innerHeight) {
        tlTrack.classList.add("is-active");
      }
    }
  }, 120);

})();