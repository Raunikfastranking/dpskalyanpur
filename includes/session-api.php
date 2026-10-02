<?php
require_once dirname(__DIR__) . '/proxy/config.php';

// Fetches active school sessions (no branch_id needed)
$apiUrl = "https://dps.allenhouseschools.com/api/school-sessions";

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 10,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => false, // Keep as in your original code; consider removing in production
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    return [];
}

$json = json_decode($response, true);

if (!is_array($json) || !isset($json['status']) || $json['status'] !== 'success') {
    return [];
}

// Extract the actual sessions list (paginated under data.data)
return $json['data']['data'] ?? [];
?>