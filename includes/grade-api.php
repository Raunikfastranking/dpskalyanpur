<?php
require_once dirname(__DIR__) . '/proxy/config.php';

// includes/grade-api.php

$branchId = DPS_KALYANPUR_BRANCH_ID;

// --- Simple Caching ---
$cacheFile = __DIR__ . '/cache/grades_cache.json'; // Store in a 'cache' subdirectory
$cacheTime = 3600; // Cache for 1 hour (3600 seconds)

// Check if cache exists and is fresh
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    $cachedData = json_decode(file_get_contents($cacheFile), true);
    if (is_array($cachedData)) {
        return $cachedData;
    }
}
// --- End Caching ---

// If no cache, fetch from API
$apiUrl = "https://dps.allenhouseschools.com/api/grades/{$branchId}";

$ch = curl_init($apiUrl);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_FOLLOWLOCATION => true, // Follow redirects if any
    CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; YourSite/1.0)', // Be a good citizen
    CURLOPT_HTTPHEADER => api_auth_headers(),
]);

$response = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Handle errors gracefully
if ($response === false) {
    error_log("Grade API cURL error for branch {$branchId}: " . $curlError);
    // Optionally, return stale cache if available
    if (file_exists($cacheFile)) {
        $cachedData = json_decode(file_get_contents($cacheFile), true);
        if (is_array($cachedData)) {
            return $cachedData; // Serve stale cache if API fails
        }
    }
    return [];
}

if ($httpCode !== 200) {
    error_log("Grade API HTTP error for branch {$branchId}: " . $httpCode . " - Response: " . substr($response, 0, 200));
    return [];
}

$json = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("Grade API JSON error for branch {$branchId}: " . json_last_error_msg());
    return [];
}

if (isset($json['status']) && $json['status'] === 'success' && isset($json['data'])) {
    $gradeData = $json['data'];
    
    // Save to cache
    // Make sure the cache directory exists and is writable
    $cacheDir = dirname($cacheFile);
    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0755, true); // Create directory if it doesn't exist
    }
    file_put_contents($cacheFile, json_encode($gradeData));
    
    return $gradeData;
}

error_log("Grade API unexpected response structure for branch {$branchId}: " . substr($response, 0, 200));
return [];