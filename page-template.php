<?php
$page = "dyanmic-page";

// Include apis.php to get global gallery data (if not already included)
if (!defined('APIS_INCLUDED')) {
    include "includes/apis.php";
    define('APIS_INCLUDED', true);
}

require_once "layouts/layout-function.php"; 

$pageSlug = $_GET['page'] ?? 'home';
$pageSlug = preg_replace('/\.php$/i', '', $pageSlug);
$pageSlug = trim($pageSlug, '/');
$pageApiUrl = "https://dps.allenhouseschools.com/api/pages/$pageSlug";

// Fetch page data
require_once __DIR__ . '/proxy/config.php';

$pageCh = curl_init($pageApiUrl);
curl_setopt_array($pageCh, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);
$pageResponse = curl_exec($pageCh);
$pageHttpCode = curl_getinfo($pageCh, CURLINFO_HTTP_CODE);
curl_close($pageCh);

if ($pageResponse === false || empty($pageResponse) || $pageHttpCode !== 200) {
    header("HTTP/1.0 404 Not Found");
    include "404.php";
    exit;
}

$pageData2 = json_decode($pageResponse, true);
if (!isset($pageData2['data']) || empty($pageData2['data'])) {
    header("HTTP/1.0 404 Not Found");
    include "404.php";
    exit;
}

$heading = $pageData2['data']['sections'][0]['content_heading'] ?? '';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageData2['data']['title'] ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageData2['data']['meta_description']) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageData2['data']['meta_keywords']) ?>">
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview-card {
            height: 200px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 8px 8px 0 0;
        }
        .pdf-preview-card:hover {
            background: #e9ecef;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>

    <main class="flex flex-col min-h-screen">
        <!-- Breadcrumb -->
        <div class="bg-[url('assets/images/building.webp')] bg-top flex items-center text-center h-[300px]">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                  <?= $pageData2['data']['title'] ?>
                </h2>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   <?= $pageData2['data']['title'] ?>
                </h2>
            </div>
        </div>

        <?php
        // Render dynamic sections
        renderDynamicSections($pageData2, $api_url);

        // ============================================================
        // GALLERY SUBTYPE HANDLING – SHOW ALBUM CARDS (like static page)
        // ============================================================
        
        // Fallback mapping (slug → subtype name)
        $fallbackGalleryMap = [
            'newsletter'       => 'newsletter',
            'annual-magazine'  => 'annual_magazine',
        ];

        $gallerySubtype = null;

        // First, check if the page API already provides a gallery subtype field.
        if (!empty($pageData2['data']['gallery_subtype'])) {
            $gallerySubtype = $pageData2['data']['gallery_subtype'];
        }
        // If not, use the fallback mapping based on the page slug.
        elseif (array_key_exists($pageSlug, $fallbackGalleryMap)) {
            $gallerySubtype = $fallbackGalleryMap[$pageSlug];
        }

        // If we have a subtype, fetch albums from the global gallery data
        if ($gallerySubtype) {
            // Ensure $photo_gallery_data is available from apis.php
            if (empty($photo_gallery_data) || empty($photo_gallery_data['data'])) {
                echo '<div class="container mx-auto px-4 py-8 text-red-500">Gallery data not available.</div>';
            } else {
                // Filter galleries by type "gallery" and case‑insensitive subtype match
                $filteredGalleries = array_filter($photo_gallery_data['data'], function($gallery) use ($gallerySubtype) {
                    $galleryType = strtolower($gallery['gallery_type'] ?? '');
                    if ($galleryType !== 'gallery') {
                        return false;
                    }
                    $subType = $gallery['gallery_sub_type']['sub_type_name'] ?? '';
                    return strcasecmp(trim($subType), trim($gallerySubtype)) === 0;
                });

                if (empty($filteredGalleries)) {
                    echo '<div class="container mx-auto px-4 py-8 text-gray-500">No galleries found for this subtype.</div>';
                } else {
                    // Display heading
                    echo '<div class="container mx-auto px-4 py-8">';

                    // Grid of album cards
                    echo '<div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4">';

                    foreach ($filteredGalleries as $gallery) {
                        $mediaItems = $gallery['media'] ?? [];

                        // Determine cover type: image, PDF gallery, or generic placeholder
                        $coverImage = null;
                        $isPdfGallery = false;

                        // First, try to find an actual image
                        foreach ($mediaItems as $media) {
                            $url = $media['media_url'] ?? '';
                            if (empty($url)) continue;

                            $path = parse_url($url, PHP_URL_PATH);
                            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'])) {
                                $coverImage = $url;
                                break;
                            }
                        }

                        // If no image found, check if there's at least one PDF (so we show PDF card)
                        if (!$coverImage && !empty($mediaItems)) {
                            foreach ($mediaItems as $media) {
                                $url = $media['media_url'] ?? '';
                                if (empty($url)) continue;
                                $path = parse_url($url, PHP_URL_PATH);
                                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                                if ($ext === 'pdf') {
                                    $isPdfGallery = true;
                                    break;
                                }
                            }
                        }

                        // Date handling
                        $rawDate = !empty($gallery['event_date']) ? $gallery['event_date'] : ($gallery['created_at'] ?? '');
                        $day   = $rawDate ? date("d", strtotime($rawDate)) : '';
                        $month = $rawDate ? date("M", strtotime($rawDate)) : '';
                        $year  = $rawDate ? date("Y", strtotime($rawDate)) : '';

                        $title = $gallery['heading'] ?? $gallery['title'] ?? 'Untitled';
                        $galleryId = $gallery['id'] ?? '';
                        $mediaCount = count($mediaItems);
                        ?>
                        <div class="w-[100%] mx-auto bg-white border border-gray-200 rounded-lg shadow hover:shadow-[rgba(0,0,0,0.15)_0px_15px_25px,rgba(0,0,0,0.05)_0px_5px_10px] transition-shadow duration-300">
                            <a href="gallery-detail.php?id=<?= htmlspecialchars($galleryId) ?>" class="block">
                                <?php if ($isPdfGallery): ?>
                                    <?php render_gallery_pdf_cover(gallery_pdf_cover_alt($gallery, $title)); ?>
                                <?php elseif ($coverImage): ?>
                                    <img class="rounded-t-lg w-full h-[200px] object-cover"
                                         src="<?= htmlspecialchars($coverImage) ?>"
                                         alt="<?= ms_esc_image_alt($gallery, (string) $title) ?>">
                                <?php else: ?>
                                    <!-- Generic fallback when no media at all -->
                                    <div class="pdf-preview-card bg-gray-200">
                                        <svg class="w-16 h-20 text-gray-500 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 6h16v2H4V6zm2-4h12v2H6V2zm16 8H2v12h20V10zm-2 10H4v-8h16v8z"/>
                                        </svg>
                                        <div class="text-sm font-medium text-gray-500">No Media</div>
                                    </div>
                                <?php endif; ?>
                            </a>

                            <div class="sm:p-4 p-1 flex flex-col justify-between relative">
                                <div class="flex gap-4">
                                    <div class="w-[30%]">
                                        <div class="bg-blue-main text-white text-center rounded-t-lg p-1 font-[700] text-[18px]">
                                            <?= htmlspecialchars($year) ?>
                                        </div>
                                        <div class="text-center font-[700] text-[24px] text-[#D9A414] rounded-b-lg border border-gray-300">
                                            <?= htmlspecialchars($day) ?><br>
                                            <span class="text-blue-main text-[14px]"><?= htmlspecialchars($month) ?></span>
                                        </div>
                                    </div>
                                    <div class="w-[70%]">
                                        <div class="text-blue-main text-[1rem] font-[700] m-2 line-clamp-2">
                                            <?= htmlspecialchars($title) ?>
                                        </div>
                                        <hr>
                                        <div class="flex gap-2 text-[9px] text-[#3B3B3B] m-2">
                                            <div>Category: <strong><?= htmlspecialchars($gallerySubtype) ?></strong></div>
                                            <div>Total Media: <strong><?= $mediaCount ?></strong></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="gallery-detail.php?id=<?= htmlspecialchars($galleryId) ?>">
                                    <button class="group py-1 px-4 sm:px-6 rounded-[10px] w-full border border-gray text-blue-main hover:text-white hover:bg-[#003618] flex gap-2 items-center justify-center mt-5">
                                        View More
                                        <svg class="w-[14px] h-[10px] fill-[#223B71] group-hover:fill-white" width="8" height="9" viewBox="0 0 8 9" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.65008 0.911564C6.9831 0.911564 7.25307 1.18153 7.25307 1.51456L7.25307 6.63112C7.25307 6.96414 6.9831 7.23411 6.65008 7.23411C6.31705 7.23411 6.04708 6.96414 6.04708 6.63112L6.04708 2.97031L1.10714 7.91026C0.871652 8.14574 0.489858 8.14574 0.254375 7.91026C0.0188919 7.67477 0.018892 7.29298 0.254376 7.0575L5.19432 2.11755L1.53352 2.11755C1.20049 2.11755 0.930523 1.84758 0.930523 1.51456C0.930523 1.18153 1.20049 0.911564 1.53352 0.911564L6.65008 0.911564Z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>'; // close grid
                    echo '</div>'; // close container
                }
            }
        }
        ?>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
    </main>

    <!-- Scripts -->
    <?php include "includes/foot.php" ?>
</body>
</html>