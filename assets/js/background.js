/* =============================================================
   BACKGROUND.JS — Full-page animated gradient
   6epixels.com · Ramesh Mandal Portfolio

   Approach: CSS-only animated gradient on <body> itself.
   No canvas, no fixed div clipping issues.
   Very subtle blue tints drifting slowly across #f5f5f3.
   Covers 100% of every page, all sections, no white gaps.
   ============================================================= */

(function () {
  "use strict";

  /* -------------------------------------------------------
     REDUCED MOTION — static fallback, no animation
  ------------------------------------------------------- */
  var prefersReduced = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;

  /* -------------------------------------------------------
     MOUSE LIGHT — lerp follow (kept from original)
  ------------------------------------------------------- */
  var mouseLight = document.querySelector(".mouse-light");

  if (mouseLight && !prefersReduced) {
    var mlX  = window.innerWidth  / 2;
    var mlY  = window.innerHeight / 2;
    var mlCX = mlX;
    var mlCY = mlY;

    document.addEventListener("mousemove", function (e) {
      mlX = e.clientX;
      mlY = e.clientY;
    });

    (function tick() {
      mlCX += (mlX - mlCX) * 0.07;
      mlCY += (mlY - mlCY) * 0.07;
      mouseLight.style.left = mlCX + "px";
      mouseLight.style.top  = mlCY + "px";
      requestAnimationFrame(tick);
    })();
  }

  /* -------------------------------------------------------
     OLD ORBS — hide them, background.css handles everything
  ------------------------------------------------------- */
  var orbs = document.querySelectorAll(".orb");
  orbs.forEach(function (o) { o.style.display = "none"; });

  /* -------------------------------------------------------
     CANVAS — remove if it exists from previous version
  ------------------------------------------------------- */
  var oldCanvas = document.getElementById("bg-canvas");
  if (oldCanvas) oldCanvas.remove();

})();