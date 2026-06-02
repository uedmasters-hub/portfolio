/* =============================================================
   CURSOR.JS
   Custom cursor — dot + ring + label state machine
   States: default · hover · click · text · card · label · drag · hidden
   ============================================================= */

(function () {
  "use strict";

  /* -------------------------------------------------------
     GUARD: touch / reduced motion — skip entirely
  ------------------------------------------------------- */
  if (window.matchMedia("(hover: none) and (pointer: coarse)").matches) return;
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  /* -------------------------------------------------------
     ELEMENTS
  ------------------------------------------------------- */
  var dot   = document.createElement("div");
  var ring  = document.createElement("div");
  var label = document.createElement("span");

  dot.className   = "cursor-dot";
  ring.className  = "cursor-ring";
  label.className = "cursor-label-text";

  ring.appendChild(label);
  document.body.appendChild(dot);
  document.body.appendChild(ring);
  document.body.classList.add("cursor-ready");

  /* -------------------------------------------------------
     POSITION STATE
  ------------------------------------------------------- */
  var mx = -200;  /* start off-screen */
  var my = -200;
  var rx = mx;
  var ry = my;
  var isRunning = false;

  /* Lerp factor for ring */
  var LERP = 0.12;

  /* -------------------------------------------------------
     CURRENT STATE
  ------------------------------------------------------- */
  var currentState = "default";

  function setState(state, labelText) {
    if (state === currentState && !labelText) return;
    currentState = state;

    /* Remove all state classes */
    document.body.classList.remove(
      "cursor-hover",
      "cursor-click",
      "cursor-text",
      "cursor-card",
      "cursor-label",
      "cursor-drag",
      "cursor-hidden"
    );

    if (state !== "default") {
      document.body.classList.add("cursor-" + state);
    }

    if (state === "label" && labelText) {
      label.textContent = labelText;
    } else {
      label.textContent = "";
    }
  }

  /* -------------------------------------------------------
     RAF LOOP — dot snaps, ring lerps
  ------------------------------------------------------- */
  function tick() {
    /* Dot — instant */
    dot.style.transform  = "translate(calc(" + mx + "px - 50%), calc(" + my + "px - 50%))";

    /* Ring — lerp */
    rx += (mx - rx) * LERP;
    ry += (my - ry) * LERP;
    ring.style.transform = "translate(calc(" + rx + "px - 50%), calc(" + ry + "px - 50%))";

    requestAnimationFrame(tick);
  }

  document.addEventListener("mousemove", function (e) {
    mx = e.clientX;
    my = e.clientY;

    if (!isRunning) {
      isRunning = true;
      requestAnimationFrame(tick);
    }
  });

  /* -------------------------------------------------------
     ELEMENT DETECTION — determine cursor state from target
  ------------------------------------------------------- */
  function getStateFromTarget(target) {
    if (!target) return "default";

    /* Label-carrying elements */
    if (target.closest("[data-cursor-label]")) {
      return "label";
    }

    /* Cards */
    if (target.closest(".bento-card, .transform-featured, .transform-card")) {
      return "card";
    }

    /* Draggable */
    if (target.closest("[data-cursor-drag]")) {
      return "drag";
    }

    /* Interactive */
    if (target.closest("a, button, .chip, .stat, [role='button'], .enquiry-pill, .nav a, .toc-item")) {
      return "hover";
    }

    /* Text content */
    if (target.closest("p, blockquote, li, .prose, .case-study-body, .blog-body, article")) {
      return "text";
    }

    /* Input elements — hide cursor so native cursor shows */
    if (target.closest("input, textarea, select")) {
      return "hidden";
    }

    return "default";
  }

  function getLabelFromTarget(target) {
    var el = target.closest("[data-cursor-label]");
    return el ? el.dataset.cursorLabel : "";
  }

  /* -------------------------------------------------------
     EVENT LISTENERS
  ------------------------------------------------------- */

  /* Mousemove — state detection */
  document.addEventListener("mousemove", function (e) {
    var state = getStateFromTarget(e.target);
    var lbl   = state === "label" ? getLabelFromTarget(e.target) : "";
    setState(state, lbl);
  });

  /* Mousedown / up — click state */
  document.addEventListener("mousedown", function () {
    setState("click");
  });

  document.addEventListener("mouseup", function (e) {
    var state = getStateFromTarget(e.target);
    setState(state);
  });

  /* Off screen */
  document.addEventListener("mouseleave", function () {
    setState("hidden");
  });

  document.addEventListener("mouseenter", function () {
    setState("default");
  });

  /* -------------------------------------------------------
     DATA-CURSOR-LABEL attribute usage (HTML):
     Add to any element:
       data-cursor-label="VIEW"
       data-cursor-label="EXPLORE"
       data-cursor-label="PLAY"
       data-cursor-label="OPEN"
  ------------------------------------------------------- */

})();