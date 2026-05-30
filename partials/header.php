<?php
require_once __DIR__ . "/../data/navigation.php";
$currentKey = $currentKey ?? "home";
?>

<header class="site-header" role="banner">

  <!-- LOGO -->
  <a href="/" class="site-logo" aria-label="Ramesh Mandal — Home">
    <span class="site-logo__mark" aria-hidden="true">RM</span>
    <span class="site-logo__text">Ramesh Mandal</span>
  </a>

  <!-- DESKTOP: NAV + CONNECT -->
  <div class="site-header__cta">
    <nav class="site-nav" role="navigation" aria-label="Main navigation">
      <?php foreach ($navLinks as $link): ?>
        <a
          href="<?= htmlspecialchars($link["href"]) ?>"
          class="site-nav__link<?= ($currentKey === $link["key"]) ? " is-active" : "" ?>"
          <?= ($currentKey === $link["key"]) ? 'aria-current="page"' : "" ?>
        >
          <?= htmlspecialchars($link["label"]) ?>
        </a>
      <?php endforeach; ?>
    </nav>
    <a href="/contact.php" class="btn-connect" aria-label="Connect">CONNECT</a>
  </div>

  <!-- MOBILE: HAMBURGER -->
  <button
    class="nav-hamburger"
    aria-label="Open menu"
    aria-expanded="false"
    aria-controls="nav-drawer"
  >
    <span class="nav-hamburger__line"></span>
    <span class="nav-hamburger__line"></span>
    <span class="nav-hamburger__line"></span>
  </button>

</header>

<!-- MOBILE DRAWER -->
<nav
  class="nav-drawer"
  id="nav-drawer"
  role="navigation"
  aria-label="Mobile navigation"
  aria-hidden="true"
>

  <div class="nav-drawer__header">
    <a href="/" class="site-logo">
      <span class="site-logo__mark" aria-hidden="true">RM</span>
      <span class="site-logo__text">Ramesh Mandal</span>
    </a>
    <button class="nav-drawer__close" aria-label="Close menu">✕</button>
  </div>

  <div class="nav-drawer__links">
    <?php foreach ($navLinks as $link): ?>
      <a
        href="<?= htmlspecialchars($link["href"]) ?>"
        class="nav-drawer__link<?= ($currentKey === $link["key"]) ? " is-active" : "" ?>"
      >
        <?= htmlspecialchars($link["label"]) ?>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="nav-drawer__cta">
    <a href="/contact.php" class="btn-connect">CONNECT</a>
  </div>

</nav>