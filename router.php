<?php
/**
 * Router for PHP's built-in server (php -S). Mirrors .htaccess / web.config rewrites locally.
 *
 * Usage:
 *   php -S 127.0.0.1:8888 -t . router.php
 */

$uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriPath = '/' . trim((string) $uriPath, '/');
if ($uriPath === '/') {
    require __DIR__ . '/index.php';
    return true;
}

$path = trim($uriPath, '/');
$root = __DIR__;

if ($path === '' || preg_match('/\.(jpg|jpeg|png|gif|css|js|pdf|svg|ico|webp|apk|zip|rar|txt|xml|json|mp4|webm|ogg|map|woff|woff2|ttf|eot)$/i', $path)) {
    return false;
}

$fsPath = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $path);
if (is_file($fsPath)) {
    return false;
}

if (is_dir($fsPath)) {
    $dirIndex = $fsPath . DIRECTORY_SEPARATOR . 'index.php';
    if (is_file($dirIndex)) {
        chdir(dirname($dirIndex));
        require $dirIndex;
        return true;
    }
    return false;
}

if (preg_match('#^home/?$#i', $path) || preg_match('#^index/?$#i', $path)) {
    require __DIR__ . '/index.php';
    return true;
}

if (preg_match('#^blog/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/detail.php';
    return true;
}

if (preg_match('#^view/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/detail-view.php';
    return true;
}

$slugRewrites = [
    'fee-structure-page-kalyanpur' => 'fee-structure.php',
    'documents-required-dpskalyanpur-admission' => 'admission-procedure.php',
    'annual-magazine' => 'magazine.php',
];
$pathKey = rtrim($path, '/');
if (isset($slugRewrites[$pathKey])) {
    require __DIR__ . '/' . $slugRewrites[$pathKey];
    return true;
}

if (preg_match('#^proxy/([A-Za-z0-9_-]+)/?$#i', $path, $m)) {
    $proxyPhp = $root . '/proxy/' . $m[1] . '.php';
    if (is_file($proxyPhp)) {
        require $proxyPhp;
        return true;
    }
}

$phpFile = $fsPath . '.php';
if (is_file($phpFile)) {
    chdir(dirname($phpFile));
    require $phpFile;
    return true;
}

if (preg_match('#^[^/]+$#', $pathKey)) {
    $_GET['page'] = $pathKey;
    require __DIR__ . '/page-template.php';
    return true;
}

http_response_code(404);
require __DIR__ . '/404.php';
return true;