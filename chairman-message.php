<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $chairman_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $chairman_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $chairman_data['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($chairman_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($chairman_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
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
                        <p class="ms-1 text-sm font-medium text-blue-main">About Us
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Our School
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="chairman-message" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($chairman_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>


        <div class="mt-8 mb-16 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto px-3 ">
            <!-- <div class="flex justify-center">
                <img src="https://res.cloudinary.com/dvzfuapyy/image/upload/v1730305735/Layer_1_fjuspj.png" alt="">
            </div> -->
            <div class="mt-10 relative">

                <div class="sm:flex gap-10">
                    <div class="sm:w-[50%]">
                       <?= $chairman_data['data']['sections'][1]['columns'][0]['content'] ?? "" ?>
                     </div>
                    <div class="sm:w-[50%]">
                        <img src="<?= $chairman_data['data']['sections'][1]['columns'][1]['image_url'] ?? "" ?>" class="border-[1px] border-gray-100 sm:w-auto w-[100%]"
                            alt="<?= ms_esc_image_alt($chairman_data['data']['sections'][1]['columns'][1] ?? [], '') ?>">
                        <div class="mt-1">
                           <?= $chairman_data['data']['sections'][1]['columns'][1]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <!-- <p class="text-[16px] sm:text-left text-center text-gray-600 mt-2">We hope to pass on not only great
                        scholars but also sensitive, compassionate and responsible young adults to the society.</p> -->
                </div>
            </div>
            <?= $chairman_data['data']['sections'][2]['content'] ?? "" ?>
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>

</body>

</html>