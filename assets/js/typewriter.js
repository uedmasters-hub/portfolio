// =========================
// TYPEWRITER TEXTS
// Keep phrases SHORT — max 3 words
// so they never wrap beyond 2 lines
// =========================

const texts = [
  "complex systems.",
  "AI-led workflows.",
  "enterprise products.",
  "design infrastructure.",
  "scalable teams."
];

// =========================
// ELEMENTS
// =========================

const typewriterEl  = document.getElementById("typewriter");
const skeletonEl    = document.getElementById("typewriter-skeleton");

// =========================
// STATE
// =========================

let textIndex   = 0;
let charIndex   = 0;
let isDeleting  = false;
let hasStarted  = false; // tracks if first char ever typed

// =========================
// SKELETON — hide on first
// character typed, never shown again
// =========================

function hideSkeleton() {
  if (!skeletonEl) return;
  skeletonEl.style.opacity   = "0";
  skeletonEl.style.transform = "scaleX(0.6)";
  // remove from DOM after transition
  setTimeout(() => {
    if (skeletonEl) skeletonEl.style.display = "none";
  }, 400);
}

// =========================
// TYPE FUNCTION
// =========================

function typeEffect() {

  const currentText = texts[textIndex];

  // TYPING
  if (!isDeleting) {

    typewriterEl.textContent =
      currentText.substring(0, charIndex + 1);

    // Hide skeleton the moment first character appears
    if (!hasStarted && charIndex === 0) {
      hasStarted = true;
      hideSkeleton();
    }

    charIndex++;

    if (charIndex === currentText.length) {
      isDeleting = true;
      setTimeout(typeEffect, 1800);
      return;
    }

  }

  // DELETING
  else {

    typewriterEl.textContent =
      currentText.substring(0, charIndex - 1);

    charIndex--;

    if (charIndex === 0) {
      isDeleting = false;
      textIndex++;
      if (textIndex >= texts.length) textIndex = 0;
    }

  }

  const speed = isDeleting ? 45 : 85;
  setTimeout(typeEffect, speed);

}

// =========================
// START — small delay so
// skeleton is visible briefly
// =========================

setTimeout(typeEffect, 600);