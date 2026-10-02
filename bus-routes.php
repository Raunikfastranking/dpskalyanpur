<?php
include "includes/apis.php";
// print_r($route_data['data']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $bus_routes_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $bus_routes_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $bus_routes_data['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($bus_routes_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h2
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($bus_routes_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index" class="inline-flex items-center text-sm font-medium text-blue-main">
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
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission
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
                        <a href="bus-routes" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($bus_routes_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div class="mt-6 mb-10 overflow-scroll-x">
                <?= $bus_routes_data['data']['sections'][1]['contenst'] ?? '' ?>
                <table class="table-auto w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">S.No.</th>
                            <th class="border border-gray-300 px-4 py-2">Vehicle No.</th>
                            <th class="border border-gray-300 px-4 py-2">Driver Name</th>
                            <th class="border border-gray-300 px-4 py-2">Driver Contact</th>
                            <th class="border border-gray-300 px-4 py-2">Route Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $s = 1;
                        if (!empty($route_data['data'])) {
                            foreach ($route_data['data'] as $row) {

                                // Separate routes into source, normal, and destination
                                $source = [];
                                $destination = [];
                                $normal = [];

                                foreach ($row['bus_routes'] as $route) {
                                    if ($route['is_source'] == 1) {
                                        $source[] = $route['routes'];
                                    } elseif ($route['is_destination'] == 1) {
                                        $destination[] = $route['routes'];
                                    } else {
                                        $normal[] = $route['routes'];
                                    }
                                }

                                // Merge in order
                                $orderedRoutes = array_merge($source, $normal, $destination);

                                // Driver Details (check empty)
                                $driverName = !empty($row['busdriver_details'][0]['name'])
                                    ? $row['busdriver_details'][0]['name']
                                    : 'N/A';
                                $driverPhone = !empty($row['busdriver_details'][0]['contact_value'])
                                    ? $row['busdriver_details'][0]['contact_value']
                                    : 'N/A';
                        ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2"><?= $s++; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['busnumber']; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $driverName; ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $driverPhone; ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <?= implode(' → ', $orderedRoutes); ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
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