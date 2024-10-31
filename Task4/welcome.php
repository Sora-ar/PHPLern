<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вітаємо</title>
</head>
<body>
<h1>Ласкаво просимо, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h1>
<a href="logout.php">Вийти</a>
</body>
</html>
