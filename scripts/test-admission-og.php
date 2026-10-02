<?php
$_SERVER['PHP_SELF'] = '/admission-overview.php';
$_SERVER['REQUEST_URI'] = '/admission-overview';
$_SERVER['HTTP_HOST'] = 'dpskalyanpur.com';
$_SERVER['HTTPS'] = 'on';

include dirname(__DIR__) . '/includes/apis.php';
require_once dirname(__DIR__) . '/includes/seo.php';

$meta = dps_resolve_og_meta();
echo "title={$meta['title']}\n";
echo "url={$meta['url']}\n";
