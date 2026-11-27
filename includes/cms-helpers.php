<?php

/**
 * Plain text from CMS HTML (alt attributes, breadcrumbs only).
 */
function dps_cms_plain_text(?string $html): string
{
    return trim(html_entity_decode(strip_tags((string) $html), ENT_QUOTES, 'UTF-8'));
}

/**
 * Trusted CMS HTML field — output as returned by the API (styling preserved).
 */
function dps_cms_html(?string $html): string
{
    return (string) ($html ?? '');
}