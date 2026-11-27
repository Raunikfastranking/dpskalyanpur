<?php
/**
 * Compare CMS API HTML snippets with rendered layout output (parity smoke test).
 * Usage: php scripts/validate-cms-render.php
 */

chdir(dirname(__DIR__));
require_once __DIR__ . '/../includes/cms-helpers.php';
require_once __DIR__ . '/../layouts/layout-function.php';
require_once __DIR__ . '/../proxy/config.php';

$apiBase = 'https://dps.allenhouseschools.com/api';
$slugs = [
    'home-page-kalyanpur',
    'excellence-in-action-page-kalyanpur',
    'history-page-kalyanpur',
    'fee-structure-page-kalyanpur',
];

$failed = 0;
$passed = 0;

foreach ($slugs as $slug) {
    $url = $apiBase . '/pages/' . rawurlencode($slug);
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 25,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => api_auth_headers(),
    ]);
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($code !== 200 || !$body) {
        echo "FAIL {$slug}: API HTTP {$code}\n";
        $failed++;
        continue;
    }

    $page = json_decode($body, true);
    $sections = $page['data']['sections'] ?? [];
    $start = (int) ($page['data']['default_sections'] ?? 0);
    $dynamic = array_slice($sections, $start);
    if ($dynamic === []) {
        echo "SKIP {$slug}: no footer/dynamic sections (handled in page template)\n";
        continue;
    }
    $checkSections = $dynamic;

    ob_start();
    renderDynamicSections($page, 'https://dps.allenhouseschools.com');
    $html = ob_get_clean();

    $sectionIssues = 0;
    foreach ($checkSections as $idx => $section) {
        foreach (['content_heading', 'content'] as $field) {
            $apiHtml = (string) ($section[$field] ?? '');
            if ($apiHtml === '' || strpos($apiHtml, '<') === false) {
                continue;
            }
            $needle = substr(strip_tags($apiHtml), 0, 40);
            if ($needle !== '' && stripos($html, $needle) === false) {
                echo "  - section {$idx} missing text from {$field}\n";
                $sectionIssues++;
            }
            if (preg_match('/style\s*=\s*["\'][^"\']+["\']/i', $apiHtml)) {
                preg_match('/style\s*=\s*["\']([^"\']+)["\']/i', $apiHtml, $m);
                $styleFrag = $m[1] ?? '';
                if ($styleFrag !== '' && stripos($html, $styleFrag) === false) {
                    echo "  - section {$idx} missing inline style from {$field}: {$styleFrag}\n";
                    $sectionIssues++;
                }
            }
        }
    }

    if ($sectionIssues === 0) {
        echo "PASS {$slug} (" . count($dynamic) . " sections)\n";
        $passed++;
    } else {
        echo "FAIL {$slug}: {$sectionIssues} parity issue(s)\n";
        $failed++;
    }
}

echo "\nSummary: {$passed} passed, {$failed} failed\n";
exit($failed > 0 ? 1 : 0);