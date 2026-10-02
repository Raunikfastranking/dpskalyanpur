<?php
require_once __DIR__ . '/config.php';

// Get raw JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Forward request to real API
$ch = curl_init("https://dps.allenhouseschools.com/api/enquiries");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers(['Content-Type: application/json']));
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Send API response back to frontend
http_response_code($status);
header("Content-Type: application/json");
echo $response;
