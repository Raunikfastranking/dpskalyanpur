<?php
// Local dev router for `php -S localhost:8000 router.php`
// .htaccess ke rewrite rules emulate karta hai — PRODUCTION me use mat karo (Apache .htaccess use karta hai)

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;

// Existing file/dir -> PHP built-in server ko serve karne do
if ($path !== '/' && file_exists($file)) {
    if (is_dir($file)) {
        if (file_exists($file . '/index.php')) {
            require $file . '/index.php';
            return true;
        }
        return false;
    }
    return false;
}

// Clean URL -> .php file (jaise .htaccess rule: %{REQUEST_FILENAME}.php)
if (file_exists($file . '.php')) {
    require $file . '.php';
    return true;
}

// Friendly URL rewrites (.htaccess ke same)
if (preg_match('#^/blog/([A-Za-z0-9-]+)/?$#', $path, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/detail.php';
    return true;
}
if (preg_match('#^/view/([A-Za-z0-9-]+)/?$#', $path, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/detail-view.php';
    return true;
}
if ($path === '/home' || $path === '/') {
    require __DIR__ . '/index.php';
    return true;
}

// CMS menu slug rewrites (.htaccess ke same)
$slugMap = [
    '/fee-structure-page-kalyanpur' => '/fee-structure.php',
    '/documents-required-dpskalyanpur-admission' => '/admission-procedure.php',
    '/annual-magazine' => '/magazine.php',
];
$cleanPath = rtrim($path, '/');
if (isset($slugMap[$cleanPath]) && file_exists(__DIR__ . $slugMap[$cleanPath])) {
    require __DIR__ . $slugMap[$cleanPath];
    return true;
}

// Kuch na mila -> 404 page
http_response_code(404);
require __DIR__ . '/404.php';
