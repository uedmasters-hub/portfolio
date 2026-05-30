<?php
/* =========================================
   PARTIALS / RELATED-CONTENT.PHP
   Cross-content internal linking.

   Call: render_related_content('case-study', 'indigo-booking');
         render_related_content('audit', 'zomato-checkout');
         render_related_content('blog', $post['slug']);
   ========================================= */

function render_related_content(string $type, string $slug): void {

  /* Load data files into isolated scope so we always get fresh
     variables regardless of what the parent page already loaded.
     We use separate closures to avoid variable bleed.           */

  $posts       = (function(){ $blogMeta=[]; $categories=[]; $posts=[]; include __DIR__.'/../data/blog.php'; return $posts; })();
  $audits      = (function(){ $audits=[]; include __DIR__.'/../data/audits.php'; return $audits; })();
  $caseStudies = (function(){ $caseStudies=[]; include __DIR__.'/../data/case-studies.php'; return $caseStudies; })();
  $principles  = (function(){ $psychologyMeta=[]; $categories=[]; $principles=[]; include __DIR__.'/../data/psychology.php'; return $principles; })();

  /* ── BLOG: pick 2, skip self ─────────── */
  $blogPicks = [];
  foreach ($posts as $p) {
    if ($type === 'blog' && $p['slug'] === $slug) continue;
    $blogPicks[] = $p;
    if (count($blogPicks) >= 2) break;
  }

  /* ── AUDIT: pick 1 published, skip self ─ */
  $auditPick = null;
  foreach ($audits as $a) {
    if ($a['status'] !== 'published') continue;
    if ($type === 'audit' && $a['slug'] === $slug) continue;
    $auditPick = $a; break;
  }

  /* ── CASE STUDY: pick 1 published, skip self */
  $csPick = null;
  foreach ($caseStudies as $cs) {
    if ($cs['status'] !== 'published') continue;
    if ($type === 'case-study' && $cs['slug'] === $slug) continue;
    $csPick = $cs; break;
  }

  /* ── PSYCHOLOGY: first principle ─────── */
  $psychPick = $principles[0] ?? null;

  ?>
<section class="rc-section" aria-label="More to explore">
  <div class="rc-header">
    <p class="rc-kicker">KEEP READING</p>
    <h2 class="rc-title">More from the <span>platform</span></h2>
  </div>
  <div class="rc-grid">

    <?php if ($type !== 'blog' && !empty($blogPicks)): ?>
    <div class="rc-col">
      <p class="rc-col__label"><span class="rc-col__icon">⚡</span> Field Notes</p>
      <div class="rc-col__items">
        <?php foreach ($blogPicks as $p): ?>
        <a href="/blog/<?= urlencode($p['slug']) ?>" class="rc-item">
          <span class="rc-item__emoji"><?= htmlspecialchars($p['emoji']) ?></span>
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
    <div class="rc-col">
      <p class="rc-col__label"><span class="rc-col__icon">◎</span> UX Audits</p>
      <div class="rc-col__items">
        <a href="/audit/<?= urlencode($auditPick['slug']) ?>" class="rc-item">
          <img src="<?= htmlspecialchars($auditPick['image']) ?>"
               alt="<?= htmlspecialchars($auditPick['product']) ?> UX Audit"
               class="rc-item__thumb" loading="lazy" width="64" height="40"/>
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
    <div class="rc-col">
      <p class="rc-col__label"><span class="rc-col__icon">◈</span> Case Studies</p>
      <div class="rc-col__items">
        <a href="/case-study/<?= urlencode($csPick['slug']) ?>" class="rc-item">
          <img src="<?= htmlspecialchars($csPick['image']) ?>"
               alt="<?= htmlspecialchars($csPick['title']) ?>"
               class="rc-item__thumb" loading="lazy" width="64" height="40"/>
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
    <div class="rc-col">
      <p class="rc-col__label"><span class="rc-col__icon">⬡</span> UX Psychology</p>
      <div class="rc-col__items">
        <a href="/psychology/" class="rc-item">
          <div class="rc-item__body">
            <p class="rc-item__tag"><?= htmlspecialchars(ucfirst($psychPick['category'])) ?></p>
            <p class="rc-item__title"><?= htmlspecialchars($psychPick['name']) ?></p>
            <p class="rc-item__meta"><?= htmlspecialchars($psychPick['tagline']) ?></p>
          </div>
          <span class="rc-item__arrow">→</span>
        </a>
        <a href="/psychology/" class="rc-item__browse">Browse all 14 principles →</a>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>
<?php
} // end render_related_content