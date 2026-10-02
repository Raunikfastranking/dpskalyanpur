<?php
require_once __DIR__ . '/config.php';

$branchId = DPS_KALYANPUR_BRANCH_ID;
$apiUrl = "https://dps.allenhouseschools.com/api/grades/{$branchId}";

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    echo "<option value=''>Error fetching grades</option>";
    exit;
}

$data = json_decode($response, true);

if (!is_array($data) || !isset($data['status']) || $data['status'] !== 'success') {
    echo "<option value=''>Invalid API response</option>";
    exit;
}

$grades = $data['data']['data'] ?? $data['data'] ?? [];

if (empty($grades)) {
    echo "<option value=''>No grades available</option>";
    exit;
}

foreach ($grades as $grade) {
    $gradeValue = trim($grade['grades'] ?? '');
    if ($gradeValue === '') continue;
    echo "<option value='" . htmlspecialchars($gradeValue, ENT_QUOTES, 'UTF-8') . "'>"
         . htmlspecialchars($gradeValue, ENT_QUOTES, 'UTF-8') . "</option>";
}
