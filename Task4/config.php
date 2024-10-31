<?php
// config.php

$dsn = "pgsql:host=localhost;dbname=users_db";
$username = "postgres";
$password = "Sasha21122004";



try {
    // Підключення до бази даних за допомогою PDO
    $pdo = new PDO($dsn, $username, $password);
    // Встановлення режиму помилок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
