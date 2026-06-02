/**
 * assets/js/app.js  (or navigation.js if kept separate)
 * Mega menu + mobile drawer interactions
 *
 * No jQuery. No frameworks. Pure vanilla JS.
 */

(function () {
  'use strict';

  // ── SELECTORS ────────────────────────────────────────────────

  const megaItems    = document.querySelectorAll('.nav-item.has-mega');
  const hamburger    = document.getElementById('nav-hamburger');
  const drawer       = document.getElementById('nav-drawer');
  const drawerClose  = document.getElementById('nav-drawer-close');
  const backdrop     = document.getElementById('nav-drawer-backdrop');


  // ── MEGA MENU ────────────────────────────────────────────────

  let openItem = null;
  let closeTimer = null;

  function openMega(item) {
    if (openItem && openItem !== item) closeMega(openItem);
    clearTimeout(closeTimer);

    openItem = item;
    item.classList.add('is-open');

    const trigger = item.querySelector('[data-mega-trigger]');
    if (trigger) trigger.setAttribute('aria-expanded', 'true');
  }

  function closeMega(item) {
    if (!item) return;
    item.classList.remove('is-open');

    const trigger = item.querySelector('[data-mega-trigger]');
    if (trigger) trigger.setAttribute('aria-expanded', 'false');

    if (openItem === item) openItem = null;
  }

  function scheduleClose(item) {
    clearTimeout(closeTimer);
    closeTimer = setTimeout(function () {
      closeMega(item);
    }, 120);
  }

  megaItems.forEach(function (item) {
    // Mouse enter on item
    item.addEventListener('mouseenter', function () {
      openMega(item);
    });

    // Mouse leave on item
    item.addEventListener('mouseleave', function () {
      scheduleClose(item);
    });

    // Cancel close when re-entering mega panel
    const mega = item.querySelector('.mega-menu');
    if (mega) {
      mega.addEventListener('mouseenter', function () {
        clearTimeout(closeTimer);
      });
      mega.addEventListener('mouseleave', function () {
        scheduleClose(item);
      });
    }

    // Click toggle (keyboard / touch)
    const trigger = item.querySelector('[data-mega-trigger]');
    if (trigger) {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        if (item.classList.contains('is-open')) {
          closeMega(item);
        } else {
          openMega(item);
        }
      });
    }
  });

  // Close on Escape
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      if (openItem) closeMega(openItem);
      if (drawer && drawer.classList.contains('is-open')) closeDrawer();
    }
  });

  // Close when clicking outside
  document.addEventListener('click', function (e) {
    if (openItem && !openItem.contains(e.target)) {
      closeMega(openItem);
    }
  });


  // ── MOBILE DRAWER ────────────────────────────────────────────

  function openDrawer() {
    if (!drawer) return;
    drawer.classList.add('is-open');
    drawer.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    if (hamburger) {
      hamburger.classList.add('is-open');
      hamburger.setAttribute('aria-expanded', 'true');
    }

    // Focus first link inside
    const firstLink = drawer.querySelector('.nav-drawer-link');
    if (firstLink) setTimeout(function () { firstLink.focus(); }, 320);
  }

  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';

    if (hamburger) {
      hamburger.classList.remove('is-open');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.focus();
    }
  }

  if (hamburger)   hamburger.addEventListener('click', openDrawer);
  if (drawerClose) drawerClose.addEventListener('click', closeDrawer);
  if (backdrop)    backdrop.addEventListener('click', closeDrawer);

  // Trap focus inside drawer when open
  if (drawer) {
    drawer.addEventListener('keydown', function (e) {
      if (!drawer.classList.contains('is-open')) return;
      if (e.key !== 'Tab') return;

      const focusable = drawer.querySelectorAll(
        'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
      );
      const first = focusable[0];
      const last  = focusable[focusable.length - 1];

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
    });
  }


  // ── STICKY HEADER SHADOW ─────────────────────────────────────

  const header = document.getElementById('site-header');

  if (header) {
    const onScroll = function () {
      if (window.scrollY > 4) {
        header.style.boxShadow = '0 1px 0 rgba(0,0,0,0.08)';
      } else {
        header.style.boxShadow = '';
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

})();