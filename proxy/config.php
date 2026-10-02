<?php
// Central config for API base URL, branch ID, and JWT auth
define('API_BASE_URL', 'https://allenp.superhouseerp.com');
define('DPS_KALYANPUR_BRANCH_ID', 9);
define('API_JWT_TOKEN', 'hgutuyg758374tg5f3738y87gusdfjhgjh$@.hgjgjhikj');

if (!function_exists('api_auth_headers')) {
    /**
     * @param string[] $extra e.g. ['Content-Type: application/json']
     * @return string[]
     */
    function api_auth_headers(array $extra = []): array
    {
        $headers = ['Authorization: Bearer ' . API_JWT_TOKEN];
        foreach ($extra as $header) {
            $headers[] = $header;
        }
        return $headers;
    }
}
