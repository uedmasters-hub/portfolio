/* =============================================
   GALLERY.JS
   Floating image gallery + lightbox.
   Used on: case-study, audit, blog pages.

   Reveal logic:
   - Button appears after BOTH conditions met:
     A) 8 seconds on page
     B) User has scrolled 35% of page
   - Once revealed it stays visible
   - Hides when user scrolls within 200px of top
   ============================================= */

(function () {
  'use strict';

  /* ── FIND DATA ──────────────────────────── */
  /* Gallery data is defined as window.GALLERY_IMAGES
     by the including PHP partial, e.g.:
     window.GALLERY_IMAGES = [
       { src: "...", caption: "..." },
       ...
     ];                                          */

  var images = (window.GALLERY_IMAGES && window.GALLERY_IMAGES.length)
    ? window.GALLERY_IMAGES
    : [];

  /* No images → do nothing */
  if (!images.length) return;

  /* ── BUILD DOM ──────────────────────────── */

  /* Floating trigger button */
  var fab = document.createElement('button');
  fab.className   = 'gallery-fab';
  fab.setAttribute('aria-label', 'View design screens');
  fab.innerHTML   =
    '<span class="gallery-fab__icon">◫</span>' +
    '<span class="gallery-fab__text">Design Screens</span>' +
    '<span class="gallery-fab__count">' + images.length + '</span>';

  /* Lightbox overlay */
  var overlay = document.createElement('div');
  overlay.className   = 'gallery-overlay';
  overlay.setAttribute('role', 'dialog');
  overlay.setAttribute('aria-modal', 'true');
  overlay.setAttribute('aria-label', 'Image gallery');

  overlay.innerHTML = [
    /* Header */
    '<div class="gallery-header">',
    '  <div class="gallery-header__left">',
    '    <span class="gallery-header__title">Design Screens</span>',
    '    <span class="gallery-header__count">' + images.length + ' images</span>',
    '  </div>',
    '  <button class="gallery-header__close" aria-label="Close gallery">✕</button>',
    '</div>',

    /* Grid view */
    '<div class="gallery-grid-wrap" id="galleryGrid">',
    '  <div class="gallery-grid" id="galleryGridInner"></div>',
    '</div>',

    /* Single image view */
    '<div class="gallery-single" id="gallerySingle">',
    '  <div class="gallery-single__img-wrap">',
    '    <img class="gallery-single__img" id="gallerySingleImg" src="" alt="" />',
    '  </div>',
    '  <div class="gallery-single__footer">',
    '    <button class="gallery-back-btn" id="galleryBackBtn">← All screens</button>',
    '    <p class="gallery-single__caption" id="gallerySingleCaption"></p>',
    '    <div class="gallery-single__nav">',
    '      <button class="gallery-nav-btn" id="galleryPrev" aria-label="Previous image">←</button>',
    '      <span class="gallery-single__counter" id="galleryCounter"></span>',
    '      <button class="gallery-nav-btn" id="galleryNext" aria-label="Next image">→</button>',
    '    </div>',
    '  </div>',
    '</div>',
  ].join('');

  document.body.appendChild(fab);
  document.body.appendChild(overlay);

  /* ── ELEMENT REFS ───────────────────────── */
  var gridWrap    = document.getElementById('galleryGrid');
  var gridInner   = document.getElementById('galleryGridInner');
  var singleView  = document.getElementById('gallerySingle');
  var singleImg   = document.getElementById('gallerySingleImg');
  var singleCap   = document.getElementById('gallerySingleCaption');
  var counter     = document.getElementById('galleryCounter');
  var backBtn     = document.getElementById('galleryBackBtn');
  var prevBtn     = document.getElementById('galleryPrev');
  var nextBtn     = document.getElementById('galleryNext');
  var closeBtn    = overlay.querySelector('.gallery-header__close');

  var currentIdx  = 0;
  var isOpen      = false;
  var thumbsBuilt = false;

  /* ── REVEAL LOGIC ───────────────────────── */
  /* Either condition triggers reveal — whichever comes first */
  var revealed = false;

  function reveal() {
    if (revealed) return;
    revealed = true;
    fab.classList.add('is-visible');
  }

  /* Condition A: 3 seconds */
  setTimeout(reveal, 3000);

  /* Condition B: 10% scroll depth */
  function onScroll() {
    if (!revealed) {
      var scrollPct = window.scrollY / Math.max(1, document.body.scrollHeight - window.innerHeight);
      if (scrollPct >= 0.10) reveal();
    }

    /* Hide near page top, show again once scrolled down */
    if (revealed) {
      if (window.scrollY < 150) {
        fab.classList.add('is-hidden');
      } else {
        fab.classList.remove('is-hidden');
      }
    }
  }

  window.addEventListener('scroll', onScroll, { passive: true });

  /* ── BUILD THUMBNAIL GRID ───────────────── */
  function buildGrid() {
    if (thumbsBuilt) return;
    thumbsBuilt = true;

    images.forEach(function (img, idx) {
      var thumb = document.createElement('div');
      thumb.className = 'gallery-thumb';
      thumb.setAttribute('data-idx', idx);
      thumb.setAttribute('role', 'button');
      thumb.setAttribute('tabindex', '0');
      thumb.setAttribute('aria-label', img.caption || ('Image ' + (idx + 1)));

      thumb.innerHTML =
        '<img class="gallery-thumb__img" src="' + img.src + '" alt="' + (img.caption || '') + '" loading="lazy" />' +
        '<div class="gallery-thumb__overlay">⤢</div>' +
        (img.caption ? '<p class="gallery-thumb__caption">' + img.caption + '</p>' : '');

      gridInner.appendChild(thumb);

      /* Stagger reveal after images load */
      var thumbImg = thumb.querySelector('.gallery-thumb__img');
      thumbImg.addEventListener('load', function () {
        setTimeout(function () {
          thumb.classList.add('is-loaded');
        }, idx * 60); /* 60ms stagger per image */
      });

      /* If image is cached it may already be complete */
      if (thumbImg.complete) {
        setTimeout(function () {
          thumb.classList.add('is-loaded');
        }, idx * 60);
      }

      /* Click: open single view */
      thumb.addEventListener('click', function () {
        openSingle(idx);
      });

      thumb.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openSingle(idx);
        }
      });
    });
  }

  /* ── OPEN / CLOSE LIGHTBOX ──────────────── */
  function openGallery() {
    isOpen = true;
    overlay.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    showGrid();
    buildGrid();

    /* Focus close button for accessibility */
    setTimeout(function () { closeBtn.focus(); }, 100);
  }

  function closeGallery() {
    isOpen = false;
    overlay.classList.remove('is-open');
    document.body.style.overflow = '';
    fab.focus();
  }

  /* ── GRID / SINGLE TOGGLE ───────────────── */
  function showGrid() {
    gridWrap.style.display   = '';
    singleView.classList.remove('is-active');
  }

  function openSingle(idx) {
    currentIdx = idx;
    gridWrap.style.display = 'none';
    singleView.classList.add('is-active');
    loadSingleImage(idx);
  }

  function loadSingleImage(idx) {
    var item = images[idx];

    /* Reset */
    singleImg.classList.remove('is-ready');
    singleImg.src = '';

    /* Update caption + counter */
    singleCap.textContent    = item.caption || '';
    counter.textContent      = (idx + 1) + ' / ' + images.length;
    prevBtn.disabled         = idx === 0;
    nextBtn.disabled         = idx === images.length - 1;

    /* Load image */
    var tmp = new Image();
    tmp.onload = function () {
      singleImg.src = item.src;
      singleImg.alt = item.caption || '';
      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          singleImg.classList.add('is-ready');
        });
      });
    };
    tmp.src = item.src;

    /* Focus for keyboard */
    singleView.focus && singleView.focus();
  }

  /* ── NAVIGATION ─────────────────────────── */
  function goTo(idx) {
    if (idx < 0 || idx >= images.length) return;
    currentIdx = idx;
    loadSingleImage(currentIdx);
  }

  prevBtn.addEventListener('click', function () { goTo(currentIdx - 1); });
  nextBtn.addEventListener('click', function () { goTo(currentIdx + 1); });
  backBtn.addEventListener('click', showGrid);

  /* ── EVENT LISTENERS ────────────────────── */
  fab.addEventListener('click', openGallery);
  closeBtn.addEventListener('click', closeGallery);

  /* Click backdrop to close */
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) closeGallery();
  });

  /* Keyboard */
  document.addEventListener('keydown', function (e) {
    if (!isOpen) return;
    switch (e.key) {
      case 'Escape':     closeGallery(); break;
      case 'ArrowLeft':  if (singleView.classList.contains('is-active')) goTo(currentIdx - 1); break;
      case 'ArrowRight': if (singleView.classList.contains('is-active')) goTo(currentIdx + 1); break;
    }
  });

  /* ── TOUCH SWIPE (mobile) ───────────────── */
  var touchStartX = 0;
  var touchDeltaX = 0;

  overlay.addEventListener('touchstart', function (e) {
    touchStartX = e.changedTouches[0].clientX;
  }, { passive: true });

  overlay.addEventListener('touchend', function (e) {
    if (!singleView.classList.contains('is-active')) return;
    touchDeltaX = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(touchDeltaX) > 50) {
      if (touchDeltaX < 0) goTo(currentIdx + 1); /* swipe left → next */
      else                 goTo(currentIdx - 1); /* swipe right → prev */
    }
  }, { passive: true });

})();