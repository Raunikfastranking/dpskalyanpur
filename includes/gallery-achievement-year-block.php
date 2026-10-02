<?php
/**
 * Achievement gallery: year dropdown, title search, paginated grid (DPS Amrapali pattern).
 *
 * Set before include:
 * @var string $galleryAchievementPaginationPrefix unique prefix for pagination element IDs
 * @var string $galleryAchievementSubType API gallery_sub_type.sub_type_name
 * @var string $galleryAchievementEmptyMessage shown when selected year has no items
 * @var string $galleryAchievementNoResultsText #noResults copy when search matches nothing
 *
 * Optional:
 * @var string $galleryAchievementSearchPlaceholder
 * @var string $galleryAchievementSearchEmptyMessage passed to JS (grid empty state while searching)
 * @var string $galleryAchievementPdfLabel
 * @var string $galleryAchievementMediaCountLabel
 */
$gapPrefix = preg_replace('/[^a-zA-Z0-9_-]/', '', $galleryAchievementPaginationPrefix ?? 'achievement');
$galleryToolbarPlaceholder = $galleryAchievementSearchPlaceholder ?? 'Search by title...';
$gapPdf = $galleryAchievementPdfLabel ?? 'Achievement Document';
$gapMedia = $galleryAchievementMediaCountLabel ?? 'Total Photo(s)';
$gapSearchEmpty = $galleryAchievementSearchEmptyMessage ?? 'No matching items found.';
?>
<div class="mt-10 relative mb-10">
    <div class="relative mb-10">
        <div class="tabs">
            <div class="flex items-center gap-2 sm:justify-between w-full">
                <?php include __DIR__ . '/gallery-year-toolbar.php'; ?>
            </div>

            <section id="section1" class="tab-panel mt-5" role="tabpanel">
                <div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4"></div>

                <div id="<?= htmlspecialchars($gapPrefix, ENT_QUOTES, 'UTF-8') ?>Pagination" class="flex justify-center items-center gap-2 mt-8">
                    <button type="button" id="<?= htmlspecialchars($gapPrefix, ENT_QUOTES, 'UTF-8') ?>PrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Previous
                    </button>
                    <div id="<?= htmlspecialchars($gapPrefix, ENT_QUOTES, 'UTF-8') ?>PageNumbers" class="flex gap-1"></div>
                    <button type="button" id="<?= htmlspecialchars($gapPrefix, ENT_QUOTES, 'UTF-8') ?>NextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next
                    </button>
                </div>

                <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                    <?= htmlspecialchars($galleryAchievementNoResultsText ?? 'No matching achievements found.', ENT_QUOTES, 'UTF-8') ?>
                </p>
            </section>
        </div>
    </div>
</div>

<?php
$galleryGridConfig = [
    'galleryType' => 'achievements',
    'subType' => $galleryAchievementSubType,
    'prevBtnId' => $gapPrefix . 'PrevBtn',
    'nextBtnId' => $gapPrefix . 'NextBtn',
    'pageNumbersId' => $gapPrefix . 'PageNumbers',
    'paginationId' => $gapPrefix . 'Pagination',
    'emptyMessage' => $galleryAchievementEmptyMessage,
    'searchEmptyMessage' => $gapSearchEmpty,
    'pdfLabel' => $gapPdf,
    'mediaCountLabel' => $gapMedia,
];
include __DIR__ . '/gallery-grid-init.php';
?>
