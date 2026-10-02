<?php
require_once dirname(__DIR__) . '/includes/apis.php';

echo "admission title: " . ($admission_overview_data['data']['title'] ?? 'MISSING') . PHP_EOL;
echo "admission overview keys: " . implode(', ', array_keys($admission_overview_data['data'] ?? [])) . PHP_EOL;
if (!empty($admission_overview_data['data']['sections'][0]['content_heading'])) {
    echo "admission section heading: " . strip_tags($admission_overview_data['data']['sections'][0]['content_heading']) . PHP_EOL;
}
echo "blog count: " . count($blogData['data'] ?? []) . PHP_EOL;
if (!empty($blogData['data'][0]['slug'])) {
    echo "first blog slug: " . $blogData['data'][0]['slug'] . PHP_EOL;
    echo "first blog title: " . ($blogData['data'][0]['meta_title'] ?? $blogData['data'][0]['main_title'] ?? 'MISSING') . PHP_EOL;
}
