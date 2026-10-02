<?php
include "includes/apis.php";

// ────────────────────────────────────────────────
// Filter only spark_gallery items
// ────────────────────────────────────────────────
$sparkGalleries = array_filter($photo_gallery_data['data'] ?? [], function ($item) {
    return isset($item['gallery_type'], $item['gallery_sub_type']['sub_type_name'])
        && strtolower($item['gallery_type']) === 'gallery'
        && $item['gallery_sub_type']['sub_type_name'] === 'spark_gallery';
});

// ────────────────────────────────────────────────
// Sort: newest first (prefer 'date' → fallback to 'created_at')
// ────────────────────────────────────────────────
usort($sparkGalleries, function ($a, $b) {
    $tsA = strtotime($a['date'] ?? $a['created_at'] ?? '1970-01-01') ?: 0;
    $tsB = strtotime($b['date'] ?? $b['created_at'] ?? '1970-01-01') ?: 0;
    return $tsB <=> $tsA;   // newest → oldest
});
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($spark_data['data']['title'] ?? 'Spark Gallery') ?></title>
    <meta name="description" content="<?= htmlspecialchars($spark_data['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($spark_data['data']['meta_keywords'] ?? '') ?>">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[120px]">
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div class="w-full">
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= htmlspecialchars(strip_tags($spark_data['data']['sections'][0]['content_heading'] ?? 'Spark Gallery')) ?>
                </h1>
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars(strip_tags($spark_data['data']['sections'][0]['content_heading'] ?? 'Spark Gallery')) ?>
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
                        <a href="spark-gallery" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                            <?= htmlspecialchars(strip_tags($spark_data['data']['sections'][0]['content_heading'] ?? 'Spark Gallery')) ?>
                        </a>
                    </div>
                </li>
            </ol>
        </div>

        <!-- Gallery Section -->
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <?php if (!empty($sparkGalleries)): ?>
                <div class="mt-10 relative">
                    <div class="tabs sm:mt-10">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 sm:justify-between">
                            <ul class="flex gap-2 sm:gap-4 border-b bg-gray-50 w-full sm:w-auto" style="border-radius:12px;">
                                <li class="flex-1">
                                    <a href="#section1" class="tab-link block text-center py-2.5 px-3 sm:text-[16px] text-[13px] sm:py-3 sm:px-6 font-semibold text-gray-700 hover:bg-slate-700 hover:text-white transition-colors" aria-controls="section1" role="tab" tabindex="-1">Title</a>
                                </li>
                                <li class="flex-1">
                                    <a href="#section2" class="tab-link block text-center py-2.5 px-3 sm:text-[16px] text-[13px] sm:py-3 sm:px-6 font-semibold text-gray-700 hover:bg-slate-700 hover:text-white transition-colors" aria-controls="section2" role="tab" tabindex="-1">Category</a>
                                </li>
                                <li class="flex-1">
                                    <a href="#section3" class="tab-link block text-center py-2.5 px-3 sm:text-[16px] text-[13px] sm:py-3 sm:px-6 font-semibold text-gray-700 hover:bg-slate-700 hover:text-white transition-colors" aria-controls="section3" role="tab" tabindex="-1">Year</a>
                                </li>
                            </ul>

                            <input type="text" id="first_name" class="bg-gray-100 w-full sm:w-[320px] border-b text-gray-900 sm:text-[16px] text-[14px] outline-none focus:ring-0 px-5 py-2.5 mt-3 sm:mt-0" style="border-radius:9px;" placeholder="Search by title..." />
                        </div>

                        <section id="section1" class="tab-panel mt-6" role="tabpanel">
                            <div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-5">

                                <?php foreach ($sparkGalleries as $data): 
                                    $rawDate = !empty($data['date']) ? $data['date'] : $data['created_at'] ?? 'now';
                                    $day   = date("d", strtotime($rawDate));
                                    $month = date("M", strtotime($rawDate));
                                    $year  = date("Y", strtotime($rawDate));

                                    // PDF detection
                                    $hasPDF = false;
                                    $pdfCount = 0;
                                    $firstPdfUrl = '';
                                    if (!empty($data['media']) && is_array($data['media'])) {
                                        foreach ($data['media'] as $media) {
                                            $url = $media['media_url'] ?? '';
                                            $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
                                            if ($ext === 'pdf') {
                                                $hasPDF = true;
                                                $pdfCount++;
                                                if (!$firstPdfUrl) $firstPdfUrl = $url;
                                            }
                                        }
                                    }
                                ?>

                                    <div class="gallery-item bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden"
                                         data-title="<?= strtolower(htmlspecialchars(strip_tags($data['heading'] ?? ''))) ?>">

                                        <?php if ($hasPDF && $firstPdfUrl): ?>
                                            <a href="<?= htmlspecialchars($firstPdfUrl) ?>" target="_blank" rel="noopener noreferrer" class="block rounded-t-lg overflow-hidden">
                                                <?php render_gallery_pdf_cover(gallery_pdf_cover_alt($data, $data['heading'] ?? '')); ?>
                                            </a>
                                        <?php else: ?>
                                            <!-- Image preview -->
                                            <a href="#">
                                                <img class="w-full h-[200px] object-cover"
                                                     src="<?= htmlspecialchars($data['media'][0]['media_url'] ?? 'assets/images/placeholder.jpg') ?>"
                                                     alt="<?= ms_esc_image_alt($data['media'][0] ?? [], 'Spark Gallery', true) ?>">
                                            </a>
                                        <?php endif; ?>

                                        <div class="p-4 flex flex-col">
                                            <div class="flex gap-4 mb-3">
                                                <div class="w-[30%] shrink-0">
                                                    <div class="bg-blue-main text-white text-center rounded-t-lg py-1 font-bold text-lg">
                                                        <?= $year ?>
                                                    </div>
                                                    <div class="text-center font-bold text-2xl text-[#D9A414] border border-gray-300 rounded-b-lg py-1">
                                                        <?= $day ?><br>
                                                        <span class="text-[#223B71] text-sm"><?= $month ?></span>
                                                    </div>
                                                </div>
                                                <div class="w-[70%]">
                                                    <h3 class="text-blue-main font-bold text-base mb-2 line-clamp-2">
                                                        <?= htmlspecialchars(strip_tags($data['heading'] ?? 'Untitled Spark Event')) ?>
                                                    </h3>
                                                    <hr class="my-2">
                                                    <div class="text-xs text-gray-600 flex flex-wrap gap-3">
                                                        <div>Category: <strong><?= ucfirst($data['gallery_type'] ?? 'Gallery') ?></strong></div>
                                                        <?php if ($hasPDF): ?>
                                                            <div class="text-red-600 font-semibold">PDF: <strong><?= $pdfCount ?></strong></div>
                                                        <?php else: ?>
                                                            <div>Photos: <strong><?= count($data['media'] ?? []) ?></strong></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($hasPDF && $firstPdfUrl): ?>
                                                <a href="<?= htmlspecialchars($firstPdfUrl) ?>" target="_blank" rel="noopener noreferrer"
                                                   class="mt-auto py-2 px-5 bg-red-50 border border-red-600 text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-center font-medium transition-colors flex items-center justify-center gap-2">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                        <path fill-rule="evenodd" d="M2 10c0-4.418 4.477-8 10-8s10 3.582 10 8-4.477 8-10 8-10-3.582-10-8z"/>
                                                    </svg>
                                                    View / Download PDF
                                                </a>
                                            <?php else: ?>
                                                <a href="gallery-detail.php?id=<?= htmlspecialchars($data['id'] ?? '') ?>"
                                                   class="mt-auto py-2 px-5 border border-blue-main text-blue-main hover:bg-blue-main hover:text-white rounded-lg text-center font-medium transition-colors flex items-center justify-center gap-2 group">
                                                    View Gallery
                                                    <svg class="w-4 h-4 fill-blue-main group-hover:fill-white" viewBox="0 0 8 9">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.65008 0.911564C6.9831 0.911564 7.25307 1.18153 7.25307 1.51456L7.25307 6.63112C7.25307 6.96414 6.9831 7.23411 6.65008 7.23411C6.31705 7.23411 6.04708 6.96414 6.04708 6.63112L6.04708 2.97031L1.10714 7.91026C0.871652 8.14574 0.489858 8.14574 0.254375 7.91026C0.0188919 7.67477 0.018892 7.29298 0.254376 7.0575L5.19432 2.11755L1.53352 2.11755C1.20049 2.11755 0.930523 1.84758 0.930523 1.51456C0.930523 1.18153 1.20049 0.911564 1.53352 0.911564L6.65008 0.911564Z"/>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                            <p id="noResults" class="hidden text-center text-gray-500 mt-8 text-base">
                                No matching Spark Gallery photos or documents found.
                            </p>
                        </section>

                        <section id="section2" class="tab-panel hidden mt-6" role="tabpanel" aria-hidden="true">
                            <!-- Category content can be added later -->
                        </section>

                        <section id="section3" class="tab-panel hidden mt-6" role="tabpanel" aria-hidden="true">
                            <!-- Year content can be added later -->
                        </section>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600 mt-12 py-8">
                    <p>No Spark Gallery records available at this time.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabPanels = document.querySelectorAll('.tab-panel');
        let activeTab = tabLinks[0] || null;

        function changeTab(newTab) {
            tabPanels.forEach(p => p.classList.add('hidden'));
            tabLinks.forEach(t => {
                t.setAttribute('aria-selected', 'false');
                t.setAttribute('tabindex', '-1');
            });
            if (newTab) {
                const target = document.getElementById(newTab.getAttribute('aria-controls'));
                if (target) {
                    target.classList.remove('hidden');
                    target.setAttribute('aria-hidden', 'false');
                    newTab.setAttribute('aria-selected', 'true');
                    newTab.setAttribute('tabindex', '0');
                }
            }
        }

        tabLinks.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                activeTab = e.currentTarget;
                changeTab(activeTab);
            });
        });

        if (activeTab) changeTab(activeTab);

        // Search (using 'input' event for better UX)
        const searchInput = document.getElementById('first_name');
        const galleryItems = document.querySelectorAll('#galleryGrids .gallery-item');
        const noResults = document.getElementById('noResults');

        searchInput.addEventListener('input', () => {
            const term = searchInput.value.toLowerCase().trim();
            let visible = 0;

            galleryItems.forEach(item => {
                const title = (item.getAttribute('data-title') || '').toLowerCase();
                if (title.includes(term)) {
                    item.style.display = '';
                    visible++;
                } else {
                    item.style.display = 'none';
                }
            });

            noResults.classList.toggle('hidden', visible > 0);
        });
    });
    </script>

</body>
</html>