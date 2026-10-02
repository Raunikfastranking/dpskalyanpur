<?php
include "includes/apis.php";

$gallery = null;
$id = $_GET['id'] ?? null;

if ($id !== null) {
    // photo_gallery_data first (paginated list — may not contain all IDs)
    if (!empty($photo_gallery_data['data']) && is_array($photo_gallery_data['data'])) {
        foreach ($photo_gallery_data['data'] as $item) {
            if ((string)$item['id'] === (string)$id) {
                $gallery = $item;
                break;
            }
        }
    }

    // achievement_data fallback
    if ($gallery === null && !empty($achievement_data['data']) && is_array($achievement_data['data'])) {
        foreach ($achievement_data['data'] as $item) {
            if ((string)$item['id'] === (string)$id) {
                $gallery = $item;
                break;
            }
        }
    }

    // Direct API fallback — fetches by ID when not found in the paginated list
    if ($gallery === null) {
        $directUrl = 'https://dps.allenhouseschools.com/api/galleries/' . urlencode($id);
        $ch = curl_init($directUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
        $directResponse = curl_exec($ch);
        curl_close($ch);

        if ($directResponse) {
            $directData = json_decode($directResponse, true);
            // API may return the item directly or wrapped in data/gallery key
            if (!empty($directData['data']) && is_array($directData['data'])) {
                $gallery = $directData['data'];
            } elseif (!empty($directData['gallery']) && is_array($directData['gallery'])) {
                $gallery = $directData['gallery'];
            } elseif (!empty($directData['id'])) {
                $gallery = $directData;
            }
        }
    }
}

// Fallback values
$page_title    = $gallery['heading'] ?? $gallery['title'] ?? $gallery['data']['title'] ?? 'Gallery / Achievement';
$description   = $gallery['content'] ?? $gallery['description'] ?? $gallery['data']['content'] ?? '';
$meta_desc     = $gallery['meta_description'] ?? $gallery['data']['meta_description'] ?? '';
$meta_keywords = $gallery['meta_keywords'] ?? $gallery['data']['meta_keywords'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-card {
            height: 220px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 1.25rem;
        }
        .pdf-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px -4px rgba(220, 38, 38, 0.15);
            border-color: #f87171;
        }
        .pdf-icon {
            font-size: 3.5rem;
            color: #dc2626;
            margin-bottom: 0.75rem;
        }
        .pdf-title {
            font-weight: 600;
            color: #991b1b;
            margin-bottom: 0.25rem;
        }
        .pdf-caption {
            font-size: 0.875rem;
            color: #4b5563;
            line-height: 1.3;
            max-height: 3.5em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .pdf-hint {
            margin-top: 0.75rem;
            font-size: 0.75rem;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <?php include "includes/header.php"; ?>

    <div class="main relative mb-[120px]">

        <!-- Hero Banner -->
        <div class="bg-center flex items-center text-center h-[300px] bg-[url('assets/images/building.webp')] bg-cover bg-no-repeat">
            <div class="w-full px-6">
                <h1 class="text-3xl sm:text-4xl font-bold text-white drop-shadow-xl">
                    <?= htmlspecialchars(strip_tags($page_title)) ?>
                </h1>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-xs sm:text-sm font-medium text-blue-main">Media & Events</span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="photo-gallery.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                            Photo Gallery
                        </a>
                    </div>
                </li>
                <?php if (!empty($gallery['heading'])): ?>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-xs sm:text-sm font-medium text-gray-600 truncate max-w-[140px] md:max-w-[220px]">
                            <?= htmlspecialchars($gallery['heading']) ?>
                        </span>
                    </div>
                </li>
                <?php endif; ?>
            </ol>
        </div>

        <!-- Main Content -->
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 mx-3 mt-8 mb-16">
            <?php if ($gallery === null): ?>
                <div class="text-center py-20">
                    <h2 class="text-3xl font-bold text-gray-700 mb-4">Item Not Found</h2>
                    <p class="text-gray-600 mb-8 max-w-xl mx-auto">
                        The requested gallery or achievement could not be found.
                    </p>
                    <a href="photo-gallery.php" class="inline-block px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        Back to Galleries
                    </a>
                </div>
            <?php else: ?>

                <!-- Title & Description -->
                <div class="text-center mb-12">
                   <h2 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-5">
    <?= htmlspecialchars(strip_tags($page_title)) ?>
</h2>
                   <?php if ($description): ?>
    <div class="text-gray-600 max-w-3xl mx-auto leading-relaxed prose prose-gray">
        <?= nl2br(htmlspecialchars(strip_tags($description))) ?>
    </div>
<?php endif; ?>
                </div>

                <!-- Media Grid -->
                <?php if (!empty($gallery['media']) && is_array($gallery['media'])): 
                    $images = [];
                    $pdfs   = [];

                    foreach ($gallery['media'] as $media) {
                        $url = $media['media_url'] ?? '';
                        if (empty($url)) continue;
                        $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));

                        if (in_array($ext, ['jpg','jpeg','png','gif','webp','bmp'])) {
                            $images[] = $media;
                        } elseif ($ext === 'pdf') {
                            $pdfs[] = $media;
                        }
                    }
                ?>

                    <div id="photoGallerys" class="grid gap-5 grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

                        <!-- Images -->
                        <?php foreach ($images as $media): ?>
                            <a href="<?= htmlspecialchars($media['media_url']) ?>" 
                               data-fancybox="gallery"
                               data-caption="<?= htmlspecialchars($media['caption'] ?? $page_title) ?>">
                                <img src="<?= htmlspecialchars($media['media_url']) ?>" 
                                     alt="<?= ms_esc_image_alt($media, 'Gallery image') ?>" 
                                     loading="lazy"
                                     class="rounded-xl shadow-md hover:shadow-xl transition-all duration-300 h-[220px] w-full object-cover">
                            </a>
                        <?php endforeach; ?>

                        <!-- PDFs -->
                        <?php foreach ($pdfs as $media): ?>
                            <a href="<?= htmlspecialchars($media['media_url']) ?>" 
                               target="_blank" rel="noopener noreferrer"
                               class="pdf-card">
                                <div class="pdf-icon">📄</div>
                                <div class="pdf-title">PDF Document</div>
                                <?php if (!empty($media['caption'])): ?>
                                    <div class="pdf-caption mt-1">
                                        <?= htmlspecialchars($media['caption']) ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pdf-hint">Click to view / download</div>
                            </a>
                        <?php endforeach; ?>

                    </div>

                    <?php if (empty($images) && empty($pdfs)): ?>
                        <p class="text-center text-gray-500 py-12 text-lg">No valid media files found.</p>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="text-center py-16 text-gray-600 bg-gray-50 rounded-xl border border-gray-200">
                        <p class="text-lg">No media available for this item.</p>
                        <a href="photo-gallery.php" class="mt-6 inline-block text-blue-main hover:underline font-medium">
                            ← Back to galleries
                        </a>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>

    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            Thumbs: { showOnStart: false },
            Images: { initialSize: "fit" }
        });
    </script>

</body>
</html>