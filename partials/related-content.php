<?php
/* =========================================
   PARTIALS / RELATED-CONTENT.PHP
   Cross-content internal linking section.
   Works across blog, audit, case-study pages.

   Usage — include near footer of any content page:

   // Blog post page:
   require_once __DIR__ . "/../partials/related-content.php";
   echo render_related_content([
     'current_type'  => 'blog',
     'current_slug'  => $post['slug'],
     'current_tags'  => [$post['category']],
   ]);

   // Audit page:
   echo render_related_content([
     'current_type' => 'audit',
     'current_slug' => 'zomato-checkout',
     'current_tags' => ['Checkout UX', 'Mobile'],
   ]);

   // Case study page:
   echo render_related_content([
     'current_type' => 'case-study',
     'current_slug' => 'indigo-booking',
     'current_tags' => ['Conversion Optimisation', 'Enterprise UX'],
   ]);
   ========================================= */

require_once __DIR__ . "/../data/blog.php";
require_once __DIR__ . "/../data/audits.php";
require_once __DIR__ . "/../data/case-studies.php";
require_once __DIR__ . "/../data/psychology.php";

function render_related_content(array $opts): string {

  $type = $opts['current_type'] ?? 'blog';
  $slug = $opts['current_slug'] ?? '';
  $tags = $opts['current_tags'] ?? [];

  /* ── PICK 2 BLOG POSTS ────────────────────
     From same category, exclude current      */
  global $posts;
  $blogPicks = [];
  foreach (($posts ?? []) as $p) {
    if ($p['slug'] === $slug && $type === 'blog') continue;
    $blogPicks[] = $p;
    if (count($blogPicks) >= 2) break;
  }

  /* ── PICK 1 AUDIT ─────────────────────────
     Published only, exclude current          */
  global $audits;
  $auditPick = null;
  foreach (($audits ?? []) as $a) {
    if ($a['status'] !== 'published') continue;
    if ($a['slug'] === $slug && $type === 'audit') continue;
    $auditPick = $a;
    break;
  }

  /* ── PICK 1 CASE STUDY ────────────────────
     Published only, exclude current          */
  global $caseStudies;
  $csPick = null;
  foreach (($caseStudies ?? []) as $cs) {
    if ($cs['status'] !== 'published') continue;
    if ($cs['slug'] === $slug && $type === 'case-study') continue;
    $csPick = $cs;
    break;
  }

  /* ── PICK 1 PSYCHOLOGY PRINCIPLE ──────────
     Just first one — all are good            */
  global $principles;
  $psychPick = !empty($principles) ? $principles[0] : null;

  ob_start();
?>
<section class="rc-section" aria-label="More to explore">

  <div class="rc-header">
    <p class="rc-kicker">KEEP READING</p>
    <h2 class="rc-title">More from the <span>platform</span></h2>
  </div>

  <div class="rc-grid">

    <?php if ($type !== 'blog' && !empty($blogPicks)): ?>
    <!-- BLOG COLUMN -->
    <div class="rc-col">
      <p class="rc-col__label">
        <span class="rc-col__icon">⚡</span> Field Notes
      </p>
      <div class="rc-col__items">
        <?php foreach ($blogPicks as $p): ?>
        <a href="/blog/<?= urlencode($p['slug']) ?>" class="rc-item rc-item--blog">
          <span class="rc-item__emoji"><?= $p['emoji'] ?></span>
          <div class="rc-item__body">
            <p class="rc-item__tag"><?= htmlspecialchars($p['tag']) ?></p>
            <p class="rc-item__title"><?= htmlspecialchars($p['title']) ?></p>
            <p class="rc-item__meta"><?= htmlspecialchars($p['read_time']) ?></p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($type !== 'audit' && $auditPick): ?>
    <!-- AUDIT COLUMN -->
    <div class="rc-col">
      <p class="rc-col__label">
        <span class="rc-col__icon">◎</span> UX Audits
      </p>
      <div class="rc-col__items">
        <a href="/audit/<?= urlencode($auditPick['slug']) ?>" class="rc-item rc-item--audit">
          <img
            src="<?= htmlspecialchars($auditPick['image']) ?>"
            alt="<?= htmlspecialchars($auditPick['product']) ?> UX Audit"
            class="rc-item__thumb"
            loading="lazy"
            width="64" height="40"
          />
          <div class="rc-item__body">
            <p class="rc-item__tag"><?= htmlspecialchars($auditPick['category']) ?></p>
            <p class="rc-item__title"><?= htmlspecialchars($auditPick['title']) ?></p>
            <p class="rc-item__meta">Score <?= $auditPick['score'] ?>/100 · <?= $auditPick['friction_count'] ?> friction points</p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($type !== 'case-study' && $csPick): ?>
    <!-- CASE STUDY COLUMN -->
    <div class="rc-col">
      <p class="rc-col__label">
        <span class="rc-col__icon">◈</span> Case Studies
      </p>
      <div class="rc-col__items">
        <a href="/case-study/<?= urlencode($csPick['slug']) ?>" class="rc-item rc-item--cs">
          <img
            src="<?= htmlspecialchars($csPick['image']) ?>"
            alt="<?= htmlspecialchars($csPick['title']) ?>"
            class="rc-item__thumb"
            loading="lazy"
            width="64" height="40"
          />
          <div class="rc-item__body">
            <p class="rc-item__tag"><?= htmlspecialchars($csPick['category']) ?></p>
            <p class="rc-item__title"><?= htmlspecialchars($csPick['title']) ?></p>
            <p class="rc-item__meta"><?= htmlspecialchars($csPick['year']) ?> · <?= htmlspecialchars($csPick['company']) ?></p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($psychPick): ?>
    <!-- PSYCHOLOGY COLUMN -->
    <div class="rc-col">
      <p class="rc-col__label">
        <span class="rc-col__icon">⬡</span> UX Psychology
      </p>
      <div class="rc-col__items">
        <a href="/psychology/" class="rc-item rc-item--psych">
          <div class="rc-item__body">
            <p class="rc-item__tag"><?= htmlspecialchars(ucfirst($psychPick['category'])) ?></p>
            <p class="rc-item__title"><?= htmlspecialchars($psychPick['name']) ?></p>
            <p class="rc-item__meta"><?= htmlspecialchars($psychPick['tagline']) ?></p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
        <a href="/psychology/" class="rc-item__browse">
          Browse all 14 principles →
        </a>
      </div>
    </div>
    <?php endif; ?>

  </div>

</section>
<?php
  return ob_get_clean();
}