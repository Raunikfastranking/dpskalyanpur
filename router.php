<?php
// Router for PHP built-in server — emulates .htaccess rewrite rules.
// Usage: php -S localhost:8000 router.php

$root = __DIR__;
$uri  = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri  = '/' . ltrim($uri, '/');
$target = $root . $uri;

// Real files (assets, *.php requested directly) — let the server handle them.
if ($uri !== '/' && is_file($target)) {
    return false;
}

$serve = function (string $file, array $get = []) use ($root, $uri) {
    $_GET = array_merge($_GET, $get);
    $_SERVER['SCRIPT_NAME']     = substr($file, strlen($root));
    $_SERVER['SCRIPT_FILENAME'] = $file;
    $_SERVER['PHP_SELF']        = $_SERVER['SCRIPT_NAME'];
    require $file;
    return true;
};

// Clean URL -> matching .php file (e.g. /about-us -> /about-us.php)
if (is_file($root . rtrim($uri, '/') . '.php')) {
    return $serve($root . rtrim($uri, '/') . '.php');
}

// Friendly rewrites from .htaccess
if (preg_match('#^/home/?$#i', $uri)) {
    return $serve($root . '/index.php');
}
if (preg_match('#^/blog/([A-Za-z0-9-]+)/?$#i', $uri, $m)) {
    return $serve($root . '/detail.php', ['slug' => $m[1]]);
}
if (preg_match('#^/view/([A-Za-z0-9-]+)/?$#i', $uri, $m) && is_file($root . '/detail-view.php')) {
    return $serve($root . '/detail-view.php', ['slug' => $m[1]]);
}

// CMS menu slugs that don't match local filenames
$slugMap = [
    '/fee-structure'                                => '/fee-structure.php',
    '/fee-structure-page-kalyanpur'                 => '/fee-structure.php',
    '/documents-required-dpskalyanpur-admission'    => '/admission-procedure.php',
    '/annual-magazine'                              => '/magazine.php',
];
$key = rtrim($uri, '/');
if (isset($slugMap[$key]) && is_file($root . $slugMap[$key])) {
    return $serve($root . $slugMap[$key]);
}

// Nothing matched — let the server 404 / serve directory index.
return false;
