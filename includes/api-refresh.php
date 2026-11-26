<?php

if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

require __DIR__ . '/apis.php'; 

$lockFile = $cacheFile . '.lock';
@touch($lockFile);


if ((time() - @filemtime($cacheFile)) < 5) {
    @unlink($lockFile);
    exit;
}

$fresh = fetchMultipleApiData($endpoints);

if (is_array($fresh) && !empty(array_filter($fresh))) {
    foreach ($fresh as $key => $value) {
        if ($value === null && isset($data[$key])) {
            $fresh[$key] = $data[$key];
        }
    }
    dps_api_cache_save($cacheFile, $fresh);
}
@unlink($lockFile);
