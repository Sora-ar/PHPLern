<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    setcookie('username', $_POST['name'], time() + (86400 * 7)); // Зберігаємо ім'я в cookie на 7 днів
    header("Location: " . $_SERVER['PHP_SELF']); // Перенаправляємо на цю ж сторінку
    exit();
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600); // Видаляємо cookie
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Привітання</title>
</head>
<body>
<?php if (isset($_COOKIE['username'])): ?>
    <h1>Привіт, <?= htmlspecialchars($_COOKIE['username']); ?>!</h1>
    <form method="POST">
        <button type="submit" name="delete_cookie">Видалити cookie</button>
    </form>
<?php else: ?>
    <form method="POST">
        <label>Введіть ваше ім'я:
            <input type="text" name="name" required>
        </label>
        <button type="submit">Відправити</button>
    </form>
<?php endif; ?>
</body>
</html>
