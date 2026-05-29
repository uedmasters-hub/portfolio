<?php
require_once __DIR__ . "/../includes/config.php";
require_once __DIR__ . "/../data/blog.php";

// Find this post
$post = array_values(array_filter($posts, fn($p) => $p['slug'] === 'what-i-learned-at-4am'))[0];

// Find next/prev
$allSlugs = array_column($posts, 'slug');
$idx      = array_search($post['slug'], $allSlugs);
$next     = $posts[($idx + 1) % count($posts)] ?? null;
$prev     = $idx > 0 ? $posts[$idx - 1] : null;

$currentKey = "blogs";
$pageTitle  = htmlspecialchars($post['title']) . " — Field Notes";
$pageDesc   = htmlspecialchars($post['excerpt']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= $pageDesc ?>"/>
  <title><?= $pageTitle ?></title>
  
  <!-- FAVICON -->
  <link rel="icon" type="image/x-icon"     href="/assets/icons/favicon.ico"/>
  <link rel="icon" type="image/svg+xml"    href="/assets/icons/favicon.svg"/>
  <link rel="icon" type="image/png" sizes="32x32"  href="/assets/icons/favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16"  href="/assets/icons/favicon-16x16.png"/>
  <link rel="apple-touch-icon" sizes="180x180"     href="/assets/icons/favicon-180x180.png"/>
  <meta name="theme-color" content="#0f0f0f"/>
  
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,300;0,14..32,400;0,14..32,500;0,14..32,600;0,14..32,700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="../assets/css/preloader.css"/>
  <link rel="stylesheet" href="../assets/css/variables.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/blog.css"/>
  <link rel="stylesheet" href="../assets/css/case-study.css"/>
  <style>
    /* ── POST ARTICLE STYLES ── */
    .post-hero { padding: 72px 48px 56px; border-bottom: 1px solid var(--border); max-width: 860px; }
    .post-hero__back { display: inline-flex; align-items: center; gap: 6px; font-size: 13px; color: var(--text-muted); margin-bottom: 32px; text-decoration: none; transition: color var(--t-fast) ease; }
    .post-hero__back:hover { color: var(--blue); }
    .post-hero__tag { font-size: 11px; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase; color: var(--blue); margin-bottom: 14px; display: block; }
    .post-hero__emoji { font-size: 3.2rem; line-height: 1; margin-bottom: 20px; display: block; }
    .post-hero__title { font-size: clamp(2rem, 4vw, 3.6rem); font-weight: 300; letter-spacing: -0.06em; line-height: 1.05; color: var(--text-primary); margin-bottom: 16px; }
    .post-hero__subtitle { font-size: 1.05rem; line-height: 1.65; color: var(--text-muted); margin-bottom: 24px; max-width: 56ch; }
    .post-hero__meta { display: flex; align-items: center; gap: 12px; font-size: 13px; color: var(--text-muted); }
    .post-hero__meta-dot { width: 3px; height: 3px; border-radius: 50%; background: var(--border-hover); }

    .post-body { display: grid; grid-template-columns: 200px 1fr; gap: 64px; padding: 56px 48px 80px; max-width: 1100px; align-items: start; }

    .post-toc { position: sticky; top: 100px; }
    .post-toc__label { font-size: 10px; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 14px; display: block; }
    .post-toc__item { display: block; font-size: 13px; color: var(--text-muted); padding: 6px 0 6px 14px; border-left: 2px solid var(--border); margin-bottom: 2px; text-decoration: none; transition: color var(--t-fast) ease, border-color var(--t-fast) ease; }
    .post-toc__item:hover, .post-toc__item.is-active { color: var(--blue); border-color: var(--blue); }

    .post-article { max-width: 660px; }
    .post-article p { font-size: 16px; line-height: 1.85; color: var(--text-secondary); margin-bottom: 20px; }
    .post-article p:first-child { font-size: 1.1rem; color: var(--text-primary); font-weight: 400; }
    .post-article strong { font-weight: 600; color: var(--text-primary); }
    .post-article em { font-style: italic; }

    .post-takeaway { margin: 36px 0; padding: 24px 28px; background: var(--text-primary); border-radius: var(--radius-lg); position: relative; overflow: hidden; }
    .post-takeaway::before { content: ""; position: absolute; top: -40%; left: -10%; width: 60%; height: 200%; background: radial-gradient(ellipse, rgba(26,70,201,0.35) 0%, transparent 65%); pointer-events: none; }
    .post-takeaway__label { font-size: 10px; font-weight: 600; letter-spacing: 0.18em; text-transform: uppercase; color: rgba(255,255,255,0.40); margin-bottom: 8px; position: relative; z-index: 1; }
    .post-takeaway__text { font-size: 15px; line-height: 1.7; color: rgba(255,255,255,0.85); font-style: italic; position: relative; z-index: 1; }

    .post-nav { border-top: 1px solid var(--border); padding: 48px 48px; display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .post-nav__link { padding: 24px; background: #fff; border: 1px solid var(--border); border-radius: var(--radius-md); text-decoration: none; display: block; transition: transform 0.3s var(--ease-out), box-shadow 0.3s ease, border-color 0.3s ease; }
    .post-nav__link:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(26,70,201,0.08); border-color: rgba(26,70,201,0.18); }
    .post-nav__dir { font-size: 10px; font-weight: 600; letter-spacing: 0.14em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 8px; }
    .post-nav__title { font-size: 14px; font-weight: 500; color: var(--text-primary); line-height: 1.3; transition: color var(--t-fast) ease; }
    .post-nav__link:hover .post-nav__title { color: var(--blue); }

    .post-progress { position: fixed; top: 0; left: 0; height: 2px; background: var(--blue); width: 0%; z-index: 200; transition: width 0.1s linear; }

    @media (max-width: 768px) {
      .post-hero { padding: 48px 20px 40px; }
      .post-body  { grid-template-columns: 1fr; padding: 40px 20px 64px; }
      .post-toc   { display: none; }
      .post-nav   { grid-template-columns: 1fr; padding: 40px 20px; }
    }
  </style>
</head>
<body>

  <div class="post-progress" id="post-progress"></div>

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

  <div class="bg-canvas" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-orb-1"></div>
    <div class="bg-orb-2"></div>
  </div>

  <div class="page-wrapper">

    <?php require_once __DIR__ . "/../partials/header.php"; ?>

    <main id="main-content">

      <!-- HERO -->
      <div class="post-hero fade-in">
        <a href="index.php" class="post-hero__back">← Field Notes</a>
        <span class="post-hero__emoji"><?= $post['emoji'] ?></span>
        <span class="post-hero__tag"><?= htmlspecialchars($post['tag']) ?></span>
        <h1 class="post-hero__title"><?= htmlspecialchars($post['title']) ?></h1>
        <p class="post-hero__subtitle"><?= htmlspecialchars($post['subtitle']) ?></p>
        <div class="post-hero__meta">
          <span><?= htmlspecialchars($post['date']) ?></span>
          <span class="post-hero__meta-dot"></span>
          <span><?= htmlspecialchars($post['read_time']) ?></span>
          <span class="post-hero__meta-dot"></span>
          <span>By Ramesh Mandal</span>
        </div>
      </div>

      <!-- BODY -->
      <div class="post-body">

        <!-- TOC -->
        <nav class="post-toc" aria-label="Article navigation">
          <span class="post-toc__label">In this note</span>
          <a href="#observation"  class="post-toc__item" data-toc="observation">The Observation</a>
          <a href="#what-i-saw"   class="post-toc__item" data-toc="what-i-saw">Lab vs Reality</a>
          <a href="#the-three"    class="post-toc__item" data-toc="the-three">3 Things I Learned</a>
          <a href="#the-result"   class="post-toc__item" data-toc="the-result">The Result</a>
          <a href="#takeaway"     class="post-toc__item" data-toc="takeaway">Takeaway</a>
        </nav>

        <!-- ARTICLE -->
        <article class="post-article" id="post-article">

          <section id="observation" style="scroll-margin-top:100px">
            <p><?= htmlspecialchars($post['body'][0]) ?></p>
            <p><?= htmlspecialchars($post['body'][1]) ?></p>
          </section>

          <section id="what-i-saw" style="scroll-margin-top:100px">
            <p><?= htmlspecialchars($post['body'][2]) ?></p>
            <p><?= htmlspecialchars($post['body'][3]) ?></p>
          </section>

          <section id="the-three" style="scroll-margin-top:100px">
            <p><?= htmlspecialchars($post['body'][4]) ?></p>
          </section>

          <section id="the-result" style="scroll-margin-top:100px">
            <p><?= htmlspecialchars($post['body'][5]) ?></p>
          </section>

          <section id="takeaway" style="scroll-margin-top:100px">
            <div class="post-takeaway">
              <p class="post-takeaway__label">The Takeaway</p>
              <p class="post-takeaway__text"><?= htmlspecialchars($post['takeaway']) ?></p>
            </div>
          </section>

        </article>

      </div>

      <!-- POST NAVIGATION -->
      <div class="post-nav">
        <?php if ($prev): ?>
          <a href="<?= htmlspecialchars($prev['slug']) ?>.php" class="post-nav__link">
            <p class="post-nav__dir">← Previous Note</p>
            <p class="post-nav__title"><?= htmlspecialchars($prev['title']) ?></p>
          </a>
        <?php else: ?>
          <div></div>
        <?php endif; ?>

        <?php if ($next): ?>
          <a href="<?= htmlspecialchars($next['slug']) ?>.php" class="post-nav__link" style="text-align:right">
            <p class="post-nav__dir">Next Note →</p>
            <p class="post-nav__title"><?= htmlspecialchars($next['title']) ?></p>
          </a>
        <?php endif; ?>
      </div>

    </main>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div>

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/background.js" defer></script>
  <script src="../assets/js/animations.js" defer></script>
  <script src="../assets/js/app.js" defer></script>
  <script>
  /* Reading progress */
  (function(){
    const bar  = document.getElementById("post-progress");
    const main = document.getElementById("main-content");
    if (!bar||!main) return;
    window.addEventListener("scroll", function(){
      bar.style.width = Math.min(100,(window.scrollY/(main.scrollHeight-window.innerHeight))*100)+"%";
    }, {passive:true});
  })();
  /* Active TOC */
  (function(){
    const items = document.querySelectorAll(".post-toc__item[data-toc]");
    const secs  = document.querySelectorAll("section[id]");
    if (!items.length) return;
    const obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(e.isIntersecting){
          items.forEach(function(n){n.classList.remove("is-active");});
          const a=document.querySelector('.post-toc__item[data-toc="'+e.target.id+'"]');
          if(a) a.classList.add("is-active");
        }
      });
    },{rootMargin:"-20% 0px -70% 0px"});
    secs.forEach(function(s){obs.observe(s);});
  })();
  </script>

</body>
</html>
