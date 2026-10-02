<?php

/**
 * Central Open Graph / SEO metadata resolver for DPS Kalyanpur.
 *
 * Pages may optionally set `$ogMeta` before including `includes/head.php`:
 *   $ogMeta = ['title' => '...', 'description' => '...', 'image' => '...', 'url' => '...', 'type' => 'article'];
 *
 * Otherwise metadata is resolved automatically from API page data, blog records, or slug fallbacks.
 */

function dps_site_og_defaults(): array
{
    return [
        'title'       => 'Top Rated CBSE Board School in Kanpur | DPS Kanpur',
        'description' => 'Looking for a trusted CBSE board school in Kanpur? DPS Kalyanpur delivers high-quality education, affordable English medium with a focus on all round growth.',
        'image'       => 'https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/lI8LdUr8kM2jwgHRVjDQtANfQaGVJ6cUYYYRb8do.jpg',
        'site_name'   => 'Delhi Public School Kalyanpur',
        'type'        => 'website',
    ];
}

function dps_get_current_page_slug(): string
{
    return basename($_SERVER['PHP_SELF'] ?? 'index', '.php');
}

function dps_get_current_page_url(): string
{
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? null) == 443);
    $scheme = $isHttps ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'dpskalyanpur.com';
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    $urlNoQuery = preg_replace('/\?.*$/', '', $requestUri);

    return $scheme . '://' . $host . $urlNoQuery;
}

function dps_humanize_slug(string $slug): string
{
    $slug = str_replace(['-', '_'], ' ', $slug);
    return ucwords(trim($slug));
}

function dps_clean_meta_text($value): string
{
    return trim(strip_tags((string) $value));
}

function dps_normalize_slug_key(string $slug): string
{
    $slug = strtolower(trim($slug));
    $slug = preg_replace('/[^a-z0-9-]/', '', $slug);

    if ($slug !== '' && str_ends_with($slug, 's')) {
        return substr($slug, 0, -1);
    }

    return $slug;
}

function dps_global_var_to_slug(string $varName): ?string
{
    if (!preg_match('/(?:_data|Data)$/i', $varName)) {
        return null;
    }

    $name = preg_replace('/(?:_data|Data)$/i', '', $varName);
    $name = preg_replace('/_+/', '_', $name);
    $name = trim($name, '_');

    if ($name === '') {
        return null;
    }

    return str_replace('_', '-', strtolower($name));
}

function dps_slug_match_score(string $pageSlug, string $varSlug): int
{
    $page = dps_normalize_slug_key($pageSlug);
    $var = dps_normalize_slug_key($varSlug);

    if ($page === $var) {
        return 100;
    }

    if ($page !== '' && $var !== '' && (str_starts_with($var, $page) || str_starts_with($page, $var))) {
        return 85;
    }

    similar_text($page, $var, $percent);

    return (int) round($percent);
}

function dps_extract_image_from_api_data(array $data, string $defaultImage): string
{
    $candidates = [
        $data['meta_image_url'] ?? null,
        $data['meta_image'] ?? null,
        $data['og_image'] ?? null,
        $data['image_url'] ?? null,
        $data['featured_image'] ?? null,
        $data['banner_image'] ?? null,
    ];

    foreach ($candidates as $candidate) {
        $candidate = trim((string) $candidate);
        if ($candidate !== '') {
            return $candidate;
        }
    }

    $sections = $data['sections'] ?? [];
    if (is_array($sections)) {
        foreach ($sections as $section) {
            if (!is_array($section)) {
                continue;
            }

            $mediaItems = $section['resolved_content']['media'] ?? [];
            if (!is_array($mediaItems)) {
                continue;
            }

            foreach ($mediaItems as $media) {
                $mediaUrl = trim((string) ($media['media_url'] ?? ''));
                if ($mediaUrl !== '') {
                    return $mediaUrl;
                }

                $mediaFile = trim((string) ($media['media_file'] ?? ''));
                if ($mediaFile !== '') {
                    $apiBase = $GLOBALS['api_url'] ?? 'https://dps.allenhouseschools.com';
                    return rtrim($apiBase, '/') . '/' . ltrim($mediaFile, '/');
                }
            }

            $items = $section['resolved_content']['items'] ?? [];
            if (is_array($items)) {
                foreach ($items as $item) {
                    $imageUrl = trim((string) ($item['image_url'] ?? ''));
                    if ($imageUrl !== '') {
                        $apiBase = $GLOBALS['api_url'] ?? 'https://dps.allenhouseschools.com';
                        if (!preg_match('#^https?://#i', $imageUrl)) {
                            return rtrim($apiBase, '/') . '/' . ltrim($imageUrl, '/');
                        }
                        return $imageUrl;
                    }
                }
            }
        }
    }

    return $defaultImage;
}

function dps_meta_from_api_data(array $data, array $defaults, string $url, string $type = 'website'): array
{
    return [
        'title'       => dps_clean_meta_text($data['title'] ?? $data['meta_title'] ?? $defaults['title']),
        'description' => dps_clean_meta_text($data['meta_description'] ?? $data['description'] ?? $defaults['description']),
        'image'       => dps_extract_image_from_api_data($data, $defaults['image']),
        'url'         => $url,
        'type'        => $type,
        'site_name'   => $defaults['site_name'],
    ];
}

function dps_is_page_like_api_data(array $data): bool
{
    if ($data === [] || array_is_list($data)) {
        return false;
    }

    return isset($data['title']) || isset($data['meta_title']) || isset($data['meta_description']);
}

function dps_find_api_page_data_by_slug(string $slug): ?array
{
    $bestData = null;
    $bestScore = 0;

    foreach ($GLOBALS as $key => $value) {
        if (!is_string($key) || !is_array($value) || !isset($value['data']) || !is_array($value['data'])) {
            continue;
        }

        if (!dps_is_page_like_api_data($value['data'])) {
            continue;
        }

        $varSlug = dps_global_var_to_slug($key);
        if ($varSlug === null) {
            continue;
        }

        $score = dps_slug_match_score($slug, $varSlug);
        if ($score > $bestScore) {
            $bestScore = $score;
            $bestData = $value['data'];
        }
    }

    return $bestScore >= 80 ? $bestData : null;
}

function dps_resolve_blog_detail_meta(array $defaults, string $url): ?array
{
    $blog = null;
    if (isset($selectedBlog) && is_array($selectedBlog) && !empty($selectedBlog)) {
        $blog = $selectedBlog;
    } elseif (isset($GLOBALS['selectedBlog']) && is_array($GLOBALS['selectedBlog']) && !empty($GLOBALS['selectedBlog'])) {
        $blog = $GLOBALS['selectedBlog'];
    }

    if ($blog === null) {
        return null;
    }
    $image = $defaults['image'];

    if (!empty($blog['blogdetails']) && is_array($blog['blogdetails'])) {
        foreach ($blog['blogdetails'] as $detail) {
            $detailImage = trim((string) ($detail['image_url'] ?? ''));
            if ($detailImage !== '') {
                $image = $detailImage;
                break;
            }
        }
    }

    $blogSlug = trim((string) ($blog['slug'] ?? ''));
    if ($blogSlug !== '') {
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (($_SERVER['SERVER_PORT'] ?? null) == 443);
        $scheme = $isHttps ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'dpskalyanpur.com';
        $url = $scheme . '://' . $host . '/blog/' . rawurlencode($blogSlug);
    }

    $description = $blog['meta_description'] ?? $blog['main_description'] ?? $defaults['description'];
    $description = dps_clean_meta_text($description);
    if (strlen($description) > 300) {
        $description = rtrim(substr($description, 0, 297)) . '...';
    }

    return [
        'title'       => dps_clean_meta_text($blog['meta_title'] ?? $blog['main_title'] ?? $defaults['title']),
        'description' => $description !== '' ? $description : $defaults['description'],
        'image'       => $image,
        'url'         => $url,
        'type'        => 'article',
        'site_name'   => $defaults['site_name'],
    ];
}

function dps_resolve_og_meta(): array
{
    static $cache = [];

    $explicitMeta = null;
    if (isset($ogMeta) && is_array($ogMeta)) {
        $explicitMeta = $ogMeta;
    } elseif (isset($GLOBALS['ogMeta']) && is_array($GLOBALS['ogMeta'])) {
        $explicitMeta = $GLOBALS['ogMeta'];
    }

    $blogSlug = '';
    if (isset($selectedBlog) && is_array($selectedBlog)) {
        $blogSlug = (string) ($selectedBlog['slug'] ?? '');
    } elseif (isset($GLOBALS['selectedBlog']) && is_array($GLOBALS['selectedBlog'])) {
        $blogSlug = (string) ($GLOBALS['selectedBlog']['slug'] ?? '');
    }

    $cacheKey = md5(json_encode([
        dps_get_current_page_slug(),
        $_SERVER['REQUEST_URI'] ?? '',
        $explicitMeta,
        $blogSlug,
    ]));

    if (isset($cache[$cacheKey])) {
        return $cache[$cacheKey];
    }

    $defaults = dps_site_og_defaults();
    $slug = dps_get_current_page_slug();
    $url = dps_get_current_page_url();

    if ($explicitMeta !== null) {
        $cache[$cacheKey] = array_merge($defaults, $explicitMeta, [
            'url' => $explicitMeta['url'] ?? $url,
        ]);
        return $cache[$cacheKey];
    }

    if ($blogMeta = dps_resolve_blog_detail_meta($defaults, $url)) {
        $cache[$cacheKey] = $blogMeta;
        return $cache[$cacheKey];
    }

    if (isset($pageData2) && is_array($pageData2) && !empty($pageData2['data']) && is_array($pageData2['data'])) {
        $cache[$cacheKey] = dps_meta_from_api_data($pageData2['data'], $defaults, $url);
        return $cache[$cacheKey];
    }

    if ($slug === 'index' && isset($home_data) && is_array($home_data) && !empty($home_data['data'])) {
        $cache[$cacheKey] = dps_meta_from_api_data($home_data['data'], $defaults, $url);
        return $cache[$cacheKey];
    }

    if ($apiData = dps_find_api_page_data_by_slug($slug)) {
        $cache[$cacheKey] = dps_meta_from_api_data($apiData, $defaults, $url);
        return $cache[$cacheKey];
    }

    if ($slug === 'index') {
        $cache[$cacheKey] = array_merge($defaults, ['url' => $url]);
        return $cache[$cacheKey];
    }

    $cache[$cacheKey] = [
        'title'       => 'DPS Kalyanpur | ' . dps_humanize_slug($slug),
        'description' => $defaults['description'],
        'image'       => $defaults['image'],
        'url'         => $url,
        'type'        => 'website',
        'site_name'   => $defaults['site_name'],
    ];

    return $cache[$cacheKey];
}

function dps_render_og_meta_tags(): void
{
    $meta = dps_resolve_og_meta();
    $host = $_SERVER['HTTP_HOST'] ?? 'dpskalyanpur.com';

    $title = htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8');
    $image = htmlspecialchars($meta['image'], ENT_QUOTES, 'UTF-8');
    $url = htmlspecialchars($meta['url'], ENT_QUOTES, 'UTF-8');
    $type = htmlspecialchars($meta['type'] ?? 'website', ENT_QUOTES, 'UTF-8');
    $siteName = htmlspecialchars($meta['site_name'] ?? dps_site_og_defaults()['site_name'], ENT_QUOTES, 'UTF-8');
    $hostEsc = htmlspecialchars($host, ENT_QUOTES, 'UTF-8');

    echo "<meta property=\"og:url\" content=\"{$url}\">\n";
    echo "<meta property=\"og:type\" content=\"{$type}\">\n";
    echo "<meta property=\"og:title\" content=\"{$title}\">\n";
    echo "<meta property=\"og:description\" content=\"{$description}\">\n";
    echo "<meta property=\"og:image\" content=\"{$image}\">\n";
    echo "<meta property=\"og:site_name\" content=\"{$siteName}\">\n";
    echo "\n";
    echo "<meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    echo "<meta property=\"twitter:domain\" content=\"{$hostEsc}\">\n";
    echo "<meta property=\"twitter:url\" content=\"{$url}\">\n";
    echo "<meta name=\"twitter:title\" content=\"{$title}\">\n";
    echo "<meta name=\"twitter:description\" content=\"{$description}\">\n";
    echo "<meta name=\"twitter:image\" content=\"{$image}\">\n";
}
