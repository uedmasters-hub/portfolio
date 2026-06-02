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