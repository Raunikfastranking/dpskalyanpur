<?php
include "includes/apis.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($photo_gallery_data['title'] ?? $photo_gallery_data['data']['title'] ?? "Photo Gallery") ?></title>
    <meta name="description" content="<?= htmlspecialchars($photo_gallery_data['meta_description'] ?? $photo_gallery_data['data']['meta_description'] ?? "") ?>">
    <meta name="keywords" content="<?= htmlspecialchars($photo_gallery_data['meta_keywords'] ?? $photo_gallery_data['data']['meta_keywords'] ?? "") ?>">
    <?php include "includes/head.php" ?>

    <style>
        .pdf-preview-card {
            height: 200px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 8px 8px 0 0;
        }
        .pdf-preview-card:hover {
            background: #e9ecef;
        }
    </style>
</head>

<body>
<?php include "includes/header.php" ?>

<div class="main relative mb-[120px]">
    <div class="bg-center flex items-center text-center h-[300px] brud-image bg-[url('assets/images/building.webp')]">
        <div class="w-full">
            <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 hr-line relative leading-9">
                Photo Gallery
            </h1>
            <h2 class="sm:text-[32px] hidden sm:block font-[700] text-white text-left ml-[7rem] hr-line relative leading-9">
                Photo Gallery
            </h2>
        </div>
    </div>

    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/" class="sm:text-sm text-xs font-medium text-blue-main">Home</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="ms-1 text-xs sm:text-sm font-medium text-blue-main">Media & Events</p>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="photo-gallery.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Photo Gallery</a>
                </div>
            </li>
        </ol>
    </div>

    <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
        <div class="mt-10 relative">
            <div class="tabs sm:mt-10">
                <div class="flex items-center gap-2 sm:justify-between">
                    <?php
                    $galleryToolbarPlaceholder = 'Search';
                    include __DIR__ . '/includes/gallery-year-toolbar.php';
                    ?>
                </div>

                <section id="section1" class="tab-panel mt-5" role="tabpanel">
                    <div id="galleryGrids"
                         class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4">
                    </div>

                    <div id="photoPagination" class="flex justify-center items-center gap-2 mt-8">
                        <button id="photoPrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Previous
                        </button>
                        <div id="photoPageNumbers" class="flex gap-1">
                        </div>
                        <button id="photoNextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                            Next
                        </button>
                    </div>

                    <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                        No matching photo galleries found.
                    </p>
                </section>
            </div>
        </div>
    </div>
</div>

<?php
define('SKIP_LEGACY_GALLERY_RENDERER', true);
include "includes/footer.php" ?>
<?php include "includes/foot.php" ?>

<?php
$galleryGridConfig = [
    'galleryType' => 'gallery',
    'subType' => 'photo_gallery',
    'prevBtnId' => 'photoPrevBtn',
    'nextBtnId' => 'photoNextBtn',
    'pageNumbersId' => 'photoPageNumbers',
    'paginationId' => 'photoPagination',
    'emptyMessage' => 'No photo galleries for this year.',
    'searchEmptyMessage' => 'No matching photo galleries found.',
    'pdfLabel' => 'PDF Document',
    'mediaCountLabel' => 'Total Media',
];
include __DIR__ . '/includes/gallery-grid-init.php';
?>

</body>
</html>
