<?php
include "includes/apis.php";

// ────────────────────────────────────────────────
// Filter and sort sports gallery items
// ────────────────────────────────────────────────
$sportsGallery = [];
$categories = [];
$years = [];

if (!empty($photo_gallery_data['data']) && is_array($photo_gallery_data['data'])) {
    foreach ($photo_gallery_data['data'] as $item) {
        if (isset($item['gallery_type'], $item['gallery_sub_type']['sub_type_name'])
            && strtolower($item['gallery_type']) === 'gallery'
            && $item['gallery_sub_type']['sub_type_name'] === 'sports_gallery') {
            
            $item['_sort_date'] = !empty($item['date']) ? strtotime($item['date']) : strtotime($item['created_at'] ?? 'now');
            $sportsGallery[] = $item;

            // Collect unique categories & years
            if (!empty($item['gallery_type'])) {
                $categories[] = ucfirst($item['gallery_type']);
            }
            if ($item['_sort_date']) {
                $years[] = date("Y", $item['_sort_date']);
            }
        }
    }

    // Sort newest first
    usort($sportsGallery, fn($a, $b) => $b['_sort_date'] <=> $a['_sort_date']);

    // Unique & sorted
    $categories = array_unique($categories);
    $years = array_unique($years);
    rsort($years); // newest year first
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($sports_gallery_data['data']['title'] ?? 'Sports Gallery') ?></title>
    <meta name="description" content="<?= htmlspecialchars($sports_gallery_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($sports_gallery_data['data']['meta_keywords'] ?? '') ?>">
    <?php include "includes/head.php" ?>

    <style>
        /* PDF preview card style (copied from academic achievements) */
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
        <!-- Hero -->
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div class="w-full">
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= htmlspecialchars(strip_tags($sports_gallery_data['data']['sections'][0]['content_heading'] ?? 'Sports Gallery')) ?>
                </h1>
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars(strip_tags($sports_gallery_data['data']['sections'][0]['content_heading'] ?? 'Sports Gallery')) ?>
                </h1>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a>
                </li>
                <li class="inline-flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Gallery</p>
                </li>
                <li class="inline-flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="sports-gallery" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                        <?= htmlspecialchars(strip_tags($sports_gallery_data['data']['sections'][0]['content_heading'] ?? 'Sports Gallery')) ?>
                    </a>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <?php
            $galleryPaginationPrefix = 'sportsGallery';
            $gallerySubType = 'sports_gallery';
            $galleryEmptyMessage = 'No sports gallery items for this year.';
            $galleryNoResultsText = 'No matching sports gallery items found.';
            include __DIR__ . '/includes/gallery-year-section-block.php';
            ?>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>
</body>
</html>