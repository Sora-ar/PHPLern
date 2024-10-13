<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === 'user' && $_POST['password'] === '1234') {
        $_SESSION['user'] = $_POST['login']; // Збереження логіну у сесії
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $error = "Невірний логін або пароль!";
    }
}

if (isset($_POST['logout'])) {
    session_unset(); // Очищення сесії
    session_destroy(); // Знищення сесії
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Сторінка входу</title>
</head>
<body>
<?php if (isset($_SESSION['user'])): ?>
    <h1>Вітаємо, <?= htmlspecialchars($_SESSION['user']); ?>!</h1>
    <form method="POST">
        <button type="submit" name="logout">Вийти</button>
    </form>
<?php else: ?>
    <form method="POST">
        <label>Логін:
            <input type="text" name="login" required>
        </label><br>
        <label>Пароль:
            <input type="password" name="password" required>
        </label><br>
        <button type="submit">Увійти</button>
    </form>
    <?php if (isset($error)): ?>
        <p><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
