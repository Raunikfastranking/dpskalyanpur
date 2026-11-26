<?php
// Wrap CMS <table> markup in a scrollable container so wide tables
// scroll horizontally instead of stretching the whole page on mobile
function dps_wrap_tables($html)
{
    if (stripos($html, '<table') === false) return $html;
    return preg_replace(
        '/<table\b[\s\S]*?<\/table>/i',
        '<div class="dps-table-scroll">$0</div>',
        $html
    );
}

function renderDynamicSections($pagesData, $api_url)
{
    if (empty($pagesData['data']['sections'])) return;

    // Get start index dynamically from API
    $startIndex = isset($pagesData['data']['default_sections'])
        ? (int)$pagesData['data']['default_sections']
        : 0;

    foreach (array_slice($pagesData['data']['sections'], $startIndex) as $data) {
        $layoutId = $data['section_layout_id'] ?? null;
        $section_type = $data['section_type'] ?? null;

        // Determine layout file path
        if (!empty($layoutId)) {
            $layoutFile = __DIR__ . "/layout_{$layoutId}.php";
        } else {
            $layoutFile = __DIR__ . "/layout_default.php"; // ✅ Default layout if none selected
        }

        // Include the layout or fallback to default
        if (file_exists($layoutFile)) {
            ob_start();
            include $layoutFile;
            echo dps_wrap_tables(ob_get_clean());
        } else {
            // Fallback: default layout if specific one not found
            $fallback = __DIR__ . "/layout_default.php";
            if (file_exists($fallback)) {
                include $fallback;
            } else {
                echo "<div class='text-red-600'>No layout found (missing layout_{$layoutId}.php and layout_default.php)</div>";
            }
        }
    }
}
?>
