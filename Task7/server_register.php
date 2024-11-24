<?php
session_start();

try {
    $conn = new PDO("pgsql:host=localhost; port=5432; dbname=users_db", "postgres", "Sasha21122004");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $query->bindParam(":email", $email);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo json_encode(["success" => false, "message" => "Електронна пошта вже зареєстрована"]);
        exit;
    }

    $query = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo json_encode(["success" => false, "message" => "Ім'я користувача вже використовується"]);
        exit;
    }

    $query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $query->bindParam(":username", $username);
    $query->bindParam(":email", $email);
    $query->bindParam(":password", $password);
    $query->execute();

    echo json_encode(["success" => true]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Помилка підключення до бази даних: " . $e->getMessage()]);
}
