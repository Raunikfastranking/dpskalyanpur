<?php
/**
 * Gallery grid — Kalyanpur branch 9, JWT via proxy/gallery-proxy.
 * Set $galleryGridConfig in the page before including this file.
 */
$galleryGridConfig = isset($galleryGridConfig) && is_array($galleryGridConfig) ? $galleryGridConfig : [];

$galleryGridInit = array_merge([
    'branchId' => 9,
    'apiBase' => 'proxy/gallery-proxy',
    'gridSelector' => '#galleryGrids',
    'yearSelectSelector' => '#galleryYearSelect',
    'searchSelector' => '#searchInput',
    'noResultsSelector' => '#noResults',
    'itemsPerPage' => 6,
    'loadingMessage' => 'Loading…',
    'searchEmptyMessage' => 'No matching items found.',
    'pdfLabel' => 'PDF Document',
    'mediaCountLabel' => 'Total Media',
], $galleryGridConfig);

$galleryGridJson = json_encode(
    $galleryGridInit,
    JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
);
if ($galleryGridJson === false) {
    return;
}

$embedJs = __DIR__ . '/gallery-year-grid.embed.js';
if (!is_readable($embedJs)) {
    $embedJs = dirname(__DIR__) . '/assets/js/gallery-year-grid.js';
}
if (!is_readable($embedJs)) {
    echo '<!-- gallery-grid-init: missing gallery JS -->';
    echo '<script src="assets/js/gallery-year-grid.js"></script>';
    echo '<script>document.addEventListener("DOMContentLoaded",function(){if(typeof DPSGalleryYearGrid!=="undefined"){DPSGalleryYearGrid.init(' . $galleryGridJson . ');}});</script>';
    return;
}
?>
<!-- gallery-grid-init branch9-proxy -->
<script>
<?php readfile($embedJs); ?>
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof DPSGalleryYearGrid !== 'undefined') {
        DPSGalleryYearGrid.init(<?= $galleryGridJson ?>);
    }
});
</script>
