<?php
/* =============================================
   partials/gallery.php
   Floating gallery button + lightbox.

   Usage — call before </body> on any page:
   <?php
     $galleryImages = [ ... ];
     require __DIR__ . "/../partials/gallery.php";
   ?>

   $galleryImages format:
   [
     ['src' => 'https://...', 'caption' => 'Flow name or screen description'],
     ...
   ]

   If $galleryImages is empty or not set, nothing renders.
   ============================================= */

/* Bail if no images defined */
if (empty($galleryImages) || !is_array($galleryImages)) return;

/* Sanitise */
$safeImages = array_map(function ($img) {
    return [
        'src'     => htmlspecialchars($img['src']     ?? '', ENT_QUOTES),
        'caption' => htmlspecialchars($img['caption'] ?? '', ENT_QUOTES),
    ];
}, $galleryImages);

/* Encode to JSON for JS */
$jsonImages = json_encode($safeImages, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT);
?>
<script>
window.GALLERY_IMAGES = <?= $jsonImages ?>;
</script>