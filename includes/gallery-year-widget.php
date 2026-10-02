<?php
/**
 * Compatibility shim for Unnao-style gallery-year-widget.php includes.
 * Kalyanpur branch 9 + JWT proxy.
 */

if (!function_exists('dps_gallery_year_toolbar_grid_markup')) {
    function dps_gallery_year_toolbar_grid_markup(
        $idPrefix,
        $searchPlaceholder = null,
        $noResultsText = 'No matching items found.'
    ) {
        $prefix = preg_replace('/[^a-zA-Z0-9_]/', '_', $idPrefix);
        $placeholder = $searchPlaceholder !== null ? $searchPlaceholder : 'Search';
        echo '<div class="flex items-center gap-2 sm:justify-between flex-wrap w-full">';
        $galleryToolbarPlaceholder = $placeholder;
        include __DIR__ . '/gallery-year-toolbar.php';
        echo '</div>';

        echo '<section id="section1" class="tab-panel mt-5" role="tabpanel">';
        echo '<div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4"></div>';

        $p = htmlspecialchars($prefix, ENT_QUOTES, 'UTF-8');
        echo '<div id="' . $p . 'Pagination" class="flex justify-center items-center gap-2 mt-8">';
        echo '<button type="button" id="' . $p . 'PrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">Previous</button>';
        echo '<div id="' . $p . 'PageNumbers" class="flex gap-1"></div>';
        echo '<button type="button" id="' . $p . 'NextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">Next</button>';
        echo '</div>';
        echo '<p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">' . htmlspecialchars($noResultsText, ENT_QUOTES, 'UTF-8') . '</p>';
        echo '</section>';
    }
}

if (!function_exists('dps_gallery_year_init_script')) {
    function dps_gallery_year_init_script(array $config)
    {
        global $galleryGridConfig;
        $galleryGridConfig = array_merge([
            'branchId' => 9,
            'apiBase' => 'proxy/gallery-proxy',
        ], $config);
        include __DIR__ . '/gallery-grid-init.php';
    }
}
