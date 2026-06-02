<?php
/**
 * partials/header.php
 *
 * Outputs the old <header> nav that some pages still use
 * (about.php, contact.php, resources.php, index.php).
 *
 * Pages now using the new mega-nav (navigation.php) should
 * NOT include this file — navigation.php outputs its own
 * <header> block.
 *
 * Set before including:
 *   $currentKey  (string) — active nav key
 */

require_once __DIR__ . "/../data/navigation.php";
$currentKey = $currentKey ?? "home";
?>

<!-- FONTS -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<!-- CSS — load animations.css LAST so it can override -->
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/variables.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/reset.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/main.css" />
<!-- ... all other css files ... -->
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/animations.css" />
<link rel="stylesheet" href="<?= BASE_PATH ?>/assets/css/cursor.css" />

<!-- Reading progress bar (case study + blog pages only) -->
<?php if (isset($showProgress) && $showProgress): ?>
<div id="reading-progress" aria-hidden="true"></div>
<?php endif; ?>

<!-- Skip link (accessibility) -->
<a href="#main" class="skip-link">Skip to content</a>