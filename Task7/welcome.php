<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вітаємо, <?php echo htmlspecialchars($user['username']); ?></title>
</head>
<body>
<h2>Вітаємо, <?php echo htmlspecialchars($user['username']); ?>!</h2>
<p>Ви успішно увійшли в систему.</p>
<a href="logout.php">Вийти</a>
</body>
</html>
