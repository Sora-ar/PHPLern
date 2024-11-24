<?php
session_start();

try {
    $conn = new PDO("pgsql:host=localhost; port=5432; dbname=users_db", "postgres", "Sasha21122004");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(":email", $email);
    $query->execute();

    if ($query->rowCount() > 0) {
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Неправильний пароль"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Користувача не знайдено"]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Помилка підключення до бази даних: " . $e->getMessage()]);
}