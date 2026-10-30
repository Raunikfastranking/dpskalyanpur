<?php
// Background cache warmer — apis.php ise stale cache pe detached process me spawn karti hai.
// Browser se direct hit pe kuch nahi karega (CLI-only).
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require __DIR__ . '/apis.php'; // $endpoints, fetchMultipleApiData(), $cacheFile, purana $data

$lockFile = $cacheFile . '.lock';
@touch($lockFile);

// apis.php ne isi run me foreground fetch karke save kar diya ho (cache deleted case)
// to dobara fetch ki zaroorat nahi
if ((time() - @filemtime($cacheFile)) < 5) {
    @unlink($lockFile);
    exit;
}

$fresh = fetchMultipleApiData($endpoints);
// CMS down/fail ho to nulls cache me mat likho — failed endpoints ke liye purana data retain
if (is_array($fresh) && !empty(array_filter($fresh))) {
    foreach ($fresh as $key => $value) {
        if ($value === null && isset($data[$key])) {
            $fresh[$key] = $data[$key];
        }
    }
    dps_api_cache_save($cacheFile, $fresh);
}
@unlink($lockFile);
