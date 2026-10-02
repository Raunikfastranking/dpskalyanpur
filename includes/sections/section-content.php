<?php
// includes/section-content.php

switch ($section_type) {
    case 'content':
        include __DIR__ . '/content.php';
        break;

    case 'carousel':
        include __DIR__ . '/carousel.php';
        break;

    case 'gallery':
        include __DIR__ . '/gallery.php';
        break;

    case 'card':
        include __DIR__ . '/card.php';
        break;

    case 'accordion':
        include __DIR__ . '/accordion.php';
        break;

    case 'video':
        include __DIR__ . '/video.php';
        break;

    case 'table':
        include __DIR__ . '/table.php';
        break;
 
    default:
        echo "<div class='text-red-500'>⚠ Unknown section type: {$section_type}</div>";
}
