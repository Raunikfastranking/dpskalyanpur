<?php include "includes/apis.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($achievement_data['title'] ?? $achievement_data['data']['title'] ?? 'DPS Kalyanpur | Achievements') ?></title>
    <meta name="description" content="<?= htmlspecialchars($achievement_data['meta_description'] ?? $achievement_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($achievement_data['meta_keywords'] ?? $achievement_data['data']['meta_keywords'] ?? '') ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">

                <h1
                    class="text-[32px] sm:hidden block font-[700] text-blue-main uppercase text-center mb-5 sm:mb-8 hr-line relative leading-9">
                    Achievements
                </h1>
                <div class="md:w-[100%]">
                    <h1
                        class="sm:text-[32px] sm:block hidden font-[700] text-blue-main uppercase text-center sm:mb-1 hr-line relative leading-9">
                        Achievements
                    </h1>
                </div>

                <div class="mt-10 relative">
                    <div class="tabs sm:mt-10">
                        <div class="flex items-center gap-2 sm:justify-between">
                            <?php
                            $galleryToolbarPlaceholder = 'Search';
                            include __DIR__ . '/includes/gallery-year-toolbar.php';
                            ?>
                        </div>

                        <section id="section1" class="tab-panel mt-5" role="tabpanel">
                            <div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mx-auto gap-4">
                            </div>

                            <div id="achievementsHubPagination" class="flex justify-center items-center gap-2 mt-8">
                                <button id="achievementsHubPrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Previous
                                </button>
                                <div id="achievementsHubPageNumbers" class="flex gap-1">
                                </div>
                                <button id="achievementsHubNextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                    Next
                                </button>
                            </div>

                            <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                                No matching achievements found.
                            </p>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <?php
    $galleryGridConfig = [
        'galleryType' => 'achievements',
        'subType' => null,
        'prevBtnId' => 'achievementsHubPrevBtn',
        'nextBtnId' => 'achievementsHubNextBtn',
        'pageNumbersId' => 'achievementsHubPageNumbers',
        'paginationId' => 'achievementsHubPagination',
        'emptyMessage' => 'No achievements for this year.',
        'searchEmptyMessage' => 'No matching achievements found.',
        'pdfLabel' => 'Achievement Document',
        'mediaCountLabel' => 'Total Items',
    ];
    include __DIR__ . '/includes/gallery-grid-init.php';
    ?>

</body>

</html>
