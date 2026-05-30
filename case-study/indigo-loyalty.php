<?php
require_once __DIR__ . "/../includes/config.php";

$currentKey = "case-studies";
$pageTitle  = "IndiGo Gamified Loyalty Program — Case Study";
$pageDesc   = "How I designed a gamified loyalty POC for IndiGo, validated through 500+ user tests, that boosted retention by 40% and shaped the product roadmap.";

$meta = [
  ["label" => "Role",     "value" => "Manager UI/UX"],
  ["label" => "Company",  "value" => "IndiGo Airlines"],
  ["label" => "Duration", "value" => "8 months"],
  ["label" => "Year",     "value" => "2020 – 2021"],
];

$nav = [
  ["id" => "overview",   "label" => "Overview"],
  ["id" => "problem",    "label" => "Problem"],
  ["id" => "research",   "label" => "Research"],
  ["id" => "psychology", "label" => "Psychology"],
  ["id" => "process",    "label" => "Process"],
  ["id" => "solution",   "label" => "Solution"],
  ["id" => "outcomes",   "label" => "Outcomes"],
  ["id" => "learnings",  "label" => "Learnings"],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>"/>
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <!-- OG / TWITTER META -->
  <meta property="og:site_name"    content="Ramesh Mandal"/>
  <meta property="og:type"         content="article"/>
  <meta property="og:url"          content="https://6epixels.com/case-study/indigo-loyalty.php"/>
  <meta property="og:title"        content="IndiGo Gamified Loyalty — Case Study"/>
  <meta property="og:description"  content="Turning passive flyers into engaged members. 40% retention lift, 500+ user tests."/>
  <meta property="og:image"        content="https://6epixels.com/assets/og/og-default.jpg"/>
  <meta property="og:image:width"  content="1200"/>
  <meta property="og:image:height" content="630"/>
  <meta property="og:locale"       content="en_IN"/>
  <meta name="twitter:card"        content="summary_large_image"/>
  <meta name="twitter:site"        content="@ramsmandal"/>
  <meta name="twitter:title"       content="IndiGo Gamified Loyalty — Case Study"/>
  <meta name="twitter:description" content="Turning passive flyers into engaged members. 40% retention lift, 500+ user tests."/>
  <meta name="twitter:image"       content="https://6epixels.com/assets/og/og-default.jpg"/>
  <link rel="canonical"            href="https://6epixels.com/case-study/indigo-loyalty.php"/>

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
  <link rel="stylesheet" href="../assets/css/animations.css"/>
  <link rel="stylesheet" href="../assets/css/reset.css"/>
  <link rel="stylesheet" href="../assets/css/main.css"/>
  <link rel="stylesheet" href="../assets/css/navigation.css"/>
  <link rel="stylesheet" href="../assets/css/background.css"/>
  <link rel="stylesheet" href="../assets/css/footer.css"/>
  <link rel="stylesheet" href="../assets/css/case-study.css"/>
  <link rel="stylesheet" href="../assets/css/related-content.css"/>
</head>
<body>

  <!-- READING PROGRESS -->
  <div class="cs-progress-bar" id="cs-progress" role="progressbar" aria-label="Reading progress"></div>

  <!-- PRELOADER -->
  <div class="preloader" id="preloader" aria-hidden="true">
    <div class="preloader__grid"></div>
    <div class="preloader__inner">
      <div class="preloader__mark">RM</div>
      <div class="preloader__name">
        <span class="preloader__name-text">IndiGo Loyalty</span>
        <span class="preloader__name-role">Case Study · Gamification & Retention</span>
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

      <!-- HERO IMAGE -->
      <div class="cs-detail-hero fade-in">
        <img
          class="cs-detail-hero__img"
          src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?q=80&w=2400&auto=format&fit=crop"
          alt="Loyalty and rewards visual representing the IndiGo gamified loyalty program"
          loading="eager"
        />
        <div class="cs-detail-hero__overlay"></div>
        <div class="cs-detail-hero__content">
          <p class="cs-detail-hero__category">LOYALTY & RETENTION DESIGN</p>
          <h1 class="cs-detail-hero__title">IndiGo Gamified<br>Loyalty Program</h1>
          <p class="cs-detail-hero__tagline">
            Turning passive flyers into engaged members — validated through 500+ user tests.
          </p>
        </div>
      </div>

      <!-- META BAR -->
      <div class="cs-meta-bar">
        <?php foreach ($meta as $m): ?>
          <div class="cs-meta-item">
            <span class="cs-meta-item__label"><?= htmlspecialchars($m['label']) ?></span>
            <span class="cs-meta-item__value"><?= htmlspecialchars($m['value']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- CONTENT -->
      <div class="cs-content">

        <!-- STICKY NAV -->
        <nav class="cs-nav" aria-label="Case study sections">
          <?php foreach ($nav as $n): ?>
            <a href="#<?= $n['id'] ?>" class="cs-nav__item" data-nav="<?= $n['id'] ?>">
              <?= htmlspecialchars($n['label']) ?>
            </a>
          <?php endforeach; ?>
        </nav>

        <!-- ARTICLE -->
        <article class="cs-article">

          <!-- OVERVIEW -->
          <section class="cs-section" id="overview">
            <span class="cs-section__label">01 — Overview</span>
            <h2 class="cs-section__title">IndiGo had loyal passengers. Not loyal members.</h2>
            <div class="cs-section__body">
              <p>IndiGo carried more passengers than any airline in India. Yet when travellers were asked if they felt any loyalty to the brand, the answers were almost uniformly transactional: "I book whoever is cheapest." Repeat booking rates were driven by price, not relationship.</p>
              <p>The product team identified this as a strategic risk: if a competitor undercut IndiGo on price — even temporarily — there was nothing holding customers. I was tasked with designing a loyalty POC (proof of concept) that would test whether gamification could shift passive price-driven behaviour into active brand engagement.</p>
              <p>This was not a brief to redesign an existing loyalty programme. IndiGo had BluChip miles. This was a brief to answer a harder question: <em>can we make flying with IndiGo feel rewarding in a way that has nothing to do with miles?</em></p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Retention lift in POC user group vs control</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">500+</div>
                <div class="cs-metric-card__label">Users tested across 6 research rounds</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">78%</div>
                <div class="cs-metric-card__label">Task completion on first attempt (usability)</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">4.6/5</div>
                <div class="cs-metric-card__label">Average desirability score across segments</div>
              </div>
            </div>
          </section>

          <!-- PROBLEM -->
          <section class="cs-section" id="problem">
            <span class="cs-section__label">02 — Problem</span>
            <h2 class="cs-section__title">Miles aren't motivating. Status isn't either.</h2>
            <div class="cs-section__body">
              <p>Before designing anything, I needed to understand why the existing BluChip miles programme wasn't creating loyalty. The answer was uncomfortable: it was too abstract, too slow, and too cold.</p>
              <p>Through exit interviews and funnel analysis, three structural problems emerged:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Reward horizon too distant</p>
                  <p class="cs-step__desc">Average time to meaningful redemption was 14 months. Users accrued miles, forgot about them, and felt no emotional connection to the programme. "I have some miles somewhere, I think."</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Zero feedback between flights</p>
                  <p class="cs-step__desc">The loyalty touchpoint only existed at booking. Between flights — the 6-week gap between trips for the average IndiGo business traveller — there was no engagement, no reminder of membership, no relationship.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Status tiers felt arbitrary</p>
                  <p class="cs-step__desc">The tier system (Silver, Gold, Platinum) had no visible progress mechanism. Users didn't know how close they were to the next tier, what behaviours would get them there, or what they'd gain. The programme asked for loyalty without giving visibility.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">4</div>
                <div>
                  <p class="cs-step__title">No personalisation whatsoever</p>
                  <p class="cs-step__desc">A family of four on holiday and a solo business consultant flying weekly received identical communications, identical offers, identical experiences. The programme treated all members as the same person.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- RESEARCH -->
          <section class="cs-section" id="research">
            <span class="cs-section__label">03 — Research</span>
            <h2 class="cs-section__title">What actually makes people come back?</h2>
            <div class="cs-section__body">
              <p>I ran a 6-week research programme structured in two phases: understanding the problem space, then testing early concepts.</p>
              <p><strong>Phase 1 — Discovery (Weeks 1–3):</strong> 60 qualitative interviews with IndiGo frequent flyers (4+ flights per year). I recruited across four segments: solo business travellers, leisure couples, family groups, and occasional travellers. Each session was 45 minutes — 20 on current loyalty behaviour, 25 on competitive programmes and motivations.</p>
              <p><strong>Key insight from interviews:</strong> Participants didn't talk about miles. They talked about moments. Being remembered. Getting an unexpected upgrade. Seeing their name on the boarding gate. Small signals that said <em>you matter to us</em>. The research pointed away from transactional loyalty (earn-burn) toward experiential loyalty (recognition, progress, surprise).</p>
              <p><strong>Phase 2 — Concept testing (Weeks 4–6):</strong> I developed 4 concept directions as low-fidelity prototypes and tested each with 30 participants — 120 tests total. Concepts ranged from a gamified badge system to a travel personality profile to a streak-based engagement model.</p>
            </div>
            <blockquote class="cs-callout">
              "The Starbucks app makes me buy coffee I don't need just to keep my streak. I want that for flying — but airlines never feel that fun."<br>
              <small>— Interview participant, 26-year-old consultant, Gurugram</small>
            </blockquote>
            <div class="cs-section__body">
              <p>This quote came up in 11 different interviews — nearly verbatim. It confirmed the design direction: <strong>streaks, progress visibility, and micro-rewards</strong> were the right mechanism. Miles were not.</p>
            </div>
          </section>

          <!-- PSYCHOLOGY -->
          <section class="cs-section" id="psychology">
            <span class="cs-section__label">04 — Psychology</span>
            <h2 class="cs-section__title">The behavioural science behind the design</h2>
            <div class="cs-section__body">
              <p>Gamification without behavioural grounding is just decoration. I structured the entire loyalty experience around three proven psychological mechanisms:</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Variable reward schedules (Skinner)</p>
                  <p class="cs-step__desc">Predictable rewards train habit. Unpredictable rewards create compulsion. The programme introduced "surprise miles" — random bonus rewards after specific flights — to trigger the dopamine loop without requiring constant high-value redemptions.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Goal gradient effect</p>
                  <p class="cs-step__desc">People accelerate effort as they get closer to a goal. The tier progress bar was designed to always show the user within reach of something — never more than 2 flights away from a visible milestone. This required restructuring the tier thresholds.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">◎</div>
                <div>
                  <p class="cs-step__title">Endowed progress effect</p>
                  <p class="cs-step__desc">People who start with artificial progress (e.g., a loyalty card with 2 of 10 stamps pre-filled) complete the goal faster than those who start from zero. New members were onboarded with a "welcome bonus" that immediately showed them partway to their first reward.</p>
                </div>
              </div>
            </div>
            <div style="margin-top:16px">
              <span class="cs-insight">🧠 Variable Reward Loops</span>
              <span class="cs-insight">🧠 Goal Gradient Effect</span>
              <span class="cs-insight">🧠 Endowed Progress</span>
              <span class="cs-insight">🧠 Social Proof</span>
              <span class="cs-insight">🧠 Loss Aversion (Streak Protection)</span>
            </div>
          </section>

          <!-- PROCESS -->
          <section class="cs-section" id="process">
            <span class="cs-section__label">05 — Process</span>
            <h2 class="cs-section__title">From concept to 500-user validation</h2>
            <div class="cs-section__body">
              <p>This was a POC project — meaning the brief was to validate, not ship. The process was structured as a high-velocity design research loop: concept → prototype → test → refine → repeat.</p>
            </div>
            <div class="cs-steps">
              <div class="cs-step">
                <div class="cs-step__num">1</div>
                <div>
                  <p class="cs-step__title">Phase 1 — Concept Definition (Months 1–2)</p>
                  <p class="cs-step__desc">4 concept directions developed and tested with 120 participants. Winning concept: a "Travel Identity" system combining streak tracking, personalised travel badges, and progress-based tier advancement. The other 3 concepts were retired.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">2</div>
                <div>
                  <p class="cs-step__title">Phase 2 — Prototype Refinement (Months 3–5)</p>
                  <p class="cs-step__desc">6 rounds of usability testing on increasingly high-fidelity prototypes. Tested the onboarding flow, progress dashboard, badge unlock animations, and streak mechanic. Iterated on the visual language — the first version felt too "game-like" and lost credibility with business travellers.</p>
                </div>
              </div>
              <div class="cs-step">
                <div class="cs-step__num">3</div>
                <div>
                  <p class="cs-step__title">Phase 3 — Segment Testing (Months 6–8)</p>
                  <p class="cs-step__desc">Full prototype tested with 260 participants across all four segments. Measured: task completion, desirability (5-point scale), stated likelihood to increase flying frequency, and qualitative response to the gamification mechanic. Results fed directly into the product roadmap.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- SOLUTION -->
          <section class="cs-section" id="solution">
            <span class="cs-section__label">06 — Solution</span>
            <h2 class="cs-section__title">A loyalty system built on identity, not transactions</h2>
            <div class="cs-section__body">
              <p>The final POC centred on three interlocking design systems:</p>
              <p><strong>1. Travel Identity Badges.</strong> A set of 32 badges earned by flying behaviours — not just frequency. "Early Riser" (3+ early morning flights), "Weekend Explorer" (weekend leisure routes), "Business Class Graduate" (first upgrade). Badges were shareable and created social identity signals. 74% of test participants said they'd share their badge on social media.</p>
              <p><strong>2. Living Progress Dashboard.</strong> A home screen widget showing the user's streak (consecutive months with at least one flight), tier progress bar always within 2 flights of the next milestone, and the next badge within reach. The dashboard was designed to create a reason to open the app between flights — not just at booking.</p>
              <p><strong>3. Streak Protection Mechanic.</strong> If a user missed a flight month, they could "protect" their streak once per year using accumulated bonus miles. This turned the streak from a rigid punishment mechanism into a relationship — the programme understood life happened, and gave members a safety net. Streak protection was the single most positively received feature in testing.</p>
            </div>
            <blockquote class="cs-callout">
              The streak protection feature generated the highest emotional response of any element we tested. Participants who saw it described the programme as "understanding" and "fair" — words no airline loyalty programme had earned before.
            </blockquote>
          </section>

          <!-- OUTCOMES -->
          <section class="cs-section" id="outcomes">
            <span class="cs-section__label">07 — Outcomes</span>
            <h2 class="cs-section__title">Validated, documented, and shipped into the roadmap</h2>
            <div class="cs-section__body">
              <p>The POC was never meant to ship as a product — it was designed to answer whether gamified loyalty could move the needle on retention before committing engineering investment. It answered definitively: yes.</p>
            </div>
            <div class="cs-metrics-row">
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">40%</div>
                <div class="cs-metric-card__label">Stated likelihood to increase flying frequency in POC group vs control</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">78%</div>
                <div class="cs-metric-card__label">Task completion rate on first attempt across all tested flows</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">4.6/5</div>
                <div class="cs-metric-card__label">Average desirability score — highest across all IndiGo UX research to date</div>
              </div>
              <div class="cs-metric-card">
                <div class="cs-metric-card__value">74%</div>
                <div class="cs-metric-card__label">Participants who said they'd share their Travel Identity badge socially</div>
              </div>
            </div>
            <div class="cs-section__body" style="margin-top:48px">
              <p>The research findings were presented to the CPO and product leadership team. The POC directly informed the IndiGo loyalty product roadmap for 2022–2023, with the badge system and living dashboard entering the engineering backlog as P1 initiatives.</p>
            </div>
          </section>

          <!-- LEARNINGS -->
          <section class="cs-section" id="learnings">
            <span class="cs-section__label">08 — Learnings</span>
            <h2 class="cs-section__title">What this project taught me about designing for behaviour</h2>
            <div class="cs-section__body">
              <p><strong>POCs are the most honest design work.</strong> There's no ship pressure, no sprint deadline forcing compromise. You can follow the research wherever it leads. I learned more about IndiGo's users in 8 months of POC work than in years of iterative product work.</p>
              <p><strong>Gamification has a credibility ceiling.</strong> The first version of the badge system used bright colours and game-like animations that tested brilliantly with leisure travellers and terribly with business travellers. The redesign toned the visual language down significantly — premium, understated, more Duolingo than Candy Crush. The lesson: the mechanic can be playful; the aesthetic must match your audience's identity.</p>
              <p><strong>The most powerful loyalty signal is being understood.</strong> The streak protection feature — which I almost cut for being too complex — generated the strongest emotional response of the entire prototype. Users didn't want more points. They wanted the programme to understand that life happens. Design for the exception, not just the rule.</p>
              <p><strong>Research at scale changes what you design.</strong> 500 participants across 6 rounds is more than most UX projects run in a year. The volume revealed patterns that 20-person studies would have missed — specifically, that the badge mechanic resonated completely differently across segments. Without that depth, we'd have shipped for one segment and confused the others.</p>
            </div>
          </section>

        </article>

      </div>

      <!-- NEXT CASE STUDIES -->
      <div class="cs-next">
        <div>
          <p class="cs-next__label">Next Case Study</p>
          <a href="indigo-holidays.php" class="cs-next__link">
            <p class="cs-next__title">IndiGo Holidays<br>Marketplace</p>
            <p style="font-size:14px;color:var(--text-muted);margin-bottom:8px">
              Personalised hotel bundles driving 22% ancillary revenue growth.
            </p>
            <span class="cs-next__arrow">↗</span>
          </a>
        </div>
        <div>
          <p class="cs-next__label">Also Worth Reading</p>
          <a href="indigo-booking.php" class="cs-next__link">
            <p class="cs-next__title">IndiGo Booking<br>Ecosystem</p>
            <p style="font-size:14px;color:var(--text-muted);margin-bottom:8px">
              Redesigning a 50M-user booking flow. 22% revenue growth.
            </p>
            <span class="cs-next__arrow">↗</span>
          </a>
        </div>
      </div>


      <!-- CROSS-CONTENT INTERNAL LINKS -->
      <?php
        require_once __DIR__ . "/../partials/related-content.php";
        echo render_related_content(["current_type" => "case-study", "current_slug" => "indigo-loyalty"]);
      ?>
    </main>

    <?php require_once __DIR__ . "/../partials/footer.php"; ?>

  </div>

  <script src="../assets/js/preloader.js"></script>
  <script src="../assets/js/background.js" defer></script>
  <script src="../assets/js/animations.js" defer></script>
  <script src="../assets/js/app.js" defer></script>
  <script>
  /* ── READING PROGRESS ── */
  (function(){
    const bar  = document.getElementById("cs-progress");
    const main = document.getElementById("main-content");
    if (!bar || !main) return;
    window.addEventListener("scroll", function(){
      const h   = main.scrollHeight - window.innerHeight;
      const pct = Math.min(100, (window.scrollY / h) * 100);
      bar.style.width = pct + "%";
    }, { passive: true });
  })();
  /* ── ACTIVE NAV HIGHLIGHT ── */
  (function(){
    const navItems = document.querySelectorAll(".cs-nav__item[data-nav]");
    const sections = document.querySelectorAll(".cs-section[id]");
    if (!navItems.length) return;
    const obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if (e.isIntersecting){
          navItems.forEach(function(n){ n.classList.remove("is-active"); });
          const active = document.querySelector('.cs-nav__item[data-nav="'+e.target.id+'"]');
          if (active) active.classList.add("is-active");
        }
      });
    }, { rootMargin: "-20% 0px -70% 0px" });
    sections.forEach(function(s){ obs.observe(s); });
  })();
  </script>

</body>
</html>