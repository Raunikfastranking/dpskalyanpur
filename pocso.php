<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $pocso_data['data']['title'] ?? '' ?></title>
    <meta name="description" content="<?= $pocso_data['data']['meta_description'] ?? '' ?>">
    <meta name="keywords" content="<?= $pocso_data['data']['meta_keywords'] ?? '' ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($pocso_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($pocso_data['data']['sections'][0]['content_heading']) ?? "" ?>
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Mandatory Public Disclosure
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="pocso.php" class="ms-1 text-sm font-medium text-blue-main"> <?= strip_tags($pocso_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div class=" gap-9 mt-6 mb-10">

                <div>
                    <?= $pocso_data['data']['sections'][0]['content_heading'] ?? '' ?>
                </div>
                <div class="overflow-x-auto mt-5">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#003618]">

                            <tr>
                                <?php
                                foreach ($pocso_data['data']['sections'][1]['resolved_content']['columns'] as $column) {
                                ?>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider"><?= $column['title'] ?? "NA" ?> </th>
                                <?php } ?>
                            </tr>

                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            <!-- row -->
                            <?php
                            foreach ($pocso_data['data']['sections'][1]['resolved_content']['data'] as $row_data) {
                                // print_r($row_data);
                            ?>
                                <tr class="hover:bg-gray-50">
                                    <?php foreach ($row_data as $cell) {
                                        //  print_r($cell)
                                    ?>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <?= htmlspecialchars($cell) ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>


                            <!-- add as many rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>

</body>

</html>