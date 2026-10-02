<?php
include "includes/apis.php";

// Fetch directly if bulk includes/apis.php call did not return video data
if (empty($video_gallery_data['data']['sections'])) {
    $ch = curl_init('https://dps.allenhouseschools.com/api/pages/video-gallery-page-kalyanpur');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => api_auth_headers(),
    ]);
    $videoJson = curl_exec($ch);
    if ($videoJson !== false) {
        $fetched = json_decode($videoJson, true);
        if (!empty($fetched['data'])) {
            $video_gallery_data = $fetched;
        }
    }
    curl_close($ch);
}
// print_r($video_gallery_data);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $video_gallery_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $video_gallery_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $video_gallery_data['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[120px] ">
        <div class="main relative  mb-[40px] sm:mb-[120px] ">
            <div class="bg-center flex items-center text-center h-[300px] brud-image bg-[url('assets/images/building.webp')]">
                <div>
                    <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                        Video Gallery
                    </h1>
                </div>

                <div class="md:w-[100%]">
                    <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                        Video Gallery
                    </h2>
                </div>
            </div>

            <div class="flex m-5" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <p class="ms-1 text-xs sm:text-sm font-medium text-blue-main">Gallery</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="video-gallery" class="ms-1 sm:text-sm text-xs font-medium text-blue-main"> Video Gallery</a>
                        </div>
                    </li>
                </ol>
            </div>
            <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
                <div class="mt-10 relative">
                    <div>
                        <div>
                            <div class="tabs sm:mt-10">
                                <div class="flex item-center gap-2 sm:justify-between">
                                    <ul class="flex gap-2 sm:gap-4 border-b bg-gray-50" style="border-radius:12px;">
                                        <li class="flex-1">
                                            <a href="#section1"
                                                class="tab-link block text-center py-2.5 px-2 sm:text-[16px] text-[10px] sm:py-3 sm:px-5 font-semibold text-gray-700 transition-colors hover:bg-slate-700 hover:text-white"
                                                aria-controls="section1" role="tab" tabindex="-1">Title</a>
                                        </li>
                                        <li class="flex-1">
                                            <a href="#section2"
                                                class="tab-link block text-center py-2.5 sm:py-3 px-2 sm:px-5 sm:text-[16px] text-[10px] font-semibold text-gray-700 transition-colors hover:bg-slate-700 hover:text-white"
                                                aria-controls="section2" role="tab" tabindex="-1">Category</a>
                                        </li>
                                        <li class="flex-1">
                                            <a href="#section3"
                                                class="tab-link block text-center py-2.5 sm:py-3 px-2 sm:px-5 sm:text-[16px] text-[10px] font-semibold text-gray-700 transition-colors hover:bg-slate-700 hover:text-white"
                                                aria-controls="section3" role="tab" tabindex="-1">Year</a>
                                        </li>
                                    </ul>

                                    <input type="text" id="first_name"
                                        class="bg-gray-100 w-[50%] border-b text-gray-900 sm:text-[16px] text-[10px] outline-none focus:ring-0 block px-5 py-2"
                                        style="border-radius:9px;" placeholder="Search by title..." required />
                                </div>

                                <section class="tab-panel mt-5" role="tabpanel" aria-hidden="true">
                                    <div id="galleryGrids"
                                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4">

                                        <?php
                                        $all_videos = [];
                                        $processed_ids = [];

                                        // Loop through all sections to collect videos from every video section
                                        foreach ($video_gallery_data['data']['sections'] as $section) {
                                            if (!isset($section['section_type']) || $section['section_type'] !== 'video') {
                                                continue;
                                            }
                                            if (!isset($section['resolved_content'])) {
                                                continue;
                                            }

                                            $rc = $section['resolved_content'];
                                            $item_id = $rc['id'] ?? null;

                                            // Prevent duplicates if same video item is added multiple times
                                            if ($item_id && in_array($item_id, $processed_ids)) {
                                                continue;
                                            }
                                            if ($item_id) {
                                                $processed_ids[] = $item_id;
                                            }

                                            $title = $rc['title'] ?? $rc['heading'] ?? $rc['name'] ?? 'Video';
                                            $rawDate = $rc['created_at'] ?? $rc['date'] ?? null;

                                            $day = $rawDate ? date("d", strtotime($rawDate)) : "";
                                            $year = $rawDate ? date("Y", strtotime($rawDate)) : "";
                                            $month = $rawDate ? date("M", strtotime($rawDate)) : "";

                                            $media_items = $rc['media'] ?? [];
                                            if (!is_array($media_items) || empty($media_items)) {
                                                $media_items = [$rc];
                                            }

                                            foreach ($media_items as $media) {
                                                $url = $media['media_url'] ?? $media['video_url'] ?? $media['page_link'] ?? $media['url'] ?? $media['link'] ?? $media['media_file'] ?? '';
                                                if (empty($url)) continue;

                                                // Support all YouTube formats: watch?v=, youtu.be/, embed/
                                                if (preg_match(
                                                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/|youtube\.com\/live\/)([^&\?\/]+)/i',
                                                    $url,
                                                    $matches
                                                )) {
                                                    $videoId = $matches[1];

                                                    $embedUrl = 'https://www.youtube.com/embed/' . $videoId;

                                                    $all_videos[] = [
                                                        'embedUrl' => $embedUrl,
                                                        'title'    => $title,
                                                        'day'      => $day,
                                                        'month'    => $month,
                                                        'year'     => $year
                                                    ];
                                                }
                                            }
                                        }

                                        if (!empty($all_videos)) {
                                            foreach ($all_videos as $video) {
                                        ?>
                                                <div class="video-card w-[100%] mx-auto bg-white border border-gray-200 rounded-lg shadow hover:shadow-[rgba(0,0,0,0.15)_0px_15px_25px,rgba(0,0,0,0.05)_0px_5px_10px] transition-shadow duration-300">
                                                    <iframe class="w-[100%] rounded-t-lg" height="240"
                                                        src="<?= htmlspecialchars($video['embedUrl']) ?>"
                                                        title="<?= htmlspecialchars($video['title']) ?>"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen loading="lazy">
                                                    </iframe>

                                                    <div class="relative flex flex-col justify-between p-1 sm:p-4">
                                                        <div class="flex gap-4">
                                                            <div class="w-[30%]">
                                                                <div class="bg-blue-main text-white text-center rounded-t-lg p-1 font-[700] text-[18px]">
                                                                    <?= htmlspecialchars($video['year']) ?>
                                                                </div>
                                                                <div class="text-center font-[700] text-[24px] text-[#D9A414] rounded-b-lg border border-gray-300">
                                                                    <?= htmlspecialchars($video['day']) ?><br>
                                                                    <span class="text-[#223B71] text-[14px]"><?= htmlspecialchars($video['month']) ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="w-[70%]">
                                                                <div class="text-blue-main text-[1rem] font-[700] m-2 line-clamp-2">
                                                                    <?= htmlspecialchars($video['title']) ?>
                                                                </div>
                                                                <hr>
                                                                <div class="flex gap-2 text-[9px] text-[#3B3B3B] m-2">
                                                                    <div>Category: <strong>Video</strong></div>
                                                                    <div>Total Video(s): <strong><?= count($all_videos) ?></strong></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo "<p class='text-center text-gray-500 col-span-full py-10 text-lg'>No videos available</p>";
                                        }
                                        ?>
                                    </div>

                                    <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                                        No matching videos found.
                                    </p>
                                </section>

                                <section id="section2" class="tab-panel hidden mt-5" role="tabpanel" aria-hidden="true">
                                </section>

                                <section id="section3" class="tab-panel hidden mt-5" role="tabpanel" aria-hidden="true">
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>


</body>

</html>