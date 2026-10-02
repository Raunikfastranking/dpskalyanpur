<?php
include "includes/apis.php";

// ────────────────────────────────────────────────
// Filter only inter_school galleries
// ────────────────────────────────────────────────
$interSchoolGalleries = array_filter($photo_gallery_data['data'] ?? [], function($data) {
    return isset($data['gallery_type'], $data['gallery_sub_type']['sub_type_name']) 
        && strtolower($data['gallery_type']) === 'gallery' 
        && $data['gallery_sub_type']['sub_type_name'] === 'inter_school';
});

// ────────────────────────────────────────────────
// Sort latest first by date (or created_at if date not set)
// ────────────────────────────────────────────────
usort($interSchoolGalleries, function($a, $b) {
    $dateA = !empty($a['date']) ? strtotime($a['date']) : strtotime($a['created_at'] ?? 'now');
    $dateB = !empty($b['date']) ? strtotime($b['date']) : strtotime($b['created_at'] ?? 'now');
    return $dateB <=> $dateA; // latest first
});
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($inter_school_data['data']['title'] ?? 'Inter-School Events') ?></title>
    <meta name="description" content="<?= htmlspecialchars($inter_school_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($inter_school_data['data']['meta_keywords'] ?? '') ?>">
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
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div class="w-full">
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= htmlspecialchars(strip_tags($inter_school_data['data']['sections'][0]['content_heading'] ?? 'Inter-School Events')) ?>
                </h1>
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars(strip_tags($inter_school_data['data']['sections'][0]['content_heading'] ?? 'Inter-School Events')) ?>
                </h1>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Gallery</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="inter-school" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                            <?= htmlspecialchars(strip_tags($inter_school_data['data']['sections'][0]['content_heading'] ?? 'Inter-School')) ?>
                        </a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <?php
            $galleryPaginationPrefix = 'interSchool';
            $gallerySubType = 'inter_school';
            $galleryEmptyMessage = 'No inter-school events for this year.';
            $galleryNoResultsText = 'No matching inter-school event items found.';
            include __DIR__ . '/includes/gallery-year-section-block.php';
            ?>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>
</html>