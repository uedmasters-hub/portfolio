/* =========================================
   APP.JS — main init
   ========================================= */

(function () {

  "use strict";

  /* ── SMART NAV — hide on scroll down, reveal on scroll up ── */

(function () {

  const header   = document.querySelector(".site-header");
  if (!header) return;

  const THRESHOLD  = 80;    // px from top before behaviour activates
  const DELTA      = 6;     // min px scrolled to register direction
  const IDLE_MS    = 2500;  // ms idle before auto-reveal

  let lastY        = 0;
  let ticking      = false;
  let idleTimer    = null;

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(update);
  }

  function update() {
    const y     = window.scrollY;
    const delta = y - lastY;

    /* Always visible at top */
    if (y <= THRESHOLD) {
      show();
      header.classList.remove("is-elevated");
      lastY   = y;
      ticking = false;
      return;
    }

    header.classList.add("is-elevated");

    /* Scrolling DOWN past threshold — hide */
    if (delta > DELTA) {
      hide();
      resetIdle();
    }

    /* Scrolling UP — reveal */
    else if (delta < -DELTA) {
      show();
      clearIdleTimer();
    }

    lastY   = y;
    ticking = false;
  }

  function show() {
    header.classList.remove("is-hidden");
  }

  function hide() {
    header.classList.add("is-hidden");
  }

  /* Auto-reveal after idle — user stopped scrolling */
  function resetIdle() {
    clearIdleTimer();
    idleTimer = setTimeout(function () {
      show();
    }, IDLE_MS);
  }

  function clearIdleTimer() {
    if (idleTimer) {
      clearTimeout(idleTimer);
      idleTimer = null;
    }
  }

  window.addEventListener("scroll", onScroll, { passive: true });

})();

/* ── ACTIVE NAV ────────────────────────── */

  const path  = window.location.pathname;
  const links = document.querySelectorAll(".site-nav__link");

  links.forEach(function (link) {
    if (link.getAttribute("href") === path ||
        (path === "/" && link.getAttribute("href") === "/")) {
      link.classList.add("is-active");
    }
  });

  /* ── STAT CARD 3D TILT ─────────────────── */

  const cards = document.querySelectorAll(".stat-card");

  cards.forEach(function (card) {

    card.addEventListener("mousemove", function (e) {

      const rect   = card.getBoundingClientRect();
      const x      = e.clientX - rect.left - rect.width  / 2;
      const y      = e.clientY - rect.top  - rect.height / 2;
      const rotY   = (x / rect.width)  *  8;
      const rotX   = (y / rect.height) * -8;

      card.style.transform =
        `perspective(1200px) rotateX(${rotX}deg) rotateY(${rotY}deg) translateY(-5px)`;

    });

    card.addEventListener("mouseleave", function () {
      card.style.transform = "";
    });

  });

})();

/* ── MOBILE NAV DRAWER ─────────────────────── */

(function () {

  const hamburger = document.querySelector(".nav-hamburger");
  const drawer    = document.querySelector(".nav-drawer");
  const close     = document.querySelector(".nav-drawer__close");

  if (!hamburger || !drawer) return;

  function openDrawer() {
    drawer.classList.add("is-open");
    hamburger.classList.add("is-active");
    hamburger.setAttribute("aria-expanded", "true");
    drawer.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  function closeDrawer() {
    drawer.classList.remove("is-open");
    hamburger.classList.remove("is-active");
    hamburger.setAttribute("aria-expanded", "false");
    drawer.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  hamburger.addEventListener("click", openDrawer);
  if (close) close.addEventListener("click", closeDrawer);

  // close on backdrop tap
  drawer.addEventListener("click", function (e) {
    if (e.target === drawer) closeDrawer();
  });

  // close on Escape
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closeDrawer();
  });

})();