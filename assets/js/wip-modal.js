/* =============================================
   WIP-MODAL.JS
   Work-in-progress modal — homepage only.
   Shows once per browser session.

   Lifecycle:
   1. Check sessionStorage — skip if seen
   2. Wait for preloader to dismiss
   3. 400ms pause → spring entry animation
   4. 5s countdown ring starts
   5. Auto-close when ring completes
   6. User can close: ✕ / backdrop / Escape / CTA

   sessionStorage key: wip_seen
   ============================================= */

(function () {
  'use strict';

  /* Already seen this session → bail */
  try {
    if (sessionStorage.getItem('wip_seen')) return;
  } catch (e) { /* sessionStorage blocked → show anyway */ }

  /* ── CONSTANTS ───────────────────────────── */
  var COUNTDOWN    = 5;          /* seconds before auto-close */
  var PRELOAD_WAIT = 400;        /* ms after preloader exits */
  var CLOSE_EASE   = 'cubic-bezier(0.4, 0, 1, 1)';

  /* SVG ring: circle cx/cy=20, r=17 → circumference ≈ 106.8 */
  var RADIUS = 17;
  var CIRC   = (2 * Math.PI * RADIUS).toFixed(2); /* 106.81 */

  /* ── BUILD HTML ──────────────────────────── */
  var backdrop = document.createElement('div');
  backdrop.className = 'wip-backdrop';
  backdrop.setAttribute('aria-hidden', 'true');

  var modal = document.createElement('div');
  modal.className = 'wip-modal';
  modal.setAttribute('role', 'dialog');
  modal.setAttribute('aria-modal', 'true');
  modal.setAttribute('aria-label', 'Work in progress notice');

  modal.innerHTML =
    /* Close button + SVG ring */
    '<div class="wip-close-wrap">' +
      '<svg class="wip-ring" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">' +
        '<circle class="wip-ring__track" cx="20" cy="20" r="' + RADIUS + '"/>' +
        '<circle class="wip-ring__bar" id="wipRingBar" cx="20" cy="20" r="' + RADIUS + '"/>' +
      '</svg>' +
      '<button class="wip-close" id="wipClose" aria-label="Close">✕</button>' +
    '</div>' +

    /* Kicker */
    '<p class="wip-kicker">Behind the scenes</p>' +

    /* Title */
    '<h2 class="wip-title">You caught me<br><span>mid-build.</span></h2>' +

    /* Body */
    '<p class="wip-desc">' +
      'The work is <strong>real</strong>. Case studies, audits, and essays are all live — ' +
      'with outcomes, process, and real decisions documented. ' +
      'Final mockups and screens are being prepped and will go live soon.' +
    '</p>' +

    /* Actions */
    '<div class="wip-actions">' +
      '<a href="/case-study/" class="wip-cta" id="wipCta">Read the work →</a>' +
      '<button class="wip-dismiss" id="wipDismiss">Maybe later</button>' +
    '</div>' +

    /* Countdown label */
    '<span class="wip-countdown">' +
      'Closes in <span id="wipCountdownNum">' + COUNTDOWN + '</span>s' +
    '</span>';

  document.body.appendChild(backdrop);
  document.body.appendChild(modal);

  /* ── REFS ────────────────────────────────── */
  var ringBar      = document.getElementById('wipRingBar');
  var closeBtn     = document.getElementById('wipClose');
  var ctaBtn       = document.getElementById('wipCta');
  var dismissBtn   = document.getElementById('wipDismiss');
  var countdownEl  = document.getElementById('wipCountdownNum');

  var autoTimer    = null;
  var tickTimer    = null;
  var remaining    = COUNTDOWN;
  var isOpen       = false;

  /* ── RING SETUP ──────────────────────────── */
  /* Inject @keyframes */
  var style = document.createElement('style');
  style.textContent =
    '@keyframes wipRingSweep {' +
      'from { stroke-dashoffset: ' + CIRC + '; }' +
      'to   { stroke-dashoffset: 0; }' +
    '}';
  document.head.appendChild(style);

  function startRing() {
    ringBar.style.strokeDasharray  = CIRC;
    ringBar.style.strokeDashoffset = CIRC;
    ringBar.style.animation        = 'none';
    ringBar.getBoundingClientRect(); /* force reflow */
    ringBar.style.animation =
      'wipRingSweep ' + COUNTDOWN + 's linear forwards';
  }

  /* ── COUNTDOWN TICK ──────────────────────── */
  function startTick() {
    remaining = COUNTDOWN;
    countdownEl.textContent = remaining;
    tickTimer = setInterval(function () {
      remaining -= 1;
      if (countdownEl) countdownEl.textContent = Math.max(0, remaining);
      if (remaining <= 0) {
        clearInterval(tickTimer);
      }
    }, 1000);
  }

  /* ── OPEN ────────────────────────────────── */
  function openModal() {
    if (isOpen) return;
    isOpen = true;

    backdrop.classList.add('is-open');
    modal.classList.add('is-open');
    modal.removeAttribute('aria-hidden');

    /* Focus close button */
    setTimeout(function () { closeBtn.focus(); }, 100);

    startRing();
    startTick();

    /* Auto-close after countdown */
    autoTimer = setTimeout(closeModal, COUNTDOWN * 1000);
  }

  /* ── CLOSE ───────────────────────────────── */
  function closeModal() {
    if (!isOpen) return;
    isOpen = false;

    clearTimeout(autoTimer);
    clearInterval(tickTimer);

    /* Exit animation */
    modal.classList.add('is-closing');
    modal.classList.remove('is-open');
    backdrop.classList.remove('is-open');

    /* Mark seen */
    try { sessionStorage.setItem('wip_seen', '1'); } catch (e) {}

    /* Remove from DOM after transition */
    setTimeout(function () {
      if (modal.parentNode)    modal.parentNode.removeChild(modal);
      if (backdrop.parentNode) backdrop.parentNode.removeChild(backdrop);
    }, 500);
  }

  /* ── EVENTS ──────────────────────────────── */
  closeBtn.addEventListener('click', closeModal);
  dismissBtn.addEventListener('click', closeModal);

  /* CTA — close modal then navigate */
  ctaBtn.addEventListener('click', function () {
    closeModal();
  });

  /* Backdrop click */
  backdrop.addEventListener('click', closeModal);

  /* Escape key */
  document.addEventListener('keydown', function onKey(e) {
    if (e.key === 'Escape' && isOpen) {
      closeModal();
      document.removeEventListener('keydown', onKey);
    }
  });

  /* ── TRIGGER: WAIT FOR PRELOADER ─────────── */
  /* Poll for preloader dismissal — when .is-done fires, wait PRELOAD_WAIT ms then open */
  var preloader = document.getElementById('preloader');

  function waitForPreloader() {
    /* If preloader doesn't exist, open after short delay */
    if (!preloader) {
      setTimeout(openModal, 800);
      return;
    }

    /* MutationObserver — watch for is-done class */
    var observer = new MutationObserver(function (mutations) {
      mutations.forEach(function (m) {
        if (m.type === 'attributes' && preloader.classList.contains('is-done')) {
          observer.disconnect();
          setTimeout(openModal, PRELOAD_WAIT);
        }
      });
    });

    observer.observe(preloader, { attributes: true, attributeFilter: ['class'] });

    /* Safety net: if preloader already done or never fires, open after 4s */
    setTimeout(function () {
      if (!isOpen) {
        observer.disconnect();
        openModal();
      }
    }, 4000);
  }

  /* Start watching once DOM is ready */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', waitForPreloader);
  } else {
    waitForPreloader();
  }

})();