<?php
include "includes/apis.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Kalyanpur | Magazine, Newsletter and MUSE</title>
    <?php include "includes/head.php" ?>
</head>
<body>
<?php include "includes/header.php" ?>
<div class="main relative mb-[120px]">
    <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
        <div class="w-full">
            <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">Magazine, Newsletter and MUSE</h1>
            <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">Magazine, Newsletter and MUSE</h1>
        </div>
    </div>

    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center"><a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a></li>
            <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" /></svg><p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Gallery</p></div></li>
            <li><div class="flex items-center"><svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" /></svg><a href="magazine" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Magazine, Newsletter and MUSE</a></div></li>
        </ol>
    </div>

    <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
        <?php
        $galleryPaginationPrefix = 'annualMagazine';
        $gallerySubType = 'annual_magazine';
        $galleryEmptyMessage = 'No annual magazine items for this year.';
        $galleryNoResultsText = 'No matching annual magazine items found.';
        include __DIR__ . '/includes/gallery-year-section-block.php';
        ?>
    </div>
</div>
<?php include "includes/footer.php" ?>
<?php include "includes/foot.php" ?>
</body>
</html>
