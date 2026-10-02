<?php
require_once dirname(__DIR__) . '/proxy/config.php';

header('Content-Type: application/json; charset=utf-8');

$branchId = isset($_GET['branch']) ? (int) $_GET['branch'] : (int) DPS_KALYANPUR_BRANCH_ID;

if ($branchId !== (int) DPS_KALYANPUR_BRANCH_ID) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid branch']);
    exit;
}

$url = 'https://dps.allenhouseschools.com/api/tc-details/' . $branchId;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());

$response = curl_exec($ch);
$status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($status > 0 ? $status : 502);
echo $response !== false ? $response : json_encode(['success' => false, 'message' => 'API request failed']);
