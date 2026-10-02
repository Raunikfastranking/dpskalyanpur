<?php
require_once __DIR__ . '/seo.php';

$meta = dps_resolve_og_meta();
?>
<title><?= htmlspecialchars($meta['title'], ENT_QUOTES, 'UTF-8') ?></title>
<meta name="description" content="<?= htmlspecialchars($meta['description'], ENT_QUOTES, 'UTF-8') ?>">
