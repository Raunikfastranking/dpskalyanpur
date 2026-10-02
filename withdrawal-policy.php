<?php
include "includes/apis.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $withdrawal_policy_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $withdrawal_policy_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $withdrawal_policy_data['data']['meta_keywords'] ?? "" ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                   <?= strip_tags($withdrawal_policy_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   <?= strip_tags($withdrawal_policy_data['data']['sections'][0]['content_heading']) ?? "" ?>
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="withdrawal-policy" class="ms-1 text-sm font-medium text-blue-main"> <?= strip_tags($withdrawal_policy_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div class="gap-9 mt-6 mb-10">
                <?= $withdrawal_policy_data['data']['sections'][1]['content'] ?? "" ?>
                <!-- <div>
                    <div>
                    </div>
                    <div>
                        <p class="text-[16px] text-gray-600 mt-3">
                            ● Parents must give one calendar month's notice in writing for the withdrawal of their child.
                            <br><br> ● The fee for the quarter will still be charged even if notice is given. Students who withdraw from the school in the month of May are required to pay the fees for the month of June before the Transfer Certificate is issued.
                            <br><br> ● Transfer Certificate (TC) is issued only after all school dues are cleared.
                            <br><br> ● Caution money, if applicable, should be claimed within three months of withdrawal to avoid inconvenience.
                            <br><br> ● TC is an official document and should be maintained carefully. Duplicate TC cannot be issued.

                        </p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    
</body>

</html>