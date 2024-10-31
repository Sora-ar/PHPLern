<?php
session_start();
try {
    $dsn = "pgsql:host=localhost;dbname=users_db";
    $username = "postgres";
    $password = "Sasha21122004";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Перевірка, чи користувач існує, і перевірка пароля
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user["username"];
            header("Location: welcome.php");
            exit();
        } else {
            echo "Неправильне ім'я користувача або пароль.";
        }
    }
} catch (PDOException $e) {
    echo "Помилка підключення до бази даних: " . $e->getMessage();
}
