/* =============================================================
   ANIMATIONS.CSS
   Complete motion system for 6epixels.com
   Apple-grade choreography: entry · hover · scroll · continuous
   ============================================================= */

/* =============================================================
   01. TIMING TOKENS
   ============================================================= */

:root {
  --ease-spring:   cubic-bezier(0.16, 1, 0.3, 1);
  --ease-out:      cubic-bezier(0.0, 0, 0.2, 1);
  --ease-in:       cubic-bezier(0.4, 0, 1, 1);
  --ease-in-out:   cubic-bezier(0.4, 0, 0.2, 1);
  --ease-bounce:   cubic-bezier(0.34, 1.56, 0.64, 1);

  --dur-instant:   80ms;
  --dur-fast:      200ms;
  --dur-base:      350ms;
  --dur-medium:    500ms;
  --dur-slow:      700ms;
  --dur-xslow:     1000ms;
  --dur-crawl:     1400ms;
}

/* =============================================================
   02. REDUCED MOTION — global override (MUST be first guard)
   ============================================================= */

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration:        0.01ms !important;
    animation-iteration-count: 1      !important;
    transition-duration:       0.01ms !important;
    scroll-behavior:           auto   !important;
  }

  /* Keep marquee visible but static */
  .marquee-inner { transform: none !important; }

  /* Keep cursor hidden on reduced motion */
  .cursor-dot,
  .cursor-ring  { display: none; }
}

/* =============================================================
   03. PAGE TRANSITION
   ============================================================= */

body {
  opacity: 1;
  transition: opacity 0.3s ease;
}

body.page-exit {
  opacity: 0;
  pointer-events: none;
}

body.page-enter {
  animation: anim-page-in 0.35s ease forwards;
}

@keyframes anim-page-in {
  from { opacity: 0; }
  to   { opacity: 1; }
}

/* =============================================================
   04. PRELOADER
   ============================================================= */

.preloader {
  transition:
    opacity    0.4s ease,
    transform  0.6s var(--ease-spring);
  will-change: opacity, transform;
}

.preloader.is-done {
  opacity:         0;
  transform:       translateY(-100%);
  pointer-events:  none;
}

/* Counter number */
#preloader-counter {
  transition: opacity 0.2s ease;
}

/* Bar fill */
#preloader-bar {
  transition: width 0.15s var(--ease-out);
  transform-origin: left;
}

/* =============================================================
   05. SCROLL REVEAL — base states
   All revealed elements START hidden.
   JavaScript adds .is-revealed to trigger transition.
   ============================================================= */

/* Fade up (default) */
[data-reveal],
[data-reveal="up"] {
  opacity:    0;
  transform:  translateY(32px);
  transition:
    opacity    var(--dur-slow)   var(--ease-spring),
    transform  var(--dur-slow)   var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

/* Fade left */
[data-reveal="left"] {
  opacity:   0;
  transform: translateX(-40px);
  transition:
    opacity    var(--dur-slow)  var(--ease-spring),
    transform  var(--dur-slow)  var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

/* Fade right */
[data-reveal="right"] {
  opacity:   0;
  transform: translateX(40px);
  transition:
    opacity    var(--dur-slow)  var(--ease-spring),
    transform  var(--dur-slow)  var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

/* Fade only */
[data-reveal="fade"] {
  opacity:   0;
  transform: none;
  transition:
    opacity  var(--dur-slow) ease;
  transition-delay: var(--reveal-delay, 0ms);
}

/* Scale in */
[data-reveal="scale"] {
  opacity:   0;
  transform: scale(0.92);
  transition:
    opacity    var(--dur-slow)  var(--ease-spring),
    transform  var(--dur-slow)  var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

/* Revealed state — same for all variants */
.is-revealed {
  opacity:   1 !important;
  transform: none !important;
}

/* =============================================================
   06. HERO WORD SPLIT — entry
   JS wraps each word in .word-wrap > .word
   ============================================================= */

.word-wrap {
  display:  inline-block;
  overflow: hidden;
  vertical-align: bottom;
}

.word {
  display:          inline-block;
  opacity:          0;
  transform:        translateY(110%);
  animation:        anim-word-up var(--dur-slow) var(--ease-spring) forwards;
  animation-delay:  var(--d, 0ms);
  will-change:      opacity, transform;
}

@keyframes anim-word-up {
  to {
    opacity:   1;
    transform: translateY(0);
  }
}

/* Subheading / kicker fade */
.hero-meta,
.hero-chips-wrap {
  opacity:          0;
  transform:        translateY(16px);
  animation:        anim-fade-up var(--dur-slow) var(--ease-spring) forwards;
  animation-delay:  var(--d, 400ms);
}

@keyframes anim-fade-up {
  to { opacity: 1; transform: translateY(0); }
}

/* =============================================================
   07. KICKER REVEAL
   ============================================================= */

.section-kicker {
  overflow: hidden;
}

.section-kicker::before {
  /* The leading line */
  width:      0;
  transition: width 0.4s ease 0.1s;
}

.section-kicker.is-revealed::before {
  width: 20px;
}

.kicker-text {
  opacity:   0;
  transform: translateY(6px);
  transition:
    opacity    0.4s ease 0.25s,
    transform  0.4s ease 0.25s;
}

.section-kicker.is-revealed .kicker-text {
  opacity:   1;
  transform: translateY(0);
}

/* =============================================================
   08. STAT CARDS — 3D tilt + reveal
   ============================================================= */

.stat {
  transform-style: preserve-3d;
  will-change:     transform;

  /* Reveal start */
  opacity:   0;
  transform: translateY(32px);
  transition:
    opacity    var(--dur-slow)   var(--ease-spring),
    transform  var(--dur-slow)   var(--ease-spring),
    background var(--dur-medium) ease,
    box-shadow var(--dur-medium) ease,
    border-color var(--dur-medium) ease;
  transition-delay: var(--reveal-delay, 0ms);
}

.stat.is-revealed {
  opacity:   1;
  transform: translateY(0);
}

/* 3D tilt applied via inline style by JS */
.stat:hover {
  background:    rgba(255, 255, 255, 0.52);
  border-color:  rgba(255, 255, 255, 0.75);
  box-shadow:
    0 24px 50px rgba(120, 170, 255, 0.10),
    0 10px 24px rgba(0, 0, 0, 0.04);
}

/* Inner content pops forward */
.stat > * {
  position:  relative;
  z-index:   2;
  transform: translateZ(24px);
}

/* =============================================================
   09. CHIPS — hover + click
   ============================================================= */

.chip {
  transition:
    transform    var(--dur-fast)   ease,
    box-shadow   var(--dur-fast)   ease,
    background   var(--dur-fast)   ease,
    border-color var(--dur-fast)   ease;
  cursor: pointer;
}

.chip:hover {
  transform:  translateY(-3px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
}

.chip:active {
  transform: scale(0.97) translateY(0);
}

/* Dot affordance on chip */
.chip::after {
  content:    "↗";
  opacity:    0;
  font-size:  10px;
  margin-left: 4px;
  transition: opacity var(--dur-fast) ease;
}

.chip:hover::after {
  opacity: 0.5;
}

/* =============================================================
   10. NAVIGATION LINKS
   ============================================================= */

.nav a {
  transition: opacity var(--dur-fast) ease;
}

/* Dim siblings on hover */
.nav:hover a {
  opacity: 0.5;
}
.nav:hover a:hover {
  opacity: 1;
}

/* Slide-in underline */
.nav a::after {
  content:    "";
  position:   absolute;
  left:       0;
  bottom:     0;
  width:      0;
  height:     1px;
  background: currentColor;
  transition: width var(--dur-base) var(--ease-spring);
}

.nav a:hover::after,
.nav a.active::after {
  width: 100%;
}

/* CONNECT button pulse */
.btn-connect {
  position: relative;
}

.btn-connect::before {
  content:        "";
  position:       absolute;
  inset:          -4px;
  border-radius:  inherit;
  border:         1px solid currentColor;
  opacity:        0;
  animation:      anim-connect-pulse 2.5s ease-in-out infinite;
}

@keyframes anim-connect-pulse {
  0%, 100% { opacity: 0;    transform: scale(1); }
  50%       { opacity: 0.25; transform: scale(1.06); }
}

/* =============================================================
   11. MOBILE DRAWER
   ============================================================= */

.drawer {
  transform:  translateX(100%);
  transition: transform var(--dur-medium) var(--ease-spring);
  will-change: transform;
}

.drawer.is-open {
  transform: translateX(0);
}

.drawer-backdrop {
  opacity:         0;
  pointer-events:  none;
  transition:      opacity var(--dur-base) ease;
}

.drawer-backdrop.is-open {
  opacity:        1;
  pointer-events: auto;
}

/* Stagger links inside drawer */
.drawer .nav-link {
  opacity:   0;
  transform: translateX(20px);
  transition:
    opacity    var(--dur-medium) var(--ease-spring),
    transform  var(--dur-medium) var(--ease-spring);
  transition-delay: var(--link-delay, 0ms);
}

.drawer.is-open .nav-link {
  opacity:   1;
  transform: translateX(0);
}

/* =============================================================
   12. CARDS — bento + transform
   ============================================================= */

/* Reveal on scroll */
.bento-card,
.transform-card,
.transform-featured {
  opacity:   0;
  transform: translateY(40px);
  transition:
    opacity    var(--dur-slow)   var(--ease-spring),
    transform  var(--dur-slow)   var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.bento-card.is-revealed,
.transform-card.is-revealed,
.transform-featured.is-revealed {
  opacity:   1;
  transform: translateY(0);
}

/* Hover lift */
.bento-card {
  transition:
    opacity    var(--dur-slow)   var(--ease-spring),
    transform  var(--dur-slow)   var(--ease-spring),
    box-shadow var(--dur-base)   ease;
}

.bento-card:hover {
  transform:  translateY(-6px);
  box-shadow:
    0 20px 48px rgba(0, 0, 0, 0.10),
    0 6px  16px rgba(0, 0, 0, 0.04);
}

.bento-card:active {
  transform: translateY(-2px) scale(0.99);
}

/* Arrow rotate on card hover */
.bento-card .card-arrow {
  display:    inline-block;
  transition: transform var(--dur-base) var(--ease-spring);
}

.bento-card:hover .card-arrow {
  transform: translate(4px, -4px);
}

/* Shimmer sweep */
.bento-card {
  position: relative;
  overflow: hidden;
}

.bento-card::before {
  content:             "";
  position:            absolute;
  inset:               0;
  background:          linear-gradient(
    105deg,
    transparent       40%,
    rgba(255,255,255,0.12) 50%,
    transparent       60%
  );
  background-size:     200% 100%;
  background-position: 200% 0;
  opacity:             0;
  pointer-events:      none;
  transition:          opacity 0.15s ease;
}

.bento-card:hover::before {
  opacity:   1;
  animation: anim-shimmer 0.65s ease forwards;
}

@keyframes anim-shimmer {
  to { background-position: -200% 0; }
}

/* =============================================================
   13. CASE STUDY FEATURED IMAGE — zoom on hover
   ============================================================= */

.transform-featured {
  overflow: hidden;
}

.transform-featured img {
  transition: transform 0.7s ease;
  will-change: transform;
}

.transform-featured:hover img {
  transform: scale(1.05);
}

/* =============================================================
   14. IMAGES — lazy reveal
   ============================================================= */

.img-reveal {
  opacity:   0;
  transform: scale(1.04);
  transition:
    opacity    0.8s var(--ease-spring),
    transform  0.8s var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.img-reveal.is-revealed {
  opacity:   1;
  transform: scale(1);
}

/* =============================================================
   15. LINKS + BUTTONS
   ============================================================= */

/* Text link underline grow */
.link-underline {
  position: relative;
}

.link-underline::after {
  content:    "";
  position:   absolute;
  bottom:     -1px;
  left:       0;
  width:      0;
  height:     1px;
  background: currentColor;
  transition: width var(--dur-base) var(--ease-spring);
}

.link-underline:hover::after {
  width: 100%;
}

/* Arrow link */
.link-arrow .arrow {
  display:    inline-block;
  transition: transform var(--dur-fast) ease;
}

.link-arrow:hover .arrow {
  transform: translate(3px, -3px);
}

/* Button press */
.btn {
  transition:
    transform    var(--dur-instant) ease,
    box-shadow   var(--dur-fast)    ease,
    background   var(--dur-fast)    ease,
    border-color var(--dur-fast)    ease;
}

.btn:hover {
  transform: translateY(-1px);
}

.btn:active {
  transform:  scale(0.97) translateY(0);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  transition-duration: var(--dur-instant);
}

.btn:not(:active) {
  transition:
    transform  var(--dur-base) var(--ease-spring),
    box-shadow var(--dur-base) ease;
}

/* =============================================================
   16. POPOVER PANEL
   ============================================================= */

.popover-panel {
  transform:  translateX(100%);
  transition: transform var(--dur-medium) var(--ease-spring);
  will-change: transform;
}

.popover-panel.is-open {
  transform: translateX(0);
}

.popover-panel.is-closing {
  transform:           translateX(100%);
  transition-duration: var(--dur-base);
  transition-timing-function: var(--ease-in);
}

.popover-backdrop {
  opacity:        0;
  pointer-events: none;
  transition:     opacity var(--dur-base) ease;
}

.popover-backdrop.is-open {
  opacity:        1;
  pointer-events: auto;
}

/* Content stagger inside popover */
.popover-panel .popover-block {
  opacity:   0;
  transform: translateY(12px);
  transition:
    opacity    var(--dur-medium) var(--ease-spring),
    transform  var(--dur-medium) var(--ease-spring);
  transition-delay: var(--block-delay, 0ms);
}

.popover-panel.is-open .popover-block {
  opacity:   1;
  transform: translateY(0);
}

/* =============================================================
   17. TIMELINE
   ============================================================= */

/* Center line draw */
.timeline-line {
  position:         relative;
  overflow:         visible;
}

.timeline-line::before {
  content:      "";
  position:     absolute;
  top:          0;
  left:         50%;
  transform:    translateX(-50%);
  width:        1px;
  height:       0;
  background:   var(--blue, #1a46c9);
  transition:   height 1.8s ease;
}

.timeline-line.is-revealed::before {
  height: 100%;
}

/* Node pulse — current role */
.timeline-node.is-current::after {
  content:        "";
  position:       absolute;
  inset:          -4px;
  border-radius:  50%;
  border:         1px solid var(--blue, #1a46c9);
  opacity:        0.4;
  animation:      anim-node-pulse 2s ease-in-out infinite;
}

@keyframes anim-node-pulse {
  0%, 100% { opacity: 0.4; transform: scale(1); }
  50%       { opacity: 0;   transform: scale(1.7); }
}

/* Timeline cards — alternate enter */
.timeline-card[data-side="left"] {
  opacity:   0;
  transform: translateX(-40px);
  transition:
    opacity    var(--dur-slow) var(--ease-spring),
    transform  var(--dur-slow) var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.timeline-card[data-side="right"] {
  opacity:   0;
  transform: translateX(40px);
  transition:
    opacity    var(--dur-slow) var(--ease-spring),
    transform  var(--dur-slow) var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.timeline-card.is-revealed {
  opacity:   1;
  transform: translateX(0);
}

/* =============================================================
   18. MARQUEE — testimonials strip
   ============================================================= */

.marquee-inner {
  display:    flex;
  width:      max-content;
  animation:  anim-marquee 28s linear infinite;
  will-change: transform;
}

.marquee:hover .marquee-inner,
.marquee-inner:hover {
  animation-play-state: paused;
}

@keyframes anim-marquee {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}

/* =============================================================
   19. READING PROGRESS BAR
   ============================================================= */

#reading-progress {
  position:         fixed;
  top:              0;
  left:             0;
  width:            0%;
  height:           3px;
  background:       var(--blue, #1a46c9);
  z-index:          1000;
  transform-origin: left;
  pointer-events:   none;
  /* No transition — updates real-time on scroll */
}

/* =============================================================
   20. BACKGROUND — orbs + mouse light
   ============================================================= */

.orb {
  will-change:  transform, opacity;
  animation:    anim-orb-drift var(--orb-dur, 20s) ease-in-out infinite;
}

.orb-1 { --orb-dur: 22s; }
.orb-2 { --orb-dur: 18s; animation-delay: -8s; }

@keyframes anim-orb-drift {
  0%,  100% { transform: translate(0,    0);    }
  25%        { transform: translate(30px,  -20px); }
  50%        { transform: translate(-15px, 25px);  }
  75%        { transform: translate(20px,  10px);  }
}

.mouse-light {
  will-change: left, top;
  transition:
    background 6s ease;
  /* left/top updated via JS without transition for instant follow */
}

/* =============================================================
   21. BACKGROUND COLOR THEME TRANSITION
   ============================================================= */

body {
  transition: background 6s ease;
}

/* =============================================================
   22. SECTION TITLE — large heading reveal
   ============================================================= */

.section-title {
  opacity:   0;
  transform: translateY(24px);
  transition:
    opacity    var(--dur-slow)  var(--ease-spring),
    transform  var(--dur-slow)  var(--ease-spring);
}

.section-title.is-revealed {
  opacity:   1;
  transform: translateY(0);
}

/* Accent span color pulse on reveal */
.section-title.is-revealed span {
  animation: anim-accent-in 0.6s var(--ease-spring) 0.3s both;
}

@keyframes anim-accent-in {
  from { opacity: 0.4; }
  to   { opacity: 1; }
}

/* =============================================================
   23. METRIC CALLOUT — count-up entrance
   ============================================================= */

.metric-callout {
  opacity:   0;
  transform: scale(0.88) translateY(16px);
  transition:
    opacity    var(--dur-medium) var(--ease-spring),
    transform  var(--dur-medium) var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.metric-callout.is-revealed {
  opacity:   1;
  transform: scale(1) translateY(0);
}

/* =============================================================
   24. FORM ELEMENTS — focus states
   ============================================================= */

.field-input {
  transition:
    border-color var(--dur-fast) ease,
    box-shadow   var(--dur-fast) ease;
}

.field-input:focus {
  border-color: var(--blue, #1a46c9);
  box-shadow:   0 0 0 3px rgba(26, 70, 201, 0.10);
  outline:      none;
}

/* Floating label */
.field-label {
  position:   absolute;
  transition:
    transform  var(--dur-fast) ease,
    font-size  var(--dur-fast) ease,
    color      var(--dur-fast) ease;
}

.field-input:focus   ~ .field-label,
.field-input:not(:placeholder-shown) ~ .field-label {
  transform:  translateY(-20px) scale(0.82);
  color:      var(--blue, #1a46c9);
}

/* Enquiry pill select */
.enquiry-pill {
  transition:
    background   var(--dur-fast) ease,
    color        var(--dur-fast) ease,
    border-color var(--dur-fast) ease,
    transform    var(--dur-instant) ease,
    box-shadow   var(--dur-fast) ease;
}

.enquiry-pill:hover {
  transform: translateY(-2px);
}

.enquiry-pill:active {
  transform: scale(0.96);
}

.enquiry-pill.is-active {
  background:  var(--blue, #1a46c9);
  color:       #fff;
  box-shadow:  0 4px 16px rgba(26, 70, 201, 0.25);
}

/* Submit button state morphs */
.submit-btn .btn-text  { transition: opacity var(--dur-fast) ease; }
.submit-btn .btn-spin  { opacity: 0; transition: opacity var(--dur-fast) ease 0.15s; }
.submit-btn .btn-check { opacity: 0; transition: opacity var(--dur-fast) ease; }

.submit-btn.is-loading .btn-text  { opacity: 0; }
.submit-btn.is-loading .btn-spin  { opacity: 1; }

.submit-btn.is-success {
  background:      #1D9E75;
  border-color:    #1D9E75;
  pointer-events:  none;
}

.submit-btn.is-success .btn-spin  { opacity: 0; }
.submit-btn.is-success .btn-check { opacity: 1; }

/* =============================================================
   25. TESTIMONIAL CARDS — reveal stagger
   ============================================================= */

.testimonial-card {
  opacity:   0;
  transform: translateY(28px);
  transition:
    opacity    var(--dur-slow)  var(--ease-spring),
    transform  var(--dur-slow)  var(--ease-spring);
  transition-delay: var(--reveal-delay, 0ms);
}

.testimonial-card.is-revealed {
  opacity:   1;
  transform: translateY(0);
}

.testimonial-card:hover {
  transform: translateY(-4px);
  transition:
    transform  var(--dur-base) var(--ease-spring),
    box-shadow var(--dur-base) ease;
  box-shadow: 0 16px 40px rgba(0, 0, 0, 0.07);
}

/* =============================================================
   26. BLOG / PSYCHOLOGY ARTICLE CARDS
   ============================================================= */

.article-card {
  opacity:   0;
  transform: translateY(24px);
  transition:
    opacity    var(--dur-medium) var(--ease-spring),
    transform  var(--dur-medium) var(--ease-spring),
    box-shadow var(--dur-base)   ease;
  transition-delay: var(--reveal-delay, 0ms);
}

.article-card.is-revealed {
  opacity:   1;
  transform: translateY(0);
}

.article-card:hover {
  transform:  translateY(-5px);
  box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
}

/* Category tag on hover */
.article-card .cat-tag {
  transition: background var(--dur-fast) ease;
}

.article-card:hover .cat-tag {
  background: var(--blue, #1a46c9);
  color:      #fff;
}

/* =============================================================
   27. AUDIT ANNOTATION CALLOUTS
   ============================================================= */

.annotation-marker {
  transition:
    transform  var(--dur-fast) var(--ease-bounce),
    box-shadow var(--dur-fast) ease;
}

.annotation-marker:hover {
  transform:  scale(1.2);
  box-shadow: 0 4px 16px rgba(26, 70, 201, 0.3);
}

/* =============================================================
   28. FOOTER CTA — available pulse dot
   ============================================================= */

.available-dot {
  position: relative;
  display:  inline-block;
}

.available-dot::before {
  content:        "";
  position:       absolute;
  inset:          -3px;
  border-radius:  50%;
  background:     #1D9E75;
  opacity:        0.35;
  animation:      anim-available-pulse 2s ease-in-out infinite;
}

@keyframes anim-available-pulse {
  0%, 100% { opacity: 0.35; transform: scale(1);   }
  50%       { opacity: 0;    transform: scale(1.8); }
}

/* =============================================================
   29. FOCUS VISIBLE — keyboard accessibility
   ============================================================= */

:focus-visible {
  outline:        2px solid var(--blue, #1a46c9);
  outline-offset: 3px;
  border-radius:  3px;
}

/* Skip link */
.skip-link {
  position:   absolute;
  top:        -100px;
  left:       12px;
  z-index:    9999;
  padding:    8px 16px;
  background: var(--blue, #1a46c9);
  color:      #fff;
  border-radius: 4px;
  transition: top 0.2s ease;
}

.skip-link:focus {
  top: 12px;
}

/* =============================================================
   30. SCROLL-TRIGGERED NUMBER COUNT
   (CSS part — JS controls the count in animations.js)
   ============================================================= */

.count-up {
  opacity:          0;
  transform:        translateY(12px);
  transition:
    opacity    var(--dur-medium) var(--ease-spring),
    transform  var(--dur-medium) var(--ease-spring);
}

.count-up.is-revealed {
  opacity:   1;
  transform: translateY(0);
}