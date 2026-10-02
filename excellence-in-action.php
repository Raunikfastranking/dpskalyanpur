<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $excellence_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $excellence_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $excellence_data['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Excellence in Action
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Excellence in Action
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="excellence-in-action.php" class="ms-1 text-sm font-medium text-blue-main">Excellence in
                            Action</a>
                    </div>
                </li>
            </ol>
        </div>

         <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
          <div class="md:flex gap-9 mt-6 mb-10">
                <div class="md:w-[40%]">
                    <img src="<?= $excellence_data['data']['sections'][1]['columns'][0]['image_url'] ?? "" ?>" alt="<?= ms_esc_image_alt($excellence_data['data']['sections'][1]['columns'][0] ?? [], 'Excellence in Action Image') ?>" class="w-[100%]">
                </div>
                <div class="md:w-[60%] sm:mt-0 mt-5">
                    <?= $excellence_data['data']['sections'][1]['columns'][1]['content'] ?? "" ?>
                </div>
            </div>
            <div class="mt-10">
                 <?= $excellence_data['data']['sections'][2]['content'] ?? "" ?>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
   
</body>

</html>