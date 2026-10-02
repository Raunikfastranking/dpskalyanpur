<?php
include "includes/apis.php";

// Optional debug: Uncomment to inspect data
// echo '<pre>'; print_r($feestructure_data['data']['sections']); echo '</pre>'; exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php"; ?>
    <title><?= htmlspecialchars($feestructure_data['data']['title'] ?? 'DPS Kalyanpur Fee Structure') ?></title>
    <meta name="description" content="<?= htmlspecialchars($feestructure_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($feestructure_data['data']['meta_keywords'] ?? '') ?>">
    <link rel="canonical" href="https://dpskalyanpur.com/fee-structure-page-kalyanpur" />
</head>

<body>

    <?php include "includes/header.php"; ?>

    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        
        <!-- Hero Banner -->
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div class="w-full">
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 hr-line relative leading-9">
                    <?= htmlspecialchars(strip_tags($feestructure_data['data']['sections'][0]['content_heading'] ?? 'Fee Structure')) ?>
                </h1>
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars(strip_tags($feestructure_data['data']['sections'][0]['content_heading'] ?? 'Fee Structure')) ?>
                </h2>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="fee-structure" class="ms-1 text-sm font-medium text-blue-main">
                            <?= htmlspecialchars($feestructure_data['data']['title'] ?? 'Fee Structure') ?>
                        </a>
                    </div>
                </li>
            </ol>
        </div>

        <!-- Fee Accordions -->
        <div class="mt-8 custom-container-1280 px-3">
            <div class="sm:mt-10 relative">
                <div class="md:w-[100%]">
                    <div class="my-10 space-y-6">

                        <?php
                        $accordion_sections = array_filter($feestructure_data['data']['sections'] ?? [], fn($s) => ($s['layout'] ?? '') === 'accordion');

                        if (!empty($accordion_sections)):
                            $counter = 1;
                            foreach ($accordion_sections as $section):
                                $resolved = $section['resolved_content'] ?? [];
                                $items = $resolved['items'] ?? [];

                                if (!empty($items)):
                                    foreach ($items as $item):
                                        $raw_title = $item['title'] ?? '<span>FEE DETAILS</span>';
                                        // Strip outer span if needed, but keep HTML
                                        $title = $raw_title; // Already has <span style...>
                                        $content = trim($item['content'] ?? '');
                                        $id = $counter++;
                        ?>
                                        <div class="border border-gray-300 rounded-lg overflow-hidden shadow-md">
                                            <button onclick="toggleAccordion(<?= $id ?>)"
                                                    class="w-full flex justify-between items-center px-6 py-5 text-left bg-green-900 hover:bg-green-800 transition-colors">
                                                <span class="text-white font-bold text-xl">
                                                    <?= $title ?> <!-- Keeps the styled <span> from CMS -->
                                                </span>
                                                <span id="icon-<?= $id ?>" class="text-white transition-transform duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6">
                                                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                                                    </svg>
                                                </span>
                                            </button>
                                            <div id="content-<?= $id ?>"
                                                 class="max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white">
                                               <div class="p-6 prose prose-table:w-full prose-td:p-3 prose-th:bg-gray-100 prose-th:text-center prose-td:text-center prose-border-gray-300 overflow-x-auto">
                                                    <?= $content ?>
                                                </div>
                                            </div>
                                        </div>
                        <?php
                                    endforeach;
                                endif;
                            endforeach;
                        else:
                        ?>
                            <div class="bg-white p-12 rounded-xl shadow-xl text-center">
                                <h3 class="text-3xl font-bold text-gray-800 mb-6">Fee Structure Unavailable</h3>
                                <p class="text-lg text-gray-700">
                                    The detailed fee information for DPS Kalyanpur is currently not loaded.<br>
                                    Please check back later or contact the school at the provided details.
                                </p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

    <script>
        function toggleAccordion(index) {
            const content = document.getElementById(`content-${index}`);
            const icon = document.getElementById(`icon-${index}`);

            const minusSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-6 h-6"><path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" /></svg>`;
            const plusSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-6 h-6"><path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" /></svg>`;

            const isOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

            // Close others (optional single-open)
            document.querySelectorAll('[id^="content-"]').forEach(el => {
                if (el.id !== `content-${index}`) {
                    el.style.maxHeight = '0';
                }
            });
            document.querySelectorAll('[id^="icon-"]').forEach(el => {
                if (el.id !== `icon-${index}`) el.innerHTML = plusSVG;
            });

            if (isOpen) {
                content.style.maxHeight = '0';
                icon.innerHTML = plusSVG;
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                // Force reflow for accurate height
                content.style.display = 'block';
                content.offsetHeight; // trigger reflow
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.innerHTML = minusSVG;
            }
        }
    </script>

</body>
</html>