<?php
header('Content-Type: application/json');

$apiKey = "0ab2ebb03cf43d565707f6ca215e1b24";
$cityRef = $_GET['cityRef'];
$deliveryType = $_GET['deliveryType'];
$weight = floatval($_GET['weight']);

if (!$cityRef) {
    echo json_encode(["error" => "CityRef is required"]);
    exit;
}

$url = "https://api.novaposhta.ua/v2.0/json/";
$data = [
    "apiKey" => $apiKey,
    "modelName" => "Address",
    "calledMethod" => "getWarehouses",
    "methodProperties" => [
        "CityRef" => $cityRef,
    ],
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

$response = json_decode($result, true);
echo json_encode($response['data']);
