<?php
require_once __DIR__ . '/config.php';

$apiUrl = 'https://dps.allenhouseschools.com/api/cities/' . DPS_KALYANPUR_BRANCH_ID;

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER     => api_auth_headers(),
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response === false || $httpCode !== 200) {
    echo "<option value=''>Error fetching cities</option>";
    exit;
}

$citiesData = json_decode($response, true);

if (!is_array($citiesData) || !isset($citiesData['status']) || $citiesData['status'] !== 'success') {
    echo "<option value=''>Invalid API response or failed request</option>";
    exit;
}

$cities = $citiesData['data'] ?? [];

if (!is_array($cities) || empty($cities)) {
    echo "<option value=''>No cities available</option>";
    exit;
}

foreach ($cities as $city) {
    $cityName = trim($city['name'] ?? '');
    if ($cityName === '') continue;
    echo "<option value='" . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . "'>"
         . htmlspecialchars($cityName, ENT_QUOTES, 'UTF-8') . "</option>";
}
