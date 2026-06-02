/* =============================================================
   BACKGROUND.JS — Animated mesh gradient
   6epixels.com · Ramesh Mandal Portfolio

   Technique: Canvas 2D radial gradient blobs with per-blob
   Lissajous-style position oscillation. No WebGL required.
   Zero dependencies.

   Drop-in for the existing background.js.
   Replaces: orb CSS animations + mouse-light gradient swap.
   Keeps:    .background, .grid, .mouse-light DOM elements.
             Mouse-light is now handled here with lerp.
   ============================================================= */

(function () {
  "use strict";

  /* -------------------------------------------------------
     GUARD
  ------------------------------------------------------- */
  var prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* -------------------------------------------------------
     COLOUR PALETTE — strictly #f5f5f3 base + #1a46c9 blue
     All blobs are blue-family tints on the warm near-white.
  ------------------------------------------------------- */

  /*
    Each blob:
      r, g, b   — RGB of blob centre colour
      ox, oy    — origin (0–1 of canvas W/H)
      rx, ry    — radius scale (0–1 of canvas W/H)
      spd       — animation speed multiplier
      ph        — phase offset (radians) so blobs don't sync
      op        — peak opacity at centre
  */
  var BLOBS = [
    /* Large primary blue — top-left anchor */
    { r:207, g:220, b:255, ox:0.10, oy:0.15, rx:0.58, ry:0.50, spd:1.00, ph:0.00, op:0.88 },

    /* Secondary blue — bottom-right */
    { r:215, g:226, b:255, ox:0.88, oy:0.80, rx:0.52, ry:0.46, spd:0.78, ph:1.40, op:0.82 },

    /* Softer indigo — top-right drift */
    { r:225, g:230, b:255, ox:0.82, oy:0.12, rx:0.42, ry:0.36, spd:1.15, ph:2.70, op:0.72 },

    /* Light blue-grey — bottom-left */
    { r:218, g:228, b:248, ox:0.08, oy:0.82, rx:0.44, ry:0.40, spd:0.90, ph:4.10, op:0.78 },

    /* Very pale blue — centre wander */
    { r:230, g:236, b:255, ox:0.50, oy:0.50, rx:0.36, ry:0.30, spd:1.30, ph:5.50, op:0.65 },

    /* Accent — pure blue ghost, small */
    { r:180, g:205, b:255, ox:0.65, oy:0.30, rx:0.28, ry:0.24, spd:1.60, ph:0.90, op:0.58 },
  ];

  /* Base speed — adjust to taste (lower = slower) */
  var BASE_SPEED = 0.000055;

  /* How far each blob drifts from its origin (0–1 of W/H) */
  var DRIFT_X = 0.13;
  var DRIFT_Y = 0.11;

  /* -------------------------------------------------------
     CANVAS SETUP
     We create a HIDDEN canvas behind the grid overlay.
     The .background div stays as the container.
  ------------------------------------------------------- */

  var bg   = document.querySelector(".background");
  var grid = bg ? bg.querySelector(".grid") : null;

  /* Create canvas as first child of .background */
  var canvas = document.createElement("canvas");
  canvas.id  = "bg-canvas";
  canvas.setAttribute("aria-hidden", "true");
  canvas.style.cssText = [
    "position:absolute",
    "inset:0",
    "width:100%",
    "height:100%",
    "display:block",
    "z-index:0"
  ].join(";");

  if (bg) {
    bg.insertBefore(canvas, bg.firstChild);
    /* Ensure grid is above canvas */
    if (grid) grid.style.zIndex = "1";
  } else {
    /* Fallback: append to body */
    document.body.appendChild(canvas);
  }

  var ctx = canvas.getContext("2d");
  var W   = 0;
  var H   = 0;
  var dpr = Math.min(window.devicePixelRatio || 1, 2); /* cap at 2x */

  function resize() {
    var container = bg || document.documentElement;
    W = container.offsetWidth  || window.innerWidth;
    H = container.offsetHeight || window.innerHeight;

    canvas.width  = Math.round(W * dpr);
    canvas.height = Math.round(H * dpr);
    canvas.style.width  = W + "px";
    canvas.style.height = H + "px";

    ctx.setTransform(1, 0, 0, 1, 0, 0); /* reset */
    ctx.scale(dpr, dpr);
  }

  /* -------------------------------------------------------
     DRAW SINGLE BLOB
  ------------------------------------------------------- */

  function drawBlob(blob, t) {
    var phase = t * BASE_SPEED * blob.spd + blob.ph;

    /* Lissajous drift — each axis on different frequency */
    var cx = (blob.ox + DRIFT_X * Math.sin(phase * 1.31 + blob.ph * 0.7)) * W;
    var cy = (blob.oy + DRIFT_Y * Math.cos(phase * 0.93 + blob.ph * 0.5)) * H;

    /* Breathing radius */
    var rw = (blob.rx + 0.04 * Math.cos(phase * 1.12 + 2.2)) * W;
    var rh = (blob.ry + 0.04 * Math.sin(phase * 1.41 + 0.3)) * H;

    var maxR = Math.max(rw, rh);

    var grd = ctx.createRadialGradient(cx, cy, 0, cx, cy, maxR);
    grd.addColorStop(0.00, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + blob.op      + ")");
    grd.addColorStop(0.35, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + (blob.op * 0.60) + ")");
    grd.addColorStop(0.70, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + (blob.op * 0.20) + ")");
    grd.addColorStop(1.00, "rgba(" + blob.r + "," + blob.g + "," + blob.b + ",0)");

    /* Ellipse: scale Y axis */
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(1, rh / rw);
    ctx.translate(-cx, -cy);

    ctx.beginPath();
    ctx.arc(cx, cy, rw, 0, Math.PI * 2);
    ctx.fillStyle = grd;
    ctx.fill();

    ctx.restore();
  }

  /* -------------------------------------------------------
     MAIN DRAW LOOP
  ------------------------------------------------------- */

  var rafId = null;

  function draw(t) {
    ctx.clearRect(0, 0, W, H);

    /* Fill base colour — #f5f5f3 */
    ctx.fillStyle = "#f5f5f3";
    ctx.fillRect(0, 0, W, H);

    /* Draw blobs back-to-front (larger first) */
    for (var i = 0; i < BLOBS.length; i++) {
      drawBlob(BLOBS[i], t);
    }

    rafId = requestAnimationFrame(draw);
  }

  /* -------------------------------------------------------
     MOUSE LIGHT — lerp follow
     Replaces the CSS-only mouse-light div behaviour.
  ------------------------------------------------------- */

  var mouseLight = document.querySelector(".mouse-light");

  if (mouseLight) {
    var mlX = window.innerWidth  / 2;
    var mlY = window.innerHeight / 2;
    var mlCX = mlX;
    var mlCY = mlY;
    var LERP = 0.08;

    document.addEventListener("mousemove", function (e) {
      mlX = e.clientX;
      mlY = e.clientY;
    });

    function tickMouseLight() {
      mlCX += (mlX - mlCX) * LERP;
      mlCY += (mlY - mlCY) * LERP;
      mouseLight.style.left = mlCX + "px";
      mouseLight.style.top  = mlCY + "px";
      requestAnimationFrame(tickMouseLight);
    }

    tickMouseLight();
  }

  /* -------------------------------------------------------
     BACKGROUND THEME SYNC
     The JS background theme-switcher (THEMES array) in the
     old script.js is now superseded. If you kept that file,
     remove the setInterval(updateBackground) call.
     The canvas handles all background rendering.

     If you want a dark variant at night, call:
       window.BG.setDark()  /  window.BG.setLight()
  ------------------------------------------------------- */

  var DARK_BLOBS = [
    { r:26,  g:55,  b:160, ox:0.10, oy:0.15, rx:0.55, ry:0.48, spd:1.00, ph:0.00, op:0.55 },
    { r:18,  g:42,  b:130, ox:0.88, oy:0.80, rx:0.50, ry:0.44, spd:0.78, ph:1.40, op:0.50 },
    { r:35,  g:65,  b:175, ox:0.82, oy:0.12, rx:0.40, ry:0.34, spd:1.15, ph:2.70, op:0.45 },
    { r:14,  g:36,  b:110, ox:0.08, oy:0.82, rx:0.42, ry:0.38, spd:0.90, ph:4.10, op:0.48 },
    { r:40,  g:72,  b:180, ox:0.50, oy:0.50, rx:0.34, ry:0.28, spd:1.30, ph:5.50, op:0.40 },
    { r:20,  g:50,  b:150, ox:0.65, oy:0.30, rx:0.26, ry:0.22, spd:1.60, ph:0.90, op:0.38 },
  ];

  var currentBlobs = BLOBS;
  var isDark       = false;
  var BASE_COLOR   = "#f5f5f3";
  var DARK_COLOR   = "#0b0d14";

  window.BG = {
    setLight: function () {
      isDark       = false;
      currentBlobs = BLOBS;
      BASE_COLOR   = "#f5f5f3";
    },
    setDark: function () {
      isDark       = true;
      currentBlobs = DARK_BLOBS;
      BASE_COLOR   = "#0b0d14";
    }
  };

  /* Patch drawBlob to use currentBlobs */
  function drawBlobDynamic(blob, t) {
    var phase = t * BASE_SPEED * blob.spd + blob.ph;
    var cx = (blob.ox + DRIFT_X * Math.sin(phase * 1.31 + blob.ph * 0.7)) * W;
    var cy = (blob.oy + DRIFT_Y * Math.cos(phase * 0.93 + blob.ph * 0.5)) * H;
    var rw = (blob.rx + 0.04 * Math.cos(phase * 1.12 + 2.2)) * W;
    var rh = (blob.ry + 0.04 * Math.sin(phase * 1.41 + 0.3)) * H;
    var maxR = Math.max(rw, rh);
    var grd  = ctx.createRadialGradient(cx, cy, 0, cx, cy, maxR);
    grd.addColorStop(0.00, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + blob.op           + ")");
    grd.addColorStop(0.35, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + (blob.op * 0.60)  + ")");
    grd.addColorStop(0.70, "rgba(" + blob.r + "," + blob.g + "," + blob.b + "," + (blob.op * 0.20)  + ")");
    grd.addColorStop(1.00, "rgba(" + blob.r + "," + blob.g + "," + blob.b + ",0)");
    ctx.save();
    ctx.translate(cx, cy);
    ctx.scale(1, rh / rw);
    ctx.translate(-cx, -cy);
    ctx.beginPath();
    ctx.arc(cx, cy, rw, 0, Math.PI * 2);
    ctx.fillStyle = grd;
    ctx.fill();
    ctx.restore();
  }

  /* -------------------------------------------------------
     REDUCED MOTION — static single gradient, no RAF loop
  ------------------------------------------------------- */

  if (prefersReduced) {
    resize();
    /* Draw once — static */
    ctx.fillStyle = "#f5f5f3";
    ctx.fillRect(0, 0, W, H);

    var staticGrd = ctx.createRadialGradient(W * 0.15, H * 0.2, 0, W * 0.5, H * 0.5, W * 0.8);
    staticGrd.addColorStop(0, "rgba(207,220,255,0.7)");
    staticGrd.addColorStop(1, "rgba(245,245,243,0)");
    ctx.fillStyle = staticGrd;
    ctx.fillRect(0, 0, W, H);

    /* remove orb animations from CSS */
    var orbs = document.querySelectorAll(".orb");
    orbs.forEach(function (o) { o.style.animation = "none"; });
    return;
  }

  /* -------------------------------------------------------
     FINAL DRAW LOOP (dynamic)
  ------------------------------------------------------- */

  function drawFull(t) {
    ctx.clearRect(0, 0, W, H);
    ctx.fillStyle = BASE_COLOR;
    ctx.fillRect(0, 0, W, H);

    for (var i = 0; i < currentBlobs.length; i++) {
      drawBlobDynamic(currentBlobs[i], t);
    }

    rafId = requestAnimationFrame(drawFull);
  }

  /* -------------------------------------------------------
     INIT + RESIZE
  ------------------------------------------------------- */

  function init() {
    resize();

    /* Hide the old orbs — canvas replaces them */
    var orbs = document.querySelectorAll(".orb");
    orbs.forEach(function (o) {
      o.style.display = "none";
    });

    /* Remove old JS background theme cycle if present */
    /* (the THEMES array / setInterval in old script.js) */

    requestAnimationFrame(drawFull);

    window.addEventListener("resize", function () {
      cancelAnimationFrame(rafId);
      resize();
      requestAnimationFrame(drawFull);
    }, { passive: true });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init();
  }

})();