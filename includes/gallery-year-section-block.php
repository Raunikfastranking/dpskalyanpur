<?php
$galleryPaginationPrefix = preg_replace('/[^a-zA-Z0-9_-]/', '', $galleryPaginationPrefix ?? 'gallery');
$galleryType = $galleryType ?? 'gallery';
$galleryToolbarPlaceholder = $galleryToolbarPlaceholder ?? 'Search by title...';
$galleryEmptyMessage = $galleryEmptyMessage ?? 'No gallery items for this year.';
$galleryNoResultsText = $galleryNoResultsText ?? 'No matching gallery items found.';
$galleryPdfLabel = $galleryPdfLabel ?? 'Gallery Document';
$galleryMediaCountLabel = $galleryMediaCountLabel ?? 'Total Photo(s)';
?>
<div class="mt-10 relative mb-10">
    <div class="tabs">
        <div class="flex items-center gap-2 sm:justify-between w-full">
            <?php include __DIR__ . '/gallery-year-toolbar.php'; ?>
        </div>

        <section id="section1" class="tab-panel mt-5" role="tabpanel">
            <div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4"></div>

            <div id="<?= htmlspecialchars($galleryPaginationPrefix, ENT_QUOTES, 'UTF-8') ?>Pagination" class="flex justify-center items-center gap-2 mt-8">
                <button type="button" id="<?= htmlspecialchars($galleryPaginationPrefix, ENT_QUOTES, 'UTF-8') ?>PrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                    Previous
                </button>
                <div id="<?= htmlspecialchars($galleryPaginationPrefix, ENT_QUOTES, 'UTF-8') ?>PageNumbers" class="flex gap-1"></div>
                <button type="button" id="<?= htmlspecialchars($galleryPaginationPrefix, ENT_QUOTES, 'UTF-8') ?>NextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                    Next
                </button>
            </div>

            <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                <?= htmlspecialchars($galleryNoResultsText, ENT_QUOTES, 'UTF-8') ?>
            </p>
        </section>
    </div>
</div>

<?php
$galleryGridConfig = [
    'galleryType' => $galleryType,
    'subType' => $gallerySubType,
    'prevBtnId' => $galleryPaginationPrefix . 'PrevBtn',
    'nextBtnId' => $galleryPaginationPrefix . 'NextBtn',
    'pageNumbersId' => $galleryPaginationPrefix . 'PageNumbers',
    'paginationId' => $galleryPaginationPrefix . 'Pagination',
    'emptyMessage' => $galleryEmptyMessage,
    'searchEmptyMessage' => $galleryNoResultsText,
    'pdfLabel' => $galleryPdfLabel,
    'mediaCountLabel' => $galleryMediaCountLabel,
];
include __DIR__ . '/gallery-grid-init.php';
?>
