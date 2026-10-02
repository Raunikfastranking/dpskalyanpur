<?php
/**
 * CLI validation: prints resolved OG for key routes and asserts correctness.
 * Usage: php scripts/validate-og.php
 */

$_SERVER['HTTPS'] = 'on';
$_SERVER['HTTP_HOST'] = 'dpskalyanpur.com';

// ---- Helper ----
function run_page_simulation(string $phpSelf, string $requestUri, callable $bootstrap): array
{
    $_SERVER['PHP_SELF'] = $phpSelf;
    $_SERVER['REQUEST_URI'] = $requestUri;

    // Wipe any GLOBALS that carry page-scope data so simulations don't leak.
    foreach (['ogMeta', 'selectedBlog', 'pageData2'] as $key) {
        unset($GLOBALS[$key]);
    }

    $bootstrap();

    require_once dirname(__DIR__) . '/includes/seo.php';
    return dps_resolve_og_meta();
}

function print_meta(string $label, array $meta): void
{
    echo "\n=== {$label} ===\n";
    foreach (['title', 'description', 'url', 'type', 'image'] as $key) {
        $val = $meta[$key] ?? '';
        if ($key === 'description') {
            $val = strlen($val) > 100 ? substr($val, 0, 97) . '...' : $val;
        }
        if ($key === 'image') {
            $val = strlen($val) > 80 ? '...' . substr($val, -77) : $val;
        }
        echo str_pad($key . ':', 14) . $val . "\n";
    }
}

// ---- 1) Home ----
$homeMeta = run_page_simulation('/index.php', '/', function () {
    require_once dirname(__DIR__) . '/includes/apis.php';
});
print_meta('Home (/)', $homeMeta);

// ---- 2) Admission Overview (API-backed) ----
$admissionMeta = run_page_simulation('/admission-overview.php', '/admission-overview', function () {
    require_once dirname(__DIR__) . '/includes/apis.php';
});
print_meta('Admission Overview (/admission-overview)', $admissionMeta);

// ---- 3) Process / Admission Procedure (static page) ----
$procedureMeta = run_page_simulation('/admission-procedure.php', '/admission-procedure', function () {
    // This page does NOT call include apis.php itself, so no page data available.
});
print_meta('Admission Procedure (/admission-procedure) [static]', $procedureMeta);

// ---- 4) Blog listing ----
$blogListMeta = run_page_simulation('/blog.php', '/blog', function () {
    $GLOBALS['ogMeta'] = [
        'title'       => 'DPS Kalyanpur Blog | Education, Parenting & School Updates',
        'description' => 'Read the latest articles from Delhi Public School Kalyanpur on education, parenting tips, school activities, CBSE updates, and student development.',
        'url'         => 'https://dpskalyanpur.com/blog',
        'type'        => 'website',
    ];
});
print_meta('Blog listing (/blog)', $blogListMeta);

// ---- 5) Blog detail (first real blog slug) ----
require_once dirname(__DIR__) . '/includes/apis.php';
$sampleBlog = null;
if (!empty($blogData['data'][0]) && is_array($blogData['data'][0])) {
    $sampleBlog = $blogData['data'][0];
}

if ($sampleBlog) {
    $blogSlug = $sampleBlog['slug'] ?? 'sample';
    $blogDetailMeta = run_page_simulation('/detail.php', '/blog/' . $blogSlug, function () use ($sampleBlog) {
        $GLOBALS['selectedBlog'] = $sampleBlog;
    });
    print_meta('Blog detail (/blog/' . $blogSlug . ')', $blogDetailMeta);
} else {
    echo "\n=== Blog detail ===\nSkipped (no blog API data in this environment).\n";
    $blogDetailMeta = null;
}

// ---- Assertions ----
$errors = [];

// Unique titles
if ($homeMeta['title'] === $admissionMeta['title']) {
    $errors[] = 'Home and Admission Overview have identical og:title.';
}

// Unique URLs
if ($homeMeta['url'] === $admissionMeta['url']) {
    $errors[] = 'Home and Admission Overview have identical og:url.';
}

// Correct URL for admission overview
if ($admissionMeta['url'] !== 'https://dpskalyanpur.com/admission-overview') {
    $errors[] = 'Admission Overview og:url is wrong: ' . $admissionMeta['url'];
}

// Admission-procedure must not use homepage title
if (str_contains($procedureMeta['title'], 'Top Rated CBSE Board School in Kanpur')) {
    $errors[] = 'Admission Procedure still uses the homepage og:title.';
}

// Blog listing must have its own title
if ($blogListMeta['title'] === $homeMeta['title']) {
    $errors[] = 'Blog listing shares homepage og:title.';
}

if ($blogDetailMeta !== null) {
    if (($blogDetailMeta['type'] ?? '') !== 'article') {
        $errors[] = 'Blog detail og:type should be article, got: ' . ($blogDetailMeta['type'] ?? 'MISSING');
    }
    if ($blogDetailMeta['title'] === $homeMeta['title']) {
        $errors[] = 'Blog detail shares homepage og:title.';
    }
    if ($blogDetailMeta['url'] === $admissionMeta['url']) {
        $errors[] = 'Blog detail and Admission Overview share same og:url.';
    }
}

echo "\n--- Validation ---\n";
if ($errors) {
    foreach ($errors as $e) {
        echo "FAIL: {$e}\n";
    }
    exit(1);
}
echo "PASS: OG metadata is unique and correct for all tested routes.\n";
exit(0);
