<?php
header('Content-Type: application/json');
$pdo = new PDO('pgsql:host=localhost;dbname=orders', 'postgres', 'Sasha21122004');

$orderNumber = $_POST['orderNumber'];
$weight = $_POST['weight'];
$city = $_POST['city'];
$deliveryType = $_POST['deliveryType'];
$warehouse = $_POST['warehouse'];

if (!$orderNumber || !$weight || !$city || !$deliveryType || !$warehouse) {
    echo json_encode(["success" => false, "error" => "Всі поля повинні бути заповнені."]);
    exit;
}

$stmt = $pdo->prepare("INSERT INTO orders (order_number, weight, city_ref, delivery_type, warehouse_ref) VALUES (?, ?, ?, ?, ?)");
if ($stmt->execute([$orderNumber, $weight, $city, $deliveryType, $warehouse])) {
    echo json_encode(["success" => true]);
} else {
    $errorInfo = $stmt->errorInfo();
    echo json_encode([
        "success" => false,
        "error" => "Помилка збереження в базу даних.",
        "details" => $errorInfo
    ]);
}

