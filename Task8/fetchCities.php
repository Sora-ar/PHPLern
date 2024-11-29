<?php
header('Content-Type: application/json');

$apiKey = "0ab2ebb03cf43d565707f6ca215e1b24";
$url = "https://api.novaposhta.ua/v2.0/json/";

$data = [
    "apiKey" => $apiKey,
    "modelName" => "Address",
    "calledMethod" => "getCities",
];

$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "Неможливо отримати міста"]);
    exit;
}

$response = json_decode($result, true);
echo json_encode($response['data']);
