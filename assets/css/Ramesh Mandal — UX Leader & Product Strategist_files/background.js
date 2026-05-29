/* =========================================
   BACKGROUND.JS
   ========================================= */

(function () {

  "use strict";

  /* ── THEMES ────────────────────────────── */

  const themes = [

    // Soft Blue — default
    `radial-gradient(
       ellipse 900px 700px at top left,
       rgba(210,225,255,0.70),
       #f5f5f3 55%
     )`,

    // Soft Green
    `radial-gradient(
       ellipse 800px 600px at top right,
       rgba(215,242,225,0.70),
       #f5f5f3 55%
     )`,

    // Soft Rose
    `radial-gradient(
       ellipse 800px 600px at bottom left,
       rgba(250,220,228,0.65),
       #f5f5f3 55%
     )`,

    // Soft Lavender
    `radial-gradient(
       ellipse 800px 600px at bottom right,
       rgba(230,222,255,0.65),
       #f5f5f3 55%
     )`

  ];

  let current = 0;

  /* ── APPLY THEME ───────────────────────── */

  function applyTheme(index) {
    document.body.style.background = themes[index];
  }

  /* ── CYCLE ─────────────────────────────── */

  function nextTheme() {
    current = (current + 1) % themes.length;
    applyTheme(current);
  }

  /* ── INIT ──────────────────────────────── */

  applyTheme(0);

  setInterval(nextTheme, 10000);

  /* ── MOUSE GLOW ────────────────────────── */

  const glow = document.querySelector(".bg-mouse-glow");

  if (glow && window.matchMedia("(pointer: fine)").matches) {

    document.addEventListener("mousemove", function (e) {
      glow.style.left = e.clientX + "px";
      glow.style.top  = e.clientY + "px";
    }, { passive: true });

  }

})();
