<?php
session_start();
try {
    $dsn = "pgsql:host=localhost;dbname=users_db";
    $username = "postgres";
    $password = "Sasha21122004";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Підключення успішне!";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Підготовлений запит для безпечного вставлення даних
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($query);

        // Виконання запиту з передачею параметрів
        $result = $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
        ]);

        if ($result) {
            echo "Реєстрація успішна!";
        } else {
            echo "Помилка при реєстрації.";
        }
    }
} catch (PDOException $e) {
    echo "Помилка підключення до бази даних: " . $e->getMessage();
}