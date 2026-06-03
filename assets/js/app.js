/* =============================================================
   APP.JS — Mobile drawer controller
   Open · Close · Focus trap · Keyboard · Body scroll lock
   ============================================================= */

(function () {
  "use strict";

  var toggle   = document.getElementById("drawer-toggle");
  var closeBtn = document.getElementById("drawer-close");
  var drawer   = document.getElementById("mobile-drawer");
  var backdrop = document.getElementById("drawer-backdrop");

  if (!toggle || !drawer) return;

  /* -------------------------------------------------------
     OPEN
  ------------------------------------------------------- */
  function openDrawer() {
    drawer.classList.add("is-open");
    backdrop.classList.add("is-open");
    drawer.setAttribute("aria-hidden", "false");
    backdrop.setAttribute("aria-hidden", "false");
    toggle.setAttribute("aria-expanded", "true");
    document.body.style.overflow = "hidden";

    /* Focus first link after animation settles */
    setTimeout(function () {
      var first = drawer.querySelector(".drawer__link, .drawer__close");
      if (first) first.focus();
    }, 420);
  }

  /* -------------------------------------------------------
     CLOSE
  ------------------------------------------------------- */
  function closeDrawer() {
    drawer.classList.remove("is-open");
    backdrop.classList.remove("is-open");
    drawer.setAttribute("aria-hidden", "true");
    backdrop.setAttribute("aria-hidden", "true");
    toggle.setAttribute("aria-expanded", "false");
    document.body.style.overflow = "";

    /* Return focus to toggle */
    toggle.focus();
  }

  /* -------------------------------------------------------
     FOCUS TRAP — keep Tab inside drawer when open
  ------------------------------------------------------- */
  function trapFocus(e) {
    if (!drawer.classList.contains("is-open")) return;

    var focusable = Array.from(
      drawer.querySelectorAll(
        'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
      )
    );

    if (!focusable.length) return;

    var first = focusable[0];
    var last  = focusable[focusable.length - 1];

    if (e.key === "Tab") {
      if (e.shiftKey) {
        if (document.activeElement === first) {
          e.preventDefault();
          last.focus();
        }
      } else {
        if (document.activeElement === last) {
          e.preventDefault();
          first.focus();
        }
      }
    }
  }

  /* -------------------------------------------------------
     EVENTS
  ------------------------------------------------------- */

  toggle.addEventListener("click", openDrawer);

  if (closeBtn) {
    closeBtn.addEventListener("click", closeDrawer);
  }

  backdrop.addEventListener("click", closeDrawer);

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && drawer.classList.contains("is-open")) {
      closeDrawer();
    }
    trapFocus(e);
  });

  /* Close drawer on nav link click (SPA-style or PHP page nav) */
  drawer.querySelectorAll(".drawer__link, .drawer__cta").forEach(function (link) {
    link.addEventListener("click", function () {
      closeDrawer();
    });
  });

})();