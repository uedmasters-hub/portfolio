<?php
/* =========================================
   BLOG/POST.PHP — Universal Blog Post Template
   Usage: blog/post.php?slug=the-redesign-nobody-asked-for
   OR via .htaccess: /blog/the-redesign-nobody-asked-for
   ========================================= */

require_once __DIR__ . "/../includes/config.php";
require_once __DIR__ . "/../data/blog.php";

// ── GET SLUG ──────────────────────────────
$slug = isset($_GET['slug'])
  ? preg_replace('/[^a-z0-9\-]/', '', strtolower(trim($_GET['slug'])))
  : '';

// ── FIND POST ─────────────────────────────
$post = null;
$postIndex = null;
foreach ($posts as $i => $p) {
  if ($p['slug'] === $slug) {
    $post      = $p;
    $postIndex = $i;
    break;
  }
}

// ── 404 if not found ──────────────────────
if (!$post) {
  http_response_code(404);
  require_once __DIR__ . "/../partials/header.php";
  echo '<div style="padding:120px 48px;max-width:600px">';
  echo '<h1 style="font-size:3rem;font-weight:300;margin-bottom:16px">Post not found</h1>';
  echo '<p style="color:var(--text-muted);margin-bottom:32px">That note doesn\'t exist or may have moved.</p>';
  echo '<a href="index.php" style="color:var(--blue)">← Back to Field Notes</a>';
  echo '</div>';
  require_once __DIR__ . "/../partials/footer.php";
  exit;
}

// ── PREV / NEXT ───────────────────────────
$prev = $postIndex > 0                   ? $posts[$postIndex - 1] : null;
$next = $postIndex < count($posts) - 1  ? $posts[$postIndex + 1] : null;

// ── RELATED (same category, not self) ─────
$related = array_filter($posts, fn($p) =>
  $p['category'] === $post['category'] && $p['slug'] !== $post['slug']
);
$related = array_slice(array_values($related), 0, 2);

$currentKey = "blogs";
$pageTitle  = htmlspecialchars($post['title']) . " — Field Notes";
$pageDesc   = htmlspecialchars($post['excerpt']);

// ── READING TIME from body ────────────────
$wordCount = array_sum(array_map('str_word_count', $post['body']));
$readTime  = max(1, round($wordCount / 200)) . ' min read';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description"  content="<?= $pageDesc ?>"/>
  <meta name="author"       content="Ramesh Mandal"/>
  <title><?= $pageTitle ?></title>

  <!-- CANONICAL — clean URL (rewritten by .htaccess) -->
  <link rel="canonical" href="https://6epixels.com/blog/<?= urlencode($post['slug']) ?>"/>

  <!-- OG / TWITTER -->
  <meta property="og:site_name"   content="Ramesh Mandal — Field Notes"/>
  <meta property="og:type"        content="article"/>
  <meta property="og:url"         content="https://6epixels.com/blog/<?= urlencode($post['slug']) ?>"/>
  <meta property="og:title"       content="<?= htmlspecialchars($post['title']) ?>"/>
  <meta property="og:description" content="<?= htmlspecialchars($post['excerpt'] ?? $post['subtitle'] ?? '') ?>"/>
  <meta property="og:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width" content="1200"/>
  <meta property="og:image:height"content="630"/>
  <meta property="og:locale"      content="en_IN"/>
  <meta property="article:author"         content="Ramesh Mandal"/>
  <meta property="article:section"        content="<?= htmlspecialchars($post['tag'] ?? 'UX Design') ?>"/>
  <meta name="twitter:card"       content="summary_large_image"/>
  <meta name="twitter:site"       content="@ramsmandal"/>
  <meta name="twitter:title"      content="<?= htmlspecialchars($post['title']) ?>"/>
  <meta name="twitter:description"content="<?= htmlspecialchars($post['excerpt'] ?? $post['subtitle'] ?? '') ?>"/>
  <meta name="twitter:image"      content="https://6epixels.com/assets/og/og-default.jpg"/>

  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"    href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"   href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16"  href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>

  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>

  <link rel="stylesheet" href="../assets/css/preloader.css"/>
  <link rel="stylesheet" href="../assets/css/variables.css"/>
  <link rel="stylesheet" href="../assets/css/animations.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/post.css"/>

  <!-- JSON-LD STRUCTURED DATA -->
  <?php
    require_once __DIR__ . "/../includes/schema.php";
    echo schema_article($post);
    echo schema_breadcrumb([
      ['Home',        'https://6epixels.com/'],
      ['Field Notes', 'https://6epixels.com/blog/'],
      [$post['title'], 'https://6epixels.com/blog/post.php?slug=' . urlencode($post['slug'])],
    ]);
  ?>
</head>
<body>

  <!-- READING PROGRESS -->
  <div class="post-progress" id="post-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">Field Notes</span>
        <span class="preloader__name-role"><?= htmlspecialchars($post['tag']) ?></span>
      </div>
      <div class="preloader__bar-wrap"><div class="preloader__bar" id="preloader-bar"></div></div>
      <span class="preloader__counter" id="preloader-counter">0%</span>
    </div>
  </div>

  <!-- BACKGROUND -->
  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
  </div>

<?php require_once __DIR__ . "/../partials/header.php"; ?>

  <div class="page-wrapper">

    <main id="main-content">

      <!-- HERO -->
      <header class="post-hero fade-in">
        <a href="index.php" class="post-hero__back">
          <span>←</span> Field Notes
        </a>

        <span class="post-hero__emoji" aria-hidden="true"><?= $post['emoji'] ?></span>

        <div class="post-hero__tag-wrap">
          <span class="post-hero__tag"><?= htmlspecialchars($post['tag']) ?></span>
        </div>

        <h1 class="post-hero__title"><?= htmlspecialchars($post['title']) ?></h1>
        <p class="post-hero__subtitle"><?= htmlspecialchars($post['subtitle']) ?></p>

        <div class="post-hero__meta">
          <span><?= htmlspecialchars($post['date']) ?></span>
          <span class="post-hero__dot" aria-hidden="true"></span>
          <span><?= $readTime ?></span>
          <span class="post-hero__dot" aria-hidden="true"></span>
          <span>Ramesh Mandal</span>
        </div>
      </header>

      <!-- BODY -->
      <div class="post-body">

        <!-- SIDEBAR TOC -->
        <aside class="post-sidebar" aria-label="Article contents">
          <nav class="post-toc">
            <span class="post-toc__label">In this note</span>
            <?php foreach ($post['body'] as $i => $para): ?>
              <a
                href="#para-<?= $i ?>"
                class="post-toc__item"
                data-toc="para-<?= $i ?>"
              >
                <?= mb_strimwidth(strip_tags($para), 0, 42, '…') ?>
              </a>
            <?php endforeach; ?>
            <a href="#takeaway" class="post-toc__item" data-toc="takeaway">
              ↳ Takeaway
            </a>
          </nav>

          <!-- SHARE -->
          <div class="post-share">
            <span class="post-toc__label">Share</span>
            <div class="post-share__btns">
              <a
                href="https://www.linkedin.com/sharing/share-offsite/?url=https://6epixels.com/blog/post.php?slug=<?= urlencode($post['slug']) ?>"
                class="post-share__btn"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on LinkedIn"
              >
                LinkedIn ↗
              </a>
              <a
                href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode('https://6epixels.com/blog/post.php?slug='.$post['slug']) ?>"
                class="post-share__btn"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on Twitter"
              >
                Twitter ↗
              </a>
            </div>
          </div>
        </aside>

        <!-- ARTICLE -->
        <article class="post-article" id="post-article">

          <?php foreach ($post['body'] as $i => $para): ?>
            <p
              id="para-<?= $i ?>"
              class="post-article__para<?= $i === 0 ? ' post-article__para--lead' : '' ?>"
              style="scroll-margin-top:100px"
            >
              <?= htmlspecialchars($para) ?>
            </p>
          <?php endforeach; ?>

          <!-- TAKEAWAY -->
          <div class="post-takeaway" id="takeaway" style="scroll-margin-top:100px">
            <p class="post-takeaway__label">The Takeaway</p>
            <p class="post-takeaway__text"><?= htmlspecialchars($post['takeaway']) ?></p>
          </div>

        </article>

      </div><!-- /.post-body -->

    </main>

    <!-- SAME-CATEGORY POSTS — outside main, full width -->
    <?php if (!empty($related)): ?>
    <section class="post-related">
      <div class="post-related__inner">
        <?php
          $tagPlural = [
            'War Story'         => 'MORE WAR STORIES',
            'Quiet Win'         => 'MORE QUIET WINS',
            'Unpopular Opinion' => 'MORE UNPOPULAR OPINIONS',
            'From the Field'    => 'MORE FROM THE FIELD',
          ];
          $label = $tagPlural[$post['tag']] ?? ('MORE ' . strtoupper($post['tag']) . 'S');
        ?>
        <p class="post-related__label"><?= $label ?></p>
        <div class="post-related__grid">
          <?php foreach ($related as $r): ?>
            <a href="/blog/<?= urlencode($r['slug']) ?>" class="post-related__card fade-in">
              <span class="post-related__emoji" aria-hidden="true"><?= $r['emoji'] ?></span>
              <div>
                <p class="post-related__card-tag"><?= htmlspecialchars($r['tag']) ?></p>
                <p class="post-related__card-title"><?= htmlspecialchars($r['title']) ?></p>
                <p class="post-related__card-excerpt"><?= htmlspecialchars($r['excerpt']) ?></p>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <!-- PREV / NEXT — outside main, full width -->
    <?php if ($prev || $next): ?>
    <nav class="post-nav" aria-label="Browse posts">
      <div class="post-nav__inner">
        <?php if ($prev): ?>
          <a href="/blog/<?= urlencode($prev['slug']) ?>" class="post-nav__link">
            <p class="post-nav__dir">← Previous Note</p>
            <p class="post-nav__meta"><?= htmlspecialchars($prev['tag']) ?></p>
            <p class="post-nav__title"><?= htmlspecialchars($prev['title']) ?></p>
          </a>
        <?php endif; ?>
        <?php if ($next): ?>
          <a href="/blog/<?= urlencode($next['slug']) ?>" class="post-nav__link post-nav__link--right">
            <p class="post-nav__dir">Next Note →</p>
            <p class="post-nav__meta"><?= htmlspecialchars($next['tag']) ?></p>
            <p class="post-nav__title"><?= htmlspecialchars($next['title']) ?></p>
          </a>
        <?php endif; ?>
      </div>
    </nav>
    <?php endif; ?>

    <!-- CROSS-CONTENT INTERNAL LINKS -->
    <?php
      require_once __DIR__ . "/../partials/related-content.php";
      render_related_content('blog', $post['slug']);
    ?>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div>

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/background.js" defer></script>
  <script src="../assets/js/animations.js" defer></script>
  <script src="../assets/js/app.js" defer></script>
  <script>
  /* ── READING PROGRESS ── */
  (function(){
    var bar  = document.getElementById("post-progress");
    var main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      var h   = main.scrollHeight - window.innerHeight;
      var pct = Math.min(100, (window.scrollY / h) * 100);
      bar.style.width = pct + "%";
    }, { passive: true });
  })();

  /* ── ACTIVE TOC ── */
  (function(){
    var items = document.querySelectorAll(".post-toc__item[data-toc]");
    var secs  = document.querySelectorAll("[id]");
    if (!items.length) return;
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          items.forEach(function(n){ n.classList.remove("is-active"); });
          var a = document.querySelector('.post-toc__item[data-toc="' + e.target.id + '"]');
          if (a) a.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    secs.forEach(function(s){ if (s.id) obs.observe(s); });
  })();
  </script>

</body>
</html>