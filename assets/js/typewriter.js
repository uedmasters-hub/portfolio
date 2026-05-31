// =========================
// TYPEWRITER + SKELETON
// Wrapped in DOMContentLoaded
// so elements are guaranteed
// to exist before JS runs
// =========================

document.addEventListener("DOMContentLoaded", function () {

  // =========================
  // ELEMENTS
  // =========================

  var typewriterEl = document.getElementById("typewriter");
  var skeletonEl   = document.getElementById("typewriter-skeleton");

  if (!typewriterEl) return; // guard — not on this page

  // =========================
  // TEXTS
  // Keep phrases short (2-3 words)
  // white-space: nowrap on desktop
  // means they must stay one line
  // =========================

  var texts = [
    "complex systems.",
    "AI-led workflows.",
    "enterprise products.",
    "design infrastructure.",
    "scalable teams."
  ];

  // =========================
  // STATE
  // =========================

  var textIndex  = 0;
  var charIndex  = 0;
  var isDeleting = false;
  var hasStarted = false;

  // =========================
  // HIDE SKELETON
  // Called once when first
  // character is typed.
  // Never called again.
  // =========================

  function hideSkeleton() {
    if (!skeletonEl) return;
    skeletonEl.style.opacity   = "0";
    skeletonEl.style.transform = "scaleX(0.5)";
    setTimeout(function () {
      if (skeletonEl) skeletonEl.style.display = "none";
    }, 400);
  }

  // =========================
  // TYPE FUNCTION
  // =========================

  function typeEffect() {

    var currentText = texts[textIndex];

    if (!isDeleting) {

      // Typing
      typewriterEl.textContent =
        currentText.substring(0, charIndex + 1);

      // Hide skeleton on very first character
      if (!hasStarted) {
        hasStarted = true;
        hideSkeleton();
      }

      charIndex++;

      if (charIndex === currentText.length) {
        isDeleting = true;
        setTimeout(typeEffect, 1800);
        return;
      }

    } else {

      // Deleting
      typewriterEl.textContent =
        currentText.substring(0, charIndex - 1);

      charIndex--;

      if (charIndex === 0) {
        isDeleting = false;
        textIndex++;
        if (textIndex >= texts.length) textIndex = 0;
      }

    }

    var speed = isDeleting ? 45 : 85;
    setTimeout(typeEffect, speed);

  }

  // =========================
  // START
  // 700ms delay so skeleton
  // is visible on load
  // =========================

  setTimeout(typeEffect, 700);

});